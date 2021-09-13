<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

    protected $sysdate;

    public function __construct() {

        // $this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('Admin');

        if (!isset($this->session->userdata['login']->user_id)) {

            redirect('Main/login');
        }
    }

    public function index() {
//        echo '<pre>';
//        var_dump($this->Admin->f_get_particulars("md_users", NULL, NULL, 0));
//        exit;

        $this->load->view('common/header');
//        $user['user_dtls'] = $this->Admin->f_get_particulars("md_users", NULL, NULL, 0);
        $user['user_dtls'] = $this->Admin->get_user_list();

        $this->load->view("ho/user/user_list", $user);
        $this->load->view('common/footer');
    }

    public function f_friday_rtn_detail($ardb_id, $submit_dt) {

        // $kms_id=$this->session->userdata['loggedin']['kms_id'];

        $sql = "select ARDB_Id,SUBMIT_DT, RD,FD, FLEXI,MIS,OTH_DEP,IBSD,TOT_DEP_MOBILISD,CASH_IN_HND,OTH_BNK,IBSD_LOAN
         ,DEP_LOAN,REMMIT_WBSCARDB,REMMIT_WBSCARDB_EXCESS,TOT_DEPLOY_FUND
         from td_fridy_rtn
                where  ardb_id= '$ardb_id' and submit_dt= '$submit_dt' ";


        $data = $this->db->query($sql);

        return $data->row();
    }

    /*     * *******************For User Screen******************* */

    public function f_user() {

        $user['user_dtls'] = $this->Admin->f_get_particulars("md_users", NULL, NULL, 0);
        // }
        $this->load->view('dashboard/menu');
        $this->load->view('dashboard/header');

        $this->load->view("user/dashboard", $user);

        $this->load->view('dashboard/footer');
    }

    //User Add
    public function f_user_add() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data_array = array(
                "br_id" => $this->input->post('br_id'),
                "user_id" => $this->input->post('user_id'),
                "password" => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                "user_type" => $this->input->post('user_type_id'),
                "user_name" => $this->input->post('user_name'),
                "designation" => $this->input->post('designation'),
                "user_status" => 'A',
                "created_by" => $_SESSION['user_name'],
                "created_dt" => date('Y-m-d h:i:s')
            );

            $this->Admin->f_insert('md_users', $data_array);

            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('ho/Admins');
        } else {
//	    $user['branch_dtls'] = $this->Admin->f_get_particulars("mm_ardb_ho", NULL, NULL, 0);
            $user['branch_dtls'] = $this->Admin->get_ardb_ho_details();
            $this->load->view('common/header');
            $this->load->view("ho/user/add", $user);
            $this->load->view('common/footer');
        }
    }

    //User edit

    function deactive_user() {
        $user_id = $_GET['user_id'];
        $user['user_dtls'] = $this->Admin->f_get_particulars("md_users", NULL, array("user_id" => $user_id), 1);
        $user['branch_dtls'] = $this->Admin->f_get_particulars("mm_ardb_ho", NULL, NULL, 0);
        $this->load->view('common/header');
        $this->load->view("ho/user/deactive", $user);
        $this->load->view('common/footer');
    }

    function deactive() {
        $data = $this->input->post();
        if ($this->Admin->deactive_user($data)) {
            $this->session->set_flashdata('msg', 'Deactived Successfully!');
            redirect('ho/Admins');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/Admins');
        }
    }

    public function user_edit() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $data_array = array(
                "password" => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                "remarks" => $this->input->post('remarks'),
                "modified_by" => $this->session->userdata['login']->user_id,
                "modified_dt" => date('Y-m-d h:i:s')
            );


            $where = array(
                "user_id" => $this->input->post('user_id')
            );


            $this->Admin->f_edit('md_users', $data_array, $where);


            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('ho/admins');
        } else {
            $user['user_dtls'] = $this->Admin->f_get_particulars("md_users", NULL, array("user_id" => $this->input->get('user_id')), 1);

            $user['branch_dtls'] = $this->Admin->f_get_particulars("mm_ardb_ho", NULL, NULL, 0);
            $this->load->view('common/header');
            $this->load->view("ho/user/edit", $user);
            $this->load->view('common/footer');
        }
    }

    //User delete
    public function f_user_delete() {

        $where = array(
            "user_id" => $this->input->get('user_id')
        );

        //Retriving the data row for backup
        $select = array(
            "user_id", "password", "user_name", "user_type", "user_status"
        );

        $data = (array) $this->Admin->f_get_particulars("md_users", $select, $where, 1);


        $audit = array(
            'deleted_by' => $this->session->userdata['loggedin']['user_name'],
            'deleted_dt' => date('Y-m-d h:i:s')
        );

        //Inserting Data
        $this->Admin->f_insert('md_ardb_users_deleted', array_merge($data, $audit));

        $this->session->set_flashdata('msg', 'Successfully deleted!');

        $this->Admin->f_delete('md_ardb_users', $where);

        redirect("ho/admin/user");
    }

    //define no of users

    function f_define_users() {
        $ardb_ho_details = $this->Admin->get_ardb_ho_details();
        $user['ardb_ho_details'] = json_encode($ardb_ho_details);
        $this->load->view('common/header');
        $this->load->view("ho/user/define_user_view", $user);
        $this->load->view('common/footer');
    }

    function f_define_users_edit() {
        $id = $_GET['id'];
        $selected = array(
            'id' => $id,
            'br_id' => '',
            'no_of_users' => '',
            'no_of_approver' => ''
        );
        if ($id != '') {
            $ardb_details = $this->Admin->get_ardb_ho_details_edit($id);
            foreach ($ardb_details as $ardb) {
                $selected = array(
                    'id' => $id,
                    'br_id' => $ardb->id,
                    'no_of_users' => $ardb->no_of_users,
                    'no_of_approver' => $ardb->no_of_approvers
                );
            }
        }
        $ardb_ho_details = $this->Admin->get_ardb_ho_details();
        $user['selected'] = json_encode($selected);
        $user['ardb_ho_details'] = json_encode($ardb_ho_details);
        $this->load->view('common/header');
        $this->load->view("ho/user/define_user_edit", $user);
        $this->load->view('common/footer');
    }

    function f_define_user_save() {
        $data = $this->input->post();
        // var_dump($data);exit;
        if ($this->Admin->f_define_user_save($data)) {
            $this->session->set_flashdata('msg', 'Successfully added!');
            redirect('ho/Admins/f_define_users');
        } else {
            $this->session->set_flashdata('msg', 'Something Went Wrong!');
            redirect('ho/Admins/f_define_users');
        }
    }

    function get_user_status() {
        $id = $_GET['br_id'];
        $type_id = $_GET['type_id'];
        echo json_encode($this->Admin->get_user_status($id, $type_id));
    }

    // function dc_entry(){
    //     $ardb_id = $_SESSION['br_id'];
    //     $block_list = $this->Admin->get_block_list($_SESSION['login']->district_id);
    //     $purpose_list = $this->Admin->get_purpose_list();
    //     // echo '<pre>';
    //     // var_dump($purpose_list);exit;
    //     $data['ardb_id'] = $ardb_id;
    //     $data['block_list'] = json_encode($block_list);
    //     $data['purpose_list'] = json_encode($purpose_list);
    //     $this->load->view('common/header');
    //     $this->load->view("dc/entry", $data);
    //     $this->load->view('common/footer');
    // }
    // function dc_save(){
    //     $data = $this->input->post();
    //     if($this->Admin->dc_save($data)){
    //         echo 'Success';exit;
    //     }else{
    //         echo 'Error'; exit;
    //     }
    // }
}
