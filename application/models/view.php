<?php
 $shg_details = json_decode($shg_details); 
 // var_dump($shg_details);exit;
 ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">   <small><a href="<?php echo site_url("dc/dc_entry/0/0");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                <span class="confirm-div" style="float:right; color:green;"></span></h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>Memo<br> Date</th>
                          <th>Memo<br> No</th>
                          <th>Sector</th>
                          <th>Pronote<br> No</th>
                          <th>Pronote<br> Date</th>
                          <th>Letter<br> No</th>
                          <th>Letter<br> Date</th>
                          <th>Purpose</th>
                          <th>Moratorium</th>
                          <th>Repayment</th>
                          <th>Action</th>
                    </tr>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($shg_details as $dt){
                                $pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->pronote_no);
                                $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
                                echo '<tr>';
                                echo '<td>'.$dt->memo_date.'</td>';
                                echo '<td>'.$dt->memo_no.'</td>';
                                echo '<td>SHG</td>';
                                echo '<td>'.$dt->pronote_no.'</td>';
                                echo '<td>'.$dt->pronote_date.'</td>';
                                echo '<td>'.$dt->letter_no.'</td>';
                                echo '<td>'.$dt->letter_date.'</td>';
                                echo '<td>'.$dt->purpose.'</td>';
                                echo '<td>'.$dt->moratorium_period.'</td>';
                                echo '<td>'.$dt->repayment_no.'</td>';
                                echo '<td>
                                        <a href="dc_entry/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>
                                        <a href="dc_delete/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
                                  </td>';
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
  function _edit(pronote_no, memo_no){
    // pronote_no = encodeURIComponent(pronote_no);
    // memo_no = encodeURIComponent(memo_no);
    console.log(pronote_no);
    console.log(memo_no);
   // location.href = "<?= base_url(); ?>index.php/dc/dc_entry/" + pronote_no + "/" + memo_no;
  }

</script>