<div class="main-panel">
    <div class="content-wrapper">
	<div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-white">
		    <div class="card-body d-flex align-items-center justify-content-between">
			<!-- <h4 class="mt-1 mb-1">Hi, Welcomeback!</h4> -->
			<h4 class="mt-1 mb-1" style="color:#4CAF50"><?php echo("" . $_SESSION['user_name']); ?></h4>
		    </div>
                </div>
            </div>
	</div>
	<div class="row">
	    <div class="col-md-4 grid-margin stretch-card" id="dc_shg">
		<div class="card border-0 border-radius-2 bg-success">
		    <div class="card-body">
			<div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
			    <div class="icon-rounded-inverse-success icon-rounded-lg">
				<i class="mdi mdi-content-paste"></i>
			    </div>
			    <div class="text-white">
				<!--<p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Sales</p>-->
				<div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
				    <h4 class="mb-0 mb-md-1 mb-lg-0 mr-1">DC</h4>
				    <small class="mb-0 ml-2">SELF SHG</small>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    <div class="col-md-4 grid-margin stretch-card" id="dc_other">
		<div class="card border-0 border-radius-2 bg-info">
		    <div class="card-body">
			<div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
			    <div class="icon-rounded-inverse-info icon-rounded-lg">
				<i class="mdi mdi-clipboard-text"></i>
			    </div>
			    <div class="text-white">
				<!--<p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p>-->
				<div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
				    <h4 class="mb-0 mb-md-1 mb-lg-0 mr-0">DC </h4>
				    <small class="mb-0 ml-2">SELF OTHERS</small>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    <div class="col-md-4 grid-margin stretch-card" id="apex_shg">
		<div class="card border-0 border-radius-2 bg-warning">
		    <div class="card-body">
			<div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
			    <div class="icon-rounded-inverse-warning icon-rounded-lg">
				<i class="mdi mdi-file-document"></i>
			    </div>
			    <div class="text-white">
				<!--<p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Growth</p>-->
				<div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
				    <h4 class="mb-0 mb-md-1 mb-lg-0 mr-1">DC <small></small></h4>
				    <small class="mb-0 ml-2">APEX SHG</small>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-4 grid-margin stretch-card" id="apex_other">
		<div class="card border-0 border-radius-2 bg-primary">
		    <div class="card-body">
			<div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
			    <div class="icon-rounded-inverse-primary icon-rounded-lg">
				<i class="mdi mdi-content-paste"></i>
			    </div>
			    <div class="text-white">
				<!--<p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Sales</p>-->
				<div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
				    <h4 class="mb-0 mb-md-1 mb-lg-0 mr-1">DC</h4>
				    <small class="mb-0 ml-1">APEX OTHERS</small>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    <div class="col-md-4 grid-margin stretch-card" id="friday_return" style="display:none;">
		<div class="card border-0 border-radius-2 bg-secondary">
		    <div class="card-body">
			<div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
			    <div class="icon-rounded-inverse-secondary icon-rounded-lg">
				<i class="mdi mdi-clipboard-text"></i>
			    </div>
			    <div class="text-white">
				<!--<p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p>-->
				<div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
				    <h5 class="mb-0 mb-md-1 mb-lg-0 mr-0">FRIDAY RETURN </h5>
				    <small class="mb-0 ml-2">REPORT </small>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    <div class="col-md-4 grid-margin stretch-card" id="fortnight" style="display:none;">
		<div class="card border-0 border-radius-2 bg-danger">
		    <div class="card-body">
			<div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
			    <div class="icon-rounded-inverse-danger icon-rounded-lg">
				<i class="mdi mdi-file-document"></i>
			    </div>
			    <div class="text-white">
				<!--<p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Growth</p>-->
				<div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
				    <h5 class="mb-0 mb-md-1 mb-lg-0 mr-1">FORTNIGHTLY RETURN</h5>
				    <!--<small class="mb-0 ml-2">LOAN SANCTION & REPORT</small>-->
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    </div>

    <script>
	$('#dc_shg').on('click', function () {
	    window.location.href = "<?= site_url('dashboard/view/1'); ?>";
	});
	$('#dc_other').on('click', function () {
	    window.location.href = "<?= site_url('dashboard/view/2'); ?>";
	});
	$('#apex_shg').on('click', function () {
	    window.location.href = "<?= site_url('dashboard/view/3'); ?>";
	});
	$('#apex_other').on('click', function () {
	    window.location.href = "<?= site_url('dashboard/view/4'); ?>";
	});
	$('#friday_return').on('click', function () {
	    window.location.href = "<?= site_url('dashboard/view/5'); ?>";
	});
	$('#fortnight').on('click', function () {
	    window.location.href = "<?= site_url('dashboard/view/6'); ?>";
	});
    </script>