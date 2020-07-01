<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Friday Return</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr><th>Sl No</th>
                            <th>Ardb ID</th>
                            <th>Submit DT</th>                       
                            <th>RD</th>
                            <th>FD</th>
                            <th>Flexi</th>
                           <!--  <th>MIS</th>
                            <th>Other Dep</th> -->
                            <th> Download</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (isset($export_details) && !empty($export_details)) {
                            $count=0;
                            foreach ($export_details as $export) {
                                ?>
                                <tr>
                                <td ><?php echo ++$count; ?></td>
                                 
                                    <td><?php  if($export->ardb_id == 1){
                                               echo "KKCARDB"; 
                                         }elseif($export->ardb_id == 2){
                                               echo "ACARDB";  
                                         }elseif($export->ardb_id == 3){
                                               echo "RARDB";  
                                         }
                                     elseif($export->ardb_id == 4){
                                               echo "HARDB";  
                                         }
                                         else {
                                            echo "DDDARDB";  
                                         } 
                                 ?>
                                 </td>
                                 
                                    <td><?php echo $export->week_dt; ?></td>
                                    <td><?php echo $export->rd; ?></td>
                                    <td><?php echo $export->fd; ?></td>
                                    <td><?php echo $export->flexi_sb; ?></td>
                                   
                                 <td><a href="<?php echo base_url()?>index.php/ho/Transactions/f_fridayrtn_Excel/<?=$export->ardb_id;?>" title="Download">
                                <i class="fa fa-cloud-download" style="font-size:36px;"></i></a>
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