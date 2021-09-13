<?php
$selected = json_decode($selected);
//$readonly = $selected ? 'readonly' : '';
$id = $selected ? $selected->id : '0';
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
                <h4 class="card-title">Fortnightly Return <small>Loan Issue Entry</small></h4> <hr>
                <?= form_open('fortnight/target_save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">From Fin Year</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="frm_fn_year" id="frm_fn_year" value="<?= $selected ? $selected->frm_fn_year : CURRENT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">To Fin Year</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="to_fn_year" id="to_fn_year" value="<?= $selected ? $selected->to_fn_year : NEXT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive margin-topp-remove">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="3"><b>Target of Investment for the year</b> <b><?= CURRENT_YEAR . '-' . NEXT_YEAR ?></b></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>No of Cases</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Farm</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="fm_no_case" id="fm_no_case" value="<?= $selected ? $selected->fm_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="fm_amt" id="fm_amt" value="<?= $selected ? $selected->fm_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Non-Farm</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="nf_no_case" id="nf_no_case" value="<?= $selected ? $selected->nf_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="nf_amt" id="nf_amt" value="<?= $selected ? $selected->nf_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>RH</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="rh_no_case" id="rh_no_case" value="<?= $selected ? $selected->rh_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="rh_amt" id="rh_amt" value="<?= $selected ? $selected->rh_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>SHG/JLG</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="shg_no_case" id="shg_no_case" value="<?= $selected ? $selected->shg_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="shg_amt" id="shg_amt" value="<?= $selected ? $selected->shg_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>LD & Others</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pl_no_case" id="pl_no_case" value="<?= $selected ? $selected->pl_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pl_amt" id="pl_amt" value="<?= $selected ? $selected->pl_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total Investment for the<br> Year <b><?= CURRENT_YEAR . '-' . NEXT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_curr_yr_no_case" id="tot_inv_of_curr_yr_no_case" value="<?= $selected ? $selected->tot_inv_of_curr_yr_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_curr_yr_amt" id="tot_inv_of_curr_yr_amt" value="<?= $selected ? $selected->tot_inv_of_curr_yr_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total upto the end of the previous  <br>Year <b><?= PREVIOUS_YEAR . '-' . CURRENT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_pre_yr_no_case" id="tot_inv_of_pre_yr_no_case" value="<?= $selected ? $selected->tot_inv_of_pre_yr_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_pre_yr_amt" id="tot_inv_of_pre_yr_amt" value="<?= $selected ? $selected->tot_inv_of_pre_yr_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $selected ? $selected->id : 0; ?>">
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                        <div class="col-md-12 pt-5">
                            <div class="form-group row bttn-align">
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-info">Save</button>
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

    <script>
        // COUNT No of CASES
        $('#fm_no_case').on('change', function () {
            total_no_cases($(this).val());
        });
        $('#nf_no_case').on('change', function () {
            total_no_cases($(this).val());
        });
        $('#pl_no_case').on('change', function () {
            total_no_cases($(this).val());
        });
        $('#rh_no_case').on('change', function () {
            total_no_cases($(this).val());
        });
        $('#shg_no_case').on('change', function () {
            total_no_cases($(this).val());
        });
        function total_no_cases(value) {
            var total = $('#tot_inv_of_curr_yr_no_case').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#fm_no_case').val()) + parseInt($('#nf_no_case').val()) + parseInt($('#pl_no_case').val()) + parseInt($('#rh_no_case').val()) + parseInt($('#shg_no_case').val());
            $('#tot_inv_of_curr_yr_no_case').val(count);
        }

        // COUNT AMOUNT
        $('#fm_amt').on('change', function () {
            total_amount($(this).val());
        });
        $('#nf_amt').on('change', function () {
            total_amount($(this).val());
        });
        $('#pl_amt').on('change', function () {
            total_amount($(this).val());
        });
        $('#rh_amt').on('change', function () {
            total_amount($(this).val());
        });
        $('#shg_amt').on('change', function () {
            total_amount($(this).val());
        });
        function total_amount(value) {
            var total = $('#tot_inv_of_curr_yr_amt').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#fm_amt').val()) + parseInt($('#nf_amt').val()) + parseInt($('#pl_amt').val()) + parseInt($('#rh_amt').val()) + parseInt($('#shg_amt').val());
            $('#tot_inv_of_curr_yr_amt').val(count);
        }
    </script>


