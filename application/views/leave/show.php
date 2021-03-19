    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <?php if ($this->session->flashdata('flash_success')) { ?>
                            <div class="col-12 col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span>
                                        <?= $this->session->flashdata('flash_success') ?>
                                    </span>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('ss_role_id') == 2) { ?>
                            <a href="<?= base_url("LeaveRequest/leaveform/$emp_id") ?>" class="btn btn-primary btn-round">Create Request</a>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th class="text-left"> ID</th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Reason </th>
                                    <th class="text-center"> From </th>
                                    <th class="text-center"> To </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Actions </th>
                                </thead>
                                <tbody>
                                    <?php if ($this->session->userdata('ss_role_id') == 1) { ?>
                                        <?php foreach ($leave as $leaves) { ?>
                                            <tr>
                                                <td class="text-left"><?= $leaves->LEAVE_ID ?></td>
                                                <td class="text-center"><?= $leaves->EMP_FNAME ?> <?= $leaves->EMP_LNAME ?></td>
                                                <td class="text-center"><?= $leaves->LEAVE_REASON ?></td>
                                                <td class="text-center"><?= $leaves->LEAVE_FROM ?></td>
                                                <td class="text-center"><?= $leaves->LEAVE_TO ?></td>
                                                <td class="text-center"><?= $leaves->MAS_LEAVE_NAME ?></td>
                                                <?php if ($leaves->LEAVE_STATUS != 2 && $leaves->LEAVE_STATUS != 3) { ?>
                                                    <td class="text-center">
                                                        <a type="button" rel="tooltip" href="<?= base_url("LeaveRequest/approved/$leaves->LEAVE_ID/2") ?>" class="btn btn-success btn-round"><i class="material-icons">thumb_up_alt</i></a>
                                                        <a type="button" rel="tooltip" href="<?= base_url("LeaveRequest/declined/$leaves->LEAVE_ID/3") ?>" class="btn btn-warning btn-round"><i class="material-icons">thumb_down_alt</i></a>
                                                        <a type="button" rel="tooltip" href="<?= base_url("LeaveRequest/deleteleave/$leaves->LEAVE_ID") ?>" class="btn btn-danger btn-round" onclick="return confirm('Delete this request? [ID:<?= $leaves->LEAVE_ID ?>]?');"><i class="material-icons">clear</i></a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-center"> <a href="<?= base_url("LeaveRequest/deleteleave/$leaves->LEAVE_ID") ?>" class="btn btn-danger btn-round" onclick="return confirm('Delete this request? [ID:<?= $leaves->LEAVE_ID ?>]?');"><i class="material-icons">clear</i></a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php foreach ($leave as $leaves) { ?>
                                            <tr>
                                                <td class="text-center"><?= $leaves->LEAVE_ID ?></td>
                                                <td class="text-center"><?= $leaves->EMP_FNAME ?> <?= $leaves->EMP_LNAME ?></td>
                                                <td class="text-center"><?= $leaves->LEAVE_REASON ?></td>
                                                <td class="text-center"><?= $leaves->LEAVE_FROM ?></td>
                                                <td class="text-center"><?= $leaves->LEAVE_TO ?></td>
                                                <td class="text-center"><?= $leaves->MAS_LEAVE_NAME ?></td>
                                                <?php if ($leaves->LEAVE_STATUS != 2 && $leaves->LEAVE_STATUS != 3) { ?>
                                                    <td class="text-center">
                                                        <a type="button" rel="tooltip" class="btn btn-warning btn-round" href="<?= base_url("LeaveRequest/editleave/$leaves->LEAVE_ID/$emp_id") ?>" disable><i class="material-icons">edit</i></a>
                                                        <a type="button" rel="tooltip" href="<?= base_url("LeaveRequest/deleteleave/$leaves->LEAVE_ID") ?>" class="btn btn-danger btn-round" onclick="return confirm('Delete <?= $leaves->LEAVE_ID ?>?');"><i class="material-icons">clear</i></a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>