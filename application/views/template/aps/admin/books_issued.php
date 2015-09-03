<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Books Issued</li>
                </ul>
                <h4>Books Issued</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader --> 
          
 <div class="contentpanel">
    <div class="col-md-12"><table  class="table table-striped table-bordered responsive datatable">
            <thead class="">
              <tr>
                <th>Sno.</th>
                <th>Accesion No.</th>
                <!-- <th>Book Name</th> -->
                <th>Student</th>
                <th>Admission NO</th>
                <th>Issued to</th>
                <th>Issued Date</th>
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
                <td><?php echo $value->accession_no; ?></td>
                <!-- <td><?php echo $value->book_name; ?></td> -->
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->adm_number; ?></td>
                <td><?php echo $value->issue_to_id; ?></td>
                <td><?php echo date('d M Y',strtotime($value->issue_date)); ?></td>
              </tr>
               <?php
              }
          }
          else
          {
              echo "<tr><td colspan='6'> No Data Found for returning the book</td></tr>";
          }
          ?>
      </tbody>
        </table>
</div><!-- row -->
</div><!-- contentpanel -->

                    
                       