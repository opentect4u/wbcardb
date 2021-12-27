<?php
$selected = json_decode($selected);
$readonly = $selected ? 'readonly' : '';
$id = $selected ? $selected->id : '0';
if ($id > 0) {
    $disable_button = $selected->fwd_data == 'Y' ? 'disabled' : '';
} else {
    $disable_button = '';
}
?>
<style type="text/css">
    .table, .table_thead, .table_body{
        border: 1px solid #c8c8c8;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Friday Return <small>Entry</small></h4> <hr>
                <?= form_open('friday_return/save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" id="date" value="<?= $selected ? $selected->week_dt : date('Y-m-d') ?>" required="" <?= $readonly ?>/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Week No</label>
                                    <div class="col-sm-8">
                                    <input type="number" class="form-control" name="week_no" id="week_no" value="<?= $selected ? $selected->week_no : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">RD</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="rd" id="rd" value="<?= $selected ? $selected->rd : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Fixed</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="fd" id="fd" value="<?= $selected ? $selected->fd : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Term</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="td" id="td" value="<?= $selected ? $selected->td : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Flexi/Savings</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="flexi_sb" id="flexi_sb" value="<?= $selected ? $selected->flexi_sb : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">MIS</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="mis" id="mis" value="<?= $selected ? $selected->mis : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Other Deposit</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="other_dep" id="other_dep" value="<?= $selected ? $selected->other_dep : '0' ?>" oninput="validate(this)"  required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IBSD</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="ibsd" id="ibsd" value="<?= $selected ? $selected->ibsd : '0' ?>" oninput="validate(this)"  required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Total Deposit Mobilised</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="total_dep_mob" id="total_dep_mob" value="<?= $selected ? $selected->total_dep_mob : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Cash in Hand & Bank</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="cash_in_hand" id="cash_in_hand" value="<?= $selected ? $selected->cash_in_hand : '0' ?>" oninput="validate(this)"  required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Other Banks</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="other_bank" id="other_bank" value="<?= $selected ? $selected->other_bank : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Loan from IBSD</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="ibsd_loan" id="ibsd_loan" value="<?= $selected ? $selected->ibsd_loan : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Loan Against Deposit</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="dep_loan" id="dep_loan" value="<?= $selected ? $selected->dep_loan : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Remitted to WBSCARDB</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="wbcardb_remit_slr" id="wbcardb_remit_slr" value="<?= $selected ? $selected->wbcardb_remit_slr : '0' ?>" oninput="validate(this)" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Others</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="wbcardb_remit_slr_excess" id="wbcardb_remit_slr_excess" value="<?= $selected ? $selected->wbcardb_remit_slr_excess : '0' ?>" oninput="validate(this)"required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Total Deployment of Fund</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="total_fund_deploy" id="total_fund_deploy" value="<?= $selected ? $selected->total_fund_deploy : '0' ?>"oninput="validate(this)"  required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $selected ? $selected->id : 0; ?>">
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                        <div class="col-md-12 pt-5">
                            <div class="form-group row bttn-align">
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-info" <?= $disable_button; ?>>Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <script>
        // $('#rd').change(function () {
        //     $('#rd').val(parseInt($('#rd' + id).val()));
        //     count_total($(this).val());
        // });
        $('#fd').change(function () {
            count_total($(this).val());
        });
        $('#flexi_sb').change(function () {
            count_total($(this).val());
        });
        $('#mis').change(function () {
            count_total($(this).val());
        });
        $('#other_dep').change(function () {
            count_total($(this).val());
            // check_total_member();
        });
        $('#ibsd').change(function () {
            count_total($(this).val());
            // check_total_member();
        });
        function count_total(value) {
            var total = $('#total_dep_mob').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#rd').val()) + parseInt($('#fd').val()) + parseInt($('#flexi_sb').val()) + parseInt($('#mis').val()) + parseInt($('#other_dep').val()) + parseInt($('#ibsd').val());

            $('#total_dep_mob').val(count);

        }
    </script>



    <script>
        $('#cash_in_hand').change(function () {
            count_total1($(this).val());
        });
        $('#other_bank').change(function () {
            count_total1($(this).val());
        });
        $('#ibsd_loan').change(function () {
            count_total1($(this).val());
        });
        $('#dep_loan').change(function () {
            count_total1($(this).val());
        });
        $('#wbcardb_remit_slr').change(function () {
            count_total1($(this).val());
            // check_total_member();
        });
        $('#wbcardb_remit_slr_excess').change(function () {
            count_total1($(this).val());
            // check_total_member();
        });
        function count_total1(value) {
            var total = $('#total_fund_deploy').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#cash_in_hand').val()) + parseInt($('#other_bank').val()) + parseInt($('#ibsd_loan').val()) + parseInt($('#dep_loan').val()) + parseInt($('#wbcardb_remit_slr').val()) + parseInt($('#wbcardb_remit_slr_excess').val());

            $('#total_fund_deploy').val(count).change();

        }
        $('#total_fund_deploy').on('change', function () {
            if (parseInt($(this).val()) > parseInt($('#total_dep_mob').val())) {
                alert('Total Deployment of Fund is exosted Total Deposit Mobilised');
                $('#submit').attr('disabled', 'disabled');
            } else {
                $('#submit').removeAttr('disabled');
            }
        });
    </script>
<!-- <script>
$(document).ready(function(){
$("#rd").change(function(){
    alert('hi');
    // $('#rd').val(parseInt($('#rd').val()));
	})
});
</script> -->

<script>

$(document).ready(function(){

	var i = 2;

	$('#rd').change(function(){

        // $('#rd').val(parseFloat($('#rd').val())).toFixed(2));
		
        $('#rd').val(parseFloat($('#rd').val()).toFixed(2));
	})

    $('#fd').change(function(){

// $('#rd').val(parseFloat($('#rd').val())).toFixed(2));

$('#fd').val(parseFloat($('#fd').val()).toFixed(2));
})


$('#flexi_sb').change(function(){

// $('#rd').val(parseFloat($('#rd').val())).toFixed(2));

$('#flexi_sb').val(parseFloat($('#flexi_sb').val()).toFixed(2));
})

$('#mis').change(function(){

// $('#rd').val(parseFloat($('#rd').val())).toFixed(2));

$('#mis').val(parseFloat($('#mis').val()).toFixed(2));
})

$('#other_dep').change(function(){

// $('#rd').val(parseFloat($('#rd').val())).toFixed(2));

$('#other_dep').val(parseFloat($('#other_dep').val()).toFixed(2));
})

$('#ibsd').change(function(){

// $('#rd').val(parseFloat($('#rd').val())).toFixed(2));

$('#ibsd').val(parseFloat($('#ibsd').val()).toFixed(2));
})

$('#total_dep_mob').change(function(){
    $('#ibsd').val(parseFloat($('#ibsd').val()).toFixed(2));

})
$('#cash_in_hand').change(function(){
    $('#cash_in_hand').val(parseFloat($('#cash_in_hand').val()).toFixed(2));

})

$('#other_bank').change(function(){

    $('#other_bank').val(parseFloat($('#other_bank').val()).toFixed(2));
})

$('#ibsd_loan').change(function(){
    $('#ibsd_loan').val(parseFloat($('#ibsd_loan').val()).toFixed(2));

})
$('#dep_loan').change(function(){
    $('#dep_loan').val(parseFloat($('#dep_loan').val()).toFixed(2));

})

$('#wbcardb_remit_slr').change(function(){
    $('#wbcardb_remit_slr').val(parseFloat($('#wbcardb_remit_slr').val()).toFixed(2));

})

$('#wbcardb_remit_slr_excess').change(function(){
    $('#wbcardb_remit_slr_excess').val(parseFloat($('#wbcardb_remit_slr_excess').val()).toFixed(2));

})

});

</script> 

<script>
$(document).ready(function(){
$("#date").change(function(){
    //alert('hi');

	var memo_date= $('#date').val();
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
	(month<10 ? '0' : '') + month + '-' +
	(day<10 ? '0' : '') + day;
    // alert("Memo Date is Greater Than Current Date");
// console.log(trans_dt,output);
// alert(new Date(output));
// alert(new Date(memo_date));
		if(new Date(output) <new Date(memo_date))
		{
		alert(" Date is Greater Than Current Date");
        $('#date').val(output);
		//$('#submit').attr('type', 'buttom');
		return false;
		}else{
		//$('#submit').attr('type', 'submit');
        return true;
		}
	})
});
</script>

<script>

var validate = function(e) {
    //alert("hi");
    var t = e.value;
    e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
}
</script>