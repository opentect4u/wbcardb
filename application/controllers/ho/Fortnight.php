<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fortnight extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/fortnight_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function investment_view() {
        $selected = array();
        $fortnight_details = array();
        if ($this->input->post()) {
            $selected = array(
//                'form_date' => array_key_exists('form_date', $_POST) ? $_POST['form_date'] : '',
//                'to_date' => array_key_exists('to_date', $_POST) ? $_POST['to_date'] : ''
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $fortnight_details = $this->fortnight_model->get_friday_details($selected['ardb_id']);
        }
        $data['fortnight_details'] = json_encode($fortnight_details);
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($this->fortnight_model->get_ardb_list());
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/view", $data);
        $this->load->view('common/footer');
    }

    function investment_entry($ardb_id) {
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
                    'fwd_data' => $_SESSION['user_type'] == 'U' ? $dt->ho_fwd_data : ($_SESSION['user_type'] == 'P' ? $dt->ho_approve_1 : ($_SESSION['user_type'] == 'V' ? $dt->ho_approve_2 : '')),
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
        $prog_details = $this->fortnight_model->get_prog_details($ardb_id, $fr, $to);
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
        $this->load->view("ho/fortnight/entry", $data);
        $this->load->view('common/footer');
    }

    function investment_save() {
        $data = $this->input->post();
        if ($this->fortnight_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/fortnight/investment_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/fortnight/investment_view');
        }
    }

    function delete($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->fortnight_model->delete($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/fortnight/investment_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/fortnight/investment_view');
        }
    }

    function approve_view() {
        $ardb_id = $_SESSION['br_id'];
        $friday_details = $this->fortnight_model->get_friday_details($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['friday_details'] = json_encode($friday_details);
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/approve_view", $data);
        $this->load->view('common/footer');
    }

    function view_details($ardb_id) {
        $fr = $_GET['fr'];
        $to = $_GET['to'];
//        $fortnight_details = $this->fortnight_model->get_friday_details_edit($ardb_id, $dt);
        $fortnight_details = $this->fortnight_model->get_forward_details($ardb_id, $fr, $to);
        $target_details = $this->fortnight_model->target_details($ardb_id, $id = 0);
        $data['ardb_id'] = $ardb_id;
        $data['fortnight_details'] = json_encode($fortnight_details);
        $data['target_details'] = json_encode($target_details);
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/approve_details", $data);
        $this->load->view('common/footer');
    }

    function forward($ardb_id) {
        $fr = $_GET['fr'];
        $to = $_GET['to'];
        if ($this->fortnight_model->forward($ardb_id, $fr, $to)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/investment_view') : redirect('ho/fortnight/investment_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/investment_view') : redirect('ho/fortnight/investment_view');
        }
    }

    function reject($ardb_id) {
        $fr = $_GET['fr'];
        $to = $_GET['to'];
        if ($this->fortnight_model->reject($ardb_id, $fr, $to)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/investment_view') : redirect('ho/fortnight/investment_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/investment_view') : redirect('ho/fortnight/investment_view');
        }
    }

    // FORTNIGHT RETURN REPORT ENTRY
    function report_view() {
        $selected = array();
        $report_details = array();
        if ($this->input->post()) {
            $selected = array(
//                'form_date' => array_key_exists('form_date', $_POST) ? $_POST['form_date'] : '',
//                'to_date' => array_key_exists('to_date', $_POST) ? $_POST['to_date'] : ''
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $report_details = $this->fortnight_model->get_report_details($selected['ardb_id']);
        }
        $data['selected'] = json_encode($selected);
        $data['report_details'] = json_encode($report_details);
        $data['report_type'] = json_encode(unserialize(REPORT_TYPE));
        $data['ardb_list'] = json_encode($this->fortnight_model->get_ardb_list());
        $this->load->view('common/header');
        $this->load->view('ho/fortnight/report_view', $data);
        $this->load->view('common/footer');
    }

    function report_entry($ardb_id) {
        $frm_dt = $_GET['frm_dt'];
        $to_dt = $_GET['to_dt'];
        $sector_id = $_GET['sec_id'];
        $user_type = $_SESSION['user_type'];
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
                    'fwd_data' => $user_type == 'U' ? $dt->ho_fwd_data : ($user_type == 'P' ? $dt->ho_approve_1 : ($user_type == 'V' ? $dt->ho_approve_2 : ''))
                );
            }
        }
        $data['ardb_id'] = $ardb_id;
        $data['selected'] = json_encode($selected);
        $data['report_type'] = json_encode(unserialize(REPORT_TYPE));
        $this->load->view('common/header');
        $this->load->view('ho/fortnight/report_entry', $data);
        $this->load->view('common/footer');
    }

    function report_save() {
        $data = $this->input->post();
        if ($this->fortnight_model->report_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/fortnight/report_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/fortnight/report_view');
        }
    }

    function approve_report_view() {
        $selected = array();
        $report_details = array();
        if ($this->input->post()) {
            $selected = array(
//                'form_date' => array_key_exists('form_date', $_POST) ? $_POST['form_date'] : '',
//                'to_date' => array_key_exists('to_date', $_POST) ? $_POST['to_date'] : ''
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $report_details = $this->fortnight_model->get_approve_report_details($selected['ardb_id'], $frm_dt = 0, $to_dt = 0);
        }
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($this->fortnight_model->get_ardb_list());
//        $report_details = $this->fortnight_model->get_approve_report_details($ardb_id);
        $data['report_details'] = json_encode($report_details);
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/approve_report_view", $data);
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
        $data['frm_dt'] = $frm_dt;
        $data['to_dt'] = $to_dt;
        $data['report_details'] = json_encode($report_details);
        $data['fwd_status'] = json_encode($fwd_status);
        $data['report_type'] = json_encode(unserialize(REPORT_TYPE));
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/approve_report_details", $data);
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
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/approve_report_view') : redirect('ho/fortnight/report_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/approve_report_view') : redirect('ho/fortnight/report_view');
        }
    }

    function report_reject($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->fortnight_model->report_reject($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/report_view') : redirect('ho/fortnight/report_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'P' ? redirect('ho/fortnight/report_view') : redirect('ho/fortnight/report_view');
        }
    }

    // REPORT
    function report_inv_in() {
        $data['ardb_list'] = json_encode($this->fortnight_model->get_ardb_list());
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/report_inv_in", $data);
        $this->load->view('common/footer');
    }

    function report_inv() {
        $form_date = $this->input->post('form_date');
        $to_date = $this->input->post('to_date');
        $ardb_id = $this->input->post('ardb_id');
        if ($ardb_id > 0) {
            $fortnight_details = $this->fortnight_model->get_forward_details_report($ardb_id, $form_date, $to_date);
            $target_details = $this->fortnight_model->target_details($ardb_id, $id = 0);
        } else {
            $fortnight_details = $this->fortnight_model->inv_report_con($form_date, $to_date);
            $target_details = array();
        }
        $data = array(
            'fortnight_details' => json_encode($fortnight_details),
            'target_details' => json_encode($target_details),
            'form_date' => date('d/m/Y', strtotime(str_replace('-', '/', $form_date))),
            'to_date' => date('d/m/Y', strtotime(str_replace('-', '/', $to_date)))
        );
        $view = $ardb_id > 0 ? 'ho/fortnight/report_inv' : 'ho/fortnight/report_inv_con';
        $this->load->view('common/header');
        $this->load->view($view, $data);
        $this->load->view('common/footer');
    }

    function report_inv_sec_in() {
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/report_inv_sec_in");
        $this->load->view('common/footer');
    }

    function report_inv_sec() {
        $form_date = $this->input->post('form_date');
        $to_date = $this->input->post('to_date');
        $sector_id = $this->input->post('report_type');
        $fortnight_details = $this->fortnight_model->inv_report_con($form_date, $to_date);
        $data = array(
            'fortnight_details' => json_encode($fortnight_details),
//            'target_details' => json_encode($target_details),
            'form_date' => date('d/m/Y', strtotime(str_replace('-', '/', $form_date))),
            'to_date' => date('d/m/Y', strtotime(str_replace('-', '/', $to_date))),
            'sector_id' => $sector_id
        );
        $view = $sector_id > 0 ? 'ho/fortnight/report_inv_sec' : 'ho/fortnight/report_inv_con';
        $this->load->view('common/header');
        $this->load->view($view, $data);
        $this->load->view('common/footer');
    }

    function report_in() {
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/report_in");
        $this->load->view('common/footer');
    }

    function report() {
        $form_date = $this->input->post('form_date');
        $to_date = $this->input->post('to_date');
        $sector_id = $this->input->post('report_type');
        $report_details = $sector_id > 0 ? $this->fortnight_model->get_report($form_date, $to_date, $sector_id) : $this->fortnight_model->get_report_con($form_date, $to_date);
//	var_dump(unserialize(REPORT_TYPE)[$report_type]);
//	exit;
        $data = array(
            'form_date' => date('d/m/Y', strtotime(str_replace('-', '/', $form_date))),
            'to_date' => date('d/m/Y', strtotime(str_replace('-', '/', $to_date))),
            'sector_id' => $sector_id,
            'report_details' => json_encode($report_details)
        );
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/report", $data);
        $this->load->view('common/footer');
    }

    function fort_con_report_in() {
        $data['ardb_list'] = json_encode($this->fortnight_model->get_ardb_list());
        $this->load->view('common/header');
        $this->load->view("ho/fortnight/report_con_in", $data);
        $this->load->view('common/footer');
    }

    function fort_con_report() {
        $ardb_id = $_POST['ardb_id'];
        // echo $ardb_id;exit;
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
        $this->load->view("ho/fortnight/report_con", $data);
        $this->load->view('common/footer');
    }

}

?>