<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php
    if ($method == "edit") {
        $action = "employee/editSave/$info->EMP_ID";
        $str = "Edit form";
    } else {
        $action = "employee/addSave";
        $str = "Add form";
    }
    ?>
    <title><?= $str ?></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url($action) ?>" method="post">
                    <h1>Employee <?= $str ?></h1>
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <?php
                            $first_name = is_object($info) ? $info->EMP_FNAME : "";
                            ?>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $first_name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <?php
                            $last_name = is_object($info) ? $info->EMP_LNAME : "";
                            ?>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $last_name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_num" class="col-sm-2 col-form-label">Phone number</label>
                        <div class="col-sm-10">
                            <?php
                            $phone = is_object($info) ? $info->EMP_PHONE : "";
                            ?>
                            <input type="text" class="form-control" id="phone_num" name="phone_num" value="<?= $phone ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <?php
                            $email = is_object($info) ? $info->EMP_EMAIL : "";
                            ?>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <?php
                            $Address = is_object($info) ? $info->EMP_ADDRESS : "";
                            ?>
                            <textarea class="form-control" name="address" style="resize:none"><?=$Address?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="department" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                            <?php
                                $dep = is_object($info) ? $info->DEP_ID : "";
                            ?>
                            <select class="form-control" name="department" id="department">
                                <?php
                                    foreach($departments As $department) { ?>
                                        <option value="<?=$department->DEP_ID?>" <?=is_object($info) ? ($info->DEP_ID == $department->DEP_ID ? "selected": "") : "" ?>><?=$department->DEP_NAME?></option>
                                <?php }?>
                            </select>
                        </div>
                   </div>
                    <div class="form-group row">
                        <label for="amphur_name" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>