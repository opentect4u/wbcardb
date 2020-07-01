<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {

	public function __construct(){

        parent:: __construct();
        
        $this->load->model('Master');
    }
/*********************************************Product Master******************************************** */    
    public function product(){                                      

        if($this->session->userdata('login')){
    
              $data['prod']=$this->Master->productDtls();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('master/product/view',$data);

              $this->load->view('dashboard/footer');
        }
    }

    public function addProduct(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prodName = $_POST['prod'];

            $hsn      = $_POST['hsn'];

            $data     = $this->Master->getMaxId();

            $Id       = $data->maxid;

            $data     = array(
                                'ID'         => $Id,

                                'Name'       => $prodName,

                                'HSN_ID'     => $hsn,

                                'created_by' => $_SESSION['user_name'],

                                'created_dt' => date('Y-m-d h:m:i')
                            );

            $ret = $this->Master->insertNewProd($data);

            if ($ret == 1){

                $msgData = 'Data Successfully inserted with Id : '.$Id;

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Masters/product');

        }else{
              $data['hsn']=$this->Master->getAllhsn();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('master/product/add',$data);

              $this->load->view('dashboard/footer');
            }
    }

    public function editProduct(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prodId   = $_POST['prodId'];

            $prodName = $_POST['prod'];

            $hsn      = $_POST['hsn'];

            $data     = array(
                                'Name'        => $prodName,

                                'HSN_ID'      => $hsn,

                                'modified_by' => $_SESSION['user_name'],

                                'modified_dt' => date('Y-m-d h:m:i')
                            );

            $where    = array(
                                'ID'           => $prodId
                             );

            $ret = $this->Master->updateProd($data,$where);

            if ($ret == 1){

                $msgData = 'Data successfully updated for product id : '.$prodId;

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Masters/product');

        }else{

              $prodId     = $_GET['ID'];

              $data['prod'] = $this->Master->prodDtls($prodId);

              $data['hsn']  = $this->Master->getAllhsn();


              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('master/product/edit',$data);

              $this->load->view('dashboard/footer');
            }
    }
/*********************************************HSN Master******************************************** */
public function hsn(){                                      

    if($this->session->userdata('login')){

          $data['hsn']=$this->Master->hsnDtls();

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/hsn/view',$data);

          $this->load->view('dashboard/footer');
    }
}

public function addHsn(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $hsnCode  = $_POST['hsnCd'];

        $hsn      = $_POST['hsnName'];

        $cgst     = $_POST['cgst'];

        $sgst     = $_POST['sgst'];

        $data     = array(
                            'Code'         => $hsnCode,

                            'Grp'          => $hsn,

                            'CGST_Rt'      => $cgst,

                            'SGST_Rt'      => $sgst,

                            'created_by'   => $_SESSION['user_name'],

                            'created_dt'   => date('Y-m-d h:m:i')
                        );

        $ret = $this->Master->insertNewHsn($data);

        if ($ret == 1){

            $msgData = 'Data Successfully inserted with HSN code: '.$hsnCode;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to insert.');
        }

        redirect('Masters/hsn');

    }else{

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/hsn/add');

          $this->load->view('dashboard/footer');
        }
}

public function editHsn(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $hsnCd    = $_POST['hsncd'];

        $hsnName  = $_POST['hsnName'];

        $cgst     = $_POST['cgst'];

        $sgst     = $_POST['sgst'];

        $data     = array(
                            'Grp'         => $hsnName,

                            'CGST_Rt'     => $cgst,

                            'SGST_Rt'     => $sgst,

                            'modified_by' => $_SESSION['user_name'],

                            'modified_dt' => date('Y-m-d h:m:i')
                        );

        $where    = array(
                            'Code'        => $hsnCd
                         );

        $ret = $this->Master->updateHsn($data,$where);

        if ($ret == 1){

            $msgData = 'Data successfully updated for HSN code: '.$hsnCd;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to update.');
        }

        redirect('Masters/hsn');

    }else{

          $hsnCd        = $_GET['code'];

          $data['hsn']  = $this->Master->gethsn($hsnCd);

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/hsn/edit',$data);

          $this->load->view('dashboard/footer');
        }
    }

public function chkHsn(){

    $hsn   = $_GET['hsncd'];

    $data  = $this->Master->chkhsn($hsn);

    $value = $data->hcount;

    echo $value;

}  
public function addardbbr(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $ho_name  = $_POST['ho_name'];

        $br_name  = $_POST['br_name'];

        $address      = $_POST['address'];

        // $ph_no      = $_POST['ph_no'];

        // $email      = $_POST['email'];

        // $gstin     = $_POST['gstin'];

        $data     = array(
                            'ho_name'         => $ho_name,

                            'br_name'         => $br_name,

                            'address'         => $address

                            // 'ph_no'           => $ph_no,

                            // 'email'           => $email

                            // 'created_by'        => $_SESSION['user_name'],

                            // 'created_dt'        => date('Y-m-d h:m:i')
                        );

        $ret = $this->Master->insertNewardbbr($data);

        if ($ret == 1){

            $msgData = 'Data Successfully inserted for '.$br_name;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to insert.');
        }

        redirect('Masters/ardb_br');

    }else{
        $data['ardblst']=$this->Master->ardblist();
          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/ardb_br/add',$data);

          $this->load->view('dashboard/footer');
        }
}

public function ardb_br(){                                      

    if($this->session->userdata('login')){

          $data['ardb']=$this->Master->ardbbrDtls();

          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/ardb_br/view',$data);

          $this->load->view('dashboard/footer');
    }
}


