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
// echo '<pre>'; var_dump($block_list);exit;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> </h4>
                <?= form_open('ho/dc_self/dc_save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4>DC Form Entry <small>Other Than SHG</small></h4> <hr>
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
                                        <!--<th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>-->
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
                                      <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' . $i . '" value="' . $dt->due_dt . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_' . $i . '" value="' . $dt->brrwr_sl_no . '" /></div>
                                    </td>';
                                            // echo '<td><div class="form-group"><input type="text" class="form-control width-th required" name="rate_of_interest[]" id="rate_of_interest_' . $i . '" value="' . $dt->roi . '" /></div></td>';
                                            echo '<td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="project_cost[]" id="project_cost_' . $i . '" value="' . $dt->project_cost . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_block[]" id="sanction_block_' . $i . '" value="' . $dt->sanc_block . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_working[]" id="sanction_working_' . $i . '" value="' . $dt->sanc_working . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_total[]" id="sanction_total_' . $i . '" value="' . $dt->sanc_total . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_block[]" id="disbursement_block_' . $i . '" value="' . $dt->dis_block . '" /></div>
                                    </td>
                                    <td>
                                      <div class="form-group"><input type="text" class="form-control width-th required" name="disbursement_working[]" id="disbursement_working_' . $i . '" value="' . $dt->dis_working . '" /></div>
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
                                    </td>';
//                                    echo '<td><button type="button" id="remove_' . $i . '" class="btn btn-danger" onclick="_delete(' . $i . ')"><i class="fa fa-remove"></i></button></td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    }
                                    ?>
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
                                        <input type="text" class="form-control" name="tot_men" id="tot_men" value="<?= $borrower_selected ? $borrower_selected->tot_male : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Women</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tot_wom" id="tot_wom" value="<?= $borrower_selected ? $borrower_selected->tot_female : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><label><b><u>Caste</u></b></label></div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SC</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_sc" id="tot_sc" value="<?= $borrower_selected ? $borrower_selected->tot_sc : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ST</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_st" id="tot_st" value="<?= $borrower_selected ? $borrower_selected->tot_st : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">OBC A</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_obca" id="tot_obca" value="<?= $borrower_selected ? $borrower_selected->tot_obca : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">OBC B</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_obcb" id="tot_obcb" value="<?= $borrower_selected ? $borrower_selected->tot_obcb : '0'; ?>" required="">
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
                                    <label class="col-sm-4 col-form-label">Total</label>
                                    <div class="col-sm-8">
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
                                        <input type="text" class="form-control" name="tot_big" id="tot_big" value="<?= $borrower_selected ? $borrower_selected->tot_big : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Marginal</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_marginal" id="tot_marginal" value="<?= $borrower_selected ? $borrower_selected->tot_marginal : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Small</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_small" id="tot_small" value="<?= $borrower_selected ? $borrower_selected->tot_small : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Landless</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_landless" id="tot_landless" value="<?= $borrower_selected ? $borrower_selected->tot_landless : ''; ?>" required="">
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
                                        <input type="text" class="form-control" name="tot_lig" id="tot_lig" value="<?= $borrower_selected ? $borrower_selected->tot_lig : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">MIG</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_mig" id="tot_mig" value="<?= $borrower_selected ? $borrower_selected->tot_mig : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">HIG</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_hig" id="tot_hig" value="<?= $borrower_selected ? $borrower_selected->tot_hig : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                    <input type="hidden" name="id" value="<?= $selected ? $selected->id : '0'; ?>">
                    <div class="col-md-12 pt-5">
                        <div class="form-group row bttn-align">
                            <div class="col-md-2">
                                <input type="button" id="submit" class="btn btn-danger" value="Reject" onclick="reject()" <?= $disable_button ?>/>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" id="submit" class="btn btn-info" value="Save" <?= $disable_button ?>/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?= form_close(); ?>

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
            function reject() {
                window.location.href = "<?= site_url('ho/dc_self/dc_reject/' . $ardb_id . '/' . $pronote_no . '/' . $memo_no); ?>";
            }
        </script>
        <script>
            var count = 20;
            var x = $('#table tbody > tr').length;

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
            }
        </script>