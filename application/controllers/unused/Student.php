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
			$config['upload_path']= './uploads/student';
            $config['allowed_types']= 'gif|jpg|png';
            $config['max_size']= 100000;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_c'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    //var_dump($error);
                    //var_dump($this->upload->data());
            }
            else
            {
            		//echo "string";
                    $upload_data = array('upload_data' => $this->upload->data());
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

}	
?>