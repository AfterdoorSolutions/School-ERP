<section>
  <div class="mainwrapper">
  <div class="leftpanel">
  <!-- <h5 class="leftpanel-title">Navigation</h5> -->
  <ul class="nav nav-pills nav-stacked">
      <li class="<?php if($this->router->fetch_class()=='dashboard'){ echo "active"; }?>"><a href="<?php echo admin_url(); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li class="parent <?php if($this->router->fetch_class()=='student'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Student</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='student' && $this->router->fetch_method()=='all_admission'){ echo "active"; }?>"><a href="<?php echo admin_url()."student/edit_students";?>">Edit Students</a></li>
        </ul>
      </li> 
      <li class="parent <?php //if($this->router->fetch_class()=='fa'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Enter Marks</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='add_marks'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/add_marks";?>">Add Student Marks</a></li>
        </ul>
      </li> 
      <li class="parent <?php //if($this->router->fetch_class()=='fa'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Reports</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='report'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/report";?>">Generate Reports</a></li>
        </ul>
      </li> 
     <li class="parent <?php //if($this->router->fetch_class()=='fa'){ echo "active"; }?>"><a href="#"><i class="fa fa-users"></i> <span>Analysis</span></a>
        <ul class="children">
            <li class="<?php if($this->router->fetch_class()=='fa' && $this->router->fetch_method()=='report'){ echo "active"; }?>"><a href="<?php echo admin_url()."fa/analysis";?>">View Analysis</a></li>
        </ul>
      </li> 
      <li><a href="<?php echo admin_url(); ?>logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>          
  </ul>         
</div><!-- leftpanel -->