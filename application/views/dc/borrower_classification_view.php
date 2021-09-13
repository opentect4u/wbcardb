<?php
 $borrower_details = json_decode($borrower_details); 
 ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">   <small><a href="<?php echo site_url("dc/borrower_classification_edit/0/0");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                <span class="confirm-div" style="float:right; color:green;"></span></h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>Memo<br> No</th>
                          <th>Pronote<br> No</th>
                          <th>Pronote<br> Date</th>
                          <th>Total SHG</th>
                          <th>Total<br> Member</th>
                          <th>Men</th>
                          <th>Women</th>
                          <th>Total<br> Caste Member</th>
                          <th>Action</th>
                    </tr>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($borrower_details as $dt){
                                $pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->pronote_no);
                                $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
                                echo '<tr>';
                                echo '<td>'.$dt->memo_no.'</td>';
                                echo '<td>'.$dt->pronote_no.'</td>';
                                echo '<td>'.$dt->entry_date.'</td>';
                                echo '<td>'.$dt->total_shg.'</td>';
                                echo '<td>'.$dt->tot_memb.'</td>';
                                echo '<td>'.$dt->tot_male.'</td>';
                                echo '<td>'.$dt->tot_female.'</td>';
                                echo '<td>'.$dt->tot_count.'</td>';
                                echo '<td>
                                        <a href="borrower_classification_edit/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>
                                        <a href="borrower_classification_delete/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>
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
  // function _edit(pronote_no, memo_no){
  //   location.href = "<?= base_url(); ?>index.php/dc/borrower_classification_edit/" + pronote_no + "/" + memo_no;
  // }
  function check(){
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
      return false;
  }

</script>