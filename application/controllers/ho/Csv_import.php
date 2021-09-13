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
		$this->load->view('dashboard/menu');
		$this->load->view('dashboard/header');
		 
		$this->load->view('transaction/csv_import');
		$this->load->view('dashboard/footer');
		

	}

	function load_data()
	{
		// console.log('raja');
		$result = $this->csv_import_model->select();
		$output = '
		 <h4 align="center">Imported Details Of CSV File</h4>
        <div class="table-responsive">
		<font face="Courier New" ><table class="table table-bordered table-striped">
        		<tr>
        			<th>Sr. No</th>
        			<th>ARDB_ID</th>
        			<th>BR_ID</th>
        			<th>SUBMIT_DT</th>
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
					<td>'.$row->ARDB_ID.'</td>
					<td>'.$row->BR_ID.'</td>
					<td>'.$row->SUBMIT_DT.'</td>
					<td>'.$row->RD.'</td>
					<td>'.$row->FD.'</td>
					<td>'.$row->FLEXI.'</td>
					<td>'.$row->MIS.'</td>
					<td>'.$row->OTH_DEP.'</td>
					<td>'.$row->IBSD.'</td>
					<td>'.$row->TOT_DEP_MOBILISD.'</td>
					<td>'.$row->CASH_IN_HND.'</td>
					<td>'.$row->OTH_BNK.'</td>
					<td>'.$row->IBSD_LOAN.'</td>
					<td>'.$row->DEP_LOAN.'</td>
					<td>'.$row->REMMIT_WBSCARDB.'</td>
					<td>'.$row->REMMIT_WBSCARDB_EXCESS.'</td>
					<td>'.$row->TOT_DEPLOY_FUND.'</td>
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
		$output .= '</table></font></div>';
		echo $output;
	}

	function import()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$data[] = array(
				'ARDB_ID'	       =>	$row["ARDB_ID"],
        		'BR_ID'		       =>	$row["BR_ID"],
        		'SUBMIT_DT'			=>	$row["SUBMIT_DT"],
				'RD'			    =>	$row["RD"],
				'FD'			    =>	$row["FD"],
				'FLEXI'			    =>	$row["FLEXI"],
				'MIS'			    =>	$row["MIS"],
				'OTH_DEP'			=>	$row["OTH_DEP"],
				'IBSD'			    =>	$row["IBSD"],
				'TOT_DEP_MOBILISD'	=>	$row["TOT_DEP_MOBILISD"],
				'CASH_IN_HND'		=>	$row["CASH_IN_HND"],
				'OTH_BNK'			=>	$row["OTH_BNK"],
				'IBSD_LOAN'			=>	$row["IBSD_LOAN"],
				'DEP_LOAN'			=>	$row["DEP_LOAN"],
				'REMMIT_WBSCARDB'	=>	$row["REMMIT_WBSCARDB"],
				'REMMIT_WBSCARDB_EXCESS' =>	$row["REMMIT_WBSCARDB_EXCESS"],
				'TOT_DEPLOY_FUND' 	=>	$row["TOT_DEPLOY_FUND"]
				



			);
		}
		$this->csv_import_model->insert($data);
	}
	
		
}
