<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

    protected $sysdate;

    public function __construct(){

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('Admin');

        //For User's Authentication
        // if(!isset($this->session->userdata['loggedin']['user_id'])){
            
        //     redirect('User_Login/login');

        // }
        
    }
    public function index() {
        $this->load->view('dashboard/menu');
        $this->load->view('dashboard/header');
        $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL,NULL, 0);  
        // echo $this->db->last_query();
        // die(); 
        // }
        // $this->load->view('dashboard/menu');
        // $this->load->view('dashboard/header');

        $this->load->view("user/dashboard", $user);

        $this->load->view('dashboard/footer');
        // $this->load->view('user/dashboard');
        // $this->load->view('dashboard/footer');
    }


    /*********************For User Screen********************/
    
    public function f_user() {
        
        //Retriving User Details
        // if($this->session->userdata['loggedin']['user_type']=="M")  {   
        // $user['user_dtls']    =   $this->Admin->f_get_particulars("md_ardb_users", NULL,array( "user_type!=" =>"A"), 0);
        // }else{
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

           /// $emp_cd = $_POST['emp_cd'];

            //$empName = $this->Admin->f_get_employeeName($emp_cd);
           // $user_name = $empName->emp_name;
            
            $data_array = array(

                "user_id"       =>  $this->input->post('user_id'),

                "password"      =>  password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

                "user_type"     =>  $this->input->post('user_type'),

                "user_name"     =>   $this->input->post('user_name'),
                
                // "branch_id"        => $this->session->userdata['login']['branch_id'],

                "user_status"   =>  'A',
                
                // "st"            =>  0,

                "created_by"     =>  $_SESSION['user_name'],

                "created_dt"    =>  date('Y-m-d h:i:s')

            );

            /*for($i = 0; $i < count($this->input->post('depts')); $i++){
                
                switch($this->input->post('depts')[$i]){

                case 'f' :
                        $data_array = array_merge($data_array, array('accounts' => 1));
                        break;

                case 'pr' :
                        $data_array = array_merge($data_array, array('payroll' => 1));
                        break;

                case 'pd' :
                        $data_array = array_merge($data_array, array('paddy' => 1));
                        break;

                case 'd' :
                        $data_array = array_merge($data_array, array('dm' => 1));
                        break;

                case 's' :
                        $data_array = array_merge($data_array, array('sw' => 1));
                        break;

                case 'st' :
                        $data_array = array_merge($data_array, array('st' => 1));
                        break;

                }
            }*/
            
            // echo $this->db->last_query();
            // die();
            $this->Admin->f_insert('md_users', $data_array);

            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('admins');


        }
        else {

            //Retriving Employee Name
            //$user['user_dtls']   =  $this->Admin->f_get_distinct("md_employee", array( "emp_name" ), NULL);
           // $user['data']          =    $this->Admin->f_get_employee_dtls();

            // $this->load->view('dashboard/main');
            // $this->load->view('dashboard/menu');
            // $this->load->view('dashboard/header');
            $this->load->view('dashboard/menu');
            //$this->load->view("user/add", $user);
            $this->load->view("user/add");


            // $this->load->view('dashboard/footer');

        }
        
    }

    //User edit
    public function f_user_edit() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

                $data_array = array(
    
                    "user_status"      =>  $this->input->post('user_status'),
                    "modified_by"    =>  $this->session->userdata['loggedin']['user_name'],
                    "modified_dt"    =>  date('Y-m-d h:i:s')

                );

                $where  =   array(

                    "user_id"     =>  $this->input->post('user_id')
                );
    
                $this->Admin->f_edit('md_users', $data_array, $where);

                unset($data_array);

                $data_array = array(
    
                    "password"      =>  password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

                    "user_type"     =>  $this->input->post('user_type'),

                    "user_status"   =>  $this->input->post('user_status'),

                    "modified_by"   =>  $this->session->userdata['loggedin']['user_name'],

                    "modified_dt"   =>  date('Y-m-d h:i:s')

                );

               /* for($i = 0; $i < count($this->input->post('depts')); $i++){
                
                    switch($this->input->post('depts')[$i]){
    
                    case 'f' :
                            $data_array = array_merge($data_array, array('accounts' => 1));
                            break;
    
                    case 'pr' :
                            $data_array = array_merge($data_array, array('payroll' => 1));
                            break;
    
                    case 'pd' :
                            $data_array = array_merge($data_array, array('paddy' => 1));
                            break;
    
                    case 'd' :
                            $data_array = array_merge($data_array, array('dm' => 1));
                            break;
    
                    case 's' :
                            $data_array = array_merge($data_array, array('sw' => 1));
                            break;

                    case 'st' :
                            $data_array = array_merge($data_array, array('st' => 1));
                            break;

                    }
                }*/

            $where  =   array(

                "user_id"     =>  $this->input->post('user_id')
            );

            $this->Admin->f_edit('md_users', $data_array, $where);

            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('admin/user');


        }
        else {
            $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL, array( "user_id" => $this->input->get('user_id')), 1);

            // $this->load->view('post_login/main');
            $this->load->view('dashboard/menu');
            $this->load->view("user/edit", $user);

            $this->load->view('dashboard/footer');

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