<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
          <div class="card-body msg">
          </div>
           <div class="card-body">
             <a style="float: Right;"
                     class ="btn btn-info d-none d-md-block"
                     href ="<?php echo site_url('Masters/addardbbr'); ?>">Add New ARDB Branch</a>
           </div>
            <div class="card-body">
              <h3>List of ARDB Branches</h3>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>ARDB Name</th>
                            <th>Branch Name</th>
                            <th>Address</th>
                            <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                            foreach($ardb as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->ho_name; ?></td>
                            <td><?php echo $row->br_name; ?></td>
                            <td><?php echo $row->address; ?></td>
                            <td>
                              <a href="<?php echo site_url('Masters/editardbbr?id='.$row->id.''); ?>" title="Edit"><i class="mdi mdi-pencil-box-outline"></i></a>
                            </td>

                        </tr>
                         <?php 
                          $i++;
                          } 
                        ?>
                      </tbody>
                    </table>