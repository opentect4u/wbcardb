<?php 
$block_list = json_decode($block_list);
$purpose_list = json_decode($purpose_list);
$selected = json_decode($selected);
$borrower_selected = json_decode($borrower_selected);
$dc_shg_dtls = json_decode($dc_shg_dtls);
$id = $selected ? $selected->id : '0';
if($id > 0){
    $disable_button = $selected->fwd_data == 'Y' ? 'disabled' : '';
}else{
    $disable_button = '';
}
// var_dump($dc_shg_dtls);exit;
 ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> </h4>
                <?= form_open('approve/dc_save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                    <h4>DC Form Entry</h4>
                    </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $selected ? $selected->date : date('Y-m-d') ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Memo Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="memo_no" id="memo_no" value="<?= $selected ? $selected->memo_no : '' ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sector</label>
                                    <div class="col-sm-9">
                                        <label class="col-form-label">SHG</label>
                                        <input type="hidden" class="form-control" name="sector" id="sector" value="23" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Letter No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="letter_no" id="letter_no" value="<?= $selected ? $selected->letter_no : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Letter Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="letter_date" id="letter_date" value="<?= $selected ? $selected->letter_date : date('Y-m-d') ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pronote No.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="pronote_no" id="pronote_no" value="<?= $selected ? $selected->pronote_no : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pronote Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="pronote_date" id="pronote_date" value="<?= $selected ? $selected->pronote_date : date('Y-m-d'); ?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Purpose</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="purpose" name="purpose" required >
                                            <option value="">Select</option>
                                            <?php if($purpose_list){
                                                    foreach($purpose_list as $purpose){
                                                        $select = "";
                                                        if($selected->purpose == $purpose->purpose_code){
                                                            $select = "selected";
                                                        }
                                                        echo '<option value="'.$purpose->purpose_code.'" '.$select.'>'.$purpose->purpose_name.'</option>';
                                                    }
                                                } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Moratorium</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="moral" id="moral" value="<?= $selected ? $selected->moral : ''; ?>" required="" placeholder="In Months">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Repayment</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="repayment" id="repayment" value="<?= $selected ? $selected->repayment : ''; ?>" required="" placeholder="In Months">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table" class="table">
                              <thead>
                                <tr>
                                    <th>Name of the SHG/s</th>
                                    <th>Total <br>Numbers</th>
                                    <th>Address</th>
                                    <th>Block</th>
                                    <th>Rate of <br>Interest <br>(%)</th>
                                    <th>BOD Sanction Date</th>
                                    <th>Due Date</th>
                                    <th>Project Cost</th>
                                    <th>Amount Sanctioned</th>
                                    <th>Total Own <br>Contribution <br>(Rs.)</th>
                                    <th> Amount <br>Disbursed <br>(Rs)</th>
                                    <th>Intersee <br>Agreement Date</th>
                                    <th>Total <br>Intersee <br>Ag. Bond</th>
                                    <th><button type="button" class="btn btn-success" id="dynamic_add"><i class="fa fa-plus"></i></button></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php if(sizeof($dc_shg_dtls) > 0){
                                        $i = 1;
                                        foreach($dc_shg_dtls as $dt){
                                            echo '<tr id="row_' . $i . '">';
                                            echo '<td>
                                          <div class="form-group"><input type="text" class="form-control required" name="shg_name[]" id="shg_name_'.$i.'" value="'.$dt->shg_name.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="number[]" id="number_'.$i.'" value="'.$dt->tot_memb.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="address[]" id="address_'.$i.'" value="'.$dt->shg_addr.'" /></div> 
                                      </td>
                                      <td><div class="form-group">
                                      <select class="form-control" id="block_id_1" name="block_id[]" required >
                                      <option value="">Select</option>';
                                      if($block_list){
                                        foreach($block_list as $block){
                                            $select = "";
                                            if($dt->block_code == $block->block_code){
                                                $select = "selected";
                                            }
                                            echo '<option value="'.$block->block_code.'" '.$select.'>'.$block->block_name.'</option>';
                                    }
                                        }
                                        echo '</select></div></td>';
                                        echo '<td>
                                          <div class="form-group"><input type="text" class="form-control required" name="rete_of_interest[]" id="rate_of_interest_'.$i.'" value="'.$dt->roi.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_'.$i.'" value="'.$dt->bod_sanc_dt.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_'.$i.'" value="'.$dt->due_dt.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="project_cost[]" id="project_cost_'.$i.'" value="'.$dt->project_cost.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="sanction_amount[]" id="sanction_amount_'.$i.'" value="'.$dt->sanc_amt.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="own_contribution[]" id="own_contribution_'.$i.'" value="'.$dt->tot_own_amt.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="disbursed_amount[]" id="disbursed_amount_'.$i.'" value="'.$dt->disb_amt.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_'.$i.'" value="'.$dt->intr_aggr_dt.'" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="ag_bound[]" id="ag_bound_'.$i.'" value="'.$dt->total_Intr_ag_bond.'" /></div> 
                                      </td>
                                      <td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete('.$i.')"><i class="fa fa-remove"></i></button></td>';
                                        echo '</tr>';
                                        $i++;
                                        }
                                    }else{ ?>
                                  <tr id="row_1">
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="shg_name[]" id="shg_name_1" value="" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="number[]" id="number_1" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="address[]" id="address_1" /></div> 
                                      </td>
                                      <td>
                                        <div class="form-group">
                                            <select class="form-control" id="block_id_1" name="block_id[]" required >
                                                <option value="">Select</option>
                                                <?php if($block_list){
                                                            foreach($block_list as $block){
                                                                    echo '<option value="'.$block->block_code.'">'.$block->block_name.'</option>';
                                                                }
                                                        } ?>
                                            </select>
                                        </div>
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="rete_of_interest[]" id="rate_of_interest_1" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_1" value="<?= date('Y-m-d') ?>" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_1" value="<?= date('Y-m-d') ?>" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="project_cost[]" id="project_cost_1" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="sanction_amount[]" id="sanction_amount_1" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="own_contribution[]" id="own_contribution_1" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="disbursed_amount[]" id="disbursed_amount_1" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_1" value="<?= date('Y-m-d') ?>" /></div> 
                                      </td>
                                      <td>
                                          <div class="form-group"><input type="text" class="form-control required" name="ag_bound[]" id="ag_bound_1" /></div> 
                                      </td>
                                      <td><button type="button" id="remove_1" class="btn btn-danger" onclick="_delete(1)"><i class="fa fa-remove"></i></button></td>
                                  </tr>
                                  <?php } ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12"><label><b><u>SHG Details</u></b></label></div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total SHG</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tot_shg" id="tot_men" value="<?= $borrower_selected ? $borrower_selected->tot_shg : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Members</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tot_memb" id="tot_wom" value="<?= $borrower_selected ? $borrower_selected->tot_memb : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-md-12"><label><b><u>Gender</u></b></label></div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Men</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tot_men" id="tot_men" value="<?= $borrower_selected ? $borrower_selected->tot_male : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Women</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tot_wom" id="tot_wom" value="<?= $borrower_selected ? $borrower_selected->tot_female : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12"><label><b><u>Caste</u></b></label></div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">SC</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_sc" id="tot_sc" value="<?= $borrower_selected ? $borrower_selected->tot_sc : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">ST</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_st" id="tot_st" value="<?= $borrower_selected ? $borrower_selected->tot_st : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">OBC</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_obc" id="tot_obc" value="<?= $borrower_selected ? $borrower_selected->tot_obc : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gen</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_gen" id="tot_gen" value="<?= $borrower_selected ? $borrower_selected->tot_gen : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Oth.</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_oth" id="tot_oth" value="<?= $borrower_selected ? $borrower_selected->tot_other : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="total" id="total" value="<?= $borrower_selected ? $borrower_selected->tot_count : '0'; ?>" disabled="disabled">
                                  <input type="hidden" name="tot_count" id="tot_count" value="<?= $borrower_selected ? $borrower_selected->tot_count : '0'; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12"><label><b><u>Borrower Classification</u></b></label></div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Big</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_big" id="tot_big" value="<?= $borrower_selected ? $borrower_selected->tot_big : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Marginal</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_marginal" id="tot_marginal" value="<?= $borrower_selected ? $borrower_selected->tot_marginal : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Small</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_small" id="tot_small" value="<?= $borrower_selected ? $borrower_selected->tot_small : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Landless</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_landless" id="tot_landless" value="<?= $borrower_selected ? $borrower_selected->tot_landless : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12"><label><b><u>Income Group</u></b></label></div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">LIG</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_lig" id="tot_lig" value="<?= $borrower_selected ? $borrower_selected->tot_lig : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">MIG</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_mig" id="tot_mig" value="<?= $borrower_selected ? $borrower_selected->tot_mig : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">HIG</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_hig" id="tot_hig" value="<?= $borrower_selected ? $borrower_selected->tot_hig : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                    <input type="hidden" name="id" value="<?= $selected ? $selected->id : '0'; ?>">
                    <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" id="submit" class="btn btn-info" value="Save" <?= $disable_button ?>/>
                        </div>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
        <?= form_close(); ?>
<script>
    var count = 20;
    var x = $('#table tbody > tr').length;
   $('#dynamic_add').click(function(){
        if(x < count){
            x++;
            $('#table').append('<tr id="row_' + x + '">'
                                + '<td><div class="form-group"><input type="text" class="form-control required" name="shg_name[]" id="shg_name_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="number[]" id="number_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="address[]" id="address_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><select class="form-control" id="block_id_'+ x +'" name="block_id[]" required ><option value="">Select</option>'
                                      +'<?php if($block_list){
                                                foreach($block_list as $block){
                                                echo '<option value="'.$block->block_code.'">'.$block->block_name.'</option>';
                                                                }
                                                        } ?>'
                                      +'</select></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="rete_of_interest[]" id="rate_of_interest_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="date" class="form-control required" name="sanction_date[]" id="sanction_date_'+ x +'" value="<?= date('Y-m-d') ?>" /></div></td>'
                                      +'<td><div class="form-group"><input type="date" class="form-control required" name="due_date[]" id="due_date_'+ x +'" value="<?= date('Y-m-d') ?>" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="project_cost[]" id="project_cost_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="sanction_amount[]" id="sanction_amount_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="own_contribution[]" id="own_contribution_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="disbursed_amount[]" id="disbursed_amount_'+ x +'" /></div></td>'
                                      +'<td><div class="form-group"><input type="date" class="form-control required" name="agriment_date[]" id="agriment_date_'+ x +'" value="<?= date('Y-m-d') ?>" /></div></td>'
                                      +'<td><div class="form-group"><input type="text" class="form-control required" name="ag_bound[]" id="ag_bound_'+ x +'" /></div></td>'
                                      +'<td><button type="button" id="remove_'+ x +'" class="btn btn-danger" onclick="_delete('+ x +')"><i class="fa fa-remove"></i></button></td>'
                                      +'</tr>');
        }
    });
    function _delete(id){
        var r = confirm("Do you want to delete this?");
        if (r == true) {
        $('#row_' + id).remove();
        x--;
        } else {
            return false;
        }
    }
    $('#tot_sc').change(function(){
        count_total($(this).val());
    });
    $('#tot_st').change(function(){
        count_total($(this).val());
    });
    $('#tot_obc').change(function(){
        count_total($(this).val());
    });
    $('#tot_gen').change(function(){
        count_total($(this).val());
    });
    $('#tot_oth').change(function(){
        count_total($(this).val());
    });
    function count_total(value){
        var total = $('#total').val();
        if(total == ''){
          total = 0;
        }
        var count = parseInt($('#tot_sc').val())+parseInt($('#tot_st').val())+parseInt($('#tot_obc').val())+parseInt($('#tot_gen').val())+parseInt($('#tot_oth').val());
        $('#total').val(count);
        $('#tot_count').val(count);
    }
</script>