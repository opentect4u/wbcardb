<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    function get_user_details($ardb_id, $user_id) {
	$this->db->where(array(
	    'br_id' => $ardb_id,
	    'user_status' => 'A'
	));
	if ($_SESSION['user_type'] == 'P') {
	    $this->db->where('user_type', 'U');
	} else {
	    $this->db->where('user_type in("U","P")');
	}

	if ($user_id > 0 || $user_id != '') {
	    $this->db->where('user_id', $user_id);
	}
	$query = $this->db->get('md_users');
	return $query->result();
    }

    function get_user_status($id, $type_id) {
	$count_member = $type_id == 'U' ? 'a.no_of_users' : 'a.no_of_approvers';
	$this->db->select('COUNT(b.user_status) as count, ' . $count_member . ' as count_member');
	$this->db->where(array(
	    'b.br_id' => $id,
	    'b.user_type' => $type_id,
	    'b.user_status' => 'A'
	));
	// $type_id == 'U' ? $this->db->where('b.user_type', $type_id) : $this->db->where('b.user_type in("P", "V")');
	$this->db->join('mm_ardb_ho a', 'b.br_id=a.id');
	$query = $this->db->get('md_users b');
	// echo $this->db->last_query();exit;
	return $query->result();
    }

    public function f_get_particulars($table_name, $select, $where, $flag) {
	if (isset($select)) {
	    $this->db->select($select);
	}
	if (isset($where)) {
	    $this->db->where($where);
	}
	$result = $this->db->get($table_name);
	if ($flag == 1) {
	    return $result->row();
	} else {
	    return $result->result();
	}
    }

    function user_save($data) {
	// echo '<pre>'; var_dump($data);exit;
	$input = array(
	    'user_id' => $data['user_id'],
	    'password' => password_hash($data['pass'], PASSWORD_DEFAULT),
	    'user_type' => $data['user_type_id'],
	    'user_name' => $data['user_name'],
	    'designation' => $data['designation'],
	    'br_id' => $_SESSION['br_id'],
	    'created_by' => $_SESSION['login']->user_id,
	    'created_dt' => date('Y-m-d h:i:s')
	);

	$this->db->insert('md_users', $input);
	return true;
    }

    function deactive_user($data) {
	// echo '<pre>'; var_dump($data);exit;
	$input = array(
	    'user_status' => $data['user_status'],
	    'remarks' => $data['remarks'],
	    'modified_by' => $_SESSION['login']->user_id,
	    'modified_dt' => date('Y-m-d h:i:s')
	);
	$this->db->where(array(
	    'user_id' => $data['user_id'],
	    'br_id' => $data['ardb_id']
	));
	$this->db->update('md_users', $input);
	return true;
    }

}

?>