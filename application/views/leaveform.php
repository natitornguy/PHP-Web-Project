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
                        <form method="post" action="<?= base_url("home/addleave") ?> ">
                            <div class="row">
                                <div class="col-6">
                                    <p>หยุดวันที่</p>
                                </div>
                                <div class="col-6">
                                    <p>ถึงวันที่</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" id="startDate" name="startDate" width="276" required />
                                </div>
                                <div class="col-6">
                                    <input type="date" id="endDate" name="endDate" width="276" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p>เหตุผลขอลาหยุด</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <textarea class="form-control" id="reason" name="reason" rows="4" cols="50" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button id="btnSubmit" name="btnSubmit" type="submit" class="btn btn-primary">
                                        ยืนยัน
                                    </button>
                                    <button type="reset" id="btn_reset" name="btn_reset" class="btn btn-secondary">
                                        ล้าง
                                    </button>
                                    <a id="btn_cancel" name="btn_cancel" class="btn btn-danger" href="<?= base_url("home/index") ?>">
                                        ยกเลิก
                                    </a>
                                </div>
                            </div>
                        </form>




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