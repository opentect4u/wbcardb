<?php
class Csv_import_model_frnt extends CI_Model

{



	
	function select()
	{
		$this->db->order_by('ARDB_HO', 'DESC');
		$query = $this->db->get('td_frm_frnt_rtn');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('td_frm_frnt_rtn', $data);
	}
}
