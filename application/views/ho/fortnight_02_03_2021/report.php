<?php
$report_details = json_decode($report_details);
$sector_type = unserialize(REPORT_TYPE);
//var_dump($report_details);
//exit;
//$selected = json_decode($selected);
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
                <h4 class="card-title"> <b>Fortnightly Return</b> <small>Report</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div id="divToPrint" style="overflow-x:auto;">
                            <h4><center>FORTNIGHTLY RETURN (<?= $report_type > 0 ? $sector_type[$report_type] : 'CONSOLIDATED ALL SECTOR' ?>)<br>
                                    <p>Rs. In Lakh</p>
                                    <p><?= 'Form: ' . $form_date . ' To: ' . $to_date ?></p>
                                </center></h4>
                            <table style="width: 100%;" id="example">
                                <thead>
                                    <tr>
                                        <th rowspan="3">Sl No.</th>
                                        <th rowspan="3">ARDBs/ Brs of WBSCARDB</th>
                                        <th rowspan="3">Return Date</th>
                                        <th colspan="7">Demand for the year <?= CURRENT_YEAR . '-' . NEXT_YEAR ?></th>
                                        <th colspan="8">Collection Upto Return Date</th>
                                        <th rowspan="3">% of Recovery (<?= CURRENT_YEAR . '-' . NEXT_YEAR ?>)</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Principal</th>
                                        <th colspan="3">Interest</th>
                                        <th rowspan="2">Total Damand</th>
                                        <th colspan="4">Principal</th>
                                        <th colspan="3">Interest</th>
                                        <th rowspan="2">Total Collection</th>
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
                                        <th>ADV</th>
                                        <th>Total</th>
                                        <th>OD</th>
                                        <th>CR</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (sizeof($report_details) > 0) {
                                        foreach ($report_details as $dt) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $dt->name . '</td>';
                                            echo '<td>' . date('d/m/Y', strtotime(str_replace('-', '/', $dt->return_dt))) . '</td>';
                                            echo '<td>' . $dt->dmd_prn_od / 100000 . '</td>';
                                            echo '<td>' . $dt->dmd_prn_cr / 100000 . '</td>';
                                            echo '<td>' . $dt->dmd_prn_tot / 100000 . '</td>';
                                            echo '<td>' . $dt->dmd_int_od / 100000 . '</td>';
                                            echo '<td>' . $dt->dmd_int_cr / 100000 . '</td>';
                                            echo '<td>' . $dt->dmd_int_tot / 100000 . '</td>';
                                            echo '<td>' . $dt->tot_dmd / 100000 . '</td>';
                                            echo '<td>' . $dt->col_prn_od / 100000 . '</td>';
                                            echo '<td>' . $dt->col_prn_cr / 100000 . '</td>';
                                            echo '<td>' . $dt->col_prn_adv / 100000 . '</td>';
                                            echo '<td>' . $dt->col_prn_tot / 100000 . '</td>';
                                            echo '<td>' . $dt->col_int_od / 100000 . '</td>';
                                            echo '<td>' . $dt->col_int_cr / 100000 . '</td>';
                                            echo '<td>' . $dt->col_int_tot / 100000 . '</td>';
                                            echo '<td>' . $dt->tot_colc / 100000 . '</td>';
                                            echo '<td>' . $dt->recov_per / 100000 . '</td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="19">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!--                            <div class="mt-4">
                                                            <h4><center>ACCOUNT DETAILS</center></h4>
                                                            <table style="width: 100%;" id="example">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="3">ARDB/ Brs of WBSCARDB</th>
                                                                        <th colspan="6">Member wise Demand &  Recovery during the fortnight</th>
                                                                        <th colspan="3">Member wise Progressive Recovery during the Year</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="3">Total Members DEMANAD(Number)</th>
                                                                        <th colspan="3">Total Members Collection (Number)</th>
                                                                        <th colspan="3">Total Members Collection (Number)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Total Number of  Account</th>
                                                                        <th>Of which OD</th>
                                                                        <th>Of which Current</th>
                                                                        <th>Total Number of  Account</th>
                                                                        <th>Of which OD</th>
                                                                        <th>Of which Current</th>
                                                                        <th>Total Number of  Account</th>
                                                                        <th>Of which OD</th>
                                                                        <th>Of which Current</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                            <?php
//                                        if (sizeof($report_details) > 0) {
//                                            foreach ($report_details as $dt) {
//                                                echo '<tr>';
//                                                echo '<td>' . $dt->name . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_dmd . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_od_dmd . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_curr_dmd . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_col . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_od_col . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_curr_col . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_prog . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_od_prog . '</td>';
//                                                echo '<td>' . $dt->tot_no_ac_curr_prog . '</td>';
//                                                echo '</tr>';
//                                            }
//                                        } else {
//                                            echo '<tr>';
//                                            echo '<td class="text-center text-danger" colspan="10">NO DATA FOUND</td>';
//                                            echo '</tr>';
//                                        }
                            ?>
                                                                </tbody>
                                                            </table>
                                                        </div>-->
                        </div>
                        <div style="text-align: center;">

                            <br> <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                            <!--<button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // }  ?>
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