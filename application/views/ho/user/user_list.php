<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">   <small><a href="<?php echo site_url("ho/Admins/f_user_add"); ?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span></h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Name</th>
                                        <th>User Type</th>
                                        <th>User Id</th>
                                        <!--<th>Option</th>-->
                                        <th>Reject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($user_dtls) {
                                        $i = 0;
                                        foreach ($user_dtls as $u_dtls) {
                                            ?>
                                            <tr>

                                                <td><?php echo ++$i; ?></td>
                                                <td><?php echo $u_dtls->user_name; ?></td>
                                                <td><?php
                                                    if ($u_dtls->user_status == 'A') {
                                                        if ($u_dtls->user_type == 'A') {
                                                            echo '<span class="p-2 mb-2 text-white bg-success">Admin</span>';
                                                        } elseif ($u_dtls->user_type == 'M') {
                                                            echo '<span class="p-2 mb-2 text-white bg-warning">HO User</span>';
                                                        } elseif ($u_dtls->user_type == 'U') {
                                                            echo '<span class="p-2 mb-2 text-white bg-dark">BR. User</span>';
                                                        } elseif ($u_dtls->user_type == 'P') {
                                                            echo '<span class="p-2 mb-2 text-white bg-dark">BR. Approver L1</span>';
                                                        } elseif ($u_dtls->user_type == 'V') {
                                                            echo '<span class="p-2 mb-2 text-white bg-dark">BR. Approver L2</span>';
                                                        } elseif ($u_dtls->user_type == 'R') {
                                                            echo '<span class="p-2 mb-2 text-white bg-dark">HO Document Receiver</span>';
                                                        }
                                                    } else {
                                                        echo '<span class="p-2 mb-2 text-white bg-danger">Deactivated</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $u_dtls->user_id; ?></td>

                        <!--                                                <td>

                                                                            <a href="admins/user_edit?user_id=<?php //echo $u_dtls->user_id;    ?>"
                                                                               data-toggle="tooltip"
                                                                               data-placement="bottom"
                                                                               title="Edit"
                                                                               >

                                                                                <i class="mdi mdi-pencil-box-outline"></i></a>

                                                                            </a>

                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->

                                                <!-- <button
                                                     type="button"
                                                     class="delete"
                                                     id="<?php //echo $u_dtls->user_id;              ?>"
                                                     data-toggle="tooltip"
                                                     data-placement="bottom"
                                                     title="Delete"

                                                 >

                                                     <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>

                                                 </button> -->

                                                <!--</td>-->
                                                <td>
                                                    <button type="button" class="delete" id="deactive" data-toggle="tooltip" data-placement="bottom" title="Deactive" onclick="deactive('<?php echo $u_dtls->user_id; ?>')">
                                                        <i class="fa fa-trash-o" style="color: #bd2130"></i>
                                                    </button>
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

    <script>
        function deactive(user_id) {
            window.location.href = "<?= site_url() ?>/ho/admins/deactive_user?user_id=" + user_id;
        }
    </script>