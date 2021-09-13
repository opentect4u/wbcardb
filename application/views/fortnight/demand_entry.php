<?php
$selected = json_decode($selected);
$report_type = json_decode($report_type);
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
                <h4 class="card-title">Fortnightly Return <small>Demand Entry</small></h4> <hr>
                <?= form_open('fortnight/demand_save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">From Fin Year</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="frm_fn_year" id="frm_fn_year" value="<?= $selected ? $selected->frm_fn_year : CURRENT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">To Fin Year</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="to_fn_year" id="to_fn_year" value="<?= $selected ? $selected->to_fn_year : NEXT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Report Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="sector_id" id="report_type" required >
                                            <option value="">Select Report Type</option>
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
                                                <th>OD</th>
                                                <th>CR</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Principal</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pri_od" id="pri_od" value="<?= $selected ? $selected->pri_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pri_cr" id="pri_cr" value="<?= $selected ? $selected->pri_cr : '0' ?>" required="" /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="pri_tot" id="pri_tot" value="<?= $selected ? $selected->pri_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Interest</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="int_od" id="int_od" value="<?= $selected ? $selected->int_od : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="int_cr" id="int_cr" value="<?= $selected ? $selected->int_cr : '0' ?>" required="" /></div></td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="int_tot" id="int_tot" value="<?= $selected ? $selected->int_tot : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="3">Total Demand</td>
                                                <td colspan="2"><div class="form-group"><input type="number" class="form-control" name="tot_dmd" id="tot_dmd" value="<?= $selected ? $selected->tot_dmd : '0' ?>" required="" readonly/></div></td>
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
        $('#pri_od').on('change', function () {
            dmd_prn_tot($(this).val());
        });
        $('#pri_cr').on('change', function () {
            dmd_prn_tot($(this).val());
            dmd_int_tot($(this).val());
        });
        function dmd_prn_tot() {
            var count = parseInt($('#pri_od').val()) + parseInt($('#pri_cr').val());
            $('#pri_tot').val(count);
        }

/////////

        $('#int_od').on('change', function () {
            dmd_int_tot($(this).val());
        });
        $('#int_cr').on('change', function () {
            dmd_int_tot($(this).val());
            tot_dmd($(this).val());
        });
        function dmd_int_tot() {
            var count = parseInt($('#int_od').val()) + parseInt($('#int_cr').val());
            $('#int_tot').val(count);
        }

        function tot_dmd() {
            var count = parseInt($('#pri_tot').val()) + parseInt($('#int_tot').val());
            $('#tot_dmd').val(count);
        }
    </script>