<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

        parent:: __construct();
        
        $this->load->model('Process');
	}

	public function index(){
      
		if($_SERVER['REQUEST_METHOD']=="POST"){

            $userId	=	$_POST['userid'];

            $pwd	=	$_POST['paswd'];

            $data   =	$this->Process->userInf($userId);
             if(!empty($data->password)){

            $match	=	password_verify($pwd,$data->password);
            
			if($match){
                
                $this->session->set_userdata('login',$data);

                $_SESSION['user_id']   = $data->user_id;
                
                $_SESSION['user_type'] = $data->user_type;

                $_SESSION['user_name'] = $data->user_name;
                
                $_SESSION['sys_date']  = date('Y-m-d'); 

                redirect('Main/login');
			}else{

                $this->session->set_flashdata('err_message','Invalid username and password combination.Please try again.');
		
				$this->load->view('login/login');
			}


        }else{

                $this->session->set_flashdata('err_message','Invalid username and password combination.Please try again.');
        
                $this->load->view('login/login');
           }
        }else{
        
            $this->load->view('login/login');
        }
    }
    public function dashboard()
    {
        $this->load->view('ho/dashboard/dashboard');
    }

    
    public function login(){

		if($this->session->userdata('login')){
            $this->load->view('common/header');
            $this->load->view('ho/dashboard/dashboard');
            $this->load->view('common/footer');

		}else{

			$this->load->view('login/login');
        }
    }
    
    public function logout(){

        if($this->session->userdata('login')){

            $this->session->unset_userdata('login');

            redirect('Main/login');
        }else{

            redirect('Main/login');
        }

    }
}
