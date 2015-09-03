<?php

class Membership extends MY_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['template'] = TEMPLATE_NAME.'/upgrade_membership';
		$this->load->view('template',$data);
	}
	
}