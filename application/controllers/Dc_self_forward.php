<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_self_forward extends CI_Controller {

	protected $sysdate;

	public function __construct(){

		// $this->sysdate  = $_SESSION['sys_date'];

		parent::__construct();

		//For Individual Functions
		$this->load->model('dc_self_forward_model');
		$this->load->helper('url'); 
        $this->load->library('zip');

	 if(!isset($this->session->userdata['login']->user_id)){
			
			redirect('Main/login');

		}
		
	}

	function index(){
		$ardb_id = $_SESSION['br_id'];
		$shg_details = $this->dc_self_forward_model->get_shg_details($ardb_id);
		// echo '<pre>';
		// var_dump($_SESSION);exit;
		$data['ardb_id'] = $ardb_id;
		$data['shg_details'] = json_encode($shg_details);
		$this->load->view('common/header');
		$this->load->view("self_dc_forward/view", $data);
		$this->load->view('common/footer');
	}


	function dc_entry($pronote_no, $memo_no){
		$ardb_id = $_SESSION['br_id'];
		$user_type = $_SESSION['user_type'];
		$selected = array();
		$dc_shg_dtls = array();
		$borrower_selected = array();
		if($pronote_no > 0 && $memo_no > 0){
			$dc_shg = $this->dc_self_forward_model->get_shg_details_edit($ardb_id, $pronote_no, $memo_no);
			$dc_shg_dtls = $this->dc_self_forward_model->get_dc_shg_dtls_edit($ardb_id, $pronote_no, $memo_no);
			foreach($dc_shg as $dc){
				$selected = array(
					'id' => 1,
					'date' => $dc->entry_date,
					'memo_no' => $dc->memo_no,
					'sector_code' => $dc->sector_code,
					'letter_no' => $dc->letter_no,
					'letter_date' => $dc->letter_date,
					'pronote_no' => $dc->pronote_no,
					'pronote_date' => $dc->pronote_date,
					'purpose' => $dc->purpose_code,
					'moral' => $dc->moratorium_period,
					'repayment' => $dc->repayment_no,
                    'fwd_data' => $user_type == 'P' ? $dc->approve_1 : ($user_type == 'V' ? $dc->approve_2 : '')
				);
			}
			$borrower_details_edit = $this->dc_self_forward_model->get_borrower_details_edit($pronote_no, $memo_no);
			foreach($borrower_details_edit as $dt){
				$borrower_selected = array(
					'tot_memb' => $dt->tot_memb,
					'tot_borrower' => $dt->tot_borrower,
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
		}
		$block_list = $this->dc_self_forward_model->get_block_list($_SESSION['login']->district_id);
		$purpose_list = $this->dc_self_forward_model->get_purpose_list();
		$sector_list = $this->dc_self_forward_model->get_sector_list();
		// echo '<pre>';
		// var_dump($purpose_list);exit;
		$data['ardb_id'] = $ardb_id;
		$data['block_list'] = json_encode($block_list);
		$data['sector_list'] = json_encode($sector_list);
		$data['purpose_list'] = json_encode($purpose_list);
		$data['selected'] = json_encode($selected);
		$data['dc_shg_dtls'] = json_encode($dc_shg_dtls);
		$data['borrower_selected'] = json_encode($borrower_selected);
		$this->load->view('common/header');
		$this->load->view("self_dc_forward/entry", $data);
		$this->load->view('common/footer');
	}

	function dc_save(){
		// redirect('dc/dc_view');
		$data = $this->input->post();
		if($this->dc_self_forward_model->dc_save($data)){
			$this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
			redirect('dc_self_forward');
		}else{
			$this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
			redirect('self_dc_forward/dc_entry');
		}
	}

	function dc_delete($pronote_no, $memo_no){
		$ardb_id = $_SESSION['br_id'];
		if($this->dc_self_forward_model->dc_delete($ardb_id, $pronote_no, $memo_no)){
			$this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');
			redirect('dc_self_forward');
		}else{
			$this->session->set_flashdata('msg', 'Something Went Wrong!');
			redirect('self_dc_forward');
		}
	}

	function forward_data($pronote_no, $memo_no){
		$ardb_id = $_SESSION['br_id'];
		if($this->dc_self_forward_model->forward_data($ardb_id, $pronote_no, $memo_no)){
			$this->session->set_flashdata('msg', '<b style:"color:green;">Forwarded Successfully!</b>');
			redirect('dc_self_forward');
		}else{
			$this->session->set_flashdata('msg', 'Something Went Wrong!');
			redirect('dc_self_forward');
		}
	}
}
?>