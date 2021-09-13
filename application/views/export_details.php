<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WBSCARDB</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form name="export_data" id="export_data" method="post" action="<?php echo base_url("index.php/export/export_csv"); ?>">
            <div class="container">
                <h3>Friday Return</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           
                            <th>ARDB_ID</th>
                            <th>BR_ID</th> 
                            <th>SUBMIT_DT</th>                       
                            <th>RD</th>
                            <th>FD</th>
                            <th>FLEXI</th>
                            <th>MIS</th>
                            <th>OTH_DEP</th>
                            <th>IBSD</th>
                            <th>TOT_DEP_MOBILISD</th>
                            <th>CASH_IN_HND</th>
                            <th>OTH_BNK</th>
                            <th>IBSD_LOAN</th>
                            <th>DEP_LOAN</th>
                            <th>REMMIT_WBSCARDB</th>
                            <th>REMMIT_WBSCARDB_EXCESS</th>
                            <th>TOT_DEPLOY_FUND</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($export_details) && !empty($export_details)) {
                            foreach ($export_details as $export) {
                                ?>
                                <tr>
                                    <td><?php echo $export->ARDB_ID; ?></td>
                                    <td><?php echo $export->BR_ID; ?></td>
                                    <td><?php echo $export->SUBMIT_DT; ?></td>
                                    <td><?php echo $export->RD; ?></td>
                                    <td><?php echo $export->FD; ?></td>
                                    <td><?php echo $export->FLEXI; ?></td>
                                    <td><?php echo $export->MIS; ?></td>
                                    <td><?php echo $export->OTH_DEP; ?></td>
                                    <td><?php echo $export->IBSD; ?></td>
                                    <td><?php echo $export->TOT_DEP_MOBILISD; ?></td>
                                    <td><?php echo $export->CASH_IN_HND; ?></td>
                                    <td><?php echo $export->OTH_BNK; ?></td>
                                    <td><?php echo $export->IBSD_LOAN; ?></td>
                                    <td><?php echo $export->DEP_LOAN; ?></td>
                                    <td><?php echo $export->REMMIT_WBSCARDB; ?></td>
                                    <td><?php echo $export->REMMIT_WBSCARDB_EXCESS; ?></td>
                                    <td><?php echo $export->TOT_DEPLOY_FUND; ?></td>

                                    <td>
                                 </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary pull-right">Download</button>
            </div>
        </form>
    </body>
</html>
