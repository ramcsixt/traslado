<style>
	.btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active, .show > .btn-outline-secondary.dropdown-toggle {
		color: #409aea;
		background-color: #87c6ff42;
		border-color: #409aea;
	}
	.btn-outline-secondary:hover {
		color: #409aea;
		background-color: #87c6ff42;
		border-color: #409aea;
	}
	.btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus, .show > .btn-outline-secondary.dropdown-toggle:focus {
		box-shadow: 0 0 0 0.2rem rgb(195, 224, 251);
	}
	.btn-outline-secondary:focus, .btn-outline-secondary.focus {
		box-shadow: 0 0 0 0.2rem rgb(195, 224, 251);
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12">
				<input class="form-control input_name_accion" style="font-size: 22px" placeholder="Llamada">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="btn-group btn-group-toggle" data-toggle="buttons" style="width: 100%">
					<label class="btn btn-outline-secondary btn-sm active accionet" data-id="1">
						<input type="radio" name="options" value="1" id="option1" checked><i class="fas fa-phone"></i>&nbsp;Llamada
					</label>
					<label class="btn btn-outline-secondary btn-sm accionet" data-id="2">
						<input type="radio" name="options" value="2" id="option2" checked><i class="fas fa-users"></i>&nbsp;Reunion
					</label>
					<label class="btn btn-outline-secondary btn-sm accionet" data-id="3">
						<input type="radio" name="options" value="3" id="option3" checked><i class="fas fa-clock"></i>&nbsp;Seguimiento
					</label>
					<label class="btn btn-outline-secondary btn-sm accionet" data-id="4">
						<input type="radio" name="options" value="4" id="option4" checked><i class="far fa-paper-plane"></i>&nbsp;Correo Electronico
					</label>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-4">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-calendar"></i></span>
					</div>
				<input class="form-control" name="fecha_accion" value="<?php echo date("Y-m-d")?>" type="date">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-clock"></i></span>
					</div>
				<input class="form-control" name="hora_in" type="time">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-clock"></i></span>
					</div>
				<input class="form-control" name="hora_in" type="time">
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<input class="form-control" name="ubicacion" placeholder="Ingrese Ubicacion de Reunion">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<input class="form-control" name="descripcion" placeholder="Ingrese una breve Descripcion">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-5">
				<select class="form-control" name="disponibilidad">
					<option value="">Seleccione Disponibilidad</option>
					<option value="1">Libre</option>
					<option value="2">Ocupado</option>
				</select>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<textarea class="form-control" name="comentarios" rows="3" placeholder="Notas..."></textarea>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12 text-right">
				<button class="btn btn-secondary btn-sm cancel_accion">Cancelar</button>
				<button class="btn btn-success btn-sm">Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).on('click', '.cancel_accion', function () {
        $("#modal_accion").modal("hide");
    });

    $(document).on('click', '.accionet', function () {

        var accionet = $(this).attr("data-id");
		if(accionet==1){
			$(".input_name_accion").attr("placeholder", "Llamada");
		}else if(accionet==2){
            $(".input_name_accion").attr("placeholder", "Reunion");
		}else if(accionet==3){
            $(".input_name_accion").attr("placeholder", "Seguimiento");
        }else if(accionet==4){
            $(".input_name_accion").attr("placeholder", "Correo Electronico");
        }
    });
</script>
