<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

    public $page_data;

    public function __construct() {
        parent::__construct();
        $this->load->model('export_m');
    }


    public function index() {
        $this->load->view('dashboard/menu');
		$this->load->view('dashboard/header');
        $this->page_data['export_details'] = $this->export_m->get();
        $this->load->view('export_details', $this->page_data);
        $this->load->view('dashboard/footer');
    }

    public function export_csv() {
        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get();
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

