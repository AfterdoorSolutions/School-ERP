<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Staff Salary</li>
                </ul>
                <h4>All Staff Salary</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader --> 
          
 <div class="contentpanel">
    <div class="col-md-12">
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead class="">
        <tr>
          <th>Name</th>
          <th>Provident Fund</th>
          <th>Amount</th>
          <th>OF</th>
          <th>Action</th>
          <th>Time</th>
         <th>Actions</th>
       </tr>
            </thead>
            <tbody>


      <?php
          
          
          if($query!=NULL)
          {
            foreach ($query as $data) 
          {           
        ?> 
          <tr>
            
            <td><?php echo $data->name;?></td> 
            <td><?php echo $data->p_f;?></td> 
            <td><?php echo $data->amount;?></td> 
            <td><?php echo $data->of;?></td> 
            <td><?php echo $data->action;?></td>
            <td><?php echo $data->time;?></td>
             <td class="text-center" width="100px">
              <a href="<?php echo admin_url();?>/staff/update_salary/<?php echo $data->salary_element_id; ?>"><i class="fa fa-pencil"></i></a>
              <a href="<?php echo admin_url(); ?>/staff/delete_staff_salary/<?php echo $data->salary_element_id;?>" onclick='return confirm("Are you sure?");'><i class="fa fa-trash-o"></i></a>
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

                    
                       