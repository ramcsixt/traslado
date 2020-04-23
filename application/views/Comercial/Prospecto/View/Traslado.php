<input id="idprospecto" name="idprospecto" hidden value="<?php echo $idprospecto ?>">
<style>
	.two-fields {
		width: 100%;
	}

	.two-fields .input-group {
		width: 100%;
	}

	.datepickers-container {
		position: absolute;
		left: 0;
		top: 0;
		z-index: 99999;
	}
</style>
<div class="container-fluid">
	<form action="<?php echo base_url('Comercial/Prospecto/Converter') ?>" onsubmit="return checkSubmit();"
		  id="form_prospecto" method="POST" id="Converterform">
		<?php foreach ($prospecto as $prs) { ?>
			<input hidden name="idprospecto" value="<?php echo $prs->idprospecto ?>">
			<input hidden name="utm_name" value="<?php echo $prs->utm_name ?>">
			<div id="input_estado">

			</div>
			<div class="card">
				<div class="card-header" style="padding: 12px;">
					<div class="row">
						<div class="col-sm-4">
							<img style="width: 6%"
								 src="<?php echo base_url('Public/img/icon_mods/comercial/user.png') ?>"
								 align="left"><span>Nombre y Apellido</span><br>
							<input class="form-control input" style="display:none" id="nombre" name="nombre"
								   value="<?php echo $prs->nombre ?>">
							<strong class="label_input"><?php echo $prs->nombre ?></strong>
						</div>
						<div class="col-sm-8 text-right">
							<span>Estado</span><br>
							<?php foreach ($estado_prospecto as $std) { ?>
								<?php if ($std->idestado_prospecto == $prs->idestado_prospecto) { ?>
									<span class="badge badge-<?php echo $std->stylo ?>"
										  style="font-size:14px"><?php echo $std->nombre ?></span>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-4">
							<span>Correo electronico</span><br>
							<strong class="label_input"><?php echo $prs->correo ?></strong>
							<input class="form-control input" style="display:none" id="correo" name="correo"
								   value="<?php echo $prs->correo ?>">
						</div>
						<div class="col-sm-2">
							<span>Movil - Whatsapp</span><br>
							<strong class="label_input"><?php echo $prs->telf_fijo . ' ' . $prs->telf_movil ?></strong>
							<input class="form-control input" style="display:none" id="movil" name="telf_movil"
								   value="<?php echo $prs->telf_movil ?>">
						</div>
						<div class="col-sm-2">
							<span>Propietario</span><br>
							<strong class="label_input"><?php echo $prs->propietario ?></strong>
							<select class="form-control input" style="display:none" id="propietario" name="propietario">
								<?php foreach ($propietario as $pr) { ?>
									<?php if ($pr->idpropietario == $prs->idpropietario) { ?>
										<option selected
												value="<?php echo $pr->idpropietario ?>"><?php echo $pr->nombre ?></option>
									<?php } else { ?>
										<option
											value="<?php echo $pr->idpropietario ?>"><?php echo $pr->nombre ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-4">
							<strong>Tarifa Total</strong>
							<input class="form-control controls" disabled
								   placeholder="Tarifa Total de Traslado"
								   id="tarifa_global" value="<?php echo $prs->precio_total?>">
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-12">
					<div class="card card-body">
						<h5>Datos de Traslado</h5>
						<div class="row">
							<div class="col-sm-3">
								<span>Lugar de Origen</span><br>
								<strong class="label_input"><?php echo $prs->origen ?></strong>
								<div class="input" style="display:none">
									<input class="form-control" id="origin-input" name="origen"
										   value="<?php echo $prs->origen ?>">
								</div>
							</div>
							<div class="col-sm-3">
								<span>Lugar de Destino</span><br>
								<strong class="label_input"><?php echo $prs->destino ?></strong>
								<div class="input" style="display:none">
									<input class="form-control" id="destination-input" name="destino"
										   value="<?php echo $prs->destino ?>">
								</div>
							</div>
							<div class="col-sm-3">
								<span>Kilometros de Viaje</span><br>
								<strong id="distance"></strong>
							</div>
							<div class="col-sm-3">
								<span>Duracion de Viaje</span><br>
								<strong id="duration"></strong>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-12">
					<div class="card card-body">
						<h5>Fechas y Hora</h5>
						<div class="row">
							<?php if ($prs->recurrente == "on") { ?>
								<div class="col-sm-6">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input"
											   id="customSwitch1" name="switch_recurrente" checked disabled>
										<label class="custom-control-label" for="customSwitch1"><h6>
												SERVICIO RECURRENTE</h6></label>
									</div>
								</div>
							<?php } ?>
							<?php if ($prs->con_retorno == "on") { ?>
								<div class="col-sm-6">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input"
											   id="customSwitch2" name="switch_retorno" checked disabled>
										<label class="custom-control-label" for="customSwitch2"
											   style="font-size: 16px"><H6>SERVICIO RETORNO</H6>
										</label>
									</div>
								</div>
							<?php } else{?>
								<div class="col-sm-6">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input"
											   id="customSwitch2" name="switch_retorno" unchecked disabled>
										<label class="custom-control-label" for="customSwitch2"
											   style="font-size: 16px"><H6>SERVICIO RETORNO</H6>
										</label>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="row">
							<?php if ($prs->recurrente == "on") { ?>
								<div class="col-sm-8">
									<strong>Fechas de Traslado</strong><br>
									<div class="row">

										<?php $fechas = explode(",", $prs->fecha_origen); ?>
										<div class="input" style="display:none">
											<div class="col-sm-12 text-center">
												<div class="datepicker-here" id="date_origen" style="width: 100%"
													 data-language='es'></div>
												<br>
												<input name="fecha_origen" id="input_recurrent"
													   value="<?php echo $prs->fecha_origen ?>">
											</div>
										</div>
										<div class="label_input">
											<div class="col-sm-12">
												<?php foreach ($fechas as $fh) { ?>
													<span class="badge badge-info"><?php echo $fh ?></span>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<strong>Hora de Traslado</strong><br>
									<div class="input" style="display:none">
										<input  class="form-control date_recurrent" autocomplete="off"
												type="text" required name="hora_origen"
											   value="<?php echo $prs->hora_origen ?>"
											   id="hora_origen_recurrente">
									</div>
									<span class="label_input"><?php echo $prs->hora_origen ?></span>
								</div>
							<?php } ?>
							<?php if ($prs->con_retorno == "on") { ?>
								<div class="col-sm-3">
									<strong>Fecha Origen</strong><br>
									<span class="label_input" style="display:block"><?php echo $prs->fecha_origen ?></span>
									<input class="form-control input" id="fecha_origen" style="display:none" value="<?php echo $prs->fecha_origen ?>">
								</div>
								<div class="col-sm-3">
									<strong>Hora Origen</strong><br>
									<span class="label_input" style="display:block"><?php echo $prs->hora_origen ?></span>
									<input class="form-control input" id="hora_origen" style="display:none" value="<?php echo $prs->hora_origen ?>">
								</div>
								<div class="col-sm-3">
									<strong>Fecha Retorno</strong><br>
									<span class="label_input" style="display:block"><?php echo $prs->fecha_retorno ?></span>
									<input class="form-control input" id="fecha_recojo" style="display:none" value="<?php echo $prs->fecha_retorno ?>">
								</div>
								<div class="col-sm-3">
									<strong>Hora Retorno</strong><br>
									<span class="label_input" style="display:block"><?php echo $prs->hora_retorno ?></span>
									<input class="form-control input" id="hora_recojo" style="display:none" value="<?php echo $prs->hora_retorno ?>">
								</div>
							<?php } ?>
							<?php if (($prs->recurrente != "on") && ($prs->con_retorno != "on")) { ?>
								<div class="col-sm-3">
									<strong>Fecha Origen</strong><br>
									<span class="label_input" style="display:block"><?php echo $prs->fecha_origen ?></span>
									<input class="form-control input" id="fecha_origen" style="display:none" value="<?php echo $prs->fecha_origen ?>">
								</div>
								<div class="col-sm-3">
									<strong>Hora Origen</strong><br>
									<span class="label_input" style="display:block"><?php echo $prs->hora_origen ?></span>
									<input class="form-control input" id="hora_origen" style="display:none" value="<?php echo $prs->hora_origen ?>">
								</div>

								<div class="col-sm-3">
									<strong>Fecha Retorno</strong><br>
									<input class="form-control" id="fecha_recojo" style="display:none" value="">
								</div>
								<div class="col-sm-3">
									<strong>Hora Retorno</strong><br>
									<input class="form-control" id="hora_recojo" style="display:none" value="">
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-8 text-right">
					<?php if ($prs->idestado_prospecto == 1) { ?>
						<button class="btn btn-sm btn-danger converter" type="button" data-id="4"><i
								class="fas fa-power-off"></i>&nbsp;Cancelar Prospecto
						</button>
						<button class="btn btn-sm btn-info converter" type="button" data-id="5"><i
								class="fas fa-newspaper"></i>&nbsp;Convertir a Cuenta
						</button>
						<button type="button" class="btn btn-sm btn-dark" id="editprospecto"><i class="fas fa-edit"></i>&nbsp;Editar
						</button>
					<?php } elseif ($prs->idestado_prospecto == 4) { ?>
						<button class="btn btn-sm btn-danger converter" disabled type="button" data-id="4"><i
								class="fas fa-power-off"></i>&nbsp;Cancelar Prospecto
						</button>
						<button class="btn btn-sm btn-info converter" disabled type="button" data-id="5"><i
								class="fas fa-newspaper"></i>&nbsp;Convertir a Cuenta
						</button>
						<button type="button" class="btn btn-sm btn-dark" disabled id="editprospecto"><i
								class="fas fa-edit"></i>&nbsp;Editar
						</button>
					<?php } ?>
				</div>
			</div>

			<input hidden id="precio_total" name="precio_total" value="<?php echo $prs->precio_total ?>">
			<input hidden id="precio_distancia" name="precio_distancia" value="<?php echo $prs->precio_distancia ?>">
			<input hidden id="desc1" name="descuento1" value="<?php echo $prs->descuento1 ?>">
			<input hidden id="precio_descuento1" value="<?php echo $prs->precio_total?>">
			<input hidden id="descuento2" name="descuento2" value="<?php echo $prs->descuento2 ?>">
			<input hidden id="distancia" name="distancia">
			<input hidden id="duracion" name="duracion">
		<?php } ?>
		<div id="map" style="display:none"></div>
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
	</form>
</div>
<?php
date_default_timezone_set("America/Lima");
?>
<input hidden id="fecha_actual" value="<?php echo date("d/m/Y") ?>">
<input hidden id="hora_actual" value="<?php echo date("H:i") ?>">
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

					$("#distance").html("<strong style='font-size: 14px;background: white'>" + sin_dist_decimal + "Km</strong>");
					$("#distancia").val(sin_dist_decimal);
					$("#distancia").html(sin_dist_decimal);
					$("#duration").html("<strong style='font-size: 14px;background: white''>" + hour + ":" + minute + ":" + second + "</strong>");
					$("#duracion").val(hour + ":" + minute + ":" + second);
					$("#duracion").html(hour + ":" + minute + ":" + second);

					$("#customSwitch2").prop("disabled", false);
					$("#customSwitch2").attr('checked', false);
					$("#fecha_recojo").css("display","none");
					$("#hora_recojo").css("display","none");


					//		$("#fecha_origen").prop("disabled", false);
					//		$("#hora_origen").prop("disabled", false);
					$("#precio_distancia").val(precio_basesndeci);
					$("#precio_distancia").html(precio_basesndeci);
					//		$("#customSwitch1").prop("disabled", false);


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
	//Hora de Origen Plugin
	$('#hora_origen').timepicker({
		minuteStep: 1,
		template: 'modal',
		appendWidgetTo: 'body',
		showSeconds: true,
		showMeridian: false,
		defaultTime: false,
		'timeFormat': 'HH:mm'
	});

	$('#hora_origen_recurrente').timepicker({
		minuteStep: 1,
		template: 'modal',
		appendWidgetTo: 'body',
		showSeconds: true,
		showMeridian: false,
		defaultTime: false,
		'timeFormat': 'HH:mm'
	});


	$('#fecha_recojo').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		minDate: new Date()
	});

	$('#fecha_origen').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		minDate: new Date(),
		onSelect: function () {
			var hora_origen = $("#hora_origen").val();
			if (hora_origen != "") {
				$("#customSwitch2").prop("disabled", false);
				$("#customSwitch2").attr('checked', false);
				$("#fecha_recojo").css("display","none");
				$("#hora_recojo").css("display","none");
				calculo_fechas();
			}
		}
	});

	$(document).on('click', '#customSwitch2', function (e) {
		var precio_cn_desc=$("#precio_descuento1").val();
		if ($(this).prop('checked')) {
			var fecha_retorno = $('#fecha_origen').val();
			var precio_final = precio_cn_desc * 2;
			$("#tarifa_global").val(precio_final + ".00");
			$("#tarifa_global").html(precio_final + "00");
			$("#precio_total").val(precio_final);
			$("#precio_total").html(precio_final);

			$("#fecha_recojo").css("display","block");
			$("#hora_recojo").css("display","block");

			$("#fecha_recojo").val(fecha_retorno);
			$("#fecha_recojo").html(fecha_retorno);
			$("#return_date").css("display", "block");
			$(".return_date").prop("disabled", false);
		} else {
			$(".return_date").prop("disabled", true);
			var precio_final = precio_cn_desc;
			$("#tarifa_global").val(precio_final);
			$("#tarifa_global").html(precio_final);
			$("#precio_total").val(precio_final);
			$("#precio_total").html(precio_final);

			$("#fecha_recojo").css("display","none");
			$("#hora_recojo").css("display","none");

			$("#fecha_recojo").val("");
			$("#fecha_recojo").html("");
			$("#return_date").css("display", "none");
		}
	});

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

	$("#input_recurrent").tagsinput();

	$('#date_origen').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		minDate: new Date(),
		onSelect: function (dateText) {
			$('#input_recurrent').tagsinput('add', dateText, {
				allowDuplicates: false
			});
			var agrega = 0;
			//alert(agrega);
			contar_dias(agrega);
		},

	});

	$('#input_recurrent').on('beforeItemRemove', function (event) {
		var agrega = -1;
		contar_dias(agrega);
	});


	$(document).ready(function () {
		$('.select').select2();
	});
	$(document).on('click', '.converter', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		var converter = $(this).attr("data-id");
		var nombre = $("#nombre").val();
		var correo = $("#correo").val();
		var movil = $("#movil").val();

		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Prospecto/Confirmation")?>",
			data: {converter: converter, nombre: nombre, correo: correo, movil: movil},
			success: function (data) {
				$("#confirmation").modal("show");
				$("#body_confirmation").html(data);
				$("#input_estado").html("<input hidden name='estado_prospecto' id='estado_prospecto' value='" + converter + "'>");
			}
		});
	});
