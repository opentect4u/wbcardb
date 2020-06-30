<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export_m extends CI_Model {

    public function get($table,$ardb_id) {
        $sql = "SELECT * FROM $table where ardb_id='$ardb_id' ";
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}