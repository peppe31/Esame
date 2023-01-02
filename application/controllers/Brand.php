<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_brand()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_brand', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_brand()
    {
        $data                = array();
        $data['all_brand']   = $this->serra_model->getall_serra();
        $data['maincontent'] = $this->load->view('admin/pages/manage_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_brand()
    {
        $data                       = array();
        $data['cod_serra']         = $this->input->post('codice');
        $data['capienza']  = $this->input->post('capienza');

            $result = $this->serra_model->save_serra($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Serra aggiunta correttamente');
                redirect('manage/brand');
            } else {
                $this->session->set_flashdata('message', 'Inserimento serra fallito');
                redirect('manage/brand');
            }

    }

    public function delete_brand($id)
    {
        $result = $this->serra_model->delete_serra_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Brand Deleted Sucessfully');
            redirect('manage/brand');
        } else {
            $this->session->set_flashdata('message', 'Brand Deleted Failed');
            redirect('manage/brand');
        }
    }

    public function edit_brand($id)
    {
        $data                     = array();
        $data['brand_info_by_id'] = $this->serra_model->edit_serra_info($id);
        $data['maincontent']      = $this->load->view('admin/pages/edit_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_brand($id)
    {
        $data                       = array();
        $data['cod_serra']         = $this->input->post('codice');
        $data['capienza']  = $this->input->post('capienza');

 		$result = $this->serra_model->update_serra_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Aggiornamento serra completato');
                redirect('manage/brand');
            } else {
                $this->session->set_flashdata('message', 'Aggiornamento serra fallito');
                redirect('manage/brand');
            }

    }

    public function published_brand($id)
    {
        $result = $this->serra_model->published_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Brand Sucessfully');
            redirect('manage/brand');
        } else {
            $this->session->set_flashdata('message', 'Published Brand  Failed');
            redirect('manage/brand');
        }
    }

    public function unpublished_brand($id)
    {
        $result = $this->serra_model->unpublished_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Brand Sucessfully');
            redirect('manage/brand');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Brand  Failed');
            redirect('manage/brand');
        }
    }

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name  = $this->session->userdata('user_name');
        $id    = $this->session->userdata('user_id');

        if ($email == false) {
            redirect('admin');
        }

    }

}
