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

                <?php    foreach($reports as $dtl);?>
                  <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">

                     <h4>THE <?php echo get_ardb_name($dtl->ardb_id); ?> PCARD LTD.</h4>              
           FRIDAY RETURN FOR THEWEEK ENDING <?php echo date('d/m/y',strtotime($_POST['from_dt'])); ?>  To <?php echo date('d/m/y',strtotime($_POST['to_dt'])); ?> (Rs. In Lakh)
                            


                        <!-- <h2>GOODWILL PHARMACY</h2> -->

                        <!-- <h4>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118</h4>

                        <h4>Ph- 0332568-4041/2523-6563</h4> 

                        <h4>GSTIN :19AAATG6028Q1Z5</h4> -->
                    </div>
                    

                    <br>  

                    <table style="width: 100%;">

                        <thead>

                            <tr>
                              <th></th>
                              <th></th>
                              <th colspan="7">Deposit   Mobilised</th>
                              <th colspan="7">Deployment  of  Fund </th>
                          
                           </tr>

                            <tr>
                              <th>Sl No.</th>
                              <th>Name of ARDB</th>
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

                                    foreach($reports as $dtls){

                            ?>
                                <tr>
                                     <td><?php echo $i++; ?></td>
                                      <td><?php echo get_ardb_name($dtls->ardb_id); ?></td>
                                     <td><?php echo $dtls->rd;?></td>
                                    <td><?php echo $dtls->fd;?></td>
                                    <td><?php echo $dtls->flexi_sb;?></td>
                                    <td><?php echo $dtls->mis;?></td>
                                    <td><?php echo $dtls->other_dep;?></td>
                                    <td><?php echo $dtls->ibsd;?></td>
                                    <td><?php echo $dtls->total_dep_mob;?></td>
                                    <td><?php echo $dtls->cash_in_hand;?></td>
                                    <td><?php echo $dtls->other_bank;?></td>
                                    <td><?php echo $dtls->ibsd_loan;?></td>
                                    <td><?php echo $dtls->dep_loan;?></td>
                                    <td><?php echo $dtls->wbcardb_remit_slr;?></td>
                                    <td><?php echo $dtls->wbcardb_remit_slr_excess;?></td>
                                    <td><?php echo $dtls->total_fund_deploy;?></td>
                                  
                                </tr>
                                <?php

                                    }

                                     }
                                
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

                </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->