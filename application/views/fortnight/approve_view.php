<?php $fortnight_details = json_decode($fortnight_details); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnight</b> <small>Investment View</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Return Date</th>
                                        <th>Number of Account Closed</th>
                                        <th>Progressive No. of  Browwing Members</th>
                                        <th>Total Investment No of Cases</th>
                                        <th>Total Investment Amount</th>
                                        <th>Forward Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($fortnight_details) {
                                        $i = 1;
                                        foreach ($fortnight_details as $dt) {
                                            $status = $dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'P' ? 'Forwaded To 2st Approver' : ($dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'V' ? 'Forwaded To WEBSCARDB' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_dt))) . '</td>';
                                            echo '<td>' . $dt->no_acc_closed . '</td>';
                                            echo '<td>' . $dt->prog_brro_memb . '</td>';
                                            echo '<td>' . $dt->tot_inv_case_no . '</td>';
                                            echo '<td>' . $dt->tot_inv_amt . '</td>';
                                            echo '<td>' . $status . '</td>';
                                            echo '<td><a href="view_details/' . $dt->ardb_id . '?dt=' . $dt->return_dt . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>';

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