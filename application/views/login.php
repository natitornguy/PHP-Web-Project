<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบ</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url("fonts/material-icon/css/material-design-iconic-font.min.css") ?>">
    <!-- Main css -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="<?= base_url("assets/css/material-dashboard.css?v=2.1.2") ?>" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <style>
    .center-screen {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* align-items: center; */
        /* text-align: center; */
        min-height: 100vh;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="container center-screen">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">เข้าสู่ระบบ</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <figure><img src="<?= base_url("images/googlecom.jpg") ?>" alt="sign up image" width="100%"></figure>
                            </div>
                            <div class="col-lg-8 col-12">
                                <form method="POST" id="login-form" action="<?= base_url("user/login") ?>">
                                    <div class="form-group mt-3">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="admin@gmail.com"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน" value="admin"/>
                                    </div>
                                    <div class="form-group form-button">
                                        <button type="submit" name="signin" id="signin" class="btn btn-primary">เข้าสู่ระบบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if ($this->session->flashdata('flash_errors')) { ?>
                            <div class="col-12 col-sm-12">
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span>
                                        <?= $this->session->flashdata('flash_errors') ?>
                                    </span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>