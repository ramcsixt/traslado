<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<?php if($estado_prospecto==4){?>
			<h6>¿Realmente desea Cancelar el Prospecto?</h6>
			<?php }else{?>
			<h6>¿Realmente desea Convertir a Cuenta el Prospecto?</h6>
				<?php foreach($cuenta as $cnt){
					$contador=$cnt->contador;
					if($contador!=0){
					?>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
							<strong>Cuenta: </strong><br>
							<span style="font-size: 18px">
								<?php
								if($cnt->nombre!=""){
									echo $cnt->nombre;
								}else{
									echo "Sin Nombre";
								}
								?>
							</span><br>
							<strong>Correo: </strong><br><span><?php echo $cnt->correo?></span><br>
							<strong>Movil - Whatsapp: </strong><br><span><?php echo $cnt->celular?></span>
							</div>
							<div class="col-sm-6 text-right">
								<button class="btn btn-info btn-sm enlazar" data-id="<?php echo $cnt->idcuenta?>"><i class="fas fa-exchange-alt"></i>&nbsp;Enlazar Oportunidad</button>
							</div>
						</div>
					</div>
				</div><br>
					<?php }?>
				<?php }?>
			<?php }?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<?php if($estado_prospecto==4){?>
			<button class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-close"></i>&nbsp;Cerrar</button>
			<button class="btn btn-dark btn-sm" form="form_prospecto"><i class="fas fa-save"></i>&nbsp;Guardar</button>
			<?php }else{?>
				<button class="btn btn-dark btn-sm" form="form_prospecto"><i class="fas fa-save"></i>&nbsp;Nueva Cuenta</button>
				<button class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i>&nbsp;Cerrar</button>
			<?php }?>
		</div>
	</div>
</div>
<script>
    $(document).on('click', '.enlazar', function (e) {
        var idcuenta = $(this).attr("data-id");
        var data = new FormData($("#form_prospecto")[0]);
        $("#confirmation").modal("hide");
        $("#preloader").modal("show");
        e.preventDefault();
        e.stopImmediatePropagation();
         //Creamos los datos a enviar con el formulario
        $.ajax({
            url: '<?php echo base_url("Comercial/Prospecto/Enlazar/")?>'+idcuenta, //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function (data) {
				if(data!=""){
                    $(location).attr('href','<?php echo base_url("Comercial/Cuenta")?>');
				}
            }
        });
    });
</script>
