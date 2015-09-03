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
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/section_ajax',$data);
	}

	public function batch_a()
	{
		$this->load->model('admin/section_model','class');
		$data['query']=$this->class->get_details_batch($this->input->get('section_id'));
		//var_dump($data['query']);      
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/batch_ajax',$data);
	}
	public function subject()
	{
		$this->load->model('admin/section_model','class');
		$data['query']=$this->class->get_details_sub($this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('batch_id'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/subject_ajax',$data);
	}
	public function section_2()
	{
		$this->load->model('admin/section_model','class');
		$data['query']=$this->class->get_sections_academic_year($this->input->get('class_id'),$this->input->get('batch_id'));
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/section_ajax',$data);
	}
	 public function update_section($id="")
	{
		$this->load->model('admin/section_model','section');
		if($this->input->post()){$data['message']=$this->section->update_section($id);}
		$data['query']=$this->section->get_section1($id);
		$data['query2']=$this->section->all_sections();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_section';
		$this->load->view('template-admin',$data);
	}
}