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
        // $this->load->model('m_penjualan');

        header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        //cek login
        // $this->is_login();
        //kosongkan cart


        $data = [
            'title' => 'Data Pelanggan'
        ];

        $this->template->kasir('pelanggan/index', $data);
    }

    public function index()
    {
        //cek login
        // $this->is_login();
        //kosongkan cart


        $data = [
            'title' => 'Tambah Pelanggan'
        ];

        $this->template->kasir('pelanggan/form_input', $data);
    }
}
