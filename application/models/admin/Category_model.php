<?php
class Category_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  
	public function category_result()
  {
     $query = $this->db->query("select * from category");
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
	
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'parent'=> $this->input->post('parent'),
        
        );
		$res=$this->db->insert('category', $data); 
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
        $this->db->where('category_id', $id);
		$res=$this->db->update('category', $data); 
		if($res)
    {
			$message='Successfully updated';
			return $message;
		}
	}

	public function get_details($id){
     $query = $this->db->get_where('category',array('category_id'=>$id));
     return $query->row_array();
	}

  public function delete($id)
  {
       
      $this->db->where('category_id', $id);
      $res=$this->db->delete('category');
      if($res)
      {
  			$message='Successfully Deleted';
  			return $message; 
      }
  }

  public function category()
	{
        $query = $this->db->query('select * from category  ');
        return $query->result_array();
	}

}