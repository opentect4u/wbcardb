<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Self_doc_verify extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/self_doc_verify_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function view($flag = "shg") {
        $flag = $flag == "shg" ? "0" : ($flag == "self" ? "1" : "");
        // echo $flag; exit;
        $selected = array(
            'ardb_id' => ''
        );
        $shg_details = array();
        $ardb_list = $this->self_doc_verify_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $shg_details = $this->self_doc_verify_model->get_shg_details($flag, $selected['ardb_id'], $memo_no = '');
        }
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['flag'] = $flag;
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['shg_details'] = json_encode($shg_details);
        $this->load->view('common/header');
        $this->load->view("ho/self_doc_verify/view", $data);
        $this->load->view('common/footer');
    }

    function entry($flag, $ardb_id, $memo_no) {
        $shg_details = $this->self_doc_verify_model->get_shg_details($flag, $ardb_id, $memo_no);
        $data['flag'] = $flag;
        $data['ardb_id'] = $ardb_id;
        $data['shg_details'] = json_encode($shg_details);
        $this->load->view('common/header');
        $this->load->view("ho/self_doc_verify/entry", $data);
        $this->load->view('common/footer');
    }

    function save() {
        // redirect('dc/dc_view');
        $data = $this->input->post();
        $flag = $this->input->post('flag') > 0 ? 'self' : 'shg';
        if ($this->self_doc_verify_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/self_doc_verify/view/' . $flag);
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/self_doc_verify/view/' . $flag);
        }
    }

    function download_zip($flag, $ardb_id, $memo_no) {
        // echo 'file Download' . ' ' . $pronote_no . ' ' . $ardb_id;
        $files = $this->self_doc_verify_model->get_file_details($flag, $ardb_id, $memo_no);
        // var_dump($files);exit;
        foreach ($files as $f) {
            $this->zip->read_file($f->file_path);
        }
        // File name
        $filename = $ardb_id . '-' . $memo_no . '.zip';
        // Download
        if (!$this->zip->download($filename)) {
            echo '<h2 style="color:red">Error</h2>';
        } else {
            echo '<h2 style="color:green">Success</h2>';
        }
    }

    function check_dock_no() {
        $dock_no = $_GET['dock_no'];
        $check = $this->self_doc_verify_model->check_dock_no($dock_no);
        echo json_encode($check);
    }

}

?>