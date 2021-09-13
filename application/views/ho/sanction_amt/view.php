<?php
$ardb_list = json_decode($ardb_list);
$selected = json_decode($selected);
$sanc_details = json_decode($sanc_details);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <?= form_open('ho/sanction_amt'); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <b>Self Sanction Limit</b> <small>View</small>
                    <span class="confirm-div" style="float:right;"><?php echo $this->session->flashdata('msg'); ?></span></h4> <hr>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ARDB</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="ardb_id" name="ardb_id" required >
                                    <option value="">Select</option>
                                    <?php
                                    if ($ardb_list) {
                                        foreach ($ardb_list as $ardb) {
                                            $select = "";
                                            if ($selected->ardb_id == $ardb->id) {
                                                $select = "selected";
                                            }
                                            echo '<option value="' . $ardb->id . '" ' . $select . '>' . $ardb->name . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="to_dt" class="col-sm-2 col-form-label"></label>
                                <button class="btn btn-primary" id="sarch" name="search" type="submit">Proceed</button>
                            </div>
                            <div class="col-md-6">
                                <label for="to_dt" class="col-sm-2 col-form-label"></label>
                                <button type="button" class="btn btn-success pull-left" onclick="add()">Add New</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
        <?php if (isset($_REQUEST['search'])) { ?>

            <div class="card" style="margin-top:25px;">
                <div class="card-body">
                    <center><h4 class="card-title" style="color:green;"> <b>SELF SANCTION LIMIT DETAILS</b> <small></small>
                        </h4></center><hr>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Effective Date</th>
                                            <th>Sector Name</th>
                                            <th>Sanction Amount</th>
                                            <th>Action</th>
                                            <!-- <th>Download<br> Document</th>
                                            <th>Forward Data</th> -->
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($sanc_details) {
                                            $i = 1;
                                            foreach ($sanc_details as $dt) {
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                echo '<td>' . $dt->effective_date . '</td>';
                                                echo '<td>' . $dt->sector_name . '</td>';
                                                echo '<td>' . $dt->sanction_amt . '</td>';
                                                echo '<td><a href="sanction_amt/edit/' . $dt->ardb_id . '/' . $dt->sector_id . '?dt=' . $dt->effective_date . '" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil fa-lg"></i></a></td>';
                                                echo '</tr>';
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- content-wrapper ends -->
    <script>
        function add() {
            window.location.href = "<?= site_url('ho/sanction_amt/entry'); ?>";
        }
    </script>
    <script>
        function check() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
        // function _edit(pronote_no, memo_no){
        //   // pronote_no = encodeURIComponent(pronote_no);
        //   // memo_no = encodeURIComponent(memo_no);
        //   console.log(pronote_no);
        //   console.log(memo_no);
        //  // location.href = "<?= base_url(); ?>index.php/dc/dc_entry/" + pronote_no + "/" + memo_no;
        // }

    </script>