<?php
$selected = json_decode($selected);
$select_inv = json_decode($select_inv);
$select_prog = json_decode($select_prog);
//$readonly = $selected ? 'readonly' : '';
$id = $select_inv ? $select_inv->id : '0';
if ($id > 0) {
    $disable_button = $select_inv->fwd_data == 'Y' ? 'disabled' : '';
} else {
    $disable_button = '';
}
?>
<style type="text/css">
    .table, .table_thead, .table_body{
        border: 1px solid #c8c8c8;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Fortnightly Return <small>Loan Issue Entry</small></h4> <hr>
                <?= form_open('fortnight/investment_save'); ?>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Date From</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="return_form" id="return_form" value="<?= $select_inv ? $select_inv->return_form : date('Y-m-d') ?>" required="" <?php //$readonly                                                                                                                                                         ?>/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Date To</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="return_to" id="return_to" value="<?= $select_inv ? $select_inv->return_to : date('Y-m-d') ?>" required="" <?php //$readonly                                                                                                                                                         ?>/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Financial Year</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="from_fin_yr" id="from_fin_yr" value="<?= $select_inv ? $select_inv->from_fin_yr : CURRENT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">To </label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="to_fin_yr" id="to_fin_yr" value="<?= $select_inv ? $select_inv->to_fin_yr : NEXT_YEAR ?>" required="" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                        <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-5">Previous From Fin Year</label>
                                                            <div class="col-sm-7">
                                                                <input type="number" class="form-control" name="prv_frm_fin_yr" id="prv_frm_fin_yr" value="<?= $select_inv ? $select_inv->prv_frm_fin_yr : PREVIOUS_YEAR ?>" required="" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-sm-5 col-form-label">Previous To Fin Year</label>
                                                            <div class="col-sm-7">
                                                                <input type="number" class="form-control" name="prv_to_fin_yr" id="prv_to_fin_yr" value="<?= $select_inv ? $select_inv->prv_to_fin_yr : CURRENT_YEAR ?>" required="" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Num of A/C Closed</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="no_acc_closed" id="no_acc_closed" value="<?= $select_inv ? $select_inv->no_acc_closed : '' ?>"  />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Prog No. of  Browwing Members</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="prog_brro_memb" id="prog_brro_memb" value="<?= $select_inv ? $select_inv->prog_brro_memb : '' ?>" readonly  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive margin-topp-remove">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="3"><b>Target of Lending for the year</b> <b><?= CURRENT_YEAR . ' - ' . NEXT_YEAR ?></b></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>No of Cases</th>
                                                <th>Amount(Rs. In Lacs)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Farm Sector</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="fm_no_case" id="fm_no_case" value="<?= $selected ? $selected->fm_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="fm_amt" id="fm_amt" value="<?= $selected ? $selected->fm_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Non-Farm Sector</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="nf_no_case" id="nf_no_case" value="<?= $selected ? $selected->nf_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="nf_amt" id="nf_amt" value="<?= $selected ? $selected->nf_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>RH</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="rh_no_case" id="rh_no_case" value="<?= $selected ? $selected->rh_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="rh_amt" id="rh_amt" value="<?= $selected ? $selected->rh_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>SHG/JLG</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="shg_no_case" id="shg_no_case" value="<?= $selected ? $selected->shg_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="shg_amt" id="shg_amt" value="<?= $selected ? $selected->shg_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>LD & Others(Out Of Deposit)</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pl_no_case" id="pl_no_case" value="<?= $selected ? $selected->pl_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pl_amt" id="pl_amt" value="<?= $selected ? $selected->pl_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total Lending for the<br> Year <b><?= CURRENT_YEAR . '-' . NEXT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_curr_yr_no_case" id="tot_inv_of_curr_yr_no_case" value="<?= $selected ? $selected->tot_inv_of_curr_yr_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_curr_yr_amt" id="tot_inv_of_curr_yr_amt" value="<?= $selected ? $selected->tot_inv_of_curr_yr_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total upto the end of the previous  <br>Year <b><?= PREVIOUS_YEAR . '-' . CURRENT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_pre_yr_no_case" id="tot_inv_of_pre_yr_no_case" value="<?= $selected ? $selected->tot_inv_of_pre_yr_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_pre_yr_amt" id="tot_inv_of_pre_yr_amt" value="<?= $selected ? $selected->tot_inv_of_pre_yr_amt : '0' ?>" required="" readonly/></div></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="3"><b>Lending during the fortnight</b> <span id="ret_dt"></span></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>No of Cases</th>
                                                <th>Amount(Rs In Lacs)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Farm Sector</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="fm_no_case1" id="fm_no_case1" value="<?= $select_inv ? $select_inv->fm_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="fm_amt1" id="fm_amt1" value="<?= $select_inv ? $select_inv->fm_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Non-Farm Sector</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="nf_no_case1" id="nf_no_case1" value="<?= $select_inv ? $select_inv->nf_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="nf_amt1" id="nf_amt1" value="<?= $select_inv ? $select_inv->nf_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>RH</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="rh_no_case1" id="rh_no_case1" value="<?= $select_inv ? $select_inv->rh_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="rh_amt1" id="rh_amt1" value="<?= $select_inv ? $select_inv->rh_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>SHG/JLG</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="shg_no_case1" id="shg_no_case1" value="<?= $select_inv ? $select_inv->shg_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="shg_amt1" id="shg_amt1" value="<?= $select_inv ? $select_inv->shg_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>LD & Others(Out Of Deposit)</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pl_no_case1" id="pl_no_case1" value="<?= $select_inv ? $select_inv->pl_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pl_amt1" id="pl_amt1" value="<?= $select_inv ? $select_inv->pl_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total Lending for the<br> Year <b><?= CURRENT_YEAR . '-' . NEXT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_curr_yr_no_case1" id="tot_inv_of_curr_yr_no_case1" value="<?= $select_inv ? $select_inv->tot_inv_of_curr_yr_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="tot_inv_of_curr_yr_amt1" id="tot_inv_of_curr_yr_amt1" value="<?= $select_inv ? $select_inv->tot_inv_of_curr_yr_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total upto the end of the previous  <br>Year <b><?= PREVIOUS_YEAR . '-' . CURRENT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_pre_yr_no_case1" id="tot_inv_of_pre_yr_no_case1" value="<?= $select_inv ? $select_inv->tot_inv_of_pre_yr_no_case : '0' ?>" required="" /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="tot_inv_of_pre_yr_amt1" id="tot_inv_of_pre_yr_amt1" value="<?= $select_inv ? $select_inv->tot_inv_of_pre_yr_amt : '0' ?>" required="" /></div></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="3"><b>Progressive total of lending up to the end of the period</b> <span id="ret_to_dt"></span></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>No of Cases</th>
                                                <th>Amount(Rs. In Lacs)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Farm Sector</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="fm_no_case2" id="fm_no_case2" value="<?= $select_prog ? $select_prog->fm_no_case : '0' ?>" required="" readonly/></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="fm_amt2" id="fm_amt2" value="<?= $select_prog ? $select_prog->fm_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Non-Farm Sector</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="nf_no_case2" id="nf_no_case2" value="<?= $select_prog ? $select_prog->nf_no_case : '0' ?>" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="nf_amt2" id="nf_amt2" value="<?= $select_prog ? $select_prog->nf_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                            <tr>
                                                <td>RH</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="rh_no_case2" id="rh_no_case2" value="<?= $select_prog ? $select_prog->rh_no_case : '0' ?>" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="rh_amt2" id="rh_amt2" value="<?= $select_prog ? $select_prog->rh_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                            <tr>
                                                <td>SHG/JLG</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="shg_no_case2" id="shg_no_case2" value="<?= $select_prog ? $select_prog->shg_no_case : '0' ?>" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="shg_amt2" id="shg_amt2" value="<?= $select_prog ? $select_prog->shg_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                            <tr>
                                                <td>LD & Others(Out Of Deposit)</td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="pl_no_case2" id="pl_no_case2" value="<?= $select_prog ? $select_prog->pl_no_case : '0' ?>" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="pl_amt2" id="pl_amt2" value="<?= $select_prog ? $select_prog->pl_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                            <tr>
                                                <td>Total Lending for the<br> Year <b><?= CURRENT_YEAR . '-' . NEXT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_curr_yr_no_case2" id="tot_inv_of_curr_yr_no_case2" value="<?= $select_prog ? $select_prog->tot_inv_of_curr_yr_no_case : '0' ?>" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="tot_inv_of_curr_yr_amt2" id="tot_inv_of_curr_yr_amt2" value="<?= $select_prog ? $select_prog->tot_inv_of_curr_yr_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                            <tr>
                                                <!-- <td>Total upto the end of the previous  <br>Year <b><?= PREVIOUS_YEAR . '-' . CURRENT_YEAR ?></b></td> -->
                                                <td> Total lending during the corresponding period of the previous  <br>Year <b><?= PREVIOUS_YEAR . '-' . CURRENT_YEAR ?></b></td>
                                                <td><div class="form-group"><input type="number" class="form-control" name="tot_inv_of_pre_yr_no_case2" id="tot_inv_of_pre_yr_no_case2" value="<?= $select_prog ? $select_prog->tot_inv_of_pre_yr_no_case : '0' ?>" required="" readonly /></div></td>
                                                <td><div class="form-group"><input type="decimal" class="form-control" name="tot_inv_of_pre_yr_amt2" id="tot_inv_of_pre_yr_amt2" value="<?= $select_prog ? $select_prog->tot_inv_of_pre_yr_amt : '0' ?>" required="" readonly /></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><span><b><u>Consolidated Borrowers Classification of the PCARDB( Progressive)</u></b></span></div>
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-12"><label><b><u>Caste</u></b></label></div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">SC</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="sc" id="sc" value="<?= $select_inv ? $select_inv->sc : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">ST</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="st" id="st" value="<?= $select_inv ? $select_inv->st : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">OBC A</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control width-obc" name="obca" id="obca" value="<?= $select_inv ? $select_inv->obca : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">OBC B</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control width-obc" name="obcb" id="obcb" value="<?= $select_inv ? $select_inv->obcb : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Gen</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="gen" id="gen" value="<?= $select_inv ? $select_inv->gen : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Total</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="total_1" id="total_1" value="<?= $select_inv ? $select_inv->total_1 : '0'; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-12"><label><b><u>Farmers/ Professional Classification</u></b></label></div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Marginal</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="marginal" id="marginal" value="<?= $select_inv ? $select_inv->marginal : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Small</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="small" id="small" value="<?= $select_inv ? $select_inv->small : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Big</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="big" id="big" value="<?= $select_inv ? $select_inv->big : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-6">Salary Earner</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="sal_earner" id="sal_earner" value="<?= $select_inv ? $select_inv->sal_earner : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-7 col-form-label">Business</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="bussiness" id="bussiness" value="<?= $select_inv ? $select_inv->bussiness : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Total</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="total_2" id="total_2" value="<?= $select_inv ? $select_inv->total_2 : '0'; ?>" required="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-12"><label><b><u>Gender Classification</u></b></label></div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Men</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="male" id="male" value="<?= $select_inv ? $select_inv->male : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Women</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="female" id="female" value="<?= $select_inv ? $select_inv->female : '0'; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Total</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="total_3" id="total_3" value="<?= $select_inv ? $select_inv->total_3 : '0'; ?>" required="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="target_id" value="<?= $selected ? $selected->target_id : 0; ?>">
                        <input type="hidden" name="id" value="<?= $select_inv ? $select_inv->id : 0; ?>">
                        <input type="hidden" name="ardb_id" value="<?= $ardb_id; ?>">
                        <div class="col-md-12 pt-5">
                            <div class="form-group row bttn-align">
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-info" <?= $disable_button; ?> onclick="myFunction()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <!-- <script>
        function download() {
            window.location.href = "<?php //site_url('ho/self_doc_verify/download_zip/' . $flag . '/' . $ardb_id . '/' . $memo_no); ?>";
        }
    </script> -->

    <script>
        // COUNT No of CASES
        $('#fm_no_case1').on('change', function () {
            total_no_cases($(this).val());
            var fm_no_case2 = <?= $select_prog ? $select_prog->fm_no_case : '0' ?>;
            $('#fm_no_case2').val(parseInt($(this).val()) + parseInt(fm_no_case2)).change();
        });
        $('#nf_no_case1').on('change', function () {
            total_no_cases($(this).val());
            var nf_no_case2 = <?= $select_prog ? $select_prog->nf_no_case : '0' ?>;
            $('#nf_no_case2').val(parseInt($(this).val()) + parseInt(nf_no_case2)).change();
        });
        $('#pl_no_case1').on('change', function () {
            total_no_cases($(this).val());
            var pl_no_case2 = <?= $select_prog ? $select_prog->pl_no_case : '0' ?>;
            $('#pl_no_case2').val(parseInt($(this).val()) + parseInt(pl_no_case2)).change();
        });
        $('#rh_no_case1').on('change', function () {
            total_no_cases($(this).val());
            var rh_no_case2 = <?= $select_prog ? $select_prog->rh_no_case : '0' ?>;
            $('#rh_no_case2').val(parseInt($(this).val()) + parseInt(rh_no_case2)).change();
        });
        $('#shg_no_case1').on('change', function () {
            total_no_cases($(this).val());
            var shg_no_case2 = <?= $select_prog ? $select_prog->shg_no_case : '0' ?>;
            $('#shg_no_case2').val(parseInt($(this).val()) + parseInt(shg_no_case2)).change();
        });
        function total_no_cases(value) {
            var total = $('#tot_inv_of_curr_yr_no_case1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#fm_no_case1').val()) + parseInt($('#nf_no_case1').val()) + parseInt($('#pl_no_case1').val()) + parseInt($('#rh_no_case1').val()) + parseInt($('#shg_no_case1').val());
            $('#tot_inv_of_curr_yr_no_case1').val(count);
        }

        // COUNT AMOUNT
        $('#fm_amt1').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
             //alert(parseFloat($(this).val()).toFixed(2));
            total_amount($(this).val());
            var fm_amt2 = <?= $select_prog ? $select_prog->fm_amt : '0' ?>;
            // alert('hi');
            // $('#fm_amt2').val(parseInt($(this).val()) + parseInt(fm_amt2)).change();
            $('#fm_amt2').val(parseFloat($(this).val()) + parseFloat(fm_amt2)).change();
            
        });
        $('#nf_amt1').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            total_amount($(this).val());
            var nf_amt2 = <?= $select_prog ? round($select_prog->nf_amt,2) : '0' ?>;
            // $('#nf_amt2').val(parseInt($(this).val()) + parseInt(nf_amt2)).change();
            $('#nf_amt2').val(parseFloat($(this).val()) + parseFloat(nf_amt2)).change();
        });
        $('#pl_amt1').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            total_amount($(this).val());
            var pl_amt2 = <?= $select_prog ? $select_prog->pl_amt : '0' ?>;
            // $('#pl_amt2').val(parseInt($(this).val()) + parseInt(pl_amt2)).change()
            var tot_pl=parseFloat($(this).val()) + parseFloat(pl_amt2).change();
            tot_pl=tot_pl.toFixed(2);
            // alert(tot_pl);
            // $('#pl_amt2').val(parseFloat($(this).val()) + parseFloat(pl_amt2)).change();
            $('#pl_amt2').val(parseFloat($(this).val()) + parseFloat(pl_amt2)).change();


            
        });
        $('#rh_amt1').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            total_amount($(this).val());
            var rh_amt2 = <?= $select_prog ? $select_prog->rh_amt : '0' ?>;
            // $('#rh_amt2').val(parseInt($(this).val()) + parseInt(rh_amt2)).change();
            $('#rh_amt2').val(parseFloat($(this).val()) + parseFloat(rh_amt2)).change();
        });
        $('#shg_amt1').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            total_amount($(this).val());
            var shg_amt2 = <?= $select_prog ? round($select_prog->shg_amt,2) : '0' ?>;
            // $('#shg_amt2').val(parseInt($(this).val()) + parseInt(shg_amt2)).change();
            $('#shg_amt2').val(parseFloat($(this).val()) + parseFloat(shg_amt2)).change();
        });
        function total_amount(value) {
            
            var total = parseFloat($('#tot_inv_of_curr_yr_amt1').val()).toFixed(2);
            if (total == '') {
                total = 0;
            }
            // var count = parseInt($('#fm_amt1').val()) + parseInt($('#nf_amt1').val()) + parseInt($('#pl_amt1').val()) + parseInt($('#rh_amt1').val()) + parseInt($('#shg_amt1').val());
            // $('#tot_inv_of_curr_yr_amt1').val(count);
            var count = parseFloat($('#fm_amt1').val()) + parseFloat($('#nf_amt1').val())  + parseFloat($('#rh_amt1').val()) + parseFloat($('#shg_amt1').val()) + parseFloat($('#pl_amt1').val());
            count=count.toFixed(2);
            // var tot=math.round(count);
        //  alert(count);
            $('#tot_inv_of_curr_yr_amt1').val(count);
            
        }


        // $('#tot_inv_of_curr_yr_amt1').on('change', function () {
        //     $(this).val(parseFloat($(this).val()).toFixed(2));
        // }
        $('#tot_inv_of_pre_yr_no_case1').on('change', function () {
            $('#tot_inv_of_pre_yr_no_case2').val(parseInt($(this).val()) + parseInt($('#tot_inv_of_pre_yr_no_case2').val()));
        });
        $('#tot_inv_of_pre_yr_amt1').on('change', function () {
            $(this).val(parseFloat($(this).val()).toFixed(2));
            // $('#tot_inv_of_pre_yr_amt2').val(parseInt($(this).val()) + parseInt($('#tot_inv_of_pre_yr_amt2').val()));
            $('#tot_inv_of_pre_yr_amt2').val(parseFloat($(this).val()) + parseFloat($('#tot_inv_of_pre_yr_amt2').val()));
        });
    </script>

    <script>
        // COUNT No of CASES
        $('#fm_no_case2').on('change', function () {
            total_no_cases2($(this).val());
        });
        $('#nf_no_case2').on('change', function () {
            total_no_cases2($(this).val());
        });
        $('#pl_no_case2').on('change', function () {
            total_no_cases2($(this).val());
        });
        $('#rh_no_case2').on('change', function () {
            total_no_cases2($(this).val());
        });
        $('#shg_no_case2').on('change', function () {
            total_no_cases2($(this).val());
        });
        function total_no_cases2(value) {
            var total = $('#tot_inv_of_curr_yr_no_case2').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#fm_no_case2').val()) + parseInt($('#nf_no_case2').val()) + parseInt($('#pl_no_case2').val()) + parseInt($('#rh_no_case2').val()) + parseInt($('#shg_no_case2').val());
            $('#tot_inv_of_curr_yr_no_case2').val(count);
        }

        // COUNT AMOUNT
        $('#fm_amt2').on('change', function () {
            total_amount2($(this).val());
        });
        $('#nf_amt2').on('change', function () {
            total_amount2($(this).val());
        });
        $('#pl_amt2').on('change', function () {
            total_amount2($(this).val());
        });
        $('#rh_amt2').on('change', function () {
            total_amount2($(this).val());
        });
        $('#shg_amt2').on('change', function () {
            total_amount2($(this).val());
        });
        function total_amount2(value) {
            var total = parseFloat($('#tot_inv_of_curr_yr_amt2').val()).toFixed(2);
            if (total == '') {
                total = 0;
            }
            // var count = parseInt($('#fm_amt2').val()) + parseInt($('#nf_amt2').val()) + parseInt($('#pl_amt2').val()) + parseInt($('#rh_amt2').val()) + parseInt($('#shg_amt2').val());
            // $('#tot_inv_of_curr_yr_amt2').val(count);
var count = parseFloat($('#fm_amt2').val()) + parseFloat($('#nf_amt2').val()) + parseFloat($('#pl_amt2').val()) + parseFloat($('#rh_amt2').val()) + parseFloat($('#shg_amt2').val());
count=count.toFixed(2);
$('#tot_inv_of_curr_yr_amt2').val(count);
            
        }
    </script>

    <script>
        // COUNT CAST
        $('#sc').change(function () {
            count_total($(this).val());
        });
        $('#st').change(function () {
            count_total($(this).val());
        });
        $('#obca').change(function () {
            count_total($(this).val());
        });
        $('#obcb').change(function () {
            count_total($(this).val());
        });
        $('#gen').change(function () {
            count_total($(this).val());
            // check_total_member();
        });
        function count_total(value) {
            var total = $('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#sc').val()) + parseInt($('#st').val()) + parseInt($('#obca').val()) + parseInt($('#obcb').val()) + parseInt($('#gen').val());
            $('#total_1').val(count);
           $('#prog_brro_memb').val(count);
        }

        //COUNT PERSONAL CLASSIFICATION
        $('#marginal').on('change', function () {
            // total2($(this).val());
            var total = $('#total_2').val();
            var total1=$('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val());
           
        $('#total_2').val(count);
        if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("marginal").focus();
        $(this).val(0);
        $('#total_2').val(parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        $('#small').on('change', function () {
            // total2($(this).val());
            var total = $('#total_2').val();
            var total1=$('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val());
           
        $('#total_2').val(count);
        if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("small").focus();
        $(this).val(0);
        $('#total_2').val(parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        $('#big').on('change', function () {
            // total2($(this).val());
            var total = $('#total_2').val();
            var total1=$('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val());
           
        $('#total_2').val(count);
        if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("big").focus();
        $(this).val(0);
        $('#total_2').val(parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        $('#sal_earner').on('change', function () {
            // total2($(this).val());
            var total = $('#total_2').val();
            var total1=$('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val());
           
        $('#total_2').val(count);
        if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("sal_earner").focus();
        $(this).val(0);
        $('#total_2').val(parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        $('#bussiness').on('change', function () {
            // total2($(this).val());
            // check_total_member();
            var total = $('#total_2').val();
            var total1=$('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val());
           
        $('#total_2').val(count);
        if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("bussiness").focus();
        $(this).val(0);
        $('#total_2').val(parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        function total2(value) {
            var total = $('#total_2').val();
            var total1=$('#total_1').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#marginal').val()) + parseInt($('#small').val()) + parseInt($('#big').val()) + parseInt($('#sal_earner').val()) + parseInt($('#bussiness').val());
           
        $('#total_2').val(count);
        if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
    }

        //COUNT GENDER CLASSIFICATION
        $('#male').on('change', function () {
            // total3($(this).val());
            var total1=$('#total_1').val();
            var total = $('#total_3').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#male').val()) + parseInt($('#female').val());
          
        $('#total_3').val(count);
            if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("male").focus();
        $(this).val(0);
        $('#total_3').val( parseInt($('#male').val()) + parseInt($('#female').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        $('#female').on('change', function () {
            // total3($(this).val());
            var total1=$('#total_1').val();
            var total = $('#total_3').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#male').val()) + parseInt($('#female').val());
          
        $('#total_3').val(count);
            if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        document.getElementById("female").focus();
        $(this).val(0);
        $('#total_3').val( parseInt($('#male').val()) + parseInt($('#female').val()));
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        });
        function total3(value) {
            var total1=$('#total_1').val();
            var total = $('#total_3').val();
            if (total == '') {
                total = 0;
            }
            var count = parseInt($('#male').val()) + parseInt($('#female').val());
          
        $('#total_3').val(count);
            if (parseInt(count) > parseInt(total1) ) {
        alert('Total Not Matched with cast total');
        // $('#submit').attr('type', 'button');
        $('#submit').prop('disabled', true);
        return false;
        }else{

           $('#submit').prop('disabled', false);
          return true;
          }
        }
    </script>

    <script>
        $('#return_form').on('change', function () {
            $('#return_to').change();
            var frm_dt = $(this).val().split("-").reverse().join("/");
            var to_dt = $('#return_to').val().split("-").reverse().join("/")
            $('#ret_dt').text('(' + frm_dt + '-' + to_dt + ')');
        });
        $('#return_to').on('change', function () {
            var frm_dt = $('#return_form').val().split("-").reverse().join("/");
            var to_dt = $(this).val().split("-").reverse().join("/")
            $('#ret_dt').text('(' + frm_dt + '-' + to_dt + ')');
            $('#ret_to_dt').text('(' + frm_dt + '-' + to_dt + ')');
        });
        
    </script>
    <script>
       function myFunction() {
        // alert('hi');
        var tot_1_val=parseInt($('#total_1').val());
        var tot_2_val= parseInt($('#total_2').val());
        var tot_3_val= parseInt($('#total_3').val());

	 var tot_sum = parseInt($('#total_1').val()) + parseInt( $('#total_2').val()) +  parseInt($('#total_3').val());
	 //alert(tot_sum);
	if(tot_sum==0 ){
		alert('Consolidated Borrowers Classification of the PCARDB Cant not zero');
		$('#submit').attr('type', 'buttom');
		event.preventDefault();
	}else{
	$('#submit').attr('type', 'submit');
	}

// alert(tot_1_val);
// alert(tot_2_val);
// alert(tot_3_val);

    if(tot_1_val != tot_2_val && tot_1_val !=   tot_3_val){
		alert('All Consolidated Borrowers Classification of the PCARDB Not Matched');
		$('#submit').attr('type', 'buttom');
		event.preventDefault();
	}else{
	$('#submit').attr('type', 'submit');
	}

}

    </script>