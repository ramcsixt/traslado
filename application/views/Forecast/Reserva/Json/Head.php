<?php
$dato=array(
	'reserva'=>'active',
	'list_jsonreserva'=>'active'
);

$this->load->view("Layout/General",$dato)?><br>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-4">
					<h5>Archivos Json</h5>
				</div>
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<input class="form-control" id="reserva" type="date" placeholder="Ingrese Fecha de Carga">
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
