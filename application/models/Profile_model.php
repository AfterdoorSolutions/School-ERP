<?php 

/**
* 
*/
class Profile_model extends MY_Model
{
	
	function __construct()
	{
		# code...
	}

    public function profile($user_id)
    {
       $query = $this->db->query("select * from user where user_id='$user_id'");
       $data='';
       foreach ($query->result() as $key=>$value) 
       {
            $data[] = $value;
            $query=$this->db->query("select * from location where location_id='$value->city_id'");
            $query=$query->row();
            if($query)
            {
               $data[$key]->city_name=$query->name; 
            }
            else
            {
                $data[$key]->city_name='-';
            }
            

            $query1=$this->db->query("select * from location where location_id='$value->country_id'");
            $query1=$query1->row();
            if($query1)
            {
                $data[$key]->country_name=$query1->name;
            }
            else
            {
                $data[$key]->country_name='-';
            }

            $query2=$this->db->query("select * from additional where user_id='$value->user_id'");
            $query2=$query2->row();
            //var_dump($query2);
            if($query2)
            {
                $data[$key]->address=$query2->address;
                $data[$key]->about_me=$query2->about_me;
                $data[$key]->blood_group=$query2->blood_group;
                $data[$key]->language=$query2->language_id;
                $data[$key]->messenger_id=$query2->messenger_id;
                $data[$key]->messenger_channel=$query2->messenger_channel;
                $data[$key]->messenger_s=$query2->messenger_s; 
            }
            else
            {
                $data[$key]->address='-';
                $data[$key]->about_me='-';
                $data[$key]->blood_group='-';
                $data[$key]->language='-';
                $data[$key]->messenger_id='-';
                $data[$key]->messenger_channel='-';
                $data[$key]->messenger_s='-';
                $query2=(object)array();
                $query2->language_id='';
            }


            $query3=$this->db->query("select * from family where user_id='$value->user_id'");
            $query3=$query3->row();
            if($query3)
            {
                $data[$key]->values=$query3->values;
                $data[$key]->type=$query3->type;
                $data[$key]->father_occ=$query3->father_occ;
                $data[$key]->mother_occ=$query3->mother_occ;
                $data[$key]->brother=$query3->brother;
                $data[$key]->brother_total=$query3->brother_total;
                $data[$key]->sister=$query3->sister;
                $data[$key]->sister_total=$query3->sister_total;
                $data[$key]->live_parent=$query3->live_parent;
                $data[$key]->about_family=$query3->about_family;
                $data[$key]->status=$query3->status;
                $data[$key]->family_income=$query3->family_income;
            }
            else
            {
                $data[$key]->values='-';
                $data[$key]->type='-';                
                $data[$key]->father_occ='-';
                $data[$key]->mother_occ='-';
                $data[$key]->brother='-';
                $data[$key]->brother_total='-';
                $data[$key]->sister='-';
                $data[$key]->sister_total='-';
                $data[$key]->live_parent='-';
                $data[$key]->about_family='-';
                $data[$key]->status='-';
                $data[$key]->family_income='-';
               
            }

            $query4=$this->db->query("select * from education where user_id='$value->user_id'");
            $query4=$query4->row();
            if($query4)
            {
                $data[$key]->school=$query4->school;
                $data[$key]->college=$query4->college;
                $data[$key]->pg_college=$query4->pg_college;
            }
            else
            {
                $data[$key]->school='-';
                $data[$key]->college='-';
                $data[$key]->pg_college='-';
                $query4=(object)array();
                $query4->graduation_id='';
                $query4->pg_id='';
            }
            

            $query5=$this->db->query("select * from user_extra where user_id='$value->user_id'");
            $query5=$query5->row();
            if($query5)
            {
                $data[$key]->about=$query5->about;
                $data[$key]->org=$query5->org;
                $data[$key]->interested=$query5->interested;
                $data[$key]->prof_background=$query5->prof_background;
                $data[$key]->income=$query5->income;
                $data[$key]->occupation=$query5->occupation;
                $data[$key]->work_status=$query5->work_status;
            }
            else
            {
                $data[$key]->about='-';
                $data[$key]->org='-';
                $data[$key]->interested='-';
                $data[$key]->prof_background='-';
                $data[$key]->income='-';
                $data[$key]->occupation='-';
                $data[$key]->work_status='-';
                $query5=(object)array();
                $query5->highest_id='';
            }
            

            $query6=$this->db->query("select * from graduation where graduation_id='$query4->graduation_id'");
            $query6=$query6->row();
            if($query6)
            {
                $data[$key]->grad_name=$query6->name;
            }
            else
            {
                $data[$key]->grad_name='-';
            }

            $query7=$this->db->query("select * from graduation where graduation_id='$query4->pg_id'");
            $query7=$query7->row();
            if($query7)
            {
                $data[$key]->pg_name=$query7->name;  
            }
            else
            {
                $data[$key]->pg_name='-';  
            }

            $query8=$this->db->query("select * from graduation where graduation_id='$query5->highest_id'");
            $query8=$query8->row();
            if($query8)
            {
                $data[$key]->highest_name=$query8->name;
            }
            else
            {
                $data[$key]->highest_name='-';
            }

            $query9=$this->db->query("select * from lifestyle where user_id='$value->user_id'");
            $query9=$query9->row();
            if($query9)
            {
                $data[$key]->diet=$query9->diet;
                $data[$key]->smoke=$query9->smoke;
                $data[$key]->drink=$query9->drink;
                $data[$key]->complexion=$query9->complexion;
                $data[$key]->body_type=$query9->body_type;
                $data[$key]->weight=$query9->weight;
                $data[$key]->disease=$query9->disease;
                $data[$key]->r_status=$query9->r_status;
                $data[$key]->house=$query9->house;
                $data[$key]->car=$query9->car;
                $data[$key]->pet=$query9->pet;
                $data[$key]->hiv=$query9->hiv;
            }
            else
            {
                $data[$key]->diet='-';
                $data[$key]->smoke='-';
                $data[$key]->drink='-';
                $data[$key]->complexion='-';
                $data[$key]->body_type='-';
                $data[$key]->weight='-';
                $data[$key]->disease='-';
                $data[$key]->r_status='-';
                $data[$key]->house='-';
                $data[$key]->car='-';
                $data[$key]->pet='-';
                $data[$key]->hiv='-';
            }

            if($query2)
            {
                $lang=unserialize($query2->language_id);
                $marital="'";
                if($lang){$marital.=implode("','",$lang);}
                $marital.="'";
                $query10=$this->db->query("select * from language where language_id IN(".$marital.")");
                $query10=$query10->result();
                $data[$key]->language_name=$query10;
            }
            else
            {
                $data[$key]->language_name='-';
            }

            $query11=$this->db->query("select * from hobby where user_id='$value->user_id'");
            $query11=$query11->row();
            if($query11)
            {
                $data[$key]->book=$query11->book;
                $data[$key]->f_movie=$query11->f_movie;
                $data[$key]->tv_show=$query11->tv_show;
                $data[$key]->food=$query11->food;
                $data[$key]->vacation=$query11->vacation;
                $data[$key]->hobbi=unserialize($query11->hobbi);
            }
            else
            {
                $data[$key]->book='-';
                $data[$key]->f_movie='-';
                $data[$key]->tv_show='-';
                $data[$key]->food='-';
                $data[$key]->vacation='-';
            }

            $query12=$this->db->query("select * from kundli where user_id='$value->user_id'");
            $query12=$query12->row();
            if($query12)
            {
                $data[$key]->time=$query12->time;
                $data[$key]->manglik=$query12->manglik;
                $data[$key]->horoscope=$query12->horoscope;
                $data[$key]->rashi=$query12->rashi;
                $data[$key]->nakshatra=$query12->nakshatra;
                $data[$key]->sign=$query12->sign;
            }
            else
            {
                $data[$key]->time='-';
                $data[$key]->manglik='-';
                $data[$key]->horoscope='-';
                $data[$key]->rashi='-';
                $data[$key]->nakshatra='-';
                $data[$key]->sign='-';
            }

            $query13=$this->db->query("select * from user_image where user_id='$value->user_id' order by user_image_id desc ");
            $query13=$query13->row();
            if($query13){
                $data[$key]->image=$query13->image;
            }
            else{
                $data[$key]->image='uploads/users/default/default.jpg';
            }
            
       }
       return $data;
    }

