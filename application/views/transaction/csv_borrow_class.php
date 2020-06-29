<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
             <div class="row">
   <div class="col-md-10"> <h2 style="color:#4CAF50">Borrower Classification</h2> </div>
                  <div class="col-md-2">
             <a href="<?=base_url()?>index.php/csv_import/friday_borrow"> <button type="button" class="btn btn-primary" style="float:left;">Upload File</button></a>
            </div>
          </div>
          <br>
              <div class="row">
               
              
                <div class="col-12">
             
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr><th>Sl No</th>
                           
                            <th>year</th>
                            <th>month</th>
                            <th>return date</th>
                            <th>Download</th>
                            <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (isset($export_details) && !empty($export_details)) {
                            $count=0;
                            foreach ($export_details as $export) {
                                ?>
                                <tr>
                                    <td><?php echo ++$count; ?></td>
                                   
                                    <td><?php echo date('Y',strtotime($export->return_dt)); ?></td>
                                     <td><?php echo date('m',strtotime($export->return_dt)); ?></td>
                                      <td><?php echo date('d',strtotime($export->return_dt)); ?></td>
                                  
                                      <td>
                                   <a href="<?php echo base_url()?>index.php/Export/export_invest" title="Download">
                                   <i class="fa fa-cloud-download" style="font-size:24px;"></i></a>
                                   
                                </td> 
                               <td><a href="<?php echo base_url()?>index.php/Csv_import/borrower_delete/<?=$export->ardb_id;?>/<?=$export->return_dt;?>" title="Download">
                                <i class="fa fa-trash" style="font-size:24px;color:green"></i></a>
                                    </td>
                              </tr>
                                <?php
                            }
                        }
                        ?>
    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <script>
$(document).ready(function(){

  load_data();

  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>index.php/csv_import/load_invest",
      method:"POST",
      success:function(data)
      {
        $('#imported_csv_data').html(data);
      }
    })
  }

  // $('#import_csv').on('submit', function(event){
  //   event.preventDefault();
  //   $.ajax({
  //     url:"<?php echo base_url(); ?>index.php/csv_import/import",
  //     method:"POST",
  //     data:new FormData(this),
  //     contentType:false,
  //     cache:false,
  //     processData:false,
  //     beforeSend:function(){
  //       $('#import_csv_btn').html('Importing...');
  //     },
  //     success:function(data)
  //     {
  //       $('#import_csv')[0].reset();
  //       $('#import_csv_btn').attr('disabled', false);
  //       $('#import_csv_btn').html('Import Done');
  //       load_data();
  //     }
  //   })
  // });
  
});
</script>