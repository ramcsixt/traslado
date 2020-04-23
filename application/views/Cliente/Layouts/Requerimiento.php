<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url("public/system/css/bootstrap.css")?>">
	<link href="<?php echo base_url("public/fonts/all.css")?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url("public/system/css/jquery.webui-popover.css")?>">

	<title>Cliente - Requerimiento</title>
	<style>
		.form-control {
			font-size: 12px;
		}
		body{
			font-size: 12px;
		}
		.table thead th {
			vertical-align: middle;
			border-bottom: 2px solid #dee2e6;
			background: #ef7b00;
			color: white;
		}
		.btn-xs, .btn-group-xs > .btn {
			padding: 0.25rem 0.5rem;
			font-size: 10px;
			line-height: 1.5;
			border-radius: 0.2rem;
		}
		.badge-top {
			vertical-align: top;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<img style="width: 5%" src="<?php echo base_url("public/img/logo/logo_white.png")?>">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>&nbsp;
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto" style="vertical-align: middle">
			<h6 style="color:white">Panel de <?php echo $nombre_cuenta?></h6>
		</ul>
		<ul class="navbar-nav ml-md-auto">
			<li><a class="nav-link" id="notification"><i class="fas fa-info-circle fa-1x"></i><span class="badge badge-danger badge-top">3</span></a></li>
			<li><a class="nav-link" id="alertas"><i class="fas fa-bell"></i><span class="badge badge-danger badge-top">2</span></a></li>
			<li class="nav-item dropdown">
				<a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Bienvenido <?php echo $this->session->userdata('nombre')?>
				</a>
				<div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
					<a class="dropdown-item" href="#" id="btnlogout_client">Cerrar Sesion</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
