<?php
$friday_details = json_decode($friday_details);
$selected = json_decode($selected);
$ardb_list = json_decode($ardb_list);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/friday_return'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Friday Return</b> <small>View</small>
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
                    <h4 class="card-title"> <b>Friday Return</b> <small>Details</small>
                        <span class="confirm-div" style="float:right;"></span></h4> <hr>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <!--<th>Name of ARDB</th>-->
                                            <th>Total Deposit<br>Mobilised</th>
                                            <th>Total Deployment<br>of Fund</th>
    <!--                                            <th>Required SLR</th>
                                            <th>IBSD as End<br>of Fin Year</th>
                                            <th>Total</th>
                                            <th>Total/Shortfall</th>-->
                                            <?php if ($_SESSION['user_type'] == 'U') { ?>
                                                <th>Action</th>
                                                <th>Forward</th>
                                            <?php } elseif ($_SESSION['user_type'] == 'P') { ?>
                                                <th>Forward Status</th>
                                                <th>Action</th>
                                            <?php } ?>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($friday_details) {
                                            $i = 1;
                                            foreach ($friday_details as $dt) {
//                                                $r = 0;
//                                                $t = 0;
//                                                $ts = 0;
//                                                $r = ($dt->total_dep_mob - $dt->ibsd) / 3;
//                                                $t = $r + $dt->ibsd;
//                                                $ts = $t - $dt->wbcardb_remit_slr;
                                                $status = $dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'U' ? 'Forwaded To 1st Approver' : ($dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'P' ? 'Forwaded To 2st Approver' : ($dt->fwd_data == 'Y' && $_SESSION['user_type'] == 'P' ? 'Forwaded To WBSCARDB' : ($dt->fwd_data == 'R' ? 'Rejected' : '')));
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->week_dt))) . '</td>';
//                                                echo '<td>' . $dt->name . '</td>';
                                                echo '<td>' . $dt->total_dep_mob . '</td>';
                                                echo '<td>' . $dt->total_fund_deploy . '</td>';
//                                                echo '<td>' . $r . '</td>';
//                                                echo '<td>' . $dt->ibsd . '</td>';
//                                                echo '<td>' . $t . '</td>';
//                                                echo '<td>' . $ts . '</td>';
//                                                echo '<td>' . $status . '</td>';
                                                if ($_SESSION['user_type'] == 'U') {
                                                    echo '<td><a href="friday_return/entry/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
                                                    if ($dt->fwd_data != 'Y') {
                                                        echo '<a href="friday_return/delete/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
                                                    }
                                                    echo '</td>';
                                                    if ($dt->fwd_data != 'Y') {
                                                        echo '<td><a href="friday_return/forward/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-right fa-2x" style="color:green;"></i></a></td>';
                                                    } else {
                                                        echo '<td>' . $status . '</td>';
                                                    }
                                                } else {
                                                    echo '<td>' . $status . '</td>';
                                                    echo '<td><a href="friday_return/view_details/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>';
                                                }
//                                                if ($_SESSION['user_type'] == 'U') {
//                                                    echo '<td><a href="friday_return/entry/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
//                                                } elseif ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'P') {
//                                                    echo '<td><a href="friday_return/view_details/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>';
//                                                }
//                                                echo '</td>';
//                                                if ($dt->fwd_data != 'Y' && $_SESSION['user_type'] == 'P') {
//                                                    echo '<td><a href="friday_return/forward/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-right fa-2x" style="color:green;"></i></a></td>';
//                                                    echo '<td><a href="friday_return/reject/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-left fa-2x" style="color:red;"></i></a></td>';
//                                                } elseif ($_SESSION['user_type'] == 'P') {
//                                                    echo '<td></td>';
//                                                    echo '<td></td>';
//                                                }
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