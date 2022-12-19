<?php

class Impiegato_model extends CI_Model
{

    public function save_impiegato_info($data)
    {
        return $this->db->insert('impiegato', $data);
    }

    public function get_all_impiegato()
    {
        $this->db->select('*');
        $this->db->from('impiegato');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_impiegato_info($id)
    {
        $this->db->select('*');
        $this->db->from('impiegato');
        $this->db->where('impiegato.cod_impiegato', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_impiegato_info($id)
    {
        $this->db->where('impiegato', $id);
        return $this->db->delete('impiegato');
    }

    public function update_impiegato_info($data, $id)
    {
        $this->db->where('impiegato', $id);
        return $this->db->update('impiegato', $data);
    }



}
