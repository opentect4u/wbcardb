<?php
//$friday_details = json_decode($friday_details);
//$ardb_list = json_decode($ardb_list);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/fortnight/report_inv_sec'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnightly Return</b> <small>Loan Issue</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Form Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="form_date" id="form_date" value="<?= date('Y-m-d') ?>" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">To Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="to_date" id="to_date" value="<?= date('Y-m-d') ?>" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Sector</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="report_type" id="report_type" required >
                                    <option value="">Select Sector</option>
                                    <option value="0" style="color: #03d603;">CONSOLIDATED</option>
                                    <?php
                                    foreach (unserialize(LOAN_ISSUE_SECTOR) as $k => $v) {
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
                    <div class="col-md-2">
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
