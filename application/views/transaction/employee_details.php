<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Listing</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form name="export_data" id="export_data" method="post" action="<?php echo base_url("employee/export_csv"); ?>">
            <div class="container">
                <h2>Employee Listing</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>                        
                            <th>Email</th>
                            <th>Age</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($employee_details) && !empty($employee_details)) {
                            foreach ($employee_details as $employee) {
                                ?>
                                <tr>
                                    <td><?php echo $employee->id; ?></td>
                                    <td><?php echo $employee->first_name; ?></td>
                                    <td><?php echo $employee->last_name; ?></td>
                                    <td><?php echo $employee->email; ?></td>
                                    <td><?php echo $employee->age; ?></td>
                                    <td><?php
                                        if ($employee->status == "A")
                                            echo "Active";
                                        else
                                            "Inactive";
                                        ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary pull-right">Export</button>
            </div>
        </form>
    </body>
</html>
