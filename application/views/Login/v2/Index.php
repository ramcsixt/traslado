<?php $this->load->view("Login/v2/Head")?>
<div class="theme-loader">
	<div class="ball-scale">
		<div class='contain'>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
			<div class="ring"><div class="frame"></div></div>
		</div>
	</div>
</div>

<section class="login-block">

	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form method="POST" action="<?php echo base_url("Login/Verificador")?>" class="md-float-material form-material">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
					<div class="auth-box card">
						<div class="card-block">
							<div class="row m-b-20">
								<div class="col-md-12">
									<h3 class="text-center">Inicio de Sesion</h3>
								</div>
							</div>
							<div class="form-group form-primary">
								<input type="email" name="username" value="<?php echo $username?>" class="form-control" required="" placeholder="Escribe tu correo">
								<span class="form-bar"></span>
							</div>
							<div class="form-group form-primary">
								<input type="password" name="password" class="form-control" required="" placeholder="Escribe contraseña"  data-eye>
								<span class="form-bar"></span>
							</div>
							<div class="row m-t-25 text-left">
								<div class="col-12">
									<div class="checkbox-fade fade-in-primary d-">
										<label>
											<input type="checkbox" value="">
											<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
											<span class="text-inverse">Recordar</span>
										</label>
									</div>
									<div class="forgot-phone text-right f-right">
										<a href="auth-reset-password.html" class="text-right f-w-600"> Olvidaste tu Contraseña?</a>
									</div>
								</div>
							</div>
							<div class="row m-t-30">
								<div class="col-sm-2"></div>
								<div class="col-sm-8">
									<button type="submit" class="btn btn-primary btn-md btn-block">Acceder</button>
								</div>
								<div class="col-sm-2"></div>
							</div>
							<hr />
							<div class="row">
								<div class="col-sm-12">
									<img src="<?php echo base_url("public/img/logo/sixt.png")?>" width="15%">
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>

		</div>

	</div>

</section>
<?php $this->load->view("Login/v2/Footer")?>
<!-- Modal -->
<div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Mensaje de Alerta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo $error?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        <?php if($error!=""){?>
			$("#modal_alert").modal("show");
		<?php }?>
    )};
</script>
