<?php
class LeaveRequest extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('user_model');
        $this->load->model('leave_model');
    }
    public function index(){
        $this->load->view('leaveform.php');
        // test employee model load data pass
        // $data = $this->employee_model->getAll();
        // var_dump($data);

        //test insert new employee in database pass
        // $params['EMP_FNAME'] = 'chayapol';
        // $params['EMP_LNAME'] = 'chuangkrud';
        // $params['EMP_PHONE'] = '0825904216';
        // $params['EMP_EMAIL'] = 'chayapol44001@gmail.com';
        // $params['EMP_ADDRESS'] = '66/79';
        // $params['DEP_ID'] = 2;

        // $this->employee_model->insert($params);
        // $data = $this->employee_model->getAll();
        // var_dump($data);

        //test update employee in database pass
        // $params['EMP_FNAME'] = 'chayapol';
        // $params['EMP_LNAME'] = 'chuangkrud';
        // $params['EMP_PHONE'] = '0809705049';
        // $params['EMP_EMAIL'] = 'chayapol44001@gmail.com';
        // $params['EMP_ADDRESS'] = '66/9';
        // $params['DEP_ID'] = 1;

        // $this->employee_model->update($params,2);
        // $data = $this->employee_model->getAll();
        // var_dump($data);

        //test delete employee in database pass
        // $this->employee_model->delete(2);
        // $data = $this->employee_model->getAll();
        // var_dump($data);



        // test user model load data pass
        // $data = $this->user_model->getuser('admin','admin');
        // var_dump($data);
        // if (count($data) != 0){
        //     echo "Have";
        // }
        // else{
        //     echo "Not Have This user";
        // }
        
        // test leave model load data at emp_id pass
        // $data = $this->leave_model->getbyEmp_ID(2);
        // var_dump($data);

        // test dep model load data pass
        // $data = $this->department_model->getAll();
        // var_dump($data);
    }
    public function addleave(){
        $emp_id = 1;
        $leave_sts = 1;
        $start = $this->input->post('startDate');
        $end = $this->input->post('endDate');
        // $startDate = date("Y-m-d");
        // $endDate = date("Y-m-d");
        $reason = $this->input->post('reason');
        
        $params['emp_id'] = $emp_id;
        $params['leave_status'] = $leave_sts;
        // $params['leave_from'] = date_format($start,"Y-m-d");
        // $params['leave_to'] = date_format($end,"Y-m-d");
        $params['leave_from'] = $start;
        $params['leave_to'] = $end;
        $params['leave_reason'] = $reason;
        // print_r($params);
        $this->leave_model->insert($params);

        $this->session->set_flashdata('flash_success','ข้อมูลถูกบันทึกแล้ว');
        redirect("home/index");
    }
}
