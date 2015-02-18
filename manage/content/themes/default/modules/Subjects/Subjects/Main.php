<?php
$result=get("subject","*");
?>  
        
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="media-body">
                                <h4>Subjects</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                      <div class="pull-right">
                     <a title="Add New" href="<?php echo new_link("Subjects","Subjects","Add");?>" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus"></i></a></div>
                     <h3>Subjects List</h3>
        

      <div class="panel-body">
        <form method="POST">
       <div class="table-responsive">
            <table class="table table-striped table table-bordered table-hover basicTable">
              <thead>
                <tr> 
                 <th>S.No.</th>
            <th> Name</th>
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
                ?>
               
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['code'];?></td>
                <td><?php echo $value['status'];?></td>
                <td><font color="blue"><a href="<?php echo new_link("Subjects","Subjects","Edit",$value['subject_id']);?>"><i class="fa fa-pencil-square-o fa-2x"></a></font></td>
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
