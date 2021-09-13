<?php
$shg_details = json_decode($shg_details);
$ardb_list = json_decode($ardb_list);
$selected = json_decode($selected);
// var_dump($shg_details);exit; 
?>
<div class="main-panel">
    <div class="content-wrapper">
	<?= form_open('ho/dc'); ?>
	<div class="card">
            <div class="card-body">
		<h4 class="card-title"> <b>DC Details</b> <small>Self SHG</small>
		    <span class="confirm-div" style="float:right;"><?php echo $this->session->flashdata('msg'); ?></span></h4> <hr>
		<div class="row mt-4">
		    <div class="col-md-6">
			<div class="form-group row">
			    <label class="col-sm-3 col-form-label">ARDB</label>
			    <div class="col-sm-9">
				<select class="form-control" id="ardb_id" name="ardb_id" required >
				    <option value="">Select</option>
				    <?php
				    if ($ardb_list) {
					foreach ($ardb_list as $ardb) {
					    $select = "";
					    if ($selected->ardb_id == $ardb->id) {
						$select = "selected";
					    }
					    echo '<option value="' . $ardb->id . '" ' . $select . '>' . $ardb->name . '</option>';
					}
				    }
				    ?>
				</select>
			    </div>
			</div>
		    </div>
		    <div class="col-md-6">
			<div class="form-group row">
			    <label for="to_dt" class="col-sm-2 col-form-label"></label>
			    <button class="btn btn-primary" id="sarch" name="search" type="submit">Proceed</button>
			</div>
		    </div>
		</div>
	    </div>
        </div>
	<?= form_close(); ?>
	<?php if (isset($_REQUEST['search'])) { ?>

    	<div class="card" style="margin-top:25px;">
    	    <div class="card-body">
    		<center><h4 class="card-title" style="color:green;"> <b>SELF SHG DC DETAILS</b> <small></small>
    			<span class="confirm-div" style="float:right;"></span></h4></center>
    		<div class="row">
    		    <div class="col-12">
    			<div class="table-responsive">
    			    <table id="order-listing" class="table">
    				<thead>
    				    <tr>
    					<th>Memo<br> Date</th>
    					<th>Memo<br> No</th>
    					<th>Sector</th>
    					<th>Pronote<br> No</th>
    					<th>Purpose</th>
    					<th>Action</th>
    					<!-- <th>Download<br> Document</th>
    					<th>Forward Data</th> -->
    				    </tr>
    				    </tr>
    				</thead>
    				<tbody>
					<?php
					foreach ($shg_details as $dt) {
					    $pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->pronote_no);
					    $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
					    echo '<tr>';
					    echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->memo_date))) . '</td>';
					    echo '<td>' . $dt->memo_no . '</td>';
					    echo '<td>SHG</td>';
					    echo '<td>' . $dt->pronote_no . '</td>';
					    echo '<td>' . $dt->purpose . '</td>';
					    echo '<td>
                                        <a href="dc/dc_entry/' . $dt->ardb_id . '/' . $pronote_no . '/' . $memo_no . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>
                                  </td>';
//                                  if($dt->upload > 0){
					    // echo '<td>
					    //     <a href="dc/download_zip/'.$dt->ardb_id.'/'.$pronote_no.'" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="fa fa-download fa-lg"></i></a>
					    //     </td>';
					    //     if($dt->fwd_data == 'N'){
					    // echo '<td>
					    //   <a href="dc/forward_data/' . $dt->ardb_id . '/' .$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Forward Data"><i class="fa fa-forward fa-lg"></i></a>
					    //   </td>';
					    // }else{
					    //   echo '<td></td>';
					    // }
//                                  }else{
//                                    echo '<td></td>';
//                                    echo '<td></td>';
//                                  }
					    echo '</tr>';
					}
					?>

    				</tbody>
    			    </table>
    			</div>
    		    </div>
    		</div>
    	    </div>
    	</div>
        </div>
    <?php } ?>
    <!-- content-wrapper ends -->

    <script>
	function check() {
	    var x = confirm("Are you sure you want to delete?");
	    if (x)
		return true;
	    else
		return false;
	}
	// function _edit(pronote_no, memo_no){
	//   // pronote_no = encodeURIComponent(pronote_no);
	//   // memo_no = encodeURIComponent(memo_no);
	//   console.log(pronote_no);
	//   console.log(memo_no);
	//  // location.href = "<?= base_url(); ?>index.php/dc/dc_entry/" + pronote_no + "/" + memo_no;
	// }

    </script>