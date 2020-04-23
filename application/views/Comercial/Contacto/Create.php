<div class="container-fluid">
	<?php //$idcuenta=""; ?>
	<form action="<?php echo base_url("Comercial/Contacto/Store") ?>"  onsubmit="return checkSubmit();" method="POST">
		<?php if ($idcuenta != "") { ?>
			<input hidden value="<?php echo $idcuenta ?>" name="idcuenta">
		<?php } ?>
		<div class="row">
			<div class="col-sm-8">
				<img src="<?php echo base_url("public/img/logo/sixt.png") ?>"
					 style="vertical-align: middle; width: 15%">
			</div>

			<?php if ($idcuenta != "") { ?>
				<div class="col-sm-4 text-right">
					<?php foreach ($cuenta as $cnt) { ?>
						<?php if ($cnt->idcuenta == $idcuenta) { ?>
							<span class="badge badge-success"
								  style="font-size: 16px"><?php echo $cnt->nombre . "" . $cnt->razon_social ?></span>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="col-sm-4">
					<label>Cuenta (*)</label>
					<select class="form-control" name="idcuenta">
						<option value="">Seleccione Cuenta...</option>
						<?php foreach ($cuenta as $cnt) { ?>
							<option
								value="<?php echo $cnt->idcuenta ?>"><?php echo $cnt->nombre . "" . $cnt->razon_social ?></option>
						<?php } ?>
					</select>
				</div>
			<?php } ?>

		</div>
		<br>
		<div id="input_nombre">
			<h6>Informacion Personal</h6>
			<div class="row">
				<div class="col-sm-3">
					<label>Tipo de Documento</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-passport"></i></span>
						</div>
						<select class="form-control" id="tipo_documento" name="idtipo_documento">
							<option value="">Seleccione Documento</option>
							<?php foreach ($tipo_documento as $td) { ?>
								<?php if ($td->nombre != "RUC") { ?>
									<option
										value="<?php echo $td->idtipo_documento ?>"><?php echo $td->nombre ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label>Nro. Documento</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
						</div>
						<input autocomplete="off" class="form-control" name="nro_documento">
					</div>
				</div>
				<div class="col-sm-6">
					<label>Nombre (*)</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-alt"></i></span>
						</div>
						<input onkeyup="mayus(this);" autocomplete="off" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre...."
							   required>
					</div>
				</div>
				<div class="col-sm-3">
					<label>F. Nacimiento</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
						</div>
						<input autocomplete="off" class="form-control" id="fecha_nacimiento" name="f_nacimiento">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<label>Direccion</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-street-view"></i></span>
					</div>
					<textarea autocomplete="off" class="form-control" name="direccion" type="email" id="direccion"
							  placeholder="Ingrese direccion....." required></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<label>Movil - Whatsapp (*)</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
					</div>
					<input autocomplete="off" class="form-control" id="celular" name="celular"
						   placeholder="Ingrese Movil - Whatsapp...">
				</div>
			</div>
			<div class="col-sm-4">
				<label>Sexo (*)</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-restroom"></i></span>
					</div>
					<select class="form-control" name="idsexo">
						<option value="">Seleccione Sexo...</option>
						<?php foreach ($sexo as $sx) { ?>
							<option value="<?php echo $sx->idsexo ?>"><?php echo $sx->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<br>
		<h6>Informacion Laboral</h6>

		<div class="row">
			<div class="col-sm-3">
				<label>Cargo en la Organizacion</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-building"></i></span>
					</div>
					<select class="form-control" name="idcargo" id="cargo">
						<option value="">Seleccione Cargo</option>
						<?php foreach ($cargo as $cg) { ?>
							<option value="<?php echo $cg->idcargo ?>"><?php echo $cg->nombre ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-sm-9">
				<label>Correo electronico (*)</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
					</div>
					<input autocomplete="off" class="form-control" type="email" name="correo"
						   placeholder="Ingrese correo electronico...">
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<button class="btn btn-outline-primary" id="btn_save_contacto" style="width: 100%">Guardar</button>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function () {
		$("#tipo_documento").change(function () {
			var idtipo_documento = $('select[id=tipo_documento]').val();
			if (idtipo_documento != "") {
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url("Comercial/Cuenta/Option_td")?>',
					data: {idtipo_documento: idtipo_documento},
					success: function (data) {
						var dato = JSON.parse(data);
						$("#input_nombre").html(dato.in);
						$("#div_nro_documento").html(dato.documento);
						$("#f_input").html(dato.f_input);
					}
				})
			} else {
				$("#div_nro_documento").html("<input class='form-control' disabled>");
			}
		});
	});
</script>
<script>
	function mayus(e) {
		e.value = e.value.toUpperCase();
	}
	$("#nombre").bind('keypress', function(event) {
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
	var start = new Lightpick({
		field: document.getElementById('fecha_nacimiento'),
		format: "YYYY-MM-DD",
		dropdowns:{
			years: {
				min: 1970,
				max: 2009
			},
			months: true,
		}
	});
	var statSend = false;
	function checkSubmit() {
		if (!statSend) {
			statSend = true;
			return true;
		} else {
			return false;
		}
	}

	function checkSubmit() {
		$("#preloader").modal("show");
		document.getElementById("btn_save_contacto").value = "Almacenando...";
		document.getElementById("btn_save_contacto").disabled = true;
		return true;
	}
</script>
