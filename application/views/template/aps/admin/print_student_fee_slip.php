<script type="text/javascript">     
        function PrintDiv() 
        {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', '');
           popupWin.document.open();
           popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><style type="text/css" media="print">@page{ size:A4 landscape; }</style><style>tr,td,th{ font-size:9px !important; padding:0 2px !important }</style><body style="font-size:13px !important" onload="window.print()"><h2 class="text-center">Fee Slip</h2>' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }
</script>
<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Student Fee Slip</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
   		
 <div class="contentpanel">
    <div class="col-md-12 " id="divToPrint">
        <?php
        //var_dump($student);
        for($j=1;$j<4;$j++)
        {
        ?>
        <div class="col-xs-4">
            
            <table class="table table-bordered">
                <tr><td>Receipt No.</td><td></td><td>Adm No.</td><td><?php echo $student->adm_number; ?></td></tr>
                <tr><th class="text-center" colspan="4">Bank Copy</th></tr>
                <tr><th class="text-center" colspan="4">Indian Overseas Bank, GMN College</th><tr>
                <tr><th class="text-center" colspan="4">AMBALA CANTT.</th></tr>
                <tr><td colspan="4">Please Credit ARMY PUBLIC SCHOOL,AMBALA CANTT,</td></tr>
                <tr><td colspan="4">CBSE Affiliation No-580002</td></tr>
                <tr><td colspan="4">Saving A/c No- 6842010000011500</td></tr>
                <tr><td colspan="2">Pupil's Name</td><td colspan="2"><?php echo ucfirst($student->first_name)." ".ucfirst($student->middle_name)." ".ucfirst($student->last_name); ?></td></tr>
                <tr><td colspan="2">Father's Name</td><td colspan="2"><?php echo ucfirst($student->father_name); ?></td></tr>
                <tr><td colspan="2">Student Category</td><td colspan="2"><?php echo ucfirst($student->student_category_name); ?></td></tr>
                <tr><td>Class</td><td><?php echo ucfirst($student->class_name); ?></td><td>Section</td><td><?php echo ucfirst($student->section_name); ?></td></tr>
                <tr><th colspan="4">New Adm Only</th></tr>
                
                <?php 
                $i=1;
                $last_id=0;
                $total='0';
                foreach ($student->fee_type_id as $data)
                {
                    
                    if($last_id==$data->category)
                    {
                        $last_id=$data->category;
                    }
                    else
                    {
                        $last_id=$data->category;
                        ?>
                        <tr><th colspan="4"><?php if($data->category==1){ echo "Annual Charges"; } else { echo "Quaterly Charges For QE."; } ?></th></tr>
                    <?php
                    }
                ?>
                    <tr>
                        <td colspan="1"><?php echo $i; ?></td><td colspan="2"><?php echo $data->fee_type_name; ?></td><td colspan="1"><?php echo $data->fee_type_value; $total=$total+$data->fee_type_value; ?></td>
                    </tr>
                <?php
                $i++;
                }
                ?>
                <tr><th colspan="3" class="text-right">Total</th><td colspan="1"><?php echo $total; ?></td></tr>
                <tr style="height:70px;vertical-align:bottom"><th >Cheque No.</th><th>Date</th><th colspan="2">Name of bank</th></tr>
            </table>
        </div>
        <?php
        }
        ?>
    </div><!-- col-md-12 -->
        <input onclick="PrintDiv();" type="button" value="Print" class="btn btn-primary">

</div><!-- contentpanel -->

                    
                       