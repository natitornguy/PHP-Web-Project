<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amphur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr colspan="4">
                            <form method="get" action="<?=base_url("Employee/index")?>">
                                <a href="<?=base_url("Employee/addForm")?>" class="btn btn-success">Add</a>
                                Total <span style="color:red"><?=count($employees)?></span> Records | Search: <input type="text" name="keyword" value="<?=$keyword?>">
                                <button type="submit">Search</button>
                            </form>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>PHONE NUMBER</th>
                            <th>EMAIL</th>
                            <th>ACTIONS</th>
                        </tr>

                        <?php foreach ($employees as $employee) {?>
                        <tr>
                            <td><?=$employee->EMP_ID?></td>
                            <td><?=$employee->EMP_FNAME?> <?=$employee->EMP_LNAME?></td>
                            <td><?=$employee->EMP_PHONE?></td>
                            <td><?=$employee->EMP_EMAIL?></td>
                            <td>
                                <a href="<?=base_url("Employee/editForm/$employee->EMP_ID")?>" class="btn btn-warning">Edit</a>
                                <a href="<?=base_url("#")?>" class="btn btn-danger" onclick="return confirm('Delete <?=$employee->EMP_FNAME?>?');">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>