<?php

/**
* 
*/
class Name extends MY_Controller
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
             
			$this->load->model('admin/name_model','name');
			$data['query']=$this->name->classes_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/name';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/name_model','name');
			$data['query']=$this->name->classes_result();
			if($this->input->post()){$data['message']=$this->name->index();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/name';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main ()
	{

		$this->load->model('admin/name_model','name');
		$data['query']=$this->name->classes_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_classes';
		$this->load->view('template-admin',$data);
      
	}

	public function update($id="")
	{
		$this->load->model('admin/name_model','name');
		if($this->input->post()){$data['message']=$this->name->main($id);}
		$data['result']=$this->name->get_details($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/name-update';
		$this->load->view('template-admin',$data);
	}
	
	public function delete($id="")
	{
		
    	$this->load->model('admin/name_model','name');
    	$data['message']=$this->name->delete($id);
    	$data['query']=$this->name->class_name();
    	$data['template']=TEMPLATE_ADMIN_NAME.'/allclasses';
    	$data['query']=array();
		$this->load->view('template-admin',$data);
    }
}	
?>