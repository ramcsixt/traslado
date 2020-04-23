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
	<link rel="stylesheet" href="<?php echo base_url("Public/system/css/lightpick.css")?>">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<link href="<?php echo base_url("Public/system/css/bootstrap-select.css")?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/tags/bootstrap-tagsinput.css")?>">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url("resource/plugins/css/ai_datepicker/datepicker.css")?>">
	<title>Modulo - Comercial</title>

	<style>
		.bootstrap-tagsinput .tag {
			margin-right: 2px;
			color: white;
			background: #309eb7;
			border-radius: 6px;
			/* padding-bottom: 2px; */
			padding: 1px;
		}
	</style>

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
			background-color: #e8e8e8;
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
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<h4 style="color: white">MC Laren</h4>&nbsp;
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto col-sm-2">
		</ul>
		<ul class="navbar-nav mr-auto col-sm-3">
			<input class="form-control" id="search_auto" placeholder="Busqueda de Cliente o Prospectos">
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
	<strong>Comercial</strong>&nbsp;&nbsp;&nbsp;
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php echo $dashboard?>" hidden>
				<a class="nav-link" href="<?php echo base_url("Comercial/Dashboard")?>">Dashboard <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item  <?php echo $prospecto?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Prospecto
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_prospecto?>" href="<?php echo base_url("Comercial/Prospecto")?>">Listar Prospecto</a>
					<?php if($idprospecto!=""){?>
						<a class="dropdown-item active" href="<?php echo base_url("Comercial/Prospecto/View/".$idprospecto)?>"><?php echo "Nro. de Cuenta ".$idprospecto?></a>
					<?php }?>
				</div>

			</li>
			<li class="nav-item  <?php echo $cuenta?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Cuenta
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_cuenta?>" href="<?php echo base_url("Comercial/Cuenta")?>">Listar Cuenta</a>
					<?php if($idcuenta!=""){?>
						<a class="dropdown-item active" href="<?php echo base_url("Comercial/Cuenta/View/".$idcuenta)?>"><?php echo "Nro. de Cuenta ".$idcuenta?></a>
					<?php }?>
				</div>
			</li>
			<li class="nav-item  <?php echo $oportunidad?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Oportunidad
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_oportunidad?>" href="<?php echo base_url("Comercial/Oportunidad")?>">Listar Oportunidades</a>
					<?php if($idoportunidad!=""){?>
						<a class="dropdown-item active" href="<?php echo base_url("Comercial/Oportunidad/View/".$idoportunidad)?>"><?php echo "Nro. de Oportunidad ".$idoportunidad?></a>
					<?php }?>
				</div>
			</li>

			<li class="nav-item  <?php echo $contacto?> dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Contacto
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item <?php echo $list_contacto?>" href="<?php echo base_url("Comercial/contacto")?>">Listar Contacto</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
