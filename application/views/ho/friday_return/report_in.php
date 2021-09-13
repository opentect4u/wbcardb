<?php
//$friday_details = json_decode($friday_details);
//$selected = json_decode($selected);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/friday_return/report'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Friday Return</b> <small>View</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Form Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="form_date" id="form_date" value="<?= date('Y-m-d') ?>" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">To Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="to_date" id="to_date" value="<?= date('Y-m-d') ?>" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="to_dt" class="col-sm-2 col-form-label"></label>
                            <button class="btn btn-primary" id="sarch" name="search" type="submit">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
    <!-- content-wrapper ends -->

    <script>
        function check() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
        // function _edit(pronote_no, memo_no){
        //   // pronote_no = encodeURIComponent(pronote_no);
        //   // memo_no = encodeURIComponent(memo_no);
        //   console.log(pronote_no);
        //   console.log(memo_no);
        //  // location.href = "<?= base_url(); ?>index.php/dc/dc_entry/" + pronote_no + "/" + memo_no;
        // }

    </script>