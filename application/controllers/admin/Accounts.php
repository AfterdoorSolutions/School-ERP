<?php
class Accounts extends MY_Controller{

	public function __construct(){
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		$this->load->model('admin/accounts_model','accounts');
		
	}

	public function index(){
		$data['query']=$this->accounts->dashboard();
		$data['template']=TEMPLATE_ADMIN_NAME.'/accounts_dashboard';
	}
	
	public function account_type(){
  		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required'
	        )

		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
             
			$data['query']=$this->accounts->all_account_type();
			$data['template']=TEMPLATE_ADMIN_NAME.'/all_account_type';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			if($this->input->post()){$data['message']=$this->accounts->add_account_type();}
			$data['query']=$this->accounts->all_account_type();
			$data['template']=TEMPLATE_ADMIN_NAME.'/all_account_type';
			$this->load->view('template-admin',$data);
        }
  		
                
	}

	public function account_type_actions($update="",$id=""){

    }

    public function income(){
    	$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'voucher',
	                'label' => 'Voucher',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'account_type',
	                'label' => 'Account Type',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'amount',
	                'label' => 'Amount',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'date',
	                'label' => 'Date',
	                'rules' => 'required'
	        )

		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_income';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			if($this->input->post()){$data['message']=$this->accounts->add_income();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_income';
			$this->load->view('template-admin',$data);
        }
    }


    public function expense(){
    	$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
    	$config = array(
	        array(
	                'field' => 'voucher',
	                'label' => 'Voucher',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'account_type',
	                'label' => 'Account Type',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'amount',
	                'label' => 'Amount',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'date',
	                'label' => 'Date',
	                'rules' => 'required'
	        )

		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
        {
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_expense';
			$this->load->view('template-admin',$data);
        }
        else
        {	
			if($this->input->post()){$data['message']=$this->accounts->add_expense();}
			$data['template']=TEMPLATE_ADMIN_NAME.'/add_expense';
			$this->load->view('template-admin',$data);
        }
    }
	 public function reports(){
			$data['template']=TEMPLATE_ADMIN_NAME.'/accounts_reports';
			$this->load->view('template-admin',$data);
	 }

	 public function gen_reports(){
			
			$data['query']=$this->accounts->gen_reports();
			var_dump($data['query']);
			$this->load->view(TEMPLATE_ADMIN_NAME.'/ajax/gen_accounts_reports',$data);
	 }
}
?>