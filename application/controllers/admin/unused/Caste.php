<?php

/**
* 
*/
class Menu extends MY_Controller
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
	        ),
	        array(
	                'field' => 'religion_id',
	                'label' => 'type of menu',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/menu';
			$this->load->view('template-admin',$data);
        }
        else
        {
				
			$this->load->model('admin/Menu_model','menu');
			//$data['message']=$this->menu->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/menu';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main ()
	{

		$this->load->model('admin/Menu_model','menu');
		$data['query']=$this->menu->menu();
		$data['template']=TEMPLATE_ADMIN_NAME.'/allmenu';
		$this->load->view('template-admin',$data);
      
	}

	public function update($id="")
	{
		$this->load->model('admin/Menu_model','menu');
		if($this->input->post()){$data['message']=$this->menu->main($id);}
		$data['result']=$this->menu->get_details($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/menu-update';
		$this->load->view('template-admin',$data);
		
	}
	
	public function delete($id="")
	{
		
    	$this->load->model('admin/Menu_model','menu');
    	$data['message']=$this->menu->delete($id);
    	$data['query']=$this->menu->menu();
    	$data['template']=TEMPLATE_ADMIN_NAME.'/allmenu';
    	$data['query']=array();
		$this->load->view('template-admin',$data);
    }
}	
?>