<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> </h4>
              <div class="row">
                <div class="col-12">
              <form method="POST" 
            id="form"
            action="<?php echo site_url('Profiles/f_changepass')?>" >
                  <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>Change Password</h4>
                
                </div>
 <form class="" method="post" action="<?php echo site_url('Profiles/f_changepass')?>">
             <div class="form-group">
            <label class="col-md-12">Old Password</label>
            <div class="col-md-12">
                <input type="password" STYLE="background-color:#dfeaf4;" name="old_pass" class="form-control form-control-line">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">New Password</label>
            <div class="col-md-12">
                <input type="password" STYLE="background-color:#dfeaf4;" name="new_pass" id="new_pass" class="form-control form-control-line">
            </div>
        </div>
              <div class="form-group">
            <label class="col-md-12">Confirm Password</label>
            <div class="col-md-12">
                <input type="password" STYLE="background-color:#dfeaf4;" id="con_pass" class="form-control form-control-line">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-primary" id="btnSubmit">Update Password</button>
            </div>
        </div>
</form>
            </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->