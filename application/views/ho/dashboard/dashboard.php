 <div class="main-panel">
 <!-- <div class="container-fluid page-body-wrapper"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-white">
                  <div class="card-body d-flex align-items-center justify-content-between">
                    <!-- <h4 class="mt-1 mb-1">Hi, Welcomeback!</h4> -->
                    <h4 class="mt-1 mb-1"><?php echo("".$_SESSION['user_name']);?></h4>
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
                      <!-- <i class="mdi mdi-arrow-top-right"></i> -->
                      <i class=" mdi mdi-chevron-double-up"></i>
                    </div>
                    <div class="text-white">
                      <!-- <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Upload</p> -->
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Friday Return Upload:<?php //if(isset($totfrmnt->mntupload)){
                        //   echo $totfrmnt->mntupload; 
                       // }?></h7>
                        <!-- <small class="mb-0">This month</small> -->
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
                    <i class="mdi mdi-arrow-top-right"></i>
                      <!-- <i class="mdi mdi-basket"></i> -->
                      <!-- <i class="mdi mdi-chevron-double-down"></i> -->
                    </div>
                    <div class="text-white">
                      <!-- <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p> -->
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Friday Return Upload Pending:<?php 
                           //     $frt = $totfrmnt->mntupload;
                           //    $remain = 24-$frt;
                     //   echo $remain; ?></h7>
                        <!-- <small class="mb-0">This month</small> -->
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
                      <!-- <i class="mdi mdi-chart-donut-variant"></i> -->
                      <!-- <i class="mdi mdi-account-settings"></i> -->
                      <i class=" mdi mdi-chevron-double-up"></i>
                    </div>
                    <div class="text-white">
                      <!-- <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Orders</p> -->
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Total Fortnightly Return Upload:<?php //if(isset($totfomnt->fomnt)){
                          // echo $totfomnt->fomnt;  }?></h7>
                        <!-- <small class="mb-0">This month</small> -->
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
                      <!-- <i class="mdi mdi-chart-multiline"></i> -->
                      <!-- <i class=" mdi mdi-book-open-page-variant"></i> -->
                      <i class="mdi mdi-arrow-top-right"></i>
                    </div>
                    <div class="text-white">
                      <!-- <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Growth</p> -->
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Fortnightly Return Upload Pending:<?php 
                               
                          //     $rema = 24-($totfomnt->fomnt);
                       // echo $rema; ?></h7>
                        <!-- <small class="mb-0">This month</small> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         
          </div>
        </div>
         <!-- </div>  -->
        <!-- content-wrapper ends -->
      