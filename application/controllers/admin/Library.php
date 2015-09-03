<?php

/**
* 
*/
class Library extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
		$this->load->model('admin/library_model','library');
	}
	
	public function all()
	{
		//$data['query']=$this->library->get_all_books();
		$data['template']=TEMPLATE_ADMIN_NAME.'/allbooks';
		$this->load->view('template-admin',$data);
	}

	public function all_ajax($type)
	{
		$data['query']=$this->library->get_all_books($type);
		$data['type']=$type;
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/allbooks',$data);
	}

	public function issue()
	{
		$data['query']=$this->library->issue();
		$data['template']=TEMPLATE_ADMIN_NAME.'/issue_books';
		$this->load->view('template-admin',$data);
	}

   	public function book()
	{
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'title',
	                'label' => 'title',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'gifted',
	                'label' => 'gifted',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
			
		}
		else
		{
	        $data['message']=$this->library->books_add();
		}
		$this->load->model('admin/library_model','get_book');
	    $this->load->model('admin/library_model','library');
        $data['gifted_yes']=$this->library->get_book_id('yes');
        $data['gifted_no']=$this->library->get_book_id('no');
        //var_dump($data['gifted_yes']);
		$data['template']=TEMPLATE_ADMIN_NAME.'/books';
		$this->load->view('template-admin',$data);
	}
	
   	public function book_a()
	{
		$this->load->model('admin/library_model','library');
		$data['query_a']=$this->library->get_details_lib($this->input->get('book_id'));
		//var_dump($data['query_a']);

		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/book_ajax',$data);
	}
	
	public function show_book($book_id="")
	{
       
		$this->load->model('admin/library_model','library');
		$data['query']=$this->library->get_lib_1($book_id);
		$data['settings']=$this->library->get_lib_settings(1);
		//$data['query']=$this->library->book();
		//var_dump($data['query']);
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'issue_date',
	                'label' => 'Issue Date',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'due_date',
	                'label' => 'Due Date',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'adm_number',
	                'label' => 'Admission/Employe Number',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
			$data['template']=TEMPLATE_ADMIN_NAME.'/show_book';
			$this->load->view('template-admin',$data);
		}
		else
		{
			 $data['message']=$this->library->issue_book();
			
	        $data['template']=TEMPLATE_ADMIN_NAME.'/show_book';
			$this->load->view('template-admin',$data);
		}
	    
	}

   	public function student()
	{
		$this->load->model('admin/library_model','get_student');
	    $data['query']=$this->class->student_result();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/get_student';
		$this->load->view('template-admin',$data);
	}
	
	public function newspaper_detail()
	{
		$this->load->model('admin/library_model','newspaper');
	    if($this->input->post()){ $data['message']=$this->newspaper->add_newspaper_detail(); }
	    $data['query']=$this->newspaper->all_newspaper();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/newspaper_detail';
		$this->load->view('template-admin',$data);
	}
	
	public function issue_search()
	 {
		$this->load->model('admin/library_model','library');
		if($this->input->get('student_id')!="")
		{
		$data['query']=$this->library->get_student($this->input->get('student_id'),$this->input->get('issue_to'));
			if($data['query']!=NULL) 
			{ 
				$data['query']->issue_to=$this->input->get('issue_to'); 
			}
		}
		else
		{
			$data['query']=NULL;
		}
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/student_name_library_ajax',$data);
	}

		public function search_fine()
	{
		
		$this->load->model('admin/library_model','get_fine');
	    //$data['query']=$this->library->get_fine();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/search_fine';
		$this->load->view('template-admin',$data);
        
	}
	 
	public function search_fine_ajax()
	{
		$data['query']=$this->library->get_details_fine($this->input->get('adm_no'),$this->input->get('status'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/search_fine',$data);
	}

	public function search_book_ajax()
	{
		$data['query']=$this->library->get_details_book($this->input->get('adm_no'),$this->input->get('status'));
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/search_book',$data);
	}

	public function staff()
	{
		
		$this->load->model('admin/library_model','get_staff');
	    $data['query']=$this->class->staff_result();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/get_staff';
		$this->load->view('template-admin',$data);
        
	}
	 
	public function staff_a()
	{
		$this->load->model('admin/library_model','library');
		$data['query']=$this->library->get_details_staff($this->input->get('staff_id'));
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/staff_ajax',$data);
	}

	public function subscription()
    {
      	$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_rules('magazine_id', 'magazine name', 'required');
	    $this->form_validation->set_rules('subscription_start', 'subscription start', 'required');
	    $this->form_validation->set_rules('subscription_end', 'subscription end', 'required');
	    $this->form_validation->set_rules('amount', 'amount', 'required');
	    if ($this->form_validation->run() === FALSE)
	    {
	        
	    }
	    else
	    {
	       $data['message']=$this->library->subscription();
	    }
	    $data['magazine_data']=$this->library->get_magazine_details();
        //var_dump($data['magazine_data']);
        $data['template']=TEMPLATE_ADMIN_NAME.'/subscription';
	    $this->load->view('template-admin',$data);
 	}

 	public function magazine()
 	{
 		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_rules('title', 'title', 'required');
	    if ($this->form_validation->run() === FALSE)
	    {
	       
	    }
	    else
	    {
	       $data['message']=$this->library->magazine();
	    }
	    $data['template']=TEMPLATE_ADMIN_NAME.'/magazine';
		$this->load->view('template-admin',$data);
 	}

 	/*public function edition_data_ajax()
 	{
 		$this->load->model('admin/library_model','library');
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/edition_insert_data',$data);
 	}*/

 	public function subscription_year_ajax()
 	{
 		$this->load->model('admin/library_model','library');
		$data['query']=$this->library->get_subscription_details($this->input->get('magazine_id'));
		//var_dump($data['query']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/subscription_year_select',$data);
 	}

 	public function edition()
 	{
 		$data['magazine_data']=$this->library->get_magazine_details();
 		//var_dump($data['magazine_data']);
 		if($this->input->post())
 		{
 			$data['message']=$this->library->add_edition();
 		}
	    $data['template']=TEMPLATE_ADMIN_NAME.'/edition';
		$this->load->view('template-admin',$data);
 	}

 	public function title_suggestion_ajax()
 	{
 		$data['query']=$this->library->get_suggestion_book($this->input->get('value'),$this->input->get('what'),$this->input->get('table'));
 		$data['what']=$this->input->get('what');
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/title_suggestion_ajax',$data);
 	}

 	public function returnbook($accession_no="")
 	{
 		if($accession_no=="")
 		{
 			$data['template']=TEMPLATE_ADMIN_NAME.'/return_book';
		    $this->load->view('template-admin',$data);
 		}
 		else
 		{
 			$data['query']=$this->library->returnbook($accession_no);
		    $this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/return_book',$data);
 		}
 	}
 	
   public function returnbookinsert()
 	{
 		$this->library->returnbookinsert($this->input->get('issue_id'),$this->input->get('fine'),$this->input->get('student_id'));
 	}

  public function reissuebook($accession_no="")
 	{
 		if($accession_no=="")
 		{
 			$data['template']=TEMPLATE_ADMIN_NAME.'/reissue_book';
		    $this->load->view('template-admin',$data);
 		}
 		else
 		{
 			$data['query']=$this->library->reissue_book($accession_no);
		    $this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/reissue_book',$data);
 		}
 	}
 	
   

 	public function pendingfine()
	  {
	    	$data['query']=$this->library->pendingfine();
	    	$data['template']=TEMPLATE_ADMIN_NAME.'/pending_fine';
		    $this->load->view('template-admin',$data);
	  }

	  public function bookshistory()
	  {
	    	$data['query']=$this->library->bookshistory();
	    	//var_dump($data['query']);
	    	$data['template']=TEMPLATE_ADMIN_NAME.'/books_issued';
		    $this->load->view('template-admin',$data);
	  }

	  public function all_magzine()
	  {
	  	$this->load->model('admin/library_model','library');
	  	$data['query']=$this->library->all_magzine();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/all_magzine';
		$this->load->view('template-admin',$data);
	  }

	  public function all_subscription($id)
	  {
	  	$this->load->model('admin/library_model','library');
	  	$data['query']=$this->library->all_subscription($id);
	    $data['template']=TEMPLATE_ADMIN_NAME.'/all_subscription';
		$this->load->view('template-admin',$data);
	  }
	  public function all_edition()
	  {
	  	$this->load->model('admin/library_model','library');
	  	$data['query']=$this->library->all_edition();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/all_edition';
		$this->load->view('template-admin',$data);
	  }
	   
	 
	public function newspaper()
 	{
 		$this->load->helper('form');
 		$this->load->model('admin/library_model','library');
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_rules('name', 'name', 'required');
	    if ($this->form_validation->run() === FALSE)
	    {
	       
	    }
	    else
	    {
	       $data['message']=$this->library->newspaper();
	    }
	    $data['template']=TEMPLATE_ADMIN_NAME.'/newspaper';
		$this->load->view('template-admin',$data);
 	}

 	public function all_newspaper()
	{
	  	$this->load->model('admin/library_model','library');
	  	$data['query']=$this->library->all_newspaper();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/all_newspaper';
		$this->load->view('template-admin',$data);
	}

	public function delete_book($id="")
	{
    	$this->load->model('admin/library_model','library');
    	$data['message']=$this->library->delete_book($id);
    	//$data['query']=$this->library->get_all_books();
		$data['template']=TEMPLATE_ADMIN_NAME.'/allbooks';
		$this->load->view('template-admin',$data);
    } 

    public function delete_magazine($id="")
	{
    	$this->load->model('admin/library_model','library');
    	$data['message']=$this->library->delete_magazine($id);
    	$data['query']=$this->library->all_magzine();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_magzine';
		$this->load->view('template-admin',$data);
    } 

    public function delete_edition($id="")
	{
    	$this->load->model('admin/library_model','library');
    	$data['message']=$this->library->delete_edition($id);
    	$data['query']=$this->library->all_edition();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_edition';
		$this->load->view('template-admin',$data);
    } 
    public function delete_newspaper($id="")
	{
    	$this->load->model('admin/library_model','library');
    	$data['message']=$this->library->delete_newspaper($id);
    	$data['query']=$this->library->all_newspaper();
       	$data['template']=TEMPLATE_ADMIN_NAME.'/all_newspaper';
		$this->load->view('template-admin',$data);
    } 
    public function delete_news_detail($id="")
    {
    	$this->load->model('admin/library_model','library');
    	$data['message']=$this->library->delete_news_detail($id);
    	$data['query']=$this->library->all_newspaper_detail();
    	$data['template']=TEMPLATE_ADMIN_NAME.'/all_news_detail';
    	$this->load->view('template-admin',$data);

    }
    public function all_newspaper_detail()
	  {
	  	$this->load->model('admin/library_model','library');
	  	$data['query']=$this->library->all_newspaper_detail();
	    $data['template']=TEMPLATE_ADMIN_NAME.'/all_news_detail';
		$this->load->view('template-admin',$data);
	  }
	  public function newspaper_report()
	{		
		$this->load->model('admin/library_model','newspaper');	   
	    if($this->input->post()){ $data['query']=$this->newspaper->newspaper_report();}
	    $data['template']=TEMPLATE_ADMIN_NAME.'/newspaper_report';
		$this->load->view('template-admin',$data);        
	}
	 
	public function newspaper_report_a()
	{
		$this->load->model('admin/library_model','newspaper');
		$data['query']=$this->newspaper->get_details_newspaper($this->input->get('newspaper_report_id'));
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/detail_ajax',$data);
	}


	public function print_barcode_page()
	{
		$books=$this->input->post("selected[]") ;
		foreach ($books as $key => $value) {
			echo '<img src="'.admin_url().'/library/print_barcode/'.$value.'" style="margin:30px 0 10px 20px;width:160px" ><br>';
		}
	}
	public function print_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$arrayReturn = array();
		for ($i=0; $i <10 ; $i++) { 
			$bar_code=Zend_Barcode::factory('code128', 'image', array('text'=>$code,'barHeight'=>'35','drawText'=>true,'barThinWidth'=>'1','barThickWidth'=>'3'),array());
			array_push($arrayReturn, $bar_code); 
		}
		foreach ($arrayReturn as $key => $value) {
			echo $value->render();
		}
	}
	public function barcode_books()
	{
		//$data['query']=$this->library->get_all_books();
		$data['template']=TEMPLATE_ADMIN_NAME.'/barcode_books';
		$this->load->view('template-admin',$data);
	}

	public function barcode()
	{
		//$data['query']=$this->library->get_all_books();
		$data['template']=TEMPLATE_ADMIN_NAME.'/barcode';
		$this->load->view('template-admin',$data);
	}

	public function library_card()
	{
		//$data['query']=$this->library->get_all_books();
		$data['template']=TEMPLATE_ADMIN_NAME.'/library_card';
		$this->load->view('template-admin',$data);
	}
	public function discard_book($id="")
	{
		$this->load->model('admin/library_model','library');
		$data['message']=$this->library->discard_book($id);
		$data['query']=$this->library->discard();
		$data['template']=TEMPLATE_ADMIN_NAME.'/discard_book';
		$this->load->view('template-admin',$data);
	}
	public function library_card_search($id)
	{
		$this->load->model('admin/admission_model','adm');
		$data['query']=$this->adm->get_full_details_adm($id);
		$this->load->model('admin/classes_model','cls');
		$data['class_name']=$this->cls->get_details($data['query']->class_id);
		//var_dump($data['class_name']);
		$this->load->model('admin/section_model','section');
		$data['section_name']=$this->section->get_section($data['query']->section_id);
		//var_dump($data['section_name']);
		$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/show_library_card',$data);
	}
	
	public function update_magazine($id="")
	{
		$this->load->model('admin/library_model','library');
		if($this->input->post()){$data['message']=$this->library->update_magazine($id);}
		$data['query']=$this->library->get_magazine($id);
		$data['query2']=$this->library->all_magzine();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_magazine';
		$this->load->view('template-admin',$data);
	}
	public function update_edition($id="")
	{
		$this->load->model('admin/library_model','library');
		if($this->input->post()){$data['message']=$this->library->update_edition($id);}
		$data['result']=$this->library->get_edition($id);
		$data['query']=$this->library->all_edition();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_edition';
		$this->load->view('template-admin',$data);
	}
	public function update_newspaper($id="")
	{
		$this->load->model('admin/library_model','library');
		if($this->input->post()){$data['message']=$this->library->update_newspaper($id);}
		$data['query']=$this->library->get_newspaper($id);
		$data['query2']=$this->library->all_newspaper();
		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_newspaper';
		$this->load->view('template-admin',$data);
	}
 	public function update_news_detail($id="")
 	{
 		$this->load->model('admin/library_model','library');
 		if($this->input->post()){$data['message']=$this->library->update_news_detail($id);}
 		$data['result']=$this->library->get_news_detail($id);
 		$data['query']=$this->library->all_newspaper_detail();
 		$data['template']=TEMPLATE_ADMIN_NAME.'/edit_news_detail';
 		$this->load->view('template-admin',$data);
 	}
}
?>