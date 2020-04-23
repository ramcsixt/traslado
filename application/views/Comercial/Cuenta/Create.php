<div class="container-fluid">
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
	<form action="<?php echo base_url("Comercial/Cuenta/Store")?>" method="POST">
		<div class="row">
			<div class="col-sm-8">
				<img src="<?php echo base_url("public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 25%">
			</div>
			<div class="col-sm-4">
				<label>Propietario (*)</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-alt"></i></span>
					</div>
					<select class="form-control" required name="idpropietario">
						<option value="">Seleccionar Propietario...</option>
						<option value="1">SIXT PERU</option>
					</select>
				</div>
			</div>
		</div>
		<h6>Tipo de Cuenta</h6>
		<div class="row">
			<div class="col-sm-12">
				<div class="btn-group btn-group-toggle" data-toggle="buttons" style="width: 100%">
					<?php foreach($tipo_cuenta as $tip_cnt){?>
					<label class="btn btn-outline-secondary btn-sm">
						<input type="radio" name="idtipo_cuenta" value="<?php echo $tip_cnt->idtipo_cuenta?>" id="option<?php echo $tip_cnt->idtipo_cuenta?>"><?php echo $tip_cnt->nombre?>
					</label>
					<?php }?>
				</div>
			</div>
		</div><br>
		<h6>Datos de Cuenta</h6>
		<div id="view_cuenta">
			<button class="btn btn-outline-primary btn-sm" disabled >Grabar</button>
		</div>
	</form>
</div>
<script>
	$(document).ready(function()
	{
		$("input[name=idtipo_cuenta]").change(function () {
			var idtipo_cuenta = $(this).val();
			$("#preloader").modal("show");
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("Comercial/Cuenta/View_create")?>',
				data: {idtipo_cuenta:idtipo_cuenta},
				success: function(data) {
					$("#preloader").modal("hide");
					$("#view_cuenta").html(data);
				}
			})
		});
	});
</script>
