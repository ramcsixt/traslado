<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning new p-4">
				<strong>Notificacion</strong>
				<p class="mb-0"><span id="text_notify">Seleccione una Accion ha Realizar</span></p>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url("Configuracion/Usuario/Store_rol")?>" method="POST">
		<input value="<?php echo $idusuario?>" name="idusuario" hidden>
		<input name="validator" id="validator" hidden>
		<div class="row">
			<div class="col-sm-6">
				<input class="form-check-input" name="list_mod" type="radio" value="1" onchange="habilitar(this.value);"><label class="form-check-label">Modulos Disponibles(*)</label>
				<select disabled name="modulos[]" id="increment"  class="js-example-responsive" multiple="multiple" required>
					<?php foreach($rol as $rl){?>
						<option value="<?php echo $rl->idmodulo?>"><?php echo $rl->nombre?></option>
					<?php }?>
				</select>
			</div>
			<div class="col-sm-6">
				<input class="form-check-input" name="list_mod" type="radio" value="2" onchange="habilitar(this.value);"><label class="form-check-label">Modulos Seleccionados(*)</label>
				<select disabled name="modulos[]" id="decrement"  class="js-example-responsive" multiple="multiple" required>
					<?php foreach($modulo as $md){?>
						<option value="<?php echo $md->idrol?>"><?php echo $md->nombre?></option>
					<?php }?>
				</select>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12 text-right"><br>
				<button disabled id="btnguardarusuario" class="btn btn-outline-success btn-sm">Guardar</button>
			</div>
		</div>
	</form>
</div>
<script>
	function habilitar(value)
	{
		if(value=="1")
		{
			$("#increment").prop('disabled', false);
			$("#decrement").prop('disabled', true);
			$("#btnguardarusuario").prop('disabled', false);
			$("#validator").val(1);
			$("#text_notify").html("Esta accion le permite agregar mas modulos al usuario");
			$("#btnguardarusuario").text("Agregar Modulos");
			$("#btnguardarusuario").removeClass('btn-outline-danger');
			$("#btnguardarusuario").addClass('btn-outline-success');
		}else if(value=="2"){
			// deshabilitamos
			$("#decrement").prop('disabled', false);
			$("#increment").prop('disabled', true);
			$("#btnguardarusuario").prop('disabled', false);
			$("#validator").val(2);
			$("#text_notify").html("Esta accion le eliminar modulos al usuario");
			$("#btnguardarusuario").text("Eliminar Modulos");
			$("#btnguardarusuario").removeClass('btn-outline-success');
			$("#btnguardarusuario").addClass('btn-outline-danger');
		}
	}
	$(".js-example-responsive").select2({
		width: '100%' // need to override the changed default
	});
</script>
