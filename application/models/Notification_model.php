<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_Model extends CI_Model {

    function get_block_list($district_id) {
	$this->db->select('block_code, block_name');
	$this->db->where('district_code', $district_id);
	$query = $this->db->get('md_block');
	// echo $this->db->last_query();exit;
	return $query->result();
    }

    function get_dc_reject_status($br_id) {
	$rej_noti = array();
	// td_dc_shg
	$this->db->select('SUM(IF(fwd_data = "R", 1, 0)) AS count_dc');
	$this->db->where('ardb_id', $br_id);
	$this->db->group_by('ardb_id');
	$shg_queru = $this->db->get('td_dc_shg');
//	var_dump($shg_queru->row());
//	exit;
	if ($shg_queru->row() != '' || $shg_queru->row() > 0) {
	    $rej_noti['dc_shg'] = $shg_queru->row()->count_dc;
	} else {
	    $rej_noti['dc_shg'] = 0;
	}
	// td_dc_self
	$this->db->select('SUM(IF(fwd_data = "R", 1, 0)) AS count_dc');
	$this->db->where('ardb_id', $br_id);
	$this->db->group_by('ardb_id');
	$other_queru = $this->db->get('td_dc_self');
	if ($other_queru->row() != '' || $other_queru->row() > 0) {
	    $rej_noti['dc_self'] = $other_queru->row()->count_dc;
	} else {
	    $rej_noti['dc_self'] = 0;
	}

	// td_apex_shg
	$this->db->select('SUM(IF(fwd_data = "R", 1, 0)) AS count_dc');
	$this->db->where('ardb_id', $br_id);
	$this->db->group_by('ardb_id');
	$apex_shg_queru = $this->db->get('td_apex_shg');
	if ($apex_shg_queru->row() != '' || $apex_shg_queru->row() > 0) {
	    $rej_noti['apex_dc_shg'] = $apex_shg_queru->row()->count_dc;
	} else {
	    $rej_noti['apex_dc_shg'] = 0;
	}

	// td_apex_self
	$this->db->select('SUM(IF(fwd_data = "R", 1, 0)) AS count_dc');
	$this->db->where('ardb_id', $br_id);
	$this->db->group_by('ardb_id');
	$apex_self_queru = $this->db->get('td_apex_self');
	if ($apex_self_queru->row() != '' || $apex_self_queru->row() > 0) {
	    $rej_noti['apex_dc_self'] = $apex_self_queru->row()->count_dc;
	} else {
	    $rej_noti['apex_dc_self'] = 0;
	}


	//var_dump(rej_noti);exit;

	return $rej_noti;
    }

}

?>