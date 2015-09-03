<?php

/**
* 
*/
class Fa extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		$this->load->model('admin/Fa_model','fa');
		$this->load->model('admin/classes_model','cls');
		$this->load->model('admin/section_model','section');
	}
	
	public function add()
	{

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'class_id',
	                'label' => 'class_id',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
            
        }
        else
        {	
			if($this->input->post()){$data['message']=$this->fa->add();}
        }
        	
        	$data['exam']=$this->fa->get_exam();
        	$data['classes']=$this->cls->classes_result();
        	$data['template']=TEMPLATE_ADMIN_NAME.'/add_fa';
			$this->load->view('template-admin',$data);
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
	                'field' => 'emp_code',
	                'label' => 'emp code',
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

	public function add_marks()
	{
        $data['batch']=$this->section->get_batch();
        $data['classes']=$this->cls->classes_result();
        $data['exam']=$this->fa->get_exam();
        $data['type']=$this->config->item('admin_type');
        $data['class_staff']=$this->cls->class_result();
        $data['section_staff']=$this->section->section_result();
        $data['template']=TEMPLATE_ADMIN_NAME.'/add_fa_subject';
		$this->load->view('template-admin',$data);
	}

	public function all_sub()
	{
		$data['subject']=$this->fa->get_sub($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/all_fa_subject',$data);
	}

	public function add_sub_marks()
	{
		$data['student']=$this->fa->get_class_students($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'));
		$data['subject']=$this->fa->get_subject_details($this->input->get('subject_id'));
		$data['exam_type_id']=$this->input->get('exam_type_id');
		$data['subject_distribution']=$this->fa->get_subject_distribution($this->input->get('subject_id'),$this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'));

		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/add_sub_marks',$data);
	}

	public function submit_marks($value='')
	{
		$subject_id = $this->input->get('subject_id');
		$batch_id = $this->input->get('batch_id');
		$class_id = $this->input->get('class_id');
		$section_id = $this->input->get('section_id');
		$exam_type_id = $this->input->get('exam_type_id');
		$this->fa->submit_fa($subject_id,$batch_id,$class_id,$section_id,$exam_type_id);
		$data['subject']=$this->fa->get_sub($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/all_fa_subject',$data);

	}

	public function add_stu_marks()
	{	
		echo $data['student']=$this->fa->add_stu_marks($this->input->get('student_id'),$this->input->get('marks'),$this->input->get('exam_marking_id'),$this->is_admin_logged_in());
	}

	public function add_all_marks()
	{
		echo $data['student']=$this->fa->add_all_stu_marks($this->is_admin_logged_in());
		redirect(admin_url().'fa/add_marks');
	}

	public function view_marks($value='')
	{
		$data['batch']=$this->section->get_batch();
        $data['classes']=$this->cls->classes_result();
        $data['exam']=$this->fa->get_exam();
		$data['template']=TEMPLATE_ADMIN_NAME.'/view_student_marks';
		$this->load->view('template-admin',$data);
	}

	public function get_sub()
	{
		$data['query']=$this->fa->get_sub_a($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'));
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/subject_ajax',$data);
	}

	public function get_stu_marks()
	{
		$data['student']=$this->fa->get_sub_b($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('subject_id'),$this->input->get('exam_type_id'));
		//echo "<pre>";var_dump($data['student']);echo "</pre>";
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/student_marks',$data);
	}
	
	public function report($value='')
	{
		$data['batch']=$this->section->get_batch();
        $data['classes']=$this->cls->classes_result();
        $data['exam']=$this->fa->get_exam();
        $data['type']=$this->config->item('admin_type');
        $data['class_staff']=$this->cls->class_result();
        $data['section_staff']=$this->section->section_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/generate_report';
		$this->load->view('template-admin',$data);
	}

	public function analysis($value='')
	{
		$data['batch']=$this->section->get_batch();
        $data['classes']=$this->cls->classes_result();
        $data['exam']=$this->fa->get_exam();
        $data['type']=$this->config->item('admin_type');
        $data['class_staff']=$this->cls->class_result();
        $data['section_staff']=$this->section->section_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/generate_analysis';
		$this->load->view('template-admin',$data);
	}

	public function generate_report_ajax()
	{
		$query=$this->fa->get_data_for_report($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id'));
		//var_dump($data['query']);
		$data['subject']=$query['subject'];
		$data['class']=$query['class'];
		$data['new_total_sub']=$query['new_total_sub'];
		$data['sub_array']=$query['sub_array'];
		$data['all']=$query['all'];
		$data['all_subject']=$query['all_subject'];
		$data['sub_name']=$query['sub_name'];
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/generate_report',$data);
	}
	public function generate_analysis_ajax()
	{
		$query=$this->fa->get_data_for_report($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id'));
		
		$data['student']=$this->fa->get_only_class_students($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'));
		$data['subject']=$this->fa->get_sub($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id'));
		$data['subject_distribution']=$this->fa->get_class_sub_dis();
		$data['exam_type_id']=$this->input->get('exam_type_id');

		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/generate_analysis_ajax',$data);
	}

	public function test()
	{
		/*$this->fa->test();*/
	}
}	
?>