<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->model('Profile');
        
         if(!isset($this->session->userdata['login']->user_id)){
            
            redirect('Main/login');

        }
        
    }

    public function index(){

      
        $this->load->view('common/header');
      
        $this->load->view('profiles/edit');
       
        $this->load->view('common/footer');

    }

    public function f_changepass(){
        
        $oldPass = $this->input->post('old_pass');
		$newPass = $this->input->post('new_pass');
		$matchPass = $this->Profile->matchPass($oldPass);
		$temp = password_verify($oldPass,$matchPass->password);
        
		if ($temp) {

			$password = password_hash($newPass, PASSWORD_DEFAULT);
            $msgPass = $this->Profile->editPassProcess($password);
            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Password changed!',
                
                'status'    => 'success'
                
            );

        }
        else{

            $message    =   array( 
                    
                'message'   => 'Old password was wrong',
                
                'status'    => 'danger'
                
            );

        }

        $this->session->set_flashdata('msg', $message);

        redirect('profiles');
        // $this->load->view('profiles/dashboard');
    }

}

?>