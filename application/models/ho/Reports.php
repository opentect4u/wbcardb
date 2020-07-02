<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Reports extends CI_Model{

		/**Retrieve opening stock of each year */
		public function f_get_open_stk($year){

			$query = $this->db->query("select a.Prod_ID prod_id,a.Batch batch,
											  b.Name prod_name,sum(a.Qty)qty
									   from   opening_stock_log a,products b
									   where  a.Prod_ID 	= b.ID
									   and    a.stk_yr	    = $year
									   group by a.Prod_ID,a.Batch,b.Name
									   order by a.Prod_ID;");

			return $query->result();
		}

		public function f_get_fridayho($frmDt,$toDt){

            $query = $this->db->query("SELECT ardb_id, ifnull(sum(rd),0) rd, ifnull(sum(fd),0) fd, ifnull(sum(flexi_sb),0) flexi_sb, ifnull(sum(mis),0) mis, ifnull(sum(other_dep),0) other_dep, ifnull(sum(ibsd),0) ibsd, ifnull(sum(total_dep_mob),0) total_dep_mob, 
            	ifnull(sum(cash_in_hand),0)  cash_in_hand, ifnull(sum(other_bank),0) other_bank, ifnull(sum(ibsd_loan),0) ibsd_loan, ifnull(sum(dep_loan),0) dep_loan,ifnull(sum(wbcardb_remit_slr),0) wbcardb_remit_slr,ifnull(sum(wbcardb_remit_slr_excess),0) wbcardb_remit_slr_excess,      
                  ifnull(sum(total_fund_deploy),0) total_fund_deploy
                                       FROM  td_fridy_rtn
									   where  week_dt between '$frmDt' and '$toDt'	   
									   group by ardb_id
									   order by ardb_id;");

			return $query->result();

		}

		public function f_get_fridayardb($frmDt,$toDt,$ardb_id){

            $query = $this->db->query("SELECT ardb_id, ifnull(sum(rd),0) rd, ifnull(sum(fd),0) fd, ifnull(sum(flexi_sb),0) flexi_sb, ifnull(sum(mis),0) mis, ifnull(sum(other_dep),0) other_dep, ifnull(sum(ibsd),0) ibsd, ifnull(sum(total_dep_mob),0) total_dep_mob, 
            	ifnull(sum(cash_in_hand),0)  cash_in_hand, ifnull(sum(other_bank),0) other_bank, ifnull(sum(ibsd_loan),0) ibsd_loan, ifnull(sum(dep_loan),0) dep_loan,ifnull(sum(wbcardb_remit_slr),0) wbcardb_remit_slr,ifnull(sum(wbcardb_remit_slr_excess),0) wbcardb_remit_slr_excess,      
                  ifnull(sum(total_fund_deploy),0) total_fund_deploy
                                       FROM  td_fridy_rtn
									   where  week_dt between '$frmDt' and '$toDt'
									   and    ardb_id  ='$ardb_id';");

			return $query->result();

		}	

		public function f_get_borrower($frmDt,$toDt){

            $query = $this->db->query("SELECT ardb_id, ifnull(sum(sc),0) sc, ifnull(sum(st),0) st, ifnull(sum(obc),0) obc, ifnull(sum(gen),0) gen, ifnull(sum(total_1),0) total_1, ifnull(sum(marginal),0) marginal, ifnull(sum(small),0) small, 
            	ifnull(sum(big),0)  big, ifnull(sum(sal_earner),0) sal_earner, ifnull(sum(bussiness),0) bussiness, ifnull(sum(total_2),0) total_2,ifnull(sum(male),0) male,ifnull(sum(female),0) female,ifnull(sum(total_3),0) total_3    
              
                                       FROM  td_borrower_classification
									   where  return_dt between '$frmDt' and '$toDt'	   
									   group by ardb_id
									   order by ardb_id;");

			return $query->result();

		}

		public function f_get_borrowerardb($frmDt,$toDt,$ardb_id){

            $query = $this->db->query("SELECT ardb_id, ifnull(sum(sc),0) sc, ifnull(sum(st),0) st, ifnull(sum(obc),0) obc, ifnull(sum(gen),0) gen, ifnull(sum(total_1),0) total_1, ifnull(sum(marginal),0) marginal, ifnull(sum(small),0) small, 
            	ifnull(sum(big),0)  big, ifnull(sum(sal_earner),0) sal_earner, ifnull(sum(bussiness),0) bussiness, ifnull(sum(total_2),0) total_2,ifnull(sum(male),0) male,ifnull(sum(female),0) female,ifnull(sum(total_3),0) total_3    
              
                                       FROM  td_borrower_classification
									   where  return_dt between '$frmDt' and '$toDt'	   
									   and    ardb_id  ='$ardb_id';");

			return $query->result();

		}
		public function f_get_investment($frmDt,$toDt){

            $query = $this->db->query("SELECT ardb_id,return_dt,from_fin_yr,to_fin_yr,prv_frm_fin_yr,prv_to_fin_yr, ifnull(sum(no_acc_closed),0) no_acc_closed, ifnull(sum(prog_brro_memb),0) prog_brro_memb, ifnull(sum(farm_sec_case_no),0) farm_sec_case_no, ifnull(sum(farm_sec_amt),0) farm_sec_amt, ifnull(sum(non_farm_sec_case_no),0) non_farm_sec_case_no, ifnull(sum(non_farm_sec_amt),0) non_farm_sec_amt, ifnull(sum(housing_sec_case_no),0) housing_sec_case_no, 
            	ifnull(sum(housing_sec_amt),0)  housing_sec_amt, ifnull(sum(other_sec_case_no),0) other_sec_case_no, ifnull(sum(other_sec_amt),0) other_sec_amt, ifnull(sum(non_sch_inv_case_no),0) non_sch_inv_case_no,ifnull(sum(non_sch_inv_amt),0) non_sch_inv_amt,ifnull(sum(tot_inv_case_no),0) tot_inv_case_no,ifnull(sum(tot_inv_amt),0) tot_inv_amt,    
                   ifnull(sum(tot_inv_case_no_prv_yr),0) tot_inv_case_no_prv_yr,ifnull(sum(tot_inv_amt_prv_yr),0) tot_inv_amt_prv_yr 
                                       FROM  td_investment
									   where  return_dt between '$frmDt' and '$toDt'	   
									   group by ardb_id,return_dt,from_fin_yr,to_fin_yr,prv_frm_fin_yr,prv_to_fin_yr
									   order by ardb_id;");

			return $query->result();

		}

		public function f_get_investmentardb($frmDt,$toDt,$ardb_id){

            $query = $this->db->query("SELECT ardb_id,return_dt, ifnull(sum(no_acc_closed),0) no_acc_closed, ifnull(sum(prog_brro_memb),0) prog_brro_memb, ifnull(sum(farm_sec_case_no),0) farm_sec_case_no, ifnull(sum(farm_sec_amt),0) farm_sec_amt, ifnull(sum(non_farm_sec_case_no),0) non_farm_sec_case_no, ifnull(sum(non_farm_sec_amt),0) non_farm_sec_amt, ifnull(sum(housing_sec_case_no),0) housing_sec_case_no, 
            	ifnull(sum(housing_sec_amt),0)  housing_sec_amt, ifnull(sum(other_sec_case_no),0) other_sec_case_no, ifnull(sum(other_sec_amt),0) other_sec_amt, ifnull(sum(non_sch_inv_case_no),0) non_sch_inv_case_no,ifnull(sum(non_sch_inv_amt),0) non_sch_inv_amt,ifnull(sum(tot_inv_case_no),0) tot_inv_case_no,ifnull(sum(tot_inv_amt),0) tot_inv_amt,    
                   ifnull(sum(tot_inv_case_no_prv_yr),0) tot_inv_case_no_prv_yr,ifnull(sum(tot_inv_amt_prv_yr),0) tot_inv_amt_prv_yr 
                                       FROM  td_investment
									   where  return_dt between '$frmDt' and '$toDt'	   
									   and    ardb_id  ='$ardb_id'
									   group by ardb_id,return_dt
									   ");

			return $query->result();

		}
	
public function f_get_forthnight($frmDt,$toDt,$report_type){

			$data = $this->db->query("select ardb_id,return_dt,
										sum(dmd_prn_od) dmd_prn_od,
										sum(dmd_prn_cr)dmd_prn_cr,
										sum(dmd_prn_tot)dmd_prn_tot,
										sum(dmd_int_od)dmd_int_od,
										sum(dmd_int_cr)dmd_int_cr,
										sum(dmd_int_tot)dmd_int_tot,
										sum(tot_dmd)tot_dmd,
										sum(col_prn_od)col_prn_od,
										sum(col_prn_cr)col_prn_cr,
										sum(col_prn_adv)col_prn_adv,
										sum(col_prn_tot)col_prn_tot,
										sum(col_int_od)col_int_od,
										sum(col_int_cr)col_int_cr,
										sum(col_int_tot)col_int_tot,
										sum(tot_colc)tot_colc,
										sum(recov_per)recov_per,
										sum(prv_yr_dmd_prn)prv_yr_dmd_prn,
										sum(prv_yr_dmd_int)prv_yr_dmd_int,
										sum(prv_yr_dmd_tot)prv_yr_dmd_tot,
										sum(prv_yr_col_prn)prv_yr_col_prn,
										sum(prv_yr_col_int)prv_yr_col_int,
										sum(prv_yr_col_tot)prv_yr_col_tot,
										sum(col_per)col_per,
										sum(tot_no_ac_dmd)tot_no_ac_dmd,
										sum(tot_no_ac_od_dmd)tot_no_ac_od_dmd,
										sum(tot_no_ac_curr_dmd)tot_no_ac_curr_dmd,
										sum(tot_no_ac_col)tot_no_ac_col,
									    sum(tot_no_ac_od_col)tot_no_ac_od_col,
										sum(tot_no_ac_curr_col)tot_no_ac_curr_col,
										sum(tot_no_ac_prog)tot_no_ac_prog,
										sum(tot_no_ac_od_prog)tot_no_ac_od_prog,
										sum(tot_no_ac_curr_prog)tot_no_ac_curr_prog
										from td_fortnight
										where return_dt between '$frmDt' and '$toDt' 
										and   report_type  ='$report_type'
										group by ardb_id,return_dt");
			return $data->result();
		}
		public function f_get_forthnightardb($frmDt,$toDt,$report_type,$ardb_id){

			$data = $this->db->query("select ardb_id,return_dt,
										sum(dmd_prn_od) dmd_prn_od,
										sum(dmd_prn_cr)dmd_prn_cr,
										sum(dmd_prn_tot)dmd_prn_tot,
										sum(dmd_int_od)dmd_int_od,
										sum(dmd_int_cr)dmd_int_cr,
										sum(dmd_int_tot)dmd_int_tot,
										sum(tot_dmd)tot_dmd,
										sum(col_prn_od)col_prn_od,
										sum(col_prn_cr)col_prn_cr,
										sum(col_prn_adv)col_prn_adv,
										sum(col_prn_tot)col_prn_tot,
										sum(col_int_od)col_int_od,
										sum(col_int_cr)col_int_cr,
										sum(col_int_tot)col_int_tot,
										sum(tot_colc)tot_colc,
										sum(recov_per)recov_per,
										sum(prv_yr_dmd_prn)prv_yr_dmd_prn,
										sum(prv_yr_dmd_int)prv_yr_dmd_int,
										sum(prv_yr_dmd_tot)prv_yr_dmd_tot,
										sum(prv_yr_col_prn)prv_yr_col_prn,
										sum(prv_yr_col_int)prv_yr_col_int,
										sum(prv_yr_col_tot)prv_yr_col_tot,
										sum(col_per)col_per,
										sum(tot_no_ac_dmd)tot_no_ac_dmd,
										sum(tot_no_ac_od_dmd)tot_no_ac_od_dmd,
										sum(tot_no_ac_curr_dmd)tot_no_ac_curr_dmd,
										sum(tot_no_ac_col)tot_no_ac_col,
									    sum(tot_no_ac_od_col)tot_no_ac_od_col,
										sum(tot_no_ac_curr_col)tot_no_ac_curr_col,
										sum(tot_no_ac_prog)tot_no_ac_prog,
										sum(tot_no_ac_od_prog)tot_no_ac_od_prog,
										sum(tot_no_ac_curr_prog)tot_no_ac_curr_prog
										from td_fortnight
										where return_dt between '$frmDt' and '$toDt' 
										and   report_type  ='$report_type'
										and   ardb_id      ='$ardb_id'
										group by ardb_id,return_dt");
			return $data->result();
		}

	}
?>