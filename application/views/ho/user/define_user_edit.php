<?php
$selected = json_decode($selected);
//var_dump($selected);
//exit;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> </h4>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" id="form" action="<?php echo site_url("ho/Admins/f_define_user_save"); ?>">
                            <div class="col-md-6 container form-wraper" style="margin-left: 0px;">
                                <div class="form-header">
                                    <h4>Define Number of Users</h4>
                                </div>
                                <div class="form-group row" >
                                    <label for="name" class="col-sm-3 col-form-label">PCARDB / Branch:</label>
                                    <div class="col-sm-9">
					<?php if ($selected->id != '') { ?>
    					<select class="form-control" id="br_id" name="br_id" required  <?= $selected->id != '' ? 'disabled' : ''; ?>>
    					    <option value="">Select</option>
						<?php
						$ardb_ho_details = json_decode($ardb_ho_details);
						foreach ($ardb_ho_details as $details) {
						    $select = '';
						    if ($selected->br_id == $details->id) {
							$select = 'selected';
						    }
						    ?>
						    <option value="<?= $details->id ?>" <?= $select; ?>><?= $details->name ?></option>
						<?php } ?>
    					</select>
    					<input type="hidden" name="ardb_id" value="<?= $selected->br_id; ?>">
					<?php } else { ?>
    					<input type="text" class="form-control required" name="br_name" id="br_name" value="" />
					<?php } ?>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="no_of_user" class="col-sm-3 col-form-label">No of Users:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control required" name="no_of_user" id="no_of_user" value="<?= $selected ? $selected->no_of_users : ''; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_of_approver" class="col-sm-3 col-form-label">No of Approvers:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_of_approver" id="no_of_approver" value="<?= $selected ? $selected->no_of_approver : ''; ?>" />
                                    </div>
                                </div>
                                <!-- <input type="hidden" name="id" value="<?php $selected ? $selected->id : ''; ?>"> -->
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-info" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <script>
	$('#no_of_user').change(function () {
	    if ($(this).val() > 8) {
		$(this).val('8');
	    }
	});
	$('#no_of_approver').change(function () {
	    if ($(this).val() > 2) {
		$(this).val('2');
	    }
	});
    </script>
