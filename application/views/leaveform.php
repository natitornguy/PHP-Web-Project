<!doctype html>
<html lang="en">

<head>
    <title>Leave System!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="<?= base_url("assets/css/material-dashboard.css?v=2.1.2") ?>" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="<?= base_url("home/index") ?>" class="simple-text logo-mini">
                    Leave System
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="#0">
                            <i class="material-icons">dashboard</i>
                            <p>Leave</p>
                        </a>
                    </li>
                    <!-- your sidebar here -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <p class="navbar-brand">Leave</p>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">notifications</i> Notifications
                                </a>
                            </li>
                            <!-- your navbar here -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
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
</body>
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



</html>