<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WBCARDB</title>
  <!-- plugins:css -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/vendors/mdi/css/materialdesignicons.min.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/css/vendor.bundle.base.css");?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css");?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/font-awesome/css/font-awesome.min.css");?>" />
 <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css");?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png");?>" />
   <script src="<?=base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
   <script src="<?=base_url();?>js/jquery-2.1.4.js"></script>
</head>

<body class="sidebar-dark" onload="startTime()">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <a class="navbar-brand brand-logo" href="../../index.html"></a>
        <img src="<?php echo base_url("/assets/images/logo1.png");?>" alt="logo" height="45" width="45"/>
     <!--  <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../../../images/logo-mini.svg" alt="logo"/></a> -->
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center" style="background-color:#405189">
        <span class="nav-profile-name" style="color:white"><?php echo date("d/m/Y");?></span>
      <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
      </button>  -->  
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
             <span class="nav-profile-name" style="color:white"><div id="txt"></div></span>
        <!--   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
         
          </a> -->
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
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Main/login'); ?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>         
          
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">-->
          <!--    <i class="mdi mdi-layers menu-icon"></i>-->
          <!--    <span class="menu-title">Download</span>-->
          <!--    <i class="menu-arrow"></i>-->
          <!--  </a>-->
          <!--  <div class="collapse" id="ui-advanced">-->
          <!--    <ul class="nav flex-column sub-menu">-->
          <!--      <?php // if( $_SESSION['user_type'] =="A"){?>-->
          <!--      <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('export');?>">Friday Return</a></li>-->
          <!--      <li class="nav-item"> <a class="nav-link" href="<?php //echo site_url('export_frnt_rtn');?>">Fortnightly Return</a></li>-->
          <!--      <?php //} ?>-->
          <!--    </ul>-->
          <!--  </div>-->
          <!--</li>-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false" aria-controls="ui-reports">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Friday Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-reports">
              <ul class="nav flex-column sub-menu">
            
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/friday_ho');?>">Friday Ho</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/friday_ardb');?>">Friday Ardb</a></li>
              
               </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-Borrower" aria-expanded="false" aria-controls="ui-Borrower">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Borrower Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Borrower">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/borrower_ho');?>">Borrower consolidated</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/borrower_ardb');?>">Borrower ARDB</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-Investment" aria-expanded="false" aria-controls="ui-Investment">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Investment Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Investment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/investment_ho');?>">Investment consolidated</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/Investment_ardb');?>">Investment ARDB</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-Fortnightly" aria-expanded="false" aria-controls="ui-Fortnightly">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Fortnightly Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Fortnightly">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/fortnightly_ho');?>">Fortnightly consolidated</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('report/fortnightly_ardb');?>">Fortnightly ARDB</a></li>
              </ul>
            </div>
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
              <?php if( $_SESSION['user_type'] =="A"){?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('admins');?>">User Create</a></li>
                <?php } ?>
             <!--    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles');?>">Chage Password</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('main/logout'); ?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>  
        </ul>
      </nav>