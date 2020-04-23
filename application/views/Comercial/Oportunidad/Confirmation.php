<div class="container-fluid">
	<form action="<?php echo base_url("Comercial/Oportunidad/Conf_oportunidad")?>" method="POST" onsubmit="return checkSubmit();">
		<input name="idoportunidad" value="<?php echo $idoportunidad?>" hidden>
		<div class="row">
			<div class="col-sm-12 text-center">
				<h5>¿Realmente atendio la oportunidad?</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
				<button class="btn btn-dark btn-sm" id="confirmar" type="submit">Confirmar</button>&nbsp;<button class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
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
		document.getElementById("confirmar").value = "Confirmando...";
		document.getElementById("confirmar").disabled = true;
		return true;
	}
</script>
