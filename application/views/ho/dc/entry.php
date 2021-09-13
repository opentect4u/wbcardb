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
                <?= form_open('ho/dc/dc_save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4>DC Form Entry <small>Self SHG</small></h4> <hr>
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
                                        <input type="text" class="form-control" name="rete_of_interest" id="rate_of_interest" value="<?= $selected ? $selected->roi : '0.00' ?>" required="">
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
                                    <label class="col-sm-4 col-form-label">Total Intersee Ag. Bond</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="ag_bound" id="ag_bound" value="<?= $selected ? $selected->ag_bound : ''; ?>" required="">
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
                                        <th>Name of the SHG/s</th>
                                        <th>Total <br>Numbers</th>
                                        <th>Address</th>
                                        <th>Block</th>
                                        <!-- <th>Rate of <br>Interest <br>(%)</th> -->
                                        <th>BOD Sanction Date</th>
                                        <th>Due Date</th>
                                        <th>Borrower<br> SL. No.</th>
                                        <th>Project Cost</th>
                                        <th>Amount Sanctioned</th>
                                        <th>Total Own <br>Contribution <br>(Rs.)</th>
                                        <th>Corpus Fund</th>
                                        <th>Amount <br>Disbursed <br>(Rs)</th>
                                        <th>Intersee <br>Agreement Date</th>
                                        <!-- <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($dc_shg_dtls) > 0) {
                                        $i = 1;
                                        foreach ($dc_shg_dtls as $dt) {
                                            echo '<tr id="row_' . $i . '">';
                                            echo '<td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="shg_name[]" id="shg_name_' . $i . '" value="' . $dt->shg_name . '" onchange="count_shg()" style="width:230px"/></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="number[]" id="number_' . $i . '" value="' . $dt->tot_memb . '" onchange="count_number()" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required textarea-width" name="address[]" id="address_' . $i . '" value="' . $dt->shg_addr . '" style="width:230px"></div>
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
                                            // echo '<td><div class="form-group"><input type="text" class="form-control width-th required" name="rete_of_interest[]" id="rate_of_interest_' . $i . '" value="' . $dt->roi . '" /></div></td>';
                                            echo '<td>
                                          <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_' . $i . '" value="' . $dt->bod_sanc_dt . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_' . $i . '" value="' . $dt->due_dt . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="brrwr_sl_no[]" id="brrwr_sl_no_' . $i . '" value="' . $dt->brrwr_sl_no . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="project_cost[]" id="project_cost_' . $i . '" value="' . $dt->project_cost . '" onchange="pro_cost(' . $i . ')" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="sanction_amount[]" id="sanction_amount_' . $i . '" value="' . $dt->sanc_amt . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="own_contribution[]" id="own_contribution_' . $i . '" value="' . $dt->tot_own_amt . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="corp_fnd[]" id="corp_fnd_' . $i . '" value="' . $dt->corp_fnd . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control width-th required" name="disbursed_amount[]" id="disbursed_amount_' . $i . '" value="' . $dt->disb_amt . '" /></div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_' . $i . '" value="' . $dt->intr_aggr_dt . '" /></div>
                                      </td>';
                                            // echo '<td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete('.$i.')"><i class="fa fa-remove"></i></button></td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    }
                                    ?>
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
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_sc" id="tot_sc" value="<?= $borrower_selected ? $borrower_selected->tot_sc : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">ST</label>
                                    <div class="col-sm-7">
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
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tot_gen" id="tot_gen" value="<?= $borrower_selected ? $borrower_selected->tot_gen : '0'; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Oth.</label>
                                    <div class="col-sm-7">
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
                                    <label class="col-sm-4 col-form-label">Marginal</label>
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
                window.location.href = "<?= site_url('ho/dc/dc_reject/' . $ardb_id . '/' . $pronote_no . '/' . $memo_no); ?>";
            }
        </script>
        <script>
            var count = 20;
            var x = $('#table tbody > tr').length;


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

            function count_number() {
                var total = parseInt($('#number_1').val());
                if ($('#number_' + x).val() != '') {
                    if (x == 1) {
                        $('#tot_memb').val(total);
                        $('#total_memb').val(total);
                    } else {
                        total += parseInt($('#number_' + x).val());
                        $('#tot_memb').val(total);
                        $('#total_memb').val(total);
                    }
                } else {
                    total += parseInt($('#number_' + x).val());
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

            function pro_cost(id) {
                var project_cost = $('#project_cost_' + id).val();
                $('#sanction_amount_' + id).val(project_cost);
                $('#disbursed_amount_' + id).val(project_cost);
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
            $('#tot_oth').change(function () {
                count_total($(this).val());
                // check_total_member();
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