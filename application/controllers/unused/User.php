   <?php

/**
* 
*/
class User extends MY_Controller
{
	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		
	}
	
	public function users() {
        parent::user();
	}

    public function main()
    {
    	
		$this->load->model('admin/User_model','user');
		$data['query']=$this->user->user();
		$data['template']=TEMPLATE_ADMIN_NAME.'/alluser';
		$this->load->view('template-admin',$data);
    }

    public function delete($id="")
    {
		
		$this->load->model('admin/User_model','user');
		$data['message']=$this->user->delete($id);
		$this->load->model('admin/User_model','user');
		$data['query']=$this->user->user();
		$data['template']=TEMPLATE_ADMIN_NAME.'/alluser';
		$this->load->view('template-admin',$data);
    }
    
    public function view($id='')
    {                           
    	$this->load->model('admin/User_model','user');
		$data['query']=$this->user->view($id);
		$data['template']=TEMPLATE_ADMIN_NAME.'/profile';
		$this->load->view('template-admin',$data);
    }
   
        }


   
 