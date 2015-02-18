<?php require '../bin/Config.php';
if(isset($_GET['param']))
{
	include(ADMIN_THEME_PATH.$_GET['param']);
}
else
{
	include ADMIN_THEME_PATH.'index.php';
}

