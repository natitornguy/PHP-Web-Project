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
        $data["keyword"] = $keyword;
        $data["employees"] = $this->employee_model->getAll($keyword);
        $data["content"] = "employee/show";
        $data["header"] = "Manage Employee";
        $this->load->view("layout/main", $data);
    }

    public function editForm($emp_id)
    {
        $data["method"] = "edit";
        $data["departments"] = $this->employee_model->getAllDepartment();
        $data["info"] = $this->employee_model->getByID($emp_id);
        $data["content"] = "employee/form";
        $data["header"] = "User Profile";

        $this->load->view("layout/main", $data);
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
        $data["method"] = "add";
        $data["departments"] = $this->employee_model->getAllDepartment();
        $data["info"] = "";
        $data["content"] = "employee/form";
        $data["header"] = "User Profile";

        $this->load->view("layout/main", $data);
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
        $this->generateUser($email, $phone_num, $id, $department);
        redirect("employee/index");
    }

    public function delete($emp_id)
    {
        $this->employee_model->delete($emp_id);

        redirect("employee/index");
    }

    public function generateUser($id, $password, $emp_id, $dep_id)
    {
        $role = $dep_id == 1 ? 1 : 2;

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
