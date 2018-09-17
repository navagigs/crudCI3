<?php

class M_data extends CI_model
{
	function viewdata()
	{
		return $this->db->get('m_lokasi_kerja');
	}

	function add_data($data)
	{
		$this->db->insert('m_lokasi_kerja', $data);
	}

	function delete_data($where)
	{
		$this->db->delete('m_lokasi_kerja', $where);
	}

 	function edit_data($lokasi_kerja_id) {
        return $this->db->get_where('m_lokasi_kerja', array('lokasi_kerja_id' => $lokasi_kerja_id))->row();
    }

    function update_data($where, $data)
    {
    	$this->db->update('m_lokasi_kerja',$data,$where);
    }


	function viewdata_unit()
	{

		return $this->db->get('m_unit_kerja');
	}

	function add_data_unit($data)
	{
		$this->db->insert('m_unit_kerja', $data);
	}

	function delete_data_unit($where)
	{
		$this->db->delete('m_unit_kerja', $where);
	}

 	function edit_data_unit($unit_kerja_id) {
        return $this->db->get_where('m_unit_kerja', array('unit_kerja_id' => $unit_kerja_id))->row();
    }

    function update_data_unit($where, $data)
    {
    	$this->db->update('m_unit_kerja',$data,$where);
    }
	
	  public function count_all_unit($where="", $like=""){
        $this->db->select("*");
        $this->db->from("m_unit_kerja");		
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
}