<div class="container-fluid">
	<form action="<?php echo base_url("Configuracion/Usuario/Delete")?>" method="POST">
		<?php foreach($usuario as $us){?>
		<input hidden name="idusuario" value="<?php echo $us->idusuario?>">
			<h4>¿Realmente desea eliminar del sistema al usuario <?php echo $us->nombre." ".$us->apellido?>?</h4>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12 text-right"><br>
				<button class="btn btn-outline-danger btn-sm">Eliminar</button>
			</div>
		</div>
	</form>
</div>
