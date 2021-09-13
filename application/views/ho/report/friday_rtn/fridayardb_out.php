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

                    <div style="text-align:center;">

                     <h4>THE <?php echo get_ardb_name($_POST['ardb_id']); ?></h4>              
           FRIDAY RETURN BETWEEN <?php echo date('d/m/y',strtotime($_POST['from_dt'])); ?>  To <?php echo date('d/m/y',strtotime($_POST['to_dt'])); ?> (Rs. In Lakh)
                            


                        <!-- <h2>GOODWILL PHARMACY</h2> -->

                        <!-- <h4>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118</h4>

                        <h4>Ph- 0332568-4041/2523-6563</h4> 

                        <h4>GSTIN :19AAATG6028Q1Z5</h4> -->
                    </div>
                    

                    <br>  

                    <table style="width: 100%;"  id="example">

                        <thead>

                            <tr>
                              <th></th>
                              <th></th>
                              <th colspan="7">Deposit   Mobilised</th>
                              <th colspan="7">Deployment  of  Fund </th>
                          
                           </tr>

                            <tr>
                              <th>Sl No.</th>
                              <th>Date</th>
                              <th>RD</th>
                              <th>FD</th>
                              <th>Flexi</th>
                              <th>MIS</th>
                              <th>Other<br>Deposit</th>
                              <th>IBSD</th>
                              <th>Total<br> Deposit<br>Mobilized</th>
                              <th>Cash <br>In <br>Hand</th>
                              <th>Other <br>Bank</th>
                              <th>IBSD <r>Loan</th>
                              <th>Deposit <br>Loan</th>
                              <th>Remmit<br>WBSCARDB</th>
                              <th>Remmit <br>WBSCARDB <br>Excess</th>
                              <th>Total <r>Deploy <br>Fund</th>                            
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($reports){ 

                                    $i = 1;

                                    $tot_rd                       = 0;
                                    $tot_fd                       = 0;
                                    $tot_sb                       = 0;
                                    $tot_mis                      = 0;
                                    $tot_other                    = 0;
                                    $tot_ibsd                     = 0;
                                    $tot_total_dep_mob            = 0;
                                    $tot_cash_in_hand             = 0;
                                    $tot_other_bank               = 0;
                                    $tot_ibsd_loan                = 0;
                                    $tot_dep_loan                 = 0;
                                    $tot_wbcardb_remit_slr        = 0;
                                    $tot_wbcardb_remit_slr_excess = 0;
                                    $tot_total_fund_deploy        = 0;

                                    foreach($reports as $dtls){

                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo date('d/m/Y',strtotime($dtls->week_dt)); ?></td>

                                    <td><?php $rd = round($dtls->rd/100000,2);
                                              echo $rd;
                                              $tot_rd += $rd;
                                        ?>
                                    </td>

                                    <td><?php $fd = round($dtls->fd/100000,2);
                                              echo $fd;
                                              $tot_fd += $fd;
                                        ?>
                                    </td>

                                    <td><?php $sb = round($dtls->flexi_sb/100000,2);
                                              echo $sb;
                                              $tot_sb += $sb;
                                        ?>
                                    </td>

                                    <td><?php $mis = round($dtls->mis/100000,2);
                                              echo $mis;
                                              $tot_mis += $mis;
                                        ?>
                                    </td>

                                    <td><?php $other_dep = round($dtls->other_dep/100000,2);
                                              echo $other_dep;
                                              $tot_other += $other_dep;
                                        ?>
                                    </td>

                                    <td><?php $ibsd = round($dtls->ibsd/100000,2);
                                              echo $ibsd;
                                              $tot_ibsd += $ibsd;
                                        ?>
                                    </td>

                                    <td><?php $total_dep_mob = round($dtls->total_dep_mob/100000,2);
                                              echo $total_dep_mob;
                                              $tot_total_dep_mob += $total_dep_mob;
                                        ?>
                                    </td>

                                    <td><?php $cash_in_hand = round($dtls->cash_in_hand/100000,2);
                                              echo $cash_in_hand;
                                              $tot_cash_in_hand += $cash_in_hand;
                                        ?>
                                    </td>

                                    <td><?php $other_bank = round($dtls->other_bank/100000,2);
                                              echo $other_bank;
                                              $tot_other_bank += $other_bank;
                                        ?>
                                    </td>

                                    <td><?php $ibsd_loan = round($dtls->ibsd_loan/100000,2);
                                              echo $ibsd_loan;
                                              $tot_ibsd_loan += $ibsd_loan;
                                        ?>
                                    </td>

                                    <td><?php $dep_loan = round($dtls->dep_loan/100000,2);
                                              echo $dep_loan;
                                              $tot_dep_loan += $dep_loan;
                                        ?>
                                    </td>

                                    <td><?php $wbcardb_remit_slr = round($dtls->wbcardb_remit_slr/100000,2);
                                              echo $wbcardb_remit_slr;
                                              $tot_wbcardb_remit_slr += $wbcardb_remit_slr;
                                        ?>
                                    </td>

                                    <td><?php $wbcardb_remit_slr_excess = round($dtls->wbcardb_remit_slr_excess/100000,2);
                                              echo $wbcardb_remit_slr_excess;
                                              $tot_wbcardb_remit_slr_excess += $wbcardb_remit_slr_excess;
                                        ?>
                                    </td>

                                    <td><?php $total_fund_deploy = round($dtls->total_fund_deploy/100000,2);
                                              echo $total_fund_deploy;
                                              $tot_total_fund_deploy += $total_fund_deploy;
                                        ?>
                                    </td>
                                  
                                </tr>
                                <?php

                                    } 
                                  ?>

                                  <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td><?=$tot_rd?></td>
                                    <td><?=$tot_fd?></td>
                                    <td><?=$tot_sb?></td>
                                    <td><?=$tot_mis?></td>
                                    <td><?=$tot_other?></td>
                                    <td><?=$tot_ibsd?></td>
                                    <td><?=$tot_total_dep_mob?></td>
                                    <td><?=$tot_cash_in_hand?></td>
                                    <td><?=$tot_other_bank?></td>
                                    <td><?=$tot_ibsd_loan?></td>
                                    <td><?=$tot_dep_loan?></td>
                                    <td><?=$tot_wbcardb_remit_slr?></td>
                                    <td><?=$tot_wbcardb_remit_slr_excess?></td>
                                    <td><?=$tot_total_fund_deploy?></td>
                                    
                                  </tr>

                                 <?php    }
                                
                                else{

                                    echo "<tr><td colspan='16' style='text-align:center;'>No Data Found</td></tr>";

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
                    filename: "Friday Return of <?php echo get_ardb_name($dtl->ardb_id); ?> Between <?php echo date("d-m-Y", strtotime($this->input->post('from_dt'))).' To '.date("d-m-Y", strtotime($this->input->post('to_dt')));?>.xls"
                });
            });
        });
    </script>
        <!-- content-wrapper ends -->