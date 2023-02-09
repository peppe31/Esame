<?php

class Serra_model extends CI_Model
{

    public function save_serra($data)
    {
        return $this->db->insert('serra', $data);
    }

    public function getall_serra()
    {
        $this->db->select('*');
        $this->db->from('serra');
        $info = $this->db->get();
        return $info->result();
    }

	public function get_capienza()
	{
		$this->db->select_sum('capienza');
		$this->db->from('serra');
		$query = $this->db->get();
		return $query->row()->capienza;;
	}

    public function edit_serra_info($id)
    {
        $this->db->select('*');
        $this->db->from('serra');
        $this->db->where('cod_serra', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_serra_info($id)
    {
        $this->db->where('cod_serra', $id);
        return $this->db->delete('serra');
    }

    public function update_serra_info($data, $id)
    {
        $this->db->where('cod_serra', $id);
        return $this->db->update('serra', $data);
    }



}
