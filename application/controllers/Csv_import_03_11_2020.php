<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->model('Master');
	   $this->load->library('csvimport');

	 if(!isset($this->session->userdata['login']->user_id)){
            
            redirect('Main/login');

        }
	}

	function index()
	{	
           // echo date('Y-m');
           // die();
		$where = array(
            "ardb_id" => $this->session->userdata['login']->br_id
          //  "date_format(td_fridy_rtn.`week_dt`,'%Y-%m')" => date('Y-m')
                );

		$data["export_details"]  = $this->Master->get_particulars("td_fridy_rtn",NULL,$where,0);

		$this->load->view('common/header');
		$this->load->view('transaction/csv_import',$data);
		$this->load->view('common/footer');

	}

	public function friday_upload(){

        $this->load->view('common/header');
		$this->load->view('transaction/friday_upload');
		$this->load->view('common/footer');


	}

	function load_data()
	{
		// console.log('raja');
		$result = $this->csv_import_model->select();
		$output = '
                    <table id="order-listing" class="table">
                      <thead>
        		<tr>
        			<th>Sr. No</th>
        			<th>ARDB_ID</th>
        			<th>Returned Dt</th>
					<th>RD</th>
					<th>FD</th>
					<th>FLEXI</th>
					<th>MIS</th>
					<th>OTH_DEP</th>
					<th>IBSD</th>
					<th>TOT_DEP_MOBILISD</th>
					<th>CASH_IN_HND</th>
					<th>OTH_BNK</th>
					<th>IBSD_LOAN</th>
					<th>DEP_LOAN</th>
					<th>REMMIT_WBSCARDB</th>
					<th>REMMIT_WBSCARDB_EXCESS</th>
					<th>TOT_DEPLOY_FUND</th>
					

        		</tr>
        		</thead>
                      <tbody>
		';
		$count = 0;
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$count = $count + 1;
				$output .= '
				<tr>
					<td>'.$count.'</td>
					<td>'.$row->ardb_id.'</td>
				
					<td>'.$row->week_dt.'</td>
					<td>'.$row->rd.'</td>
					<td>'.$row->rd.'</td>
					<td>'.$row->flexi_sb.'</td>
					<td>'.$row->mis.'</td>
					<td>'.$row->other_dep.'</td>
					<td>'.$row->ibsd.'</td>
					<td>'.$row->total_dep_mob.'</td>
					<td>'.$row->cash_in_hand.'</td>
					<td>'.$row->other_bank.'</td>
					<td>'.$row->ibsd_loan.'</td>
					<td>'.$row->dep_loan.'</td>
					<td>'.$row->wbcardb_remit_slr.'</td>
					<td>'.$row->wbcardb_remit_slr_excess.'</td>
					<td>'.$row->total_fund_deploy.'</td>
				</tr>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
	    		<td colspan="18" align="left">Data not Available</td>
	    	</tr>
			';
		}
		$output .= '</tbody></table>';
		echo $output;
	}

 public function import(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
          
           $week_dt  = $this->input->post("week_dt");
         
        
           //For Excel Upload
            $csvMimes = array('text/x-comma-separated-values',
					   'text/comma-separated-values',
					   'application/octet-stream',
					   'application/vnd.ms-excel',
					   'application/x-csv',
					   'text/x-csv',
					   'text/csv',
					   'application/csv',
					   'application/excel',
					   'application/vnd.msexcel',
                       'text/plain');
          
          
            if(!empty($_FILES['csv_file']['name']) && in_array($_FILES['csv_file']['type'],$csvMimes)){
					   
                $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        
                   $data[] = array(
				  'ardb_id'	                 =>	$this->session->userdata['login']->br_id,
        		  'week_dt'			         =>	$week_dt,
				  'rd'			             =>	$line[1],
				  'fd'			             =>	$line[2],
				  'flexi_sb'			     =>	$line[3],
				  'mis'			             =>	$line[4],
				  'other_dep'			     =>	$line[5],
				  'ibsd'			         =>	$line[6],
				  'total_dep_mob'	         =>	$line[7],
				  'cash_in_hand'		     =>	$line[8],
				  'other_bank'		         =>	$line[9],
				  'ibsd_loan'			     =>	$line[10],
				  'dep_loan'			     =>	$line[11],
				  'wbcardb_remit_slr'	     =>	$line[12],
				  'wbcardb_remit_slr_excess' =>	$line[13],
				  'total_fund_deploy' 	     =>	$line[14],
				  'ibsd_as'                  => $line[15],
				  'uploded_by'               => $this->session->userdata['login']->user_id,
				  'uploaded_dt'              => date("Y-m-d H:i:s")
                        
		              	);
                     
                   
                    $data = array_values($data);
                 
            }
            unset($data[0]);
             
            $this->csv_import_model->f_insert_multiple('td_fridy_rtn', $data);
            fclose($csvFile);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('csv_import');

            }
        }
    }

    public function friday_delete(){
    		
          $where = array(
            "ardb_id" => $this->uri->segment(3),
             "week_dt" => $this->uri->segment(4)
                );
        $this->Master->delete_particulars("td_fridy_rtn",$where);

         redirect('csv_import');

    }


    function frt_invest()
	{	
		 $where = array(
            "ardb_id" => $this->session->userdata['login']->br_id
           // "date_format(td_investment.`return_dt`,'%Y-%m')" => date('Y-m')
                );
		$data["export_details"]  = $this->Master->get_particulars("td_investment",NULL,$where,0);
		$this->load->view('common/header');
		$this->load->view('transaction/csv_invest',$data);
		$this->load->view('common/footer');

	}

	 function upload_invest()
	{	
		 
		$this->load->view('common/header');
		$this->load->view('transaction/invest');
		$this->load->view('common/footer');

	}

 function import_invest(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
          
           $week_dt  = $this->input->post("week_dt");
         
        
           //For Excel Upload
            $csvMimes = array('text/x-comma-separated-values',
					   'text/comma-separated-values',
					   'application/octet-stream',
					   'application/vnd.ms-excel',
					   'application/x-csv',
					   'text/x-csv',
					   'text/csv',
					   'application/csv',
					   'application/excel',
					   'application/vnd.msexcel',
                       'text/plain');
          
          
            if(!empty($_FILES['csv_file']['name']) && in_array($_FILES['csv_file']['type'],$csvMimes)){
					   
                $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        
                   $data[] = array(
				  'ardb_id'	                 =>	$this->session->userdata['login']->br_id,
        		  'return_dt'			         =>	$week_dt,
				  'from_fin_yr'			     =>	$line[1],
				  'to_fin_yr'			     =>	$line[2],
				  'prv_frm_fin_yr'			 =>	$line[3],
				  'prv_to_fin_yr'			 =>	$line[4],
				  'no_acc_closed'            =>	$line[5],
				   'prog_brro_memb'			 =>	$line[6],
				  'farm_sec_case_no'	     =>	$line[7],
				  'farm_sec_amt'	         =>	$line[8],
				  'non_farm_sec_case_no'     =>	$line[9],
				  'non_farm_sec_amt'		 =>	$line[10],
				  'housing_sec_case_no'	     =>	$line[11],
				  'housing_sec_amt'			 =>	$line[12],
				  'other_sec_case_no'	     =>	$line[13],
				  'other_sec_amt'            =>	$line[14],
				  'non_sch_inv_case_no' 	 =>	$line[15],
				  'non_sch_inv_amt'		     =>	$line[16],
				  'tot_inv_case_no'		     =>	$line[17],
				  'tot_inv_amt'			     =>	$line[18],
				  'tot_inv_case_no_prv_yr'   =>	$line[19],
				  'tot_inv_amt_prv_yr'	     =>	$line[20],
				  'uploaded_by'              => $this->session->userdata['login']->user_id,
				  'uploaded_dt'              => date("Y-m-d H:i:s")
                        
		              	);
                     
                  
                    $data = array_values($data);
                
            }
             unset($data[0]);
            $this->csv_import_model->f_insert_multiple('td_investment', $data);
            fclose($csvFile);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('csv_import/frt_invest');

            }
        }
    }


     public function invest_delete(){
    		
          $where = array(
            "ardb_id" => $this->uri->segment(3),
             "return_dt" => $this->uri->segment(4)
                );
        $this->Master->delete_particulars("td_investment",$where);

          redirect('csv_import/frt_invest');

    }
    
     function frt_borrow_clas()
	{	
		 $where = array(
            "ardb_id" => $this->session->userdata['login']->br_id
            //"date_format(td_borrower_classification.`return_dt`,'%Y-%m')" => date('Y-m')
                );
		$data["export_details"]  = $this->Master->get_particulars("td_borrower_classification",NULL,$where,0);
		$this->load->view('common/header');
		$this->load->view('transaction/csv_borrow_class',$data);
		$this->load->view('common/footer');

	}

	public function friday_borrow(){


        $this->load->view('common/header');
		$this->load->view('transaction/borrower_classification');
		$this->load->view('common/footer');

	}
	function import_borrow_clas(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
          
           $week_dt  = $this->input->post("week_dt");
         
        
           //For Excel Upload
            $csvMimes = array('text/x-comma-separated-values',
					   'text/comma-separated-values',
					   'application/octet-stream',
					   'application/vnd.ms-excel',
					   'application/x-csv',
					   'text/x-csv',
					   'text/csv',
					   'application/csv',
					   'application/excel',
					   'application/vnd.msexcel',
                       'text/plain');
          
          
            if(!empty($_FILES['csv_file']['name']) && in_array($_FILES['csv_file']['type'],$csvMimes)){
					   
                $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        
                   $data[] = array(
				  'ardb_id'	                 =>	$this->session->userdata['login']->br_id,
        		  'return_dt'			     =>	$week_dt,
				  'sc'			             =>	$line[1],
				  'st'			             =>	$line[2],
				  'obc'			             =>	$line[3],
				  'gen'			             =>	$line[4],
				  'total_1'                  =>	$line[5],
				  'marginal'			     =>	$line[6],
				  'small'	                 =>	$line[7],
				  'big'	                     =>	$line[8],
				  'sal_earner'               =>	$line[9],
				  'bussiness'		         =>	$line[10],
				  'total_2'	                 =>	$line[11],
				  'male'			         =>	$line[12],
				  'female'	                 =>	$line[13],
				  'total_3'                  =>	$line[14],
				  'uploaded_by'              => $this->session->userdata['login']->user_id,
				  'uploaded_dt'              => date("Y-m-d H:i:s")
                        
		            );
                     
                  
                    $data = array_values($data);

                    

               
            }
             unset($data[0]);
             $this->csv_import_model->f_insert_multiple('td_borrower_classification', $data);
             fclose($csvFile);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('csv_import/frt_borrow_clas');

            }
        }
    }

    public function borrower_delete(){
    		
          $where = array(
            "ardb_id" => $this->uri->segment(3),
             "return_dt" => $this->uri->segment(4)
                );
        $this->Master->delete_particulars("td_borrower_classification",$where);

         redirect('csv_import/frt_borrow_clas');

    }

	
		
}
