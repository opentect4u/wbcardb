<?php
$selected = json_decode($selected);
$report_type = json_decode($report_type);
//$readonly = $selected ? 'readonly' : '';
$id = $selected ? $selected->id : '0';
if ($id > 0) {
    $disable_button = $selected->fwd_data == 'Y' ? 'disabled' : '';
} else {
    $disable_button = '';
}
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
                <h4 class="card-title">Fortnightly Return <small>Report Entry</small></h4> <hr>
                <?= form_open('ho/fortnight/report_save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Return Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="return_dt" id="return_dt" value="<?= $selected ? $selected->return_dt : date('Y-m-d') ?>" required="" <?php //$readonly                                                                                                                                                                 ?>/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">From Fin Year</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="dmd_frm_fin_yr" id="dmd_frm_fin_yr" value="<?= $selected ? $selected->dmd_frm_fin_yr : CURRENT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">To Fin Year</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="dmd_to_fin_yr" id="dmd_to_fin_yr" value="<?= $selected ? $selected->dmd_to_fin_yr : NEXT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Report Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="report_type" id="report_type" required >
                                            <option value="">Select Report Type</option>
                                            <?php
                                            foreach ($report_type as $k => $v) {
                                                $select = "";
                                                if ($selected->report_type == $k) {
                                                    $select = "selected";
                                                }
                                                echo '<option value="' . $k . '" ' . $select . '>' . $v . '</option>';
                                            }
                                            ?>
                                        </select>
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
                                                <th class="text-center text-uppercase" colspan="5"><b>Demand for the year <?= CURRENT_YEAR . '-' . NEXT_YEAR ?></b></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>OD</th>
                                                <th>CR</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_prn_od" id="dmd_prn_od" value="<?= $selected ? $selected->dmd_prn_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_prn_cr" id="dmd_prn_cr" value="<?= $selected ? $selected->dmd_prn_cr : '0' ?>" required="" /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="dmd_prn_tot" id="dmd_prn_tot" value="<?= $selected ? $selected->dmd_prn_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_int_od" id="dmd_int_od" value="<?= $selected ? $selected->dmd_int_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_int_cr" id="dmd_int_cr" value="<?= $selected ? $selected->dmd_int_cr : '0' ?>" required="" /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="dmd_int_tot" id="dmd_int_tot" value="<?= $selected ? $selected->dmd_int_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="3">Total Demand</td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="tot_dmd" id="tot_dmd" value="<?= $selected ? $selected->tot_dmd : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase" colspan="5"><b>Collection Upto Return Date </b></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>OD</th>
                                                <th>CR</th>
                                                <th>ADV</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_od" id="col_prn_od" value="<?= $selected ? $selected->col_prn_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_cr" id="col_prn_cr" value="<?= $selected ? $selected->col_prn_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_adv" id="col_prn_adv" value="<?= $selected ? $selected->col_prn_adv : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_tot" id="col_prn_tot" value="<?= $selected ? $selected->col_prn_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_int_od" id="col_int_od" value="<?= $selected ? $selected->col_int_od : '0' ?>" required="" /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="col_int_cr" id="col_int_cr" value="<?= $selected ? $selected->col_int_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_int_tot" id="col_int_tot" value="<?= $selected ? $selected->col_int_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">Total Collection</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_colc" id="tot_colc" value="<?= $selected ? $selected->tot_colc : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-uppercase" colspan="4"><b>% of Recovery (<?= CURRENT_YEAR . '-' . NEXT_YEAR ?>)</b></td>
                                                <td><div class="form-group"><input type="text" class="form-control" name="recov_per" id="recov_per" value="<?= $selected ? $selected->recov_per : '0' ?>" required="" /></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--                        <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive margin-topp-remove">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center text-uppercase" colspan="4"><b>Last Years performance on return date</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Principal</th>
                                                                        <th>Interest</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Corresponding Last Years Demand</td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="prv_yr_dmd_prn" id="prv_yr_dmd_prn" value="<?= $selected ? $selected->prv_yr_dmd_prn : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="prv_yr_dmd_int" id="prv_yr_dmd_int" value="<?= $selected ? $selected->prv_yr_dmd_int : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="prv_yr_dmd_tot" id="prv_yr_dmd_tot" value="<?= $selected ? $selected->prv_yr_dmd_tot : '0' ?>" required="" readonly/></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Corresponding Last Years Collection</td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="prv_yr_col_prn" id="prv_yr_col_prn" value="<?= $selected ? $selected->prv_yr_col_prn : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="prv_yr_col_int" id="prv_yr_col_int" value="<?= $selected ? $selected->prv_yr_col_int : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="prv_yr_col_tot" id="prv_yr_col_tot" value="<?= $selected ? $selected->prv_yr_col_tot : '0' ?>" required="" readonly/></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center text-uppercase" colspan="3"><b>% Of Collection</b></td>
                                                                        <td><div class="form-group"><input type="text" class="form-control" name="col_per" id="col_per" value="<?= $selected ? $selected->col_per : '0' ?>" required="" /></div></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>-->

                        <!--                        <div class="row mt-3">
                                                    <div class="col-md-12"><label><b><u>ACCOUNT DETAILS</u></b></label></div>
                                                </div>-->

                        <!--                        <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive margin-topp-remove">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center text-uppercase" colspan="4"><b>Member wise Demand &  Recovery during the fortnight</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Total Number of  Account</th>
                                                                        <th>Of which OD</th>
                                                                        <th>Of which Current</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Total Members DEMANAND(Number)</td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_dmd" id="tot_no_ac_dmd" value="<?= $selected ? $selected->tot_no_ac_dmd : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_od_dmd" id="tot_no_ac_od_dmd" value="<?= $selected ? $selected->tot_no_ac_od_dmd : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_curr_dmd" id="tot_no_ac_curr_dmd" value="<?= $selected ? $selected->tot_no_ac_curr_dmd : '0' ?>" required="" /></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Members Collection (Number)</td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_col" id="tot_no_ac_col" value="<?= $selected ? $selected->tot_no_ac_col : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_od_col" id="tot_no_ac_od_col" value="<?= $selected ? $selected->tot_no_ac_od_col : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_curr_col" id="tot_no_ac_curr_col" value="<?= $selected ? $selected->tot_no_ac_curr_col : '0' ?>" required="" /></div></td>
                                                                    </tr>
                                                                </tbody>
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center text-uppercase" colspan="4"><b>Member wise Progressive Recovery during the Year</b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Total Number of  Account</th>
                                                                        <th>Of which OD</th>
                                                                        <th>Of which Current</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Total Members Collection (Number)</td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_prog" id="tot_no_ac_prog" value="<?= $selected ? $selected->tot_no_ac_prog : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_od_prog" id="tot_no_ac_od_prog" value="<?= $selected ? $selected->tot_no_ac_od_prog : '0' ?>" required="" /></div></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control" name="tot_no_ac_curr_prog" id="tot_no_ac_curr_prog" value="<?= $selected ? $selected->tot_no_ac_curr_prog : '0' ?>" required="" /></div></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>-->

                        <input type="hidden" name="id" value="<?= $selected ? $selected->id : 0; ?>">
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                        <div class="col-md-12 pt-5">
                            <div class="form-group row bttn-align">
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-info" <?= $disable_button; ?>>Save</button>
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
        $('#dmd_prn_od').on('change', function () {
            dmd_prn_tot($(this).val());
        });
        $('#dmd_prn_cr').on('change', function () {
            dmd_prn_tot($(this).val());
            dmd_int_tot($(this).val());
        });
        function dmd_prn_tot() {
            var count = parseInt($('#dmd_prn_od').val()) + parseInt($('#dmd_prn_cr').val());
            $('#dmd_prn_tot').val(count);
        }

/////////

        $('#dmd_int_od').on('change', function () {
            dmd_int_tot($(this).val());
        });
        $('#dmd_int_cr').on('change', function () {
            dmd_int_tot($(this).val());
            tot_dmd($(this).val());
        });
        function dmd_int_tot() {
            var count = parseInt($('#dmd_int_od').val()) + parseInt($('#dmd_int_cr').val());
            $('#dmd_int_tot').val(count);
        }

        function tot_dmd() {
            var count = parseInt($('#dmd_prn_tot').val()) + parseInt($('#dmd_int_tot').val());
            $('#tot_dmd').val(count);
        }

///////////

        $('#col_prn_od').on('change', function () {
            col_prn_tot($(this).val());
        });
        $('#col_prn_cr').on('change', function () {
            col_prn_tot($(this).val());
        });
        $('#col_prn_adv').on('change', function () {
            col_prn_tot($(this).val());
            tot_colc($(this).val());
        });
        function col_prn_tot() {
            var count = parseInt($('#col_prn_od').val()) + parseInt($('#col_prn_cr').val()) + parseInt($('#col_prn_adv').val());
            $('#col_prn_tot').val(count);
        }

////

        $('#col_int_od').on('change', function () {
            col_int_tot($(this).val());
        });
        $('#col_int_cr').on('change', function () {
            col_int_tot($(this).val());
            tot_colc($(this).val());
            recov_per($(this).val());
        });
        function col_int_tot() {
            var count = parseInt($('#col_int_od').val()) + parseInt($('#col_int_cr').val());
            $('#col_int_tot').val(count);
        }
        function tot_colc() {
            var count = parseInt($('#col_prn_tot').val()) + parseInt($('#col_int_tot').val());
            $('#tot_colc').val(count);
        }
        function recov_per() {
            var count = (parseInt($('#tot_dmd').val()) / parseInt($('#tot_colc').val())) * 100;
            $('#recov_per').val(count.toFixed(2));
        }
///////

        $('#prv_yr_dmd_prn').on('change', function () {
            prv_yr_dmd_tot($(this).val());
        });
        $('#prv_yr_dmd_int').on('change', function () {
            prv_yr_dmd_tot($(this).val());
            col_per($(this).val());
        });
        function prv_yr_dmd_tot() {
            var count = parseInt($('#prv_yr_dmd_prn').val()) + parseInt($('#prv_yr_dmd_int').val());
            $('#prv_yr_dmd_tot').val(count);
        }

/////////

        $('#prv_yr_col_prn').on('change', function () {
            prv_yr_col_tot($(this).val());
        });
        $('#prv_yr_col_int').on('change', function () {
            prv_yr_col_tot($(this).val());
            col_per($(this).val());
        });
        function prv_yr_col_tot() {
            var count = parseInt($('#prv_yr_col_prn').val()) + parseInt($('#prv_yr_col_int').val());
            $('#prv_yr_col_tot').val(count);
        }

        function col_per() {
            var count = parseInt($('#prv_yr_dmd_tot').val()) + parseInt($('#prv_yr_col_tot').val());
            $('#col_per').val(count / 100);
        }
    </script>