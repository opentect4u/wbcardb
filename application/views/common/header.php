<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ARDB</title>
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
</head>

<body class="sidebar-dark" onload="startTime()">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="../../index.html"></a>
        <img src="<?php echo base_url("/assets/images/logo1.png");?>" alt="logo" height="45" width="45"/>
      <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('Main/login'); ?>"><img src="../../../../images/logo-mini.svg" alt="logo"/></a>
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
         <!--  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
              <i class="mdi mdi-settings text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item">
              <i class="mdi mdi-logout text-primary"></i>
              Logout
            </a>
          </div> -->
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
          
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Upload</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('csv_import');?>">Friday Return </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('csv_import/frt_invest');?>">Fortnightly Investment </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('csv_import/frt_borrow_clas');?>">Borrower's Classification </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('csv_import_frnt');?>">Fortnightly Return </a></li>
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
              <!-- <?php if( $_SESSION['user_type'] =="A"){?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('admins');?>">User Create</a></li>
                <?php } ?> -->
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles');?>">Chage Password</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="../../pages/forms/text_editor.html">Text editors</a></li>
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/code_editor.html">Code editors</a></li> -->
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