<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apex_shg extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/apex_shg_model');
        $this->load->helper('url');
        $this->load->library('zip');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    function apex_shg_view() {
        $selected = array(
            'ardb_id' => ''
        );
        $apex_details = array();
        $ardb_list = $this->apex_shg_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $apex_details = $this->apex_shg_model->get_shg_details($selected['ardb_id']);
        }
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['apex_details'] = json_encode($apex_details);
        $this->load->view('common/header');
        $this->load->view("ho/apex_shg/view", $data);
        $this->load->view('common/footer');
    }

    function apex_shg_entry($ardb_id, $pronote_no, $memo_no) {
        $selected = array();
        $apex_shg = array();
        if ($memo_no > 0 && $memo_no != '' || $pronote_no > 0 && $pronote_no != '') {
            $apex_shg = $this->apex_shg_model->apex_edit($ardb_id, $memo_no, $pronote_no);
//            var_dump($apex_shg);
//            exit;
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
        // echo '<pre>';
        // var_dump($purpose_list);exit;
        $data['ardb_id'] = $ardb_id;
        $data['selected'] = json_encode($selected);
        $data['apex_shg'] = json_encode($apex_shg);
        $this->load->view('common/header');
        $this->load->view("ho/apex_shg/entry", $data);
        $this->load->view('common/footer');
    }

    function apex_shg_save() {
        // redirect('dc/dc_view');
        $data = $this->input->post();
        if ($this->apex_shg_model->apex_shg_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/apex_shg/apex_shg_view');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/apex_shg/apex_shg_view');
        }
    }

    //APPROVE 1 for approver

    function apex_shg_approve_view() {
        $selected = array(
            'ardb_id' => ''
        );
        $approve_details = array();
        $ardb_list = $this->apex_shg_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $approve_details = $this->apex_shg_model->approve_view($selected['ardb_id'], $memo_no = '');
        }
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['approve_details'] = json_encode($approve_details);
        $this->load->view('common/header');
        $this->load->view("ho/apex_shg/approve_view", $data);
        $this->load->view('common/footer');
    }

    function approve_details($ardb_id, $memo_no) {
        $details = array();
        $approve_details = $this->apex_shg_model->approve_view($ardb_id, $memo_no);
        $shg_details = $this->apex_shg_model->apex_edit($ardb_id, $memo_no, $pronote_no = '');
        $borrower_details = $this->apex_shg_model->borrower_details($ardb_id, $memo_no, $pronote_no = '');
        $data['ardb_id'] = $ardb_id;
        $data['memo_no'] = $memo_no;
        $data['details'] = json_encode($details);
        $data['approve_details'] = json_encode($approve_details);
        $data['shg_details'] = json_encode($shg_details);
//        $data['memo_header'] = json_encode($memo_header);
        $data['borrower_details'] = json_encode($borrower_details);
        $this->load->view('common/header');
        $this->load->view("ho/apex_shg/approve_details", $data);
        $this->load->view('common/footer');
        // echo '<pre>'; var_dump($details);exit;
    }

    function forward_data($ardb_id, $memo_no) {
        if ($this->apex_shg_model->forward_data($ardb_id, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            redirect('ho/apex_shg/apex_shg_approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/apex_shg/apex_shg_approve_view');
        }
    }

    function forward_to_apex($ardb_id, $memo_no) {
        $this->load->library('ftp');

        /* FTP Account (Remote Server) */
        $ftp_host = '202.65.156.246'; /* host */
        $ftp_user_name = 'ftp_wbscardb'; /* username */
        $ftp_user_pass = 'Signature@2021$$'; /* password */

        /* GET DETAILS */
        $data = $this->apex_shg_model->get_csv_details($ardb_id, $memo_no);
        $ardb_details = $this->apex_shg_model->get_ardb_name($ardb_id);
        $ardb_name = str_replace(array(':', '-', '/', '.', '*', ' '), '', strtolower($ardb_details[0]->name));
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d_his');
        $report_type = 'apexshgdc';
        $file_name = $report_type . '_' . $ardb_name . '_' . $timestamp . '.csv';

        // Create temporary file
        $local_file = fopen('php://temp', 'r+');
        fwrite($local_file, $data);
        rewind($local_file);

        /* Connect using basic FTP */
        $connect_it = ftp_connect($ftp_host);

        /* Login to FTP */
        $login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);

        ftp_fput($connect_it, '/apex_shg_dc/' . $file_name, $local_file, FTP_BINARY, 0);

        fclose($local_file);
        ftp_close($connect_it);

        if ($this->apex_shg_model->forward_data($ardb_id, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            redirect('ho/apex_shg/apex_shg_approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/apex_shg/apex_shg_approve_view');
        }
    }

    function reject_data($ardb_id, $memo_no) {
        if ($this->apex_shg_model->reject_data($ardb_id, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Rejected Successfully!</b>');
            redirect('ho/dc/approve_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/dc/dc_view');
        }
    }

}

?>