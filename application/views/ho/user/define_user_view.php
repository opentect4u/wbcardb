<?php
$ardb_ho_details = json_decode($ardb_ho_details);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">   <small><a href="<?php echo site_url("ho/Admins/f_define_users_edit"); ?>?id=" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span></h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>   <tr>

                                        <th>Sl. No.</th>
                                        <th>Name</th>
                                        <th>No of Users</th>
                                        <th>No of Approvers</th>
                                        <th>Option</th>

                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($ardb_ho_details) {
                                        $i = 0;
                                        foreach ($ardb_ho_details as $details) {
                                            ?>
                                            <tr>

                                                <td><?= ++$i; ?></td>
                                                <td><?= $details->name; ?></td>
                                                <td><?= $details->no_of_users; ?></td>
                                                <td><?= $details->no_of_approvers; ?></td>

                                                <td>
                                                    <a href="f_define_users_edit?id=<?= $details->id; ?>"
                                                       data-toggle="tooltip"
                                                       data-placement="bottom"
                                                       title="Edit">

                                                        <i class="mdi mdi-pencil-box-outline"></i></a>

                                                    </a>

                                                </td>

                                            </tr>

                                            <?php
                                        }
                                    } else {

                                        echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";
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
    <!-- content-wrapper ends -->