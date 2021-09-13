<?php
//$selected = json_decode($selected);
// echo '<pre>'; var_dump($selected);exit;
$memo_details = json_decode($memo_details);
$attributes = array('enctype' => 'multipart/form-data');
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
		<?php if ($this->session->flashdata('msg')) { ?>
    		<div role="alert" class="alert alert-danger">
    		    <button data-dismiss="alert" class="close" type="button">
    			<i class="fa fa-times"></i></button>
			<?= $this->session->flashdata('msg') ?>
    		</div>
		<?php } ?>
                <h4 class="card-title"><span class="confirm-div" style="float:right; color:green;"></span></h4>
		<?= form_open('dc/upload', $attributes); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                            <h4 class="mb-4">DC File Upload <small>SHG</small></h4>   <hr>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Memo Number</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="memo_no" name="memo_no" required >
                                            <option value="">Select</option>
					    <?php
					    if ($memo_details) {
						foreach ($memo_details as $memo) {
						    $select = "";
						    // if($selected->memo_no == $memo->memo_no){
						    //   $select = "selected";
						    // }
						    echo '<option value="' . $memo->memo_no . '" ' . $select . '>' . $memo->memo_no . '</option>';
						}
					    }
					    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pronote No</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="pronote_no" name="pronote_no" required >
                                            <option value="">Select</option>
					    <?php
					    //if($pronote_details){
					    // foreach($pronote_details as $pronote){
					    //   $select = "";
					    //   // if($selected->memo_no == $memo->memo_no){
					    //   //   $select = "selected";
					    //   // }
					    //   echo '<option value="'.$pronote->pronote_no.'" '.$select.'>'.$pronote->pronote_no.'</option>';
					    // }
					    //}
					    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SHG Names</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="shg_name" name="shg_name" required >
                                            <option value="">Select</option>
					    <?php
					    //if($pronote_details){
					    // foreach($pronote_details as $pronote){
					    //   $select = "";
					    //   // if($selected->memo_no == $memo->memo_no){
					    //   //   $select = "selected";
					    //   // }
					    //   echo '<option value="'.$pronote->pronote_no.'" '.$select.'>'.$pronote->pronote_no.'</option>';
					    // }
					    //}
					    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label><b><u>Upload Files</u> &nbsp;&nbsp;&nbsp; <small style="color: red;">***FILE TYPE: PDF || MAX SIZE: 5MB***</small></b></label></div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group row">
                                    <label class="col-sm-5">Intersee Agreement Copy</label>
                                    <div class="col-sm-7">
                                        <input type="file" name="userfile[]" size="20" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5">Self Sanction List</label>
                                    <div class="col-sm-7">
                                        <input type="file" name="userfile[]" size="20" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="submit" id="submit" class="btn btn-info margin-tt" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		<?= form_close(); ?>
            </div>
        </div>
    </div>

    <script>
	$("#memo_no").on('change', function () {
	    $.ajax({
		type: "GET",
		url: "<?php echo site_url('dc/get_pronote_details/'); ?>",
		data: {memo_no: $("#memo_no").val().replace(/[_\W]+/g, "")},
		dataType: 'html',
		success: function (result) {
		    //    console.log(result);
		    var result = $.parseJSON(result);
		    if (result.length == 1) {
			$('#pronote_no').empty();
			$('#pronote_no').append($('<option>', {value: '', text: 'Select Pronote No'}));
			$('#pronote_no').append($('<option>', {value: result[0].pronote_no, text: result[0].pronote_no, selected: 'selected'})).change();
		    } else {
			$('#pronote_no').empty();
			$('#pronote_no').append($('<option>', {value: '', text: 'Select Pronote No'}));
			$.each(result, function (i, item) {
			    $('#pronote_no').append($('<option>', {value: item.pronote_no, text: item.pronote_no}));
			});
		    }
		}
	    });
	});
	$("#pronote_no").on('change', function () {
	    $.ajax({
		type: "GET",
		url: "<?php echo site_url('dc/get_shg_names/'); ?>",
		data: {memo_no: $("#memo_no").val().replace(/[_\W]+/g, ""), pronote_no: $("#pronote_no").val().replace(/[_\W]+/g, "")},
		dataType: 'html',
		success: function (result) {
		    //    console.log(result);
		    var result = $.parseJSON(result);
		    console.log(result.length);
		    if (result.length == 1) {
			$('#shg_name').empty();
			$('#shg_name').append($('<option>', {value: '', text: 'Select'}));
			$('#shg_name').append($('<option>', {value: result[0].shg_name, text: result[0].shg_name, selected: 'selected'}));
		    } else {
			$('#shg_name').empty();
			$('#shg_name').append($('<option>', {value: '', text: 'Select'}));
			$.each(result, function (i, item) {
			    $('#shg_name').append($('<option>', {value: item.shg_name, text: item.shg_name}));
			});
		    }
		}
	    });
	});
    </script>