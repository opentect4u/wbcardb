<?php
$approve_details = json_decode($approve_details);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DC Details <small>Other Than SHG</small></h4><hr>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Memo No</th>
                                        <!--<th>Memo Date</th>-->
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
//                                        echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->entry_date))) . '</td>';
					echo '<td>' . $dt->sector_name . '</td>';
					echo '<td>';
					if ($dt->status > 0) {
					    if ($_SESSION['user_type'] == 'U') {
						echo 'Forwaded to 1st Approver';
					    } elseif ($_SESSION['user_type'] == 'P') {
						echo 'Forwaded to 2nd Approver';
					    } elseif ($_SESSION['user_type'] == 'V') {
						echo 'Forwaded to WBSCARDB';
					    }
					} else {
					    echo '';
					}
					echo '</td>';
					echo '<td><a href="approve_details/' . $memo_no . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg"></i></a></td>';
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
    <!-- content-wrapper ends -->