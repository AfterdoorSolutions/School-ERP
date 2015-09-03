<?php
class Messages extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model("messages_model",'messages');
	}

	public function index(){
		redirect('messages/inbox');
	}
	public function trash_message($id='')
	{
		$this->messages->trash_message($id);
		redirect('messages/inbox');
	}
	public function delete($id='')
	{
		$this->messages->delete($id);
		redirect('messages/inbox');
	}
	public function inbox()
	{
		$config = array();
        $config["base_url"] = base_url() . "messages/inbox";
        $config["total_rows"] = $this->messages->record_count(array('to'=>$this->is_logged_in(),'status !='=>'trash'));
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
	    $config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['name']="Inbox";
        $data["results"] = $this->messages->inbox($config["per_page"], $page,$this->is_logged_in());
        $data["links"] = $this->pagination->create_links();
        $data['inbox_total']=$this->messages->record_count(array('to'=>$this->is_logged_in(),'status'=>'unread'));
        $data['template'] = TEMPLATE_NAME.'/messages';
		$this->load->view('template',$data);
	}

	public function sent()
	{
		$config = array();
        $config["base_url"] = base_url() . "messages/sent";
        $config["total_rows"] = $this->messages->record_count('from',$this->is_logged_in());
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['name']="Sent";
        $data["results"] = $this->messages->sent($config["per_page"], $page,$this->is_logged_in());
        $data["links"] = $this->pagination->create_links();
        $data['inbox_total']=$this->messages->record_count(array('to'=>$this->is_logged_in(),'status'=>'unread'));
        $data['template'] = TEMPLATE_NAME.'/messages';
		$this->load->view('template',$data);
	}

	public function trash()
	{
		$config = array();
        $config["base_url"] = base_url() . "messages/sent";
        $config["total_rows"] = $this->messages->record_count('from',$this->is_logged_in());
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['name']="Trash";
        $data['trash_true']="Trash";
        $data["results"] = $this->messages->trash($config["per_page"], $page,$this->is_logged_in());
        $data["links"] = $this->pagination->create_links();
        $data['inbox_total']=$this->messages->record_count(array('to'=>$this->is_logged_in(),'status'=>'unread'));
        $data['template'] = TEMPLATE_NAME.'/messages';
		$this->load->view('template',$data);
	}
	public function compose(){
		$this->load->model('messages_model','send');
			if($this->input->post())
			{
				$this->send->compose();redirect('browse');
			}
			else{
				$this->load->view(TEMPLATE_NAME.'/compose');
			}
	}
}
