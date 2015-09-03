<?php 

/**
* 
*/
class Section_model extends MY_Model
{
	
	function __construct()
	{
		# code...
	}

	public function sections_result()
  	{
	    $query = $this->db->query("select * from section");
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
	  public function section_result()
	  {

	     $section_id=$this->config->item('admin_section_id');
	     $query = $this->db->query("select * from section where section_id='$section_id'");
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
    public function get_section($id)
    {
		$query_sections = $this->db->query("SELECT * FROM `section` where `section_id`='$id'");
		return $query_sections->row();
	}
	
    public function get_batches($id)
    {
		$query_batches = $this->db->query("SELECT * FROM `batches` where `batch_id`='$id'");
		return $query_batches->row();
	}
	
    public function get_batch($id='')
    {
		if($id!=''){
			$query_batch = $this->db->query("SELECT * FROM `batch` where `batch_id`='$id'");
			return $query_batch->row();
		}
		else{
			$query_batch = $this->db->query("SELECT * FROM `batch`");
			return $query_batch->result();
		}
	}

	public function get_details_sec($id)
	{
	    $query = $this->db->get_where('section',array('class_id'=>$id));
	    return $query->result();
	}
	public function get_details_sub($class_id,$section_id,$batch_id)
	{
	    $query = $this->db->get_where('subject',array('class_id'=>$class_id,'batch_id'=>$batch_id,'section_id'=>$section_id));
	    return $query->result();
	}
	
	public function get_details_batch($section_id)
	{
	    $query = $this->db->get_where('batches',array('section_id'=>$section_id));
	    //return $query->result();
	    $data=array();
	    foreach ($query->result() as $key => $value) {
	    	$data[]=$value;

	    	$query2=$this->db->query("select * from batch where batch_id='$value->batch'");
            $query2=$query2->row_array();
            if($query2)
            {
                $data[$key]->start_date=$query2['start_date'];
                $data[$key]->end_date=$query2['end_date'];
            }
            else
            {
                $data[$key]->start_date='-';
                $data[$key]->end_date='-';
            }
	    }
	    return $data;
	}

  public function get_section1($id)
  {
     $query = $this->db->get_where('section',array('section_id'=>$id));
     return $query->row_array();
  }
  public function update_section($id="")
  {
    $data = array(
        
        'name' => $this->input->post('name')
          );
    $this->db->where('class_id', $id);
    $res=$this->db->update('class', $data); 
    if($res)
        {
      $message='Successfully updated';
      return $message;
    }
  }
	public function get_sections_academic_year($class_id='',$batch_id='')
	{
		$query=$this->db->query("select * from batches where class_id='$class_id' and batch='$batch_id'");
		//return $query->result();
		$data=array();
		foreach ($query->result() as $key => $value) {
			$data[]=$value;
			$query_2=$this->db->query("select * from section where section_id='$value->section_id'");
			$query_2=$query_2->row();
			if($query_2){
				$data[$key]->name=$query_2->name;
			}
			else{
				$data[$key]->name='';
			}
		}
		return $data;
	}
}

