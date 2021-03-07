<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["content"] = "leaveform.php";
        $this->load->view("layout/main", $data);
    }
}
?>