	public function basic_update($id="")

    {
        $data = array(
        'profile_for' => $this->input->post('profile_for'),
        'gender'=> $this->input->post('gender'),
        'dob'=> $this->input->post('dob'),
        'height'=> $this->input->post('height'),
        'marital'=> $this->input->post('marital')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('user', $data);
    }

    public function contact_update($id="")

    {
        $data = array(
        'mob_prefix'=> $this->input->post('mob_prefix'),
        'mob_num'=> $this->input->post('mob_num'),
        'mob_shown_to'=> $this->input->post('mob_shown_to'),
        'landline_prefix'=> $this->input->post('landline_prefix'),
        'landline_num'=> $this->input->post('landline_num'),
        'landline_shown_to'=> $this->input->post('landline_shown_to')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('user', $data);

        $data = array(
        'messenger_id' => $this->input->post('messenger_id'),
        'messenger_channel'=> $this->input->post('messenger_channel'),
        'messenger_s'=> $this->input->post('messenger_s')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('additional', $data);
    }

    public function about_update($id="")
    {
        $data = array(
        'about_me'=> $this->input->post('about_me')
        
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('additional', $data);
    }

    public function about_family_update($id="")
    {
        $data = array(
        'about_family'=> $this->input->post('about_family')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('family', $data);
    }

    public function about_education_update($id="")
    {
        $data = array(
        'about'=> $this->input->post('about')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('user_extra', $data);
    }

    public function about_work_update($id="")
    {
        $data = array(
        'prof_background'=> $this->input->post('prof_background')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('user_extra', $data);
    }

    public function family_update($id="")
    {
        $data = array(
        'values' => $this->input->post('values'),
        'type' => $this->input->post('type'),
        'father_occ' => $this->input->post('father_occ'),
        'mother_occ' => $this->input->post('mother_occ'),
        'brother' => $this->input->post('brother'),
        'brother_total' => $this->input->post('brother_total'),
        'sister' => $this->input->post('sister'),
        'sister_total' => $this->input->post('sister_total'),
        'live_parent' => $this->input->post('live_parent'),
         'sister' => $this->input->post('sister'),
        'sister_total' => $this->input->post('sister_total'),
        'status' => $this->input->post('status'),
        'family_income' => $this->input->post('family_income')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('family', $data);
    }

    public function education_update($id="")
    {
        $data = array(
        'school' => $this->input->post('school'),
        'college' => $this->input->post('college'),
        'graduation_id' => $this->input->post('graduation_id'),
        'pg_college' => $this->input->post('pg_college'),
        'pg_id' => $this->input->post('pg_id'),

        );

        $this->db->where('user_id', $id);
        $res=$this->db->update('education', $data);

        $data = array(
        'work_status' => $this->input->post('work_status'),
        'highest_id' => $this->input->post('highest_id'),
        'income' => $this->input->post('income'),
        'occupation' => $this->input->post('occupation'),
        'org' => $this->input->post('org')

        );

        $this->db->where('user_id', $id);
        $res=$this->db->update('user_extra', $data);
    }

    public function lifestyle_update($id="")
    {
        
        $data = array(
        'diet' => $this->input->post('diet'),
        'smoke' => $this->input->post('smoke'),
        'house' => $this->input->post('house'),
        'r_status' => $this->input->post('r_status'),
        'pet' => $this->input->post('pet'),
        'complexion' => $this->input->post('complexion'),
        'body_type' => $this->input->post('body_type'),
        'weight' => $this->input->post('weight'),
        'disease' => $this->input->post('disease'),
        'car' => $this->input->post('car'),
        'drink' => $this->input->post('drink'),
        'hiv' => $this->input->post('hiv')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('lifestyle', $data);

        $data = array(
        'blood_group' => $this->input->post('blood_group')
        );
        $this->db->where('user_id', $id);
        $res=$this->db->update('additional', $data);
        
    }

    public function kundli_update($id="")
    {
        //echo "Kundli Update";
        $data = array(
        'time' => $this->input->post('time'),
        'manglik' => $this->input->post('manglik'),
        'horoscope' => $this->input->post('horoscope'),
        'rashi' => $this->input->post('rashi'),
        'nakshatra' => $this->input->post('nakshatra'),
        'sign' => $this->input->post('sign')
        );
        $this->db->where('user_id', $id);
        $rest=$this->db->update('kundli',$data);
        
    }

    public function hobby_update($id="")
    {
        //echo "Kundli Update";
       $data = array(
        'user_id' => $this->input->post('user_id'),
        'hobbi' => serialize($this->input->post('hobbi')),
        'interest' => serialize($this->input->post('interest')),
        'music' => serialize($this->input->post('music')),
        'read' => serialize($this->input->post('read')),
        'book' => $this->input->post('book'),
        'movie' => serialize($this->input->post('movie')),
        'f_movie' => $this->input->post('f_movie'),
        'tv_show' => $this->input->post('tv_show'),
        'sport' => serialize($this->input->post('sport')),
        'cuisine' => serialize($this->input->post('cuisine')),
        'food' => $this->input->post('food'),
        'vacation' => $this->input->post('vacation')
        );
        $this->db->where('user_id', $id);
        $rest=$this->db->update('hobby',$data);
        
    }

    public function register()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'profile_for' => $this->input->post('profile_for'),
        'dob' => $this->input->post('dob'),
        'gender' => $this->input->post('gender'),
        'height' => $this->input->post('height'),
        'country_id' => $this->input->post('country_id'),
        'city_id' => $this->input->post('city_id'),
        'marital' => $this->input->post('marital'),
        'mtongue' => $this->input->post('mtongue'),
        'religion_id' => $this->input->post('religion_id'),
        'caste_id' => $this->input->post('caste_id'),
        'mob_prefix' => $this->input->post('mob_prefix'),
        'mob_num' => $this->input->post('mob_num'),
        'mob_shown_to' => $this->input->post('mob_shown_to'),
        'landline_prefix' => $this->input->post('landline_prefix'),
        'landline_num' => $this->input->post('landline_num'),
        'landline_shown_to' => $this->input->post('landline_shown_to'),
		);
		$res=$this->db->insert('user', $data); 
        $this->db->select_max('user_id');
        $rew=$this->db->get('user');
        $resw=$rew->result_array();
        var_dump($resw[0]['user_id']);
        $data = array(
        'user_id' => $resw[0]['user_id'],
        );
        $this->db->insert('additional', $data); 
        $this->db->insert('education', $data); 
        $this->db->insert('family', $data); 
        $this->db->insert('hobby', $data); 
        $this->db->insert('lifestyle', $data); 
        $this->db->insert('kundli', $data); 
        $this->db->insert('user_extra', $data); 
		if($res)
        {
			$this->session->set_flashdata('profile_register','Successfully Registered.PLease Login to Continue');
		}
	}

    public function login()
    {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $remember = $this->input->post('remember');

            $query = $this->db->query("select * from user where email='$email' and password='$password'");
            
            if($query->num_rows() == 1)
            {
                // If there is a user, then create session data
                $row = $query->row();
                $data = array(
                        'user_id' => $row->user_id,
                        'validated' => true
                        );
                $this->session->set_userdata($data);
                $cookie = array(
                    'name'   => 'matri_user',
                    'value'  => $row->user_id,
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

    public function view($id)
    {
        $query = $this->db->query("select * from user where user_id='$id'");
        if($query->num_rows()>0) { return $query->result(); } else { return show_404();}
        
    }

    public function education()
    {
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'school' => $this->input->post('school'),
        'college' => $this->input->post('college'),
        'graduation_id' => $this->input->post('graduation_id'),
        'pg_college' => $this->input->post('pg_college'),
        'pg_id' => $this->input->post('pg_id'),

        );
        $rest=$this->db->insert('education', $data); 
        $data = array(
        'work_status' => $this->input->post('work_status'),
        'about' => $this->input->post('about'),
        'highest_id' => $this->input->post('highest_id'),
        'income' => $this->input->post('income'),
        'occupation' => $this->input->post('occupation'),
        'org' => $this->input->post('org'),
        'user_id' => $this->input->post('user_id'),
        'prof_background' => $this->input->post('prof_background')

        );
        $rest=$this->db->insert('user_extra', $data); 
        if($rest)
        {
            $message_edu='Successfully Added Eduation & Occupation to your profile';
            return $message_edu;
        }
    }

    public function family()
    {
         $data = array(
        'user_id' => $this->input->post('user_id'),
        'values' => $this->input->post('values'),
        'type' => $this->input->post('type'),
        'father_occ' => $this->input->post('father_occ'),
        'mother_occ' => $this->input->post('mother_occ'),
        'brother' => $this->input->post('brother'),
        'brother_total' => $this->input->post('brother_total'),
        'sister' => $this->input->post('sister'),
        'sister_total' => $this->input->post('sister_total'),
        'live_parent' => $this->input->post('live_parent'),
         'sister' => $this->input->post('sister'),
        'sister_total' => $this->input->post('sister_total'),
        'about_family' => $this->input->post('about_family'),
        'status' => $this->input->post('status'),
        'family_income' => $this->input->post('family_income')

        );
        $rest=$this->db->insert('family', $data); 
        if($rest)
        {
            $message_family='Successfully Added Family Details';
            return $message_family;
        }
    }

    public function additional()
    {
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'blood_group' => $this->input->post('blood_group'),
        'handicapped' => $this->input->post('handicapped'),
        'language_id' => serialize($this->input->post('language_id')),
        'messenger_s' => $this->input->post('messenger_s'),
        'messenger_id' => $this->input->post('messenger_id'),
        'address' => $this->input->post('address'),
        'address_s' => $this->input->post('address_s'),
        'about_me' => $this->input->post('about_me'),
        'messenger_channel' => $this->input->post('messenger_channel')
        );
        $rest=$this->db->insert('additional', $data); 
        if($rest)
        {
            $message_additional='Successfully Added Details';
            return $message_additional;
        }
    }

    public function lifestyle()
    {
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'diet' => $this->input->post('diet'),
        'smoke' => $this->input->post('smoke'),
        'house' => $this->input->post('house'),
        'r_status' => $this->input->post('r_status'),
        'pet' => $this->input->post('pet'),
        'complexion' => $this->input->post('complexion'),
        'body_type' => $this->input->post('body_type'),
        'weight' => $this->input->post('weight'),
        'disease' => $this->input->post('disease'),
        'car' => $this->input->post('car'),
        'drink' => $this->input->post('drink'),
        'hiv' => $this->input->post('hiv')
        );
        $rest=$this->db->insert('lifestyle', $data); 
        if($rest)
        {
            $message_life='Successfully Added Details';
            return $message_life;
        }
    }

    public function hobby()
    {
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'hobbi' => serialize($this->input->post('hobbi')),
        'interest' => serialize($this->input->post('interest')),
        'music' => serialize($this->input->post('music')),
        'read' => serialize($this->input->post('read')),
        'book' => $this->input->post('book'),
        'movie' => serialize($this->input->post('movie')),
        'f_movie' => $this->input->post('f_movie'),
        'tv_show' => $this->input->post('tv_show'),
        'sport' => serialize($this->input->post('sport')),
        'cuisine' => serialize($this->input->post('cuisine')),
        'food' => $this->input->post('food'),
        'vacation' => $this->input->post('vacation')
        );
        $rest=$this->db->insert('hobby', $data); 
        if($rest)
        {
            $message_hobby='Successfully Added Details';
            return $message_hobby;
        }
    }

    public function kundli()
    {
        $data = array(
        'user_id' => $this->input->post('user_id'),
        'country' => $this->input->post('country'),
        'city' => $this->input->post('city'),
        'time' => $this->input->post('time'),
        'manglik' => $this->input->post('manglik'),
        'horoscope' => $this->input->post('horoscope'),
        'rashi' => $this->input->post('rashi'),
        'nakshatra' => $this->input->post('nakshatra'),
        'sign' => $this->input->post('sign')
        );
        $rest=$this->db->insert('kundli', $data); 
        if($rest)
        {
            $message_kundli='Successfully Added Details';
            return $message_kundli;
        }
    }

    public function upload_image($id,$filename){
        $data = array(
        'user_id' => $id,
        'image' => "uploads/users/".$filename,
        'type'=>"profile"
        );
        
        $config['source_image'] = $data['image'];
        $config['wm_text'] = 'Copyright 2006 - John Doe';
        $config['wm_type'] = 'text';
        $config['wm_font_size'] = '16';
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '20';

        $this->image_lib->initialize($config);

        $this->image_lib->watermark();
         $rest=$this->db->insert('user_image', $data);

    }
}
        
?>