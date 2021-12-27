<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fortnight_Model extends CI_Model {

    function get_ardb_list() {
        $this->db->select('id,name');
        $this->db->where('id>', '0');
        $this->db->where_not_in('id', array('33', '34'));
        $this->db->order_by('name');
        $query = $this->db->get('mm_ardb_ho');
        return $query->result();
    }

//    function get_friday_details($form_date, $to_date) {
    function get_friday_details($ardb_id) {
        $fwd_data = $_SESSION['user_type'] == 'U' ? 'f.ho_fwd_data' : ($_SESSION['user_type'] == 'P' ? 'f.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'f.ho_approve_2' : ''));
        $this->db->select('f.ardb_id, a.name, f.return_form, f.return_to, f.tot_inv_of_curr_yr_no_case, f.tot_inv_of_curr_yr_amt, ' . $fwd_data . ' as fwd_data');
        $this->db->where(array(
//            'f.return_dt >=' => $form_date,
//            'f.return_dt <=' => $to_date,
            'f.ardb_id' => $ardb_id,
            'f.fwd_data' => 'Y',
            'f.approve_1' => 'Y',
            'f.approve_2' => 'Y'
        ));
        $_SESSION['user_type'] == 'V' ? $this->db->where(array('f.ho_approve_1' => 'Y')) : '';
        $this->db->join('mm_ardb_ho a', 'f.ardb_id=a.id');
        $this->db->order_by('f.return_form, f.return_to');
        $query = $this->db->get('td_fort_inv f');
//        echo $this->db->last_query();
//        exit;
        return $query->result();
    }

    function get_friday_details_edit($ardb_id, $dt) {
        $this->db->where(array('ardb_id' => $ardb_id, 'return_dt' => $dt));
        $_SESSION['user_type'] == 'P' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y', 'approve_2' => 'Y')) : ($_SESSION['user_type'] == 'V' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y', 'approve_2' => 'Y', 'ho_approve_1' => 'Y')) : '');
        $query = $this->db->get('td_investment');
        return $query->result();
    }

    function save($data) {
//        echo '<pre>';
//        var_dump($data);
//        exit;
        if ($data['id'] > 0) {
            $input = array(
                'ac_closed' => $data['ac_closed'],
                'pro_bro_mem' => $data['pro_bro_mem'],
                'fm_no_case' => $data['fm_no_case1'],
                'fm_amt' => $data['fm_amt1'],
                'nf_no_case' => $data['nf_no_case1'],
                'nf_amt' => $data['nf_amt1'],
                'pl_no_case' => $data['pl_no_case1'],
                'pl_amt' => $data['pl_amt1'],
                'rh_no_case' => $data['rh_no_case1'],
                'rh_amt' => $data['rh_amt1'],
                'shg_no_case' => $data['shg_no_case1'],
                'shg_amt' => $data['shg_amt1'],
                'tot_inv_of_curr_yr_no_case' => $data['tot_inv_of_curr_yr_no_case1'],
                'tot_inv_of_curr_yr_amt' => $data['tot_inv_of_curr_yr_amt1'],
                'tot_inv_of_pre_yr_no_case' => $data['tot_inv_of_pre_yr_no_case1'],
                'tot_inv_of_pre_yr_amt' => $data['tot_inv_of_pre_yr_amt1'],
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where(array('ardb_id' => $data['ardb_id'], 'return_form' => $data['return_form'], 'return_to' => $data['return_to']));
            $this->db->update('td_fort_inv', $input);
        } else {
            $input = array(
                'ardb_id' => $data['ardb_id'],
                'entry_date' => date('Y-m-d'),
                'target_id' => $data['target_id'],
                'return_form' => $data['return_form'],
                'return_to' => $data['return_to'],
                'ac_closed' => $data['no_acc_closed'],
                'pro_bro_mem' => $data['prog_brro_memb'],
                'fm_no_case' => $data['fm_no_case1'],
                'fm_amt' => $data['fm_amt1'],
                'nf_no_case' => $data['nf_no_case1'],
                'nf_amt' => $data['nf_amt1'],
                'pl_no_case' => $data['pl_no_case1'],
                'pl_amt' => $data['pl_amt1'],
                'rh_no_case' => $data['rh_no_case1'],
                'rh_amt' => $data['rh_amt1'],
                'shg_no_case' => $data['shg_no_case1'],
                'shg_amt' => $data['shg_amt1'],
                'tot_inv_of_curr_yr_no_case' => $data['tot_inv_of_curr_yr_no_case1'],
                'tot_inv_of_curr_yr_amt' => $data['tot_inv_of_curr_yr_amt1'],
                'tot_inv_of_pre_yr_no_case' => $data['tot_inv_of_pre_yr_no_case1'],
                'tot_inv_of_pre_yr_amt' => $data['tot_inv_of_pre_yr_amt1'],
                'created_by' => $_SESSION['login']->user_id,
                'created_at' => date('Y-m-d h:i:s'),
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->insert('td_fort_inv', $input);
        }
        if ($data['id'] > 0) {
            $prog_input = array(
                'fm_no_case' => $data['fm_no_case2'],
                'fm_amt' => $data['fm_amt2'],
                'nf_no_case' => $data['nf_no_case2'],
                'nf_amt' => $data['nf_amt2'],
                'pl_no_case' => $data['pl_no_case2'],
                'pl_amt' => $data['pl_amt2'],
                'rh_no_case' => $data['rh_no_case2'],
                'rh_amt' => $data['rh_amt2'],
                'shg_no_case' => $data['shg_no_case2'],
                'shg_amt' => $data['shg_amt2'],
                'tot_inv_of_curr_yr_no_case' => $data['tot_inv_of_curr_yr_no_case2'],
                'tot_inv_of_curr_yr_amt' => $data['tot_inv_of_curr_yr_amt2'],
                'tot_inv_of_pre_yr_no_case' => $data['tot_inv_of_pre_yr_no_case2'],
                'tot_inv_of_pre_yr_amt' => $data['tot_inv_of_pre_yr_amt2'],
                'created_by' => $_SESSION['login']->user_id,
                'created_at' => date('Y-m-d h:i:s'),
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where(array(
                'ardb_id' => $data['ardb_id'],
                'target_id' => $data['target_id'],
                'return_form' => $data['return_form'],
                'return_to' => $data['return_to'],
            ));
            $this->db->update('td_fort_prograsive', $prog_input);
        } else {
            $prog_input = array(
                'ardb_id' => $data['ardb_id'],
                'entry_date' => date('Y-m-d'),
                'target_id' => $data['target_id'],
                'return_form' => $data['return_form'],
                'return_to' => $data['return_to'],
                'fm_no_case' => $data['fm_no_case2'],
                'fm_amt' => $data['fm_amt2'],
                'nf_no_case' => $data['nf_no_case2'],
                'nf_amt' => $data['nf_amt2'],
                'pl_no_case' => $data['pl_no_case2'],
                'pl_amt' => $data['pl_amt2'],
                'rh_no_case' => $data['rh_no_case2'],
                'rh_amt' => $data['rh_amt2'],
                'shg_no_case' => $data['shg_no_case2'],
                'shg_amt' => $data['shg_amt2'],
                'tot_inv_of_curr_yr_no_case' => $data['tot_inv_of_curr_yr_no_case2'],
                'tot_inv_of_curr_yr_amt' => $data['tot_inv_of_curr_yr_amt2'],
                'tot_inv_of_pre_yr_no_case' => $data['tot_inv_of_pre_yr_no_case2'],
                'tot_inv_of_pre_yr_amt' => $data['tot_inv_of_pre_yr_amt2'],
                'created_by' => $_SESSION['login']->user_id,
                'created_at' => date('Y-m-d h:i:s'),
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->insert('td_fort_prograsive', $prog_input);
        }
        if ($data['id'] > 0) {
            $brr_input = array(
                'sc' => $data['sc'],
                'st' => $data['st'],
                'obca' => $data['obca'],
                'obcb' => $data['obcb'],
                'gen' => $data['gen'],
                'total_1' => $data['total_1'],
                'marginal' => $data['marginal'],
                'small' => $data['small'],
                'big' => $data['big'],
                'sal_earner' => $data['sal_earner'],
                'bussiness' => $data['bussiness'],
                'total_2' => $data['total_2'],
                'male' => $data['male'],
                'female' => $data['female'],
                'total_3' => $data['total_3'],
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where(array(
                'ardb_id' => $data['ardb_id'],
                'target_id' => $data['target_id'],
                'return_form' => $data['return_form'],
                'return_to' => $data['return_to'],
            ));
            $this->db->update('td_fort_borr', $brr_input);
        } else {
            $brr_input = array(
                'ardb_id' => $data['ardb_id'],
                'entry_date' => date('Y-m-d'),
                'target_id' => $data['target_id'],
                'return_form' => $data['return_form'],
                'return_to' => $data['return_to'],
                'sc' => $data['sc'],
                'st' => $data['st'],
                'obca' => $data['obca'],
                'obcb' => $data['obcb'],
                'gen' => $data['gen'],
                'total_1' => $data['total_1'],
                'marginal' => $data['marginal'],
                'small' => $data['small'],
                'big' => $data['big'],
                'sal_earner' => $data['sal_earner'],
                'bussiness' => $data['bussiness'],
                'total_2' => $data['total_2'],
                'male' => $data['male'],
                'female' => $data['female'],
                'total_3' => $data['total_3'],
                'created_by' => $_SESSION['login']->user_id,
                'created_at' => date('Y-m-d h:i:s'),
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->insert('td_fort_borr', $brr_input);
        }
        return TRUE;
    }

    function delete($ardb_id, $dt) {
        $where = array(
            'ardb_id' => $ardb_id,
            'return_dt' => $dt
        );
        $this->db->where($where);
        $this->db->delete('td_investment');
        // echo $this->db->last_query()
        return true;
    }

    function forward($ardb_id, $form, $to) {
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
            'return_form' => $form,
            'return_to' => $to
        ));
        $this->db->update('td_fort_inv', $input);
        //echo $this->db->last_query();exit;
        return true;
    }

    function reject($ardb_id, $dt) {
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
                'ho_fwd_by' => '',
                'ho_fwd_at' => ''
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
                'ho_fwd_by' => '',
                'ho_fwd_at' => '',
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
                'ho_fwd_by' => '',
                'ho_fwd_at' => '',
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
            'return_dt' => $dt
        ));
        $this->db->update('td_fort_inv', $input);
//        echo $this->db->last_query();
//        exit;
        return true;
    }

    // FORTNIGHT REPORT
//    function get_report_details($form_date, $to_date) {
    function get_report_details($ardb_id) {
        $fwd_data = $_SESSION['user_type'] == 'U' ? 'f.ho_fwd_data' : ($_SESSION['user_type'] == 'P' ? 'f.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'f.ho_approve_2' : ''));
        $this->db->select('f.ardb_id, a.name, f.return_form, f.return_to, f.sector_id, f.tot_colc, f.recov_per, ' . $fwd_data . ' as fwd_data');
        $this->db->where(array(
//            'f.return_dt >=' => $form_date,
//            'f.return_dt <=' => $to_date,
            'f.ardb_id' => $ardb_id,
            'f.fwd_data' => 'Y',
            'f.approve_1' => 'Y',
            'f.approve_2' => 'Y'
        ));
        $_SESSION['user_type'] == 'V' ? $this->db->where(array('f.ho_approve_1' => 'Y')) : '';
        $this->db->join('mm_ardb_ho a', 'f.ardb_id=a.id');
        $this->db->order_by('f.return_form, f.return_to');
        $query = $this->db->get('td_fort_dr_col f');
//        echo $this->db->last_query();
//        exit;
        return $query->result();
    }

    function get_report_details_edit($ardb_id, $frm_dt, $to_dt, $sec_id) {
        $this->db->where(array('ardb_id' => $ardb_id, 'return_form ' => $frm_dt, 'return_to' => $to_dt, 'sector_id' => $sec_id));
        $_SESSION['user_type'] == 'P' ? $this->db->where(array('fwd_data' => 'Y')) : ($_SESSION['user_type'] == 'V' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y')) : '');
        $query = $this->db->get('td_fort_dr_col');
        return $query->result();
    }

    function get_fort_dr_report($ardb_id, $frm_dt, $to_dt) {
        $this->db->where(array('ardb_id' => $ardb_id, 'DATE_FORMAT(return_form, "%Y-%m-%d")=' => $frm_dt, 'DATE_FORMAT(return_to, "%Y-%m-%d")=' => $to_dt));
        $_SESSION['user_type'] == 'P' ? $this->db->where(array('fwd_data' => 'Y')) : ($_SESSION['user_type'] == 'V' ? $this->db->where(array('fwd_data' => 'Y', 'approve_1' => 'Y')) : '');
        $query = $this->db->get('vw_fort_dr');
        return $query->result();
    }

    function report_save($data) {
//        echo '<pre>';
//        var_dump($data);
//        exit;
        if ($data['id'] > 0) {
            $dmd_input = array(
                'pri_adv_rec' => $data['pri_adv_rec'],
                'gross_tot_dmd' => $data['gross_tot_dmd'],
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where('id', $data['dmd_id']);
            $this->db->update('td_fort_dr_dmd', $dmd_input);

            $col_input = array(
                'pri_od' => $data['col_prn_od'],
                'pri_cr' => $data['col_prn_cr'],
                'pri_adv' => $data['col_prn_adv'],
                'pri_tot' => $data['col_prn_tot'],
                'int_od' => $data['col_int_od'],
                'int_cr' => $data['col_int_cr'],
                'int_tot' => $data['col_int_tot'],
                'tot_colc' => $data['tot_colc'],
                'recov_per' => $data['recov_per'],
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where(array(
                'ardb_id' => $data['ardb_id'],
                'sector_id' => $data['sector_id'],
                'dmd_id' => $data['dmd_id'],
                'return_form' => $data['frm_dt'],
                'return_to' => $data['to_dt'],
            ));
            $this->db->update('td_fort_dr_col', $col_input);

            $prog_input = array(
                'pri_od' => $data['pro_pri_od'],
                'pri_cr' => $data['pro_pri_cr'],
                'pri_adv' => $data['pro_pri_adv'],
                'pri_tot' => $data['pro_pri_tot'],
                'int_od' => $data['pro_int_od'],
                'int_cr' => $data['pro_int_cr'],
                'int_tot' => $data['pro_int_tot'],
                'tot_colc' => $data['pro_tot_colc'],
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where(array(
                'ardb_id' => $data['ardb_id'],
                'sector_id' => $data['sector_id'],
                'dmd_id' => $data['dmd_id'],
                'return_form' => $data['frm_dt'],
                'return_to' => $data['to_dt'],
            ));
            $this->db->update('td_fort_dr_prog', $prog_input);
        } else {
            $dmd_input = array(
                'pri_adv_rec' => $data['pri_adv_rec'],
                'gross_tot_dmd' => $data['gross_tot_dmd'],
                'modified_by' => $_SESSION['login']->user_id
            );
            $this->db->where('id', $data['dmd_id']);
            $this->db->update('td_fort_dr_dmd', $dmd_input);

            $col_input = array(
                'ardb_id' => $data['ardb_id'],
                'sector_id' => $data['sector_id'],
                'dmd_id' => $data['dmd_id'],
                'entry_date' => date('Y-m-d'),
                'return_form' => $data['frm_dt'],
                'return_to' => $data['to_dt'],
                'pri_od' => $data['col_prn_od'],
                'pri_cr' => $data['col_prn_cr'],
                'pri_adv' => $data['col_prn_adv'],
                'pri_tot' => $data['col_prn_tot'],
                'int_od' => $data['col_int_od'],
                'int_cr' => $data['col_int_cr'],
                'int_tot' => $data['col_int_tot'],
                'tot_colc' => $data['tot_colc'],
                'recov_per' => $data['recov_per'],
                'created_by' => $_SESSION['login']->user_id,
                'created_at' => date('Y-m-d h:i:s')
            );
            $this->db->insert('td_fort_dr_col', $col_input);

            $prog_input = array(
                'ardb_id' => $data['ardb_id'],
                'sector_id' => $data['sector_id'],
                'dmd_id' => $data['dmd_id'],
                'entry_date' => date('Y-m-d'),
                'return_form' => $data['frm_dt'],
                'return_to' => $data['to_dt'],
                'pri_od' => $data['pro_pri_od'],
                'pri_cr' => $data['pro_pri_cr'],
                'pri_adv' => $data['pro_pri_adv'],
                'pri_tot' => $data['pro_pri_tot'],
                'int_od' => $data['pro_int_od'],
                'int_cr' => $data['pro_int_cr'],
                'int_tot' => $data['pro_int_tot'],
                'tot_colc' => $data['pro_tot_colc'],
                'created_by' => $_SESSION['login']->user_id,
                'created_at' => date('Y-m-d h:i:s')
            );
            $this->db->insert('td_fort_dr_prog', $prog_input);
        }
        return TRUE;
    }

    function report_forward($ardb_id, $frm_dt, $to_dt, $sector_id) {
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
        if ($sector_id != '' && $sector_id > 0) {
            $this->db->where(array(
                'ardb_id' => $ardb_id,
                'return_form' => $frm_dt,
                'return_to' => $to_dt,
                'sector_id' => $sector_id
            ));
        } else {
            $this->db->where(array(
                'ardb_id' => $ardb_id,
                'return_form' => $frm_dt,
                'return_to' => $to_dt
            ));
        }
        $this->db->update('td_fort_dr_col', $input);
        return true;
    }

    function report_reject($ardb_id, $form, $to) {
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
                'ho_fwd_by' => '',
                'ho_fwd_at' => ''
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
                'ho_fwd_by' => '',
                'ho_fwd_at' => '',
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
                'ho_fwd_by' => '',
                'ho_fwd_at' => '',
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
            'return_form' => $form,
            'return_to' => $to
        ));
        $this->db->update('td_fort_inv', $input);
//        echo $this->db->last_query();
//        exit;
        return true;
    }

    function get_report($form_date, $to_date, $sector_id) {
//	$this->db->where();
//	$sql = 'SELECT a.ardb_id, b.name, a.return_dt, a.report_type, SUM(a.dmd_prn_od)dmd_prn_od, SUM(a.dmd_prn_cr)dmd_prn_cr, '
//		. 'SUM(a.dmd_prn_tot)dmd_prn_tot, SUM(a.dmd_int_od)dmd_int_od, SUM(a.dmd_int_cr)dmd_int_cr, SUM(a.dmd_int_tot)dmd_int_tot, '
//		. 'SUM(a.tot_dmd)tot_dmd, SUM(a.col_prn_od)col_prn_od, SUM(a.col_prn_cr)col_prn_cr, SUM(a.col_prn_adv)col_prn_adv, SUM(a.col_prn_tot)col_prn_tot, '
//		. 'SUM(a.col_int_od)col_int_od, SUM(a.col_int_cr)col_int_cr, SUM(a.col_int_tot)col_int_tot, SUM(a.tot_colc)tot_colc, SUM(a.recov_per)recov_per, '
//		. 'SUM(a.prv_yr_dmd_prn)prv_yr_dmd_prn, SUM(a.prv_yr_dmd_int)prv_yr_dmd_int, SUM(a.prv_yr_dmd_tot)prv_yr_dmd_tot, SUM(a.prv_yr_col_prn)prv_yr_col_prn, '
//		. 'SUM(a.prv_yr_col_int)prv_yr_col_int, SUM(a.prv_yr_col_tot)prv_yr_col_tot, SUM(a.col_per)col_per, SUM(a.tot_no_ac_dmd)tot_no_ac_dmd, SUM(a.tot_no_ac_od_dmd)tot_no_ac_od_dmd, '
//		. 'SUM(a.tot_no_ac_curr_dmd)tot_no_ac_curr_dmd, SUM(a.tot_no_ac_col)tot_no_ac_col, SUM(a.tot_no_ac_od_col)tot_no_ac_od_col, SUM(a.tot_no_ac_curr_col)tot_no_ac_curr_col, '
//		. 'SUM(a.tot_no_ac_prog)tot_no_ac_prog, SUM(a.tot_no_ac_od_prog)tot_no_ac_od_prog, SUM(a.tot_no_ac_curr_prog)tot_no_ac_curr_prog '
//		. 'FROM td_fortnight a '
//		. 'JOIN mm_ardb_ho b ON a.ardb_id=b.id '
//		. 'WHERE a.return_dt >=' . $form_date . ' AND a.return_dt <=' . $to_date . ' AND a.report_type=' . $report_type . ' '
//		. 'GROUP BY a.ardb_id, a.report_type, b.name, a.return_dt';
        $this->db->select('a.*, b.name');
        $this->db->where(array(
            'a.return_form >=' => $form_date,
            'a.return_to <=' => $to_date,
            'a.sector_id' => $sector_id
        ));
        $this->db->join('mm_ardb_ho b', 'a.ardb_id=b.id');
        $this->db->order_by('b.name');
        $query = $this->db->get('vw_fort_dr a');
        return $query->result();
    }

    function get_inv_report($form_date, $to_date) {
        $this->db->select('a.*, b.name');
        $this->db->where(array(
            'a.return_dt >=' => $form_date,
            'a.return_dt <=' => $to_date
        ));
        $this->db->join('mm_ardb_ho b', 'a.ardb_id=b.id');
        $query = $this->db->get('td_investment a');
        return $query->result();
    }

    // LOAN ISSUE TARGET
    function target_details($ardb_id, $id) {
        $this->db->where(array(
            'ardb_id' => $ardb_id,
            'frm_fn_year' => CURRENT_YEAR,
            'to_fn_year' => NEXT_YEAR
        ));
        if ($id > 0) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get('td_fort_target');
        return $query->result();
    }

    // LOAN ISSUE PROGRASIVE
    function get_prog_details($ardb_id, $form, $to) {
        $this->db->where(array('ardb_id' => $ardb_id, 'return_form' => $form, 'return_to' => $to));
//        $this->db->order_by('entry_date DESC');
//        $this->db->limit('1');
        $query = $this->db->get('td_fort_prograsive');
        return $query->result();
    }

    // LOAN ISSUE DETAILS
    function get_during_fortnight_details($ardb_id, $from, $to) {
        $this->db->select('a.*, b.sc, b.st, b.obca, b.obcb, b.gen, b.total_1, b.marginal, b.small, b.big, b.sal_earner, b.bussiness, b.total_2, b.male, b.female, b.total_3');
        $this->db->where(array(
            'a.ardb_id' => $ardb_id,
            'a.return_form' => $from,
            'a.return_to' => $to
        ));
        $this->db->join('td_fort_borr b', 'a.ardb_id=b.ardb_id AND a.return_form=b.return_form AND a.return_to=b.return_to');
        $query = $this->db->get('td_fort_inv a');
        return $query->result();
    }

    function get_forward_details($ardb_id, $form, $to) {
        $fwd_data = $_SESSION['user_type'] == 'P' ? 'a.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'a.ho_approve_2' : 'a.ho_fwd_data');
        $this->db->select('a.ardb_id, a.return_form, a.return_to, a.fm_no_case, a.fm_amt, a.nf_no_case, a.nf_amt, '
                . 'a.pl_no_case, a.pl_amt, a.rh_no_case, a.rh_amt, a.shg_no_case, a.shg_amt, a.tot_inv_of_curr_yr_no_case, ' . $fwd_data . ' as fwd_data, '
                . 'a.tot_inv_of_curr_yr_amt, a.tot_inv_of_pre_yr_no_case, a.tot_inv_of_pre_yr_amt, b.fm_no_case fm_no_case1, '
                . 'b.fm_amt fm_amt1, b.nf_no_case nf_no_case1, b.nf_amt nf_amt1, b.pl_no_case pl_no_case1, b.pl_amt pl_amt1, '
                . 'b.rh_no_case rh_no_case1, b.rh_amt rh_amt1, b.shg_no_case shg_no_case1, b.shg_amt shg_amt1, b.tot_inv_of_curr_yr_no_case tot_inv_of_curr_yr_no_case1, '
                . 'b.tot_inv_of_curr_yr_amt tot_inv_of_curr_yr_amt1, b.tot_inv_of_pre_yr_no_case tot_inv_of_pre_yr_no_case1, b.tot_inv_of_pre_yr_amt tot_inv_of_pre_yr_amt1, '
                . 'c.sc, c.st, c.obca, c.obcb, c.gen, c.total_1, c.marginal, c.small, c.big, '
                . 'c.sal_earner, c.bussiness, c.total_2, c.male, c.female, c.total_3');
        $this->db->where(array(
            'a.ardb_id' => $ardb_id,
            'a.return_form' => $form,
            'a.return_to' => $to
        ));
        $this->db->join('td_fort_prograsive b', 'a.ardb_id=b.ardb_id AND a.return_form=b.return_form AND a.return_to=a.return_to');
        $this->db->join('td_fort_borr c', 'a.ardb_id=c.ardb_id AND a.return_form=c.return_form AND a.return_to=c.return_to');
        $query = $this->db->get('td_fort_inv a');
        return $query->result();
    }

    function get_forward_details_report($ardb_id, $form, $to) {
        $fwd_data = $_SESSION['user_type'] == 'P' ? 'a.ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'a.ho_approve_2' : 'a.ho_fwd_data');
        $this->db->select('a.ardb_id, a.return_form, a.return_to, a.fm_no_case, a.fm_amt, a.nf_no_case, a.nf_amt, '
                . 'a.pl_no_case, a.pl_amt, a.rh_no_case, a.rh_amt, a.shg_no_case, a.shg_amt, a.tot_inv_of_curr_yr_no_case, ' . $fwd_data . ' as fwd_data, '
                . 'a.tot_inv_of_curr_yr_amt, a.tot_inv_of_pre_yr_no_case, a.tot_inv_of_pre_yr_amt, b.fm_no_case fm_no_case1, '
                . 'b.fm_amt fm_amt1, b.nf_no_case nf_no_case1, b.nf_amt nf_amt1, b.pl_no_case pl_no_case1, b.pl_amt pl_amt1, '
                . 'b.rh_no_case rh_no_case1, b.rh_amt rh_amt1, b.shg_no_case shg_no_case1, b.shg_amt shg_amt1, b.tot_inv_of_curr_yr_no_case tot_inv_of_curr_yr_no_case1, '
                . 'b.tot_inv_of_curr_yr_amt tot_inv_of_curr_yr_amt1, b.tot_inv_of_pre_yr_no_case tot_inv_of_pre_yr_no_case1, b.tot_inv_of_pre_yr_amt tot_inv_of_pre_yr_amt1, '
                . 'c.sc, c.st, c.obca, c.obcb, c.gen, c.total_1, c.marginal, c.small, c.big, '
                . 'c.sal_earner, c.bussiness, c.total_2, c.male, c.female, c.total_3, d.name');
        $this->db->where(array(
            'a.ardb_id' => $ardb_id,
            'a.return_form >=' => $form,
            'a.return_to <=' => $to
        ));
        $this->db->join('td_fort_prograsive b', 'a.ardb_id=b.ardb_id AND a.return_form=b.return_form AND a.return_to=a.return_to');
        $this->db->join('td_fort_borr c', 'a.ardb_id=c.ardb_id AND a.return_form=c.return_form AND a.return_to=c.return_to');
        $this->db->join('mm_ardb_ho d', 'a.ardb_id=d.id');
        $query = $this->db->get('td_fort_inv a');
        return $query->result();
    }

    // DEMAND AND RECOVERY
    function get_approve_report_details($ardb_id, $frm_dt, $to_dt) {
        $fwd_data = $_SESSION['user_type'] == 'P' ? 'ho_approve_1' : ($_SESSION['user_type'] == 'V' ? 'ho_approve_2' : '');
        $this->db->distinct();
        $this->db->select('ardb_id, return_form, return_to, sum(if(' . $fwd_data . '="Y", 1, 0 )) as fwd_status');
        if ($frm_dt > 0 && $to_dt > 0) {
            $this->db->where(array('ardb_id' => $ardb_id, 'ho_fwd_data' => 'Y', 'return_form ' => $frm_dt, 'return_to' => $to_dt));
        } else {
            $this->db->where(array('ardb_id' => $ardb_id, 'fwd_data' => 'Y', 'approve_1' => 'Y', 'approve_2' => 'Y', 'ho_fwd_data' => 'Y'));
        }

        if ($_SESSION['user_type'] == 'V') {
            $this->db->where('ho_approve_1', 'Y');
        }
        $this->db->group_by('ardb_id, return_form, return_to');
        $this->db->order_by('return_form, return_to');
        $query = $this->db->get('td_fort_dr_col');
        return $query->result();
    }

    // CONSOLIDATED REPORT
    function get_report_con($form_date, $to_date) {
        $sql = 'SELECT a.ardb_id, b.name, a.return_form, a.return_to, SUM(a.dmd_prn_od)dmd_prn_od, SUM(a.dmd_prn_cr)dmd_prn_cr, '
                . 'SUM(a.dmd_prn_tot)dmd_prn_tot, SUM(a.dmd_int_od)dmd_int_od, SUM(a.dmd_int_cr)dmd_int_cr, SUM(a.dmd_int_tot)dmd_int_tot, '
                . 'SUM(a.tot_dmd)tot_dmd, SUM(a.col_prn_od)col_prn_od, SUM(a.col_prn_cr)col_prn_cr, SUM(a.col_prn_adv)col_prn_adv, SUM(a.col_prn_tot)col_prn_tot, '
                . 'SUM(a.col_int_od)col_int_od, SUM(a.col_int_cr)col_int_cr, SUM(a.col_int_tot)col_int_tot, SUM(a.tot_colc)tot_colc, SUM(a.recov_per)recov_per '
                . 'FROM vw_fort_dr a '
                . 'JOIN mm_ardb_ho b ON a.ardb_id=b.id '
                . 'WHERE DATE_FORMAT(a.return_form, "%Y-%m-%d")>= "' . $form_date . '" AND DATE_FORMAT(a.return_to, "%Y-%m-%d")<= "' . $to_date . '" '
                . 'GROUP BY a.ardb_id, b.name, a.return_form, a.return_to';
        $query = $this->db->query($sql);
//        echo $this->db->last_query();
//        exit;
        return $query->result();
    }

    function get_demand_prin_details_con($ardb_id, $frm_dt, $to_dt) {
        $sql = 'SELECT sum(od_farm)od_farm,sum(cr_farm)cr_farm,sum(od_non_farm)od_non_farm,sum(cr_non_farm)cr_non_farm,sum(od_shg)od_shg,sum(cr_shg)cr_shg,sum(rh_nhb_od)rh_nhb_od,sum(rh_nhb_cr)rh_nhb_cr,sum(rh_nb_od)rh_nb_od,sum(rh_nb_cr)rh_nb_cr '
                . 'from( '
                . 'SELECT sum(dmd_prn_od) od_farm,sum(dmd_prn_cr)cr_farm,0 od_non_farm,0 cr_non_farm,0 od_shg,0 cr_shg,0 rh_nhb_od,0 rh_nhb_cr,0 rh_nb_od,0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 1 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, sum(dmd_prn_od) od_non_farm, sum(dmd_prn_cr) cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 2 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm,0 cr_farm,0 od_non_farm,0 cr_non_farm,sum(dmd_prn_od) od_shg,sum(dmd_prn_cr) cr_shg,0 rh_nhb_od,0 rh_nhb_cr,0 rh_nb_od,0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 3 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, sum(dmd_prn_od) rh_nhb_od, sum(dmd_prn_cr) rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 4 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm,0 cr_farm,0 od_non_farm,0 cr_non_farm,0 od_shg,0 cr_shg,0 rh_nhb_od,0 rh_nhb_cr,sum(dmd_prn_od) rh_nb_od,sum(dmd_prn_cr) rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 5 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . ')a';
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_demand_int_details_con($ardb_id, $frm_dt, $to_dt) {
        $sql = 'SELECT sum(od_farm)od_farm, sum(cr_farm)cr_farm, sum(od_non_farm)od_non_farm, sum(cr_non_farm)cr_non_farm, sum(od_shg)od_shg, sum(cr_shg)cr_shg, sum(rh_nhb_od)rh_nhb_od, sum(rh_nhb_cr)rh_nhb_cr, sum(rh_nb_od)rh_nb_od, sum(rh_nb_cr)rh_nb_cr '
                . 'from( '
                . 'SELECT sum(dmd_int_od) od_farm, sum(dmd_int_cr)cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 1 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, sum(dmd_int_od) od_non_farm, sum(dmd_int_cr) cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 2 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, sum(dmd_int_od) od_shg, sum(dmd_int_cr) cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 3 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, sum(dmd_int_od) rh_nhb_od, sum(dmd_int_cr) rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 4 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, sum(dmd_int_od) rh_nb_od, sum(dmd_int_cr) rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 5 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . ')a';
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_col_pri_details_con($ardb_id, $frm_dt, $to_dt) {
        $sql = 'SELECT sum(od_farm)od_farm, sum(cr_farm)cr_farm, sum(adv_farm)adv_farm, sum(od_non_farm)od_non_farm, sum(cr_non_farm)cr_non_farm, sum(adv_non_farm)adv_non_farm, sum(od_shg)od_shg, sum(cr_shg)cr_shg, sum(adv_shg)adv_shg, sum(rh_nhb_od)rh_nhb_od, sum(rh_nhb_cr)rh_nhb_cr, sum(rh_nhb_adv)rh_nhb_adv, sum(rh_nb_od)rh_nb_od, sum(rh_nb_cr)rh_nb_cr, sum(rh_nb_adv)rh_nb_adv '
                . 'from( '
                . 'SELECT sum(col_prn_od) od_farm, sum(col_prn_cr)cr_farm, sum(col_prn_adv)adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 1 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, sum(dmd_int_od) od_non_farm, sum(dmd_int_cr) cr_non_farm, sum(col_prn_adv)adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 2 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, sum(dmd_int_od) od_shg, sum(dmd_int_cr) cr_shg, sum(col_prn_adv)adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 3 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, sum(dmd_int_od) rh_nhb_od, sum(dmd_int_cr) rh_nhb_cr, sum(col_prn_adv)rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 4 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, sum(dmd_int_od) rh_nb_od, sum(dmd_int_cr) rh_nb_cr, sum(col_prn_adv)rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 5 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . ')a';
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_col_int_details_con($ardb_id, $frm_dt, $to_dt) {
        $sql = 'SELECT sum(od_farm)od_farm, sum(cr_farm)cr_farm, sum(od_non_farm)od_non_farm, sum(cr_non_farm)cr_non_farm, sum(od_shg)od_shg, sum(cr_shg)cr_shg, sum(rh_nhb_od)rh_nhb_od, sum(rh_nhb_cr)rh_nhb_cr, sum(rh_nb_od)rh_nb_od, sum(rh_nb_cr)rh_nb_cr '
                . 'from( '
                . 'SELECT sum(col_int_od) od_farm, sum(col_int_cr)cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 1 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, sum(col_int_od) od_non_farm, sum(col_int_cr) cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 2 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, sum(col_int_od) od_shg, sum(col_int_cr) cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 3 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, sum(col_int_od) rh_nhb_od, sum(col_int_cr) rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 4 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, sum(col_int_od) rh_nb_od, sum(col_int_cr) rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 5 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . ')a';
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_prog_pri_details_con($ardb_id, $frm_dt, $to_dt) {
        $dif_yr = date('Y') - date('Y', strtotime($frm_dt));
//        $dif_yr = $dif_yr > 0 ? $dif_yr : ($dif_yr == 0 ? 1 : 0);
        if (date('Ymd', strtotime($frm_dt)) <= date('Y') . END_ACC_DM && date('Ymd', strtotime($frm_dt)) >= (date('Y') - $dif_yr) . '0401') {
            $frm_dt = (date('Y') - $dif_yr) . '-04-01';
        } elseif (date('Ymd', strtotime($frm_dt)) <= (date('Y') - $dif_yr) . '0401' && date('Ymd', strtotime($frm_dt)) >= (date('Y') - ($dif_yr + 1)) . '0401') {
            $frm_dt = (date('Y') - ($dif_yr + 1)) . '-04-01';
        }
        $sql = 'SELECT sum(od_farm)od_farm, sum(cr_farm)cr_farm, sum(adv_farm)adv_farm, sum(od_non_farm)od_non_farm, sum(cr_non_farm)cr_non_farm, sum(adv_non_farm)adv_non_farm, sum(od_shg)od_shg, sum(cr_shg)cr_shg, sum(adv_shg)adv_shg, sum(rh_nhb_od)rh_nhb_od, sum(rh_nhb_cr)rh_nhb_cr, sum(rh_nhb_adv)rh_nhb_adv, sum(rh_nb_od)rh_nb_od, sum(rh_nb_cr)rh_nb_cr, sum(rh_nb_adv)rh_nb_adv '
                . 'from( '
                . 'SELECT sum(col_prn_od) od_farm, sum(col_prn_cr)cr_farm, sum(col_prn_adv)adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 1 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, sum(dmd_int_od) od_non_farm, sum(dmd_int_cr) cr_non_farm, sum(col_prn_adv)adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 2 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, sum(dmd_int_od) od_shg, sum(dmd_int_cr) cr_shg, sum(col_prn_adv)adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 3 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, sum(dmd_int_od) rh_nhb_od, sum(dmd_int_cr) rh_nhb_cr, sum(col_prn_adv)rh_nhb_adv, 0 rh_nb_od, 0 rh_nb_cr, 0 rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 4 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 adv_farm, 0 od_non_farm, 0 cr_non_farm, 0 adv_non_farm, 0 od_shg, 0 cr_shg, 0 adv_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nhb_adv, sum(dmd_int_od) rh_nb_od, sum(dmd_int_cr) rh_nb_cr, sum(col_prn_adv)rh_nb_adv '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 5 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . ')a';
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_prog_int_details_con($ardb_id, $frm_dt, $to_dt) {
        $dif_yr = date('Y') - date('Y', strtotime($frm_dt));
//        $dif_yr = $dif_yr > 0 ? $dif_yr : ($dif_yr == 0 ? 1 : 0);
        if (date('Ymd', strtotime($frm_dt)) <= date('Y') . END_ACC_DM && date('Ymd', strtotime($frm_dt)) >= (date('Y') - $dif_yr) . '0401') {
            $frm_dt = (date('Y') - $dif_yr) . '-04-01';
        } elseif (date('Ymd', strtotime($frm_dt)) <= (date('Y') - $dif_yr) . '0401' && date('Ymd', strtotime($frm_dt)) >= (date('Y') - ($dif_yr + 1)) . '0401') {
            $frm_dt = (date('Y') - ($dif_yr + 1)) . '-04-01';
        }
        $sql = 'SELECT sum(od_farm)od_farm, sum(cr_farm)cr_farm, sum(od_non_farm)od_non_farm, sum(cr_non_farm)cr_non_farm, sum(od_shg)od_shg, sum(cr_shg)cr_shg, sum(rh_nhb_od)rh_nhb_od, sum(rh_nhb_cr)rh_nhb_cr, sum(rh_nb_od)rh_nb_od, sum(rh_nb_cr)rh_nb_cr '
                . 'from( '
                . 'SELECT sum(col_int_od) od_farm, sum(col_int_cr)cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 1 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, sum(col_int_od) od_non_farm, sum(col_int_cr) cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 2 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, sum(col_int_od) od_shg, sum(col_int_cr) cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 3 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, sum(col_int_od) rh_nhb_od, sum(col_int_cr) rh_nhb_cr, 0 rh_nb_od, 0 rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 4 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . 'UNION '
                . 'SELECT 0 od_farm, 0 cr_farm, 0 od_non_farm, 0 cr_non_farm, 0 od_shg, 0 cr_shg, 0 rh_nhb_od, 0 rh_nhb_cr, sum(col_int_od) rh_nb_od, sum(col_int_cr) rh_nb_cr '
                . 'FROM vw_fort_dr '
                . 'where sector_id = 5 '
                . 'and DATE_FORMAT(return_form, "%Y-%m-%d") >= "' . $frm_dt . '" AND return_to <= "' . $to_dt . '" '
                . 'and ardb_id = ' . $ardb_id . ' '
                . ')a';
        $query = $this->db->query($sql);
        return $query->result();
    }

    function inv_report_con($form_date, $to_date) {
        $this->db->select('a.*, b.name');
        $this->db->where(array(
            'a.return_form >=' => $form_date,
            'a.return_to <=' => $to_date
        ));
        $this->db->join('mm_ardb_ho b', 'a.ardb_id=b.id');
        $this->db->order_by('b.name, a.return_form, a.return_to');
        $query = $this->db->get('td_fort_prograsive a');
        return $query->result();
    }

}

?>