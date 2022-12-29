<?php

class Web_Model extends CI_Model
{

	public function save_customer_info($data)
	{
		$this->db->insert('cliente', $data);
		return $data['piva'];
	}


	public function get_customer_info($data)
	{
		$this->db->select('*');
		$this->db->from('credenziali_cliente');
		$this->db->where($data);
		$info = $this->db->get();
		return $info->row();
	}

	public function get_all_search_product($search)
	{
		$this->db->select('*');
		$this->db->from('specie_piantina');
		$this->db->like('specie_piantina.nome', $search);
		$this->db->or_like('specie_piantina.stagione', $search);
		$info = $this->db->get();
		return $info->result();
	}

	public function get_product_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('specie_piantina');
		$this->db->where('specie_piantina.cod_specie', $id);
		$info = $this->db->get();
		return $info->row();
	}

	public function save_order_info($data)
	{
		$this->db->insert('ordine', $data);
		return $data['piva'];
	}

}
