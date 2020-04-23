<?php $this->load->view("Layouts/Prospecto")?><br><br>
<style>
	.select2-container .select2-selection--single {
		height: 32px;
	}
	.card-header {
		color: white;
		background-color: rgb(239, 123, 0);
	}
	.form-control {
		border: 1px solid #ef7b004a;
	}
	.form-control:focus {
		color: #495057;
		background-color: #fff;
		border-color: #ef7b0099;
		outline: 0;
		box-shadow: 0 0 0 0.2rem rgba(239, 123, 0, 0.47);
	}
	.select2-container--default .select2-selection--single {
		background-color: #fff;
		border: 1px solid #ef7b004a;
		border-radius: 4px;
	}
	.select2-container--default .select2-selection--multiple {
		background-color: white;
		border: 1px solid #ef7b004a;
		border-radius: 4px;
		cursor: text;
	}
	body{
		background-color: #4e4e4e;
		font-size: 12px;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		display: flex;
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
	.centrado{
		margin-left: auto;
		margin-right: auto;
		vertical-align:middle;
	}
	.close {
		float: right;
		font-size: 18px;
		font-weight: 700;
		line-height: 1;
		color: #000;
		text-shadow: 0 1px 0 #fff;
		opacity: .5;
	}
</style>
<div class="container">
	<form action="<?php echo base_url('Reservas/Store')?>" onsubmit="return checkSubmit();"  method="post">
		<input hidden value="<?php echo $utm_source?>" name="utm_name">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-8 centrado">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 text-center">
								<img src="<?php echo base_url("public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 20%">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<h6>Datos de Contacto</h6>
								<div class="row">
									<div class="col-sm-8">
										<label>Nombres y Apellidos</label>
										<input onkeyup="mayus(this);" autocomplete="off" required class="form-control" id="apellido" name="nombre_apellido" placeholder="Ingrese nombres y apellidos...">
									</div>
									<div class="col-sm-4">
										<label>Movil - Whatsapp</label>
										<input class="form-control"  autocomplete="off" required id="telf_movil" name="telf_movil" placeholder="Ingrese Movil - Whatsapp...">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label>Correo electrónico</label>
										<input class="form-control"  autocomplete="off" required type="email" name="correo" placeholder="Ingrese correo electrónico...">
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
								<input required class="form-control" id="datepickup" name="fecha_recojo"  autocomplete="off">
							</div>
							<div class="col-sm-3">
								<label>Time Pick-Up</label>
								<select class="form-control" name="hora_recojo" id="hora_recojo">
									<?php foreach($hora as $hr){?>
										<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-sm-3">
								<label>Date Drop-Off</label>
								<input required class="form-control" id="datedropoff" name="fecha_entrega"  autocomplete="off">
							</div>
							<div class="col-sm-3">
								<label>Time Drop-Off</label>
								<select class="form-control" name="hora_entrega" id="hora_entrega">
									<?php foreach($hora as $hr){?>
										<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
									<?php }?>
								</select>
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
								<button class="btn btn-outline-success btn-sm" id="btn_save">Enviar Solicitud</button>&nbsp;
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?php $this->load->view("Footer_principal")?>
<!-- Modal -->
<div class="modal fade" id="preloader" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    $("#apellido").bind('keypress', function(event) {
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



    $(document).ready(function(){
        var i = 0;
        $(".agregar_item").click(function(){
            if(i<20){
                i++;
            }
            var nuevaFila="<tr> \
				<td>"+i+"</td> \
				<td>\
				<select class='form-control' name='tipo_auto[]'>\
				\<option value=''>Seleccione Tipo de Auto</option>\
				<?php foreach($tipo_auto as $ta){?>\
				<option value='<?php echo $ta->idtipo_auto?>'><?php echo $ta->nombre?></option>\
				<?php }?>\
				</select>\
				</td> \
				<td><button type='button' class='btn btn-outline-danger btn-sm del'><i class='fas fa-trash'></i></button></td> \
			</tr>";
            $("#tabla_view tbody").append(nuevaFila);
            if(i>0){
                $("#btn_save").prop("disabled",false);
            }else{
                $("#btn_save").prop("disabled",true);
            }
        });

        // evento para eliminar la fila
        $("#tabla_view").on("click", ".del", function(){
            if (i > 0) {--i;}
            if(i>0){
                $("#btn_save").prop("disabled",false);
            }else{
                $("#btn_save").prop("disabled",true);
            }
            $(this).parents("tr").remove();
        });
    });
</script>
