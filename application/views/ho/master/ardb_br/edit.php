<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Edit ARDB Branch Details</h4>
                    <br><br>
                    <form class="form-sample" method="POST" action="<?php echo site_url('Masters/editardbbr'); ?>">

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="id" value="<?php echo $ardb->id; ?>" readonly/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ho  Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ho_name" value="<?php echo $ardb->ho_name;?>" readonly/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="address" rows="4" cols="50" required><?php echo $ardb->address; ?></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Branch Name.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="br_name" value="<?php echo $ardb->br_name; ?>"/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Drug License No.</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="linc" value="<?php echo $comp->Drug_License; ?>" />
                            </div>
                          </div>
                        </div> -->

                        <!-- <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="gstin" value="<?php echo $comp->GST_ID; ?>" required/>
                            </div>
                          </div>
                        </div>
                    </div> -->


                      
                      <div class="form-group d-flex">
                        <input type="submit" class="btn btn-info d-none d-md-block" id="add-task">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div> 