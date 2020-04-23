<div class="container-fluid">
	<form action="<?php echo base_url('Comercial/Prospecto/Store')?>" onsubmit="return checkSubmit();"  method="post">

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<div class="col-sm-8">
								<img src="<?php echo base_url("public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 20%">
							</div>
							<div class="col-sm-4">
								<strong>Fuente</strong>


								<select class="selectpicker" data-width="100%" name="utm_name">
									<option data-icon="fab fa-sourcetree" value="">Seleccione Fuente...</option>
									<?php foreach($fuente as $fnt){?>
										<option data-icon="<?php echo $fnt->utm_icon?>" value="<?php echo $fnt->utm_name?>"><?php echo $fnt->utm_name?></option>
									<?php }?>
								</select>

							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<h6>Datos de Contacto</h6>
								<div class="row">
									<div class="col-sm-8">
										<label>Nombres y Apellidos</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
											</div>
											<input onkeyup="mayus(this);" autocomplete="off" required class="form-control" id="apellido" name="nombre_apellido" placeholder="Ingrese nombres y apellidos...">
										</div>
									</div>
									<div class="col-sm-4">
										<label>Movil - Whatsapp</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fab fa-whatsapp"></i></span>
											</div>
										<input class="form-control"  autocomplete="off" required id="telf_movil" name="telf_movil" placeholder="Ingrese Movil - Whatsapp...">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label>Correo electrónico</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
											</div>
										<input class="form-control"  autocomplete="off" required type="email" name="correo" placeholder="Ingrese correo electrónico...">
										</div>
									</div>
								</div>
							</div>
						</div><br>


						<div class="row">
							<div class="col-sm-12">
								<h6>Datos de Reserva</h6>
								<div class="row">
									<div class="col-sm-12" id="recojo_div">
										<label id="label_pickup">
											Pick-up Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" checked id="chaeckbox" value="1" name="habilitar">Drop-off at pick-up location
										</label>
										<select class="form-control select" id="recojo_select"  required name="recojo" style="width: 100%">
											<option value="">Seleccione Pick-Up Location</option>
											<?php
											foreach($sede as $sd){
												echo '<optgroup label="'.$sd->tipo_sede.'">';

												$mods=explode("@",$sd->sedes);
												foreach($mods as $md) {
													$final = explode("#", $md);
													echo '<option value="'.$final[0].'">'.utf8_decode($final[2]).' ('.$final[1].' - '.utf8_decode($final[3]).')</option>';
												}
												echo '</optgroup>';
											}
											?>
										</select>
									</div>
									<div style="display:none" id="entrega_div" class="col-sm-6">
										<button type="button" id="close_dropoff" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button><label>Drop-Off Location</label>
										<select required class="form-control select" disabled name="entrega" id="entrega" style="width: 100%">
											<option value="">Seleccione Drop-Off Location</option>
											<?php
											foreach($sede as $sd){
												echo '<optgroup label="'.$sd->tipo_sede.'">';

												$mods=explode("@",$sd->sedes);
												foreach($mods as $md) {
													$final = explode("#", $md);
													echo '<option value="'.$final[0].'">'.utf8_decode($final[2]).' ('.$final[1].' - '.utf8_decode($final[3]).')</option>';
												}
												echo '</optgroup>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<label>Date Pick-Up</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
									</div>
								<input required class="form-control" id="datepickup" name="fecha_recojo"  autocomplete="off">
								</div>
							</div>
							<div class="col-sm-3">
								<label>Time Pick-Up</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>
									</div>
								<select class="form-control" name="hora_recojo" id="hora_recojo">
									<?php foreach($hora as $hr){?>
										<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
									<?php }?>
								</select>
								</div>
							</div>
							<div class="col-sm-3">
								<label>Date Drop-Off</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
									</div>
								<input required class="form-control" id="datedropoff" name="fecha_entrega"  autocomplete="off">
								</div>
							</div>
							<div class="col-sm-3">
								<label>Time Drop-Off</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>
									</div>
								<select class="form-control" name="hora_entrega" id="hora_entrega">
									<?php foreach($hora as $hr){?>
										<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
									<?php }?>
								</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<label id="label_days"></label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h6><ins>Datos de Auto</ins></h6>
								<div class="row">
									<div class="col-sm-12">
										<label>Tipo de Auto</label>
										<select required class='form-control multiple' multiple="multiple" name='tipo_auto[]' style="width: 100%">
											<?php foreach($tipo_auto as $ta){?>
												<option value='<?php echo $ta->idtipo_auto?>'><?php echo $ta->nombre?></option>
											<?php }?>
										</select>
									</div>
								</div><br>
								<button class="btn btn-outline-success btn-sm" id="btn_save"><i class="fas fa-save"></i>&nbsp;Guardar</button>&nbsp;
							</div>
						</div>


			</div>
		</div>
	</form>
</div>
<script>
    $('.selectpicker').selectpicker();
    var picker = new Lightpick({
        field: document.getElementById('datepickup'),
        secondField: document.getElementById('datedropoff'),
        singleDate: false,
        format: "YYYY-MM-DD",
        onSelect: function(start, end){
            var str = '';
            str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
            str += end ? end.format('Do MMMM YYYY') : '...';
            document.getElementById('label_days').innerHTML = str;
        }
    });
</script>
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

    $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });

    $(document).on('click', '#close_dropoff', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        // Selecciona cada input que tenga la clase .checar
        $("#entrega_div").css("display","none");
        $("#recojo_div").removeClass("col-sm-6");
        $("#recojo_div").addClass("col-sm-12");
        $('#entrega').prop('disabled', true);
        $("#label_pickup").html('Pick-up Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" checked id="chaeckbox" value="1" name="habilitar">Drop-off at pick-up location');
    });

    $('#hora_recojo').change(function(){
        var hora_recojo = $("#hora_recojo").val();
        $("#hora_entrega option[value='"+hora_recojo+"']").attr("selected",true);
    });

    $(document).ready(function() {
        $('.multiple').select2({
            placeholder: "Seleccione Tipo de Auto...",
            allowClear: true
        });
        $('.select').select2();
    });
    $(document).on('click', '#chaeckbox', function (e) {
//	$('#chaeckbox').click(function() {
        // Si esta seleccionado (si la propiedad checked es igual a true)
        if ($(this).prop('checked')) {


        } else {
            $("#label_pickup").html('Pick-up Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="display:none" type="checkbox" class="form-check-input" id="chaeckbox" value="1" name="habilitar">');
            $("#entrega_div").css("display","block");
            $("#recojo_div").removeClass("col-sm-12");
            $("#recojo_div").addClass("col-sm-6");
            $('#entrega').prop('disabled', false);
        }
    });

    function mayus(e) {
        e.value = e.value.toUpperCase();
    }

    $("#nombre").bind('keypress', function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $("#telf_fijo").bind('keypress', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $("#telf_movil").bind('keypress', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    jQuery('#fecha_recojo').datetimepicker({
        format: 'Y-m-d H:i',
    });

    $(function() {
        $('input[name="fecha_entrega"]').daterangepicker({
            //	timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 30,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'Y.MM.DD'
            }
        });
    });
</script>
