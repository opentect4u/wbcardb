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

                <?php    //foreach($reports as $dtl);?>
                  <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">

                     <h4>THE <?php echo get_ardb_name($_POST['ardb_id']); ?></h4>              
           DC Report Uploaded Between <?php echo date('d/m/y',strtotime($_POST['from_dt'])); ?>  To <?php echo date('d/m/y',strtotime($_POST['to_dt'])); ?> (Rs. In Lakh)
                            


                        <!-- <h2>GOODWILL PHARMACY</h2> -->

                        <!-- <h4>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118</h4>

                        <h4>Ph- 0332568-4041/2523-6563</h4> 

                        <h4>GSTIN :19AAATG6028Q1Z5</h4> -->
                    </div>
                    

                    <br>  

                    <table style="width: 100%;"  id="example">

                        <thead>

                            <tr>
                              <th>Sl No.</th>
                        <!--       <th>Name of ARDB</th> -->
                              <th>Name of Borrower</th>
                              <th>Sex</th>
                              <th>Block Name</th>
                              <th>Sanction Amount</th>
                              <th>Sanction<br>Date</th>
                              <th>Application Receipt Date</th>
                              <th>Activity Name</th>
                              <th>Loan Case No.</th>
                              <th>Registration of Loan Bond No.</th>
                              <th>Registration of Loan Bond Date</th>
                              <th>Disbursement Date</th>
                              <th>Disbursement Amount</th>
                              <th>Total Project Cost</th>
                              <th>Own Contribution</th> 
                              <th>Land Security Area(in acres) and value</th>
                              <th>Cultivated Area(ie.area benefited with loan) and value</th> 
                              <th>Valuation of Hypothecated including Presumption value)</th> 
                              <th>Net Income Generated out of Loan</th>
                              <th>Security Amount (Rs)</th> 
                              <th>Repayment Year</th>   
                              <th>Memo No.</th>
                              <th>Pronote No.</th> 
                              <th>Pronote Amount</th>  
                              <th>Interest Rate</th>                     
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($reports){ 

                                    $i                = 1;
                                    $sanc_amt         = 0;
                                    $disb_amt         = 0;
                                    $tot_project_cost = 0;
                                    $own_contr        = 0;
                                 
                                    foreach($reports as $dtls){

                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                 <!--    <td><?php //echo get_ardb_name($dtls->ardb_id); ?></td> -->
                                    <td><?php echo $dtls->brrower_name;?></td>
                                    <td><?php echo $dtls->sex;?></td>
                                    <td><?php echo $dtls->block_name;?></td>
                                    <td><?php echo $dtls->sanc_amt;
                                                   $sanc_amt += $dtls->sanc_amt;
                                    ?></td>
                                    <td><?php echo $dtls->sanc_dt;?></td>
                                    <td><?php echo $dtls->recpt_dt;?></td>
                                    <td><?php echo $dtls->activity_name;?></td>
                                    <td><?php echo $dtls->loan_case_no;?></td>
                                    <td><?php echo $dtls->loan_bond_no;?></td>
                                    <td><?php echo $dtls->bond_dt;?></td>
                                    <td><?php echo $dtls->disb_dt;?></td>
                                    <td><?php echo $dtls->disb_amt;
                                                   $disb_amt += $dtls->disb_amt;
                                    ?></td>
                                    <td><?php echo $dtls->tot_project_cost;
                                                   $tot_project_cost += $dtls->tot_project_cost;
                                    ?></td>
                                    <td><?php echo $dtls->own_contr;
                                                   $own_contr += $dtls->own_contr;

                                    ?></td>
                                    <td><?php echo $dtls->land_sec_area;?></td>
                                    <td><?php echo $dtls->cult_area;?></td>
                                    <td><?php echo $dtls->valuation_hypo;?></td>
                                    <td><?php echo $dtls->net_income;?></td>
                                    <td><?php echo $dtls->sec_amt ;?></td>
                                    <td><?php echo $dtls->repayment_yr;?></td>
                                    <td><?php echo $dtls->memo_no;?></td>
                                    <td><?php echo $dtls->pronote_no;?></td>
                                    <td><?php echo $dtls->pronote_amt;?></td>
                                    <td><?php echo $dtls->intt_rt ;?></td>
                                  
                                </tr>
                                <?php

                                    }?>

                                <tr>
                                      <td colspan="4">Total</td>
                                      <td><?=$sanc_amt;?></td>
                                      <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                      <td><?=$disb_amt;?></td>
                                      <td><?=$tot_project_cost;?></td>
                                      <td><?=$own_contr;?></td>
                                      <td></td><td></td>
                                      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>




                                </tr>

                                  <?php   }
                                
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