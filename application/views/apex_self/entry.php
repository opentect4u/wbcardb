<?php
//$block_list = json_decode($block_list);
$sector_list = json_decode($sector_list);
$selected = json_decode($selected);
//$selected = json_decode($selected);
$apex_shg = json_decode($apex_shg);
//var_dump($apex_shg);
//exit;
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
		<?= form_open('apex_self/save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4 class="mb-4">APEX OTHER THAN SHG <small>Entry Form</small></h4> <hr>
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
                                    <th>LSO No</th>
                                    <th>Branch Loan File No.</th>
                                    <th>Block</th>
                                    <th>Loan Id</th>
                                    <th>Name of the Borrower</th>
                                    <th>Moratorium</th>
                                    <th>Loan</th>
                                    <th>Total Period</th>
                                    <th>Purpose</th>
                                    <th>Rate of Interest</th>
                                    <th>Project Cost</th>
                                    <th>Own Contribution</th>
                                    <th>Amount Of Loan Sanction</th>
                                    <th>Remaining Disbursement Amount</th>
                                    <th>Installment</th>
                                    <th>Disbursement Date</th>
                                    <th>Disbursement Amount</th>
                                    <th>Corpus Fund</th>
                                    <th>Net Amount</th>
                                    <th>Land Offered as Security<br><i><small>(in acres)</small></i></th>
                                    <th>Cultivated Area<br><i><small>(in acres)</small></i></th>
                                    <th>Value of Hypothecation</th>
                                    <th>Gross Income Generated<br><i><small>(Loan) Rs.</small></i></th>
                                    <th>Registration of M. Bond<br><i><small>Date</small></i></th>
                                    <th>Registration of M. Bond<br><i><small>No</small></i></th>
                                    <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                </tr>
                            </thead>
                            <tbody>
				<?php
				if (sizeof($apex_shg) > 0) {
				    $i = 1;
				    foreach ($apex_shg as $shg) {
                        // print_r($shg);
                        // exit;
					echo '<tr id="row_1">';
					echo '<td>
                                        <div class="form-group"><input type="text" class="form-control" name="lso_no[]" id="lso_no_' . $i . '" value="' . $shg->lso_no . '" required="" onchange="get_result(' . $i . ');"></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="file_no[]" id="file_no_' . $i . '" value="' . $shg->file_no . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="block_name[]" id="block_name_' . $i . '" value="' . $shg->block_name . '" required="" readonly />
                                            <input type="hidden" name="block_id[]" id="block_id_' . $i . '" value="' . $shg->block_id . '"/></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="loan_id[]" id="loan_id_' . $i . '" value="' . $shg->loan_id . '" required=""  /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="name_of_borr[]" id="name_of_borr_' . $i . '" value="' . $shg->name_of_borr . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="moratorium[]" id="moratorium_' . $i . '" value="' . $shg->moratorium . '" required="" readonly /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="loan[]" id="loan_' . $i . '" value="' . $shg->loan . '" required="" readonly /></div>
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
                                        <div class="form-group"><input type="text" class="form-control required" name="inst_amt[]" id="inst_amt_' . $i . '" value="' . $shg->inst_amt . '" onchange="get_net_amt('. $i .')" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="corp_fund[]" id="corp_fund_' . $i . '" value="' . $shg->corp_fund . '" required="" onchange="get_net_amt('. $i .')" /></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" class="form-control" name="net_amount[]" id="net_amount_' . $i . '" value="' . $shg->net_amount . '" required="" readonly /></div>
                                    </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="lnd_off_sec[]" id="lnd_off_sec_' . $i . '" value="' . $shg->lnd_off_sec . '" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="cult_area[]" id="cult_area_' . $i . '" value="' . $shg->cult_area . '" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="val_of_hypo[]" id="val_of_hypo_' . $i . '" value="' . $shg->val_of_hypo . '" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="gros_inc_gen[]" id="gros_inc_gen_' . $i . '" value="' . $shg->gros_inc_gen . '" required="" readonly /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="date" class="form-control" name="reg_m_bond_dt[]" id="reg_m_bond_dt_' . $i . '" value="' . $shg->reg_m_bond_dt . '" required=""  /></div>
                                        </td>
                                        <td>
                                            <div class="form-group"><input type="text" class="form-control" name="reg_m_bond_no[]" id="reg_m_bond_no_' . $i . '" value="' . $shg->reg_m_bond_no . '" required=""  /></div>
                                        </td>';
					echo'<td><button type="button" id="remove_' . $i . '" class="btn btn-danger" onclick="_delete(' . $i . ')"><i class="fa fa-remove"></i></button></td>';
					echo '</tr>';
				    }
				} else {
				    ?>
    				<tr id="row_1">
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="lso_no[]" id="lso_no_1" value="<?= $selected ? $selected->lso_no : '' ?>" required="" onchange="get_result(1);"></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="file_no[]" id="file_no_1" value="<?= $selected ? $selected->file_no : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="block_name[]" id="block_name_1" value="<?= $selected ? $selected->block_id : ''; ?>" required="" readonly />
    					    <input type="hidden" name="block_id[]" id="block_id_1" value=""/></div>
    				    </td>
                        <td>
    					<div class="form-group"><input type="text" class="form-control" name="loan_id[]" id="loan_id_1" value="<?= $selected ? $selected->loan_id : ''; ?>" required=""  /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="name_of_borr[]" id="name_of_borr_1" value="<?= $selected ? $selected->name_of_borr : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="moratorium[]" id="moratorium_1" value="<?= $selected ? $selected->moratorium : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="loan[]" id="loan_1" value="<?= $selected ? $selected->loan : ''; ?>" required="" readonly /></div>
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
    					<div class="form-group"><input type="text" class="form-control required" name="inst_amt[]" id="inst_amt_1" onchange="get_net_amt(1)" /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="corp_fund[]" id="corp_fund_1" value="<?= $selected ? $selected->corp_fund : '0'; ?>" required="" onchange="get_net_amt(1)" /></div>
    				    </td>

                        <td>
    					<div class="form-group"><input type="text" class="form-control" name="net_amount[]" id="net_amount_1" value="<?= $selected ? $selected->net_amount : ''; ?>" required="" readonly /></div>
    				    </td>
                        
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="lnd_off_sec[]" id="lnd_off_sec_1" value="<?= $selected ? $selected->lnd_off_sec : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="cult_area[]" id="cult_area_1" value="<?= $selected ? $selected->cult_area : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="val_of_hypo[]" id="val_of_hypo_1" value="<?= $selected ? $selected->val_of_hypo : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="gros_inc_gen[]" id="gros_inc_gen_1" value="<?= $selected ? $selected->gros_inc_gen : ''; ?>" required="" readonly /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="date" class="form-control" name="reg_m_bond_dt[]" id="reg_m_bond_dt_1" value="<?= $selected ? $selected->reg_m_bond_dt : ''; ?>" required=""  /></div>
    				    </td>
    				    <td>
    					<div class="form-group"><input type="text" class="form-control" name="reg_m_bond_no[]" id="reg_m_bond_no_1" value="<?= $selected ? $selected->reg_m_bond_no : ''; ?>" required=""  /></div>
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
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Small</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_small" id="tot_small" value="<?= $selected ? $selected->tot_small : '0'; ?>" required="" />
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
                                <label class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="total2" value="0" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label><b><u>Income Group</u></b></label></div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">LIG</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_lig" id="tot_lig" value="<?= $selected ? $selected->tot_lig : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">MIG</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_mig" id="tot_mig" value="<?= $selected ? $selected->tot_mig : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">HIG</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="tot_hig" id="tot_hig" value="<?= $selected ? $selected->tot_hig : '0'; ?>" required="" />
                                </div>
                            </div>
                        </div>
			<div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="total3" value="0" readonly />
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
			    + '<td><div class="form-group"><input type="text" class="form-control" name="lso_no[]" id="lso_no_' + x + '" value="" required="" onchange="get_result(' + x + ');"></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="file_no[]" id="file_no_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="block_name[]" id="block_name_' + x + '" value="" required="" readonly /><input type="hidden" name="block_id[]" id="block_id_' + x + '" value=""/></div></td>'
                + '<td><div class="form-group"><input type="text" class="form-control" name="loan_id[]" id="loan_id_' + x + '" value="" required=""  /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="name_of_borr[]" id="name_of_borr_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="moratorium[]" id="moratorium_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="loan[]" id="loan_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="repay_per_tot[]" id="repay_per_tot_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="purpose_name[]" id="purpose_name_' + x + '" value="" required="" readonly /><input type="hidden" name="purpose_code[]" id="purpose_code_' + x + '" value="" /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="roi[]" id="roi_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="pro_cost[]" id="pro_cost_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="own_cont[]" id="own_cont_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="sanc_amt[]" id="sanc_amt_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" id="remaining_sanc_amt_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control required" name="inst_sl_no[]" id="inst_sl_no_' + x + '" value="" /></div></td>'
			    + '<td><div class="form-group"><input type="date" class="form-control required" name="inst_date[]" id="inst_date_' + x + '" value="<?= date('Y-m-d') ?>" /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control required" name="inst_amt[]" id="inst_amt_' + x + '" onchange="get_net_amt('+ x +')" /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="corp_fund[]" id="corp_fund_' + x + '" value="0" required="" onchange="get_net_amt('+ x +')"  /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="net_amount[]" id="net_amount_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="lnd_off_sec[]" id="lnd_off_sec_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="cult_area[]" id="cult_area_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="val_of_hypo[]" id="val_of_hypo_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="gros_inc_gen[]" id="gros_inc_gen_' + x + '" value="" required="" readonly /></div></td>'
			    + '<td><div class="form-group"><input type="date" class="form-control" name="reg_m_bond_dt[]" id="reg_m_bond_dt_' + x + '" value="" required=""  /></div></td>'
			    + '<td><div class="form-group"><input type="text" class="form-control" name="reg_m_bond_no[]" id="reg_m_bond_no_' + x + '" value="" required=""  /></div></td>'
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
	    if ($('#tot_count').val() > $('#tot_memb').val()) {
		alert('Cast Count Exceeded Total Member');
		$('#submit').attr('disabled', 'disabled');
	    } else {
		$('#submit').removeAttr('disabled');
	    }
	});
    </script>
    <script>
