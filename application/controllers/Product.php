<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_product()
    {
        $data                           = array();
        $data['maincontent']            = $this->load->view('admin/pages/add_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_product()
    {
        $data                    = array();
        $data['get_all_product'] = $this->speciePiantina_model->get_all_product();
        $data['maincontent']     = $this->load->view('admin/pages/manage_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_product()
    {
        $data                              = array();
        $data['cod_specie']             = $this->input->post('codice');
        $data['nome'] = $this->input->post('nome');
        $data['stagione']  = $this->input->post('stagione');
        $data['costo']             = $this->input->post('costo');
        $data['tempario']          = $this->input->post('tempario');


        if (!empty($_FILES['product_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('product_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/product');
            } else {
                $post_image            = $this->upload->data();
                $data['immagine'] = $post_image['file_name'];
            }
        }

            $result = $this->speciePiantina_model->save_product_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Prodotto inserito correttamente');
                redirect('manage/product');
            } else {
                $this->session->set_flashdata('message', 'Inserimento prodotto fallito');
                redirect('manage/product');
            }

    }

    public function published_product($id)
    {
        $result = $this->speciePiantina_model->published_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Product Sucessfully');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Published Product  Failed');
            redirect('manage/product');
        }
    }
    public function unpublished_product($id)
    {
        $result = $this->speciePiantina_model->unpublished_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Product Sucessfully');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Product  Failed');
            redirect('manage/product');
        }
    }

    public function edit_product($id)
    {
        $data                           = array();
        $data['product_info_by_id']     = $this->speciePiantina_model->edit_product_info($id);
        $data['maincontent']            = $this->load->view('admin/pages/edit_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_product($id)
    {
        $data                              = array();
        $data['cod_specie']             = $this->input->post('product_codice');
        $data['nome'] = $this->input->post('product_title');
        $data['stagione']  = $this->input->post('stagione');
        $data['costo']             = $this->input->post('product_price');
        $data['tempario']          = $this->input->post('tempario');

        $product_delete_image = $this->input->post('product_delete_image');

        $delete_image = substr($product_delete_image, strlen(base_url()));


        if (!empty($_FILES['product_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('product_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/product');
            } else {
                $post_image            = $this->upload->data();
                $data['product_image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }

            $result = $this->speciePiantina_model->update_product_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'Prodotto aggiornato correttamente');
                redirect('manage/product');
            } else {
                $this->session->set_flashdata('message', 'Aggiornamento prodotto fallito');
                redirect('manage/product');
            }

    }

    public function delete_product($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->product_image);
        $result = $this->speciePiantina_model->delete_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Product Deleted Sucessfully');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Product Deleted Failed');
            redirect('manage/product');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('immagine');
        $this->db->from('specie_piantina');
        $this->db->where('specie_piantina.cod_specie', $id);
        $info = $this->db->get();
        return $info->row();
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
