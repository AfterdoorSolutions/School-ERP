<?php

class Search extends MY_Controller{
	public function index(){
	
	}
	public function search(){
		if($this->is_logged_in()==false)
		{
		$data['title']="search";
    	$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        
	        array(
	                'field' => 'select',
	                'label' => 'select',
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
	       
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
                {
                     
						$data['template'] = TEMPLATE_NAME.'/search';
				    	$this->load->view('template',$data);
                }
    }
}