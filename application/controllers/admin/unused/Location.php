<?php

/**
* 
*/
class Location extends MY_Controller
{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}
	public function index(){

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'parent',
	                'label' => 'parent',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/location';
			$this->load->view('template-admin',$data);
        }
        else
        {
				
			$this->load->model('admin/Location_model','location');
			$data['message']=$this->location->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/location';
			$this->load->view('template-admin',$data);
        }
	}
	public function main (){

		   $this->load->model('admin/location_model','location');
			$data['query']=$this->location->location();
			$data['template']=TEMPLATE_ADMIN_NAME.'/alllocation';
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
	                'field' => 'parent',
	                'label' => 'parent',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('admin/location_model','location');
            $data['result']=$this->location->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/location-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/location_model','location');
			
			$data['message']=$this->location->main($id);
			$data['result']=$this->location->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/location-update';
			$this->load->view('template-admin',$data);
        

	}
}
	
public function delete($id="")
{

  
        	$this->load->model('admin/location_model','location');
        	$data['message']=$this->location->delete($id);
        	$data['query']=$this->location->location();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/alllocation';
			$this->load->view('template-admin',$data);
        	
            
		
}
		
}
?>