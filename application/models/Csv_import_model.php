<?php
class Csv_import_model extends CI_Model

{
	
	function select()
	{   
		$this->db->where('ardb_id',$this->session->userdata['login']->br_id);
		$this->db->order_by('ARDB_ID', 'DESC');
		$query = $this->db->get('td_fridy_rtn');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('td_fridy_rtn', $data);
	}

	public function f_insert_multiple($table_name, $data_array){

      $this->db->insert_batch($table_name, $data_array);

        return;

  }
}
