<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Model{

	public function userInf($userId){           /**Retrieves password against supplied user id,user must be active with value A */

        $this->db->select('*');
        
        $this->db->where('user_id',$userId);
        
        $this->db->where('user_status','A');
        $this->db->where('user_type','U');
        
        $data = $this->db->get('md_users');
        
		if($data->num_rows()>0){

      return $data->row();
      
      }else{

        return false;
      }
  }

  public function expirymedicne($date){
    $data = $this->db->query("select distinct a.Expiry_dt exp_dt,
                                              a.Prod_ID prod_id,
                                              b.Name prod_name,
                                              a.Batch prod_batch,
                                              a.qty qty
                                              from Inventory a ,
                                                   products b 
                                              where  a.Prod_ID=b.ID
                                              and    a.qty > 0
                                              and    a.Expiry_dt <= LAST_DAY(DATE_ADD('$date', INTERVAL 90 DAY))
                                              order by a.Expiry_dt");
                                               
    return $data->result();
  }

 /**Total Purchase Amount on a particular date*/ 

  public function todayPurchase($date){
    $sql  = $this->db->query("select ifnull(sum(tot_Amt),0) + ifnull(sum(CGST_Amt),0) + ifnull(sum(SGST_Amt),0) - ifnull(sum(Dis_Amt),0) todayPur
                               from   Purchase_Items
                               where  bill_dt = '$date'");

    return $sql->row();
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

  public function todaysale($date){
    $sql  = $this->db->query("select round(ifnull(sum(Net_Price),0)) todaysale
                               from   Sales_Items
                               where  trans_dt = '$date'");

    return $sql->row();
  }

  public function fetch_product(){

    $this->db->order_by('Name','ASC');
    //$this->db->order_by('Name',ASC);
    $query = $this->db->get('products');
    
    return $query->result();
  }
/**Monthly Purchase Amount */

  public function monthPurchase($fromdt,$todt){
    $sql  = $this->db->query("select ifnull(sum(tot_Amt),0) + ifnull(sum(CGST_Amt),0) + ifnull(sum(SGST_Amt),0) - ifnull(sum(Dis_Amt),0) monthPur
                               from   Purchase_Items
                               where  bill_dt >= '$fromdt'
                               and    bill_dt <= '$todt'");

    return $sql->row();
  }

  /**Monthly Sale Amount on a particular date*/ 

  public function monthSale($fromdt,$todt){
    $sql  = $this->db->query("select round(ifnull(sum(Net_Price),0)) monthsale
                               from   Sales_Items
                               where  trans_dt >= '$fromdt'
                               and    trans_dt <= '$todt'");

    return $sql->row();
  }
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
