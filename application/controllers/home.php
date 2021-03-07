<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["content"] = "LeaveRequest";
        $this->load->view("layout/main", $data);
    }
}
?>