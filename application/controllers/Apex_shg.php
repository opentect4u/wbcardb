<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apex_shg extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('apex_shg_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function apex_view() {
        $ardb_id = $_SESSION['br_id'];
        $apex_details = $this->apex_shg_model->apex_view($ardb_id);
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['ardb_id'] = $ardb_id;
        $data['apex_details'] = json_encode($apex_details);
        $this->load->view('common/header');
        $this->load->view("apex_shg/view", $data);
        $this->load->view('common/footer');
    }

    function entry($memo_no, $pronote_no) {
        $ardb_id = $_SESSION['br_id'];
        $selected = array();
        $apex_shg = array();
        if ($memo_no > 0 && $memo_no != '' || $pronote_no > 0 && $pronote_no != '') {
            $apex_shg = $this->apex_shg_model->apex_edit($ardb_id, $memo_no, $pronote_no);
        //    var_dump($apex_shg);
        //    exit;
            $borrower_details = $this->apex_shg_model->borrower_details($ardb_id, $memo_no, $pronote_no);
            foreach ($borrower_details as $dt) {
                $selected = array(
                    'id' => 1,
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
                    'tot_marginal' => $dt->tot_marginal,
                    'tot_landless' => $dt->tot_landless,
                    'tot_hig' => $dt->tot_hig
                );
            }
        }
        $data['ardb_id'] = $ardb_id;
        $data['apex_shg'] = json_encode($apex_shg);
        $data['selected'] = json_encode($selected);
        $this->load->view('common/header');
        $this->load->view("apex_shg/entry", $data);
        $this->load->view('common/footer');
    }

    function save() {
        $data = $this->input->post();
        if ($this->apex_shg_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('apex_shg/apex_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('apex_shg/apex_view');
        }
    }

    function dc_delete($pronote_no, $memo_no) {
        $ardb_id = $_SESSION['br_id'];
        if ($this->apex_shg_model->dc_delete($ardb_id, $pronote_no, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');
            redirect('dc/dc_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('dc/dc_view');
        }
    }

    function get_apex_details() {
        $ardb_id = $_GET['ardb_id'];
        $lso_no = $_GET['lso_no'];
        $apex_shg_details = $shg_details = $this->apex_shg_model->get_apex_details($ardb_id, $lso_no);
		//var_dump($this->db->last_query());exit;
        echo json_encode($apex_shg_details);
    }

    // FORWARD

    function apex_approve_view() {
        $ardb_id = $_SESSION['br_id'];
        $approve_details = $this->apex_shg_model->approve_view($ardb_id, $memo_no = '');
        // var_dump($approve_details);exit;
        $data['ardb_id'] = $ardb_id;
        $data['approve_details'] = json_encode($approve_details);
        $this->load->view('common/header');
        $this->load->view("apex_shg/approve_view", $data);
        $this->load->view('common/footer');
    }

    function approve_details($memo_no) {
        $ardb_id = $_SESSION['br_id'];
        
        $details = array();
        $approve_details = $this->apex_shg_model->approve_view($ardb_id, $memo_no);
        $shg_details = $this->apex_shg_model->apex_edit($ardb_id, $memo_no, $pronote_no = '');
        $memo_header = $this->apex_shg_model->apex_shg_dc_header($ardb_id, $memo_no);
        // echo $this->db->last_query();
        // die();
        
        $borrower_details = $this->apex_shg_model->borrower_details($ardb_id, $memo_no, $pronote_no = '');
        $data['ardb_id'] = $ardb_id;
        $data['memo_no'] = $memo_no;
        $data['details'] = json_encode($details);
        $data['approve_details'] = json_encode($approve_details);
        $data['shg_details'] = json_encode($shg_details);
      $data['memo_header'] = json_encode($memo_header);
        $data['borrower_details'] = json_encode($borrower_details);
//        $data['gt_details'] = json_encode($gt_details);
        $this->load->view('common/header');
        $this->load->view("apex_shg/approve_details", $data);
        $this->load->view('common/footer');
        // echo '<pre>'; var_dump($details);exit;
    }


    function apex_self_dc_header($ardb_id, $memo_no) {

		$sql = 'SELECT DISTINCT shg.memo_no, COUNT(distinct shg.pronote_no) as tot_pronote,
		FLOOR(sum(a.inst_amt)) as tot_amt FROM td_apex_self shg ,td_apex_self_dis a
		WHERE shg.ardb_id=a.ardb_id and shg.pronote_no=a.pronote_no and shg.ardb_id=' . $ardb_id . ' AND replace(replace(replace(shg.memo_no, " ", ""), "/", ""), "-", "")="' . $memo_no . '" GROUP BY shg.memo_no, shg.memo_no ORDER by shg.memo_no';
	
		$data = $this->db->query($sql);
	
	// 	echo $this->db->last_query();exit;
	// die();
		return $data->result();
	
		}
    function forward_data() {
        $ardb_id = $_SESSION['br_id'];
        $a1_reason =  $this->input->post('reason');
        $qstr = $_GET['qstr'];
       
       $memo_no=explode(",",$qstr)[0];
       $a1_reason=explode(",",$qstr)[1];
        if ($this->apex_shg_model->forward_data($ardb_id, $memo_no,$a1_reason)) {
            // echo $this->db->last_query();
            // exit;
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            redirect('apex_shg/apex_approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('apex_shg/apex_approve_view');
        }
    }

    function reject_data() {
        $ardb_id = $_SESSION['br_id'];
        $a1_reason =  $this->input->post('reason');
        $qstr = $_GET['qstr'];
       
       $memo_no=explode(",",$qstr)[0];
       $a1_reason=explode(",",$qstr)[1];

        //  echo $a1_reason;
	    // die;
        if ($this->apex_shg_model->reject_data($ardb_id, $memo_no,$a1_reason)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Rejected Successfully!</b>');
            redirect('apex_shg/apex_approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('apex_shg/apex_approve_view');
        }
    }

    function get_sanc_amt() {
        $ardb_id = $_SESSION['br_id'];
        $sector_id = $_GET['sector_id'];
        $entry_date = $_GET['date'];
        $sanc_amt = $this->apex_shg_model->get_sanc_amt($ardb_id, $sector_id, $entry_date);
        echo json_encode($sanc_amt);
    }

}

?>