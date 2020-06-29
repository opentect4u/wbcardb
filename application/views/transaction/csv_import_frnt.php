<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">

              <div class="row">
   <div class="col-md-10"> <h2 style="color:#4CAF50">Fortnightly Return</h2> </div>
                  <div class="col-md-2">
             <a href="<?=base_url()?>index.php/csv_import_frnt/forthnightly_upload"> <button type="button" class="btn btn-primary" style="float:left;">Upload File</button></a>
            </div>
            </div>
         <br>
              <div class="row">
                
                <div class="col-12">
            
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr><th>Sl No</th>
                           
                            <th>Return DT</th>  
                             <th>Report Type</th>                       
                            <th>dmd frm fin yr</th>
                            <th>dmd to fin yr</th>
                            <th>dmd prn od</th>
                         
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
                                    
                                    <td><?php echo date('d/m/Y',strtotime($export->return_dt)); ?></td>
                                    <td><?php echo $export->report_type; ?></td>
                                    <td><?php echo $export->dmd_frm_fin_yr; ?></td>
                                    <td><?php echo $export->dmd_to_fin_yr; ?></td>
                                    <td><?php echo $export->dmd_prn_od; ?></td>
                              
                                   
                               <td><a href="<?php echo base_url()?>index.php/csv_import_frnt/forthnight_delete/<?=$export->ardb_id;?>/<?=$export->return_dt;?>/<?=$export->report_type;?>" title="Download">
                                <i class="fa fa-trash" style="font-size:24px;"></i></a>
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