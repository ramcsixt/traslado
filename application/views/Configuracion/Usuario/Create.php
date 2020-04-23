<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning new p-4">
				<strong>Importante</strong>
				<p class="mb-0">Los campos con el signo (*) son obligatorios, el Sistema no permitira generar registros sin llenarlos correctamente</p>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url("Configuracion/Usuario/Store")?>" method="POST">
	<div class="row">
		<div class="col-sm-6">
			<label>Ingrese Nombre (*)</label>
			<input class="form-control" name="nombre" placeholder="Ingrese Nombre...." required>
		</div>
		<div class="col-sm-6">
			<label>Ingrese Apellido (*)</label>
			<input class="form-control" name="apellido" placeholder="Ingrese Apellido...." required>
		</div>
	</div><br>
	<div class="row">
		<div class="col-sm-12">
			<label>Ingrese Correo (*)</label>
			<input class="form-control" name="correo" type="email" id="correo" placeholder="Ingrese Correo....." required>
			<span id="alert_correo"></span>
		</div>
	</div><br>
	<div class="row">
		<div class="col-sm-3"><br>
			<label>Seleccione Sexo</label>
		</div>
		<div class="col-sm-2"><br>
			<?php foreach($sexo as $sex){?>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="sexo" value="<?php echo $sex->idsexo?>">
					<label class="form-check-label">
						<?php echo $sex->nombre?>
					</label>
				</div>
			<?php }?>
		</div>
		<div class="col-sm-7">
			<label>Seleccionar Modulos (*)</label>
			<select name="modulos[]" class="js-example-responsive" multiple="multiple" required>
				<?php foreach($modulo as $md){?>
					<option value="<?php echo $md->idmodulo?>"><?php echo $md->nombre?></option>
				<?php }?>
			</select>
		</div>
	</div><br>
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
				<button disabled id="btnguardarusuario" class="btn btn-outline-success btn-sm">Guardar</button>
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
	$(".js-example-responsive").select2({
		width: '100%' // need to override the changed default
	});
</script>
