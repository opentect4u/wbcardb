<?php
$report_details = json_decode($report_details);
$ardb_list = json_decode($ardb_list);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/fortnight/approve_report_view'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnight</b> <small>Report View</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
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
                    <div class="col-md-4">
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
                    <h4 class="card-title"> <b>Fortnight</b> <small>Report View</small>
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
    <?php } ?>
    <!-- content-wrapper ends -->
