<?php
class Location_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'parent'=> $this->input->post('parent'),
        );
		$res=$this->db->insert('location', $data); 
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
        'parent'=> $this->input->post('parent'),
        );
        $this->db->where('location_id', $id);
		$res=$this->db->update('location', $data); 
		if($res)
        {
			$message='Successfully Updated';
			return $message;;
		}
	}
	public function get_details($id){
     $query = $this->db->get_where('location',array('location_id'=>$id));
     return $query->row_array();
	}
 
 public function delete($id)
  {
      
      $this->db->where('location_id', $id);
      $res=$this->db->delete('location');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
}
public function location()
	{
        $query = $this->db->query('select * from location');
        return $query->result_array();
	}
}