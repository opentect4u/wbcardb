<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Self_doc_verify_Model extends CI_Model {

    function get_ardb_list() {
        $this->db->select('id,name');
        $this->db->where('id>', '0');		$this->db->where_not_in('id', array('33', '34'));
        $this->db->order_by('name');
        $query = $this->db->get('mm_ardb_ho');
        return $query->result();
    }

    function get_shg_details($flag, $ardb_id, $memo_no) {
        $db_name = $flag > 0 ? 'td_dc_self' : 'td_dc_shg';
        $this->db->select('ardb_id, entry_date, memo_no');
        $this->db->where(array(
            'ardb_id' => $ardb_id,
            'fwd_data' => 'Y',
            'approve_1' => 'Y',
            'approve_2' => 'Y',
            'document_flag' => 0
        ));
        if ($memo_no > 0 || $memo_no != '') {
            $this->db->where('replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=', $memo_no);
        }
        $this->db->group_by('memo_no, entry_date');
        $query = $this->db->get($db_name);
        return $query->result();
    }

    function get_file_details($flag, $ardb_id, $memo_no) {
        $db_name = $flag > 0 ? 'td_dc_self_upload' : 'td_dc_shg_upload';
        $this->db->where(array(
            'ardb_id' => $ardb_id,
            'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
        ));
        $query = $this->db->get($db_name);
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    function save($data) {
        // var_dump($data);exit;
        $db_name = $data['flag'] > 0 ? 'td_dc_self' : 'td_dc_shg';
        $input = array(
            'document_flag' => $data['receive'],
            'received_by' => $_SESSION['login']->user_id,
            'received_date' => $data['receive_date'],
            'remarks' => $data['remarks'],
            'dock_no' => $data['dock_no']
        );
        $this->db->where(array(
            'ardb_id' => $data['ardb_id'],
            'entry_date' => $data['date'],
            'memo_no' => $data['memo_no']
        ));
        $this->db->update($db_name, $input);
//            echo $this->db->last_query();exit;
        return true;
    }

    function check_dock_no($dock_no) {
        $is_present = '';
        $last_dock = '';
        $this->db->where('dock_no', $dock_no);
        $query = $this->db->get('v_docket');
        if ($query->num_rows() > 0) {
            $is_present = 1;
            $sql = 'SELECT dock_no FROM v_docket ORDER BY dock_no DESC LIMIT 1';
            $data = $this->db->query($sql);
            $last_dock = $data->row()->dock_no;
//            var_dump($data->row()->dock_no);
        } else {
            $is_present = 0;
            $last_dock = 0;
        }
        $check = array(
            'is_present' => $is_present,
            'last_dock' => $last_dock
        );
        return $check;
    }

}

?>