</script>

<script>
	function calculardiferencia(hora_origen, hora_actual) {

		// Expresión regular para comprobar formato
		var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

		// Si algún valor no tiene formato correcto sale
		if (!(hora_actual.match(formatohora)
			&& hora_origen.match(formatohora))) {
			return;
		}

		// Calcula los minutos de cada hora
		var minutos_inicio = hora_actual.split(':')
			.reduce((p, c) => parseInt(p) * 60 + parseInt(c));
		var minutos_final = hora_origen.split(':')
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


	function contar_dias(agrega) {
		var fecha_recurrente = $("#input_recurrent").val();
		var fecha_actual = $("#fecha_actual").val();
		var hora_actual = $("#hora_actual").val();
		var hora_origen = $("#hora_origen_recurrente").val();
		var precio_kilometros = $("#precio_distancia").val();
		var descuento2 = 0;
		var descuento1 = 0;
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url("Traslados/contar_dias")?>',
			data: {fecha_recurrente: fecha_recurrente},
			success: function (data) {
				var dato = JSON.parse(data);
				var fecha_origen = dato.fecha_minima;
				var dias = parseFloat(dato.contador) + parseFloat(agrega);
				if (dias > 0) {
					precio_distancia = precio_kilometros * dias;
					if ((dias > 2) && (dias < 17)) {
						descuento2 = parseFloat(0.0519) * Math.log(dias) - parseFloat(0.0017);
					} else if (dias >= 17) {
						descuento2 = 0.15;
					}
					calculo_entre_fechas(fecha_origen, fecha_actual, hora_origen, hora_actual, precio_distancia);
				} else {
					$("#tarifa_global").val("");
					$("#tarifa_global").html("");
					$("#precio_total").val("");
					$("#precio_total").html("");
					$("#descuento2").val(0);
					$("#descuento2").html(0);
					$("#desc1").val(0);
					$("#desc1").html(0);
				}
				$("#descuento2").val(descuento2);
				$("#descuento2").html(descuento2);
			}
		});
	}

	$('#hora_origen').change(calculo_fechas);

	function calculo_fechas() {
		$("#customSwitch2").prop("disabled", false);
		var precio_distancia = $("#precio_distancia").val();
		var fecha_origen = $("#fecha_origen").val();
		var fecha_actual = $("#fecha_actual").val();
		var hora_origen = $("#hora_origen").val();
		var hora_actual = $("#hora_actual").val();

		var min_origen = hora_origen.split(':').reduce((p, c) => parseInt(p) * 60 + parseInt(c));
		var min_act = hora_actual.split(':').reduce((p, c) => parseInt(p) * 60 + parseInt(c));

		if (fecha_origen == fecha_actual) {
			if (min_origen > min_act) {
				var minutos = parseFloat(min_origen) - parseFloat(min_act);
				if (minutos > 120) {
					calculo_entre_fechas(fecha_origen, fecha_actual, hora_origen, hora_actual, precio_distancia);
				} else {
					alert("Debe ingresar dos horas de anticipacion");
					$("#tarifa_global").val("");
					$("#tarifa_global").html("");
					$("#precio_total").val("");
					$("#precio_total").html("");
					$("#desc1").val(0);
					$("#desc1").html(0);
					$("#hora_origen").html("");
					$("#hora_origen").val("");
				}
			} else {
				alert("Debe ingresar dos horas de anticipacion");
				$("#tarifa_global").val("");
				$("#tarifa_global").html("");
				$("#precio_total").val("");
				$("#precio_total").html("");
				$("#desc1").val(0);
				$("#desc1").html(0);
				$("#hora_origen").html("");
				$("#hora_origen").val("");
			}
		} else {
			calculo_entre_fechas(fecha_origen, fecha_actual, hora_origen, hora_actual, precio_distancia);
		}
	}

	function calculo_entre_fechas(fecha_origen, fecha_actual, hora_origen, hora_actual, precio_distancia) {

	//	alert(hora_origen);

		var descuento2 = $("#descuento2").val();
		var aFecha1 = fecha_actual.split('/');
		var aFecha2 = fecha_origen.split('/');
		var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1] - 1, aFecha1[0]);
		var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1] - 1, aFecha2[0]);
		var dif = fFecha2 - fFecha1;
		var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
		var descuento = 0;
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
				var values = calculardiferencia(hora_origen, hora_actual);
				var hora = values[0];
				var minute = values[1];

				//alert(parseFloat(horas_dias)+parseFloat(hora)+":"+minute);
				var horas_en_decimal = parseFloat(horas_dias) + parseFloat(hora) + "." + minute;


				if (horas_en_decimal < 3.00) {
					descuento = 0;

				} else if ((horas_en_decimal >= 3.00) && (horas_en_decimal < 168.00)) {
					descuento = parseFloat(0.0304) * Math.log(horas_en_decimal) - parseFloat(0.006);

				} else if (horas_en_decimal > 168.00) {
					descuento = 0.15;

				}
			}
		} else if (dias < 1) {
			var values = calculardiferencia(hora_origen, hora_actual);
			var hora = values[0];
			var minute = values[1];


			if (hora < 3.00) {
				descuento = 0;
			} else if ((hora >= 3.00) && (hora < 168.00)) {
				descuento = parseFloat(0.0304) * Math.log(hora + "." + minute) - parseFloat(0.006);
			} else if (hora > 168.00) {
				descuento = 0.15;

			}
		}

		var tarifa_con_descuento = parseFloat(precio_distancia) * (1 - descuento) * (1 - descuento2);
		var entero_total = Math.ceil(tarifa_con_descuento);

		$("#tarifa_global").val(entero_total + ".00");
		$("#tarifa_global").html(entero_total + ".00");

		$("#precio_total").val(entero_total);
		$("#precio_total").html(entero_total);

		$("#precio_descuento1").val(entero_total);
		$("#precio_descuento1").html(entero_total);

		$("#desc1").val(descuento);
		$("#desc1").html(descuento);

	}
