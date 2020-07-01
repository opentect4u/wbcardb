<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Model{

	public function userInf($userId){           /**Retrieves password against supplied user id,user must be active with value A */

        $this->db->select('*');
        
        $this->db->where('user_id',$userId);
        
        $this->db->where('user_status','A');
      // $this->db->where('user_type','U');
        
        $data = $this->db->get('md_users');
        
		if($data->num_rows()>0){

      return $data->row();
      
      }else{

        return false;
      }
  }


  public function max_ret_wk_dt($table,$field){
    $sql  = $this->db->query("select MAX($field) AS Max_Date
                               from   $table");

    return $sql->row();
  }

  public function f_insert_multiple($table_name, $data_array){

        $this->db->insert_batch($table_name, $data_array);

        return;

  }
  /**Total Sale Amount on a particular date*/ 
  
  public function fr_retupload(){
     $sql  = $this->db->query("select MAX(week_dt) week_dt
                               from   td_fridy_rtn");
    return $sql->row();
  }
  public function fr_nightrt(){
     $sql  = $this->db->query("select MAX(TO_DT) TO_DT
                               from   td_frm_frnt_rtn");
    return $sql->row();
  }

}
?>
