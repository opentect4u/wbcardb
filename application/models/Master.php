<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Model{

	public function productDtls(){           /**Retrieves password against supplied user id,user must be active with value A */

        $this->db->select('*');

        $this->db->order_by('ID');
        
        $data = $this->db->get('products');

		return $data->result();
  }

  
  public function get_particulars($table_name, $select=NULL, $where=NULL, $flag) {
        
        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)) {

            $this->db->where($where);

        }

        $result   = $this->db->get($table_name);

        if($flag == 1) {

            return $result->row();
            
        }else {

            return $result->result();

        }

    }

    public function delete_particulars($table_name,$where=NULL) {      

         $this->db->where($where);
         $this->db->delete($table_name);

    }

  public function getAllhsn(){

        $this->db->select('*');

        $this->db->order_by('Code');

        $data = $this->db->get('HS_code');

    return $data->result();    
  }

  public function getMaxId(){

    $query = $this->db->query("select (max(ID) + 1)maxid from products");

    return $query->row(); 
  }

  public function insertNewProd($data){

        $this->db->insert('products',$data);

        if($this->db->affected_rows() > 0){

          return 1;

        }else{

          return 0;
        }
  }

  public function prodDtls($id){           /**Retrieves password against supplied user id,user must be active with value A */

    $this->db->select('*');

    $this->db->where('ID',$id);
    
    $data = $this->db->get('products');

    return $data->row();
  }

  public function updateProd($data,$where){

    $this->db->where($where);

    $this->db->update('products',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }
/**********************************************HSN Code*************************************************** */  
  public function hsnDtls(){

    $this->db->select('*');

    $this->db->order_by('Code');
    
    $data = $this->db->get('HS_code');

    return $data->result();
  }

  public function insertNewHsn($data){

    $this->db->insert('HS_code',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }

  public function gethsn($code){       

  $this->db->select('*');

  $this->db->where('Code',$code);

  $data = $this->db->get('HS_code');

  return $data->row();
  }

  public function updateHsn($data,$where){

  $this->db->where($where);

  $this->db->update('HS_code',$data);

    if($this->db->affected_rows() > 0){

    return 1;

    }else{

    return 0;
    }
  }

  public function chkhsn($code){       

    $data = $this->db->query("select count(*)hcount from HS_code where Code = '$code' ");

    return $data->row();
  }
  public function insertNewardbbr($data){

    $this->db->insert('mm_ardb_br',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }
  
  public function ardbbrDtls(){

    $this->db->select('*');

    $this->db->order_by('id');
    
    $data = $this->db->get('mm_ardb_br');

    return $data->result();
  }

  public function ardbDtls(){

    $this->db->select('*');

    $this->db->order_by('id');
    
    $data = $this->db->get('mm_ardb_ho');

    return $data->result();
  }

  public function insertNewardb($data){

    $this->db->insert('mm_ardb_ho',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }
  public function getardb($id){       

    $this->db->select('*');

    $this->db->where('id',$id);

    $data = $this->db->get('mm_ardb_ho');

    return $data->row();
  }
  

  public function getardbbr($id){       

    $this->db->select('*');

    $this->db->where('id',$id);

    $data = $this->db->get('mm_ardb_br');

    return $data->row();
  }

  public function distDtls(){

    $this->db->select('*');

    $this->db->order_by('district_code');
    
    $data = $this->db->get('md_district');

    return $data->result();
  }

  public function ardblist(){

    $this->db->select('*');

    $this->db->order_by('id');
    
    $data = $this->db->get('mm_ardb_ho');

    return $data->result();
  }

  public function updateardb($data,$where){

    $this->db->where($where);

    $this->db->update('mm_ardb_ho',$data);

      if($this->db->affected_rows() > 0){

        return 1;

      }else{

        return 0;
      }
  }
  
  public function updateardbbr($data,$where){

    $this->db->where($where);

    $this->db->update('mm_ardb_br',$data);

      if($this->db->affected_rows() > 0){

        return 1;

      }else{

        return 0;
      }
  }  

 
}
?>
