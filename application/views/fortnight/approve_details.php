<?php
$fortnight_details = json_decode($fortnight_details);
$target_details = json_decode($target_details);
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
                            <h4><center>FORTNIGHTLY RETURN (LOAN ISSUE)<br>
                                    <p>Rs. In Lakh</p><br>
                                    Target of Investment for the year <?= CURRENT_YEAR ?>
                                </center></h4>
                            <table style="width: 100%;" id="example">
                                <thead>
                                    <tr>
                                        <th rowspan="3">Form</th>
                                        <th rowspan="3">To</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Farm</th>
                                        <th colspan="2">NF</th>
                                        <!-- <th colspan="2">LD and Others</th> -->
                                        <th colspan="2">RH</th>
                                        <th colspan="2">SHG & JLG</th>
                                        <th colspan="2">LD and Others</th>
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
                                    if ($target_details) {
                                        foreach ($target_details as $tr) {
                                            echo '<tr>';
                                            echo '<td>' . $tr->frm_fn_year . '</td>';
                                            echo '<td>' . $tr->to_fn_year . '</td>';
                                            echo '<td>' . $tr->fm_no_case . '</td>';
                                            echo '<td>' . $tr->fm_amt . '</td>';
                                            echo '<td>' . $tr->nf_no_case . '</td>';
                                            echo '<td>' . $tr->nf_amt . '</td>';
                                            // echo '<td>' . $tr->pl_no_case . '</td>';
                                            // echo '<td>' . $tr->pl_amt . '</td>';
                                            echo '<td>' . $tr->rh_no_case . '</td>';
                                            echo '<td>' . $tr->rh_amt . '</td>';
                                            echo '<td>' . $tr->shg_no_case . '</td>';
                                            echo '<td>' . $tr->shg_amt . '</td>';
                                            echo '<td>' . $tr->pl_no_case . '</td>';
                                            echo '<td>' . $tr->pl_amt . '</td>';
                                            echo '<td>' . $tr->tot_inv_of_curr_yr_no_case . '</td>';
                                            echo '<td>' . $tr->tot_inv_of_curr_yr_amt . '</td>';
                                            echo '<td>' . $tr->tot_inv_of_pre_yr_no_case . '</td>';
                                            echo '<td>' . $tr->tot_inv_of_pre_yr_amt . '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <h4><center>Investment made during the fortnight <small>(<?= date('d/m/Y', strtotime(str_replace('-', '/', $fortnight_details[0]->return_form))) . ' - ' . date('d/m/Y', strtotime(str_replace('-', '/', $fortnight_details[0]->return_to))) ?>)</small></center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">Return Form</th>
                                            <th rowspan="3">Return To</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Farm</th>
                                            <th colspan="2">NF</th>
                                            <!-- <th colspan="2">LD and Others</th> -->
                                            <th colspan="2">RH</th>
                                            <th colspan="2">SHG & JLG</th>
                                            <th colspan="2">LD and Others</th>
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
                                        if ($fortnight_details) {
                                            foreach ($fortnight_details as $dt) {
                                                echo '<tr>';
                                                echo '<td>' . $dt->return_form . '</td>';
                                                echo '<td>' . $dt->return_to . '</td>';
                                                echo '<td>' . $dt->fm_no_case . '</td>';
                                                echo '<td>' . $dt->fm_amt . '</td>';
                                                echo '<td>' . $dt->nf_no_case . '</td>';
                                                echo '<td>' . $dt->nf_amt . '</td>';
                                                // echo '<td>' . $dt->pl_no_case . '</td>';
                                                // echo '<td>' . $dt->pl_amt . '</td>';
                                                echo '<td>' . $dt->rh_no_case . '</td>';
                                                echo '<td>' . $dt->rh_amt . '</td>';
                                                echo '<td>' . $dt->shg_no_case . '</td>';
                                                echo '<td>' . $dt->shg_amt . '</td>';
                                                echo '<td>' . $dt->pl_no_case . '</td>';
                                                echo '<td>' . $dt->pl_amt . '</td>';
                                                echo '<td>' . $dt->tot_inv_of_curr_yr_no_case . '</td>';
                                                echo '<td>' . $dt->tot_inv_of_curr_yr_amt . '</td>';
                                                echo '<td>' . $dt->tot_inv_of_pre_yr_no_case . '</td>';
                                                echo '<td>' . $dt->tot_inv_of_pre_yr_amt . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr>';
                                            echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                <h4><center>Progressive total of investent made up to the end of the period <small>(<?= date('d/m/Y', strtotime(str_replace('-', '/', $fortnight_details[0]->return_to))) ?>)</small></center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">Return Form</th>
                                            <th rowspan="3">Return To</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Farm</th>
                                            <th colspan="2">NF</th>
                                            <!-- <th colspan="2">LD and Others</th> -->
                                            <th colspan="2">RH</th>
                                            <th colspan="2">SHG & JLG</th>
                                            <th colspan="2">LD and Others</th>
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
                                        if ($fortnight_details) {
                                            foreach ($fortnight_details as $pr) {
                                                echo '<tr>';
                                                echo '<td>' . $pr->return_form . '</td>';
                                                echo '<td>' . $pr->return_to . '</td>';
                                                echo '<td>' . $pr->fm_no_case1 . '</td>';
                                                echo '<td>' . $pr->fm_amt1 . '</td>';
                                                echo '<td>' . $pr->nf_no_case1 . '</td>';
                                                echo '<td>' . $pr->nf_amt1 . '</td>';
                                                // echo '<td>' . $pr->pl_no_case1 . '</td>';
                                                // echo '<td>' . $pr->pl_amt1 . '</td>';
                                                echo '<td>' . $pr->rh_no_case1 . '</td>';
                                                echo '<td>' . $pr->rh_amt1 . '</td>';
                                                echo '<td>' . $pr->shg_no_case1 . '</td>';
                                                echo '<td>' . $pr->shg_amt1 . '</td>';
                                                echo '<td>' . $pr->pl_no_case1 . '</td>';
                                                echo '<td>' . $pr->pl_amt1 . '</td>';
                                                echo '<td>' . $pr->tot_inv_of_curr_yr_no_case1 . '</td>';
                                                echo '<td>' . $pr->tot_inv_of_curr_yr_amt1 . '</td>';
                                                echo '<td>' . $pr->tot_inv_of_pre_yr_no_case1 . '</td>';
                                                echo '<td>' . $pr->tot_inv_of_pre_yr_amt1 . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr>';
                                            echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                <h4><center>Borrowers Classification of the PCARDB</center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th colspan="6">CASTE</th>
                                            <th colspan="6">Farmers/ Professional Classification</th>
                                            <th colspan="3">Gender Classification</th>
                                        </tr>
                                        <tr>
                                            <th>SC</th>
                                            <th>ST</th>
                                            <th>OBC-A</th>
                                            <th>OBC-B</th>
                                            <th>GEN</th>
                                            <th>TOTAL</th>
                                            <th>Marginal</th>
                                            <th>Small</th>
                                            <th>Big</th>
                                            <th>Salary Earner</th>
                                            <th>Business</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($fortnight_details) {
                                            foreach ($fortnight_details as $br) {
                                                echo '<tr>';
                                                echo '<td>' . $br->sc . '</td>';
                                                echo '<td>' . $br->st . '</td>';
                                                echo '<td>' . $br->obca . '</td>';
                                                echo '<td>' . $br->obcb . '</td>';
                                                echo '<td>' . $br->gen . '</td>';
                                                echo '<td>' . $br->total_1 . '</td>';
                                                echo '<td>' . $br->marginal . '</td>';
                                                echo '<td>' . $br->small . '</td>';
                                                echo '<td>' . $br->big . '</td>';
                                                echo '<td>' . $br->sal_earner . '</td>';
                                                echo '<td>' . $br->bussiness . '</td>';
                                                echo '<td>' . $br->total_2 . '</td>';
                                                echo '<td>' . $br->male . '</td>';
                                                echo '<td>' . $br->female . '</td>';
                                                echo '<td>' . $br->total_3 . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr>';
                                            echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <div class="col-md-12 pt-5">
                                <div class="form-group row bttn-align">
                                    <?php
                                    $fwd_data = $_SESSION['user_type'] == 'P' ? $fortnight_details[0]->fwd_data : ($_SESSION['user_type'] == 'V' ? $fortnight_details[0]->fwd_data : '');
                                    if ($fwd_data != 'Y') {
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
        <?php // }   ?>
        <!-- content-wrapper ends -->

        <script>
            function forward() {
                window.location.href = "<?= site_url('/fortnight/forward/' . $fortnight_details[0]->ardb_id . '?fr=' . $fortnight_details[0]->return_form . '&to=' . $fortnight_details[0]->return_to); ?>";
            }
            function reject() {
                window.location.href = "<?= site_url('/fortnight/reject/' . $fortnight_details[0]->ardb_id . '?fr=' . $fortnight_details[0]->return_form . '&to=' . $fortnight_details[0]->return_to); ?>";
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


