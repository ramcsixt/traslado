<div class="container-fluid">
	<form action="<?php echo base_url("Comercial/Cuenta/Destroy")?>" method="POST" onsubmit="return checkSubmit();">
		<input name="idcuenta" value="<?php echo $idcuenta?>" hidden>
		<div class="row">
			<div class="col-sm-12 text-center">
				<h5>¿Realmente desea eliminar la Cuenta?</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
				<button class="btn btn-dark btn-sm" id="eliminar" type="submit">Confirmar</button>&nbsp;<button class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
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
