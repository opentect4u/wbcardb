<?php
//$block_list = json_decode($block_list);
//$purpose_list = json_decode($purpose_list);
$selected = json_decode($selected);
//$selected = json_decode($selected);
$apex_shg = json_decode($apex_shg);
$id = $selected ? $selected->id : '0';
if ($id > 0) {
    $disable_button = $apex_shg[0]->fwd_data == 'Y' ? 'disabled' : '';
} else {
    $disable_button = '';
}
?>
<style>
    #table td{min-width: 120px !important;}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> </h4>
                <?= form_open('apex_shg/save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4 class="mb-4">APEX SELF SHG <small>Entry Form</small></h4> <hr>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Memo Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="memo_no" id="memo_no" value="<?= $apex_shg ? $apex_shg[0]->memo_no : '' ?>" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="memo_date" id="memo_date" value="<?= $apex_shg ? $apex_shg[0]->memo_date : '' ?>" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Sector</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="SHG" required="" disabled>
                                        <input type="hidden" class="form-control" name="sector_code" id="sector_code" value="23" required="" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pronote Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pronote_no" id="pronote_no" value="<?= $apex_shg ? $apex_shg[0]->pronote_no : '' ?>" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive margin-topp-remove">
                        <table id="table" class="table m">
                            <thead>
                                <tr>
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
                                    <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($apex_shg) > 0) {
                                    $i = 1;
                                    foreach ($apex_shg as $shg) {
                                        echo '<tr id="row_1">';
                                        echo '<td>
                                        <div class="form-group"><input type="text" class="form-control" name="group[]" id="group_' . $i . '" value="' . $shg->group . '" required="" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="lso_no[]" id="lso_no_' . $i . '" value="' . $shg->lso_no . '" required="" onchange="get_result(' . $i . ');"></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="block_name[]" id="block_name_' . $i . '" value="' . $shg->block_name . '" required="" readonly />
                                            <input type="hidden" name="block_id[]" id="block_id_' . $i . '" value="' . $shg->block_id . '"/></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="name_of_group[]" id="name_of_group_' . $i . '" value="' . $shg->name_of_group . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="file_no[]" id="file_no_' . $i . '" value="' . $shg->file_no . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="tot_member[]" id="tot_member_' . $i . '" value="' . $shg->tot_member . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="moratorium_period[]" id="moratorium_period_' . $i . '" value="' . $shg->moratorium_period . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="repayment_no[]" id="repayment_no_' . $i . '" value="' . $shg->repayment_no . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="repay_per_tot[]" id="repay_per_tot_' . $i . '" value="' . $shg->repay_per_tot . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="purpose_name[]" id="purpose_name_' . $i . '" value="' . $shg->purpose_name . '" required="" readonly />
                                            <input type="hidden" name="purpose_code[]" id="purpose_code_' . $i . '" value="' . $shg->purpose_code . '" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="roi[]" id="roi_' . $i . '" value="' . $shg->roi . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="pro_cost[]" id="pro_cost_' . $i . '" value="' . $shg->pro_cost . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="own_cont[]" id="own_cont_' . $i . '" value="' . $shg->own_cont . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="corp_fund[]" id="corp_fund_' . $i . '" value="' . $shg->corp_fund . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="sanc_amt[]" id="sanc_amt_' . $i . '" value="' . $shg->sanc_amt . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" id="remaining_sanc_amt_' . $i . '" value="' . $shg->remaining_sanc_amt . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control required" name="inst_sl_no[]" id="inst_sl_no_' . $i . '" value="' . $shg->inst_sl_no . '" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="date" class="form-control required" name="inst_date[]" id="inst_date_' . $i . '" value="' . $shg->inst_date . '" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control required" name="inst_amt[]" id="inst_amt_' . $i . '" value="' . $shg->inst_amt . '" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="tot_depo_rais[]" id="tot_depo_rais_' . $i . '" value="' . $shg->tot_depo_rais . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="date" class="form-control" name="inter_ag_bo_dt[]" id="inter_ag_bo_dt_' . $i . '" value="' . $shg->inter_ag_bo_dt . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="inter_ag_bo_no[]" id="inter_ag_bo_no_' . $i . '" value="' . $shg->inter_ag_bo_no . '" required="" readonly /></div>
                                    </td>';
                                        echo'<td><button type="button" id="remove_' . $i . '" class="btn btn-danger" onclick="_delete(' . $i . ')"><i class="fa fa-remove"></i></button></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    ?>
                                    <tr id="row_1">
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="group[]" id="group_1" value="<?= $selected ? $selected->group : '' ?>" required="" /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="lso_no[]" id="lso_no_1" value="<?= $selected ? $selected->lso_no : '' ?>" required="" onchange="get_result(1);"></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="block_name[]" id="block_name_1" value="<?= $selected ? $selected->block_id : ''; ?>" required="" readonly />
                                                <input type="hidden" name="block_id[]" id="block_id_1" value=""/></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="name_of_group[]" id="name_of_group_1" value="<?= $selected ? $selected->name_of_group : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="file_no[]" id="file_no_1" value="<?= $selected ? $selected->file_no : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="tot_member[]" id="tot_member_1" value="<?= $selected ? $selected->tot_member : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="moratorium_period[]" id="moratorium_period_1" value="<?= $selected ? $selected->moratorium_period : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="repayment_no[]" id="repayment_no_1" value="<?= $selected ? $selected->repayment_no : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="repay_per_tot[]" id="repay_per_tot_1" value="<?= $selected ? $selected->repay_per_tot : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="purpose_name[]" id="purpose_name_1" value="<?= $selected ? $selected->purpose_name : ''; ?>" required="" readonly />
                                                <input type="hidden" name="purpose_code[]" id="purpose_code_1" value="" /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="roi[]" id="roi_1" value="<?= $selected ? $selected->roi : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="pro_cost[]" id="pro_cost_1" value="<?= $selected ? $selected->pro_cost : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="own_cont[]" id="own_cont_1" value="<?= $selected ? $selected->own_cont : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="corp_fund[]" id="corp_fund_1" value="<?= $selected ? $selected->corp_fund : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="sanc_amt[]" id="sanc_amt_1" value="<?= $selected ? $selected->sanc_amt : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" id="remaining_sanc_amt_1" value="<?= $selected ? $selected->remaining_sanc_amt : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control required" name="inst_sl_no[]" id="inst_sl_no_1" value="" /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="date" class="form-control required" name="inst_date[]" id="inst_date_1" value="<?= date('Y-m-d') ?>" /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control required" name="inst_amt[]" id="inst_amt_1" onchange="check_inst(1)" /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="tot_depo_rais[]" id="tot_depo_rais_1" value="<?= $selected ? $selected->tot_depo_rais : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="date" class="form-control" name="inter_ag_bo_dt[]" id="inter_ag_bo_dt_1" value="<?= $selected ? $selected->inter_ag_bo_dt : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="inter_ag_bo_no[]" id="inter_ag_bo_no_1" value="<?= $selected ? $selected->inter_ag_bo_no : ''; ?>" required="" readonly /></div>
                                        </td>
                                        <td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete(1)"><i class="fa fa-remove"></i></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="row">
                        <div class="col-md-12"><label><b><u>Borrower Classification</u></b></label></div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Member</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tot_memb" id="tot_memb" value="<?= $selected ? $selected->tot_memb : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Borrower</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tot_borrower" id="tot_borrower" value="<?= $selected ? $selected->tot_borrower : '0'; ?>" required="" />
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
                                    <input type="text" class="form-control" name="tot_male" id="tot_male" value="<?= $selected ? $selected->tot_male : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Women</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tot_female" id="tot_female" value="<?= $selected ? $selected->tot_female : '0'; ?>" required="" />
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
                                    <input type="text" class="form-control" name="tot_sc" id="tot_sc" value="<?= $selected ? $selected->tot_sc : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">ST</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tot_st" id="tot_st" value="<?= $selected ? $selected->tot_st : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">OBC A</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control width-obc" name="tot_obca" id="tot_obca" value="<?= $selected ? $selected->tot_obca : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">OBC B</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control width-obc" name="tot_obcb" id="tot_obcb" value="<?= $selected ? $selected->tot_obcb : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Gen</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_gen" id="tot_gen" value="<?= $selected ? $selected->tot_gen : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Oth.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tot_other" id="tot_other" value="<?= $selected ? $selected->tot_other : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_count" id="tot_count" value="<?= $selected ? $selected->tot_count : '0'; ?>" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label><b><u>Borrower Classification</u></b></label></div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Big</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_big" id="tot_big" value="<?= $selected ? $selected->tot_big : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Marginal</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_marginal" id="tot_marginal" value="<?= $selected ? $selected->tot_marginal : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Landless</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_landless" id="tot_landless" value="<?= $selected ? $selected->tot_landless : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">HIG</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_hig" id="tot_hig" value="<?= $selected ? $selected->tot_hig : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
						<div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="total2" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="ardb_id" name="ardb_id" value="<?= $ardb_id; ?>">
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
        // ADD MULTIPLE ROWS
        var count = 20;
        var x = $('#table tbody > tr').length;
        $('#dynamic_add').click(function () {
            // var total = parseInt($('#tot_memb').val());
            if (x < count) {
                if ($('#lso_no_' + x).val() != '') {
                    x++;
                    $('#table').append('<tr id="row_' + x + '">'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="group[]" id="group_' + x + '" value="" required="" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="lso_no[]" id="lso_no_' + x + '" value="" required="" onchange="get_result(' + x + ');"></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="block_name[]" id="block_name_' + x + '" value="" required="" readonly /><input type="hidden" name="block_id[]" id="block_id_' + x + '" value=""/></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="name_of_group[]" id="name_of_group_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="file_no[]" id="file_no_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="tot_member[]" id="tot_member_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="moratorium_period[]" id="moratorium_period_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="repayment_no[]" id="repayment_no_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="repay_per_tot[]" id="repay_per_tot_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="purpose_name[]" id="purpose_name_' + x + '" value="" required="" readonly /><input type="hidden" name="purpose_code[]" id="purpose_code_' + x + '" value="" /></div></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="roi[]" id="roi_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="pro_cost[]" id="pro_cost_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="own_cont[]" id="own_cont_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="corp_fund[]" id="corp_fund_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="sanc_amt[]" id="sanc_amt_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" id="remaining_sanc_amt_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="inst_sl_no[]" id="inst_sl_no_' + x + '" value="" /></div></td>'
                            + '<td><div class="form-group"><input type="date" class="form-control required" name="inst_date[]" id="inst_date_' + x + '" value="<?= date('Y-m-d') ?>" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control required" name="inst_amt[]" id="inst_amt_' + x + '" onchange="check_inst(' + x + ')" /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="tot_depo_rais[]" id="tot_depo_rais_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="date" class="form-control" name="inter_ag_bo_dt[]" id="inter_ag_bo_dt_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><div class="form-group"><input type="text" class="form-control" name="inter_ag_bo_no[]" id="inter_ag_bo_no_' + x + '" value="" required="" readonly /></div></td>'
                            + '<td><button type="button" id="remove_' + x + '" class="btn btn-danger" onclick="_delete(' + x + ')"><i class="fa fa-remove"></i></button></td>'
                            + '</tr>');
                } else {
                    alert('Please Fill All Details');
                    return false;
                }
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
            // check_total_member();
        });
        $('#tot_other').change(function () {
            count_total($(this).val());
            // check_total_member();
        });
        function count_total(value) {
            var total = $('#total').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_other').val());
//            $('#total').val(count);
            $('#tot_count').val(count).change();
        }
		$('#tot_count').on('change', function () {
			//console.log($(this).val());
            if($('#tot_count').val() > $('#tot_memb').val()){
				alert('Cast Count Exceeded Total Member');
				$('#submit').attr('disabled', 'disabled');
			}else{
				$('#submit').removeAttr('disabled');
			}
        });
    </script>
    <script>
//        $('#lso_no_' + x).on('change', function () {
        function get_result(id) {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('apex_shg/get_apex_details/'); ?>",
                data: {ardb_id: $("#ardb_id").val(), lso_no: $('#lso_no_' + id).val()},
                dataType: 'html',
                success: function (result) {
                    var result = $.parseJSON(result);
//                    console.log(result);
                    $.each(result, function (i, item) {
                        $.each(item, function (k, v) {
                            $('#' + k + '_' + id).val(v);
                        });
                    });
                    if ($('#remaining_sanc_amt_' + id).val() == '') {
//                        alert(id);
                        $('#remaining_sanc_amt_' + id).val(result[0].sanc_amt);
                    }
                }
            });
        }

        function check_inst(id) {
            if (parseFloat($('#inst_amt_' + id).val()) > parseFloat($('#remaining_sanc_amt_' + id).val())) {
                alert('Disbursement Amount exceeded Sanction Amount');
                $('#submit').attr('disabled', 'disabled');
            } else {
                $('#submit').removeAttr('disabled');
            }
        }
		
		$('#tot_memb').on('change', function(){
			$('#tot_borrower').val($('#tot_memb').val());
		});
		$('#tot_borrower').on('change', function(){
			$('#tot_memb').val($('#tot_borrower').val());
		});
		$('#tot_male').on('change', function(){
			var tot_gender = parseInt($('#tot_male').val()) + parseInt($('#tot_female').val());
			if($('#tot_memb').val() < tot_gender){
				$('#submit').attr('disabled', 'disabled');
				alert('Gender Count Exceeded Total Member');
			}else{
				$('#submit').removeAttr('disabled');
			}
		});
		$('#tot_female').on('change', function(){
			var tot_gender = parseInt($('#tot_male').val()) + parseInt($('#tot_female').val());
			if($('#tot_memb').val() < tot_gender){
				$('#submit').attr('disabled', 'disabled');
				alert('Gender Count Exceeded Total Member');
			}else{
				$('#submit').removeAttr('disabled');
			}
		});
		$('#tot_big').change(function () {
            cnt_total2($(this).val());
        });
        $('#tot_marginal').change(function () {
            cnt_total2($(this).val());
        });
        $('#tot_landless').change(function () {
            cnt_total2($(this).val());
        });
        $('#tot_hig').change(function () {
            cnt_total2($(this).val());
        });
		function cnt_total2(value) {
            var total2 = $('#total2').val();
            if (total2 == '') {
                total2 = 0;
            }
            var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_landless').val()) + parseInt($('#tot_hig').val());
//            $('#total').val(count);
            $('#total2').val(count).change();
        }
		$('#total2').on('change', function () {
			console.log($(this).val());
            if($('#total2').val() > $('#tot_memb').val()){
				alert('Borrower Classification Count Exceeded Total Member');
				$('#submit').attr('disabled', 'disabled');
			}else{
				$('#submit').removeAttr('disabled');
			}
        });
    </script>