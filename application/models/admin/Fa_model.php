<?php
class Fa_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  
	public function category_result()
  {
     $query = $this->db->query("select * from student_category");
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
        'short_name' => $this->input->post('short_name'),
        'status' => 'published'
    );
    $res=$this->db->insert('staff_category', $data); 
    if($res)
        {
        $message='Successfully Added';
        return $message;
        }
  }

  public function add()
  {
    foreach ($this->input->post('sub_name') as $key => $value) {
      $data = array(
        'class_id'=> $this->input->post('class_id'),
        'section_id'=> $this->input->post('section_id'),
        'batch_id'=> $this->input->post('batch_id'),
        'subject_id'=> $this->input->post('subject_id'),
        'exam_type_id'=> $this->input->post('exam_type_id'),
        'sub_name'=> $this->input->post('sub_name')[$key],
        'sub_marks'=> $this->input->post('sub_marks')[$key],
        'sub_dist'=> $this->input->post('sub_dist')[$key],
        'status'=> 'active',
      );
      $res=$this->db->insert('exam_marking', $data); 
    }
    
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
       
      $data= array('status' => 'disabled', );
      $this->db->where('staff_category_id', $id);
      $res=$this->db->update('staff_category',$data);
      if($res)
      {
  			$message='Successfully Deleted';
  			return $message; 
      }
  }

  public function all_staff($id='')
  {
    if($id=='')
    { 
        $query = $this->db->query('select * from staff where status="active" ');
        return $query->result();
    }
    else
    {
        $query = $this->db->query("select * from staff where staff_id='$id' ");
        return $query->row();
    }
  }
  public function all_staff_category()
  {
        $query = $this->db->query('select * from staff_category where status="published" ');
        return $query->result();
  }

 public function all_salary_elements()
  {
        $query = $this->db->query('select * from salary_element where status="published" ');
        return $query->result();
  }
  
  public function staff_all_feeslip($id)
  {
        $query = $this->db->query("select * from salary_slip where staff_id='$id' ");
        return $query->result();
  }
  public function slip($id)
  {
        $query = $this->db->query("select * from salary_slip where salary_slip_id='$id' ");
        return $query->row();
  }
  public function add_salary_element()
  {
    $data = array(
        'name' => $this->input->post('name'),
        'p_f' => $this->input->post('type'),
        'amount' => $this->input->post('amount'),
        'of' => $this->input->post('salary_element_id'),
        'action' => $this->input->post('action'),
        'status' => 'published'
    );
    $res=$this->db->insert('salary_element', $data); 
    if($res)
        {
        $message='Successfully Added';
        return $message;
        }
  }
  public function generate_pay_slip()
  {
    $value=array('sub'=>array(),'add'=>array());
    for ($i=0; $i < $this->input->post('total_elements') ; $i++) { 
      if($this->input->post('salary_action['.$i.']')=='sub'){
            array_push($value['sub'], array('salary_element'=>$this->input->post('salary_element['.$i.']'),
              'salary_name'=>$this->input->post('salary_name['.$i.']'),
              'salary_action'=>$this->input->post('salary_action['.$i.']'),
              'salary_value'=>$this->input->post('salary_value['.$i.']')));
          }
          else{
            array_push($value['add'], array('salary_element'=>$this->input->post('salary_element['.$i.']'),
              'salary_name'=>$this->input->post('salary_name['.$i.']'),
              'salary_action'=>$this->input->post('salary_action['.$i.']'),
              'salary_value'=>$this->input->post('salary_value['.$i.']')));
          }
    }
    $value=serialize($value);
    $data = array(
        'content' => $value,
        'total'=> $this->input->post('total'),
        'month' => $this->input->post('month'),
        'basic_pay' => $this->input->post('basic_pay'),
        'staff_id' => $this->input->post('staff_id')
    );
    $res=$this->db->insert('salary_slip', $data); 
    if($res)
        {
        $message='Successfully Added';
        return $message;
        }
  }

  public function salary_slip()
  {
    $query = $this->db->query("select * from salary_slip where month='".$this->input->post('month')."'");
    //return $query->result();
    $data='';
    foreach ($query->result() as $key => $value) {
      $data[]=$value;
      //var_dump($data);
      $query=$this->db->query("select * from staff where staff_id='$value->staff_id' ");
      $data[$key]->staff_detail=$query->row();
    }
    return $data;
  }
  
  public function salary_element($val='')
  {
    $query = $this->db->query("select * from salary_element where action='$val' ");
    return $query->result();
  }

  function statement_with_acc($month)
  {
    $query = $this->db->query("select * from salary_slip where month='$month'");
    foreach ($query->result() as $key => $value) {
      $data[]=$value;
      //var_dump($data);
      $query=$this->db->query("select * from staff where staff_id='$value->staff_id'");
      $data[$key]->staff_detail=$query->row();
    }
    return $data;
  }
  public function form_staff()
  {
    $query=$this->db->query("select * from staff");
    return $query->result();
    }
  public function get_exam()
  {
    $query=$this->db->query("select * from exam_type");
    return $query->result();
  }
  public function get_sub($batch_id,$class_id,$section_id,$exam_type_id)
  {
    $query=$this->db->query("select * from exam_marking where batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id' and exam_type_id='$exam_type_id' group by subject_id order by subject_id");
    //return $query->result();
    $data=array();
    foreach ($query->result() as $key => $value) {
      $data[]=$value;
      $que=$this->db->query("select * from subject where subject_id='$value->subject_id'");
      $que=$que->row();
      if($que){
        $data[$key]->subject_name=$que->name;
      }
      else{
        $data[$key]->subject_name='';
      }
    }
    return $data;
  }
  public function get_sub_a($batch_id,$class_id,$section_id)
  {
      $que=$this->db->query("select * from subject where batch_id='$batch_id' and section_id='$section_id' and class_id='$class_id'");
      $que=$que->result();
      return $que;
  }
  public function get_subject_details($subject_id)
  {
      $que=$this->db->query("select * from subject where subject_id='$subject_id'");
      $que=$que->row();
      return $que;
  }
  public function get_subject_distribution($subject_id,$batch_id,$class_id,$section_id)
  {
      $que=$this->db->query("select * from exam_marking where subject_id='$subject_id' and batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
      $que=$que->result();
      return $que;
  }
  public function get_class_sub()
  {
    $batch_id=$this->input->get('batch_id');
    $class_id=$this->input->get('class_id');
    $section_id=$this->input->get('section_id');
    $que=$this->db->query("select * from subject where batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
    $que=$que->result();
    return $que;
  }
  public function get_class_sub_dis()
  {
    $data=array();
   foreach ($this->get_sub($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id')) as $key => $value) {
      $data[$value->subject_id]=$this->get_subject_distribution($value->subject_id,$value->batch_id,$value->class_id,$value->section_id);
   }
   return $data;
  }
  public function get_class_students2($batch_id,$class_id,$section_id)
  {
    $query=$this->db->query("select * from student_admission where batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
    //return $query->result();
    $exam_marking_id=$this->input->get('exam_marking_id');
    $data='';
    foreach ($query->result() as $key => $value) {
      $data[]=$value;
      $data[$key]->exam_marking_id=$exam_marking_id;
      ///STUDENT OLDMARKS
      $u_where=array('student_id' =>$value->student_admission_id ,'exam_marking_id' => $exam_marking_id );
      $this->db->where($u_where);
      $qu=$this->db->get('marks');
      $qu=$qu->row();

      if($qu)
      $data[$key]->marks=$qu->marks;
      else
      $data[$key]->marks="";
      ///STUDENT OLDMARKS

      $que=$this->db->query("select * from exam_marking where exam_marking_id='$exam_marking_id'");
      $que=$que->row();
      if($que){
        $data[$key]->subject_id=$que->subject_id;
        $data[$key]->sub_name=$que->sub_name;
        $data[$key]->sub_marks=$que->sub_marks;
        $que2=$this->db->query("select * from subject where subject_id='$que->subject_id'");
        $que2=$que2->row();
        if($que2){
          $data[$key]->subject_name=$que2->name;
        }
        else{
          $data[$key]->subject_name='';
        }
      }
      else{
        $data[$key]->subject_id=$data[$key]->subject_name='';
      }
    }
    return $data;
  }
  public function get_class_students($batch_id,$class_id,$section_id)
  {
    $query=$this->db->query("select * from student_admission where batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
    $subject_id=$this->input->get('subject_id');
    $data='';
    foreach ($query->result() as $key => $value) {
      $data[]=$value;
      $qq=$this->db->query("select * from exam_marking where subject_id='$subject_id' and batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
      $data_qq=$qq->result();
      foreach ($data_qq as $key2 => $value2) {
      $data[$key]->exam_marking_id[$key2]=$value2->exam_marking_id;
      ///STUDENT OLDMARKS
      $u_where=array('student_id' =>$value->student_admission_id ,'exam_marking_id' => $value2->exam_marking_id );
      $this->db->where($u_where);
      $qu=$this->db->get('marks');
      $qu=$qu->row();

      if($qu)
      $data[$key]->marks[$key2]=$qu->marks;
      else
      $data[$key]->marks[$key2]="";
      ///STUDENT OLDMARKS

      $que=$this->db->query("select * from exam_marking where exam_marking_id='$value2->exam_marking_id'");
      $que=$que->row();
      if($que){
        $data[$key]->subject_id[$key2]=$que->subject_id;
        $data[$key]->sub_name[$key2]=$que->sub_name;
        $data[$key]->sub_marks[$key2]=$que->sub_marks;
        $data[$key]->sub_dist[$key2]=$que->sub_dist;
        $que2=$this->db->query("select * from subject where subject_id='$que->subject_id'");
        $que2=$que2->row();
        if($que2){
          $data[$key]->subject_name[$key2]=$que2->name;
        }
        else{
          $data[$key]->subject_name[$key2]='';
        }
      }
      else{
        $data[$key]->subject_id[$key2]=$data[$key]->subject_name[$key2]='';
      }
      }
    }
    return $data;
  }
    public function get_only_class_students($batch_id,$class_id,$section_id)
  {
    $query=$this->db->query("select * from student_admission where batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
    //$subject_id=$this->input->get('subject_id');
    
    
    $data='';
    foreach ($query->result() as $key => $value) {
      $data[]=$value;
      
      foreach ($this->get_sub($this->input->get('batch_id'),$this->input->get('class_id'),$this->input->get('section_id'),$this->input->get('exam_type_id')) as $key111 => $value111) {
      $all_data='';
      $subject_id=$value111->subject_id;

      $qq=$this->db->query("select * from exam_marking where subject_id='$subject_id' and batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id'");
      $data_qq=$qq->result();
      foreach ($data_qq as $key2 => $value2) {
      $all_data->exam_marking_id[$key2]=$value2->exam_marking_id;
      ///STUDENT OLDMARKS
      $u_where=array('student_id' =>$value->student_admission_id ,'exam_marking_id' => $value2->exam_marking_id );
      $this->db->where($u_where);
      $qu=$this->db->get('marks');
      $qu=$qu->row();

      if($qu)
      $all_data->marks[$key2]=$qu->marks;
      else
      $all_data->marks[$key2]="";
      ///STUDENT OLDMARKS

      $que=$this->db->query("select * from exam_marking where exam_marking_id='$value2->exam_marking_id'");
      $que=$que->row();
      if($que){
        $all_data->subject_id[$key2]=$que->subject_id;
        $all_data->sub_name[$key2]=$que->sub_name;
        $all_data->sub_marks[$key2]=$que->sub_marks;
        $all_data->sub_dist[$key2]=$que->sub_dist;
        $que2=$this->db->query("select * from subject where subject_id='$que->subject_id'");
        $que2=$que2->row();
        if($que2){
          $all_data->subject_name[$key2]=$que2->name;
        }
        else{
          $all_data->subject_name[$key2]='';
        }
      }
      else{
        $all_data->subject_id[$key2]=$data->subject_name[$key2]='';
      }
      }
      $data[$key]->new_marks[$key111]=$all_data;
      }
    }
    return $data;
  }
  public function add_stu_marks($student_id,$marks,$exam_marking_id,$author='')
  {
    $data=array('student_id' =>$student_id ,'marks' => $marks,'exam_marking_id' => $exam_marking_id,'author'=>$author,'time'=>date('Y-m-d h:m:s') );
    $u_where=array('student_id' =>$student_id ,'exam_marking_id' => $exam_marking_id );
    //$this->db->where($u_where);
    $qu=$this->db->query("select * from marks where student_id='$student_id' and exam_marking_id='$exam_marking_id'");
    if($qu->num_rows()>0){
      $this->db->update('marks',$data,$u_where);
      return "updated".$student_id.$marks.$exam_marking_id;
    }else{
      $this->db->insert('marks',$data);
       return "insertd".$student_id.$marks.$exam_marking_id;
    }
  }
  public function add_all_stu_marks($author='')
  {
    $exam_type_id=$this->input->post('exam_type_id');
    foreach ( $this->input->post('student_id') as $key => $value) {

      $student_id=$this->input->post('student_id')[$key];
      $exam_marking_id=$this->input->post('exam_marking_id')[$key];
        $marks=$this->input->post('marks')[$key];
        if($marks==''){
          $marks='0';
        }
        $data=array('student_id' =>$student_id ,
        'marks' => $marks,
        'exam_marking_id' => $exam_marking_id,
        'student_id' => $student_id,  
        'exam_type_id' => $exam_type_id,  
        'author'=>$author,
        'time'=>date('Y-m-d h:m:s') 
        );

        $u_where=array('student_id' =>$student_id,'exam_marking_id' => $exam_marking_id );
        $qu=$this->db->query("select * from marks where student_id='$student_id' and exam_marking_id='$exam_marking_id'");
        if($qu->num_rows()>0){
          $this->db->update('marks',$data,$u_where);
        }else{
          $this->db->insert('marks',$data);
        }
    }
    foreach ($this->input->post('student_id2') as $key3 => $value3) {
      $data=array('student_id' =>$student_id ,
        'class_id' => $this->input->post('class_id2'),
        'section_id' => $this->input->post('section_id2'),
        'batch_id' => $this->input->post('batch_id2'),
        'subject_id' => $this->input->post('subject_id2'),
        'student_id' => $this->input->post('student_id2')[$key3],
        'marks' => $this->input->post('total')[$key3],
        'exam_type_id' => $this->input->post('exam_type_id'),
        'author'=>$author,
        'time'=>date('Y-m-d h:m:s') 
        );
      //$this->db->insert('total_marks',$data);
        $class_id2=$this->input->post('class_id2');
        $section_id2=$this->input->post('section_id2');
        $batch_id2=$this->input->post('batch_id2');
        $subject_id2=$this->input->post('subject_id2');
        $student_id2=$this->input->post('student_id2')[$key3];
        $u_where=array(
        'class_id' => $this->input->post('class_id2'),
        'section_id' => $this->input->post('section_id2'),
        'batch_id' => $this->input->post('batch_id2'),
        'subject_id' => $this->input->post('subject_id2'),
        'student_id' => $this->input->post('student_id2')[$key3]
        );
        $qu=$this->db->query("select * from total_marks where class_id= '$class_id2' and section_id='$section_id2' and batch_id = '$batch_id2' and subject_id='$subject_id2' and student_id ='$student_id2'");
        if($qu->num_rows()>0){
          $this->db->update('total_marks',$data,$u_where);
        }else{
          $this->db->insert('total_marks',$data);
        }
    }
  }

  public function get_sub_b($batch_id,$class_id,$section_id,$subject_id,$exam_type_id)
  {
    $qu=$this->db->query("select * from exam_marking where exam_type_id='$exam_type_id' and subject_id='$subject_id'and section_id='$section_id'and class_id='$class_id'and batch_id='$batch_id'");
    
    $data='';
    foreach ($qu->result() as $key => $value) {
      $data[]=$value;

      $que2=$this->db->query("select * from marks where exam_marking_id='$value->exam_marking_id' order by student_id");
      $que=$que2->result();
      $data[$key]->students=array();
      $data[$key]->marks=array();
      if($que2->num_rows()>0){
        foreach ($que as $key2 => $value2) {
          $querr=$this->db->query("select * from student_admission where student_admission_id='$value2->student_id'");
          $querr=$querr->row_array();
          $data[$key]->students[]=$querr;
          $data[$key]->marks=$que2->result_array();
        }
      } 
    }
    return $data;
  }

  public function get_data_for_report($batch_id,$class_id,$section_id,$exam_type_id)
  {
   // subject toppers 
    $sql=$this->db->query("SELECT * FROM total_marks WHERE (subject_id, marks) in (select subject_id, max(marks)from total_marks where batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id' and exam_type_id='$exam_type_id' group by subject_id) ");
    $stu_data_2='';
    foreach ($sql->result() as $key11 => $value11) {
      $stu_data_2[]=$value11;
      $q=$this->db->query("select * from student_admission where student_admission_id='$value11->student_id'");
      $stu_data_2[$key11]->name=$q->row()->name;
      $q2=$this->db->query("select * from subject where subject_id='$value11->subject_id'");
      $stu_data_2[$key11]->subject_name=$q2->row()->name;
    }
   //class toppers
    $sql2=$this->db->query("select student_id,sum(marks) as mm from total_marks where batch_id='$batch_id' and class_id='$class_id'  group by student_id order by mm desc limit 5");
    $stu_data='';
    foreach ($sql2->result() as $key11 => $value11) {
      $stu_data[]=$value11;
      $q=$this->db->query("select * from student_admission where student_admission_id='$value11->student_id'");
      $stu_data[$key11]->name=$q->row()->name;
    }

    // over all analysis
    $sql3=$this->db->query("select student_id,sum(marks) as mm from total_marks where batch_id='$batch_id' and class_id='$class_id'  group by student_id");
   //all data
    //$sql4=$this->db->query("select * from total_marks where batch_id='$batch_id' and class_id='$class_id' ");
   //subject wise
    $sql4=$this->db->query("select student_id,sum(marks) as mm ,subject_id from total_marks where batch_id='$batch_id' and class_id='$class_id'  group by subject_id, student_id ");
    $data=$sub_array=array();
    foreach ($sql4->result() as $key4 => $value4) {
      $data= array('student_id' => $value4->student_id,'mm' => $value4->mm);
      $sub_array[$value4->subject_id][$key4]= $data;
    }
    $sub_name='';
    foreach ($sub_array as $key => $value) {
      $q2=$this->db->query("select * from subject where subject_id='$key'");
      $sub_name[$key]=$q2->row()->name;
    }
    $per="";
    $total=array();
    $total['first']=0;
    $total['second']=0;
    $total['third']=0;
    $total['fourth']=0;
    $total['fifth']=0;
    $total['sixth']=0;
    $total['seventh']=0;
    $total['eight']=0;
    foreach ($sql3->result() as $key => $value) {
       $per=round(($value->mm/60)*100,2); // replace 60 with total max marks
        if($per>='90'){
          $total['first']=$total['first']+1;
        }
        if($per>='80' && $per<='80.99'){
          $total['second']=$total['second']+1;
        }
        if($per>='70' && $per<='79.99'){
          $total['third']=$total['third']+1;
        }
        if($per>='60' && $per<='69.99'){
          $total['fourth']=$total['fourth']+1;
        }
        if($per>='50' && $per<='59.99'){
          $total['fifth']=$total['fifth']+1;
        }
        if($per>='40' && $per<='49.99'){
          $total['sixth']=$total['sixth']+1;
        }
        if($per>='33' && $per<='39.99'){
          $total['seventh']=$total['seventh']+1;
        }
        if($per<'33'){
          $total['eight']=$total['eight']+1;
        }
    }
    $new_total_sub='';
    foreach ($sub_array as $key22 => $value22) {
      $per2="";
      $total2=array();
      $total2['first']=0;
      $total2['second']=0;
      $total2['third']=0;
      $total2['fourth']=0;
      $total2['fifth']=0;
      $total2['sixth']=0;
      $total2['seventh']=0;
      $total2['eight']=0;

      foreach ($value22 as $key2 => $value2) {
         $per2=round(($value2['mm']/30)*100,2); // replace 60 with total max marks
          if($per2>='90'){
            $total2['first']=$total2['first']+1;
          }
          if($per2>='80' && $per2<='80.99'){
            $total2['second']=$total2['second']+1;
          }
          if($per2>='70' && $per2<='79.99'){
            $total2['third']=$total2['third']+1;
          }
          if($per2>='60' && $per2<='69.99'){
            $total2['fourth']=$total2['fourth']+1;
          }
          if($per2>='50' && $per2<='59.99'){
            $total2['fifth']=$total2['fifth']+1;
          }
          if($per2>='40' && $per2<='49.99'){
            $total2['sixth']=$total2['sixth']+1;
          }
          if($per2>='33' && $per2<='39.99'){
            $total2['seventh']=$total2['seventh']+1;
          }
          if($per2<'33'){
            $total2['eight']=$total2['eight']+1;
          }
      }
      $new_total_sub[$key22]=$total2;
    }

    $return['all']=$total;
    $return['all_subject']=$total2;
    $return['subject']=$sql->result();
    $return['class']=$stu_data;
    $return['sub_array']=$sub_array;
    $return['new_total_sub']=$new_total_sub;
    $return['sub_name']=$sub_name;
    return $return;
  }

  public function test($value='')
  {
   /* $count='463';
    for ($i=100; $i <= 110; $i++) { 
      for ($j=1; $j <= 6; $j++) { 
          $this->db->query("INSERT INTO `exam_marking` (`sub_name`, `sub_marks`, `sub_dist`, `class_id`, `section_id`, `batch_id`, `subject_id`, `exam_type_id`, `status`) VALUES
          ('Workbook', '10', 40, 10, '$i', 1, '$count', 2, 'active'),
          ('Practical-Activity', '10', 30, 10, '$i', 1, '$count', 2, 'active'),
          ('Notebook', '5', 15, 10, '$i', 1, '$count', 2, 'active'),
          ('Holidays Homework', '5', 15, 10, '$i',1, '$count',2, 'active')");
          $count++;
      }
    }*/
  }

  public function submit_fa($subject_id,$batch_id,$class_id,$section_id,$exam_type_id)
  {
      $this->db->query("update exam_marking set submit='1' where subject_id='$subject_id' and batch_id='$batch_id' and class_id='$class_id' and section_id='$section_id' and exam_type_id='$exam_type_id' ");
  }

  // select sum(marks) as mm from total_marks  group by student_id order by mm desc limit 5 //
  /*SELECT sum(marks) as marks FROM `marks` WHERE student_id ='2' group by exam_marking_id,student_id*/
  /*SELECT sum(marks), em.exam_marking_id,subject_id FROM `marks` as  m join `exam_marking` as  em on(m.exam_marking_id=em.exam_marking_id) WHERE student_id IN ('2','3','4') group by student_id,subject_id*/
  /*SELECT student_id,sum(marks), em.exam_marking_id,subject_id FROM `marks` as  m join `exam_marking` as  em on(m.exam_marking_id=em.exam_marking_id) WHERE student_id IN ('2','3','4','5','6','7') group by student_id,subject_id*/
  /*select sum_marks,student_id from (SELECT student_id,sum(marks) as sum_marks, em.exam_marking_id,subject_id FROM `marks` as  m join `exam_marking` as  em on(m.exam_marking_id=em.exam_marking_id) WHERE student_id IN ('2','3','4','5','6','7') group by student_id,subject_id) a group by subject_id order by sum_marks desc*/
}
