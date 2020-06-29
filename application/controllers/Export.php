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
        $export_details = $this->export_m->get("td_fridy_rtn");
        $title = array("ARDB_Id","Return Dt ", "RD", "FD", "FLEXI","MIS","OTH_DEP","IBSD","TOT_DEP_MOBILISD","CASH_IN_HND","OTH_BNK","IBSD_LOAN","DEP_LOAN","REMMIT_WBSCARDB","REMMIT_WBSCARDB_EXCESS","TOT_DEPLOY_FUND","IBSD");
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                // $status = $employee->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($export->ardb_id, $export->week_dt,$export->rd, $export->fd, $export->flexi_sb, $export->mis,$export->other_dep,$export->ibsd,$export->total_dep_mob,$export->cash_in_hand,$export->other_bank,$export->ibsd_loan,$export->dep_loan,$export->wbcardb_remit_slr,$export->wbcardb_remit_slr_excess,$export->total_fund_deploy,$export->ibsd_as));
            }
        }
        convert_to_csv($export_arr, 'friday_rtn' . date('F d Y') . '.csv', ',');
    }

    public function export_invest() {
        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get("td_investment");
        $title = array("ARDB_Id","Return Dt ", "From fin yr", "To fin yr", "Prv frm fin yr","Prv to fin yr","No acc closed","Prog brro memb","Farm sec case no","Farm sec amt","Non farm sec case no","Non farm sec amt","Housing sec case no","Housing sec amt","Other sec case no","Non sch inv case no","Non sch inv amt","Tot inv case no","Tot inv amt","Tot inv case no prv yr","Tot inv amt prv yr");
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                // $status = $employee->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($export->ardb_id,
                 $export->return_dt,$export->from_fin_yr, $export->to_fin_yr, $export->prv_frm_fin_yr, $export->prv_to_fin_yr,$export->no_acc_closed,$export->prog_brro_memb,$export->farm_sec_case_no,$export->farm_sec_amt,
                 $export->non_farm_sec_case_no,
                 $export->non_farm_sec_amt,
                 $export->housing_sec_case_no,
                 $export->housing_sec_amt,
                 $export->other_sec_case_no,
                 $export->non_sch_inv_case_no,
                 $export->non_sch_inv_amt,
                 $export->tot_inv_case_no,
                 $export->tot_inv_amt,
                 $export->tot_inv_case_no_prv_yr,
                 $export->tot_inv_amt_prv_yr
             ));
            }
        }
        convert_to_csv($export_arr, 'friday_Investment' . date('F d Y') . '.csv', ',');
    }

    public function export_borrow() {
        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get("td_borrower_classification");
        $title = array("ARDB_Id","Return Dt ", "sc", "st", "obc","gen","total_1","marginal","small","big","sal_earner","bussiness","total_2","male","female","total_3");
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                // $status = $employee->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($export->ardb_id,
                 $export->return_dt,$export->sc, $export->st, $export->obc, $export->gen,$export->total_1,
                 $export->marginal,$export->small,$export->big,
                 $export->sal_earner,
                 $export->bussiness,
                 $export->total_2,
                 $export->male,
                 $export->female,
                 $export->total_3
               
             ));
            }
        }
        convert_to_csv($export_arr, 'Friday_Borrower_Classification' . date('F d Y') . '.csv', ',');
    }

}

