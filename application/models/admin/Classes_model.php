<?php
class Classes_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  
	public function classes_result()
  {
     $query = $this->db->query('select * from class where status="active"');
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
  public function class_result()
  {
    $class_id=$this->config->item('admin_class_id');
     $query = $this->db->query("select * from class where class_id='$class_id'");
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
   public function batches_result()
  {
     $query = $this->db->query("select * from batches");
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
  public function batch_result()
  {
     $query = $this->db->query("select * from batch");
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

  public function result_batch($batch_id)
  {
    $query = $this->db->query("select * from batch where batch_id='$batch_id'");
     if($query=='')
     {
        $query=array();
        return $query;
     }
     else
     {
        return $query->row();
     }
  }
  public function subjects_result()
  {
     $query = $this->db->query("select * from subject");
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
  
 public function get_class($id)
  {
     $query = $this->db->get_where('class',array('class_id'=>$id));
     return $query->row_array();
  }
  public function update_class($id="")
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

  public function get_section($id)
  {
     $query = $this->db->get_where('section',array('section_id'=>$id));
     return $query->row_array();
  }
  public function update_section($id="")
  {
    $data = array(
        'class_id' => $this->input->post('class_id'),
        'name' => $this->input->post('name')
          );
    $this->db->where('section_id', $id);
    $res=$this->db->update('section', $data); 
    if($res)
        {
      $message='Successfully updated';
      return $message;
    }
  }
  public function get_batch($id)
  {
     $query = $this->db->get_where('batch',array('batch_id'=>$id));
     return $query->row_array();
  }
  public function update_batch($id="")
  {
    $data = array(
        'batch_id' => $this->input->post('batch_id'),
        'start_date' => $this->input->post('start_date'),
        'end_date' => $this->input->post('end_date'),
        'timestamp' => date('y-m-d',strtotime($this->input->post('timestamp')))
          );
    $this->db->where('batch_id', $id);
    $res=$this->db->update('batch', $data); 
    if($res)
        {
      $message='Successfully updated';
      return $message;
    }
  }
	public function main($id="")
	{
		$data = array(
        'name' => $this->input->post('name'),   
        
        );
        $this->db->where('class_id', $id);
		$res=$this->db->update('class', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}

	public function get_details($id)
  {
     $query = $this->db->get_where('class',array('class_id'=>$id));
     return $query->row_array();
	}
  public function delete_class($id)
   {          
      $res=$this->db->query("update class set status='inactive' where class_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
  public function delete($id)
  {
       
      $this->db->where('class_id', $id);
      $res=$this->db->delete('class');
      if($res)
      {
  			$message='Successfully Deleted';
  			return $message; 
      }
  }

  public function class_name()
	{
        $query = $this->db->query('select * from class');
        return $query->result_array();
	}

public function sections_add()
  {
    $data = array(
        'name' => $this->input->post('name'),
        'class_id'=>$this->input->post('class_id')
        
        );
    $res=$this->db->insert('section', $data); 
    if($res)
        {
      $message='Successfully Added';
      return $message;
    }
  }
  public function batches_add()
  {
    $data = array(
         'section_id' => $this->input->post('section_id'),
         'class_id' => $this->input->post('class_id'),
         'batch' => $this->input->post('batch_id')
        );
    $res=$this->db->insert('batches', $data); 
    if($res)
        {
      $message='Successfully Added';
      return $message;
    }
  }
  public function subjects_add()
  {
    $data = array(
        'name' => $this->input->post('name'),
        'class_id'=>$this->input->post('class_id'),
        'section_id' => $this->input->post('section_id'),
         'batch_id' => $this->input->post('batch_id'),
         'status' => 'active'
       
        
        );
    $res=$this->db->insert('subject', $data); 
    if($res)
        {
      $message='Successfully Added';
      return $message;
    }
  }

   public function all_section()
    {
  $query = $this->db->query('select * from section where status="active"');
       $data='';
       foreach ($query->result() as $key=>$value) 
       {
      $data[] = $value;
          $query=$this->db->query("select * from class where class_id='$value->class_id'");
          $query=$query->row();
          $data[$key]->class_name=$query->name;
       }
       return $data;

    }
    public function all_batch()
    {
     $query = $this->db->query('select * from batch where status="active"');
        return $query->result();
    }
    public function all_subject()
    {
     $query = $this->db->query('select * from subject where status="active" order by batch_id,class_id,section_id');
      $data='';
       foreach ($query->result() as $key=>$value) 
       {
      $data[] = $value;
          $query=$this->db->query("select * from class where class_id='$value->class_id'");
          $query=$query->row();
          if($query){
            $data[$key]->class_name=$query->name;
          }
          else{
            $data[$key]->class_name='';
          }
          $query=$this->db->query("select * from batch where batch_id='$value->batch_id'");
          $query=$query->row();
          if($query){
            $data[$key]->start_date=$query->start_date; 
            $data[$key]->end_date=$query->end_date;
          }
          else{
            $data[$key]->start_date=$data[$key]->end_date='';
          }
         $query=$this->db->query("select * from section where section_id='$value->section_id'");
          $query=$query->row();
          if($query){
            $data[$key]->section_name=$query->name;
          }
          else{
            $data[$key]->section_name='';
          }
       }
       return $data;
    }
    public function delete_section($id)
   {          
      $res=$this->db->query("update section set status='inactive' where section_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
  public function delete_batches($id)
   {          
      $res=$this->db->query("update batch set status='inactive' where batch_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
  public function delete_subject($id)
   {          
      $res=$this->db->query("update subject set status='inactive' where subject_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
}