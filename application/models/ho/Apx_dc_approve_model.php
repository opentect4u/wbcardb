<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apx_dc_approve_Model extends CI_Model {

    function get_ardb_list() {
	$this->db->select('id,name');
	$this->db->where('id>', '0');
	$this->db->order_by('name');
	$query = $this->db->get('mm_ardb_ho');
	return $query->result();
    }

    function apex_edit($flag, $ardb_id, $memo_no) {
	$sql = '';
	if ($flag > 0) {
	    $sql = 'SELECT b.*,a.sector_code, a.memo_date,c.block_name,p.purpose_name,a.fwd_data, di.inst_sl_no, di.inst_date, di.inst_amt, '
		    . '(b.sanc_amt - (SELECT sum(d.inst_amt) FROM td_apex_self_dis d WHERE b.lso_no=d.lso_no AND a.ardb_id=d.ardb_id GROUP BY a.memo_no)) as remaining_sanc_amt '
		    . 'FROM td_apex_self a '
		    . 'JOIN td_apex_self_dtls b ON a.pronote_no=b.pronote_no AND a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id '
		    . 'JOIN td_apex_self_dis di ON a.memo_no=di.memo_no AND b.lso_no=di.lso_no AND b.pronote_no=di.pronote_no '
		    . 'JOIN md_block c ON b.block_id=c.block_code '
		    . 'JOIN md_purpose p ON b.purpose_code=p.purpose_code '
		    . 'WHERE a.ardb_id=' . $ardb_id . ' AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"';
	} else {
	    $sql = 'SELECT a.ardb_id,a.memo_date, a.memo_no, a.pronote_no, b.lso_no,a.sector_code, a.memo_date,c.block_name,p.purpose_name,a.fwd_data, b.entry_date,b.group, b.file_no, b.name_of_group, b.tot_member, b.moratorium_period, b.repayment_no, b.repay_per_tot, b.roi, b.pro_cost, b.own_cont, b.corp_fund, b.sanc_amt, b.tot_depo_rais, b.inter_ag_bo_dt, b.inter_ag_bo_no, di.inst_sl_no, di.inst_date, di.inst_amt, '
		    . '(b.sanc_amt - (SELECT sum(d.inst_amt) FROM td_apex_shg_dis d WHERE b.lso_no=d.lso_no AND a.ardb_id=d.ardb_id GROUP BY a.memo_no)) as remaining_sanc_amt '
		    . 'FROM td_apex_shg a '
		    . 'JOIN td_apex_shg_dtls b on a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id AND a.pronote_no=b.pronote_no '
		    . 'JOIN td_apex_shg_dis di ON a.memo_no=di.memo_no AND b.lso_no=di.lso_no AND b.pronote_no=di.pronote_no '
		    . 'JOIN md_block c ON b.block_id=c.block_code '
		    . 'JOIN md_purpose p ON b.purpose_code=p.purpose_code '
		    . 'WHERE a.ardb_id=' . $ardb_id . ' AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ';
	}
	$data = $this->db->query($sql);
//        echo $this->db->last_query();
//        exit;
	return $data->result_array();
    }

    function borrower_details($flag, $ardb_id, $memo_no) {
	$db = $flag > 0 ? 'td_apex_self_borrower' : 'td_apex_shg_borrower';
	$this->db->where('ardb_id= ' . $ardb_id . ' AND replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ');
//        $this->db->where($where);
	$query = $this->db->get($db);
//        echo $this->db->last_query();
//        exit;
	return $query->result();
    }

    function approve_view($ardb_id, $memo_no) {
	$where = $memo_no != '' || $memo_no > 0 ? 'AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : "";
	$fwd_data = $_SESSION['user_type'] == 'P' ? 'a.approve_1' : ($_SESSION['user_type'] == 'V' ? 'a.approve_2' : 'a.fwd_data');
	$this->db->select('a.*, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status, b.sector_name');
	$this->db->where('a.ardb_id=' . $ardb_id . ' ' . $where);
	if ($_SESSION['user_type'] == 'P') {
	    $this->db->where('a.fwd_data', 'Y');
	} elseif ($_SESSION['user_type'] == 'V') {
	    $this->db->where(array('a.fwd_data' => 'Y', 'a.approve_1' => 'Y'));
	}
	$this->db->join('md_sector b', 'a.sector_code=b.sector_code');
	$this->db->group_by('a.memo_no, a.sector_code, a.memo_date, a.pronote_no,a.lso_no');
	$query = $this->db->get('td_apex_self a');
//        echo $this->db->last_query();
//        exit;
	return $query->result();
    }

    function get_shg_details($flag, $ardb_id, $memo_no) {
	$db_name = $flag > 0 ? 'td_apex_self' : 'td_apex_shg';
	$this->db->select('ardb_id, memo_date, memo_no');
	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'fwd_data' => 'Y',
	    'approve_1' => 'Y',
	    'approve_2' => 'Y',
	    'document_flag' => 0
	));
	if ($memo_no > 0 || $memo_no != '') {
	    $this->db->where('replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=', $memo_no);
	}
	$this->db->group_by('memo_no, memo_date');
	$query = $this->db->get($db_name);
	return $query->result();
    }

    function save($data) {
	$db_name = $data['flag'] > 0 ? 'td_apex_self' : 'td_apex_shg';
	foreach ($data['pronote_recept_sanc'] as $k => $v) {
//            echo $v . '<br>';
	    $input = array();
	    if ($data['flag'] > 0) {
		$input = array(
		    'pronote_recept_sanc' => $v,
		    'document_flag' => 1,
		    'received_by' => $_SESSION['login']->user_id,
		    'received_date' => date('Y-m-d'),
		    'remarks' => $data['remarks']
		);
	    } else {
		$input = array(
		    'pronote_recept_sanc' => $v,
		    'document_flag' => 1,
		    'received_by' => $_SESSION['login']->user_id,
		    'received_date' => date('Y-m-d'),
		    'remarks' => $data['remarks']
		);
	    }
	    $this->db->where(array(
		'ardb_id' => $data['ardb_id'],
		'memo_no' => $data['memo_no'],
		'pronote_no' => $k
	    ));
	    $this->db->update($db_name, $input);
//	    echo $this->db->last_query();
//	    exit;
	}
	foreach ($data['inter_ag_recept_sanc'] as $k => $v) {
//            echo $v . '<br>';
	    $input = array();
	    if ($data['flag'] > 0) {
		$input = array(
		    'bond_recept_sanc' => $v,
		    'document_flag' => 1,
		    'received_by' => $_SESSION['login']->user_id,
		    'received_date' => date('Y-m-d'),
		    'remarks' => $data['remarks']
		);
	    } else {
		$input = array(
		    'inter_ag_recept_sanc' => $v,
		    'document_flag' => 1,
		    'received_by' => $_SESSION['login']->user_id,
		    'received_date' => date('Y-m-d'),
		    'remarks' => $data['remarks']
		);
	    }
	    $this->db->where(array(
		'ardb_id' => $data['ardb_id'],
		'memo_no' => $data['memo_no'],
		'pronote_no' => $k
	    ));
	    $this->db->update($db_name, $input);
	}

//        echo $this->db->last_query();
//        exit;
	return true;
    }

}

?>