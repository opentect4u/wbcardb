<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import_frnt extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->model('Master');
	    $this->load->library('csvimport');
	    $this->load->helper('wbcardb');

	    if(!isset($this->session->userdata['login']->user_id)){
            
            redirect('Main/login');

        }
	}

	function index()
	{
		$data["reports"]  = $this->Master->get_particulars("md_report_type",NULL,NULL,0);

		 $where = array(
            "ardb_id" => $this->session->userdata['login']->br_id
           // "date_format(td_fortnight.`return_dt`,'%Y-%m')" => date('Y-m')
                );
		$data["export_details"]  = $this->Master->get_particulars("td_fortnight",NULL,$where,0);
		$this->load->view('common/header');
		$this->load->view('transaction/csv_import_frnt',$data);
		$this->load->view('common/footer');
		

	}

	function forthnightly_upload()
	{
		$data["reports"]  = $this->Master->get_particulars("md_report_type",NULL,NULL,0);

		
		$this->load->view('common/header');
		$this->load->view('transaction/forthnight_upload',$data);
		$this->load->view('common/footer');
		

	}

	function load_data()
	{
		// console.log('raja');
		$result = $this->csv_import_model_frnt->select();
		$output = '
		  <table id="order-listing" class="table">
                      <thead>
        		<tr>
        			<th>Sr. No</th>
        			<th>ARDB_HO</th>
        			<th>ARDB_BR</th>
        			<th>FRM_DT</th>
					<th>TO_DT</th>
					<th>FRM_FY</th>
					<th>TO_FY</th>
					<th>DMND_CR_P</th>
					<th>DMND_OD_P</th>
					<th>DMD_CR_INTT</th>
					<th>DMD_OD_INTT</th>
					<th>COLL_CR_P</th>
					<th>coll_OD_P</th>
					<th>COLL_CR_INTT</th>
					<th>COLL_OD_INTT</th>
					<th>COLL_ADV</th>
					<th>RECOV_PER</th>
                    <th>LST_YR_PRN_DMD</th>
                    <th>LST_YR_INTT_DMD</th>
                    <th>LST_YR_COLL_PRN</th>
                    <th>COLL_PER</th>

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
                    <td>'.$row->ARDB_HO.'</td>
        			<td>'.$row->ARDB_BR.'</td>
        			<td>'.$row->FRM_DT.'</td>
					<td>'.$row->TO_DT.'</td>
					<td>'.$row->FRM_FY.'</td>
					<td>'.$row->TO_FY.'</td>
					<td>'.$row->DMND_CR_P.'</td>
					<td>'.$row->DMND_OD_P.'</td>
					<td>'.$row->DMD_CR_INTT.'</td>
					<td>'.$row->DMD_OD_INTT.'</td>
					<td>'.$row->COLL_CR_P.'</td>
					<td>'.$row->coll_OD_P.'</td>
					<td>'.$row->COLL_CR_INTT.'</td>
					<td>'.$row->COLL_OD_INTT.'</td>
					<td>'.$row->COLL_ADV.'</td>
					<td>'.$row->RECOV_PER.'</td>
                    <td>'.$row->LST_YR_PRN_DMD.'</td>
                    <td>'.$row->LST_YR_INTT_DMD.'</td>
                    <td>'.$row->LST_YR_COLL_PRN.'</td>
                    <td>'.$row->COLL_PER.'</td>
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

	function import(){

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
				  'report_type'			     =>	$this->input->post("report_type"),
				  'dmd_frm_fin_yr'			 =>	$line[1],
				  'dmd_to_fin_yr'			 =>	$line[2],
				  'dmd_prn_od'			     =>	$line[3],
				  'dmd_prn_cr'			     =>	$line[4],
				  'dmd_prn_tot'			     =>	$line[5],
				  'dmd_int_od'	             =>	$line[6],
				  'dmd_int_cr'		         =>	$line[7],
				  'dmd_int_tot'		         =>	$line[8],
				  'tot_dmd'			         =>	$line[9],
				  'col_prn_od'			     =>	$line[10],
				  'col_prn_cr'	             =>	$line[11],
				  'col_prn_adv'              =>	$line[12],
				  'col_prn_tot' 	         =>	$line[13],
				  'col_int_od'	             =>	$line[14],
				  'col_int_cr'		         =>	$line[15],
				  'col_int_tot'		         =>	$line[16],
				  'tot_colc'			     =>	$line[17],
				  'recov_per'			     =>	$line[18],
				  'prv_yr_dmd_prn'	         =>	$line[19],
				  'prv_yr_dmd_int'           =>	$line[20],
				  'prv_yr_dmd_tot' 	         =>	$line[21],
				  'prv_yr_col_prn'			 =>	$line[22],
				  'prv_yr_col_int'	         =>	$line[23],
				  'prv_yr_col_tot'           =>	$line[24],
				  'col_per' 	             =>	$line[25],
				  'tot_no_ac_dmd'	         =>	$line[26],
				  'tot_no_ac_od_dmd'		 =>	$line[27],
				  'tot_no_ac_curr_dmd'		 =>	$line[28],
				  'tot_no_ac_col'			 =>	$line[29],
				  'tot_no_ac_od_col'		 =>	$line[30],
				  'tot_no_ac_curr_col'	     =>	$line[31],
				  'tot_no_ac_prog'           =>	$line[32],
				  'tot_no_ac_od_prog' 	     =>	$line[33],
				  'tot_no_ac_curr_prog'      => $line[34],
				  'uploaded_by'              => $this->session->userdata['login']->user_id,
				  'uploaded_dt'              => date("Y-m-d H:i:s")
                        
		       );
                     
                    
                    $data = array_values($data);
                
              
            }
            unset($data[0]);
            $this->csv_import_model->f_insert_multiple('td_fortnight', $data);
            
             fclose($csvFile);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('csv_import_frnt');

            }
        }
    }

    public function forthnight_delete(){
    		
          $where = array(
            "ardb_id" => $this->uri->segment(3),
             "return_dt" => $this->uri->segment(4),
             "report_type" => $this->uri->segment(5),
                );
        $this->Master->delete_particulars("td_fortnight",$where);

          redirect('csv_import_frnt');

    }
	
		
}
