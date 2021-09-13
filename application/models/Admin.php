<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

    public function f_get_particulars($table_name, $select, $where, $flag) {

        if (isset($select)) {

            $this->db->select($select);
        }
        if (isset($where)) {
            $this->db->where($where);
        }
        // if(isset($where)) {
        //   if($where=="M"){
        //   $this->db->where('user_type != ',"A",TRUE);
        //   }
        //}
        // $this->db->where('branch_id',$this->session->userdata['loggedin']['branch_id']);
        $result = $this->db->get($table_name);

        if ($flag == 1) {

            return $result->row();
        } else {

            return $result->result();
        }
    }

    //For Distinct Value

    public function f_get_distinct($table_name, $select = NULL, $where = NULL) {

        $this->db->distinct();

        if (isset($select)) {

            $this->db->select($select);
        }

        if (isset($where)) {

            $this->db->where($where);
        }

        $result = $this->db->get($table_name);

        return $result->result();
    }

    // for getting user details--
    public function f_get_employee_dtls() {

        $sql = $this->db->query(" SELECT emp_code, emp_name FROM md_employee WHERE emp_status = 'A' ");
        return $sql->result();
    }

    public function f_get_employeeName($emp_cd) {

        $sql = $this->db->query(" SELECT emp_name FROM md_employee WHERE emp_code = '$emp_cd' ");
        return $sql->row();
    }

    //For inserting row

    public function f_insert($table_name, $data_array) {

        $this->db->insert($table_name, $data_array);

        return;
    }

    //For Editing row

    public function f_edit($table_name, $data_array, $where) {

        $this->db->where($where);
        $this->db->update($table_name, $data_array);

        return;
    }

    //For Deliting row

    public function f_delete($table_name, $where) {

        $this->db->delete($table_name, $where);

        return;
    }

    function deactive_user($data) {
        $input = array(
            'user_status' => $data['user_status'],
            'remarks' => $data['remarks'],
            'modified_by' => $_SESSION['login']->user_id,
            'modified_dt' => date('Y-m-d h:i:s')
        );
        $this->db->where(array(
            'user_id' => $data['user_id'],
            'br_id' => $data['ardb_id']
        ));
        $this->db->update('md_users', $input);
        return true;
    }

    function get_ardb_ho_details() {
        $this->db->select('id, name, no_of_users, no_of_approvers');
        $this->db->where_not_in('id', array('33','34'));
        $query = $this->db->get('mm_ardb_ho');
        return $query->result();
    }

    function get_user_list() {
        $this->db->where_not_in('br_id', array('33','34'));
        $query = $this->db->get('md_users');
        return $query->result();
    }

    function f_define_user_save($data) {
        $id = '';
        if (array_key_exists('ardb_id', $data)) {
            $input = array(
                'created_by' => date('Y-m-d h:i:s'),
                'no_of_users' => $data['no_of_user'],
                'no_of_approvers' => $data['no_of_approver'],
                'modified_by' => date('Y-m-d h:i:s')
            );
            $this->db->where('id', $data['ardb_id']);
            $this->db->update('mm_ardb_ho', $input);
        } elseif (array_key_exists('br_name', $data)) {
            $this->db->select();
            $this->db->where('lower(replace(name, " ", "")) =', strtolower(str_replace(" ", "", $data['br_name'])));
            $query = $this->db->get('mm_ardb_ho');
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $id = $row->id;
            }
            if ($id > 0) {
                $input = array(
                    'created_by' => date('Y-m-d h:i:s'),
                    'no_of_users' => $data['no_of_user'],
                    'no_of_approvers' => $data['no_of_approver'],
                    'modified_by' => date('Y-m-d h:i:s')
                );
                $this->db->where('id', $id);
                $this->db->update('mm_ardb_ho', $input);
            } else {
                $input = array(
                    'created_by' => date('Y-m-d h:i:s'),
                    'name' => $data['br_name'],
                    'no_of_users' => $data['no_of_user'],
                    'no_of_approvers' => $data['no_of_approver'],
                    'modified_by' => date('Y-m-d h:i:s')
                );
                $this->db->insert('mm_ardb_ho', $input);
            }
        }
        return;
    }

    function get_ardb_ho_details_edit($id) {
        $this->db->select('id, name, no_of_users, no_of_approvers');
        $this->db->where('id', $id);
        $query = $this->db->get('mm_ardb_ho');
        return $query->result();
    }

    function get_user_status($id, $type_id) {
        $count_member = $type_id == 'U' ? 'a.no_of_users' : 'a.no_of_approvers';
        $this->db->select('if(COUNT(b.user_status) > 0, COUNT(b.user_status), 0) as count, ' . $count_member . ' as count_member');
        $this->db->where(array(
            'a.id' => $id,
            'b.user_status' => 'A'
        ));
        $this->db->where('b.user_type in("P", "V")');
        $this->db->join('mm_ardb_ho a', 'b.br_id=a.id');
        $query = $this->db->get('md_users b');
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    function get_block_list($district_id) {
        $this->db->select('block_code, block_name');
        $this->db->where('district_code', $district_id);
        $query = $this->db->get('md_block');
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    function get_purpose_list() {
        $this->db->select('purpose_code, purpose_name');
        $query = $this->db->get('md_purpose');
        return $query->result();
    }

    function dc_save($data) {
        $dc_shg_input = array(
            'ardb_id' => $data['ardb_id'],
            'entry_date' => $data['date'],
            'memo_no' => $data['memo_no'],
            'sector_code' => $data['sector'],
            'pronote_no' => $data['pronote_no'],
            'pronote_date' => $data['pronote_date'],
            'purpose_code' => $data['purpose'],
            'moratorium_period' => $data['moral'],
            'repayment_no' => $data['repayment'],
            'letter_no' => $data['letter_no'],
            'letter_date' => $data['letter_date'],
            'created_by' => date('Y-m-d h:i:s'),
            'modified_by' => date('Y-m-d h:i:s')
        );
        $this->db->insert('td_dc_shg', $dc_shg_input);
        // echo $this->db->last_query();

        $j = 1;
        for ($i = 0; $i < count($data['sanction_date']); $i++) {
            $dc_shg_dtls_input = array(
                'sl_no' => $j,
                'ardb_id' => $data['ardb_id'],
                'entry_date' => $data['date'],
                'memo_no' => $data['memo_no'],
                'pronote_no' => $data['pronote_no'],
                'shg_name' => $data['shg_name'][$i],
                'tot_memb' => $data['number'][$i],
                'shg_addr' => $data['address'][$i],
                'block_code' => $data['block_id'][$i],
                'roi' => $data['rete_of_interest'][$i],
                'bod_sanc_dt' => $data['sanction_date'][$i],
                'due_dt' => $data['due_date'][$i],
                'brrwr_sl_no' => $j,
                'project_cost' => $data['project_cost'][$i],
                'sanc_amt' => $data['sanction_amount'][$i],
                'tot_own_amt' => $data['own_contribution'][$i],
                'disb_amt' => $data['disbursed_amount'][$i],
                'intr_aggr_dt' => $data['agriment_date'][$i],
                'total_Intr_ag_bond' => $data['ag_bound'][$i]
            );
            $this->db->insert('td_dc_shg_dtls', $dc_shg_dtls_input);
            $j++;
        }
        return true;
    }

}
