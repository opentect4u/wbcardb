<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Dc extends CI_Controller {



    protected $sysdate;



    public function __construct() {



        // $this->sysdate  = $_SESSION['sys_date'];



        parent::__construct();



        //For Individual Functions

        $this->load->model('dc_model');

        $this->load->model('Process');

        $this->load->helper('url');

        $this->load->library('zip');

        $this->load->helper('download');



        if (!isset($this->session->userdata['login']->user_id)) {



            redirect('Main/login');

        }

    }



    function dc_view() {

        $ardb_id = $_SESSION['br_id'];

        $shg_details = $this->dc_model->get_shg_details($ardb_id);

        // echo '<pre>';

        // var_dump($_SESSION);exit;

        $data['ardb_id'] = $ardb_id;

        $data['shg_details'] = json_encode($shg_details);

        $this->load->view('common/header');

        $this->load->view("dc/view", $data);

        $this->load->view('common/footer');

    }



    function dc_entry($pronote_no, $memo_no) {

        $ardb_id = $_SESSION['br_id'];

        $selected = array();

        $dc_shg_dtls = array();

        $borrower_selected = array();

        if ($pronote_no > 0 && $memo_no > 0 || $pronote_no != '' && $memo_no != '') {

            $dc_shg = $this->dc_model->get_shg_details_edit($ardb_id, $pronote_no, $memo_no);

            $dc_shg_dtls = $this->dc_model->get_dc_shg_dtls_edit($ardb_id, $pronote_no, $memo_no);
// echo $this->db->last_query();
// exit;
            foreach ($dc_shg as $dc) {

                $selected = array(

                    'id' => 1,

                    'date' => $dc->entry_date,

                    'memo_no' => $dc->memo_no,

                    'sector' => 'SHG',

                    'gender_id' => $dc->gender_id,

                    'roi' => $dc->roi,

                    // 'letter_no' => $dc->letter_no,

                    // 'letter_date' => $dc->letter_date,

                    'pronote_no' => $dc->pronote_no,

                    'pronote_date' => $dc->pronote_date,

                    'purpose' => $dc->purpose_code,

                    'moral' => $dc->moratorium_period,

                    'repayment' => $dc->repayment_no,

                    'fwd_data' => $dc->fwd_data,

                    'ag_bound' => $dc_shg_dtls[0]->total_Intr_ag_bond

                );

            }

            $borrower_details_edit = $this->dc_model->get_borrower_details_edit($pronote_no, $memo_no);

            // var_dump($borrower_details_edit);exit;

            foreach ($borrower_details_edit as $dt) {

                $borrower_selected = array(

                    'tot_shg' => $dt->total_shg,

                    'tot_memb' => $dt->tot_memb,

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

        $block_list = $this->dc_model->get_block_list($_SESSION['login']->district_id);

        $purpose_list = $this->dc_model->get_purpose_list();

        // echo '<pre>';

        // var_dump(unserialize(GENDER_ID));exit;

        $data['ardb_id'] = $ardb_id;

        $data['block_list'] = json_encode($block_list);

        $data['purpose_list'] = json_encode($purpose_list);

        $data['selected'] = json_encode($selected);

        $data['dc_shg_dtls'] = json_encode($dc_shg_dtls);

        $data['borrower_selected'] = json_encode($borrower_selected);

        $this->load->view('common/header');

        $this->load->view("dc/entry", $data);

        $this->load->view('common/footer');

    }

    function dc_save() {

        // redirect('dc/dc_view');
        $user_id=$_SESSION['user_id'] ;
        $data1 = $this->Process->userInf($user_id);
        $psw=$_SESSION['password'] ;
        $br= $_SESSION['br_id'];
        $data = $this->input->post();

        if ($this->dc_model->dc_save($data)) {

            $this->session->set_flashdata('msg', '<b style:"color:green;">Successfully added!</b>');
            if ($br==$data1->br_id) {

            redirect('dc/dc_view');
            }

        } else {

            $this->session->set_flashdata('msg', '<b style:"color:red;">Something Went Wrong!</b>');

            redirect('dc/dc_entry');

        }

    }



    function dc_delete($pronote_no, $memo_no) {

        $ardb_id = $_SESSION['br_id'];

        if ($this->dc_model->dc_delete($ardb_id, $pronote_no, $memo_no)) {

            $this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');

            redirect('dc/dc_view');

        } else {

            $this->session->set_flashdata('msg', 'Something Went Wrong!');

            redirect('dc/dc_view');

        }

    }



    function get_dc_details() {

        $memo_no = $this->input->post('memo_no');

        $pronote_no = $this->input->post('pronote_no');



        $dc_details = $this->dc_model->get_dc_details($memo_no, $pronote_no);

        //echo $this->db->last_query();exit;

        // var_dump(json_encode($dc_details));exit;

        echo json_encode($dc_details);

    }



    function dc_file_upload() {

        $ardb_id = $_SESSION['br_id'];

        $memo_details = $this->dc_model->get_memo_no_details($ardb_id);

        //var_dump($memo_details);exit;

        $data['ardb_id'] = $ardb_id;

        $data['memo_details'] = json_encode($memo_details);

        $this->load->view('common/header');

        $this->load->view("dc/dc_file_upload", $data);

        $this->load->view('common/footer');

    }



    function upload() {

        $ardb_id = $_SESSION['br_id'];

        $data = $this->input->post();

        // $file = $_FILES['userfile'];

        // echo '<pre>'; var_dump($_FILES['userfile']);exit;

        $shg_name = str_replace(array(':', '-', '/', '*', ' '), '_', $data['shg_name']);



        $up = './uploads/shg_files/';

        $pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $data['pronote_no']);

        $folder = $up . $pronote_no;


				//print_r($_SERVER['DOCUMENT_ROOT']);
		//echo '<br>FCPATH: ' . FCPATH; echo '<br>FPATH : ' . $folder; exit;
        if (!is_dir($folder)) {
			//mkdir($folder);
            mkdir($folder, 0777, true);
        }
		//echo 'Not Exicuted'; exit;
		//var_dump(mkdir($folder));exit;



//        $config['upload_path'] = './shg_file/' . $pronote_no . '/';

//        $config['allowed_types'] = 'pdf|jpg|png';

//        //$config['encrypt_name']         = true;

//        $config['max_size'] = 3072; // max-size: 3MB

//        $config['max_width'] = 1024;

//        $config['max_height'] = 768;

//

//        $this->load->library('upload', $config);

        //echo '<pre>' . $config['upload_path']; //var_dump($this->load->library('upload', $config));exit;

//        var_dump($_FILES['userfile']);

//        echo '<br>';

//        exit;

        $j = 0;

        foreach ($_FILES['userfile']['name'] as $k => $v) {

            // var_dump($_FILES['userfile']['name'][$k]);

            if ($_FILES['userfile']['name'][$k] != '') {

                $_FILES['file[]']['name'] = $_FILES['userfile']['name'][$k];

                $_FILES['file[]']['type'] = $_FILES['userfile']['type'][$k];

                $_FILES['file[]']['tmp_name'] = $_FILES['userfile']['tmp_name'][$k];

                $_FILES['file[]']['error'] = $_FILES['userfile']['error'][$k];

                $_FILES['file[]']['size'] = $_FILES['userfile']['size'][$k];



                $config['upload_path'] = './uploads/shg_files/' . $pronote_no . '/';
				//$config['upload_path'] = './shg_file/test_files/';

                $config['allowed_types'] = 'pdf';

                //$config['encrypt_name']         = true;

                $config['max_size'] = 5120; // max-size: 3MB

                $config['max_width'] = 1024;

                $config['max_height'] = 768;



                $this->load->library('upload', $config);

				//var_dump($config['upload_path']);exit;

                $config['file_name'] = $shg_name . '_' . ++$j;

                //echo '<br>' . $config['file_name'] . '<br>';

                // var_dump(is_dir('./shg_file/' . $folder . '/'));

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file[]')) {

                    $error = array('error' => $this->upload->display_errors());

//                    echo $_FILES['userfile']['name'][0] . ' ' . $error['error'];

//                    exit;

                    $this->session->set_flashdata('msg', '<b style:"color:red;">' . $_FILES['userfile']['name'][0] . ' ' . $error['error'] . '</b>');

                    redirect('dc/dc_file_upload');

                } else {

                    $file_data = array('upload_data' => $this->upload->data());

                    //echo '<pre>'; var_dump($file_data);

                    $this->dc_model->dc_file_upload_save($ardb_id, $data, $file_data['upload_data']);

                    // exit;

                    //redirect('dc/dc_file_upload');

                    //echo true;

                }

            }

        }

        $this->session->set_flashdata('msg', '<b style:"color:red;">Delete Successfully!</b>');

        redirect('dc/dc_view');

    }



    function get_pronote_details() {

        $ardb_id = $_SESSION['br_id'];

        $memo_no = $_GET['memo_no'];

        $pronote_details = $this->dc_model->get_pronote_details($ardb_id, $memo_no);

        echo json_encode($pronote_details);

    }



    function get_shg_names() {

        $ardb_id = $_SESSION['br_id'];

        $memo_no = $_GET['memo_no'];

        $pronote_no = $_GET['pronote_no'];

        $shg_names = $this->dc_model->get_shg_names($ardb_id, $memo_no, $pronote_no);

        echo json_encode($shg_names);

    }



    function download_zip($memo_no) {

        $ardb_id = $_SESSION['br_id'];
		$ardb_name = str_replace(' ', '_', str_replace('.', '', $_SESSION['login']->ardb_name));
		//echo '<pre>'; var_dump();exit;

        // echo 'file Download' . ' ' . $pronote_no . ' ' . $ardb_id;

        $files = $this->dc_model->get_file_details($ardb_id, $memo_no);
		//echo '<pre>'; var_dump($files);exit;

        foreach ($files as $f) {
			
            $this->zip->read_file($f->file_path);
			
        }
		
        // File name

        $filename = str_replace(' ', '', $ardb_name . '_' . $memo_no . '.zip');	


        // Download

        if (!$this->zip->download($filename)) {

            echo '<h2 style="color:red">Error</h2>';

        } else {

            echo '<h2 style="color:green">Success</h2>';

        }

    }



    // FORWARD



    function approve_view() {

        $ardb_id = $_SESSION['br_id'];

        $approve_details = $this->dc_model->approve_view($ardb_id, $memo_no = '');

        // var_dump($approve_details);exit;

        $data['ardb_id'] = $ardb_id;

        $data['approve_details'] = json_encode($approve_details);

        $this->load->view('common/header');

        $this->load->view("dc/approve_view", $data);

        $this->load->view('common/footer');

    }



    function approve_details($memo_no) {

        $ardb_id = $_SESSION['br_id'];

        $details = array();

        $approve_details = $this->dc_model->approve_view($ardb_id, $memo_no);

        // var_dump($approve_details);exit;

        $memo_details = $this->dc_model->get_memo_no_details($ardb_id);

        $memo_header = $this->dc_model->get_shg_dc_header($ardb_id, $memo_no);

        // $shg_details = $this->dc_model->get_approve_shg_details($ardb_id);

        $shg_details = $this->dc_model->get_approve_shg_details($ardb_id, $memo_no);

        foreach ($shg_details as $shg) {

            if (!isset($details[$shg->pronote_no])) {

                $details[$shg->pronote_no] = array();

                $details[$shg->pronote_no]['rowspan'] = 0;

            }

            $details[$shg->pronote_no]['print'] = 'no';

            $details[$shg->pronote_no]['rowspan'] += 1;

        }

        // echo '<pre>'; var_dump($details);exit;

        $borrower_details = $this->dc_model->get_borrower_approve_details($ardb_id, $memo_no);

        $gt_details = $this->dc_model->get_total_shg($ardb_id, $memo_no);

        // foreach($memo_details as $memo){

        // 	$memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $memo->memo_no);

        // 	$shg_details = $this->dc_model->get_approve_shg_details($ardb_id, $memo_no);

        // 	foreach($shg_details as $k => $v){

        // 		$details[$memo->memo_no][] = array(

        // 				$k => $v

        // 		);

        // 	}

        // }

        $data['ardb_id'] = $ardb_id;

        $data['memo_no'] = $memo_no;

        $data['details'] = json_encode($details);

        $data['approve_details'] = json_encode($approve_details);

        $data['shg_details'] = json_encode($shg_details);

        $data['memo_header'] = json_encode($memo_header);

        $data['borrower_details'] = json_encode($borrower_details);

        $data['gt_details'] = json_encode($gt_details);

        $this->load->view('common/header');

        $this->load->view("dc/approve_details", $data);

        $this->load->view('common/footer');

        // echo '<pre>'; var_dump($details);exit;

    }



    function forward_data() {

        $ardb_id = $_SESSION['br_id'];
        $a1_reason =  $this->input->post('reason');
        $qstr = $_GET['qstr'];
       
       $memo_no=explode(",",$qstr)[0];
       $a1_reason=explode(",",$qstr)[1];


        if ($this->dc_model->forward_data($ardb_id, $memo_no, $a1_reason)) {
            // echo $this->db->last_query();
            // exit();

            $this->session->set_flashdata('msg', '<b style:"color:red;">Forwaded Successfully!</b>');

            redirect('dc/approve_view');

        } else {

            $this->session->set_flashdata('msg', 'Something Went Wrong!');

            redirect('dc/dc_view');

        }

    }



    function reject_data() {

        $ardb_id = $_SESSION['br_id'];
        $a1_reason =  $this->input->post('reason');
        $qstr = $_GET['qstr'];
       
       $memo_no=explode(",",$qstr)[0];
       $a1_reason=explode(",",$qstr)[1];


        if ($this->dc_model->reject_data($ardb_id, $memo_no,$a1_reason)) {

            //  echo $this->db->last_query();
            //  exit();
            $this->session->set_flashdata('msg', '<b style:"color:red;">Rejected Successfully!</b>');

            redirect('dc/approve_view');

        } else {

            $this->session->set_flashdata('msg', 'Something Went Wrong!');

            redirect('dc/dc_view');

        }

    }



    function get_sanc_amt() {

        $ardb_id = $_SESSION['br_id'];

        $sector_id = $_GET['sector_id'];

        $entry_date = $_GET['date'];

        $sanc_amt = $this->dc_model->get_sanc_amt($ardb_id, $sector_id, $entry_date);

        echo json_encode($sanc_amt);

    }



    ///////////////////////////////////////////////////////////////////////////



    function download_csv() {

//        $this->load->library('excel');

//        $object = new PHPExcel();

//        $object->setActiveSheetIndex(0);



        $memo_no = '79800';

        $ardb_id = $_SESSION['br_id'];

        $details = array();

        $approve_details = $this->dc_model->approve_view($ardb_id, $memo_no);

        // var_dump($approve_details);exit;

        $memo_details = $this->dc_model->get_memo_no_details($ardb_id);

        $memo_header = $this->dc_model->get_shg_dc_header($ardb_id, $memo_no);

        // $shg_details = $this->dc_model->get_approve_shg_details($ardb_id);

        $shg_details = $this->dc_model->csv_download($ardb_id, $memo_no);

        var_dump($shg_details);

        exit;



        $table_columns = array("Pronote No", "Pronote Date", "Name of SHG/s", "Total Member", "Address of the SHG", "Block", "Purpose", "Mor.", "Repay.", "Rate of Interest(%)", "BOD Sanction Date", "Due Date", "Borrower <br>Sl. No./s in <br>the BOD Sanction", "Project Cost (Rs.)", "Amount Sanctioned(Rs.)", "Total Own Contribution (Rs.)", "Amount Disbursed (Rs)", "Intersee Agreement Date", "Total Intersee Ag. Bond");



        $column = 0;



        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;

        }

        $excel_row = 2;



        foreach ($shg_details as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->pronote_no);

            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, date("d/m/Y", strtotime(str_replace("-", "/", $row->pronote_date))));

            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->shg_name);

            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->tot_memb);

            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->shg_addr);

            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->block_name);

            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->purpose_name);

            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->moratorium_period);

            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->repayment_no);

            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->roi);

            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->bod_sanc_dt);

            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, date("d/m/Y", strtotime(str_replace("-", "/", $row->due_dt))));

            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->brrwr_sl_no);

            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->project_cost);

            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->sanc_amt);

            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->tot_own_amt);

            $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->disb_amt);

            $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, date("d/m/Y", strtotime(str_replace("-", "/", $row->intr_aggr_dt))));

            $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->total_Intr_ag_bond);



            $excel_row++;

        }



        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        $filename = 'users_' . date('Ymd') . '.csv';

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="' . $filename . '.csv"');



        $object_writer->save('php://output');









        // file name

