<?php
class Admission_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  	
  	public function add_student($image=""){
		if($image=="")
        {
            $data = array(
            'adm_number' => $this->input->post('adm_number'),
            'adm_date'=> date('Y-m-d',strtotime($this->input->post('adm_date'))),
            'first_name'=> $this->input->post('first_name'),
            'name'=> $this->input->post('first_name'),
            'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
            'birth_place'=> $this->input->post('birth_place'),
            'mother_tongue'=> $this->input->post('mother_tongue'),
            'blood_group'=> $this->input->post('blood_group'),
            'religion'=> $this->input->post('religion'),
            'nationality'=> $this->input->post('nationality'),
            'student_category_id'=> $this->input->post('student_category_id'),
            'city'=> $this->input->post('city'),
            'state'=> $this->input->post('state'),
            'pin'=> $this->input->post('pin'),
            'country'=> $this->input->post('country'),
            'phno'=> $this->input->post('phno'),
            'mobile'=> $this->input->post('mobile'),
            'class_id'=> $this->input->post('class_id'),
            'section_id'=> $this->input->post('section_id'),
            'batch_id'=> $this->input->post('batch_id'),
            'roll_no'=> $this->input->post('roll_no'),
            'biometric_id'=> $this->input->post('biometric_id'),
            'gender'=> $this->input->post('gender'),
            'email'=> $this->input->post('email'),
            'address'=> $this->input->post('address_line1').",".$this->input->post('address_line2'),
            'mother_name'=> $this->input->post('mother_name'),
            'father_name'=> $this->input->post('father_name'),
            'father_phone'=> $this->input->post('father_phone'),
            'off_contact'=> $this->input->post('off_contact'),
            'father_email'=> $this->input->post('father_email'),
            'salutation'=> $this->input->post('salutation'),
            'lang_understand'=> $this->input->post('lang_understand'),
            'father_rank'=> $this->input->post('father_rank'),
            'unit_address'=> $this->input->post('unit_address')
            );
        }
        else
        {
            $data = array(
            'photo'=>'uploads/student/'.$image,
            'adm_number' => $this->input->post('adm_number'),
            'adm_date'=> date('Y-m-d',strtotime($this->input->post('adm_date'))),
            'first_name'=> $this->input->post('first_name'),
            'name'=> $this->input->post('first_name'),
            'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
            'birth_place'=> $this->input->post('birth_place'),
            'mother_tongue'=> $this->input->post('mother_tongue'),
            'blood_group'=> $this->input->post('blood_group'),
            'religion'=> $this->input->post('religion'),
            'nationality'=> $this->input->post('nationality'),
            'student_category_id'=> $this->input->post('student_category_id'),
            'city'=> $this->input->post('city'),
            'state'=> $this->input->post('state'),
            'pin'=> $this->input->post('pin'),
            'country'=> $this->input->post('country'),
            'phno'=> $this->input->post('phno'),
            'mobile'=> $this->input->post('mobile'),
            'class_id'=> $this->input->post('class_id'),
            'section_id'=> $this->input->post('section_id'),
            'batch_id'=> $this->input->post('batch_id'),
            'roll_no'=> $this->input->post('roll_no'),
            'biometric_id'=> $this->input->post('biometric_id'),
            'gender'=> $this->input->post('gender'),
            'email'=> $this->input->post('email'),
            'home_address'=> $this->input->post('home_address'),
            'mother_name'=> $this->input->post('mother_name'),
            'father_name'=> $this->input->post('father_name'),
            'father_phone'=> $this->input->post('father_phone'),
            'off_contact'=> $this->input->post('off_contact'),
            'father_email'=> $this->input->post('father_email'),
            'salutation'=> $this->input->post('salutation'),
            'lang_understand'=> $this->input->post('lang_understand'),
            'father_rank'=> $this->input->post('father_rank'),
            'unit_address'=> $this->input->post('unit_address')
            
            );
        }
		$res=$this->db->insert('student_admission', $data); 
		if($res)
        {
			$message='Successfully Added';
			return $message;
		}
	}

        public function update_student($id=""){
        if($id=="")
        {
            $data = array(
            'adm_number' => $this->input->post('adm_number'),
            'adm_date'=> date('Y-m-d',strtotime($this->input->post('adm_date'))),
            'first_name'=> $this->input->post('first_name'),
            'name'=> $this->input->post('first_name'),
            'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
            'birth_place'=> $this->input->post('birth_place'),
            'mother_tongue'=> $this->input->post('mother_tongue'),
            'blood_group'=> $this->input->post('blood_group'),
            'religion'=> $this->input->post('religion'),
            'nationality'=> $this->input->post('nationality'),
            'student_category_id'=> $this->input->post('student_category_id'),
            'city'=> $this->input->post('city'),
            'state'=> $this->input->post('state'),
            'pin'=> $this->input->post('pin'),
            'country'=> $this->input->post('country'),
            'phno'=> $this->input->post('phno'),
            'mobile'=> $this->input->post('mobile'),
            'class_id'=> $this->input->post('class_id'),
            'section_id'=> $this->input->post('section_id'),
            'batch_id'=> $this->input->post('batch_id'),
            'roll_no'=> $this->input->post('roll_no'),
            'biometric_id'=> $this->input->post('biometric_id'),
            'gender'=> $this->input->post('gender'),
            'email'=> $this->input->post('email'),
            'mother_name'=> $this->input->post('mother_name'),
            'father_name'=> $this->input->post('father_name'),
            'father_phone'=> $this->input->post('father_phone'),
            'off_contact'=> $this->input->post('off_contact'),
            'father_email'=> $this->input->post('father_email'),
            'salutation'=> $this->input->post('salutation'),
            'lang_understand'=> $this->input->post('lang_understand'),
            'father_rank'=> $this->input->post('father_rank'),
            'unit_address'=> $this->input->post('unit_address'),
            'home_address'=>$this->input->post('home_address')
            );
        }
        else
        {
            $data = array(
            //'photo'=>'uploads/student/'.$image,
            'adm_number' => $this->input->post('adm_number'),
            'adm_date'=> date('Y-m-d',strtotime($this->input->post('adm_date'))),
            'first_name'=> $this->input->post('first_name'),
            'name'=> $this->input->post('first_name'),
            'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
            'birth_place'=> $this->input->post('birth_place'),
            'mother_tongue'=> $this->input->post('mother_tongue'),
            'blood_group'=> $this->input->post('blood_group'),
            'religion'=> $this->input->post('religion'),
            'nationality'=> $this->input->post('nationality'),
            'student_category_id'=> $this->input->post('student_category_id'),
            'city'=> $this->input->post('city'),
            'state'=> $this->input->post('state'),
            'pin'=> $this->input->post('pin'),
            'country'=> $this->input->post('country'),
            'phno'=> $this->input->post('phno'),
            'mobile'=> $this->input->post('mobile'),
            'class_id'=> $this->input->post('class_id'),
            'section_id'=> $this->input->post('section_id'),
            'batch_id'=> $this->input->post('batch_id'),
            'roll_no'=> $this->input->post('roll_no'),
            'biometric_id'=> $this->input->post('biometric_id'),
            'gender'=> $this->input->post('gender'),
            'email'=> $this->input->post('email'),
            'mother_name'=> $this->input->post('mother_name'),
            'father_name'=> $this->input->post('father_name'),
            'father_phone'=> $this->input->post('father_phone'),
            'off_contact'=> $this->input->post('off_contact'),
            'father_email'=> $this->input->post('father_email'),
            'salutation'=> $this->input->post('salutation'),
            'lang_understand'=> $this->input->post('lang_understand'),
            'father_rank'=> $this->input->post('father_rank'),
            'unit_address'=> $this->input->post('unit_address'),
            'home_address'=>$this->input->post('home_address')
            
            );
        }
         $this->db->where('student_admission_id', $id);
        $res=$this->db->update('student_admission', $data); 
        if($res)
    {
            $message='Successfully updated';
            return $message;
        }
    }
    public function get_details($id){
     $query = $this->db->get_where('student_admission',array('student_admission_id'=>$id));
     return $query->row_array();
    }

    public function get_max_adm(){
        $query = $this->db->query("select max(adm_number) as adm_number from student_admission");
        return $query->row_array();
    }
    public function all_stu_data()
    {
        $query=$this->db->query("select * from student_admission");
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
	public function student_data($id='')
    {
        $query=$this->db->query("select * from student_admission where student_admission_id='$id'");
        return $query->row();
    }
    public function get_full_details($id='',$type)
    {
        $query=$this->db->query("select * from student_admission where student_admission_id='$id'");
        return $query->row();
    }

    public function get_full_details_adm($id)
    {
        $query=$this->db->query("select * from student_admission where adm_number='$id'");
        return $query->row();
    }
    public function student_data_class($id='')
    {
        $section_id=$this->config->item('admin_section_id');
        $class_id=$this->config->item('admin_class_id');
        $query=$this->db->query("select * from student_admission where class_id='$class_id' and section_id='$section_id'");
        return $query->result();
    }
}