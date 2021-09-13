<?php
$ardb_list = json_decode($ardb_list);
$sector_list = json_decode($sector_list);
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
                <?= form_open('ho/sanction_amt/save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">ARDB List</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="ardb_id" name="ardb_id" required >
                                            <option value="">Select</option>
                                            <?php
                                            if ($ardb_list) {
                                                foreach ($ardb_list as $ardb) {
                                                    $select = "";
                                                    echo '<option value="' . $ardb->id . '" ' . $select . '>' . $ardb->name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d'); ?>" required="">
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
                                                <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="row_1">
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control block-width" id="sector_id_1" name="sector_id[]" style="width:80%;" required >
                                                            <option value="">Select Sector</option>
                                                            <?php
                                                            if ($sector_list) {
                                                                foreach ($sector_list as $sector) {
                                                                    echo '<option value="' . $sector->sector_code . '">' . $sector->sector_name . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group"><input type="number" class="form-control required" name="sanc_amt[]" id="sanc_amt_1" value="" /></div>
                                                </td>
                                                <td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete(1)"><i class="fa fa-remove"></i></button></td>
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

    <script>
        var count = 20;
        var x = $('#table tbody > tr').length;
        $('#dynamic_add').click(function () {
            // var total = parseInt($('#tot_memb').val());
            if (x < count) {
                if ($('#sector_id_' + x).val() != '' && $('#sanc_amt_' + x).val() != '') {
                    x++;
                    $('#table').append('<tr id="row_' + x + '">'
                            + '<td><div class="form-group"><select class="form-control block-width" id="sector_id_' + x + '" name="sector_id[]" style="width:80%;" required ><option value="">Select Sector</option>'
                            + '<?php
                if ($sector_list) {
                    foreach ($sector_list as $sector) {
                        echo '<option value="' . $sector->sector_code . '">' . $sector->sector_name . '</option>';
                    }
                }
                ?>'
                            + '</select></div></td>'
                            // +'<td><div class="form-group"><input type="text" class="form-control required" name="rete_of_interest[]" id="rate_of_interest_'+ x +'" /></div></td>'
                            + '<td><div class="form-group"><input type="number" class="form-control required" name="sanc_amt[]" id="sanc_amt_' + x + '" /></div></td>'
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

        function _delete(id) {
            var r = confirm("Do you want to delete this?");
            if (r == true) {
                $('#row_' + id).remove();
                x--;
            } else {
                return false;
            }
        }
    </script>