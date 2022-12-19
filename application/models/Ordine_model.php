<?php

class Ordine_Model extends CI_Model
{

    public function manage_order_info()
    {
        $this->db->select('*');
        $this->db->from('ordine');
        $result = $this->db->get();
        return $result->result();
    }

    public function order_info_by_id($date,$ora,$piva)
    {
        $this->db->select('*');
        $this->db->from('ordine');
        $this->db->where('data', $date);
        $this->db->where('ora', $ora);
        $this->db->where('piva', $piva);

        $result = $this->db->get();
        return $result->row();
    }

 	public function delete_ordine_info($id)
    {
        $this->db->where('ordine', $id);
        return $this->db->delete('ordine');
    }

    public function save_ordine_info($data)
        {
            return $this->db->insert('ordine', $data);
        }
}
