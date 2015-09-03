<?php
class Fee_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  
	public function fee_result()
  {
     $query = $this->db->query('select * from fee_type where status="active"');
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
      'type' => $this->input->post('type'),
      'category' => $this->input->post('category')
        );
		$res=$this->db->insert('fee_type', $data); 
		if($res)
    {
			$message='Successfully Added';
			return $message;
		}
	}

	public function main($id="")
	{
		$data = array(
        'type' => $this->input->post('type')
        );
        $this->db->where('fee_type_id', $id);
		$res=$this->db->update('fee_type', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}

	public function get_details($id)
  {
     $query = $this->db->get_where('fee_type',array('fee_type_id'=>$id));
     return $query->row_array();
	}

  public function delete($id)
  {
       
      $this->db->where('fee_type_id', $id);
      $res=$this->db->delete('fee_type');
      if($res)
      {
  			$message='Successfully Deleted';
  			return $message; 
      }
  }

  public function fee()
	{
        $query = $this->db->query('select * from fee_type');
        return $query->result_array();
	}

  public function cat_result($category)
  {
        $query = $this->db->query("select * from fee_type where category='$category'");
        return $query->result_array();
  }

  /*public function get_stu_n($student_admission_id)
  {
    $sql1 = $this->db->query("select * from student_admission where student_admission_id='$student_admission_id'");
    return $sql1->row();
  }*/

  public function insert_fee_setup()
  {
    for ($i=0; $i < $this->input->post('newadd_num'); $i++) 
    { 
      $data = array(
      'section_id' => $this->input->post('section_id'),
      'batch_id' => $this->input->post('batch_id'),
      'student_category_id' => $this->input->post('student_category_id'),
      'fee_type_id' => $this->input->post('newadd_id_'.$i),
      'fee_type_value' => $this->input->post('newadd_'.$i)
        );
      $res=$this->db->insert('fee_setup', $data); 
    }

    for ($j=0; $j < $this->input->post('annual_num'); $j++)
    { 
      $data = array(
      'section_id' => $this->input->post('section_id'),
      'batch_id' => $this->input->post('batch_id'),
      'student_category_id' => $this->input->post('student_category_id'),
      'fee_type_id' => $this->input->post('annual_id_'.$j),
      'fee_type_value' => $this->input->post('annual_'.$j)
        );
      $res=$this->db->insert('fee_setup', $data); 
    }

    for ($k=0; $k < $this->input->post('quartely_num'); $k++) 
    { 
      $data = array(
      'section_id' => $this->input->post('section_id'),
      'batch_id' => $this->input->post('batch_id'),
      'student_category_id' => $this->input->post('student_category_id'),
      'fee_type_id' => $this->input->post('quartely_id_'.$k),
      'fee_type_value' => $this->input->post('quartely_'.$k)
        );
      $res=$this->db->insert('fee_setup', $data); 
    }
    
    if($res)
    {
      $message='Successfully Added';
      return $message;
    }
  }

  public function get_stu($class_id,$batch_id,$section_id)
  {
    $sql = $this->db->query("select * from student_admission where class_id='$class_id' and batch_id='$batch_id' and section_id='$section_id'");
    return $sql->result();
  }

  public function print_all_fees()
  {
    $sql = $this->db->query("select * from settings");
    $current_batch_id=$sql->row();
    $sql2 = $this->db->query("select * from fee_setup where batch_id='$current_batch_id'");
    return $sql2->result();
  }

  public function get_stu_adm($adm_no)
  {
    $student1 = $this->db->query("select student_admission_id from student_admission where adm_number='$adm_no'");
    return $student1->row();
  }

  public function get_stu_details($id)
  {
    $student = $this->db->query("select * from student_admission where student_admission_id='$id'");
    //var_dump($student->row());
    $value=$student->row();

          $query1=$this->db->query("select * from class where class_id='$value->class_id'");
          $query1=$query1->row();
          if($query1)
          {
             $value->class_name=$query1->name; 
          }
          else
          {
              $value->class_name='-';
          }

          $query2=$this->db->query("select * from section where class_id='$value->class_id'");
          $query2=$query2->row();
          if($query2)
          {
             $value->section_name=$query2->name; 
          }
          else
          {
              $value->section_name='-';
          }

          $query3=$this->db->query("select * from batches where section_id='$value->section_id'");
          $query3=$query3->row();

          if($query3)
          {
             $query_a=$this->db->query("select * from batch where batch_id='$query3->section_id'");
             $query_a=$query_a->row();
             if($query_a)
             {  
                $value->start_batch=$query_a->start_date; 
                $value->end_batch=$query_a->end_date; 
             }
             else
             {
                $value->start_batch='-'; 
                $value->end_batch='-'; 
             }
          }
          else
          {
             $value->start_batch='-'; 
             $value->end_batch='-'; 
          }

          $query4=$this->db->query("select * from student_category where student_category_id='$value->student_category_id'");
          $query4=$query4->row();
          if($query4)
          {
             $value->student_category_name=$query4->name;
          }
          else
          {
             $value->student_category_name='-'; 
          }

          $query5=$this->db->query("select fee_type_id,fee_type_value from fee_setup where batch_id='$value->batch_id' and section_id='$value->section_id' and student_category_id='$value->student_category_id'");
          $query5=$query5->result();
          if($query5)
          {
              $value->fee_type_id=$query5;
              $value->fee_type_value=$query5;
              $data='';
              foreach ($query5 as $key => $v)
              {
                $data[]=$v;
                $query6=$this->db->query("select * from fee_type where fee_type_id='$v->fee_type_id' order by category");
                $query6=$query6->row();
                $v->fee_type_name=$query6->type;
                $v->category=$query6->category;
                //var_dump($value);

              }
          }
          else
          {
            $value->fee_type_value='-';
            $query5=(object)array();
            $value->query5->fee_type_id='';
          }

     return $value;
    }

    public function print_fee_slab(){
      
    }

    public function add_fee()
    {
      $value=array('fee_type_id'=>$this->input->post('fee_type_id[]'),
              'fee_type_name'=>$this->input->post('fee_type_name[]'),
              'fee_type_value'=>$this->input->post('fee_type_value[]')
      );
      $value=serialize($value);
      if($this->input->post('cash'))
      {
        $data = array(
        'amount' => $this->input->post('amount'),
        'through' => $this->input->post('cash'),
        'date' => date('Y-m-d',strtotime($this->input->post('date'))),
        'receipt' => $this->input->post('receipt'),
        'student_admission_id' => $this->input->post('student_admission_id'),
        'content' => $value
        );
      }
      else
      {
        $data = array(
        'cheque_no' => $this->input->post('cheque_no'),
        'amount' => $this->input->post('amount'),
        'bank_name' => $this->input->post('bank_name'),
        'date' => date('Y-m-d',strtotime($this->input->post('date'))),
        'through' => $this->input->post('cheque'),
        'receipt' => $this->input->post('receipt'),
        'student_admission_id' => $this->input->post('student_admission_id'),
        'content' => $value
        );
      }
      $res=$this->db->insert('fee_collection', $data); 
      if($res)
      {
        $message='Successfully Added';
        return $message;
      }
    }
    public function delete_fee_type($id)
   {          
      $res=$this->db->query("update fee_type set status='inactive' where fee_type_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
}