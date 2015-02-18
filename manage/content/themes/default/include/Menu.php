<section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="profile.html">
                            <img class="img-circle" src="images/photos/profile.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Admin</h4>
                            <small class="text-muted">Welcome</small>
                        </div>
                    </div><!-- media -->
                    
                    <ul class="nav nav-pills nav-stacked">
                        <li class="<?php if(url_content('module')=="Dashboard"){ echo "active";} ?>"><a href="<?php echo menu_link("dashboard","Dashboard");?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        <li class="parent <?php if(url_content('module')=="Courses"){ echo "active";} ?> "><a href="#"><i class="fa fa-tags"></i> <span>Courses & Sections</span></a>
                            <ul class="children">
                                <li class="<?php if(url_content('varient')=="Courses"){ echo "active";} ?>"><a href="<?php echo menu_link("Courses","Courses");?>"><i class="fa fa-bars"></i> Courses</a></li>
                                <li class="<?php if(url_content('varient')=="Sections"){ echo "active";} ?>"><a href="<?php echo menu_link("Courses","Sections");?>"><i class="fa fa-briefcase"></i> Section</a></li>
                                <li class="<?php if(url_content('varient')=="Batch"){ echo "active";} ?>"><a href="<?php echo menu_link("Courses","Batch");?>"><i class="fa fa-briefcase"></i> Batch</a></li>
                                </ul>
                        </li>
                        <li class="parent <?php if(url_content('module')=="Subjects"){ echo "active";} ?> "><a href="#"><i class="fa fa-tags"></i> <span>Subjects</span></a>
                            <ul class="children">
                                <li class="<?php if(url_content('varient')=="Subjects"){ echo "active";} ?>"><a href="<?php echo menu_link("Subjects","Subjects");?>"><i class="fa fa-bars"></i> Subjects</a></li>
                                <li class="<?php if(url_content('varient')=="Subjects"){ echo "active";} ?>"><a href="<?php echo menu_link("Subjects","AssignSubjects");?>"><i class="fa fa-briefcase"></i> Assign Subjects</a></li>
                                <li class="<?php if(url_content('varient')=="Batch"){ echo "active";} ?>"><a href="<?php echo menu_link("Courses","Batch");?>"><i class="fa fa-briefcase"></i> Batch</a></li>
                                </ul>
                        </li>
                        
                    </ul>
                    
                </div><!-- leftpanel -->