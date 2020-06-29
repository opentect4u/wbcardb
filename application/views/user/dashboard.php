
  
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
  <!-- <script type="text/javascript" src="/assets/js/data-table.js"></script> -->
  <!-- <script type="text/javascript" src="<?php echo base_url("/assets/js/data-table.js")?>"></script> -->
   
    <div class="wraper">      
        <div class="row"> 
            <div class="col-lg-9 col-sm-12">
            <br>
             <h3>ARDB Users' List</h3>
                <br>
            </div>
        </div>
        <div class="col-lg-12 container contant-wraper">    
            <h3>

                <small><a href="<?php echo site_url("Admins/f_user_add");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                <span class="confirm-div" style="float:right; color:green;"></span>

            </h3>

            <table class="table table-bordered table-hover;" id="myTable">

                <thead>

                    <tr>
                    
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>User Id</th>
                        <th>Option</th>

                    </tr>

                </thead>

                <tbody> 

                    <?php 
                    
                    if($user_dtls) {

                        $i = 0;
                        
                            foreach($user_dtls as $u_dtls) {

                    ?>

                            <tr>

                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $u_dtls->user_name; ?></td>
                                <td><?php if($u_dtls->user_type == 'A'){
                                            echo '<span class="badge badge-success">Admin</span>';
                                          }
                                          elseif ($u_dtls->user_type == 'M') {
                                            echo '<span class="badge badge-warning">HO User</span>';
                                          }else {
                                            echo '<span class="badge badge-dark">BR. User</span>';
                                          }
                                            ?>
                                </td>
                                <td><?php echo $u_dtls->user_id; ?></td>
                                
                                <td>
                                
                                    <a href="user/edit?user_id=<?php echo $u_dtls->user_id; ?>" 
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Edit"
                                    >

                                    <i class="mdi mdi-pencil-box-outline"></i></a>
                                        
                                    </a>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                   <!-- <button 
                                        type="button"
                                        class="delete"
                                        id="<?php //echo $u_dtls->user_id; ?>"
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Delete"
                                        
                                    >

                                        <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>

                                    </button> -->
                                    
                                </td>

                            </tr>

                    <?php
                            
                            }

                        }

                        else {

                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                        }
                    ?>
                
                </tbody>

                <tfoot>

                    <tr>
                    
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>User Id</th>
                        <th>Option</th>

                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('admin/user/delete?user_id="+id+"');?>";

            }
            
        });

    });

</script>

<script>
   
    $(document).ready(function() {

    $('.confirm-div').hide();

    <?php if($this->session->flashdata('msg')){ ?>

    $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

    });

    <?php } ?>
</script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>
