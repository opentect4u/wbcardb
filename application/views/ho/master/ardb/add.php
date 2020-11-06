<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>New ARDB</h4>
                    <br><br>
                    <form class="form-sample" method="POST" action="<?php echo site_url('Masters/addardb'); ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text"  STYLE="background-color:#dfeaf4;" class="form-control" name="name" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" STYLE="background-color: #dfeaf4;" name="address" rows="4" cols="50" required></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No.</label>
                            <div class="col-sm-9">
                                <input type="text" STYLE="background-color:#dfeaf4;" class="form-control" name="ph_no"/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">eMail.</label>
                            <div class="col-sm-9">
                              <input type="text" STYLE="background-color:#dfeaf4;"class="form-control" name="email" />
                            </div>
                          </div>
                        </div>

                        <!-- <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="gstin" required/>
                            </div> -->

                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">District Name</label>
                            <div class="col-sm-9">
                            <select class="form-control"  STYLE="background-color:#dfeaf4;" id="dist" name="dist" required>
                              <option value="">Select District</option>
                              <?php foreach($dist as $row) { ?>
                                <option value="<?php echo $row->district_code;?>"><?php echo $row->district_name;?></option>
                                <?php
                                  }
                                ?>
                            </select>
                            </div>
                          </div>
                        </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group d-flex">
                        <input type="submit" class="btn btn-info d-none d-md-block" id="add-task">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>