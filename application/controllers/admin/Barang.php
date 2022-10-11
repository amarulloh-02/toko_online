<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = [
            'title' => 'Barang',
            'barang'  => $this->m_barang->get_all_data(),
            'isi'   => 'admin/barang/list'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => '%s harus diisi'
        ]);

        if ($this->form_validation->run() == true) {

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '1000';
            $this->upload->initialize($config);
            $field_name = 'foto';
            if (!$this->upload->do_upload($field_name)) {
                $data = [
                    'title' => 'Barang',
                    'kategori'  => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'admin/barang/add'
                ];
                $this->load->view('layout/admin/v_wrapper', $data);
            } else {
                $upload_data = ['uploads' => $this->upload->data()];
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = [
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto' => $upload_data['uploads']['file_name']
                ];
                $this->m_barang->add($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect('admin/barang');
            }
        }
        $data = [
            'title' => 'Barang',
            'kategori'  => $this->m_kategori->get_all_data(),
            'isi'   => 'admin/barang/add'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    //Update one item
    public function edit($id_barang = NULL)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => '%s harus diisi'
        ]);

        if ($this->form_validation->run() == true) {

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '1000';
            $this->upload->initialize($config);
            $field_name = 'foto';
            if (!$this->upload->do_upload($field_name)) {
                $data = [
                    'title' => 'Barang',
                    'kategori'  => $this->m_kategori->get_all_data(),
                    'barang'  => $this->m_barang->get_data($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'admin/barang/edit'
                ];
                $this->load->view('layout/admin/v_wrapper', $data);
            } else {

                $barang = $this->m_barang->get_data($id_barang);
                if ($barang->foto != "") {
                    unlink('./assets/img/' . $barang->foto);
                }

                $upload_data = ['uploads' => $this->upload->data()];
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = [
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto' => $upload_data['uploads']['file_name']
                ];
                $this->m_barang->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diubah');
                redirect('admin/barang');
            }
            $data = [
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->m_barang->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
            redirect('admin/barang');
        }
        $data = [
            'title' => 'Barang',
            'kategori'  => $this->m_kategori->get_all_data(),
            'barang'  => $this->m_barang->get_data($id_barang),
            'isi'   => 'admin/barang/edit'
        ];
        $this->load->view('layout/admin/v_wrapper', $data);
    }

    //Delete one item
    public function delete($id_barang = null)
    {
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->foto != "") {
            unlink('./assets/img/' . $barang->foto);
        }
        $data = [
            'id_barang' => $id_barang,
        ];
        $this->m_barang->delete($data);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        redirect('admin/barang');
    }
}





/* End of file barang.php */
