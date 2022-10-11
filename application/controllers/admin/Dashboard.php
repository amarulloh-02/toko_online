<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'total_barang' => $this->m_admin->total_barang(),
            'total_kategori' => $this->m_admin->total_kategori(),
            'isi'   => 'admin/dashboard'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'Setting',
            'isi'   => 'admin/setting'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }
}
