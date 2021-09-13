<?php
//$target_details = json_decode($target_details);
$fortnight_details = json_decode($fortnight_details);
?>
<style>
    table {border-collapse: collapse;}
    table,th {border: 1px solid #dddddd;padding: 3px 3px 3px 3px;font-size: 12px;}
    table,td {border: 1px solid #dddddd;padding: 4px 3px 4px 3px;font-size: 13px;}
    th {text-align: center;}
    tr:hover {background-color: #f5f5f5;}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card" style="margin-top:25px;">
            <div class="card-body">
                <h4 class="card-title"> <b>Fortnightly Return</b> <small>Loan Issue</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div id="divToPrint" style="overflow-x:auto;">
                            <h5><center>THE WBSCARD BANK LTD <br>ICMARD Building, 6th floor, Block- 14/2, C.I.T. Scheme-VIII(M)<br>Ultadanga, Kolkata-700 067</center></h5>
                            <h5 class="mt-4"><center><u>Position of Investment at PCARDB Level (CONSOLIDATED ALL SECTOR)</u><br>
                                    <p>Rs. In Lakh</p>
                                </center></h5>
                            <table style="width: 100%;" id="example">
                                <thead>
                                    <tr>
                                        <th rowspan="3">#</th>
                                        <th rowspan="3">Name of ARDBs &<br>Branches</th>
                                        <th rowspan="3">Return Form</th>
                                        <th rowspan="3">Return To</th>
                                        <th colspan="8">Schematic Investment</th>
                                        <th rowspan="2" colspan="2">Non-Schematic Investment</th>
                                        <th rowspan="2" colspan="2">Total Investment of the Year <?= CURRENT_YEAR . '-' . date('y', strtotime(NEXT_YEAR)) ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Farm</th>
                                        <th colspan="2">Non-Farm</th>
                                        <th colspan="2">Hosing</th>
                                        <th colspan="2">SHG & JLG</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($fortnight_details) {
                                        $i = 1;
                                        $lkh = 100000;
                                        foreach ($fortnight_details as $dt) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $dt->name . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_form))) . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_to))) . '</td>';
                                            echo '<td>' . $dt->fm_no_case / $lkh . '</td>';
                                            echo '<td>' . $dt->fm_amt / $lkh . '</td>';
                                            echo '<td>' . $dt->nf_no_case / $lkh . '</td>';
                                            echo '<td>' . $dt->nf_amt / $lkh . '</td>';
                                            echo '<td>' . $dt->rh_no_case / $lkh . '</td>';
                                            echo '<td>' . $dt->rh_amt / $lkh . '</td>';
                                            echo '<td>' . $dt->shg_no_case / $lkh . '</td>';
                                            echo '<td>' . $dt->shg_amt / $lkh . '</td>';
                                            echo '<td>' . $dt->pl_no_case / $lkh . '</td>';
                                            echo '<td>' . $dt->pl_amt / $lkh . '</td>';
                                            echo '<td>' . $dt->tot_inv_of_curr_yr_no_case / $lkh . '</td>';
                                            echo '<td>' . $dt->tot_inv_of_curr_yr_amt / $lkh . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center;">

                            <br> <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                            <!--<button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // }   ?>
        <!-- content-wrapper ends -->

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