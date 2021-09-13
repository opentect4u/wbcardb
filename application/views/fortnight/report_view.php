<?php
$report_details = json_decode($report_details);
$report_type = unserialize(REPORT_TYPE);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/self_doc_verify/view/'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnight</b> <small>DR<?= $_SESSION['user_type'] == 'U' ? '<a href="' . site_url('fortnight/report_entry/' . $ardb_id . '?frm_dt=0&to_dt=0&sec_id=0') . '" class="btn btn-primary bttn-ad" style="width: 100px;">Add</a>' : '' ?></small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date Form</th>
                                        <th>Date To</th>
                                        <th>Sector</th>
                                        <th>Total Collection</th>
                                        <!--<th>% Of Collection</th>-->
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($report_details) {
                                        $i = 1;
                                        foreach ($report_details as $dt) {
                                            $status = $dt->fwd_data == 'Y' ? 'Forwaded To 1st Approver' : ($dt->fwd_data == 'R' ? 'Rejected' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_form))) . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_to))) . '</td>';
                                            echo '<td>' . $report_type[$dt->sector_id] . '</td>';
                                            echo '<td>' . $dt->tot_colc . '</td>';
//					    echo '<td>' . $dt->col_per . '</td>';
//                                            echo '<td>' . $status . '</td>';
                                            if ($_SESSION['user_type'] == 'U') {
                                                echo '<td><a href="report_entry/' . $dt->ardb_id . '?frm_dt=' . $dt->return_form . '&to_dt=' . $dt->return_to . '&sec_id=' . $dt->sector_id . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
                                                if ($dt->fwd_data != 'Y') {
                                                    echo '<a href="delete/' . $dt->ardb_id . '?frm_dt=' . $dt->return_form . '&to_dt=' . $dt->return_to . '&sec_id=' . $dt->sector_id . '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
                                                }
                                                echo '</td>';
                                                if ($dt->fwd_data != 'Y') {
                                                    echo '<td><a href="report_forward/' . $dt->ardb_id . '?frm_dt=' . $dt->return_form . '&to_dt=' . $dt->return_to . '&sec_id=' . $dt->sector_id . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-right fa-2x" style="color:green;"></i></a></td>';
                                                } else {
                                                    echo '<td>' . $status . '</td>';
                                                }
                                            } else {
                                                echo '<td>' . $status . '</td>';
                                                echo '<td><a href="report_view_details/' . $dt->ardb_id . '?dt=' . $dt->return_dt . '&sec_id=' . $dt->sector_id . '" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a></td>';
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