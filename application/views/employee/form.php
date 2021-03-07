<?php
if ($method == "edit") {
    $action = "employee/editSave/$info->EMP_ID";
    $str = "Edit";
    $button = "UPDATE";
} else {
    $action = "employee/addSave";
    $str = "Add";
    $button = "Save";
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- header -->

            <!-- body -->
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"><?= $str ?> Profile</h4>
                </div>
                <!-- end of header -->

                <!-- content -->
                <div class="card-body">
                    <form action="<?= base_url($action) ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php $first_name = is_object($info) ? $info->EMP_FNAME : ""; ?>
                                    <label class="bmd-label-floating">Fist Name</label>
                                    <input type="text" id="first_name" name="first_name" value="<?= $first_name ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php $last_name = is_object($info) ? $info->EMP_LNAME : ""; ?>
                                    <label class="bmd-label-floating">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="<?= $last_name ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php $phone = is_object($info) ? $info->EMP_PHONE : ""; ?>
                                    <label class="bmd-label-floating">Phone number</label>
                                    <input type="text" id="phone_num" name="phone_num" value="<?= $phone ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php $email = is_object($info) ? $info->EMP_EMAIL : ""; ?>
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="text" id="email" name="email" value="<?= $email ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php $Address = is_object($info) ? $info->EMP_ADDRESS : ""; ?>
                                    <label class="bmd-label-floating">Adress</label>
                                    <input type="text" id="address" name="address" value="<?= $Address ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Department</label>
                                    <select id="department" name="department" class="form-control">
                                        <?php
                                        foreach ($departments as $department) { ?>
                                            <option value="<?= $department->DEP_ID ?>" <?= is_object($info) ? ($info->DEP_ID == $department->DEP_ID ? "selected" : "") : "" ?>><?= $department->DEP_NAME ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><?= $button ?> Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <!-- end of content -->
            </div>
            <!-- end of body -->
        </div>
    </div>
</div>
