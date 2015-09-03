<?php
/**
* 
*/
class Student extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}
	
	public function admission()
	{

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'first_name',
	                'label' => 'first name',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'adm_number',
	                'label' => 'admission number',
	                'rules' => 'required|is_unique[student_admission.adm_number]'
	        ),
	        array(
	                'field' => 'adm_date',
	                'label' => 'admission date',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'class_id',
	                'label' => 'class',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'batch_id',
	                'label' => 'batch',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'gender',
	                'label' => 'gender',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'section_id',
	                'label' => 'section',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$this->load->model('admin/Student_categorymodel','adm');
			$data['query']=$this->adm->category_result();
			$this->load->model('admin/classes_model','cls');
			$data['query1']=$this->cls->classes_result();
			$data['query2']=$this->cls->batches_result();
			$this->load->model('admin/Admission_model','admin');
			$data['query3']=$this->admin->get_max_adm();
			//var_dump($data['query3']);
			$data['template']=TEMPLATE_ADMIN_NAME.'/student_admission';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			$this->load->model('admin/Student_categorymodel','adm');
			$this->load->model('admin/Admission_model','admin');
			$data['query']=$this->adm->category_result();
			$this->load->model('admin/classes_model','cls');
			$data['query1']=$this->cls->classes_result();
			$data['query2']=$this->cls->batches_result();
			$data['query2']=$this->admin->get_max_adm();
			$config['upload_path']= './uploads/student';
            $config['allowed_types']= 'gif|jpg|png';
            $config['max_size']= 100000;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_c'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    if($this->input->post()){$data['message']=$this->admin->add_student();}
                    //var_dump($error);
                    //var_dump($this->upload->data());
            }
            else
            {
            		//echo "string";
                    $upload_data = array('upload_data' => $this->upload->data());
                    echo $upload_data['upload_data']['file_name'];
                    if($this->input->post()){$data['message']=$this->admin->add_student($upload_data['upload_data']['file_name']);}
                    $data['template']=TEMPLATE_ADMIN_NAME.'/student_admission';
            }
		
			$data['template']=TEMPLATE_ADMIN_NAME.'/student_admission';
			$this->load->view('template-admin',$data);
        }
	}

	public function all_admission()
	{
		$this->load->model('admin/admission_model','all');
		$data['query']=$this->all->all_stu_data();
		$data['template']=TEMPLATE_ADMIN_NAME.'/all_stu_adm';
		$this->load->view('template-admin',$data);
	}
	public function edit_students()
	{
		$this->load->model('admin/admission_model','all');
		$data['query']=$this->all->all_stu_data();
		$data['template']=TEMPLATE_ADMIN_NAME.'/class_student';
		$this->load->view('template-admin',$data);
	}
	public function all_students()
	{
		$this->load->model('admin/admission_model','all');
		$data['query']=$this->all->all_stu_data();
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/all_students',$data);
	}
	public function class_students()
	{
		$this->load->model('admin/admission_model','all');
		$data['query']=$this->all->student_data_class();
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/all_students',$data);
	}
	public function tc($id='')
	{
		$this->load->model('admin/admission_model','all');
		$data['student']=$this->all->student_data($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/generate_tc';
		$this->load->view('template-admin',$data);
	}

   public function student_strength()
	{
		$this->load->model('admin/student_categorymodel','student_categorymodel');
		  $this->load->helper('pdf_helper');
		$data['class_list']=$this->student_categorymodel->allclass();
		$data['category_list']=$this->student_categorymodel->category();
		$data['cal_strength']=$this->student_categorymodel->cal_strength();
		$data['total_strength_category']=$this->student_categorymodel->total_strength_category();
		$data['total_student']=$this->student_categorymodel->total_student();
		//$data['total_strength_class']=$this->student_categorymodel->total_strength_class();
		//var_dump($data['total_strength_category']);
		//var_dump($data['total_strength_class']);
		$data['template']=TEMPLATE_ADMIN_NAME.'/student_strength';
		$this->load->view('template-admin',$data);
	}

	

public function stu_admission()
    {
    	$this->load->model('admin/student_categorymodel','student_categorymodel');
      	$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fphone', 'fphone', 'required');
	    $this->form_validation->set_rules('ocontact', 'ocontact', 'required');
	    $this->form_validation->set_rules('salutation', 'salutation', 'required');
	    $this->form_validation->set_rules('femail', 'femail', 'required');
	    if ($this->form_validation->run() === FALSE)
	    {
	        
	       $data['template']=TEMPLATE_ADMIN_NAME.'/student_admission';
			$this->load->view('template-admin',$data);
	    }
	    else
	    {
	       $this->library_model->stu_admission();
	       $data['template']=TEMPLATE_ADMIN_NAME.'/student_admission';
		   $this->load->view('template-admin',$data);
	    }
 	}

 	public function get_full_details(){
 		$this->load->model('admin/admission_model','all');
		$data['student']=$this->all->get_full_details($this->input->get('id'),$this->input->get('type'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/get_full_details',$data);
 	}

 	public function fee_register()
	{		
		$this->load->model('admin/student_categorymodel','student');
	    $data['query']=$this->student->fee_register();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/fee_register';
		$this->load->view('template-admin',$data);
     }
     public function student_update($id="")   
	{
		$this->load->model('admin/admission_model','admission');
		if($this->input->post()){$data['message']=$this->admission->update_student($id);}
		$data['result']=$this->admission->get_details($id);
		$data['query']=$this->admission->all_stu_data();
		$data['template']=TEMPLATE_ADMIN_NAME.'/student_update';
		$this->load->view('template-admin',$data);
	}
		   	
            
			
    public function student_fee_register()
	{
		$this->load->model('admin/student_categorymodel','student');
		$data['query']=$this->student->student_fee_register($this->input->get('student_admission_id'));
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/fee_register_ajax',$data);
	} 
}	
?>