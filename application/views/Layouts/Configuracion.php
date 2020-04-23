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
	<link href="<?php echo base_url("Public/system/css/select2.css")?>" rel="stylesheet">
	<link href="<?php echo base_url("Public/system/css/jquery.datetimepicker.min.css")?>" rel="stylesheet">
	<title>Configuracion</title>

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
		body {
			font-size: 0.8125rem;
			background-color: #f1f1f1;
			background-image: url(<?php echo base_url("public/img/background/fondo_principal_2.jpg")?>);
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
	</style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
	<h4>MC Laren</h4>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
		</ul>
		<ul class="navbar-nav ml-md-auto">
			<li class="nav-item dropdown">
				<a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Bienvenido German Torres
				</a>
				<div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
					<a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/">Gestionar Cuenta</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/">Cerrar Sesion</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark bg-light" style="border-bottom: #0070D2 3px solid; padding-bottom: 0rem">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<strong>Administrador</strong>&nbsp;&nbsp;&nbsp;
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item  <?php echo $usuario?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Usuario
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_usuario?>" href="<?php echo base_url("Comercial/Oportunidad")?>">Listar Oportunidades</a>
					<a class="dropdown-item" href="#">Crear Oportunidad</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
