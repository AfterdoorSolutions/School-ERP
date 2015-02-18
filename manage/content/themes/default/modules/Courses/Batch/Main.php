
<?php
$result=get("batch","*");
?>  
        
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="media-body">
                                <h4>Batch</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                      <div class="pull-right">
                     <a title="Add New" href="<?php echo new_link("Courses","Batch","Add");?>" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>
                     <h3>Batch List</h3>
        

      <div class="panel-body">
        <form method="POST">
       <div class="table-responsive">
            <table class="table table-striped table table-bordered table-hover basicTable">
              <thead>
                <tr> 
                 <th>S.No.</th>
            <th>Batch Name</th>
            <th>Section Name</th>
            <th>Course Name</th>
            <th>Code</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
        </thead>
             <tbody>
               <?php
                $i=0;
              foreach ($result as $key => $value) 
              {
                 $i++;
                 $course_id=get_where_column("section","course_id","section_id=".$value['section_id']);
                ?>
               
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo get_where_column("section","name","section_id=".$value['section_id']);?></td>
                <td><?php echo get_where_column("course","name","course_id=".$course_id);?></td>
                <td><?php echo $value['code'];?></td>
                <td><?php echo $value['status'];?></td>
                <td><font color="blue"><a href="<?php echo new_link("Courses","Courses","Edit",$value['course_id']);?>"><i class="fa fa-pencil-square-o fa-2x"></a></font></td>
            </tr>
            <?php
            }
            ?>
                  </tbody>
                  </table>
                  </div>
                  </form>
                  </div>
                  </div>
                  </div> 
                        
                        
                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
