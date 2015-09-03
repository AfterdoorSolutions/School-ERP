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
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_class';
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
	                'field' => 'class_id',
	                'label' => 'class id',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'batch_id',
	                'label' => 'batch id',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->batch_result();
			$data['query2']=$this->class->sections_result();
			$data['query3']=$this->class->classes_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_batches';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->batch_result();
			$data['query2']=$this->class->sections_result();
			$data['query3']=$this->class->classes_result();
			if($this->input->post()){$data['message']=$this->class->batches_add();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_batches';
			$this->load->view('template-admin',$data);
        }
	}
	 public function subject()
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
			$data['query']=$this->class->subjects_result();
			$data['query1']=$this->class->batches_result();
			$data['query2']=$this->class->sections_result();
			$data['query3']=$this->class->classes_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_subject';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/classes_model','class');
			$data['query']=$this->class->subjects_result();
			$data['query1']=$this->class->batches_result();
			$data['query2']=$this->class->sections_result();
			$data['query3']=$this->class->classes_result();
			if($this->input->post()){$data['message']=$this->class->subjects_add();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_subject';
			$this->load->view('template-admin',$data);
        }
	}

	
	public function all_sections()
	{
		$this->load->model('admin/classes_model','all');
		$data['query']=$this->all->all_section();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_sections';
		$this->load->view('template-admin',$data);
	}
public function all_batches()
	{
		$this->load->model('admin/classes_model','all');
		$data['query']=$this->all->all_batch();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_batch';
		$this->load->view('template-admin',$data);
	}
	public function all_subjects()
	{
		$this->load->model('admin/classes_model','all');
		$data['query']=$this->all->all_subject();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_subject';
		$this->load->view('template-admin',$data);
	}
	public function delete_class($id="")
	{
    	$this->load->model('admin/classes_model','classes');
    	$data['message']=$this->classes->delete_class($id);
    	$data['query']=$this->classes->classes_result();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/allclasses';
		$this->load->view('template-admin',$data);
    } 
    public function delete_section($id="")
	{
    	$this->load->model('admin/classes_model','classes');
    	$data['message']=$this->classes->delete_section($id);
    	$data['query']=$this->classes->all_section();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_sections';
		$this->load->view('template-admin',$data);
    } 
 	public function delete_batches($id="")
	{
    	$this->load->model('admin/classes_model','classes');
    	$data['message']=$this->classes->delete_batches($id);
    	$data['query']=$this->classes->all_batch();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_batch';
		$this->load->view('template-admin',$data);
    } 
    public function delete_subject($id="")
	{
    	$this->load->model('admin/classes_model','classes');
    	$data['message']=$this->classes->delete_subject($id);
    	$data['query']=$this->classes->all_subject();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_subject';
		$this->load->view('template-admin',$data);
    } 
    public function update_class($id="")
	{
		$this->load->model('admin/classes_model','class');
		if($this->input->post()){$data['message']=$this->class->update_class($id);}
		$data['query']=$this->class->get_class($id);
		//$data['query2']=$this->staff->all_staff_category();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_class';
		$this->load->view('template-admin',$data);
	}
	 public function update_section($id="")
	{
		$this->load->model('admin/classes_model','class');
		if($this->input->post()){$data['message']=$this->class->update_section($id);}
		$data['query']=$this->class->get_section($id);
		$data['query2']=$this->class->all_section();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_section';
		$this->load->view('template-admin',$data);
	}
	public function update_batch($id="")
	{
		$this->load->model('admin/classes_model','class');
		if($this->input->post()){$data['message']=$this->class->update_batch($id);}
		//if($this->input->post()){$data['message']=$this->class->update_class($id);}
		$data['query']=$this->class->get_batch($id);
		$data['classes']=$this->class->classes_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_batch';
		$this->load->view('template-admin',$data);
	}
   }	
?>