<div class="main-panel">
  <div >
    <div class="col-12 grid-margin" style="padding:0px;">
                <div class="card">
                  <div class="card-body">
                    <h4>Sale Details</h4>
                    <br><br>
                    <form class="form-sample" method="POST" id="purchase_form" action="<?php echo site_url('Sales/addsales'); ?>">
                      <div class="row">
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer's Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="cust_name" id="cust_name" required="">
                                
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input class="form-control" class="form-control" type="date" name="trans_dt" id="trans_dt" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                          </div>
                        </div>
                      
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Doctor</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="doctor" id="doctor" required="">
                            </div>
                          </div>        
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Bill Mode</label>
                              <div class="col-sm-9">
                                <select class="form-control"  id="in_out_type" name="in_out_type" required>
                                  <option value="">Select Bill Mode</option>
                                  <option value="O">Out</option>
                                  <option value="I">In</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Bill Type</label>
                              <div class="col-sm-9">
                                <select class="form-control"  id="bill_type" name="bill_type" required>
                                  <option value="">Select Bill Type</option>
                                  <option value="C">Cash</option>
                                  <option value="B">Credit</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Address</label>
                              <div class="col-sm-9">
                              <textarea style="" name="cust_add" rows="3" class="form-control" required=""></textarea>
                              </div>
                            </div>
                          </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No.</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control" name="ph_no" id="ph_no" required="">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="table table-responsive my_div">
        <table class="table-bordered" width="400" id= "prodTable">                
          <thead>
            <tr>
                <th style="font-weight:bold">Product</th>
                <th style="font-weight:bold">Batch</th>
                <th style="font-weight:bold">Unit</th>
                <th style="font-weight:bold">Exp Date</th>
                <th style="font-weight:bold">MRP</th>
                <th style="font-weight:bold">Dis Rt</th>
                <th style="font-weight:bold">Discount Amt</th>
                <th style="font-weight:bold">Qty</th>
                <th style="font-weight:bold">Stock</th>
                <th style="font-weight:bold">Net Price</th>
                <th>
<button class="btn btn-info d-none d-md-block" type="button" id="addrow" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom">
                                    <i class="mdi mdi-comment-plus-outline menu-icon"></i>
                                  </button>

                </th>
              </tr>
            </thead>

            <tbody id="intro">
              <tr>
               <td>
                    <select class="livesearch" style="width:200px" name="Prod_ID[]" id="product"> 
                      <option value="0">Select Product</option>
                            <?php foreach ($product as $row):?>
                            <option value="<?php echo $row->ID?>"><?php echo $row->Name?></option>
                            
                            <?php
                      endforeach;
                      ?>
                    </select>
                   
                </td> 

                  <td>
                      <select class="form-control Batch" style="width:130px" name="Batch[]" id="Batch">
                      <Option value="">Select Batch:</label>
                      </select>
                  </td> 

                <td><input type="text" class="form-control Unit" style="width:50px"  name="Unit[]" readonly/></td>          
                <td><input type="text" class="form-control Expiry" style="width:110px"  name="Expiry[]" id="Expiry" readonly/></td>
                <td><input type="text" class="form-control Max_Ret_Price"  style="width:100px" name="Max_Ret_Price[]" readonly/></td>
                <td><input type="text" class="form-control Dis_Rate" style="width:50px" name="Dis_Rate[]" id="Dis_Rate"/></td>
                <td><input type="text" class="form-control"  style="width:100px" name="Dis_Amount[]" id="Dis_Amount" readonly/></td>
                <td><input type="text" class="form-control qty" style="width:50px"  name="qty[]" id="qty" required/></td>
                <td><input type="text" class="form-control stock" style="width:50px" name="stock[]" id="stock" readonly/></td>
                <td><input type="text" class="form-control Net_Price" style="width:100px" id="Net_Price" name="Net_Price[]" /></td>
              <td></td>
              </tr>
            </tbody>
     </table>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                          
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">TOTAL QTY:</label>
                            <div class="col-sm-9">
                              <input type="text" id="totqty" name="totqty" class="form-control" style="text-align:right;" readonly="">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">TOTAL AMT:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="totamt" name="totamt" style="text-align:right;" readonly="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group d-flex">
                        <input type="submit" class="btn btn-info d-none d-md-block" id="save" click="return confirm('Are you sure you want to Save this item?');">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
