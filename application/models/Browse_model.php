<?php
class Browse_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function record_count() {
        $query=$this->db->get('user');
        return $query->num_rows();
    }
 
    public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query=$this->db->get('user');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data['result'][] = $row;
                //$data[] = $row;
            }
            return $data;
        }
        
        
   }

   public  function fetch_users_search($limit, $start,$searchterm = '')
   {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($searchterm);
        $this->db->limit($limit, $start);
        $query=$this->db->get();

        $data=array('result'=>array(),'old_data'=>$searchterm,'found'=>'0');
        var_dump($data);
        if ($query->num_rows() > 0) {
                $data['found'] = 1;
            foreach ($query->result_array() as $row) {
                $data['result'][] = $row;
                //$data[] = $row;
            }
            return $data;
        }
        else{
                $data['found'] = 0;
                return $data;
        }
        /*else
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->limit($limit, $start);
            $query=$this->db->get();
            foreach ($query->result_array() as $row) {
                $data['result'][] = $row;
            }
            return $data;
        }*/
   }
   public function search()
   {
       
       $data['gender']=$this->input->get('gender');
       $data['religion']=$this->input->get('religion');
       $data['marital']=$this->input->get('marital');
       $data['height']=$this->input->get('height');
       $graduation_id=$data['graduation']=$this->input->get('graduation');
       $this->db->select("user.city_id,religion_id,user.user_id,user.dob,user.name,user_image.image,education.graduation_id,user.gender");
       $this->db->from('user,education');
       if($data['gender']!=NULL)
        {  
          $gender="'";
          $gender.=implode("','",$this->db->escape_str($data['gender']));
          $gender.="'";
          $this->db->where("gender IN(".$gender.")");
        }
        else{
          $gender="''";
        }
        if($data['religion']!=NULL)
        {
           $religion="'";
           $religion.=implode("','",$this->db->escape_str($data['religion']));
           $religion.="'";
           $this->db->where("religion_id IN(".$religion.")");
         }
         else{
          $religion="''";
        }
        if($data['height']!=NULL)
        {  
          $height="'";
          $height.=implode("','",$this->db->escape_str($data['height']));
          $height.="'";
          $this->db->where("height IN(".$height.")");
        }
        else{
          $height="''";
        }
        if($data['marital']!=NULL)
        {
           $marital="'";
           $marital.=implode("','",$this->db->escape_str($data['marital']));
           $marital.="'";
           $this->db->where("marital IN(".$marital.")");
         }
         else{
          $marital="''";
        }
        
        //$this->db->where('user_id != ');
       // $this->db->join('education', "education.graduation_id = '16'");
        $where="education.graduation_id = '16'";
        $this->db->where($where);
        $this->db->join('user_image','user.user_id=user_image.user_id','left');
        $this->db->group_by('user.user_id');
        $res=$this->db->get();
        $data = array();
        //return $res->result();
        foreach ($res->result() as $key=>$row) {
                $data[] = $row;
                $query=$this->db->query("select * from religion where religion_id='$row->religion_id'");
                $query=$query->row();
                $data[$key]->religion_name=$query->name;
                $query=$this->db->query("select * from location where location_id='$row->city_id'");
                $query=$query->row();
                $data[$key]->city_name=$query->name;
                $query=$this->db->query("select * from user_extra where user_id='$row->user_id'");
                $query=$query->row();
                if($query){$data[$key]->income=$query->income;}
                else {$data[$key]->income="N/A";}
                $query=$this->db->query("select * from user_extra where user_id='$row->user_id'");
                $query=$query->row();
                if($query){$data[$key]->occupation=$query->occupation;}
                else {$data[$key]->occupation="N/A";}
            }

        return $data;
        //return $option1;
   }
 }