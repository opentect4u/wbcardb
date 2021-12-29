<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Dc_self_Model extends CI_Model {



    function get_block_list($district_id) {

	$this->db->select('block_code, block_name');

	$this->db->where('district_code', $district_id);

	$query = $this->db->get('md_block');

	// echo $this->db->last_query();exit;

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



    function get_self_details($ardb_id) {

	$this->db->select('s.entry_date as memo_date, s.memo_no, s.letter_no, s.letter_date, s.pronote_no, s.pronote_date, p.purpose_name as purpose, s.moratorium_period, s.repayment_no, COUNT(sl_no) as upload, s.fwd_data, se.sector_name,s.a1_reason,s.a2_reason');

	$this->db->where(array('s.ardb_id' => $ardb_id));

	$this->db->join('md_purpose p', 's.purpose_code=p.purpose_code');

	$this->db->join('md_sector se', 's.sector_code=se.sector_code');

	$this->db->join('td_dc_self_upload u', 's.memo_no=u.memo_no AND s.ardb_id=u.ardb_id AND s.pronote_no=u.pronote_no', 'left');

	$this->db->group_by('s.pronote_no, s.memo_no, s.entry_date');

	$query = $this->db->get('td_dc_self s');

	// echo '<pre>' . $this->db->last_query();exit;

	return $query->result();

    }



    function get_self_details_edit($ardb_id, $pronote_no, $memo_no) {

	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	// $this->db->join('md_sector s', 'dc.sector_code=s.sector_code');

	$query = $this->db->get('td_dc_self');

	// echo $this->db->last_query();exit;

	return $query->result();

    }



    function get_dc_self_dtls_edit($ardb_id, $pronote_no, $memo_no) {

	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$query = $this->db->get('td_dc_self_dtls');

	return $query->result();

    }



    function get_borrower_details_edit($pronote_no, $memo_no) {

	$this->db->where(array(

	    'replace(replace(replace(bo.pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(bo.memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$query = $this->db->get('td_dc_self_borrower bo');

	// echo $this->db->last_query();exit;

	return $query->result();

    }



    function dc_save($data) {

	// echo '<pre>';var_dump($data['rete_of_interest']);exit;

	// td_dc_self

	if ($data['id'] > 0) {

	    $dc_shg_input = array(

		'sector_code' => $data['sector_code'],

		'purpose_code' => $data['purpose'],

		'gender_id' => $data['gender_id'],

		'roi' => $data['rete_of_interest'],

		'moratorium_period' => $data['moral'],

		'repayment_no' => $data['repayment'],

		'letter_no' => '',

		'letter_date' => '',

		'fwd_data' => 'N',

		'created_by' => date('Y-m-d h:i:s'),

		'modified_by' => date('Y-m-d h:i:s')

	    );

	    $this->db->where(array(

		'ardb_id' => $data['ardb_id'],

		'memo_no' => $data['memo_no'],

		'pronote_no' => $data['pronote_no']

	    ));

	    $this->db->update('td_dc_self', $dc_shg_input);

	    // echo $this->db->last_query();exit;

	} else {

	    $dc_shg_input = array(

		'ardb_id' => $data['ardb_id'],

		'entry_date' => $data['date'],

		'memo_no' => $data['memo_no'],

		'sector_code' => $data['sector_code'],

		'pronote_no' => $data['pronote_no'],

		'pronote_date' => $data['pronote_date'],

		'purpose_code' => $data['purpose'],

		'gender_id' => $data['gender_id'],

		'roi' => $data['rete_of_interest'],

		'moratorium_period' => $data['moral'],

		'repayment_no' => $data['repayment'],

		'letter_no' => '',

		'letter_date' => '',

		'created_by' => date('Y-m-d h:i:s'),

		'modified_by' => date('Y-m-d h:i:s')

	    );

	    $this->db->insert('td_dc_self', $dc_shg_input);

	}



	// echo $this->db->last_query();

	// td_dc_self_dtls

	$j = 1;

//	var_dump($data['id']);

//	exit;

	if ($data['id'] > 0) {

	    for ($i = 0; $i < count($data['sanction_date']); $i++) {

		$dc_shg_dtls_input = array(

		    'bod_sanc_dt' => $data['sanction_date'][$i],

		    'due_dt' => '',

		    'brrwr_sl_no' => $data['brrwr_sl_no'][$i],

			'cust_name' => $data['cust_name'][$i],

		    'roi' => $data['rete_of_interest'],

		    'project_cost' => $data['project_cost'][$i],

		    'sanc_block' => $data['sanction_block'][$i],

		    'sanc_working' => $data['sanction_working'][$i],

		    'sanc_total' => $data['sanction_total'][$i],

		    'dis_block' => $data['disbursement_block'][$i],

		    'dis_working' => $data['disbursement_working'][$i],

		    'dis_total' => $data['disbursement_total'][$i],

		    'ibsd' => $data['ibsd'][$i],

		    'net_amount' => $data['net_amount'][$i],

		    'own_cont' => $data['own_contribution'][$i],

		    'sub_received' => $data['subsidy_received'][$i],

		    'sub_receivable' => $data['subsidy_receivable'][$i],

		    'tot_loan_amt' => $data['total_loan_amount'][$i],

		    'lof_mort' => $data['lof_mortgage'][$i],

		    'af_culti' => $data['af_cultivation'][$i],

		    'sec_land' => $data['security_land'][$i],

		    'sec_oth' => $data['security_other'][$i],

		    'sec_tot' => $data['security_total'][$i],

		    'igo_loan' => $data['igo_loan'][$i],

		    'tot_mordg_bond' => $data['tg_bond'][$i],

			'reg_m_bond_no' => $data['reg_m_bond_no'][$i],

			'reg_m_bond_dt' => $data['reg_m_bond_dt'][$i]

		);

		//var_dump($dc_shg_dtls_input);

		$this->db->where(array(

		    'sl_no' => $j,

		    'ardb_id' => $data['ardb_id'],

		    'memo_no' => $data['memo_no'],

		    'pronote_no' => $data['pronote_no']

		));

		$this->db->update('td_dc_self_dtls', $dc_shg_dtls_input);

		$j++;

	    }

	} else {

	    for ($i = 0; $i < count($data['sanction_date']); $i++) {

		$dc_shg_dtls_input = array(

		    'sl_no' => $j,

		    'ardb_id' => $data['ardb_id'],

		    'entry_date' => $data['date'],

		    'memo_no' => $data['memo_no'],

		    'pronote_no' => $data['pronote_no'],

		    'bod_sanc_dt' => $data['sanction_date'][$i],

		    'due_dt' => $data['due_date'][$i],

		    'brrwr_sl_no' => $data['brrwr_sl_no'][$i],

			'cust_name' => $data['cust_name'][$i],

		    'roi' => $data['rete_of_interest'],

		    'project_cost' => $data['project_cost'][$i],

		    'sanc_block' => $data['sanction_block'][$i],

		    'sanc_working' => $data['sanction_working'][$i],

		    'sanc_total' => $data['sanction_total'][$i],

		    'dis_block' => $data['disbursement_block'][$i],

		    'dis_working' => $data['disbursement_working'][$i],

		    'dis_total' => $data['disbursement_total'][$i],

		    'ibsd' => $data['ibsd'][$i],

		    'net_amount' => $data['net_amount'][$i],

		    'own_cont' => $data['own_contribution'][$i],

		    'sub_received' => $data['subsidy_received'][$i],

		    'sub_receivable' => $data['subsidy_receivable'][$i],

		    'tot_loan_amt' => $data['total_loan_amount'][$i],

		    'lof_mort' => $data['lof_mortgage'][$i],

		    'af_culti' => $data['af_cultivation'][$i],

		    'sec_land' => $data['security_land'][$i],

		    'sec_oth' => $data['security_other'][$i],

		    'sec_tot' => $data['security_total'][$i],

		    'igo_loan' => $data['igo_loan'][$i],

		    'tot_mordg_bond' => $data['tg_bond'][$i]

		);

//		echo '<pre>';

//		var_dump($dc_shg_dtls_input);

		$this->db->insert('td_dc_self_dtls', $dc_shg_dtls_input);

		$j++;

	    }

//	    exit;

	}



	// td_dc_self_borrower

	$input = array(

	    'ardb_id' => $data['ardb_id'],

	    'entry_date' => date('Y-m-d'),

	    'memo_no' => $data['memo_no'],

	    'pronote_no' => $data['pronote_no'],

	    'tot_memb' => $data['tot_memb'],

	    'tot_borrower' => $data['tot_borrower'],

	    'tot_male' => $data['tot_men'],

	    'tot_female' => $data['tot_wom'],

	    'tot_sc' => $data['tot_sc'],

	    'tot_st' => $data['tot_st'],

	    'tot_obca' => $data['tot_obca'],

	    'tot_obcb' => $data['tot_obcb'],

	    'tot_gen' => $data['tot_gen'],

	    'tot_other' => $data['tot_oth'],

	    'tot_count' => $data['tot_count'],

	    'tot_big' => $data['tot_big'],

	    'tot_marginal' => $data['tot_marginal'],

	    'tot_small' => $data['tot_small'],

	    'tot_landless' => $data['tot_landless'],

	    'tot_lig' => $data['tot_lig'],

	    'tot_mig' => $data['tot_mig'],

	    'tot_hig' => $data['tot_hig']

	);

	if ($data['id'] > 0) {

	    $this->db->where(array(

		'memo_no' => $data['memo_no'],

		'pronote_no' => $data['pronote_no']

	    ));

	    $this->db->update('td_dc_self_borrower', $input);

	} else {

	    $this->db->insert('td_dc_self_borrower', $input);

	}

	return true;

    }



    function dc_delete($ardb_id, $pronote_no, $memo_no) {

	$where = array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	);

	$this->db->where($where);

	$this->db->delete('td_dc_self_dtls');



	$this->db->where($where);

	$this->db->delete('td_dc_self');



	$this->db->where($where);

	$this->db->delete('td_dc_self_borrower');

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

	$this->db->insert('td_dc_self_upload', $input);

	return true;

    }



    function get_file_details($ardb_id, $memo_no) {

	$this->db->where(array(

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no,

	    'ardb_id' => $ardb_id

	));

	$query = $this->db->get('td_dc_self_upload');

	return $query->result();

    }



    function get_borrower_details_view($ardb_id) {

	$this->db->where('ardb_id', $ardb_id);

	$query = $this->db->get('td_dc_self_borrower');

	return $query->result();

    }



    function get_dc_details($memo_no, $pronote_no) {

	$this->db->select('COUNT(dt.sl_no) as tot_shg, sum(dt.tot_memb) as tot_mem, shg.entry_date as memo_date, shg.pronote_date, p.purpose_name');

	$this->db->where(array(

	    'replace(replace(replace(dt.pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(dt.memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$this->db->join('td_dc_self shg', 'dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no');

	$this->db->join('md_purpose p', 'shg.purpose_code=p.purpose_code');

	$this->db->group_by('dt.memo_no, dt.pronote_no, dt.ardb_id, shg.entry_date, shg.pronote_date');

	$this->db->having('COUNT(dt.sl_no) > 0');

	$this->db->order_by('dt.memo_no, dt.pronote_no, dt.ardb_id, shg.entry_date, shg.pronote_date');

	$query = $this->db->get('td_dc_self_dtls dt');

	//echo $this->db->last_query();die();

	return $query->result();

    }



    function get_borrower_details($ardb_id) {

	$this->db->select('bo.*');

	$this->db->where(array(

	    'bo.ardb_id' => $ardb_id

	));

	$this->db->join('td_dc_self_borrower bo', 'shg.memo_no=bo.memo_no AND shg.pronote_no=bo.pronote_no');

	$this->db->group_by('bo.memo_no, bo.pronote_no, bo.entry_date');

	$this->db->order_by('bo.memo_no, bo.pronote_no, bo.entry_date');

	$query = $this->db->get('td_dc_self shg');

	return $query->result();

    }



    function get_memo_no_details($ardb_id) {

	$this->db->distinct();

	$this->db->select('memo_no');

	$this->db->where('ardb_id', $ardb_id);

	$query = $this->db->get('td_dc_self');

	return $query->result();

    }



    function get_pronote_details($ardb_id, $memo_no) {

	$this->db->select('pronote_no');

	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$query = $this->db->get('td_dc_self');

	return $query->result();

    }



    // APPROVE



    function check_approve_status($ardb_id) {

	$sql = 'SELECT DISTINCT shg.memo_no, shg.fwd_data, sum(IF(shg.fwd_data = "Y", "1", "0")) as status FROM td_dc_self shg WHERE replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY shg.memo_no';

	$data = $this->db->query($sql);

	return $data->result();

    }



    function approve_view($ardb_id, $memo_no) {

	$memo = $memo_no != '' ? 'AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : '';

	$fwd_data = $_SESSION['user_type'] == 'P' ? 'shg.approve_1' : ($_SESSION['user_type'] == 'V' ? 'shg.approve_2' : 'shg.fwd_data');

	if ($_SESSION['user_type'] == 'P') {

	    $where = 'AND shg.fwd_data="Y"';

	} elseif ($_SESSION['user_type'] == 'V') {

	    $where = 'AND shg.fwd_data="Y" AND shg.approve_1="Y"';

	} else {

	    $where = '';

	}

	$sql = 'SELECT DISTINCT shg.memo_no, s.sector_name, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status '

		. 'FROM td_dc_self shg '

		. 'JOIN td_dc_self_dtls dt on shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no AND shg.pronote_no=dt.pronote_no '

		. 'JOIN td_dc_self_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no AND shg.pronote_no=b.pronote_no '

		. 'JOIN md_sector s ON shg.sector_code=s.sector_code '

		. 'WHERE shg.ardb_id=' . $ardb_id . ' ' . $memo . ' ' . $where . ' GROUP BY shg.memo_no, s.sector_name';

	$data = $this->db->query($sql);

	// echo $this->db->last_query();exit;

	return $data->result();

    }

	function chk_file($ardb_id, $memo_no) {
		$memo = $memo_no != '' ? 'AND ="' . $memo_no . '"' : '';
		$this->db->select('sl_no, ardb_id');
		$this->db->where(array(
			'ardb_id' => $ardb_id,
			'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
		));
		$query = $this->db->get('td_dc_self_upload');
		if($query->num_rows() > 0) {
			return 1;
		}else{
			return 0;
		}
	}



    function get_approve_shg_details($ardb_id, $memo_no) {

	$sql = 'SELECT s.pronote_no, s.pronote_date, p.purpose_name, s.moratorium_period, s.repayment_no, s.moratorium_period, '

		. 's.repayment_no, dt.bod_sanc_dt, dt.due_dt, dt.cust_name,dt.reg_m_bond_dt,dt.reg_m_bond_no, dt.brrwr_sl_no, dt.roi,FLOOR( dt.project_cost) as project_cost, '

		. 'FLOOR(dt.sanc_block) as sanc_block_id, FLOOR(dt.sanc_working) as sanc_working, FLOOR(dt.sanc_total) as sanc_total, FLOOR(dt.dis_block) as dis_block_id, FLOOR(dt.dis_working) as dis_working, '

		. 'FLOOR(dt.dis_total)as dis_total, FLOOR(dt.ibsd) AS ibsd, FLOOR(dt.net_amount) AS net_amount, FLOOR( dt.own_cont) as own_cont , FLOOR(dt.sub_received) as sub_received,FLOOR( dt.sub_receivable)sub_receivable, FLOOR(dt.tot_loan_amt) as tot_loan_amt, dt.lof_mort, dt.af_culti, FLOOR(dt.sec_land)as sec_land, FLOOR(dt.sec_oth)as sec_oth , FLOOR( dt.sec_tot) as sec_tot,FLOOR( dt.igo_loan) as igo_loan, FLOOR( dt.tot_mordg_bond)as tot_mordg_bond '

		. 'FROM td_dc_self s '

		. 'JOIN td_dc_self_dtls dt ON s.ardb_id=dt.ardb_id AND s.memo_no=dt.memo_no AND s.pronote_no=dt.pronote_no '

		. 'JOIN md_purpose p ON s.purpose_code=p.purpose_code '

		. 'WHERE s.ardb_id=' . $ardb_id . ' AND replace(replace(replace(s.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" '
		
		. 'ORDER BY dt.pronote_no, dt.sl_no';

	$data = $this->db->query($sql);

	// echo $this->db->last_query();exit;

	return $data->result();

    }



    function get_shg_dc_header($ardb_id, $memo_no) {

	$sql = 'select DISTINCT s.memo_no, se.sector_name, COUNT(distinct s.pronote_no) as tot_pronote,sum(a.dis_total) as tot_amt, FLOOR(SUM(a.net_amount)) AS net_amount
	 FROM td_dc_self s , md_sector se ,td_dc_self_dtls a
	 where s.sector_code=se.sector_code  
	 and s.pronote_no=a.pronote_no  and s.ardb_id=a.ardb_id and s.ardb_id=' . $ardb_id . ' AND replace(replace(replace(s.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY s.memo_no, s.memo_no, se.sector_name ORDER by s.memo_no';

	$data = $this->db->query($sql);

	// echo $this->db->last_query();exit;

	return $data->result();

    }



    function get_borrower_approve_details($ardb_id, $memo_no) {

	$sql = 'SELECT b.* FROM td_dc_self s JOIN td_dc_self_borrower b ON s.memo_no=b.memo_no AND s.pronote_no=b.pronote_no AND s.ardb_id=b.ardb_id WHERE s.ardb_id=' . $ardb_id . ' AND replace(replace(replace(s.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ORDER by s.entry_date, s.memo_no';

	$data = $this->db->query($sql);

	return $data->result();

    }



    function get_total_shg($ardb_id, $memo_no) {

	$sql = 'SELECT s.memo_no, s.pronote_no, s.pronote_date,Floor( sum(dt.project_cost) )as tot_p_cost,Floor(  SUM(dt.own_cont) )as tot_own_cont,Floor(  sum(dt.sub_received) )as tot_s_rec,Floor(  sum(dt.sub_receivable)) as tot_s_receivable,Floor(  sum(dt.tot_loan_amt) )as tot_loan_amt, sum(dt.lof_mort) as tot_lof_mort, sum(dt.af_culti) as tot_af_culti, Floor( sum(dt.sec_land)) as tot_sec_land,Floor(  SUM(dt.sec_oth)) as tot_sec_oth, Floor( sum(dt.sec_tot)) as sec_tot,Floor(  SUM(dt.igo_loan)) as tot_igo_loan, Floor( SUM(dt.tot_mordg_bond)) as tot_mordg_bond FROM td_dc_self s JOIN td_dc_self_dtls dt ON s.ardb_id=dt.ardb_id AND s.memo_no=dt.memo_no AND s.pronote_no=dt.pronote_no WHERE s.ardb_id=' . $ardb_id . ' AND replace(replace(replace(s.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY dt.memo_no, dt.pronote_no, s.pronote_date ORDER by s.memo_no, dt.pronote_no';

	$data = $this->db->query($sql);

	// echo $this->db->last_query();exit;

	return $data->result();

    }



    function forward_data($ardb_id, $memo_no,$reason) {

	$user_type = $_SESSION['user_type'];

	$input = array();

	if ($user_type == 'U') {

	    $input = array(

		'fwd_data' => 'Y',

		'fwd_by' => $_SESSION['login']->user_id,

		'fwd_at' => date('Y-m-d h:i:s')

	    );

	} elseif ($user_type == 'P') {

	    $input = array(

		'approve_1' => 'Y',

		'app1_by' => $_SESSION['login']->user_id,

		'app1_at' => date('Y-m-d h:i:s'),
		
		'a1_reason' =>$reason

	    );

	} elseif ($user_type == 'V') {

	    $input = array(

		'approve_2' => 'Y',

		'app2_by' => $_SESSION['login']->user_id,

		'app2_at' => date('Y-m-d h:i:s'),

		'a2_reason' =>$reason

	    );

	}



	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$this->db->update('td_dc_self', $input);

	//echo $this->db->last_query();exit;

	return true;

    }



    function reject_data($ardb_id, $memo_no,$reason) {

	$user_type = $_SESSION['user_type'];

	$input = array();

	if ($user_type == 'P') {

	    $input = array(

		'fwd_data' => 'R',

		'fwd_at' => '',

		'fwd_by' => '',

		'approve_1' => 'N',

		'app1_by' => '',

		'app1_at' => '',
		'a1_reason' =>$reason

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
		'a2_reason' =>$reason

	    );

	}



	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$this->db->update('td_dc_self', $input);

	//echo $this->db->last_query();exit;

	return true;

    }



    function get_sanc_amt($ardb_id, $sector_id, $entry_date) {

	$sql = 'select sanction_amt from td_sanc_amt where ardb_id = ' . $ardb_id . ' and sector_id = ' . $sector_id . ' and effective_date = (select max(effective_date) from td_sanc_amt where ardb_id = ' . $ardb_id . ' and sector_id = ' . $sector_id . ' and effective_date <= "' . $entry_date . '")';

	$data = $this->db->query($sql);

//        echo '<pre>' . $this->db->last_query();

//        exit;

	return $data->result();

    }



}



?>