<!---------------------------------------------------------------------------------------------->
        <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="http://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<!-- plugins:js -->
  <script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url("/assets/vendors/chart.js/Chart.min.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/progressbar.js/progressbar.min.js");?>"></script>

  <script src="<?php echo base_url("/assets/vendors/datatables.net/jquery.dataTables.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url("/assets/js/off-canvas.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/template.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/todolist.js"); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url("/assets/js/dashboard.js"); ?>"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
  
  <!-- End custom js for this page-->

  <script src="<?php echo base_url("/assets/vendors/typeahead.js/typeahead.bundle.min.js"); ?>"></script>
  
  <script src="<?php echo base_url("/assets/js/data-table.js"); ?>"></script>

<script>
    
    $(document).ready(function() {

      $('.msg').hide();

        <?php 
              if($this->session->flashdata('msg'))
        { ?>

      $('.msg').html('<?php echo $this->session->flashdata('msg'); ?>').show();

      <?php } ?>  
    });
    
</script>

  <script>
  $(document).ready(function(){
    $('#pname').hide();
    $('#prps').hide();
    var total = 0;
    
    $("#addrow").click(function(){
      $("#intro").append('<tr><td><select class="form-control livesearch"  name="Prod_ID[]" id="product"><option value="0">Select Product</option><?php foreach ($product as $row):?><option value="<?php echo  $row->ID?>"><?php echo $row->Name?></option><?php endforeach;?> </select></td><td><select class="form-control Batch" style="width:130px" name="Batch[]" id="Batch"></select></td><td><input type="text" class="form-control" style="width:50px" class="form-control Unit" name="Unit[]" readonly></td><td> <input type="text" class="form-control Expiry" style="width:110px" name="Expiry[]" id="Expiry"  readonly /></td><td> <input type="text"  class="form-control Max_Ret_Price" style="width:100px" name="Max_Ret_Price[]" readonly/></td><td><input type="text" class="form-control Dis_Rate" style="width:50px" name="Dis_Rate[] id="Dis_Rate" /></td><td><input type="text" style="width:100px" class="form-control Dis_Rate" name="Dis_Amount[]" id="Dis_Amount" readonly/></td><td><input type="text" class= "form-control qty" style="width:50px" name="qty[]" id= "qty" required/></td><td><input type="text" class= "form-control stock" style="width:50px" name="stock[]" id= "stock" readonly /></td><td><input type="text" class= "form-control Net_Price" id="Net_Price" style="width:100px" name="Net_Price[]" /></td><td><button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="mdi mdi-minus-circle"></i></button></td></tr>');
    
      $('.livesearch').select2();
      $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
     
    });
   
    $(document).ready( function () {
    $('#Sales_Items').DataTable();
} );

    $("#intro").on('click','#removeRow',function(){
        $(this).parent().parent().remove();
        $('#totamt').change();
        $('.preferSelect').find('option[value ="' + this.value + '"]').attr("disabled", false);
        var sum    = 0;
          var sumqty = 0;
          var sums   = 0;
           $("input[class *= 'Net_Price']").each(function(){
           sum += parseFloat($(this).val());
                      
            // console.log('helo');
            });

            $("#totamt").val("0");
            $("#totamt").val(sum);

            $("input[class *= 'qty']").each(function(){
              sumqty += +parseFloat($(this).val()); 
            
            });
             
            $("#totqty").val("0");
            $("#totqty").val(sumqty);
    });
    //$('.livesearch').select2();
    
    $("#total").on('mouseover mouseenter mouseleave mouseup mousedown', function(){
        return false;
      });
    $("#total").val("");
    $('.preferSelect').change();
    $('#intro').trigger('change');
    $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
  });

 

  $('#intro').trigger('change');

  
  $('#intro').on("change", ".preferSelect", function() {
    
    $('.preferSelect').each(function(){
        $('.preferSelect').find('option[value ="' + this.value + '"]').attr("disabled", true);
    
      });
  });
