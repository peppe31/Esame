<?php

class Web_Model extends CI_Model
{

	public function save_customer_info($data)
	{
		$this->db->insert('credenziali_cliente', $data);
		return $this->db->insert_id();
	}


	public function get_customer_info($data)
	{
		$this->db->select('*');
		$this->db->from('credenziali_cliente');
		$this->db->where($data);
		$info = $this->db->get();
		return $info->row();
	}


}
