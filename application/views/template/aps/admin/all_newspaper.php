<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Newspaper</li>
                </ul>
                <h4>All Newspaper</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader --> 
          
 <div class="contentpanel">
    <div class="col-md-12">
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead class="">
        <tr>
          <th>S.No.</th>
          <th>Title</th>
          <th>Actions</th>
       </tr>
            </thead>
            <tbody>


      <?php          
          $i=0;
          if($query!=NULL)
          {
            foreach ($query as $data) 
          {           
        ?> 
          <tr>
            <td><?php echo ++$i; ?></td>            
            <td><?php echo $data->name;?></td>             
            <td><a href="<?php echo admin_url();?>/library/update_newspaper/<?php echo $data->newspaper_id;?>"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo admin_url();?>/library/delete_newspaper/<?php echo $data->newspaper_id;?>" onclick='return confirm("Are you sure?");'><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php
           } 
           }
          else
          {
              echo "<tr><td colspan='3'> No Data Found</td></tr>";
          }
          ?>
      </tbody>
        </table>
    </div><!-- row -->
</div><!-- contentpanel -->

                    
                       