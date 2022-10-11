<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    // List all your items
    public function index()
    {
        $data = [
            'title' => 'User',
            'user'  => $this->m_user->get_all_data(),
            'isi'   => 'admin/user/list'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    // Add a new item
    public function add()
    {
        $data = [
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level_user' => $this->input->post('level_user')
        ];
        $this->m_user->add($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
        redirect('admin/user');
    }

    //Update one item
    public function edit($id_user = NULL)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            // 'password' => md5($this->input->post('password')),
            'level_user' => $this->input->post('level_user')
        ];
        $this->m_user->edit($data);
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('admin/user');
    }

    //Delete one item
    public function delete($id_user = null)
    {
        $data = [
            'id_user' => $id_user,
        ];
        $this->m_user->delete($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('admin/user');
    }
}

/* End of file User.php */
