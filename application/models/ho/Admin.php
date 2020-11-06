<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

    public function f_get_particulars($table_name, $select=NULL,$where, $flag) {

        if(isset($select)) {

            $this->db->select($select);

        }
        if(isset($where)) {
            $this->db->where($where);
        }
       // if(isset($where)) {
         //   if($where=="M"){
         //   $this->db->where('user_type != ',"A",TRUE);
         //   }
            //}
        // $this->db->where('branch_id',$this->session->userdata['loggedin']['branch_id']);
        $result		=	$this->db->get($table_name);

        if($flag == 1) {

            return $result->row();
            
        }else {

            return $result->result();

        }

    }

    public function f_frnt_rtn_detail($ardb_ho){
        // $kms_id=$this->session->userdata['loggedin']['kms_id'];

         $sql = "Select ARDB_HO,FRM_DT,TO_DT,FRM_FY,TO_FY,DMND_CR_P,DMND_OD_P,
         DMD_CR_INTT,DMD_OD_INTT,COLL_CR_P,coll_OD_P,COLL_CR_INTT,COLL_OD_INTT,
         COLL_ADV,RECOV_PER,LST_YR_PRN_DMD,LST_YR_INTT_DMD,
         LST_YR_COLL_PRN,LST_YR_COLL_INTT,COLL_PER
         from td_frm_frnt_rtn
        where  ardb_ho=$ardb_ho ";
   

        $data = $this->db->query($sql);
       
        return $data->result();
    }


    // public function f_friday_rtn_detail($ardb_id,$submit_dt){
        public function f_friday_rtn_detail($ardb_id){
        // $kms_id=$this->session->userdata['loggedin']['kms_id'];
         $sql = "Select ARDB_ID,week_dt, RD,FD, flexi_sb,MIS,other_dep,IBSD,total_dep_mob,cash_in_hand,other_bank,IBSD_LOAN
         ,DEP_LOAN,wbcardb_remit_slr,wbcardb_remit_slr_excess,total_fund_deploy
         from td_fridy_rtn
        where  ardb_id=$ardb_id ";

        $data = $this->db->query($sql);
       
        return $data->result();
    }

    //For Distinct Value

    public function f_get_distinct($table_name, $select=NULL, $where=NULL) {

        $this->db->distinct();

        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)) {

            $this->db->where($where);

        }

        $result		=	$this->db->get($table_name);

        return $result->result();
        
    }

    // for getting user details--
    public function f_get_employee_dtls()
    {

        $sql = $this->db->query(" SELECT emp_code, emp_name FROM md_employee WHERE emp_status = 'A' ");
        return $sql->result();

    }

    public function f_get_employeeName($emp_cd)
    {

        $sql = $this->db->query(" SELECT emp_name FROM md_employee WHERE emp_code = '$emp_cd' ");
        return $sql->row();

    }

    //For inserting row

    public function f_insert($table_name, $data_array) {

        $this->db->insert($table_name, $data_array);

        return;

    }

    //For Editing row

    public function f_edit($table_name, $data_array, $where) {

        $this->db->where($where);
        $this->db->update($table_name, $data_array);

        return;

    }

    //For Deliting row

    public function f_delete($table_name, $where) {

        $this->db->delete($table_name, $where);

        return;

    }

}