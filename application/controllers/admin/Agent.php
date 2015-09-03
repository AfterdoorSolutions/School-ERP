<?php

/**
* 
*/
class Agent extends MY_Controller
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
	        ),array(
	                'field' => 'email',
	                'label' => 'email',
	                'rules' => 'required|is_unique[user_portal.email]|valid_email'
	        ),
	        array(
	                'field' => 'address',
	                'label' => 'address',
	                'rules' => 'required'
	        ),array(
	                'field' => 'password',
	                'label' => 'password',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'phone_no',
	                'label' => 'phone_no',
	                'rules' => 'required'
	                ),
            array(
	                'field' => 'distributor',
	                'label' => 'distributor',
	                'rules' => 'required'
	                )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/agent';
			$this->load->view('template-admin',$data);
        }
        else
        {
			$this->load->model('admin/agent_model','agent');
			$data['message']=$this->agent->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/agent';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main (){

		
		   $this->load->model('admin/agent_model','agent');
			$data['query']=$this->agent->agent();
			$data['template']=TEMPLATE_ADMIN_NAME.'/allagent';
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
	                'field' => 'address',
	                'label' => 'address',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'phone_no',
	                'label' => 'phone_no',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'distributor',
	                'label' => 'distributor',
	                'rules' => 'required'
	                )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('admin/agent_model','agent');
            $data['result']=$this->agent->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/agent-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/agent_model','agent');
			
			$data['message']=$this->agent->main($id);
			$data['result']=$this->agent->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/agent-update';
			$this->load->view('template-admin',$data);
        

	}
}
			public function delete($id="")
	{
		
        	$this->load->model('admin/agent_model','agent');
        	$data['message']=$this->agent->delete($id);
        	$data['query']=$this->agent->agent();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/allagent';
			$this->load->view('template-admin',$data);
            
            
		
}
}
?>