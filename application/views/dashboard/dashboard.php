<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-white">
                  <div class="card-body d-flex align-items-center justify-content-between">
                    <!-- <h4 class="mt-1 mb-1">Hi, Welcomeback!</h4> -->
                    <h4 class="mt-1 mb-1" style="color:#4CAF50"><?php echo("".$_SESSION['user_name']);?></h4>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            
         <div class="col-md-12 grid-margin">
             <div class="card bg-white">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><b>Sl.No</b></th>
                          <th><b>Report</b></th>
                          <th><b>last return Date</b></th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Friday Return</td>
                          <td><?php echo date('d/m/Y',strtotime($friday->Max_Date));?></td>
                       </tr>
                        <tr>
                          <td>2</td>
                          <td>Fortnightly Investment</td>
                          <td><?php echo date('d/m/Y',strtotime($investment->Max_Date));?></td>
                       </tr>
                        <tr>
                          <td>3</td>
                          <td>Borrower Classification</td>
                          <td><?php echo date('d/m/Y',strtotime($borrower->Max_Date));?></td>
                       </tr>
                         <tr>
                          <td>4</td>
                          <td>Fortnightly Return</td>
                          <td><?php echo date('d/m/Y',strtotime($forthnt->Max_Date));?></td>
                       </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
               </div>
          </div>
        </div>