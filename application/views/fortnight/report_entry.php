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
                <h4 class="card-title">Fortnightly Return <small>Demand & Recovery Entry</small></h4> <hr>
                <?= form_open('fortnight/report_save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Date From</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="frm_dt" id="frm_dt" value="<?= $selected ? $selected->return_form : date('Y-m-d') ?>" required="" <?php //$readonly                                                                                                                                                                                                                                                          ?>/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Date To</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="to_dt" id="to_dt" value="<?= $selected ? $selected->return_to : date('Y-m-d') ?>" required="" <?php //$readonly                                                                                                                                                                                                                                                          ?>/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Financial Year</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="frm_fin_yr" id="frm_fin_yr" value="<?= $selected ? $selected->frm_fin_yr : CURRENT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">To</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="to_fin_yr" id="to_fin_yr" value="<?= $selected ? $selected->to_fin_yr : NEXT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Sector</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="sector_id" id="sector_id" required >
                                            <option value="">Select Sector Type</option>
                                            <?php
                                            foreach ($report_type as $k => $v) {
                                                $select = "";
                                                if ($selected->sector_id == $k) {
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
                                                <th>OD( Rs in lacs )</th>
                                                <th>CR( Rs in lacs )</th>
                                                <th colspan="2">Total( Rs in lacs )</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="dmd_prn_od" id="dmd_prn_od" value="0" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="dmd_prn_cr" id="dmd_prn_cr" value="0" required="" readonly /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="dmd_prn_tot" id="dmd_prn_tot" value="0" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="dmd_int_od" id="dmd_int_od" value="0" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="dmd_int_cr" id="dmd_int_cr" value="0" required="" readonly /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="decimal" class="form-control" name="dmd_int_tot" id="dmd_int_tot" value="0" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="3">Total Demand</td>
                                                <td colspan="2"><div class="form-group"><input type="decimal" class="form-control" name="tot_dmd" id="tot_dmd" value="0" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Advance Principal Recovery</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pri_adv_rec" id="pri_adv_rec" value="0" required="" readonly/></div></td>
                                                <td class="text-center" colspan="2">Gross Total Demand</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="gross_tot_dmd" id="gross_tot_dmd" value="0" required="" readonly/></div></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase" colspan="5"><b>Collections made during the fortnight</b></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>OD( Rs in lacs )</th>
                                                <th>CR( Rs in lacs )</th>
                                                <th>ADV( Rs in lacs )</th>
                                                <th>Total( Rs in lacs )</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="col_prn_od" id="col_prn_od" value="<?= $selected ? $selected->col_prn_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="col_prn_cr" id="col_prn_cr" value="<?= $selected ? $selected->col_prn_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="col_prn_adv" id="col_prn_adv" value="<?= $selected ? $selected->col_prn_adv : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="col_prn_tot" id="col_prn_tot" value="<?= $selected ? $selected->col_prn_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="col_int_od" id="col_int_od" value="<?= $selected ? $selected->col_int_od : '0' ?>" required="" /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="col_int_cr" id="col_int_cr" value="<?= $selected ? $selected->col_int_cr : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="col_int_tot" id="col_int_tot" value="<?= $selected ? $selected->col_int_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">Total Collection</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="tot_colc" id="tot_colc" value="<?= $selected ? $selected->tot_colc : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase" colspan="5"><b>Progressive Total Of Collection Made Up To The End Of The Period</b></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>OD( Rs in lacs )</th>
                                                <th>CR( Rs in lacs )</th>
                                                <th>ADV( Rs in lacs )</th>
                                                <th>Total( Rs in lacs )</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_pri_od" id="pro_pri_od" value="0" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_pri_cr" id="pro_pri_cr" value="0" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_pri_adv" id="pro_pri_adv" value="0" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_pri_tot" id="pro_pri_tot" value="0" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_int_od" id="pro_int_od" value="0" required="" readonly /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="pro_int_cr" id="pro_int_cr" value="0" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_int_tot" id="pro_int_tot" value="0" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">Total Collection</td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pro_tot_colc" id="pro_tot_colc" value="0" required="" readonly/></div></td>
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
                        <input type="hidden" name="dmd_id" id="dmd_id" value="">
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
        $(document).ready(function () {
            var sector_id = <?= $selected ? $selected->sector_id : '0' ?>;
            if (sector_id > 0) {
                $("#sector_id").change();
            }
        });
    </script>

    <script>
        var flag = <?= $selected ? 1 : 0 ?>;
        var fwd_data = "<?= $selected ? $selected->fwd_data : '0' ?>";
        $("#sector_id").on('change', function () {
            var sector_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('fortnight/get_demand_details/'); ?>",
                data: {ardb_id: "<?= $ardb_id ?>", sector_id: $(this).val(), frm_fn_yr: $('#frm_fin_yr').val(), to_fn_yr: $('#to_fin_yr').val()},
                dataType: 'html',
                success: function (result) {
                    //    console.log(result);
                    var data = $.parseJSON(result);
                    if (data.length > 0) {
                        data = data[0];
                        $('#dmd_prn_od').val(data.pri_cr);
                        $('#dmd_prn_cr').val(data.pri_od);
                        $('#dmd_prn_tot').val(data.pri_tot);
                        $('#dmd_int_od').val(data.int_cr);
                        $('#dmd_int_cr').val(data.int_od);
                        $('#dmd_int_tot').val(data.int_tot);
                        $('#tot_dmd').val(data.tot_dmd);
                        $('#pri_adv_rec').val(data.pri_adv_rec);
                        $('#gross_tot_dmd').val(data.gross_tot_dmd);
                        $('#dmd_id').val(data.id);
                        if (fwd_data == 0 || fwd_data == '') {
                            $('#submit').removeAttr('disabled');
                        }
                        get_pro_details(sector_id, data.id);
                    } else {
                        alert("No Demand Found");
                        if (fwd_data == 0 || fwd_data == '') {
                            $('#submit').attr('disabled', 'disabled');
                        }

                    }
                }
            });
        });
        function get_pro_details(sector_id, dmd_id) {
            var frm_dt = $('#frm_dt').val();
            var to_dt = $('#to_dt').val();
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('fortnight/get_pro_dmd_details/'); ?>",
                data: {dmd_id: dmd_id, ardb_id: "<?= $ardb_id ?>", sector_id: sector_id, frm_dt: frm_dt, to_dt: to_dt, flag: flag},
                dataType: 'html',
                success: function (result) {
//                    console.log(result);
                    var data = $.parseJSON(result);
                    if (data.length > 0) {
                        data = data[0];
                        parseFloat( $('#pro_pri_od').val(data.pri_od)).toFixed(2);
                        parseFloat($('#pro_pri_cr').val(data.pri_cr)).toFixed(2);
                        parseFloat($('#pro_pri_adv').val(data.pri_adv)).toFixed(2);
                        parseFloat($('#pro_pri_tot').val(data.pri_tot)).toFixed(2);
                        parseFloat($('#pro_int_od').val(data.int_od)).toFixed(2);
                        parseFloat($('#pro_int_cr').val(data.int_cr)).toFixed(2);
                        parseFloat($('#pro_int_tot').val(data.int_tot)).toFixed(2);
                        parseFloat($('#pro_tot_colc').val(data.tot_colc)).toFixed(2);
                        
                    }
//                    else{
//                        $('#pro_pri_od').val(0);
//                        $('#pro_pri_cr').val(0);
//                        $('#pro_pri_adv').val(0);
//                        $('#pro_pri_tot').val(0);
//                        $('#pro_int_od').val(0);
//                        $('#pro_int_cr').val(0);
//                        $('#pro_int_tot').val(0);
//                        $('#pro_tot_colc').val(0);
//                    }

                }
            });
        }
        $('#pri_adv_rec').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            $('#gross_tot_dmd').val(parseFloat($(this).val()) + parseFloat($('#gross_tot_dmd').val()));
        });
    </script>

    <script>
