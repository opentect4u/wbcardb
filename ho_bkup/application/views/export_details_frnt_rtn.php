<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Fortnight Return</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr><th>Sl No</th>
                            <th>Ardb ID</th>
                            <th>From DT</th>   
                            <th>TO DT</th>                     
                            <th>DMND CR_P</th>
                            <th>DMND OD_P</th>
                           <!--  <th>DMD CR INTT</th>
                            <th>DMD OD INTT</th> -->
                            <th> Download</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                        if (isset($export_details_frnt_rtn) && !empty($export_details_frnt_rtn)) {
                            $count=0;
                            foreach ($export_details_frnt_rtn as $export) {
                                ?>
                                <tr>
                                <td ><?php echo ++$count; ?></td>
                                   
                                    <td><?php  if($export->ARDB_HO == 1){
                                               echo "KKCARDB"; 
                                         }elseif($export->ARDB_HO == 2){
                                               echo "ACARDB";  
                                         }elseif($export->ARDB_HO == 3){
                                               echo "RARDB";  
                                         }
                                     elseif($export->ARDB_HO == 4){
                                               echo "HARDB";  
                                         }
                                         else {
                                            echo "DDDARDB";  
                                         } 
                                 ?>
                                 </td>
                                   
                                    <td><?php echo $export->FRM_DT; ?></td>
                                    <td><?php echo $export->TO_DT; ?></td>
                                    <td><?php echo $export->DMND_CR_P; ?></td>
                                    <td><?php echo $export->DMND_OD_P; ?></td>
                                   <!--  <td><?php echo $export->DMD_CR_INTT; ?></td>
                                    <td><?php echo $export->DMD_OD_INTT; ?></td> -->
                                   
                                 <td><a href="<?php echo base_url()?>index.php/Transactions/f_frntrtn_Excel/<?=$export->ARDB_HO;?>" title="Download">
                                
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