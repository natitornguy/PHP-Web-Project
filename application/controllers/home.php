<?php
class home extends CI_Controller{
    function __construct()
    {
        $this->load->model('employee_model');
        $this->load->model('user_model');
        $this->load->model('leave_model');
        $this->load->model('department_model');
    }
    public function index(){
        
    }
}
?>