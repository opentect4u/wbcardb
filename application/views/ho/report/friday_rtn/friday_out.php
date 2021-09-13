<div class="main-panel">

  <style>
table {
    border-collapse: collapse;
}

table,th {
    border: 1px solid #dddddd;

  /*  padding: 3px;*/

     padding: 3px 3px 3px 3px;

    font-size: 12px;
    }
table,td {
    border: 1px solid #dddddd;

    padding: 4px 3px 4px 3px;

    font-size: 13px;
    }


th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 10px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">


                  <div id="divToPrint" style="overflow-x:auto;">

                    <div class="com-md-12" style="text-align:center;">
                        <h4> THE West Bengal State Cooperative Agriculture & Rural Development Bank Ltd.</h4>                        
                          CONSOLIDATED FRIDAY RETURN BETWEEN <?php echo date('d/m/y',strtotime($_POST['from_dt']));?>  to  <?php echo date('d/m/y',strtotime($_POST['to_dt']));?>
                    </div> 
                    <div class="com-md-1">Rs. In Lakh</div>

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th></th>
                               <th></th>
                              <th colspan="7">Deposit   Mobilised</th>
                              <th colspan="7">Deployment  of  Fund</th>
                              <th colspan="3">Remittable Against</th>
                              <th rowspan="2">Total / Shortfall</th>
                            
                            </tr>
                            <tr>
                              <th>Sl No.</th>
                              <th>Name of ARDB.</th>
                              <th>Date</th>
                              <th>RD</th>
                              <th>FD</th>
                              <th>Flexi</th>
                              <th>MIS</th>
                              <th>Other<br>Deposit</th>
                              <th><?php echo $yearEnd = date('Y-m-d', strtotime('12/31')); if($_POST['to_dt'] <= $yearEnd ){
                                    $year=date('Y', strtotime($_POST['to_dt']));
                              }else{ $year=date('Y', strtotime($_POST['to_dt']))-1; }?>IBSD(after 31.03.<?=$year?>)</th>
                              <th>Total<br> Deposit<br>Mobilized</th>
                              <th>Cash <br>In <br>Hand</th>
                              <th>Other <br>Bank</th>
                              <th>IBSD <r>Loan</th>
                              <th>Deposit <br>Loan</th>
                              <th>Remmit<br>WBSCARDB</th>
                              <th>Remmit <br>WBSCARDB <br>Excess</th>
                              <th>Total <r>Deploy <br>Fund</th>
                              <th>Required SLR <br>(1/3rd of <br>Total Deposit)</th>
                              <th>IBSD as on 31.03.<?=$year?>(100%)</th>
                              <th>Total</th>
                             
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($reports){ 

                                    $i                          = 1;
                                    $rd                         = 0;
                                    $fd                         = 0;
                                    $flexi_sb                   = 0;
                                    $mis                        = 0;
                                    $other_dep                  = 0;
                                    $ibsd                       = 0;
                                    $total_dep_mob              = 0;
                                    $cash_in_hand               = 0;
                                    $other_bank                 = 0;
                                    $ibsd_loan                  = 0;
                                    $dep_loan                   = 0;
                                    $wbcardb_remit_slr          = 0;
                                    $wbcardb_remit_slr_excess   = 0;
                                    $total_fund_deploy          = 0;
                                    $required_slr               = 0;
                                    $ibsdas                     = 0;
                                    $total                      = 0;
                                    $totalshortfall             = 0;

                                    foreach($reports as $dtls){

                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo get_ardb_name($dtls->ardb_id);?></td>

                                    <td><?php echo date('d/m/Y',strtotime($dtls->week_dt));?></td>

                                    <td><?php echo round(($dtls->rd)/100000,2);

                                          $rd += round(($dtls->rd)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->fd)/100000,2);

                                          $fd += round(($dtls->fd)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->flexi_sb)/100000,2);

                                          $flexi_sb += round(($dtls->flexi_sb)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->mis)/100000,2);

                                          $mis += round(($dtls->mis)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->other_dep)/100000,2);

                                         $other_dep += round(($dtls->other_dep)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->ibsd)/100000,2);

                                    $ibsd += round(($dtls->ibsd)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->total_dep_mob)/100000,2);

                                       $total_dep_mob += round(($dtls->total_dep_mob)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->cash_in_hand)/100000,2);

                                      $cash_in_hand += round(($dtls->cash_in_hand)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->other_bank)/100000,2);

                                       $other_bank += round(($dtls->other_bank)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->ibsd_loan)/100000,2);

                                       $ibsd_loan += round(($dtls->ibsd_loan)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->dep_loan)/100000,2);

                                       $dep_loan += round(($dtls->dep_loan)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->wbcardb_remit_slr)/100000,2);

                                    $wbcardb_remit_slr += round(($dtls->wbcardb_remit_slr)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->wbcardb_remit_slr_excess)/100000,2);

                                    $wbcardb_remit_slr_excess += round(($dtls->wbcardb_remit_slr_excess)/100000,2);
                                    ?></td>
                                    <td><?php echo round(($dtls->total_fund_deploy)/100000,2);

                                    $total_fund_deploy += round(($dtls->total_fund_deploy)/100000,2);

                                    ?></td>
                                    <td><?php echo round((($dtls->total_dep_mob-$dtls->ibsd)*1/3)/100000,2);

                                    $required_slr += round((($dtls->total_dep_mob-$dtls->ibsd)*1/3)/100000,2);

                                    ?></td>
                                    <td><?php echo round(($dtls->ibsd)/100000,2);  

                                    $ibsdas  += round(($dtls->ibsd)/100000,2); 

                                    ?></td>
                                    <td><?php echo round(((($dtls->total_dep_mob-$dtls->ibsd)*1/3)+$dtls->ibsd)/100000,2);

                                      $total  += round(((($dtls->total_dep_mob-$dtls->ibsd)*1/3)+$dtls->ibsd)/100000,2);

                                    ?></td>
                                    <td><?php echo round((((($dtls->total_dep_mob-$dtls->ibsd)*1/3)+$dtls->ibsd)-$dtls->wbcardb_remit_slr)/100000,2);

                                   $totalshortfall  += round((((($dtls->total_dep_mob-$dtls->ibsd)*1/3)+$dtls->ibsd)-$dtls->wbcardb_remit_slr)/100000,2);

                                    ?></td>
                                </tr>
                                <?php

                                    }   ?>

                                 <tr>
                                    <td colspan="2">Total</td>
                                    <td></td>
                                    <td><?=$rd?></td>
                                    <td><?=$fd?></td>
                                    <td><?=$flexi_sb?></td>
                                    <td><?=$mis?></td>
                                    <td><?=$other_dep?></td>
                                    <td><?=$ibsd?></td>
                                    <td><?=$total_dep_mob?></td>
                                    <td><?=$cash_in_hand?></td>
                                    <td><?=$other_bank?></td>
                                    <td><?=$ibsd_loan?></td>
                                    <td><?=$dep_loan?></td>
                                    <td><?=$wbcardb_remit_slr?></td>
                                    <td><?=$wbcardb_remit_slr_excess?></td>
                                    <td><?=$total_fund_deploy?></td>
                                    <td><?=$required_slr?></td>
                                    <td><?=$ibsdas?></td>
                                     <td><?=$total?></td>
                                    <td><?=$totalshortfall?></td>

                                 </tr>

                              <?php      }
                                
                                else{

                                    echo "<tr><td colspan='20' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

                </div>   

                <div style="text-align: center;">

                   <br> <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                       <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>
                </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

         <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Friday Return Between <?php echo date("d-m-Y", strtotime($this->input->post('from_dt'))).' To '.date("d-m-Y", strtotime($this->input->post('to_dt')));?>.xls"
                });
            });
        });
    </script>
        <!-- content-wrapper ends -->