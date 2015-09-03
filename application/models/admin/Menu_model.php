<?php
class menu_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function menu_result()
    {
       $query = $this->db->query("select * from menu");
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

	public function insert_menu()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'parent'=> $this->input->post('parent'),
        'sort'=> $this->input->post('sort'),
        'link'=> $this->input->post('link')
        );
		$res=$this->db->insert('menu', $data); 
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
        'sort'=> $this->input->post('sort'),
        'link'=> $this->input->post('link')
        );
        $this->db->where('menu_id', $id);
		$res=$this->db->update('menu', $data); 
		if($res)
        {
			$message='Successfully Updated';
			return $message;
		}
	}

	public function get_details($id)
	{
	     $query = $this->db->get_where('menu',array('menu_id'=>$id));
	     return $query->row_array();
	}
 
 	public function delete($id)
  	{
      	$this->db->where('menu_id', $id);
     	$res=$this->db->delete('menu');
      	if($res)
        {
			$message='Successfully Deleted';
			return $message;
  		}
	}
	 public function menu()
	{
        $query = $this->db->query('select * from menu');
        return $query->result_array();
	}

}
