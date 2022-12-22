<?php

class SpeciePiantina_model extends CI_Model
{

    public function save_product_info($data)
    {
        return $this->db->insert('specie_piantina', $data);
    }

    public function get_all_product()
    {
        $this->db->select('*');
        $this->db->from('specie_piantina');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_product_info($id)
    {
        $this->db->select('*');
        $this->db->from('specie_piantina');
        $this->db->where('specie_piantina.cod_specie', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_product_info($id)
    {
        $this->db->where('cod_specie', $id);
        return $this->db->delete('specie_piantina');
    }

    public function update_product_info($data, $id)
    {
        $this->db->where('cod_specie', $id);
        return $this->db->update('specie_piantina', $data);
    }

    public function get_all_specie_stagione($data)
    {
        $this->db->select('*');
        $this->db->from('specie_piantina');
        $this->db->where('stagione', $data);
        $info = $this->db->get();
        return $info->result();
    }

	public function get_single_specie($id)
	{
		$this->db->select('*');
		$this->db->from('specie_piantina');
		$this->db->where('specie_piantina.cod_specie', $id);
		$info = $this->db->get();
		return $info->row();
	}



}
