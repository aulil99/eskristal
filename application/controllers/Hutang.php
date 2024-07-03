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
            'title' => 'Hutang',
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
