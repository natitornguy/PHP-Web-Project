<?php 

class Checklogin 
{
	private $ci ;
    
    
    public function __construct(){

       $this->ci = & get_instance();
        
    }

	public function check()
	{
		$methodname = $this->ci->router->method;
		if($this->ci->session->userdata("ss_emp_id")=='' && $methodname!="login" ){			
			redirect("user/login");
		}

	}
}

 ?>