</script>
<script>

  $(document).ready(function(){

      $('.table tbody').on('change', '.livesearch', function(){

        let row = $(this).closest('tr');
        var product = row.find('.livesearch').val();
       
        $.get('<?php echo site_url("Sales/js_get_batch_asPer_productSelection");?>',{ productId:product })
        .done(function(data)
        {

          //console.log(data);
          var batchData = JSON.parse(data) ;
          let string1 = '<select style="width:150px " class= "form-control Batch" name= "Batch[]" id= "Batch">';
          string1 += '<option value= "">Select Batch</option>';
          $.each(batchData, function(index, value){

                string1 += '<option value= "'+value.Batch+'">'+value.Batch+'</option>';

            }
            
          )

          string1 += '</select>';
         
          row.find('td:eq(1)').html(string1);
           



        })

      })


                /// For catching selected batch // getting date as per batch selection
  })

    //  row.find('td:eq(1) select').on("change", function(){
            $( document ).ajaxComplete(function() {

                $('.Batch').on("change", function(){

               let row = $(this).closest('tr');

              var BatchVal = $(this).val();
              var ProdId   = row.find('.livesearch').val();

              $.get('<?php echo site_url("Sales/js_get_expiryasbatchSelection");?>',{ Prod:ProdId,Batch: BatchVal })
              .done(function(data)
              {

                  console.log(data);
                  var batchData = JSON.parse(data) ;
                  $.each(batchData, function(index, value){

                    if(value.Expiry_dt == null){

                     var expDtVal = "undefined-";
                    }else{

                    // var expDt       = value.Expiry_dt.split('-');
                     // var exp2_val    = expDt[2]+'-';
                     // var expDtVal    = expDt[1]+'-'+expDt[0];

                      var expDtVal       = value.Expiry_dt;
                    }
                   
                    var unitVal     = value.Units; 
                    var mrpVal      = (value.Max_Ret_Price/unitVal).toFixed('2'); 
                    var gstrt       = 0;
                    var base_price  = 0;
                    var Dis_Rate    = 0;
                    var Dis_Amount  = 0;
                    var qty         = value.Qty;
                    var cgst        = (gstrt/2);
                   
                    //var expDtVal = expDt[2]+'-'+expDt[1];
                    
                    if ( expDtVal=='undefined-' ){
                      row.find('td:eq(3)  input').val('Not Found');
                      
                    }
                    else
                      {
                    row.find('td:eq(3)  input').val(expDtVal);
                      }
                    // showing units --
              
                    //row.find(".Unit").val(unitVal);
                    row.find('td:eq(2)  input').val(unitVal);

                    // For showing mrp --
                    row.find('td:eq(4)  input').val(mrpVal);

                    /// for base discount
                    row.find('td:eq(5)  input').val(Dis_Rate);
                    row.find('td:eq(6)  input').val(Dis_Amount);
                    //For display stock
                   row.find('td:eq(8)  input').val(qty);
                    
                  })

              })
              

            })

              })

</script>

