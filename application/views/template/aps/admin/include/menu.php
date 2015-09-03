<section>
  <div class="mainwrapper">
  <div class="leftpanel">
  <!-- <h5 class="leftpanel-title">Navigation</h5> -->
  <ul class="nav nav-pills nav-stacked">
      <li class="<?php if($this->router->fetch_class()=='dashboard'){ echo "active"; }?>"><a href="<?php echo admin_url(); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li class="parent <?php if($this->router->fetch_class()=='student_category'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Student Category</span></a>
          <ul class="children">
              <li class="<?php if($this->router->fetch_class()=='student_category' && $this->router->fetch_method()=='index'){ echo "active"; }?>"><a href="<?php echo admin_url()."student_category";?>">Add Student Category</a></li>
              <li class="<?php if($this->router->fetch_class()=='student_category' && $this->router->fetch_method()=='main'){ echo "active"; }?>"><a href="<?php echo admin_url()."student_category/main";?>">All Student Category</a></li>
          </ul>
      </li>
      <li class="parent <?php if($this->router->fetch_class()=='staff'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Staff Members</span></a>
          <ul class="children">
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='index'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff";?>">Add Staff Category (<i class="fa fa-plus"></i>) </a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='main'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/main";?>">All Staff Category</a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='staff'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/staff";?>">Add Staff Member (<i class="fa fa-plus"></i>) </a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='allstaff'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/allstaff";?>">All Staff Member</a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='add_salary_element'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/add_salary_element";?>">Add Salary Element (<i class="fa fa-plus"></i>) </a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='all_salary_element'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/all_salary_element";?>">All Salary Element</a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='salary_statement'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/salary_statement";?>">Salary Statement</a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='statement_with_acc'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/statement_with_acc";?>">Account Statement</a></li>
              <li class="<?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='statement_with_acc'){ echo "active"; }?>"><a href="<?php echo admin_url()."staff/form16";?>">Generate Form-16</a></li>
              
          </ul>
      </li>
      <li class="parent <?php if($this->router->fetch_class()=='classes'){ echo "active"; }?>"><a href="#"><i class="fa fa-file"></i> <span>Class</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='index'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes";?>">Add Classes</a></li>
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='main'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/main";?>">All Classes</a></li>
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='sections'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/sections";?>">Add Sections</a></li>
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='all_sections'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/all_sections";?>">All Sections</a></li>
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='batches'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/batches";?>">Add Section to Batch</a></li>
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='all_batches'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/all_batches";?>">All Batches</a></li>            
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='subject'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/subject";?>">Add Subjects</a></li>
            <li class="<?php if($this->router->fetch_class()=='classes' && $this->router->fetch_method()=='all_subjects'){ echo "active"; }?>"><a href="<?php echo admin_url()."classes/all_subjects";?>">All Subjects</a></li>

        </ul>
      </li>
      <li class="parent <?php if($this->router->fetch_class()=='fee'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Fee Type</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='index'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee";?>">Add Fee Types</a></li>
            <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='main'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee/main";?>">All Fee Types</a></li>
            <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='print_feeslip'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee/print_feeslip";?>">Print Fee Slip</a></li>
            <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='fee_scheme'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee/fee_scheme";?>">Fee Setup</a></li>
            <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='fee_collection'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee/fee_collection";?>">Fee Collection</a></li>
            <!-- <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='print_all_fees'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee/print_all_fees";?>">Print All Fees</a></li> -->
            <!-- <li class="<?php if($this->router->fetch_class()=='fee' && $this->router->fetch_method()=='print_fee_slab'){ echo "active"; }?>"><a href="<?php echo admin_url()."fee/print_fee_slab";?>">Print Fee Slab</a></li> -->
        </ul>
      </li>
      <li class="parent <?php if($this->router->fetch_class()=='accounts'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Accounts</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='accounts' && $this->router->fetch_method()=='income'){ echo "active"; }?>"><a href="<?php echo admin_url()."accounts/income";?>">Income</a></li>
            <li class="<?php if($this->router->fetch_class()=='accounts' && $this->router->fetch_method()=='expense'){ echo "active"; }?>"><a href="<?php echo admin_url()."accounts/expense";?>">Expense</a></li>
            <li class="<?php if($this->router->fetch_class()=='accounts' && $this->router->fetch_method()=='reports'){ echo "active"; }?>"><a href="<?php echo admin_url()."accounts/reports";?>">Reports</a></li>
            <li class="<?php if($this->router->fetch_class()=='accounts' && $this->router->fetch_method()=='account_type'){ echo "active"; }?>"><a href="<?php echo admin_url()."accounts/account_type";?>">Account Type</a></li>
           </ul>
      </li>
      <li class="parent <?php if($this->router->fetch_class()=='student'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Student</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='student' && $this->router->fetch_method()=='admission'){ echo "active"; }?>"><a href="<?php echo admin_url()."student/admission";?>">Add Student</a></li>
            <li class="<?php if($this->router->fetch_class()=='student' && $this->router->fetch_method()=='all_admission'){ echo "active"; }?>"><a href="<?php echo admin_url()."student/all_admission";?>">All Students</a></li>
            <li class="<?php if($this->router->fetch_class()=='student' && $this->router->fetch_method()=='fee_register'){ echo "active"; }?>"><a href="<?php echo admin_url()."student/fee_register";?>">Fee Register</a></li>
        </ul>
      </li>
       <li class="parent <?php if($this->router->fetch_class()=='library'){ echo "active"; }?>"><a href="#"><i class="fa fa-server"></i> <span>Library</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='issue'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/issue";?>">Issue Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='book'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/book";?>">Add Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all";?>">All Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='discard_book'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/discard_book";?>">Delete Book</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='return'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/returnbook";?>">Return Book</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='pendingfine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/pendingfine";?>">Pending Fine</a></li>
            <!-- <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='search'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/search";?>">Search Fine</a></li> -->

            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='bookshistory'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/bookshistory";?>">Books History</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='bookshistory'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/search_fine";?>">Student Status</a></li>
            <!-- <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='paidfine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all";?>">Paid Fine</a></li> -->
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='magazine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/magazine";?>">Add Magazine</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_magzine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_magzine";?>">All Magazine</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='subscription'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/subscription";?>">Add Subscription</a></li>
            
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='edition'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/edition";?>">Add Edition</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_edition'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_edition";?>">All Edition</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='newspaper'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/newspaper";?>">Add Newspaper</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_newspaper'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_newspaper";?>">All Newspaper</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='newspaper_detail'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/newspaper_detail";?>">Newspaper Details</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_newspaper_detail'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_newspaper_detail";?>">All Newspaper Detail</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='newspaper_report'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/newspaper_report";?>">Newspaper Report</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='barcode_books'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/barcode_books";?>">Print Barcode Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='barcode'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/barcode";?>">Print Barcode</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='library_card'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/library_card";?>">Print Library Card</a></li>

            <!-- <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='paidfine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all";?>">Paid Fine</a></li> -->
        </ul>
      </li> 
      <li class="parent <?php if($this->router->fetch_class()=='fa'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Final Assesment</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='add'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/add";?>">Add Subject Distribution</a></li>
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='add_marks'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/add_marks";?>">Add Student Marks</a></li>
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='view_marks'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/view_marks";?>">View Student Marks</a></li>
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='report'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/report";?>">Generate Reports</a></li>
        </ul>
      </li> 

      <li><a href="<?php echo admin_url(); ?>setting"><i class="fa fa-gear"></i> <span>Settings</span></a></li>          
      <li><a href="<?php echo admin_url(); ?>logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>          
  </ul>         
</div><!-- leftpanel -->