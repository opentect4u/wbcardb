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
/**Get product name */
		public function f_get_name($prodId){

			$this->db->select('Name');

			$this->db->where('ID',$prodId);

			$data = $this->db->get('products');

			return $data->row();

		}
/**Get Batch no. of any product */
		public function f_get_batch($prodId){

			$this->db->select('batch_no');

			$this->db->where('prod_id',$prodId);

			$data = $this->db->get('td_product_batch');

			return $data->result();

		}
/**Get opening banlance of a product */
		public function f_get_opening($prodId,$date){

			$data = $this->db->query("select ifnull(qty,0)qty,Batch
									  from opening_stock_log
									  where Prod_ID 	= $prodId
									  and   stk_Date	= '$date';
									 ");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
		}
/**Total purchase of a product during a said period */
		public function f_get_purchase($prodId,$frmDt,$toDt){

			$data = $this->db->query("select ifnull(sum(qty),0)tot_pur,Batch
									  from Purchase_Items
									  where Pro_ID 	= $prodId
									  and   bill_dt		between '$frmDt' and '$toDt'
									  group by Batch;
									 ");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
		}
/**Total Sale of a product during a period */
		public function f_get_sale($prodId,$frmDt,$toDt){

			$data = $this->db->query("select ifnull(sum(qty),0)tot_sale,Batch
									  from Sales_Items
									  where Prod_ID 	= $prodId
									  and   trans_dt	between '$frmDt' and '$toDt'
									  group by Batch;
									 ");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
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
									  group by Batch
									");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
		}
/**Retrieve all list of purchase between 2 dates */
		public function f_purchase($frmDt,$toDt){

			$data = $this->db->query("select bill_dt,bill_no,comp_name,sum(Dis_Amt)dis_amt,
											 sum(Purchase_Rt)purc_amt,sum(CGST_Amt)cgst,
											 sum(SGST_Amt)sgst,sum(tot_Amt)tot_amt
									  from Purchase_Items
									  where bill_dt between '$frmDt' and '$toDt'	   
									  group by bill_dt,bill_no,comp_name
									  order by bill_dt
									 ");
			return $data->result();
		}
/**Retrieve total of all list of purchase between 2 dates */
		public function f_tot_purchase($frmDt,$toDt){

			$data = $this->db->query("select sum(Purchase_Rt)tot_purc,sum(Dis_Amt)dis_amt,
											 sum(CGST_Amt)tot_cgst,sum(SGST_Amt)tot_sgst,
											 sum(tot_Amt)tot_amt
									  from  Purchase_Items
									  where bill_dt 	between '$frmDt' and '$toDt'
									");
			return $data->row();
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
/**List Sale of product between 2 dates*/		
		public function f_sale($frmDt,$toDt){

			$data = $this->db->query("select trans_dt,Sales_ID,cust_name,
											 sum(Max_Ret_Price * qty)sale_amt,
											 sum(Dis_Amount)dis_amt,
											 Round(sum(Net_Price))net_price
									  from Sales_Items
									  where trans_dt between '$frmDt' and '$toDt'	   
									  group by trans_dt,Sales_ID,cust_name
									  order by trans_dt,Sales_ID
									 ");
			return $data->result();
		}
/**Sale Total */
		public function f_tot_sale($frmDt,$toDt){

			$data = $this->db->query("select sum(Max_Ret_Price * qty)tot_sale,sum(Dis_Amount)dis_amt,
										Round(sum(Net_Price))net_price
									  from  Sales_Items
									  where trans_dt 	between '$frmDt' and '$toDt'
									");
			return $data->row();
		}
/**Itamwise Purchase between a period */
		public function f_item_purchase($frmDt,$toDt,$prod){

			$data = $this->db->query("select bill_dt,bill_no,comp_name,Batch,sum(Qty)qty,
											 (sum(tot_Amt) + sum(Dis_Amt)) purc_amt,
											 sum(Dis_Amt)dis_amt,
											 sum(CGST_Amt)cgst,
											 sum(SGST_Amt)sgst,
											 (sum(tot_Amt) + sum(CGST_Amt) + sum(SGST_Amt))tot_amt
									  from Purchase_Items
									  where Pro_ID = $prod
									  and   bill_dt between '$frmDt' and '$toDt'	   
									  group by bill_dt,bill_no,comp_name,Batch,Unit
									  order by bill_dt
									 ");
			return $data->result();
		}
/**Total itemwise purchase */
		public function f_tot_item_purchase($frmDt,$toDt,$prod){

			$data = $this->db->query("select sum(Qty)qty,sum(tot_Amt)purc_amt,
											 sum(Dis_Amt)dis_amt,
											 sum(CGST_Amt)cgst,
											 sum(SGST_Amt)sgst,
											 (sum(tot_Amt) + sum(CGST_Amt) + sum(SGST_Amt))tot_amt
									  from Purchase_Items
									  where Pro_ID = $prod
									  and   bill_dt between '$frmDt' and '$toDt'	   
									 ");
			return $data->row();
		}
/**Itemwise sale between a period */
		public function f_item_sale($frmDt,$toDt,$prod){

			$data = $this->db->query("select trans_dt,Sales_ID,cust_name,Batch,
			 								 sum(qty)qty, 
											 sum(Max_Ret_Price)unit_amt,
											 sum(Dis_Amount)dis_amt,
											 ((sum(Max_Ret_Price)-sum(Dis_Amount))*sum(qty))net_amt
									  from Sales_Items
									  where Prod_ID = $prod
									  and   trans_dt between '$frmDt' and '$toDt'	   
									  group by trans_dt,Sales_ID,cust_name,Batch
									  order by trans_dt
									 ");
			return $data->result();
		}
/**Total of itemwise sale */
		public function f_tot_item_sale($frmDt,$toDt,$prod){

			$data = $this->db->query("select sum(Qty)tot_qty,
											 sum(Max_Ret_Price)tot_unit_amt,
											 sum(Dis_Amount)tot_dis_amt,
											 ((sum(Max_Ret_Price)-sum(Dis_Amount))*sum(qty))tot_net_amt
									  from Sales_Items
									  where Prod_ID = $prod
									  and   trans_dt between '$frmDt' and '$toDt'	   
									 ");
			return $data->row();
		}
/**Getting all list of products from product table */
		/*public function f_get_prod(){

			$query = $this->db->query("select a.ID prod_id,a.Name prod_name,b.batch_no batch
									   from   products a,td_product_batch b 
									   where  a.ID = b.prod_id
			 						   order by a.ID");

			return $query->result();
		}*/
/**Retrieving quantity of a produtcs between 2 dates here $frmDt is always financial	*
 * year start date ie.'01/04' 1st get the opening stock on '01/04' add it with 			*
 * total purchase during the entire period and finally subtract total sale from the sum *
 */
		public function f_get_all_qty($frmDt,$toDt){

			$data = $this->db->query("Select prod_id,Batch batch,prod_name,Sum((qty + tot_pur) - tot_sale) as tot_qty
									  from (
											select a.Prod_ID prod_id,a.Batch Batch,ifnull(a.qty,0)qty,0 tot_pur,0 tot_sale,b.Name prod_name
											from opening_stock_log a,products b
											where a.Prod_ID = b.ID
											and   a.stk_Date	= '$frmDt'
											UNION
											select a.Pro_ID prod_id,a.Batch Batch,0 qty,ifnull(sum(a.qty),0)tot_pur,0 tot_sale,b.Name prod_name
											from Purchase_Items a,products b
											where a.Pro_ID = b.ID
											and   a.bill_dt		between '$frmDt' and '$toDt'
											group by a.Pro_ID,a.Batch,b.Name
											UNION
											select a.Prod_ID prod_id,a.Batch Batch,0 qty,0 tot_pur,ifnull(sum(a.qty),0)tot_sale,b.Name prod_name
											from Sales_Items a,products b
											where  a.Prod_ID = b.ID   
											and   a.trans_dt	between '$frmDt' and '$toDt'
											group by a.Prod_ID,Batch,b.Name)a
										group by prod_id,Batch,prod_name
										order by prod_id
									");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
		}
	}
?>