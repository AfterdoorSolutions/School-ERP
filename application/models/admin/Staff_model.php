<?php
class Staff_model extends MY_Model
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

  public function add($photo)
  {
    $data = array(
        'photo'=>$photo,
        'firstname'=> $this->input->post('first_name'),
        'emp_code'=> $this->input->post('emp_code'),
        'pan'=> $this->input->post('pan'),
        'lastname'=> $this->input->post('last_name'),
        'middlename'=> $this->input->post('middle_name'),
        'mothername'=> $this->input->post('mothername'),
        'fathername'=> $this->input->post('fathername'),
        'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
        'birth_place'=> $this->input->post('birth_place'),
        'm_tounge'=> $this->input->post('mother_tongue'),
        'b_group'=> $this->input->post('blood_group'),
        'religion'=> $this->input->post('religion'),
        'nationality'=> $this->input->post('nationality'),
        'staff_category_id'=> $this->input->post('staff_category_id'),
        'city'=> $this->input->post('city'),
        'state'=> $this->input->post('state'),
        'pincode'=> $this->input->post('pin'),
        'country'=> $this->input->post('country'),
        'phone_number'=> $this->input->post('phno'),
        'mobile'=> $this->input->post('mobile'),
        'biometric_id'=> $this->input->post('biometric_id'),
        'gender'=> $this->input->post('gender'),
        'email'=> $this->input->post('email'),
        'address_1'=> $this->input->post('address_line1'),
        'address_2'=>$this->input->post('address_line2'),
        'basic_pay'=>$this->input->post('basic_pay'),
        'bank'=>$this->input->post('bank'),
        'branch_name'=>$this->input->post('branch_name'),
        'accno'=>$this->input->post('accno'),
        'status'=>'active'
    );
    $res=$this->db->insert('staff', $data); 

    $data2 = array(
      'name' => $this->input->post('first_name'),
      'emp_id' => $this->input->post('emp_code'),
      'email' => $this->input->post('emp_code')."@apsambala.com",
      'password' => md5('afterdoor'),
      'type' => 'staff',
      'status' => 'active',

     );
    $res=$this->db->insert('user_portal', $data2); 
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
        'short_name' => $this->input->post('short_name')
        );
    $this->db->where('staff_category_id', $id);
		$res=$this->db->update('staff_category', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}

  public function update_staff($id="")
  {
    $data = array(
        'firstname' => $this->input->post('first_name'),
        'fathername' => $this->input->post('fathername'),
        'mothername' => $this->input->post('mothername'),
        'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
        'gender' => $this->input->post('gender'),
        'birth_place' => $this->input->post('birth_place'),
        'm_tounge' => $this->input->post('m_tounge'),
        'b_group' => $this->input->post('blood_group'),
        'religion' => $this->input->post('religion'),
        'nationality' => $this->input->post('nationality'),
        'staff_category_id' => $this->input->post('staff_category_id'),
        'biometric_id' => $this->input->post('biometric_id'),
        'address_1' => $this->input->post('address_1'),
        'address_2' => $this->input->post('address_2'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'pincode' => $this->input->post('pincode'),
        'class_id' => $this->input->post('class_id'),
        'section_id' => $this->input->post('section_id'),
        'country' => $this->input->post('country'),
        'phone_number' => $this->input->post('phone_number'),
        'mobile' => $this->input->post('mobile'),
        'email' => $this->input->post('email'),
        'photo' => $this->input->post('photo'),
        'emp_code' => $this->input->post('emp_code'),
        'time' => $this->input->post('time'),
        'bank' => $this->input->post('bank'),
        'pan' => $this->input->post('pan'),
        'accno' => $this->input->post('accno'),        
        'basic_pay' => $this->input->post('basic_pay'),
        'branch_name' => $this->input->post('branch_name')
        );
    $this->db->where('staff_id', $id);
    $res=$this->db->update('staff', $data); 
    if($res)
        {
      $message='Successfully updated';
      return $message;
    }
  }

	public function get_details($id)
  {
     $query = $this->db->get_where('staff_category',array('staff_category_id'=>$id));
     return $query->row_array();
	}
  public function get_staff_member($id)
  {
     $query = $this->db->get_where('staff',array('staff_id'=>$id));
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
        $data='';
        foreach ($query->result() as $key => $value) {
          $data[]=$value;
          $q=$this->db->query("select * from class where class_id='$value->class_id' ");
          $q=$q->row();
          if($q){
            $data[$key]->classname=$q->name;
          }
          else{
            $data[$key]->classname='';
          }
          $q=$this->db->query("select * from section where section_id='$value->section_id' ");
          $q=$q->row();
          if($q){
            $data[$key]->sectionname=$q->name;
          }
          else{
            $data[$key]->sectionname='';
          }
        }
        return $data;
    }
    else
    {
        $query = $this->db->query("select * from staff where staff_id='$id' ");
        return $query->row();
    }
  }
  public function all_staff_category($id="")
  {
        $query = $this->db->query('select * from staff_category where status="active" ');
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

  public function all_salary_element()
  {
     $query = $this->db->query('select * from salary_element where status="active" ');
     return $query->result();
  }

  public function get_salary_data($staff_id='',$year_id='')
  {
    $query=$this->db->query("select * from batch where batch_id='$year_id'");
    $value=$query->row();
    $query2=$this->db->query("select sum(total) as total from salary_slip where staff_id='".$staff_id."' and STR_TO_DATE( `month` , '%M %Y' ) between '".$value->start_date."-04-00' and '".$value->end_date."-03-00' ");
    $query1=$query2->row();
    if($query2->num_rows()>0)
    {
      $value->total=$query1->total;
    }
    else
    {
      $value->total="-";
    }
    return $value;
  }

  public function get_full_details($id='',$type)
    {
        $query=$this->db->query("select *,firstname as name from staff where staff_id='$id'");
        return $query->row();
    }
    public function update_staff_id($staff_id='',$class_id='',$section_id='')
    {
        $query=$this->db->query("update staff set class_id='$class_id', section_id='$section_id' where staff_id='$staff_id'");
        $q1=$this->db->query("select * from class where class_id='$class_id'");
        $class=$q1->row()->name;
        $q2=$this->db->query("select * from section where section_id='$section_id'");
        $section=$q2->row()->name;
        $q3=$this->db->query("select * from staff where staff_id='$staff_id'");
        $emp_code=$q3->row()->emp_code;
        $query=$this->db->query("update user_portal set email='".$class.$section."@apsambala.com',class_id='$class_id', section_id='$section_id' where emp_id='$emp_code'");
    }
    
    public function delete_staff($id)
   {          
      $res=$this->db->query("update staff_category set status='inactive' where staff_category_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
   public function delete_staff_member($id)
   {          
      $res=$this->db->query("update staff set status='inactive' where staff_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
   public function delete_staff_salary($id)
   {          
      $res=$this->db->query("update salary_element set status='inactive' where salary_element_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
}
 /* SELECT STR_TO_DATE( `month` , '%M %Y' ) FROM `salary_slip` WHERE STR_TO_DATE( `month` , '%M %Y' ) between '2015-01-00' and '2015-06-00'*/

