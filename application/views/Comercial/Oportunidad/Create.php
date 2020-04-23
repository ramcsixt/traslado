<div class="container-fluid">
	<form action="<?php echo base_url("Comercial/Oportunidad/Store")?>" method="POST">
	<div class="row">
		<div class="col-sm-12 text-right">
			<?php foreach($cuenta as $cnt){?>
				<?php if($cnt->razon_social==""){?>
					<h6><span class="badge badge-primary"><?php echo $cnt->nombre." ".$cnt->apellido?></span></h6>
				<?php }else{?>
					<h6><span class="badge badge-primary"><?php echo $cnt->razon_social?></span></h6>
				<?php }?>
			<?php }?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<img src="<?php echo base_url("public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 25%">
		</div>
		<div class="col-sm-4">
			<?php if($idcuenta==""){?>
				<label>Cuenta</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-alt"></i></span>
					</div>
					<select class="form-control" name="idcuenta">
						<?php foreach($list_cuenta as $lst_cnt){?>
							<option value="<?php echo $lst_cnt->idcuenta?>"><?php echo $lst_cnt->nombre." ".$lst_cnt->apellido." ".$lst_cnt->razon_social?></option>
						<?php }?>
					</select>
				</div>
			<?php }else{?>
				<?php foreach($list_cuenta as $lst_cnt){?>
					<?php if($idcuenta==$lst_cnt->idcuenta){?>
						<label>Cuenta</label>
						<input class="form-control" disabled value="<?php echo $lst_cnt->nombre." ".$lst_cnt->apellido." ".$lst_cnt->razon_social?>">
						<input name="idcuenta" value="<?php echo $idcuenta?>" hidden>
					<?php }?>
				<?php }?>
			<?php } ?>
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
	</form>
</div>
<script>
	$(document).ready(function() {
		$('.multiple').select2({
			placeholder: "Seleccione Tipo de Auto...",
			allowClear: true
		});
		$('.select').select2();
	});
	$(document).on('click', '#chaeckbox', function (e) {
		if ($(this).prop('checked')) {
		} else {
			$("#label_pickup").html('Pick-up Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="display:none" type="checkbox" class="form-check-input" id="chaeckbox" value="1" name="habilitar">');
			$("#entrega_div").css("display","block");
			$("#recojo_div").removeClass("col-sm-12");
			$("#recojo_div").addClass("col-sm-6");
			$('#entrega').prop('disabled', false);
		}
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
	$('#chaeckbox').click(function() {
		// Si esta seleccionado (si la propiedad checked es igual a true)
		if ($(this).prop('checked')) {
			// Selecciona cada input que tenga la clase .checar
			$('#entrega').prop('disabled', true);
		} else {
			// Deselecciona cada input que tenga la clase .checar
			$('#entrega').prop('disabled', false);
		}
	});

</script>
