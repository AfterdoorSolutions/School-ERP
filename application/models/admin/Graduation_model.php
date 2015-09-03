<?php
class Graduation_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'type'=> $this->input->post('type')
        );
		$res=$this->db->insert('graduation', $data); 
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
        'type'=> $this->input->post('type')
        );
        $this->db->where('graduation_id', $id);
		$res=$this->db->update('graduation', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}
	public function get_details($id){
     $query = $this->db->get_where('graduation',array('graduation_id'=>$id));
     return $query->row_array();
	}

  public function delete($id)
  {
       
      $this->db->where('graduation_id', $id);
      $res=$this->db->delete('graduation');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
}
  public function graduation()
	{
        $query = $this->db->query('select * from graduation');
        return $query->result_array();
	}

}