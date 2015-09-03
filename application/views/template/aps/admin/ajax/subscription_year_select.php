<?php
  $options=array(''=>'Select Subscription Year');
/*  echo "<pre>";
  var_dump($query);
  echo "</pre>";*/
  foreach($query as $key=>$value) 
  {
    $options[$value->subscription_id]=$value->subscription_start."-".$value->subscription_end." (".$value->amount.")";
  }
  /*var_dump($options);*/
  echo form_dropdown('subscription_id',$options,'','class="form-control" id="subscription_id"');
?>