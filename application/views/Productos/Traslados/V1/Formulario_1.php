<form action="<?php echo base_url("Traslados/Store")?>" id="formulario_traslados"  method="POST">
	<div id="smartwizard">

		<ul>
			<li><a href="#step-1"><i class="fas fa-user fa-1x"></i><br/><small>Pasajero</small></a></li>
			<li><a href="#step-2"><i class="fas fa-compass fa-1x"></i><br/><small>Traslado</small></a></li>
			<li><a href="#step-3"><i class="fas fa-calendar fa-1x"></i><br/><small>Fechas</small></a></li>
			<li><a href="#step-4"><i class="fas fa-credit-card fa-1x"></i><br/><small>Pago</small></a></li>
		</ul>

		<div>
			<div id="step-1" class="">
				<div class="row">
					<div class="col-sm-12">
						<H6>INFORMACION PERSONAL</H6>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"
										  style="background-color: white;"><i
											class="fas fa-user" style="color: #000000"></i></span>
									</div>
									<input onkeyup="mayus(this);" autocomplete="off" required
										   class="form-control traslados-1" id="apellido"
										   name="nombre_apellido"
										   placeholder="Nombre y Apellido (*)">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"
										  style="background-color: white;"><i
											class="fab fa-whatsapp"
											style="color: #000000"></i></span>
									</div>
									<input class="form-control traslados-1" autocomplete="off" required
										   id="telf_movil" name="telf_movil"
										   placeholder="Movil - Whatsapp (*)">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"
										  style="background-color: white;"><i
											class="fas fa-at"
											style="color: #000000"></i></span>
									</div>
									<input class="form-control traslados-1" autocomplete="off" required
										   type="email" name="correo"
										   placeholder="Correo Electronico (*)">
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="condiciones" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">Si Continúas aceptas nuestra <ins>Politica de privacidad</ins> y las <ins>Condiciones de uso general.</ins></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="step-2" class="">
				<div class="row">
					<div class="col-sm-12">
						<H6>CALCULAR TARIFA</H6>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"
											  style="background-color: white;"><i
												class="far fa-compass"
												style="color: #000000"></i></span>
									</div>
									<input class="form-control controls"
										   placeholder="Lugar de Origen (*)" id="origin-input"
										   name="origen">
									<div class="input-group-append">
										<button type="button"
												class="btn btn-geo btn-secondary-dark btn-sm"
												style="border-radius: 0px;"><i
												class="fas fa-map-marker-alt"
												href='javascript:;'
												onclick="get_my_location();"></i></button>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"
											  style="background-color: white;"><i
												class="far fa-compass"
												style="color: #000000"></i></span>
									</div>
									<input class="form-control controls"
										   placeholder="Lugar de Destino (*)"
										   id="destination-input" name="destino">
								</div>
							</div>
						</div>
						<BR>
						<div class="row">
							<div class="col-sm-12">
								<div id="map"></div>
								<div id="duration"><span class="badge badge-success"
														 style="font-size: 14px">Duración: </span>
								</div>
								<div id="distance"><span class="badge badge-success"
														 style="font-size: 14px">Distancia: </span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="step-3" class="">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input"
										   id="customSwitch1" name="switch_recurrente">
									<label class="custom-control-label" for="customSwitch1"><h6>
											SERVICIO RECURRENTE</h6></label>
								</div>
							</div>
						</div>
						<br>
						<div id="calendar" style="display: none">
							<div class="row">
								<div class="col-md-2 col-lg-2"></div>
								<div class="col-sm-12 col-md-8 col-lg-8">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"
												  style="background-color: white;"><i
													class="fas fa-clock"
													style="color: #000000"></i></span>
										</div>
										<input class="form-control date_recurrent" autocomplete="off"
											   type="text" required
											   disabled
											   id="hora_origen_recurrente"
											   name="hora_origen">
									</div>
								</div>
								<div class="col-md-2 col-lg-2"></div>
							</div><br>
							<div class="row">
								<div class="col-sm-12 text-center">
									<div class="datepicker-here" id="date_origen" style="width: 100%"
										 data-language='es'></div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-12">
									<input style="width: 100%" type="text"
										   name="fecha_origen"
										   id="input_recurrent"
										   disabled
										   class="form-control date_recurrent" data-role="tagsinput"
										   autocomplete="off" required>

								</div>
							</div>

						</div>
						<div id="calendar_ret">
							<div class="row">
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"
												  style="background-color: white;"><i
													class="fas fa-calendar-alt"
													style="color: #000000"></i></span>
										</div>
										<input class="form-control date_origen" disabled id="fecha_origen"
											   autocomplete="off" required name="fecha_origen">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"
												  style="background-color: white;"><i
													class="fas fa-clock"
													style="color: #000000"></i></span>
										</div>
										<input disabled class="form-control date_origen" id="hora_origen"
											   autocomplete="off"
											   required
											   name="hora_origen">
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input"
											   id="customSwitch2" name="switch_retorno" disabled>
										<label class="custom-control-label" for="customSwitch2"
											   style="font-size: 16px"><H6>SERVICIO RETORNO</H6>
										</label>
									</div>
								</div>
							</div>
							<div id="return_date" style="display:none">
								<div class="row">
									<div class="col-sm-6">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"
													  style="background-color: white;"><i
														class="fas fa-calendar-alt"
														style="color: #000000"></i></span>
											</div>
											<input class="form-control return_date" id="fecha_recojo"
												   autocomplete="off" disabled required
												   name="fecha_recojo">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"
													  style="background-color: white;"><i
														class="fas fa-clock"
														style="color: #000000"></i></span>
											</div>
											<input class="form-control return_date" autocomplete="off"
												   type="time" id="hora_recojo" disabled required
												   name="hora_recojo">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<BR>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"
									  style="background-color: white;"><i
										class="fas fa-money-bill"
										style="color: #000000"></i></span>
							</div>
							<input class="form-control controls" disabled
								   placeholder="Tarifa Total de Traslado"
								   id="tarifa_global">
						</div>
					</div>
				</div>
				<input hidden id="precio_total" name="precio_total">
				<input hidden id="precio_distancia" name="precio_distancia">
				<input hidden id="desc1" name="descuento1">
				<input hidden id="precio_descuento1">
				<input hidden id="descuento2" name="descuento2">
				<br>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"
									  style="background-color: white;"><i
										class="far fa-comment-dots"
										style="color: #000000"></i></span>
							</div>
							<input required class="form-control" id="obs" name="obs"
								   placeholder="Observaciones Adicionales" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div id="step-4" class="">
				<div class="row">
					<div class="col-sm-12 text-left">
						<h6><strng>METODO DE PAGO</strng></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input"
										   id="customSwitch3">
									<label class="custom-control-label" for="customSwitch3"
										   style="font-size: 16px"><H6>PAGO CON TARJETA DE CREDITO/DEBITO</H6>
									</label>
								</div><br>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input"
										   id="customSwitch4">
									<label class="custom-control-label" for="customSwitch4"
										   style="font-size: 16px"><H6>PAGO EN EFECTIVO</H6>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-outline-success btn-lg" id="btn_formulario" type="button">SOLICITAR TRASLADO</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="display: none">
		<div id="mode-selector" class="controls">
			<input type="radio" name="type" id="changemode-walking">
			<label for="changemode-walking">Caminando</label>

			<input type="radio" name="type" id="changemode-transit">
			<label for="changemode-transit">tránsito</label>

			<input type="radio" name="type" id="changemode-driving" checked="checked">
			<label for="changemode-driving">Conducir</label>
		</div>
	</div>
	<?php
	date_default_timezone_set("America/Lima");
	?>
	<input hidden id="fecha_actual" value="<?php echo date("d/m/Y") ?>">
	<input hidden id="hora_actual" value="<?php echo date("H:i") ?>">
</form>
<div class="row">
	<div class="col-sm-3 col-lg-6 col-md-6 text-left" style="width: 50%">
		<button class="btn btn-circle" disabled id="prev-btn"><i class="fas fa-caret-left fa-4x"></i></button>
	</div>
	<div class="col-sm-3 col-lg-6 col-md-6 text-right" style="width: 50%">
		<button class="btn btn-circle" disabled id="next-btn"><i class="fas fa-caret-right fa-4x"></i></button>
	</div>
</div>
