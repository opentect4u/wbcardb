<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_frnt_m extends CI_Model {

    public function get($ardb_ho ) {
        $sql = "SELECT * FROM td_frm_frnt_rtn";
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}