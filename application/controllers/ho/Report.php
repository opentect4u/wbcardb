<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/************************************************************ 
 * This Controller is used for Reports                      *
 *                                                          * 
 ************************************************************/

class Report extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('ho/Process');
        $this->load->model('ho/Master');
        $this->load->model('ho/Reports');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('ardb_helper');
    }

    public function friday_ho(){                    /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt  =  $this->input->post('from_dt');

            $toDt   =  $this->input->post('to_dt');

            $data['reports'] = $this->Reports->f_get_fridayho($frmDt,$toDt);

            $this->load->view('common/header');

            $this->load->view('ho/report/friday_rtn/friday_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $this->load->view('common/header');

            $this->load->view('ho/report/friday_rtn/friday_inp.php');

            $this->load->view('common/footer');
        }
    }

    public function friday_ardb(){ 
                       /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');
            
            $ardb_id  =  $this->input->post('ardb_id');

            $data['reports'] = $this->Reports->f_get_fridayardb($frmDt,$toDt,$ardb_id);

            $this->load->view('common/header');

            $this->load->view('ho/report/friday_rtn/fridayardb_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $data['branch'] = $this->Master->get_particulars("mm_ardb_ho",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/friday_rtn/fridayardb_inp.php',$data);

            $this->load->view('common/footer');
        }
    }

    public function borrower_ho(){ 
                       /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');
            
           
            $data['reports'] = $this->Reports->f_get_borrower($frmDt,$toDt);

            $this->load->view('common/header');

            $this->load->view('ho/report/borrower/borrower_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

          //  $data['branch'] = $this->Master->get_particulars("mm_ardb_ho",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/borrower/borrower_inp.php');

            $this->load->view('common/footer');
        }
    }

    public function borrower_ardb(){ 
                       /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');
            
            $ardb_id  =  $this->input->post('ardb_id');

            $data['reports'] = $this->Reports->f_get_borrowerardb($frmDt,$toDt,$ardb_id);

            $this->load->view('common/header');

            $this->load->view('ho/report/borrower/borrowerardb_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $data['branch'] = $this->Master->get_particulars("mm_ardb_ho",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/borrower/borrowerardb_inp.php',$data);

            $this->load->view('common/footer');
        }
    }

    public function investment_ho(){ 
                       /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');            

            $data['reports'] = $this->Reports->f_get_investment($frmDt,$toDt);

            $data['report'] = $this->Reports->f_get_borrower($frmDt,$toDt);

            $this->load->view('common/header');

            $this->load->view('ho/report/investment/investment_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $this->load->view('common/header');

            $this->load->view('ho/report/investment/investment_inp.php');

            $this->load->view('common/footer');
        }
    }

    public function investment_ardb(){ 
                    
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');
            
            $ardb_id  =  $this->input->post('ardb_id');

            $data['reports'] = $this->Reports->f_get_investmentardb($frmDt,$toDt,$ardb_id);

            $data['report'] = $this->Reports->f_get_borrowerardb($frmDt,$toDt,$ardb_id);

            $this->load->view('common/header');

            $this->load->view('ho/report/investment/investmentardb_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $data['branch'] = $this->Master->get_particulars("mm_ardb_ho",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/investment/investmentardb_inp.php',$data);

            $this->load->view('common/footer');
        }
    }
    //  public function fortnightly_ho(){ 
    //                    /**Opening Stock report for every year */
    //     if($_SERVER['REQUEST_METHOD']=='POST'){

    //         $frmDt    =  $this->input->post('from_dt');

    //         $toDt     =  $this->input->post('to_dt');

    //         $report_type     =  $this->input->post('report_type');
            
           
    //         $data['reports'] = $this->Reports->f_get_forthnight($report_type,$frmDt,$toDt);

    //         $this->load->view('common/header');

    //         $this->load->view('ho/report/fortnight/fortnightly_out.php',$data);

    //         $this->load->view('common/footer');
            
    //     }else{

    //         $data["reports"]  = $this->Master->get_particulars("md_report_type",NULL,NULL,0);

    //         $this->load->view('common/header');

    //         $this->load->view('ho/report/fortnight/fortnightly_inp.php',$data);

    //         $this->load->view('common/footer');
    //     }
    // }

     public function fortnightly_ho(){ 
                       /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');

            $report_type     =  $this->input->post('report_type');
            
           
            $data['reports'] = $this->Reports->f_get_forthnight($frmDt,$toDt,$report_type);


            $this->load->view('common/header');

            $this->load->view('ho/report/fortnight/fortnightly_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $data["reports"]  = $this->Master->get_particulars("md_report_type",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/fortnight/fortnightly_inp.php',$data);

            $this->load->view('common/footer');
        }
    }

    public function fortnightly_ardb(){ 
                    
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt    =  $this->input->post('from_dt');

            $toDt     =  $this->input->post('to_dt');

            $report_type     =  $this->input->post('report_type');
            
            $ardb_id  =  $this->input->post('ardb_id');

            $data['reports'] = $this->Reports->f_get_forthnightardb($frmDt,$toDt,$report_type,$ardb_id);

            $this->load->view('common/header');

            $this->load->view('ho/report/fortnight/fortnightlyardb_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $data["reports"]  = $this->Master->get_particulars("md_report_type",NULL,NULL,0);

            $data['branch'] = $this->Master->get_particulars("mm_ardb_ho",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/fortnight/fortnightlyardb_inp.php',$data);

            $this->load->view('common/footer');
        }
    }

    public function dc_ardb(){ 
                    
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $frmDt           =  $this->input->post('from_dt');

            $toDt            =  $this->input->post('to_dt');
            
            $ardb_id         =  $this->input->post('ardb_id');

            $data['reports'] =  $this->Reports->get_dcardb($frmDt,$toDt,$ardb_id);

            $this->load->view('common/header');

            $this->load->view('ho/report/dc/ardb_out.php',$data);

            $this->load->view('common/footer');
            
        }else{

            $data["reports"]  = $this->Master->get_particulars("md_report_type",NULL,NULL,0);

            $data['branch']   = $this->Master->get_particulars("mm_ardb_ho",NULL,NULL,0);

            $this->load->view('common/header');

            $this->load->view('ho/report/dc/ardb_inp.php',$data);

            $this->load->view('common/footer');
        }
    }

}