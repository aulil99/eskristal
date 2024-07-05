<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load library
        $this->load->library(['template', 'form_validation']);
        //load Model

        $this->load->model('m_penjualan');

        $this->load->model('m_laporan');

        header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        //cek login
        $this->is_login();

        if ($this->input->post('cari', TRUE) == 'Search') {
            //validasi input data tanggal
            $this->form_validation->set_rules(
                'id_penjualan',
                'ID Penjualan',
                'required',
                array(
                    'required' => '{field} wajib diisi',
                )
            );

            if ($this->form_validation->run() == TRUE) {
                $idP = $this->security->xss_clean($this->input->post('id_penjualan', TRUE));
            } else {
                $this->session->set_flashdata('alert', validation_errors('<p class="my-0">', '</p>'));

                redirect('hutang');
            }
        } else {
            $idP = null;
        }

        $uuid = $this->session->userdata('UserID');
        $getData = null;

        if ($this->session->userdata('level') == 'pegawai') {
            $getData = $this->m_laporan->getDataHutang($idP, '1');
        } else {
            $getData = $this->m_laporan->getDataHutang($idP, $uuid);
        }

        $data = [
            'title' => 'Laporan Hutang',
            'idP' => $idP,
            'data' => $getData,
            'penjualan' => $this->m_penjualan->getData('tbl_penjualan', ['id_user' => $uuid]),
        ];

        $this->template->kasir('hutang/index', $data);
    }

    public function tambah_hutang()
    {
        $this->is_login();

        $data = [
            'title' => 'Tambah Hutang',
        ];

        $this->template->kasir('hutang/form_input', $data);
    }

    public function edit_hutang($idP = '')
    {
        $this->is_login();

        if ($idP == '') {
            redirect('hutang');
        }
        //proses update
        $up = $this->m_penjualan->update('tbl_penjualan', ['status' => "lunas"], ['id_penjualan' => $idP]);

        if ($up) {
            $this->session->set_flashdata('success', 'Data pegawai berhasil diperbarui..');

            redirect('hutang');
        }

        $data = ['title' => 'Tambah Hutang'];

        $this->template->kasir('hutang/form_edit', $data);
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
