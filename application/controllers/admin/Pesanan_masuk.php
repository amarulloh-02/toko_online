<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_masuk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_pesanan_masuk');
  }

  public function index()
  {
    $data = [
      'title' => 'Pesanan Masuk',
      'pesanan' => $this->m_pesanan_masuk->pesanan(),
      'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
      'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
      'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
      'isi'   => 'admin/pesanan/pesanan_masuk'
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

  public function proses($id_transaksi)
  {
    $data = [
      'id_transaksi' => $id_transaksi,
      'status_order'   => '1'
    ];
    $this->m_pesanan_masuk->update_order($data);
    $this->session->set_flashdata('sukses', 'Pesanan berhasil diproses/dikemas');
    redirect('admin/pesanan_masuk');
  }

  public function kirim($id_transaksi)
  {
    $data = [
      'id_transaksi' => $id_transaksi,
      'no_resi' => $this->input->post('no_resi'),
      'status_order'   => '2'
    ];
    $this->m_pesanan_masuk->update_order($data);
    $this->session->set_flashdata('sukses', 'Pesanan berhasil dikirim');
    redirect('admin/pesanan_masuk');
  }
}
