<?php

/**
* 
*/
class Category extends MY_Controller
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
	                'field' => 'parent',
	                'label' => 'parent',
	                'rules' => 'required'
	                )

		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/Category_model','category');
			$data['query']=$this->category->category_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/category';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/category_model','category');
			$data['query']=$this->category->category_result();
			if($this->input->post()){$data['message']=$this->category->index();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/category';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main (){

		
		   $this->load->model('admin/category_model','category');
			$data['query']=$this->category->category();
			$data['template']=TEMPLATE_ADMIN_NAME.'/allcategory';
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
        	$this->load->model('admin/category_model','category');
            $data['result']=$this->category->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/category-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/category_model','category');
			
			$data['message']=$this->category->main($id);
			$data['result']=$this->category->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/category-update';
			$this->load->view('template-admin',$data);
        

	}
}
			public function delete($id="")
	{
		
        	$this->load->model('admin/category_model','category');
        	$data['message']=$this->category->delete($id);
        	$data['query']=$this->category->category();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/allcategory';
			$this->load->view('template-admin',$data);
            
            
		
}
}
?>