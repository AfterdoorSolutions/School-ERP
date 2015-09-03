<?php
class Login_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		    $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $remember = $this->input->post('remember');
            $query = $this->db->query("select * from user_portal where email='$email' and password='$password'");
            
            if($query->num_rows() == 1)
            {
                // If there is a user, then create session data
                $row = $query->row();
                $data = array(
                        'user_portal_id' => $row->user_portal_id,
                        'validated' => true,
                        'type' => $row->type
                        );
                $this->session->set_userdata($data);
                $cookie = array(
                    'name'   => 'user_portal_id',
                    'value'  => $row->user_portal_id,
                    'expire' => '8650000'
                );
                if($remember==1){$this->input->set_cookie($cookie);}
                return true;
            }
            else
            {
                $message_login="Invalid Email/Password.";
                return $message_login;
            }
	}

    
}