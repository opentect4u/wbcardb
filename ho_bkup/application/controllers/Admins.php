<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

    protected $sysdate;

    public function __construct(){

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('Admin');

     if(!isset($this->session->userdata['login']->user_id)){
            
            redirect('Main/login');

        }
        
    }
    public function index() {

       
        $this->load->view('common/header');
        $user['user_dtls']  = $this->Admin->f_get_particulars("md_users", NULL,NULL, 0);  

        $this->load->view("user/user_list",$user);
        $this->load->view('common/footer');
      
    }

    public function f_friday_rtn_detail($ardb_id,$submit_dt){

        // $kms_id=$this->session->userdata['loggedin']['kms_id'];

         $sql = "select ARDB_Id,SUBMIT_DT, RD,FD, FLEXI,MIS,OTH_DEP,IBSD,TOT_DEP_MOBILISD,CASH_IN_HND,OTH_BNK,IBSD_LOAN
         ,DEP_LOAN,REMMIT_WBSCARDB,REMMIT_WBSCARDB_EXCESS,TOT_DEPLOY_FUND
         from td_fridy_rtn
                where  ardb_id= '$ardb_id' and submit_dt= '$submit_dt' ";
   

        $data = $this->db->query($sql);
       
        return $data->row();
    }
    /*********************For User Screen********************/
    
    public function f_user() {
        
        $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL,NULL, 0);   
        // }
        $this->load->view('dashboard/menu');
        $this->load->view('dashboard/header');

        $this->load->view("user/dashboard", $user);

        $this->load->view('dashboard/footer');
        
    }

    //User Add
    public function f_user_add() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $data_array = array(

                "br_id"       =>  $this->input->post('br_id'),

                "user_id"       =>  $this->input->post('user_id'),

                "password"      =>  password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

                "user_type"     =>  "U",

                "user_name"     =>   $this->input->post('user_name'),

                "user_status"   =>  'A',

                "created_by"     =>  $_SESSION['user_name'],

                "created_dt"    =>  date('Y-m-d h:i:s')

            );
            
            $this->Admin->f_insert('md_users', $data_array);

            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('admins');

        }
        else {

            $user['branch_dtls'] = $this->Admin->f_get_particulars("mm_ardb_ho", NULL,NULL, 0);   
            $this->load->view('common/header');
            $this->load->view("user/add",$user);
            $this->load->view('common/footer');
        }
        
    }

    //User edit
    public function user_edit() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

                $data_array = array(

                    "br_id"     =>  $this->input->post('br_id'),

                    "user_name"   =>  $this->input->post('user_name'),

                    "modified_by"   =>  $this->session->userdata['loggedin']['user_name'],

                    "modified_dt"   =>  date('Y-m-d h:i:s')

                );

            $where  =   array(

                "user_id"     =>  $this->input->post('user_id')
            );

            $this->Admin->f_edit('md_users', $data_array, $where);

            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('admin/user');


        }
        else {
            $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL, array( "user_id" => $this->input->get('user_id')), 1);
            
            $user['branch_dtls'] = $this->Admin->f_get_particulars("mm_ardb_ho", NULL,NULL, 0);   
            $this->load->view('common/header');
            $this->load->view("user/edit", $user);

            $this->load->view('common/footer');

        }
        
    }

    //User delete
    public function f_user_delete() {

        $where = array(
            
            "user_id"    =>  $this->input->get('user_id')
            
        );

        //Retriving the data row for backup
        $select = array (

            "user_id", "password", "user_name", "user_type", "user_status"

        );

        $data   =   (array) $this->Admin->f_get_particulars("md_users", $select, $where, 1);


        $audit  =   array(
            
            'deleted_by'    => $this->session->userdata['loggedin']['user_name'],
            
            'deleted_dt'    => date('Y-m-d h:i:s')

        );

        //Inserting Data
        $this->Admin->f_insert('md_ardb_users_deleted', array_merge($data, $audit));

        $this->session->set_flashdata('msg', 'Successfully deleted!');

        $this->Admin->f_delete('md_ardb_users', $where);

        redirect("admin/user");

    }

}    