<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>New ARDB Branch</h4>
                    <br><br>
                    <form class="form-sample" method="POST" action="<?php echo site_url('Masters/addardbbr'); ?>">

                      <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ho Name</label>
                            <div class="col-sm-9">
                              <input type="text"  STYLE="background-color: #fffff0;" class="form-control" name="ho_name" required/>
                            </div>
                          </div>
                        </div>
                      </div> -->

                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ho Name</label>
                            <div class="col-sm-9">
                            <select class="form-control"  STYLE="background-color: #fffff0;" id="ho_name" name="ho_name" required>
                              <option value="">Select ARDB</option>
                              <?php foreach($ardblst as $row) { ?>
                                <option value="<?php echo $row->name;?>"><?php echo $row->name;?></option>
                                <?php
                                  }
                                ?>
                            </select>
                            </div>
                          </div>
                        </div>
                        </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Br Name</label>
                            <!-- <label class="col-sm-3 col-form-label">Address</label> -->
                            <div class="col-sm-9">
                                <!-- <textarea class="form-control" STYLE="background-color: #fffff0;" name="address" rows="4" cols="50" required></textarea> -->
                                <input type="text" STYLE="background-color: #fffff0;" class="form-control" name="br_name"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                            <!-- <label class="col-sm-3 col-form-label">Br Name</label> -->
                            <div class="col-sm-9">
                                <!-- <input type="text" STYLE="background-color: #fffff0;" class="form-control" name="br_name"/> -->
                                <textarea class="form-control" STYLE="background-color: #fffff0;" name="address" rows="4" cols="50" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">eMail.</label>
                            <div class="col-sm-9">
                              <input type="text" STYLE="background-color: #fffff0;"class="form-control" name="email" />
                            </div>
                          </div>
                        </div> -->

                        <!-- <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="gstin" required/>
                            </div> -->
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