<div class="row">
	<?php
	foreach($resultado as $rs){
		?>
		<?php if($rs->contador==0){?>
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body text-center">
						<h3>No Existe ninguna cuenta similar a la busqueda :(</h3>
						Si desea crear un prospecto de <a href="#" class="create_prospect">Click Aqui</a><br>
						Tambien puede ingresar el correo del prospecto para que el sistema envie el lnik automaticamente.
						<div class="input-group">
							<input class="form-control" id="correo" placeholder="ingrese correo de Prospecto">
							<div class="input-group-append">
								<button class="btn btn-outline-info btn-sm" type="button" id="btnsendmail">Enviar Correo</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } else{?>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<a href="<?php echo base_url("Comercial/Cuenta/View/".$rs->idcuenta)?>"><?php echo $rs->contador." ".$rs->nombre." ".$rs->apellido?></a><br>
						<strong>Telefonos: </strong><?php echo $rs->telefono." ".$rs->celular?>
					</div>
				</div><br>
			</div>
		<?php }?>
	<?php } ?>
</div>
<!-- Modal structure -->
<div id="modal_prospecto" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestion de Prospecto" data-iziModal-icon="icon-home">
	<div id="body_prospecto">
	</div>
</div>
<script>
	$(document).on('click', '#btnsendmail', function () {
		var correo = $("#correo").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Prospecto/Mailer")?>",
			data: {correo:correo},
			success: function(data) {
				alert(data);
				if(data==1){
					alert("Se Envio el correo correctamente");
				}else{
					alert("No se logro enviar el correo");
				}
			}
		});
	});

	$(document).on('click', '.create_prospect', function () {
		$("#resultado_modal").modal("hide");
	});

	$(document).on('click', '.create_prospect', function () {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Prospecto/Create")?>",
			data: {},
			success: function(data) {
				$("#modal_prospecto").iziModal('open');
				$("#body_prospecto").html(data);
			}
		});
	});

	$(".iziModal").iziModal({
		width: 900,
		radius: 5,
		padding: 20,
		group: 'products',
		loop: true
	});
</script>
