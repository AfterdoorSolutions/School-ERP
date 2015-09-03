<?php
class Static_pages extends MY_Controller{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
		
	}

	public function index(){
		
	}
	public function not_found(){
  		$data['class']="bgcolor login_home";
		$data['login']='login';
		$data['title']="Not Found";
  		$this->load->view(TEMPLATE_ADMIN_NAME.'/static/not_found',$data);
                
	}
	
}
?>