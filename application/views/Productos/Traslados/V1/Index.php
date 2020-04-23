<?php $this->load->view("Productos/Traslados/V1/stylos_formulario_1") ?>
<div class="container-fluid">
	<div class="modal fade" id="formulario" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
		 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: black">

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
				<div class="modal-body">
					<?php $this->load->view("Productos/Traslados/V1/Formulario_1"); ?>
				</div>

			</div>
		</div>
	</div>
	<div class="modal fade" style="background: #0000007a;"  id="respuesta_form" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
		 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div id="respuesta">

					</div>
					<div class="col-sm-12">
						<button type="button" style="width: 100%" class="btn btn-outline-primary btn-sm" id="btn_close_respuesta">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="preloader" style="z-index: 99999 !important;background: #000000ab;" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content" style="background-color: #fff0; color:white; border: 1px solid rgba(0, 0, 0, 0);">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							<div class="spinner-border" style="width: 3rem; height: 3rem;color:#f58634" role="status">
								<span class="sr-only">Loading...</span>
							</div><br>
							<img src="<?php echo base_url("resource/img/logo_sixt.png")?>" width="80px"><br>
							<span style="font-size: 14px">Cargando datos....</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("Footer_principal") ?>
<!--Plugin para Wizard -->
<script>
	$("#prev-btn").on("click", function () {

		// Navigate previous
		$('#smartwizard').smartWizard("prev");
	});

	$("#next-btn").on("click", function () {
			$('#smartwizard').smartWizard("next");

	});

	$(document).ready(function () {
		$("#formulario").modal("show");
	//	$("#preloader").modal("show");
		$("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
			//alert("You are on step "+stepNumber+" now");
			if (stepPosition === 'first') {
				$("#prev-btn").prop('disabled', true);
			} else if (stepPosition === 'final') {
				$("#next-btn").prop('disabled', true);
			} else {
				$("#prev-btn").prop('disabled', false);
				$("#next-btn").prop('disabled', false);
			}
		});

		$('#smartwizard').smartWizard({
			selected: 0,  // Initial selected step, 0 = first step
			keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
			//autoAdjustHeight:true, // Automatically adjust content height
			cycleSteps: true, // Allows to cycle the navigation of steps
			backButtonSupport: true, // Enable the back button support
			useURLhash: true, // Enable selection of the step based on url hash
			toolbarSettings: {
				toolbarPosition: 'bottom', // none, top, bottom, both
				toolbarButtonPosition: 'right', // left, right
				showNextButton: false, // show/hide a Next button
				showPreviousButton: false, // show/hide a Previous button
			},
			lang: {  // Language variables
				next: 'Siguiente',
				previous: 'Anterior'
			},
			theme: 'circles',
			transitionEffect: 'slide', // Effect on navigation, none/slide/fade
			transitionSpeed: '400'
		});
	});
</script>
<!--fin Plugin para Wizard -->
<script>
	$(document).on('click', '#customCheck1', function (e) {
		if ($(this).prop('checked')) {

			$("#next-btn").prop("disabled", false);
		} else {
			$("#next-btn").prop("disabled", true);
		}
	});
