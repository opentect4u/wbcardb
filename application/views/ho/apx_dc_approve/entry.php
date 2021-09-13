<?php
$apex_details = json_decode($apex_details);
$borrower_details = json_decode($borrower_details);
// $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $shg_details[0]->memo_no);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <?= form_open('ho/apx_dc_approve/save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 pt-5">
                                <center><h4>Loan Requisition Statement Cum-Disbursement Certificate</h4></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Pronote No</th>
                                                <th>Group</th>
                                                <th>LSO No</th>
                                                <th>Block</th>
                                                <th>Name of the Group</th>
                                                <th>Branch Loan File No.</th>
                                                <th>Total Member</th>
                                                <th>Moratorium</th>
                                                <th>Loan</th>
                                                <th>Total</th>
                                                <th>Purpose</th>
                                                <th>Rate of Interest</th>
                                                <th>Project Cost</th>
                                                <th>Own Contribution</th>
                                                <th>Corpus Fund</th>
                                                <th>Amount Of Loan Sanction</th>
                                                <th>Remaining Disbursement Amount</th>
                                                <th>Installment</th>
                                                <th>Disbursement Date</th>
                                                <th>Disbursement Amount</th>
                                                <th>Total Deposit Raised</th>
                                                <th>Intersee AG Bond Date</th>
                                                <th>Intersee AG Bond No</th>
                                                <th>Action Apex Bank<br>Receipt Section for<br>Pronote</th>
                                                <th>Action Apex Bank<br>Receipt Section for<br>Intersee Agreement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $tot_proj_cost = 0;
                                            $tot_own_amt = 0;
                                            $tot_corp_fnd = 0;
                                            $amt_ln_snc = 0;
                                            $tot_dis_amt = 0;
                                            $tot_depo_res = 0;
                                            $tot_ag_bo = 0;
                                            foreach ($apex_details as $dt) {
//                                                if ($pronote != $dt->pronote_no) {
//                                                    $pronote = $dt->pronote_no;
//                                                    $total_Intr_ag_bond += $dt->total_Intr_ag_bond;
//                                                    $i++;
//                                                    $total_pro = $i;
//                                                }
                                                $tot_corp_fnd += $dt->corp_fund;
                                                $tot_proj_cost += $dt->pro_cost;
                                                $tot_own_amt += $dt->own_cont;
                                                $amt_ln_snc += $dt->sanc_amt;
                                                $tot_dis_amt += $dt->inst_amt;
                                                $tot_depo_res += $dt->tot_depo_rais;
                                                $tot_ag_bo += $dt->inter_ag_bo_no;
//                                                $pr_no = $dt->pronote_no;
                                                echo '<tr>';
                                                echo '<td>' . $dt->pronote_no . '</td>';
                                                echo '<td>' . $dt->group . '</td>';
                                                echo '<td>' . $dt->lso_no . '</td>';
                                                echo '<td>' . $dt->block_name . '</td>';
                                                echo '<td>' . $dt->name_of_group . '</td>';
                                                echo '<td>' . $dt->file_no . '</td>';
                                                echo '<td>' . $dt->tot_member . '</td>';
                                                echo '<td>' . $dt->moratorium_period . '</td>';
                                                echo '<td>' . $dt->repayment_no . '</td>';
                                                echo '<td>' . $dt->repay_per_tot . '</td>';
                                                echo '<td>' . $dt->purpose_name . '</td>';
                                                echo '<td>' . $dt->roi . '</td>';
                                                echo '<td>' . $dt->pro_cost . '</td>';
                                                echo '<td>' . $dt->own_cont . '</td>';
                                                echo '<td>' . $dt->corp_fund . '</td>';
                                                echo '<td>' . $dt->sanc_amt . '</td>';
                                                echo '<td>' . $dt->remaining_sanc_amt . '</td>';
                                                echo '<td>' . $dt->inst_sl_no . '</td>';
                                                echo '<td>' . $dt->inst_date . '</td>';
                                                echo '<td>' . $dt->inst_amt . '</td>';
                                                echo '<td>' . $dt->tot_depo_rais . '</td>';
                                                echo '<td>' . $dt->inter_ag_bo_dt . '</td>';
                                                echo '<td>' . $dt->inter_ag_bo_no . '</td>';
                                                echo '<td><input type="checkbox" id="pronote_recept_sanc_' . $i . '" name="pronote_recept_sanc[' . $dt->pronote_no . ']" value="1"></td>';
                                                echo '<td><input type="checkbox" id="inter_ag_recept_sanc_' . $i . '" name="inter_ag_recept_sanc[' . $dt->pronote_no . ']" value="1"></td>';
                                                echo '</tr>';
                                                $i++;
                                            }
                                            // exit;
                                            echo '<tr>';
                                            echo '<td><b>Grand Total</b></td>';
                                            echo '<td colspan="11"></td>';
                                            echo '<td><b>' . $tot_proj_cost . '</b></td>';
                                            echo '<td><b>' . $tot_own_amt . '</b></td>';
                                            echo '<td><b>' . $tot_corp_fnd . '</b></td>';
                                            echo '<td><b>' . $amt_ln_snc . '</b></td>';
                                            echo '<td></td><td></td><td></td>';
                                            echo '<td><b>' . $tot_dis_amt . '</b></td>';
                                            echo '<td><b>' . $tot_depo_res . '</b></td>';
                                            echo '<td></td>';
                                            echo '<td><b>' . $tot_ag_bo . '</b></td>';
                                            echo '<td colspan="2"></td>';
                                            echo '</tr>';
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
                                                <th class="table_thead">Landless</th>
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
                                                echo '<td class="table_body">' . $b->tot_landless . '</td>';
                                                echo '<td class="table_body">' . $b->tot_hig . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="remarks" id="remarks" value="" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>" />
                        <input type="hidden" name="memo_no" value="<?= $apex_details[0]->memo_no; ?>" />
                        <input type="hidden" name="flag" value="<?= $flag; ?>" />
                        <div class="col-md-12 pt-5">
                            <div class="form-group row bttn-align">
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-info">Approve</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
