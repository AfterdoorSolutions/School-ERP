<?php
class Logout extends MY_Controller{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login');
		}
		
	}
	
	public function index(){
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