<?php
class Content_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$slug=$this->input->post('slug');
		/*if($slug=''){

		}*/
		$data = array(
        'name' => $this->input->post('name'),
        'slug' => $this->input->post('slug'),
        'content' => $this->input->post('content'),
        'seo_content' => $this->input->post('seo_content'),
        'author' => $this->config->item('user_portal_id'),
        'post_type'=>'page'
         );
		$res=$this->db->insert('content', $data); 
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
        'slug' => $this->input->post('slug'),
        'content' => $this->input->post('content'),
        'seo_content' => $this->input->post('seo_content'),
        'author' => $this->config->item('user_portal_id'),
        'post_type'=>'page'
         );
        $this->db->where('content_id', $id);
		$res=$this->db->update('content', $data); 
		if($res)
        {
			$message='Successfully Updated';
			return $message;
		}
	}
	public function get_details($id){
     $query = $this->db->get_where('content',array('content_id'=>$id));
     return $query->row_array();
	}
 
 public function delete($id)
  {
       
      $this->db->where('content_id', $id);
      $res=$this->db->delete('content');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
  }


  public function language()
	{
        $query = $this->db->query('select * from content where post_type="page"');
        return $query->result_array();
	}

}