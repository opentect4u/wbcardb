<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Friday_return_Model extends CI_Model {

    function get_friday_details($ardb_id) {
        $fwd_data = $_SESSION['user_type'] == 'U' ? 'fwd_data' : ($_SESSION['user_type'] == 'P' ? 'approve_1' : ($_SESSION['user_type'] == 'V' ? 'approve_2' : ''));
        $this->db->select('ardb_id, week_dt, total_dep_mob, total_fund_deploy, ' . $fwd_data . ' as fwd_data');
        $this->db->where('ardb_id', $ardb_id);
        $_SESSION['user_type'] == 'P' ? $this->db->where(array('fwd_data' => 'Y')) : ($_SESSION['user_type'] == 'V' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y')) : '');
        $this->db->order_by('week_dt');
        $query = $this->db->get('td_fridy_rtn');
//        echo $this->db->last_query();
//        exit;
        return $query->result();
    }

    function get_friday_details_edit($ardb_id, $dt) {
        $this->db->where(array('ardb_id' => $ardb_id, 'week_dt' => $dt));
        $_SESSION['user_type'] == 'P' ? $this->db->where(array('fwd_data' => 'Y')) : ($_SESSION['user_type'] == 'V' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y')) : '');
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
                'fwd_data' => 'N',
                'fwd_at' => '',
                'fwd_by' => '',
                'approve_1' => 'N',
                'app1_by' => '',
                'app1_at' => ''
            );
        } elseif ($user_type == 'V') {
            $input = array(
                'fwd_data' => 'N',
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
            'week_dt' => $dt
        ));
        $this->db->update('td_fridy_rtn', $input);
        //echo $this->db->last_query();exit;
        return true;
    }

    //////////
    function get_friday_details_view($ardb_id, $return_dt) {
        $fwd_data = $_SESSION['user_type'] == 'P' ? 'a.approve_1' : ($_SESSION['user_type'] == 'V' ? 'a.approve_2' : 'a.fwd_data');
        $this->db->select('a.ardb_id, a.week_dt, a.rd rd, a.fd fd, a.flexi_sb flexi_sb, a.mis mis, '
                . 'a.other_dep other_dep, a.ibsd ibsd, a.total_dep_mob total_dep_mob, a.cash_in_hand cash_in_hand, '
                . 'a.other_bank other_bank, a.ibsd_loan ibsd_loan, a.dep_loan dep_loan, a.wbcardb_remit_slr wbcardb_remit_slr, '
                . 'a.wbcardb_remit_slr_excess wbcardb_remit_slr_excess, a.total_fund_deploy total_fund_deploy, a.ibsd_as ibsd_as, ' . $fwd_data . ' as fwd_data');
        $this->db->where(array(
            'a.ardb_id' => $ardb_id,
            'a.week_dt' => $return_dt
        ));
//        $this->db->group_by('a.ardb_id, a.week_dt');
        $query = $this->db->get('td_fridy_rtn a');
        return $query->result();
    }

}

?>