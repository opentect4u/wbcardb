<?php
$shg_details = json_decode($shg_details);
$memo_header = json_decode($memo_header);
$borrower_details = json_decode($borrower_details);
$gt_details = json_decode($gt_details);
$details = json_decode($details);
$approve_details = json_decode($approve_details);
// echo '<pre>'; var_dump($shg_details);exit;
?>
<style type="text/css">
    .table, .table_thead, .table_body{
        border: 1px solid #c8c8c8;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 pt-5">
                                <div class="table-responsive">
                                    <table width="80%">
                                        <tr>
                                            <td>Memo No :-</td>
                                            <td class="pull-left"><?= $memo_header[0]->memo_no ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sector :-</td>
                                            <td class="pull-left"><b>SHG</b></td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount of Requisition :-</td>
                                            <td class="pull-left"><?= $memo_header[0]->tot_amt ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total No. of Pronote :-</td>
                                            <td class="pull-left"><?= $memo_header[0]->tot_pronote ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="button" id="submit" class="btn btn-info pull-right" value="Download Files" onclick="download()" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pt-5">
                                <center><h4>Loan Requisition Cum Disbursement Certificate For Self Sanction Cases(Only for Selp Help Group/s)</h4></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="table_thead">Pronote No</th>
                                                <th class="table_thead">Pronote Date</th>
                                                <th class="table_thead">Name of SHG/s</th>
                                                <th class="table_thead">Total Member</th>
                                                <th class="table_thead">Address of the SHG</th>
                                                <th class="table_thead">Block</th>
                                                <th class="table_thead">Purpose</th>
                                                <th class="table_thead">Mor.</th>
                                                <th class="table_thead">Repay.</th>
                                                <th class="table_thead">Rate of Interest(%)</th>
                                                <th class="table_thead">BOD Sanction Date</th>
                                                <th class="table_thead">Due Date</th>
                                                <th class="table_thead">Borrower <br>Sl. No./s in <br>the BOD <br>Sanction</th>
                                                <th class="table_thead">Project Cost (Rs.)</th>
                                                <th class="table_thead">Amount Sanctioned(Rs.)</th>
                                                <th class="table_thead">Total Own Contribution (Rs.)</th>
                                                <th class="table_thead">Corpus Fund (Rs.)</th>
                                                <th class="table_thead">Amount Disbursed (Rs)</th>
                                                <th class="table_thead">Intersee Agreement Date</th>
                                                <th class="table_thead">Total Intersee Ag. Bond</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $total_pro = $i;
                                            $total_memb = 0;
                                            $tot_proj_cost = 0;
                                            $tot_sanc_amt = 0;
                                            $tot_own_amt = 0;
                                            $tot_disb_amt = 0;
                                            $tot_corp_fnd = 0;
                                            $total_Intr_ag_bond = $shg_details[0]->total_Intr_ag_bond;
                                            $pronote = $shg_details[0]->pronote_no;
                                            foreach ($shg_details as $dt) {
                                                if ($pronote != $dt->pronote_no) {
                                                    $pronote = $dt->pronote_no;
                                                    $total_Intr_ag_bond += $dt->total_Intr_ag_bond;
                                                    $i++;
                                                    $total_pro = $i;
                                                }
                                                $total_memb += $dt->tot_memb;
                                                $tot_proj_cost += $dt->project_cost;
                                                $tot_sanc_amt += $dt->sanc_amt;
                                                $tot_own_amt += $dt->tot_own_amt;
                                                $tot_disb_amt += $dt->disb_amt;
                                                // $total_Intr_ag_bond += $dt->total_Intr_ag_bond;
                                                $pr_no = $dt->pronote_no;
                                                $tot_corp_fnd += $dt->corp_fnd;
                                                echo '<tr>';
                                                // echo 'Before-> ' . $pr_no . ' ' . $details->$pr_no->print . '<br>';
                                                if ($details->$pr_no->print == 'no') {
                                                    echo '<td class="table_body" rowspan="' . $details->$pr_no->rowspan . '">' . $dt->pronote_no . '</td>';
                                                    $details->$pr_no->print = 'yes';
                                                }
                                                // echo 'After-> ' . $pr_no . ' ' . $details->$pr_no->print . '<br>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->pronote_date))) . '</td>';
                                                echo '<td class="table_body">' . $dt->shg_name . '</td>';
                                                echo '<td class="table_body">' . $dt->tot_memb . '</td>';
                                                echo '<td class="table_body">' . $dt->shg_addr . '</td>';
                                                echo '<td class="table_body">' . $dt->block_name . '</td>';
                                                echo '<td class="table_body">' . $dt->purpose_name . '</td>';
                                                echo '<td class="table_body">' . $dt->moratorium_period . '</td>';
                                                echo '<td class="table_body">' . $dt->repayment_no . '</td>';
                                                echo '<td class="table_body">' . $dt->roi . '</td>';
                                                echo '<td class="table_body">' . $dt->bod_sanc_dt . '</td>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->due_dt))) . '</td>';
                                                echo '<td class="table_body">' . $dt->brrwr_sl_no . '</td>';
                                                echo '<td class="table_body">' . $dt->project_cost . '</td>';
                                                echo '<td class="table_body">' . $dt->sanc_amt . '</td>';
                                                echo '<td class="table_body">' . $dt->tot_own_amt . '</td>';
                                                echo '<td class="table_body">' . $dt->corp_fnd . '</td>';
                                                echo '<td class="table_body">' . $dt->disb_amt . '</td>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->intr_aggr_dt))) . '</td>';
                                                echo '<td class="table_body">' . $dt->total_Intr_ag_bond . '</td>';
                                                echo '</tr>';
                                            }
                                            // exit;
                                            echo '<tr>';
                                            echo '<td class="table_body"><b>Pronote Total</b></td>';
                                            echo '<td colspan="2" class="table_body"><b>' . $total_pro . '</b></td>';
                                            echo '<td class="table_body"><b>' . $total_memb . '</b></td>';
                                            echo '<td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td>';
                                            echo '<td class="table_body"><b>' . $tot_proj_cost . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_sanc_amt . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_own_amt . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_corp_fnd . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_disb_amt . '</b></td>';
                                            echo '<td class="table_body"></td>';
                                            echo '<td class="table_body"><b>' . $total_Intr_ag_bond . '</b></td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pt-5">
                                <center><h4>Pronote Wise Grand Total</h4></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td class="table_thead" class="table_thead">Pronote No</td>
                                                <td class="table_thead" class="table_thead">Pronote Date</td>
                                                <td class="table_thead" class="table_thead">Total Member</td>
                                                <td class="table_thead" class="table_thead">Total Project Cost</td>
                                                <td class="table_thead" class="table_thead">Total Sanction Cost</td>
                                                <th class="table_thead" class="table_thead">Total Own Contribution (Rs.)</th>
                                                <th class="table_thead" class="table_thead">Total Amount Disbursed (Rs)</th>
                                                <th class="table_thead" class="table_thead">Intersee Agreement Date</th>
                                                <!-- <th class="table_thead" class="table_thead">Total Intersee Ag. Bond</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($gt_details as $gt) {
                                                echo '<tr>';
                                                echo '<td class="table_body" class="table_body">' . $gt->pronote_no . '</td>';
                                                echo '<td class="table_body" class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $gt->pronote_date))) . '</td>';
                                                echo '<td class="table_body" class="table_body">' . $gt->tot_memb . '</td>';
                                                echo '<td class="table_body" class="table_body">' . $gt->tot_p_cost . '</td>';
                                                echo '<td class="table_body" class="table_body">' . $gt->tot_sanc_amt . '</td>';
                                                echo '<td class="table_body" class="table_body">' . $gt->tot_own_amt . '</td>';
                                                echo '<td class="table_body" class="table_body">' . $gt->tot_disb_amt . '</td>';
                                                echo '<td class="table_body" class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $gt->intr_aggr_dt))) . '</td>';
                                                // echo '<td class="table_body" class="table_body">'.$gt->tot_igb.'</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pt-5">
                                <center><h4>Borrower Classification</h4></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td class="table_thead">Pronote No</td>
                                                <td class="table_thead">Total SHG</td>
                                                <td class="table_thead">Total Member</td>
                                                <td class="table_thead">Men</td>
                                                <td class="table_thead">Women</td>
                                                <td class="table_thead">SC</td>
                                                <td class="table_thead">ST</td>
                                                <td class="table_thead">OBC A</td>
                                                <td class="table_thead">OBC B</td>
                                                <td class="table_thead">Gen</td>
                                                <td class="table_thead">Oth.</td>
                                                <td class="table_thead">Total</td>
                                                <td class="table_thead">Big</td>
                                                <td class="table_thead">Marginal</td>
                                                <td class="table_thead">Small</td>
                                                <td class="table_thead">Landless</td>
                                                <td class="table_thead">LIG</td>
                                                <td class="table_thead">MIG</td>
                                                <td class="table_thead">HIG</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($borrower_details as $b) {
                                                echo '<tr>';
                                                echo '<td class="table_body">' . $b->pronote_no . '</td>';
                                                echo '<td class="table_body">' . $b->total_shg . '</td>';
                                                echo '<td class="table_body">' . $b->tot_memb . '</td>';
                                                echo '<td class="table_body">' . $b->tot_male . '</td>';
                                                echo '<td class="table_body">' . $b->tot_female . '</td>';
                                                echo '<td class="table_body">' . $b->tot_sc . '</td>';
                                                echo '<td class="table_body">' . $b->tot_st . '</td>';
                                                echo '<td class="table_body">' . $b->tot_obca . '</td>';
                                                echo '<td class="table_body">' . $b->tot_obcb . '</td>';
                                                echo '<td class="table_body">' . $b->tot_gen . '</td>';
                                                echo '<td class="table_body">' . $b->tot_other . '</td>';
                                                echo '<td class="table_body">' . $b->tot_count . '</td>';
                                                echo '<td class="table_body">' . $b->tot_big . '</td>';
                                                echo '<td class="table_body">' . $b->tot_marginal . '</td>';
                                                echo '<td class="table_body">' . $b->tot_small . '</td>';
                                                echo '<td class="table_body">' . $b->tot_landless . '</td>';
                                                echo '<td class="table_body">' . $b->tot_lig . '</td>';
                                                echo '<td class="table_body">' . $b->tot_mig . '</td>';
                                                echo '<td class="table_body">' . $b->tot_hig . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($approve_details[0]->status > 0) {

                        } else {
                            ?>
                            <div class="col-md-12 pt-5">
                                <div class="form-group row bttn-align">
                                    <?php if ($_SESSION['user_type'] != 'U') { ?>
                                        <div class="col-md-2">
                                            <input type="button" id="submit" class="btn btn-danger" value="Reject" onclick="reject()" />
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-2">
                                        <input type="button" id="submit" class="btn btn-info pull-left" value="Forward" <?= $_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'U' ? 'onclick="submit()"' : ($_SESSION['user_type'] == 'V' ? 'onclick="forward()"' : '') ?> />
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <script>
        function submit() {
            window.location.href = "<?= site_url('ho/dc/forward_data/' . $memo_header[0]->ardb_id . '/' . $memo_no); ?>";
        }
        function forward() {
            var x = confirm("Are you sure you want to forward to APEX Bank?");
            if (x)
                window.location.href = "<?= site_url('ho/dc/forward_to_apex/' . $memo_header[0]->ardb_id . '/' . $memo_no); ?>";
            else
                return false;
        }
        function reject() {
            window.location.href = "<?= site_url('ho/dc/reject_data/' . $memo_header[0]->ardb_id . '/' . $memo_no); ?>";
        }
        function download() {
            window.location.href = "<?= site_url('ho/dc/download_zip/' . $memo_header[0]->ardb_id . '/' . $memo_no); ?>";
        }
    </script>