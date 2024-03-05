<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load library
        $this->load->library(['template', 'form_validation']);
        //load model
        $this->load->model('m_pelanggan');

        header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        //cek login
        $this->is_login();

        $data = [
            'title' => 'Data Pelanggan'
        ];

        $this->template->kasir('pelanggan/index', $data);
    }

    public function tambah_pelanggan()
    {
        $this->is_login();
        //ketika user mengklik submit
        if ($this->input->post('submit', TRUE) == 'submit') {
            //validasi form

            $this->form_validation->set_rules(
                'nama',
                'Nama Penerima',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            if ($this->input->post('phone', TRUE) != '') {
                $this->form_validation->set_rules(
                    'phone',
                    'Nomor Telp.',
                    "required|min_length[8]|max_length[15]|regex_match[/^[0-9]+$/]",
                    array(
                        'required' => '{field} wajib diisi',
                        'min_length' => '{field} minimal 8 karakter',
                        'max_length' => '{field} maksimal 15 karakter',
                        'regex_match' => '{field} hanya boleh angka'
                    )
                );
            }

            $this->form_validation->set_rules(
                'alamat',
                'Alamat',
                "required|min_length[10]|max_length[255]|regex_match[/^[A-Z a-z.0-9-,']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 5 karakter',
                    'max_length' => '{field} maksimal 30 karakter',
                    'regex_match' => 'Data {field} yang anda masukkan tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'fasilitas',
                'Fasilitas',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'jenis',
                'Jenis Pelanggan',
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
                'Status Pelanggan',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            if ($this->form_validation->run() == TRUE) {

                $id = 'CST' . time();
                $nama = $this->security->xss_clean($this->input->post('nama', TRUE));
                $telp = $this->security->xss_clean($this->input->post('phone', TRUE));
                $alamat = $this->security->xss_clean($this->input->post('alamat', TRUE));
                $fasilitas = $this->security->xss_clean($this->input->post('fasilitas', TRUE));
                $jenis = $this->security->xss_clean($this->input->post('jenis', TRUE));
                $status = $this->security->xss_clean($this->input->post('status', TRUE));

                $data_simpan = [
                    'id_pelanggan' => $id,
                    'nama' => $nama,
                    'phone' => $telp,
                    'alamat' => $alamat,
                    'fasilitas' => $fasilitas,
                    'jenis' => $jenis,
                    'status' => $status
                ];

                $simpan = $this->m_pelanggan->save('tbl_pelanggan', $data_simpan);

                if ($simpan) {
                    $this->session->set_flashdata('success', 'Data Pelanggan berhasil ditambahkan..');

                    redirect('pelanggan');
                }
            }
        }

        $data = [
            'title' => 'Tambah Pelanggan',
            'data' => $this->m_pelanggan->getAllData('tbl_pelanggan'),
        ];

        $this->template->kasir('pelanggan/form_input', $data);
    }

    public function edit_pelanggan($id)
    {
        $this->is_login();

        //ketika user mengklik submit
        if ($this->input->post('submit', TRUE) == 'submit') {
            //validasi form
            $this->form_validation->set_rules(
                'id_pelanggan',
                'ID Pelanggan',
                'required|min_length[10]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'nama',
                'Nama Penerima',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            if ($this->input->post('phone', TRUE) != '') {
                $this->form_validation->set_rules(
                    'phone',
                    'Nomor Telp.',
                    "required|min_length[8]|max_length[15]|regex_match[/^[0-9]+$/]",
                    array(
                        'required' => '{field} wajib diisi',
                        'min_length' => '{field} minimal 8 karakter',
                        'max_length' => '{field} maksimal 15 karakter',
                        'regex_match' => '{field} hanya boleh angka'
                    )
                );
            }

            $this->form_validation->set_rules(
                'alamat',
                'Alamat',
                "required|min_length[10]|max_length[255]|regex_match[/^[A-Z a-z.0-9-,']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 5 karakter',
                    'max_length' => '{field} maksimal 30 karakter',
                    'regex_match' => 'Data {field} yang anda masukkan tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'fasilitas',
                'Fasilitas',
                "required|min_length[2]|max_length[100]|regex_match[/^[A-Z a-z.0-9']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter',
                    'max_length' => '{field} maksimal 100 karakter',
                    'regex_match' => '{field} tidak valid'
                )
            );

            $this->form_validation->set_rules(
                'jenis',
                'Jenis Pelanggan',
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
                'Status Pelanggan',
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
                $idPelanggan = $this->security->xss_clean($this->input->post('id_pelanggan', TRUE));
                $nama = $this->security->xss_clean($this->input->post('nama', TRUE));
                $telp = $this->security->xss_clean($this->input->post('phone', TRUE));
                $alamat = $this->security->xss_clean($this->input->post('alamat', TRUE));
                $fasilitas = $this->security->xss_clean($this->input->post('fasilitas', TRUE));
                $jenis = $this->security->xss_clean($this->input->post('jenis', TRUE));
                $status = $this->security->xss_clean($this->input->post('status', TRUE));

                $data_update = [
                    'id_pelanggan' => $id,
                    'nama' => $nama,
                    'phone' => $telp,
                    'alamat' => $alamat,
                    'fasilitas' => $fasilitas,
                    'jenis' => $jenis,
                    'status' => $status
                ];

                $up = $this->m_pelanggan->update('tbl_pelanggan', $data_update, ['id_pelanggan' => $idPelanggan]);

                if ($up) {
                    $this->session->set_flashdata('success', 'Data Pelanggan berhasil diperbarui..');

                    redirect('pelanggan');
                }
            }
        }

        //ambil data
        $where = [
            'id_pelanggan' => $this->security->xss_clean($id)
        ];
        $getData = $this->m_pelanggan->getData('tbl_pelanggan', $where);

        //cek jumlah data
        if ($getData->num_rows() != 1) {
            redirect('pelanggan');
        }

        $data = [
            'title' => 'Edit pelanggan',
            'data' => $getData->row()
        ];

        $this->template->kasir('pelanggan/form_edit', $data);
    }

    public function ajax_pelanggan()
    {
        $this->is_login();
        //cek apakah request berupa ajax atau bukan, jika bukan maka redirect ke home
        if ($this->input->is_ajax_request()) {
            //ambil list data
            $list = $this->m_pelanggan->get_datatables();
            //siapkan variabel array
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $i) {

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $i->id_pelanggan;
                $row[] = $i->nama;
                $row[] = ($i->phone != '') ? $i->phone : '-';
                $row[] = $i->alamat;
                $row[] = $i->fasilitas;
                $row[] = $i->jenis;
                $row[] = $i->status;
                $row[] = '<div>
                            <a href="' . site_url('edit_pelanggan/' . $i->id_pelanggan) . '" class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus_pelanggan(\'' . $i->id_pelanggan . '\')"><i class="fa fa-trash"></i></button>
                        </div>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_pelanggan->count_all(),
                "recordsFiltered" => $this->m_pelanggan->count_filtered(),
                "data" => $data
            );
            //output to json format
            echo json_encode($output);
        } else {
            redirect('dashboard');
        }
    }

    public function hapus_data()
    {
        //cek login
        $this->is_login();
        //validasi request ajax
        if ($this->input->is_ajax_request()) {
            //validasi
            $this->form_validation->set_rules(
                'id_pelanggan',
                'ID Pelanggan',
                "required|min_length[10]",
                array(
                    'required' => '{field} tidak valid',
                    'min_length' => 'Isi {field} tidak valid'
                )
            );

            if ($this->form_validation->run() == TRUE) {
                //tangkap row id
                $id = $this->security->xss_clean($this->input->post('id_pelanggan', TRUE));

                $hapus = $this->m_pelanggan->delete('tbl_pelanggan', ['id_pelanggan' => $id]);

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

    private function is_login()
    {
        if (!$this->session->userdata('UserID')) {
            redirect('dashboard');
        }
    }
}
