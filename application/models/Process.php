<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Model {

    public function userInf($userId) { /*     * Retrieves password against supplied user id,user must be active with value A */

        $this->db->select('u.*, a.name as ardb_name, a.dist as district_id');

        $this->db->where(array(
            'u.user_id' => $userId,
            'u.user_status' => 'A'
        ));
        $this->db->join('mm_ardb_ho a', 'u.br_id=a.id');
        // $this->db->where('user_status','A');
        // $this->db->where('user_type','U');

        $data = $this->db->get('md_users u');

        if ($data->num_rows() > 0) {

            return $data->row();
        } else {

            return false;
        }
    }

    public function max_ret_wk_dt($table, $field, $branch) {
        $sql = $this->db->query("select MAX($field) AS Max_Date
                               from   $table
                               where  ardb_id = $branch");

        return $sql->row();
    }

    public function f_insert_multiple($table_name, $data_array) {

        $this->db->insert_batch($table_name, $data_array);

        return;
    }

    /*     * Total Sale Amount on a particular date */

    public function fr_retupload() {
        $sql = $this->db->query("select MAX(week_dt) week_dt
                               from   td_fridy_rtn");
        return $sql->row();
    }

    public function fr_nightrt() {
        $sql = $this->db->query("select MAX(TO_DT) TO_DT
                               from   td_frm_frnt_rtn");
        return $sql->row();
    }

    // SUBHAM ADMIN DASHBOARD
    function get_details($br_id) {
        $this->db->select('b.name, SUM(IF(a.user_type="U", 1, 0)) as user, SUM(IF(a.user_type="P", 1, 0)) as app_l1, SUM(IF(a.user_type="V", 1, 0)) as app_l2, SUM(IF(a.user_type="R", 1, 0)) as doc_rec');
        $this->db->where_not_in('a.br_id', array('33', '34'));
        $this->db->join('mm_ardb_ho b', 'a.br_id=b.id');
        $this->db->group_by('a.br_id');
        $query = $this->db->get('md_users a');
        return $query->result();
    }

}

?>
