<?php
$dato=array(
	'cuenta'=>'active',
	'idcuenta'=>$idcuenta
);
?>
<?php $this->load->view("Layouts/Comercial",$dato)?><br>

<div class="container" style="max-width: 1400px;">
	<?php foreach($cuenta as $cnt){?>

	<div class="card">
		<div class="card-body" style="padding: 12px;">
			<div class="row">
				<div class="col-sm-4">
					<button class="btn btn-default btn-sm">
						<i style="color:dodgerblue" class="fas fa-user-circle fa-3x"></i>
					</button>
					<?php if(is_null($cnt->razon_social)){?>
						<span style="font-size: 18px;vertical-align: middle;"><?php echo $cnt->nombre." ".$cnt->apellido?></span>
					<?php }else{?>
						<span style="font-size: 18px;vertical-align: middle;"><?php echo $cnt->razon_social?></span>
					<?php }?>
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-3 text-left">
					<div id="propiet">
					<strong><?php echo $cnt->propietario?></strong><br>
					</div>
					<select class="form-control" style="font-weight: bold;border: 0px solid #ced4da;display:none" name="idpropietario">
						<option value=""><?php echo $cnt->propietario?></option>
					</select>
					<span style="font-size: 12px;color:grey">Propietario</span>
				</div>
				<div class="col-sm-2 text-right"><br>
					<button class="btn btn-danger btn-sm" style="width: 100%"><i class="fas fa-trash"></i>&nbsp;Eliminar</button>
				</div>
			</div>
		</div>
	</div><br>
	<?php }?>
	<div class="row">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-6"><button id="btn_edit" class="btn btn-default btn-sm"
													  style="vertical-align: middle;
													  	border-radius: 0.2rem;
   														border: 1px solid #dadada"><i class="fas fa-edit"></i></button>
							<span style="font-size: 14px; color:#721ea9;font-weight: bold; vertical-align: middle">
								DETALLES
							</span>
						</div>
					</div>
				</div>
				<div class="card-body" style="padding: 12px;">
					<form action="<?php echo base_url("Comercial/Cuenta/Update") ?>" method="POST">
					<input id="idcuenta" name="idcuenta" hidden value="<?php echo $idcuenta?>">
					<div class="row">
						<div class="col-sm-6 text-right">
							<span style="font-weight: bold;color:rgba(38,41,44,.64)">Nombre(s) y Apellido(s)</span>
						</div>
						<div class="col-sm-6 text-left">
							<?php if(is_null($cnt->razon_social)){?>
								<span id="label_nombre" style="font-size:100%; vertical-align: middle;"><?php echo $cnt->nombre." ".$cnt->apellido?></span>
								<input id="input_nombre" class="form-control" value="<?php echo $cnt->nombre." ".$cnt->apellido?>" style="display:none" name="nombre">
							<?php }else{?>
								<span id="label_nombre" style="font-size:100%; vertical-align: middle;"><?php echo $cnt->razon_social?></span>
								<input id="input_nombre" class="form-control" value="<?php echo $cnt->razon_social?>" style="display:none" name="razon_social">
							<?php }?>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-6 text-right">
							<span style="font-weight: bold;color:rgba(38,41,44,.64)">Tipo Documento</span>
						</div>
						<div class="col-sm-6 text-left">
							<?php foreach($tipo_documento as $td){?>
								<?php if($cnt->idtipo_documento==$td->idtipo_documento){?>
									<span id="label_tipo_documento" style="font-size:100%; vertical-align: middle;"><?php echo $td->nombre ?></span>
								<?php } ?>
							<?php }?>

							<select class="form-control" id="input_tipo_documento" style="display:none" name="idtipo_documento">
								<?php foreach($tipo_documento as $td){?>
									<?php if($cnt->idtipo_documento==$td->idtipo_documento){?>
										<option selected value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre ?></option>
									<?php }else{ ?>
										<option value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre ?></option>
									<?php }?>
								<?php }?>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-6 text-right">
							<span style="font-weight: bold;color:rgba(38,41,44,.64)">Nro Documento</span>
						</div>
						<div class="col-sm-6 text-left">
							<span id="label_documento" style="font-size:100%; vertical-align: middle;"><?php echo $cnt->nro_documento ?></span>
							<input class="form-control" style="display:none" value="<?php echo $cnt->nro_documento?>" id="input_documento" name="nro_documento">
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-6 text-right">
							<span style="font-weight: bold;color:rgba(38,41,44,.64)">Movil - Whatsapp</span>
						</div>
						<div class="col-sm-6 text-left">
							<span id="label_celular" style="font-size:100%; vertical-align: middle;"><?php echo $cnt->celular?></span>
							<input class="form-control" style="display:none" value="<?php echo $cnt->celular?>" id="input_celular" name="celular">
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-6 text-right">
							<span style="font-weight: bold;color:rgba(38,41,44,.64)">Correo Electronico</span>
						</div>
						<div class="col-sm-6 text-left">
							<span id="label_correo" style="font-size:100%; vertical-align: middle;"><?php echo $cnt->correo?></span>
							<input class="form-control" type="email" style="display:none" value="<?php echo $cnt->correo?>" id="input_correo" name="correo">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-right" style="display:none" id="div_button"><br>
							<button class="btn btn-outline-info btn-sm" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="card" style="-webkit-box-shadow: 13px 12px 18px -13px rgba(0,0,0,0.75);
				-moz-box-shadow: 13px 12px 18px -13px rgba(0,0,0,0.75);
				box-shadow: 13px 12px 18px -13px rgba(0,0,0,0.75);">
				<div class="card-body" style="padding: 12px;">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-cogs"></i>&nbsp;Informacion Avanzada</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="note-tab" data-toggle="tab" href="#note" role="tab" aria-controls="profile" aria-selected="false"><i class="far fa-sticky-note"></i>&nbsp;Notas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-calendar"></i>&nbsp;Accion</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="accordion" id="accordionExample">
											<div class="card">
												<div class="card-header" id="headingOne">
													<div class="row">
														<div class="col-sm-4">
															<a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="view_contact"><i class="fas fa-id-card"></i>&nbsp;Contactos Relacionados <?php echo $contador_contacto->contador?></a>
														</div>
														<div class="col-sm-8 text-right">
															<button class="btn btn-outline-info btn-sm newcontact">Nuevo Contacto</button>
														</div>
													</div>
												</div>
												<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
													<div class="card-body">
														<div id="view_contact">
														</div>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingTwo">
													<div class="row">
														<div class="col-sm-4">
															<a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="view_oportunity"><i class="fas fa-id-card"></i>&nbsp;Oportunidad <?php echo $contador_oportunidad->contador?></a>
														</div>
														<div class="col-sm-8 text-right">
															<button class="btn btn-outline-info btn-sm btnnewoportunity">Nueva Oportunidad</button>
														</div>
													</div>
												</div>
												<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
													<div class="card-body">
														<div id="view_oportunity">

														</div>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header" id="headingThree">
													<div class="row">
														<div class="col-sm-4">
															<i class="fas fa-print"></i>&nbsp;Contizacion (0)
														</div>
													</div>
												</div>
												<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
													<div class="card-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="note" role="tabpanel" aria-labelledby="note-tab">
							<div class="row">
								<div class="col-sm-12 text-center"><br>
									<button class="btn btn-outline-success btn-sm">Agregar Nota</button>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>

								<div class="row">
									<div class="col-sm-12 text-center">
										<button class="btn btn-outline-info btn-sm opcion" data-id="3">Añadir Accion</button>
									</div>
								</div>


						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-12 text-center">
					<h6><span class="badge badge-secondary">PLANEADO</span></h6>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<span>- No tienes acciones programadas -</span><br>
					<a href="#">+ Programar una accion</a>
				</div>
			</div><br><br><br>
			<div class="row">
				<div class="col-sm-12 text-center">
					<h6><span class="badge badge-secondary">COMPLETO</span></h6>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">

				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal_cuenta" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestion de Cuenta <?php echo $idcuenta?>" data-iziModal-icon="icon-home">
	<div id="body_cuenta">
	</div>
