<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WBSCARDB-Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/mdi/css/materialdesignicons.min.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("/vendors/css/vendor.bundle.base.css");?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/css/vertical-layout-light/style.css");?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png");?>" />
</head>
<!-- <body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo" style="text-align: center;">
                  <img src="<?php echo base_url("/assets/images/logo.png");?>" alt="logo" height="120" width="120">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>

                <span style="color:red;margin:auto;display:block;text-align: center;">
                    <p>
                        <?php
                                if($this->session->flashdata('err_message')){
                                    
                                    echo $this->session->flashdata('err_message');
                                }
                        ?>
                    </p>
                </span>    


                <form class="pt-3" method="POST" action="<?php echo site_url("Main/index");?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name ="userid" id="userid" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="paswd" id="paswd" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" id="submit" value="SIGN IN">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                      </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url("/assets/js/off-canvas.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/template.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/todolist.js"); ?>"></script>
  <!-- endinject -->
</body>

</html> 
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
              <img src="<?php echo base_url("/assets/images/logo1.png");?>" alt="logo" height="100" width="30">
                <!-- <img src="../../../../images/logo-black.svg" alt="logo"> -->
              </div>
              <!-- <h4>Welcome back!</h4> -->
              <!-- <h6 class="font-weight-light">Happy to see you again!</h6> -->
              <form class="pt-3"  method="POST" action="<?php echo site_url("Main/index");?>">
                <div class="form-group">
                  <!-- <label for="userid">User name</label> -->
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>

                      <span style="color:red;margin:auto;display:block;text-align: center;">
                    <p>
                        <?php
                                if($this->session->flashdata('err_message')){
                                    
                                    echo $this->session->flashdata('err_message');
                                }
                        ?>
                    </p>
                </span>    

                    </div>
                    <input type="text" class="form-control form-control-lg" name ="userid" id="userid" placeholder="Username" required>
                    <!-- <input type="text" class="form-control form-control-lg border-left-0" id="userid" placeholder="Username"> -->
                  </div>
                </div>
                <div class="form-group">
                  <!-- <label for="exampleInputPassword">Password</label> -->
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                        <i class="glyphicon icon-eye-open glyphicon-eye-open"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg" name="paswd" id="paswd" placeholder="Password" required>
                    <!-- <input type="password" class="form-control form-control-lg border-left-0" id="paswd" placeholder="Password">                         -->
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">
                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" id="submit" value="SIGN IN">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">LOGIN</a> -->
                </div>
                <!-- <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div> -->
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js");?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url("/assets/js/off-canvas.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/hoverable-collapse.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/template.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/settings.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/todolist.js");?>"></script>
  <!-- endinject -->
</body>

</html>

<script>
  $(document).ready(function(){
    $('#userid').on('change',function(){
      var userId = $('#userid').val();
      $.get("./index.php/main/chkUser",{user:userId},function(data){
        if(data==0){
          $('#userid').val('');
          $("#userid").css("border","1px solid red");
					alert("Invalid user id.");
          return false;
        }else{
          $("#userid").css("border","1px solid #ccc");
          return true;
        }
      });
    });
  });
</script>