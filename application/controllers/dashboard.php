<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    protected $sysdate;

    public function __construct() {

	// $this->sysdate  = $_SESSION['sys_date'];

	parent::__construct();

	//For Individual Functions
	$this->load->model('ho/dashboard_model');
	$this->load->helper('url');
	$this->load->library('zip');
	$this->load->helper('download');

	if (!isset($this->session->userdata['login']->user_id)) {

	    redirect('Main/login');
	}
    }

    function view($id) {
	$data['details'] = json_encode($this->dashboard_model->get_details($id));
	$data['flag'] = $id;
	$data['title'] = $id == 1 ? 'DC Self SHG' : ($id == 2 ? 'DC Other Than SHG' : ($id == 3 ? 'APEX DC Self SHG' : ($id == 4 ? 'APEX DC Other Than SHG' : ($id == 5 ? 'Friday Return' : 'Fortnight Return'))));
	$this->load->view('common/header');
	$this->load->view("ho/dashboard/dc_shg_view", $data);
	$this->load->view('common/footer');
    }

}

?>