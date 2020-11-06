<?php
class Csv_import_model extends CI_Model

{



	
	function select()
	{
		$this->db->order_by('ARDB_ID', 'DESC');
		$query = $this->db->get('td_fridy_rtn');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('td_fridy_rtn', $data);
	}
}
