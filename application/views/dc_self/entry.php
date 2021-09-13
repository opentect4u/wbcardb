<?php
$block_list = json_decode($block_list);
$purpose_list = json_decode($purpose_list);
$sector_list = json_decode($sector_list);
$selected = json_decode($selected);
$borrower_selected = json_decode($borrower_selected);
$dc_shg_dtls = json_decode($dc_shg_dtls);
$id = $selected ? $selected->id : '0';
if ($id > 0) {
    $disable_button = $selected->fwd_data == 'Y' ? 'disabled' : '';
} else {
    $disable_button = '';
}
// echo '<pre>'; var_dump($dc_shg_dtls);exit;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> </h4>
                <?= form_open('dc_self/dc_save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4 class="mb-4">DC Entry <small>Other Than SHG</small> <label class="sanc-amt pull-right" id="view_sanc" style="display:none;">Sanction Limit<br><center><span id="sanc_amt"></span></center></label></h4> <hr>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $selected ? $selected->date : date('Y-m-d') ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Memo Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="memo_no" id="memo_no" value="<?= $selected ? $selected->memo_no : '' ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Sector</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="sector_code" name="sector_code" required >
                                            <option value="">Select</option>
                                            <?php
                                            if ($sector_list) {
                                                foreach ($sector_list as $sector) {
                                                    $select = "";
                                                    if ($selected->sector_code == $sector->sector_code) {
                                                        $select = "selected";
                                                    }
                                                    echo '<option value="' . $sector->sector_code . '" ' . $select . '>' . strtoupper($sector->sector_name) . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Gender</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="gender_id" id="gender_id" required >
                                            <option value="">Select Gender</option>
                                            <?php
                                            foreach (unserialize(GENDER_ID) as $k => $v) {
                                                $select = "";
                                                if ($selected->gender_id == $k) {
                                                    $select = "selected";
                                                }
                                                echo '<option value="' . $k . '" ' . $select . '>' . $v . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Rate of Interest (%)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="rete_of_interest" id="rate_of_interest" value="<?= $selected ? $selected->roi : '0' ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pronote No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pronote_no" id="pronote_no" value="<?= $selected ? $selected->pronote_no : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pronote Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="pronote_date" id="pronote_date" value="<?= $selected ? $selected->pronote_date : date('Y-m-d'); ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Purpose</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="purpose" name="purpose" required >
                                            <option value="">Select</option>
                                            <?php
                                            if ($purpose_list) {
                                                foreach ($purpose_list as $purpose) {
                                                    $select = "";
                                                    if ($selected->purpose == $purpose->purpose_code) {
                                                        $select = "selected";
                                                    }
                                                    echo '<option value="' . $purpose->purpose_code . '" ' . $select . '>' . strtoupper($purpose->purpose_name) . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Moratorium</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="moral" id="moral" value="<?= $selected ? $selected->moral : ''; ?>" required="" placeholder="In Months">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Repayment</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="repayment" id="repayment" value="<?= $selected ? $selected->repayment : ''; ?>" required="" placeholder="In Months">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table" class="table">
                                <thead>
                                    <tr>
                                        <th>BOD Sanction Date</th>
                                        <th>Due Date</th>
                                        <th>Borrower<br> SL. No.</th>
                                        <!-- <th>Rate of <br>Interest <br>(%)</th> -->
                                        <th>Project Cost</th>
                                        <th>Sanction Block</th>
                                        <th>Sanction Working</th>
                                        <th>Sanction Total</th>
                                        <th>Disbursement Block</th>
                                        <th>Disbursement<br>Working</th>
                                        <th>Disbursement<br>Total</th>
                                        <th>Total Own <br>Contribution <br>(Rs.)</th>
                                        <th>Subsidy<br>Received<br>(If Any)</th>
                                        <th>Subsidy<br>Receivable<br>(If Any)</th>
                                        <th>Total Loan<br>Amount<br>(Rs.)</th>
                                        <th>Total Land<br>offered for<br>Mortgage</th>
                                        <th>Total Area<br>for cultivation<br>(Acre)</th>
                                        <th>Security Land<br>Value<br>(Rs.)</th>
                                        <th>Security Other<br>Value<br>(Rs.)</th>
                                        <th>Security Total<br>Value<br>(Rs.)</th>
                                        <th>Income<br>Generated<br>out of Loan</th>
                                        <th>Total<br>Mortgage<br>Bond</th>
                                        <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($dc_shg_dtls) > 0) {
                                        $i = 1;
                                        foreach ($dc_shg_dtls as $dt) {
                                            echo '<tr id="row_' . $i . '">';
                                            echo '<td><div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' . $i . '" value="' . $dt->bod_sanc_dt . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' . $i . '" value="' . $dt->due_dt . '" readonly /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_' . $i . '" value="' . $dt->brrwr_sl_no . '" /></div>
                                    </td>';
                                            // echo '<td><div class="form-group"><input type="text" class="form-control width-th required" name="rate_of_interest[]" id="rate_of_interest_' . $i . '" value="' . $dt->roi . '" /></div></td>';
                                            echo '<td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="project_cost[]" id="project_cost_' . $i . '" value="' . $dt->project_cost . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_block[]" id="sanction_block_' . $i . '" value="' . $dt->sanc_block . '" value="0" onchange="count_sanc_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_working[]" id="sanction_working_' . $i . '" value="' . $dt->sanc_working . '" value="0" onchange="count_sanc_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_total[]" id="sanction_total_' . $i . '" value="' . $dt->sanc_total . '" onchange="check_amt(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_block[]" id="disbursement_block_' . $i . '" value="' . $dt->dis_block . '" value="0" onchange="count_dis_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_working[]" id="disbursement_working_' . $i . '" value="' . $dt->dis_working . '" value="0" onchange="count_dis_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_total[]" id="disbursement_total_' . $i . '" value="' . $dt->dis_total . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="own_contribution[]" id="own_contribution_' . $i . '" value="' . $dt->own_cont . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="subsidy_received[]" id="subsidy_received_' . $i . '" value="' . $dt->sub_received . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="subsidy_receivable[]" id="subsidy_receivable_' . $i . '" value="' . $dt->sub_receivable . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="total_loan_amount[]" id="total_loan_amount_' . $i . '" value="' . $dt->tot_loan_amt . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="lof_mortgage[]" id="lof_mortgage_' . $i . '" value="' . $dt->lof_mort . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="af_cultivation[]" id="af_cultivation_' . $i . '" value="' . $dt->af_culti . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="security_land[]" id="security_land_' . $i . '" value="' . $dt->sec_land . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="security_other[]" id="security_other_' . $i . '" value="' . $dt->sec_oth . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="security_total[]" id="security_total_' . $i . '" value="' . $dt->sec_tot . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="igo_loan[]" id="igo_loan_' . $i . '" value="' . $dt->igo_loan . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="tg_bond[]" id="tg_bond_' . $i . '" value="' . $dt->tot_mordg_bond . '" /></div>
                                    </td>
                                    <td><button type="button" id="remove_' . $i . '" class="btn btn-danger" onclick="_delete(' . $i . ')"><i class="fa fa-remove"></i></button></td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                        <tr id="row_1">
                                            <td>
                                                <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_1" value="<?= date('Y-m-d') ?>" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_1" value="" readonly/></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_1" value="" /></div>
                                            </td>
                                            <!-- <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="rate_of_interest[]" id="rate_of_interest_1" value="" /></div>
                                            </td> -->
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="project_cost[]" id="project_cost_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_block[]" id="sanction_block_1" value="0" onchange="count_sanc_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_working[]" id="sanction_working_1" value="0" onchange="count_sanc_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_total[]" id="sanction_total_1" onchange="check_amt(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_block[]" id="disbursement_block_1" value="0" onchange="count_dis_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_working[]" id="disbursement_working_1" value="0" onchange="count_dis_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_total[]" id="disbursement_total_1" readonly /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="own_contribution[]" id="own_contribution_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="subsidy_received[]" id="subsidy_received_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="subsidy_receivable[]" id="subsidy_receivable_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="total_loan_amount[]" id="total_loan_amount_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="lof_mortgage[]" id="lof_mortgage_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="af_cultivation[]" id="af_cultivation_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="security_land[]" id="security_land_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="security_other[]" id="security_other_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="security_total[]" id="security_total_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="igo_loan[]" id="igo_loan_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="tg_bond[]" id="tg_bond_1" /></div>
                                            </td>
                                            <td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete(1)"><i class="fa fa-remove"></i></button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-12"><label><b><u>Member Details</u></b></label></div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Member</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_memb" id="tot_memb" value="<?= $borrower_selected ? $borrower_selected->tot_memb : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Borrower</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_borrower" id="tot_borrower" value="<?= $borrower_selected ? $borrower_selected->tot_borrower : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><label><b><u>Gender</u></b></label></div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Men</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_men" id="tot_men" value="<?= $borrower_selected ? $borrower_selected->tot_male : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Women</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_wom" id="tot_wom" value="<?= $borrower_selected ? $borrower_selected->tot_female : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><label><b><u>Caste</u></b></label></div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">SC</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tot_sc" id="tot_sc" value="<?= $borrower_selected ? $borrower_selected->tot_sc : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">ST</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tot_st" id="tot_st" value="<?= $borrower_selected ? $borrower_selected->tot_st : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">OBC A</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control width-obc" name="tot_obca" id="tot_obca" value="<?= $borrower_selected ? $borrower_selected->tot_obca : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">OBC B</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control width-obc" name="tot_obcb" id="tot_obcb" value="<?= $borrower_selected ? $borrower_selected->tot_obcb : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Gen</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tot_gen" id="tot_gen" value="<?= $borrower_selected ? $borrower_selected->tot_gen : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Oth.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tot_oth" id="tot_oth" value="<?= $borrower_selected ? $borrower_selected->tot_other : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Total</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="total" id="total" value="<?= $borrower_selected ? $borrower_selected->tot_count : '0'; ?>" disabled="disabled">
                                        <input type="hidden" name="tot_count" id="tot_count" value="<?= $borrower_selected ? $borrower_selected->tot_count : '0'; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label><b><u>Borrower Classification</u></b></label></div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Big</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_big" id="tot_big" value="<?= $borrower_selected ? $borrower_selected->tot_big : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Marginal</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_marginal" id="tot_marginal" value="<?= $borrower_selected ? $borrower_selected->tot_marginal : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Small</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_small" id="tot_small" value="<?= $borrower_selected ? $borrower_selected->tot_small : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Landless</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_landless" id="tot_landless" value="<?= $borrower_selected ? $borrower_selected->tot_landless : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><label><b><u>Income Group</u></b></label></div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">LIG</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_lig" id="tot_lig" value="<?= $borrower_selected ? $borrower_selected->tot_lig : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">MIG</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_mig" id="tot_mig" value="<?= $borrower_selected ? $borrower_selected->tot_mig : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">HIG</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_hig" id="tot_hig" value="<?= $borrower_selected ? $borrower_selected->tot_hig : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                    <input type="hidden" name="id" value="<?= $selected ? $selected->id : '0'; ?>">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" id="submit" class="btn btn-info" value="Save" <?= $disable_button ?>/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?= form_close(); ?>
        <script>
            $("#sector_code").on('change', function () {
                $.ajax({
                    type: "GET",
                    url: "<?php echo site_url('dc_self/get_sanc_amt/'); ?>",
                    data: {sector_id: $("#sector_code").val(), date: $("#date").val()},
                    dataType: 'html',
                    success: function (result) {
                        var result = $.parseJSON(result);
//                        console.log(result);
                        if (result[0].sanction_amt > 0) {
                            $('#view_sanc').show();
                            $('#sanc_amt').text(result[0].sanction_amt);
                        } else {
                            alert("No Sanction Limit Is Assigned");
                        }
                    }
                });
            });
        </script>

        <script>
            $('#gender_id').change(function () {
                if ($(this).val() == 1) {
                    $('#tot_men').removeAttr('readonly');
                    $('#tot_wom').attr('readonly', 'readonly');
                } else {
                    if ($(this).val() == 2) {
                        $('#tot_wom').removeAttr('readonly');
                        $('#tot_men').attr('readonly', 'readonly');
                    } else {
                        $('#tot_men').removeAttr('readonly');
                        $('#tot_wom').removeAttr('readonly');
                    }
                }
            });
        </script>
        <script>
            var count = 20;
            var x = $('#table tbody > tr').length;
            $('#dynamic_add').click(function () {
                if (x < count) {
                    x++;
                    $('#table').append('<tr id="row_' + x + '">'
                            + '<td><div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' + x + '" value="<?= date('Y-m-d') ?>" /></div></td>'
                            + '<td><div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' + x + '" value="" readonly/></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="brrwr_sl_no[]" id="brrwr_sl_no_' + x + '" value="" /></div></td>'
                            // + '<td><div class="form-group"><input type="text" class="form-control required" name="rate_of_interest[]" id="rate_of_interest_' + x + '" value="" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="project_cost[]" id="project_cost_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="sanction_block[]" id="sanction_block_' + x + '" value="0" onchange="count_sanc_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="sanction_working[]" id="sanction_working_' + x + '" value="0" onchange="count_sanc_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="sanction_total[]" id="sanction_total_' + x + '" onchange="check_amt(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="disbursement_block[]" id="disbursement_block_' + x + '" value="0" onchange="count_dis_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="disbursement_working[]" id="disbursement_working_' + x + '" value="0" onchange="count_dis_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="disbursement_total[]" id="disbursement_total_' + x + '" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="own_contribution[]" id="own_contribution_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="subsidy_received[]" id="subsidy_received_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="subsidy_receivable[]" id="subsidy_receivable_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="total_loan_amount[]" id="total_loan_amount_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="lof_mortgage[]" id="lof_mortgage_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="af_cultivation[]" id="af_cultivation_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="security_land[]" id="security_land_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="security_other[]" id="security_other_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="security_total[]" id="security_total_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="igo_loan[]" id="igo_loan_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="tg_bond[]" id="tg_bond_' + x + '" /></div></td>'
                            + '<td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete(' + x + ')"><i class="fa fa-remove"></i></button></td>'
                            + '</tr>');
                }
            });
            function _delete(id) {
                var r = confirm("Do you want to delete this?");
                if (r == true) {
                    $('#row_' + id).remove();
                    x--;
                } else {
                    return false;
                }
            }

            function check_amt(id) {
//                alert(id + ' sanction amt : ' + $('#sanc_amt').text() + ' Entry Amt : ' + $('#sanction_total_' + id).val());
                if (parseInt($('#sanction_total_' + id).val()) > parseInt($('#sanc_amt').text())) {
                    alert('Sanction Amount is Excided With Limit');
                    $('#submit').attr('disabled', 'disabled');
                } else {
                    $('#submit').removeAttr('disabled');
                }
            }

            $('#tot_sc').change(function () {
                count_total($(this).val());
            });
            $('#tot_st').change(function () {
                count_total($(this).val());
            });
            $('#tot_obca').change(function () {
                count_total($(this).val());
            });
            $('#tot_obcb').change(function () {
                count_total($(this).val());
            });
            $('#tot_gen').change(function () {
                count_total($(this).val());
            });
            $('#tot_oth').change(function () {
                count_total($(this).val());
            });
            function count_total(value) {
                var total = $('#total').val();
                if (total == '') {
                    total = 0;
                }
                var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
                $('#tot_count').val(count);

                if (count <= $('#tot_memb').val()) {
                    $('#submit').removeAttr('disabled');
                } else {
                    $('#submit').attr('disabled', 'disabled');
                    alert('Data is greated than Total Members');
                }
            }

            $('#tot_men').change(function () {
                // alert($(this).val());
                check_total_gender();
            });
            $('#tot_wom').change(function () {
                check_total_gender();
            });
            function check_total_gender() {
                var total_gender = parseInt($('#tot_men').val()) + parseInt($('#tot_wom').val());
                if (total_gender <= $('#tot_memb').val()) {
                    $('#submit').removeAttr('disabled');
                } else {
                    $('#submit').attr('disabled', 'disabled');
                    alert('Total Gender is greated than total member');
                }
            }

            $('#tot_big').change(function () {
                check_total_member();
            });
            $('#tot_marginal').change(function () {
                check_total_member();
            });
            $('#tot_small').change(function () {
                check_total_member();
            });
            $('#tot_landless').change(function () {
                check_total_member();
            });
            $('#tot_lig').change(function () {
                check_total_member();
            });
            $('#tot_mig').change(function () {
                check_total_member();
            });
            $('#tot_hig').change(function () {
                check_total_member();
            });
            function check_total_member() {
                var total_borrower = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());

                var total_group = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());

                if (total_group <= $('#tot_memb').val() && total_borrower <= $('#tot_memb').val()) {
                    $('#submit').removeAttr('disabled');
                } else {
                    $('#submit').attr('disabled', 'disabled');
                    alert('Data is not equal to Total Members');
                }
            }
        </script>

        <script>
            function count_sanc_tot(id) {
                $('#sanction_total_' + id).val(parseInt($('#sanction_block_' + id).val()) + parseInt($('#sanction_working_' + id).val())).change();
            }
            function count_dis_tot(id) {
                $('#disbursement_total_' + id).val(parseInt($('#disbursement_block_' + id).val()) + parseInt($('#disbursement_working_' + id).val()));
            }
        </script>