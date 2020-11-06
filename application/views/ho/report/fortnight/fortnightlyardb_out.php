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
       <?php   foreach($reports as $dtl);


       if($_POST['report_type']=='1'){ ?>

              <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">
                        <h4>FORTNIGHTLY RETURN (CONSOLIDATED ALL SECTOR) Rs. In Lakh   </h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;"  id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th ></th>
                              <th colspan="7">Demand for the year 20..-20…</th>
                              <th colspan="8">Collection Upto Return Date</th>
                              <th rowspan="3">% of Recovery(20..-20..)</th>
                              <th colspan="7">Last Years performance on return date </th> 
                            
                            </tr>

                             <tr>
                              <th rowspan="2">ARDBs/ Brs of WBSCARDB</th>
                              <th rowspan="2">Return Date (dd/mm/yr)</th>
                              <th colspan="3">Principal</th>
                              <th colspan="3">Interest</th>
                               <th rowspan="2">Total Damand </th>
                              <th colspan="4">Principal</th>
                              <th colspan="3">Interest</th>
                           
                              <th rowspan="2">Total Collection</th>
                              <th colspan="3">Coprresponding Last Years Demand </th> 
                              <th colspan="3">Coprresponding Last Years Collection</th>
                              <th rowspan="2">% Of Collection</th>
                             
                            
                            </tr>

                            <tr>
                            
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>*ADV</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Total</th>
                               <th>Principal</th>
                              <th>Interest</th>
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
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                     <td><?php echo $dtls->dmd_prn_od;?></td>
                                    <td><?php echo $dtls->dmd_prn_cr;?></td>
                                    <td><?php echo $dtls->dmd_prn_tot;?></td>
                                    <td><?php echo $dtls->dmd_int_od;?></td>
                                    <td><?php echo $dtls->dmd_int_cr;?></td>

                                    <td><?php echo $dtls->dmd_int_tot;?></td>
                                    <td><?php echo $dtls->tot_dmd;?></td>
                                    <td><?php echo $dtls->col_prn_od;?></td>
                                    <td><?php echo $dtls->col_prn_cr;?></td>
                                    <td><?php echo $dtls->col_prn_adv;?></td>
                                    <td><?php echo $dtls->col_prn_tot;?></td>

                                     <td><?php echo $dtls->col_int_od;?></td>
                                    <td><?php echo $dtls->col_int_cr;?></td>
                                    <td><?php echo $dtls->col_int_tot;?></td>

                                    <td><?php echo $dtls->tot_colc;?></td>
                                   <td><?php echo $dtls->recov_per;?></td>

                                      <td><?php echo $dtls->prv_yr_dmd_prn;?></td>
                                        <td><?php echo $dtls->prv_yr_dmd_int;?></td>
                                          <td><?php echo $dtls->prv_yr_dmd_tot;?></td>
                                            <td><?php echo $dtls->prv_yr_col_prn;?></td>
                                              <td><?php echo $dtls->prv_yr_col_int;?></td>
                                                <td><?php echo $dtls->prv_yr_col_tot;?></td>
                                                   <td><?php echo $dtls->col_per;?></td>
                                       </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

               <div style="text-align:center;">
                        <h4>* Advance Collection to be added with CR Principal Demand automatically</h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="examples">

                        <thead>

                            <tr>
                              <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                              <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                              <th colspan="3">Member wise Progressive Recovery during the Year</th>                            
                            </tr>

                             <tr>
                          
                              <th colspan="6">Total Members DEMANAD(Number)  Total Members Collection (Number)</th>
                              <th colspan="3">Total Members Collection (Number)</th>
                                                  
                            
                            </tr>

                            <tr>
                          
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>

                             
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
                                       <td><?php echo $dtls->tot_no_ac_dmd;?></td>
                                     <td><?php echo $dtls->tot_no_ac_od_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_col;?></td>

                                    <td><?php echo $dtls->tot_no_ac_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_prog;?></td>
                                   

                                   
                                     
                                </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>


           <?php }   elseif($_POST['report_type']=='2'){ ?>
                  <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">
                        <h4>FORTNIGHTLY RETURN (NABARD FARM SECTOR) Rs. In Lakh   </h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th ></th>
                              <th colspan="7">Demand for the year 20..-20…</th>
                              <th colspan="8">Collection Upto Return Date</th>
                              <th rowspan="3">% of Recovery(20..-20..)</th>
                              <th colspan="7">Last Years performance on return date </th> 
                            
                            </tr>

                             <tr>
                              <th rowspan="2">ARDBs/ Brs of WBSCARDB</th>
                              <th rowspan="2">Return Date (dd/mm/yr)</th>
                              <th colspan="3">Principal</th>
                              <th colspan="3">Interest</th>
                               <th rowspan="2">Total Damand </th>
                              <th colspan="4">Principal</th>
                              <th colspan="3">Interest</th>
                           
                              <th rowspan="2">Total Collection</th>
                              <th colspan="3">Coprresponding Last Years Demand </th> 
                              <th colspan="3">Coprresponding Last Years Collection</th>
                              <th rowspan="2">% Of Collection</th>
                             
                            
                            </tr>

                            <tr>
                            
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>*ADV</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Total</th>
                               <th>Principal</th>
                              <th>Interest</th>
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
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                     <td><?php echo $dtls->dmd_prn_od;?></td>
                                    <td><?php echo $dtls->dmd_prn_cr;?></td>
                                    <td><?php echo $dtls->dmd_prn_tot;?></td>
                                    <td><?php echo $dtls->dmd_int_od;?></td>
                                    <td><?php echo $dtls->dmd_int_cr;?></td>

                                    <td><?php echo $dtls->dmd_int_tot;?></td>
                                    <td><?php echo $dtls->tot_dmd;?></td>
                                    <td><?php echo $dtls->col_prn_od;?></td>
                                    <td><?php echo $dtls->col_prn_cr;?></td>
                                    <td><?php echo $dtls->col_prn_adv;?></td>
                                    <td><?php echo $dtls->col_prn_tot;?></td>

                                     <td><?php echo $dtls->col_int_od;?></td>
                                    <td><?php echo $dtls->col_int_cr;?></td>
                                    <td><?php echo $dtls->col_int_tot;?></td>

                                    <td><?php echo $dtls->tot_colc;?></td>
                                   <td><?php echo $dtls->recov_per;?></td>

                                      <td><?php echo $dtls->prv_yr_dmd_prn;?></td>
                                        <td><?php echo $dtls->prv_yr_dmd_int;?></td>
                                          <td><?php echo $dtls->prv_yr_dmd_tot;?></td>
                                            <td><?php echo $dtls->prv_yr_col_prn;?></td>
                                              <td><?php echo $dtls->prv_yr_col_int;?></td>
                                                <td><?php echo $dtls->prv_yr_col_tot;?></td>
                                                   <td><?php echo $dtls->col_per;?></td>
                                       </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

               <div style="text-align:center;">
                        <h4>* Advance Collection to be added with CR Principal Demand automatically</h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="examples">

                        <thead>

                            <tr>
                              <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                              <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                              <th colspan="3">Member wise Progressive Recovery during the Year</th>                            
                            </tr>

                             <tr>
                          
                              <th colspan="6">Total Members DEMANAD(Number)  Total Members Collection (Number)</th>
                              <th colspan="3">Total Members Collection (Number)</th>
                                                  
                            
                            </tr>

                            <tr>
                          
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>

                             
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
                                       <td><?php echo $dtls->tot_no_ac_dmd;?></td>
                                     <td><?php echo $dtls->tot_no_ac_od_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_col;?></td>

                                    <td><?php echo $dtls->tot_no_ac_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_prog;?></td>
                                   

                                   
                                     
                                </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>





                </div>  


                  <?php } elseif($_POST['report_type']=='3'){ ?>


              <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">
                        <h4>FORTNIGHTLY RETURN (NABARD NON FARM SECTOR) Rs. In Lakh   </h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th ></th>
                              <th colspan="7">Demand for the year 20..-20…</th>
                              <th colspan="8">Collection Upto Return Date</th>
                              <th rowspan="3">% of Recovery(20..-20..)</th>
                              <th colspan="7">Last Years performance on return date </th> 
                            
                            </tr>

                             <tr>
                              <th rowspan="2">ARDBs/ Brs of WBSCARDB</th>
                              <th rowspan="2">Return Date (dd/mm/yr)</th>
                              <th colspan="3">Principal</th>
                              <th colspan="3">Interest</th>
                               <th rowspan="2">Total Damand </th>
                              <th colspan="4">Principal</th>
                              <th colspan="3">Interest</th>
                           
                              <th rowspan="2">Total Collection</th>
                              <th colspan="3">Coprresponding Last Years Demand </th> 
                              <th colspan="3">Coprresponding Last Years Collection</th>
                              <th rowspan="2">% Of Collection</th>
                             
                            
                            </tr>

                            <tr>
                            
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>*ADV</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Total</th>
                               <th>Principal</th>
                              <th>Interest</th>
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
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                     <td><?php echo $dtls->dmd_prn_od;?></td>
                                    <td><?php echo $dtls->dmd_prn_cr;?></td>
                                    <td><?php echo $dtls->dmd_prn_tot;?></td>
                                    <td><?php echo $dtls->dmd_int_od;?></td>
                                    <td><?php echo $dtls->dmd_int_cr;?></td>

                                    <td><?php echo $dtls->dmd_int_tot;?></td>
                                    <td><?php echo $dtls->tot_dmd;?></td>
                                    <td><?php echo $dtls->col_prn_od;?></td>
                                    <td><?php echo $dtls->col_prn_cr;?></td>
                                    <td><?php echo $dtls->col_prn_adv;?></td>
                                    <td><?php echo $dtls->col_prn_tot;?></td>

                                     <td><?php echo $dtls->col_int_od;?></td>
                                    <td><?php echo $dtls->col_int_cr;?></td>
                                    <td><?php echo $dtls->col_int_tot;?></td>

                                    <td><?php echo $dtls->tot_colc;?></td>
                                   <td><?php echo $dtls->recov_per;?></td>

                                      <td><?php echo $dtls->prv_yr_dmd_prn;?></td>
                                        <td><?php echo $dtls->prv_yr_dmd_int;?></td>
                                          <td><?php echo $dtls->prv_yr_dmd_tot;?></td>
                                            <td><?php echo $dtls->prv_yr_col_prn;?></td>
                                              <td><?php echo $dtls->prv_yr_col_int;?></td>
                                                <td><?php echo $dtls->prv_yr_col_tot;?></td>
                                                   <td><?php echo $dtls->col_per;?></td>
                                       </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

               <div style="text-align:center;">
                        <h4>* Advance Collection to be added with CR Principal Demand automatically</h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="examples">

                        <thead>

                            <tr>
                              <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                              <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                              <th colspan="3">Member wise Progressive Recovery during the Year</th>                            
                            </tr>

                             <tr>
                          
                              <th colspan="6">Total Members DEMANAD(Number)  Total Members Collection (Number)</th>
                              <th colspan="3">Total Members Collection (Number)</th>
                                                  
                            
                            </tr>

                            <tr>
                          
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>

                             
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
                                       <td><?php echo $dtls->tot_no_ac_dmd;?></td>
                                     <td><?php echo $dtls->tot_no_ac_od_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_col;?></td>

                                    <td><?php echo $dtls->tot_no_ac_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_prog;?></td>
                                   

                                   
                                     
                                </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>


                </div>  
                  <?php } elseif($_POST['report_type']=='4'){ ?>


              <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">
                        <h4>FORTNIGHTLY RETURN (SELF HELP GROUP) Rs. In Lakh   </h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th ></th>
                              <th colspan="7">Demand for the year 20..-20…</th>
                              <th colspan="8">Collection Upto Return Date</th>
                              <th rowspan="3">% of Recovery(20..-20..)</th>
                              <th colspan="7">Last Years performance on return date </th> 
                            
                            </tr>

                             <tr>
                              <th rowspan="2">ARDBs/ Brs of WBSCARDB</th>
                              <th rowspan="2">Return Date (dd/mm/yr)</th>
                              <th colspan="3">Principal</th>
                              <th colspan="3">Interest</th>
                               <th rowspan="2">Total Damand </th>
                              <th colspan="4">Principal</th>
                              <th colspan="3">Interest</th>
                           
                              <th rowspan="2">Total Collection</th>
                              <th colspan="3">Coprresponding Last Years Demand </th> 
                              <th colspan="3">Coprresponding Last Years Collection</th>
                              <th rowspan="2">% Of Collection</th>
                             
                            
                            </tr>

                            <tr>
                            
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>*ADV</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Total</th>
                               <th>Principal</th>
                              <th>Interest</th>
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
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                     <td><?php echo $dtls->dmd_prn_od;?></td>
                                    <td><?php echo $dtls->dmd_prn_cr;?></td>
                                    <td><?php echo $dtls->dmd_prn_tot;?></td>
                                    <td><?php echo $dtls->dmd_int_od;?></td>
                                    <td><?php echo $dtls->dmd_int_cr;?></td>

                                    <td><?php echo $dtls->dmd_int_tot;?></td>
                                    <td><?php echo $dtls->tot_dmd;?></td>
                                    <td><?php echo $dtls->col_prn_od;?></td>
                                    <td><?php echo $dtls->col_prn_cr;?></td>
                                    <td><?php echo $dtls->col_prn_adv;?></td>
                                    <td><?php echo $dtls->col_prn_tot;?></td>

                                     <td><?php echo $dtls->col_int_od;?></td>
                                    <td><?php echo $dtls->col_int_cr;?></td>
                                    <td><?php echo $dtls->col_int_tot;?></td>

                                    <td><?php echo $dtls->tot_colc;?></td>
                                   <td><?php echo $dtls->recov_per;?></td>

                                      <td><?php echo $dtls->prv_yr_dmd_prn;?></td>
                                        <td><?php echo $dtls->prv_yr_dmd_int;?></td>
                                          <td><?php echo $dtls->prv_yr_dmd_tot;?></td>
                                            <td><?php echo $dtls->prv_yr_col_prn;?></td>
                                              <td><?php echo $dtls->prv_yr_col_int;?></td>
                                                <td><?php echo $dtls->prv_yr_col_tot;?></td>
                                                   <td><?php echo $dtls->col_per;?></td>
                                       </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

               <div style="text-align:center;">
                        <h4>* Advance Collection to be added with CR Principal Demand automatically</h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="examples">

                        <thead>

                            <tr>
                              <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                              <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                              <th colspan="3">Member wise Progressive Recovery during the Year</th>                            
                            </tr>

                             <tr>
                          
                              <th colspan="6">Total Members DEMANAD(Number)  Total Members Collection (Number)</th>
                              <th colspan="3">Total Members Collection (Number)</th>
                                                  
                            
                            </tr>

                            <tr>
                          
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>

                             
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
                                       <td><?php echo $dtls->tot_no_ac_dmd;?></td>
                                     <td><?php echo $dtls->tot_no_ac_od_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_col;?></td>

                                    <td><?php echo $dtls->tot_no_ac_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_prog;?></td>
                                   

                                   
                                     
                                </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>





                </div>  
                  <?php } elseif($_POST['report_type']=='5'){ ?>


              <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">
                        <h4>FORTNIGHTLY RETURN (RURAL HOUSING NHB SECTOR) Rs. In Lakh   </h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th ></th>
                              <th colspan="7">Demand for the year 20..-20…</th><th colspan="8">Collection Upto Return Date</th><th rowspan="3">% of Recovery(20..-20..)</th><th colspan="7">Last Years performance on return date </th> 
                            </tr>

                             <tr>
                              <th rowspan="2">ARDBs/ Brs of WBSCARDB</th>
                              <th rowspan="2">Return Date (dd/mm/yr)</th>
                              <th colspan="3">Principal</th><th colspan="3">Interest</th><th rowspan="2">Total Damand </th>
                              <th colspan="4">Principal</th><th colspan="3">Interest</th>
                              <th rowspan="2">Total Collection</th>
                              <th colspan="3">Coprresponding Last Years Demand </th> <th colspan="3">Coprresponding Last Years Collection</th>
                              <th rowspan="2">% Of Collection</th>
                            </tr>

                            <tr>
                            
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th><th>CR</th><th>*ADV</th><th>Total</th><th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Total</th>
                               <th>Principal</th>
                              <th>Interest</th>
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
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                     <td><?php echo $dtls->dmd_prn_od;?></td>
                                    <td><?php echo $dtls->dmd_prn_cr;?></td>
                                    <td><?php echo $dtls->dmd_prn_tot;?></td>
                                    <td><?php echo $dtls->dmd_int_od;?></td>
                                    <td><?php echo $dtls->dmd_int_cr;?></td>

                                    <td><?php echo $dtls->dmd_int_tot;?></td>
                                    <td><?php echo $dtls->tot_dmd;?></td>
                                    <td><?php echo $dtls->col_prn_od;?></td>
                                    <td><?php echo $dtls->col_prn_cr;?></td>
                                    <td><?php echo $dtls->col_prn_adv;?></td>
                                    <td><?php echo $dtls->col_prn_tot;?></td>

                                     <td><?php echo $dtls->col_int_od;?></td>
                                    <td><?php echo $dtls->col_int_cr;?></td>
                                    <td><?php echo $dtls->col_int_tot;?></td>

                                    <td><?php echo $dtls->tot_colc;?></td>
                                   <td><?php echo $dtls->recov_per;?></td>

                                      <td><?php echo $dtls->prv_yr_dmd_prn;?></td>
                                        <td><?php echo $dtls->prv_yr_dmd_int;?></td>
                                          <td><?php echo $dtls->prv_yr_dmd_tot;?></td>
                                            <td><?php echo $dtls->prv_yr_col_prn;?></td>
                                              <td><?php echo $dtls->prv_yr_col_int;?></td>
                                                <td><?php echo $dtls->prv_yr_col_tot;?></td>
                                                   <td><?php echo $dtls->col_per;?></td>
                                       </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

               <div style="text-align:center;">
                        <h4>* Advance Collection to be added with CR Principal Demand automatically</h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="examples">

                        <thead>

                            <tr>
                              <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                              <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                              <th colspan="3">Member wise Progressive Recovery during the Year</th>                            
                            </tr>

                             <tr>
                          
                              <th colspan="6">Total Members DEMANAD(Number)  Total Members Collection (Number)</th>
                              <th colspan="3">Total Members Collection (Number)</th>
                                                  
                            
                            </tr>

                            <tr>
                          
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>

                             
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
                                       <td><?php echo $dtls->tot_no_ac_dmd;?></td>
                                     <td><?php echo $dtls->tot_no_ac_od_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_col;?></td>

                                    <td><?php echo $dtls->tot_no_ac_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_prog;?></td>
                                   

                                   
                                     
                                </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>  

<?php } else{  ?>


    <div id="divToPrint" style="overflow-x:auto;">

                    <div style="text-align:center;">
                        <h4>FORTNIGHTLY RETURN (RURAL HOUSING NABARD SECTOR) Rs. In Lakh   </h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th ></th>
                              <th ></th>
                              <th colspan="7">Demand for the year 20..-20…</th><th colspan="8">Collection Upto Return Date</th><th rowspan="3">% of Recovery(20..-20..)</th><th colspan="7">Last Years performance on return date </th> 
                            </tr>

                             <tr>
                              <th rowspan="2">ARDBs/ Brs of WBSCARDB</th>
                              <th rowspan="2">Return Date (dd/mm/yr)</th>
                              <th colspan="3">Principal</th><th colspan="3">Interest</th><th rowspan="2">Total Damand </th>
                              <th colspan="4">Principal</th><th colspan="3">Interest</th>
                              <th rowspan="2">Total Collection</th>
                              <th colspan="3">Coprresponding Last Years Demand </th> <th colspan="3">Coprresponding Last Years Collection</th>
                              <th rowspan="2">% Of Collection</th>
                            </tr>

                            <tr>
                            
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>OD</th><th>CR</th><th>*ADV</th><th>Total</th><th>OD</th>
                              <th>CR</th>
                              <th>Total</th>
                              <th>Principal</th>
                              <th>Interest</th>
                              <th>Total</th>
                               <th>Principal</th>
                              <th>Interest</th>
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
                                       <td><?php echo date("d/m/y",strtotime($dtls->return_dt));?></td>
                                     <td><?php echo $dtls->dmd_prn_od;?></td>
                                    <td><?php echo $dtls->dmd_prn_cr;?></td>
                                    <td><?php echo $dtls->dmd_prn_tot;?></td>
                                    <td><?php echo $dtls->dmd_int_od;?></td>
                                    <td><?php echo $dtls->dmd_int_cr;?></td>

                                    <td><?php echo $dtls->dmd_int_tot;?></td>
                                    <td><?php echo $dtls->tot_dmd;?></td>
                                    <td><?php echo $dtls->col_prn_od;?></td>
                                    <td><?php echo $dtls->col_prn_cr;?></td>
                                    <td><?php echo $dtls->col_prn_adv;?></td>
                                    <td><?php echo $dtls->col_prn_tot;?></td>

                                     <td><?php echo $dtls->col_int_od;?></td>
                                    <td><?php echo $dtls->col_int_cr;?></td>
                                    <td><?php echo $dtls->col_int_tot;?></td>

                                    <td><?php echo $dtls->tot_colc;?></td>
                                   <td><?php echo $dtls->recov_per;?></td>

                                      <td><?php echo $dtls->prv_yr_dmd_prn;?></td>
                                        <td><?php echo $dtls->prv_yr_dmd_int;?></td>
                                          <td><?php echo $dtls->prv_yr_dmd_tot;?></td>
                                            <td><?php echo $dtls->prv_yr_col_prn;?></td>
                                              <td><?php echo $dtls->prv_yr_col_int;?></td>
                                                <td><?php echo $dtls->prv_yr_col_tot;?></td>
                                                   <td><?php echo $dtls->col_per;?></td>
                                       </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                 <br>  

               <div style="text-align:center;">
                        <h4>* Advance Collection to be added with CR Principal Demand automatically</h4>                             
                         <!--  Consolidated Investment of the PCARDB( Progressive)               
 From <?php //echo date('d/m/y',strtotime($_POST['from_dt']));?> To <?php //echo date('d/m/y',strtotime($_POST['to_dt']));?> -->                                                
                    </div>
                    

                    <br>  

                    <table style="width: 100%;" id="examples">

                        <thead>

                            <tr>
                              <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                              <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                              <th colspan="3">Member wise Progressive Recovery during the Year</th>                            
                            </tr>

                             <tr>
                              <th colspan="6">Total Members DEMANAD(Number)  Total Members Collection (Number)</th>
                              <th colspan="3">Total Members Collection (Number)</th>
                            </tr>

                            <tr>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>
                              <th>Total Number of  Account</th>
                              <th>Of which OD</th>
                              <th> Of which Current </th>

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
                                       <td><?php echo $dtls->tot_no_ac_dmd;?></td>
                                     <td><?php echo $dtls->tot_no_ac_od_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_dmd;?></td>
                                    <td><?php echo $dtls->tot_no_ac_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_col;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_col;?></td>

                                    <td><?php echo $dtls->tot_no_ac_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_od_prog;?></td>
                                    <td><?php echo $dtls->tot_no_ac_curr_prog;?></td>
                                   

                                   
                                     
                                </tr>
                                <?php

                                    }

                                     }
                                
                                else{

                                    echo "<tr><td colspan='25' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>  


<?php } ?>


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
                    filename: "Fornightly of <?php echo get_ardb_name($dtl->ardb_id); ?> Between <?php echo date("d-m-Y", strtotime($this->input->post('from_dt'))).' To '.date("d-m-Y", strtotime($this->input->post('to_dt')));?>.xls"
                });

                  $("#examples").table2excel({
                    filename: "Fornightly of <?php echo get_ardb_name($dtl->ardb_id); ?> Between <?php echo date("d-m-Y", strtotime($this->input->post('from_dt'))).' To '.date("d-m-Y", strtotime($this->input->post('to_dt')));?>.xls"
                });
                
            });
        });
    </script>
        <!-- content-wrapper ends -->