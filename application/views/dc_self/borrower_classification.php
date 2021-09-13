<?php $selected = json_decode($selected);
// echo '<pre>'; var_dump($selected);exit;
$display = sizeof($selected) > 0 ? '' : 'display:none'; ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><span class="confirm-div" style="float:right; color:green;"></span></h4>
                <?= form_open('dc/borrower_classification_save'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-header">
                    <h4>SHG Borrower's Classification</h4>               
                    </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Memo Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="memo_no" id="memo_no" value="<?= sizeof($selected) > 0 ? $selected[0]->memo_no : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="memo_date_display" style="<?= $display; ?>">
                              <label>Memo Date:  </label><span id="memo_date"> <?= sizeof($selected) > 0 ? $selected[0]->memo_date : ''; ?></span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pronote Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="pronote_no" id="pronote_no" value="<?= sizeof($selected) > 0 ? $selected[0]->pronote_no : ''; ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="pronote_date_display" style="<?= $display; ?>">
                                    <label>Pronote Date:  </label><span id="pronote_date"> <?= sizeof($selected) > 0 ? $selected[0]->pronote_date : ''; ?></span>
                            </div>
                        </div>
                        <div id="display" id="purpose_display" style="<?= $display; ?>">
                          <div class="row">
                              <div class="col-md-4">
                                <label>Purpose :</label><span id="purpose"><?= sizeof($selected) > 0 ? $selected[0]->purpose : ''; ?></span>
                              </div>
                              <div class="col-md-4">
                                <label>Total SHG :</label><span id="total_shg"><?= sizeof($selected) > 0 ? $selected[0]->total_shg : ''; ?></span>
                                <input type="hidden" name="tot_shg" id="tot_shg" value="<?= sizeof($selected) > 0 ? $selected[0]->total_shg : ''; ?>">
                                <input type="hidden" name="ardb_id" id="ardb_id" value="<?= $ardb_id; ?>">
                              </div>
                              <div class="col-md-4">
                                <label>Total Member :</label><span id="total_mem"><?= sizeof($selected) > 0 ? $selected[0]->tot_memb : ''; ?></span>
                                <input type="hidden" name="tot_mem" id="tot_mem" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_memb : ''; ?>">
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12"><label><b><u>Gender</u></b></label></div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Men</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tot_men" id="tot_men" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_male : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Women</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tot_wom" id="tot_wom" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_female : ''; ?>" required="">
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
                                  <input type="text" class="form-control" name="tot_sc" id="tot_sc" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_sc : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">ST</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_st" id="tot_st" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_st : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">OBC</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_obc" id="tot_obc" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_obc : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gen</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_gen" id="tot_gen" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_gen : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Oth.</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tot_oth" id="tot_oth" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_other : '0'; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Total</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="total" id="total" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_count : '0'; ?>" disabled="disabled">
                                  <input type="hidden" name="tot_count" id="tot_count" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_count : '0'; ?>">
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
                                  <input type="text" class="form-control" name="tot_big" id="tot_big" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_big : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Marginal</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_marginal" id="tot_marginal" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_marginal : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Small</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_small" id="tot_small" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_small : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Landless</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_landless" id="tot_landless" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_landless : ''; ?>" required="">
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
                                  <input type="text" class="form-control" name="tot_lig" id="tot_lig" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_lig : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">MIG</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_mig" id="tot_mig" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_mig : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">HIG</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="tot_hig" id="tot_hig" value="<?= sizeof($selected) > 0 ? $selected[0]->tot_hig : ''; ?>" required="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="id" value="<?= sizeof($selected) > 0 ? $selected[0]->id : '0'; ?>">
                          <div class="row">
                              <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" id="submit" class="btn btn-info" value="Save" />
                        </div>
                    </div>
                </div>
                          </div>
                        </div>
                    </div>
                </div>
                   <?= form_close(); ?> 
                </div>
            </div>
        </div>
        
<script>
  $('#pronote_no').change(function(){  
          $.ajax({
            type:"POST",
            url : "<?= site_url(); ?>/dc/get_dc_details",
            data : {memo_no: $('#memo_no').val().replace(/[_\W]+/g, ""), pronote_no:$(this).val().replace(/[_\W]+/g, "")},
            dataType:'json',
            success : function(data) {
                                        // console.log(data);
              if(data.length > 0){
                $('#memo_date_display').show();
                $('#memo_date').text(data[0].memo_date);
                $('#pronote_date_display').show();
                $('#pronote_date').text(data[0].pronote_date);
                $('#purpose_display').show();
                $('#purpose').text(data[0].purpose_name);
                $('#total_shg').text(data[0].tot_shg);
                $('#tot_shg').val(data[0].tot_shg);
                $('#total_mem').text(data[0].tot_mem);
                $('#tot_mem').val(data[0].tot_mem);
                $('#display').show();
              }else{
                alert('Sorry, No Data Found');
                $('#memo_date_display').hide();
                $('#pronote_date_display').hide();
                $('#purpose_display').hide();
                $('#display').hide();
              }
            },
            error: function() {
                alert('Error occured');
            }
          });
        });
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