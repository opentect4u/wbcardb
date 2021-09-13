<?php
//$target_details = json_decode($target_details);
//$fortnight_details = json_decode($fortnight_details);
//$sector_type = unserialize(REPORT_TYPE);
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
                <h4 class="card-title"> <b>Fortnightly Return</b> <small>Investment</small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div id="divToPrint" style="overflow-x:auto;">
                            <h4><center>FORTNIGHTLY RETURN (LOAN ISSUE)<br>
                                    <p>Rs. In Lakh<br><?php //$fortnight_details[0]->name         ?></p><br>
                                    Demand for the year <?= CURRENT_YEAR ?>
                                </center></h4>
                            <table style="width: 100%;" id="example">
                                <thead>
                                    <tr>
                                        <th colspan="8">Category of Demand</th>
                                    </tr>
                                    <tr>
                                        <th>Category of Demand</th>
                                        <th>Farm</th>
                                        <th>NF</th>
                                        <th>PL</th>
                                        <th>RH</th>
                                        <th>SHG & JLG</th>
                                        <th>Total</th>
                                        <th>Last Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    echo '<tr>';
                                    echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                    echo '</tr>';
                                    ?>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <h4><center>Collections made during the fortnight <small>(<?php //date('d/m/Y', strtotime(str_replace('-', '/', $fortnight_details[0]->return_form))) . ' - ' . date('d/m/Y', strtotime(str_replace('-', '/', $fortnight_details[0]->return_to)))         ?>)</small></center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">Return Form</th>
                                            <th rowspan="3">Return To</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Farm</th>
                                            <th colspan="2">NF</th>
                                            <th colspan="2">PL</th>
                                            <th colspan="2">RH</th>
                                            <th colspan="2">SHG & JLG</th>
                                            <th colspan="2">Total</th>
                                            <th colspan="2">Last Year</th>
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
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                        echo '</tr>';
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                <h4><center> Progressive total of Collection made during the period <small>(<?php //date('d/m/Y', strtotime(str_replace('-', '/', $fortnight_details[0]->return_to)))         ?>)</small></center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">Return Form</th>
                                            <th rowspan="3">Return To</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Farm</th>
                                            <th colspan="2">NF</th>
                                            <th colspan="2">PL</th>
                                            <th colspan="2">RH</th>
                                            <th colspan="2">SHG & JLG</th>
                                            <th colspan="2">Total</th>
                                            <th colspan="2">Last Year</th>
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
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                        echo '</tr>';
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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