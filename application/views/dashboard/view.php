<?php
$details = json_decode($details);
//var_dump($details);
//exit;
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b><?= $title ?></b>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Memo Number</th>
                                        <th>USER</th>
                                        <th>Approver L1</th>
                                        <th>Approver L2</th>
                                    </tr>
                                </thead>
                                <tbody>
				    <?php
				    $i = 1;
				    $user_id = $_SESSION['user_type'];
				    foreach ($details as $dt) {
					$memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
					if ($user_id == 'U') {
					    if ($flag == 1) {
						$url = 'dc/approve_details/' . $memo_no;
					    } elseif ($flag == 2) {
						$url = 'dc_self/approve_details/' . $memo_no;
					    } elseif ($flag == 3) {
						$url = 'apex_shg/approve_details/' . $memo_no;
					    } elseif ($flag == 4) {
						$url = 'apex_self/approve_details/' . $memo_no;
					    }
					} elseif ($user_id == 'P' || $user_id == 'V') {
					    if ($flag == 1) {
						$url = 'dc/approve_details/' . $memo_no;
					    } elseif ($flag == 2) {
						$url = 'dc_self/approve_details/' . $memo_no;
					    } elseif ($flag == 3) {
						$url = 'apex_shg/approve_details/' . $memo_no;
					    } elseif ($flag == 4) {
						$url = 'apex_self/approve_details/' . $memo_no;
					    }
					}
					$dis_link = $dt->fwd_data == 'Y' && $user_id == 'U' || $dt->approve_1 == 'Y' && $user_id == 'P' || $dt->approve_2 == 'Y' && $user_id == 'V' ? 'onclick="return false;"' : '';
//                                        $fwd_dis_link = $dt->ho_fwd_data == 'Y' ? 'onclick="return false;"' : '';
//                                        $a1_dis_link = $dt->ho_approve_1 == 'Y' ? 'onclick="return false;"' : '';
//                                        $a2_dis_link = $dt->ho_approve_2 == 'Y' ? 'onclick="return false;"' : '';
					echo '<tr>';
					echo '<td>' . $i . '</td>';
					echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->entry_date))) . '</td>';
					if ($dt->fwd_data != 'Y' && $user_id == 'P') {
					    echo '<td>' . $dt->memo_no . '</td>';
					} elseif ($dt->approve_1 != 'Y' && $user_id == 'V' || $dt->fwd_data != 'Y' && $dt->approve_1 != 'Y' && $user_id == 'V') {
					    echo '<td>' . $dt->memo_no . '</td>';
					} else {
					    echo '<td><a href="' . base_url('index.php/' . $url) . '" ' . $dis_link . '>' . $dt->memo_no . '</a></td>';
					}
					echo $dt->fwd_data != 'Y' ? '<td><i class="fa fa-times" style="color:red;font-size: 20px;"></i></td>' : '<td><i class="fa fa-check" style="color:green;font-size: 20px;"></i></td>';
					echo $dt->approve_1 != 'Y' ? '<td><i class="fa fa-times" style="color:red;font-size: 20px;"></i></td>' : '<td><i class="fa fa-check" style="color:green;font-size: 20px;"></i></td>';
					echo $dt->approve_2 != 'Y' ? '<td><i class="fa fa-times" style="color:red;font-size: 20px;"></i></td>' : '<td><i class="fa fa-check" style="color:green;font-size: 20px;"></i></td>';
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

