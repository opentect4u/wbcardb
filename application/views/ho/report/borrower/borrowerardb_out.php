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
                          Consolidated Borrowers Classification of the PCARDB( Progressive)               
 From <?php echo date('d/m/Y',strtotime($_POST['from_dt']));?> To <?php echo date('d/m/Y',strtotime($_POST['to_dt']));?>                         


                       
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th colspan="5">CASTE</th>
                           
                              <th colspan="6">Farmers/ Professional Classification</th>
                           
                              <th colspan="3">Gender Classification</th>
                            
                            </tr>

                            <tr>
                              <th></th>
                              <th>SC</th>
                              <th>ST</th>
                              <th>OBC</th>
                              <th>GEN.</th>
                              <th>TOTAL</th>

                              <th>Marginal</th>
                              <th>Small</th>
                              <th>Big</th>
                              <th>Salary earner</th>
                              <th>Business</th>
                              <th>Total</th>

                              <th>Male</th>
                              <th>Female</th>

                              <th>Total</th>
                           
                             
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
                                     <td><?php echo $dtls->sc;?></td>
                                    <td><?php echo $dtls->st;?></td>
                                    <td><?php echo $dtls->obc;?></td>
                                    <td><?php echo $dtls->gen;?></td>
                                    <td><?php echo $dtls->total_1;?></td>

                                    <td><?php echo $dtls->marginal;?></td>
                                    <td><?php echo $dtls->small;?></td>
                                    <td><?php echo $dtls->big;?></td>
                                    <td><?php echo $dtls->sal_earner;?></td>
                                    <td><?php echo $dtls->bussiness;?></td>
                                    <td><?php echo $dtls->total_2;?></td>

                                    <td><?php echo $dtls->male;?></td>
                                    <td><?php echo $dtls->female;?></td>
                                    <td><?php echo $dtls->total_3;?></td>
                                    
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
                    filename: "Borrower Return <?php echo get_ardb_name($dtl->ardb_id); ?>  of Between <?php echo date("d-m-Y", strtotime($this->input->post('from_dt'))).' To '.date("d-m-Y", strtotime($this->input->post('to_dt')));?>.xls"
                });
            });
        });
    </script>
        <!-- content-wrapper ends -->