<?php
class Dashboard extends MY_Controller{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		$this->load->model('get_data','get_data');
		
	}

	public function index(){
		$data['template']=TEMPLATE_ADMIN_NAME.'/index';
		$data['total_student']=$this->get_data->count_students();
		$data['student_active']=$this->get_data->count_students('active');
		$data['student_inactive']=$this->get_data->count_students('inactive');
		$data['total_book']=$this->get_data->count_books();
		$data['book_active']=$this->get_data->count_books('active');
		$data['book_inactive']=$this->get_data->count_books('inactive');
		$data['total_staff']=$this->get_data->count_staff();
		$data['staff_active']=$this->get_data->count_staff('active');
		$data['staff_inactive']=$this->get_data->count_staff('inactive');
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