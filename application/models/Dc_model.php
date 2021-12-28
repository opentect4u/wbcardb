<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Dc_Model extends CI_Model {



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



    function get_shg_details($ardb_id) {

	$this->db->select('shg.entry_date as memo_date, shg.memo_no, shg.letter_no, shg.letter_date, shg.pronote_no, shg.pronote_date, p.purpose_name as purpose, shg.moratorium_period, shg.repayment_no, COUNT(sl_no) as upload, shg.fwd_data,shg.a1_reason,shg.a2_reason');

	$this->db->where(array('shg.ardb_id' => $ardb_id));

	$this->db->join('md_purpose p', 'shg.purpose_code=p.purpose_code');

	$this->db->join('td_dc_shg_upload u', 'shg.memo_no=u.memo_no AND shg.ardb_id=u.ardb_id AND shg.pronote_no=u.pronote_no', 'left');

	$this->db->group_by('shg.pronote_no, shg.memo_no, shg.entry_date');

	$query = $this->db->get('td_dc_shg shg');

	return $query->result();

    }



    function get_shg_details_edit($ardb_id, $pronote_no, $memo_no) {

	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$query = $this->db->get('td_dc_shg');

	// echo $this->db->last_query();exit;

	return $query->result();

    }



    function get_dc_shg_dtls_edit($ardb_id, $pronote_no, $memo_no) {

	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$query = $this->db->get('td_dc_shg_dtls');

	return $query->result();

    }



    function dc_save($data) {

//        echo '<pre>';

//        var_dump($data);

//        exit;



	if ($data['id'] > 0) {

	    $dc_shg_input = array(

		'sector_code' => $data['sector'],

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

	    $this->db->update('td_dc_shg', $dc_shg_input);

	    // echo $this->db->last_query();exit;

	} else {

	    $dc_shg_input = array(

		'ardb_id' => $data['ardb_id'],

		'entry_date' => $data['date'],

		'memo_no' => $data['memo_no'],

		'sector_code' => $data['sector'],

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

	    $this->db->insert('td_dc_shg', $dc_shg_input);

	}



	// echo $this->db->last_query();exit;



	$j = 1;



	if ($data['id'] > 0) {

	    $this->db->where(array(

		'ardb_id' => $data['ardb_id'],

		'memo_no' => $data['memo_no'],

		'pronote_no' => $data['pronote_no']

	    ));

	    $gt_query = $this->db->get('td_dc_shg_dtls');

	    $no_rows = $gt_query->num_rows();

	    $f = $no_rows;

	    if ($no_rows != count($data['sanction_date'])) {

		$remaining_rows = count($data['sanction_date']) - $no_rows;

		for ($a = 0; $a < $remaining_rows; $a++) {

		    $ab = array(

			'sl_no' => ++$f,

			'ardb_id' => $data['ardb_id'],

			'entry_date' => $data['date'],

			'memo_no' => $data['memo_no'],

			'pronote_no' => $data['pronote_no'],

			'shg_name' => $data['shg_name'][$no_rows],

			'tot_memb' => $data['number'][$no_rows],

			'shg_addr' => $data['address'][$no_rows],

			'block_code' => $data['block_id'][$no_rows],

			'roi' => $data['rete_of_interest'],

			'bod_sanc_dt' => $data['sanction_date'][$no_rows],

			'due_dt' => $data['due_date'][$no_rows],

			'brrwr_sl_no' => $data['brrwr_sl_no'][$no_rows],

			'project_cost' => $data['project_cost'][$no_rows],

			'sanc_amt' => $data['sanction_amount'][$no_rows],

			'tot_own_amt' => $data['own_contribution'][$no_rows],

			'corp_fnd' => $data['corp_fnd'][$no_rows],

			'disb_amt' => $data['disbursed_amount'][$no_rows],

			'intr_aggr_dt' => $data['agriment_date'][$no_rows],

			'total_Intr_ag_bond' => $data['ag_bound']

		    );

		    $this->db->insert('td_dc_shg_dtls', $ab);

		    $no_rows++;

		    // var_dump($ab);

		}

	    }



	    for ($i = 0; $i < count($data['sanction_date']); $i++) {

		$dc_shg_dtls_input = array(

		    'shg_name' => $data['shg_name'][$i],

		    'tot_memb' => $data['number'][$i],

		    'shg_addr' => $data['address'][$i],

		    'block_code' => $data['block_id'][$i],

		    'roi' => $data['rete_of_interest'],

		    'bod_sanc_dt' => $data['sanction_date'][$i],

		    'due_dt' => $data['due_date'][$i],

		    'brrwr_sl_no' => $data['brrwr_sl_no'][$i],

		    'project_cost' => $data['project_cost'][$i],

		    'sanc_amt' => $data['sanction_amount'][$i],

		    'tot_own_amt' => $data['own_contribution'][$i],

		    'corp_fnd' => $data['corp_fnd'][$i],

		    'disb_amt' => $data['disbursed_amount'][$i],

		    'intr_aggr_dt' => $data['agriment_date'][$i],

		    'total_Intr_ag_bond' => $data['ag_bound']

		);

		$this->db->where(array(

		    'sl_no' => $j,

		    'ardb_id' => $data['ardb_id'],

		    'memo_no' => $data['memo_no'],

		    'pronote_no' => $data['pronote_no']

		));

		$this->db->update('td_dc_shg_dtls', $dc_shg_dtls_input);

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

		    'shg_name' => $data['shg_name'][$i],

		    'tot_memb' => $data['number'][$i],

		    'shg_addr' => $data['address'][$i],

		    'block_code' => $data['block_id'][$i],

		    'roi' => $data['rete_of_interest'],

		    'bod_sanc_dt' => $data['sanction_date'][$i],

		    'due_dt' => $data['due_date'][$i],

		    'brrwr_sl_no' => $data['brrwr_sl_no'][$i],

		    'project_cost' => $data['project_cost'][$i],

		    'sanc_amt' => $data['sanction_amount'][$i],

		    'tot_own_amt' => $data['own_contribution'][$i],

		    'corp_fnd' => $data['corp_fnd'][$i],

		    'disb_amt' => $data['disbursed_amount'][$i],

		    'intr_aggr_dt' => $data['agriment_date'][$i],

		    'total_Intr_ag_bond' => $data['ag_bound']

		);

		$this->db->insert('td_dc_shg_dtls', $dc_shg_dtls_input);

		$j++;

	    }

	    // echo $this->db->last_query();exit;

	}

	

	if ($data['id'] > 0) {

		$input = array(
			
	    'total_shg' => $data['total_shg'],

	    'tot_memb' => $data['total_memb'],

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

	    $this->db->where(array(

		'memo_no' => $data['memo_no'],

		'pronote_no' => $data['pronote_no']

	    ));

	    $this->db->update('td_dc_shg_borrower', $input);

	} else {

		$input = array(

	    'ardb_id' => $data['ardb_id'],

	    'entry_date' => date('Y-m-d'),

	    'memo_no' => $data['memo_no'],

	    'pronote_no' => $data['pronote_no'],

	    'total_shg' => $data['total_shg'],

	    'tot_memb' => $data['total_memb'],

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

	    $this->db->insert('td_dc_shg_borrower', $input);

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

	$this->db->delete('td_dc_shg_dtls');



	$this->db->where($where);

	$this->db->delete('td_dc_shg');

	return true;

	// echo $this->db->last_query();exit;

    }



    function dc_file_upload_save($ardb_id, $data, $file_data) {

	 // var_dump($file_data);exit;

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

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no,

	    'ardb_id' => $ardb_id

	));

	$query = $this->db->get('td_dc_shg_upload');

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

	$this->db->distinct();

	$this->db->select('memo_no');

	$this->db->where('ardb_id', $ardb_id);

	$query = $this->db->get('td_dc_shg');

	return $query->result();

    }



    function get_pronote_details($ardb_id, $memo_no) {

	$this->db->distinct();

	$this->db->select('pronote_no');

	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$query = $this->db->get('td_dc_shg');

	return $query->result();

    }



    function get_shg_names($ardb_id, $memo_no, $pronote_no) {

	$this->db->distinct();

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

	$memo = $memo_no != '' ? 'AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : '';

	$fwd_data = $_SESSION['user_type'] == 'P' ? 'shg.approve_1' : ($_SESSION['user_type'] == 'V' ? 'shg.approve_2' : 'shg.fwd_data');

	if ($_SESSION['user_type'] == 'P') {

	    $where = 'AND shg.fwd_data="Y"';

	} elseif ($_SESSION['user_type'] == 'V') {

	    $where = 'AND shg.fwd_data="Y" AND shg.approve_1="Y"';

	} else {

	    $where = '';

	}



	$sql = 'SELECT DISTINCT shg.memo_no, s.sector_name, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status FROM td_dc_shg shg join td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no AND shg.pronote_no=dt.pronote_no JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no AND shg.pronote_no=b.pronote_no JOIN md_sector s ON shg.sector_code=s.sector_code WHERE shg.ardb_id=' . $ardb_id . ' ' . $memo . ' ' . $where . ' GROUP BY shg.memo_no, s.sector_name';

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
		$query = $this->db->get('td_dc_shg_upload');
		if($query->num_rows() > 0) {
			return 1;
		}else{
			return 0;
		}
	}



    function get_approve_shg_details($ardb_id, $memo_no) {

	$sql = 'SELECT `shg`.`pronote_no`, `shg`.`pronote_date`, `p`.`purpose_name`, `shg`.`moratorium_period`, `shg`.`repayment_no`, `dt`.`shg_name`, `dt`.`tot_memb`, `dt`.`shg_addr`, `b`.`block_name`, `dt`.`roi`, `dt`.`bod_sanc_dt`, `dt`.`due_dt`, `dt`.`brrwr_sl_no`, FLOOR(`dt`.`project_cost`) as project_cost,FLOOR( `dt`.`sanc_amt`)as sanc_amt ,FLOOR( `dt`.`tot_own_amt`)as tot_own_amt, FLOOR(`dt`.`corp_fnd`) as corp_fnd ,FLOOR( `dt`.`disb_amt`) disb_amt, `dt`.`intr_aggr_dt`, `dt`.`total_Intr_ag_bond` 
	FROM td_dc_shg_dtls dt JOIN td_dc_shg shg on dt.ardb_id=shg.ardb_id
	 AND dt.memo_no=shg.memo_no 
	 AND dt.pronote_no=shg.pronote_no 
	 JOIN `md_purpose` `p` ON `shg`.`purpose_code`=`p`.`purpose_code` 
	 JOIN `md_block` `b` ON `dt`.`block_code`=`b`.`block_code`
	 WHERE shg.ardb_id = "' . $ardb_id . '" AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "") = "' . $memo_no . '" ORDER BY dt.pronote_no, dt.sl_no';

	$data = $this->db->query($sql);

	//echo '<pre>' . $this->db->last_query();exit;

	return $data->result();

    }



    function get_shg_dc_header($ardb_id, $memo_no) {

	$sql = 'SELECT DISTINCT shg.memo_no, COUNT(distinct shg.pronote_no) as tot_pronote,
	sum(a.disb_amt) as tot_amt FROM td_dc_shg shg ,td_dc_shg_dtls a
	WHERE shg.ardb_id=a.ardb_id and shg.pronote_no=a.pronote_no and shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY shg.memo_no, shg.memo_no ORDER by shg.memo_no';

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

	$sql = 'SELECT shg.memo_no, shg.pronote_date, shg.pronote_no, SUM(dt.tot_memb) as tot_memb,FLOOR( SUM(dt.project_cost) )as tot_p_cost,FLOOR( sum(dt.sanc_amt)) as tot_sanc_amt,FLOOR( SUM(dt.tot_own_amt) )as tot_own_amt,FLOOR( sum(dt.disb_amt)) as tot_disb_amt, dt.intr_aggr_dt, sum(dt.total_Intr_ag_bond) as tot_igb FROM td_dc_shg_dtls dt JOIN td_dc_shg shg ON dt.ardb_id=shg.ardb_id AND dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no WHERE shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY dt.memo_no, dt.pronote_no, shg.pronote_date, dt.intr_aggr_dt';

	$data = $this->db->query($sql);

	// echo $this->db->last_query();exit;

	return $data->result();

    }



    function forward_data($ardb_id, $memo_no,$a1_reason) {

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

		'a1_reason' =>$a1_reason

	    );

	} elseif ($user_type == 'V') {

	    $input = array(

		'approve_2' => 'Y',

		'app2_by' => $_SESSION['login']->user_id,

		'app2_at' => date('Y-m-d h:i:s'),

		'a2_reason' =>$a1_reason

	    );

	}



	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$this->db->update('td_dc_shg', $input);

	//echo $this->db->last_query();exit;

	return true;

    }



    function reject_data($ardb_id, $memo_no,$a1_reason) {

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

		'a1_reason' =>$a1_reason

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

		'a2_reason' =>$a1_reason

	    );

	}



	$this->db->where(array(

	    'ardb_id' => $ardb_id,

	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no

	));

	$this->db->update('td_dc_shg', $input);

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



    ///////////////////////////////////////////////////////////////////



    function csv_download($ardb_id, $memo_no) {

//        $this->load->dbutil();

	$sql = 'SELECT `shg`.`pronote_no`, `shg`.`pronote_date`, `p`.`purpose_name`, `shg`.`moratorium_period`, `shg`.`repayment_no`, `dt`.`shg_name`, `dt`.`tot_memb`, `dt`.`shg_addr`, `b`.`block_name`, `dt`.`roi`, `dt`.`bod_sanc_dt`, `dt`.`due_dt`, `dt`.`brrwr_sl_no`, `dt`.`project_cost`, `dt`.`sanc_amt`, `dt`.`tot_own_amt`, `dt`.`disb_amt`, `dt`.`intr_aggr_dt`, `dt`.`total_Intr_ag_bond` FROM td_dc_shg_dtls dt JOIN td_dc_shg shg on dt.ardb_id=shg.ardb_id AND dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no JOIN `md_purpose` `p` ON `shg`.`purpose_code`=`p`.`purpose_code` JOIN `md_block` `b` ON `dt`.`block_code`=`b`.`block_code` WHERE shg.ardb_id = "' . $ardb_id . '" AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "") = "' . $memo_no . '" ORDER BY dt.pronote_no, dt.sl_no';

	$data = $this->db->query($sql);

//        echo $this->dbutil->csv_from_result($data);

//        exit;

	//echo '<pre>' . $this->db->last_query();exit;

	return $data->result_array();

    }



    function csv($ardb_id, $memo_no) {

	$this->load->dbutil();

	$this->load->helper('file');

	$this->load->helper('download');

	$sql = 'SELECT shg.ardb_id,a.name, DATE_FORMAT(STR_TO_DATE(shg.entry_date,"%Y-%m-%d"), "%d/%m/%Y")entry_date, '

		. 'b.total_shg, b.tot_memb, b.tot_male, b.tot_female, b.tot_sc, b.tot_st, b.tot_obca, b.tot_obcb, b.tot_gen, b.tot_other, b.tot_count, b.tot_big, b.tot_marginal, b.tot_small, b.tot_landless, b.tot_lig, b.tot_mig, b.tot_hig '

		. 'FROM td_dc_shg shg '

		. 'JOIN td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no '

		. 'JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no '

		. 'JOIN mm_ardb_ho a ON shg.ardb_id=a.id limit 2';

	$query = $this->db->query($sql);

	$delimiter = ",";

	$newline = "\r\n";

	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

	var_dump($data);

	// exit;

	$file_path = base_url() . 'shg_file/csv';

	force_download($file_path . '/CSV_Report.csv', $data);

	/////



	$file_path = base_url() . 'shg_file';

//        echo $file_path;

//        exit;

	//File path at local server

	$source = 'shg_file';

	//Load codeigniter FTP class

	$this->load->library('ftp');



	//FTP configuration

	$ftp_config['hostname'] = 'opentech4u.co.in';

	$ftp_config['username'] = 'wbscardb@opentech4u.co.in';

	$ftp_config['password'] = 'ozdj(WBB,*A]';

	$ftp_config['debug'] = TRUE;



	//Connect to the remote server

	$this->ftp->connect($ftp_config);

//        $f_path = $this->ftp->mkdir('/shg_file/csv/', 0755);

//        $list = $this->ftp->list_files('/shg_file/');

//

//        var_dump($list);

//        exit;

	//File upload path of remote server

	$destination = '/shg_file/csv/';

//        echo $destination;

//        exit;

//        $d = file_get_contents($destination, $fileName);

//        var_dump($d);

//        exit;

	force_download($file_path . $fileName, $data);

	//Upload file to the remote server

//        $data = file_get_contents($destination);

//        force_download('CSV_Report.csv', $data);

//        var_dump($this->ftp->upload($destination, force_download('CSV_Report.csv', $data)));

//        exit;

	//Close FTP connection

	$this->ftp->close();



	//Delete file from local server

	@unlink($destination);

    }



    function orc() {

//        $my_db = '(DESCRIPTION = (ADDRESS = (PROTOCOL = FTP)(HOST = 202.65.156.246)(PORT = 1521))

//        (CONNECT_DATA = (SERVER = DEDICATED)

//        (SERVICE_NAME = wbscardb_cbs)))';

//        $conn = oci_connect('wbscardb_cbs', 'wbscardb_cbs231101', $my_db);



	$oracle_db = $this->load->database('oracle', true);

	if (!$oracle_db) {

	    echo 'GAR MERE6E';

	} else {

	    echo 'Success';

	}

	var_dump($oracle_db);

	exit;

    }



    function get_csv_details($ardb_id, $memo_no) {

	$this->load->dbutil();

	$sql = 'SELECT shg.ardb_id, shg.memo_no, shg.sector_code, shg.pronote_no, DATE_FORMAT(STR_TO_DATE(shg.pronote_date,"%Y-%m-%d"), "%d/%m/%Y")pronote_date, '

		. 'shg.purpose_code, IF(shg.gender_id=1, "M", "F") as gender, shg.roi, shg.moratorium_period, shg.repayment_no, dt.shg_name, dt.tot_memb, dt.shg_addr, dt.block_code, DATE_FORMAT(STR_TO_DATE(dt.bod_sanc_dt,"%Y-%m-%d"), "%d/%m/%Y")bod_sanc_dt, '

		. 'DATE_FORMAT(STR_TO_DATE(dt.due_dt,"%Y-%m-%d"), "%d/%m/%Y")due_dt, dt.brrwr_sl_no, dt.project_cost, dt.sanc_amt, dt.tot_own_amt, dt.disb_amt, DATE_FORMAT(STR_TO_DATE(dt.intr_aggr_dt,"%Y-%m-%d"), "%d/%m/%Y")intr_aggr_dt, dt.total_Intr_ag_bond, '

		. 'b.total_shg, b.tot_memb, b.tot_male, b.tot_female, b.tot_sc, b.tot_st, b.tot_obca, b.tot_obcb, b.tot_gen, b.tot_other, b.tot_count, b.tot_big, b.tot_marginal, b.tot_small, b.tot_landless, b.tot_lig, b.tot_mig, b.tot_hig '

		. 'FROM td_dc_shg shg '

		. 'JOIN td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no '

		. 'JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no '

		. 'JOIN mm_ardb_ho a ON shg.ardb_id=a.id '

		. 'WHERE shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")=' . $memo_no

		. ' ORDER BY shg.entry_date, shg.memo_no, shg.pronote_no ';

	$query = $this->db->query($sql);

	$delimiter = ",";

	$newline = "\r\n";

	$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

	return $data;

    }



    function get_ardb_name($ardb_id) {

	$this->db->where('id', $ardb_id);

	$query = $this->db->get('mm_ardb_ho');

	return $query->result();

    }



}



?>