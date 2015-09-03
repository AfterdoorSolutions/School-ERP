<?php
class Messages_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function record_count($what) {
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->where($what);
        $query = $this->db->get();  
        return $query->num_rows();
    }
 
    public function inbox($limit, $start,$id) {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->where('status !=' , 'trash' );
        $this->db->where('status !=' , 'removed' );
        $this->db->order_by('timestamp','DESC');
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

    public function sent($limit, $start,$id) {
        $this->db->limit($limit, $start);
        $query=$this->db->query("select * from messages where `from`='$id' and status!='trash' ");
         
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key=>$row) {
                $data[] = $row;
                $query=$this->db->query("select * from user where user_id='$row->to'");
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

   public function trash($limit, $start,$id) {
        $this->db->limit($limit, $start);
        $query=$this->db->get_where('messages', array('to' => $id,'status'=>'trash'));
         
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
   public function compose()
   {
   		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$message=$this->input->post('message');
		$data = array('from' => $from,'to' => $to,'content' => $message ,'status'=>'unread','timestamp'=>date('Y-m-d h:m:s'),'sent_time'=>date('Y-m-d h:m:s'));
		$query=$this->db->insert('messages',$data);
   }
   public function trash_message($messages_id='')
   {
   		$data = array('status' => 'trash' );
   		$this->db->where('messages_id',$messages_id);
   		$this->db->update('messages',$data);
   }
   public function delete($messages_id='')
   {
   		$data = array('status' => 'removed' );
   		$this->db->where('messages_id',$messages_id);
   		$this->db->update('messages',$data);
   }
 }