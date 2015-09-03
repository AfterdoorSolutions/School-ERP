<?php

class Success_story extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('success_story_model','story');
	}

	public function index($id=''){
		//MODEL
		$success_story=$this->story->get_success_story($id);
		$data['success_story']=$success_story;
		//VIEW
		$data['template']=TEMPLATE_NAME.'/success_story';
		$this->load->view('template',$data);
	}

	public function add(){
		//MODEL
		$success_story=$this->story->add_success_story($this->is_logged_in());
		$data['template']=TEMPLATE_NAME.'/add_success_story';
		$this->load->view('template',$data);
	}
}