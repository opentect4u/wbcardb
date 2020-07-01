<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> </h4>
              <div class="row">
                <div class="col-12">
              <form method="POST" 
            id="form"
            action="<?php echo site_url("Admins/user_edit");?>" >
                  <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>User Update</h4>
                </div>

            <input type="hidden" name="user_id" value="<?php echo $user_dtls->user_id; ?>">
          <div class="form-group row" id="br_cd" >

         <label for="name" class="col-sm-3 col-form-label">Branch:</label>

      <div class="col-sm-9">

        <select class="form-control" id="br_id" name="br_id" required >
             <option value="">Select</option>
             <?php 
             foreach($branch_dtls as $branch){ ?> 
         <option value="<?=$branch->id?>" <?php if($branch->id==$user_dtls->br_id){
            echo "selected";
         }?>><?=$branch->name?></option>
          <?php } ?>
        </select>
    
         </div>

         </div>                
                <div class="form-group row">

                    <label for="name" class="col-sm-3 col-form-label">User Name:</label>

                    <div class="col-sm-9">
                    <input type="text"
                                class="form-control required"
                                name="user_name"
                                id="user_name" value="<?php echo $user_dtls->user_name; ?>"
                            />                        
                    </div>

                </div> 
             
                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </div>
                  
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