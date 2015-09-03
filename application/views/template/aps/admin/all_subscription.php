<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Subscription</li>
                </ul>
                <h4>All Subscription</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader --> 
          
 <div class="contentpanel">
    <div class="col-md-12">
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead class="">
        <tr>
          <th>Sr No.</th>         
          <th>Magzine_Title</th>
          <th>Subscription_Start</th>
          <th>Subscription_End</th>
          <th>Amount</th>
          <th>Timestamp</th>
          <th>Author</th>
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
           
            <td><?php echo $data->title;?></td> 
            <td><?php echo $data->subscription_start;?></td> 
            <td><?php echo $data->subscription_end;?></td> 
            <td><?php echo $data->amount;?></td> 
            <td><?php echo $data->timestamp;?></td> 
            <td><?php echo $data->author;?></td> 
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
                       