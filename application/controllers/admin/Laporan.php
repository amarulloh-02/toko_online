<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_laporan');
  }

  public function index()
  {
    $data = [
      'title' => 'Laporan Penjualan',
      'isi'   => 'admin/laporan/laporan'
    ];
    $this->load->view('layout/admin/v_wrapper', $data);
  }

  public function lap_harian()
  {
    $tanggal = $this->input->post('tanggal');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');

    $data = [
      'title' => 'Laporan Penjualan Harian',
      'tanggal' => $tanggal,
      'bulan' => $bulan,
      'tahun' => $tahun,
      'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
      'isi'   => 'admin/laporan/lap_harian'
    ];
    $this->load->view('layout/admin/v_wrapper', $data);
  }

  public function lap_bulanan()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');

    $data = [
      'title' => 'Laporan Penjualan Bulanan',
      'bulan' => $bulan,
      'tahun' => $tahun,
      'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
      'isi'   => 'admin/laporan/lap_bulanan'
    ];
    $this->load->view('layout/admin/v_wrapper', $data);
  }

  public function lap_tahunan()
  {
    $tahun = $this->input->post('tahun');

    $data = [
      'title' => 'Laporan Penjualan Tahunan',
      'tahun' => $tahun,
      'laporan' => $this->m_laporan->lap_tahunan($tahun),
      'isi'   => 'admin/laporan/lap_tahunan'
    ];
    $this->load->view('layout/admin/v_wrapper', $data);
  }
}
