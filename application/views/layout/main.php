<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view("layout/header-css") ?>
</head>

<body>
    <div class="wrapper ">
        <!-- left-menu -->
        <?php $this->load->view("layout/menu-left") ?>

        <div class="main-panel">

            <!-- nav-bar -->
            <?php $this->load->view("layout/menu-top") ?>

            <div class="content">
                <?php $this->load->view($content) ?>
            </div>
            <?php $this->load->view("layout/footer") ?>
        </div>
    </div>
    
    <?php $this->load->view("layout/footer-js") ?>
</body>

</html>