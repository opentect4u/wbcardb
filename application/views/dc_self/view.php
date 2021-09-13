<?php
$shg_details = json_decode($shg_details);
// var_dump($shg_details);exit;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DC View <small>Other Than SHG</small> <small><a href="<?php echo site_url("dc_self/dc_entry/0/0"); ?>" class="btn btn-primary bttn-ad" style="width: 100px;">Add</a></small>
                    <!-- <span class="confirm-div" style="float:right;"><?php //echo $this->session->flashdata('msg');         ?></span> -->
                </h4> <hr>
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
                                        <!-- <th>Download<br> Document</th> -->
                                        <!-- <th>Forward Data</th> -->
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
				    <?php
				    foreach ($shg_details as $dt) {
					$tr_color = $dt->fwd_data == 'R' ? 'style="background:#ff000069;"' : '';
					$pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->pronote_no);
					$memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
					echo '<tr ' . $tr_color . '>';
					echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->memo_date))) . '</td>';
					echo '<td>' . $dt->memo_no . '</td>';
					echo '<td>' . $dt->sector_name . '</td>';
					echo '<td>' . $dt->pronote_no . '</td>';
					echo '<td>' . $dt->purpose . '</td>';
					echo '<td>
                                        <a href="dc_self/dc_entry/' . $pronote_no . '/' . $memo_no . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
					if ($dt->fwd_data == 'N' || $dt->fwd_data == 'R' || $dt->fwd_data == 'A') {
					    echo '<a href="dc_self/dc_delete/' . $pronote_no . '/' . $memo_no . '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
					}
					echo '</td>';
//                                  if($dt->upload > 0){
					// echo '<td>
					//     <a href="dc_self/download_zip/'.$ardb_id.'/'.$pronote_no.'" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="fa fa-download fa-lg"></i></a>
					//     </td>';
					//     if($dt->fwd_data == 'N'){
					// echo '<td>
					//   <a href="dc_self/forward_data/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Forward Data"><i class="fa fa-forward fa-lg"></i></a>
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