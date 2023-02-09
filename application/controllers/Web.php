<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

    public function index()
    {
        $data                          = array();
		$data['prodotti']=$this->speciePiantina_model->get_all_product();
        $this->load->view('web/inc/header2');
		$this->load->view('web/pages/home', $data);
		$this->load->view('web/inc/footer');

	}

    public function contact()
    {
        $data = array();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/contact');
        $this->load->view('web/inc/footer');
    }

	public function prodotti()
	{
		$data                          = array();
		$data['prodotti']=$this->speciePiantina_model->get_all_product();
		$this->load->view('web/inc/header2');
		$this->load->view('web/pages/prodotti', $data);
		$this->load->view('web/inc/footer');
	}

	public function product($stagione)
	{
		$data                          = array();
		$data['prodotti']=$this->speciePiantina_model->get_all_specie_stagione($stagione);
		$this->load->view('web/inc/header2');
		$this->load->view('web/pages/product', $data);
		$this->load->view('web/inc/footer');
	}

    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/cart', $data);
        $this->load->view('web/inc/footer');
    }

    public function single($id)
    {
        $data                       = array();
        $data['prodotto'] = $this->speciePiantina_model->get_single_specie($id);
		$this->load->view('web/inc/header2');
		$this->load->view('web/pages/single', $data);
		$this->load->view('web/inc/footer');
    }

    public function error()
    {
        $data = array();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/error');
        $this->load->view('web/inc/footer');
    }

    public function category_post($id)
    {
        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_by_cat($id);
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->web_model->get_product_by_id($product_id);

        $data['id']      = $results->cod_specie;
        $data['name']    = $results->nome;
        $data['price']   = $results->costo;
        $data['qty']     = $this->input->post('qty');
        $data['options'] = $results->immagine;


		$oggi = strtotime("now");
		$primavera = strtotime("20 March");
		$estate = strtotime("20 June");
		$inverno = strtotime("21 December");
		$autunno = strtotime("21 September");

		$controlloStagione=false;

		if ($results->stagione == "Primavera") {
			if ($oggi > $primavera && $oggi < $estate) {
				$controlloStagione=true;
			} else {
				// codice da eseguire se la data attuale non è compresa tra le due date
				$controlloStagione=false;
			}
		} else if ($results->stagione == "Autunno") {
			if ($oggi > $autunno && $oggi < $inverno) {
				$controlloStagione=true;
			} else {
				// codice da eseguire se la data attuale non è compresa tra le due date
				$controlloStagione=false;
			}
		} else if ($results->stagione == "Inverno") {
			if ($oggi > $inverno && $oggi < $primavera) {
				$controlloStagione=false;
			} else {
				// codice da eseguire se la data attuale non è compresa tra le due date
				$controlloStagione=true;
			}
		} else if ($results->stagione == "Estate") {
			if ($oggi > $estate && $oggi < $autunno) {
				$controlloStagione=true;

			} else {
				// codice da eseguire se la data attuale non è compresa tra le due date
				$controlloStagione=false;
			}
		}


		if ($controlloStagione==true) {
			$capienza = $this->serra_model->get_capienza();
			$consumo = $data['qty'];

			if ($consumo<$capienza){
				$this->cart->insert($data);
				redirect('cart');
			}else{
				$this->session->set_flashdata('message', 'Attenzione il prodotto non è attualmente disponibile !');
				redirect('single/'.$results->cod_specie);
			}


		}else{
			$this->session->set_flashdata('message', 'Attenzione il prodotto non è disponibile in questa stagione !');
			redirect('single/'.$results->cod_specie);
		}
    }

	public function update_cart()
	{
		$data          = array();
		$data['qty']   = $this->input->post('qty');
		$data['rowid'] = $this->input->post('rowid');


		$this->cart->update($data);
		redirect('cart');
	}

    public function update_date_cart()
    {
		$data = $this->input->post('data_consegna');

		$this->session->set_userdata('data_consegna', $data);

		redirect('checkout');
    }


    public function remove_cart()
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }

    public function register_success()
    {

        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/register_success');
        $this->load->view('web/inc/footer');
    }

    public function user_form()
    {
        $data = array();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/user_form');
        $this->load->view('web/inc/footer');
    }

    public function customer_register()
    {
        $data = array();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/customer_register');
        $this->load->view('web/inc/footer');
    }

    public function customer_login()
    {
        $data = array();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/customer_login');
        $this->load->view('web/inc/footer');
    }

    public function customer_save()
    {
        $data                      = array();
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_city']     = $this->input->post('customer_city');
        $data['customer_country']  = $this->input->post('customer_country');
        $data['customer_phone']    = $this->input->post('customer_phone');
        $data['customer_zipcode']  = $this->input->post('customer_zipcode');


        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'Customer Registration Fail');
                redirect('customer/register');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/register');
        }
    }

    public function customer_logincheck()
    {
        $data                      = array();
        $data['cliente_mail']    = $this->input->post('customer_email');
        $data['cliente_password'] = $this->input->post('customer_password');


            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->cliente_piva);
                $this->session->set_userdata('customer_email', $data['cliente_mail']);
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Customer Login Fail');
                redirect('customer/login');
            }


    }

    public function customer_shipping_login()
    {
        $data                      = array();
        $data['cliente_mail']    = $this->input->post('customer_email');
        $data['cliente_password'] =$this->input->post('customer_password');

            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->cliente_piva);
                $this->session->set_userdata('customer_email', $result->cliente_mail);
                redirect('customer/shipping');
            } else {
                $this->session->set_flashdata('messagelogin', 'Customer Login Fail');
                redirect('user_form');
            }
    }

    public function customer_shipping_register()
    {
        $data                      = array();
        $data['piva']     = $this->input->post('shipping_piva');
        $data['mail']    = $this->input->post('shipping_email');
        $data['nome'] = $this->input->post('shipping_name');
        $data['cognome']  = $this->input->post('shipping_cognome');
        $data['citta']     = $this->input->post('shipping_city');
        $data['via']  = $this->input->post('shipping_address');
        $data['civico']    = $this->input->post('shipping_civico');
        $data['cap']  = $this->input->post('shipping_zipcode');


		$this->session->set_flashdata('customer_name', $data['nome']);

		$result = $this->web_model->save_customer_info($data);

		$credenziali=array();
		$credenziali['cliente_piva'] = $this->input->post('shipping_piva');
		$credenziali['cliente_mail'] = $this->input->post('shipping_email');
		$credenziali['cliente_password'] = $this->input->post('password');

		$result = $this->web_model->save_credenziali($credenziali);

		$this->session->set_userdata('piva', $result);
			redirect('/success');


    }

    public function customer_shipping()
    {
        $data = array();
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/customer_shipping');
        $this->load->view('web/inc/footer');
    }


    public function checkout()
    {
        $this->load->view('web/inc/header2');
        $this->load->view('web/pages/checkout');
        $this->load->view('web/inc/footer');
    }


    public function save_order()
    {
		$odata                = array();
		$odata['piva'] = $this->session->userdata('customer_id');
		$odata['data'] = date_create()->format("Y/m/d");
		$odata['ora'] = time();
		$odata['costo_totale'] =$this->cart->total();

		$myoddata = $this->cart->contents();

		foreach ($myoddata as $oddatas) {

			$nome         = $oddatas['name'];
			$odata['cod_specie']=$this->speciePiantina_model->get_specie_by_nome($nome);
			$odata['quantita'] = $oddatas['qty'];
			$odata['data_consegna'] =$this->session->userdata('data_consegna');


			$this->web_model->save_order_info($odata);
		}


		$this->cart->destroy();

		redirect('payment');
	}


    public function search()
    {

        $search = $this->input->get('search');

        if (!empty($search)) {
            $data                    = array();
            $data['get_all_product'] = $this->web_model->get_all_search_product($search);
            $data['search']          = $search;

            if ($data['get_all_product']) {
                $this->load->view('web/inc/header2');
                $this->load->view('web/pages/search', $data);
                $this->load->view('web/inc/footer');
            } else {
                redirect('error');
            }
        } else {
            redirect('error');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_email');
        redirect('customer/login');
    }

	public function payment()
	{
		$this->load->view('web/inc/header2');
		$this->load->view('web/pages/payment');
		$this->load->view('web/inc/footer');
	}

}
