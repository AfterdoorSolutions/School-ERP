<?php

//	INSERT 	//
function insert($Table,$Data) {
  global $ADSdb;
   $query = "INSERT INTO ".TABLE_PREFIX."$Table ( ".$ADSdb->real_escape_string(implode(", ",array_keys($Data))).") VALUES ( '".implode("','", $Data)."' )";
  if (!$ADSdb->query($query)) {
      printf("<font color='red' size='4'><hr>%s ", $ADSdb->error."<hr></font>");
   }
   else
   {
    return 1;
   }
}
// UPDATE //
function update($Table,$Data,$where) {
   global $ADSdb;
   $count = 0;
   $fields = '';
   foreach($Data as $col => $val) {
      if ($count++ != 0) $fields .= ', ';
      $col = $ADSdb->real_escape_string($col);
      $val = $ADSdb->real_escape_string($val);
      $fields .= "`$col` = '$val'";
   }
 
 $query = "UPDATE ".TABLE_PREFIX."$Table SET $fields where ".$where."";
 if (!$ADSdb->query($query)) {
    printf("<font color='red' size='4'><hr>%s ", $ADSdb->error."<hr></font>");
 }
 else
 {
  return 1;
 }
}
//GET FUNCTIONS //
function get($Table,$Some,$Order='',$LimtStart='',$LimtEnd='')
{
  global $ADSdb;
  if($LimtStart=='')
    $query="SELECT $Some from ".TABLE_PREFIX."$Table $Order";
  else
    $query="SELECT $Some from ".TABLE_PREFIX."$Table $Order Limit $LimtStart,$LimtEnd ";

  if(!$result=$ADSdb->query($query)) {
    printf("<font color='red' size='4'><hr>%s ", $ADSdb->error."<hr></font>");
 }
 else
 {
  return $result;
 }
}

function get_where($Table,$Some,$Where,$Groupby='',$Order='',$LimtStart='',$LimtEnd='')
{
  global $ADSdb;
  $count=1;
  $string="";
  if($LimtStart=='')
    $query="SELECT $Some from ".TABLE_PREFIX."$Table where $Where $Groupby $Order";
  else
    $query="SELECT $Some from ".TABLE_PREFIX."$Table where $Where $Groupby $Order Limit $LimtStart,$LimtEnd";

  if(!$result=$ADSdb->query($query)) {
    printf("<font color='red' size='4'><hr>%s ", $ADSdb->error."<hr></font>");
  }
  return $result;
}


function get_where_column($Table,$Some,$Where="")
{
  global $ADSdb;
  $count=1;
  $string="";
  if($Where=='')
    $query="SELECT $Some from ".TABLE_PREFIX.$Table;
  else
    $query="SELECT $Some from ".TABLE_PREFIX."$Table where $Where";

  if(!$result=$ADSdb->query($query)) {
    printf("<font color='red' size='4'><hr>%s ", $ADSdb->error."<hr></font>");
  }
 $result=$result->fetch_array();
  return $result[$Some];
}

function delete($Table,$Where)
{
  global $ADSdb;
   $query="DELETE from ".TABLE_PREFIX."$Table where $Where";
  if(!$result=$ADSdb->query($query)) {
    printf("<font color='red' size='4'><hr>%s ", $ADSdb->error."<hr></font>");
  }
  return $result;
}

// SESSION FUNCTIONS //

function register_session($var,$value)
{
  $_SESSION[$var]=$value;
} 
function destroy_session($value)
{
  if($value=="all")
    session_destroy();
  else
    session_unset($value); 

}
function check_session($var)
{
  return isset($_SESSION[$var]) ? $_SESSION[$var] : 0;
}


function url_content($value)
{
  return $_GET[$value];
}


//Theme Include Functions
function get_header()  //gets header from current theme
{
  ?>
  <!DOCTYPE HTML>
  <!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en"><![endif]-->
  <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en"><![endif]-->
  <!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
  <!--[if gt IE 8]> <html class="no-js ie9" lang="en"><![endif]-->
  <html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="generator" content="ADS Shoppee CMS" />
  <meta name="author" content="Afterdoor Solutions LLP" />
  <head>
  <?php
  include THEME_PATH."include/Header.php";
  ?>
  </head>
<?php
}

// GENRATE LINKS //

// Admin Links
function menu_link($module,$varient)
{
 $link="?module=".ucfirst($module)."&varient=".ucfirst($varient); 
 return $link;
}
function new_link($module,$varient,$file,$param1="",$param2="")
{
 $link="?module=".ucfirst($module)."&varient=".ucfirst($varient)."&file=".ucfirst($file)."&param1=".$param1."&param2=".$param2; 
 return $link;
}
function getCurlData($url)
{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		$curlData = curl_exec($curl);
		curl_close($curl);
		return $curlData;
}


function generate_seo_link($input) {
	$input= strtolower($input);
	$input=str_replace(" ","-",$input);
	return $input;
}

// Admin Links

//TESTING//
/*
$result=delete($ADSdb,'new',"id='5'");
//print_r($result);
if($result!="")
{
foreach ($result as $key => $value) {
  echo $value['id']."<br>";
}
}
*/
?>