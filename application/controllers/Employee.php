<?php
class Employee extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("employee_model");
    }

    public function index()
    {
        $keyword = $this->input->get("keyword");
        $data = array(
            "keyword" => $keyword,
            "employees" => $this->employee_model->getAll($keyword)
        );
        $this->load->view("employee/show", $data);
    }

    public function editForm($emp_id)
    {
        $data = array(
            "method" => "edit",
            "emp_id" => $emp_id
        );

        $this->load->view("employee/form", $data);
    }
}
?>