//        $('#lso_no_' + x).on('change', function () {
	function get_result(id) {
	    $.ajax({
		type: "GET",
		url: "<?php echo site_url('apex_self/get_apex_details/'); ?>",
		data: {ardb_id: $("#ardb_id").val(), lso_no: $('#lso_no_' + id).val()},
		dataType: 'html',
		success: function (result) {
		    var result = $.parseJSON(result);
		    console.log(result);
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

	$('#tot_memb').on('change', function () {
	    $('#tot_borrower').val($('#tot_memb').val());
	});
	$('#tot_borrower').on('change', function () {
	    $('#tot_memb').val($('#tot_borrower').val());
	});
	$('#tot_male').on('change', function () {
	    var tot_gender = parseInt($('#tot_male').val()) + parseInt($('#tot_female').val());
	    if ($('#tot_memb').val() < tot_gender) {
		$('#submit').attr('disabled', 'disabled');
		alert('Gender Count Exceeded Total Member');
	    } else {
		$('#submit').removeAttr('disabled');
	    }
	});
	$('#tot_female').on('change', function () {
	    var tot_gender = parseInt($('#tot_male').val()) + parseInt($('#tot_female').val());
	    if ($('#tot_memb').val() < tot_gender) {
		$('#submit').attr('disabled', 'disabled');
		alert('Gender Count Exceeded Total Member');
	    } else {
		$('#submit').removeAttr('disabled');
	    }
	});
	$('#tot_big').change(function () {
	    cnt_total2($(this).val());
	});
	$('#tot_marginal').change(function () {
	    cnt_total2($(this).val());
	});
	$('#tot_small').change(function () {
	    cnt_total2($(this).val());
	});
	$('#tot_landless').change(function () {
	    cnt_total2($(this).val());
	});
	function cnt_total2(value) {
	    var total2 = $('#total2').val();
	    if (total2 == '') {
		total2 = 0;
	    }
	    var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
//            $('#total').val(count);
	    $('#total2').val(count).change();
	}
	$('#total2').on('change', function () {
	    console.log($(this).val());
	    if ($('#total2').val() > $('#tot_memb').val()) {
		alert('Borrower Classification Count Exceeded Total Member');
		$('#submit').attr('disabled', 'disabled');
	    } else {
		$('#submit').removeAttr('disabled');
	    }
	});

	$('#tot_lig').change(function () {
	    cnt_total3($(this).val());
	});
	$('#tot_mig').change(function () {
	    cnt_total3($(this).val());
	});
	$('#tot_hig').change(function () {
	    cnt_total3($(this).val());
	});
	function cnt_total3(value) {
	    var total3 = $('#total3').val();
	    if (total3 == '') {
		total3 = 0;
	    }
	    var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
//            $('#total').val(count);
	    $('#total3').val(count).change();
	}
	$('#total3').on('change', function () {
	    console.log($(this).val());
	    if ($('#total3').val() > $('#tot_memb').val()) {
		alert('Income Group Count Exceeded Total Member');
		$('#submit').attr('disabled', 'disabled');
	    } else {
		$('#submit').removeAttr('disabled');
	    }
	});
    </script>

    <script>
        function get_net_amt(id) {
            var dis = $('#inst_amt_'+id).val()
            var corp_amt = $('#corp_fund_'+id).val();
            if(parseInt(dis) < parseInt(corp_amt)){
                alert('Corpus Fund must be lesser than Disburstment amount');
                $('#corp_fund_'+id).val(0);
                $('#net_amount_'+id).val(0);
                $('#corp_fund_'+id).focus();
                $('#submit').attr('disabled', 'disabled');
            }else{
                $('#net_amount_'+id).val(dis - corp_amt);
                $('#submit').removeAttr('disabled');
            }
        }
    </script>