<?php
$ardb_list = json_decode($ardb_list);
$sanction_list = json_decode($sanction_list);
// $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $shg_details[0]->memo_no);
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
                <h4 class="card-title"></h4>
                <?= form_open('ho/sanction_amt/update'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">ARDB List</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required disabled>
                                            <option value="">Select</option>
                                            <?php
                                            if ($ardb_list) {
                                                foreach ($ardb_list as $ardb) {
                                                    $select = "";
                                                    if ($ardb->id == $sanction_list[0]->ardb_id) {
                                                        $select = "selected";
                                                    }
                                                    echo '<option value="' . $ardb->id . '" ' . $select . '>' . $ardb->name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="ardb_id" name="ardb_id" value="<?= $sanction_list[0]->ardb_id; ?>"/>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $sanction_list[0]->effective_date; ?>" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Sector</th>
                                                <th>Sanction Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="row_1">
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control required" name="sector_name" id="sector_name" value="<?= $sanction_list[0]->sector_name; ?>" readonly />
                                                        <input type="hidden" name="sector_id" id="sector_id" value="<?= $sanction_list[0]->sector_id; ?>" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control required" name="sanc_amt" id="sanc_amt" value="<?= $sanction_list[0]->sanction_amt; ?>" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
