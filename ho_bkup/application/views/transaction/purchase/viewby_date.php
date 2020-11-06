<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
              <h3>List of Purchases</h3>

               <?php
    
     if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        
    ?>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Date</th>
                            <th>Bill No.</th>
                            <th>Amount</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                            foreach($purc as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($row->bill_dt)); ?></td>
                            <td><?php echo $row->bill_no; ?></td>
                            <td><?php echo $row->net_amt; ?></td>
                            <td>
                              <a href="<?php echo site_url('Purchases/editPurchase?id='.$row->bill_no.''); ?>" title="Edit">
                              <span class="mdi mdi-account-edit"></span>
                              </a>
                            </td>
                            <td>
                              <a href="<?php echo site_url('Purchases/delPurchase?bill_no='.$row->bill_no.''); ?>" onclick="return confirm('Are you sure you want to delete this item?');" >
                              <span class="mdi mdi-delete"></span>
                              </a>
                            </td>  

                            

                        </tr>
                         <?php 
                          $i++;
                          } 
                        ?>
                      </tbody>
                    </table>
                    <?php } else{ ?>

                      <div class="row" style="margin-top: 20px;">
           
                <div class="col-6" >

                   <form method="POST"  action="<?php echo site_url("Purchases/viewPurchasebydt");?>" >
                     <div class="form-group row">

                    <label for="from_date" class="col-sm-4 col-form-label">From Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="from_date"
                               class="form-control" required
                               value="<?php //echo $sys_date;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-4 col-form-label">To Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="to_date"
                               class="form-control" required
                               value="<?php //echo $sys_date;?>"
                            />

                    </div>

                </div>


                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Proceed" />

                    </div>

                </div>
                   </form>    

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
    