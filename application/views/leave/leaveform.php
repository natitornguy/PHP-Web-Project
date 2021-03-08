<div class="wrapper ">
    <div class="main-panel">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">แบบฟอร์มขอลา</h4>
                    <p class="card-category">กรุณากรอกข้อมูลให้ครบถ้วน</p>
                </div>
                <!-- end of header -->

                <!-- content -->
                <div class="card-body">
                    <form method="post" action="<?= base_url("LeaveRequest/addleavesave/") ?>">
                        <div class="row">
                            <?php
                            $startdate = is_object($info) ? $info->LEAVE_FROM : "";
                            $enddate = is_object($info) ? $info->LEAVE_TO : "";
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating mr-2">หยุดวันที่</label>
                                    <input type="date" id="startDate" name="startDate" width="276" required value="<?= $startdate ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating mr-2">ถึงวันที่</label>
                                    <input type="date" id="endDate" name="endDate" width="276" required value="<?= $enddate ?>" />
                                </div>
                            </div>
                        </div>
                        <?php
                        $reason = is_object($info) ? $info->LEAVE_REASON : "";
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">เหตุผลขอลาหยุด</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="4" cols="50" required><?= $reason ?></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="method" name="method" value="<?= $method ?>">
                        <input type="hidden" id="leaveID" name="leaveID" value="<?= is_object($info) ? $info->LEAVE_ID : "" ?>">
                        <div class="row mt-2">
                            <div class="col-md-3"></div>
                            <button type="submit" class="btn btn-success pull-right">ยืนยัน</button>
                            <button type="reset" class="btn btn-default pull-right ml-2">เคลียร์</button>
                            <a id="btn_cancel" name="btn_cancel" href="<?= base_url("LeaveRequest/index") ?>" class="btn btn-danger pull-right ml-2">ยกเลิก</a>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <!-- end of content -->
            </div>
            <!-- end of body -->
        </div>
    </div>
</div>
</div>
<script>
    document.getElementById("startDate").setAttribute("min", getDateString(new Date()));

    $("#startDate").change(function() {
        document.getElementById("endDate").setAttribute("min", document.getElementById("startDate").value);

        var startDate = new Date(Date.parse(document.getElementById("startDate").value));

        document.getElementById("endDate").setAttribute("max", getDateString(new Date(startDate.setDate(startDate.getDate() + 5))));
    });

    function getDateString(dateObj) {
        var dd = dateObj.getDate();
        var mm = dateObj.getMonth() + 1;
        var yyyy = dateObj.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        return yyyy + '-' + mm + '-' + dd;
    }
</script>