<div class="container-fluid">
	<h4>¿Realmente desea eliminar del sistema los usuarios seleccionados?</h4>
	<div class="row">
		<div class="col-sm-12 text-right"><br>
			<button class="btn btn-outline-danger btn-sm btndestroyusers">Eliminar</button>
		</div>
	</div>
</div>
<script>
	$(document).on('click', '.btndestroyusers', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		var formulario = new FormData($("#form_masivo")[0]);
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Configuracion/Usuario/Destroy_massive")?>',
			contentType: false,
			processData: false,
			data: formulario,
			success: function(data) {
				if(data!=0){
					location.reload();
				}else{
					alert("Error en la funcion Masiva");
				}
			}
		});
	});
</script>
