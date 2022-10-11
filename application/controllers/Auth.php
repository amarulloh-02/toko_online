<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '%s harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '%s harus diisi'
        ]);


        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->user_login->login($username, $password);
        }

        $data = [
            'title' => 'Login User'
        ];
        $this->load->view('v_login_user', $data);
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}
