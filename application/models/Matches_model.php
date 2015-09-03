<?php
class Matches_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function record_count($what) {
        $this->db->select('*');
        $this->db->from('interests');
        $this->db->where($what);
        $query = $this->db->get();  
        return $query->num_rows();
    }
 
    
   public function accepted($limit, $start,$id) {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('interests');
        $this->db->where('status =' , 'accepted' );
        $this->db->where('to =' , $id );
        $query=$this->db->get();
         
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$row) {
                $data[] = $row;
                $query=$this->db->query("select * from user where user_id='$row->from'");
                $query=$query->row();
                $data[$key]->name=$query->name;
                $data[$key]->no_data=false;
            }
            return $data;
        }
        else
        {
            $data=array("0"=>(object)array("no_data"=>true));
            return $data;
        }
        
   }


   public function interest_sent($limit, $start,$id) {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('interests');
        $this->db->where('from =' , $id );
        $query=$this->db->get();
         
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$row) {
                $data[] = $row;
                $query=$this->db->query("select * from user where user_id='$row->from'");
                $query=$query->row();
                $data[$key]->name=$query->name;
                $data[$key]->no_data=false;
            }
            return $data;
        }
        else
        {
            $data=array("0"=>(object)array("no_data"=>true));
            return $data;
        }
        
   }

   public function interest_received($limit, $start,$id) {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('interests');
        $this->db->where('to =' , $id );
        $query=$this->db->get();
         
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$row) {
                $data[] = $row;
                $query=$this->db->query("select * from user where user_id='$row->from'");
                $query=$query->row();
                $data[$key]->name=$query->name;
                $data[$key]->no_data=false;
            }
            return $data;
        }
        else
        {
            $data=array("0"=>(object)array("no_data"=>true));
            return $data;
        }
        
   }
 }