</div>

<div class="modal" id="modal_accion" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="accion">

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view("footer_principal")?>
<script>
    $(document).on('click', '#btn_edit', function () {
		$("#label_nombre").css("display","none");
        $("#input_nombre").css("display","block");

        $("#label_tipo_documento").css("display","none");
        $("#input_tipo_documento").css("display","block");

        $("#label_documento").css("display","none");
        $("#input_documento").css("display","block");

        $("#label_celular").css("display","none");
        $("#input_celular").css("display","block");

        $("#label_correo").css("display","none");
        $("#input_correo").css("display","block");

        $("#div_button").css("display","block");
    });

    $(document).on('click', '.opcion', function () {
        var idcuenta= $("#idcuenta").val();
        var idopcion = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Opciones/Cuenta")?>",
            data: {idopcion:idopcion,idcuenta:idcuenta},
            success: function(data) {
                $("#modal_accion").modal("show");
                $("#accion").html(data);
            }
        });
    });

	$(document).on('click', '.newcontact', function () {
		var idcuenta = $("#idcuenta").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Contacto/Create")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#modal_cuenta").iziModal('open');
				$("#body_cuenta").html(data);
			}
		});
	});



	$(document).on('click', '.view_contact', function () {
		var idcuenta = $("#idcuenta").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Contacto/Index")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#view_contact").html(data);
			}
		});
	});

	$(document).on('click', '.view_oportunity', function () {
		var idcuenta = $("#idcuenta").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Oportunidad/Index")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#view_oportunity").html(data);
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
