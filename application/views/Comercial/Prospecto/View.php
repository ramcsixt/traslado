<input id="idprospecto" name="idprospecto" hidden value="<?php echo $idprospecto?>">
<style>
	.two-fields {
		width:100%;
	}
	.two-fields .input-group {
		width:100%;
	}

</style>
<div class="container-fluid"> 
	<form action="<?php echo base_url('Comercial/Prospecto/Converter')?>" onsubmit="return checkSubmit();" id="form_prospecto" method="POST" id="Converterform">
	<?php foreach($prospecto as $prs){?>
	<input hidden name="idprospecto" value="<?php echo $prs->idprospecto?>">
	<input hidden name="utm_name" value="<?php echo $prs->utm_name?>">
	<div id="input_estado">

	</div>
		<div class="card">
			<div class="card-header" style="padding: 12px;">
				<div class="row">
					<div class="col-sm-4">
						<img style="width: 6%" src="<?php echo base_url('Public/img/icon_mods/comercial/user.png')?>" align="left"><span>Nombre y Apellido</span><br>
						<input class="form-control" style="display:none" id="nombre" name="nombre" value="<?php echo $prs->nombre?>">
							<strong id="label_nombre"><?php echo $prs->nombre?></strong>
					</div>
					<div class="col-sm-8 text-right">
						<span>Estado</span><br>
						<?php foreach($estado_prospecto as $std){?>
							<?php if($std->idestado_prospecto==$prs->idestado_prospecto){?>
							<span class="badge badge-<?php echo $std->stylo?>" style="font-size:14px"><?php echo $std->nombre?></span>
							<?php }?>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<span>Correo electronico</span><br>
						<strong id="label_correo"><?php echo $prs->correo?></strong>
						<input class="form-control" style="display:none" id="correo" name="correo" value="<?php echo $prs->correo?>">
					</div>
					<div class="col-sm-2">
						<span>Movil - Whatsapp</span><br>
						<strong id="label_movil"><?php echo $prs->telf_fijo.' '.$prs->telf_movil?></strong>
						<input class="form-control" style="display:none" id="movil" name="telf_movil" value="<?php echo $prs->telf_movil?>">
					</div>
					<div class="col-sm-2">
						<span>Propietario</span><br>
						<strong id="label_propietario"><?php echo $prs->propietario?></strong>
						<select class="form-control" style="display:none" id="propietario" name="propietario">
							<?php foreach($propietario as $pr){?>
								<?php if($pr->idpropietario==$prs->idpropietario){?>
									<option selected value="<?php echo $pr->idpropietario?>"><?php echo $pr->nombre?></option>
								<?php }else{?>
									<option value="<?php echo $pr->idpropietario?>"><?php echo $pr->nombre?></option>
								<?php }?>
							<?php }?>
						</select>
					</div>
					<div class="col-sm-2">
						<label id="label_days"></label>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<div class="card card-body">
					<h5>Datos de Reserva</h5>
					<div class="row">
						<div class="col-sm-3">
							<span>Pick-Up Location</span><br>
							<strong id="label_recojo"><?php echo $prs->recojo?></strong>
							<div id="recojo" style="display:none">
								<select class="form-control select" style="width: 100%" id="idrecojo" name="idrecojo">
									<?php
									foreach($sede as $sd){
										echo '<optgroup label="'.$sd->tipo_sede.'">';
										$mods=explode("@",$sd->sedes);
										foreach($mods as $md) {
											$final = explode("#", $md); ?>
											<?php if($final[0]==$prs->idsede_recojo){?>
												<option selected value="<?php echo $final[0] ?>"><?php echo utf8_decode($final[2]).' ('.$final[1].' - '.utf8_decode($final[3]).')' ?></option>
											<?php }else{?>
												<option value="<?php echo $final[0] ?>"><?php echo utf8_decode($final[2]).' ('.$final[1].' - '.utf8_decode($final[3]).')' ?></option>
											<?php }?>
										<?php }
										echo '</optgroup>';
									} ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group two-fields">
								<span>Datetime Pick-Up</span><br>
								<strong id="label_datepickup"><?php echo $prs->fecha_recojo.' '.$prs->hora_recojo?></strong>
								<div class="row">
									<div class="col-6">
										<input class="form-control"  style="display:none" id="fecha_recojo" name="fecha_recojo" value="<?php echo $prs->fecha_recojo?>">
									</div>
									<div class="col-6">
										<select class="form-control"  style="display:none" id="hora_recojo" name="hora_recojo">
											<?php foreach($hora as $hr){?>
												<?php if($hr->nombre==$prs->hora_recojo){?>
													<option selected value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
												<?php }else{?>
													<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
												<?php }?>
											<?php }?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<span>Drop-Off Location</span><br>
							<strong id="label_entrega"><?php echo $prs->entrega?></strong>
							<div id="entrega" style="display:none">
								<select class="form-control select" style="width: 100%" id="identrega" name="identrega">
									<?php
									foreach($sede as $sd){
										echo '<optgroup label="'.$sd->tipo_sede.'">';
										$mods=explode("@",$sd->sedes);
										foreach($mods as $md) {
											$final = explode("#", $md); ?>
											<?php if($final[0]==$prs->idsede_entrega){?>
												<option selected value="<?php echo $final[0] ?>"><?php echo utf8_decode($final[2]).' ('.$final[1].' - '.utf8_decode($final[3]).')' ?></option>
											<?php }else{?>
												<option value="<?php echo $final[0] ?>"><?php echo utf8_decode($final[2]).' ('.$final[1].' - '.utf8_decode($final[3]).')' ?></option>
											<?php }?>
										<?php }
										echo '</optgroup>';
									} ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group two-fields">
								<span>Datetime Drop-Off</span><br>
								<strong id="label_datedropoff"><?php echo $prs->fecha_entrega.' '.$prs->hora_entrega?></strong>
								<div class="row">
									<div class="col-6">
										<input class="form-control" style="display:none"  id="fecha_entrega" name="fecha_entrega" value="<?php echo $prs->fecha_entrega?>">
									</div>
									<div class="col-6">
										<select class="form-control"  style="display:none" id="hora_entrega" name="hora_entrega">
										<?php foreach($hora as $hr){?>
											<?php if($hr->nombre==$prs->hora_entrega){?>
												<option selected value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
											<?php }else{?>
												<option value="<?php echo $hr->nombre?>"><?php echo date("H:i",strtotime($hr->nombre))?></option>
											<?php }?>
										<?php }?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-12">
							<span>Tipo de Autos</span><br>
							<?php
							$contador=0;
							foreach($detail as $prs_d){
								$contador++;
								?>
								<input hidden name="idtipo_auto[]" value="<?php echo $prs_d->idtipo_auto?>">
								<span class="badge badge-secondary" style="font-size:12px"><?php echo $prs_d->nombre?></span>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-8 text-right">
					<?php if($prs->idestado_prospecto==1){?>
						<button class="btn btn-sm btn-danger converter" type="button" data-id="4"><i class="fas fa-power-off"></i>&nbsp;Cancelar Prospecto</button>
						<button class="btn btn-sm btn-info converter" type="button" data-id="5"><i class="fas fa-newspaper"></i>&nbsp;Convertir a Cuenta</button>
						<button type="button" class="btn btn-sm btn-dark" id="editprospecto"><i class="fas fa-edit"></i>&nbsp;Editar</button>
					<?php }elseif ($prs->idestado_prospecto==4){?>
						<button class="btn btn-sm btn-danger converter" disabled type="button" data-id="4"><i class="fas fa-power-off"></i>&nbsp;Cancelar Prospecto</button>
						<button class="btn btn-sm btn-info converter" disabled type="button" data-id="5"><i class="fas fa-newspaper"></i>&nbsp;Convertir a Cuenta</button>
						<button type="button" class="btn btn-sm btn-dark" disabled id="editprospecto"><i class="fas fa-edit"></i>&nbsp;Editar</button>
					<?php }?>
			</div>
		</div>
	<?php } ?>
	</form>
</div>
<script>
    var picker = new Lightpick({
        field: document.getElementById('fecha_recojo'),
        secondField: document.getElementById('fecha_entrega'),
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

    $(document).ready(function() {
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
            data: {converter:converter,nombre:nombre,correo:correo,movil:movil},
            success: function(data) {
                $("#confirmation").modal("show");
                $("#body_confirmation").html(data);
                $("#input_estado").html("<input hidden name='estado_prospecto' id='estado_prospecto' value='"+converter+"'>");
            }
        });
    });
</script>

<script>
    $(document).on('click', '#editprospecto', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        //Labels
		$("#label_nombre").css("display","none");
        $("#label_correo").css("display","none");
        $("#label_movil").css("display","none");
        $("#label_propietario").css("display","none");
        $("#label_recojo").css("display","none");
        $("#label_entrega").css("display","none");

        $("#label_datepickup").css("display","none");
        $("#label_datedropoff").css("display","none");

		//Inputs
		$("#nombre").css("display","block");
        $("#correo").css("display","block");
        $("#movil").css("display","block");
        $("#propietario").css("display","block");
        $("#recojo").css("display","block");
        $("#entrega").css("display","block");
        $("#fecha_entrega").css("display","block");
        $("#hora_entrega").css("display","block");
        $("#fecha_recojo").css("display","block");
        $("#hora_recojo").css("display","block");


        //Button
        $("#editprospecto").removeClass("btn-dark");
        $("#editprospecto").addClass("btn-success");
        $("#editprospecto").html('<i class="fas fa-save"></i>&nbsp;Guardar');
        $("#editprospecto").attr("id","saveprospecto");

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
            data: {idprospecto:idprospecto,nombre:nombre,correo:correo,movil:movil,propietario:propietario,idrecojo:idrecojo,identrega:identrega,fecha_entrega:fecha_entrega,hora_entrega:hora_entrega,fecha_recojo:fecha_recojo,hora_recojo:hora_recojo},
            success: function(data) {
                if(data==1){
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
