<div class="row">
	<div class="col-sm-4">
		<label>Tipo de Documento</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fas fa-passport"></i></span>
			</div>
		<select class="form-control" id="tipo_documento" name="idtipo_documento" required>
			<option value="">Seleccione Tipo Documento</option>
			<?php foreach($tipo_documento as $td){?>
				<?php if($td->idtipo_documento==2){?>
					<option value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
				<?php }?>
			<?php }?>
		</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<label>Nro. RUC</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
			</div>
			<input class="form-control" placeholder="Ingrese Nro. de RUC" maxlength="11" name="nro_documento">
		</div>
	</div>
	<div class="col-sm-9">
		<label>Razon Social (*)</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-alt"></i></span>
			</div>
		<input onkeyup="mayus(this);" class="form-control" name="razon_social"  placeholder="Ingrese Razon Social...." required>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<label>Direccion (*)</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fas fa-street-view"></i></span>
			</div>
		<textarea class="form-control" name="direccion" type="email" id="direccion" placeholder="Ingrese direccion....." required></textarea>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<label>Movil - Whatsapp (*)</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
			</div>
		<input class="form-control" id="celular" name="celular" placeholder="Ingrese Movil - Whatsapp...">
		</div>
	</div>
	<div class="col-sm-9">
		<label>Correo electronico (*)</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
			</div>
		<input class="form-control" type="email" name="correo" placeholder="Ingrese Correo electronico...">
		</div>
	</div>
</div><br>
<div class="row">
	<div class="col-sm-12">
		<button class="btn btn-outline-primary btn-sm" style="width: 100%">Grabar</button>
	</div>
</div>
<script>
	function mayus(e) {
		e.value = e.value.toUpperCase();
	}
	$("#razon_social").bind('keypress', function(event) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
	$("#celular").bind('keypress', function(event) {
		var regex = new RegExp("^[0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});

</script>
