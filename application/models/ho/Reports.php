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

            $query = $this->db->query("SELECT ardb_id, ifnull(round(sum(sc)/100000,2),0) sc, ifnull(round(sum(st)/100000,2),0) st, ifnull(round(sum(obc)/100000,2),0) obc, ifnull(round(sum(gen)/100000,2),0) gen, ifnull(round(sum(total_1)/100000,2),0) total_1, ifnull(round(sum(marginal)/100000,2),0) marginal, ifnull(round(sum(small)/100000,2),0) small, 
            	ifnull(round(sum(big)/100000,2),0)  big, ifnull(round(sum(sal_earner)/100000,2),0) sal_earner, ifnull(round(sum(bussiness)/100000),0) bussiness, ifnull(round(sum(total_2)/100000,2),0) total_2,ifnull(round(sum(male)/100000,2),0) male,ifnull(round(sum(female)/100000,2),0) female,ifnull(round(sum(total_3)/100000,2),0) total_3    
              
                                       FROM  td_borrower_classification
									   where  return_dt between '$frmDt' and '$toDt'	   
									   group by ardb_id
									   order by ardb_id;");

			return $query->result();

		}

		public function f_get_borrowerardb($frmDt,$toDt,$ardb_id){

            $query = $this->db->query("SELECT ardb_id,ifnull(round(sum(sc)/100000,2),0) sc, ifnull(round(sum(st)/100000,2),0) st, ifnull(round(sum(obc)/100000,2),0) obc, ifnull(round(sum(gen)/100000,2),0) gen, ifnull(round(sum(total_1)/100000,2),0) total_1, ifnull(round(sum(marginal)/100000,2),0) marginal, ifnull(round(sum(small)/100000,2),0) small, 
            	ifnull(round(sum(big)/100000,2),0)  big, ifnull(round(sum(sal_earner)/100000,2),0) sal_earner, ifnull(round(sum(bussiness)/100000),0) bussiness, ifnull(round(sum(total_2)/100000,2),0) total_2,ifnull(round(sum(male)/100000,2),0) male,ifnull(round(sum(female)/100000,2),0) female,ifnull(round(sum(total_3)/100000,2),0) total_3    
              
                                       FROM  td_borrower_classification
									   where  return_dt between '$frmDt' and '$toDt'	   
									   and    ardb_id  ='$ardb_id';");

			return $query->result();

		}
		public function f_get_investment($frmDt,$toDt){

            $query = $this->db->query("SELECT ardb_id,return_dt,from_fin_yr,to_fin_yr,prv_frm_fin_yr,prv_to_fin_yr,ifnull(round(sum(no_acc_closed)/100000,2),0) no_acc_closed, ifnull(round(sum(prog_brro_memb)/100000,2),0) prog_brro_memb, ifnull(round(sum(farm_sec_case_no)/100000,2),0) farm_sec_case_no, ifnull(round(sum(farm_sec_amt)/100000,2),0) farm_sec_amt, ifnull(round(sum(non_farm_sec_case_no)/100000,2),0) non_farm_sec_case_no, ifnull(round(sum(non_farm_sec_amt)/100000,2),0) non_farm_sec_amt, ifnull(round(sum(housing_sec_case_no)/100000,2),0) housing_sec_case_no,ifnull(round(sum(housing_sec_amt)/100000,2),0)  housing_sec_amt, ifnull(round(sum(other_sec_case_no)/100000,2),0) other_sec_case_no, ifnull(round(sum(other_sec_amt)/100000,2),0) other_sec_amt, ifnull(round(sum(non_sch_inv_case_no)/100000,2),0) non_sch_inv_case_no,ifnull(round(sum(non_sch_inv_amt)/100000,2),0) non_sch_inv_amt,ifnull(round(sum(tot_inv_case_no)/100000,2),0) tot_inv_case_no,ifnull(round(sum(tot_inv_amt)/100000,2),0) tot_inv_amt,ifnull(round(sum(tot_inv_case_no_prv_yr)/100000,2),0) tot_inv_case_no_prv_yr,ifnull(round(sum(tot_inv_amt_prv_yr)/100000,2),0) tot_inv_amt_prv_yr 
                                       FROM  td_investment
									   where  return_dt between '$frmDt' and '$toDt'	   
									   group by ardb_id,return_dt,from_fin_yr,to_fin_yr,prv_frm_fin_yr,prv_to_fin_yr
									   order by ardb_id;");

			return $query->result();

		}

		public function f_get_investmentardb($frmDt,$toDt,$ardb_id){

            $query = $this->db->query("SELECT ardb_id,return_dt,ifnull(round(sum(no_acc_closed)/100000,2),0) no_acc_closed, ifnull(round(sum(prog_brro_memb)/100000,2),0) prog_brro_memb, ifnull(round(sum(farm_sec_case_no)/100000,2),0) farm_sec_case_no, ifnull(round(sum(farm_sec_amt)/100000,2),0) farm_sec_amt, ifnull(round(sum(non_farm_sec_case_no)/100000,2),0) non_farm_sec_case_no, ifnull(round(sum(non_farm_sec_amt)/100000,2),0) non_farm_sec_amt, ifnull(round(sum(housing_sec_case_no)/100000,2),0) housing_sec_case_no,ifnull(round(sum(housing_sec_amt)/100000,2),0)  housing_sec_amt, ifnull(round(sum(other_sec_case_no)/100000,2),0) other_sec_case_no, ifnull(round(sum(other_sec_amt)/100000,2),0) other_sec_amt, ifnull(round(sum(non_sch_inv_case_no)/100000,2),0) non_sch_inv_case_no,ifnull(round(sum(non_sch_inv_amt)/100000,2),0) non_sch_inv_amt,ifnull(round(sum(tot_inv_case_no)/100000,2),0) tot_inv_case_no,ifnull(round(sum(tot_inv_amt)/100000,2),0) tot_inv_amt,ifnull(round(sum(tot_inv_case_no_prv_yr)/100000,2),0) tot_inv_case_no_prv_yr,ifnull(round(sum(tot_inv_amt_prv_yr)/100000,2),0) tot_inv_amt_prv_yr 
                                       FROM  td_investment
									   where  return_dt between '$frmDt' and '$toDt'	   
									   and    ardb_id  ='$ardb_id'
									   group by ardb_id,return_dt
									   ");

			return $query->result();

		}
	
public function f_get_forthnight($frmDt,$toDt,$report_type){

			$data = $this->db->query("select ardb_id,return_dt,
										round(sum(dmd_prn_od)/100000,2) dmd_prn_od,
										round(sum(dmd_prn_cr)/100000,2) dmd_prn_cr,
										round(sum(dmd_prn_tot)/100000,2) dmd_prn_tot,
										round(sum(dmd_int_od)/100000,2) dmd_int_od,
										round(sum(dmd_int_cr)/100000,2) dmd_int_cr,
										round(sum(dmd_int_tot)/100000,2) dmd_int_tot,
										round(sum(tot_dmd)/100000,2) tot_dmd,
										round(sum(col_prn_od)/100000,2) col_prn_od,
										round(sum(col_prn_cr)/100000,2) col_prn_cr,
										round(sum(col_prn_adv)/100000,2) col_prn_adv,
										round(sum(col_prn_tot)/100000,2) col_prn_tot,
										round(sum(col_int_od)/100000,2) col_int_od,
										round(sum(col_int_cr)/100000,2) col_int_cr,
										round(sum(col_int_tot)/100000,2) col_int_tot,
										round(sum(tot_colc)/100000,2) tot_colc,
										round(sum(recov_per)/100000,2) recov_per,
										round(sum(prv_yr_dmd_prn)/100000,2) prv_yr_dmd_prn,
										round(sum(prv_yr_dmd_int)/100000,2) prv_yr_dmd_int,
										round(sum(prv_yr_dmd_tot)/100000,2) prv_yr_dmd_tot,
										round(sum(prv_yr_col_prn)/100000,2) prv_yr_col_prn,
										round(sum(prv_yr_col_int)/100000,2) prv_yr_col_int,
										round(sum(prv_yr_col_tot)/100000,2) prv_yr_col_tot,
										round(sum(col_per)/100000,2) col_per,
										round(sum(tot_no_ac_dmd)/100000,2) tot_no_ac_dmd,
										round(sum(tot_no_ac_od_dmd)/100000,2) tot_no_ac_od_dmd,
										round(sum(tot_no_ac_curr_dmd)/100000,2) tot_no_ac_curr_dmd,
										round(sum(tot_no_ac_col)/100000,2) tot_no_ac_col,
									    round(sum(tot_no_ac_od_col)/100000,2) tot_no_ac_od_col,
										round(sum(tot_no_ac_curr_col)/100000,2) tot_no_ac_curr_col,
										round(sum(tot_no_ac_prog)/100000,2) tot_no_ac_prog,
										round(sum(tot_no_ac_od_prog)/100000,2) tot_no_ac_od_prog,
										round(sum(tot_no_ac_curr_prog)/100000,2) tot_no_ac_curr_prog
										from td_fortnight
										where return_dt between '$frmDt' and '$toDt' 
										and   report_type  ='$report_type'
										group by ardb_id,return_dt");
			return $data->result();
		}
		public function f_get_forthnightardb($frmDt,$toDt,$report_type,$ardb_id){

			$data = $this->db->query("select ardb_id,return_dt,
										round(sum(dmd_prn_od)/100000,2) dmd_prn_od,
										round(sum(dmd_prn_cr)/100000,2) dmd_prn_cr,
										round(sum(dmd_prn_tot)/100000,2) dmd_prn_tot,
										round(sum(dmd_int_od)/100000,2) dmd_int_od,
										round(sum(dmd_int_cr)/100000,2) dmd_int_cr,
										round(sum(dmd_int_tot)/100000,2) dmd_int_tot,
										round(sum(tot_dmd)/100000,2) tot_dmd,
										round(sum(col_prn_od)/100000,2) col_prn_od,
										round(sum(col_prn_cr)/100000,2) col_prn_cr,
										round(sum(col_prn_adv)/100000,2) col_prn_adv,
										round(sum(col_prn_tot)/100000,2) col_prn_tot,
										round(sum(col_int_od)/100000,2) col_int_od,
										round(sum(col_int_cr)/100000,2) col_int_cr,
										round(sum(col_int_tot)/100000,2) col_int_tot,
										round(sum(tot_colc)/100000,2) tot_colc,
										round(sum(recov_per)/100000,2) recov_per,
										round(sum(prv_yr_dmd_prn)/100000,2) prv_yr_dmd_prn,
										round(sum(prv_yr_dmd_int)/100000,2) prv_yr_dmd_int,
										round(sum(prv_yr_dmd_tot)/100000,2) prv_yr_dmd_tot,
										round(sum(prv_yr_col_prn)/100000,2) prv_yr_col_prn,
										round(sum(prv_yr_col_int)/100000,2) prv_yr_col_int,
										round(sum(prv_yr_col_tot)/100000,2) prv_yr_col_tot,
										round(sum(col_per)/100000,2) col_per,
										round(sum(tot_no_ac_dmd)/100000,2) tot_no_ac_dmd,
										round(sum(tot_no_ac_od_dmd)/100000,2) tot_no_ac_od_dmd,
										round(sum(tot_no_ac_curr_dmd)/100000,2) tot_no_ac_curr_dmd,
										round(sum(tot_no_ac_col)/100000,2) tot_no_ac_col,
									    round(sum(tot_no_ac_od_col)/100000,2) tot_no_ac_od_col,
										round(sum(tot_no_ac_curr_col)/100000,2) tot_no_ac_curr_col,
										round(sum(tot_no_ac_prog)/100000,2) tot_no_ac_prog,
										round(sum(tot_no_ac_od_prog)/100000,2) tot_no_ac_od_prog,
										round(sum(tot_no_ac_curr_prog)/100000,2) tot_no_ac_curr_prog
										from td_fortnight
										where return_dt between '$frmDt' and '$toDt' 
										and   report_type  ='$report_type'
										and   ardb_id      ='$ardb_id'
										group by ardb_id,return_dt");
			return $data->result();
		}

	}
?>