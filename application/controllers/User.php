<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	protected $sysdate;

	public function __construct(){

		// $this->sysdate  = $_SESSION['sys_date'];

		parent::__construct();

		//For Individual Functions
		$this->load->model('user_model');
		$this->load->helper('url'); 
        $this->load->library('zip');
        $this->load->helper('download');

	 if(!isset($this->session->userdata['login']->user_id)){
			
			redirect('Main/login');

		}
		
	}

	function index(){
		$ardb_id = $_SESSION['br_id'];
		$user_details = $this->user_model->get_user_details($ardb_id, $user_id = '');
		// echo '<pre>';var_dump($_SESSION);exit;
		$data['ardb_id'] = $ardb_id;
		$data['user_details'] = json_encode($user_details);
		$this->load->view('common/header');
		$this->load->view("user/create_user_view", $data);
		$this->load->view('common/footer');
	}


	function user_entry(){
		$ardb_id = $_SESSION['br_id'];
		$user_id = $_GET['id'];
		// var_dump($user_id);exit;
		$selected = array();
		if($user_id > 0 || $user_id != ''){
			$user_details = $this->user_model->get_user_details($ardb_id, $user_id);
			foreach($user_details as $user){
				$selected = array(
					'id' => 1,
					'user_id' => $user->user_id,
					'user_name' => $user->user_name,
					'user_type' => $user->user_type,
					'designation' => $user->designation
				);
			}
		}
		// $purpose_list = $this->user_model->get_purpose_list();
		// echo '<pre>';var_dump($user_details);exit;
		$data['ardb_id'] = $ardb_id;
		$data['selected'] = json_encode($selected);
		$data['user_details'] = json_encode($user_details);
		$this->load->view('common/header');
		$this->load->view("user/create_user_edit", $data);
		$this->load->view('common/footer');
	}

	function user_save(){
		$data = $this->input->post();
		if($this->user_model->user_save($data)){
			$this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
			redirect('user');
		}else{
			$this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
			redirect('user/user_entry');
		}
	}

	function deactive_user(){
        $user_id = $_GET['user_id'];
        $user['user_dtls']    =   $this->user_model->f_get_particulars("md_users", NULL, array( "user_id" => $user_id), 1);
        $user['branch_dtls'] = $this->user_model->f_get_particulars("mm_ardb_ho", NULL,NULL, 0);
        $this->load->view('common/header');
        $this->load->view("user/deactive",$user);
        $this->load->view('common/footer');
    }

    function deactive(){
        $data = $this->input->post();
        if($this->user_model->deactive_user($data)){
            $this->session->set_flashdata('msg', 'Deactived Successfully!');
            redirect('user');
        }else{
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('user');
        }
    }

	function get_user_status(){
        $ardb_id = $_SESSION['br_id'];
        $type_id = $_GET['type_id'];
        echo json_encode($this->user_model->get_user_status($ardb_id, $type_id));
    }
}
?>