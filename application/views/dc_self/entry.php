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
                                        <input type="decimal" class="form-control" name="rete_of_interest" id="rate_of_interest" value="<?= $selected ? $selected->roi : '0' ?>" oninput="validate(this)" required="">
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
                                        <th>Loan Id.</th>
                                        <th>Cust Name.</th>
                                        <th>Project Cost</th>
                                        <th>Sanction Block</th>
                                        <th>Sanction Working</th>
                                        <th>Sanction Total<br>(Rs.)</th>
                                        <th>Disbursement Block</th>
                                        <th>Disbursement<br>Working</th>
                                        <th>Disbursement<br>Total<br>(Rs.)</th>
                                        <th>Total Own <br>Contribution <br>(Rs.)</th>
                                        <th>Subsidy<br>Received<br>(If Any)</th>
                                        <th>Subsidy<br>Receivable<br>(If Any)</th>
                                        <th>Total Loan<br>Amount<br>(Rs.)</th>
                                        <th>Total Land<br>offered for<br>Mortgage<br>(Acre)</th>
                                        <th>Total Area<br>for cultivation<br>(Acre)</th>
                                        <th>Security Land<br>Value<br>(Rs.)</th>
                                        <th>Security Other<br>Value<br>(Rs.)</th>
                                        <th>Security Total<br>Value<br>(Rs.)</th>
                                        <th>Income<br>Generated<br>out of Loan<br>(Rs.)</th>
                                        <th>Total<br>Mortgage<br>Bond</th>
                                        <th>Mortgage<br>Bond No</th>
                                        <th>Mortgage<br>Bond Date</th>
                                        <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($dc_shg_dtls) > 0) {
                                        $i = 1;
                                        foreach ($dc_shg_dtls as $dt) {
                                            echo '<tr id="row_' . $i . '">';
                                            echo '<td><div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' . $i . '" value="' . $dt->bod_sanc_dt . '" value="0" onchange="checkbod_dt(' . $i . ')"/></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' . $i . '" value="' . $dt->due_dt . '" readonly /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_' . $i . '" value="' . $dt->brrwr_sl_no . '" /></div>
                                    </td>
                                    <td><div class="form-group"><input type="text" class="form-control width-th " name="cust_name[]" id="cust_name_' . $i . '" value="' . $dt->cust_name . '" /></div></td>';
                                            // echo '<td><div class="form-group"><input type="text" class="form-control width-th required" name="rate_of_interest[]" id="rate_of_interest_' . $i . '" value="' . $dt->roi . '" /></div></td>';
                                            echo '<td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="project_cost[]" id="project_cost_' . $i . '" value="' . $dt->project_cost . '" value="0" onchange="pro_cost(' . $i . ')"/></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="sanction_block[]" id="sanction_block_' . $i . '" value="' . $dt->sanc_block . '" value="0" onchange="count_sanc_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="sanction_working[]" id="sanction_working_' . $i . '" value="' . $dt->sanc_working . '" value="0" onchange="count_sanc_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_total[]" id="sanction_total_' . $i . '" value="' . $dt->sanc_total . '" onchange="check_amt(' . $i . ')" readonly/></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_block[]" id="disbursement_block_' . $i . '" value="' . $dt->dis_block . '" value="0" onchange="count_dis_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_working[]" id="disbursement_working_' . $i . '" value="' . $dt->dis_working . '" value="0" onchange="count_dis_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_total[]" id="disbursement_total_' . $i . '" value="' . $dt->dis_total . '" readonly/></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="own_contribution[]" id="own_contribution_' . $i . '" value="' . $dt->own_cont . '" value="0" onchange="count_own_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="subsidy_received[]" id="subsidy_received_' . $i . '" value="' . $dt->sub_received . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="subsidy_receivable[]" id="subsidy_receivable_' . $i . '" value="' . $dt->sub_receivable . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="number" class="form-control width-th required" name="total_loan_amount[]" id="total_loan_amount_' . $i . '" value="' . $dt->tot_loan_amt . '" value="0" onchange="count_loan_amt(' . $i . ')"/></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="lof_mortgage[]" id="lof_mortgage_' . $i . '" value="' . $dt->lof_mort . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="decimal" class="form-control width-th required" name="af_cultivation[]" id="af_cultivation_' . $i . '" value="' . $dt->af_culti . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="security_land[]" id="security_land_' . $i . '" value="' . $dt->sec_land . '" value="0" onchange="count_securti_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="security_other[]" id="security_other_' . $i . '" value="' . $dt->sec_oth . '"  value="0" onchange="count_securti_tot(' . $i . ')" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="security_total[]" id="security_total_' . $i . '" value="' . $dt->sec_tot . '" readonly/></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="igo_loan[]" id="igo_loan_' . $i . '" value="' . $dt->igo_loan . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="tg_bond[]" id="tg_bond_' . $i . '" value="' . $dt->tot_mordg_bond . '" /></div>
                                    </td>
                                    <td>
                                    <div class="form-group"><input type="text" class="form-control width-th " name="reg_m_bond_no[]" id="reg_m_bond_no_' . $i . '" value="' . $dt->reg_m_bond_no . '" /></div>
                                  </td>
                                  <td>
                                  <div class="form-group"><input type="date" class="form-control width-th " name="reg_m_bond_dt[]" id="reg_m_bond_dt_' . $i . '" value="' . $dt->reg_m_bond_dt . '" /></div>
                                </td>
                                    <td><button type="button" id="remove_' . $i . '" class="btn btn-danger" onclick="_delete(' . $i . ')"><i class="fa fa-remove"></i></button></td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                        <tr id="row_1">
                                            <td>
                                                <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_1" value="<?= date('Y-m-d') ?>" onchange="checkbod_dt(1)"/></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_1" value="" readonly/></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_1" value="" /></div>
                                            </td>
                                            <td><div class="form-group"><input type="text" class="form-control width-th " name="cust_name[]" id="cust_name_1" value="" /></div></td>
                                            
                                           
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="project_cost[]" id="project_cost_1" value="0" onchange="pro_cost(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="sanction_block[]" id="sanction_block_1" value="0" onchange="count_sanc_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="sanction_working[]" id="sanction_working_1" value="0" onchange="count_sanc_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_total[]" id="sanction_total_1" onchange="check_amt(1)" readonly /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="disbursement_block[]" id="disbursement_block_1" value="0" onchange="count_dis_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="disbursement_working[]" id="disbursement_working_1" value="0" onchange="count_dis_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="disbursement_total[]" id="disbursement_total_1" readonly /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="own_contribution[]" id="own_contribution_1" value="0" onchange="count_own_tot(1)"/></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="subsidy_received[]" id="subsidy_received_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="subsidy_receivable[]" id="subsidy_receivable_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="number" class="form-control width-th required" name="total_loan_amount[]" id="total_loan_amount_1"  value="0" onchange="count_loan_amt(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="lof_mortgage[]" id="lof_mortgage_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="decimal" class="form-control width-th required" name="af_cultivation[]" id="af_cultivation_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="security_land[]" id="security_land_1" value="0" onchange="count_securti_tot(1)"/></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="security_other[]" id="security_other_1" value="0" onchange="count_securti_tot(1)" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="security_total[]" id="security_total_1" readonly/></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="igo_loan[]" id="igo_loan_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th required" name="tg_bond[]" id="tg_bond_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" class="form-control width-th " name="reg_m_bond_no[]" id="reg_m_bond_no_1" /></div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="date" class="form-control width-th " name="reg_m_bond_dt[]" id="reg_m_bond_dt_1" /></div>
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
                                <input type="submit" id="submit" class="btn btn-info" value="Save" <?= $disable_button ?> onclick="myFunction()"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?= form_close(); ?>
        <script>
            $(document).ready(function(){
                var sec_id = $("#sector_code").val();
                if(sec_id > 0){
                    $("#sector_code").change();
                }
                // alert(sec_id);
            })
        </script>
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
            $(document).ready(function(){
                var gen_id = $("#gender_id").val();
                
                    $("#gender_id").change();
                
                // alert(sec_id);
            })
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
                            + '<td><div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' + x + '" value="<?= date('Y-m-d') ?>" onchange="checkbod_dt(' + x + ')"  /></div></td>'
                            + '<td><div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' + x + '" value="" readonly/></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="brrwr_sl_no[]" id="brrwr_sl_no_' + x + '" value="" /></div></td>'
                            +'<td><div class="form-group"><input type="text" class="form-control " name="cust_name[]" id="cust_name_' + x + '" value="" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="project_cost[]" id="project_cost_' + x + '" value="0" onchange="pro_cost(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="sanction_block[]" id="sanction_block_' + x + '" value="0" onchange="count_sanc_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="sanction_working[]" id="sanction_working_' + x + '" value="0" onchange="count_sanc_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="sanction_total[]" id="sanction_total_' + x + '" onchange="check_amt(' + x + ')"readonly/></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="disbursement_block[]" id="disbursement_block_' + x + '" value="0" onchange="count_dis_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="disbursement_working[]" id="disbursement_working_' + x + '" value="0" onchange="count_dis_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="disbursement_total[]" id="disbursement_total_' + x + '" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="own_contribution[]" id="own_contribution_' + x + '" value="0" onchange="count_own_tot(' + x + ')"/></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="subsidy_received[]" id="subsidy_received_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="subsidy_receivable[]" id="subsidy_receivable_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="total_loan_amount[]" id="total_loan_amount_' + x + '" value="0" onchange="count_loan_amt(' + x + ')"/></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="lof_mortgage[]" id="lof_mortgage_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="decimal" class="form-control required" name="af_cultivation[]" id="af_cultivation_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="security_land[]" id="security_land_' + x + '" value="0" onchange="count_securti_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="security_other[]" id="security_other_' + x + '" value="0" onchange="count_securti_tot(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="security_total[]" id="security_total_' + x + '" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="igo_loan[]" id="igo_loan_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="reg_m_bond_no[]" id="reg_m_bond_no_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="tg_bond[]" id="tg_bond_' + x + '" /></div></td>'
                            + '<td><div class="form-group"><input type="date" class="form-control required" name="reg_m_bond_dt[]" id="reg_m_bond_dt_' + x + '" /></div></td>'
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
                    alert('Sanction Amount is Exceeded With Limit');
                    $('#sanction_block_' + id).val(0);
                    $('#sanction_working_' + id).val(0);
                    $('#sanction_total_' + id).val(0);
                    // $('#submit').attr('disabled','disabled');
                    // $('#submit').attr('disabled', 'disabled');
                     $('#submit').attr('type', 'buttom');
                    
                   return false;
                } else {
                    // $('#submit').removeAttr('disabled');
                    $('#submit').attr('type', 'submit');
                 
                   return true;
                }
            }

            $('#tot_sc').change(function () {
                // alert($(this).val());
                // alert($('#tot_borrower').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( $('#total').val())>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_sc").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                   
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
                $('#submit').removeAttr('disabled');
                }

            });
            $('#tot_st').change(function () {
                var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_st").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }

               

            });
            $('#tot_obca').change(function () {
                // count_total($(this).val());
                var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_obca").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
                
                $('#submit').removeAttr('disabled');
                }

              

            });
            $('#tot_obcb').change(function () {
               // count_total($(this).val());
               var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_obcb").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                   
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
                $('#submit').removeAttr('disabled');
                }

               
            });
            $('#tot_gen').change(function () {
                //count_total($(this).val());
                var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_gen").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                   
                    $('#submit').attr('disabled', 'disabled');

                }else{
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
                $('#submit').removeAttr('disabled');

                }

              
            });
            $('#tot_oth').change(function () {
                count_total($(this).val());
                var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_oth").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                    $('#total').val(count);
                   
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                $('#total').val(count);
                $('#submit').removeAttr('disabled');
                }

              
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
                    alert('Data is greater  than Total Members');
                }
            }

            $('#tot_men').change(function () {
                // alert($(this).val());
                check_total_gender();
                document.getElementById("tot_men").focus();
            });
            $('#tot_wom').change(function () {
                check_total_gender();
                document.getElementById("tot_wom").focus();
            });
            function check_total_gender() {
                var total_gender = parseInt($('#tot_men').val()) + parseInt($('#tot_wom').val());
                if (total_gender <= $('#tot_memb').val()) {
                    $('#submit').removeAttr('disabled');
                } else {
                    $('#submit').attr('disabled', 'disabled');
                    alert('Total Gender is greated than total member');
                    $('#tot_men').val(0) ;
                     $('#tot_wom').val(0);

                }
            }

            $('#tot_big').change(function () {
            
             // check_total_member();
             var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_big").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                   // $('#total').val(count);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                   // $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());                $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
           
            });

            $('#tot_marginal').change(function () {
            
                //check_total_member();
                var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_marginal").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                    //$('#total').val(count);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                   // $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
               // $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
           
            });

            $('#tot_small').change(function () {
            
                //check_total_member();
                
                var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_small").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                   // $('#total').val(count);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                   // $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
               // $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
           
           
            });

            $('#tot_landless').change(function () {
                //check_total_member();
                var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_landless").focus();
                    //$(this).val(0);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                    //$('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
               // $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
            });
            $('#tot_lig').change(function () {
               // check_total_member();
               var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_lig").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                    //$('#total').val(count);
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                   // $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                // $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
            });
            $('#tot_mig').change(function () {
                //check_total_member();
                var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_mig").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                    //$('#total').val(count);
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                    $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                // $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
            });
            $('#tot_hig').change(function () {
                // check_total_member();
                var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                if (parseInt($(this).val())> parseInt($('#tot_borrower').val()) ||parseInt( count)>parseInt($('#tot_borrower').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_hig").focus();
                    $(this).val(0);
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                    $('#total').val(count);
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                    $('#total').val(count);
                    $('#submit').attr('disabled', 'disabled');
                }else{
                    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                // $('#total').val(count);
               
                $('#submit').removeAttr('disabled');
                }
            });

           
            function check_total_member() {
                var sum_borrower = $('#tot_borrower').val() ;
                var total_borrower = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());

                var total_group = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
               
               if(total_borrower>sum_borrower){
                alert('Value Should Not Be Greater Than the value of Total Borrower');
               }
            // alert(total_group);
               


                if (total_group <= $('#tot_memb').val() && total_borrower <= $('#tot_memb').val()) {
                    $('#submit').removeAttr('disabled');
                } else {
                    $('#submit').attr('disabled', 'disabled');
                    alert('Data is not equal to Total Members');
                }
            }
        </script>

        <script>

