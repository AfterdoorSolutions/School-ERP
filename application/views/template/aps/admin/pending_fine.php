<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Pending Fine</li>
                </ul>
                <h4>Pending Fine</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader --> 
          
 <div class="contentpanel">
    <div class="col-md-12"><table  class="table table-striped table-bordered responsive datatable">
            <thead class="">
              <tr>
          <th>Sno.</th>
          <th>Student</th>
          <th>Admission NO</th>
          <th>Type of Fine</th>
          <th>Fine Amount</th>
          <th>Fine Date</th>

          </tr>
            </thead>
            <tbody>
      <?php
          //var_dump($query);
          $i=1;
          if($query!=NULL)
          {
                 foreach ($query as $key => $value) {
                    
                   
              ?> 
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->first_name; ?></td>
                <td><?php echo $value->adm_number; ?></td>
                <td><?php echo $value->type; ?></td>
                <td><?php echo $value->fine; ?></td>
                <td><?php echo date('d M Y',strtotime($value->time)); ?></td>
              </tr>
               <?php
              }
          }
          else
          {
              echo "<tr><td colspan='4'> No Data Found for returning the book</td></tr>";
          }
          ?>
      </tbody>
        </table>
</div><!-- row -->
</div><!-- contentpanel -->

                    
                       