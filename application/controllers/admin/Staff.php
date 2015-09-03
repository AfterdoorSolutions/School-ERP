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
		$this->load->model('admin/Staff_model','adm');
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
	                'field' => 'email',
	                'label' => 'email',
	                'rules' => 'valid_email'
	        ),
	        array(
	                'field' => 'emp_code',
	                'label' => 'emp code',
	                'rules' => 'required|is_unique[staff.emp_code]'
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
		$data['query']=$this->adm->all_staff();
        $data['template']=TEMPLATE_ADMIN_NAME.'/all_staff_mem';
		$this->load->view('template-admin',$data);
	}
	public function generate_pay_slip($id='')
	{
		$this->load->model('admin/Staff_model','adm');

		if($this->input->post()){
			$data['message']=$this->adm->generate_pay_slip();
			//var_dump(serialize($this->input->post()));
		}
		$data['query']=$this->adm->all_staff($id);
		$data['salary_element']=$this->adm->all_salary_elements();
		$data['template']=TEMPLATE_ADMIN_NAME.'/staff_feeslip';
		$this->load->view('template-admin',$data);
	}
	public function all_pay_slip($id='')
	{
		
		$data['salary_slip']=$this->adm->staff_all_feeslip($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/staff_all_feeslip';
		$this->load->view('template-admin',$data);
	}
	public function slip($id='')
	{
		$data['staff']=$this->adm->all_staff($this->adm->slip($id)->staff_id);
		$data['more']=$this->adm->slip($id);
		$data['query']=unserialize($this->adm->slip($id)->content);
		$data['template']=TEMPLATE_ADMIN_NAME.'/print_slip';
		$this->load->view('template-admin',$data);
	}

	public function salary_statement()
	{
		$this->load->model('admin/staff_model','stf');
		$data['query']=$this->stf->salary_slip();
		if($this->input->post()){
			$data['generated_salary_slip']="true";
		}
		$data['salary_element_add']=$this->stf->salary_element('add');
		$data['salary_element_sub']=$this->stf->salary_element('sub');
		$data['template']=TEMPLATE_ADMIN_NAME.'/staff_statement';
		$this->load->view('template-admin',$data);
	}

	public function statement_with_acc(){
		$data['query']=(object)array();
		if(!$this->input->post('month'))
		{
			$data['query']->selectmonth=false;
		}
		else
		{
			$data['query']=$this->adm->statement_with_acc($this->input->post('month'));
		}
		$data['template']=TEMPLATE_ADMIN_NAME.'/statement_with_acc';
		$this->load->view('template-admin',$data);
	}
	
	 
	public function form16()
	{
        $this->load->model('admin/Staff_model','adm');
		$data['query']=$this->adm->all_staff();
    	$this->load->model('admin/classes_model','class');
		$data['batch']=$this->class->batch_result();
        $data['template']=TEMPLATE_ADMIN_NAME.'/generate_form16';
		$this->load->view('template-admin',$data);
	}

	public function all_salary_element()
	{
		$this->load->model('admin/Staff_model','all');
		$data['query']=$this->all->all_salary_element();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_salary_element';
		$this->load->view('template-admin',$data);
	}

	public function get_form16()
	{
		$this->load->model('admin/Staff_model','adm');
		$data['query']=$this->adm->all_staff($this->input->get('staff_id'));
		$this->load->model('admin/Setting_model','setting');
		$data['setting']=$this->setting->get_setting(1);
		$this->load->model('admin/Classes_model','class');
		$data['batch']=$this->class->result_batch($this->input->get('year_id'));
		$data['query1']=$this->adm->get_salary_data($this->input->get('staff_id'),$this->input->get('year_id'));
		//var_dump($data['batch']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/generate_form16_ajax',$data);
	}
	public function get_full_details(){
 		$this->load->model('admin/staff_model','all');
		$data['staff']=$this->all->get_full_details($this->input->get('id'),$this->input->get('type'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/get_full_details',$data);
 	}
 	public function assign_class($id='')
 	{
 		$this->load->model('admin/staff_model','all');
 		$this->load->model('admin/Classes_model','class');
		$data['batch']=$this->class->batch_result();
		$data['id']=$id;
		$data['classes']=$this->class->classes_result();
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/assign_class',$data);
 	}
 	public function assign_class_id($id='')
 	{
		$data['query']=$this->adm->update_staff_id($id,$this->input->get('class_id'),$this->input->get('section_id'));
		//$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/assign_class',$data);
 	}
	public function delete_staff_category($id="")
	{
    	$this->load->model('admin/staff_model','staff');
    	$data['message']=$this->staff->delete_staff($id);
    	$data['query']=$this->staff->all_staff_category();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_staff_category';
		$this->load->view('template-admin',$data);
    } 
    public function delete_staff_member($id="")
	{
    	$this->load->model('admin/staff_model','staff');
    	$data['message']=$this->staff->delete_staff_member($id);
    	$data['query']=$this->staff->all_staff();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_staff_mem';
		$this->load->view('template-admin',$data);
    } 
    public function delete_staff_salary($id="")
	{
    	$this->load->model('admin/staff_model','staff');
    	$data['message']=$this->staff->delete_staff_salary($id);
    	$data['query']=$this->staff->all_salary_element();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_salary_element';
		$this->load->view('template-admin',$data);
    } 
    public function update_staff($id="")
	{
		$this->load->model('admin/staff_model','staff');
		if($this->input->post()){$data['message']=$this->staff->main($id);}
		$data['query']=$this->staff->get_details($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_staff_category';
		$this->load->view('template-admin',$data);
	}
	public function update_staff_member($id="")
	{
		$this->load->model('admin/staff_model','staff');
		if($this->input->post()){$data['message']=$this->staff->update_staff($id);}
		$data['query']=$this->staff->get_staff_member($id);
		$data['query2']=$this->staff->all_staff_category();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_staff_member';
		$this->load->view('template-admin',$data);
	}
	
}	
?>