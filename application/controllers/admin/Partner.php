<?php

/**
* 
*/
class Partner extends MY_Controller
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
	                'field' => 'image',
	                'label' => 'image',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'description',
	                'label' => 'description',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['template']=TEMPLATE_ADMIN_NAME.'/partner';
			$this->load->view('template-admin',$data);
        }
        else
        {
				
			$this->load->model('admin/partner_model','partner');
			$data['message']=$this->partner->index();
			$data['template']=TEMPLATE_ADMIN_NAME.'/partner';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main (){

		
		   $this->load->model('admin/partner_model','partner');
			$data['query']=$this->partner->partner();
			$data['template']=TEMPLATE_ADMIN_NAME.'/allpartner';
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
	                'field' => 'description',
	                'label' => 'description',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->model('admin/partner_model','partner');
            $data['result']=$this->partner->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/partner-update';
			$this->load->view('template-admin',$data);
		 }
        else
        {
				
			$this->load->model('admin/partner_model','partner');
			$this->data['data'] = $this->image_upload();
			$data['message']=$this->partner->main($id);
			$data['result']=$this->partner->get_details($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/partner-update';
			$this->load->view('template-admin',$data);
        

	}
}
			public function delete($id="")
	{
		
        	$this->load->model('admin/partner_model','partner');
        	$data['message']=$this->partner->delete($id);
        	$data['query']=$this->partner->partner();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/allpartner';
			$this->load->view('template-admin',$data);
            
            
		
}
 public function image_upload()
        {
        	    //$this->input->post('id')
        	
                $config['upload_path']          = './uploads/partners/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                /*$config['max_width']            = 1024;
                $config['max_height']           = 768;*/

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $data['error']=$error;
	    				var_dump($error);
                }
                else
                {
                        $upload = array('upload_data' => $this->upload->data());
                        $data['error']=$upload;
                        var_dump($upload);
                        $this->load->model('partner_model','upload_image');
                        $this->upload_image->upload_image($this->is_logged_in(),$upload['upload_data']['file_name']);
	    				//redirect('/partner');
                }
        }
    }
?>