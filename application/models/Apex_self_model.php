<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apex_self_Model extends CI_Model {

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

    function apex_view($ardb_id) {
	$this->db->distinct();
	$this->db->select('a.ardb_id, a.sector_code, c.sector_name, a.memo_no, a.memo_date, a.pronote_no, a.fwd_data,a.instl_no,a.instl_dt,a.a1_reason,a.a2_reason');
	$this->db->where('a.ardb_id', $ardb_id);
	$this->db->join('td_apex_self_dtls b', 'a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id AND a.pronote_no=b.pronote_no  ');
	$this->db->join('md_sector c', 'a.sector_code=c.sector_code');
//        $this->db->group_by('a.memo_no, a.pronote_no');
	$this->db->order_by('a.memo_date');
	$query = $this->db->get('td_apex_self a');
//        echo $this->db->last_query();
//        exit;
	return $query->result();
//        $sql = 'SELECT a.ardb_id, a.sector_code, c.sector_name, a.memo_no, a.memo_date, b.pronote_no, b.lso_no, b.file_no, a.fwd_data '
//                . 'FROM td_apex_shg a JOIN td_apex_shg_dtls b on a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id JOIN md_sector c ON a.sector_code=c.sector_code '
//                . 'WHERE a.ardb_id=' . $ardb_id . ' ORDER BY a.memo_date';
//        $data = $this->db->query($sql);
//        return $data->result_array();
    }

	function apex_self_dc_header($ardb_id, $memo_no,$disb_dt) {

		$sql = 'SELECT DISTINCT shg.memo_no, COUNT(distinct shg.pronote_no) as tot_pronote,
		FLOOR(sum(a.inst_amt)) as tot_amt ,shg.instl_dt FROM td_apex_self shg ,td_apex_self_dis a
		WHERE shg.ardb_id=a.ardb_id and a.inst_date=shg.instl_dt and shg.pronote_no=a.pronote_no  and  shg.ardb_id=' . $ardb_id .  ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no .  '" AND shg.instl_dt="' . $disb_dt .  '" GROUP BY shg.memo_no, shg.memo_no,shg.instl_dt ORDER by shg.memo_no';
	
		$data = $this->db->query($sql);
	
	// 	echo $this->db->last_query();exit;
	// die();
		return $data->result();
	
		}

    function apex_edit($ardb_id, $memo_no, $pronote_no,$disb_dt) {
	$where = $pronote_no != '' || $pronote_no > 0 ? 'AND replace(replace(replace(a.pronote_no, " ", ""), "/", ""), "-", "")="' . $pronote_no . '"' : "";
	// $sql = 'SELECT b.ardb_id,b.entry_date,b.memo_no,b.pronote_no,b.lso_no,b.file_no,b.block_id,b.name_of_borr,
	// b.moratorium,b.loan,FLOOR(b.repay_per_tot) as repay_per_tot,b.purpose_code,b.roi,FLOOR(b.pro_cost) as pro_cost ,FLOOR(b.own_cont) as own_cont,FLOOR(b.corp_fund) as corp_fund,FLOOR(b.sanc_amt) as sanc_amt,
	// b.lnd_off_sec,b.cult_area,b.val_of_hypo,b.gros_inc_gen,b.reg_m_bond_dt,b.reg_m_bond_no,b.in_out	,
	// a.sector_code, a.memo_date,c.block_name,p.purpose_name,a.fwd_data, di.inst_sl_no, di.inst_date, FLOOR(di.inst_amt) as inst_amt, '
	// 	. '(FLOOR(b.sanc_amt) - (SELECT FLOOR( sum(d.inst_amt)) FROM td_apex_self_dis d WHERE b.lso_no=d.lso_no AND a.ardb_id=d.ardb_id GROUP BY a.memo_no)) as remaining_sanc_amt '
	// 	. 'FROM td_apex_self a '
	// 	. 'JOIN td_apex_self_dtls b ON a.pronote_no=b.pronote_no AND a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id '
	// 	. 'JOIN td_apex_self_dis di ON a.memo_no=di.memo_no AND b.lso_no=di.lso_no AND b.pronote_no=di.pronote_no '
	// 	. 'JOIN md_block c ON b.block_id=c.block_code '
	// 	. 'JOIN md_purpose p ON b.purpose_code=p.purpose_code '
	// 	. 'WHERE a.ardb_id=' . $ardb_id . ' AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ' . $where;

$sql = "SELECT distinct  b.ardb_id,b.entry_date,b.memo_no,b.pronote_no,b.lso_no,b.file_no,b.block_id,b.name_of_borr, b.moratorium,b.loan,b.loan_id,
FLOOR(b.repay_per_tot) as repay_per_tot,b.purpose_code,b.roi,FLOOR(b.pro_cost) as pro_cost ,FLOOR(b.own_cont) as own_cont,FLOOR(b.corp_fund) as corp_fund,
FLOOR(b.sanc_amt) as sanc_amt, b.lnd_off_sec,b.cult_area,b.val_of_hypo,b.gros_inc_gen,b.reg_m_bond_dt,b.reg_m_bond_no,b.in_out , 
a.sector_code, a.memo_date,c.block_name,p.purpose_name,a.fwd_data, di.inst_sl_no, di.inst_date, FLOOR(di.inst_amt) as inst_amt,
(FLOOR(b.sanc_amt) - (SELECT FLOOR( sum(d.inst_amt)) 
FROM td_apex_self_dis d 
WHERE b.lso_no=d.lso_no 
AND a.ardb_id=d.ardb_id 
GROUP BY a.memo_no)) as remaining_sanc_amt 
FROM td_apex_self a , td_apex_self_dtls b ,td_apex_self_dis di,md_purpose p ,md_block c 
where a.pronote_no=b.pronote_no 
AND a.memo_no=b.memo_no 
AND a.ardb_id=b.ardb_id   
and a.memo_no=di.memo_no 
AND b.lso_no=di.lso_no 
AND b.pronote_no=di.pronote_no 
and  b.block_id=c.block_code  
and b.purpose_code=p.purpose_code
and a.instl_dt=di.inst_date
/*and a.instl_dt=b.instl_dt*/
and a.instl_dt='$disb_dt'
and  a.ardb_id=$ardb_id
AND replace(replace(replace(a.memo_no, ' ', ''), '/', ''), '-', '')='" . $memo_no . "'";
	$data = $this->db->query($sql);
	// echo '<pre>' . $this->db->last_query();
	// exit;
	return $data->result_array();
    }

    function borrower_details($ardb_id, $memo_no, $pronote_no,$disb_dt) {
	$where = $pronote_no != '' && $pronote_no > 0 ? 'AND replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")="' . $pronote_no . '"' : "";
	$where="And entry_date='$disb_dt'";
	// echo $where1;
	// exit;
	$this->db->where('ardb_id= ' . $ardb_id . ' AND replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ' . $where);
//        $this->db->where($where);
	$query = $this->db->get('td_apex_self_borrower');
    //    echo $this->db->last_query();
    //    exit;
	return $query->result();
    }

    function get_apex_shg_details($ardb_id, $lso_no) {
	$fwd_data = $_SESSION['user_type'] == 'U' ? 's.fwd_data' : ($_SESSION['user_type'] == 'P' ? 's.approve_1' : 's.approve_2');
	$this->db->select('s.sector_code,s.lso_no,s.file_no,b.block_name as block_id,s.name_of_group,s.tot_member,s.moratorium_period,s.repayment_no,s.repay_per_tot,p.purpose_name,s.purpose_code,s.roi,s.pro_cost,s.own_cont,s.corp_fund,s.sanc_amt,s.tot_depo_rais,s.inter_ag_bo_dt,s.inter_ag_bo_no,' . $fwd_data . ' as fwd_data');
	$this->db->where(array('ardb_id' => $ardb_id, 'lso_no' => $lso_no));
	$this->db->join('md_block b', 's.block_id=b.block_code');
	$this->db->join('md_purpose p', 's.purpose_code=p.purpose_code');
	$query = $this->db->get('td_apex_shg_api s');
	return $query->result();
    }

    function get_apex_details($ardb_id, $lso_no) {
	$sql = 'SELECT a.ardb_id, a.block_id, c.block_name, a.name_of_borr, a.file_no, '
		. 'a.moratorium, a.loan, FLOOR(a.repay_per_tot) as repay_per_tot, a.purpose_code, p.purpose_name, a.roi,FLOOR( a.pro_cost) as pro_cost, '
		. 'FLOOR(a.own_cont) as own_cont, FLOOR(a.corp_fund) as corp_fund, FLOOR(a.sanc_amt) as sanc_amt , a.lnd_off_sec, a.cult_area,FLOOR( a.val_of_hypo) as val_of_hypo, a.gros_inc_gen, a.reg_m_bond_dt, a.reg_m_bond_no, '
		. '(a.sanc_amt - (SELECT SUM(b.inst_amt) FROM td_apex_self_dis b WHERE b.ardb_id=a.ardb_id AND b.lso_no=a.lso_no GROUP BY a.lso_no)) as remaining_sanc_amt '
		. 'FROM td_apex_self_api a '
		. 'JOIN md_block c ON a.block_id=c.block_code '
		. 'JOIN md_purpose p ON a.purpose_code=p.purpose_code '
		. 'WHERE a.ardb_id=' . $ardb_id . ' AND a.lso_no=' . $lso_no;
	$data = $this->db->query($sql);
	return $data->result_array();
    }

    function save($data) {
//        echo '<pre>';
//        var_dump($data);
//        exit;
	$user_id = $_SESSION['login']->user_id;

	if ($data['id'] > 0) {
	    // td_apex_self
	    $shg_input = array(
		'fwd_data' => 'N'
	    );
	    $this->db->where(array(
		'ardb_id' => $data['ardb_id'],
		'memo_no' => $data['memo_no'],
		'pronote_no' => $data['pronote_no']
	    ));
	    $this->db->update('td_apex_self', $shg_input);
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
//                
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
	} else {
	    // TD_APEX_SHG
	    // $shg_input = array(
		// 'ardb_id' => $data['ardb_id'],
		// 'memo_no' => $data['memo_no'],
		// 'memo_date' => $data['memo_date'],
		// 'pronote_no' => $data['pronote_no'],
		// 'lso_no' => '',
		// 'sector_code' => $data['sector_code'],
		// 'instl_no' => $data['inst_sl_no'][$i],
	    // 'inst_date' => $data['inst_date'][$i]
		// 'created_by' => $user_id,
		// 'modified_by' => $user_id
	    // );
	    // $this->db->insert('td_apex_self', $shg_input);

	    // td_apex_shg_dtls
	    for ($i = 0; $i < count($data['lso_no']); $i++) {
			
				// echo $this->db->last_query();
				// exit;

				$shg_input = array(
					'ardb_id' => $data['ardb_id'],
					'memo_no' => $data['memo_no'],
					'memo_date' => $data['memo_date'],
					'pronote_no' => $data['pronote_no'],
					'lso_no' => '',
					'sector_code' => $data['sector_code'],
					'instl_no' => $data['inst_sl_no'][$i],
					'instl_dt' => $data['inst_date'][$i],
					'created_by' => $user_id,
					'modified_by' => $user_id
					);
					// print_r( $shg_input);
					// exit;
					$this->db->insert('td_apex_self', $shg_input);
		$dtls_input = array(
		    'ardb_id' => $data['ardb_id'],
		    'entry_date' => date('Y-m-d'),
		    'memo_no' => $data['memo_no'],
		    'pronote_no' => $data['pronote_no'],
		    'lso_no' => $data['lso_no'][$i],
		    'file_no' => $data['file_no'][$i],
		    'block_id' => $data['block_id'][$i],
		    'name_of_borr' => $data['name_of_borr'][$i],
		    'moratorium' => $data['moratorium'][$i],
		    'loan' => $data['loan'][$i],
		    'repay_per_tot' => $data['repay_per_tot'][$i],
		    'purpose_code' => $data['purpose_code'][$i],
		    'roi' => $data['roi'][$i],
		    'pro_cost' => $data['pro_cost'][$i],
		    'own_cont' => $data['own_cont'][$i],
		    'corp_fund' => $data['corp_fund'][$i],
		    'sanc_amt' => $data['sanc_amt'][$i],
		    'lnd_off_sec' => $data['lnd_off_sec'][$i],
		    'cult_area' => $data['cult_area'][$i],
		    'val_of_hypo' => $data['val_of_hypo'][$i],
		    'gros_inc_gen' => $data['gros_inc_gen'][$i],
		    'reg_m_bond_dt' => $data['reg_m_bond_dt'][$i],
		    'reg_m_bond_no' => $data['reg_m_bond_no'][$i]
		);
		$this->db->insert('td_apex_self_dtls', $dtls_input);

		
		//td_apex_shg_dis
		$dis_input = array(
		    'ardb_id' => $data['ardb_id'],
		    'entry_date' => date('Y-m-d'),
		    'memo_no' => $data['memo_no'],
		    'pronote_no' => $data['pronote_no'],
		    'lso_no' => $data['lso_no'][$i],
		    'inst_sl_no' => $data['inst_sl_no'][$i],
		    'inst_date' => $data['inst_date'][$i],
		    'inst_amt' => $data['inst_amt'][$i]
		);
		$this->db->insert('td_apex_self_dis', $dis_input);
		
	    }

	    // td_apex_shg_borrower
	    $borrower_input = array(
		'ardb_id' => $data['ardb_id'],
		'entry_date' => date('Y-m-d'),
		'memo_no' => $data['memo_no'],
		'pronote_no' => $data['pronote_no'],
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
		'tot_small' => $data['tot_small'],
		'tot_marginal' => $data['tot_marginal'],
		'tot_landless' => $data['tot_landless'],
		'tot_lig' => $data['tot_lig'],
		'tot_mig' => $data['tot_mig'],
		'tot_hig' => $data['tot_hig']
	    );
	    $this->db->insert('td_apex_self_borrower', $borrower_input);
	}
//        exit;
	return TRUE;
//        exit;
    }

  //  function approve_view($ardb_id, $memo_no,$disb_dt) {
	function approve_view($ardb_id, $memo_no) {
		// echo $disb_dt;
		// die();
//	var_dump($memo_no);
//	exit;
	$where = $memo_no != '' || $memo_no > 0 ? 'AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : "";
	// $where = $instl_dt != '' || $instl_dt > 0 ? 'AND replace(replace(replace(a.instl_dt, " ", ""), "/", ""), "-", "")="' . $instl_dt . '"' : "";
	$fwd_data = $_SESSION['user_type'] == 'P' ? 'a.approve_1' : ($_SESSION['user_type'] == 'V' ? 'a.approve_2' : 'a.fwd_data');
	$this->db->select('a.ardb_id, a.memo_no, a.memo_date, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status, b.sector_name,a.instl_no,a.instl_dt');
	$this->db->where('a.ardb_id=' . $ardb_id . ' ' . $where);
	if ($_SESSION['user_type'] == 'P') {
	    $this->db->where('a.fwd_data', 'Y');
	} elseif ($_SESSION['user_type'] == 'V') {
	    $this->db->where(array('a.fwd_data' => 'Y', 'a.approve_1' => 'Y'));
	}
	$this->db->join('md_sector b', 'a.sector_code=b.sector_code');
	$this->db->group_by('a.memo_no, a.memo_date, b.sector_name');
	$query = $this->db->get('td_apex_self a');
	// echo $this->db->last_query();
	// exit;
	return $query->result();
    }

    function forward_data($ardb_id, $memo_no,$instl_dt,$a1_reason) {
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
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no,
		'instl_dt'=>$instl_dt
	));
	$this->db->update('td_apex_self', $input);
       echo $this->db->last_query();
       exit;
	return true;
    }

    function reject_data($ardb_id, $memo_no,$instl_dt,$a1_reason) {
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
		'a1_reason'  =>$a1_reason
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
		'a2_reason'  =>$a1_reason
	    );
	}

	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$this->db->update('td_apex_self', $input);
	// echo $this->db->last_query();exit;
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
	exit;
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