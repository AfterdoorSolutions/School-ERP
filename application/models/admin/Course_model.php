<?php
class Course_model extends MY_Model
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
    $content=array(
      'overview'=>$this->input->post('overview'),
      'course_content'=>$this->input->post('course_content'),
      'category_id'=>$this->input->post('category_id'),
      'partner'=>$this->input->post('partner'),
      );
    $content=serialize($content);
		$data = array(
        'name' => $this->input->post('name'),
        'slug' => $this->input->post('slug'),
        'content' => $content,
        'seo_content' => $this->input->post('seo_content'),
        'author' => $this->config->item('user_portal_id'),
        'post_type'=>'course'
         );
		$res=$this->db->insert('content', $data); 
		if($res)
        {
			$message='Successfully Added';
			return $message;
		}
	}
	public function partner()
    {
       $query = $this->db->query("select * from partner");
       if($query=='')
       {
       		$query=array();
       		return $query;
       }
       else
       {
       		return $query->result_array();
       }
    }
    public function category()
    {
       $query = $this->db->query("select * from category");
       if($query=='')
       {
          $query=array();
          return $query;
       }
       else
       {
          return $query->result_array();
       }
    }
	public function main($id="")
	{
		$content=array(
      'overview'=>$this->input->post('overview'),
      'course_content'=>$this->input->post('course_content'),
      'category_id'=>$this->input->post('category_id'),
      'partner'=>$this->input->post('partner'),
      );
    $content=serialize($content);
    $data = array(
        'name' => $this->input->post('name'),
        'slug' => $this->input->post('slug'),
        'content' => $content,
        'seo_content' => $this->input->post('seo_content'),
        'author' => $this->config->item('user_portal_id'),
        'post_type'=>'course'
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


  public function course()
	{
        $query = $this->db->query('select * from content where post_type="course"');
        return $query->result_array();
	}

}