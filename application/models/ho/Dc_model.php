<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Model extends CI_Model {

    function get_ardb_list() {
        $this->db->select('id,name');
        $this->db->where('id>', '0');		$this->db->where_not_in('id', array('33', '34'));
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

    function get_shg_details($ardb_id) {
        $this->db->select('shg.ardb_id, shg.entry_date as memo_date, shg.memo_no, shg.letter_no, shg.letter_date, shg.pronote_no, shg.pronote_date, p.purpose_name as purpose, shg.moratorium_period, shg.repayment_no, COUNT(sl_no) as upload, shg.ho_fwd_data as fwd_data');
        $this->db->where(array(
            'shg.ardb_id' => $ardb_id,
            'shg.fwd_data' => 'Y',
            'shg.approve_1' => 'Y',
            'shg.approve_2' => 'Y',
            'shg.document_flag' => 1
        ));
        $this->db->join('md_purpose p', 'shg.purpose_code=p.purpose_code');
        $this->db->join('td_dc_shg_upload u', 'shg.memo_no=u.memo_no AND shg.ardb_id=u.ardb_id AND shg.pronote_no=u.pronote_no', 'left');
        $this->db->group_by('shg.pronote_no, shg.memo_no, shg.entry_date');
        $query = $this->db->get('td_dc_shg shg');
        //echo '<pre>' . $this->db->last_query();exit;
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
        //echo '<pre>';var_dump($data);exit;

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
            return false;
        }

        // echo $this->db->last_query();

        $j = 1;

        if ($data['id'] > 0) {
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
            return false;
        }

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
        if ($data['id'] > 0) {
            $this->db->where(array(
                'memo_no' => $data['memo_no'],
                'pronote_no' => $data['pronote_no']
            ));
            $this->db->update('td_dc_shg_borrower', $input);
        } else {
            return false;
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
        $memo = $memo_no != '' ? 'AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '"' : '';
        $fwd_data = $_SESSION['user_type'] == 'P' ? 'shg.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'shg.ho_approve_2' : 'shg.ho_fwd_data');
        $where = '';
        if ($_SESSION['user_type'] == 'P') {
            $where = 'AND shg.ho_fwd_data="Y"';
        } elseif ($_SESSION['user_type'] == 'V') {
            $where = 'AND shg.ho_fwd_data="Y" AND shg.ho_approve_1="Y"';
        } elseif ($_SESSION['user_type'] == 'U') {
            $where = 'AND shg.fwd_data="Y" AND shg.approve_1="Y" AND shg.approve_2="Y"';
        }
//	echo '<br>' . $where;
        $sql = 'SELECT DISTINCT shg.ardb_id, shg.memo_no, s.sector_name, sum(IF(' . $fwd_data . ' = "Y", "1", "0")) as status FROM td_dc_shg shg join td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no AND shg.pronote_no=dt.pronote_no JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no AND shg.pronote_no=b.pronote_no JOIN md_sector s ON shg.sector_code=s.sector_code WHERE shg.ardb_id=' . $ardb_id . ' ' . $memo . ' ' . $where . ' AND
                shg.document_flag=1 GROUP BY shg.memo_no, s.sector_name';
        $data = $this->db->query($sql);
//	echo '<br>' . $this->db->last_query();
//	exit;
        return $data->result();
    }

    function get_approve_shg_details($ardb_id, $memo_no) {
        $sql = 'SELECT `shg`.`pronote_no`, `shg`.`pronote_date`, `p`.`purpose_name`, `shg`.`moratorium_period`, `shg`.`repayment_no`, `dt`.`shg_name`, `dt`.`tot_memb`, `dt`.`shg_addr`, `b`.`block_name`, `dt`.`roi`, `dt`.`bod_sanc_dt`, `dt`.`due_dt`, `dt`.`brrwr_sl_no`, `dt`.`project_cost`, `dt`.`sanc_amt`, `dt`.`tot_own_amt`, `dt`.`corp_fnd`, `dt`.`disb_amt`, `dt`.`intr_aggr_dt`, `dt`.`total_Intr_ag_bond` FROM td_dc_shg_dtls dt JOIN td_dc_shg shg on dt.ardb_id=shg.ardb_id AND dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no JOIN `md_purpose` `p` ON `shg`.`purpose_code`=`p`.`purpose_code` JOIN `md_block` `b` ON `dt`.`block_code`=`b`.`block_code` WHERE shg.ardb_id = "' . $ardb_id . '" AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "") = "' . $memo_no . '" ORDER BY dt.pronote_no, dt.sl_no';
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
        $this->db->update('td_dc_shg', $input);
        //echo $this->db->last_query();exit;
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
        $this->db->update('td_dc_shg', $input);
        //echo $this->db->last_query();exit;
        return true;
    }

    function get_csv_details($ardb_id, $memo_no) {
        $this->load->dbutil();
        $sql = 'SELECT shg.ardb_id, shg.memo_no, shg.sector_code, shg.pronote_no, DATE_FORMAT(STR_TO_DATE(shg.pronote_date,"%Y-%m-%d"), "%d/%m/%Y")pronote_date, '
                . 'shg.purpose_code, IF(shg.gender_id=1, "M", "F") as gender, shg.roi, shg.moratorium_period, shg.repayment_no, dt.shg_name, dt.tot_memb as tot_memb_in_shg, dt.shg_addr, dt.block_code, DATE_FORMAT(STR_TO_DATE(dt.bod_sanc_dt,"%Y-%m-%d"), "%d/%m/%Y")bod_sanc_dt, '
                . 'DATE_FORMAT(STR_TO_DATE(dt.due_dt,"%Y-%m-%d"), "%d/%m/%Y")due_dt, dt.brrwr_sl_no, dt.project_cost, dt.sanc_amt, dt.tot_own_amt, dt.disb_amt, DATE_FORMAT(STR_TO_DATE(dt.intr_aggr_dt,"%Y-%m-%d"), "%d/%m/%Y")intr_aggr_dt, dt.total_Intr_ag_bond, '
                . 'b.total_shg, b.tot_memb, b.tot_male, b.tot_female, b.tot_sc, b.tot_st, b.tot_obca, b.tot_obcb, b.tot_gen, b.tot_other, b.tot_count, b.tot_big, b.tot_marginal, b.tot_small, b.tot_landless, b.tot_lig, b.tot_mig, b.tot_hig '
                . 'FROM td_dc_shg shg '
                . 'JOIN td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no '
                . 'JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no '
                . 'JOIN mm_ardb_ho a ON shg.ardb_id=a.id '
                . 'WHERE shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" '
                . ' ORDER BY shg.entry_date, shg.memo_no, shg.pronote_no ';
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