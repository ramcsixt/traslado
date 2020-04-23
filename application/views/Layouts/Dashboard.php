<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url("Public/system/css/bootstrap.css")?>">
	<link href="<?php echo base_url("Public/fonts/all.css")?>" rel="stylesheet">

	<title>Dashboard</title>
</head>

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
	.bg-dark {
		background-color: #484848 !important;
		color: white;
	}
	.navbar-dark .navbar-nav .show > .nav-link, .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .nav-link.active {
		border-top: #0083ff 3px solid;
		color: inherit;
		background: rgba(0,112,210,0.1);
	}
	body {
		font-size: 12px;
		background-color: #e8e8e8;
	}
</style>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="border-bottom: #0070D2 3px solid;">
	<h4>MC Laren</h4>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
		</ul>
		<ul class="navbar-nav ml-md-auto">
			<li class="nav-item dropdown">
				<a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Bienvenido <?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido')?>
				</a>
				<div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
					<a class="dropdown-item" href="#" id="btncerrarsession">Cerrar Sesion</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
