 <div class="main-panel">
 <!-- <div class="container-fluid page-body-wrapper"> -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-white">
                  <div class="card-body d-flex align-items-center justify-content-between">
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
                   
                    <div class="text-white">
                     
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Friday Return:  <?php if(isset($firday->ardb_id)){
                          echo $firday->ardb_id;  }?></h7>
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
                  <div class="text-white">
                   
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Investment: <?php if(isset($invest->ardb_id)){
                          echo $invest->ardb_id;  }?></h7>
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
                  
                    <div class="text-white">
                    
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Nab Farm: <?php if(isset($nabfarm->ardb_id)){
                          echo $nabfarm->ardb_id;  }?></h7>
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
                  
                    <div class="text-white">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Nab Non Farm: <?php if(isset($nonanbfarm->ardb_id)){
                          echo $nonanbfarm->ardb_id;  }?></h7>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-success">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                   
                    <div class="text-white">
                     
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">SHG:  <?php if(isset($sgh->ardb_id)){
                          echo $sgh->ardb_id;  }?></h7>
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
                  <div class="text-white">
                   
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Rural Housing NHB :  <?php if(isset($nhb->ardb_id)){
                          echo $nhb->ardb_id;  }?></h7>
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
                  
                    <div class="text-white">
                    
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Rural Housing NAB:  <?php if(isset($nab->ardb_id)){
                          echo $nab->ardb_id;  }?></h7>
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
                  
                    <div class="text-white">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h7 class="mb-0 mb-md-1 mb-lg-0 mr-1">Consolidated:  <?php if(isset($consolidated->ardb_id)){
                          echo $consolidated->ardb_id;  }?></h7>
                       
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
      