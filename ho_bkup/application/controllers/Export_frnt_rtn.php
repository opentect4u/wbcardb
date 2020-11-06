<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_frnt_rtn extends CI_Controller {

    public $page_data;

    public function __construct() {
        parent::__construct();
        $this->load->model('Export_frnt_m');
        if(!isset($this->session->userdata['login']->user_id)){
            
            redirect('Main/login');

        }
    }


    public function index() {
        $this->load->view('common/header');
        $ardb_ho          = $this->input->get('ARDB_HO');
        $page_data['export_details_frnt_rtn'] = $this->Export_frnt_m->get( $ardb_ho );
       
        $this->load->view('export_details_frnt_rtn',$page_data);
        $this->load->view('common/footer');
    }

    public function export_csv() {
        $this->load->helper('csv');
        $export_arr = array();
        $ardb_ho          = $this->input->get('ARDB_HO');
        $export_details = $this->Export_frnt_m->get( $ardb_ho );
        $title = array("ARDB_Id", "BR_ID", "SUBMIT_DT ", "RD", "FD", "FLEXI","MIS","OTH_DEP","IBSD","TOT_DEP_MOBILISD","CASH_IN_HND","OTH_BNK","IBSD_LOAN","DEP_LOAN","REMMIT_WBSCARDB","REMMIT_WBSCARDB_EXCESS","TOT_DEPLOY_FUND");
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                // $status = $employee->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($export->ARDB_ID, $export->BR_ID, $export->SUBMIT_DT, $export->RD, $export->FD, $export->FLEXI,$export->MIS,$export->OTH_DEP,$export->IBSD,$export->TOT_DEP_MOBILISD,$export->CASH_IN_HND,$export->OTH_BNK,$export->IBSD_LOAN,$export->DEP_LOAN,$export->REMMIT_WBSCARDB,$export->REMMIT_WBSCARDB_EXCESS,$export->TOT_DEPLOY_FUND));
            }
        }
        convert_to_csv($export_arr, 'friday_rtn' . date('F d Y') . '.csv', ',');
    }

}

