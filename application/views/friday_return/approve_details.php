<?php
$friday_details = json_decode($friday_details);
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
                                <h4><center>The W. B. State Co-op. Agril. & Rural Dev. Bank Ltd.<br>
                                        <p>WEEKLY RETURN OF DEPOSIT MOBILISATION</p>
                                        <p>Rs. In Lakh</p>
                                        <p>Week Ending on: <?= $return_dt ?></p>
                                    </center></h4>
                            </div>
                            <table style="width: 100%;" id="example">

                                <thead>

                                    <tr>
                                        <th rowspan="2">Sl No.</th>
                                        <th colspan="7">Deposit Mobilised</th>
                                        <th colspan="7">Deployment of Fund</th>
                                        <th rowspan="2">Total/Shortfall</th>
                                        <th rowspan="2">Total Deployment of Fund</th>
                                    </tr>

                                    <tr>
                                        <th>RD</th>
                                        <th>Fixed</th>
                                        <th>Term</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    // $lkh = 100000;
                                    $lkh = 1;
                                    if ($friday_details) {
                                        foreach ($friday_details as $dt) {
                                            $ts = 0;
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $dt->rd / $lkh . '</td>';
                                            echo '<td>' . $dt->fd / $lkh . '</td>';
                                            echo '<td>' . $dt->td / $lkh . '</td>';
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
                            <?php
                            $fwd_data = $_SESSION['user_type'] == 'P' ? $friday_details[0]->fwd_data : ($_SESSION['user_type'] == 'V' ? $friday_details[0]->fwd_data : '');
                            if ($fwd_data != 'Y') {
                                ?>
                                <div class="col-md-12 pt-5">
                                    <div class="form-group row bttn-align">
                                        <div class="col-md-2">
                                            <input type="button" id="submit" class="btn btn-danger" value="Reject" onclick="reject()" />
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="submit" class="btn btn-info pull-left" value="Forward" onclick="forward()" />
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-success pull-right" onclick="printDiv();"><i class="fa fa-print mr-2" aria-hidden="true"></i>Print</button>
                                        </div>
                                    </div>
                                </div>
                            <?php }elseif($_SESSION['user_type'] == 'V'){ ?>
                                <div class="col-12 mt-4">
                                    <center>
                                        <button type="button" class="btn btn-success" onclick="printDiv();"><i class="fa fa-print mr-2" aria-hidden="true"></i>Print</button>
                                    </center>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php // } ?>
    <!-- content-wrapper ends -->

    <script>
        function forward() {
            window.location.href = "<?= site_url('/friday_return/forward/' . $friday_details[0]->ardb_id . '?dt=' . $friday_details[0]->week_dt); ?>";
        }
        function reject() {
            window.location.href = "<?= site_url('/friday_return/reject/' . $friday_details[0]->ardb_id . '?dt=' . $friday_details[0]->week_dt); ?>";
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
                    '                                         .bottom { bottom: 5px; width: 100%; position: fixed; }' +
                    '                                          input.down_btn { display: none; } table.info_table td { border: none; } table.info_table { width: 30% !important; }' +
                    '                                   } </style>');
            WindowObject.document.writeln('</head><body onload="window.print()">');
            WindowObject.document.writeln(divToPrint.innerHTML);
            WindowObject.document.writeln('</body></html>');
            WindowObject.document.close();
            setTimeout(function () {
                WindowObject.close();
            }, 10);

        }
    </script>