</script>
<script>
	//Functiones principales
	$(document).ready(function () {
		//
		setInterval(obtener_hora, 10000);

		//	setInterval(contar_dias,1000);

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
<!--Plugns y Funciones de Calendario y Horas -->
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
	//fin de hora de origen Plugin

	//Fecha de Origen y con Retorno No Recurrente
	$('#fecha_origen').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		minDate: new Date(),
		onSelect: function () {
			var hora_origen = $("#hora_origen").val();
			if (hora_origen != "") {
				$("#customSwitch2").prop("disabled", false);
				calculo_fechas();
			}
		}
	});

	$('#fecha_recojo').datepicker({
		language: 'es',
		position: "top right",
		autoClose: true,
		minDate: new Date()
	});
	//Fin de Fecha de Origen y Retorno no Recurrente
	//Switch para Activar Fecha con Retorno
	$(document).on('click', '#customSwitch2', function (e) {
		var precio_cn_desc=$("#precio_descuento1").val();
		if ($(this).prop('checked')) {
			var fecha_retorno = $('#fecha_origen').val();
			var precio_final = precio_cn_desc * 2;
			$("#tarifa_global").val(precio_final + ".00");
			$("#tarifa_global").html(precio_final + "00");
			$("#precio_total").val(precio_final);
			$("#precio_total").html(precio_final);

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

			$("#fecha_recojo").val("");
			$("#fecha_recojo").html("");
			$("#return_date").css("display", "none");
		}
	});
	//Fin de Switch para Activar Fecha con Retorno

	//Switch para Activar Fecha Recurrente
	$(document).on('click', '#customSwitch1', function (e) {
		if ($(this).prop('checked')) {
			$("#calendar").css("display", "block");
			$("#calendar_ret").css("display", "none");
			$("#customSwitch2").prop("checked", false);
			remove_date_no_recurrent();
			$("#customSwitch2").prop("disabled", true);
			$("#return_date").css("display", "none");
			$(".date_recurrent").prop("disabled", false);
			$(".date_origen").prop("disabled", true);
			$('#input_recurrent').val("");
			$('#input_recurrent').html("");
		} else {
			remove_date_no_recurrent();
			$(".date_recurrent").prop("disabled", true);
			$(".date_origen").prop("disabled", false);
			$("#customSwitch2").prop("disabled", true);
			$("#calendar").css("display", "none");
			$("#calendar_ret").css("display", "block");
			$('#input_recurrent').val("");
			$('#input_recurrent').html("");
			$('#input_recurrent').tagsinput('removeAll');
			$("#customSwitch2").prop("checked", false);

		}
	});

	function remove_date_no_recurrent() {
		$("#tarifa_global").val("");
		$("#tarifa_global").html("");
		$("#fecha_origen").val("");
		$("#hora_origen").val("");
		$("#fecha_recojo").val("");
		$("#hora_recojo").val("");

		$("#fecha_origen").html("");
		$("#hora_origen").html("");
		$("#fecha_recojo").html("");
		$("#hora_recojo").html("");

		$("#precio_total").val(0);
		$("#precio_total").html(0);

		$("#descuento2").val(0);
		$("#descuento2").html(0);
		$("#desc1").val(0);
		$("#desc1").html(0);
	}

	//Fin de Siwtch para Fecha Recurrente

	//Inicio Fecha Recurrente PLugin

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
			contar_dias(agrega);
		},

	});

	$('#input_recurrent').on('beforeItemRemove', function (event) {
		var agrega = -1;
		contar_dias(agrega);
	});

</script>
<!--Fin de PLugins y Funciones de Calendario y Horas -->
<!--Funciones para Fechas y Horas Descuentos -->
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
<!--Fin de Funciones para Fechas y Horas Descuentos -->
<!--Google Apis-->
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
					$("#customSwitch1").prop("disabled", false);


				} else {
					window.alert('Directions request failed due to ' + status);
				}
			});
	};
</script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAghedJRj9DKs5opiOp1gBJjZn6qhIKsIM&libraries=places&callback=initMap"
	async defer></script>
<!--fin Google Apis -->

<!--Iniciar Funciones Complementarias -->
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
<!--Fin de funciones complementarias -->
<script>

	$('#btn_formulario').click(function () {
		var url = "<?php echo base_url("Traslados/Store")?>";
		var formulario = $("#formulario_traslados").serialize();
		$("#preloader").modal("show");
		$("#formulario").css("filter","blur(1px)");
		$.ajax({
			type: "POST",
			url: url,
			data: formulario,
			success: function (data) {
				$("#preloader").modal("hide");
				$("#respuesta_form").modal("show");
				$('#respuesta').html(data);
			}
		});
	});

	$('#btn_close_respuesta').click(function () {
		window.location.href = "<?php echo base_url("Traslados")?>";
		$("#respuesta_form").modal("hide");
		$('#respuesta').html("");
	});
</script>
