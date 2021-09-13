<?php
$report_details = json_decode($report_details);
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
                <h4 class="card-title"> <b>Friday Return</b> <small>Details</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">

                    <div class="col-12">
                        <div id="divToPrint" style="overflow-x:auto;">
                            <div class="col-md-12">
                                <h4><center>The West Bengal State Cooperative Agriculture & Rural Development Bank Ltd.<br>
                                        <p>Rs. In Lakh</p>
                                        <p>CONSOLIDATED FRIDAY RETURN FOR THEWEEK ENDING <?= $form_date . ' - ' . $to_date ?></p>
                                    </center></h4>
                            </div>
                            <table style="width: 100%;" id="example">

                                <thead>

                                    <tr>
                                        <th rowspan="2">Sl No.</th>
                                        <th rowspan="2">Name of ARDB</th>
                                        <th colspan="7">Deposit Mobilised</th>
                                        <th colspan="7">Deployment of Fund</th>
                                        <th colspan="3">Remittable Against</th>
                                        <th rowspan="2">Total/Shortfall</th>
                                    </tr>

                                    <tr>
                                        <th>RD</th>
                                        <th>Fixed/Term</th>
                                        <th>Flexi/Savings</th>
                                        <th>MIS</th>
                                        <th>Other Deposit</th>
                                        <th>IBSD</th>
                                        <th>Total Deposit Mobilised</th>
                                        <th>Cash in Hand & Bank</th>
                                        <th>Other Banks</th>
                                        <th>Loan from IBSD O/S</th>
                                        <th>Loan Against Deposit</th>
                                        <th>Remitted to WBSCARDB(SLR)</th>
                                        <th>Others</th>
                                        <th>Total Deployment of Fund</th>
                                        <th>Required SLR(1/3rd of Total Deposit)</th>
                                        <th>Loan from IBSD(100%)</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (sizeof($report_details) > 0) {
                                        foreach ($report_details as $dt) {
                                            $lkh = 100000;
                                            $r = 0;
                                            $t = 0;
                                            $ts = 0;
                                            $r = round((($dt->total_dep_mob / $lkh - $dt->ibsd / $lkh) / 3), 2);
                                            $t = $r + $dt->ibsd_as / $lkh;
                                            $ts = $t - $dt->wbcardb_remit_slr / $lkh;
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $dt->name . '</td>';
                                            echo '<td>' . $dt->rd / $lkh . '</td>';
                                            echo '<td>' . $dt->fd / $lkh . '</td>';
                                            echo '<td>' . $dt->flexi_sb / $lkh . '</td>';
                                            echo '<td>' . $dt->mis / $lkh . '</td>';
                                            echo '<td>' . $dt->other_dep / $lkh . '</td>';
                                            echo '<td>' . $dt->ibsd / $lkh . '</td>';
                                            echo '<td>' . $dt->total_dep_mob / $lkh . '</td>';
                                            echo '<td>' . $dt->cash_in_hand / $lkh . '</td>';
                                            echo '<td>' . $dt->other_bank / $lkh . '</td>';
                                            echo '<td>' . $dt->ibsd_loan / $lkh . '</td>';
                                            echo '<td>' . $dt->dep_loan / $lkh . '</td>';
                                            echo '<td>' . $dt->wbcardb_remit_slr / $lkh . '</td>';
                                            echo '<td>' . $dt->wbcardb_remit_slr_excess / $lkh . '</td>';
                                            echo '<td>' . $dt->total_fund_deploy / $lkh . '</td>';
                                            echo '<td>' . $r . '</td>';
                                            echo '<td>' . $dt->ibsd_as / $lkh . '</td>';
                                            echo '<td>' . $t . '</td>';
                                            echo '<td>' . $ts . '</td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="20">No Data Found</td>';
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
    </div>
    <?php // } ?>
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
                    '                                         .left { margin-left: 335px;} ' +
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