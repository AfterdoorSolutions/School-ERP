<?php 
$module = isset($_GET['module']) ? $_GET['module'] : "default";
$varient = isset($_GET['varient']) ? $_GET['varient'] : "default";
$file = isset($_GET['file']) ? $_GET['file'] : "default";
$param1 = isset($_GET['param1']) ? $_GET['param1'] : "default";
$param2 = isset($_GET['param2']) ? $_GET['param2'] : "default";
$urlpath=explode('/', ADMIN_PATH);
//echo $urlpath[0];
?>

<?php
include ADMIN_THEME_PATH.'include/Head.php';
if(check_session("login"))
{

include ADMIN_THEME_PATH.'include/Header.php';
include ADMIN_THEME_PATH.'include/Menu.php';

	switch($module)
	{
		case $module:
			if($file=="default")
			{
				if(file_exists(ADMIN_THEME_PATH.'modules/'.$module.'/'.$varient.'/Main.php'))
				{
					define('MODULE_PATH',ADMIN_THEME_PATH.'modules/'.$module.'/'.$varient.'/');
					include ADMIN_THEME_PATH.'modules/'.$module.'/'.$varient.'/Main.php';
				}
				else
				{
					include ADMIN_THEME_PATH.'404.php';
				}
			}
			elseif($module=='ajax')
			{
			include ADMIN_THEME_PATH.$_REQUEST['param'];	
			}
			else
			{
				if(file_exists(ADMIN_THEME_PATH.'modules/'.$module.'/'.$varient.'/'.$file.'.php'))
				{
					define('MODULE_PATH',ADMIN_THEME_PATH.'modules/'.$module.'/'.$varient.'/');
					include ADMIN_THEME_PATH.'modules/'.$module.'/'.$varient.'/'.$file.'.php';
				}
				else
				{
					include ADMIN_THEME_PATH.'404.php';
				}
			}

			break;
		
		default:
		echo "string";
			if(basename($_SERVER['REQUEST_URI'])==$urlpath[0])
			{
				include ADMIN_THEME_PATH.'modules/Dashboard/Dashboard/Main.php';
			}
			else
			{
			include ADMIN_THEME_PATH.'404.php';
			}
	}

}
else
{
include ADMIN_THEME_PATH.'login.php';
}
?>
<?php include ADMIN_THEME_PATH."include/Footer.php";?>
