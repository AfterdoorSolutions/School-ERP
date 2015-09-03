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
          <th>Newspaper Title</th>
          <th>Volume</th>
          <th>Price</th>
          <th>Date</th>         
                   
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
            <td><?php echo $data->name;?></td>
            <td><?php echo $data->volume;?></td>
            <td><?php echo $data->price;?></td> 
            <td><?php echo $data->date;?></td> 
                        
            <td><a href="<?php echo admin_url();?>/library/update_news_detail/<?php echo $data->newspaper_detail_id;?>"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo admin_url();?>/library/delete_news_detail/<?php echo $data->newspaper_detail_id?>" onclick='return confirm("Are You Sure");'><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php
           }            
           }
          ?>
      </tbody>
        </table>
    </div><!-- row -->
</div><!-- contentpanel -->                   
                       