<?php
$shg_details = json_decode($shg_details);
//$memo_header = json_decode($memo_header);
$borrower_details = json_decode($borrower_details);
//$gt_details = json_decode($gt_details);
//$details = json_decode($details);
$approve_details = json_decode($approve_details);
//echo '<pre>';
//var_dump($borrower_details);
//exit;
?>
<style type="text/css">
    .table thead th, .jsgrid .jsgrid-table thead th {
        border-top: 0;
        border-bottom: 1px solid #c8c8c8;
        font-weight: 500;
        font-size: .875rem;
    }
    .table, .table_thead, .table_body{
        border: 1px solid #c8c8c8;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">APEX DISBURSEMENT <small>Other Than SHG</small></h4> <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7 pt-3">
                                <div class="table-responsive">
                                    <table width="80%">
                                        <tr>
                                            <td><b>Memo No </b> :-</td>
                                            <td class="pull-left"><?= $approve_details[0]->memo_no ?></td>
                                            <td><b>Memo Date</b> :-</td>
                                            <td class="pull-left"><?= date('d/m/Y', strtotime(str_replace('-', '/', $approve_details[0]->memo_date))) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sector :-</td>
                                            <td class="pull-left"><b><?= $approve_details[0]->sector_name ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                                                <th>LSO No</th>
                                                <th>Branch Loan File No.</th>
                                                <th>Block</th>
                                                <th>Name of the Borrower</th>
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
                                                <th>Land Offered as Security<br><i><small>(in acres)</small></i></th>
                                                <th>Cultivated Area<br><i><small>(in acres)</small></i></th>
                                                <th>Value of Hypothecation</th>
                                                <th>Gross Income Generated<br><i><small>(Loan) Rs.</small></i></th>
                                                <th>Registration of M. Bond<br><i><small>Date</small></i></th>
                                                <th>Registration of M. Bond<br><i><small>No</small></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tot_proj_cost = 0;
                                            $tot_own_amt = 0;
                                            $tot_corp_fnd = 0;
                                            $amt_ln_snc = 0;
                                            $tot_dis_amt = 0;
                                            $tot_lnd_sec = 0;
                                            $tot_cult_arr = 0;
                                            $tot_hypo_val = 0;
                                            $tot_gros_inc = 0;
                                            $tot_m_bond = 0;
                                            foreach ($shg_details as $dt) {
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
                                                $tot_lnd_sec += $dt->lnd_off_sec;
                                                $tot_cult_arr += $dt->cult_area;
                                                $tot_hypo_val += $dt->val_of_hypo;
                                                $tot_gros_inc += $dt->gros_inc_gen;
                                                $tot_m_bond += $dt->reg_m_bond_no;
//                                                $pr_no = $dt->pronote_no;
                                                echo '<tr>';
                                                echo '<td>' . $dt->pronote_no . '</td>';
                                                echo '<td>' . $dt->lso_no . '</td>';
                                                echo '<td>' . $dt->file_no . '</td>';
                                                echo '<td>' . $dt->block_name . '</td>';
                                                echo '<td>' . $dt->name_of_borr . '</td>';
                                                echo '<td>' . $dt->moratorium . '</td>';
                                                echo '<td>' . $dt->loan . '</td>';
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
                                                echo '<td>' . $dt->lnd_off_sec . '</td>';
                                                echo '<td>' . $dt->cult_area . '</td>';
                                                echo '<td>' . $dt->val_of_hypo . '</td>';
                                                echo '<td>' . $dt->gros_inc_gen . '</td>';
                                                echo '<td>' . $dt->reg_m_bond_dt . '</td>';
                                                echo '<td>' . $dt->reg_m_bond_no . '</td>';
                                                echo '</tr>';
                                            }
                                            // exit;
                                            echo '<tr>';
                                            echo '<td><b>Grand Total</b></td>';
                                            echo '<td colspan="9"></td>';
                                            echo '<td><b>' . $tot_proj_cost . '</b></td>';
                                            echo '<td><b>' . $tot_own_amt . '</b></td>';
                                            echo '<td><b>' . $tot_corp_fnd . '</b></td>';
                                            echo '<td><b>' . $amt_ln_snc . '</b></td>';
                                            echo '<td></td><td></td><td></td>';
                                            echo '<td><b>' . $tot_dis_amt . '</b></td>';
                                            echo '<td><b>' . $tot_lnd_sec . '</b></td>';
                                            echo '<td><b>' . $tot_cult_arr . '</b></td>';
                                            echo '<td><b>' . $tot_hypo_val . '</b></td>';
                                            echo '<td><b>' . $tot_gros_inc . '</b></td>';
                                            echo '<td></td>';
                                            echo '<td><b>' . $tot_m_bond . '</b></td>';
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
                                                <th>Pronote No</th>
                                                <th>Total Member</th>
                                                <th>Total Borrower</th>
                                                <th>Men</th>
                                                <th>Women</th>
                                                <th>SC</th>
                                                <th>ST</th>
                                                <th>OBC A</th>
                                                <th>OBC B</th>
                                                <th>Gen</th>
                                                <th>Oth.</th>
                                                <th>Total</th>
                                                <th>Big</th>
                                                <th>Marginal</th>
                                                <th>Small</th>
                                                <th>Landless</th>
                                                <th>LIG</th>
                                                <th>MIG</th>
                                                <th>HIG</th>
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
                                <div class="form-group row bttn-align">
                                    <?php if ($_SESSION['user_type'] != 'U') { ?>
                                        <div class="col-md-2">
                                            <input type="button" id="submit" class="btn btn-danger" value="Reject" onclick="reject()" />
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-2">
                                        <input type="button" id="submit" class="btn btn-info pull-left" value="Forward" onclick="submit()" />
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
            window.location.href = "<?= site_url('/apex_self/forward_data/' . $memo_no); ?>";
        }
        function reject() {
            window.location.href = "<?= site_url('/apex_self/reject_data/' . $memo_no); ?>";
        }
    </script>