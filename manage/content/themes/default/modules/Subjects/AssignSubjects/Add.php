
<?php
if(isset($_POST['submit']))
{
    $data=array('name'=>$_POST['name'],'code'=>$_POST['code'],'status'=>$_POST['status'],'author'=>$_SESSION['author']);
    if(insert("subject",$data)==1);
    $message=1;
   
}

$result=get("subject","*");
?>          
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="media-body">
							  
                                <ul class="breadcrumb">
                                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li><a href="#">Assign Subject</a></li>
                                    <li>Assign Subject</li>
                                </ul>
                                                         
                                <h4>Assign Subject</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                      <div class="contentpanel">
                        <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <?php if(isset($message)){ echo print_message($message); }?>
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Subject</h3>
      </div>
      <form method="POST" id="valWizard">
      <div class="panel-body">
        
            <div class="form-group">
              <label class="col-sm-2 control-label">Select Section </label>
                <div class="col-sm-8">
                  <select data-placeholder="Choose One" class="select-basic changebatchlist" name="course_id" required>
                    <option value="">Choose One</option>
                    <?php
                      foreach ($result as $key => $value)
                      {
                     ?>
                          <option value="<?php echo $value['course_id'];?>"><?php echo $value['name'];?></option>  
                    <?php
                      }
                    ?>                
                  </select>
                </div>
            </div>
            <div class="form-group ">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" placeholder="Name"  class="form-control" name="name"required/>
              </div>
            </div>
         
            <div class="form-group ">
              <label class="col-sm-2 control-label">Code</label>
              <div class="col-sm-8">
                <input type="text" placeholder="Code" class="form-control" name="code"required/>
              </div>
            </div>
          
            

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-8">
                  <select id="select-basic" data-placeholder="Choose One" class="form-control" name="status" required>
                    <option value="">Choose One</option>
                    <option value="Enabled">Enabled</option>
                    <option value="Disabled">Disabled</option>
                  </select>
                </div>
            </div>

        </div>
        <div class="panel-footer">
          <button class="btn btn-primary" value="Submit" name="submit">Submit</button>
        </div>
        </form>
      
    </div>
  </div>
</div>
 </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
        

     

