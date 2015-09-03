<?php

/**
* 
*/
class Staff extends MY_Controller
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
	                'field' => 'short_name',
	                'label' => 'short name',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/Staff_model','adm');
			$this->load->model('admin/classes_model','cls');
			$data['template']=TEMPLATE_ADMIN_NAME.'/staff_category';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/Staff_model','adm');
			if($this->input->post()){$data['message']=$this->adm->index();}
            $data['template']=TEMPLATE_ADMIN_NAME.'/staff_category';
			$this->load->view('template-admin',$data);
        }
	}
	public function add_salary_element()
	{

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'type',
	                'label' => 'type',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'action',
	                'label' => 'action',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/Staff_model','adm');
			$data['query']=$this->adm->all_salary_elements();
			$this->load->model('admin/classes_model','cls');
			$data['template']=TEMPLATE_ADMIN_NAME.'/salary_element';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/Staff_model','adm');
			$data['query']=$this->adm->all_salary_elements();
			if($this->input->post()){$data['message']=$this->adm->add_salary_element();}
            $data['template']=TEMPLATE_ADMIN_NAME.'/salary_element';
			$this->load->view('template-admin',$data);
        }
	}
	public function main()
	{
		$this->load->model('admin/Staff_model','all');
		$data['query']=$this->all->all_staff_category();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_staff_category';
		$this->load->view('template-admin',$data);
	}
	public function delete($id='')
	{
		$this->load->model('admin/Staff_model','all');
		$data['query']=$this->all->delete($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_staff_category';
		$this->load->view('template-admin',$data);
	}
	public function staff()
	{

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'first_name',
	                'label' => 'first name',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'gender',
	                'label' => 'gender',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/Staff_model','adm');
			$this->load->model('admin/classes_model','cls');
			$data['query']=$this->adm->all_staff_category();
			$data['template']=TEMPLATE_ADMIN_NAME.'/staff_member';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$config['upload_path']= './uploads/staff';
            $config['allowed_types']= 'gif|jpg|png';
            $config['max_size']= 100000;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_c'))
            {
            	$error = array('error' => $this->upload->display_errors());
            	//var_dump($error);
            	$this->load->model('admin/Staff_model','adm');
			    if($this->input->post()){$data['message']=$this->adm->add(' ');}
            
            }
            else
            {
	           $upload_data = array('upload_data' => $this->upload->data()); 
	           $this->load->model('admin/Staff_model','adm');
			   if($this->input->post()){$data['message']=$this->adm->add('uploads/staff/'.$upload_data['upload_data']['file_name']);}
            }

            $this->load->model('admin/Staff_model','adm');
			$data['query']=$this->adm->all_staff_category();
            $data['template']=TEMPLATE_ADMIN_NAME.'/staff_member';
			$this->load->view('template-admin',$data);
        }
	}
	public function allstaff()
	{
            $this->load->model('admin/Staff_model','adm');
			$data['query']=$this->adm->all_staff();
            $data['template']=TEMPLATE_ADMIN_NAME.'/all_staff_mem';
			$this->load->view('template-admin',$data);
	}
	public function generate_pay_slip($id='')
	{
			$this->load->model('admin/Staff_model','adm');

			if($this->input->post()){
				$data['message']=$this->adm->generate_pay_slip(serialize($this->input->post()));
				//var_dump(serialize($this->input->post()));
			}
			$data['query']=$this->adm->all_staff($id);
			$data['salary_element']=$this->adm->all_salary_elements();
			$data['template']=TEMPLATE_ADMIN_NAME.'/staff_feeslip';
			$this->load->view('template-admin',$data);
	}
	public function all_pay_slip($id='')
	{
			$this->load->model('admin/Staff_model','adm');
			$data['salary_slip']=$this->adm->staff_all_feeslip($id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/staff_all_feeslip';
			$this->load->view('template-admin',$data);
	}

}	
?>