<?php
$br_id = $_SESSION['br_id'];
if ($br_id > 0) {
    $CI = & get_instance();
    $CI->load->model('notification_model');
    $dc_reject_status = $CI->notification_model->get_dc_reject_status($br_id);
    $dc_fwrd_status   = $CI->notification_model->get_dc_fwrd_status($br_id);
} else {
    $dc_reject_status = array('dc_shg' => 0, 'dc_self' => 0, 'apex_dc_shg' => 0, 'apex_dc_self' => 0);
    $dc_fwrd_status = array('dc_shg' => 0, 'dc_self' => 0, 'apex_dc_shg' => 0, 'apex_dc_self' => 0);
}
//var_dump($dc_reject_status['dc_shg']);
//exit;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo("" . $_SESSION['user_name']); ?></title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- plugins:css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/vendors/mdi/css/materialdesignicons.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/css/vendor.bundle.base.css"); ?>">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"); ?>">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
        <!-- endinject -->
        <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png"); ?>" />
        <script src="<?= base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
        <script src="<?= base_url(); ?>assets/js/table2excel.js"></script>

        <script>
            $(document).ready(function () {
                if ($('#custom_notif a').length > 0) {
                    $(".badge").text($('#custom_notif a').length);
                } else {
                    $(".badge").text(0);
                    $("#noti_leb").text("You Have No Notifications");
                }
            });
        </script>
    </head>

    <body class="sidebar-dark" onload="startTime()">
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="../../index.html"></a>
                    <img src="<?php echo base_url("/assets/images/logo1.png"); ?>" alt="logo" height="45" width="45"/>
                    <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('Main/login'); ?>"><img src="../../../../images/logo-mini.svg" alt="logo"/></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center" style="background-color:#405189">
                    <span class="nav-profile-name" style="color:white"><?php echo date("d/m/Y"); ?></span>
                    <div class="nav-c ml-auto">
                        <span class="nav-profile-name text-left" style="color:white; margin-right: 200px; font-weight: 600; letter-spacing: 1px"><?= strtoupper($_SESSION['login']->ardb_name); ?></span>
                        <span class="nav-profile-name text-right" style="color:white; font-weight: 600; letter-spacing: 1px"><?= strtoupper($_SESSION['login']->user_name); ?></span>
                    </div>

                    <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>  -->
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown mr-4">
                            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell mx-0" style="color:white;"></i>
                                <span class="badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown" id="custom_notif">
                                <p class="mb-0 font-weight-normal float-left dropdown-header" id="noti_leb">Notifications</p>
                                <?php if ($dc_reject_status['dc_shg'] > 0 ) { ?>
                                    <a href="<?= base_url() ?>index.php/dc/dc_view" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?= $dc_reject_status['dc_shg'] ?> Pronote<span class="text-small">(DC SHG)</span> Is Rejected</h6>
                                            <!-- <h6 class="preview-subject font-weight-normal"><?= $dc_fwrd_status['dc_shg'] ?> Pronote<span class="text-small">(DC SHG)</span> Is Forworded</h6> -->
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                <?php }if ($dc_reject_status['dc_self'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/dc_self" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?= $dc_reject_status['dc_self'] ?> Pronote<span class="text-small">(DC Others)</span> Is Rejected</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                <?php }if ($dc_reject_status['apex_dc_shg'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/apex_shg/apex_view" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?= $dc_reject_status['apex_dc_shg'] ?> Pronote<span class="text-small">(APEX DC SHG)</span> Is Rejected</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                <?php } if ($dc_reject_status['apex_dc_self'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/apex_self/apex_self_view" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?= $dc_reject_status['apex_dc_self'] ?> Pronote<span class="text-small">(APEX DC Others)</span> Is Rejected</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <?php } if ($dc_fwrd_status['dc_shg'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/dc/dc_view" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?=$dc_fwrd_status['dc_shg'] ?> Pronote<span class="text-small">(DC SHG)</span> Is Forworded</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <?php } if ($dc_fwrd_status['dc_self'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/dc_self" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?=$dc_fwrd_status['dc_self'] ?> Pronote<span class="text-small">(DC Others)</span> Is Forworded</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <?php } if ($dc_fwrd_status['apex_dc_shg'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/apex_shg/apex_view" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?=$dc_fwrd_status['apex_dc_shg'] ?> Pronote<span class="text-small">(APEX DC SHG)</span> Is Forworded</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <?php } if ($dc_fwrd_status['apex_dc_self'] > 0) {
                                    ?>
                                    <a href="<?= base_url() ?>index.php/apex_self/apex_self_view" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal"><?=$dc_fwrd_status['apex_dc_self'] ?> Pronote<span class="text-small">(APEX DC Others)</span> Is Forworded</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>

                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                            <span class="nav-profile-name" style="color:white"><div id="txt"></div></span>

                        </li>

                    </ul>
                    <!--  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                       <span class="mdi mdi-menu"></span>
                     </button> -->
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <nav class="new-w collapse show pt-2 pl-0 min-vh-100 sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <?php
                        //if ($this->session->userdata['login']->user_type != "A" && $this->session->userdata['login']->br_id > 0) {
                        if ($this->session->userdata['login']->br_id > 0) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Main/login'); ?>">
                                    <i class="mdi mdi-home menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-item" style="display:none;">
                                <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                                    <i class="mdi mdi-layers menu-icon"></i>
                                    <span class="menu-title">Upload</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="ui-advanced">
                                    <ul class="nav flex-column sub-menu">

                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('csv_import'); ?>">Friday Return </a></li>
                                        <li class="nav-item" style="display:none"><a class="nav-link" href="<?php echo site_url('csv_import/friday_upload'); ?>">Friday Return </a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('csv_import/frt_invest'); ?>">Fortnightly Investment </a></li>

                                        <li class="nav-item" style="display:none"><a class="nav-link" href="<?php echo site_url('csv_import/upload_invest'); ?>">Friday Return </a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('csv_import/frt_borrow_clas'); ?>">Borrower's Classification </a></li>

                                        <li class="nav-item" style="display:none"><a class="nav-link" href="<?php echo site_url('csv_import/friday_borrow'); ?>">Friday Return </a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('csv_import_frnt'); ?>">Fortnightly Return </a></li>

                                        <li class="nav-item" style="display:none"><a class="nav-link" href="<?php echo site_url('csv_import_frnt/forthnightly_upload'); ?>">Friday Return </a></li>

                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('csv_import/dc'); ?>">DC Return </a></li>

                                        <li class="nav-item" style="display:none"><a class="nav-link" href="<?php echo site_url('csv_import/dc_upload'); ?>">DC Return </a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php if ($_SESSION['user_type'] == 'U') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#ui-dc" aria-controls="ui-dc">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="ui-dc" aria-expanded="false">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#ui-dc-shg" aria-controls="ui-dc-shg">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="ui-dc-shg" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/dc_view'); ?>">DC </a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/dc_file_upload'); ?>">File Upload </a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/approve_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#ui-dc-self" aria-controls="ui-dc-self">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="ui-dc-self" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self'); ?>">DC</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/file_uploads'); ?>">File Upload</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/forward_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-dc" aria-expanded="false" aria-controls="apex-dc">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-dc">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-shg" aria-controls="apex-shg">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-shg" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_view'); ?>">DC</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_approve_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-self" aria-controls="apex-self">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-self" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_view'); ?>">DC</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_approve_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fri-ret" aria-expanded="false" aria-controls="fri-ret">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Friday Return</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fri-ret">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('friday_return'); ?>">Friday Return</a></li>
                                            <!--<li class="nav-item"><a class="nav-link" href="<?php // echo site_url('friday_return/approve_view');                                                                                                                                                                                                                                                                                ?>">Forward to 1st Approver</a></li>-->
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fort" aria-expanded="false" aria-controls="fort">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Fortnight</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fort">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/investment'); ?>">Loan Issue</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/report_view'); ?>">Demand & Recovery</a></li>
                                            <!--<li class="nav-item"><a class="nav-link" href="<?php //echo site_url('fortnight/dcb_apex_view');                                            ?>">DCB APEX</a></li>-->
                                            <!--<li class="nav-item"><a class="nav-link" href="<?php // echo site_url('friday_return/approve_view');                                                                                                                                                                                                                                                                                ?>">Forward to 1st Approver</a></li>-->
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'V') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#dc-approve" aria-controls="dc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="dc-approve" aria-expanded="false">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#dc-approve-shg" aria-controls="dc-approve-shg">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="dc-approve-shg" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/approve_view'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/approve_view'); ?>">To WBSCARDB</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#dc-approve-self" aria-controls="dc-approve-self">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="dc-approve-self" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/forward_view'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/forward_view'); ?>">To WBSCARDB</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-dc-fwd" aria-expanded="false" aria-controls="apex-dc-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-dc-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-shg-fwd" aria-controls="apex-shg-fwd">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-shg-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_approve_view'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_approve_view'); ?>">To WBSCARDB</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-self-fwd" aria-controls="apex-self-fwd">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-self-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_approve_view'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_approve_view'); ?>">To WBSCARDB</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fri-ret" aria-expanded="false" aria-controls="fri-ret">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Friday Return</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fri-ret">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('friday_return/approve_view'); ?>">Forward to 2nd Approver</a></li>
                                            <?php } elseif ($_SESSION['user_type'] == 'V') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('friday_return/approve_view'); ?>">Forward to WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fort-fwd" aria-expanded="false" aria-controls="fort-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Fortnight</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fort-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#li-fwd" aria-controls="li-fwd">
                                                    <span class="menu-title">Loan Issue</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="li-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/investment'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/target_view'); ?>">Entry Target</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/investment'); ?>">To WBSCARDB</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#dr-fwd" aria-controls="dr-fwd">
                                                    <span class="menu-title">Demand & Recovery</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="dr-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/approve_report_view'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/demand_view'); ?>">Entry Demand</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/approve_report_view'); ?>">To WBSCARDB</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/fort_con_report_in'); ?>">Consolidated Report</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                                  <!-- <i class="mdi mdi-pencil-box-outline menu-icon"></i> -->
                                    <i class="mdi mdi-account menu-icon"></i>
                                    <span class="menu-title">User Profile</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="editors">
                                    <ul class="nav flex-column sub-menu">
                                        <?php if ($_SESSION['user_type'] == "P" || $_SESSION['user_type'] == "V") { ?>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('user'); ?>">Create User</a></li>
                                        <?php } ?>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles'); ?>">Change Password</a></li>
                                        <!-- <li class="nav-item"><a class="nav-link" href="../../pages/forms/text_editor.html">Text editors</a></li>
                                        <li class="nav-item"><a class="nav-link" href="../../pages/forms/code_editor.html">Code editors</a></li> -->
                                    </ul>
                                </div>
                            </li>

                        <?php } else { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('ho/Main/login'); ?>">
                                    <i class="mdi mdi-home menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                            <?php if ($_SESSION['user_type'] != "A" && $_SESSION['user_type'] != "R") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false" aria-controls="ui-reports">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Friday Return</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="ui-reports">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'U' || $_SESSION['user_type'] == 'P') { ?>
                                                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/friday_return'); ?>">Friday Return</a></li>
                                            <?php } elseif ($_SESSION['user_type'] == 'V') { ?>
                                                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/friday_return/report_in'); ?>">Report</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fort-fwd" aria-expanded="false" aria-controls="fort-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Fortnight</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fort-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#li-fwd" aria-controls="li-fwd">
                                                    <span class="menu-title">Loan Issue</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="li-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'U' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/investment_view'); ?>">To 1st Approver</a></li>
                                                        <?php } elseif ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/investment_view'); ?>">To 2nd Approver</a></li>
                                                        <?php } elseif ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <!--<li class="nav-item"><a class="nav-link" href="<?php // echo site_url('ho/fortnight/target_view');                             ?>">Entry Target</a></li>-->
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/report_inv_in'); ?>">Report</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/report_inv_sec_in'); ?>">Consolidated</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#dr-fwd" aria-controls="dr-fwd">
                                                    <span class="menu-title">DR Forward</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="dr-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'U' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/report_view'); ?>">To 1st Approver</a></li>
                                                        <?php } elseif ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/approve_report_view'); ?>">To 2nd Approver</a></li>
                                                        <?php } elseif ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/report_in'); ?>">Report</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/fortnight/fort_con_report_in'); ?>">Consolidated</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php }if ($_SESSION['user_type'] == "U") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#ui-dc" aria-controls="ui-dc">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="ui-dc" aria-expanded="false">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#ui-dc-shg" aria-controls="ui-dc-shg">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="ui-dc-shg" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc/'); ?>">DC</a></li>
                                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc/approve_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#ui-dc-self" aria-controls="ui-dc-self">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="ui-dc-self" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc_self'); ?>">DC</a></li>
                                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc_self/forward_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-dc" aria-expanded="false" aria-controls="apex-dc">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-dc">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-shg" aria-controls="apex-shg">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-shg" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_view'); ?>">DC</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_approve_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-self" aria-controls="apex-self">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-self" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_view'); ?>">DC</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_approve_view'); ?>">Forward to 1st Approver</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php }if ($_SESSION['user_type'] == 'U' || $_SESSION['user_type'] == 'A') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#sanc-amt" aria-expanded="false" aria-controls="sanc-amt">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self Sanction Limit</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="sanc-amt">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/sanction_amt'); ?>">Assign ARDB</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php }if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'V') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#dc-approve" aria-controls="dc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="dc-approve" aria-expanded="false">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#dc-approve-shg" aria-controls="dc-approve-shg">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="dc-approve-shg" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc/approve_view'); ?>"><?= $_SESSION['user_type'] == 'P' ? 'To 2nd Approver' : 'To APEX Bank' ?></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#dc-approve-self" aria-controls="dc-approve-self">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="dc-approve-self" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc_self/forward_view'); ?>"><?= $_SESSION['user_type'] == 'P' ? 'To 2nd Approver' : 'To APEX Bank' ?></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-dc-fwd" aria-expanded="false" aria-controls="apex-dc-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-dc-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-shg-fwd" aria-controls="apex-shg-fwd">
                                                    <span class="menu-title">SHG</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-shg-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_approve_view'); ?>">To 2nd Approver</a></li>
                                                        <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_approve_view'); ?>">To APEX Bank</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" href="#apex-self-fwd" aria-controls="apex-self-fwd">
                                                    <span class="menu-title">Others</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="collapse" id="apex-self-fwd" aria-expanded="false">
                                                    <ul class="nav flex-column sub-menu">
                                                        <ul class="nav flex-column sub-menu">
                                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_approve_view'); ?>">To 2nd Approver</a></li>
                                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_approve_view'); ?>">To APEX Bank</a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } elseif ($_SESSION['user_type'] == 'R') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#doc-approve" aria-expanded="false" aria-controls="doc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self DC Document Approve</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="doc-approve">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/self_doc_verify/view/shg'); ?>">SHG</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/self_doc_verify/view/self'); ?>">Others</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-dc-approve" aria-expanded="false" aria-controls="apex-dc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX DC Approve</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-dc-approve">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/apx_dc_approve/apex_view/shg'); ?>">SHG</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/apx_dc_approve/apex_view/self'); ?>">Others</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == "A") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('ho/Admins/f_define_users'); ?>">
                                        <i class="mdi mdi-home menu-icon"></i>
                                        <span class="menu-title">Create PCARDB/Branch</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                                      <!-- <i class="mdi mdi-pencil-box-outline menu-icon"></i> -->
                                        <i class="mdi mdi-account menu-icon"></i>
                                        <span class="menu-title">User Profile</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="editors">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == "P" || $_SESSION['user_type'] == "V" || $_SESSION['user_type'] == "A") { ?>
                                                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/admins'); ?>">User Create</a></li>
                                                <!--<li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/Admins/f_define_users');                                                                     ?>">No of Users</a></li>-->
                                                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles'); ?>">Change Password</a></li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </li>
                            <?php }if ($_SESSION['user_type'] == "U" || $_SESSION['user_type'] == "P" || $_SESSION['user_type'] == "V" || $_SESSION['user_type'] == "R") {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                                      <!-- <i class="mdi mdi-pencil-box-outline menu-icon"></i> -->
                                        <i class="mdi mdi-account menu-icon"></i>
                                        <span class="menu-title">User Profile</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="editors">
                                        <ul class="nav flex-column sub-menu">
                                                <!--<li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/Admins/f_define_users');                                                                     ?>">No of Users</a></li>-->
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles'); ?>">Change Password</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('main/logout'); ?>">
                                <i class="mdi mdi-home menu-icon"></i>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>