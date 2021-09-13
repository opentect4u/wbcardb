<?php

class Test_api extends CI_Controller {
	
	function test(){
		echo 'Subham';
	}

    function apex_self_post() {
//        $input = file_get_contents("php://input");
        $input = $this->input->get();
		$this->db->where('lso_no', $input['lso_no']);
		$q = $this->db->get('td_apex_self_api');
		if($q->num_rows() > 0){
			$this->db->where(array('lso_no' => $input['lso_no']));
			if (!$this->db->update('td_apex_self_api', $input)) {
				echo 'Something Went Wrong!';
				return FALSE;
			} else {
				echo 'Inserted Successfully';
				return TRUE;
			}
		}else{
//        var_dump(json_decode($input));
//        exit;
			if (!$this->db->insert('td_apex_self_api', $input)) {
				echo 'Something Went Wrong!';
				return FALSE;
			} else {
				echo 'Inserted Successfully';
				return TRUE;
			}
		}
    }

    function apex_shg_post() {
        $input = $this->input->get();
//        $input = file_get_contents("php://input");
//        var_dump(json_decode($input));
//        exit;
		$this->db->where('lso_no', $input['lso_no']);
		$q = $this->db->get('td_apex_shg_api');
		if($q->num_rows() > 0){
			$this->db->where(array('lso_no' => $input['lso_no']));
			if (!$this->db->update('td_apex_shg_api', $input)) {
				echo 'Something Went Wrong!';
				return FALSE;
			} else {
				echo 'Inserted Successfully';
				return TRUE;
			}
		}else{
			if (!$this->db->insert('td_apex_shg_api', $input)) {
				echo 'Something Went Wrong!';
				return FALSE;
			} else {
				echo 'Inserted Successfully';
				return TRUE;
			}
		}
    }

}

?>