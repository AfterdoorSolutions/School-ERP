<?php
class Admin extends MY_Controller{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login');
		}
		
	}
	
	public function login(){
		if($this->is_logged_in()==false)
		{
		$data['title']="Login";
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'email',
	                'rules' => 'required|valid_email|is_unique[caste.name]'
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
                     
						$data['template'] = TEMPLATE_ADMIN_NAME.'/login';
				    	$this->load->view('template',$data);
                }
                else
                {
						$this->load->model('admin_model','login');
						$data['message']=$this->login->login();
						if($data['message']==1){ redirect('/dashboard');}
						else
						{
							$data['template'] = TEMPLATE_ADMIN_NAME.'/login';
				    	}
				    	$this->load->view('template',$data);
                }
        }
        else
        {
        	redirect('/dashboard');
        }
         
	}
	public function logout(){
		if($this->is_admin_logged_in()==false)
		{
			
			redirect('/admin/login');
		}
		else
		{
			$this->session->sess_destroy();
			$this->config->set_item('admin_id','');
			delete_cookie('user_portal_id');	
			redirect('/admin');

		}
	}
}
?>