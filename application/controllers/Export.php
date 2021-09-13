<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

    public $page_data;

    public function __construct() {
        parent::__construct();
        $this->load->model('export_m');
        $this->load->helper('wbcardb');
        $this->load->model('Master');
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
        $export_details = $this->export_m->get("td_fridy_rtn",$this->session->userdata['login']->br_id);
        $title = array("ARDB_Id","Return Dt ", "RD", "FD", "FLEXI","MIS","OTH_DEP","IBSD","TOT_DEP_MOBILISD","CASH_IN_HND","OTH_BNK","IBSD_LOAN","DEP_LOAN","REMMIT_WBSCARDB","REMMIT_WBSCARDB_EXCESS","TOT_DEPLOY_FUND","IBSD");
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                // $status = $employee->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($export->ardb_id, $export->week_dt,$export->rd, $export->fd, $export->flexi_sb, $export->mis,$export->other_dep,$export->ibsd,$export->total_dep_mob,$export->cash_in_hand,$export->other_bank,$export->ibsd_loan,$export->dep_loan,$export->wbcardb_remit_slr,$export->wbcardb_remit_slr_excess,$export->total_fund_deploy,$export->ibsd_as));
            }
        }
        convert_to_csv($export_arr, 'Friday_rtn' . date('F d Y') . '.csv', ',');
    }

    public function export_invest() {
        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get("td_investment",$this->session->userdata['login']->br_id);
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
        convert_to_csv($export_arr, 'Fortnightly_Investment' . date('F d Y') . '.csv', ',');
    }

    public function export_borrow() {
        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get("td_borrower_classification",$this->session->userdata['login']->br_id);
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
        convert_to_csv($export_arr, 'Borrower_Classification' . date('F d Y') . '.csv', ',');
    }

    public function export_forthnight() {


        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get("td_fortnight",$this->session->userdata['login']->br_id);
        $title = array("ARDB_Id","Return Dt ", "Report type", "Dmd frm fin yr", "Dmd to fin yr","Dmd prn od","Dmd prn cr","
            Dmd prn tot","Dmd int od","Dmd int cr","Dmd int tot","Dot dmd","Col prn od","Col prn cr","Col prn adv"
            ,"Col prn tot","Col int od","Col int cr","Col int tot","Tot colc","Recov per","Prv yr dmd prn","Prv yr dmd int","Prv yr dmd tot","Prv yr col prn","Prv yr col int","Prv yr col tot","Col per","Tot no ac dmd","Tot no ac od dmd","Tot no ac curr dmd","Tot no ac col","Tot no ac od col","Tot no ac curr col","Tot no ac prog","Tot no ac od prog","Tot no ac curr prog");
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                // $status = $employee->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($export->ardb_id,
                 $export->return_dt,get_report_name($export->report_type),$export->dmd_frm_fin_yr,$export->dmd_to_fin_yr,$export->dmd_prn_od,$export->dmd_prn_cr,
                 $export->dmd_prn_tot,$export->dmd_int_od,$export->dmd_int_cr,
                 $export->dmd_int_tot,
                 $export->tot_dmd,
                 $export->col_prn_od,$export->col_prn_cr,$export->col_prn_adv,$export->col_prn_tot,$export->col_int_od,
                 $export->col_int_cr,
                 $export->col_int_tot,$export->tot_colc,$export->recov_per,$export->prv_yr_dmd_prn,$export->prv_yr_dmd_int,
                 $export->prv_yr_dmd_tot,$export->prv_yr_col_prn,$export->prv_yr_col_int,$export->prv_yr_col_tot,
                 $export->col_per,$export->tot_no_ac_dmd,$export->tot_no_ac_od_dmd,$export->tot_no_ac_curr_dmd,
                 $export->tot_no_ac_col,$export->tot_no_ac_od_col,$export->tot_no_ac_curr_col,$export->tot_no_ac_prog,
                 $export->tot_no_ac_od_prog,
                 $export->tot_no_ac_curr_prog

                ));

            }
        }
        convert_to_csv($export_arr, 'Forthnight_Return' . date('F d Y') . '.csv', ',');
    }

    public function export_dc() {
        $this->load->helper('csv');
        $export_arr = array();
        $export_details = $this->export_m->get("td_dc",$this->session->userdata['login']->br_id);
        $title = array("ARDB_Id","Return Dt ", "Name of Borrower", "Sex", "Block Name","Sanction Amount","Sanction Date","Application Receipt Date","Activity Name","Loan Case No.","Registration of Loan Bond No.",
                       "Registration of Loan Bond Date","Disbursement Date","Total Project Cost","Own Contribution","Land Security Area(in acres)and Values",
                       "Cultivated Area(ie area benefited with loan)","Valuation of Hypothecated including Presumption value","Net Income Generated out of Loan",
                       "Security Amount (Rs)","Memo No.","Pronote No.","Pronote Amount","Interest Rate"
                 );
        array_push($export_arr, $title);
        if (!empty($export_details)) {
            foreach ($export_details as $export) {
                array_push($export_arr, array($export->ardb_id,
                 $export->return_dt,$export->brrower_name, $export->sex, $export->block_name, $export->sanc_amt,$export->sanc_dt,
                 $export->recpt_dt,$export->activity_name,$export->loan_case_no,
                 $export->loan_bond_no,
                 $export->bond_dt,
                 $export->disb_dt,
                 $export->disb_amt,
                 $export->tot_project_cost,
                 $export->own_contr,
                 $export->land_sec_area,
                 $export->cult_area,
                 $export->valuation_hypo,
                 $export->net_income,
                 $export->sec_amt,
                 $export->repayment_yr,
                 $export->memo_no,
                 $export->pronote_no,
                 $export->pronote_amt,
                 $export->intt_rt
               
             ));
            }
        }
        convert_to_csv($export_arr, 'DC' . date('F d Y') . '.csv', ',');
    }

}

