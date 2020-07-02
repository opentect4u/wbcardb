<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> </h4>
              <div class="row">
                <div class="col-12">
              <form method="POST" 
            id="form"
            action="<?php echo site_url("ho/Admins/f_user_add");?>" >
                  <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>User Entry</h4>
                
                </div>


          <div class="form-group row" id="br_cd" >

         <label for="name" class="col-sm-3 col-form-label">Branch:</label>

      <div class="col-sm-9">

        <select class="form-control" id="br_id" name="br_id" required >
             <option value="">Select</option>
             <?php foreach($branch_dtls as $branch){ ?> 
         <option value="<?=$branch->id?>"><?=$branch->name?></option>
          <?php } ?>
        </select>
    
         </div>

         </div> 

                <div class="form-group row">

                    <label for="user_id" class="col-sm-3 col-form-label">User ID:</label>

                    <div class="col-sm-9">

                        <input type="text"
                                class="form-control required"
                                name="user_id"
                                id="user_id"
                            />

                    </div>

                </div>
                 
                
                <div class="form-group row">

                    <label for="pass" class="col-sm-3 col-form-label">Password:</label>

                    <div class="col-sm-9">

                        <input  type="password"
                                class="form-control"
                                name="pass"
                                id="pass"
                                value="123"
                            >

                    </div>

                </div>
               
                <div class="form-group row">

                    <label for="name" class="col-sm-3 col-form-label">User Name:</label>

                    <div class="col-sm-9">
                    <input type="text"
                                class="form-control required"
                                name="user_name" value=""
                                id="user_name"
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

        $('#br_id').change(function(){

             var name = $('#br_id :selected').text();

               $('#user_name').val(name);


        });
      </script>
