<?php 

/**
* 
*/
class Get_data extends MY_Model
{
	
	function __construct()
	{
		# code...
	}
	public function get_settings(){
		$query_setting = $this->db->query("SELECT * FROM settings where setting_id='1'");
		foreach ($query_setting->result() as $row)
			{
			        $this->config->set_item('logo_url',$row->logo);
			        $this->config->set_item('logo_alt',$row->name);
			}    
	}
	public function get_user($id){
		$query_setting = $this->db->query("SELECT * FROM `user` where `user_id`='$id' LIMIT 1");
		return $query_setting->row();
	}
	public function get_user_portal($id=''){
		$query_setting = $this->db->query("SELECT * FROM `user_portal` where `user_portal_id`='$id' LIMIT 1");
		return $query_setting->row();
	}
	public function get_menu($id=''){
		$query_setting = $this->db->query("SELECT * FROM `menu` where `parent`='$id' ");
		$menu='';
		foreach ($query_setting->result() as $key => $value) {
        $menu.='<li><a href="'.$value->link.'">'.$value->name.'</a></li>';
        }
        return $menu;
	}

	public function print_menu($id){
		/*$r="";
		echo $id."-";
		$query_setting = $this->db->query("SELECT * FROM `menu` where `parent`='$id' ");
		foreach ($query_setting->result() as $key => $value) {
        	$r=$r.",".$value->menu_id;
        	$this->print_menu($value->menu_id);
        }*/
        //return $r;
        $this->db->select('*');
        $this->db->order_by('sort');
	    $menu_items = $this->db->get('menu')->result_array();

	    return prepareList($menu_items);
	}
	public function print_category($id){
		/*$r="";
		echo $id."-";
		$query_setting = $this->db->query("SELECT * FROM `menu` where `parent`='$id' ");
		foreach ($query_setting->result() as $key => $value) {
        	$r=$r.",".$value->menu_id;
        	$this->print_menu($value->menu_id);
        }*/
        //return $r;
        $this->db->select('*');
	    $menu_items = $this->db->get('category')->result_array();

	    return categoryList($menu_items);
	}
	public function print_course($id){
		$this->db->select('*');
		$this->db->where('category_id',$id);
	    $category = $this->db->get('category')->result_array();
		return $category;
	}
	public function count_students($value='')
	{
		$this->db->select('count(*) as total');
		
		if($value!='')
		$this->db->where('status',$value);

	    $result = $this->db->get('student_admission')->row();
		return $result->total;
	}
	public function count_books($value='')
	{
		$this->db->select('count(*) as total');
		
		if($value!='')
		$this->db->where('status',$value);

	    $result = $this->db->get('book')->row();
		return $result->total;
	}
	public function count_staff($value='')
	{
		$this->db->select('count(*) as total');
		
		if($value!='')
		$this->db->where('status',$value);

	    $result = $this->db->get('staff')->row();
		return $result->total;
	}
}

