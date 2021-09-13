<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sanction_amt_Model extends CI_Model {

    function get_ardb_list() {
        $this->db->select('id,name');
        $this->db->where('name not LIKE "%WBSCARDB%"');		$this->db->where_not_in('id', array('33', '34'));
        $this->db->order_by('name');
        $query = $this->db->get('mm_ardb_ho');
        return $query->result();
    }

    function get_sector_list() {
        $this->db->order_by('sector_name');
        $query = $this->db->get('md_sector');
        return $query->result();
    }

    function get_sanc_details($ardb_id) {
        $this->db->select('a.ardb_id, a.effective_date, s.sector_name, a.sector_id, a.sanction_amt');
        $this->db->where('ardb_id', $ardb_id);
        $this->db->join('md_sector s', 'a.sector_id=s.sector_code');
        $this->db->order_by('s.sector_name');
        $query = $this->db->get('td_sanc_amt a');
        return $query->result();
    }

    function get_ardb_list_edit($ardb_id, $sector_id, $date) {
        $this->db->select('a.ardb_id, a.effective_date, s.sector_name, a.sector_id, a.sanction_amt');
        $this->db->where(array('ardb_id' => $ardb_id, 'sector_id' => $sector_id, 'effective_date' => $date));
        $this->db->join('md_sector s', 'a.sector_id=s.sector_code');
        $query = $this->db->get('td_sanc_amt a');
        return $query->result();
    }

    function save($data) {
//        echo '<pre>';
//        var_dump($data);
//        exit;
        $ardb_id = 0;
        $sector_id = 0;
        for ($i = 0; $i < count($data['sector_id']); $i++) {
            $this->db->where(array(
                'ardb_id' => $data['ardb_id'],
                'effective_date' => $data['date'],
                'sector_id' => $data['sector_id'][$i]
            ));
            $query = $this->db->get('td_sanc_amt');
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $ardb_id = $row->ardb_id;
                $sector_id = $row->sector_id;
            }

            $input = array(
                'ardb_id' => $data['ardb_id'],
                'effective_date' => $data['date'],
                'sector_id' => $data['sector_id'][$i],
                'sanction_amt' => $data['sanc_amt'][$i],
                'created_by' => $_SESSION['login']->user_id,
                'modified_by' => $_SESSION['login']->user_id
            );
            if ($ardb_id > 0 && $sector_id > 0) {
                $this->db->where(array(
                    'ardb_id' => $ardb_id,
                    'effective_date' => $data['date'],
                    'sector_id' => $sector_id
                ));
                $this->db->update('td_sanc_amt', $input);
            } else {
                $this->db->insert('td_sanc_amt', $input);
            }
        }
        return TRUE;
    }

    function update($data) {
        $input = array(
            'sanction_amt' => $data['sanc_amt'],
            'modified_by' => $_SESSION['login']->user_id
        );
        $this->db->where(array(
            'ardb_id' => $data['ardb_id'],
            'effective_date' => $data['date'],
            'sector_id' => $data['sector_id']
        ));
        $this->db->update('td_sanc_amt', $input);
        return TRUE;
    }

}

?>