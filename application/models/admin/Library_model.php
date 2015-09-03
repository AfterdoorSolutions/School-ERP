<?php
class Library_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

  public function issue()
  {

  }

	public function get_all_books($type)
  {
    if($type='accession'){$sort="asc"; } else { $sort="desc"; }
    $query = $this->db->query("select * from book where status='active' order by accession_no $sort");
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

  public function get_book_detail($accession_no)
  {
    $query = $this->db->query("select * from book where accession_no='$accession_no'");
      if($query=='')
      {
         $query=array();
         return $query;
      }
      else
      {
         return $query->row();
      }
  }

  public function student_result()
  {
    $query = $this->db->query("select * from student_admission");
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
  

  public function staff_result()
  {
    $query = $this->db->query("select * from staff");
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

  public function books_add()
  {
    if($this->input->post('gifted')=='no')
    {
       for($i=0; $i < $this->input->post('quantity'); $i++)
        {
          //echo "Hi";
          $data = array(
              'accession_no' => $this->input->post('accession_no')+$i,
              'title' => $this->input->post('title'),
              'author'=>$this->input->post('author'),
              'language'=>$this->input->post('language'),
              'subject'=>$this->input->post('subject'),
              'pub_yr'=>$this->input->post('pub_yr'),
              'publisher'=>$this->input->post('publisher'),
              'edition'=>$this->input->post('edition'),
              'pages'=>$this->input->post('pages'),
              'mrp'=>$this->input->post('mrp'),
              'invoice_no'=>$this->input->post('invoice_no'),
              'vendor'=>$this->input->post('vendor'),
              'location'=>$this->input->post('location'),
              'purchase_date'=>$this->input->post('purchase_date'),
              'gifted'=>$this->input->post('gifted'),
              'reference'=>$this->input->post('reference'),
              'quantity'=>1

              );
            $res=$this->db->insert('book', $data);
        }
    }
    else
    {
      for($i=0; $i < $this->input->post('quantity'); $i++)
      {
        //echo "Gifted";
        $data = array(
            'accession_no' => $this->input->post('accession_no_gifted')+$i,
            'title' => $this->input->post('title'),
            'author'=>$this->input->post('author'),
            'language'=>$this->input->post('language'),
            'subject'=>$this->input->post('subject'),
            'pub_yr'=>$this->input->post('pub_yr'),
            'publisher'=>$this->input->post('publisher'),
            'edition'=>$this->input->post('edition'),
            'pages'=>$this->input->post('pages'),
            'mrp'=>$this->input->post('mrp'),
            'invoice_no'=>$this->input->post('invoice_no'),
            'vendor'=>$this->input->post('vendor'),
            'location'=>$this->input->post('location'),
            'purchase_date'=>$this->input->post('purchase_date'),
            'gifted'=>$this->input->post('gifted'),
            'reference'=>$this->input->post('reference'),
            'quantity'=>1

            );
          $res=$this->db->insert('book', $data);
      }
    }
    if($res)
    {
      $message='Successfully Added';
      return $message;
    }
  }

  public function get_book($book_id)
  {
      $query_book = $this->db->query("SELECT * FROM `book` where `book_id`='$book_id'");
      return $query_book->row();
  }
     
  public function get_details_lib($book_id)
  {
      $data = (object) array();
      $check=$this->check_book_issued($book_id);
      $query = $this->db->get_where('book',array('accession_no'=>$book_id));

      if($check==NULL){
          $data=$query->result();
        }
      else{
            $data='';
            foreach ($query->result() as $key => $value) 
            {
              $data[]=$value;
              if($check->issue_to=="student")
              {
              $query2 = $this->db->query("select first_name as name,adm_number as id from student_admission where student_admission_id='$check->issue_to_id'");
              }
              else
              {
              $query2 = $this->db->query("select firstname as name,emp_code as id from staff where staff_id='$check->issue_to_id'");

              }
              $result=$query2->row();
              $data[$key]->issue_to=$check->issue_to;
              $data[$key]->issue_to_id=$check->issue_to_id;
              $data[$key]->issue_date=$check->issue_date;
              $data[$key]->due_date=$check->due_date;
              $data[$key]->adm_number=$result->id;
              $data[$key]->first_name=$result->name;
            }
        }
        return $data;
      
  }

  public function check_book_issued($book_id){
      $query = $this->db->get_where('books_issued',array('accession_no'=>$book_id,'return_date'=>'0'));
      return $query->row();
  }

   public function get_lib_settings($setting_id)
  {
      $query = $this->db->get_where('settings',array('setting_id'=>$setting_id));
      return $query->row();
  }

  public function get_student($student_id,$what)
  {
      if($what=='student')
      {
        $query_book = $this->db->query("select student_admission_id as id, name,adm_number,name from student_admission where adm_number=$student_id and status='active'");
      }
      else
      {
        $query_book = $this->db->query("select staff_id as id,firstname as name,emp_code as adm_number from staff where emp_code=$student_id and status='active'");
      }
      return $query_book->row();
  }
     
  public function get_details_stu($student_id)
  {
      $query = $this->db->get_where('student_admission',array('student_admission_id'=>$student_id));
      return $query->row();
  }

  public function get_staff($staff_id)
  {
      $query_book = $this->db->query("SELECT * FROM `staff` where `staff_id`='$staff_id'");
      return $query_book->row();
  }
     
  public function get_details_staff($staff_id)
  {
      $query = $this->db->get_where('staff',array('staff_id'=>$staff_id));
      return $query->row();
  }
  
  /*public function get_fine($fine_id)
  {
      $query_book = $this->db->query("select * from fine where `student_id`='$student_id'");
      return $query_book->row();
  }*/
     
  public function get_details_fine($adm_no="",$status="")
  {
    if($status==0)
    {
      $data='';
      $query = $this->db->get_where('student_admission',array('adm_number'=>$adm_no));
      $value1=$query->row();
      if($value1=='') { $data=''; return $data;} 
      else
      {
        $query1=$this->db->query("select * from fine where student_id=$value1->student_admission_id and paid='0'");
        $value2=$query1->result();
        foreach ($value2 as $key => $val) {
            $data[]=$val;
            $data[$key]->name=$value1->name;
            $data[$key]->adm_no=$value1->adm_number;
            $query2=$this->db->get_where('books_issued',array('books_issued_id'=>$val->issue_id));
            $value3=$query2->row();
            if($value3)
            {
              $data[$key]->issue_date=$value3->issue_date;
              $data[$key]->due_date=$value3->due_date;
              $data[$key]->return_date=$value3->return_date;
              $data[$key]->paid=$val->paid;
              $query4=$this->db->get_where('book',array('accession_no'=>$value3->accession_no));
              $value4=$query4->row();
              if($value4)
              {
                $data[$key]->accession_no=$value3->accession_no;
                $data[$key]->title=$value4->title;
              }
              else
              {
                $data[$key]->accession_no='-';
                $data[$key]->title='-';
              }
            }
            else
            {
              $data[$key]->issue_date='-';
              $data[$key]->due_date='-';
              $data[$key]->return_date='-';
              $data[$key]->paid='-';
            }
        }
        
        return $data;
      }
    }
    if($status==1)
    {
      $data='';
      $query = $this->db->get_where('student_admission',array('adm_number'=>$adm_no));
      $value1=$query->row();
      if($value1=='') { $data=''; return $data;} 
      else
      {
        $query1=$this->db->get_where('fine',array('student_id'=>$value1->student_admission_id));
        $value2=$query1->result();
        foreach ($value2 as $key => $val) {
            $data[]=$val;
            $data[$key]->name=$value1->name;
            $data[$key]->adm_no=$value1->adm_number;
            $query2=$this->db->get_where('books_issued',array('books_issued_id'=>$val->issue_id));
            $value3=$query2->row();
            if($value3)
            {
                $data[$key]->issue_date=$value3->issue_date;
                $data[$key]->due_date=$value3->due_date;
                $data[$key]->return_date=$value3->return_date;
                $data[$key]->paid=$val->paid;
                $query4=$this->db->get_where('book',array('accession_no'=>$value3->accession_no));
                $value4=$query4->row();
                if($value4)
                {
                  $data[$key]->accession_no=$value3->accession_no;
                  $data[$key]->title=$value4->title;
                }
                else
                {
                  $data[$key]->accession_no='-';
                  $data[$key]->title='-';
                }
            }
            else
            {
                $data[$key]->issue_date='-';
                $data[$key]->due_date='-';
                $data[$key]->return_date='-';
                $data[$key]->paid='-';
            }
        }
        
        return $data;
      }
    }
  }

  public function get_lib_1($book_id)
  {
      $data = (object) array();
      $check=$this->check_book_issued($book_id);
      $query = $this->db->get_where('book',array('accession_no'=>$book_id));

      if($check==NULL){
          $data=$query->row();
        }
      else{   if($check->issue_to=="student")
              {
              $query2 = $this->db->query("select first_name as name,adm_number as id from student_admission where student_admission_id='$check->issue_to_id'");
              }
              else
              {
              $query2 = $this->db->query("select firstname as name,emp_code as id from staff where staff_id='$check->issue_to_id'");

              }
              $result=$query2->row();
              $data->issue_to=$check->issue_to;
              $data->issue_to_id=$check->issue_to_id;
              $data->issue_date=$check->issue_date;
              $data->due_date=$check->due_date;
              $data->adm_number=$result->id;
              $data->first_name=$result->name;
            
        }
        return $data;
      
  }

  public function get_details_book($adm_no="",$status="")
  {
    if($status==2)
    {
      $data='';
      $query = $this->db->get_where('student_admission',array('adm_number'=>$adm_no));
      $value1=$query->row();
      if($value1=='') { $data=''; return $data;} 
      else
      {
        $query1=$this->db->query("select * from books_issued where issue_to_id='$value1->student_admission_id' and return_date=0");
        $value2=$query1->result();
        foreach ($value2 as $key => $val) 
        {
          $data[]=$val;
          $data[$key]->name=$value1->name;
          $data[$key]->adm_no=$value1->adm_number;
          $data[$key]->issue_date=$val->issue_date;
          $data[$key]->due_date=$val->due_date;
          $data[$key]->return_date=$val->return_date;
          $query4=$this->db->get_where('book',array('accession_no'=>$val->accession_no));
          $value4=$query4->row();
          if($value4)
          {
            $data[$key]->accession_no=$value4->accession_no;
            $data[$key]->title=$value4->title;
          }
          else
          {
            $data[$key]->accession_no='-';
            $data[$key]->title='-';
          }
        }
          return $data;
      }
    }

    if($status==3)
    {
      $data='';
      $query = $this->db->get_where('student_admission',array('adm_number'=>$adm_no));
      $value1=$query->row();
      if($value1=='') { $data=''; return $data;} 
      else
      {
        $query1=$this->db->query("select * from books_issued where issue_to_id='$value1->student_admission_id'");
        $value2=$query1->result();
        foreach ($value2 as $key => $val) 
        {
          $data[]=$val;
          $data[$key]->name=$value1->name;
          $data[$key]->adm_no=$value1->adm_number;
          $data[$key]->issue_date=$val->issue_date;
          $data[$key]->due_date=$val->due_date;
          $data[$key]->return_date=$val->return_date;
          $query4=$this->db->get_where('book',array('accession_no'=>$val->accession_no));
          $value4=$query4->row();
          if($value4)
          {
            $data[$key]->accession_no=$value4->accession_no;
            $data[$key]->title=$value4->title;
          }
          else
          {
            $data[$key]->accession_no='-';
            $data[$key]->title='-';
          }
        }
          return $data;
      }
    }
  }

  public function book()
  {
 
    $query = $this->db->query('select * from book');
    $data='';
    foreach ($query->result() as $key=>$value) 
    {
          $data[] = $value;
          $query=$this->db->query("select * from settings where setting_id='$value->setting_id'");
          $query=$query->row();
          $data[$key]->book_issue=$query->book_issue('+1 day');

    }
    return $data;
      
  }
    
  public function subscription()
  {
     $data = array(
        'magazine_id' => $this->input->post('magazine_id'),
        'subscription_start' => $this->input->post('subscription_start'),
        'subscription_end' => $this->input->post('subscription_end'),
        'amount' => $this->input->post('amount')
    );
    $res=$this->db->insert('subscription', $data);
    if($res)
    {
      $message='Successfully Add. Task Completed';
      return $message;
    }
  }
  public function add_newspaper_detail()
  {
     $data = array(
        'newspaper_id' => $this->input->post('newspaper_id'),
        'volume' => $this->input->post('volume'),
        'price' => $this->input->post('price'),
        'date' =>$this->input->post('date'),
        'status' =>'active'
    );
    $res=$this->db->insert('newspaper_detail', $data);
    if($res)
    {
      $message='Successfully Add. Task Completed';
      return $message;
    }
  }

  public function get_subscription_details($id="")
  {
    $query = $this->db->get_where('subscription',array('magazine_id'=>$id));
    return $query->result();
  }
  
  public function add_edition()
  {
    $data = array(
        'magazine_id' => $this->input->post('magazine_id'),
        'subscription_id' => $this->input->post('subscription_id'),
        'volume' => $this->input->post('volume'),
        'number' => $this->input->post('number'),
        'date_of_receipt' => $this->input->post('dor'),
        'month' => $this->input->post('month')." ".$this->input->post('year'),
    );
    $res=$this->db->insert('edition', $data);
    if($res)
    {
      $message='Successfully Add. Task Completed';
      return $message;
    } 
  }
  public function magazine()
  {
     $data = array(
        'title' => $this->input->post('title')
    );
    $res=$this->db->insert('magazine', $data);
    if($res)
    {
      $message='Successfully Add. Task Completed';
      return $message;
    }
  }

  public function get_book_id($value="")
  {
    $query=$this->db->query("select max(accession_no) as accession_no from book where gifted='$value'");
    return $query->row();
  }

  public function get_suggestion_book($val,$what="",$table)
  {
    $query=$this->db->query("select distinct $what from $table where $what LIKE '%".$val."%' limit 10");
    return $query->result();
  }

  public function issue_book()
  {
    //$newDate = date("d-m-Y", strtotime($originalDate));
    $issue_date=date('Y-m-d', strtotime($this->input->post('issue_date')));
    $due_date=date('Y-m-d', strtotime($this->input->post('due_date')));
    $data = array(
        'issue_to_id' => $this->input->post('issue_to_id'),
        'issue_to' => $this->input->post('issue_to'),
        'accession_no' => $this->input->post('accession_no'),
        'issue_date' => $issue_date,
        'due_date' =>$due_date
    );
     if($this->db->insert('books_issued', $data))
    {
      $return='Successfully Issued.';
      return $return;
    }
  }

  public function reissue_book($accession_no)
  {
    //$newDate = date("d-m-Y", strtotime($originalDate));
    $issue_date=date('Y-m-d', strtotime($this->input->post('issue_date')));
    $due_date=date('Y-m-d', strtotime($this->input->post('due_date')));
    $data = array(
        'issue_to_id' => $this->input->post('issue_to_id'),
        'issue_to' => $this->input->post('issue_to'),
        'accession_no' => $this->input->post('accession_no'),
        'issue_date' => $issue_date,
        'due_date' =>$due_date
    );
    $this->db->where('books_issued_id', $id);
    $res=$this->db->update('books_issued', $data); 
    if($res)
    {
      $message='Successfully reissued';
      return $message;
    }
  }
     

  public function returnbook($accession_no)
  {
      $check=$this->check_book_issued($accession_no);
      $query = $this->db->get_where('book',array('book_id'=>$accession_no));

      if($check==NULL){
          return NULL;
        }
        else
        {
            $data=$query->row();
            $query2 = $this->db->query("select first_name,adm_number from student_admission where student_admission_id='$check->issue_to_id'");
            $result=$query2->row();
            $data->issue_to_id=$check->issue_to_id;
            $data->issue_date=$check->issue_date;
            $data->due_date=$check->due_date;
            $data->adm_number=$result->adm_number;
            $data->first_name=$result->first_name;
            $data->books_issued_id=$check->books_issued_id;

            // cal fine
            $date=date('Y-m-d');
            $date2=date('Y-m-d',strtotime($check->due_date));
            $datediff1 = new DateTime($date);
            $datediff2 = new DateTime($date2);

            
            if($date>$date2)
            {
              $data->fine=$diff = $datediff2->diff($datediff1)->format("%a")*1; // change variable
            }
            else
            {
              $data->fine=0;
            }
        }
      return $data;
  }

  public function returnbookinsert($issue_id,$fine,$student_id){
    $date=date('Y-m-d');
    $this->db->query( "UPDATE `books_issued` SET return_date = '$date'  WHERE `books_issued_id` = '$issue_id'  ");
    if($fine>0)
    {
      $data = array(
        'student_id' => $student_id, 
        'issue_id' => $issue_id, 
        'fine' => $fine, 
        'type' => 'library', 
        );
      $this->db->insert('fine',$data);
    }
  }

  public function get_magazine_details()
  {
    $query=$this->db->get("magazine");
    return $query->result();
  }

  public function pendingfine()
  {
    $data=array();
    $query = $this->db->get('fine');
    foreach ($query->result() as $key => $value) {
            $data[]=$value;
            $query2 = $this->db->query("select first_name,adm_number from student_admission where student_admission_id='$value->student_id'");
            $result=$query2->row();
            $data[$key]->adm_number=$result->adm_number;
            $data[$key]->first_name=$result->first_name;
    }
    return $data;
  }

  public function bookshistory()
  {
    $data='';
    $query = $this->db->get('books_issued');
    foreach ($query->result() as $key => $value) 
    {
            $data[]=$value;
            $query2 = $this->db->query("select name,adm_number from student_admission where student_admission_id='$value->issue_to_id'");
            $result=$query2->row();
            if($result)
            {
              $data[$key]->adm_number=$result->adm_number;
              $data[$key]->name=$result->name;
            }
            else
            {
              $data[$key]->adm_number='-';
              $data[$key]->name='-';
            }
            //$book=$this->get_book_detail($value->accession_no);
            //$data[$key]->book_name=$book->name;
    }
    return $data;
  }

  public function all_magzine()
  {
    $query=$this->db->query('select * from magazine where status="active"');
    return $query->result();
  }

  public function all_subscription($id)
  {
    $query=$this->db->query("select * from subscription where magazine_id='$id'");
    $data='';
       foreach ($query->result() as $key=>$value) 
       {
      $data[] = $value;
          $query=$this->db->query("select * from magazine where magazine_id='$value->magazine_id'");
          $query=$query->row();
          $data[$key]->title=$query->title;
       }
       return $data;

  }

  public function all_edition()
  {
    $query=$this->db->query('select * from edition where status="active"');
    $data='';
      foreach ($query->result() as $key=>$value) 
      {
        $data[] = $value;
          $query=$this->db->query("select * from magazine where magazine_id='$value->magazine_id'");
          $query=$query->row();
          if($query){
          $data[$key]->title=$query->title;
           }
           else{
            $data[$key]->title='-';
          }
           $query=$this->db->query("select * from subscription where subscription_id='$value->subscription_id'");
          $query=$query->row();
          if($query){
            $data[$key]->subscription_start=$query->subscription_start; 
            $data[$key]->subscription_end=$query->subscription_end;
          }
        else
        {
          $data[$key]->subscription_start=$data[$key]->subscription_end='-';
        }
      }
    return $data;
  }

  public function newspaper()
  {
     $data = array(
        'name' => $this->input->post('name')
    );
    $res=$this->db->insert('newspaper', $data);
    if($res)
    {
      $message='Successfully Add. Task Completed';
      return $message;
    }
  }

  public function all_newspaper()
  {
    $query=$this->db->query('select * from newspaper where status="active"');
    return $query->result();
  }

  public function delete_book($id)
   {          
      $res=$this->db->query("update book set status='inactive' where book_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
  public function delete_magazine($id)
   {          
      $res=$this->db->query("update magazine set status='inactive' where magazine_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
  public function delete_edition($id)
   {          
      $res=$this->db->query("update edition set status='inactive' where edition_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }
  }
  public function delete_newspaper($id)
   {          
      $res=$this->db->query("update newspaper set status='inactive' where newspaper_id='$id'");
      if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }      
  }
  public function delete_news_detail($id)
  {
    $res=$this->db->query("update newspaper_detail set status='inactive' where newspaper_detail_id='$id'");
    if($res)
      {
        $message='Successfully Deleted';
        return $message; 
      }      
  }
   public function all_newspaper_detail()
    {
      $query = $this->db->query('select * from newspaper_detail where status="active"');
       $data='';
       foreach ($query->result() as $key=>$value) 
       {
      $data[] = $value;
          $query=$this->db->query("select * from newspaper where newspaper_id='$value->newspaper_id'");
          $query=$query->row();
          $data[$key]->name=$query->name;
       }
       return $data;

    }
    public function newspaper_report()
  {    
      $start_date=$this->input->post('start_date');
      $end_date=$this->input->post('end_date');
      $query = $this->db->query("SELECT * FROM newspaper_detail where date between '$start_date' and '$end_date'");
      $data='';
      foreach ($query->result() as $key=>$value) 
     {
      $data[] = $value;
          $query=$this->db->query("select * from newspaper where newspaper_id='$value->newspaper_id'");
          $query=$query->row();
          $data[$key]->name=$query->name;
       }
       return $data;

    }
    public function discard()
  {   
    $query = $this->db->query("select * from book where status='inactive'");
   return $query->result();
      
  }
     public function discard_book($id)
     {
      $res=$this->db->query("update book set status='active' where book_id='$id'");
      if($res)
      {
        $message='successfully Updated';
        return($message);
       }
    }
    public function get_magazine($magazine_id){
      $query=$this->db->query("select * from magazine where magazine_id='$magazine_id'");
      return $query->row_array();
    }
    public function update_magazine($id="")
  {
    $data = array(
        'title' => $this->input->post('title')        
        );
    $this->db->where('magazine_id', $id);
    $res=$this->db->update('magazine', $data); 
    if($res)
        {
      $message='Successfully updated';
      return $message;
    }
 }
      public function get_edition($edition_id)
      {
        $query=$this->db->query("select * from edition where edition_id='$edition_id'");
        return $query->row_array();
     }
     public function update_edition($id="")
     {
      $data=array(
        'volume'=> $this->input->post('volume'),
        'number'=> $this->input->post('number')
        );
      $this->db->where('edition_id',$id);
      $res=$this->db->update('edition',$data);
      if($res)
      {
        $message='Successfully Updated';
        return $message;
      }
     }
     public function get_newspaper($newspaper_id="")
     {
      $query=$this->db->query("select * from newspaper where newspaper_id='$newspaper_id'");
      return $query->row_array();
     } 
     public function update_newspaper($id="")
     {
      $data=array(
        'name'=>$this->input->post('name')
        );
      $this->db->where('newspaper_id',$id);
      $res=$this->db->update('newspaper',$data);
      if($res){
        $message='Succesfully Updated';
        return $message;
      }
     }
     public function get_news_detail($newspaper_detail_id="")
     {
      $query=$this->db->query("select * from newspaper_detail where newspaper_detail_id='$newspaper_detail_id'");
      return $query->row_array();
     }
     public function update_news_detail($id="")
     {
      $data=array(
        'volume'=>$this->input->post('volume'),
        'price'=>$this->input->post('price'),
        'date'=>$this->input->post('date')
        );
      $this->db->where('newspaper_detail_id',$id);
      $res=$this->db->update('newspaper_detail',$data);
      if($res)
      {
        $message='Successfully Updated';
        return $message;
      }
     }
}