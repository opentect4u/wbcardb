<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

    class Approve_Model extends CI_Model {

        function get_ardb_list(){
            $this->db->select('id,name');
            $this->db->where('id>', '0' );
            $this->db->order_by('name');
            $query = $this->db->get('mm_ardb_ho');
            return $query->result();
        }

        function get_block_list($ardb_id){
            $this->db->select('b.block_code, b.block_name');
            $this->db->where('ardb.id', $ardb_id);
            $this->db->join('mm_ardb_ho ardb', 'b.district_code=ardb.dist');
            $this->db->group_by('b.block_code, b.block_name');
            $query = $this->db->get('md_block b');
            //echo $this->db->last_query();exit;
            return $query->result();
        }

        function get_purpose_list(){
            $this->db->select('purpose_code, purpose_name');
            $query = $this->db->get('md_purpose');
            return $query->result();
        }

        function get_shg_details($ardb_id, $flag){
            $fwd_data = $flag == '1' ? 'shg.ho_approve_1' : 'shg.ho_approve_2';
            $this->db->select('shg.ardb_id, shg.entry_date as memo_date, shg.memo_no, shg.letter_no, shg.letter_date, shg.pronote_no, shg.pronote_date, p.purpose_name as purpose, shg.moratorium_period, shg.repayment_no, COUNT(sl_no) as upload, '.$fwd_data.' as fwd_data');
            $this->db->where(array(
                'shg.ardb_id' => $ardb_id,
                'shg.fwd_data' => 'Y',
                'shg.approve_1' => 'Y',
                'shg.approve_2' => 'Y',
                'shg.ho_fwd_data' => 'Y'
            ));
            if($flag > '1'){
                $this->db->where('shg.ho_approve_1', 'Y');
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
            //echo '<pre>';var_dump($data);exit;
            
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
                return false;
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
                        'brrwr_sl_no' => $data['brrwr_sl_no'][$i],
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
                return false;
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
                return false;
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

        function dc_file_upload_save($ardb_id, $data, $file_data){
            // var_dump($data);exit;
            // var_dump($file_data['file_name']);
                $input = array(
                    'ardb_id' => $ardb_id,
                    'entry_date' => date('Y-m-d'),
                    'memo_no' => $data['memo_no'],
                    'pronote_no' => $data['pronote_no'],
                    'file_name' => $file_data['file_name'],
                    'file_path' => $file_data['full_path'],
                    'created_by' => date('Y-m-d'),
                    'modified_by' => date('Y-m-d')
                );
                $this->db->insert('td_dc_shg_upload', $input);
                return true;
        }

        function get_file_details($ardb_id, $pronote_no){
            $this->db->where(array(
                'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'ardb_id' => $ardb_id
            ));
            $query = $this->db->get('td_dc_shg_upload');
            return $query->result();
        }

        function get_borrower_details_view($ardb_id){
            $this->db->where('ardb_id', $ardb_id);
            $query = $this->db->get('td_dc_shg_borrower');
            return $query->result();
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

        function get_dc_details($memo_no, $pronote_no){
            $this->db->select('COUNT(dt.sl_no) as tot_shg, sum(dt.tot_memb) as tot_mem, shg.entry_date as memo_date, shg.pronote_date, p.purpose_name');                                               
            $this->db->where(array(
                'replace(replace(replace(dt.pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'replace(replace(replace(dt.memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
            $this->db->join('td_dc_shg shg', 'dt.memo_no=shg.memo_no AND dt.pronote_no=shg.pronote_no');
            $this->db->join('md_purpose p', 'shg.purpose_code=p.purpose_code');
            $this->db->group_by('dt.memo_no, dt.pronote_no, dt.ardb_id, shg.entry_date, shg.pronote_date');
            $this->db->having('COUNT(dt.sl_no) > 0');
            $this->db->order_by('dt.memo_no, dt.pronote_no, dt.ardb_id, shg.entry_date, shg.pronote_date');
            $query = $this->db->get('td_dc_shg_dtls dt');
            //echo $this->db->last_query();die();
            return $query->result();
        }

        function get_borrower_details($ardb_id){
            $this->db->select('bo.*');
            $this->db->where(array(
                'bo.ardb_id' => $ardb_id
            ));
            $this->db->join('td_dc_shg_borrower bo', 'shg.memo_no=bo.memo_no AND shg.pronote_no=bo.pronote_no');
            $this->db->group_by('bo.memo_no, bo.pronote_no, bo.entry_date');
            $this->db->order_by('bo.memo_no, bo.pronote_no, bo.entry_date');
            $query = $this->db->get('td_dc_shg shg');
            return $query->result();
        }

        function get_memo_no_details($ardb_id){
            $this->db->select('memo_no');
            $this->db->where('ardb_id', $ardb_id);
            $query = $this->db->get('td_dc_shg');
            return $query->result();
        }

        function get_pronote_details($ardb_id,$memo_no){
            $this->db->select('pronote_no');
            $this->db->where(array(
                'ardb_id' => $ardb_id,
                'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
            $query = $this->db->get('td_dc_shg');
            return $query->result();
        }

        function get_shg_names($ardb_id,$memo_no,$pronote_no){
          $this->db->select('shg_name');
            $this->db->where(array(
                'ardb_id' => $ardb_id,
                'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no,
                'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no
            ));
            $query = $this->db->get('td_dc_shg_dtls');
            return $query->result();  
        }

        function forward_data($flag, $ardb_id, $pronote_no, $memo_no){

            $user_type = $_SESSION['user_type'];
            $input = array();
            if($user_type == 'P' || $flag == 1){
                $input = array(
                    'ho_approve_1' => 'Y',
                    'ho_app1_by' => $_SESSION['login']->user_id,
                    'ho_app1_at' => date('Y-m-d')
                );
            }elseif($user_type == 'V' || $flag == 2){
                $input = array(
                    'ho_approve_2' => 'Y',
                    'ho_app2_by' => $_SESSION['login']->user_id,
                    'ho_app2_at' => date('Y-m-d')
                );
            }
            $this->db->where(array(
                'ardb_id' => $ardb_id,
                'replace(replace(replace(pronote_no, " ", ""), "/", ""), "-", "")=' => $pronote_no,
                'replace(replace(replace(memo_no, " ", ""), "/", ""), "-", "")=' => $memo_no
            ));
            $this->db->update('td_dc_shg', $input);
            return true;
        }
}
?>