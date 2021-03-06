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
            "departments" => $this->employee_model->getAllDepartment(),
            "info" => $this->employee_model->getByID($emp_id)
        );

        $this->load->view("employee/form", $data);
    }

    public function editSave($emp_id)
    {
        $arr = array(
            "EMP_FNAME" => $this->input->post("first_name"),
            "EMP_LNAME" => $this->input->post("last_name"),
            "EMP_PHONE" => $this->input->post("phone_num"),
            "EMP_EMAIL" => $this->input->post("email"),
            "EMP_ADDRESS" => $this->input->post("address"),
            "DEP_ID" => $this->input->post("department"),
        );

        $this->employee_model->update($emp_id, $arr);

        redirect("employee/index");
    }    

    public function addForm()
    {
        $data = array(
            "method" => "add",
            "departments" => $this->employee_model->getAllDepartment(),
            "info"=> ""
        );

        $this->load->view("Employee/form", $data);
    }

    public function addSave()
    {
        $arr = array(
            "EMP_FNAME" => $this->input->post("first_name"),
            "EMP_LNAME" => $this->input->post("last_name"),
            "EMP_PHONE" => $this->input->post("phone_num"),
            "EMP_EMAIL" => $this->input->post("email"),
            "EMP_ADDRESS" => $this->input->post("address"),
            "DEP_ID" => $this->input->post("department"),
        );

        $this->employee_model->insert($arr);

        redirect("employee/index");
    }

    public function delete($emp_id)
    {
        $this->employee_model->delete($emp_id);

        redirect("employee/index");
    }
}
?>