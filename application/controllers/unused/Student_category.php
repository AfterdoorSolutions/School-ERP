<?php

/**
* 
*/
class Student_category extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}
	
	public function index()
	{

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/student_categorymodel','menu');
			$data['query']=$this->menu->category_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/student_category';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/student_categorymodel','menu');
			$data['query']=$this->menu->category_result();
			if($this->input->post()){$data['message']=$this->menu->index();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/student_category';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main ()
	{

		$this->load->model('admin/student_categorymodel','menu');
		$data['query']=$this->menu->category_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_student_category';
		$this->load->view('template-admin',$data);
      
	}

	public function update($id="")
	{
		$this->load->model('admin/student_categorymodel','menu');
		if($this->input->post()){$data['message']=$this->menu->main($id);}
		$data['result']=$this->menu->get_details($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/menu-update';
		$this->load->view('template-admin',$data);
	}
	
	public function delete($id="")
	{
		
    	$this->load->model('admin/student_categorymodel','menu');
    	$data['message']=$this->menu->delete($id);
    	$data['query']=$this->menu->menu();
    	$data['template']=TEMPLATE_ADMIN_NAME.'/allmenu';
    	$data['query']=array();
		$this->load->view('template-admin',$data);
    }
}	
?>
