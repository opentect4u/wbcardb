<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apex_shg_Model extends CI_Model {

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

    function apex_view($ardb_id) {
	$this->db->distinct();
	$this->db->select('a.ardb_id, a.sector_code, c.sector_name, a.memo_no, a.memo_date, a.pronote_no, a.fwd_data');
	$this->db->where('a.ardb_id', $ardb_id);
	$this->db->join('td_apex_shg_dtls b', 'a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id AND a.pronote_no=b.pronote_no');
	$this->db->join('md_sector c', 'a.sector_code=c.sector_code');
	$this->db->order_by('a.memo_date');
	$query = $this->db->get('td_apex_shg a');
	return $query->result();
//        $sql = 'SELECT a.ardb_id, a.sector_code, c.sector_name, a.memo_no, a.memo_date, b.pronote_no, b.lso_no, b.file_no, a.fwd_data '
//                . 'FROM td_apex_shg a JOIN td_apex_shg_dtls b on a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id JOIN md_sector c ON a.sector_code=c.sector_code '
//                . 'WHERE a.ardb_id=' . $ardb_id . ' ORDER BY a.memo_date';
//        $data = $this->db->query($sql);
//        return $data->result_array();
    }

    function apex_edit($ardb_id, $memo_no, $pronote_no) {
	$where = $pronote_no != '' && $pronote_no > 0 ? 'AND replace(replace(replace(a.pronote_no, " ", ""), "/", ""), "-", "")="' . $pronote_no . '"' : "";
	$sql = 'SELECT b.*,a.sector_code, a.memo_date,c.block_name,p.purpose_name,a.fwd_data, di.inst_sl_no, di.inst_date, di.inst_amt, '
		. '(b.sanc_amt - (SELECT sum(d.inst_amt) FROM td_apex_shg_dis d WHERE b.lso_no=d.lso_no AND a.ardb_id=d.ardb_id GROUP BY a.memo_no)) as remaining_sanc_amt '
		. 'FROM td_apex_shg a '
		. 'JOIN td_apex_shg_dtls b on a.memo_no=b.memo_no AND a.ardb_id=b.ardb_id AND a.pronote_no=b.pronote_no '
		. 'JOIN td_apex_shg_dis di ON a.memo_no=di.memo_no AND b.lso_no=di.lso_no AND b.pronote_no=di.pronote_no '
		. 'JOIN md_block c ON b.block_id=c.block_code '
		. 'JOIN md_purpose p ON b.purpose_code=p.purpose_code '
		. 'WHERE a.ardb_id=' . $ardb_id . ' AND replace(replace(replace(a.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ' . $where;
	$data = $this->db->query($sql);
//        echo $this->db->last_query();
//        exit;
	return $data->result_array();
    }

    function borrower_details($ardb_id, $memo_no, $pronote_no) {
	$where = $pronote_no != '' && $pronote_no > 0 ? 'AND replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")="' . $pronote_no . '"' : "";
	$this->db->where('ardb_id= ' . $ardb_id . ' AND replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" ' . $where);
//        $this->db->where($where);
	$query = $this->db->get('td_apex_shg_borrower');
//        echo $this->db->last_query();
//        exit;
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
	$sql = 'SELECT a.ardb_id, a.block_id, c.block_name, a.name_of_group, a.file_no, a.tot_member, '
		. 'a.moratorium_period, a.repayment_no, a.repay_per_tot, a.purpose_code, p.purpose_name, a.roi, a.pro_cost, '
		. 'a.own_cont, a.corp_fund, a.sanc_amt, a.tot_depo_rais, a.inter_ag_bo_dt, a.inter_ag_bo_no, '
		. '(a.sanc_amt - (SELECT SUM(b.inst_amt) FROM td_apex_shg_dis b WHERE b.ardb_id=a.ardb_id AND b.lso_no=a.lso_no GROUP BY a.lso_no)) as remaining_sanc_amt '
		. 'FROM td_apex_shg_api a '
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
	// td_apex_shg
	if ($data['id'] > 0) {
	    $dtls_input = array(
		'fwd_data' => 'N'
	    );
	    $this->db->where(array(
		'ardb_id' => $data['ardb_id'],
		'memo_no' => $data['memo_no'],
		'pronote_no' => $data['pronote_no']
	    ));
	    $this->db->update('td_apex_shg', $dtls_input);
	    for ($i = 0; $i < count($data['lso_no']); $i++) {
		// td_apex_shg_dtls
		$dtls_input = array(
		    'group' => $data['group'][$i]
		);
		$this->db->where(array(
		    'ardb_id' => $data['ardb_id'],
		    'memo_no' => $data['memo_no'],
		    'pronote_no' => $data['pronote_no'],
		    'lso_no' => $data['lso_no'][$i],
		));
		$this->db->update('td_apex_shg_dtls', $dtls_input);
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
		$this->db->update('td_apex_shg_dis', $dis_input);
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
	    $this->db->update('td_apex_shg_borrower', $borrower_input);
	} else {
	    // TD_APEX_SHG
	    $shg_input = array(
		'ardb_id' => $data['ardb_id'],
		'memo_no' => $data['memo_no'],
		'memo_date' => $data['memo_date'],
		'pronote_no' => $data['pronote_no'],
		'lso_no' => '',
		'sector_code' => $data['sector_code'],
		'created_by' => $user_id,
		'modified_by' => $user_id
	    );
	    $this->db->insert('td_apex_shg', $shg_input);

	    // td_apex_shg_dtls
	    for ($i = 0; $i < count($data['lso_no']); $i++) {
		$dtls_input = array(
		    'ardb_id' => $data['ardb_id'],
		    'entry_date' => date('Y-m-d'),
		    'memo_no' => $data['memo_no'],
		    'pronote_no' => $data['pronote_no'],
		    'group' => $data['group'][$i],
		    'lso_no' => $data['lso_no'][$i],
		    'block_id' => $data['block_id'][$i],
		    'name_of_group' => $data['name_of_group'][$i],
		    'file_no' => $data['file_no'][$i],
		    'tot_member' => $data['tot_member'][$i],
		    'moratorium_period' => $data['moratorium_period'][$i],
		    'repayment_no' => $data['repayment_no'][$i],
		    'repay_per_tot' => $data['repay_per_tot'][$i],
		    'purpose_code' => $data['purpose_code'][$i],
		    'roi' => $data['roi'][$i],
		    'pro_cost' => $data['pro_cost'][$i],
		    'own_cont' => $data['own_cont'][$i],
		    'corp_fund' => $data['corp_fund'][$i],
		    'sanc_amt' => $data['sanc_amt'][$i],
		    'tot_depo_rais' => $data['tot_depo_rais'][$i],
		    'inter_ag_bo_dt' => $data['inter_ag_bo_dt'][$i],
		    'inter_ag_bo_no' => $data['inter_ag_bo_no'][$i]
		);
		$this->db->insert('td_apex_shg_dtls', $dtls_input);

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
		$this->db->insert('td_apex_shg_dis', $dis_input);
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
		'tot_marginal' => $data['tot_marginal'],
		'tot_landless' => $data['tot_landless'],
		'tot_hig' => $data['tot_hig']
	    );
	    $this->db->insert('td_apex_shg_borrower', $borrower_input);
	}
	return TRUE;
//        exit;
    }

    function approve_view($ardb_id, $memo_no) {
	$where = $memo_no != '' || $memo_no > 0 ? 'AND replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : "";
	$fwd_data = $_SESSION['user_type'] == 'P' ? 'approve_1' : ($_SESSION['user_type'] == 'V' ? 'approve_2' : 'fwd_data');
	$this->db->distinct();
	$this->db->select('ardb_id, memo_no, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status');
	$this->db->where('ardb_id=' . $ardb_id . ' ' . $where);
	if ($_SESSION['user_type'] == 'P') {
	    $this->db->where('fwd_data', 'Y');
	} elseif ($_SESSION['user_type'] == 'V') {
	    $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y'));
	} //elseif ($_SESSION['user_type'] == 'U') {
//            $where_not = array('Y', 'R');
//            $this->db->where_not_in('fwd_data', $where_not);
//        }
	$this->db->group_by('memo_no');
	$query = $this->db->get('td_apex_shg');
//        echo $this->db->last_query();
//        exit;
	return $query->result();
    }

    function forward_data($ardb_id, $memo_no) {
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
		'app1_at' => date('Y-m-d h:i:s')
	    );
	} elseif ($user_type == 'V') {
	    $input = array(
		'approve_2' => 'Y',
		'app2_by' => $_SESSION['login']->user_id,
		'app2_at' => date('Y-m-d h:i:s')
	    );
	}

	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$this->db->update('td_apex_shg', $input);
//        echo $this->db->last_query();
//        exit;
	return true;
    }

    function reject_data($ardb_id, $memo_no) {
	$user_type = $_SESSION['user_type'];
	$input = array();
	if ($user_type == 'P') {
	    $input = array(
		'fwd_data' => 'R',
		'fwd_at' => '',
		'fwd_by' => '',
		'approve_1' => 'N',
		'app1_by' => '',
		'app1_at' => ''
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
		'app2_at' => ''
	    );
	}

	$this->db->where(array(
	    'ardb_id' => $ardb_id,
	    'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
	));
	$this->db->update('td_apex_shg', $input);
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