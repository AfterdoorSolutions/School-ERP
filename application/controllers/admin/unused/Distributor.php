<?php

/**
* 
*/
class Distributor extends MY_Controller
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
	                )

		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/distributor';
			$this->load->view('template-admin',$data);
        }
        else
        {
			$this->load->model('admin/distributor_model','distributor');
			$data['message']=$this->distributor->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/distributor';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main (){

		
		   $this->load->model('admin/distributor_model','distributor');
			$data['query']=$this->distributor->distributor();
			$data['template']=TEMPLATE_ADMIN_NAME.'/alldistributor';
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
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('admin/distributor_model','distributor');
            $data['result']=$this->distributor->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/distributor-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/distributor_model','distributor');
			
			$data['message']=$this->distributor->main($id);
			$data['result']=$this->distributor->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/distributor-update';
			$this->load->view('template-admin',$data);
        

	}
}
			public function delete($id="")
	{
		
        	$this->load->model('admin/distributor_model','distributor');
        	$data['message']=$this->distributor->delete($id);
        	$data['query']=$this->distributor->distributor();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/alldistributor';
			$this->load->view('template-admin',$data);
            
            
		
}
}
?>