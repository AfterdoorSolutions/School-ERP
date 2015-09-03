<?php
class Browse extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model("browse_model",'users');
		//$this->output->enable_profiler(TRUE);
	}

	public function index(){
		if($this->is_logged_in()==false)
		{
			//redirect('/profile/login');
		}

		$config = array();
        $config["base_url"] = base_url() . "browse/index";
        $config["total_rows"] = $this->users->record_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $search=array('gender'=>$this->input->post('gender'));
        $data["results"] = $this->users->fetch_users($config["per_page"], $page,$search);
        //var_dump($data["results"]);
        $data["links"] = $this->pagination->create_links();
		$data['template'] = TEMPLATE_NAME.'/browse';
		$this->load->view('template',$data);
	}


	public function search(){
		if($this->is_logged_in()==false)
		{
			//redirect('/profile/login');
		}

		$config = array();
        $config["base_url"] = base_url() . "browse/search";
        $config["total_rows"] = $this->users->record_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $search=array('gender'=>$this->input->post('gender'));
        $data["results"] = $this->users->fetch_users_search($config["per_page"], $page,$search);
    
        //var_dump($data["results"]);
        $data["links"] = $this->pagination->create_links();
		$data['template'] = TEMPLATE_NAME.'/browse';
		$this->load->view('template',$data);
	}
	public function profile_search()
	{
		$abc=$this->load->model('browse_model','search');
		$abc=$this->search->search();
		//var_dump($abc);
		//return $abc;
		$data['result']=$abc;
		//$data['template'] = TEMPLATE_NAME.'/browse_data';
		$this->load->view(TEMPLATE_NAME.'/browse_data',$data);
	}
	
}
