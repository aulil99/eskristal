<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pengiriman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load library
        $this->load->library(['template', 'form_validation']);
        //load Model
        $this->load->model('m_pengiriman');

        $this->load->model('m_penjualan');

        $this->load->model('m_ongkir');

        $this->load->model('m_pelanggan');

        header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        $this->is_login();

        $data = [
            'title' => 'Data Pengiriman',
            'ongkir' => $this->m_ongkir->getAllData('tbl_ongkir')
        ];

        $this->template->kasir('pengiriman/index', $data);
    }

    public function ubah_ongkir($id)
    {
        $this->is_admin();

        if ($this->input->post('submit', TRUE) == 'submit') {
            //validasi form

            $this->form_validation->set_rules(
                'jenis',
                'Jenis Pelanggan',
                'required|min_length[3]|max_length[255]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maksimal 255 karakter'
                )
            );

            $this->form_validation->set_rules(
                'harga',
                'Harga Ongkir',
                "required|regex_match[/^[0-9.]+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'regex_match' => '{field} hanya boleh angka'
                )
            );

            if ($this->form_validation->run() == TRUE) {
                //tampung data ke variabel

                $jenis = $this->security->xss_clean($this->input->post('jenis', TRUE));
                $harga = str_replace('.', '', $this->security->xss_clean($this->input->post('harga', TRUE)));

                $data_simpan = [
                    'jenis' => $jenis,
                    'harga' => $harga,
                ];

                $up = $this->m_ongkir->update('tbl_ongkir', $data_simpan, ['id' => $id]);

                if ($up) {
                    $this->session->set_flashdata('success', 'Data Ongkir berhasil diperbarui..');

                    redirect('pengiriman');
                }
            }
        }
        //ambil data
        $where = [
            'id' => $this->security->xss_clean($id)
        ];
        $getData = $this->m_ongkir->getData('tbl_ongkir', $where);

        //cek jumlah data
        if ($getData->num_rows() != 1) {
            redirect('pengiriman');
        }

        $data = [
            'title' => 'Edit Ongkos Kirim',
            'data' => $getData->row()
        ];

        $this->template->kasir('pengiriman/form_ongkir', $data);
    }

    public function tambah_pengiriman()
    {
        $this->is_login();
        //ketika user mengklik submit
        if ($this->input->post('submit', TRUE) == 'submit') {
            //validasi form

            $this->form_validation->set_rules(
                'date',
                'Tanggal',
                'required',
                array(
                    'required' => '{field} wajib diisi',
                    'checkDateFormat' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'id_penjualan',
                'id penjualan',
                "required|min_length[10]|max_length[255]|regex_match[/^[A-Z a-z.0-9-,']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 5 karakter',
                    'max_length' => '{field} maksimal 30 karakter',
                    'regex_match' => 'Data {field} yang anda masukkan tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'kurir',
                'Nama Kurir',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'no_kendaraan',
                'Plat Nomor',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            //jika validasi berhasil maka lakukan proses penyimpanan
            if ($this->form_validation->run() == TRUE) {
                //tampung data ke variabel
                $id = 'ID' . time();
                $idPenjualan = $this->security->xss_clean($this->input->post('id_penjualan', TRUE));
                $tgl = date('Y-m-d', strtotime(str_replace('/', '-', $this->security->xss_clean($this->input->post('date', TRUE)))));
                $kurir = $this->security->xss_clean($this->input->post('kurir', TRUE));
                $plat = $this->security->xss_clean($this->input->post('no_kendaraan', TRUE));

                $penjualan = $this->m_penjualan->getData('tbl_penjualan', ['id_penjualan' => $idPenjualan]);
                $dataPenjualan = $penjualan->row();

                $plg = $this->m_pelanggan->getData('tbl_pelanggan', ['nama' => $dataPenjualan->nama_pembeli]);
                $dataPlg = $plg->row();

                $dataOngkir = $this->m_ongkir->getData('tbl_ongkir', ['jenis' => $dataPlg->jenis]);
                $ongkir = $dataOngkir->row();

                $data_simpan = [
                    'id_pengiriman' => $id,
                    'id_penjualan' => $idPenjualan,
                    'id_pelanggan' => $dataPlg->id_pelanggan,
                    'date' => $tgl,
                    'ongkir' => $ongkir->harga,
                    'kurir' => $kurir,
                    'no_kendaraan' => $plat
                ];

                $simpan = $this->m_pengiriman->save('tbl_pengiriman', $data_simpan);

                if ($simpan) {
                    $this->session->set_flashdata('success', 'Data Pengiriman berhasil ditambahkan..');

                    redirect('pengiriman');
                }
            }
        }

        $data = [
            'title' => 'Tambah Pengiriman',
            'data' => $this->m_penjualan->getAllData('tbl_penjualan'),
            'pelanggan' => $this->m_pelanggan->getAllData('tbl_pelanggan')
        ];

        $this->template->kasir('pengiriman/form_input', $data);
    }

    public function edit_pengiriman($id)
    {
        $this->is_login();

        //ketika user mengklik submit
        if ($this->input->post('submit', TRUE) == 'submit') {
            //validasi form
            $this->form_validation->set_rules(
                'id_pengiriman',
                'ID Pengiriman',
                'required|min_length[10]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'date',
                'Tanggal',
                'required',
                array(
                    'required' => '{field} wajib diisi',
                    'checkDateFormat' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'id_penjualan',
                'id penjualan',
                "required|min_length[10]|max_length[255]|regex_match[/^[A-Z a-z.0-9-,']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 5 karakter',
                    'max_length' => '{field} maksimal 30 karakter',
                    'regex_match' => 'Data {field} yang anda masukkan tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'kurir',
                'Nama Kurir',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'no_kendaraan',
                'Plat Nomor',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'penerima',
                'Nama Penerima',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'keterangan',
                'Keterangan Pengiriman',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'status',
                'Status Pengiriman',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            //jika validasi berhasil maka lakukan proses penyimpanan
            if ($this->form_validation->run() == TRUE) {
                //tampung data ke variabel
                $idPengiriman = $this->security->xss_clean($this->input->post('id_pengiriman', TRUE));
                $idPenjualan = $this->security->xss_clean($this->input->post('id_penjualan', TRUE));
                $tgl = date('Y-m-d', strtotime(str_replace('/', '-', $this->security->xss_clean($this->input->post('date', TRUE)))));
                $kurir = $this->security->xss_clean($this->input->post('kurir', TRUE));
                $plat = $this->security->xss_clean($this->input->post('no_kendaraan', TRUE));
                $penerima = $this->security->xss_clean($this->input->post('penerima', TRUE));
                $keterangan = $this->security->xss_clean($this->input->post('keterangan', TRUE));
                $status = $this->security->xss_clean($this->input->post('status', TRUE));

                $penjualan = $this->m_penjualan->getData('tbl_penjualan', ['id_penjualan' => $idPenjualan]);
                $dataPenjualan = $penjualan->row();

                $plg = $this->m_pelanggan->getData('tbl_pelanggan', ['nama' => $dataPenjualan->nama_pembeli]);
                $dataPlg = $plg->row();

                $dataOngkir = $this->m_ongkir->getData('tbl_ongkir', ['jenis' => $dataPlg->jenis]);
                $ongkir = $dataOngkir->row();

                $data_update = [
                    'id_pengiriman' => $id,
                    'id_penjualan' => $idPenjualan,
                    'id_pelanggan' => $dataPlg->id_pelanggan,
                    'date' => $tgl,
                    'ongkir' => $ongkir->harga,
                    'kurir' => $kurir,
                    'no_kendaraan' => $plat,
                    'penerima' => $penerima,
                    'keterangan' => $keterangan,
                    'status' => $status,
                ];

                $up = $this->m_pengiriman->update('tbl_pengiriman', $data_update, ['id_pengiriman' => $idPengiriman]);

                if ($up) {
                    $this->session->set_flashdata('success', 'Data Pengiriman berhasil diperbarui..');

                    redirect('pengiriman');
                }
            }
        }

        //ambil data
        $where = [
            'id_pengiriman' => $this->security->xss_clean($id)
        ];
        $getData = $this->m_pengiriman->getData('tbl_pengiriman', $where);
        $rowData = $getData->row();
        $idP = $rowData->id_penjualan;

        $getPenjualan = $this->m_penjualan->getData('tbl_penjualan', ['id_penjualan' => $this->security->xss_clean($idP)]);
        //cek jumlah data
        if ($getData->num_rows() != 1) {
            redirect('pengiriman');
        }

        $data = [
            'title' => 'Edit Pengiriman',
            'data' => $rowData,
            'pembeli' => $getPenjualan->row(),
            'penjualan' => $this->m_penjualan->getAllData('tbl_penjualan')
        ];

        $this->template->kasir('pengiriman/form_edit', $data);
    }

    public function hapus_data()
    {
        //cek login
        $this->is_login();
        //validasi request ajax
        if ($this->input->is_ajax_request()) {
            //validasi
            $this->form_validation->set_rules(
                'id_pengiriman',
                'ID Pengiriman',
                "required|min_length[10]",
                array(
                    'required' => '{field} tidak valid',
                    'min_length' => 'Isi {field} tidak valid'
                )
            );

            if ($this->form_validation->run() == TRUE) {
                //tangkap row id
                $id = $this->security->xss_clean($this->input->post('id_pengiriman', TRUE));

                $hapus = $this->m_pengiriman->delete('tbl_pengiriman', ['id_pengiriman' => $id]);

                if ($hapus) {
                    echo json_encode(['message' => 'success']);
                } else {
                    echo json_encode(['message' => 'failed']);
                }
            } else {
                echo json_encode(['message' => 'failed']);
            }
        } else {
            redirect('dashboard');
        }
    }

    public function ajax_pengiriman()
    {
        $this->is_login();
        //cek apakah request berupa ajax atau bukan, jika bukan maka redirect ke home
        if ($this->input->is_ajax_request()) {
            //ambil list data
            $list = $this->m_pengiriman->get_datatables();
            //siapkan variabel array
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $i) {

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $i->id_pengiriman;
                $row[] = $i->date;
                $row[] = $i->nama;
                $row[] = ($i->phone != '') ? $i->phone : '-';
                $row[] = $i->alamat;
                $row[] = $i->kurir;
                $row[] = $i->no_kendaraan;
                $row[] = $i->penerima;
                $row[] = $i->keterangan;
                $row[] = $i->status;
                $row[] = '<div>
                            <a href="' . site_url('edit_pengiriman/' . $i->id_pengiriman) . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus_pengiriman(\'' . $i->id_pengiriman . '\')"><i class="fa fa-trash"></i></button>
                            <a href="' . site_url('cetak_pengiriman/' . $i->id_pengiriman) . '" class="btn btn-success btn-sm" target="_blank">
                                <i class="fa fa-print"></i>
                            </a>
                        </div>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_pengiriman->count_all(),
                "recordsFiltered" => $this->m_pengiriman->count_filtered(),
                "data" => $data
            );
            //output to json format
            echo json_encode($output);
        } else {
            redirect('dashboard');
        }
    }

    private function is_admin()
    {
        if (!$this->session->userdata('level') || $this->session->userdata('level') != 'admin') {
            redirect('dashboard');
        }
    }

    private function is_login()
    {
        if (!$this->session->userdata('UserID')) {
            redirect('dashboard');
        }
    }
}
