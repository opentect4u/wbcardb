<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model {

    function get_details($id) {
	switch ($id) {
	    case 1:
		return $this->get_shg_dc_details();
		break;
	    case 2:
		return $this->get_self_dc_details();
		break;
	    case 3:
		return $this->get_shg_apex_dc_details();
		break;
	    case 4:
		return $this->get_self_apex_dc_details();
		break;
	    case 5:
		$this->get_friday_return_details();
		break;
	    case 6:
		$this->get_fortnight_details();
		break;
	    default :
		break;
	}
    }

    function get_shg_dc_details() {
	$this->db->select('ardb_id, entry_date, memo_no, fwd_data, approve_1, approve_2');
//	$this->db->where(array(
//	    'fwd_data' => 'Y',
//	    'approve_1' => 'Y',
//	    'approve_2' => 'Y'
//	));
	$this->db->group_by('memo_no, ardb_id, entry_date, fwd_data, approve_1, approve_2');
	$query = $this->db->get('td_dc_shg');
	return $query->result();
    }

    function get_self_dc_details() {
	$this->db->select('ardb_id, entry_date, memo_no, fwd_data, approve_1, approve_2');
//	$this->db->where(array(
//	    'fwd_data' => 'Y',
//	    'approve_1' => 'Y',
//	    'approve_2' => 'Y'
//	));
	$this->db->group_by('memo_no, ardb_id, entry_date, fwd_data, approve_1, approve_2');
	$query = $this->db->get('td_dc_self');
	return $query->result();
    }

    function get_shg_apex_dc_details() {
	$this->db->select('ardb_id, memo_date as entry_date, memo_no, fwd_data, approve_1, approve_2');
//	$this->db->where(array(
//	    'fwd_data' => 'Y',
//	    'approve_1' => 'Y',
//	    'approve_2' => 'Y'
//	));
	$this->db->group_by('memo_no, ardb_id, memo_date, fwd_data, approve_1, approve_2');
	$query = $this->db->get('td_apex_shg');
	return $query->result();
    }

    function get_self_apex_dc_details() {
	$this->db->select('ardb_id, memo_date as entry_date, memo_no, fwd_data, approve_1, approve_2');
//	$this->db->where(array(
//	    'fwd_data' => 'Y',
//	    'approve_1' => 'Y',
//	    'approve_2' => 'Y'
//	));
	$this->db->group_by('memo_no, ardb_id, memo_date, fwd_data, approve_1, approve_2');
	$query = $this->db->get('td_apex_self');
	return $query->result();
    }

    function get_friday_return_details() {
	
    }

    function get_fortnight_details() {
	
    }

}

?>