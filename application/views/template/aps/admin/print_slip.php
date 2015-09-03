<script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=650');
           popupWin.document.open();
           popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><body onload="window.print()"><h2 class="text-center">Print Staff Slip</h2>' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Print Slip</li>
              </ul>
              <h4>Print Slip</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel" >
  <div class="row row-stat">
    <div class="col-md-12" id="divToPrint">
        <div class="panel-body">
          <div class="col-md-12">
            <table  class="table table-bordered">
              <tr>
                <td><b>Name</b></td>
                <td><?php echo ucfirst($staff->firstname)." ".ucfirst($staff->lastname); ?></td>
              </tr>
              <tr>
                <td><b>Date of Joining</b></td>
                <td><?php echo date('d M Y',strtotime($staff->time)); ?></td>
              </tr>
              <tr>
                <td><b>Emp. Code</b></td>
                <td><?php echo $staff->emp_code; ?></td>
              </tr>
              <tr>
                <td><b>Period</b></td>
                <td><?php echo $more->month; ?></td>
              </tr>
              <tr>
                <td><b>Designation</b></td>
                <td><?php echo $staff->staff_category_id; ?></td>
              </tr>
              <tr>
                <td><b>Earnings (+)</b></td>
                <td><b>Deductions (-)</b></td>
              </tr>
              <tr>
                <td>
                  <div class="row">
                    <div class="col-xs-4"><b>Basic Pay</b></div>
                    <div class="col-xs-8">Rs. <?php echo $more->basic_pay; ?></div>
                  </div>
                  <?php 
                    foreach ($query['add'] as $key => $value) {
                      ?>
                      <div class="row">
                        <div class="col-xs-4"><b><?php echo $value['salary_name']; ?></b></div>
                        <div class="col-xs-8">Rs. <?php echo $value['salary_value']; ?></div>
                      </div>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php 
                    foreach ($query['sub'] as $key => $value) {
                      ?>
                      <div class="row">
                        <div class="col-xs-4"><b><?php echo $value['salary_name']; ?></b></div>
                        <div class="col-xs-8">Rs. <?php echo $value['salary_value']; ?></div>
                      </div>
                      <?php
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <td><b>Total Salary</b></td>
                <td>Rs. <?php echo $more->total; ?></td>
              </tr>
            </table>
          </div><!-- col-md-6 -->


        </div><!-- panel-body -->
        
       
    <?php// echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->
    <input onclick="PrintDiv();" type="button" value="Print" class="btn btn-primary">
</div><!-- contentpanel -->