function checkbod_dt(id){
    var sanc_dt = $('#sanction_date_'+ id).val();
    //alert(sanc_dt);
    var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
	(month<10 ? '0' : '') + month + '-' +
	(day<10 ? '0' : '') + day;
    if(new Date(output) < new Date(sanc_dt))
		{
		alert("Sanction Date Can Not Be Greater Than Current Date");
        $('#sanction_date_'+ id).val(output);
		// $('#submit').attr('type', 'buttom');
		return false;
		}else{
		// $('#submit').attr('type', 'submit');
        return true;
		}
}


function count_loan_amt(id){
    $('#total_loan_amount_' + id).val(parseInt($('#total_loan_amount_' + id).val()));

}
            function count_sanc_tot(id) {
                /*var tot_sanc;*/
                $('#sanction_total_' + id).val(parseInt($('#sanction_total_' + id).val()));
                 $('#sanction_block_' + id).val(parseInt($('#sanction_block_' + id).val()));

                var tot_proj_cost=$('#project_cost_' + id).val();
                var sanction_total=$('#sanction_total_' + id).val(parseInt($('#sanction_block_' + id).val()) + parseInt($('#sanction_working_' + id).val())).change();

                 var tot_sanc = parseInt( $('#sanction_total_' + id).val());
                  var tot_own_cont= $('#own_contribution_' + id).val(parseInt($('#project_cost_' + id).val()) - parseInt($('#sanction_total_' + id).val()));
        
              //subsidy_received_1

               if(parseInt($('#project_cost_' + id).val()) < parseInt($('#sanction_total_' + id).val())){
               
                $('#own_contribution_' + id).val(0);
                alert('Sanction Amount Can Not Be greater than Project Cost Amount');
                $('#sanction_total_' + id).val(0);
                $('#sanction_block_' + id).val(0); 
                $('#sanction_working_' + id).val(0);
                $('#submit').attr('disabled', 'disabled');
               }else{
                $('#submit').removeAttr('disabled'); 
               }
              // $('#subsidy_received_' + id).val(parseInt($('#project_cost_' + id).val()) - parseInt($('#sanction_total_' + id).val()) + parseInt($('#own_contribution_' + id).val()));

            }
            function count_dis_tot(id) {
                 $('#disbursement_block_' + id).val(parseInt($('#disbursement_block_' + id).val()));
                 $('#disbursement_working_' + id).val(parseInt($('#disbursement_working_' + id).val()));
                $('#disbursement_total_' + id).val(parseInt($('#disbursement_block_' + id).val()) + parseInt($('#disbursement_working_' + id).val()));
                var tot_disb = parseFloat( $('#disbursement_total_' + id).val());
                var tot_sanc = parseFloat( $('#sanction_total_' + id).val());
                var proj_costamt= parseFloat( $('#project_cost_' + id).val());
                // alert(tot_disb);
                if(tot_disb>tot_sanc || tot_disb>proj_costamt ){
                    $('#submit').attr('disabled', 'disabled');
                    alert('Disbursed Amount Can Not Be Greater Than Sanction/Project Amount');
                    $('#disbursement_total_' + id).val(0);
                    $('#disbursement_block_' + id).val(0);
                    $('#disbursement_working_' + id).val(0);
                }else{
                    $('#submit').removeAttr('disabled'); 
                }
                if(tot_disb>proj_costamt){
                    $('#submit').attr('disabled', 'disabled');
                    alert('Disbursed Amount Can Not Be Greater Than Sanction/Project Amount');
                    $('#disbursement_total_' + id).val(0);
                    $('#disbursement_block_' + id).val(0);
                    $('#disbursement_working_' + id).val(0);

                }else{
                    $('#submit').removeAttr('disabled'); 
                }
            }

            function count_securti_tot(id) {
                $('#security_total_' + id).val(parseInt($('#security_land_' + id).val()) + parseInt($('#security_other_' + id).val()));
            }
        </script>

        

