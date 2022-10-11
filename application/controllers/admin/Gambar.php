<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambar');
        $this->load->model('m_barang');
    }

    // List all your items
    public function index()
    {
        $data = [
            'title' => 'Gambar Barang',
            'gambar'  => $this->m_gambar->get_all_data(),
            'isi'   => 'admin/gambar/list'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    // Add a new item
    public function add($id_barang)
    {
        $this->form_validation->set_rules('ket', 'Keterangan Gambar', 'required', [
            'required' => '%s harus diisi'
        ]);

        if ($this->form_validation->run() == true) {

            $config['upload_path'] = './assets/gambar_barang/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '1000';
            $this->upload->initialize($config);
            $field_name = 'gambar';
            if (!$this->upload->do_upload($field_name)) {
                $data = [
                    'title' => 'Add Gambar Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'gambar'  => $this->m_gambar->get_gambar($id_barang),
                    'barang'  => $this->m_barang->get_data($id_barang),
                    'isi'   => 'admin/gambar/add'
                ];
                $this->load->view('layout/admin/v_wrapper', $data);
            } else {
                $upload_data = ['uploads' => $this->upload->data()];
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar_barang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = [
                    'id_barang' => $id_barang,
                    'ket' => $this->input->post('ket'),
                    'gambar' => $upload_data['uploads']['file_name']
                ];
                $this->m_gambar->add($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect('admin/gambar/add/' . $id_barang);
            }
        }
        $data = [
            'title' => 'Add Gambar Barang',
            'gambar'  => $this->m_gambar->get_gambar($id_barang),
            'barang'  => $this->m_barang->get_data($id_barang),
            'isi'   => 'admin/gambar/add'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    //Delete one item
    public function delete($id_barang, $id_gambar)
    {
        $gambar = $this->m_gambar->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambar_barang/' . $gambar->gambar);
        }
        $data = [
            'id_gambar' => $id_gambar,
        ];
        $this->m_gambar->delete($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('admin/gambar/add/' . $id_barang);
    }
}





/* End of file gambar.php */
