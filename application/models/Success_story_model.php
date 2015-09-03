<?php 
class Success_story_model extends MY_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_success_story($id=''){
		$query=$this->db->query("select * from success_story where success_story_id='$id'");
		 if ($query->num_rows() > 0)
			return $query->row();
		else
			 return $a[0]->no_data=0;
	}
	public function add_success_story($id=''){
		
	}

}