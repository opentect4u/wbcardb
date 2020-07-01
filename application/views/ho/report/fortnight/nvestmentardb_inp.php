<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
                  <h4 style="color:blue">Please Input Date</h4>
                  
             <div class="row">
                <div class="col-12">
              
              <form method="POST" id="form" action="<?php echo site_url("ho/Report/borrower_ardb");?>" >

                    <div class="form-group row">
                        <label for="from_dt" class="col-sm-2 col-form-label">From:</label>

                         <div class="col-sm-4">
                              <input type="date" class="form-control" id="from_dt" name="from_dt" value="<?php echo date('Y-m-d');?>" required/>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="to_dt" class="col-sm-2 col-form-label">To:</label>

                         <div class="col-sm-4">
                              <input type="date" class="form-control" id="to_dt" name="to_dt" value="<?php echo date('Y-m-d');?>" required/>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="to_dt" class="col-sm-2 col-form-label">ARBD:</label>

                         <div class="col-sm-4">
                              <select class="form-control" name="ardb_id">
                                <option value ="">Select ARDB</option>
                                <?php foreach($branch as $bran){?>
                                          <option value="<?=$bran->id?>"><?=$bran->name?></option>
                                <?php } ?>
                              </select>
                         </div>
                    </div>

            <div class="form-group row">
               <label for="to_dt" class="col-sm-2 col-form-label"></label>
    
              <button class="btn btn-primary" id="save" type="submit">Proceed</button>
            </div>

     </form>
   </div>
 </div>
</div>
</div>
</div>