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

            $query = $this->db->query("SELECT ardb_id,from_fin_yr,to_fin_yr,prv_frm_fin_yr,prv_to_fin_yr, ifnull(sum(no_acc_closed),0) no_acc_closed, ifnull(sum(prog_brro_memb),0) prog_brro_memb, ifnull(sum(farm_sec_case_no),0) farm_sec_case_no, ifnull(sum(farm_sec_amt),0) farm_sec_amt, ifnull(sum(non_farm_sec_case_no),0) non_farm_sec_case_no, ifnull(sum(non_farm_sec_amt),0) non_farm_sec_amt, ifnull(sum(housing_sec_case_no),0) housing_sec_case_no, 
            	ifnull(sum(housing_sec_amt),0)  housing_sec_amt, ifnull(sum(other_sec_case_no),0) other_sec_case_no, ifnull(sum(other_sec_amt),0) other_sec_amt, ifnull(sum(non_sch_inv_case_no),0) non_sch_inv_case_no,ifnull(sum(non_sch_inv_amt),0) non_sch_inv_amt,ifnull(sum(tot_inv_case_no),0) tot_inv_case_no,ifnull(sum(tot_inv_amt),0) tot_inv_amt,    
                   ifnull(sum(tot_inv_case_no_prv_yr),0) tot_inv_case_no_prv_yr,ifnull(sum(tot_inv_amt_prv_yr),0) tot_inv_amt_prv_yr 
                                       FROM  td_investment
									   where  return_dt between '$frmDt' and '$toDt'	   
									   group by ardb_id,from_fin_yr,to_fin_yr,prv_frm_fin_yr,prv_to_fin_yr
									   order by ardb_id;");

			return $query->result();

		}

		public function f_get_investmentardb($frmDt,$toDt,$ardb_id){

            $query = $this->db->query("SELECT ardb_id, ifnull(sum(no_acc_closed),0) no_acc_closed, ifnull(sum(prog_brro_memb),0) prog_brro_memb, ifnull(sum(farm_sec_case_no),0) farm_sec_case_no, ifnull(sum(farm_sec_amt),0) farm_sec_amt, ifnull(sum(non_farm_sec_case_no),0) non_farm_sec_case_no, ifnull(sum(non_farm_sec_amt),0) non_farm_sec_amt, ifnull(sum(housing_sec_case_no),0) housing_sec_case_no, 
            	ifnull(sum(housing_sec_amt),0)  housing_sec_amt, ifnull(sum(other_sec_case_no),0) other_sec_case_no, ifnull(sum(other_sec_amt),0) other_sec_amt, ifnull(sum(non_sch_inv_case_no),0) non_sch_inv_case_no,ifnull(sum(non_sch_inv_amt),0) non_sch_inv_amt,ifnull(sum(tot_inv_case_no),0) tot_inv_case_no,ifnull(sum(tot_inv_amt),0) tot_inv_amt,    
                   ifnull(sum(tot_inv_case_no_prv_yr),0) tot_inv_case_no_prv_yr,ifnull(sum(tot_inv_amt_prv_yr),0) tot_inv_amt_prv_yr 
                                       FROM  td_investment
									   where  return_dt between '$frmDt' and '$toDt'	   
									   and    ardb_id  ='$ardb_id';");

			return $query->result();

		}
	

/**Total */
		public function f_get_tot_qty($prodId,$frmDt,$toDt){

			$data = $this->db->query("Select Batch,Sum((qty + tot_pur) - tot_sale) as tot_qty
									  from (
											select Batch,ifnull(qty,0)qty,0 tot_pur,0 tot_sale
											from opening_stock_log
											where Prod_ID 	= $prodId
											and   stk_Date	= '$frmDt'
											UNION
											select Batch,0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
											from Purchase_Items
											where Pro_ID 	= $prodId
											and   bill_dt		between '$frmDt' and '$toDt'
											group by Batch
											UNION
											select Batch,0 qty,0 tot_pur,ifnull(sum(qty),0)tot_sale
											from Sales_Items
											where Prod_ID 	= $prodId
											and   trans_dt	between '$frmDt' and '$toDt'
											group by Batch)a
									  group by Batch");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
		}


/*****Friday return********************* */
		public function f_fridayrtn($frmDt,$toDt){
	
			$data = $this->db->query("select SUBMIT_DT,
									  sum(FD)FD,
									  sum(RD)RD,
									  sum(FLEXI)FLEXI,
									  sum( MIS)MIS,
									  sum(OTH_DEP)OTH_DEP,
									  sum(IBSD)IBSD,
									  sum(TOT_DEP_MOBILISD)TOT_DEP_MOBILISD,
									  sum(CASH_IN_HND)CASH_IN_HND,
									  sum(OTH_BNK)OTH_BNK,
									  sum(IBSD_LOAN)IBSD_LOAN,
									  sum(DEP_LOAN)DEP_LOAN,
									  sum(REMMIT_WBSCARDB)REMMIT_WBSCARDB,
									  sum(REMMIT_WBSCARDB_EXCESS)REMMIT_WBSCARDB_EXCESS,
									  sum(TOT_DEPLOY_FUND)TOT_DEPLOY_FUND
									  from td_fridy_rtn
									  where SUBMIT_DT between '$frmDt' and '$toDt'	   
									  group by SUBMIT_DT
									  order by SUBMIT_DT
									 ");
			return $data->result();
		}

/**********Friday rtn Total *******/
		public function f_tot_fridayrtn($frmDt,$toDt){

			$data = $this->db->query("select 
										sum(FD)FD,
										sum(RD)RD,
										sum(FLEXI)FLEXI,
										sum( MIS)MIS,
										sum(OTH_DEP)OTH_DEP,
										sum(IBSD)IBSD,
										sum(TOT_DEP_MOBILISD)TOT_DEP_MOBILISD,
										sum(CASH_IN_HND)CASH_IN_HND,
										sum(OTH_BNK)OTH_BNK,
										sum(IBSD_LOAN)IBSD_LOAN,
										sum(DEP_LOAN)DEP_LOAN,
										sum(REMMIT_WBSCARDB)REMMIT_WBSCARDB,
										sum(REMMIT_WBSCARDB_EXCESS)REMMIT_WBSCARDB_EXCESS,
										sum(TOT_DEPLOY_FUND)TOT_DEPLOY_FUND
										from td_fridy_rtn
										where SUBMIT_DT between '$frmDt' and '$toDt' ");
			return $data->row();
		}

	}
?>