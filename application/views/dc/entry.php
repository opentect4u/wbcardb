<?php
$block_list = json_decode($block_list);
$purpose_list = json_decode($purpose_list);
$selected = json_decode($selected);
$borrower_selected = json_decode($borrower_selected);
$dc_shg_dtls = json_decode($dc_shg_dtls);
$id = $selected ? $selected->id : '0';
if ($id > 0) {
    $disable_button = $selected->fwd_data == 'Y' ? 'disabled' : '';
} else {
    $disable_button = '';
}
// var_dump($dc_shg_dtls);exit;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> </h4>
		<?= form_open('dc/dc_save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4 class="mb-4">DC Form Entry <small>SHG</small> <label class="sanc-amt pull-right" id="view_sanc" style="display:none;">Sanction Limit<br><center><span id="sanc_amt"></span></center></label></h4> <hr>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $selected ? $selected->date : '' ?>" required="">
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
                                        <input type="text" class="form-control" value="SHG" required="" disabled>
                                        <input type="hidden" class="form-control" name="sector" id="sector" value="23" required="">
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
                                        <input type="decimal" class="form-control" name="rete_of_interest" id="rate_of_interest" value="<?= $selected ? $selected->roi : '0.00' ?>"  oninput="validate(this)" required="">
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
						    echo '<option value="' . $purpose->purpose_code . '" ' . $select . '>' . $purpose->purpose_name . '</option>';
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
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Bond No</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ag_bound" id="ag_bound" value="<?= $selected ? $selected->ag_bound : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-13">
                        <div class="table-responsive margin-topp-remove">
                            <table id="table" class="table m">
                                <thead>
                                    <tr>
                                        <th>Name of the SHG/s</th>
                                        <th>Total <br>Numbers</th>
                                        <th>Address</th>
                                        <th>Block</th>
                                        <th>BOD Sanction Date</th>
                                        <th>Due Date</th>
                                        <th>Loan Id.</th>
                                        <th>Project Cost</th>
                                        <th>Amount Sanctioned</th>
                                        <th>Total Own <br>Contribution <br>(Rs.)</th>
                                        <th>Corpus Fund</th>
                                        <th>Amount <br>Disbursed <br>(Rs)</th>
                                        <th>Intersee <br>Agreement Date</th>
                                        <th>Bond No</th>
                                        <th>

                                        <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
				    <?php
				    if (sizeof($dc_shg_dtls) > 0) {
					$i = 1;
					foreach ($dc_shg_dtls as $dt) {
					    echo '<tr id="row_' . $i . '">';
					    echo '<td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="shg_name[]" id="shg_name_' . $i . '" value="' . $dt->shg_name . '" onchange="count_shg()" style="width:230px" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="number[]" id="number_' . $i . '" value="' . $dt->tot_memb . '" onchange="count_number(' . $i . ')" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control textarea-width required" name="address[]" id="address_' . $i . '" rows="1" cols="50" value="' . $dt->shg_addr . '" style="width:230px"></div>
                                      </td>
                                      <td><div class="form-group">
                                      <select class="form-control block-width" id="block_id_1" name="block_id[]" required >
                                      <option value="">Select</option>';
					    if ($block_list) {
						foreach ($block_list as $block) {
						    $select = "";
						    if ($dt->block_code == $block->block_code) {
							$select = "selected";
						    }
						    echo '<option value="' . $block->block_code . '" ' . $select . '>' . $block->block_name . '</option>';
						}
					    }
					    echo '</select></div></td>';
					    // echo '<td><div class="form-group"><input type="text" class="form-control width-th required" name="rete_of_interest[]" id="rate_of_interest_'.$i.'" value="'.$dt->roi.'" /></div></td>';
					    echo '<td>
                                          <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' . $i . '" value="' . $dt->bod_sanc_dt . '" onchange="checkbod_dt(' . $i . ')"/></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' . $i . '" value="' . $dt->due_dt . '" readonly/></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_' . $i . '" value="' . $dt->brrwr_sl_no . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="project_cost[]" id="project_cost_' . $i . '" value="' . $dt->project_cost . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="number" class="form-control width-th required" name="sanction_amount[]" id="sanction_amount_' . $i . '" value="' . $dt->sanc_amt . '" onchange="check_amt(' . $i . ')"/></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="own_contribution[]" id="own_contribution_' . $i . '" value="' . $dt->tot_own_amt . '" readonly/></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="corp_fnd[]" id="corp_fnd_' . $i . '" value="' . $dt->corp_fnd . '" onchange="checkcorp_fnd(' . $i . ')" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="disbursed_amount[]" id="disbursed_amount_' . $i . '" value="' . $dt->disb_amt . '"  onchange="checkdisb_amt(' . $i . ')"/></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_' . $i . '" value="' . $dt->intr_aggr_dt . '" onchange="checkagree_dt(' . $i . ')"/></div>
                                      </td>
                                      
                                      <td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete(' . $i . ')"><i class="fa fa-remove"></i></button></td>';
					    echo '</tr>';
					    $i++;
					}
				    } else {
					?>
    				    <tr id="row_1">
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="shg_name[]" id="shg_name_1" value="" onchange="count_shg()" style="width:230px"/></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="number[]" id="number_1" onchange="count_number(1)" /></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control required" name="address[]" id="address_1" style="width:230px"></div>
    					</td>
    					<td>
    					    <div class="form-group">
    						<select class="form-control block-width" id="block_id_1" name="block_id[]" required >
    						    <option value="">Select</option>
							<?php
							if ($block_list) {
							    foreach ($block_list as $block) {
								echo '<option value="' . $block->block_code . '">' . $block->block_name . '</option>';
							    }
							}
							?>
    						</select>
    					    </div>
    					</td>
    					<!-- <td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="rete_of_interest[]" id="rate_of_interest_1" /></div>
    					</td> -->
    					<td>
    					    <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_1" value="<?= date('Y-m-d') ?>" onchange="checkbod_dt(1)" /></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_1" value="" readonly /></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_1" value="" /></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="project_cost[]" id="project_cost_1" onchange="pro_cost(1)" /></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_amount[]" id="sanction_amount_1" value="0" onchange="check_amt(1)"/></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="own_contribution[]" id="own_contribution_1" value="0" readonly/></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="corp_fnd[]" id="corp_fnd_1" value="0"  onchange="checkcorp_fnd(1)"/></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="text" class="form-control width-th required" name="disbursed_amount[]" id="disbursed_amount_1" value="0" onchange="checkdisb_amt(1)" /></div>
    					</td>
    					<td>
    					    <div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_1" value="<?= date('Y-m-d') ?>" onchange="checkagree_dt(1)"/></div>
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
                            <div class="col-md-12"><label><b><u>SHG Details</u></b></label></div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total SHG</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_shg" id="tot_shg" value="<?= $borrower_selected ? $borrower_selected->tot_shg : '0'; ?>" required="" disabled>
                                        <input type="hidden" class="form-control" name="total_shg" id="total_shg" value="<?= $borrower_selected ? $borrower_selected->tot_shg : '0'; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Members</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_memb" id="tot_memb" value="<?= $borrower_selected ? $borrower_selected->tot_memb : '0'; ?>" required="" disabled>
                                        <input type="hidden" class="form-control" name="total_memb" id="total_memb" value="<?= $borrower_selected ? $borrower_selected->tot_memb : '0'; ?>" >
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
                                    <label class="col-sm-6 col-form-label">OBC A</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control width-obc" name="tot_obca" id="tot_obca" value="<?= $borrower_selected ? $borrower_selected->tot_obca : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">OBC B</label>
                                    <div class="col-sm-6">
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
                        <div class="row">
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
	    $(document).ready(function () {
		var entry_date = <?= $selected ? $selected->date : '0' ?>;
		if (entry_date > 0) {
		    $("#date").change();
		}
	    });
	    $("#date").on('change', function () {
		$.ajax({
		    type: "GET",
		    url: "<?php echo site_url('dc/get_sanc_amt/'); ?>",
		    data: {sector_id: $("#sector").val(), date: $("#date").val()},
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
                //add on 12/12/2021
        var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
        // alert(count);
		 $('#total').val(count);
		// $('#tot_count').val(count);
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
		// var total = parseInt($('#tot_memb').val());
		if (x < count) {
		    if ($('#shg_name_' + x).val() != '' && $('#number_' + x).val() != '') {
			x++;
			$('#table').append('<tr id="row_' + x + '">'
				+ '<td><div class="form-group"><input type="text" class="form-control required" name="shg_name[]" id="shg_name_' + x + '" onchange="count_shg()" /></div></td>'
				+ '<td><div class="form-group"><input type="text" class="form-control required" name="number[]" id="number_' + x + '" onchange="count_number(' + x + ')" /></div></td>'
				+ '<td><div class="form-group"><input type="text" class="form-control required" name="address[]" id="address_' + x + '"></div></td>'
				+ '<td><div class="form-group"><select class="form-control block-width" id="block_id_' + x + '" name="block_id[]" required ><option value="">Select</option>'
				+ '<?php
	if ($block_list) {
	    foreach ($block_list as $block) {
		echo '<option value="' . $block->block_code . '">' . $block->block_name . '</option>';
	    }
	}
	?>'
				+ '</select></div></td>'
				// +'<td><div class="form-group"><input type="text" class="form-control required" name="rete_of_interest[]" id="rate_of_interest_'+ x +'" /></div></td>'
				+ '<td><div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' + x + '" value="<?= date('Y-m-d') ?>" onchange="checkbod_dt(' + x + ')"/></div></td>'
				+ '<td><div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' + x + '" value="" readonly /></div></td>'
				+ '<td><div class="form-group"><input type="text" class="form-control required" name="brrwr_sl_no[]" id="brrwr_sl_no_' + x + '" /></div></td>'
				+ '<td><div class="form-group"><input type="text" class="form-control required" name="project_cost[]" id="project_cost_' + x + '" onchange="pro_cost(' + x + ')" /></div></td>'
				+ '<td><div class="form-group"><input type="number" class="form-control required" name="sanction_amount[]" id="sanction_amount_' + x + '" value="0" onchange="check_amt(' + x + ')"/></div></td>'
				+ '<td><div class="form-group"><input type="text" class="form-control required" name="own_contribution[]" id="own_contribution_' + x + '" value="0" readonly/></div></td>'
                + '<td><div class="form-group"><input type="text" class="form-control required" name="corp_fnd[]" id="corp_fnd_' + x + '"  value="0" onchange="checkcorp_fnd(' + x + ')"/></div></td>'
                + '<td><div class="form-group"><input type="text" class="form-control required" name="disbursed_amount[]" id="disbursed_amount_' + x + '"  value="0" onchange="checkdisb_amt(' + x + ')" /></div></td>'
			
				+ '<td><div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_' + x + '" value="<?= date('Y-m-d') ?>" onchange="checkagree_dt(' + x + ')" /></div></td>'
				+ '<td><button type="button" id="remove_' + x + '" class="btn btn-danger" onclick="_delete(' + x + ')"><i class="fa fa-remove"></i></button></td>'
				+ '</tr>');
			// var y = x-1;

			// $('#tot_shg').val(y);
			// $('#tot_memb').val(total);

		    } else {
			alert('Please Fill All Details');
			return false;
		    }
		}
	    });

	    function count_shg() {
		if ($('#shg_name_' + x).val() != '') {
		    $('#tot_shg').val(x);
		    $('#total_shg').val(x);
		} else {
		    var y = x - 1;
		    $('#tot_shg').val(y);
		    $('#total_shg').val(x);
		}
	    }

	    function count_number(id) {
		var total = parseInt($('#number_1').val());
		if ($('#number_' + id).val() != '') {
		    if (id == 1) {
			$('#tot_memb').val(total);
			$('#total_memb').val(total);
		    } else {
			total = parseInt($('#number_' + id).val()) + parseInt($('#tot_memb').val());
			$('#tot_memb').val(total);
			$('#total_memb').val(total);
		    }
		} else {
		    total = parseInt($('#number_' + id).val()) + parseInt($('#tot_memb').val());
		    $('#tot_memb').val(total);
		    $('#total_memb').val(total);
		}
	    }

	    function _delete(id) {
		var r = confirm("Do you want to delete this?");
		if (r == true) {
		    var pre_val = $('#number_' + id).val();
		    $('#row_' + id).remove();
		    x--;
		    $('#tot_memb').val($('#tot_memb').val() - pre_val);
		    $('#tot_shg').val(x);
		} else {
		    return false;
		}
	    }



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

//agriment_date
function checkagree_dt(id){
    var sanc_dt = $('#agriment_date_'+ id).val();
    //alert(sanc_dt);
    var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
	(month<10 ? '0' : '') + month + '-' +
	(day<10 ? '0' : '') + day;
    if(new Date(output) < new Date(sanc_dt))
		{
		alert("Agreement Date Can Not Be Greater Than Current Date");
        $('#agriment_date_'+ id).val(output);
		// $('#submit').attr('type', 'buttom');
		return false;
		}else{
		// $('#submit').attr('type', 'submit');
        return false;
		}
}


function checkcorp_fnd(id){
    $('#corp_fnd_' + id).val(parseInt($('#corp_fnd_' + id).val()));
}
        function checkdisb_amt(id){
            // alert('hi');
            // alert(parseInt($('#project_cost_' + id).val()));
            // alert(parseInt($('#disbursed_amount_' + id).val()));
            $('#disbursed_amount_' + id).val(parseInt($('#disbursed_amount_' + id).val()));
    if (parseInt($('#disbursed_amount_' + id).val()) > parseInt($('#sanction_amount_').val())) {
		    alert('Disbursed Amount is exceeds Sanction Amount');
            $('#disbursed_amount_' + id).val(0);
		    $('#submit').attr('disabled', 'disabled');
		} else {
		    $('#submit').removeAttr('disabled');
        }
           
            if(parseInt($('#disbursed_amount_' + id).val()) > parseInt($('#project_cost_' + id).val())){
                    $('#submit').attr('disabled', 'disabled');
                    alert('Disbursed Amount Can Not Be Greater Than Sanction/Project cost Amount');
                    $('#disbursed_amount_' + id).val(0);

                }else{
                    $('#submit').removeAttr('disabled'); 
                }
		

}

	    function check_amt(id) {
           //alert($('#sanc_amt').text());
          $('#sanction_amount_' + id).val(parseInt($('#sanction_amount_' + id).val()));
		if (parseInt($('#sanction_amount_' + id).val()) > $('#sanc_amt').text()) {
		    alert('Sanction Amount is Exceeded With Limit');
            $('#sanction_amount_' + id).val(0);
		    $('#submit').attr('disabled', 'disabled');
		} else {
		    $('#submit').removeAttr('disabled');
		}
		count_own_cont(id);
	    }

	    function pro_cost(id) {
            $('#project_cost_' + id).val(parseInt($('#project_cost_' + id).val()));
            // alert('hi');
            // parseFloat($('#project_cost_' + id).val()).toFixed(2);
		count_own_cont(id);
//                var project_cost = $('#project_cost_' + x).val();
//                $('#sanction_amount_' + x).val(project_cost);
//                $('#disbursed_amount_' + x).val(project_cost);
//                check_amt(id);
	    }

	    function count_own_cont(id) {
            if(parseInt($('#project_cost_' + id).val()) - parseInt($('#sanction_amount_' + id).val())<0){
                $('#own_contribution_' + id).val(0);
            }else{
		$('#own_contribution_' + id).val(parseInt($('#project_cost_' + id).val()) - parseInt($('#sanction_amount_' + id).val()));
        }
	    }

	    $('#tot_sc').change(function () {
		// alert($(this).val());
        var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
        if (parseInt($(this).val())> parseInt($('#total_memb').val()) ||parseInt( $('#total').val())>parseInt($('#total_memb').val())) {
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
		// alert($(this).val());
        var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#total_memb').val()) ||parseInt( count)>parseInt($('#total_memb').val())) {
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
		//count_total($(this).val());
        var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#total_memb').val()) ||parseInt( count)>parseInt($('#total_memb').val())) {
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
                if (parseInt($(this).val())> parseInt($('#total_memb').val()) ||parseInt( count)>parseInt($('#total_memb').val())) {
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
		// check_total_member();
        var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#total_memb').val()) ||parseInt( count)>parseInt($('#total_memb').val())) {
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
		//count_total($(this).val());
		// check_total_member();
        var count = parseInt($('#tot_sc').val()) + parseInt($('#tot_st').val()) + parseInt($('#tot_obca').val()) + parseInt($('#tot_obcb').val()) + parseInt($('#tot_gen').val()) + parseInt($('#tot_oth').val());
                if (parseInt($(this).val())> parseInt($('#total_memb').val()) ||parseInt( count)>parseInt($('#total_memb').val())) {
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
		    alert('Data is greater than Total Members');
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
            $('#tot_men').val(0); 
             $('#tot_wom').val(0);
		}
	    }


	    $('#tot_big').change(function () {
		// check_total_member();
        var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
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
		// check_total_member();
        var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
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
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_small").focus();
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
	    $('#tot_landless').change(function () {
		//check_total_member();
        var count = parseInt($('#tot_big').val()) + parseInt($('#tot_marginal').val()) + parseInt($('#tot_small').val()) + parseInt($('#tot_landless').val());
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_landless").focus();
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
	    $('#tot_lig').change(function () {
		// check_total_member();
        var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
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
		// check_total_member();
        var count = parseInt($('#tot_lig').val()) + parseInt($('#tot_mig').val()) + parseInt($('#tot_hig').val());
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
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
                if (parseInt($(this).val())> parseInt($('#tot_memb').val()) ||parseInt( count)>parseInt($('#tot_memb').val())) {
                    alert('Data is greater  than Total Members');
                    document.getElementById("tot_hig").focus();
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
$(document).ready(function(){
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

		//$('#submit').attr('type', 'buttom');
		return false;
		}else{
		//$('#submit').attr('type', 'submit');
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
// alert(new Date(output));
// alert(new Date(memo_date));
		if(new Date(output) <new Date(memo_date))
		{
		alert("Memo Date is Greater Than Current Date");
        $('#date').val(output);
		//$('#submit').attr('type', 'buttom');
		return false;
		}else{
		//$('#submit').attr('type', 'submit');
        return true;
		}
	})
});
</script>
<script>
       function myFunction() {
        var  sum_borrow=parseInt($('#total_memb').val())
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
            $('#submit').attr('disabled', 'disabled');
                       alert('Borrower Classification Value Must Be Greater Than 0');
                   
                   }else{
                    $('#submit').removeAttr('disabled');    
                       
                   }

                   if(sum_borrow!=total_borrower|| sum_borrow!=tot_cast || sum_borrow!=total_group){
            
            
            alert(' Total Members Not matched with other group');
            $('#submit').attr('disabled', 'disabled');
        }else{
         $('#submit').removeAttr('disabled');    
            

}

}

    </script>
    <!-- <script>
        $('#rate_of_interest').on('change', function () {
            // alert('hi');
            $(this).val(parseFloat($(this).val()).toFixed(2));
    
            
        });
    </script> -->

    <script>

      var validate = function(e) {
          var t = e.value;
          e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
      }
  </script>