<div class="main-panel">
        <div class="content-wrapper">
              <div class="row">
               

                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6"><h3 style="color:#4CAF50">Upload Forthnighty Return</h3></div>

<div class="col-md-6"> <a href="<?=base_url()?>sample_file/Forthnight Return sample.xlsx" style="float:left;color:#405189">Download Sample File To Be uploaded</a></div>

                  </div>
                  <br>
                
                  <form method="post" action ="<?=base_url()?>index.php/csv_import_frnt/import" id="import_csv" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                      <label >Return Date</label><br>
                    <input type="date" name="week_dt" id="" value="" required/>
                    </div>
                   </div>
                            <div class="col-md-4">
                  
                    <div class="form-group">
                        <label>Report Type</label>
       <select name="report_type" class="form-control" required>
         <option value="">Select</option>
        <?php foreach($reports as $report){?>
           <option value="<?=$report->sl_no?>"><?=$report->report_type?></option>
         <?php } ?>
       </select>
                    
                    </div>
                  </div>
                    <div class="col-md-4">
                  
                    <div class="form-group">
                      <label>File upload</label>
                    <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                    </div>
                  </div>
           
                </div>
                    <button type="submit" name="import_csv" class="btn btn-primary mr-2" id="import_csv_btn" >Upload</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
              </div>
          
        </div>
        <!-- content-wrapper ends -->
      