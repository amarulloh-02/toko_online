<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori'  => $this->m_kategori->get_all_data(),
            'isi'   => 'admin/kategori/list'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    // Add a new item
    public function add()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->m_kategori->add($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
        redirect('admin/kategori');
    }

    //Update one item
    public function edit($id_kategori = NULL)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->m_kategori->edit($data);
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('admin/kategori');
    }

    //Delete one item
    public function delete($id_kategori = null)
    {
        $data = [
            'id_kategori' => $id_kategori,
        ];
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('admin/kategori');
    }
}

/* End of file kategori.php */
