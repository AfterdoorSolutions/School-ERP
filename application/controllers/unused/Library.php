<?php

/**
* 
*/
class Library extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
		$this->load->model('admin/library_model','library');
	}
	
	public function all()
	{
		$data['query']=$this->library->get_all_books();
		$data['template']=TEMPLATE_ADMIN_NAME.'/allbooks';
		$this->load->view('template-admin',$data);
	}

	public function issue()
	{
		$data['query']=$this->library->issue();
		$data['template']=TEMPLATE_ADMIN_NAME.'/issue_books';
		$this->load->view('template-admin',$data);
	}
   public function book()
	{
	    $this->load->model('admin/library_model','library');
        if($this->input->post()){$data['message']=$this->library->books_add();}
		$data['template']=TEMPLATE_ADMIN_NAME.'/books';
		$this->load->view('template-admin',$data);
	}
	

}	
?>