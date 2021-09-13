<?php
$fortnight_details = json_decode($fortnight_details);
//var_dump($fortnight_details);
//exit;
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnight</b> <small>Loan Issue View <?= $_SESSION['user_type'] == 'U' ? '<a href="' . site_url('fortnight/investment_entry/' . $ardb_id . '?fr=0&to=0') . '" class="btn btn-primary bttn-ad" style="width: 100px;">Add</a>' : '' ?></small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
<!--                                        <th>Number of Account Closed</th>
                                        <th>Progressive No. of  Browwing Members</th>-->
                                        <th>Total Investment No of Cases</th>
                                        <th>Total Investment Amount</th>
                                        <?php if ($_SESSION['user_type'] == 'U') { ?>
                                            <th>Action</th>
                                            <th>Forward</th>
                                            <?php
                                        } else {
                                            echo '<th>Forward Status</th><th>Action</th>';
                                        }
                                        ?>
                <!--<th>Forward To<br>1st Approver</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($fortnight_details) {
                                        $i = 1;
                                        foreach ($fortnight_details as $dt) {
//                                            $status = $dt->fwd_data == 'Y' ? 'Forwaded To 1st Approver' : ($dt->fwd_data == 'R' ? 'Rejected' : '');
                                            $status = $_SESSION['user_type'] == 'P' && $dt->approve_1 == 'Y' ? 'Forwaded to 2nd Approver' : ($_SESSION['user_type'] == 'V' && $dt->approve_2 == 'Y' ? 'Forwaded to WBSCARDB' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_form))) . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_to))) . '</td>';
//                                            echo '<td>' . $dt->ac_closed . '</td>';
//                                            echo '<td>' . $dt->pro_bro_mem . '</td>';
                                            echo '<td>' . $dt->tot_inv_of_curr_yr_no_case . '</td>';
                                            echo '<td>' . $dt->tot_inv_of_curr_yr_amt . '</td>';
//                                            echo '<td>' . $status . '</td>';
                                            if ($_SESSION['user_type'] == 'U') {
                                                echo '<td><a href="investment_entry/' . $dt->ardb_id . '?fr=' . $dt->return_form . '&to=' . $dt->return_to . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
                                                if ($dt->fwd_data != 'Y') {
                                                    echo '<a href="delete/' . $dt->ardb_id . '?dt=' . $dt->return_form . '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
                                                }
                                                echo '</td>';
                                                if ($dt->fwd_data != 'Y') {
                                                    echo '<td><a href="forward/' . $dt->ardb_id . '?fr=' . $dt->return_form . '&to=' . $dt->return_to . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-right fa-2x" style="color:green;"></i></a></td>';
                                                } else {
                                                    echo '<td>Forwaded to 1st Approver</td>';
                                                }
                                            } else {
                                                echo '<td>' . $status . '</td>';
                                                echo '<td><a href="view_details/' . $dt->ardb_id . '?fr=' . $dt->return_form . '&to=' . $dt->return_to . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>';
                                            }
                                            echo '</tr>';
                                            $i++;
                                        }
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