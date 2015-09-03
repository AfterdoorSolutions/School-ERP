<?php

/**
* 
*/
class Classes extends MY_Controller
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
             
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->classes_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_class';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->classes_result();
			if($this->input->post()){$data['message']=$this->class->index();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_class';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main ()
	{

		$this->load->model('admin/classes_model','class');
		$data['query']=$this->class->classes_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/allclasses';
		$this->load->view('template-admin',$data);
      
	}

	public function update($id="")
	{
		$this->load->model('admin/classes_model','class');
		if($this->input->post()){$data['message']=$this->class->main($id);}
		$data['result']=$this->class->get_details($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/class-update';
		$this->load->view('template-admin',$data);
	}
	
	public function delete($id="")
	{
		
    	$this->load->model('admin/classes_model','class');
    	$data['message']=$this->class->delete($id);
    	$data['query']=$this->class->class();
    	$data['template']=TEMPLATE_ADMIN_NAME.'/allclasses';
    	$data['query']=array();
		$this->load->view('template-admin',$data);
    }


    public function sections()
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
             
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->sections_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_sections';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->sections_result();
			if($this->input->post()){$data['message']=$this->class->sections_add();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_sections';
			$this->load->view('template-admin',$data);
        }
	}
	public function batches()
	{

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'start_batch',
	                'label' => 'start_batch',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'end_batch',
	                'label' => 'end_batch',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->batches_result();
			$data['query2']=$this->class->sections_result();
			$data['query3']=$this->class->classes_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_batches';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->batches_result();
			$data['query2']=$this->class->sections_result();
			$data['query3']=$this->class->classes_result();
			if($this->input->post()){$data['message']=$this->class->batches_add();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_batches';
			$this->load->view('template-admin',$data);
        }
	}
}	
?>