//            $filename = 'users_' . date('Ymd') . '.csv';

//            header("Content-Description: File Transfer");

//            header("Content-Disposition: attachment; filename=$filename");

//            header("Content-Type: application/csv; ");

//

//            // get data

//            $shg_details = $this->dc_model->get_approve_shg_details($ardb_id, $memo_no);

////        var_dump($shg_details);

////        exit;

//            // file creation

//            $file = fopen('php://output');

//

//            $header = array("Pronote No", "Pronote Date", "Name of SHG/s", "Total Member", "Address of the SHG", "Block", "Purpose", "Mor.", "Repay.", "Rate of Interest(%)", "BOD Sanction Date", "Due Date", "Borrower <br>Sl. No./s in <br>the BOD Sanction", "Project Cost (Rs.)", "Amount Sanctioned(Rs.)", "Total Own Contribution (Rs.)", "Amount Disbursed (Rs)", "Intersee Agreement Date", "Total Intersee Ag. Bond");

//            fputcsv($file, $header);

//            foreach ($shg_details as $key => $line) {

//                echo $line;

//                fputcsv($file, $line);

//            }

//            fclose($file);

////        var_dump($file);

//            exit;





        foreach ($shg_details as $shg) {

            if (!isset($details[$shg->pronote_no])) {

                $details[$shg->pronote_no] = array();

                $details[$shg->pronote_no]['rowspan'] = 0;

            }

            $details[$shg->pronote_no]['print'] = 'no';

            $details[$shg->pronote_no]['rowspan'] += 1;

        }

        // echo '<pre>'; var_dump($details);exit;

        $borrower_details = $this->dc_model->get_borrower_approve_details($ardb_id, $memo_no);

        $gt_details = $this->dc_model->get_total_shg($ardb_id, $memo_no);

        // foreach($memo_details as $memo){

        // 	$memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $memo->memo_no);

        // 	$shg_details = $this->dc_model->get_approve_shg_details($ardb_id, $memo_no);

        // 	foreach($shg_details as $k => $v){

        // 		$details[$memo->memo_no][] = array(

        // 				$k => $v

        // 		);

        // 	}

        // }

        $data['ardb_id'] = $ardb_id;

        $data['memo_no'] = $memo_no;

        $data['details'] = json_encode($details);

        $data['approve_details'] = json_encode($approve_details);

        $data['shg_details'] = json_encode($shg_details);

        $data['memo_header'] = json_encode($memo_header);

        $data['borrower_details'] = json_encode($borrower_details);

        $data['gt_details'] = json_encode($gt_details);

        $this->load->view('common/header');

        $this->load->view("dc/download_csv", $data);

        $this->load->view('common/footer');

        // echo '<pre>'; var_dump($details);exit;

    }



    public function exportCSV() {

        $ardb_id = '22';

        $memo_no = '79800';

//        echo site_url();

//        exit;

        // get data

        $myData = $this->dc_model->csv_download($ardb_id, $memo_no);



        // file name

        $filename = 'mydata_' . date('Ymd') . '.csv';

        header("Content-Description: File Transfer");

        header("Content-Disposition: attachment; filename=$filename");

        header("Content-Type: application/csv; ");



        // file creation

        $file = fopen('php://output', 'w');



        $header = array("Pronote No", "Pronote Date", "Name of SHG/s", "Total Member", "Address of the SHG", "Block", "Purpose", "Mor.", "Repay.", "Rate of Interest(%)", "BOD Sanction Date", "Due Date", "Borrower <br>Sl. No./s in <br>the BOD Sanction", "Project Cost (Rs.)", "Amount Sanctioned(Rs.)", "Total Own Contribution (Rs.)", "Amount Disbursed (Rs)", "Intersee Agreement Date", "Total Intersee Ag. Bond");

        fputcsv($file, $header);



        foreach ($myData as $line) {

            fputcsv($file, $line);

        }

//        var_dump($file);

//        exit;

        fclose($file);

        exit;

    }



    function csv() {

        $ardb_id = '22';

        $memo_no = '79800';

        $shg_details = $this->dc_model->csv($ardb_id, $memo_no);

    }



    function orc() {

        var_dump($this->dc_model->orc());

        exit;

    }



    function test_copy() {



        $source = 'C:\test\test.txt';



// Store the path of destination file

        $destination = 'E:\test\copy.txt';



        if (!copy($source, $destination)) {

            echo "File cannot be copied";

        } else {

            echo "File has been copied!";

        }

    }



    function ftp_put() {

        /**

         * Transfer (Export) Files Server to Server using PHP FTP

         * @link https://shellcreeper.com/?p=1249

         */

        $this->load->library('ftp');

        /* Remote File Name and Path */

        //$remote_file = '/home/opentech4uco/public_html/wbcardb/test.txt';

//        $re   mote_file = '/test.txt';



        /* FTP Account (Remote Server) */

        $ftp_host = 'opentech4u.co.in'; /* host */

        $ftp_user_name = 'wbscardb@opentech4u.co.in'; /* username */

        $ftp_user_pass = 'ozdj(WBB,*A]'; /* password */



        $ardb_id = '22';

        $memo_no = '79800';

        header('Content-Type: text/csv');

        header('Content-Disposition: attachment;filename=shg_dc.csv');

        $this->load->dbutil();

        $sql = 'SELECT shg.ardb_id,a.name, DATE_FORMAT(STR_TO_DATE(shg.entry_date,"%Y-%m-%d"), "%d/%m/%Y")entry_date, shg.memo_no, shg.sector_code, shg.pronote_no, DATE_FORMAT(STR_TO_DATE(shg.pronote_date,"%Y-%m-%d"), "%d/%m/%Y")pronote_date, '

                . 'shg.purpose_code, IF(shg.gender_id=1, "M", "F") as gender, shg.roi, shg.moratorium_period, shg.repayment_no, dt.shg_name, dt.tot_memb, dt.shg_addr, dt.block_code, DATE_FORMAT(STR_TO_DATE(dt.bod_sanc_dt,"%Y-%m-%d"), "%d/%m/%Y")bod_sanc_dt, '

                . 'DATE_FORMAT(STR_TO_DATE(dt.due_dt,"%Y-%m-%d"), "%d/%m/%Y")due_dt, dt.brrwr_sl_no, dt.project_cost, dt.sanc_amt, dt.tot_own_amt, dt.disb_amt, DATE_FORMAT(STR_TO_DATE(dt.intr_aggr_dt,"%Y-%m-%d"), "%d/%m/%Y")intr_aggr_dt, dt.total_Intr_ag_bond, '

                . 'b.total_shg, b.tot_memb, b.tot_male, b.tot_female, b.tot_sc, b.tot_st, b.tot_obca, b.tot_obcb, b.tot_gen, b.tot_other, b.tot_count, b.tot_big, b.tot_marginal, b.tot_small, b.tot_landless, b.tot_lig, b.tot_mig, b.tot_hig '

                . 'FROM td_dc_shg shg '

                . 'JOIN td_dc_shg_dtls dt ON shg.ardb_id=dt.ardb_id AND shg.memo_no=dt.memo_no '

                . 'JOIN td_dc_shg_borrower b on shg.ardb_id=b.ardb_id AND shg.memo_no=b.memo_no '

                . 'JOIN mm_ardb_ho a ON shg.ardb_id=a.id ';

        $query = $this->db->query($sql);

        $delimiter = ",";

        $newline = "\r\n";

        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

//        var_dump($data);

//        exit;

        // Create temporary file

        $local_file = fopen('php://temp', 'r+');

        fwrite($local_file, $data);

        rewind($local_file);



        /* File and path to send to remote FTP server */

//        $local_file = 'C:\test\test.txt';



        /* Connect using basic FTP */

        $connect_it = ftp_connect($ftp_host);



        /* Login to FTP */

        $login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);



        ftp_fput($connect_it, '/shg_file/csv/shg_dc.csv', $local_file, FTP_BINARY, 0);



        fclose($local_file);

        ftp_close($connect_it);





