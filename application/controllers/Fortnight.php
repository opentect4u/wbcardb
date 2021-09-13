<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fortnight extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('fortnight_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function investment() {
        $ardb_id = $_SESSION['br_id'];
        $fortnight_details = $this->fortnight_model->get_investment_view($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['fortnight_details'] = json_encode($fortnight_details);
        $this->load->view('common/header');
        $this->load->view("fortnight/view", $data);
        $this->load->view('common/footer');
    }

    function investment_entry($ardb_id) {
//        $ardb_id = $_SESSION['br_id'];
        $fr = $_GET['fr'];
        $to = $_GET['to'];
        $selected = array();
        $select_inv = array();
        $select_prog = array();
        if ($fr > 0 && $to > 0 || $fr != '' && $to != '') {
            $fortnight_details = $this->fortnight_model->get_during_fortnight_details($ardb_id, $fr, $to);
            foreach ($fortnight_details as $dt) {
                $select_inv = array(
                    'id' => 1,
                    'return_form' => $dt->return_form,
                    'return_to' => $dt->return_to,
                    'from_fin_yr' => CURRENT_YEAR,
                    'to_fin_yr' => NEXT_YEAR,
                    'prv_frm_fin_yr' => PREVIOUS_YEAR,
                    'prv_to_fin_yr' => CURRENT_YEAR,
                    'fm_no_case' => $dt->fm_no_case,
                    'no_acc_closed' => $dt->ac_closed,
                    'prog_brro_memb' => $dt->pro_bro_mem,
                    'fm_amt' => $dt->fm_amt,
                    'nf_no_case' => $dt->nf_no_case,
                    'nf_amt' => $dt->nf_amt,
                    'pl_no_case' => $dt->pl_no_case,
                    'pl_amt' => $dt->pl_amt,
                    'rh_no_case' => $dt->rh_no_case,
                    'rh_amt' => $dt->rh_amt,
                    'shg_no_case' => $dt->shg_no_case,
                    'shg_amt' => $dt->shg_amt,
                    'tot_inv_of_curr_yr_no_case' => $dt->tot_inv_of_curr_yr_no_case,
                    'tot_inv_of_curr_yr_amt' => $dt->tot_inv_of_curr_yr_amt,
                    'tot_inv_of_pre_yr_no_case' => $dt->tot_inv_of_pre_yr_no_case,
                    'tot_inv_of_pre_yr_amt' => $dt->tot_inv_of_pre_yr_amt,
                    'fwd_data' => $_SESSION['user_type'] == 'U' ? $dt->fwd_data : ($_SESSION['user_type'] == 'P' ? $dt->approve_1 : ($_SESSION['user_type'] == 'V' ? $dt->approve_2 : '')),
                    'sc' => $dt->sc,
                    'st' => $dt->st,
                    'obca' => $dt->obca,
                    'obcb' => $dt->obcb,
                    'gen' => $dt->gen,
                    'total_1' => $dt->total_1,
                    'marginal' => $dt->marginal,
                    'small' => $dt->small,
                    'big' => $dt->big,
                    'sal_earner' => $dt->sal_earner,
                    'bussiness' => $dt->bussiness,
                    'total_2' => $dt->total_2,
                    'male' => $dt->male,
                    'female' => $dt->female,
                    'total_3' => $dt->total_3
                );
            }
        }
        $target_details = $this->fortnight_model->target_details($ardb_id, $id = 0);
        foreach ($target_details as $dt) {
            $selected = array(
                'target_id' => $dt->id,
                'frm_fn_year' => $dt->frm_fn_year,
                'to_fn_year' => $dt->to_fn_year,
                'fm_no_case' => $dt->fm_no_case,
                'fm_amt' => $dt->fm_amt,
                'nf_no_case' => $dt->nf_no_case,
                'nf_amt' => $dt->nf_amt,
                'pl_no_case' => $dt->pl_no_case,
                'pl_amt' => $dt->pl_amt,
                'rh_no_case' => $dt->rh_no_case,
                'rh_amt' => $dt->rh_amt,
                'shg_no_case' => $dt->shg_no_case,
                'shg_amt' => $dt->shg_amt,
                'tot_inv_of_curr_yr_no_case' => $dt->tot_inv_of_curr_yr_no_case,
                'tot_inv_of_curr_yr_amt' => $dt->tot_inv_of_curr_yr_amt,
                'tot_inv_of_pre_yr_no_case' => $dt->tot_inv_of_pre_yr_no_case,
                'tot_inv_of_pre_yr_amt' => $dt->tot_inv_of_pre_yr_amt
            );
        }
        $prog_details = $this->fortnight_model->get_prog_details($ardb_id);
        if ($prog_details) {
            foreach ($prog_details as $pr) {
                $select_prog = array(
                    'fm_no_case' => $pr->fm_no_case,
                    'fm_amt' => $pr->fm_amt,
                    'nf_no_case' => $pr->nf_no_case,
                    'nf_amt' => $pr->nf_amt,
                    'pl_no_case' => $pr->pl_no_case,
                    'pl_amt' => $pr->pl_amt,
                    'rh_no_case' => $pr->rh_no_case,
                    'rh_amt' => $pr->rh_amt,
                    'shg_no_case' => $pr->shg_no_case,
                    'shg_amt' => $pr->shg_amt,
                    'tot_inv_of_curr_yr_no_case' => $pr->tot_inv_of_curr_yr_no_case,
                    'tot_inv_of_curr_yr_amt' => $pr->tot_inv_of_curr_yr_amt,
                    'tot_inv_of_pre_yr_no_case' => $pr->tot_inv_of_pre_yr_no_case,
                    'tot_inv_of_pre_yr_amt' => $pr->tot_inv_of_pre_yr_amt
                );
            }
        }
        $data = array(
            'selected' => json_encode($selected),
            'ardb_id' => $ardb_id,
            'select_inv' => json_encode($select_inv),
            'select_prog' => json_encode($select_prog)
        );
        $this->load->view('common/header');
        $this->load->view("fortnight/entry", $data);
        $this->load->view('common/footer');
    }

    function investment_save() {
        $data = $this->input->post();
        if ($this->fortnight_model->investment_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('fortnight/investment');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('fortnight/investment');
        }
    }

    function delete($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->fortnight_model->delete($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('fortnight/investment');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('fortnight/investment');
        }
    }

    function approve_view() {
        $ardb_id = $_SESSION['br_id'];
        $fortnight_details = $this->fortnight_model->get_friday_details($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['fortnight_details'] = json_encode($fortnight_details);
        $this->load->view('common/header');
        $this->load->view("fortnight/approve_view", $data);
        $this->load->view('common/footer');
    }

    function view_details($ardb_id) {
        $fr = $_GET['fr'];
        $to = $_GET['to'];
//        $fortnight_details = $this->fortnight_model->get_fortnight_details_edit($ardb_id, $fr, $to);
        $fortnight_details = $this->fortnight_model->get_forward_details($ardb_id, $fr, $to);
        $target_details = $this->fortnight_model->target_details($ardb_id, $id = 0);
        $data['ardb_id'] = $ardb_id;
        $data['fortnight_details'] = json_encode($fortnight_details);
        $data['target_details'] = json_encode($target_details);
        $this->load->view('common/header');
        $this->load->view("fortnight/approve_details", $data);
        $this->load->view('common/footer');
    }

    function forward($ardb_id) {
        $fr = $_GET['fr'];
        $to = $_GET['to'];
        if ($this->fortnight_model->forward($ardb_id, $fr, $to)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
//            $_SESSION['user_type'] == 'U' ? redirect('fortnight/investment') : redirect('fortnight/approve_view');
            redirect('fortnight/investment');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'U' ? redirect('fortnight/investment') : redirect('fortnight/approve_view');
        }
    }

    function reject($ardb_id) {
        $fr = $_GET['fr'];
        $to = $_GET['to'];
        if ($this->fortnight_model->reject($ardb_id, $fr, $to)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
//            $_SESSION['user_type'] == 'U' ? redirect('friday_return') : redirect('fortnight/approve_view');
            redirect('fortnight/investment');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
//            $_SESSION['user_type'] == 'U' ? redirect('friday_return') : redirect('fortnight/approve_view');
            redirect('fortnight/investment');
        }
    }

    // FORTNIGHT RETURN REPORT ENTRY
    function report_view() {
        $ardb_id = $_SESSION['br_id'];
        $report_details = $this->fortnight_model->get_report_details($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['report_details'] = json_encode($report_details);
        $data['report_type'] = json_encode(unserialize(REPORT_TYPE));
        $this->load->view('common/header');
        $this->load->view('fortnight/report_view', $data);
        $this->load->view('common/footer');
    }

    function report_entry($ardb_id) {
        $frm_dt = $_GET['frm_dt'];
        $to_dt = $_GET['to_dt'];
        $sector_id = $_GET['sec_id'];
        $selected = array();
        if ($frm_dt > 0 && $to_dt > 0) {
            $report_details = $this->fortnight_model->get_report_details_edit($ardb_id, $frm_dt, $to_dt, $sector_id);
            foreach ($report_details as $dt) {
                $selected = array(
                    'id' => 1,
                    'return_form' => $dt->return_form,
                    'return_to' => $dt->return_to,
                    'sector_id' => $dt->sector_id,
                    'frm_fin_yr' => CURRENT_YEAR,
                    'to_fin_yr' => NEXT_YEAR,
                    'col_prn_od' => $dt->pri_od,
                    'col_prn_cr' => $dt->pri_cr,
                    'col_prn_adv' => $dt->pri_adv,
                    'col_prn_tot' => $dt->pri_tot,
                    'col_int_od' => $dt->int_od,
                    'col_int_cr' => $dt->int_cr,
                    'col_int_tot' => $dt->int_tot,
                    'tot_colc' => $dt->tot_colc,
                    'recov_per' => $dt->recov_per,
                    'fwd_data' => $dt->fwd_data
                );
            }
        }
        $data['ardb_id'] = $ardb_id;
        $data['selected'] = json_encode($selected);
        $data['report_type'] = json_encode(unserialize(REPORT_TYPE));
        $this->load->view('common/header');
        $this->load->view('fortnight/report_entry', $data);
        $this->load->view('common/footer');
    }

    function report_save() {
        $data = $this->input->post();
        if ($this->fortnight_model->report_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('fortnight/report_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('fortnight/report_view');
        }
    }

    function approve_report_view() {
        $ardb_id = $_SESSION['br_id'];
        $report_details = $this->fortnight_model->get_approve_report_details($ardb_id, $frm_dt = 0, $to_dt = 0);
        $data['ardb_id'] = $ardb_id;
        $data['report_details'] = json_encode($report_details);
        $this->load->view('common/header');
        $this->load->view("fortnight/approve_report_view", $data);
        $this->load->view('common/footer');
    }

    function report_view_details($ardb_id) {
        $frm_dt = $_GET['frm_dt'];
        $to_dt = $_GET['to_dt'];
        $report_details = $this->fortnight_model->get_fort_dr_report($ardb_id, $frm_dt, $to_dt);
        $fwd_status = $this->fortnight_model->get_approve_report_details($ardb_id, $frm_dt, $to_dt);
//        var_dump($report_details);
//        exit;
        $data['ardb_id'] = $ardb_id;
        $data['frm_dt'] = date('d/m/Y', strtotime(str_replace('-', '/', $frm_dt)));
        $data['to_dt'] = date('d/m/Y', strtotime(str_replace('-', '/', $to_dt)));
        $data['report_details'] = json_encode($report_details);
        $data['fwd_status'] = json_encode($fwd_status);
        $this->load->view('common/header');
        $this->load->view("fortnight/approve_report_details", $data);
        $this->load->view('common/footer');
    }

    function report_forward($ardb_id) {
        $frm_dt = $_GET['frm_dt'];
        $to_dt = $_GET['to_dt'];
        if (array_key_exists('sec_id', $_GET)) {
            $sector_id = $_GET['sec_id'];
        } else {
            $sector_id = 0;
        }
        if ($this->fortnight_model->report_forward($ardb_id, $frm_dt, $to_dt, $sector_id)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'U' ? redirect('fortnight/report_view') : redirect('fortnight/approve_report_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'U' ? redirect('fortnight/report_view') : redirect('fortnight/approve_report_view');
        }
    }

    function report_reject($ardb_id) {
        $frm_dt = $_GET['frm_dt'];
        $to_dt = $_GET['to_dt'];
        if ($this->fortnight_model->report_reject($ardb_id, $frm_dt, $to_dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'U' ? redirect('fortnight/report_view') : redirect('fortnight/approve_report_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'U' ? redirect('fortnight/report_view') : redirect('fortnight/approve_report_view');
        }
    }

    // TARGET ENTRY FOR APP L2
    function target_view() {
        $ardb_id = $_SESSION['br_id'];
        $fortnight_details = $this->fortnight_model->target_details($ardb_id, $id = 0);
        $data = array(
            'ardb_id' => $ardb_id,
            'fortnight_details' => json_encode($fortnight_details)
        );
        $this->load->view('common/header');
        $this->load->view("fortnight/target_view", $data);
        $this->load->view('common/footer');
    }

    function target_entry($ardb_id) {
        $id = $_GET['id'];
        $selected = array();
        if ($id > 0) {
            $target_details = $this->fortnight_model->target_details($ardb_id, $id);
            foreach ($target_details as $dt) {
                $selected = array(
                    'id' => $dt->id,
                    'frm_fn_year' => $dt->frm_fn_year,
                    'to_fn_year' => $dt->to_fn_year,
                    'fm_no_case' => $dt->fm_no_case,
                    'fm_amt' => $dt->fm_amt,
                    'nf_no_case' => $dt->nf_no_case,
                    'nf_amt' => $dt->nf_amt,
                    'pl_no_case' => $dt->pl_no_case,
                    'pl_amt' => $dt->pl_amt,
                    'rh_no_case' => $dt->rh_no_case,
                    'rh_amt' => $dt->rh_amt,
                    'shg_no_case' => $dt->shg_no_case,
                    'shg_amt' => $dt->shg_amt,
                    'tot_inv_of_curr_yr_no_case' => $dt->tot_inv_of_curr_yr_no_case,
                    'tot_inv_of_curr_yr_amt' => $dt->tot_inv_of_curr_yr_amt,
                    'tot_inv_of_pre_yr_no_case' => $dt->tot_inv_of_pre_yr_no_case,
                    'tot_inv_of_pre_yr_amt' => $dt->tot_inv_of_pre_yr_amt
                );
            }
        }
        $data = array(
            'selected' => json_encode($selected),
            'ardb_id' => $ardb_id
        );
        $this->load->view('common/header');
        $this->load->view("fortnight/target_entry", $data);
        $this->load->view('common/footer');
    }

    function target_save() {
        $data = $this->input->post();
        if ($this->fortnight_model->target_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('fortnight/target_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('fortnight/target_view');
        }
    }

    // DEMAND ENTRY FOR APP L2
    function demand_view() {
        $ardb_id = $_SESSION['br_id'];
        $demand_details = $this->fortnight_model->get_demand_details($ardb_id, $id = 0);
        $data = array(
            'demand_details' => json_encode($demand_details),
            'ardb_id' => $ardb_id
        );
        $this->load->view('common/header');
        $this->load->view("fortnight/demand_view", $data);
        $this->load->view('common/footer');
    }

    function demand_entry($ardb_id) {
        $id = $_GET['id'];
        $selected = array();
        if ($id > 0) {
            $demand_details = $this->fortnight_model->get_demand_details($ardb_id, $id);
            foreach ($demand_details as $dt) {
                $selected = array(
                    'id' => $dt->id,
                    'sector_id' => $dt->sector_id,
                    'frm_fn_year' => $dt->frm_fn_year,
                    'to_fn_year' => $dt->to_fn_year,
                    'pri_od' => $dt->pri_od,
                    'pri_cr' => $dt->pri_cr,
                    'pri_tot' => $dt->pri_tot,
                    'int_od' => $dt->int_od,
                    'int_cr' => $dt->int_cr,
                    'int_tot' => $dt->int_tot,
                    'tot_dmd' => $dt->tot_dmd
                );
            }
        }
        $data = array(
            'selected' => json_encode($selected),
            'ardb_id' => $ardb_id,
            'report_type' => json_encode(unserialize(REPORT_TYPE))
        );
        $this->load->view('common/header');
        $this->load->view("fortnight/demand_entry", $data);
        $this->load->view('common/footer');
    }

    function demand_save() {
        $data = $this->input->post();
        if ($this->fortnight_model->demand_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('fortnight/demand_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('fortnight/demand_view');
        }
    }

    function get_demand_details() {
        $ardb_id = $_GET['ardb_id'];
        $sector_id = $_GET['sector_id'];
        $frm_fn_yr = $_GET['frm_fn_yr'];
        $to_fin_yr = $_GET['to_fn_yr'];
        $details = $this->fortnight_model->get_demand_details_by_sector_id($ardb_id, $sector_id, $frm_fn_yr, $to_fin_yr);
        echo json_encode($details);
    }

    function get_pro_dmd_details() {
        $dmd_id = $_GET['dmd_id'];
        $ardb_id = $_GET['ardb_id'];
        $sector_id = $_GET['sector_id'];
        $frm_dt = $_GET['frm_dt'];
        $to_dt = $_GET['to_dt'];
        $flag = $_GET['flag'];
        $pro_dt = $this->fortnight_model->get_pro_dmd_details($dmd_id, $ardb_id, $sector_id, $frm_dt, $to_dt, $flag);
        echo json_encode($pro_dt);
    }

    function fort_con_report_in() {
//        $data['ardb_list'] = json_encode($this->fortnight_model->get_ardb_list());
        $data = array();
        $this->load->view('common/header');
        $this->load->view("fortnight/report_con_in", $data);
        $this->load->view('common/footer');
    }

    function fort_con_report() {
        $ardb_id = $_SESSION['br_id'];
        $form = $_POST['form_date'];
        $to = $_POST['to_date'];
//        var_dump(date('Y', strtotime($form)));
//        exit;
        $dmd_pri_dtls = $this->fortnight_model->get_demand_prin_details_con($ardb_id, $form, $to);
        $dmd_int_dtls = $this->fortnight_model->get_demand_int_details_con($ardb_id, $form, $to);
        $col_pri_dtls = $this->fortnight_model->get_col_pri_details_con($ardb_id, $form, $to);
        $col_int_dtls = $this->fortnight_model->get_col_int_details_con($ardb_id, $form, $to);
        $prog_pri_dtls = $this->fortnight_model->get_prog_pri_details_con($ardb_id, $form, $to);
        $prog_int_dtls = $this->fortnight_model->get_prog_int_details_con($ardb_id, $form, $to);
        $data = array(
            'dmd_pri_dtls' => json_encode($dmd_pri_dtls),
            'dmd_int_dtls' => json_encode($dmd_int_dtls),
            'col_pri_dtls' => json_encode($col_pri_dtls),
            'col_int_dtls' => json_encode($col_int_dtls),
            'prog_pri_dtls' => json_encode($prog_pri_dtls),
            'prog_int_dtls' => json_encode($prog_int_dtls),
            'frm_dt' => $form,
            'to_dt' => $to
        );
        $this->load->view('common/header');
        $this->load->view("fortnight/report_con", $data);
        $this->load->view('common/footer');
    }

}

?>