///////////

        $('#col_prn_od').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            if ($('#pro_pri_od').val() > 0 && flag > 0) {
                let a = $('#pro_pri_od').val();
                let b = $('#col_prn_od').val();
                let c = parseFloat(b) - parseFloat(a);
                $('#pro_pri_od').val(parseFloat(c) + parseFloat($('#pro_pri_od').val())).change();
            } else {
                $('#pro_pri_od').val(parseFloat($(this).val()) + parseFloat($('#pro_pri_od').val())).change();
            }
            col_prn_tot($(this).val());
        });
        $('#col_prn_cr').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            if ($('#pro_pri_cr').val() > 0 && flag > 0) {
                let a = $('#pro_pri_cr').val();
                let b = $('#col_prn_cr').val();
                let c = parseFloat(b) - parseFloat(a);
                $('#pro_pri_cr').val(parseFloat(c) + parseFloat($('#pro_pri_cr').val())).change();
            } else {
                $('#pro_pri_cr').val(parseFloat($(this).val()) + parseFloat($('#pro_pri_cr').val())).change();
            }
            col_prn_tot($(this).val());
        });
        $('#col_prn_adv').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            $('#pri_adv_rec').val($(this).val()).change();
            if ($('#pro_pri_adv').val() > 0 && flag > 0) {
                let a = $('#pro_pri_adv').val();
                let b = $('#col_prn_adv').val();
                let c = parseFloat(b) - parseFloat(a);
                $('#pro_pri_adv').val(parseFloat(c) + parseFloat($('#pro_pri_adv').val())).change();
            } else {
                $('#pro_pri_adv').val(parseFloat($(this).val()) + parseFloat($('#pro_pri_adv').val())).change();
            }
            col_prn_tot($(this).val());
            tot_colc($(this).val());
        });
        function col_prn_tot() {
            var count = parseFloat($('#col_prn_od').val()) + parseFloat($('#col_prn_cr').val()) + parseFloat($('#col_prn_adv').val());
            // count=count.toFixed(2);
            $('#col_prn_tot').val(count);
        }

