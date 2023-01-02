<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminlogin_model');
        $this->user_login_check();
    }
    public function index()
    {
        $this->load->view('admin/pages/login');
    }

    public function admin_login_check()
    {
            $data                  = array();
            $data['mail']    = $this->input->post('user_email');
            $data['password'] =$this->input->post('user_password');

            $result = $this->adminlogin_model->admin_login_check($data);

            if ($result) {
                $this->session->set_userdata('user_email', $result->mail);
                $this->session->set_userdata('user_name', $result->nome);
				$this->session->set_userdata('cognome', $result->cognome);
				$this->session->set_userdata('cod_impiegato', $result->cod_impiegato);
				$this->session->set_userdata('tipo', $result->tipo);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', 'Your Email Or Password Does Not Match');
                redirect('admin');
            }


    }

    public function user_login_check()
    {

        $email = $this->session->userdata('user_email');
        $name  = $this->session->userdata('user_name');
        $id    = $this->session->userdata('user_id');

        if ($email == true) {
            redirect('dashboard');
        }

    }

}
