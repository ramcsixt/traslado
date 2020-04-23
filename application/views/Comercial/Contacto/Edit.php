<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos de Sistema</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Historial de Accesos</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<form action="<?php echo base_url("Comercial/Contacto/Update")?>"  onsubmit="return checkSubmit();" method="POST">
			<div class="container-fluid"><br>
				<div class="row">
					<div class="col-sm-12">
						<h5>Datos de Contacto</h5>
					</div>
				</div>
				<?php foreach($contacto as $cnt){?>
					<input hidden value="<?php echo $cnt->idcontacto?>" name="idcontacto">
					<input hidden value="<?php echo $cnt->idcuenta?>" name="idcuenta">
				<div class="row">
					<div class="col-sm-4">
						<label>Tipo de Documento</label>
						<select style="display:none" class="form-control" id="tipo_documento" name="idtipo_documento">
							<option value="">Seleccione Documento</option>
							<?php foreach($tipo_documento as $td){?>
								<?php if($td->nombre!="RUC"){?>
									<?php if($td->idtipo_documento==$cnt->idtipo_documento){?>
										<option selected value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
									<?php }else{?>
										<option value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
									<?php }?>
								<?php }?>
							<?php }?>
						</select>
						<strong id="label_tipdocumento" style="display:block">
							<?php foreach($tipo_documento as $td){?>
								<?php if($td->nombre!="RUC"){?>
									<?php if($td->idtipo_documento==$cnt->idtipo_documento){?>
										<?php echo $td->nombre?>
									<?php }?>
								<?php }?>
							<?php }?>
						</strong>
					</div>
					<div class="col-sm-4">
						<label>Nro. Documento</label>
						<input style="display:none" id="input_documento" class="form-control" name="nro_documento" value="<?php echo $cnt->nro_documento?>">
						<strong id="label_documento" style="display:block"><?php echo $cnt->nro_documento?></strong>
					</div>
				</div><br>
					<div class="row">
						<div class="col-sm-12">
							<label>Nombre y Apellido</label>
							<input style="display:none" id="input_nombre" class="form-control" name="nombre" value="<?php echo $cnt->nombre." ".$cnt->apellido?>">
							<strong style="display:block" id="label_nombre"><?php echo $cnt->nombre." ".$cnt->apellido?></strong>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-4">
							<label>Movil - Whatsapp</label>
							<input class="form-control" style="display:none" id="input_movil" name="celular" value="<?php echo $cnt->celular?>">
							<strong style="display:block" id="label_movil"><?php echo $cnt->celular?></strong>
						</div>
						<div class="col-sm-8">
							<label>Correo</label>
							<input class="form-control" style="display:none" id="input_correo" name="correo" value="<?php echo $cnt->correo?>">
							<strong style="display:block" id="label_correo"><?php echo $cnt->correo?></strong>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-12">
							<label>Direccion</label>
							<textarea class="form-control" style="display:none" id="input_direccion" name="direccion"><?php echo $cnt->direccion?></textarea>
							<strong style="display:block" id="label_direccion"><?php echo $cnt->direccion?></strong>
						</div>
					</div><br>
				<?php }?><br>
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-outline-success" id="btn_edit_contacto" style="width: 100%">Editar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		<div class="container-fluid"><br>
			<form action="<?php echo base_url("Comercial/Contacto/Change_pw")?>"  onsubmit="return checkSubmit();" method="post">
			<div class="row">
				<div class="col-sm-12">
					<input hidden name="idcontacto" value="<?php echo $cnt->idcontacto?>">
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="chaeckbox">
						<h5 class="form-check-label" for="exampleCheck1">Datos de Acceso - Sistema</h5>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<label>Correo Sistema</label>
					<input style="display:none" class="form-control" disabled name="correo_ingreso" value="<?php echo $cnt->correo_ingreso?>">
					<strong style="display:block"><?php echo $cnt->correo?></strong>
				</div>
				<div class="col-sm-4">
					<label>Contraseña Actual: </label>
					<strong><?php echo $cnt->password?></strong>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-4">
					<label>Contraseña</label>
					<input class="form-control" id="contrasena" disabled name="password">
				</div>
				<div class="col-sm-4">
					<label>Re Contraseña</label>
					<input class="form-control" id="contrasena_2" disabled name="re_password">
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-12">
					<button class="btn btn-outline-info" style="width: 100%" id="btn_change_pass" disabled>Cambiar Contraseña</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
<script>
	$(document).on('click', '#btn_edit_contacto', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		//Labels
		$("#label_tipdocumento").css("display","none");
		$("#label_documento").css("display","none");
		$("#label_nombre").css("display","none");
		$("#label_movil").css("display","none");
		$("#label_correo").css("display","none");
		$("#label_direccion").css("display","none");

		//Inputs
		$("#tipo_documento").css("display","block");
		$("#input_documento").css("display","block");
		$("#input_nombre").css("display","block");
		$("#input_movil").css("display","block");
		$("#input_correo").css("display","block");
		$("#input_direccion").css("display","block");

		//Button
		$("#btn_edit_contacto").removeClass("btn-outline-success");
		$("#btn_edit_contacto").addClass("btn-outline-info");
		$("#btn_edit_contacto").html('<i class="fas fa-save"></i>&nbsp;Guardar');
		$("#btn_edit_contacto").prop('type','submit');
		$("#btn_edit_contacto").attr("id","btn_save_contacto");

	});


</script>
<script>
    $(document).on('click', '#chaeckbox', function (e) {
        if ($(this).prop('checked')) {
			$("#contrasena").prop("disabled", false);
			$("#contrasena_2").prop("disabled", false);
			$("#btn_change_pass").prop("disabled",false);
        } else {
            $("#acceso").prop("disabled", true);
			$("#acceso").prop("disabled", true);
			$("#btn_change_pass").prop("disabled",true);
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
		document.getElementById("btn_change_pass").value = "Cambiando Password...";
		document.getElementById("btn_change_pass").disabled = true;
		return true;
	}
</script>

