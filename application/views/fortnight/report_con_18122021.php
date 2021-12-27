<?php
$dmd_pri_dtls = json_decode($dmd_pri_dtls);
$dmd_int_dtls = json_decode($dmd_int_dtls);
$col_pri_dtls = json_decode($col_pri_dtls);
$col_int_dtls = json_decode($col_int_dtls);
$prog_pri_dtls = json_decode($prog_pri_dtls);
$prog_int_dtls = json_decode($prog_int_dtls);
// $lkh = 100000;
$lkh=1;
//foreach ($dmd_pri_dtls as $dt) {
//    print_r($dt);
//}
//exit;
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
                <h4 class="card-title"> <b>Fortnightly Return</b> <small></small>
                    <span class="confirm-div" style="float:right;"></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-12">
                        <div id="divToPrint" style="overflow-x:auto;">
                            <h4><center>FORTNIGHTLY RETURN<br>
                                    <p>Rs. In Lakh<br><?php //$fortnight_details[0]->name                                                                             ?></p><br>
                                    Demand for the year <?= CURRENT_YEAR ?>
                                </center></h4>
                            <table style="width: 100%;" id="example">
                                <thead>
                                    <tr>
                                        <th colspan="8">Principal</th>
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
                                    if ($dmd_pri_dtls) {
                                        $a = round($dmd_pri_dtls[0]->od_farm / $lkh, 2) + round($dmd_pri_dtls[0]->od_non_farm / $lkh, 2) + round($dmd_pri_dtls[0]->rh_nb_od / $lkh, 2) + round($dmd_pri_dtls[0]->rh_nhb_od / $lkh, 2) + round($dmd_pri_dtls[0]->od_shg / $lkh, 2);
                                        $b = round($dmd_pri_dtls[0]->cr_farm / $lkh, 2) + round($dmd_pri_dtls[0]->cr_non_farm / $lkh, 2) + round($dmd_pri_dtls[0]->rh_nb_cr / $lkh, 2) + round($dmd_pri_dtls[0]->rh_nhb_cr / $lkh, 2) + round($dmd_pri_dtls[0]->cr_shg / $lkh, 2);
                                        echo '<tr>';
                                        echo '<td class="text-center text-block">Overdue</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->od_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->od_non_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->rh_nb_od / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->rh_nhb_od / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->od_shg / $lkh, 2) . '</td>';
                                        echo '<td>' . $a . '</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td class="text-center text-block">Current</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->cr_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->cr_non_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->rh_nb_cr / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->rh_nhb_cr / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_pri_dtls[0]->cr_shg / $lkh, 2) . '</td>';
                                        echo '<td>' . $b . '</td>';
//                                        echo '<td>' . ($dmd_pri_dtls[0]->cr_farm / $lkh) + ($dmd_pri_dtls[0]->cr_non_farm / $lkh) + ($dmd_pri_dtls[0]->rh_nb_cr / $lkh) + ($dmd_pri_dtls[0]->rh_nhb_cr / $lkh) + ($dmd_pri_dtls[0]->cr_shg / $lkh) . '</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan="8">Interest</th>
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
                                    if ($dmd_int_dtls) {
                                        $c = round($dmd_int_dtls[0]->od_farm / $lkh, 2) + round($dmd_int_dtls[0]->od_non_farm / $lkh, 2) + round($dmd_int_dtls[0]->rh_nb_od / $lkh, 2) + round($dmd_int_dtls[0]->rh_nhb_od / $lkh, 2) + round($dmd_int_dtls[0]->od_shg / $lkh, 2);
                                        $d = round($dmd_int_dtls[0]->cr_farm / $lkh, 2) + round($dmd_int_dtls[0]->cr_non_farm / $lkh, 2) + round($dmd_int_dtls[0]->rh_nb_cr / $lkh, 2) + round($dmd_int_dtls[0]->rh_nhb_cr / $lkh, 2) + round($dmd_int_dtls[0]->cr_shg / $lkh, 2);
                                        echo '<tr>';
                                        echo '<td class="text-center text-block">Overdue</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->od_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->od_non_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->rh_nb_od / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->rh_nhb_od / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->od_shg / $lkh, 2) . '</td>';
                                        echo '<td>' . $c . '</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td class="text-center text-block">Current</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->cr_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->cr_non_farm / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->rh_nb_cr / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->rh_nhb_cr / $lkh, 2) . '</td>';
                                        echo '<td>' . round($dmd_int_dtls[0]->cr_shg / $lkh, 2) . '</td>';
                                        echo '<td>' . $d . '</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <h4><center>Collections made during the fortnight <small>(<?= date('d/m/Y', strtotime(str_replace('-', '/', $frm_dt))) . ' - ' . date('d/m/Y', strtotime(str_replace('-', '/', $to_dt))) ?>)</small></center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th colspan="8">Interest</th>
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
                                        if ($col_pri_dtls) {
                                            $e = round($col_pri_dtls[0]->od_farm / $lkh, 2) + round($col_pri_dtls[0]->od_non_farm / $lkh, 2) + round($col_pri_dtls[0]->rh_nb_od / $lkh, 2) + round($col_pri_dtls[0]->rh_nhb_od / $lkh, 2) + round($col_pri_dtls[0]->od_shg / $lkh, 2);
                                            $f = round($col_pri_dtls[0]->cr_farm / $lkh, 2) + round($col_pri_dtls[0]->cr_non_farm / $lkh, 2) + round($col_pri_dtls[0]->rh_nb_cr / $lkh, 2) + round($col_pri_dtls[0]->rh_nhb_cr / $lkh, 2) + round($col_pri_dtls[0]->cr_shg / $lkh, 2);
                                            $g = round($col_pri_dtls[0]->adv_farm / $lkh, 2) + round($col_pri_dtls[0]->adv_non_farm / $lkh, 2) + round($col_pri_dtls[0]->rh_nb_adv / $lkh, 2) + round($col_pri_dtls[0]->rh_nhb_adv / $lkh, 2) + round($col_pri_dtls[0]->adv_shg / $lkh, 2);
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Overdue</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->od_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->od_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->rh_nb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->rh_nhb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->od_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $e . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Current</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->cr_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->cr_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->rh_nb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->rh_nhb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->cr_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $f . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Advance</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->adv_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->adv_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->rh_nb_adv / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->rh_nhb_adv / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_pri_dtls[0]->adv_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $g . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                        } else {
                                            echo '<tr>';
                                            echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th colspan="8">Interest</th>
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
                                        if ($col_int_dtls) {
                                            $h = round($col_int_dtls[0]->od_farm / $lkh, 2) + round($col_int_dtls[0]->od_non_farm / $lkh, 2) + round($col_int_dtls[0]->rh_nb_od / $lkh, 2) + round($col_int_dtls[0]->rh_nhb_od / $lkh, 2) + round($col_int_dtls[0]->od_shg / $lkh, 2);
                                            $j = round($col_int_dtls[0]->cr_farm / $lkh, 2) + round($col_int_dtls[0]->cr_non_farm / $lkh, 2) + round($col_int_dtls[0]->rh_nb_cr / $lkh, 2) + round($col_int_dtls[0]->rh_nhb_cr / $lkh, 2) + round($col_int_dtls[0]->cr_shg / $lkh, 2);
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Overdue</td>';
                                            echo '<td>' . round($col_int_dtls[0]->od_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->od_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->rh_nb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->rh_nhb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->od_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $h . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Current</td>';
                                            echo '<td>' . round($col_int_dtls[0]->cr_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->cr_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->rh_nb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->rh_nhb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($col_int_dtls[0]->cr_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $j . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
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
                                <?php
                                 $form=$frm_dt;
                                $dif_yr = date('Y') - date('Y', strtotime($frm_dt));
                                if (date('Ymd', strtotime($frm_dt)) <= date('Y') . END_ACC_DM && date('Ymd', strtotime($frm_dt)) >= (date('Y') - $dif_yr) . '0401') {
                                    $form = (date('Y') - $dif_yr) . '-04-01';
                                } elseif (date('Ymd', strtotime($frm_dt)) <= (date('Y') - $dif_yr) . '0401' && date('Ymd', strtotime($frm_dt)) >= (date('Y') - ($dif_yr + 1)) . '0401') {
                                    $form = (date('Y') - ($dif_yr + 1)) . '-04-01';
                                }else{
                                    $form=$frm_dt;
                                    }
                                ?>
                                <h4><center> Progressive total of Collection made during the period <small>(<?= date('d/m/Y', strtotime(str_replace('-', '/', $form))) . ' - ' . date('d/m/Y', strtotime(str_replace('-', '/', $to_dt))) ?>)</small></center></h4>
                                <table style="width: 100%;" id="example">
                                    <thead>
                                        <tr>
                                            <th colspan="8">Principal</th>
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
                                        if ($prog_pri_dtls) {
                                            $k = round($prog_pri_dtls[0]->od_farm / $lkh, 2) + round($prog_pri_dtls[0]->od_non_farm / $lkh, 2) + round($prog_pri_dtls[0]->rh_nb_od / $lkh, 2) + round($prog_pri_dtls[0]->rh_nhb_od / $lkh, 2) + round($prog_pri_dtls[0]->od_shg / $lkh, 2);
                                            $l = round($prog_pri_dtls[0]->cr_farm / $lkh, 2) + round($prog_pri_dtls[0]->cr_non_farm / $lkh, 2) + round($prog_pri_dtls[0]->rh_nb_cr / $lkh, 2) + round($prog_pri_dtls[0]->rh_nhb_cr / $lkh, 2) + round($prog_pri_dtls[0]->cr_shg / $lkh, 2);
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Overdue</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->od_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->od_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->rh_nb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->rh_nhb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->od_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $k . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Current</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->cr_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->cr_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->rh_nb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->rh_nhb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_pri_dtls[0]->cr_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $l . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                        } else {
                                            echo '<tr>';
                                            echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th colspan="8">Interest</th>
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
                                        if ($prog_int_dtls) {
                                            $m = round($prog_int_dtls[0]->od_farm / $lkh, 2) + round($prog_int_dtls[0]->od_non_farm / $lkh, 2) + round($prog_int_dtls[0]->rh_nb_od / $lkh, 2) + round($prog_int_dtls[0]->rh_nhb_od / $lkh, 2) + round($prog_int_dtls[0]->od_shg / $lkh, 2);
                                            $n = round($prog_int_dtls[0]->cr_farm / $lkh, 2) + round($prog_int_dtls[0]->cr_non_farm / $lkh, 2) + round($prog_int_dtls[0]->rh_nb_cr / $lkh, 2) + round($prog_int_dtls[0]->rh_nhb_cr / $lkh, 2) + round($prog_int_dtls[0]->cr_shg / $lkh, 2);
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Overdue</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->od_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->od_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->rh_nb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->rh_nhb_od / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->od_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $m . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '<td class="text-center text-block">Current</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->cr_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->cr_non_farm / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->rh_nb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->rh_nhb_cr / $lkh, 2) . '</td>';
                                            echo '<td>' . round($prog_int_dtls[0]->cr_shg / $lkh, 2) . '</td>';
                                            echo '<td>' . $n . '</td>';
                                            echo '<td></td>';
                                            echo '</tr>';
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

                            <br> <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                            <!--<button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // }    ?>
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