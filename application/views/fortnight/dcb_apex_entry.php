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
                <?= form_open('fortnight/report_save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Return Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="return_dt" id="return_dt" value="<?= $selected ? $selected->return_dt : date('Y-m-d') ?>" required="" <?php //$readonly                                                                                                                                                                                ?>/>
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
                                                <th>IMB</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_prn_od" id="dmd_prn_od" value="<?= $selected ? $selected->dmd_prn_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_prn_cr" id="dmd_prn_cr" value="<?= $selected ? $selected->dmd_prn_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_prn_imb" id="dmd_prn_imb" value="<?= $selected ? $selected->dmd_prn_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_prn_tot" id="dmd_prn_tot" value="<?= $selected ? $selected->dmd_prn_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_int_od" id="dmd_int_od" value="<?= $selected ? $selected->dmd_int_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_int_cr" id="dmd_int_cr" value="<?= $selected ? $selected->dmd_int_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_int_imb" id="dmd_int_imb" value="<?= $selected ? $selected->dmd_int_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="dmd_int_tot" id="dmd_int_tot" value="<?= $selected ? $selected->dmd_int_tot : '0' ?>" required="" readonly/></div></td>
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
                                                <th>IMB</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_od" id="col_prn_od" value="<?= $selected ? $selected->col_prn_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_cr" id="col_prn_cr" value="<?= $selected ? $selected->col_prn_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_imb" id="col_prn_imb" value="<?= $selected ? $selected->col_prn_adv : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_prn_tot" id="col_prn_tot" value="<?= $selected ? $selected->col_prn_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_int_od" id="col_int_od" value="<?= $selected ? $selected->col_int_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_int_cr" id="col_int_cr" value="<?= $selected ? $selected->col_int_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_int_imb" id="col_int_imb" value="<?= $selected ? $selected->col_int_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="col_int_tot" id="col_int_tot" value="<?= $selected ? $selected->col_int_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">Total Collection</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_colc" id="tot_colc" value="<?= $selected ? $selected->tot_colc : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">Govt Grant for offsetting Imb</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_colc" id="tot_colc" value="<?= $selected ? $selected->tot_colc : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">Remittance made by ARDB</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_colc" id="tot_colc" value="<?= $selected ? $selected->tot_colc : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-uppercase" colspan="4"><b>Actual % of Coll.(Excluding Govt Grant)(<?= CURRENT_YEAR . '-' . NEXT_YEAR ?>)</b></td>
                                                <td><div class="form-group"><input type="text" class="form-control" name="recov_per" id="recov_per" value="<?= $selected ? $selected->recov_per : '0' ?>" required="" /></div></td>
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
        });
        $('#dmd_prn_imb').on('change', function () {
            dmd_prn_tot($(this).val());
            dmd_int_tot($(this).val());
        });
        function dmd_prn_tot() {
            var count = parseInt($('#dmd_prn_od').val()) + parseInt($('#dmd_prn_cr').val()) + parseInt($('#dmd_prn_imb').val());
            $('#dmd_prn_tot').val(count);
        }

/////////

        $('#dmd_int_od').on('change', function () {
            dmd_int_tot($(this).val());
        });
        $('#dmd_int_cr').on('change', function () {
            dmd_int_tot($(this).val());
        });
        $('#dmd_int_imb').on('change', function () {
            dmd_int_tot($(this).val());
            tot_dmd($(this).val());
        });
        function dmd_int_tot() {
            var count = parseInt($('#dmd_int_od').val()) + parseInt($('#dmd_int_cr').val()) + parseInt($('#dmd_int_imb').val());
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
        $('#col_prn_imb').on('change', function () {
            col_prn_tot($(this).val());
            tot_colc($(this).val());
        });
        function col_prn_tot() {
            var count = parseInt($('#col_prn_od').val()) + parseInt($('#col_prn_cr').val()) + parseInt($('#col_prn_imb').val());
            $('#col_prn_tot').val(count);
        }

////

        $('#col_int_od').on('change', function () {
            col_int_tot($(this).val());
        });
        $('#col_int_cr').on('change', function () {
            col_int_tot($(this).val());
        });
        $('#col_int_imb').on('change', function () {
            col_int_tot($(this).val());
            tot_colc($(this).val());
            recov_per($(this).val());
        });
        function col_int_tot() {
            var count = parseInt($('#col_int_od').val()) + parseInt($('#col_int_cr').val()) + parseInt($('#col_int_imb').val());
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

