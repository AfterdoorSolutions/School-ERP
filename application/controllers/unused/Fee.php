<?php

/**
* 
*/
class Fee extends MY_Controller
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
	                'field' => 'type',
	                'label' => 'type',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'category',
	                'label' => 'category',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/fee_model','fee');
			$data['query']=$this->fee->fee_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/fee';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/fee_model','fee');
			$data['query']=$this->fee->fee_result();
			if($this->input->post()){$data['message']=$this->fee->index();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/fee';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main()
	{

		$this->load->model('admin/fee_model','fee');
		$data['query']=$this->fee->fee_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_fee';
		$this->load->view('template-admin',$data);
      
	}

	public function print_feeslip()
	{

		$this->load->model('admin/fee_model','fee');
		$this->load->model('admin/classes_model','classes');
		$data['classes']=$this->classes->classes_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/print_feeslip';
		$this->load->view('template-admin',$data);
      
	}

	public function fee_scheme()
	{
		$this->load->model('admin/classes_model','cls');
		$data['query2']=$this->cls->batches_result();
		$data['query']=$this->cls->classes_result();
		$data['query1']=$this->cls->sections_result();
		$this->load->model('admin/student_categorymodel','menu');
		$data['query3']=$this->menu->category_result();
		$this->load->model('admin/fee_model','fee');
		$data['query4']=$this->fee->cat_result(0);
		//var_dump($data['query4']);
		$data['query5']=$this->fee->cat_result(1);
		$data['query6']=$this->fee->cat_result(2);
		$data['template']=TEMPLATE_ADMIN_NAME.'/fee_scheme';
		$this->load->view('template-admin',$data);
	}

}	
?>