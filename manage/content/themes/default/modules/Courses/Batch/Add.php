
<?php
if(isset($_POST['submit']))
{
    $data=array('section_id'=>$_POST['section_id'],'name'=>$_POST['name'],'start_date'=>$_POST['start_date'],'end_date'=>$_POST['end_date'],'code'=>$_POST['code'],'status'=>$_POST['status'],'author'=>$_SESSION['author']);
    if(insert("batch",$data)==1);
    $message=1;
   
}
$result=get("course","*");
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
                                    <li><a href="#">Batch</a></li>
                                    <li>Batch</li>
                                </ul>
                                                         
                                <h4>Add Batch</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                      <div class="contentpanel">
                        <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <?php if(isset($message)){ echo print_message($message); }?>
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Batch</h3>
      </div>
      <form method="POST" id="valWizard">
      <div class="panel-body">
        
            <div class="form-group">
              <label class="col-sm-2 control-label">Select Section </label>
                <div class="col-sm-8">
                  <select data-placeholder="Choose One" class="select-basic" name="section_id" required>
                      <option value="">Choose One</option>
                     <?php
                      foreach ($result as $key => $value)
                      {
                        ?>
                        <optgroup label="<?php echo $value['name'];?>">
                        <?php
                        $result2=get_where("section","*","course_id=".$value['course_id']);
                        foreach ($result2 as $key2 => $value2)
                        {
                     ?>
                          <option value="<?php echo $value2['section_id'];?>"><?php echo $value2['name'];?></option>  
                    <?php
                        }
                        ?>
                        </optgroup>
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
              <label class="col-sm-2 control-label">Start Date</label>
              <div class="col-sm-8">
                <input type="text" placeholder="Start Date"  class="form-control mydatepicker" name="start_date"required/>
              </div>
            </div>
            <div class="form-group ">
              <label class="col-sm-2 control-label">End Date</label>
              <div class="col-sm-8">
                <input type="text" placeholder="End Date"  class="form-control mydatepicker" name="end_date"required/>
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
        

     