<script>
      function pro_cost(id) {
            $('#project_cost_' + id).val(parseInt($('#project_cost_' + id).val()));
            // alert('hi');
            // parseFloat($('#project_cost_' + id).val()).toFixed(2);
            count_own_tot(id);
//                var project_cost = $('#project_cost_' + x).val();
//                $('#sanction_amount_' + x).val(project_cost);
//                $('#disbursed_amount_' + x).val(project_cost);
//                check_amt(id);
	    }

    function count_own_tot(id){
        //alert('hi');
        $('#own_contribution_' + id).val(parseInt($('#own_contribution_' + id).val()));
        $('#subsidy_received_' + id).val(parseInt($('#project_cost_' + id).val()) - parseInt($('#sanction_total_' + id).val()) - parseInt($('#own_contribution_' + id).val()));   
    }
</script>

        <script>
       function myFunction() {
          var  sum_borrow=parseInt($('#tot_borrower').val())
        var total_group = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
        // alert(total_group);
        var total_borrower = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
        var tot_cast = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
         if(total_group==0){
            // alert(total_group);
            $('#submit').attr('disabled', 'disabled');
                       alert('Income Group Value Must Be Greater Than 0');
                   
                   }else{
                    $('#submit').removeAttr('disabled');    
                       
                   }

                   if(tot_cast==0){
            // alert(total_group);
            $('#submit').attr('disabled', 'disabled');
                       alert('Cast Value Must Be Greater Than 0');
                   
                   }else{
                    $('#submit').removeAttr('disabled');    
                       
                   }


                //    var total_borrower = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
         if(total_borrower==0){
            // alert(total_group);
            
                       alert('Borrower Classification Value Must Be Greater Than 0');
                       $('#submit').attr('disabled', 'disabled');
                   
                   }else{
                    $('#submit').removeAttr('disabled');    
                       
                   }
                
                   if(sum_borrow!=total_borrower|| sum_borrow!=tot_cast || sum_borrow!=total_group){
            
            
                       alert(' Total Borrower  Not matched with other group');
                       $('#submit').attr('disabled', 'disabled');
                   }else{
                    $('#submit').removeAttr('disabled');    
                       

}
// if( sum_borrow!=total_group){
//              alert(total_group);
//             // && sum_borrow!=total_group && sum_borrow!=tot_cast
           
//                        alert(' Total Borrower  Not matched with Income Group');
//                        $('#submit').attr('disabled', 'disabled');
                   
//                    }else{
//                     $('#submit').removeAttr('disabled');    
                       

// }

// if( sum_borrow!=tot_cast){
//              alert(total_group);
//             // && sum_borrow!=total_group && sum_borrow!=tot_cast
           
//                        alert(' Total Borrower  Not matched with Cast Total');
//                        $('#submit').attr('disabled', 'disabled');
//                        return false; 
//                    }else{
//                     $('#submit').removeAttr('disabled');    

//               return true;      
                       

// }


}

    </script>
    <script>
