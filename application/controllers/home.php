<?php
class home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('user_model');
        $this->load->model('leave_model');
        $this->load->model('department_model');
    }
    public function index(){
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
}
