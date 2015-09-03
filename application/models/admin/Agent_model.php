<?php
class Agent_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'address'=> $this->input->post('address'),
        'phone'=> $this->input->post('phone_no'),
        'email'=> $this->input->post('email'),
        'type'=> "agent",
        'parent_id'=> $this->input->post('distributor_id'),
        'password'=> md5($this->input->post('password'))
       
       
        );
		$res=$this->db->insert('user_portal', $data); 
		if($res)
        {
			$message='Successfully Added';
			return $message;
		}
	}
	public function main($id="")
	{
		$data = array(
        'name' => $this->input->post('name'),
        'address'=> $this->input->post('address'),
        'phone'=> $this->input->post('phone_no'),
        'email'=> $this->input->post('email'),
        'type'=> "agent",
        'parent_id'=> $this->input->post('distributor_id'),
       
        
        );
        $this->db->where('user_portal_id', $id);
		$res=$this->db->update('user_portal', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}
	public function get_details($id){
     $query = $this->db->get_where('user_portal',array('user_portal_id'=>$id,'type'=>'agent'));
     return $query->row_array();
	}

  public function delete($id)
  {
       
      $this->db->where('user_portal_id', $id);
      $res=$this->db->delete('user_portal');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
}
  public function agent()
	{
        $query = $this->db->query('select * from user_portal where type="agent"');
          //return $query->result_array();
        $data='';
       foreach ($query->result() as $key=>$value) 
       {
			      $data[] = $value;
          	$query=$this->db->query("select * from user_portal where user_portal_id='$value->parent_id' ");
          	$query=$query->row();
          	$data[$key]->distributor_name=$query->name;
       }
       return $data;
        
	}

}