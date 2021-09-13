<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> </h4>
              <div class="row">
                <div class="col-12">
              <form method="POST" id="form" action="<?php echo site_url("user/deactive");?>" >
                  <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>User Update</h4>
                </div>

            <input type="hidden" name="user_id" value="<?php echo $user_dtls->user_id; ?>">
            <input type="hidden" name="ardb_id" value="<?= $user_dtls->br_id; ?>">                
                <div class="form-group row">

                    <label for="name" class="col-sm-3 col-form-label">User Name:</label>

                    <div class="col-sm-9">
                    <input type="text"
                                class="form-control required"
                                name="user_name" readonly
                                id="user_name" value="<?php echo $user_dtls->user_name; ?>"
                            />                        
                    </div>

                </div> 

                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">User Status:</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="user_status" name="user_status" required>
                      <option value="A">Activate</option>
                      <option value="I">Deactivate</option>
                    </select>
                  </div>
                </div> 

                <div class="form-group row">

                    <label for="remarks" class="col-sm-3 col-form-label">Remarks:</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control required" name="remarks" id="remarks" value="" />                        
                    </div>

                </div> 
             
                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </div>
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <script>

    // $('#user_type').change(function(e) { // <--- THIS IS THE CHANGE
 
    //  var user_id = $('#user_type').val();

    //  console.log(user_id);

    //  if(user_id == "U"){
    //     $('#br_cd').show();
    //     $('#br_id').prop('required',true);
    //     }else{
    //         $('#br_cd').hide();  
    //          $('#br_id').prop('required',false);
    //     }
    

    // });
  </script>