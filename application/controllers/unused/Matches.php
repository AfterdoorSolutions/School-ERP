<?php
class Matches extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model("matches_model",'matches');

                $this->load->model('home_model','home_data');
                
	}

	public function index(){
		redirect('matches/accepted');
	}
	public function accepted()
	{
	    $config = array();
        $config["base_url"] = base_url() . "matches/accepted";
        $config["total_rows"] = $this->matches->record_count(array('from'=>$this->is_logged_in(),'status ='=>'accepted'));
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["results"] = $this->matches->accepted($config["per_page"], $page,$this->is_logged_in());
        $data["links"] = $this->pagination->create_links();
        $data['inbox_total']=$this->matches->record_count(array('to'=>$this->is_logged_in(),'status'=>'unread'));
        $data['success_story']=$this->home_data->success_story();
        $data['template'] = TEMPLATE_NAME.'/matches';
		$this->load->view('template',$data);
	}


	public function interest_sent()
	{
	    $config = array();
        $config["base_url"] = base_url() . "matches/interest_sent";
        $config["total_rows"] = $this->matches->record_count(array('from'=>$this->is_logged_in(),'status ='=>'pending'));
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["results"] = $this->matches->accepted($config["per_page"], $page,$this->is_logged_in());
        $data["links"] = $this->pagination->create_links();
        $data['inbox_total']=$this->matches->record_count(array('to'=>$this->is_logged_in(),'status'=>'pending'));
        $data['success_story']=$this->home_data->success_story();
        $data['template'] = TEMPLATE_NAME.'/matches';
		$this->load->view('template',$data);
	}


	public function interest_received()
	{
	    $config = array();
        $config["base_url"] = base_url() . "matches/interest_received";
        $config["total_rows"] = $this->matches->record_count(array('from'=>$this->is_logged_in()));
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["results"] = $this->matches->accepted($config["per_page"], $page,$this->is_logged_in());
        $data["links"] = $this->pagination->create_links();
        $data['inbox_total']=$this->matches->record_count(array('to'=>$this->is_logged_in()));
        $data['success_story']=$this->home_data->success_story();
        $data['template'] = TEMPLATE_NAME.'/matches';
		$this->load->view('template',$data);
	}




}
