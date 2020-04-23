<div class="container-fluid">
	<form action="<?php echo base_url("Comercial/Contacto/Destroy")?>"  onsubmit="return checkSubmit();" method="POST">
	<div class="row">
		<div class="col-sm-12">
			<h2>¿Realmente desea eliminar el Contacto?</h2>
			<input hidden name="idcontacto" value="<?php echo $idcontacto?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<button class="btn btn-outline-danger" id="eliminar"><i class="fas fa-trash"></i>&nbsp;Eliminar</button>&nbsp;
			<button class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-close"></i>&nbsp;Cancelar</button>
		</div>
	</div>
	</form>
</div>
<script>
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
		$("#confirmation").modal("hide");
		$("#preloader").modal("show");
		document.getElementById("eliminar").value = "Eliminando...";
		document.getElementById("eliminar").disabled = true;
		return true;
	}
</script>
