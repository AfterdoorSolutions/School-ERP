<?php
class Dashboard extends MY_Controller{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}

	public function index(){
		$data['template']=TEMPLATE_ADMIN_NAME.'/index';
		$this->load->view('template-admin',$data);
	}
	public function view(){
  		
  		$this->is_logged_in();
                
	}
	public function caste(){
  		$data['template']=TEMPLATE_ADMIN_NAME.'/caste';
		$this->load->view('template-admin',$data);
                
	}
}
?>