<?php
class Accounts_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  
	public function add_account_type()
  {
    $data = array(
        'name' => $this->input->post('name'),
        
        );
    $res=$this->db->insert('account_type', $data); 
    if($res)
        {
      $message='Successfully Added';
      return $message;
    }
     
  }
	public function all_account_type()
  {
     $query = $this->db->query("select * from account_type");
     if($query=='')
     {
        $query=array();
        return $query;
     }
     else
     {
        return $query->result();
     }
     
  }
  
  public function dashboard(){
    
  }

  public function add_income(){
    $data = array(
        'voucher' => $this->input->post('voucher'),
        'account_type' => $this->input->post('account_type'),
        'amount' => $this->input->post('amount'),
        'date' => $this->input->post('date'),
        'remarks' => $this->input->post('remarks'),
        'type' => 'income'
        
        );
    $res=$this->db->insert('account_transactions', $data); 
    if($res)
        {
      $message='Successfully Added';
      return $message;
      }
  }

  public function add_expense(){
    $data = array(
        'voucher' => $this->input->post('voucher'),
        'account_type' => $this->input->post('account_type'),
        'amount' => $this->input->post('amount'),
        'date' => $this->input->post('date'),
        'remarks' => $this->input->post('remarks'),
        'type' => 'expense'
        
        );
    $res=$this->db->insert('account_transactions', $data); 
    if($res)
        {
      $message='Successfully Added';
      return $message;
      }
  }


  public function gen_reports(){
      $from=$this->input->get('from');
      $to=$this->input->get('to');
      $report_type=$this->input->get('report_type');
      if($report_type==0){ 
      $query = $this->db->query("select * from account_transactions where date between '$from' and '$to' and type='income'");
      }
      if($report_type==1){ 
      $query = $this->db->query("select * from account_transactions where type='expense' and date(date) between $from and $to");
      }
     if($query=='')
     {
        $query=array();
        return $query;
     }
     else
     {
        return $query->result();
     }
  }

}