<script> 
        $(document).ready(function() { 
         
         
          
          $('.table tbody').on('change', '.Dis_Rate', function(){
            var total_qty=   0;
            var tot_dis_amt= 0.00;
             var total_net=   0;
             var qty      =   0;
            //  console.log('ddd');
             let row         = $(this).closest('tr');
             var mrpVal_1    = row.find('td:eq(4)  input').val();
                 qty         = row.find('td:eq(7) .qty').val();
             var Dis_Rate    = row.find('td:eq(5) .Dis_Rate').val();
             var tot_dis_amt = 0;
             var mrpVal_1    = row.find('td:eq(4)  input').val();
             var tot_dis_amt = parseFloat(mrpVal_1 *Dis_Rate/100 *qty).toFixed('2');

            row.find('td:eq(6)  input').val(tot_dis_amt);
                   
            var netPrice  = parseFloat(mrpVal_1).toFixed('2');
            netPrice      = parseFloat(netPrice *qty- tot_dis_amt).toFixed(2);
            
            row.find('td:eq(9)  input').val(netPrice);

            $('.Net_Price').each(function(){
                total_net += parseFloat(this.value);
            });
           // total_net += parseFloat(netPrice); 
            total_qty += parseFloat(0+qty); 

            document.getElementById('totamt').value=total_net.toFixed(2) ; 
            document.getElementById('totqty').value=total_qty ; 
           
            })

        }); 
    </script> 

    <script> 
        $(document).ready(function() { 

          var total_net   = 0;
          var total_qty   = 0;
          var Dis_Rate    = 0;
          var tot_dis_amt = 0.00;
          var Dis_Amount  = 0;

          $('.table tbody').on('keyup', '.qty', function(){
          
            let row          = $(this).closest('tr');
            var qty          = row.find('td:eq(7) .qty').val();
            var Dis_Rate     = row.find('td:eq(5) .Dis_Rate').val();
            var total_sum    = 0;
            var tot_dis_amt  = 0.00;
            var mrpVal_1     = row.find('td:eq(4)  input').val();
            var tot_dis_amt  = parseFloat(mrpVal_1 * Dis_Rate/100 * qty);
            var Dis_Amount   = row.find('td:eq(6)  input').val(tot_dis_amt);
            var netPrice     = parseFloat(mrpVal_1).toFixed('2');
            var stock        = row.find('td:eq(8) .stock').val();

            //Commented till 31.03.2020 
              if (parseFloat(qty)>parseFloat(stock)  ){
                var zero_qty          = null;
               
                row.find('td:eq(7)  input').val(zero_qty);
                 row.find('td:eq(9)  input').val(0);
                document.getElementById("save").disabled = true;
                alert('Sale Quantity Should Not Be Greater Than Stock Quantity!');

              }else{
                 
                document.getElementById("save").disabled = false;
              }
             
           netPrice =parseFloat(netPrice *qty- tot_dis_amt).toFixed('2');
            
            row.find('td:eq(9)  input').val(netPrice);
            
            total_net += parseFloat(netPrice); 
            total_qty += parseFloat(qty); 
            
            document.getElementById('totamt').value=total_net ; 
                      
            })

        }); 
        $('.table tbody').on('change', '.qty', function(){

          var sum    = 0;
          var sumqty = 0;
          var sums   = 0;
           $("input[class *= 'Net_Price']").each(function(){
           sum += parseFloat($(this).val());
                      
            // console.log('helo');
            });

            $("#totamt").val("0");
            $("#totamt").val(sum);

            $("input[class *= 'qty']").each(function(){
              sumqty += +parseFloat($(this).val()); 
            
            });
             
            $("#totqty").val("0");
            $("#totqty").val(sumqty);
                
        })


    </script>

<script type="text/javascript">

  $(document).ready(function() {

    $('#dataTable').DataTable( {
       "order": [[ 0, "desc" ],[ 1, "desc" ]]
    });

    $('#dataTable_length').hide();
    $('#dataTable_info').hide();

//////
    $("#trans_dt").change(function(){

      var trans_dt = $('#trans_dt').val();

      var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();

      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day;

        //console.log(trans_dt,output);

              if(new Date(output) < new Date(trans_dt))
              {
                alert("Sale date cannot be greater than current date");
              
                return false;
                }else{
                  $('#submit').attr('type', 'submit');
                }
        })
    
} );

  function printClaimDtls() {  

  var divToPrint = document.getElementById('divToPrint');
  var WindowObject = window.open('','Print-Window');

        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title>');
        WindowObject.document.writeln('<style type="text/css">@media print { .center { text-align: center;} .underline { text-decoration: underline; } p { display:inline; } .left { margin-left: 315px; text-align="left"; display: inline; } .right { margin-right: 375px; display: inline; } td.left_algn { text-align: left; } td.right_algn { text-align: right; } td.hight { hight: 15px; } table.width { width: 100%; } table.noborder { border: 0px solid black; } th.noborder { border: 0px solid black; } .border { border: 1px solid black; } .bottom { position: absolute; bottom: 5px; width: 100%; } .tValHide { display:none; } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();

        setTimeout(function(){WindowObject.close();},10);
    }

    $('#purchase_form').submit(function(event){

      console.log("fucxk");

           
    var trans_dt = $('#trans_dt').val();
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

                    if(new Date(output) < new Date(trans_dt)){

                      alert("Sale date cannot be greater than current date");
                       event.preventDefault();
                        return false;
                    }
                     else 
                        {
                   
                       return true;
                      }
            });
</script>

<script type="text/javascript">

function confSubmit() {
   alert('Save Successfull');
}

</script>

<script>
  $(document).ready(function() {
    $('.livesearch').select2();
});
</script>

</body>
</html>