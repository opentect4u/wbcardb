<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apex_self extends CI_Controller {

    protected $sysdate;

    public function __construct() {

	// $this->sysdate  = $_SESSION['sys_date'];

	parent::__construct();

	//For Individual Functions
	$this->load->model('apex_self_model');
	$this->load->helper('url');
	$this->load->library('zip');
	$this->load->helper('download');

	if (!isset($this->session->userdata['login']->user_id)) {

	    redirect('Main/login');
	}
    }

    function apex_self_view() {
	$ardb_id = $_SESSION['br_id'];
	$apex_details = $this->apex_self_model->apex_view($ardb_id);
	// echo '<pre>';
	// var_dump($_SESSION);exit;
	$data['ardb_id'] = $ardb_id;
	$data['apex_details'] = json_encode($apex_details);
	$this->load->view('common/header');
	$this->load->view("apex_self/view", $data);
	$this->load->view('common/footer');
    }

    function entry($memo_no, $pronote_no,$disb_dt) {
	$ardb_id = $_SESSION['br_id'];
	// $disb_dt=$_GET['disb_dt'];
	// print_r($disb_dt);
	// exit;
	$selected = array();
	$apex_shg = array();

	if ($memo_no > 0 && $pronote_no > 0 || $memo_no != '' && $pronote_no != '') {
	    $apex_shg = $this->apex_self_model->apex_edit($ardb_id, $memo_no, $pronote_no,$disb_dt);
		// print_r($apex_shg);
		// exit;
		// echo $this->db->last_query();
		// exit;
	    $borrower_details = $this->apex_self_model->borrower_details($ardb_id, $memo_no, $pronote_no,$disb_dt);
	    foreach ($borrower_details as $dt) {
		$selected = array(
		    'id' => 1,
		    'sector_code' => $apex_shg[0]['sector_code'],
		    'tot_memb' => $dt->tot_memb,
		    'tot_borrower' => $dt->tot_borrower,
		    'tot_male' => $dt->tot_male,
		    'tot_female' => $dt->tot_female,
		    'tot_sc' => $dt->tot_sc,
		    'tot_st' => $dt->tot_st,
		    'tot_obca' => $dt->tot_obca,
		    'tot_obcb' => $dt->tot_obcb,
		    'tot_gen' => $dt->tot_gen,
		    'tot_other' => $dt->tot_other,
		    'tot_count' => $dt->tot_count,
		    'tot_big' => $dt->tot_big,
		    'tot_small' => $dt->tot_small,
		    'tot_marginal' => $dt->tot_marginal,
		    'tot_landless' => $dt->tot_landless,
		    'tot_hig' => $dt->tot_hig,
		    'tot_lig' => $dt->tot_lig,
		    'tot_mig' => $dt->tot_mig
		);
	    }
	}
	$sector_list = $this->apex_self_model->get_sector_list();
	$data['ardb_id'] = $ardb_id;
	$data['apex_shg'] = json_encode($apex_shg);
	$data['selected'] = json_encode($selected);
	$data['sector_list'] = json_encode($sector_list);
	$this->load->view('common/header');
	$this->load->view("apex_self/entry", $data);
	$this->load->view('common/footer');
    }

    function save() {
	$data = $this->input->post();
	if ($this->apex_self_model->save($data)) {
	    $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
	    redirect('apex_self/apex_self_view');
	} else {
	    $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
	    redirect('apex_self/apex_self_view');
	}
    }

    function dc_delete($pronote_no, $memo_no) {
	$ardb_id = $_SESSION['br_id'];
	if ($this->apex_self_model->dc_delete($ardb_id, $pronote_no, $memo_no)) {
	    $this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');
	    redirect('apex_self/apex_self_view');
	} else {
	    $this->session->set_flashdata('msg', 'Something Went Wrong!');
	    redirect('apex_self/apex_self_view');
	}
    }

    function get_apex_details() {
	$ardb_id = $_GET['ardb_id'];
	$lso_no = $_GET['lso_no'];
	$apex_shg_details = $shg_details = $this->apex_self_model->get_apex_details($ardb_id, $lso_no);
	echo json_encode($apex_shg_details);
    }

    // FORWARD

    function apex_self_approve_view() {
	$ardb_id = $_SESSION['br_id'];
	//$instl_dt = $_GET['instl_dt'];
	$approve_details = $this->apex_self_model->approve_view($ardb_id, $memo_no = '');
	
	$data['ardb_id'] = $ardb_id;
	// $data['instl_dt'] = 
	$data['approve_details'] = json_encode($approve_details);
	$this->load->view('common/header');
	$this->load->view("apex_self/approve_view", $data);
	$this->load->view('common/footer');
    }

    function approve_details() {
		$ardb_id = $_SESSION['br_id'];
		$memo_no=$this->uri->segment(3);
		$disb_dt=$this->uri->segment(4);
		
		$details = array();
		$approve_details = $this->apex_self_model->approve_view($ardb_id, $memo_no,$disb_dt);
		// echo $this->db->last_query();
		// die();
		$shg_details = $this->apex_self_model->apex_edit($ardb_id, $memo_no, $pronote_no = '',$disb_dt);
		// echo $this->db->last_query();
		// die();
		//  echo $disb_dt;
		//  exit;
		$borrower_details = $this->apex_self_model->borrower_details($ardb_id, $memo_no, $pronote_no = '',$disb_dt);
		$memo_header = $this->apex_self_model->apex_self_dc_header($ardb_id, $memo_no,$disb_dt);
		// echo $this->db->last_query();
		// die();
		$data['ardb_id'] = $ardb_id;
		$data['memo_no'] = $memo_no;
		$data['instl_dt']=$disb_dt;
		$instl_dt=$disb_dt;
		$data['details'] = json_encode($details);
		$data['approve_details'] = json_encode($approve_details);
		$data['shg_details'] = json_encode($shg_details);
		$data['memo_header'] = json_encode($memo_header);
		$data['borrower_details'] = json_encode($borrower_details);
		$this->load->view('common/header');
		$this->load->view("apex_self/approve_details", $data);
		$this->load->view('common/footer');
	// echo '<pre>'; var_dump($details);exit;
    }

    //function forward_data($memo_no,$disb_dt) {
	function forward_data() {
	$ardb_id = $_SESSION['br_id'];
	$a1_reason =  $this->input->post('reason');
	 $qstr = $_GET['qstr'];
	// die();
	$memo_no=explode(",",$qstr)[0];
	$instl_dt=explode(",",$qstr)[1];
	$a1_reason=explode(",",$qstr)[2];
    //  echo $instl_dt;
	//  die();
	$this->apex_self_model->forward_data($ardb_id, $memo_no,$instl_dt,$a1_reason);
	// echo $this->db->last_query();
	// exit;
	if ($this->apex_self_model->forward_data($ardb_id, $memo_no,$instl_dt,$a1_reason)) {
	    $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
	    redirect('apex_self/apex_self_approve_view');
	} else {
	    $this->session->set_flashdata('msg', 'Something Went Wrong!');
	    redirect('apex_self/apex_self_approve_view');
	}
    }

    function reject_data() {
	$ardb_id   = $_SESSION['br_id'];
	$a1_reason = $this->input->post('reason');
	$qstr = $_GET['qstr'];
	$memo_no=explode(",",$qstr)[0];
	$instl_dt=explode(",",$qstr)[1];
	$a1_reason=explode(",",$qstr)[2];
	// echo $a1_reason;
	// die;
	if ($this->apex_self_model->reject_data($ardb_id, $memo_no,$instl_dt,$a1_reason)) {
	    $this->session->set_flashdata('msg', '<b style:"color:red;">Rejected Successfully!</b>');
	    redirect('apex_self/apex_self_approve_view');
	} else {
	    $this->session->set_flashdata('msg', 'Something Went Wrong!');
	    redirect('apex_self/apex_self_approve_view');
	}
    }

    function get_sanc_amt() {
	$ardb_id = $_SESSION['br_id'];
	$sector_id = $_GET['sector_id'];
	$entry_date = $_GET['date'];
	$sanc_amt = $this->apex_self_model->get_sanc_amt($ardb_id, $sector_id, $entry_date);
	echo json_encode($sanc_amt);
    }

}

?>