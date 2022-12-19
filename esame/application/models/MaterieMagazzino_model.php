<?php

class MaterieMagazzino_model extends CI_Model
{

    public function save_materieMagazzino($data)
    {
        return $this->db->insert('materie_magazzino', $data);
    }

    public function getall_materieMagazzino()
    {
        $this->db->select('*');
        $this->db->from('materie_magazzino');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_materieMagazzino_info($id)
    {
        $this->db->select('*');
        $this->db->from('materie_magazzino');
        $this->db->where('cod_prodotto', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_materieMagazzino_info($id)
    {
        $this->db->where('cod_prodotto', $id);
        return $this->db->delete('materie_magazzino');
    }

    public function update_materieMagazzino_info($data, $id)
    {
        $this->db->where('cod_prodotto', $id);
        return $this->db->update('materie_magazzino', $data);
    }

}
