<?php $this->load->view("Layouts/Traslado") ?><br><br>
<style>
	#map {
		height: 350px;
		width: 100%;
	}

	.form-control {
		display: block;
		width: 100%;
		height: calc(2.5em + .75rem + 2px);
		padding: .375rem .75rem;
		font-size: 16px;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		/* background-color: #f1f1f1; */
		background-clip: padding-box;
		border-bottom: 1px solid #ced4da;
		border-top: 0px solid #ced4da;
		border-right: 0px;
		border-left: 0px;
		border-bottom: 0px;
		*/ border-radius: 0px;
		transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
	}

	a[href^="http://maps.google.com/maps"],
	a[href^="https://maps.google.com/maps"],
	a[href^="https://www.google.com/maps"] {
		display: none !important;
	}

	.gm-bundled-control .gmnoprint {
		display: block;
	}

	.gmnoprint:not(.gm-bundled-control) {
		display: none;
	}

	.pac-container:after {
		content: none !important;
	}

	::-webkit-input-placeholder {
		font-size: 16px;
	}

	.form-control:focus {
		color: #495057;
		background-color: #fff;

		outline: 0;

		box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0);
	}

	.portada {
		background: url('<?php echo base_url("Public/img/landing/LANDING.png")?>');
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

	.card {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 1px solid rgba(0, 0, 0, 0.125);
		border-radius: 0.25rem;
		box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
	}

	.centrado {
		width: 630px;
		position: absolute;
		height: 760px;
		top: 50%;
		margin-top: -380px;
		left: 50%;
		margin-left: -315px;
	}

	.input-group {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		-ms-flex-align: stretch;
		align-items: stretch;
		width: 100%;
		border: 1px solid #b1b1b1;
	}

	.pac-container {
		background-color: #fff;
		position: absolute !important;
		z-index: 99999;
		border-radius: 2px;
		border-top: 1px solid #d9d9d9;
		font-family: Arial, sans-serif;
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		overflow: hidden;
	}

	.datepickers-container {
		z-index: 99999;
	}

	.btn-geo:focus, .btn.focus {
		outline: 0;
		background: #ffffff;
		box-shadow: none;
		color: red;
	}

	.bootstrap-tagsinput .tag {
		margin-right: 2px;
		color: white;
		background: #3b78ad;
		font-size: 12px;
		border-radius: 5px;
	}

	.bootstrap-tagsinput {
		background-color: #fff;
		border: 1px solid #ccc;
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		display: inline-block;
		padding: 4px 6px;
		color: #555;
		vertical-align: middle;
		border-radius: 4px;
		max-width: 100%;
		line-height: 50px;
		cursor: text;
		width: 100%;
	}

	.bootstrap-tagsinput {
		background-color: #fff;
		border: 1px solid #ccc;
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		display: inline-block;
		padding: 4px 6px;
		color: #555;
		vertical-align: middle;
		border-radius: 4px;
		max-width: 100%;
		line-height: 22px;
		cursor: text;
		width: 100%;
	}

	.datepicker-inline .datepicker {
		border-color: #d7d7d7;
		margin: 0px auto;
		box-shadow: none;
		position: static;
		left: auto;
		right: auto;
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	}
</style>
<div class="container">
	<div class="modal fade" id="formulario" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
		 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<form action="<?php echo base_url('Reservas/Store') ?>" onsubmit="return checkSubmit();"
						  method="post">
						<input hidden value="2" name="idproducto">
						<input hidden value="<?php echo $utm_source ?>" name="utm_name">
						<div class="row">
							<div class="col-sm-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header" style="background: black">
										<div class="row">
											<div class="col-sm-2 col-lg-2 col-md-2">
												<img src="<?php echo base_url("Public/img/logo/logo_white.png") ?>"
													 style="width: 70px">
											</div>
											<div class="col-sm-8 col-lg-8 col-md-8 text-center">
												<h4 style="color:white">SOLICITUD DE TRASLADO</h4>
											</div>
											<div class="col-sm-2 col-lg-2 col-md-2">
											</div>
										</div>
									</div>
									<div class="card-body">
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
																   class="form-control" id="apellido"
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
															<input class="form-control" autocomplete="off" required
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
															<input class="form-control" autocomplete="off" required
																   type="email" name="correo"
																   placeholder="Correo Electronico (*)">
														</div>
													</div>
												</div>
											</div>
										</div>
										<br>
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
										<br>
										<div class="row">
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-12">
														<div class="custom-control custom-switch">
															<input type="checkbox" class="custom-control-input"
																   id="customSwitch1">
															<label class="custom-control-label" for="customSwitch1"><h6>
																	SERVICIO RECURRENTE</h6></label>
														</div>
													</div>
												</div>
												<br>
												<div id="calendar" style="display: none">
													<div class="row">
														<div class="col-sm-12 text-center">
															<div class="datepicker-here" id="date_origen" style="width: 100%"
																 data-language='es'></div>
														</div>
													</div><br>
													<div class="row">
														<div class="col-sm-12">
															<input style="width: 100%" type="text"
																   name="fecha_origen"
																   id="input_recurrent"
																   class="form-control" data-role="tagsinput"
																   autocomplete="off" required>

														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-sm-12">
															<div class="input-group">
																<div class="input-group-prepend">
																	<span class="input-group-text"
																		  style="background-color: white;"><i
																			class="fas fa-clock"
																			style="color: #000000"></i></span>
																</div>
																<input class="form-control" autocomplete="off"
																	   type="time" required
																	   name="hora_origen">
															</div>
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
																<input class="form-control" disabled id="fecha_origen"
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
																<input disabled class="form-control" id="hora_origen"
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
																	   id="customSwitch2">
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
																	<input class="form-control" id="fecha_recojo"
																		   autocomplete="off" required
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
																	<input class="form-control" autocomplete="off"
																		   type="time" id="hora_recojo" required
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
													<input hidden id="precio_total">
													<input hidden id="precio_distancia">
													<input hidden id="precio_descuento1">
													<input hidden id="precio_descuento2">


													<input hidden id="descuento1" value="0">
													<input hidden id="descuento2" value="0">
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
																class="far fa-comment-dots"
																style="color: #000000"></i></span>
													</div>
													<input required class="form-control" id="obs" name="obs"
														   placeholder="Observaciones Adicionales" autocomplete="off">
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
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
date_default_timezone_set("America/Lima");
?>
<input hidden id="fecha_actual" value="<?php echo date("d/m/Y") ?>">
<input hidden id="hora_actual" value="<?php echo date("H:i") ?>">
<?php $this->load->view("Footer_principal") ?>
<script>

</script>

<script>
	//formato de horas timepicker
	$('#hora_origen').timepicker({
		minuteStep: 1,
		template: 'modal',
		appendWidgetTo: 'body',
		showSeconds: true,
		showMeridian: false,
		defaultTime: false,
		'timeFormat': 'HH:m'
	});
</script>
<script>
	$('#UbicacionPersonal').click(function () {
		latitudReal = posicion.coords.latitude;
		longitudReal = posicion.coords.longitude;
		var markerPosicionReal = new google.maps.Marker({
			position: {
				lat: latitudReal,
				lng: longitudReal
			},
			title: "Mi actual ubicación"
		});
		markerPosicionReal.setMap(map);
		// Si quieres centrar el mapa en el nuevo marker:
		map.setCenter(markerPosicionReal.getPosition());
	});
</script>

<script>
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			mapTypeControl: false,
			center: {lat: 6.244338, lng: -75.573553},
			zoom: 13,
			zoomControl: false,
			disableDoubleClickZoom: true,
			mapTypeControl: false,
			fullscreenControl: false,
			streetViewControl: false,
			scaleControl: false,
			rotateControl: false,
			mouseWheelScrollEnabled: false,
			scrollwheel: false,
			navigationControl: false,
			draggable: false
		});

		new AutocompleteDirectionsHandler(map);
	}

	function get_my_location() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				var ubicacion = reverse(pos);
				$("#origin-input").val(ubicacion);
				$("#origin-input").html(ubicacion);
			})
		}
	}

	/**
	 * @constructor
	 */
	function AutocompleteDirectionsHandler(map) {
		this.map = map;
		this.originPlaceId = null;
		this.destinationPlaceId = null;
		this.travelMode = 'WALKING';
		this.directionsService = new google.maps.DirectionsService;
		this.directionsDisplay = new google.maps.DirectionsRenderer;
		this.directionsDisplay.setMap(map);

		var originInput = document.getElementById('origin-input');
		var destinationInput = document.getElementById('destination-input');
		var modeSelector = document.getElementById('mode-selector');

		var originAutocomplete = new google.maps.places.Autocomplete(originInput);
		// Specify just the place data fields that you need.
		originAutocomplete.setFields(['place_id']);

		var destinationAutocomplete =
			new google.maps.places.Autocomplete(destinationInput);
		// Specify just the place data fields that you need.
		destinationAutocomplete.setFields(['place_id']);

		this.setupClickListener('changemode-walking', 'WALKING');
		this.setupClickListener('changemode-transit', 'TRANSIT');
		this.setupClickListener('changemode-driving', 'DRIVING');

		this.setupPlaceChangedListener(originAutocomplete, 'ORIG',);
		this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

		var div_distance = document.getElementById('distance');
		var div_destination = document.getElementById('duration');

		this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(div_distance);
		this.map.controls[google.maps.ControlPosition.TOP_RIGHT].push(
			div_destination);
	}

	// Sets a listener on a radio button to change the filter type on Places
	// Autocomplete.
	AutocompleteDirectionsHandler.prototype.setupClickListener = function (
		id, mode) {
		var radioButton = document.getElementById(id);
		var me = this;

		radioButton.addEventListener('click', function () {
			me.travelMode = mode;
			me.route();
		});
	};

	AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
		autocomplete, mode) {
		var me = this;
		autocomplete.bindTo('bounds', this.map);

		autocomplete.addListener('place_changed', function () {
			var place = autocomplete.getPlace();

			if (!place.place_id) {
				window.alert('Please select an option from the dropdown list.');
				return;
			}
			if (mode === 'ORIG') {
				me.originPlaceId = place.place_id;
			} else {
				me.destinationPlaceId = place.place_id;
			}
			me.route();
		});
	};

	AutocompleteDirectionsHandler.prototype.route = function () {
		if (!this.originPlaceId || !this.destinationPlaceId) {
			return;
		}
		var me = this;

		this.directionsService.route(
			{
				origin: {'placeId': this.originPlaceId},
				destination: {'placeId': this.destinationPlaceId},
				travelMode: 'DRIVING'
			},
			function (response, status) {
				if (status === 'OK') {
					me.directionsDisplay.setDirections(response);

					// Display the distance:
					var metro = response.routes[0].legs[0].distance.value;

					var dist = (metro / 1000);
					var sin_dist_decimal = dist.toFixed(1);

					//obtener precio
					var tarifa_x_km = 1.264969632;
					var constante = 8.505103208;

					var precio_base = tarifa_x_km * sin_dist_decimal + parseFloat(constante);

					var precio_basesndeci = Math.ceil(precio_base);

					var segundo = response.routes[0].legs[0].duration.value;

					var hour = Math.floor(segundo / 3600);
					hour = (hour < 10) ? '0' + hour : hour;

					var minute = Math.floor((segundo / 60) % 60);
					minute = (minute < 10) ? '0' + minute : minute;
					var second = segundo % 60;
					second = (second < 10) ? '0' + second : second;

					$("#distance").html("<span  class='badge badge-success'  style='font-size: 14px'>Distancia:</span>&nbsp;<strong style='font-size: 14px;background: white'>" + sin_dist_decimal + "Km</strong>");
					$("#duration").html("<span class='badge badge-success' style='font-size: 14px'>Duracion: </span>&nbsp;<strong style='font-size: 14px;background: white''>" + hour + ":" + minute + ":" + second + "</strong>");

					$("#fecha_origen").prop("disabled", false);
					$("#hora_origen").prop("disabled", false);
					$("#precio_distancia").val(precio_basesndeci);
					$("#precio_distancia").html(precio_basesndeci);


				} else {
					window.alert('Directions request failed due to ' + status);
				}
			});
	};
