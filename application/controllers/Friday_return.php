<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Friday_return extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('friday_return_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function index() {
        $ardb_id = $_SESSION['br_id'];
        $friday_details = $this->friday_return_model->get_friday_details($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['friday_details'] = json_encode($friday_details);
        $this->load->view('common/header');
        $this->load->view("friday_return/view", $data);
        $this->load->view('common/footer');
    }

    function entry($ardb_id) {
        $dt = $_GET['dt'];
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
                    'fwd_data' => $dt->fwd_data
                );
            }
        }
        $data['selected'] = json_encode($selected);
        $data['ardb_id'] = $ardb_id;
        $this->load->view('common/header');
        $this->load->view("friday_return/entry", $data);
        $this->load->view('common/footer');
    }

    function save() {
        $data = $this->input->post();
        if ($this->friday_return_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('friday_return');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('friday_return');
        }
    }

    function delete($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->friday_return_model->delete($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('friday_return');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('friday_return');
        }
    }

    function approve_view() {
        $ardb_id = $_SESSION['br_id'];
        $friday_details = $this->friday_return_model->get_friday_details($ardb_id);
        $data['ardb_id'] = $ardb_id;
        $data['friday_details'] = json_encode($friday_details);
        $this->load->view('common/header');
        $this->load->view("friday_return/approve_view", $data);
        $this->load->view('common/footer');
    }

    function view_details($ardb_id) {
//        $ardb_id = 22;
        $dt = $_GET['dt'];
        $friday_details = $this->friday_return_model->get_friday_details_view($ardb_id, $dt);
//        echo '<pre>';
//        var_dump($friday_details);
//        exit;
        $data['return_dt'] = date('d/m/Y', strtotime(str_replace('-', '/', $dt)));
        $data['ardb_id'] = $ardb_id;
        $data['friday_details'] = json_encode($friday_details);
        $this->load->view('common/header');
        $this->load->view("friday_return/approve_details", $data);
        $this->load->view('common/footer');
    }

    function forward($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->friday_return_model->forward($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'U' ? redirect('friday_return') : redirect('friday_return/approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'U' ? redirect('friday_return') : redirect('friday_return/approve_view');
        }
    }

    function reject($ardb_id) {
        $dt = $_GET['dt'];
        if ($this->friday_return_model->reject($ardb_id, $dt)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            $_SESSION['user_type'] == 'U' ? redirect('friday_return') : redirect('friday_return/approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            $_SESSION['user_type'] == 'U' ? redirect('friday_return') : redirect('friday_return/approve_view');
        }
    }

}

?>