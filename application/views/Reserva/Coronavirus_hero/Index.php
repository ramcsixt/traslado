<?php $this->load->view("Reserva/Coronavirus_hero/Head")?>
<style>
	#logo {
		width:100%;

		content:url('<?php echo base_url("Public/img/landing/LANDING.png")?>');

	}

	//Código para Móvil
	@media screen and (min-width: 100px) and (max-width: 700px) {
		#logo {
			width:100%;

			content:url('<?php echo base_url("Public/img/landing/LANDING_2.png")?>');

		}
	}

	// Código para Tablets
	@media screen and (min-width: 700px) and (max-width: 1024px) {
		#logo {
			width:100%;

			content:url('<?php echo base_url("Public/img/landing/LANDING_2.png")?>');

		}
	}

	.form-control {
		display: block;
		width: 100%;
		height: calc(2.5em + .75rem + 2px);
		padding: .375rem .75rem;
		font-size: 12px;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #f1f1f1;
		background-clip: padding-box;
		border: 0px solid #ced4da;
		/* border-bottom: 1.5px solid #cacaca; */
		border-radius: 0px;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
	.portada{
		background: url('<?php echo base_url("Public/img/landing/LANDING.png")?>') ;
		position: absolute;
		background-size: cover;
		min-width: 50px;
		min-height: 100px;
		left: 50%;
		max-height: 450px;
		text-align: center;
		width: 68%;
		height: 100%;
		margin-top: -35px;
		margin-left: -34%;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;

	}
	.input-group-text {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		padding: .375rem .75rem;
		margin-bottom: 0;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		text-align: center;
		white-space: nowrap;
		background-color: #f1f1f1;
		border: 0px solid #ced4da;
		border-radius: .25rem;
	}
	.btn-warning {
		color: #212529;
		background-color: #f58634;
		border-color: #f58634;
	}
</style>

<main role="main">
	<section style="position: relative;
    width: 100%;
">
		<div class="container">
			<img id="logo">
		</div>
	</section>
	<section style="position: absolute;
    left: 0%;
    width: 100%;
    ">
		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-12">
					<div class="card">
						<div class="card-body text-left">
							<form class="form_landing"  onsubmit="return checkSubmit();"  action="<?php echo base_url("Reservas/Store")?>" method="POST">
								<input hidden value="<?php echo $utm_source?>" name="utm_name">
								<input hidden value="<?php echo $utm_campaing?>" name="idlanding">
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<label><strong>NOMBRE Y APELLIDO</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user fa-xs"></i></span>
											</div>
											<input class="form-control" required autocomplete="off" name="nombre" placeholder="Ingrese Nombre y Apellido...">
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label><strong>MOVIL - WHATSAPP</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-phone fa-xs"></i></span>
											</div>
											<input class="form-control" required autocomplete="off" name="movil" placeholder="Ingrese Movil - Whatsapp...">
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label><strong>CORREO</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope fa-xs"></i></span>
											</div>
											<input class="form-control" required autocomplete="off" name="correo" placeholder="Ingrese Correo Electrónico...">
										</div>
									</div>
								</div><br>

								<div class="row">
									<div class="col-sm-12 col-md-12">
										<label><strong>PICK-UP LOCATION</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-map-marker-alt fa-xs"></i></span>
											</div>
											<select class="form-control" required name="idsede">
												<option value="">Seleccione Pick-Up Location...</option>
												<option value="42188">Lima - Miraflores</option>
												<option value="42260">Piura</option>
												<option value="42260">Cuzco</option>
											</select>
										</div>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<label><strong>FECHA PICK-UP</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-calendar-alt fa-xs"></i></span>
											</div>
											<input id="datepickup" required placeholder="Seleccione Fecha Pick-Up..." autocomplete="off" class="form-control" name="fecha_recojo">
										</div>
									</div>
									<div class="col-sm-12 col-md-2">
										<label><strong>TIME PICK-UP</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock fa-xs"></i></span>
											</div>
											<select class="form-control" name="hora_recojo" id="hora_recojo">
												<?php foreach($hora as $hr){?>
													<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label><strong>FECHA DROP-OFF</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-calendar-alt fa-xs"></i></span>
											</div>
										<input required class="form-control" placeholder="Seleccione Fecha Drop-Off..." id="datedropoff" name="fecha_entrega"  autocomplete="off">
										</div>
									</div>
									<div class="col-sm-12 col-md-2">
										<label><strong>TIME DROP-OFF</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-clock fa-xs"></i></span>
											</div>
										<select class="form-control" name="hora_entrega" id="hora_entrega">
											<?php foreach($hora as $hr){?>
												<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
											<?php }?>
										</select>
										</div>
									</div>

								</div><br>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<label><strong>COMENTARIO</strong></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-edit fa-xs"></i></span>
											</div>
											<input class="form-control" required autocomplete="off" name="texto" placeholder="Ingrese comentarios adicionales....">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group form-check"><br><br>
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Aceptar terminos y condiciones</label>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label></label>
										<button class="btn btn-warning btn-lg" id="btn_guardar" style="width: 100%">
											<span style="color: white">SOLICITAR AUTO</span>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div><br><br>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-10 text-center">
					<label style="color:orange; font-size: 20px"><strong>Alquiler de coches en 105 paises en todo el mundoYaris</strong></label>
				</div>
				<div class="col-1"></div>
			</div><br><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3 col-sm-12 text-center">
					<img src="<?php echo base_url("Public/img/landing/auto2.png")?>" style="width: 180px"><br><br>
					<strong style="font-size: 14px">Toyota Etios</strong><br>
					<label style="color:orange">Disponible Ahora</label>
				</div>
				<div class="col-md-4 col-sm-12 text-center">
					<img src="<?php echo base_url("Public/img/landing/auto1.png")?>" style="width: 180px"><br><br>
					<strong style="font-size: 14px">Toyota Yaris</strong><br>
					<label style="color:orange">Disponible Ahora</label>
				</div>
				<div class="col-md-3 col-sm-12 text-center">
					<img src="<?php echo base_url("Public/img/landing/auto3.png")?>" style="width: 180px"><br><br>
					<strong style="font-size: 14px">Toyota Rav4</strong><br>
					<label style="color:orange">Disponible Ahora</label>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
</main>

<?php $this->load->view("Reserva/Coronavirus_hero/Footer")?>
<!-- Modal -->
<div class="modal fade" id="preloader" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="background-color: #fff0; color:white; border: 1px solid rgba(0, 0, 0, 0);">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="spinner-border" style="width: 3rem; height: 3rem;color:#f58634" role="status">
							<span class="sr-only">Loading...</span>
						</div><br>
						<img src="<?php echo base_url("Public/img/landing/logo_sixt.png")?>" width="80px"><br>
						<span style="font-size: 14px">Enviando datos....</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    $('#hora_recojo').change(function(){
        var hora_recojo = $("#hora_recojo").val();
        $("#hora_entrega option[value='"+hora_recojo+"']").attr("selected",true);
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
        document.getElementById("btn_guardar").value = "Enviando...";
        document.getElementById("btn_guardar").disabled = true;
        return true;
    }

    var picker = new Lightpick({
        field: document.getElementById('datepickup'),
        secondField: document.getElementById('datedropoff'),
        singleDate: false,
        format: "YYYY-MM-DD",
        onSelect: function(start, end){
            var str = '';
            str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
            str += end ? end.format('Do MMMM YYYY') : '...';

        }
    });

</script>
