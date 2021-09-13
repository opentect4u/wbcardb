<?php
$shg_details = json_decode($shg_details);
$memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $shg_details[0]->memo_no);
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
                <?= form_open('ho/self_doc_verify/save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- <div class="col-md-6 pt-5">
                            </div> -->
                            <div class="col-md-12">
                                <input type="button" class="btn btn-info pull-right" value="Download Files" onclick="download()" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $shg_details[0]->entry_date ?>" required="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Memo No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="memo_no" id="memo_no" value="<?= $shg_details[0]->memo_no ?>" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="receive">Received</label>
                                <input type="checkbox" id="receive" name="receive" value="1">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Receive Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="receive_date" id="deceive_date" value="<?= date('Y-m-d'); ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Docket Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="dock_no" id="dock_no" value="" required="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="remarks" id="remarks" value="" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                        <input type="hidden" name="flag" value="<?= $flag; ?>">
                        <div class="col-md-12 pt-5">
                            <div class="form-group row bttn-align">
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-info">Approve</button>
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
        function download() {
            window.location.href = "<?= site_url('ho/self_doc_verify/download_zip/' . $flag . '/' . $ardb_id . '/' . $memo_no); ?>";
        }

        $('#dock_no').on('change', function () {
//            alert($(this).val());
            $.ajax({
                type: 'GET',
                url: "<?php echo site_url('ho/self_doc_verify/check_dock_no'); ?>",
                data: {dock_no: $(this).val()},
                dataType: 'json',
                success: function (result) {
//                    console.log(result.is_present);
                    if (result.is_present > 0) {
                        var next_dock = parseInt(result.last_dock) + parseInt(1);
                        alert('This Docket Number Is Already Exist.\n\ Expecting Docket Number : ' + next_dock);
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $('#submit').removeAttr('disabled');
                    }
                }
            });
        });
    </script>