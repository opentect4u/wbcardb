<div class="main-panel">
    <!-- <div class="container-fluid page-body-wrapper"> -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h4 class="mt-1 mb-1"><?php echo("" . $_SESSION['user_name']); ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($_SESSION['user_type'] != 'A') { ?>
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
        <?php } else { ?>
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card bg-white">
                        <div class="card-body d-flex align-items-center justify-content-between">

                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>ARDB/Branch</th>
                                            <th>No of Operators</th>
                                            <th>No of DOC Receiver</th>
                                            <th>No of Approvers L1</th>
                                            <th>No of Approvers L2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $details = json_decode($details);
                                        if ($details) {
                                            $i = 1;
                                            foreach ($details as $dt) {
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                echo '<td>' . $dt->name . '</td>';
                                                echo '<td>' . $dt->user . '</td>';
                                                echo '<td>' . $dt->doc_rec . '</td>';
                                                echo '<td>' . $dt->app_l1 . '</td>';
                                                echo '<td>' . $dt->app_l2 . '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- </div>  -->
    <!-- content-wrapper ends -->


    <script>
        $('#dc_shg').on('click', function () {
            window.location.href = "<?= site_url('ho/dashboard/view/1'); ?>";
        });
        $('#dc_other').on('click', function () {
            window.location.href = "<?= site_url('ho/dashboard/view/2'); ?>";
        });
        $('#apex_shg').on('click', function () {
            window.location.href = "<?= site_url('ho/dashboard/view/3'); ?>";
        });
        $('#apex_other').on('click', function () {
            window.location.href = "<?= site_url('ho/dashboard/view/4'); ?>";
        });
        $('#friday_return').on('click', function () {
            window.location.href = "<?= site_url('ho/dashboard/view/5'); ?>";
        });
        $('#fortnight').on('click', function () {
            window.location.href = "<?= site_url('ho/dashboard/view/6'); ?>";
        });
    </script>