</script>

<script>
	$(document).on('click', '#editprospecto', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		//Labels
		$(".label_input").css("display", "none");
		$(".input").css("display", "block");


		//Button
		$("#editprospecto").removeClass("btn-dark");
		$("#editprospecto").addClass("btn-success");
		$("#editprospecto").html('<i class="fas fa-save"></i>&nbsp;Guardar');
		$("#editprospecto").attr("id", "saveprospecto");

	});
	$(document).on('click', '#saveprospecto', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		var idprospecto = $("#idprospecto").val();
		var nombre = $("#nombre").val();
		var correo = $("#correo").val();
		var movil = $("#movil").val();
		var propietario = $("#propietario").val();
		var idrecojo = $("#idrecojo").val();
		var identrega = $("#identrega").val();
		var fecha_entrega = $("#fecha_entrega").val();
		var hora_entrega = $("#hora_entrega").val();
		var fecha_recojo = $("#fecha_recojo").val();
		var hora_recojo = $("#hora_recojo").val();
		$("#preloader").modal("show");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Prospecto/Update")?>",
			data: {
				idprospecto: idprospecto,
				nombre: nombre,
				correo: correo,
				movil: movil,
				propietario: propietario,
				idrecojo: idrecojo,
				identrega: identrega,
				fecha_entrega: fecha_entrega,
				hora_entrega: hora_entrega,
				fecha_recojo: fecha_recojo,
				hora_recojo: hora_recojo
			},
			success: function (data) {
				if (data == 1) {
					location.reload();
				}
			}
		});
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
		$("#confirmation").modal("hide");
		$("#preloader").modal("show");
		document.getElementById("btnguardar").value = "Enviando...";
		document.getElementById("btnguardar").disabled = true;

		return true;
	}
</script>
