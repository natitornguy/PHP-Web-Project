<div class="sidebar" data-color="primary" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="<?= base_url("LeaveRequest") ?>" class="simple-text logo-normal">
            Leave Request System
        </a>
    </div>
    
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("LeaveRequest") ?>">
                    <i class="material-icons">event_busy</i>
                    <p>Leave Request</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
        <?php if ($this->session->userdata("ss_role_id") == 1){?>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("Employee") ?>">
                    <i class="material-icons">person</i>
                    <p>Manage Employees</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
        <?php } ?>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("user/logout") ?>">
                    <i class="material-icons">logout</i>
                    <p>Logout</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
    </div>
</div>