<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ARDB User</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.png" />
</head>
<body>
  <!-- <div class="container-scroller">
     partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo.svg" alt="logo"/></a> -->
      <img src="<?php echo base_url("/assets/images/logo1.png");?>" alt="logo" height="80" width="80">
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
      </button>
      <!-- <ul class="navbar-nav mr-auto">
        <li class="nav-item nav-search d-none d-md-flex" id="navbarSearch">
          <a class="nav-link d-flex justify-content-center align-items-center" id="navbarSearchButton" href="#">
            <i class="mdi mdi-magnify mx-0"></i>
          </a>
          <input type="text" class="form-control" placeholder="Search..." id="navbarSearchInput">                
        </li>
      </ul>     -->
      <ul class="navbar-nav navbar-nav-right">
        
        <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <!-- <img src="https://via.placeholder.com/40x40" alt="profile"/> -->
            <span class="nav-profile-name">User:- <?php echo($_SESSION['user_id']);?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
              <i class="mdi mdi-settings text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item" href="<?php echo site_url('main/logout'); ?>">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </a>
          </div>
        </li>
       
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- <div id="right-sidebar" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        
        <div class="tab-content" id="setting-content"> -->
                    <!-- To do section tab ends -->
          <!-- <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section"> -->
            <!-- <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div> -->
            <!-- <ul class="chat-list"> -->
              <!-- <li class="list active">
                <div class="profile"><img src="https://via.placeholder.com/40x40" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li> -->
              <!-- <li class="list">
                <div class="profile"><img src="https://via.placeholder.com/40x40" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li> -->
              <!-- <li class="list">
                <div class="profile"><img src="https://via.placeholder.com/40x40" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li> -->
              <!-- <li class="list">
                <div class="profile"><img src="https://via.placeholder.com/40x40" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li> -->
              <!-- <li class="list">
                <div class="profile"><img src="https://via.placeholder.com/40x40" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li> -->
              <!-- <li class="list">
                <div class="profile"><img src="https://via.placeholder.com/40x40" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li> -->
            <!-- </ul> -->
          <!-- </div> -->
          <!-- chat tab ends -->
        <!-- </div>
      </div> -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Main/login'); ?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <?php if( $_SESSION['user_type'] =="A"){?>
          
          <li class="nav-item">
            <!-- <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"> -->
              <!-- <i class="mdi mdi-palette menu-icon"></i> -->
              <!-- <span class="menu-title">Masters</span> -->
              <!-- <i class="menu-arrow"></i> -->
            <!-- </a> -->
            <!-- <div class="collapse" id="ui-basic"> -->
              <!-- <ul class="nav flex-column sub-menu"> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/accordions.html">ARDB</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Masters/ardb');?>">ARDB</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Masters/comp');?>">Company</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">ARDB Branch</a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Masters/ardb_br');?>">ARDB Branch</a></li> -->
              <!-- </ul> -->
            <!-- </div> -->
          </li>
          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Upload</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('csv_import');?>">Friday Return Upload</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('csv_import_frnt');?>">Fortnightly Return Upload</a></li>
                <?php if( $_SESSION['user_type'] =="A"){?>
                  
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('export');?>">Friday Return Download</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('abc');?>">Fortnightly Return Download</a></li> -->
                <?php } ?>
              </ul>
            </div>
          </li>
         
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="mdi mdi-layers menu-icon"></i>
              
              <span class="menu-title">User Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
              <?php if( $_SESSION['user_type'] =="A"){?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('admins');?>">User Create</a></li>
                <?php } ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles');?>">Chage Password</a></li>
              </ul>
            </div>
          </li> -->
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
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('profiles');?>">Change Password</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="../../pages/forms/text_editor.html">Text editors</a></li>
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/code_editor.html">Code editors</a></li> -->
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/fridayrtn");?>">Friday Return</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="../../pages/forms/basic_elements.html">Friday Return</a></li>                 -->
                <!-- <li class="nav-item"><a class="nav-link" href="../../pages/forms/advanced_elements.html">Advanced Elements</a></li>
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/validation.html">Validation</a></li>
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/wizard.html">Wizard</a></li> -->
              <!-- </ul>
            </div>
          </li>
        </ul> -->
        
      </nav> 
      <!-- partial -->
      <!-- <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-white">
                  <div class="card-body d-flex align-items-center justify-content-between">
                    <h4 class="mt-1 mb-1">Hi, Welcomeback!</h4>
                    <button class="btn btn-info d-none d-md-block">Import</button>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-success">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-success icon-rounded-lg">
                      <i class="mdi mdi-arrow-top-right"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Sales</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$508</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-info">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-info icon-rounded-lg">
                      <i class="mdi mdi-basket"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$387</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-danger">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-danger icon-rounded-lg">
                      <i class="mdi mdi-chart-donut-variant"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Orders</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$161</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-warning">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-warning icon-rounded-lg">
                      <i class="mdi mdi-chart-multiline"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Growth</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$231</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
         <!-- End custom js for this page-->
</body>

</html>

