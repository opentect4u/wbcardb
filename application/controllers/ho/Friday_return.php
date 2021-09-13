<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Friday_return extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/friday_return_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function index() {
        $selected = array();
        $friday_details = array();
        if ($this->input->post()) {
            $selected = array(
//                'form_date' => array_key_exists('form_date', $_POST) ? $_POST['form_date'] : '',
//                'to_date' => array_key_exists('to_date', $_POST) ? $_POST['to_date'] : ''
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
//            $friday_details = $this->friday_return_model->get_friday_details($selected['form_date'], $selected['to_date']);
            $friday_details = $this->friday_return_model->get_friday_details($selected['ardb_id']);
        }
        $data['ardb_list'] = json_encode($this->friday_return_model->get_ardb_list());
        $data['friday_details'] = json_encode($friday_details);
        $data['selected'] = json_encode($selected);
        $this->load->view('common/header');
        $this->load->view("ho/friday_return/view", $data);
        $this->load->view('common/footer');
    }

    function entry($ardb_id) {
        $dt = $_GET['dt'];
        $user_type = $_SESSION['user_type'];
        $selected = array();
        if ($dt > 0 || $dt != '') {
            $friday_details = $this->friday_return_model->get_friday_details_edit($ardb_id, $dt);
            foreach ($friday_details as $dt) {
                $selected = array(
                    'id' => 1,
                    'week_dt' => $dt->week_dt,
                    'rd' => $dt->rd,
                    'fd' => $dt->fd,
                    'flexi_sb' => $dt->flexi_sb,
                    'mis' => $dt->mis,
                    'other_dep' => $dt->other_dep,
                    'ibsd' => $dt->ibsd,
                    'total_dep_mob' => $dt->total_dep_mob,
                    'cash_in_hand' => $dt->cash_in_hand,
                    'other_bank' => $dt->other_bank,
                    'ibsd_loan' => $dt->ibsd_loan,
                    'dep_loan' => $dt->dep_loan,
                    'wbcardb_remit_slr' => $dt->wbcardb_remit_slr,
                    'wbcardb_remit_slr_excess' => $dt->wbcardb_remit_slr_excess,
                    'total_fund_deploy' => $dt->total_fund_deploy,
                    'fwd_data' => $user_type == 'P' ? $dt->ho_approve_1 : ($user_type == 'V' ? $dt->ho_approve_2 : '')
                );
            }
        }
        $data['selected'] = json_encode($selected);
        $data['ardb_id'] = $ardb_id;
        $this->load->view('common/header');
        $this->load->view("ho/friday_return/entry", $data);
        $this->load->view('common/footer');
    }

    function save() {
        $data = $this->input->post();
        if ($this->friday_return_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/friday_return');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/friday_return');
        }
    }

    function delete($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->friday_return_model->delete($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/friday_return');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/friday_return');
        }
    }

    function approve_view() {
        $ardb_id = $_SESSION['br_id'];
        $friday_details = $this->friday_return_model->get_friday_details($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['friday_details'] = json_encode($friday_details);
        $this->load->view('common/header');
        $this->load->view("ho/friday_return/approve_view", $data);
        $this->load->view('common/footer');
    }

    function view_details($ardb_id) {
        $dt = $_GET['dt'];
        $friday_details = $this->friday_return_model->get_friday_details_edit($ardb_id, $dt);
        $data['ardb_id'] = $ardb_id;
        $data['return_dt'] = date('d/m/Y', strtotime(str_replace('-', '/', $dt)));
        $data['friday_details'] = json_encode($friday_details);
        $this->load->view('common/header');
        $this->load->view("ho/friday_return/approve_details", $data);
        $this->load->view('common/footer');
    }

    function forward($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->friday_return_model->forward($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'P' ? redirect('ho/friday_return') : redirect('ho/friday_return');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'P' ? redirect('ho/friday_return') : redirect('ho/friday_return');
        }
    }

    function reject($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->friday_return_model->reject($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'P' ? redirect('ho/friday_return') : redirect('ho/friday_return/approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'P' ? redirect('ho/friday_return') : redirect('ho/friday_return/approve_view');
        }
    }

    function report_in() {
//        $selected = array();
//        $data['selected'] = json_encode($selected);
        $this->load->view('common/header');
        $this->load->view("ho/friday_return/report_in");
        $this->load->view('common/footer');
    }

    function report() {
        $form_date = $this->input->post('form_date');
        $to_date = $this->input->post('to_date');
        $report_details = $this->friday_return_model->get_report($form_date, $to_date);
//        $data['ardb_id'] = 22;
        $data['form_date'] = date('d/m/Y', strtotime(str_replace('-', '/', $form_date)));
        $data['to_date'] = date('d/m/Y', strtotime(str_replace('-', '/', $to_date)));
        $data['report_details'] = json_encode($report_details);
        $this->load->view('common/header');
        $this->load->view("ho/friday_return/report", $data);
        $this->load->view('common/footer');
    }

}

?>