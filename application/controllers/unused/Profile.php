<?php

class Profile extends MY_Controller{
	public function index($id='')
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Profile";
			$data['user_id']=$this->is_logged_in();   
			$this->load->model('Profile_model','profile');
			$data['query']=$this->profile->profile($this->is_logged_in());
			$data['template'] = TEMPLATE_NAME.'/profile';
	    	$this->load->view('template',$data);
	        
	    }
      	else
      	{
      		$data['title']="Profile";
			$data['user_id']=$this->is_logged_in();   
			$this->load->model('Profile_model','profile');
			$data['query']=$this->profile->profile($id);
			$data['template'] = TEMPLATE_NAME.'/profile';
	    	$this->load->view('template',$data);
      	}
	}

	public function edit_basic()
	{
		$this->load->model('Profile_model','basic');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			$this->basic->basic_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->basic->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_basic',$data);
		}

	}

	public function edit_contact()
	{
		$this->load->model('Profile_model','contact');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			$this->contact->contact_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->contact->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_contact',$data);
		}

	}

	public function edit_about()
	{
		$this->load->model('Profile_model','about');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			$this->about->about_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->about->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_about',$data);
		}

	}

	public function edit_about_family()
	{
		$this->load->model('Profile_model','about_family');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			$this->about_family->about_family_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->about_family->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_about_family',$data);
		}

	}

	public function edit_about_education()
	{
		$this->load->model('Profile_model','about_education');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			$this->about_education->about_education_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->about_education->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_about_education',$data);
		}

	}

	public function edit_about_work()
	{
		$this->load->model('Profile_model','about_work');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			$this->about_work->about_work_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->about_work->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_about_work',$data);
		}

	}

	public function edit_family()
	{
		$this->load->model('Profile_model','family_e');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			$this->family_e->family_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->family_e->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_family',$data);
		}

	}

	public function edit_education()
	{
		$this->load->model('Profile_model','education_e');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			$this->education_e->education_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->education_e->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_education',$data);
		}

	}

	public function edit_lifestyle()
	{
		$this->load->model('Profile_model','lifestyle_e');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			$this->lifestyle_e->lifestyle_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->lifestyle_e->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_lifestyle',$data);
		}

	}

	public function edit_kundli()
	{
		$this->load->model('Profile_model','astro');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			//echo "Inside edit";
			$this->astro->kundli_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->astro->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_kundli',$data);
		}

	}

	public function edit_hobby()
	{
		$this->load->model('Profile_model','hobby_ed');
		$data['user_id']=$this->is_logged_in();   
		if($this->input->post())
		{
			
			//echo "Inside edit";
			$this->hobby_ed->hobby_update($this->is_logged_in());
		    redirect('profile');
		}
		else
		{
			$data['query']=$this->hobby_ed->profile($this->is_logged_in());
			$this->load->view(TEMPLATE_NAME.'/edit_hobby',$data);
		}

	}


	public function register(){
		if($this->is_logged_in()==false)
		{
		$data['title']="Register";
    	$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'field',
	                'rules' => 'required|valid_email|is_unique[user.name]'
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'password',
	                'rules' => 'required|alpha_numeric'
	        ),
	        array(
	                'field' => 'name',
	                'label' => 'Name',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile_for',
	                'label' => 'Profile for',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'dob',
	                'label' => 'Date of birth',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'height',
	                'label' => 'Height',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'country_id',
	                'label' => 'Country',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'city_id',
	                'label' => 'City',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'marital',
	                'label' => 'marital status',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'mtongue',
	                'label' => 'Mother tongue',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'religion_id',
	                'label' => 'Religion',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'caste_id',
	                'label' => 'Caste',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'mob_prefix',
	                'label' => 'mobile prefix',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'mob_num',
	                'label' => 'mobile num',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'terms',
	                'label' => 'terms & conditons',
	                'rules' => 'required'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
                {
                     
				    	//echo "false";
						$data['template'] = TEMPLATE_NAME.'/register';
				    	$this->load->view('template',$data);
                }
                else
                {
						//echo "true";
						$this->load->model('profile_model','profile');
						$this->profile->register();
						//echo $data['message_profile'];

						$data['template'] = TEMPLATE_NAME.'/register';
				    	$this->load->view('template',$data);
				    	//redirect('/profile/family');
                }
		}
        else
        {
        	redirect('/dashboard');
        }
	}

	public function login(){
		if($this->is_logged_in()==false)
		{
		$data['title']="Login";
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'email',
	                'rules' => 'required|valid_email|is_unique[caste.name]'
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'password',
	                'rules' => 'required|alpha_numeric'
	        )
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
                {
                     
						$data['template'] = TEMPLATE_NAME.'/login';
				    	$this->load->view('template',$data);
                }
                else
                {
						$this->load->model('profile_model','login');
						$data['message']=$this->login->login();
						if($data['message']==1){ redirect('/dashboard');}
						else
						{
							$data['template'] = TEMPLATE_NAME.'/login';
				    	}
				    	$this->load->view('template',$data);
                }
        }
        else
        {
        	redirect('/dashboard');
        }
         
	}

	public function view($id=""){
		if($this->is_logged_in()==false)
		{
			redirect('/profile/login');
		}
		else{
			$this->load->model('profile_model','profile');
			$abc=$this->profile->view($id);    
			$data['title']="Profile";
			foreach ($abc[0] as $key => $value) {
				$data[$key]=$value;
			}
			$data['template'] = TEMPLATE_NAME.'/view_profile';
			$this->load->view('template',$data);}
	}

	public function logout(){
		if($this->is_logged_in()==false)
		{
			
			redirect('/profile/login');
		}
		else
		{
			$this->session->sess_destroy();
			$this->config->set_item('user_id','');
			delete_cookie('matri_user');	
			redirect('');

		}
	}

	public function education()
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Education";
			$data['user_id']=$this->is_logged_in();
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
	    	$config = array(
		        array(
		                'field' => 'income',
		                'label' => 'income',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'occupation',
		                'label' => 'occupation',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'highest_id',
		                'label' => 'Highest Degree',
		                'rules' => 'required'
		        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	             
					$data['template'] = TEMPLATE_NAME.'/education';
			    	$this->load->view('template',$data);
	        }
	        else
	        {
					$this->load->model('profile_model','education');
					$data['message']=$this->education->education();
					
					$data['template'] = TEMPLATE_NAME.'/education';
			    	$this->load->view('template',$data);
	        }
	    }
	      else
	      {
	      	redirect('/profile/login');
	      }

	}

	public function family()
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Family";
			$data['user_id']=$this->is_logged_in();   
			if($this->input->post())
			{
				$this->load->model('profile_model','family');
				$data['message']=$this->family->family();
			}
			$data['template'] = TEMPLATE_NAME.'/family';
	    	$this->load->view('template',$data);
	        
	    }
      	else
      	{
      		redirect('/profile/login');
      	}
	}

	public function additional()
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Additional";
			$data['user_id']=$this->is_logged_in();   
			if($this->input->post())
			{
				$this->load->model('profile_model','additional');
				$data['message']=$this->additional->additional();
			}
			$data['template'] = TEMPLATE_NAME.'/additional';
	    	$this->load->view('template',$data);
	        
	    }
      	else
      	{
      		redirect('/profile/login');
      	}
	}

	public function lifestyle()
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Lifestyle";
			$data['user_id']=$this->is_logged_in();   
			if($this->input->post())
			{
				$this->load->model('profile_model','lifestyle');
				$data['message']=$this->lifestyle->lifestyle();
			}
			$data['template'] = TEMPLATE_NAME.'/lifestyle';
	    	$this->load->view('template',$data);
	        
	    }
      	else
      	{
      		redirect('/profile/login');
      	}
	}

	public function hobby()
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Lifestyle";
			$data['user_id']=$this->is_logged_in();   
			if($this->input->post())
			{
				$this->load->model('profile_model','hobby');
				$data['message']=$this->hobby->hobby();
			}
			$data['template'] = TEMPLATE_NAME.'/hobby';
	    	$this->load->view('template',$data);
	        
	    }
      	else
      	{
      		redirect('/profile/login');
      	}
	}

	public function kundli()
	{
		if($this->is_logged_in()==true)
		{
			$data['title']="Kundli";
			$data['user_id']=$this->is_logged_in();   
			if($this->input->post())
			{
				$this->load->model('profile_model','kundli');
				$data['message']=$this->kundli->kundli();
			}
			$data['template'] = TEMPLATE_NAME.'/kundli';
	    	$this->load->view('template',$data);
	        
	    }
      	else
      	{
      		redirect('/profile/login');
      	}
	}


	public function image_upload()
        {
        	    //$this->input->post('id')
        	
                $config['upload_path']          = './uploads/users/';
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
                        $this->load->model('profile_model','upload_image');
                        $this->upload_image->upload_image($this->is_logged_in(),$upload['upload_data']['file_name']);
	    				//redirect('/profile');
                }
        }
}
