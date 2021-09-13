<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends CI_Controller {

	protected $sysdate;

	public function __construct(){

		// $this->sysdate  = $_SESSION['sys_date'];

		parent::__construct();

		//For Individual Functions
		$this->load->model('ho/approve_model');
		$this->load->helper('url'); 
        $this->load->library('zip');

	 if(!isset($this->session->userdata['login']->user_id)){
			
			redirect('Main/login');

		}
		
	}

	function forward($flag = '1'){
		$selected = array(
			'ardb_id' => ''
		);
		$shg_details = array();
		$ardb_list = $this->approve_model->get_ardb_list();
		if($this->input->post()){
			$selected = array(
				'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
			);
		$shg_details = $this->approve_model->get_shg_details($selected['ardb_id'], $flag);
		}
		// echo '<pre>';
		// var_dump($_SESSION);exit;
		$data['flag'] = $flag;
		$data['selected'] = json_encode($selected);
		$data['ardb_list'] = json_encode($ardb_list);
		$data['shg_details'] = json_encode($shg_details);
		$this->load->view('common/header');
		$this->load->view("ho/approve/view", $data);
		$this->load->view('common/footer');
	}


	function dc_entry($ardb_id, $pronote_no, $memo_no){
		$selected = array();
		$dc_shg_dtls = array();
		$borrower_selected = array();
		if($pronote_no > 0 && $memo_no > 0){
			$dc_shg = $this->approve_model->get_shg_details_edit($ardb_id, $pronote_no, $memo_no);
			$dc_shg_dtls = $this->approve_model->get_dc_shg_dtls_edit($ardb_id, $pronote_no, $memo_no);
			foreach($dc_shg as $dc){
				$selected = array(
					'id' => 1,
					'date' => $dc->entry_date,
					'memo_no' => $dc->memo_no,
					'sector' => 'SHG',
					'letter_no' => $dc->letter_no,
					'letter_date' => $dc->letter_date,
					'pronote_no' => $dc->pronote_no,
					'pronote_date' => $dc->pronote_date,
					'purpose' => $dc->purpose_code,
					'moral' => $dc->moratorium_period,
					'repayment' => $dc->repayment_no,
                    'fwd_data' => $dc->fwd_data
				);
			}
			$borrower_details_edit = $this->approve_model->get_borrower_details_edit($pronote_no, $memo_no);
			foreach($borrower_details_edit as $dt){
				$borrower_selected = array(
					'tot_shg' => $dt->total_shg,
					'tot_memb' => $dt->tot_memb,
					'tot_male' => $dt->tot_male,
					'tot_female' => $dt->tot_female,
					'tot_sc' => $dt->tot_sc,
					'tot_st' => $dt->tot_st,
					'tot_obc' => $dt->tot_obc,
					'tot_gen' => $dt->tot_gen,
					'tot_other' => $dt->tot_other,
					'tot_count' => $dt->tot_count,
					'tot_big' => $dt->tot_big,
					'tot_marginal' => $dt->tot_marginal,
					'tot_small' => $dt->tot_small,
					'tot_landless' => $dt->tot_landless,
					'tot_lig' => $dt->tot_lig,
					'tot_mig' => $dt->tot_mig,
					'tot_hig' => $dt->tot_hig
				);
			}
			$block_list = $this->approve_model->get_block_list($ardb_id);
		}
		//$block_list = $this->approve_model->get_block_list($_SESSION['login']->district_id);
		$purpose_list = $this->approve_model->get_purpose_list();
		// echo '<pre>';
		// var_dump($purpose_list);exit;
		$data['ardb_id'] = $ardb_id;
		$data['block_list'] = json_encode($block_list);
		$data['purpose_list'] = json_encode($purpose_list);
		$data['selected'] = json_encode($selected);
		$data['dc_shg_dtls'] = json_encode($dc_shg_dtls);
		$data['borrower_selected'] = json_encode($borrower_selected);
		$this->load->view('common/header');
		$this->load->view("ho/approve/entry", $data);
		$this->load->view('common/footer');
	}

	function dc_save(){
		// redirect('dc/dc_view');
		$data = $this->input->post();
		if($this->approve_model->dc_save($data)){
			$this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
			//$shg_details = $this->approve_model->get_shg_details($ardb_id);
			// echo '<pre>';
			// var_dump($purpose_list);exit;
			// $data['ardb_id'] = $ardb_id;
			// $data['shg_details'] = json_encode($shg_details);
			// $this->load->view('common/header');
			// $this->load->view("ho/dc/view", $data);
			// $this->load->view('common/footer');
			redirect('ho/approve/forward');
		}else{
			$this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
			redirect('dc/approve/dc_entry');
		}
	}

	function dc_delete($pronote_no, $memo_no){
		$ardb_id = $_SESSION['br_id'];
		if($this->approve_model->dc_delete($ardb_id, $pronote_no, $memo_no)){
			$this->session->set_flashdata('msg', '<b style:"color:red;">Save Successfully!</b>');
			$ardb_id = $_SESSION['br_id'];
			$shg_details = $this->approve_model->get_shg_details($ardb_id);
			// echo '<pre>';
			// var_dump($purpose_list);exit;
			$data['ardb_id'] = $ardb_id;
			$data['shg_details'] = json_encode($shg_details);
			$this->load->view('common/header');
			$this->load->view("ho/approve/view", $data);
			$this->load->view('common/footer');
			// redirect('dc/dc_view');
		}else{
			$this->session->set_flashdata('msg', 'Something Went Wrong!');
			redirect('dc/dc_view');
		}
	}

	function forward_data($flag, $ardb_id, $pronote_no, $memo_no){
		if($this->approve_model->forward_data($flag, $ardb_id, $pronote_no, $memo_no)){
			$this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');
			// $shg_details = $this->approve_model->get_shg_details($ardb_id);
			// // echo '<pre>';
			// // var_dump($purpose_list);exit;
			// $data['ardb_id'] = $ardb_id;
			// $data['shg_details'] = json_encode($shg_details);
			// $this->load->view('common/header');
			// $this->load->view("approve/view", $data);
			// $this->load->view('common/footer');
			redirect('ho/approve/forward' . $flag);
		}else{
			$this->session->set_flashdata('msg', 'Something Went Wrong!');
			redirect('ho/approve');
		}
	}
}
?>