$(document).ready(function(){
    var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
        // alert(count);
		 $('#total').val(count);
$("#pronote_date").change(function(){
    //alert('hi');

	var pronote_date= $('#pronote_date').val();
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
	(month<10 ? '0' : '') + month + '-' +
	(day<10 ? '0' : '') + day;

// console.log(trans_dt,output);
		if(new Date(output) <new Date(pronote_date))
		{
		alert("Pronote Date Can Not Be Greater Than Current Date");
        $('#pronote_date').val(output);
		// $('#submit').attr('type', 'buttom');
		return false;
		}else{
		// $('#submit').attr('type', 'submit');
        return true;
		}
	})
});
</script>
<script>
$(document).ready(function(){
$("#date").change(function(){
    //alert('hi');

	var memo_date= $('#date').val();
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
	(month<10 ? '0' : '') + month + '-' +
	(day<10 ? '0' : '') + day;
    // alert("Memo Date is Greater Than Current Date");
// console.log(trans_dt,output);
		if(new Date(output) <new Date(memo_date))
		{
		alert("Memo Date is Greater Than Current Date");
        $('#date').val(output);
		// $('#submit').attr('type', 'buttom');
		return false;
		}else{
		// $('#submit').attr('type', 'submit');
        return true;
		}
	})
});
</script>
<script>

      var validate = function(e) {
          var t = e.value;
          e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
      }
  </script>
<!-- <script>
        $('#rate_of_interest').on('change', function () {
            // alert('hi');
            $(this).val(parseFloat($(this).val()).toFixed(2));
    
            
        });
    </script> -->