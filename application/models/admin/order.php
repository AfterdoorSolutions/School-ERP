<?php
class Order_model extends MY_Model
{
  
  function __construct()
  {
    parent::__construct();
  }
  
  public function order_result()
  {
     $query = $this->db->query("select * from order where status='active'");
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
        
        
        );
    $res=$this->db->insert('student_category', $data); 
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
        $this->db->where('student_category_id', $id);
    $res=$this->db->update('student_category', $data); 
    if($res)
        {
      $message='Successfully updated';
      return $message;
    }
  }

  public function get_details($id)
  {
     $query = $this->db->get_where('student_category',array('student_category_id'=>$id));
     return $query->row_array();
  }

  
  public function delete($id)
  {             
      $res=$this->db->query("update student_category set status='inactive' where student_category_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }

    public function category()
    {
          $query = $this->db->query('select * from student_category  ');
          return $query->result_array();
    }

   
   
    
  
   
   
}