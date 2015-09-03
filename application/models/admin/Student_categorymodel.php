<?php
class Student_categorymodel extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  
	public function category_result()
  {
     $query = $this->db->query("select * from student_category where status='active'");
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

    public function allclass()
    {
        $query=$this->db->query("select * from class");
        return $query->result();
    }
    public function total_student()
    {
        $query=$this->db->query("select count(*) as total from student_admission");
        return $query->row();
    }
    public function cal_strength()
    {
         $data=array();
         $query = $this->db->query('select * from class  ');
         $class_d=$query->result_array();
         foreach ($class_d as $key => $value) {
           # code...
         
            $class_id=$value['class_id'];

             $query2 = $this->db->query('select * from student_category');
             $student_d=$query2->result_array();
              foreach ($student_d as $key2 => $value2) 
             {
                $student_category_id=$value2['student_category_id'];
                $query3=$this->db->query("select count(*) from student_admission where class_id='$class_id' and student_category_id='$student_category_id'");
                $data[$student_category_id][$class_id]=$query3->row_array();
             }
         }
         return $data;

    }
   public function total_strength_category()
    {
         $data=array();
         $query= $this->db->query("select * from student_category");
         foreach ($query->result_array() as $key => $value) {
           $query2 = $this->db->query("select count(*) as total from student_admission where student_category_id='$value[student_category_id]'");
           $data[$value['student_category_id']]=$query2->row();
         }
         return $data;
    }
    public function fee_register()
  {
      $query_book = $this->db->query("SELECT * FROM `student_admission`");
      return $query_book->row();
  }
   public function student_fee_register()
  {
      $query = $this->db->get_where('student_admission',array('student_admission_id'=>$student_admission_id));
      return $query->row();
  }
   /* public function total_strength_class()
    {
         $data=array();
         $query= $this->db->query("select * from class");
         foreach ($query->result_array() as $key => $value) {
           $query2 = $this->db->query("select count(*) as total from student_admission where class_id='$value[class_id]'");
           $data[$value['class_id']]=$query2->row();
         }
         return $data;
    }
*/


   
}