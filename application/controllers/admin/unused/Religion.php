<?php

/**
* 
*/
class Religion extends MY_Controller
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
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/religion';
			$this->load->view('template-admin',$data);
        }
        else
        {
				
			$this->load->model('admin/Religion_model','religion');
			$data['message']=$this->religion->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/religion';
			$this->load->view('template-admin',$data);
        }
	}

	public function main (){

		   $this->load->model('admin/religion_model','religion');
			$data['query']=$this->religion->religion();
			$data['template']=TEMPLATE_ADMIN_NAME.'/allreligion';
			$this->load->view('template-admin',$data);
      
	}
	public function update($id=""){
		
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
        	$this->load->model('admin/religion_model','religion');
            $data['result']=$this->religion->get_details($id);
            $data['template']=TEMPLATE_ADMIN_NAME.'/religion-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/religion_model','religion');
			
			$data['message']=$this->religion->main($id);
			$data['result']=$this->religion->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/religion-update';
			$this->load->view('template-admin',$data);
        

	}
}
	public function delete($id="")
	{

 
        	$this->load->model('admin/Religion_model','religion');
        	$data['message']=$this->religion->delete($id);
        	$this->load->model('admin/Religion_model','religion');
			$data['query']=$this->religion->religion();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/allreligion';
			$this->load->view('template-admin',$data);
		
	}
		
		
}
?>