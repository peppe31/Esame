<?php

class Manageorder_Model extends CI_Model
{

	public function manage_order_info()
	{
		$this->db->select('*');
		$this->db->from('ordine');
		$this->db->join('cliente', 'ordine.piva = cliente.piva');
		$result = $this->db->get();
		return $result->result();
	}

	public function order_info_by_id($order_id)
	{
		$this->db->select('*');
		$this->db->from('ordine');
		$this->db->join('cliente', 'ordine.piva = cliente.piva');
		$this->db->where('cod_ordine', $order_id);
		$result = $this->db->get();
		return $result->row();
	}

	public function customer_info_by_id($customer_id)
	{
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('piva', $customer_id);
		$result = $this->db->get();
		return $result->row();
	}

	public function shipping_info_by_id($shipping_id)
	{
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('piva', $shipping_id);
		$result = $this->db->get();
		return $result->row();
	}

	public function payment_info_by_id($payment_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_payment');
		$this->db->where('payment_id', $payment_id);
		$result = $this->db->get();
		return $result->row();
	}

	public function orderdetails_info_by_id($order_id)
	{
		$this->db->select('*');
		$this->db->from('ordine');
		$this->db->join('specie_piantina', 'ordine.cod_specie = specie_piantina.cod_specie');
		$this->db->where('cod_ordine', $order_id);
		$result = $this->db->get();
		return $result->result();
	}

	public function delete_order($id)
	{
		$this->db->where('cod_ordine', $id);
		return $this->db->delete('ordine');
	}

}
