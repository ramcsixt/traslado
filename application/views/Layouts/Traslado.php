<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url("Public/system/css/bootstrap.css")?>">
	<link href="<?php echo base_url("Public/fonts/all.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/jspanel.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/toastr.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/iziModal.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/custom_alert.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/custom_check.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/jquery.datetimepicker.min.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/daterangepicker.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/jquery_ui/jquery-ui.css")?>" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url("Public/system/css/lightpick.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("Public/fonts/css/all.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/ai_datepicker/datepicker.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/tags/bootstrap-tagsinput.css")?>">

	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/wizard/smart_wizard.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/wizard/smart_wizard_theme_dots.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/wizard/smart_wizard_theme_circles.css")?>">
	<title>Solicitud de Atencion</title>

	<style>
		.bg-light {
			background-color: #ffffff !important;
		}
		.navbar-dark .navbar-nav .nav-link {
			color: inherit;
		}
		.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
			color: inherit;
		}
		.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
			border-bottom: #0083ff 3px solid;
			color: inherit;
			background: rgba(0,112,210,0.1);

		}
		.navbar-dark .navbar-nav .show > .nav-link, .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .nav-link.active {
			border-top: #0083ff 3px solid;
			color: inherit;
			background: rgba(0,112,210,0.1);
		}
		.dropdown-menu {
			font-size: 12px;
		}
		.form-control {
			font-size: 12px;
		}
		#chartdiv {
			width: 100%;
			height: 500px;
		}
		.btn-xs, .btn-group-xs > .btn {
			padding: 0.25rem 0.5rem;
			font-size: 10px;
			line-height: 1.5;
			border-radius: 0.2rem;
		}
		body {
			background: url(<?php echo base_url("resource/img/back_ground.jpg")?>) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
</head>
<body>
