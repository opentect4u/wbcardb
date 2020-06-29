<script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url("/assets/vendors/chart.js/Chart.min.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/progressbar.js/progressbar.min.js");?>"></script>

  <script src="<?php echo base_url("/assets/vendors/datatables.net/jquery.dataTables.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url("/assets/js/table2excel.js")?>"></script> -->
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
  <script src="//cdnjs.cloudflare.com/ajax/libs//4.0.3/js/select2.full.js"></script>
  <!-- select2 -->
  <!-- End custom js for this page-->
 
  <!-- <script src="<?php echo base_url("/assets/vendors/typeahead.js/typeahead.bundle.min.js"); ?>"></script> -->
  
  <script src="<?php echo base_url("/assets/js/data-table.js"); ?>"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="src/jquery.table2excel.js"></script>

<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 5px;

    font-size: 10.5px;
    
    
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

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
              <div class="row">
                <div class="col-14">
                
                <div id="divToPrint">

                    <div style="text-align:left;">

                        <!-- <h2>GOODWILL PHARMACY</h2> -->

                        <!-- <h4>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118</h4>

                        <h4>Ph- 0332568-4041/2523-6563</h4> 

                        <h4>GSTIN :19AAATG6028Q1Z5</h4> -->

                        <h4>Friday Return Between : <?php echo date('d/m/Y',strtotime($_POST['from_dt'])).' To '.date('d/m/Y',strtotime($_POST['to_dt']));?></h4>
                    </div>
                    

                    <br>  

                    <table style="width: 100%;"id="example">

                        <thead>

                            <tr>

                    <th>Sl No.</th>
                    <th>Submit Date</th>
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

                                if($sale){ 

                                    $i = 1;

                                    foreach($sale as $dtls){

                            ?>
                                <tr>
                                     <td><?php echo $i++; ?></td>
                                    <td><?php echo $dtls->SUBMIT_DT;?></td>
                                    <td><?php echo $dtls->RD;?></td>
                                    <td><?php echo $dtls->FD;?></td>
                                    <td><?php echo $dtls->FLEXI;?></td>
                                    <td><?php echo $dtls->MIS;?></td>
                                    <td><?php echo $dtls->OTH_DEP;?></td>
                                    <td><?php echo $dtls->IBSD;?></td>
                                    <td><?php echo $dtls->TOT_DEP_MOBILISD;?></td>
                                    <td><?php echo $dtls->CASH_IN_HND;?></td>
                                    <td><?php echo $dtls->OTH_BNK;?></td>
                                    <td><?php echo $dtls->IBSD_LOAN;?></td>
                                    <td><?php echo $dtls->DEP_LOAN;?></td>
                                    <td><?php echo $dtls->REMMIT_WBSCARDB;?></td>
                                    <td><?php echo $dtls->REMMIT_WBSCARDB_EXCESS;?></td>
                                    <td><?php echo $dtls->TOT_DEPLOY_FUND;?></td>
                                </tr>
                                <?php        
                                    }
                                ?>

                                <tr>
                                    <td>Total : </td>
                                    <td></td>
                                    <!-- <td></td><td></td><td><td></td><td></td><td></td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td> -->
                                    <td><?php echo $tot->RD;?></td>
                                    <td><?php echo $tot->FD;?></td>
                                    <td><?php echo $tot->FLEXI;?></td>
                                    <td><?php echo $tot->MIS;?></td>
                                    <td><?php echo $tot->OTH_DEP;?></td>
                                    <td><?php echo $tot->IBSD;?></td>
                                    <td><?php echo $tot->TOT_DEP_MOBILISD;?></td>
                                    <td><?php echo $tot->CASH_IN_HND;?></td>
                                    <td><?php echo $tot->OTH_BNK;?></td>
                                    <td><?php echo $tot->IBSD_LOAN;?></td>
                                    <td><?php echo $tot->DEP_LOAN;?></td>
                                    <td><?php echo $tot->REMMIT_WBSCARDB;?></td>
                                    <td><?php echo $tot->REMMIT_WBSCARDB_EXCESS;?></td>
                                    <td><?php echo $tot->TOT_DEPLOY_FUND;?></td>
                                </tr>

                                <?php
                                   }
                                
                                else{

                                    echo "<tr><td colspan='16' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                

                </div>   

                <div style="text-align: center;">

                   <br> <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>
                </div>

            </div>
        </div>
    </div>
</div>
  <!-- <script src="table2excel.js" type="text/javascript"></script>   -->
<script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                console.log('raja')
                $("#example").table2excel({
                    filename: " Friday Return Report Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?>.xls"
                    // filename: "abc.xls"
                });
            });
        });
    </script>