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
                           Investment           
  From <?php echo date('d/m/Y',strtotime($_POST['from_dt']));?> To <?php echo date('d/m/Y',strtotime($_POST['to_dt']));?>                         

                    </div>
                    

                    <br>  
                   <table style="width: 100%;">

                        <thead>

                            <tr>
                              <th rowspan="3">Name of ARDB/ Branch</th>
                              <th rowspan="3">Date of Return</th>
                               <th rowspan="3">No acc closed</th>
                              <th rowspan="3">Prog brro Memb</th>
                              <th colspan="8">Schematic Investment</th>
                           
                              <th colspan="2" rowspan="2">Non-Schematic Investment (Deposit & IBSD) </th>
                           
                              <th colspan="2" rowspan="2">Total Investment for the Year      20…- 20….  </th>
                               <th colspan="2" rowspan="2">Total Investment upto the end of the corresponding period of the previous  Year  20…-20…</th>
                            
                            </tr>

                             <tr>
                             
                              <th colspan="2">Farm Sector</th> <th colspan="2">Non-Farm Sector</th> <th colspan="2">Housing Sector</th> <th colspan="2">Others</th>
                            
                            </tr>

                            <tr>
                            
                              <th>No of Case</th>
                              <th>Amount</th>
                              <th>No of Case</th>
                              <th>Amount</th>

                              <th>No of Case</th>
                              <th>Amount</th>
                              <th>No of Case</th>
                              <th>Amount</th>
                              <th>No of Case</th>
                              <th>Amount</th>

                              <th>No of Case</th>
                              <th>Amount</th>

                              <th>No of Case</th>
                           <th>Amount</th>
                             
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($reports){ 

                                    $i = 1;

                                    foreach($reports as $dtls){

                            ?>
                                <tr>
                                   <!--   <td><?php //echo $i++; ?></td> -->
                                      <td><?php echo get_ardb_name($dtls->ardb_id); ?></td>
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                        <td><?php echo $dtls->no_acc_closed;?></td>
                                       <td><?php echo $dtls->prog_brro_memb;?></td>
                                     <td><?php echo $dtls->farm_sec_case_no;?></td>
                                    <td><?php echo $dtls->farm_sec_amt;?></td>
                                    <td><?php echo $dtls->non_farm_sec_case_no;?></td>
                                    <td><?php echo $dtls->non_farm_sec_amt;?></td>
                                    <td><?php echo $dtls->housing_sec_case_no;?></td>

                                    <td><?php echo $dtls->housing_sec_amt;?></td>
                                    <td><?php echo $dtls->other_sec_case_no;?></td>
                                    <td><?php echo $dtls->other_sec_amt;?></td>
                                    <td><?php echo $dtls->non_sch_inv_case_no;?></td>
                                    <td><?php echo $dtls->non_sch_inv_amt;?></td>
                                    <td><?php echo $dtls->tot_inv_case_no;?></td>

                                    <td><?php echo $dtls->tot_inv_amt;?></td>
                                    <td><?php echo $dtls->tot_inv_case_no_prv_yr;?></td>
                                    <td><?php echo $dtls->tot_inv_amt_prv_yr;?></td>
                                    
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