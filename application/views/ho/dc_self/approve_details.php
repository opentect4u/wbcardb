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
                            <div class="col-md-7">
                                <div class="table-responsive">
                                    <table width="80%">
                                        <tr>
                                            <td>Memo No :-</td>
                                            <td class="pull-left"><?= $memo_header[0]->memo_no ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sector :-</td>
                                            <td class="pull-left"><b><?= $memo_header[0]->sector_name ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount of Requisition :-</td>
                                            <td class="pull-left"></td>
                                        </tr>
                                        <tr>
                                            <td>Total No. of Pronote :-</td>
                                            <td class="pull-left"><?= $memo_header[0]->tot_pronote ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
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
                                                <th class="table_thead">Purpose</th>
                                                <th class="table_thead">Mor.</th>
                                                <th class="table_thead">Repay.</th>
                                                <th class="table_thead">BOD Sanction Date</th>
                                                <th class="table_thead">Due Date</th>
                                                <th class="table_thead">Borrower<br> SL. No.</th>
                                                <th class="table_thead">Rate of <br>Interest <br>(%)</th>
                                                <th class="table_thead">Project Cost</th>
                                                <th class="table_thead">Sanction Block</th>
                                                <th class="table_thead">Sanction Working</th>
                                                <th class="table_thead">Sanction Total</th>
                                                <th class="table_thead">Disbursement Block</th>
                                                <th class="table_thead">Disbursement<br>Working</th>
                                                <th class="table_thead">Disbursement<br>Total</th>
                                                <th class="table_thead">Total Own <br>Contribution <br>(Rs.)</th>
                                                <th class="table_thead">Subsidy<br>Received<br>(If Any)</th>
                                                <th class="table_thead">Subsidy<br>Receivable<br>(If Any)</th>
                                                <th class="table_thead">Total Loan<br>Amount<br>(Rs.)</th>
                                                <th class="table_thead">Total Land<br>offered for<br>Mortgage</th>
                                                <th class="table_thead">Total Area<br>for cultivation<br>(Acre)</th>
                                                <th class="table_thead">Security Land<br>Value<br>(Rs.)</th>
                                                <th class="table_thead">Security Other<br>Value<br>(Rs.)</th>
                                                <th class="table_thead">Security Total<br>Value<br>(Rs.)</th>
                                                <th class="table_thead">Income<br>Generated<br>out of Loan</th>
                                                <th class="table_thead">Total<br>Mortgage<br>Bond</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $total_pro = $i;
                                            $total_memb = 0;
                                            $tot_proj_cost = 0;
                                            $tot_dis_working = 0;
                                            $tot_dis_total = 0;
                                            $own_cont = 0;
                                            $sub_received = 0;
                                            $sub_receivable = 0;
                                            $tot_loan_amt = 0;
                                            $lof_mort = 0;
                                            $af_culti = 0;
                                            $sec_land = 0;
                                            $sec_oth = 0;
                                            $sec_tot = 0;
                                            $igo_loan = 0;
                                            $tot_mordg_bond = 0;
                                            $pronote = $shg_details[0]->pronote_no;
                                            foreach ($shg_details as $dt) {
                                                if ($pronote != $dt->pronote_no) {
                                                    $pronote = $dt->pronote_no;
                                                    $i++;
                                                    $total_pro = $i;
                                                }
                                                $tot_proj_cost += $dt->project_cost;
                                                $tot_dis_working += $dt->dis_working;
                                                $tot_dis_total += $dt->dis_total;
                                                $own_cont += $dt->own_cont;
                                                $sub_received += $dt->sub_received;
                                                $sub_receivable += $dt->sub_receivable;
                                                $tot_loan_amt += $dt->tot_loan_amt;
                                                $lof_mort += $dt->lof_mort;
                                                $af_culti += $dt->af_culti;
                                                $sec_land += $dt->sec_land;
                                                $sec_oth += $dt->sec_oth;
                                                $sec_tot += $dt->sec_tot;
                                                $igo_loan += $dt->igo_loan;
                                                $tot_mordg_bond += $dt->tot_mordg_bond;


                                                echo '<tr>';
												$pr_no = $dt->pronote_no;
												if ($details->$pr_no->print == 'no') {
						    						echo '<td class="table_body" rowspan="' . $details->$pr_no->rowspan . '">' . $dt->pronote_no . '</td>';
						    						$details->$pr_no->print = 'yes';
												}
                                                //echo '<td class="table_body">' . $dt->pronote_no . '</td>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->pronote_date))) . '</td>';
                                                echo '<td class="table_body">' . $dt->purpose_name . '</td>';
                                                echo '<td class="table_body">' . $dt->moratorium_period . '</td>';
                                                echo '<td class="table_body">' . $dt->repayment_no . '</td>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->bod_sanc_dt))) . '</td>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->due_dt))) . '</td>';
                                                echo '<td class="table_body">' . $dt->brrwr_sl_no . '</td>';
                                                echo '<td class="table_body">' . $dt->roi . '</td>';
                                                echo '<td class="table_body">' . $dt->project_cost . '</td>';
                                                echo '<td class="table_body">' . $dt->sanc_block_id . '</td>';
                                                echo '<td class="table_body">' . $dt->sanc_working . '</td>';
                                                echo '<td class="table_body">' . $dt->sanc_total . '</td>';
                                                echo '<td class="table_body">' . $dt->dis_block_id . '</td>';
                                                echo '<td class="table_body">' . $dt->dis_working . '</td>';
                                                echo '<td class="table_body">' . $dt->dis_total . '</td>';
                                                echo '<td class="table_body">' . $dt->own_cont . '</td>';
                                                echo '<td class="table_body">' . $dt->sub_received . '</td>';
                                                echo '<td class="table_body">' . $dt->sub_receivable . '</td>';
                                                echo '<td class="table_body">' . $dt->tot_loan_amt . '</td>';
                                                echo '<td class="table_body">' . $dt->lof_mort . '</td>';
                                                echo '<td class="table_body">' . $dt->af_culti . '</td>';
                                                echo '<td class="table_body">' . $dt->sec_land . '</td>';
                                                echo '<td class="table_body">' . $dt->sec_oth . '</td>';
                                                echo '<td class="table_body">' . $dt->sec_tot . '</td>';
                                                echo '<td class="table_body">' . $dt->igo_loan . '</td>';
                                                echo '<td class="table_body">' . $dt->tot_mordg_bond . '</td>';
                                                echo '</tr>';
                                            }
                                            echo '<tr>';
                                            echo '<td class="table_body"><b>Pronote Total</b></td>';
                                            echo '<td class="table_body"><b>' . $total_pro . '</b></td>';
                                            echo '<td class="table_body"><b></b></td>';
                                            echo '<td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td>';
                                            echo '<td class="table_body"><b>' . $tot_proj_cost . '</b></td>';
                                            echo '<td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td>';
                                            echo '<td class="table_body"><b>' . $tot_dis_working . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_dis_total . '</b></td>';
                                            echo '<td class="table_body"><b>' . $own_cont . '</b></td>';
                                            echo '<td class="table_body"><b>' . $sub_received . '</b></td>';
                                            echo '<td class="table_body"><b>' . $sub_receivable . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_loan_amt . '</b></td>';
                                            echo '<td class="table_body"><b>' . $lof_mort . '</b></td>';
                                            echo '<td class="table_body"><b>' . $af_culti . '</b></td>';
                                            echo '<td class="table_body"><b>' . $sec_land . '</b></td>';
                                            echo '<td class="table_body"><b>' . $sec_oth . '</b></td>';
                                            echo '<td class="table_body"><b>' . $sec_tot . '</b></td>';
                                            echo '<td class="table_body"><b>' . $igo_loan . '</b></td>';
                                            echo '<td class="table_body"><b>' . $tot_mordg_bond . '</b></td>';
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
                                                <th class="table_thead">Pronote No</th>
                                                <th class="table_thead">Pronote Date</th>
                                                <th class="table_thead">Total Project Cost</th>
                                                <th class="table_thead">Total Own <br>Contribution <br>(Rs.)</th>
                                                <th class="table_thead">Total Subsidy<br>Received<br>(If Any)</th>
                                                <th class="table_thead">Total Subsidy<br>Receivable<br>(If Any)</th>
                                                <th class="table_thead">Total Loan<br>Amount<br>(Rs.)</th>
                                                <th class="table_thead">Total Land<br>offered for<br>Mortgage</th>
                                                <th class="table_thead">Total Area<br>for cultivation<br>(Acre)</th>
                                                <th class="table_thead">Total Security Land<br>Value<br>(Rs.)</th>
                                                <th class="table_thead">Total Security Other<br>Value<br>(Rs.)</th>
                                                <th class="table_thead">Total Security Total<br>Value<br>(Rs.)</th>
                                                <th class="table_thead">Total Income<br>Generated<br>out of Loan</th>
                                                <th class="table_thead">Total<br>Mortgage<br>Bond</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($gt_details as $gt) {
                                                echo '<tr>';
                                                echo '<td class="table_body">' . $gt->pronote_no . '</td>';
                                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $gt->pronote_date))) . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_p_cost . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_own_cont . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_s_rec . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_s_receivable . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_loan_amt . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_lof_mort . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_af_culti . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_sec_land . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_sec_oth . '</td>';
                                                echo '<td class="table_body">' . $gt->sec_tot . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_igo_loan . '</td>';
                                                echo '<td class="table_body">' . $gt->tot_mordg_bond . '</td>';
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
                                                <th class="table_thead">Pronote No</th>
                                                <th class="table_thead">Total Member</th>
                                                <th class="table_thead">Total Borrower</th>
                                                <th class="table_thead">Men</th>
                                                <th class="table_thead">Women</th>
                                                <th class="table_thead">SC</th>
                                                <th class="table_thead">ST</th>
                                                <th class="table_thead">OBC A</th>
                                                <th class="table_thead">OBC B</th>
                                                <th class="table_thead">Gen</th>
                                                <th class="table_thead">Oth.</th>
                                                <th class="table_thead">Total</th>
                                                <th class="table_thead">Big</th>
                                                <th class="table_thead">Marginal</th>
                                                <th class="table_thead">Small</th>
                                                <th class="table_thead">Landless</th>
                                                <th class="table_thead">LIG</th>
                                                <th class="table_thead">MIG</th>
                                                <th class="table_thead">HIG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($borrower_details as $b) {
                                                echo '<tr>';
                                                echo '<td class="table_body">' . $b->pronote_no . '</td>';
                                                echo '<td class="table_body">' . $b->tot_memb . '</td>';
                                                echo '<td class="table_body">' . $b->tot_borrower . '</td>';
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
                                <div class="form-group row">
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
            window.location.href = "<?= site_url('ho/dc_self/forward_data/' . $approve_details[0]->ardb_id . '/' . $memo_no); ?>";
        }
        function forward() {
            var x = confirm("Are you sure you want to forward to APEX Bank?");
            if (x)
                window.location.href = "<?= site_url('ho/dc_self/forward_to_apex/' . $approve_details[0]->ardb_id . '/' . $memo_no); ?>";
            else
                return false;
        }
        function reject() {
            window.location.href = "<?= site_url('ho/dc_self/reject_data/' . $approve_details[0]->ardb_id . '/' . $memo_no); ?>";
        }
        function download() {
            window.location.href = "<?= site_url('ho/dc_self/download_zip/' . $approve_details[0]->ardb_id . '/' . $memo_no); ?>";
        }
    </script>