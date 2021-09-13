<?php
$demand_details = json_decode($demand_details);
$sector_list = unserialize(REPORT_TYPE);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnight</b> <small>Demand View<a href="<?php echo site_url('fortnight/demand_entry/' . $ardb_id . '?id=0'); ?>" class="btn btn-primary bttn-ad" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>From The Year</th>
                                        <th>To The Year</th>
                                        <th>Sector</th>
                                        <th>Total Demand</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($demand_details) {
                                        $i = 1;
                                        foreach ($demand_details as $dt) {
//                                            $status = $dt->fwd_data == 'Y' ? 'Forwaded To 1st Approver' : ($dt->fwd_data == 'R' ? 'Rejected' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->entry_date))) . '</td>';
                                            echo '<td>' . $dt->frm_fn_year . '</td>';
                                            echo '<td>' . $dt->to_fn_year . '</td>';
                                            echo '<td>' . $sector_list[$dt->sector_id] . '</td>';
                                            echo '<td>' . $dt->tot_dmd . '</td>';
//                                            echo '<td>' . $status . '</td>';
                                            echo '<td><a href="demand_entry/' . $dt->ardb_id . '?id=' . $dt->id . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
//                                            if ($dt->fwd_data != 'Y') {
                                            echo '<a href="delete/' . $dt->ardb_id . '?id=' . $dt->id . '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
//                                            }
                                            echo '</td>';
//                                            if ($dt->fwd_data != 'Y') {
//                                                echo '<td><a href="forward/' . $dt->ardb_id . '?dt=' . $dt->return_dt . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-right fa-2x" style="color:green;"></i></a></td>';
//                                            } else {
//                                                echo '<td></td>';
//                                            }
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

