<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
</head>

<body>
    <?$header = "Manage Employee"?>
    <?php $this->load->view("layout/menu-top", $header) ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form method="get" action="<?= base_url("Employee/index") ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?= base_url("Employee/addForm") ?>" class="btn btn-primary btn-round float-left">Add</a>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Search</label>
                                        <input type="text" id="keyword" name="keyword" class="form-control" style="background-color: white;" value="<?= $keyword ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group float-right">
                                        Total <span></span><?= count($employees) ?></span> Records
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th class="text-left"> ID</th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Phone Number </th>
                                    <th class="text-center"> Email </th>
                                    <th class="text-center"> Department </th>
                                    <th class="text-center"> Actions </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($employees as $employee) { ?>
                                        <tr>
                                            <td class="text-left"><?= $employee->EMP_ID ?></td>
                                            <td class="text-center"><?= $employee->EMP_FNAME ?> <?= $employee->EMP_LNAME ?></td>
                                            <td class="text-center"><?= $employee->EMP_PHONE ?></td>
                                            <td class="text-center"><?= $employee->EMP_EMAIL ?></td>
                                            <td class="text-center"><?= $employee->DEP_NAME ?></td>
                                            <td class="text-center">
                                                <a type="button" rel="tooltip" class="btn btn-success btn-round" href="<?= base_url("Employee/editForm/$employee->EMP_ID") ?>">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a type="button" rel="tooltip" class="btn btn-danger btn-round" href="<?= base_url("Employee/delete/$employee->EMP_ID") ?>" onclick="return confirm('Delete <?= $employee->EMP_FNAME ?>?');">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>