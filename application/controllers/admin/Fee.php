<?php

/**
* 
*/
class Fee extends MY_Controller
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
	                'field' => 'type',
	                'label' => 'type',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'category',
	                'label' => 'category',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/fee_model','fee');
			$data['query']=$this->fee->fee_result();
			$data['template']=TEMPLATE_ADMIN_NAME.'/fee';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/fee_model','fee');
			$data['query']=$this->fee->fee_result();
			if($this->input->post()){$data['message']=$this->fee->index();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/fee';
			$this->load->view('template-admin',$data);
        }
	}
	
	public function main()
	{

		$this->load->model('admin/fee_model','fee');
		$data['query']=$this->fee->fee_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_fee';
		$this->load->view('template-admin',$data);
      
	}

	public function print_feeslip()
	{

		$this->load->model('admin/fee_model','fee');
		$this->load->model('admin/classes_model','classes');
		$data['classes']=$this->classes->classes_result();
		$this->load->model('admin/student_categorymodel','menu');
		$data['query3']=$this->menu->category_result();
		$data['template']=TEMPLATE_ADMIN_NAME.'/print_feeslip';
		$this->load->view('template-admin',$data);
      
	}

	public function fee_scheme()
	{
		$this->load->model('admin/classes_model','cls');
		$data['query2']=$this->cls->batches_result();
		$data['query']=$this->cls->classes_result();
		$data['query1']=$this->cls->sections_result();
		$this->load->model('admin/student_categorymodel','menu');
		$data['query3']=$this->menu->category_result();
		$this->load->model('admin/fee_model','fee');
		if($this->input->post()){$data['message']=$this->fee->insert_fee_setup();}
		$data['query4']=$this->fee->cat_result(0);
		//var_dump($data['query4']);
		$data['query5']=$this->fee->cat_result(1);
		$data['query6']=$this->fee->cat_result(2);
		$data['template']=TEMPLATE_ADMIN_NAME.'/fee_scheme';
		$this->load->view('template-admin',$data);
	}

	public function student_a()
	{
		$this->load->model('admin/fee_model','stud');
		$data['sql']=$this->stud->get_stu($this->input->get('class_id','batch_id','section_id'),$this->input->get('batch_id'),$this->input->get('section_id'));
		//var_dump($data['sql']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/student_ajax',$data);
	}

	public function print_all_fees()
	{
		$data['template']=TEMPLATE_ADMIN_NAME.'/print_feeslab';
		$this->load->model('admin/fee_model','stud');
		$data['query']=$this->stud->print_all_fees();
		$this->load->view('template-admin',$data);
	}

	public function print_slip($id)
	{
		$this->load->model('admin/fee_model','stud');
		$data['student']=$this->stud->get_stu_details($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/print_student_fee_slip';
		$this->load->view('template-admin',$data);
	}

	public function fee_collection()
	{
		$data['template']=TEMPLATE_ADMIN_NAME.'/fee_collection';
		$this->load->view('template-admin',$data);
	}

	public function print_fee_slab($batch='')
	{
		$this->load->model('admin/fee_model','stud');
		$data['query']=(object)array();
		if(!$this->input->post('month'))
		{
			$data['query']->selectmonth=false;
		}
		else
		{
			$data['query']=$this->adm->print_fee_slab($this->input->post('month'));
		}
		$data['template']=TEMPLATE_ADMIN_NAME.'/print_fee_slab';
		$this->load->view('template-admin',$data);
	}

	public function get_fee_collection($adm_no)
	{
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'date',
	                'label' => 'date',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'receipt',
	                'label' => 'receipt',
	                'rules' => 'required|is_unique[fee_collection.receipt]'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('admin/fee_model','stud');
			$data['student1']=$this->stud->get_stu_adm($adm_no);
			$data['student']=$this->stud->get_stu_details($data['student1']->student_admission_id);
			$data['template']=TEMPLATE_ADMIN_NAME.'/fee_collection_adm';
			$this->load->view('template-admin',$data);
		}
		else
		{
			$this->load->model('admin/fee_model','stud');
			$data['student1']=$this->stud->get_stu_adm($adm_no);
			$data['student']=$this->stud->get_stu_details($data['student1']->student_admission_id);
			if($this->input->post()){$data['message']=$this->stud->add_fee(); }
			$data['template']=TEMPLATE_ADMIN_NAME.'/fee_collection_adm';
			$this->load->view('template-admin',$data);
		}
		
	}
public function delete_fee_type($id="")
	{
    	$this->load->model('admin/fee_model','fee');
    	$data['message']=$this->fee->delete_fee_type($id);
    	$data['query']=$this->fee->fee_result();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_fee';
		$this->load->view('template-admin',$data);
    } 
}	
?>