<?php
$shg_details = json_decode($shg_details);
$memo_header = json_decode($memo_header);
$borrower_details = json_decode($borrower_details);
$gt_details = json_decode($gt_details);
$details = json_decode($details);
$approve_details = json_decode($approve_details);
// echo '<pre>'; var_dump($_SESSION['user_type']);exit;
// echo '<pre>'; var_dump($shg_details);exit;
?>
<style type="text/css">
    .table thead th, .jsgrid .jsgrid-table thead th {
        border-top: 0;
        border-bottom: 1px solid #c8c8c8;
        font-weight: 500;
        font-size: .875rem;
    }
    .table, .table_thead, .table_body{
        border: 1px solid #c8c8c8;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div id="divToPrint">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <div class="table-responsive"> -->
                                        <table width="80%" class="info_table">
                                            <tr>
                                                <td>Memo No :-</td>
                                                <td class="pull-left"><?= $memo_header[0]->memo_no ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sector :-</td>
                                                <td class="pull-left"><b>SHG</b></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount of Requisition :-</td>
                                                <!-- <td class="pull-left"><?= $memo_header[0]->tot_pronote ?></td> -->
                                                <td class="pull-left"><?= $memo_header[0]->tot_amt ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total No. of Pronote :-</td>
                                                <!-- <td class="pull-left"></td> -->
                                                <td class="pull-left"><?= $memo_header[0]->tot_pronote ?></td>
                                            </tr>
                                        </table>
                                    <!-- </div> -->
                                </div>
                                <?php if($download_flag > 0){ ?> 
                                <div class="col-md-6">
                                    <input type="button" id="submit" class="btn btn-info pull-right down_btn" value="Download Files" onclick="download()" />
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pt-5">
                                    <center><h4>Loan Requisition Cum Disbursement Certificate For Self Sanction Cases(Only for Selp Help Group/s)</h4></center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="table_thead">Pronote No</th>
                                                    <th class="table_thead">Pronote Date</th>
                                                    <th class="table_thead">Name of SHG/s</th>
                                                    <th class="table_thead">Total Member</th>
                                                    <th class="table_thead">Address of the SHG</th>
                                                    <th class="table_thead">Block</th>
                                                    <th class="table_thead">Purpose</th>
                                                    <th class="table_thead">Mor.</th>
                                                    <th class="table_thead">Repay.</th>
                                                    <th class="table_thead">Rate of Interest(%)</th>
                                                    <th class="table_thead">BOD Sanction Date</th>
                                                    <th class="table_thead">Due Date</th>
                                                    <th class="table_thead">Borrower <br>Sl. No./s in <br>the BOD <br>Sanction</th>
                                                    <th class="table_thead">Project Cost (Rs.)</th>
                                                    <th class="table_thead">Amount Sanctioned(Rs.)</th>
                                                    <th class="table_thead">Total Own Contribution (Rs.)</th>
                                                    <th class="table_thead">Corpus Fund (Rs.)</th>
                                                    <th class="table_thead">Amount Disbursed (Rs)</th>
                                                    <th class="table_thead">Intersee Agreement Date</th>
                                                    <th class="table_thead">Total Intersee Ag. Bond</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
                            $i = 1;
                            $total_pro = $i;
                            $total_memb = 0;
                            $tot_proj_cost = 0;
                            $tot_sanc_amt = 0;
                            $tot_own_amt = 0;
                            $tot_disb_amt = 0;
                            $tot_corp_fnd = 0;
                            $total_Intr_ag_bond = $shg_details[0]->total_Intr_ag_bond;
                            $pronote = $shg_details[0]->pronote_no;
                            foreach ($shg_details as $dt) {
                            if ($pronote != $dt->pronote_no) {
                                $pronote = $dt->pronote_no;
                                $total_Intr_ag_bond += $dt->total_Intr_ag_bond;
                                $i++;
                                $total_pro = $i;
                            }
                            $total_memb += $dt->tot_memb;
                            $tot_proj_cost += $dt->project_cost;
                            $tot_sanc_amt += $dt->sanc_amt;
                            $tot_own_amt += $dt->tot_own_amt;
                            $tot_disb_amt += $dt->disb_amt;

                            $tot_corp_fnd += $dt->corp_fnd;
                            // $total_Intr_ag_bond += $dt->total_Intr_ag_bond;
                            $pr_no = $dt->pronote_no;
                            echo '<tr>';
                            // echo 'Before-> ' . $pr_no . ' ' . $details->$pr_no->print . '<br>';
                            if ($details->$pr_no->print == 'no') {
                                echo '<td class="table_body" rowspan="' . $details->$pr_no->rowspan . '">' . $dt->pronote_no . '</td>';
                                $details->$pr_no->print = 'yes';
                            }
                            // echo 'After-> ' . $pr_no . ' ' . $details->$pr_no->print . '<br>';
                            echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->pronote_date))) . '</td>';
                            echo '<td class="table_body">' . $dt->shg_name . '</td>';
                            echo '<td class="table_body">' . $dt->tot_memb . '</td>';
                            echo '<td class="table_body">' . $dt->shg_addr . '</td>';
                            echo '<td class="table_body">' . $dt->block_name . '</td>';
                            echo '<td class="table_body">' . $dt->purpose_name . '</td>';
                            echo '<td class="table_body">' . $dt->moratorium_period . '</td>';
                            echo '<td class="table_body">' . $dt->repayment_no . '</td>';
                            echo '<td class="table_body">' . $dt->roi . '</td>';
                            echo '<td class="table_body">' . $dt->bod_sanc_dt . '</td>';
                            // echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->due_dt))) . '</td>';
                            if($dt->due_dt!='0000-00-00'){

                                echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->due_dt))) . '</td>';
                            }else{
                                echo '<td class="table_body"></td>';
                            }
                            echo '<td class="table_body">' . $dt->brrwr_sl_no . '</td>';
                            echo '<td class="table_body">' . $dt->project_cost . '</td>';
                            echo '<td class="table_body">' . $dt->sanc_amt . '</td>';
                            echo '<td class="table_body">' . $dt->tot_own_amt . '</td>';
                            echo '<td class="table_body">' . $dt->corp_fnd . '</td>';
                            echo '<td class="table_body">' . $dt->disb_amt . '</td>';
                            echo '<td class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $dt->intr_aggr_dt))) . '</td>';
                            echo '<td class="table_body">' . $dt->total_Intr_ag_bond . '</td>';
                            echo '</tr>';
                            }
                            // exit;
                            echo '<tr>';
                            echo '<td class="table_body"><b>Pronote Total</b></td>';
                            echo '<td colspan="2" class="table_body"><b>' . $total_pro . '</b></td>';
                            echo '<td class="table_body"><b>' . $total_memb . '</b></td>';
                            echo '<td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td><td class="table_body"></td>';
                            echo '<td class="table_body"><b>' . $tot_proj_cost . '</b></td>';
                            echo '<td class="table_body"><b>' . $tot_sanc_amt . '</b></td>';
                            echo '<td class="table_body"><b>' . $tot_own_amt . '</b></td>';
                            echo '<td class="table_body"><b>' . $tot_corp_fnd . '</b></td>';
                            echo '<td class="table_body"><b>' . $tot_disb_amt . '</b></td>';
                            echo '<td class="table_body"></td>';
                            echo '<td class="table_body"><b>' . $total_Intr_ag_bond . '</b></td>';
                            echo '</tr>';
                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pt-5">
                                    <center><h4>Pronote Wise Grand Total</h4></center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="table_thead" class="table_thead">Pronote No</th>
                                                    <th class="table_thead" class="table_thead">Pronote Date</th>
                                                    <th class="table_thead" class="table_thead">Total Member</th>
                                                    <th class="table_thead" class="table_thead">Total Project Cost</th>
                                                    <th class="table_thead" class="table_thead">Total Sanction Cost</th>
                                                    <th class="table_thead" class="table_thead">Total Own Contribution (Rs.)</th>
                                                    <th class="table_thead" class="table_thead">Total Amount Disbursed (Rs)</th>
                                                    <!-- <th class="table_thead" class="table_thead">Intersee Agreement Date</th> -->
                                                    <!-- <th class="table_thead" class="table_thead">Total Intersee Ag. Bond</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
                            foreach ($gt_details as $gt) {
                            echo '<tr>';
                            echo '<td class="table_body" class="table_body">' . $gt->pronote_no . '</td>';
                            echo '<td class="table_body" class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $gt->pronote_date))) . '</td>';
                            echo '<td class="table_body" class="table_body">' . $gt->tot_memb . '</td>';
                            echo '<td class="table_body" class="table_body">' . $gt->tot_p_cost . '</td>';
                            echo '<td class="table_body" class="table_body">' . $gt->tot_sanc_amt . '</td>';
                            echo '<td class="table_body" class="table_body">' . $gt->tot_own_amt . '</td>';
                            echo '<td class="table_body" class="table_body">' . $gt->tot_disb_amt . '</td>';
                            // echo '<td class="table_body" class="table_body">' . date("d/m/Y", strtotime(str_replace("-", "/", $gt->intr_aggr_dt))) . '</td>';
                            // echo '<td class="table_body" class="table_body">'.$gt->tot_igb.'</td>';
                            echo '</tr>';
                            }
                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 pt-5">
                                    <center><h4>Borrower Classification</h4></center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="table_thead">Pronote No</th>
                                                    <th class="table_thead">Total SHG</th>
                                                    <th class="table_thead">Total Member</th>
                                                    <th class="table_thead">Men</th>
                                                    <th class="table_thead">Women</th>
                                                    <th class="table_thead">SC</th>
                                                    <th class="table_thead">ST</th>
                                                    <th class="table_thead">OBC A</th>
                                                    <th class="table_thead">OBC B</th>
                                                    <th class="table_thead">Gen</th>
                                                    <th class="table_thead">Oth.</th>
                                                    <th class="table_thead">Total</th>
                                                    <th class="table_thead">Big</th>
                                                    <th class="table_thead">Marginal</th>
                                                    <th class="table_thead">Small</th>
                                                    <th class="table_thead">Landless</th>
                                                    <th class="table_thead">LIG</th>
                                                    <th class="table_thead">MIG</th>
                                                    <th class="table_thead">HIG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
                            foreach ($borrower_details as $b) {
                            echo '<tr>';
                            echo '<td class="table_body">' . $b->pronote_no . '</td>';
                            echo '<td class="table_body">' . $b->total_shg . '</td>';
                            echo '<td class="table_body">' . $b->tot_memb . '</td>';
                            echo '<td class="table_body">' . $b->tot_male . '</td>';
                            echo '<td class="table_body">' . $b->tot_female . '</td>';
                            echo '<td class="table_body">' . $b->tot_sc . '</td>';
                            echo '<td class="table_body">' . $b->tot_st . '</td>';
                            echo '<td class="table_body">' . $b->tot_obca . '</td>';
                            echo '<td class="table_body">' . $b->tot_obcb . '</td>';
                            echo '<td class="table_body">' . $b->tot_gen . '</td>';
                            echo '<td class="table_body">' . $b->tot_other . '</td>';
                            echo '<td class="table_body">' . $b->tot_count . '</td>';
                            echo '<td class="table_body">' . $b->tot_big . '</td>';
                            echo '<td class="table_body">' . $b->tot_marginal . '</td>';
                            echo '<td class="table_body">' . $b->tot_small . '</td>';
                            echo '<td class="table_body">' . $b->tot_landless . '</td>';
                            echo '<td class="table_body">' . $b->tot_lig . '</td>';
                            echo '<td class="table_body">' . $b->tot_mig . '</td>';
                            echo '<td class="table_body">' . $b->tot_hig . '</td>';
                            echo '</tr>';
                            }
                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
			<?php
			if ($approve_details[0]->status > 0) {
			    
			} else {
			    ?>
    			<div class="col-md-12 pt-5">
    			    <div class="form-group row bttn-align">
				    <?php if ($_SESSION['user_type'] != 'U') { ?>
					<div class="col-md-2">
					    <input type="button" id="submit" class="btn btn-danger" value="Reject" onclick="reject()" />
					</div>
				    <?php } ?>
    				<div class="col-md-2">
    				    <input type="button" id="submit" class="btn btn-info pull-left" value="Forward" onclick="submit()" />
    				</div>
                    <?php if ($_SESSION['user_type'] != 'U') { ?>
                                    <label for="reason" class="col-sm-1 col-form-label">Reason:</label>
                                    <div class="col-sm-3">

                                    <input type="text" style="width:350px" id=reason name="reason" class="form-control" value=" "    />
                                   
                                    </div> 
                                    <?php } ?>
    			    </div>
    			</div>
			<?php } ?>
            <?php if($_SESSION['user_type'] == 'V') { ?>
            <div class="col-12">
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
    <!-- content-wrapper ends -->

    <script>
	function submit() {

        var reason=$('#reason').val() ;
        console.log(reason);
	    window.location.href = "<?= site_url('/dc/forward_data?qstr=' . $memo_no .','); ?>"+ reason;
	    // window.location.href = "<?= site_url('/dc/forward_data/' . $memo_no); ?>";
	}
	function reject() {
        var reason=$('#reason').val() ;
        console.log(reason);
	    window.location.href = "<?= site_url('/dc/reject_data?qstr=' . $memo_no .','); ?>"+ reason;
	   // window.location.href = "<?= site_url('/dc/reject_data/' . $memo_no); ?>";
	}
	function download() {
	    window.location.href = "<?= site_url('/dc/download_zip/' . $memo_no); ?>";
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