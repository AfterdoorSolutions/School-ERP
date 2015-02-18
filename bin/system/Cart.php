<?php
if(isset($_SESSION['login_user'])){
global $uid;
$uid=$_SESSION['login_user'];
}
else{
global $uid;
$uid='0';
}
function create_cart_session()
{
	if(isset($_COOKIE['ads_cart_id1']))
	{
		//echo "if";
		if(isset($_SESSION['login_user'])){
			$uid=$_SESSION['login_user'];
		}
		else{
			$uid='0';
		}
		if(!isset($_SESSION['ads_cart_id']))
		{
		$_SESSION['ads_cart_id']=$_COOKIE['ads_cart_id1'];
		$data=array('add_to_cart_id'=>$_SESSION['ads_cart_id'],'uid'=>$uid);
		insert("session",$data);
		}
	}
	else
	{
		//echo "else";
	$randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30);
	$_SESSION['ads_cart_id']=md5($randomString.$_SERVER['REMOTE_ADDR']);
	setcookie("ads_cart_id1", $_SESSION['ads_cart_id'], time()+(10 * 365 * 24 * 60 * 60),'/');
	//inster cart -> insert sessionid if user login uid else 0. prduct id options text 
	//echo $_SESSION['ads_cart_id'];
	if(isset($_SESSION['login_user'])){
		$uid=$_SESSION['login_user'];
	}
	else{
		$uid='0';
	}
	
	$data=array('add_to_cart_id'=>$_SESSION['ads_cart_id'],'uid'=>'678');
    if(insert("session",$data)==1);
    $message=1;
  
	}
}



function destroy_cart_session()
{	
	session_destroy();
	//setcookie ("ads_cart_id1", "", time() - (10 * 365 * 24 * 60 * 60),'/');
}

//create_cart_session();
//destroy_cart_session();
//echo $_SESSION['ads_cart_id'];

function add_to_cart($product_id,$quantity,$options,$seller_id)
{
	if(isset($_SESSION['login_user'])){
		$uid=$_SESSION['login_user'];
	}
	else{
		$uid='0';
	}
	if($seller_id!=0){
		$res=get_where('seller_product','*','product_id='.$product_id.' and seller_id='.$seller_id);
		$res=$res->fetch_array();
		$product_price=$price=$res['price'];
	}
	else{
	$res=get_where('products','*','product_id='.$product_id)->fetch_array();
	$product_price=$price=$res['price'];
	//fake price $price
	$price=$quantity*$price;
	}
	$data=array('seller_id'=>$seller_id,'product_price'=>$product_price,'price'=>$price,'session_id'=>$_SESSION['ads_cart_id'],'uid'=>$uid,'product_id'=>$product_id,'quantity'=>$quantity,'options'=>$options);
    if(insert("session_cart",$data)==1);
    $message=1;

}

function login_user($email,$password)
{	
	if(!isset($_SESSION['login_user']))
	{
		$result=get_where('customer','*',"email='".$email."' AND password ='".$password."'");
		if($result->num_rows>0){
		$data=$result->fetch_array();
		
		$_SESSION['login_user']=$data['customer_id'];
		$data2=array('uid'=>$data['customer_id']);
		update('session',$data2,' add_to_cart_id="'.$_SESSION['ads_cart_id'].'"');
		update('session_cart',$data2,' session_id="'.$_SESSION['ads_cart_id'].'"');
		return 1;
		}
		else{
		return 0;
		}
	}	
}
function get_cart_count()
{	global $uid;
	$result=get_where('session_cart','*','session_id="'.$_SESSION['ads_cart_id'].'" or (uid="'.$uid.'" AND uid !="0" )');
	$num=$result->num_rows;
	if($num>1)
	echo "( ".$num." Items )";
	elseif($num==1)
	echo "( ".$num." Item )";
	else
	echo "(Empty Cart)";
}
function get_cart_totalprice()
{	global $uid;
	$result=get_where('session_cart','sum((product_price)*(quantity))','session_id="'.$_SESSION['ads_cart_id'].'" or (uid="'.$uid.'" AND uid !="0" )')->fetch_array();
	echo $result['sum((product_price)*(quantity))'];
}

function get_product_price($product_id)
{	
	$result=get_where('products','price','product_id="'.$product_id.'"')->fetch_array();
	echo $result['price'];
}

?>