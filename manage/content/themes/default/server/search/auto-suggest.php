<?php

//mysql_connect("localhost", "root", "");
//mysql_select_db('shop');



if(!empty($_GET['latestQuery'])){ //if the auto-suggest script receives a query...

	$latestQuery = $_GET['latestQuery']; 
	//$query=mysql_query('select * from ads_customer where firstname LIKE "'.$latestQuery.'%" or customer_id LIKE "'.$latestQuery.'%"');
	$query=get_where('customer','*', 'firstname LIKE "'.$latestQuery.'%" or customer_id LIKE "'.$latestQuery.'%"');
	$data=array("data"=>array(),"kin"=>array());
	//$data['data']="";
	//while($data2=mysql_fetch_array($query)){
		foreach($query as $k=>$v){
		array_push($data['data'],"<li><span class='appended-results' data-id=".$v['customer_id'].">".$v['customer_id']."-".$v['firstname']." ".$v['last_name']."</span></li>");
	}
	echo json_encode($data); 
}
if(!empty($_GET['cid'])){ //if the auto-suggest script receives a query...

	$latestQuery = $_GET['cid']; 
	//$query=mysql_query('select * from ads_customer where firstname LIKE "'.$latestQuery.'%" or customer_id LIKE "'.$latestQuery.'%"');
	$query=get_where('customer_address','*', 'customer_id="'.$latestQuery.'"');
	$data=array("data"=>array(),"kin"=>array());
	//$data['data']="";
	//while($data2=mysql_fetch_array($query)){
		foreach($query as $k=>$v){
		array_push($data['data'],"<option value=".$v['customer_address_id'].">Address : ".$v['address'].", Email : ".$v['email'].", Phone : ".$v['telephone']."</option>");
	}
	echo json_encode($data); 
}
if(!empty($_GET['latestQueryProduct'])){ //if the auto-suggest script receives a query...

	$latestQuery = $_GET['latestQueryProduct']; 
	//$query=mysql_query('select * from ads_customer where firstname LIKE "'.$latestQuery.'%" or customer_id LIKE "'.$latestQuery.'%"');
	$query=get_where('products','*', 'name LIKE "'.$latestQuery.'%" or product_id LIKE "'.$latestQuery.'%"');
	$data=array();
	//while($data2=mysql_fetch_array($query)){
		foreach($query as $k=>$v){
		array_push($data,"<li><span class='appended-product-results' data-id=".$v['product_id'].">".$v['product_id']."-".$v['name']."</span></li>");
	}
	
	
	
	echo json_encode($data); 
}
?>