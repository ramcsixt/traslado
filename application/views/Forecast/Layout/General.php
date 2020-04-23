<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/bootstrap.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/all.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/brands.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/fontawesome.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/regular.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/solid.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/svg-with-js.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/fonts/v4-shims.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/lightpick.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/jquery.fileupload.css")?>">

	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/fileinput.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/fileinput-rtl.css")?>">

	<title>Forecast</title>

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
			font-size: 0.8125rem;
			background-color: #a5a5a5;
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

		.preloader {
			background: url(<?php echo base_url("resource/img/logo.png")?>) no-repeat center #000;
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 1000;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<img src="<?php echo base_url("resource/img/logo_2.png")?>" style="width: 15%">
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto col-sm-2">
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
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="border-bottom: #0070D2 3px solid; padding-bottom: 0rem">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php echo $dashboard?>">
				<a class="nav-link preload_page" href="<?php echo base_url("Dashboard")?>">Dashboard <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item  <?php echo $reserva?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-car"></i>&nbsp;Reservas
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_reserva?> preload_page" href="<?php echo base_url("Forecast/Reserva")?>"><i class="fas fa-table"></i>&nbsp;Listar</a>
					<a class="dropdown-item <?php echo $list_jsonreserva?> preload_page" href="<?php echo base_url("Forecast/Reserva/Json")?>"><i class="fas fa-table"></i>&nbsp;Listar Json</a>
					<a class="dropdown-item btnupreserva" href="#"><i class="fas fa-file-upload"></i>&nbsp;Cargar JSON</a>
				</div>

			</li>
			<li class="nav-item  <?php echo $devolucion?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-undo-alt"></i>&nbsp;Devoluciones
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_devolucion?> preload_page" href="<?php echo base_url("Forecast/Devolucion")?>"><i class="fas fa-table"></i>&nbsp;Listar</a>
					<a class="dropdown-item <?php echo $list_jsondevolucion?> preload_page" href="<?php echo base_url("Forecast/Devolucion/Json")?>"><i class="fas fa-table"></i>&nbsp;Listar Json</a>
					<a class="dropdown-item btnupdevolucion" href="#"><i class="fas fa-file-upload"></i>&nbsp;Cargar JSON</a>
				</div>
			</li>
			<li class="nav-item  <?php echo $flota?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-ship"></i>&nbsp;Flota
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_flota?> preload_page" href="<?php echo base_url("Forecast/Flota")?>"><i class="fas fa-table"></i>&nbsp;Listar</a>
					<a class="dropdown-item <?php echo $list_jsonflota?> preload_page" href="<?php echo base_url("Forecast/Flota/Csv")?>"><i class="fas fa-table"></i>&nbsp;Listar CSV</a>
					<a class="dropdown-item btnupflota" href="#"><i class="fas fa-file-upload"></i>&nbsp;Cargar CSV</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
