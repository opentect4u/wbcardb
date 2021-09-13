<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_self extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('ho/dc_self_model');
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
        $shg_details = array();
        $ardb_list = $this->dc_self_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $shg_details = $this->dc_self_model->get_self_details($selected['ardb_id']);
        }
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['shg_details'] = json_encode($shg_details);
        $this->load->view('common/header');
        $this->load->view("ho/dc_self/view", $data);
        $this->load->view('common/footer');
    }

    function dc_entry($ardb_id, $pronote_no, $memo_no) {
        // echo $this->uri->segment(2);exit;
        $selected = array();
        $dc_shg_dtls = array();
        $borrower_selected = array();
        if ($pronote_no > 0 && $memo_no > 0 || $pronote_no != '' && $memo_no != '') {
            $dc_shg = $this->dc_self_model->get_self_details_edit($ardb_id, $pronote_no, $memo_no);
            $dc_shg_dtls = $this->dc_self_model->get_dc_self_dtls_edit($ardb_id, $pronote_no, $memo_no);
            foreach ($dc_shg as $dc) {
                $selected = array(
                    'id' => 1,
                    'date' => $dc->entry_date,
                    'memo_no' => $dc->memo_no,
                    'sector_code' => $dc->sector_code,
                    'gender_id' => $dc->gender_id,
                    'roi' => $dc->roi,
                    // 'letter_no' => $dc->letter_no,
                    // 'letter_date' => $dc->letter_date,
                    'pronote_no' => $dc->pronote_no,
                    'pronote_date' => $dc->pronote_date,
                    'purpose' => $dc->purpose_code,
                    'moral' => $dc->moratorium_period,
                    'repayment' => $dc->repayment_no,
                    'fwd_data' => $_SESSION['user_type'] == 'U' ? $dc->ho_fwd_data : ($_SESSION['user_type'] == 'P' ? $dc->ho_approve_1 : ($_SESSION['user_type'] == 'V' ? $dc->ho_approve_2 : ''))
                );
            }
            $borrower_details_edit = $this->dc_self_model->get_borrower_details_edit($pronote_no, $memo_no);
            // ech o '<pre>'; var_dump($dc_shg_dtls);exit;
            foreach ($borrower_details_edit as $dt) {
                $borrower_selected = array(
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
                    'tot_small' => $dt->tot_small,
                    'tot_landless' => $dt->tot_landless,
                    'tot_lig' => $dt->tot_lig,
                    'tot_mig' => $dt->tot_mig,
                    'tot_hig' => $dt->tot_hig
                );
            }
        }
        $sector_list = $this->dc_self_model->get_sector_list();
        $block_list = $this->dc_self_model->get_block_list($ardb_id);
        $purpose_list = $this->dc_self_model->get_purpose_list();
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
        $this->load->view("ho/dc_self/entry", $data);
        $this->load->view('common/footer');
    }

    function dc_save() {
        // redirect('dc/dc_view');
        $data = $this->input->post();
        if ($this->dc_self_model->dc_save($data)) {
            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            redirect('ho/dc_self');
        } else {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');
            redirect('ho/dc_self');
        }
    }

    function dc_delete($pronote_no, $memo_no) {
        $ardb_id = $_SESSION['br_id'];
        if ($this->dc_self_model->dc_delete($ardb_id, $pronote_no, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');
            redirect('dc_self');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('dc_self');
        }
    }

    function get_dc_details() {
        $memo_no = $this->input->post('memo_no');
        $pronote_no = $this->input->post('pronote_no');

        $dc_details = $this->dc_self_model->get_dc_details($memo_no, $pronote_no);
        //echo $this->db->last_query();exit;
        // var_dump(json_encode($dc_details));exit;
        echo json_encode($dc_details);
    }

    function file_uploads() {
        $ardb_id = $_SESSION['br_id'];
        $memo_details = $this->dc_self_model->get_memo_no_details($ardb_id);
        //var_dump($memo_details);exit;
        $data['ardb_id'] = $ardb_id;
        $data['memo_details'] = json_encode($memo_details);
        $this->load->view('common/header');
        $this->load->view("dc_self/dc_file_upload", $data);
        $this->load->view('common/footer');
    }

    function upload() {
        $ardb_id = $_SESSION['br_id'];
        $data = $this->input->post();
        // $file = $_FILES['userfile'];
        // echo '<pre>'; var_dump($_FILES['userfile']);exit;
        // $shg_name = str_replace(array(':', '-', '/', '*', ' '), '_', $data['shg_name']);

        $up = './dc_self_file/';
        $pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $data['pronote_no']);
        $folder = $up . $pronote_no;

        // echo $folder;exit;

        if (!is_dir($folder)) {
            mkdir($folder, 777);
        }

        $config['upload_path'] = './dc_self_file/' . $pronote_no . '/';
        $config['allowed_types'] = 'pdf|jpg|png';
        //$config['encrypt_name']         = true;
        $config['max_size'] = 1024;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        //echo '<pre>' . $config['upload_path']; //var_dump($this->load->library('upload', $config));exit;
        $j = 0;
        //var_dump($_FILES['userfile']['name']); echo '<br>';
        foreach ($_FILES['userfile']['name'] as $k => $v) {
            // var_dump($_FILES['userfile']['name'][$k]);
            if ($_FILES['userfile']['name'][$k] != '') {
                $_FILES['file[]']['name'] = $_FILES['userfile']['name'][$k];
                $_FILES['file[]']['type'] = $_FILES['userfile']['type'][$k];
                $_FILES['file[]']['tmp_name'] = $_FILES['userfile']['tmp_name'][$k];
                $_FILES['file[]']['error'] = $_FILES['userfile']['error'][$k];
                $_FILES['file[]']['size'] = $_FILES['userfile']['size'][$k];

                $config['file_name'] = $pronote_no . '_' . ++$j;
                //echo '<br>' . $config['file_name'] . '<br>';
                // var_dump(is_dir('./shg_file/' . $folder . '/'));
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file[]')) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    exit;
                    redirect('dc_self/dc_file_upload');
                } else {
                    $file_data = array('upload_data' => $this->upload->data());
                    //echo '<pre>'; var_dump($file_data);
                    $this->dc_self_model->dc_file_upload_save($ardb_id, $data, $file_data['upload_data']);
                    // exit;
                    //redirect('dc/dc_file_upload');
                    //echo true;
                }
            }
        }
        $this->session->set_flashdata('msg', '<b style:"color:red;">Uploaded Successfully!</b>');
        redirect('dc_self');
        //exit;
    }

    function get_pronote_details() {
        $ardb_id = $_SESSION['br_id'];
        $memo_no = $_GET['memo_no'];
        $pronote_details = $this->dc_self_model->get_pronote_details($ardb_id, $memo_no);
        echo json_encode($pronote_details);
    }

    function get_shg_names() {
        $ardb_id = $_SESSION['br_id'];
        $memo_no = $_GET['memo_no'];
        $pronote_no = $_GET['pronote_no'];
        $shg_names = $this->dc_self_model->get_shg_names($ardb_id, $memo_no, $pronote_no);
        echo json_encode($shg_names);
    }

    function download_zip($ardb_id, $memo_no) {
        // echo 'file Download' . ' ' . $pronote_no . ' ' . $ardb_id;
        $files = $this->dc_self_model->get_file_details($ardb_id, $memo_no);
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

    // FORWARD

    function forward_view() {
        $selected = array(
            'ardb_id' => ''
        );
        $approve_details = array();
        $ardb_list = $this->dc_self_model->get_ardb_list();
        if ($this->input->post()) {
            $selected = array(
                'ardb_id' => array_key_exists('ardb_id', $_POST) ? $_POST['ardb_id'] : ''
            );
            $approve_details = $this->dc_self_model->approve_view($selected['ardb_id'], $memo_no = '');
        }
        // echo '<pre>';
        // var_dump($_SESSION);exit;
        $data['selected'] = json_encode($selected);
        $data['ardb_list'] = json_encode($ardb_list);
        $data['approve_details'] = json_encode($approve_details);
        $this->load->view('common/header');
        $this->load->view("ho/dc_self/approve_view", $data);
        $this->load->view('common/footer');
    }

    function approve_details($ardb_id, $memo_no) {
        $details = array();
        $approve_details = $this->dc_self_model->approve_view($ardb_id, $memo_no);
        $memo_details = $this->dc_self_model->get_memo_no_details($ardb_id);
        $memo_header = $this->dc_self_model->get_shg_dc_header($ardb_id, $memo_no);
        $shg_details = $this->dc_self_model->get_approve_shg_details($ardb_id, $memo_no);
        $borrower_details = $this->dc_self_model->get_borrower_approve_details($ardb_id, $memo_no);
        $gt_details = $this->dc_self_model->get_total_shg($ardb_id, $memo_no);
		foreach ($shg_details as $shg) {
            if (!isset($details[$shg->pronote_no])) {
                $details[$shg->pronote_no] = array();
                $details[$shg->pronote_no]['rowspan'] = 0;
            }
            $details[$shg->pronote_no]['print'] = 'no';
            $details[$shg->pronote_no]['rowspan'] += 1;
        }
        $data['ardb_id'] = $ardb_id;
        $data['memo_no'] = $memo_no;
		$data['details'] = json_encode($details);
        $data['approve_details'] = json_encode($approve_details);
        $data['shg_details'] = json_encode($shg_details);
        $data['memo_header'] = json_encode($memo_header);
        $data['borrower_details'] = json_encode($borrower_details);
        $data['gt_details'] = json_encode($gt_details);
        $this->load->view('common/header');
        $this->load->view("ho/dc_self/approve_details", $data);
        $this->load->view('common/footer');
        // echo '<pre>'; var_dump($details);exit;
    }

    function forward_data($ardb_id, $memo_no) {
        if ($this->dc_self_model->forward_data($ardb_id, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            redirect('ho/dc_self/forward_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/dc_self/forward_view');
        }
    }

    function reject_data($ardb_id, $memo_no) {
        //$ardb_id = $_SESSION['br_id'];
        if ($this->dc_self_model->reject_data($ardb_id, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Rejected Successfully!</b>');
            redirect('ho/dc_self/forward_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/dc_self/forward_view');
        }
    }

    function forward_to_apex($ardb_id, $memo_no) {
        $this->load->library('ftp');

        /* FTP Account (Remote Server) */
        $ftp_host = '202.65.156.246'; /* host */
        $ftp_user_name = 'ftp_wbscardb'; /* username */
        $ftp_user_pass = 'Signature@2021$$'; /* password */

        /* GET DETAILS */
        $data = $this->dc_self_model->get_csv_details($ardb_id, $memo_no);
        $ardb_details = $this->dc_self_model->get_ardb_name($ardb_id);
        $ardb_name = str_replace(array(':', '-', '/', '.', '*', ' '), '', strtolower($ardb_details[0]->name));
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d_his');
        $report_type = 'selfdc';
        $file_name = $ardb_name . '_' . $report_type . '_' . $timestamp . '.csv';

        // Create temporary file
        $local_file = fopen('php://temp', 'r+');
        fwrite($local_file, $data);
        rewind($local_file);

        /* Connect using basic FTP */
        $connect_it = ftp_connect($ftp_host);

        /* Login to FTP */
        $login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);

        ftp_fput($connect_it, '/self_dc/' . $file_name, $local_file, FTP_BINARY, 0);

        fclose($local_file);
        ftp_close($connect_it);

        if ($this->dc_self_model->forward_data($ardb_id, $memo_no)) {
            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');
            redirect('ho/dc_self/forward_view');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/dc_self/forward_view');
        }
    }
	
	function get_info(){phpinfo();}

}

?>