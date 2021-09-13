<?php $report_details = json_decode($report_details); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/self_doc_verify/view/'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnight</b> <small>Demand & Recovery View</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Return Form</th>
                                        <th>Return To</th>
                                        <th>Forward Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($report_details) {
                                        $i = 1;
                                        foreach ($report_details as $dt) {
                                            $status = $dt->fwd_status > 0 && $_SESSION['user_type'] == 'P' ? 'Forwaded To 2st Approver' : ($dt->fwd_status > 0 && $_SESSION['user_type'] == 'V' ? 'Forwaded To WEBSCARDB' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_form))) . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_to))) . '</td>';
                                            echo '<td>' . $status . '</td>';
                                            echo '<td><a href="report_view_details/' . $dt->ardb_id . '?frm_dt=' . $dt->return_form . '&to_dt=' . $dt->return_to . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>';
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
