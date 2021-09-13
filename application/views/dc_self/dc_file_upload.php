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
                <h4 class="card-title"><span class="confirm-div" style="float:right; color:green;"></span></h4>
<?= form_open('dc_self/upload', $attributes); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
			    <h4 class="mb-4">DC File Upload <small>Other Than SHG</small></h4> <hr>              
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
					</select>
				    </div>
				</div>
			    </div>
                        </div>
                        <div class="row">
			    <div class="col-md-12">
				<div class="table-responsive border-none">
				    <table id="table" class="table border-none">
					<thead>
					    <tr>
						<td>Upload Document</td>
					    </tr>
					</thead>
					<tbody>
					    <tr>
						<td><input type="file" name="userfile[]" size="20" /></td>
						<td><input type="file" name="userfile[]" size="20" /></td>
					    </tr>
					    <tr>
						<td><input type="file" name="userfile[]" size="20" /></td>
						<td><input type="file" name="userfile[]" size="20" /></td>
					    </tr>
					</tbody>
				    </table>
				</div>
			    </div>
                        </div>

			<div class="row">
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
		url: "<?php echo site_url('dc_self/get_pronote_details/'); ?>",
		data: {memo_no: $("#memo_no").val().replace(/[_\W]+/g, "")},
		dataType: 'html',
		success: function (result) {
		    //    console.log(result);
		    var result = $.parseJSON(result);
		    if (result.length == 1) {
			$('#pronote_no').empty();
			$('#pronote_no').append($('<option>', {value: '', text: 'Select Pronote No'}));
			$('#pronote_no').append($('<option>', {value: result[0].pronote_no, text: result[0].pronote_no, selected: 'selected'}));
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
    </script>