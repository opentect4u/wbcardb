<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apx_dc_approve extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/apx_dc_approve_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function apex_view($flag = "shg") {
        $flag = $flag == "shg" ? "0" : ($flag == "self" ? "1" : "");
//        echo $flag;
//        exit;
        $selected = array(
            'ardb_id' => ''
        );
        $shg_details = array();
        $ardb_list = $this->apx_dc_approve_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $shg_details = $this->apx_dc_approve_model->get_shg_details($flag, $selected['ardb_id'], $memo_no = '');
//            $shg_details = $this->apx_dc_approve_model->get_shg_details($flag, $selected['ardb_id'], $memo_no = '');
        }
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['flag'] = $flag;
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['shg_details'] = json_encode($shg_details);
        $this->load->view('common/header');
        $this->load->view("ho/apx_dc_approve/view", $data);
        $this->load->view('common/footer');
    }

    function apex_entry($flag, $ardb_id, $memo_no) {
        $apex_details = $this->apx_dc_approve_model->apex_edit($flag, $ardb_id, $memo_no);
        $borrower_details = $this->apx_dc_approve_model->borrower_details($flag, $ardb_id, $memo_no);
        if ($flag > 0) {
            $approve_details = $this->apx_dc_approve_model->approve_view($ardb_id, $memo_no);
            $data['approve_details'] = json_encode($approve_details);
        }
//        $shg_details = $this->apx_dc_approve_model->get_shg_details($flag, $ardb_id, $memo_no);
        $data['flag'] = $flag;
        $data['ardb_id'] = $ardb_id;
        $data['apex_details'] = json_encode($apex_details);
        $data['borrower_details'] = json_encode($borrower_details);
        $view = $flag > 0 ? 'self_entry' : 'entry';
        $this->load->view('common/header');
        $this->load->view("ho/apx_dc_approve/" . $view, $data);
        $this->load->view('common/footer');
    }

    function save() {
        $data = $this->input->post();
        $flag = $this->input->post('flag') > 0 ? 'self' : 'shg';
        if ($this->apx_dc_approve_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/apx_dc_approve/apex_view/' . $flag);
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/apx_dc_approve/apex_view/' . $flag);
        }
    }

}

?>