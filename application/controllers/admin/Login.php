<?php

/**
* 
*/
class Login extends MY_Controller
{
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data['class']="bgcolor login_home";
		$data['login']='login';
		if($this->is_admin_logged_in()==false)
		{

		$data['title']="Login";
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'email',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'password',
	                'rules' => 'required|alpha_numeric'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
                {
                     $this->load->view(TEMPLATE_ADMIN_NAME.'/login',$data);
                }
                else
                {
						$this->load->model('admin/login_model','login');
						$data['message']=$this->login->login();
						if($data['message']==1){ redirect('admin');}
						else
						{
							$this->load->view(TEMPLATE_ADMIN_NAME.'/login',$data);
				    	}
				    	//$this->load->view('template-admin',$data);
                }
        }
        else
        {
        	redirect('/admin/dashboard');
        }
         
	}
}