//        $fp = fopen('ftp://wbscardb@opentech4u.co.in:ozdj(WBB,*A]@opentech4u.co.in/shg_file/csv', 'w');

//        $fp = fopen('/shg_file/csv', 'w');

//        var_dump($fp);

//        exit;

//        fputcsv($fp, $data); // put the headers



        /* Send $local_file to FTP */

        /* if (ftp_put($connect_it, $remote_file, $local_file, FTP_BINARY)) {

          echo "WOOT! Successfully transfer $local_file\n";

          } else {

          echo "Doh! There was a problem\n";

          } */



        /* Close the connection */

//        ftp_close($fp);

    }



    function dc_ftp_put() {

        $ardb_id = '22';

        $memo_no = '79800';

        $this->load->library('ftp');



        /* FTP Account (Remote Server) */

        $ftp_host = '202.65.156.246'; /* host */

        $ftp_user_name = 'ftp_wbscardb'; /* username */

        $ftp_user_pass = 'Signature@2021$$'; /* password */



        /* GET DETAILS */

        $data = $this->dc_model->get_csv_details($ardb_id, $memo_no);

        $ardb_details = $this->dc_model->get_ardb_name($ardb_id);

        $ardb_name = str_replace(array(':', '-', '/', '.', '*', ' '), '', strtolower($ardb_details[0]->name));

        date_default_timezone_set('Asia/Kolkata');

        $timestamp = date('Y-m-d_his');

        $report_type = 'shgdc';

        // $file_name = $ardb_name . '_' . $report_type . '_' . $timestamp . '.csv';
        $file_name = $report_type . '_' . $ardb_name . '_' . $timestamp . '.csv';



        // Create temporary file

        $local_file = fopen('php://temp', 'r+');

        fwrite($local_file, $data);

        rewind($local_file);



        /* Connect using basic FTP */

        $connect_it = ftp_connect($ftp_host);



        /* Login to FTP */

        $login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);



        ftp_fput($connect_it, '/shg_dc/' . $file_name, $local_file, FTP_BINARY, 0);



        fclose($local_file);

        ftp_close($connect_it);

    }

    function get_ip(){
    	$ip = $_SERVER['REMOTE_ADDR'];
    	$json = file_get_contents('http://worldtimeapi.org/api/ip/' . $ip . '.json');
    	$data = json_decode($json);
    	$datetime = strtotime(substr(str_replace('T', ' ', $data->datetime), 0, 19));
    	$form_time = date('Y-m-d H:i:s', $datetime);
    	$intervel = strtotime('+24 hour', $datetime);
    	$to_time = date('Y-m-d H:i:s', $intervel);
    	$timezone = $data->timezone;
    	$user_id = '2';
    	echo "<form action='' method='POST'><button type='submit' name='submit' id='submit'>Submit</button></form>";

    	if(isset($_REQUEST['submit'])){
    		$query = 'insert into test_subscription (user_id, form_time, to_time, time_zone, flag, order_limit) values("'.$user_id.'", "'.$form_time.'", "'.$to_time.'", "'.$timezone.'", "1", "24")';
    		if($this->db->query($query)){
    			echo 'Successfull Subscribed For ' . $to_time;
    		}else{
    			echo 'ERROR';
    		}
    	}
    }

    function check_user(){
    	$sql = "select * from test_subscription where flag = 1";
    	$query = $this->db->query($sql);
    	if($query->num_rows() > 0){
    		$data = $query->result();
    		foreach ($data as $dt){
    			date_default_timezone_set($dt->time_zone);
    			$check = 'select * from test_subscription where UNIX_TIMESTAMP(to_time) < ' . strtotime(date('Y-m-d H:m:s'));
    			$check_query = $this->db->query($check);
    			if($check_query->num_rows() > 0){
    				$row = $check_query->row();
    				$update = 'update test_subscription set flag = 0 where user_id = ' . $row->user_id;
    				$this->db->query($update);
    			}
    		}
    	}

    }



}



?>