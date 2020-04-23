<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning new p-4">
				<strong>Importante</strong>
				<p class="mb-0">Ingrese la Nueva Contraseña para el Usuario</p>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url("Configuracion/Usuario/Update_pw")?>" method="POST">
		<?php foreach($usuario as $us){?>
			<input value="<?php echo $us->idusuario?>" name="idusuario" hidden>
			<div class="row">
				<div class="col-sm-12">
					<h4>Su Contraseña actual es: <?php echo $us->password?></h4>
				</div>
			</div><br>
		<?php } ?>
		<div class="row">
			<div class="col-sm-6">
				<label>Ingrese Contraseña (*)</label>
				<input class="form-control" type="password" name="pwd" placeholder="Ingrese Contraseña...." required>
			</div>
			<div class="col-sm-6">
				<label>Re-ingrese Contraseña (*)</label>
				<input class="form-control" type="password" name="rpwd" placeholder="Re-ingrese Contraseña...." required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-right"><br>
				<button class="btn btn-outline-success btn-sm">Guardar</button>
			</div>
		</div>
	</form>
</div>
