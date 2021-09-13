<?php $friday_details = json_decode($friday_details); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/self_doc_verify/view/'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Friday Return</b> <small></small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Total Deposit Mobilised</th>
                                        <th>Total Deployment of Fund</th>
                                        <th>Forward Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($friday_details) {
                                        $i = 1;
                                        foreach ($friday_details as $dt) {
                                            $status = $dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'P' ? 'Forwaded To 2st Approver' : ($dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'V' ? 'Forwaded To WEBSCARDB' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->week_dt))) . '</td>';
                                            echo '<td>' . $dt->total_dep_mob . '</td>';
                                            echo '<td>' . $dt->total_fund_deploy . '</td>';
                                            echo '<td>' . $status . '</td>';
                                            echo '<td><a href="view_details/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>';

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