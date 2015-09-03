<?php

/**
* 
*/
class Course extends MY_Controller
{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}

	public function index(){

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
	    	$config = array(
		        array(
		                'field' => 'name',
		                'label' => 'name',
		              
		        ),array(
		                'field' => 'slug',
		                'label' => 'slug',
		                'rules' => 'required|is_unique[content.slug]'
		        ),array(
		                'field' => 'seo_content',
		                'label' => 'seo_content',
		                'rules' => 'required'
		        ),array(
		                'field' => 'course_content',
		                'label' => 'course_content',
		                'rules' => 'required'
		        ),array(
		                'field' => 'overview',
		                'label' => 'overview',
		                'rules' => 'required'
		        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	             
				$data['template']=TEMPLATE_ADMIN_NAME.'/course';
				$this->load->view('template-admin',$data);
	        }
	        else
	        {
					
				$this->load->model('admin/course_model','course');
				$data['query']=$this->course->category();
				$data['query2']=$this->course->partner();
				$data['message']=$this->course->index();
				$data['template']=TEMPLATE_ADMIN_NAME.'/course';
				$this->load->view('template-admin',$data);
	        }
		
	}
	public function main (){

		   $this->load->model('admin/course_model','language');
			$data['query']=$this->language->course();
			$data['template']=TEMPLATE_ADMIN_NAME.'/allcourse';
			$this->load->view('template-admin',$data);
      
	}
	public function update($id=""){
		
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
		        array(
		                'field' => 'name',
		                'label' => 'name',
		                'rules' => 'required'
		        ),array(
		                'field' => 'slug',
		                'label' => 'slug',
		                'rules' => 'required|is_unique[content.slug]'
		        ),array(
		                'field' => 'seo_content',
		                'label' => 'seo_content',
		                'rules' => 'required'
		        ),array(
		                'field' => 'overview',
		                'label' => 'overview',
		                'rules' => 'required'
		        ),array(
		                'field' => 'course_content',
		                'label' => 'course_content',
		                'rules' => 'required'
		        )
			);
    	$config2 = array(
		        array(
		                'field' => 'name',
		                'label' => 'name',
		                'rules' => 'required'
		        ),array(
		                'field' => 'seo_content',
		                'label' => 'seo_content',
		                'rules' => 'required'
		        ),array(
		                'field' => 'overview',
		                'label' => 'overview',
		                'rules' => 'required'
		        ),array(
		                'field' => 'course_content',
		                'label' => 'course_content',
		                'rules' => 'required'
		        )
			);
    	if($this->input->post('slug')==$this->input->post('old_slug'))
			$this->form_validation->set_rules($config2);
		else
			$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('admin/course_model','language');
            $data['result']=$this->language->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/course-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/course_model','language');
			
			$data['message']=$this->language->main($id);
			$data['result']=$this->language->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/course-update';
			$this->load->view('template-admin',$data);
        

	}
}
	
public function delete($id="")
{

  
        	$this->load->model('admin/course_model','language');
        	$data['message']=$this->language->delete($id);
        	$data['query']=$this->language->course();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/allcourse';
			$this->load->view('template-admin',$data);
            
        	
            
		
}
		
}
?>