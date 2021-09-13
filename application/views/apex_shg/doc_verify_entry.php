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
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td colspan="2" class="text-center">Action Apex Bank Receipt Section by default</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pronote</td>
                                            <td class="text-center"><input type="checkbox" id="pronote" name="pronote" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>Intersee Agreement</td>
                                            <td class="text-center"><input type="checkbox" id="ig" name="ig" value="1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
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
    </script>