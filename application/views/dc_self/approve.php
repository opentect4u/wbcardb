<?php
 $borrower_details = json_decode($borrower_details); 
 ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Approve</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>Memo No</th>
                          <th>Pronote No</th>
                          <th>Pronote Date</th>
                          <th>Total SHG</th>
                          <th>Total Member</th>
                          <th>Men</th>
                          <th>Women</th>
                          <th>SC</th>
                          <th>ST</th>
                          <th>OBC</th>
                          <th>Gen</th>
                          <th>Oth</th>
                          <th>Total</th>
                          <th>Big</th>
                          <th>Marginal</th>
                          <th>Small</th>
                          <th>Landless</th>
                          <th>LIG</th>
                          <th>MIG</th>
                          <th>HIG</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($borrower_details as $dt){
                                echo '<tr>';
                                echo '<td>'.$dt->memo_no.'</td>';
                                echo '<td>'.$dt->pronote_no.'</td>';
                                echo '<td>'.$dt->entry_date.'</td>';
                                echo '<td>'.$dt->total_shg.'</td>';
                                echo '<td>'.$dt->tot_memb.'</td>';
                                echo '<td>'.$dt->tot_male.'</td>';
                                echo '<td>'.$dt->tot_female.'</td>';
                                echo '<td>'.$dt->tot_sc.'</td>';
                                echo '<td>'.$dt->tot_st.'</td>';
                                echo '<td>'.$dt->tot_obc.'</td>';
                                echo '<td>'.$dt->tot_gen.'</td>';
                                echo '<td>'.$dt->tot_other.'</td>';
                                echo '<td>'.$dt->tot_count.'</td>';
                                echo '<td>'.$dt->tot_big.'</td>';
                                echo '<td>'.$dt->tot_marginal.'</td>';
                                echo '<td>'.$dt->tot_small.'</td>';
                                echo '<td>'.$dt->tot_landless.'</td>';
                                echo '<td>'.$dt->tot_lig.'</td>';
                                echo '<td>'.$dt->tot_mig.'</td>';
                                echo '<td>'.$dt->tot_hig.'</td>';
                                echo '<td>Uploaded</td>';
                                echo '<td><button type="button" class="btn btn-success" id="dynamic_add" onclick="_approve('.$dt->pronote_no.', '.$dt->memo_no.');"><i class="fa fa-check"></i></button>
                                  <button type="button" class="btn btn-danger" id="dynamic_add"><i class="fa fa-remove"></i></button></td>';
                                echo '</tr>';
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
  function _approve(pronote_no, memo_no){
    
  }
</script>