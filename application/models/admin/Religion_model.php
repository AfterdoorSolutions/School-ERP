<?php
class Religion_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name')
       
        );
		$res=$this->db->insert('religion', $data); 
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
        );
        $this->db->where('religion_id', $id);
		$res=$this->db->update('religion', $data); 
		if($res)
        {
			$message='Successfully Updated';
			return $message;
		}
	}
	public function get_details($id=''){
     $query = $this->db->get_where('religion',array('religion_id'=>$id));
     return $query->row_array();
	}

 
 public function delete($id)
  {
       
      $this->db->where('religion_id', $id);
      $res=$this->db->delete('religion');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
}
public function religion()
	{
        $query = $this->db->query('select * from religion');
        return $query->result_array();
        $query=$this->db->query("select * from caste where religion_id='$value->religion_id'");
        if($query->num_rows() != 0)
        {
        echo 'already defined';
        } else {
        echo 'Successfully Deleted';
        }
}
}  
