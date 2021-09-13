<?php
$user_details = json_decode($user_details);
$selected = json_decode($selected);
?>

<div class="main-panel">
    <div class="content-wrapper">
	<div class="card">
            <div class="card-body">
		<h4 class="card-title"> </h4>
		<div class="row">
		    <div class="col-12">
			<form method="POST" 
			      id="form"
			      action="<?php echo site_url("user/user_save"); ?>" >
			    <div class="col-md-12 container form-wraper" style="margin-left: 0px;">

				<div class="form-header">
				    <h4>User Entry</h4>  <hr>              
				</div>
				<div class="col-md-6 mt-4">
				    <div class="form-group row">
					<label for="user_id" class="col-sm-3 col-form-label">User ID:</label>
					<div class="col-sm-9">
					    <input type="text" class="form-control required" name="user_id" id="user_id" value="<?= $selected ? $selected->user_id : ''; ?>" />
					</div>
				    </div>
				</div>
				<div class="col-md-6">              
				    <div class="form-group row">
					<label class="col-sm-3 col-form-label">Password:</label>
					<div class="col-sm-9">
					    <input  type="password" class="form-control" name="pass" id="pass" value="123" >
					</div>
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">User Type:</label>
					<div class="col-sm-9">
					    <select class="form-control" id="user_type_id" name="user_type_id" required >
						<option value="">Select</option>
						<?php if ($_SESSION['user_type'] == 'V') {
						    echo '<option value="P">Approver L1</option>';
						}
						?>
						<option value="U">Operator</option>
					    </select>    
					</div>
				    </div>
				</div>
				<div class="col-md-6">        
				    <div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Name:</label>
					<div class="col-sm-9">
					    <input type="text"
						   class="form-control required"
						   name="user_name" value="<?= $selected ? $selected->user_name : ''; ?>"
						   id="user_name"
						   />
					</div>
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Designation:</label>
					<div class="col-sm-9">
					    <input type="text" class="form-control required" name="designation" value="<?= $selected ? $selected->designation : ''; ?>" id="designation" />
					</div>
				    </div>
				</div>  
				<div class="form-group row">
				    <div class="col-sm-10">
					<input type="submit" id="submit" class="btn btn-info ml-3 mb-3" value="Save" />
				    </div>
				</div>
			    </div>               
		    </div>
		</div>
	    </div>
	</div>
    </div>
    <!-- content-wrapper ends -->

    <script>

	$('#user_type_id').change(function () {
	    $.ajax({
		type: "GET",
		url: "<?= site_url(); ?>/user/get_user_status",
		data: {type_id: $(this).val()},
		dataType: 'json',
		success: function (data) {
		    if (data[0].count >= data[0].count_member) {
			alert('This Branch Has Assigned ' + data[0].count_member + ' ' + $('#user_type_id :selected').text());
			$('#submit').attr('disabled', 'disabled');
		    } else {
			$('#submit').removeAttr('disabled');
		    }
		},
		error: function () {
		    alert('Error occured');
		}
	    });
	});
    </script>
