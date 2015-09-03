<?php

class Section extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}
	
	public function sections()
	{
		$this->load->model('admin/section_model','get_sections');
		$data['query']=$this->class->sections_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/get_sections';
		$this->load->view('template-admin',$data);
	}

	public function batches()
	{
		$this->load->model('admin/section_model','get_batches');
		$data['query']=$this->class->batches_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/get_batches';
		$this->load->view('template-admin',$data);
	}

	public function sections_a()
	{
		$this->load->model('admin/section_model','class');
		$data['query']=$this->class->get_details_sec($this->input->get('class_id'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/section_ajax',$data);
	}

	public function batch_a()
	{
		$this->load->model('admin/section_model','class');
		$data['query']=$this->class->get_details_batch($this->input->get('section_id'));
		//var_dump($data['query']);      
		$this->load->view(TEMPLATE_ADMIN_NAME.'/batch_ajax',$data);
	}
}