<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico');?>">

		<title>SD Ar-Rafi'</title>
        
        <link href="<?php echo base_url('assets/dashboard/css/sweetalert.css');?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url('assets/dashboard/css/bootstrap.min.css"');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/core.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/components.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/icons.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/pages.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/menu.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/responsive.css');?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="<?php echo base_url('assets/dashboard/js/modernizr.min.js');?>" rel="stylesheet" type="text/css" />
	</head>
	<body>

        <?php
        	$this->load->view($body);
        ?>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
        <script src="<?php echo base_url('assets/dashboard/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/detect.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/fastclick.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.slimscroll.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.blockUI.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/waves.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/wow.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.nicescroll.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.scrollTo.min.js'); ?>"></script>


        <script src="<?php echo base_url('assets/dashboard/js/jquery.core.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.app.js');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/sweetalert/dist/sweetalert.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/pages/jquery.sweet-alert.init.js');?>"></script>
	</body>
</html>