<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apex_self_Model extends CI_Model {

    function get_ardb_list() {
	$this->db->select('id,name');
	$this->db->where('id>', '0');
	$this->db->order_by('name');
	$query = $this->db->get('mm_ardb_ho');
	return $query->result();
    }

    function get_block_list($ardb_id) {
	$this->db->select('b.block_code, b.block_name');
	$this->db->where('ardb.id', $ardb_id);
	$this->db->join('mm_ardb_ho ardb', 'b.district_code=ardb.dist');
	$this->db->group_by('b.block_code, b.block_name');
	$query = $this->db->get('md_block b');
	//echo $this->db->last_query();exit;
	return $query->result();
    }

    function get_purpose_list() {
	$this->db->select('purpose_code, purpose_name');
	$query = $this->db->get('md_purpose');
	return $query->result();
    }

    function get_sector_list() {
	$this->db->where_not_in('sector_code', '23');
	$query = $this->db->get('md_sector');
	return $query->result();
    }

    function get_shg_details($ardb_id) {
	$this->db->select('a.ardb_id, a.sector_code, c.sector_name, a.memo_no, a.memo_date, a.pronote_no, a.ho_fwd_data as fwd_data');
	$this->db->where(array(
	    'a.ardb_id' => $ardb_id,
	    'a.fwd_data' => 'Y',
	    'a.approve_1' => 'Y',
	    'a.approve_2' => 'Y',
	    'a.pronote_recept_sanc' => 1,
	    'a.bond_recept_sanc' => 1,
	    'a.document_flag' => 1
	));
	$this->db->join('td_apex_self_dtls b', 'a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id AND a.pronote_no=b.pronote_no');
	$this->db->join('md_sector c', 'a.sector_code=c.sector_code');
	$this->db->group_by('a.memo_no, a.pronote_no, a.sector_code,a.memo_date, a.ho_fwd_data');
	$this->db->order_by('a.memo_date');
	$query = $this->db->get('td_apex_self a');
//	echo '<pre>' . $this->db->last_query();
//	exit;
	return $query->result();
    }

    function apex_edit($ardb_id, $memo_no, $pronote_no) {
	$where = $pronote_no != '' || $pronote_no > 0 ? 'AND replace(replace(replace(a.pronote_no, " ", ""), "/", ""), "-", "")="' . $pronote_no . '"' : "";
	$sql = 'SELECT b.*,a.sector_code, a.memo_date,c.block_name,p.purpose_name,a.ho_fwd_data as fwd_data, di.inst_sl_no, di.inst_date, di.inst_amt, '
		. '(b.sanc_amt - (SELECT sum(d.inst_amt) FROM td_apex_self_dis d WHERE b.lso_no=d.lso_no AND a.ardb_id=d.ardb_id GROUP BY a.memo_no)) as remaining_sanc_amt '
		. 'FROM td_apex_self a '
		. 'JOIN td_apex_self_dtls b ON a.pronote_no=b.pronote_no AND a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id '
		. 'JOIN td_apex_self_dis di ON a.memo_no=di.memo_no AND b.lso_no=di.lso_no AND b.pronote_no=di.pronote_no '
		. 'JOIN md_block c ON b.block_id=c.block_code '
		. 'JOIN md_purpose p ON b.purpose_code=p.purpose_code '
		. 'WHERE a.ardb_id=' . $ardb_id . ' AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ' . $where;
	$data = $this->db->query($sql);
//	echo $this->db->last_query();
//	exit;
	return $data->result_array();
    }

    function borrower_details($ardb_id, $memo_no, $pronote_no) {
	$where = $pronote_no != '' || $pronote_no > 0 ? 'AND replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")="' . $pronote_no . '"' : "";
	$this->db->where('ardb_id= ' . $ardb_id . ' AND replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ' . $where);
//        $this->db->where($where);
	$query = $this->db->get('td_apex_self_borrower');
//        echo $this->db->last_query();
//        exit;
	return $query->result();
    }

    function apex_self_save($data) {
//        echo '<pre>';
//        var_dump($data);
//        exit;
	if ($data['id'] > 0) {
	    for ($i = 0; $i < count($data['lso_no']); $i++) {
		// td_apex_shg_dtls
//                $dtls_input = array(
//                    'group' => $data['group'][$i]
//                );
//                $this->db->where(array(
//                    'ardb_id' => $data['ardb_id'],
//                    'memo_no' => $data['memo_no'],
//                    'pronote_no' => $data['pronote_no'][0],
//                    'lso_no' => $data['lso_no'][$i],
//                ));
//                $this->db->update('td_apex_self_dtls', $dtls_input);
		//td_apex_shg_dis
		$dis_input = array(
		    'inst_sl_no' => $data['inst_sl_no'][$i],
		    'inst_date' => $data['inst_date'][$i],
		    'inst_amt' => $data['inst_amt'][$i]
		);
		$this->db->where(array(
		    'ardb_id' => $data['ardb_id'],
		    'memo_no' => $data['memo_no'],
		    'pronote_no' => $data['pronote_no'],
		    'lso_no' => $data['lso_no'][$i],
		));
		$this->db->update('td_apex_self_dis', $dis_input);
	    }
	    // td_apex_shg_borrower
	    $borrower_input = array(
		'tot_memb' => $data['tot_memb'],
		'tot_borrower' => $data['tot_borrower'],
		'tot_male' => $data['tot_male'],
		'tot_female' => $data['tot_female'],
		'tot_sc' => $data['tot_sc'],
		'tot_st' => $data['tot_st'],
		'tot_obca' => $data['tot_obca'],
		'tot_obcb' => $data['tot_obcb'],
		'tot_gen' => $data['tot_gen'],
		'tot_other' => $data['tot_other'],
		'tot_count' => $data['tot_count'],
		'tot_big' => $data['tot_big'],
		'tot_marginal' => $data['tot_marginal'],
		'tot_landless' => $data['tot_landless'],
		'tot_hig' => $data['tot_hig']
	    );
	    $this->db->where(array(
		'ardb_id' => $data['ardb_id'],
		'memo_no' => $data['memo_no']
	    ));
	    $this->db->update('td_apex_self_borrower', $borrower_input);
	}
//        exit;
	return true;
    }

    function dc_delete($ardb_id, $pronote_no, $memo_no) {
	$where = array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	);
	$this->db->where($where);
	$this->db->delete('td_dc_shg_dtls');

	$this->db->where($where);
	$this->db->delete('td_dc_shg');
	return true;
	// echo $this->db->last_query();exit;
    }

    function dc_file_upload_save($ardb_id, $data, $file_data) {
	// var_dump($data);exit;
	// var_dump($file_data['file_name']);
	$input = array(
	    'ardb_id' => $ardb_id,
	    'entry_date' => date('Y-m-d'),
	    'memo_no' => $data['memo_no'],
	    'pronote_no' => $data['pronote_no'],
	    'file_name' => $file_data['file_name'],
	    'file_path' => $file_data['full_path'],
	    'created_by' => date('Y-m-d'),
	    'modified_by' => date('Y-m-d')
	);
	$this->db->insert('td_dc_shg_upload', $input);
	return true;
    }

    function get_file_details($ardb_id, $memo_no) {
	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$query = $this->db->get('td_dc_shg_upload');
	// echo $this->db->last_query();exit;
	return $query->result();
    }

    function get_borrower_details_view($ardb_id) {
	$this->db->where('ardb_id', $ardb_id);
	$query = $this->db->get('td_dc_shg_borrower');
	return $query->result();
    }

    function get_borrower_details_edit($pronote_no, $memo_no) {
	$this->db->where(array(
	    'replace(replace(replace(bo.pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
	    'replace(replace(replace(bo.memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$query = $this->db->get('td_dc_shg_borrower bo');
	// echo $this->db->last_query();exit;
	return $query->result();
    }

    function get_dc_details($memo_no, $pronote_no) {
	$this->db->select('COUNT(dt.sl_no) as tot_shg, sum(dt.tot_memb) as tot_mem, shg.entry_date as memo_date, shg.pronote_date, p.purpose_name');
	$this->db->where(array(
	    'replace(replace(replace(dt.pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
	    'replace(replace(replace(dt.memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$this->db->join('td_dc_shg shg', 'dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no');
	$this->db->join('md_purpose p', 'shg.purpose_code=p.purpose_code');
	$this->db->group_by('dt.memo_no, dt.pronote_no, dt.ardb_id, shg.entry_date, shg.pronote_date');
	$this->db->having('COUNT(dt.sl_no) > 0');
	$this->db->order_by('dt.memo_no, dt.pronote_no, dt.ardb_id, shg.entry_date, shg.pronote_date');
	$query = $this->db->get('td_dc_shg_dtls dt');
	//echo $this->db->last_query();die();
	return $query->result();
    }

    function get_borrower_details($ardb_id) {
	$this->db->select('bo.*');
	$this->db->where(array(
	    'bo.ardb_id' => $ardb_id
	));
	$this->db->join('td_dc_shg_borrower bo', 'shg.memo_no=bo.memo_no AND shg.pronote_no=bo.pronote_no');
	$this->db->group_by('bo.memo_no, bo.pronote_no, bo.entry_date');
	$this->db->order_by('bo.memo_no, bo.pronote_no, bo.entry_date');
	$query = $this->db->get('td_dc_shg shg');
	return $query->result();
    }

    function get_memo_no_details($ardb_id) {
	$this->db->select('memo_no');
	$this->db->where('ardb_id', $ardb_id);
	$query = $this->db->get('td_dc_shg');
	return $query->result();
    }

    function get_pronote_details($ardb_id, $memo_no) {
	$this->db->select('pronote_no');
	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$query = $this->db->get('td_dc_shg');
	return $query->result();
    }

    function get_shg_names($ardb_id, $memo_no, $pronote_no) {
	$this->db->select('shg_name');
	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no,
	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no
	));
	$query = $this->db->get('td_dc_shg_dtls');
	return $query->result();
    }

    // FORWARD

    function check_approve_status($ardb_id) {
	$sql = 'SELECT DISTINCT shg.memo_no, shg.fwd_data, sum(IF(shg.fwd_data = "Y", "1", "0")) as status FROM td_dc_shg shg WHERE replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY shg.memo_no, shg.entry_date';
	$data = $this->db->query($sql);
	return $data->result();
    }

    function approve_view($ardb_id, $memo_no) {
//	var_dump($_SESSION['user_type']);
	$memo = $memo_no != '' ? 'AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : '';
	$fwd_data = $_SESSION['user_type'] == 'P' ? 'a.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'a.ho_approve_2' : 'a.ho_fwd_data');
	$where = '';
	if ($_SESSION['user_type'] == 'P') {
	    $where = 'AND a.ho_fwd_data="Y"';
	} elseif ($_SESSION['user_type'] == 'V') {
	    $where = 'AND a.ho_fwd_data="Y" AND a.ho_approve_1="Y"';
	} elseif ($_SESSION['user_type'] == 'U') {
	    $where = 'AND a.fwd_data="Y" AND a.approve_1="Y" AND a.approve_2="Y"';
	}
//	echo '<br>' . $where;
	$this->db->select('a.ardb_id, a.memo_no, a.memo_date, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status, b.sector_name');
	$this->db->where('a.ardb_id=' . $ardb_id . ' ' . $memo . ' ' . $where);
	$this->db->where(array(
	    'a.pronote_recept_sanc' => 1,
	    'a.bond_recept_sanc' => 1,
	    'a.document_flag' => 1
	));
	$this->db->join('md_sector b', 'a.sector_code=b.sector_code');
	$this->db->group_by('a.memo_no,a.memo_date, b.sector_name');
	$query = $this->db->get('td_apex_self a');
//	echo '<br>' . $this->db->last_query();
//	exit;
	return $query->result();
//        $sql = 'SELECT DISTINCT shg.ardb_id, shg.memo_no, s.sector_name, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status FROM td_dc_shg shg '
//                . 'join td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no AND shg.pronote_no=dt.pronote_no '
//                . 'JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no AND shg.pronote_no=b.pronote_no '
//                . 'JOIN md_sector s ON shg.sector_code=s.sector_code '
//                . 'WHERE a.ardb_id=' . $ardb_id . ' ' . $memo . ' ' . $where . ' AND
//                shg.document_flag=1 GROUP BY shg.memo_no, s.sector_name';
//        $data = $this->db->query($sql);
////	echo '<br>' . $this->db->last_query();
////	exit;
//        return $data->result();
    }

    function get_approve_shg_details($ardb_id, $memo_no) {
	$sql = 'SELECT `shg`.`pronote_no`, `shg`.`pronote_date`, `p`.`purpose_name`, `shg`.`moratorium_period`, `shg`.`repayment_no`, `dt`.`shg_name`, `dt`.`tot_memb`, `dt`.`shg_addr`, `b`.`block_name`, `dt`.`roi`, `dt`.`bod_sanc_dt`, `dt`.`due_dt`, `dt`.`brrwr_sl_no`, `dt`.`project_cost`, `dt`.`sanc_amt`, `dt`.`tot_own_amt`, `dt`.`disb_amt`, `dt`.`intr_aggr_dt`, `dt`.`total_Intr_ag_bond` FROM td_dc_shg_dtls dt JOIN td_dc_shg shg on dt.ardb_id=shg.ardb_id AND dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no JOIN `md_purpose` `p` ON `shg`.`purpose_code`=`p`.`purpose_code` JOIN `md_block` `b` ON `dt`.`block_code`=`b`.`block_code` WHERE shg.ardb_id = "' . $ardb_id . '" AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "") = "' . $memo_no . '" ORDER BY dt.pronote_no, dt.sl_no';
	$data = $this->db->query($sql);
	return $data->result();
    }

    function get_shg_dc_header($ardb_id, $memo_no) {
	$sql = 'SELECT DISTINCT shg.ardb_id, shg.memo_no, COUNT(shg.pronote_no) as tot_pronote FROM td_dc_shg shg WHERE shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY shg.memo_no, shg.memo_no ORDER by shg.memo_no';
	$data = $this->db->query($sql);
	// echo $this->db->last_query();exit;
	return $data->result();
    }

    function get_borrower_approve_details($ardb_id, $memo_no) {
	$sql = 'SELECT b.* FROM td_dc_shg shg JOIN td_dc_shg_borrower b ON shg.memo_no=b.memo_no AND shg.pronote_no=b.pronote_no AND shg.ardb_id=b.ardb_id WHERE shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ORDER by shg.entry_date, shg.memo_no';
	$data = $this->db->query($sql);
	return $data->result();
    }

    function get_total_shg($ardb_id, $memo_no) {
	$sql = 'SELECT shg.memo_no, shg.pronote_date, shg.pronote_no, SUM(dt.tot_memb) as tot_memb, SUM(dt.project_cost) as tot_p_cost, sum(dt.sanc_amt) as tot_sanc_amt, SUM(dt.tot_own_amt) as tot_own_amt, sum(dt.disb_amt) as tot_disb_amt, dt.intr_aggr_dt, sum(dt.total_Intr_ag_bond) as tot_igb FROM td_dc_shg_dtls dt JOIN td_dc_shg shg ON dt.ardb_id=shg.ardb_id AND dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no WHERE shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY dt.memo_no, dt.pronote_no, shg.pronote_date, dt.intr_aggr_dt';
	$data = $this->db->query($sql);
	// echo $this->db->last_query();exit;
	return $data->result();
    }

    function forward_data($ardb_id, $memo_no) {
	$user_type = $_SESSION['user_type'];
	$input = array();
	if ($user_type == 'U') {
	    $input = array(
		'ho_fwd_data' => 'Y',
		'ho_fwd_by' => $_SESSION['login']->user_id,
		'ho_fwd_at' => date('Y-m-d h:i:s')
	    );
	} elseif ($user_type == 'P') {
	    $input = array(
		'ho_approve_1' => 'Y',
		'ho_app1_by' => $_SESSION['login']->user_id,
		'ho_app1_at' => date('Y-m-d h:i:s')
	    );
	} elseif ($user_type == 'V') {
	    $input = array(
		'ho_approve_2' => 'Y',
		'ho_app2_by' => $_SESSION['login']->user_id,
		'ho_app2_at' => date('Y-m-d h:i:s')
	    );
	}

	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$this->db->update('td_apex_self', $input);
//        echo $this->db->last_query();
//        exit;
	return true;
    }

    function reject_data($ardb_id, $memo_no) {
	$user_type = $_SESSION['user_type'];
	$input = array();
	if ($user_type == 'U') {
	    $input = array(
		'fwd_data' => 'R',
		'fwd_at' => '',
		'fwd_by' => '',
		'approve_1' => 'N',
		'app1_by' => '',
		'app1_at' => '',
		'approve_2' => 'N',
		'app2_by' => '',
		'app2_at' => '',
		'ho_fwd_data' => 'N',
		'ho_fwd_at' => '',
		'ho_fwd_by' => '',
		'ho_approve_1' => 'N',
		'ho_app1_by' => '',
		'ho_app1_at' => ''
	    );
	} elseif ($user_type == 'P') {
	    $input = array(
		'fwd_data' => 'R',
		'fwd_at' => '',
		'fwd_by' => '',
		'approve_1' => 'N',
		'app1_by' => '',
		'app1_at' => '',
		'approve_2' => 'N',
		'app2_by' => '',
		'app2_at' => '',
		'ho_fwd_data' => 'N',
		'ho_fwd_at' => '',
		'ho_fwd_by' => '',
		'ho_approve_1' => 'N',
		'ho_app1_by' => '',
		'ho_app1_at' => ''
	    );
	} elseif ($user_type == 'V') {
	    $input = array(
		'fwd_data' => 'R',
		'fwd_at' => '',
		'fwd_by' => '',
		'approve_1' => 'N',
		'app1_by' => '',
		'app1_at' => '',
		'approve_2' => 'N',
		'app2_by' => '',
		'app2_at' => '',
		'document_flag' => 0,
		'ho_fwd_data' => 'N',
		'ho_fwd_at' => '',
		'ho_fwd_by' => '',
		'ho_approve_1' => 'N',
		'ho_app1_by' => '',
		'ho_app1_at' => '',
		'ho_approve_2' => 'N',
		'ho_app2_by' => '',
		'ho_app2_at' => ''
	    );
	}

	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$this->db->update('td_apex_self', $input);
	//echo $this->db->last_query();exit;
	return true;
    }

    function get_csv_details($ardb_id, $memo_no) {
	$this->load->dbutil();
	$sql = 'SELECT a.ardb_id, a.sector_code, a.memo_no, DATE_FORMAT(STR_TO_DATE(a.memo_date,"%Y-%m-%d"), "%d/%m/%Y")memo_date, a.pronote_no, a.lso_no, b.file_no, b.block_id, '
		. 'replace(b.name_of_borr, " ", "-") name_of_borr, b.moratorium, b.loan, b.repay_per_tot, b.purpose_code, b.roi, b.pro_cost, b.own_cont, '
		. 'b.corp_fund, b.sanc_amt, b.lnd_off_sec, b.cult_area, b.val_of_hypo, b.gros_inc_gen, DATE_FORMAT(STR_TO_DATE(b.reg_m_bond_dt,"%Y-%m-%d"), "%d/%m/%Y")reg_m_bond_dt, '
		. 'b.reg_m_bond_no, c.tot_memb, c.tot_borrower, c.tot_male, c.tot_female, c.tot_sc, c.tot_st, c.tot_obca, '
		. 'c.tot_obcb, c.tot_gen, c.tot_other, c.tot_count, c.tot_big, c.tot_small, c.tot_marginal, c.tot_landless, '
		. 'c.tot_lig, c.tot_mig, c.tot_hig, d.inst_sl_no, DATE_FORMAT(STR_TO_DATE(d.inst_date,"%Y-%m-%d"), "%d/%m/%Y")inst_date, d.inst_amt '
		. 'FROM td_apex_self a '
		. 'JOIN td_apex_self_dtls b ON a.ardb_id=b.ardb_id AND a.memo_no=b.memo_no AND a.pronote_no=b.pronote_no '
		. 'JOIN td_apex_self_borrower c ON a.ardb_id=c.ardb_id AND a.memo_no=c.memo_no AND a.pronote_no=c.pronote_no '
		. 'JOIN td_apex_self_dis d ON a.ardb_id=d.ardb_id AND a.memo_no=d.memo_no AND a.pronote_no=d.pronote_no '
		. 'where a.ardb_id= ' . $ardb_id . ' AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"';
	$query = $this->db->query($sql);
	$delimiter = "|";
	$newline = "\r\n";
	$enclosure = '';
	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
	return $data;
    }

    function get_ardb_name($ardb_id) {
	$this->db->where('id', $ardb_id);
	$query = $this->db->get('mm_ardb_ho');
	return $query->result();
    }

}

?>