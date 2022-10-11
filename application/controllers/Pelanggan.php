<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_pelanggan');
    $this->load->model('m_auth');
  }


  public function register()
  {
    $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', [
      'required' => '%s harus diisi'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', [
      'required' => '%s harus diisi',
      'is_unique' => '%s ini sudah terdaftar'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required', [
      'required' => '%s harus diisi'
    ]);
    $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', [
      'required' => '%s harus diisi',
      'matches' => '%s tidak sama !'
    ]);

    if ($this->form_validation->run() == false) {
      $data = [
        'title' => 'Register Pelanggan',
        'isi'   => 'v_register'
      ];
      $this->load->view('layout/v_wrapper', $data);
    } else {
      $data = [
        'nama_pelanggan' => $this->input->post('nama_pelanggan'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password'))
      ];
      $this->m_pelanggan->register($data);
      $this->session->set_flashdata('sukses', 'Selamat register anda berhasil, silahkan login');
      redirect('pelanggan/login');
    }
  }

  public function login()
  {
    $this->form_validation->set_rules('email', 'Email', 'required', [
      'required' => '%s harus diisi'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required', [
      'required' => '%s harus diisi'
    ]);

    if ($this->form_validation->run() == TRUE) {
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));
      $this->pelanggan_login->login($email, $password);
    }
    $data = [
      'title' => 'Halaman Login',
      'isi'   => 'v_login_pelanggan'
    ];
    $this->load->view('layout/v_wrapper', $data);
  }

  public function logout()
  {
    $this->pelanggan_login->logout();
  }

  public function akun()
  {
    $this->pelanggan_login->proteksi_halaman();
    $data = [
      'title' => 'Akun Saya',
      'isi'   => 'v_akun_saya'
    ];
    $this->load->view('layout/v_wrapper', $data);
  }
}