public function editardbbr(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $id     = $_POST['id'];

        $ho_name  = $_POST['ho_name'];

        $address      = $_POST['address'];

        $br_name      = $_POST['br_name'];

        // $linc      = $_POST['linc'];

        // $gstin     = $_POST['gstin'];

        $data      = array(
                            'ho_name'        => $ho_name,

                            // 'Drug_License'     => $linc,

                            // 'GST_ID'           => $gstin,

                            'address'        => $address,

                            'br_name'          => $br_name

                            // 'modified_by'      => $_SESSION['user_name'],

                            // 'modified_dt'      => date('Y-m-d h:m:i')
                        );

        $where    = array(
                            'id'        => $id
                         );

        $ret = $this->Master->updateardbbr($data,$where);

        if ($ret == 1){

            $msgData = 'Data successfully updated for '.$br_name;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to update.');
        }

        redirect('Masters/ardb_br');

    }else{

          $id           = $_GET['id'];

          $data['ardb']  = $this->Master->getardbbr($id);

          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

           $this->load->view('dashboard/menu');

          $this->load->view('master/ardb_br/edit',$data);

          $this->load->view('dashboard/footer');
        }
    }



public function ardb(){                                      

    if($this->session->userdata('login')){

          $data['ardb']=$this->Master->ardbDtls();

          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/ardb/view',$data);

          $this->load->view('dashboard/footer');
    }
}

public function addardb(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $name  = $_POST['name'];

        $address      = $_POST['address'];

        $ph_no      = $_POST['ph_no'];

        $email      = $_POST['email'];

        $dist       =$_POST['dist'];

        // $gstin     = $_POST['gstin'];

        $data     = array(
                            'name'         => $name,

                            'address'         => $address,

                            'ph_no'           => $ph_no,

                            'email'           => $email,

                            'dist'          => $dist

                            // 'created_by'        => $_SESSION['user_name'],

                            // 'created_dt'        => date('Y-m-d h:m:i')
                        );

        $ret = $this->Master->insertNewardb($data);

        if ($ret == 1){

            $msgData = 'Data Successfully inserted for '.$Name;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to insert.');
        }

        redirect('Masters/ardb');

    }else{
        $data['dist']=$this->Master->distDtls();
        // echo $this->db->last_query();
        // die();
          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/ardb/add',$data);

          $this->load->view('dashboard/footer');
        }
}


public function editardb(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $id     = $_POST['id'];

        $name  = $_POST['name'];

        $address      = $_POST['address'];

        $ph_no      = $_POST['ph_no'];

        // $linc      = $_POST['linc'];

        // $gstin     = $_POST['gstin'];

        $data      = array(
                            'name'        => $name,

                            // 'Drug_License'     => $linc,

                            // 'GST_ID'           => $gstin,

                            'address'        => $address,

                            'ph_no'          => $ph_no

                            // 'modified_by'      => $_SESSION['user_name'],

                            // 'modified_dt'      => date('Y-m-d h:m:i')
                        );

        $where    = array(
                            'id'        => $id
                         );

        $ret = $this->Master->updateardb($data,$where);

        if ($ret == 1){

            $msgData = 'Data successfully updated for '.$name;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to update.');
        }

        redirect('Masters/ardb');

    }else{

          $id           = $_GET['id'];

          $data['ardb']  = $this->Master->getardb($id);

          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

           $this->load->view('dashboard/menu');

          $this->load->view('master/ardb/edit',$data);

          $this->load->view('dashboard/footer');
        }
    }


/*********************************************Company Master******************************************** */
public function comp(){                                      

    if($this->session->userdata('login')){

          $data['comp']=$this->Master->compDtls();

          $this->load->view('dashboard/header');

        //   $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/company/view',$data);

          $this->load->view('dashboard/footer');
    }
}

public function addComp(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $compName  = $_POST['compName'];

        $addr      = $_POST['addr'];

        $cnct      = $_POST['cnct'];

        $linc      = $_POST['linc'];

        $gstin     = $_POST['gstin'];

        $data     = array(
                            'Comp_Name'         => $compName,

                            'Drug_License'      => $linc,

                            'GST_ID'            => $gstin,

                            'comp_addr'         => $addr,

                            'Contact'           => $addr,

                            'created_by'        => $_SESSION['user_name'],

                            'created_dt'        => date('Y-m-d h:m:i')
                        );

        $ret = $this->Master->insertNewComp($data);

        if ($ret == 1){

            $msgData = 'Data Successfully inserted for '.$compName;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to insert.');
        }

        redirect('Masters/comp');

    }else{

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/company/add');

          $this->load->view('dashboard/footer');
        }
}

public function editComp(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $cmpCd     = $_POST['cmpCd'];

        $compName  = $_POST['compName'];

        $addr      = $_POST['addr'];

        $cnct      = $_POST['cnct'];

        $linc      = $_POST['linc'];

        $gstin     = $_POST['gstin'];

        $data      = array(
                            'Comp_Name'        => $compName,

                            'Drug_License'     => $linc,

                            'GST_ID'           => $gstin,

                            'comp_addr'        => $addr,

                            'Contact'          => $cnct,

                            'modified_by'      => $_SESSION['user_name'],

                            'modified_dt'      => date('Y-m-d h:m:i')
                        );

        $where    = array(
                            'ID'        => $cmpCd
                         );

        $ret = $this->Master->updateComp($data,$where);

        if ($ret == 1){

            $msgData = 'Data successfully updated for '.$compName;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to update.');
        }

        redirect('Masters/comp');

    }else{

          $id           = $_GET['id'];

          $data['comp']  = $this->Master->getComp($id);

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/company/edit',$data);

          $this->load->view('dashboard/footer');
        }
    }
}