<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Model{

	public function userInf($userId){           /**Retrieves password against supplied user id,user must be active with value A */

        $this->db->select('*');
        
        $this->db->where('user_id',$userId);
        
        $this->db->where('user_status','A');

        $this->db->where('user_type','A');
        
        $data = $this->db->get('md_users');
        
		if($data->num_rows()>0){

      return $data->row();
      
      }else{

        return false;
      }
  }

  public function tot_frmnt($fromdt,$tomdt){
    $sql  = $this->db->query("select ifnull(count(ARDB_ID),0) mntupload
                               from   td_fridy_rtn
                               where  week_dt >= '$fromdt'
                               and    week_dt <= '$tomdt'");

    return $sql->row();
  }
  public function tot_fomnt($fromdt,$tomdt){
    $sql  = $this->db->query("select ifnull(count(ARDB_HO),0) fomnt
                               from   td_frm_frnt_rtn
                               where  TO_DT >= '$fromdt'
                               and    TO_DT <= '$tomdt'");

    return $sql->row();
  }


}
?>
