<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ManageOrder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function manage_order()
    {
        $data                          = array();
        $data['all_manage_order_info'] = $this->manageorder_model->manage_order_info();
        $data['maincontent']           = $this->load->view('admin/pages/manage_order', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function order_details($order_id)
    {
        $data        = array();
        $order_info  = $this->manageorder_model->order_info_by_id($order_id);
        $customer_id = $order_info->piva;
        $shipping_id = $order_info->piva;

        $data['customer_info']      = $this->manageorder_model->customer_info_by_id($customer_id);
        $data['shipping_info']      = $this->manageorder_model->shipping_info_by_id($shipping_id);
        $data['order_details_info'] = $this->manageorder_model->orderdetails_info_by_id($order_id);
        $data['order_info']         = $this->manageorder_model->order_info_by_id($order_id);

        $data['maincontent'] = $this->load->view('admin/pages/order_details', $data, true);
        $this->load->view('admin/master', $data);
    }

	public function cancella_order($order_id)
	{
		$this->manageorder_model->delete_order($order_id);
		$data                          = array();
		$data['all_manage_order_info'] = $this->manageorder_model->manage_order_info();
		$data['maincontent']           = $this->load->view('admin/pages/manage_order', $data, true);
		$this->load->view('admin/master', $data);
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

	public function invia_ordine($order_id){
		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['_smtp_auth'] = TRUE;
		$config['smtp_user'] = 'poliplantofficial@gmail.com';
		$config['smtp_pass'] = 'ftvzjltcpywqbdqy';
		$config['mailtype'] = 'html';
		$config['send_multipart'] = FALSE;
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$dettagliOrdine=$this->manageorder_model->order_info_by_id($order_id);

		$this->email->from('poliplantofficial@gmail.com', 'Poliplant');
		$this->email->to($dettagliOrdine->mail);
		$this->email->subject('Poliplant | Ordine n.'.$dettagliOrdine->cod_ordine);
		$this->email->message('Ciao '.$dettagliOrdine->nome.'. Il tuo ordine n. '.$dettagliOrdine->cod_ordine.
			' è stato spedito. Arriverà al tuo indirizzo il '.$dettagliOrdine->data_consegna.' Grazie per il tuo ordine. Torna a trovarci presto ! Lo staff di Poliplant');

		if($this->email->send())
		{
			$this->manageorder_model->delete_order($order_id);
			$data                          = array();
			$data['all_manage_order_info'] = $this->manageorder_model->manage_order_info();
			$data['maincontent']           = $this->load->view('admin/pages/manage_order', $data, true);
			$this->load->view('admin/master', $data);
			echo 'Ordine spedito e mail inviata correttamente al cliente.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}

	}

}
