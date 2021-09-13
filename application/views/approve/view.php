<?php
 $shg_details = json_decode($shg_details); 
 // var_dump($shg_details);exit;
 ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> <small></small>
                <span class="confirm-div" style="float:right;"></span></h4>
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
                          <th>Purpose</th>
                          <th>Action</th>
                          <th>Download<br> Document</th>
                          <th>Forward Data</th>
                    </tr>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($shg_details as $dt){
                                $pronote_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->pronote_no);
                                $memo_no = str_replace(array(':', '-', '/', '*', ' '), '', $dt->memo_no);
                                echo '<tr>';
                                echo '<td>'.date('d/m/Y', strtotime(str_replace('-', '/', $dt->memo_date))).'</td>';
                                echo '<td>'.$dt->memo_no.'</td>';
                                echo '<td>SHG</td>';
                                echo '<td>'.$dt->pronote_no.'</td>';
                                echo '<td>'.$dt->purpose.'</td>';
                                echo '<td>
                                        <a href="approve/dc_entry/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a>';
                                //echo   '<a href="dc_delete/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return check();"><i class="fa fa-trash-o fa-lg" style="color:red"></i></a>';
                                echo '</td>';
                                  if($dt->upload > 0){
                                    echo '<td>
                                        <a href="'.base_url().'index.php/dc/download_zip/'.$ardb_id.'/'.$pronote_no.'" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="fa fa-download fa-lg"></i></a>
                                        </td>';
                                        if($dt->fwd_data == 'N'){
                                    echo '<td>
                                      <a href="forward_data/'.$pronote_no.'/'.$memo_no.'" data-toggle="tooltip" data-placement="bottom" title="Forward Data"><i class="fa fa-forward fa-lg"></i></a>
                                      </td>';
                                    }else{
                                      echo '<td></td>';
                                    }
                                  }else{
                                    echo '<td></td>';
                                    echo '<td></td>';
                                  }
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
  function check(){
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
      return false;
  }
  // function _edit(pronote_no, memo_no){
  //   // pronote_no = encodeURIComponent(pronote_no);
  //   // memo_no = encodeURIComponent(memo_no);
  //   console.log(pronote_no);
  //   console.log(memo_no);
  //  // location.href = "<?= base_url(); ?>index.php/dc/dc_entry/" + pronote_no + "/" + memo_no;
  // }

</script>