<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Friday_return_Model extends CI_Model {

    function get_ardb_list() {
        $this->db->select('id,name');
        $this->db->where('id>', '0');
		$this->db->where_not_in('id', array('33', '34'));
        $this->db->order_by('name');
        $query = $this->db->get('mm_ardb_ho');
        return $query->result();
    }

//    function get_friday_details($form_date, $to_date, $ardb_id) {
    function get_friday_details($ardb_id) {
        $fwd_data = $_SESSION['user_type'] == 'P' ? 'r.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'r.ho_approve_2' : 'r.ho_fwd_data');
        $this->db->select('r.ardb_id, r.week_dt, r.total_dep_mob, r.total_fund_deploy, ' . $fwd_data . ' as fwd_data, a.name, r.ibsd, r.total_dep_mob, r.wbcardb_remit_slr');
        $this->db->where(array(
            'r.ardb_id' => $ardb_id,
//            'r.week_dt >=' => $form_date,
//            'r.week_dt <=' => $to_date,
            'r.fwd_data' => 'Y',
            'r.approve_1' => 'Y',
            'r.approve_2' => 'Y'
        ));
        $_SESSION['user_type'] == 'V' ? $this->db->where(array('r.ho_approve_1' => 'Y')) : '';
        $this->db->join('mm_ardb_ho a', 'r.ardb_id=a.id');
        $this->db->order_by('r.week_dt');
        $query = $this->db->get('td_fridy_rtn r');
//        echo $this->db->last_query();
//        exit;
        return $query->result();
    }

    function get_friday_details_edit($ardb_id, $dt) {
        $this->db->where(array('ardb_id' => $ardb_id, 'week_dt' => $dt));
        $_SESSION['user_type'] == 'U' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y', 'approve_2' => 'Y')) : ($_SESSION['user_type'] == 'P' ? $this->db->where(array('ho_fwd_data' => 'Y')) : ($_SESSION['user_type'] == 'V' ? $this->db->where(array('ho_fwd_data' => 'Y', 'ho_approve_1' => 'Y')) : ''));
        $query = $this->db->get('td_fridy_rtn');
        return $query->result();
    }

    function save($data) {
//        echo '<pre>';
//        var_dump($data);
//        exit;
        if ($data['id'] > 0) {
            $input = array(
                'rd' => $data['rd'],
                'fd' => $data['fd'],
                'flexi_sb' => $data['flexi_sb'],
                'mis' => $data['mis'],
                'other_dep' => $data['other_dep'],
                'ibsd' => $data['ibsd'],
                'total_dep_mob' => $data['total_dep_mob'],
                'cash_in_hand' => $data['cash_in_hand'],
                'other_bank' => $data['other_bank'],
                'ibsd_loan' => $data['ibsd_loan'],
                'dep_loan' => $data['dep_loan'],
                'wbcardb_remit_slr' => $data['wbcardb_remit_slr'],
                'wbcardb_remit_slr_excess' => $data['wbcardb_remit_slr_excess'],
                'total_fund_deploy' => $data['total_fund_deploy']
            );
            $this->db->where(array('ardb_id' => $data['ardb_id'], 'week_dt' => $data['date']));
            $this->db->update('td_fridy_rtn', $input);
        } else {
            $input = array(
                'ardb_id' => $data['ardb_id'],
                'week_dt' => $data['date'],
                'rd' => $data['rd'],
                'fd' => $data['fd'],
                'flexi_sb' => $data['flexi_sb'],
                'mis' => $data['mis'],
                'other_dep' => $data['other_dep'],
                'ibsd' => $data['ibsd'],
                'total_dep_mob' => $data['total_dep_mob'],
                'cash_in_hand' => $data['cash_in_hand'],
                'other_bank' => $data['other_bank'],
                'ibsd_loan' => $data['ibsd_loan'],
                'dep_loan' => $data['dep_loan'],
                'wbcardb_remit_slr' => $data['wbcardb_remit_slr'],
                'wbcardb_remit_slr_excess' => $data['wbcardb_remit_slr_excess'],
                'total_fund_deploy' => $data['total_fund_deploy'],
                'uploded_by' => $_SESSION['login']->user_id,
                'uploaded_dt' => date('Y-m-d h:i:s')
            );
            $this->db->insert('td_fridy_rtn', $input);
        }
        return TRUE;
    }

    function delete($ardb_id, $dt) {
        $where = array(
            'ardb_id' => $ardb_id,
            'week_dt' => $dt
        );
        $this->db->where($where);
        $this->db->delete('td_fridy_rtn');
        return true;
    }

    function forward($ardb_id, $dt) {
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
            'week_dt' => $dt
        ));
        $this->db->update('td_fridy_rtn', $input);
        //echo $this->db->last_query();exit;
        return true;
    }

    function reject($ardb_id, $dt) {
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
            'week_dt' => $dt
        ));
        $this->db->update('td_fridy_rtn', $input);
//        echo $this->db->last_query();
//        exit;
        return true;
    }

    function get_report($form_date, $to_date) {
        $this->db->select('a.ardb_id, b.name, sum(a.rd) rd, sum(a.fd) fd, sum(a.flexi_sb) flexi_sb, sum(a.mis) mis, '
                . 'sum(a.other_dep) other_dep, sum(a.ibsd) ibsd, sum(a.total_dep_mob) total_dep_mob, sum(a.cash_in_hand) cash_in_hand, '
                . 'sum(a.other_bank) other_bank, sum(a.ibsd_loan) ibsd_loan, sum(a.dep_loan) dep_loan, sum(a.wbcardb_remit_slr) wbcardb_remit_slr, '
                . 'sum(a.wbcardb_remit_slr_excess) wbcardb_remit_slr_excess, sum(a.total_fund_deploy) total_fund_deploy, sum(a.ibsd_as) ibsd_as');
        $this->db->where(array(
            'a.week_dt >=' => $form_date,
            'a.week_dt <=' => $to_date,
            'a.ho_fwd_data' => 'Y',
            'a.ho_approve_1' => 'Y'
        ));
        $this->db->join('mm_ardb_ho b', 'a.ardb_id=b.id');
        $this->db->group_by('a.ardb_id, b.name');
        $this->db->order_by('b.name');
        $query = $this->db->get('td_fridy_rtn a');
        return $query->result();
    }

}

?>