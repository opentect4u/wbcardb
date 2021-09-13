<?php
$approve_details = json_decode($approve_details);
$ardb_list = json_decode($ardb_list);
$selected = json_decode($selected);
// var_dump($shg_details);exit;   
?>
<div class="main-panel">
    <div class="content-wrapper">
	<?= form_open('ho/dc/approve_view'); ?>
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
    					<th>Sl No.</th>
    					<th>Memo No</th>
    					<!-- <th>Memo Date</th> -->
    					<th>Sector</th>
    					<th>Status</th>
    					<th>Action</th>
    				    </tr>
    				</thead>
    				<tbody>
					<?php
					$i = 1;
					foreach ($approve_details as $dt) {
					    $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
					    echo '<tr>';
					    echo '<td>' . $i . '</td>';
					    echo '<td>' . $dt->memo_no . '</td>';
					    // echo '<td>'.date('d/m/Y', strtotime(str_replace('-', '/', $dt->entry_date))).'</td>';
					    echo '<td>' . $dt->sector_name . '</td>';
					    echo '<td>';
					    if ($dt->status > 0) {
						if ($_SESSION['user_type'] == 'U') {
						    echo 'Forwaded to 1st Approver';
						} elseif ($_SESSION['user_type'] == 'P') {
						    echo 'Forwaded to 2nd Approver';
						} elseif ($_SESSION['user_type'] == 'V') {
						    echo 'Forwaded';
						}
					    } else {
						echo '';
					    }
					    echo '</td>';
					    echo '<td><a href="approve_details/' . $dt->ardb_id . '/' . $memo_no . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg"></i></a></td>';
					    echo '</tr>';
					    $i++;
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