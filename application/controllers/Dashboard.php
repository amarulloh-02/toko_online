<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data = [
            'title' => 'Pelanggan',
            'isi'   => 'admin/v_register'
        ];
        $this->load->view('layout/v_wrapper', $data);
    }
}
