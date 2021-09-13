<?php
$report_details = json_decode($report_details);
$fwd_status = json_decode($fwd_status);
$report_type = unserialize(REPORT_TYPE);
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
                <h4 class="card-title"> <b>Fortnightly Return</b> <small>Demand & Recovery</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div id="divToPrint" style="overflow-x:auto;">
                            <h4><center>FORTNIGHTLY RETURN<br>
                                    <p>Rs. In Lakh</p>
                                    <p>Position of Demand & Recovery at PCARDB Level as on Return Date</p>
                                    <p><?= 'Form: ' . $frm_dt . ' To: ' . $to_dt ?></p>
                                </center></h4>
                            <table style="width: 100%;" id="example">
                                <thead>
                                    <tr>
                                        <th rowspan="3">Sector</th>
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
                                    $lk = 100000;
                                    if ($report_details) {
                                        foreach ($report_details as $dt) {
                                            echo '<tr>';
                                            echo '<td>' . $report_type[$dt->sector_id] . '</td>';
                                            echo '<td>' . $dt->dmd_prn_od / $lk . '</td>';
                                            echo '<td>' . $dt->dmd_prn_cr / $lk . '</td>';
                                            echo '<td>' . $dt->dmd_prn_tot / $lk . '</td>';
                                            echo '<td>' . $dt->dmd_int_od / $lk . '</td>';
                                            echo '<td>' . $dt->dmd_int_cr / $lk . '</td>';
                                            echo '<td>' . $dt->dmd_int_tot / $lk . '</td>';
                                            echo '<td>' . $dt->tot_dmd / $lk . '</td>';
                                            echo '<td>' . $dt->col_prn_od / $lk . '</td>';
                                            echo '<td>' . $dt->col_prn_cr / $lk . '</td>';
                                            echo '<td>' . $dt->col_prn_adv / $lk . '</td>';
                                            echo '<td>' . $dt->col_prn_tot / $lk . '</td>';
                                            echo '<td>' . $dt->col_int_od / $lk . '</td>';
                                            echo '<td>' . $dt->col_int_cr / $lk . '</td>';
                                            echo '<td>' . $dt->col_int_tot / $lk . '</td>';
                                            echo '<td>' . $dt->tot_colc / $lk . '</td>';
                                            echo '<td>' . $dt->recov_per . '</td>';

                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="17">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center;">
                            <div class="col-md-10 pt-5">
                                <div class="form-group row bttn-align">
                                    <?php
//                            $fwd_data = $_SESSION['user_type'] == 'P' ? $report_details[0]->fwd_data : ($_SESSION['user_type'] == 'V' ? $report_details[0]->fwd_data : '');
                                    if ($fwd_status[0]->fwd_status > 0) {

                                    } else {
                                        ?>
                                        <div class="col-md-2">
                                            <input type="button" id="submit" class="btn btn-danger" value="Reject" onclick="reject()" />
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="submit" class="btn btn-info pull-left" value="Forward" onclick="forward()" />
                                        </div>
                                    <?php }if ($_SESSION['user_type'] == 'V') { ?>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // }    ?>
        <!-- content-wrapper ends -->

        <script>
            function forward() {
                window.location.href = "<?= site_url('/fortnight/report_forward/' . $report_details[0]->ardb_id . '?frm_dt=' . $report_details[0]->return_form . '&to_dt=' . $report_details[0]->return_to); ?>";
            }
            function reject() {
                window.location.href = "<?= site_url('/fortnight/report_reject/' . $report_details[0]->ardb_id . '?frm_dt=' . $report_details[0]->return_form . '&to_dt=' . $report_details[0]->return_to); ?>";
            }
        </script>

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
