<?php

/**
* 
*/
class Setting extends MY_Controller
{
	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}
	public function index()
	{

		$this->load->model('admin/Setting_model','setting');

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'student_time_period',
	                'label' => 'Student Issue Time Period',
	                'rules' => 'required'
	       
	        ),
	         array(
	                'field' => 'staff_time_period',
	                'label' => 'Staff Issue Time Period',
	                'rules' => 'required'
	               ),
	         array(
	                'field' => 'book_issue_no',
	                'label' => 'Books Issuable',
	                'rules' => 'required'
	               )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
			$data['query']=$this->setting->get_setting(1);
			$data['template']=TEMPLATE_ADMIN_NAME.'/setting';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			
			if($this->input->post()){$data['message']=$this->setting->index();}
			$data['query']=$this->setting->get_setting(1);
			$data['template']=TEMPLATE_ADMIN_NAME.'/setting';
			$this->load->view('template-admin',$data);
        }
	}
}
	