<?php
class LeaveRequest extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('user_model');
        $this->load->model('leave_model');
    }
    public function index()
    {
        // var_dump($this->session->userdata('ss_role_id'));
        // exit();
        if ($this->session->userdata('ss_role_id') == 1) {
            $data['leave'] = $this->leave_model->getAll();
        } else {
            $data['leave'] = $this->leave_model->getAllbyID($this->session->userdata('ss_emp_id'));
        }
        $data['emp_id'] = $this->session->userdata('ss_emp_id');
        $data['content'] = "leave/show";
        $data["header"] = "Leave requests";

        $this->load->view("layout/main", $data);
        // redirect("Home/leaveform");
    }

    public function leaveform()
    {
        $emp_id = $this->session->userdata('ss_emp_id');
        $data["method"] = "add";
        $data["leave"] = $this->leave_model->getAllbyID($emp_id);
        $data["info"] = "";
        $data["emp_id"] =$emp_id;
        $data['content'] = "leave/leaveform";
        $data["header"] = "Leave requests form";
        // var_dump($data["leave"]);
        // exit();
        $this->load->view("layout/main", $data);
    }

    public function addleavesave()
    {
        $emp_id = $this->session->userdata('ss_emp_id');
        $leave_sts = 1;
        $start = $this->input->post('startDate');
        $end = $this->input->post('endDate');
        $leave_id = $this->input->post('leaveID');
        // $startDate = date("Y-m-d");
        // $endDate = date("Y-m-d");
        $reason = $this->input->post('reason');
        $method = $this->input->post('method');

        $params['emp_id'] = $emp_id;
        $params['leave_status'] = $leave_sts;
        // $params['leave_from'] = date_format($start,"Y-m-d");
        // $params['leave_to'] = date_format($end,"Y-m-d");
        $params['leave_from'] = $start;
        $params['leave_to'] = $end;
        $params['leave_reason'] = $reason;

        if ($method == "edit") {
            $this->leave_model->update($params, $leave_id);

            $this->session->set_flashdata('flash_success', 'ข้อมูลถูกบันทึกแล้ว');
            redirect("LeaveRequest/");
        } else if ($method == "add") {
            $this->leave_model->insert($params);

            $this->session->set_flashdata('flash_success', 'ข้อมูลถูกบันทึกแล้ว');
            redirect("LeaveRequest");
        }
    }
    public function editleave($leave_id, $emp_id)
    {
        $leaves = $this->leave_model->getbyID($leave_id);

        $data['leaves'] = $leaves;
        $data['method'] = "edit";
        $data["info"] = $this->leave_model->getbyID($leave_id);
        $data["content"] = "leave/leaveform";
        $data["header"] = "Edit request";

        //$data['method'] = "edit";			
        //$data["content"] = 'amphur/form';
        $this->load->view("layout/main", $data);
    }


    public function deleteleave($leave_id)
    {
        $this->session->set_flashdata('flash_success', 'ข้อมูลถูกลบแล้วไม่สามารถย้อนกลับได้อีก');
        $this->leave_model->delete($leave_id);

        redirect("LeaveRequest");
    }
    public function approved($leave_id, $status)
    {
        // var_dump($leave_id,$status);
        $params['leave_status'] = intval($status);
        $this->leave_model->updatestatus($params, intval($leave_id));
        $this->session->set_flashdata('flash_success', 'การลาถูกอนุมัติเรียร้อย');
        redirect("LeaveRequest");
    }
    public function declined($leave_id, $status)
    {
        // var_dump($leave_id,$status);
        $params['leave_status'] = intval($status);
        $this->leave_model->updatestatus($params, intval($leave_id));
        $this->session->set_flashdata('flash_success', 'ปฏิเสธการลา');
        redirect("LeaveRequest");
    }
}
