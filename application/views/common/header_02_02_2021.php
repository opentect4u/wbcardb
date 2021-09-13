<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo("" . $_SESSION['user_name']); ?></title>
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
                        <li class="nav-item">
                            <span class="nav-profile-name" style="color:white">
                                <?php
//                                $CI = & get_instance();
//                                $CI->load->model('notification_model');
//                                $d = 303;
//                                var_dump($CI->notification_model->get_block_list($d));
//                                exit;
                                ?>
                                <a href="" class="notification mr-3" data-toggle="modal" data-target="#myModal" style="color:white">
                                    <i class="fa fa-bell"></i>
                                    <span class="badge">3</span>
                                </a>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title">Notification</h5>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <ul class="nav-menu">
                                                    <li class=""><a href="#"><i class="fa fa-sticky-note nav-icon" aria-hidden="true"></i><span class="nav-note">You Have One rejected Pronote</span></a> </li>
                                                    <li>
                                                        Modal body.. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic id veniam maxime aut inventore cumque reprehenderit nesciunt? Aperiam, corrupti aliquid iusto praesentium esse excepturi neque saepe minus, doloremque quasi at nemo mollitia laborum quaerat debitis perferendis quibusdam possimus cupiditate maxime voluptate voluptatem aut. Incidunt amet vero sequi nobis consequuntur minima.
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Modal footer -->
                                            <!-- <div class="modal-footer">
                                            </div> -->

                                        </div>
                                    </div>
                                </div>
                            </span>

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
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <?php if ($this->session->userdata['login']->user_type != "A" && $this->session->userdata['login']->br_id > 0) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('Main/login'); ?>">
                                    <i class="mdi mdi-home menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-item">
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
                                    <a class="nav-link" data-toggle="collapse" href="#ui-dc" aria-expanded="false" aria-controls="ui-dc">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">SHG DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="ui-dc">
                                        <ul class="nav flex-column sub-menu">

                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/dc_view'); ?>">SHG DC </a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/dc_file_upload'); ?>">SHG File Upload </a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/approve_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'V') { ?>
                                <li class="nav-item <?php
                                if ($this->uri->segment(1) == "approve1" OR "approve2") {
                                    echo "active";
                                }
                                ?>">
                                    <a class="nav-link" data-toggle="collapse" href="#dc-approve" aria-expanded="false" aria-controls="dc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">SHG DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="dc-approve">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/approve_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc/approve_view'); ?>">To WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == 'U') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#self" aria-expanded="false" aria-controls="self">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Other Than SHG DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="self">
                                        <ul class="nav flex-column sub-menu">

                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self'); ?>">SELF DC</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/file_uploads'); ?>">SELF File Upload</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/forward_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-shg" aria-expanded="false" aria-controls="apex-shg">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX SHG DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-shg">
                                        <ul class="nav flex-column sub-menu">

                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_view'); ?>">SHG DC</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_approve_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-self" aria-expanded="false" aria-controls="apex-self">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX Other Than SHG DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-self">
                                        <ul class="nav flex-column sub-menu">

                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_view'); ?>">SELF DC</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_approve_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == 'U') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fri-ret" aria-expanded="false" aria-controls="fri-ret">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Friday Return</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fri-ret">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('friday_return'); ?>">Friday Return</a></li>
                                            <!--<li class="nav-item"><a class="nav-link" href="<?php // echo site_url('friday_return/approve_view');                                                       ?>">Forward to 1st Approver</a></li>-->
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
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/investment'); ?>">Investment</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/report_view'); ?>">Report</a></li>
                                            <!--<li class="nav-item"><a class="nav-link" href="<?php // echo site_url('friday_return/approve_view');                                                       ?>">Forward to 1st Approver</a></li>-->
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'V') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#self-dc-approve" aria-expanded="false" aria-controls="self-dc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Self DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="self-dc-approve">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/forward_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('dc_self/forward_view'); ?>">To WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apx-shg-fwd" aria-expanded="false" aria-controls="apx-shg-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX SHG DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apx-shg-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_approve_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_shg/apex_approve_view'); ?>">To WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li><li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apx-self-fwd" aria-expanded="false" aria-controls="apx-self-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX Self DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apx-self-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_approve_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('apex_self/apex_self_approve_view'); ?>">To WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fri-fwd" aria-expanded="false" aria-controls="fri-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Forward Friday Return</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fri-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('friday_return/approve_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('friday_return/approve_view'); ?>">To WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#fort-fwd" aria-expanded="false" aria-controls="fort-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Forward Fortnight</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="fort-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/approve_view'); ?>">To 2nd Approver</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/approve_report_view'); ?>">Report To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/approve_view'); ?>">To WBSCARDB</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('fortnight/approve_report_view'); ?>">Report To WBSCARDB</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>

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
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles'); ?>">Chage Password</a></li>
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

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false" aria-controls="ui-reports">
                                    <i class="mdi mdi-layers menu-icon"></i>
                                    <span class="menu-title">Friday Return</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="ui-reports">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/friday_return'); ?>">Forward</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/friday_ho'); ?>">Consolidated</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/friday_ardb'); ?>">ARDB Wise</a></li>

                                    </ul>
                                </div>
                            </li>

                            <!--   <li class="nav-item">
                               <a class="nav-link" data-toggle="collapse" href="#ui-Borrower" aria-expanded="false" aria-controls="ui-Borrower">
                                 <i class="mdi mdi-layers menu-icon"></i>
                                 <span class="menu-title">Borrower Reports</span>
                                 <i class="menu-arrow"></i>
                               </a>
                               <div class="collapse" id="ui-Borrower">
                                 <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/report/borrower_ho');                                                                                       ?>">Ho</a></li>
                                   <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/report/borrower_ardb');                                                                                       ?>">Branch</a></li>
                                 </ul>
                               </div>
                             </li> -->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#ui-Investment" aria-expanded="false" aria-controls="ui-Investment">
                                    <i class="mdi mdi-layers menu-icon"></i>
                                    <span class="menu-title">Investment Reports</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="ui-Investment">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/fortnight/investment_view'); ?>">Forward</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/investment_ho'); ?>">Consolidated</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/Investment_ardb'); ?>">ARDB Wise</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#ui-fortnightly" aria-expanded="false" aria-controls="ui-fortnightly">
                                    <i class="mdi mdi-layers menu-icon"></i>
                                    <span class="menu-title">Fortnightly Reports</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="ui-fortnightly">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/fortnight/report_view'); ?>">Forward</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/fortnightly_ho'); ?>">Consolidated</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/fortnightly_ardb'); ?>">ARDB WISE</a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php if ($_SESSION['user_type'] == "U" || $_SESSION['user_type'] == "A") { ?>

                                <li class="nav-item <?php
                                if ($this->uri->segment(2) == "dc") {
                                    echo "active";
                                }
                                ?>">
                                    <a class="nav-link" data-toggle="collapse" href="#dc-shg" aria-expanded="false" aria-controls="dc-shg">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">SHG DC </span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="dc-shg">
                                        <ul class="nav flex-column sub-menu">
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/report/fortnightly_ho');                                                                                       ?>">Ho</a></li> -->
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/dc_ardb'); ?>">DC</a></li> -->
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc/'); ?>">SHG DC</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc/approve_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#dc-self" aria-expanded="false" aria-controls="dc-self">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">SELF DC </span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="dc-self">
                                        <ul class="nav flex-column sub-menu">
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/report/fortnightly_ho');                                                                                       ?>">Ho</a></li> -->
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/dc_ardb'); ?>">DC</a></li> -->
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc_self'); ?>">SELF DC</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc_self/forward_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-shg" aria-expanded="false" aria-controls="apex-shg">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX SHG DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-shg">
                                        <ul class="nav flex-column sub-menu">

                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_view'); ?>">SHG DC</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_approve_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apex-self" aria-expanded="false" aria-controls="apex-self">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX Self DC</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apex-self">
                                        <ul class="nav flex-column sub-menu">

                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_view'); ?>">SELF DC</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_approve_view'); ?>">Forward to 1st Approver</a></li>
                                        </ul>
                                    </div>
                                </li>

                            <?php } ?>
                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == "A") { ?>
                                <li class="nav-item <?php
                                if ($this->uri->segment(1) == "approve1" OR "approve2") {
                                    echo "active";
                                }
                                ?>" style="display: none;">
                                    <a class="nav-link" data-toggle="collapse" href="#dc-approve" aria-expanded="false" aria-controls="dc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="dc-approve">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'U' || $_SESSION['user_type'] == 'A') { ?>
                                                                                                                                                                                                                    <!-- <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/approve/forward'); ?>">To 1st Approver</a></li> -->
                                            <?php }if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/approve/forward'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/approve/forward/2'); ?>">2nd Level </a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#shg-forward" aria-expanded="false" aria-controls="shg-forward">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">SHG Forward </span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="shg-forward">
                                        <ul class="nav flex-column sub-menu">
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/report/fortnightly_ho');                                                                                       ?>">Ho</a></li> -->
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/dc_ardb'); ?>">DC</a></li> -->
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc/approve_view'); ?>"><?= $_SESSION['user_type'] == 'P' ? 'To 2nd Approver' : 'To APEX Bank' ?></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#self-forward" aria-expanded="false" aria-controls="self-forward">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">SELF Forward </span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="self-forward">
                                        <ul class="nav flex-column sub-menu">
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('ho/report/fortnightly_ho');                                                                                      ?>">Ho</a></li> -->
                                          <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/report/dc_ardb'); ?>">DC</a></li> -->
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/dc_self/forward_view'); ?>"><?= $_SESSION['user_type'] == 'P' ? 'To 2nd Approver' : 'To APEX Bank' ?></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apx-shg-fwd" aria-expanded="false" aria-controls="apx-shg-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX SHG DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apx-shg-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_approve_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_shg/apex_shg_approve_view'); ?>">To APEX Bank</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#apx-self-fwd" aria-expanded="false" aria-controls="apx-self-fwd">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">APEX Self DC Forward</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="apx-self-fwd">
                                        <ul class="nav flex-column sub-menu">
                                            <?php if ($_SESSION['user_type'] == 'P' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_approve_view'); ?>">To 2nd Approver</a></li>
                                            <?php }if ($_SESSION['user_type'] == 'V' || $_SESSION['user_type'] == 'A') { ?>
                                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('ho/apex_self/apex_self_approve_view'); ?>">To APEX Bank</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php } elseif ($_SESSION['user_type'] == 'R') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#doc-approve" aria-expanded="false" aria-controls="doc-approve">
                                        <i class="mdi mdi-layers menu-icon"></i>
                                        <span class="menu-title">DC Document Approve</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="doc-approve">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/self_doc_verify/view/shg'); ?>">Self SHG</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/self_doc_verify/view/self'); ?>">Other Than SHG</a></li>
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
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/apx_dc_approve/apex_view/shg'); ?>">Self SHG</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/apx_dc_approve/apex_view/self'); ?>">Other Than SHG</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                                  <!-- <i class="mdi mdi-pencil-box-outline menu-icon"></i> -->
                                    <i class="mdi mdi-account menu-icon"></i>
                                    <span class="menu-title">User Profile</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="collapse" id="editors">
                                    <ul class="nav flex-column sub-menu">
                                        <?php if ($_SESSION['user_type'] == "A") { ?>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/admins'); ?>">User Create</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ho/Admins/f_define_users'); ?>">No of Users</a></li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </li>



                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('main/logout'); ?>">
                                <i class="mdi mdi-home menu-icon"></i>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>