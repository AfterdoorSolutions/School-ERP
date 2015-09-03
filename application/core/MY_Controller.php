<?php
class MY_Controller extends CI_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->driver('session');
        
        //Settings Model for LOGO TITLE ETC..
        $this->load->model('get_data','settings');
        $this->settings->get_settings();

        //CHECK REMEMBER ME
        $cook_user=get_cookie('user_portal_id');
        if(!empty($cook_user)){
            $user_portal_id = array('user_portal_id'  => get_cookie('user_portal_id'));
            $this->session->set_userdata($user_portal_id);
            $this->config->set_item('user_portal_id',get_cookie('user_portal_id'));
        }
        if($this->is_admin_logged_in())
        {
            $user_portal_id=$this->config->item('user_portal_id');
            $this->load->model('get_data','user_data');
            $abc=$this->user_data->get_user_portal($user_portal_id);
            //var_dump($abc);
            foreach ($abc as $key => $value) {
                $this->config->set_item("admin_".$key,$value);
            }
        }
        $this->config->set_item('user_id_suf','ZZXUC');
        //$this->output->enable_profiler(TRUE);

        $this->load->model('get_data','data');
        $menu=$this->data->print_menu('0');
        $this->config->set_item('menu',$menu);
        $categories=$this->data->print_category('0');
        $this->config->set_item('categories',$categories);

    }

    public function get_age($date){
          $birthDate = $date;
          $birthDate = explode("-", $birthDate);
          $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
          return $age;
        }
    public function is_logged_in()
    {
        $user = $this->session->userdata('user_id');
        $this->config->set_item('user_id',$user);
        if(isset($user))
            return $user;
        else
            return false;
    }
    public function is_admin_logged_in()
    {
        $admin_id = $this->session->userdata('user_portal_id');
        $this->config->set_item('user_portal_id',$admin_id);
        if(isset($admin_id))
            return $admin_id;
        else
            return false;
    }
    public function get_menu()
    {

    }
    function get_name($table,$condition,$get,$return){
        $data=$this->db->query("select `$return` from $table where `$get`='$condition'");
        return $data;
    }
}