</script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAghedJRj9DKs5opiOp1gBJjZn6qhIKsIM&libraries=places&callback=initMap"
	async defer></script>

<script>
	//fechas origen y destino y recurrente
	$('#fecha_origen').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		onSelect: function () {
			calculo_fechas();
		}
	});
	$('#fecha_recojo').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true
	});
	$('#date_origen').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		onSelect: function (dateText) {
			$('#input_recurrent').tagsinput('add', dateText);
			contar_dias();
		}
	});
	$('#input_recurrent').on('beforeItemRemove', function (event) {
		contar_dias();
	});
</script>
<script>

	$(document).on('click', '#customSwitch1', function (e) {
		if ($(this).prop('checked')) {
			$("#calendar").css("display", "block");
			$("#calendar_ret").css("display", "none");
		} else {
			$("#calendar").css("display", "none");
			$("#calendar_ret").css("display", "block");
		}
	});


	function contar_dias() {
		var fecha_recurrente = $("#input_recurrent").val();
		if (fecha_recurrente != "") {
			var descuento2=0;
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("Traslado/contar_dias")?>',
				data: {fecha_recurrente: fecha_recurrente},
				success: function (data) {
					if (data >= 17) {
						var descuento2 = 0.15;

					} else {
						var descuento2 = parseFloat(0.0519) * Math.log(data) + parseFloat(0.0017);

					}
					$("#descuento2").val(descuento2);
					$("#descuento2").html(descuento2);
				}
			})
		} else {
			var descuento2 = 0;
			$("#descuento2").val(descuento2);
			$("#descuento2").html(descuento2);
		}
	}

	$(document).ready(function () {
		$("#formulario").modal("show");
		setInterval(contar_dias,1000);
		setInterval(obtener_hora, 10000);

		function obtener_hora() {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("Traslado/hora")?>',
				data: {},
				success: function (data) {
					$("#hora_actual").val(data);
					$("#hora_actual").html(data);
				}
			})
		}
	});

