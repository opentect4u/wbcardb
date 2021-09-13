<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {

        parent:: __construct();

        $this->load->model('Process');
        $this->load->model('Master');
    }

    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $userId = $_POST['userid'];

            $pwd = $_POST['paswd'];

            $data = $this->Process->userInf($userId);
            if (!empty($data->password)) {

                $match = password_verify($pwd, $data->password);

                if ($match) {

                    $this->session->set_userdata('login', $data);

                    $_SESSION['user_id'] = $data->user_id;

                    $_SESSION['user_type'] = $data->user_type;

                    $_SESSION['user_name'] = $data->user_name;

                    $_SESSION['sys_date'] = date('Y-m-d');

                    redirect('Main/login');
                } else {

                    $this->session->set_flashdata('err_message', 'Invalid username and password combination.Please try again.');

                    $this->load->view('login/login');
                }
            } else {

                $this->session->set_flashdata('err_message', 'Invalid username and password combination.Please try again.');

                $this->load->view('login/login');
            }
        } else {

            $this->load->view('login/login');
        }
    }

    public function dashboard() {
        $this->load->view('ho/dashboard/dashboard');
    }

    public function login() {

        if ($this->session->userdata('login')) {

            $select = array("ifnull(count(ardb_id), 0) ardb_id");

            $where = array("date_format(td_fridy_rtn.`week_dt`,'%Y-%m')" => date('Y-m'));

            $wherei = array("date_format(td_investment.`return_dt`,'%Y-%m')" => date('Y-m'));
            $nabfarm = array(
                "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m'),
                "report_type" => "2");
            $nonanbfarm = array(
                "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m'),
                "report_type" => "3");
            $sgh = array(
                "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m'),
                "report_type" => "4");
            $nhb = array(
                "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m'),
                "report_type" => "5");
            $nab = array(
                "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m'),
                "report_type" => "6");
            $consolidated = array(
                "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m'),
                "report_type" => "1");

            $data["firday"] = $this->Master->get_particulars("td_fridy_rtn", $select, $where, 1);
            $data["invest"] = $this->Master->get_particulars("td_investment", $select, $wherei, 1);
            $data["nabfarm"] = $this->Master->get_particulars("td_fortnight", $select, $nabfarm, 1);
            $data["nonanbfarm"] = $this->Master->get_particulars("td_fortnight", $select, $nonanbfarm, 1);
            $data["sgh"] = $this->Master->get_particulars("td_fortnight", $select, $sgh, 1);
            $data["nhb"] = $this->Master->get_particulars("td_fortnight", $select, $nhb, 1);
            $data["nab"] = $this->Master->get_particulars("td_fortnight", $select, $nab, 1);
            $data["consolidated"] = $this->Master->get_particulars("td_fortnight", $select, $consolidated, 1);
            $data["details"] = json_encode($this->Process->get_details($_SESSION['br_id']));

            $this->load->view('common/header');
            $this->load->view('ho/dashboard/dashboard', $data);
            $this->load->view('common/footer');
        } else {

            $this->load->view('login/login');
        }
    }

    public function logout() {

        if ($this->session->userdata('login')) {

            $this->session->unset_userdata('login');

            redirect('Main/login');
        } else {

            redirect('Main/login');
        }
    }

}
