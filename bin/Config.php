<?php session_start();
//Config File
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shop');
define('TABLE_PREFIX', 'ads_');
define('INSTALL_PATH', 'http://192.168.0.2/school/'); // Trailing '/' (slash) is important please add that
define('INSTALL_DIR', 'school'); 
define('TITLE', 'shop');
define('UPLOAD_PATH','content/uploads/');
define('ADMIN_PATH','manage/');

//	DB Connection //
$ADSdb = new mysqli("localhost", "root", "", "schoolnew"); // Do not change the variable name

// DO NOT EDIT BELOW THIS LINE //
define('SYSTEM_FILES', INSTALL_PATH."system/");
define('THEME_PATH', "content/themes/school/");
define('ADMIN_THEME_PATH', "content/themes/default/");

// INCLUDE CORE FILES
require 'system/Main.php';
require 'system/Front-Main.php';

// INCLUDE TEMPLATE FUNCTION FILES
 require ADMIN_THEME_PATH.'include/Func.php';

// INCLUDE OPTIONAL FILES ACC TO MODULES


?>