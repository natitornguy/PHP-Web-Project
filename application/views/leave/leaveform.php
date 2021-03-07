<div class="wrapper ">    
    <div class="main-panel">        
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                <div class="container">
                    <!-- <div class="form-group"> -->
                    <h2>แบบฟอร์มขอลา</h2>
                    <p class="subhead">กรุณากรอกข้อมูลให้ครบถ้วน</p>
                    <!-- </div> -->
                    <div class="container">
                        <form method="post" action="<?= base_url("LeaveRequest/addleavesave/") ?> ">
                            <div class="row">

                                <div class="col-6">
                                    <p>หยุดวันที่</p>
                                </div>
                                <div class="col-6">
                                    <p>ถึงวันที่</p>
                                </div>
                            </div>
                            <?php
                            $startdate = is_object($info) ? $info->LEAVE_FROM : "";
                            $enddate = is_object($info) ? $info->LEAVE_TO : "";
                            ?>
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" id="startDate" name="startDate" width="276" required value="<?= $startdate ?>" />
                                </div>
                                <div class="col-6">
                                    <input type="date" id="endDate" name="endDate" width="276" required value="<?= $enddate ?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p>เหตุผลขอลาหยุด</p>
                                </div>
                            </div>
                            <?php
                            $reason = is_object($info) ? $info->LEAVE_REASON : "";
                            ?>
                            <div class="row">
                                <div class="col-6">
                                    <textarea class="form-control" id="reason" name="reason" rows="4" cols="50" required><?= $reason ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" id="method" name="method" value="<?= $method ?>">
                            <input type="hidden" id="leaveID" name="leaveID" value="<?= is_object($info) ? $info->LEAVE_ID : "" ?>">
                            <div class="row">
                                <div class="col-12">
                                    <button id="btnSubmit" name="btnSubmit" type="submit" class="btn btn-primary">
                                        ยืนยัน
                                    </button>
                                    <button type="reset" id="btn_reset" name="btn_reset" class="btn btn-secondary">
                                        ล้าง
                                    </button>
                                    <a id="btn_cancel" name="btn_cancel" class="btn btn-danger" href="<?= base_url("LeaveRequest/index") ?>">
                                        ยกเลิก
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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