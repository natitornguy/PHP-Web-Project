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
        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        $phone_num = $this->input->post("phone_num");
        $email = $this->input->post("email");
        $address = $this->input->post("address");
        $department = $this->input->post("department");

        $arr = array(
            "EMP_FNAME" => $first_name,
            "EMP_LNAME" => $last_name,
            "EMP_PHONE" => $phone_num,
            "EMP_EMAIL" => $email,
            "EMP_ADDRESS" => $address,
            "DEP_ID" => $department
        );

        $id = $this->employee_model->insert($arr);
        $this->generateUser($email,$phone_num,$id,$department);
        redirect("employee/index");
    }

    public function delete($emp_id)
    {
        $this->employee_model->delete($emp_id);

        redirect("employee/index");
    }

    public function generateUser($id,$password,$emp_id,$dep_id)
    {
        $role = $dep_id == 1? 1 : 2;

        $arr = array(
            "USERNAME" => $id,
            "PASSWORD" => md5($password),
            "EMP_ID" => $emp_id,
            "ROLE_ID" => $role
        );

        $this->employee_model->generateUserPassword($arr);
        redirect("employee/index");
    }
}
?>