<?php

class Cliente_model extends CI_Model
{

    public function save_cliente_info($data)
    {
        return $this->db->insert('cliente', $data);
    }

    public function get_all_cliente()
    {
        $this->db->select('*');
        $this->db->from('cliente');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_cliente_info($id)
    {
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('cliente.piva', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_cliente_info($id)
    {
        $this->db->where('cliente', $id);
        return $this->db->delete('cliente');
    }

    public function update_cliente_info($data, $id)
    {
        $this->db->where('cliente', $id);
        return $this->db->update('cliente', $data);
    }



}
