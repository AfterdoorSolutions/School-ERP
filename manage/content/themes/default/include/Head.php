<!DOCTYPE html>
<?php
$author=1;
?>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php if(isset($_GET['varient'])){ echo ucfirst($_GET['varient']). " | "; } echo TITLE;?></title>
        <link href="<?php echo ADMIN_THEME_PATH;?>css/style.default.css" rel="stylesheet">
        <link href="<?php echo ADMIN_THEME_PATH;?>css/select2.css" rel="stylesheet" />
        <link href="<?php echo ADMIN_THEME_PATH;?>css/morris.css" rel="stylesheet">
        <link href="<?php echo ADMIN_THEME_PATH;?>css/style.datatables.css" rel="stylesheet">
        <link href="http://cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
    <?php if($varient=='Products'){ ?>
    <link rel="stylesheet" href="<?php echo ADMIN_THEME_PATH;?>css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_THEME_PATH;?>css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?php echo ADMIN_THEME_PATH;?>css/jquery.fileupload-ui.css">
    <noscript><link rel="stylesheet" href="<?php echo ADMIN_THEME_PATH;?>css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="<?php echo ADMIN_THEME_PATH;?>css/jquery.fileupload-ui-noscript.css"></noscript>
    <?php } ?>
    
        <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>