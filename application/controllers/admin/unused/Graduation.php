<?php

/**
* 
*/
class Graduation extends MY_Controller
{
	public function __construct(){
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
	        ),
	        array(
	                'field' => 'type',
	                'label' => 'type of degree',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/graduation';
			$this->load->view('template-admin',$data);
        }
        else
        {
				
			$this->load->model('admin/graduation_model','graduation');
			$data['message']=$this->graduation->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/graduation';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main (){

		
		   $this->load->model('admin/graduation_model','graduation');
			$data['query']=$this->graduation->graduation();
			$data['template']=TEMPLATE_ADMIN_NAME.'/allgraduation';
			$this->load->view('template-admin',$data);
      
	}
	public function update($id=""){
		
$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'type',
	                'label' => 'type of degree',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('admin/graduation_model','graduation');
            $data['result']=$this->graduation->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/graduation-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/graduation_model','graduation');
			
			$data['message']=$this->graduation->main($id);
			$data['result']=$this->graduation->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/graduation-update';
			$this->load->view('template-admin',$data);
        

	}
}
			public function delete($id="")
	{
		
        	$this->load->model('admin/graduation_model','graduation');
        	$data['message']=$this->graduation->delete($id);
        	$data['query']=$this->graduation->graduation();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/allgraduation';
			$this->load->view('template-admin',$data);
            
            
		
}
}
?>