</script>
<script>
	$(document).on('click', '#customSwitch2', function (e) {
		if ($(this).prop('checked')) {
			var precio_cn_desc = $("#precio_descuento1").val();
			var fecha_retorno = $('#fecha_origen').val();
			var precio_final = precio_cn_desc * 2;
			$("#tarifa_global").val(precio_final + ".00");
			$("#tarifa_global").html(precio_final + "00");
			$("#precio_total").val(precio_final);
			$("#precio_total").html(precio_final);

			$("#fecha_recojo").val(fecha_retorno);
			$("#fecha_recojo").html(fecha_retorno);
			$("#return_date").css("display", "block");

		} else {
			var precio_cn_desc = $("#precio_descuento1").val();
			var precio_final = precio_cn_desc;
			$("#tarifa_global").val(precio_final);
			$("#tarifa_global").html(precio_final);
			$("#precio_total").val(precio_final);
			$("#precio_total").html(precio_final);

			$("#fecha_recojo").val("");
			$("#fecha_recojo").html("");
			$("#return_date").css("display", "none");
		}
	});


</script>

<script>
	function calculardiferencia() {
		var hora_inicio = $('#hora_actual').val();
		var hora_final = $('#hora_origen').val();

		// Expresión regular para comprobar formato
		var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

		// Si algún valor no tiene formato correcto sale
		if (!(hora_inicio.match(formatohora)
			&& hora_final.match(formatohora))) {
			return;
		}

		// Calcula los minutos de cada hora
		var minutos_inicio = hora_inicio.split(':')
			.reduce((p, c) => parseInt(p) * 60 + parseInt(c));
		var minutos_final = hora_final.split(':')
			.reduce((p, c) => parseInt(p) * 60 + parseInt(c));

		// Si la hora final es anterior a la hora inicial sale
		if (minutos_final < minutos_inicio) return;

		// Diferencia de minutos
		var diferencia = minutos_final - minutos_inicio;

		// Cálculo de horas y minutos de la diferencia
		var horas = Math.floor(diferencia / 60);
		var minutos = diferencia % 60;
		var minute = ((minutos < 10 ? '0' : '') + minutos);

		return [horas, minute];
	}

	$('#hora_origen').change(calculo_fechas);

	function calculo_fechas() {
		var fecha_origen = $("#fecha_origen").val();
		var fecha_actual = $("#fecha_actual").val();
		var hora_origen = $("#hora_origen").val();
		var hora_actual = $("#hora_actual").val();
		calculo_entre_fechas(fecha_origen, fecha_actual, hora_origen, hora_actual);
	}

	function calculo_entre_fechas(fecha_origen, fecha_actual, hora_origen, hora_actual) {
		var precio_distancia = $("#precio_distancia").val();
		var aFecha1 = fecha_actual.split('/');
		var aFecha2 = fecha_origen.split('/');
		var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1] - 1, aFecha1[0]);
		var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1] - 1, aFecha2[0]);
		var dif = fFecha2 - fFecha1;
		var dias = Math.floor(dif / (1000 * 60 * 60 * 24));

		var horas_dias = dias * 24;

		var horas24 = horas_dias + ":" + "00";
		var minutos24 = (horas_dias * 60);

		//Function Detecta si es igual a un dia ejecutara funcion
		if (dias >= 1) {
			var minutos_actual = hora_actual.split(':').reduce((p, c) => parseInt(p) * 60 + parseInt(c));
			var h_actual = Math.floor(minutos_actual / 60);
			var m_actual = minutos_actual % 60;
			var mm_actual = ((m_actual < 10 ? '0' : '') + m_actual);

			var minutos_origen = hora_origen.split(':').reduce((p, c) => parseInt(p) * 60 + parseInt(c));
			var h_origen = Math.floor(minutos_origen / 60);
			var m_origen = minutos_origen % 60;
			var mm_origen = ((m_origen < 10 ? '0' : '') + m_origen);


			if (h_origen < h_actual) {
				//si la hora seleccionada es menor a la hora de sistema ejecuta la funcion para restar la diferencia de horas de 24 horas promedio de un dia
				//ejemplo si la hora en sistema es 13:00(1:00pm) y la hora seleccionada es menor es decir 11:30am entonces se resta a 24 la hora actual y ese
				// resultado se le suma la hora seleccionada dando el total de horas de diferencia.
				var suma_horaio = parseFloat(minutos24) - parseFloat(minutos_actual);

				var resultado11 = parseFloat(suma_horaio) + parseFloat(minutos_origen);

				var hr11 = Math.floor(resultado11 / 60);
				var mr11 = resultado11 % 60;
				var mmr11 = ((mr11 < 10 ? '0' : '') + mr11);

				var hr11_decimal = hr11 + "." + mmr11;

				if (hr11 < 3.00) {
					descuento = 0;

				} else if ((hr11 >= 3.00) && (hr11 < 168.00)) {
					descuento = parseFloat(0.0304) * Math.log(hr11_decimal) - parseFloat(0.006);

				} else if (hr11 > 168.00) {
					descuento = 0.15;

				}

			} else if (h_origen >= h_actual) {
				//fi la hora seleccionada es mayor o igual a la hora del sistema ejecuta la funcion para suma las horas de las 24 horas promedio de un dia
				//ejemplo si la hora en sistema es 13:00(1:00pm) y la hora selecionada es mayor o igual es decir 14:30 la diferencia entre ambas se le suma a 24 horas del dia seleccionada.
				var values = calculardiferencia();
				var hora = values[0];
				var minute = values[1];

				//alert(parseFloat(horas_dias)+parseFloat(hora)+":"+minute);
				var horas_en_decimal = parseFloat(horas_dias) + parseFloat(hora) + "." + minute;
				var descuento;

				if (horas_en_decimal < 3.00) {
					descuento = 0;

				} else if ((horas_en_decimal >= 3.00) && (horas_en_decimal < 168.00)) {
					descuento = parseFloat(0.0304) * Math.log(horas_en_decimal) - parseFloat(0.006);

				} else if (horas_en_decimal > 168.00) {
					descuento = 0.15;

				}
			}
		} else if (dias < 1) {
			var values = calculardiferencia();
			var hora = values[0];
			var minute = values[1];

			var descuento;
			if (hora < 3.00) {
				descuento = 0;

			} else if ((hora >= 3.00) && (hora < 168.00)) {
				descuento = parseFloat(0.0304) * Math.log(hora + "." + minute) - parseFloat(0.006);

			} else if (hora > 168.00) {
				descuento = 0.15;

			}
		}
		var tarifa_con_descuento = parseFloat(precio_distancia) * (1 - descuento);
		var entero_total = Math.ceil(tarifa_con_descuento);

		$("#tarifa_global").val(entero_total + ".00");
		$("#tarifa_global").html(entero_total + ".00");

		$("#precio_descuento1").val(entero_total + ".00");
		$("#precio_descuento1").html(entero_total + ".00");

		$("#descuento1").val(descuento);
		$("#descuento1").html(descuento);
	}
</script>


<!-- Modal -->
<div class="modal fade" id="preloader" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
							<span class="sr-only">Loading...</span>
						</div>
						<h4>Guardando Cambios Realizados</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
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
		$("#preloader").modal("show");
		document.getElementById("btn_save").value = "Enviando...";
		document.getElementById("btn_save").disabled = true;
		return true;
	}


	function mayus(e) {
		e.value = e.value.toUpperCase();
	}

	$("#nombre").bind('keypress', function (event) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
	$("#apellido").bind('keypress', function (event) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
	$("#telf_fijo").bind('keypress', function (event) {
		var regex = new RegExp("^[0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
	$("#telf_movil").bind('keypress', function (event) {
		var regex = new RegExp("^[0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
</script>
