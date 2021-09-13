<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transactions extends CI_Controller {

    protected $sysdate;
    protected $kms_year;

    public function __construct(){

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/Admin');

        if(!isset($this->session->userdata['login']->user_id)){
            
            redirect('Main/login');

        }

    }

    public function f_frntrtn_Excel(){

        $ardb_ho = $this->uri->segment(3);
       
        // $submit_dt = $this->uri->segment(4);
        
         $this->load->library('excel');
    
             $object = new PHPExcel();
             $object->setActiveSheetIndex(0);
             
            $bank_data     =  $this->Admin->f_frnt_rtn_detail($ardb_ho);
       
                $table_columns = array("ARDB_HO","FRM_DT","TO_DT","FRM_FY","TO_FY","DMND_CR_P","DMND_OD_P",
                "DMD_CR_INTT","DMD_OD_INTT","COLL_CR_P","coll_OD_P","COLL_CR_INTT","COLL_OD_INTT",
                "COLL_ADV","RECOV_PER","LST_YR_PRN_DMD","LST_YR_INTT_DMD",
                "LST_YR_COLL_PRN","LST_YR_COLL_INTT","COLL_PER");
                 $column = 0;
    
                 foreach($table_columns as $field)
                 {
                 $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                 $column++;
                 }
    
                 $excel_row = 2;
    
                 foreach($bank_data as $row)
                 {
                 $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->ARDB_HO);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->FRM_DT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->TO_DT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->FRM_FY);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->TO_FY);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->DMND_CR_P);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->DMND_OD_P);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->DMD_CR_INTT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->DMD_OD_INTT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->COLL_CR_P);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->coll_OD_P);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->COLL_CR_INTT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->COLL_OD_INTT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->LST_YR_COLL_PRN);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->LST_YR_COLL_INTT);
                 $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->COLL_PER);
                 
                
                 $excel_row++;
                 }
                  
                 $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
                 $filename='frtrtn_'.$row->ARDB_HO.'_'.$row->TO_DT;
                // $filename='frtrtn_';
                 header('Content-Type: application/vnd.ms-excel');
                 header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
    
                 $object_writer->save('php://output');
          
     }
    
    //////************************************* */

public function f_fridayrtn_Excel(){

    $ardb_id = $this->uri->segment(3);
   
    // $submit_dt = $this->uri->segment(4);
    
     $this->load->library('excel');

         $object = new PHPExcel();
         $object->setActiveSheetIndex(0);
         
        $bank_data     =  $this->Admin->f_friday_rtn_detail($ardb_id);
    
         
            $table_columns = array("ARDB_ID","SUBMIT_DT", "RD","FD", "FLEXI","MIS","OTH_DEP","IBSD","TOT_DEP_MOBILISD",
            "CASH_IN_HND","OTH_BNK","IBSD_LOAN","DEP_LOAN","REMMIT_WBSCARDB","REMMIT_WBSCARDB_EXCESS","TOT_DEPLOY_FUND");
             $column = 0;

             foreach($table_columns as $field)
             {
             $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
             $column++;
             }

             $excel_row = 2;

             foreach($bank_data as $row)
             {
             $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->ARDB_ID);
             $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->week_dt);
             $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->RD);
             $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->FD);
             $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->flexi_sb);
             $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->MIS);
             $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->other_dep);
             $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->IBSD);
             $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->total_dep_mob);
             $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->cash_in_hand);
             $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->other_bank);
             $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->IBSD_LOAN);
             $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->DEP_LOAN);
             $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->wbcardb_remit_slr);
             $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->wbcardb_remit_slr_excess);
             $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->total_fund_deploy);
            
             $excel_row++;
             }
              
             $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
             $filename='fridayrtn_'.$row->ARDB_ID.'_'.$row->week_dt;
             header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

             $object_writer->save('php://output');
      
    }
    

}    