////

        $('#col_int_od').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            if ($('#pro_int_od').val() > 0 && flag > 0) {
                let a = $('#pro_int_od').val();
                let b = $('#col_int_od').val();
                let c = parseFloat(b) - parseFloat(a);
                $('#pro_int_od').val(parseFloat(c) + parseFloat($('#pro_int_od').val())).change();
            } else {
                $('#pro_int_od').val(parseFloat($(this).val()) + parseFloat($('#pro_int_od').val())).change();
            }
            col_int_tot($(this).val());
        });
        $('#col_int_cr').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            if ($('#pro_int_cr').val() > 0 && flag > 0) {
                let a = $('#pro_int_cr').val();
                let b = $('#col_int_cr').val();
                let c = parseFloat(b) - parseFloat(a);
                $('#pro_int_cr').val(parseFloat(c) + parseFloat($('#pro_int_cr').val())).change();
            } else {
                $('#pro_int_cr').val(parseFloat($(this).val()) + parseFloat($('#pro_int_cr').val())).change();
            }
            col_int_tot($(this).val());
            tot_colc($(this).val());
            recov_per($(this).val());
        });
        function col_int_tot() {
            var count = parseFloat($('#col_int_od').val()) + parseFloat($('#col_int_cr').val());
            $('#col_int_tot').val(count);
        }
        function tot_colc() {
            var count = parseFloat($('#col_prn_tot').val()) + parseFloat($('#col_int_tot').val());
            count=count.toFixed(2);
            $('#tot_colc').val(count);
        }
        function recov_per() {
            var count = (parseFloat($('#pro_tot_colc').val()) / parseFloat($('#tot_dmd').val())) * 100;
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
            var count = parseFloat($('#prv_yr_dmd_prn').val()) + parseFloat($('#prv_yr_dmd_int').val());
            $('#prv_yr_dmd_tot').val(count);
        }

/////////

        $('#prv_yr_col_prn').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            prv_yr_col_tot($(this).val());
        });
        $('#prv_yr_col_int').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            prv_yr_col_tot($(this).val());
            col_per($(this).val());
        });
        function prv_yr_col_tot() {
            var count = parseFloat($('#prv_yr_col_prn').val()) + parseFloat($('#prv_yr_col_int').val());
            $('#prv_yr_col_tot').val(count);
        }

        function col_per() {
            var count = parseFloat($('#prv_yr_dmd_tot').val()) + parseFloat($('#prv_yr_col_tot').val());
            $('#col_per').val(count / 100);
        }
    </script>

    <script>
        /////// PROGRASIVE PRINCIPAL
        $('#pro_pri_od').on('change', function () {
            
            prog_pri_tot();
        });
        $('#pro_pri_cr').on('change', function () {
            prog_pri_tot();
        });
        $('#pro_pri_adv').on('change', function () {
            prog_pri_tot();
        });
        function prog_pri_tot() {
            var count = parseFloat($('#pro_pri_od').val()) + parseFloat($('#pro_pri_cr').val()) + parseFloat($('#pro_pri_adv').val());
            $('#pro_pri_tot').val(count);
            count_pro_tot_colc();
        }

        ///// PROGRASIVE INTEREST
        $('#pro_int_od').on('change', function () {
            prog_int_tot();
        });
        $('#pro_int_cr').on('change', function () {
            prog_int_tot();
        });
        function prog_int_tot() {
            var count = parseFloat($('#pro_int_od').val()) + parseFloat($('#pro_int_cr').val());
            $('#pro_int_tot').val(count);
            count_pro_tot_colc();
        }

        function count_pro_tot_colc() {
            var count = parseFloat($('#pro_pri_tot').val()) + parseFloat($('#pro_int_tot').val());
            $('#pro_tot_colc').val(count);
        }
    </script>