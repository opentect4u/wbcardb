<?php
$user_details = json_decode($user_details);
// var_dump($user_details);exit; 
?>
<div class="main-panel">
    <div class="content-wrapper">
	<div class="card">
            <div class="card-body">
		<h4 class="card-title"> User Details  <small><a href="<?php echo site_url("user/user_entry"); ?>?id=0" class="btn btn-primary bttn-ad" style="width: 100px;">Add</a></small>
		    <span class="confirm-div" style="float:right; color:green;"></span></h4> <hr>
		<div class="row">
		    <div class="col-12">
			<div class="table-responsive">
			    <table id="order-listing" class="table">
				<thead>
				    <tr>
					<th>Sl. No.</th>
					<th>User Name</th>
					<th>User Type</th>
					<th>Option</th>
					<th>Deactivate</th>
				    </tr>
				</thead>
				<tbody>
				    <?php
				    if ($user_details) {
					$i = 1;
					foreach ($user_details as $user) {
					    ?>
					    <tr>
						<td><?= $i++; ?></td>
						<td><?= $user->user_name; ?></td>
						<td><?php
						    if ($user->user_status == 'A') {
							echo $user->user_type == 'U' ? '<span class="p-2 mb-2 text-white bg-dark">Operator</span>' : ($user->user_type == 'P' ? '<span class="p-2 mb-2 text-white bg-success">BR. Approver L1</span>' : ($user->user_type == 'V' ? '<span class="p-2 mb-2 text-white bg-warning">BR. Approver L2</span>' : ''));
						    } else {
							echo '<span class="badge badge-danger">Deactivated</span>';
						    }
						    ?></td>
						<td>
						    <a href="user/user_entry?id=<?= $user->user_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>
						</td>
						<td>
						    <a href="<?= site_url() ?>/user/deactive_user?user_id=<?= $user->user_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Deactive"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>

						</td>
					    </tr>

					    <?php
					}
				    } else {
					echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";
				    }
				    ?>

				</tbody>
			    </table>
			</div>
		    </div>
		</div>
            </div>
	</div>
    </div>
    <!-- content-wrapper ends -->

    <script>
	function deactive(user_id) {
	    window.location.href = "<?= site_url() ?>/user/deactive_user?user_id=" + user_id;
	}
    </script>