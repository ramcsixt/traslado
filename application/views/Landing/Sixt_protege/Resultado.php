<?php $this->load->view("Layouts/Prospecto")?><br><br>
	<style>
		body {
			background: #25384e;
		}
		.centrado{
			margin-left: auto;
			margin-right: auto;
			vertical-align:middle;
		}
		a:not([href]) {
			color: #17a2b8;
		}
		a:not([href]):hover {
			color: white;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 centrado">
				<div class="card">
					<div class="card-body">
						<img src="<?php echo base_url("public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 10%"><br>
						<div class="text-center">
							<i style="color: #2ebf38" class="fas fa-check-circle fa-4x"></i><br>
							<h3>Estimado Cliente, sus datos se han registrado correctamente</h3>
							En breve un asesor se pondra en contacto con usted<br><br>
							<a class="btn btn-outline-info btn-sm" href="<?php echo base_url("Reservas?utm_campaing=".$_GET["utm_campaing"]."&utm_source=".$_GET["utm_name"])?>">Volver a Pagina Anterior</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view("Footer_principal")?>
