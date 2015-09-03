<?php
class Partner_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name'),
         'image' => $this->input->post('image'),
        'description'=> $this->input->post('description')
        );
		$res=$this->db->insert('partner', $data); 
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
         'image' => $this->input->post('image'),
        'description'=> $this->input->post('description')
        );
        $this->db->where('partner_id', $id);
		$res=$this->db->update('partner', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}

	public function get_details($id)
	{
     $query = $this->db->get_where('partner',array('partner_id'=>$id));
     return $query->row_array();
	}

  public function delete($id)
  {
       
      $this->db->where('partner_id', $id);
      $res=$this->db->delete('partner');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
}
  public function partner()
	{
        $query = $this->db->query('select * from partner');
        return $query->result();
	}
 public function upload_image($id,$filename){
        $data = array(
        'user_id' => $id,
        'image' => "uploads/partners/".$filename,
        'type'=>"profile"
        );
        
       
      
         $rest=$this->db->insert('partner', $data);

    }
   
}

?>