<?php $friday_details = json_decode($friday_details); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/self_doc_verify/view/'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Friday Return</b> <small><a href="<?php echo site_url('friday_return/entry/' . $ardb_id . '?dt=0'); ?>" class="btn btn-primary bttn-ad" style="width: 100px;">Add</a></small>
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
                                        <th>Action</th>
                                        <th>Forward</th>
                                        <!--<th>Forward To<br>1st Approver</th>-->
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($friday_details) {
                                        $i = 1;
                                        foreach ($friday_details as $dt) {
                                            $status = $dt->fwd_data == 'Y' ? 'Forwaded To 1st Approver' : ($dt->fwd_data == 'R' ? 'Rejected' : '');
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->week_dt))) . '</td>';
                                            echo '<td>' . $dt->total_dep_mob . '</td>';
                                            echo '<td>' . $dt->total_fund_deploy . '</td>';
//                                            echo '<td>' . $status . '</td>';
                                            echo '<td><a href="friday_return/entry/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
                                            if ($dt->fwd_data != 'Y') {
                                                echo '<a href="friday_return/delete/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
                                            }
                                            echo '</td>';
                                            if ($dt->fwd_data != 'Y') {
                                                echo '<td><a href="friday_return/forward/' . $dt->ardb_id . '?dt=' . $dt->week_dt . '" data-toggle="tooltip" data-placement="bottom" title="Forward"><i class="fa fa-arrow-circle-right fa-2x" style="color:green;"></i></a></td>';
                                            } else {
                                                echo '<td>Forwaded To 1st Approver</td>';
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