<?php
class user extends CI_Controller{
    function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
    public function index()
	{
		
	}
    public function login(){
        $this->form_validation->set_rules(
            "username",
            "ชื่อผู้ใช้",
            "required|valid_email",
            array(
                'required' => 'กรุณากรอก %s',
                "alpha_numeric" => "%s อนุญาตเป็นตัวเลขและภาษาอังกฤษเท่านั้น"
            )
        );
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required', array('required' => 'กรุณากรอก %s'));
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata("flash_errors", validation_errors());
            $this->load->view("./login.php");
        } else {
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $password = md5($password);
            // var_dump($user);
            // exit();
            if ($user = $this->user_model->getuser($username, $password)) {
                // echo $this->db->last_query();
                // echo "Login OK";
                // print_r($user);
                // var_dump($data);
                // exit();
                // $sess_data = array(
                //     "ss_emp_id" => $data->EMP_ID,
                //     "ss_role_id" => $data->ROLE_ID
                // );
                // $this->session->set_userdata($sess_data);
                $sess_data = array(
            		'ss_emp_id'=> $user->EMP_ID,
            		'ss_role_id'=> $user->ROLE_ID,
            	);
                $this->session->set_userdata($sess_data);
            	redirect("LeaveRequest/index");
                // foreach ($user as $users) {
                //     $data['emp_id'] = $users->EMP_ID;
                //     $data['leave'] = $this->leave_model->getAllbyID($users->EMP_ID);
                // }
                //     $data['method'] = "add";
                

                // $this->load->view("leave/show", $data);
                // redirect("Home/leaveform");
            } else {
                $this->session->set_flashdata("flash_errors", "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง");
                $this->load->view("login");
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();

		redirect("user/login");
    }
}
?>