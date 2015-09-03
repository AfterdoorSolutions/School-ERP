<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Edition</li>
                </ul>
                <h4>All Edition</h4>
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
          <th>Subscription Date</th>
          <th>Magazine Title</th>
          <th>Month Year</th>
          <th>Volume</th>
          <th>Number</th>
          <th>Date of Receipt</th>
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
            <td><?php echo ++$i;?></td>
            <td><?php echo $data->subscription_start." - ".$data->subscription_end;?></td>
            <td><?php echo $data->title;?></td> 
            <td><?php echo $data->month;?></td> 
            <td><?php echo $data->volume;?></td> 
            <td><?php echo $data->number;?></td> 
            <td><?php echo $data->date_of_receipt;?></td>
            <td><a href="<?php echo admin_url();?>/library/update_edition/<?php echo $data->edition_id;?>"><i class="fa fa-pencil"></i></a>
              <a href="<?php echo admin_url();?>/library/delete_edition/<?php echo $data->edition_id;?>" onclick='return confirm("Are you sure?");'><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php
           } 
           }
          else
          {
              echo "<tr><td colspan='7'> No Data Found</td></tr>";
          }
          ?>
      </tbody>
        </table>
    </div><!-- row -->
</div><!-- contentpanel -->

                    
                       