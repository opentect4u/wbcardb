<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sanction_amt extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/sanction_amt_model');
        $this->load->helper('url');
        $this->load->library('zip');
        $this->load->helper('download');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function index() {
        $selected = array(
            'ardb_id' => ''
        );
        $sanc_details = array();
        $ardb_list = $this->sanction_amt_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $sanc_details = $this->sanction_amt_model->get_sanc_details($selected['ardb_id']);
        }
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['sanc_details'] = json_encode($sanc_details);
        $this->load->view('common/header');
        $this->load->view("ho/sanction_amt/view", $data);
        $this->load->view('common/footer');
    }

    function entry() {
        $ardb_list = $this->sanction_amt_model->get_ardb_list();
        $sector_list = $this->sanction_amt_model->get_sector_list();
//        echo'<pre>';
//        var_dump($ardb_list);
//        exit;
//        $shg_details = $this->sanction_amt_model->get_shg_details();
        $data['ardb_list'] = json_encode($ardb_list);
        $data['sector_list'] = json_encode($sector_list);
        $this->load->view('common/header');
        $this->load->view("ho/sanction_amt/entry", $data);
        $this->load->view('common/footer');
    }

    function edit($ardb_id, $sector_id) {
        $date = $_GET['dt'];
        $ardb_list = $this->sanction_amt_model->get_ardb_list();
        $sanction_list = $this->sanction_amt_model->get_ardb_list_edit($ardb_id, $sector_id, $date);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['sanction_list'] = json_encode($sanction_list);
        $this->load->view('common/header');
        $this->load->view("ho/sanction_amt/edit", $data);
        $this->load->view('common/footer');
    }

    function save() {
        $data = $this->input->post();
        if ($this->sanction_amt_model->save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/sanction_amt');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/sanction_amt');
        }
    }

    function update() {
        $data = $this->input->post();
        if ($this->sanction_amt_model->update($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/sanction_amt');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/sanction_amt');
        }
    }

    function download_zip($flag, $ardb_id, $memo_no) {
        // echo 'file Download' . ' ' . $pronote_no . ' ' . $ardb_id;
        $files = $this->sanction_amt_model->get_file_details($flag, $ardb_id, $memo_no);
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

}

?>