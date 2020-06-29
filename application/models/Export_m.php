<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_m extends CI_Model {

    public function get() {
        $sql = "SELECT * FROM td_fridy_rtn";
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}