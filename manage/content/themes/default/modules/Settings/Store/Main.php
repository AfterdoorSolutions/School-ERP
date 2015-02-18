
<?php
if(isset($_POST['submit']))
{
		$target_path = "content/uploads/system/logo/";

$target_path = $target_path . basename( $_FILES['logo']['name']); 

move_uploaded_file($_FILES['logo']['tmp_name'], $target_path);
    $data=array('name'=>$_POST['name'],
        'logo'=>$target_path,
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'meta_keywords'=>$_POST['keywords'],
        'meta_desc'=>$_POST['description'],
        'copyright_text'=>$_POST['footer'],
        'address'=>$_POST['address'],
        );
    
    if(update("store",$data,"store_id='1'")==1);
    $message=1;
}
$result=get("store","*")->fetch_array();

?>
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="media-body">
                                <h4>Store</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        <div class="row">
                            <div class="col-md-14"> 
                                <div class="panel panel-default">
                                  <form action="" method="post" enctype="multipart/form-data" id="valWizard">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                        </div><!-- panel-btns -->
                                        <h4 class="panel-title">Update Store Settings</h4>
                                    </div>
                                    <?php
                                    if(isset($message)){print_message($message);}
                                    ?>
									
                                    <div class="panel-body">
									<div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                <input type="text" name="name" value="<?php echo $result['name'];?>" placeholder='Enter Name' class="form-control" required >  
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Logo</label>
                                                        <input  type="hidden" name="logo" value="<?php echo $result['logo'];?>" >
                  <input  type="file" name="logo" style="float: left;" accept="image/*">
                  <a href="<?php echo INSTALL_PATH.'manage/'.$result['logo'];?>" target="_blank"><img src="<?php echo INSTALL_PATH.'manage/'.$result['logo'];?>" width="60px" height="60px"></a>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                        </div><!-- row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                         <input type="text" name="email" placeholder='Enter Email' value="<?php echo $result['email'];?>"  class="form-control" required>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                  <input type="text" name="phone" value="<?php echo $result['phone'];?>" placeholder='Phone No.' class="form-control" required>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                        </div><!-- row -->

                                          <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Meta Keywords</label>
                                                         <input required type="text" name="keywords" placeholder='Meta Keywords Seprated by a comma' value="<?php echo $result['meta_keywords'];?>"  class="form-control" required>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                             <label class="control-label">Meta Description:</label>
                                                    <textarea class="form-control" placeholder='Meta Description' name="description" required><?php echo $result['meta_desc'];?></textarea>
                                           </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                        </div><!-- row -->

                                         
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Footer Text:</label>
                                                    <textarea class="form-control myeditor" placeholder='Enter The Footer Text' name="footer" required><?php echo $result['copyright_text'];?></textarea>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Address:</label>
                                                    <textarea class="form-control myeditor" placeholder='Enter The Address' name="address" required><?php echo $result['address'];?></textarea>
                                                </div><!-- form-group -->
                                            </div><!-- col-sm-6 -->
                                        </div>
                                       
                                        
                                       
                                    </div><!-- panel-body -->
                                    <div class="panel-footer">
                                        <button class="btn btn-primary" name="submit">Submit</button>
                                    </div><!-- panel-footer -->
                                  </form>
                                </div><!-- panel -->
                                
                            </div><!-- col-md-14 -->
                           
                                                       
                          </div><!-- row -->
                        
                        
                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
        
