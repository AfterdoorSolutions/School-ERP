<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if(isset($title)){echo $title;}else{echo "APS AMBALA";} ?></title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="http://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-override.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/weather-icons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/animate.delay.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/toggles.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/pace.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.default.php" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="<?php echo base_url() ;?>/assets/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.panel-default').addClass('panel-danger');
            $('.panel-danger').removeClass('panel-default');
            
        });
    </script>
</head>

<body class="<?php  if(isset($class)) { echo $class; } ?>">
<?php if(!isset($login)) { ?>
<header>
    <div class="headerwrapper">
        <div class="header-left">
            <a href="<?php echo base_url().'admin' ?>" class="logo">
                <?php echo date('d M Y'); ?>
            </a>
            <div class="pull-right">
                <a href="#" class="menu-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div><!-- header-left -->
        <div class="header-right text-center school_title">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" />
                ARMY PUBLIC SCHOOL
                <img src="<?php echo base_url(); ?>assets/images/logo.png" />
        </div>
        
    </div><!-- headerwrapper -->
</header>
<?php } ?>