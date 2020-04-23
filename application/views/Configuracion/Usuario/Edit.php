<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning new p-4">
				<strong>Importante</strong>
				<p class="mb-0">Los campos con el signo (*) son obligatorios, el Sistema no permitira generar registros sin llenarlos correctamente</p>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url("Configuracion/Usuario/Update")?>" method="POST">
		<?php foreach($usuario as $us){?>
		<input value="<?php echo $us->idusuario?>" name="idusuario" hidden>
		<div class="row">
			<div class="col-sm-6">
				<label>Ingrese Nombre (*)</label>
				<input class="form-control" name="nombre" value="<?php echo $us->nombre?>" placeholder="Ingrese Nombre...." required>
			</div>
			<div class="col-sm-6">
				<label>Ingrese Apellido (*)</label>
				<input class="form-control" name="apellido" value="<?php echo $us->apellido?>" placeholder="Ingrese Apellido...." required>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<label>Ingrese Correo (*)</label>
				<input class="form-control" id="correo" name="correo" value="<?php echo $us->correo?>" type="email" placeholder="Ingrese Correo....." required>
				<span id="alert_correo"></span>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-4"><br>
				<label>Seleccione Sexo</label>
			</div>
			<div class="col-sm-4"><br>
				<?php foreach($sexo as $sex){?>
					<?php if($us->idsexo==$sex->idsexo){?>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sexo" value="<?php echo $sex->idsexo?>" checked>
							<label class="form-check-label">
								<?php echo $sex->nombre?>
							</label>
						</div>
					<?php }else{?>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sexo" value="<?php echo $sex->idsexo?>">
							<label class="form-check-label">
								<?php echo $sex->nombre?>
							</label>
						</div>
					<?php }?>
				<?php }?>
			</div>
		</div><br>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12 text-right"><br>
				<button class="btn btn-outline-success btn-sm">Guardar</button>
			</div>
		</div>

	</form>
</div>
<script>
	$("#correo").keyup(function(){
		var correo = $("#correo").val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Configuracion/Usuario/Duplicate_correo")?>',
			data: {correo:correo},
			success: function(data) {
				if(data==0){
					$("#btnguardarusuario").prop('disabled', false);
					$("#alert_correo").html("El Correo es Valido");
				}else{
					$("#btnguardarusuario").prop('disabled', true);
					$("#alert_correo").html("Ya Existe un Registro con este correo electronico");
				}
			}
		})
	});
</script>
