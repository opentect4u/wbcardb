<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

    class Approve_Model extends CI_Model {

        function get_block_list($district_id){
            $this->db->select('block_code, block_name');
            $this->db->where('district_code', $district_id);
            $query = $this->db->get('md_block');
            // echo $this->db->last_query();exit;
            return $query->result();
        }

        function get_purpose_list(){
            $this->db->select('purpose_code, purpose_name');
            $query = $this->db->get('md_purpose');
            return $query->result();
        }

        function get_shg_details($ardb_id){
            $fwd_data = $_SESSION['user_type'] == 'P' ? 'shg.approve_1' : ($_SESSION['user_type'] == 'V' ? 'shg.approve_2' : '');
            $this->db->select('shg.entry_date as memo_date, shg.memo_no, shg.letter_no, shg.letter_date, shg.pronote_no, shg.pronote_date, p.purpose_name as purpose, shg.moratorium_period, shg.repayment_no, COUNT(sl_no) as upload, '.$fwd_data.' as fwd_data');
            $this->db->where('shg.ardb_id', $ardb_id);
            if($_SESSION['user_type'] == 'P'){
                $this->db->where(array(
                    'shg.fwd_data' => 'Y',
                ));
            }else{
                $this->db->where(array(
                    'shg.fwd_data' => 'Y',
                    'shg.approve_1' => 'Y',
                ));
            }
            $this->db->join('md_purpose p', 'shg.purpose_code=p.purpose_code');
            $this->db->join('td_dc_shg_upload u', 'shg.memo_no=u.memo_no AND shg.ardb_id=u.ardb_id AND shg.pronote_no=u.pronote_no', 'left');
            $this->db->group_by('shg.pronote_no, shg.memo_no, shg.entry_date');
            $query = $this->db->get('td_dc_shg shg');
            // echo '<pre>' . $this->db->last_query();exit;
            return $query->result();
        }

        function get_shg_details_edit($ardb_id, $pronote_no, $memo_no){
           $this->db->where(array(
                'ardb_id' => $ardb_id,
                'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
           $query = $this->db->get('td_dc_shg');
           // echo $this->db->last_query();exit;
           return $query->result();
        }

        function get_dc_shg_dtls_edit($ardb_id, $pronote_no, $memo_no){
           $this->db->where(array(
                'ardb_id' => $ardb_id,
                'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
           $query = $this->db->get('td_dc_shg_dtls');
           return $query->result();
        }

        function dc_save($data){
            // echo '<pre>';var_dump($data);exit;
            
            if($data['id'] > 0){
                $dc_shg_input = array(
                    'sector_code' => $data['sector'],
                    'purpose_code' => $data['purpose'],
                    'moratorium_period' => $data['moral'],
                    'repayment_no' => $data['repayment'],
                    'letter_no' => $data['letter_no'],
                    'letter_date' => $data['letter_date'],
                    'created_by' => date('Y-m-d h:i:s'),
                    'modified_by' => date('Y-m-d h:i:s')
                );
                $this->db->where(array(
                    'ardb_id' => $data['ardb_id'],
                    'memo_no' => $data['memo_no'],
                    'pronote_no' => $data['pronote_no']
                ));
                $this->db->update('td_dc_shg', $dc_shg_input);
                // echo $this->db->last_query();exit;
            }else{
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
            }
            
            // echo $this->db->last_query();

            $j = 1;
            
            if($data['id'] > 0){
                for($i = 0; $i < count($data['sanction_date']); $i++){
                    $dc_shg_dtls_input = array(
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
                    $this->db->where(array(
                        'sl_no' => $j,
                        'ardb_id' => $data['ardb_id'],
                        'memo_no' => $data['memo_no'],
                        'pronote_no' => $data['pronote_no']
                    ));
                    $this->db->update('td_dc_shg_dtls', $dc_shg_dtls_input);
                    $j++;
                }
            }else{
                for($i = 0; $i < count($data['sanction_date']); $i++){
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
            }
            $input = array(
                'ardb_id' => $data['ardb_id'],
                'entry_date' => date('Y-m-d'),
                'memo_no' => $data['memo_no'],
                'pronote_no' => $data['pronote_no'],
                'total_shg' => $data['tot_shg'],
                'tot_memb' => $data['tot_memb'],
                'tot_male' => $data['tot_men'],
                'tot_female' => $data['tot_wom'],
                'tot_sc' => $data['tot_sc'],
                'tot_st' => $data['tot_st'],
                'tot_obc' => $data['tot_obc'],
                'tot_gen' => $data['tot_gen'],
                'tot_other' => $data['tot_oth'],
                'tot_count' => $data['tot_count'],
                'tot_big' => $data['tot_big'],
                'tot_marginal' => $data['tot_marginal'],
                'tot_small' => $data['tot_small'],
                'tot_landless' => $data['tot_landless'],
                'tot_lig' => $data['tot_lig'],
                'tot_mig' => $data['tot_mig'],
                'tot_hig' => $data['tot_hig']
            );
            if($data['id'] > 0){
                $this->db->where(array(
                    'memo_no' => $data['memo_no'],
                    'pronote_no' => $data['pronote_no']
                ));
                $this->db->update('td_dc_shg_borrower', $input);
            }else{
                $this->db->insert('td_dc_shg_borrower', $input);
            }
            return true;
            
        }

        function dc_delete($ardb_id, $pronote_no, $memo_no){
            $where = array(
                        'ardb_id' => $ardb_id,
                        'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                        'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
                    );
            $this->db->where($where);
            $this->db->delete('td_dc_shg_dtls');

            $this->db->where($where);
            $this->db->delete('td_dc_shg');
            return true;
            // echo $this->db->last_query();exit;
        }

        function get_borrower_details_edit($pronote_no, $memo_no){
            $this->db->where(array(
                'replace(replace(replace(bo.pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'replace(replace(replace(bo.memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
            $query = $this->db->get('td_dc_shg_borrower bo');
            // echo $this->db->last_query();exit;
            return $query->result();
        }

        function forward_data($ardb_id, $pronote_no, $memo_no){
            $user_type = $_SESSION['user_type'];
            $input = array();
            if($user_type == 'P'){
                $input = array(
                    'approve_1' => 'Y',
                    'app1_by' => $_SESSION['login']->user_id,
                    'app1_at' => date('Y-m-d')
                );
            }elseif($user_type == 'V'){
                $input = array(
                    'approve_2' => 'Y',
                    'app2_by' => $_SESSION['login']->user_id,
                    'app2_at' => date('Y-m-d')
                );
            }
            $this->db->where(array(
                'ardb_id' => $ardb_id,
                'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
            $this->db->update('td_dc_shg', $input);
            //echo $this->db->last_query();exit;
        }
}
?>