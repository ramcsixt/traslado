<?php $this->load->view("Layouts/Dashboard")?><br>
<style>
	a:hover {
		color:
			#606060;
		text-decoration: none;
	}
	a {
		color:
			#606060;
		text-decoration: none;
	}
	.card-jo:hover {

		background-color: #9fe2ff;
		border-bottom: #0083ff 6px solid;

	}
</style>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h3>Modulos de Sistema</h3>
		</div>
	</div><br>
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-2">
					<a href="<?php echo base_url("Comercial/Prospecto")?>">
						<div class="card card-jo">
							<div class="card-body text-center">
								<i class="fas fa-user-tie fa-4x"></i>
								<h6>Comercial</h6>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-2">
					<a href="<?php echo base_url("Forecast")?>">
						<div class="card card-jo">
							<div class="card-body text-center">
								<i class="fas fa-address-book fa-4x"></i>
								<h6>Forecast</h6>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-2">
					<a href="<?php echo base_url("Configuracion/Usuario")?>">
						<div class="card card-jo">
							<div class="card-body text-center">
								<i class="fas fa-cogs fa-4x"></i>
								<h6>Configuracion</h6>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("Footer_principal")?>
