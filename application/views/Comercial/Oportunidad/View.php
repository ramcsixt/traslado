<?php
$dato=array(
	'oportunidad'=>'active',
	'idoportunidad'=>$idoportunidad
);
?>
<?php $this->load->view("Layouts/Comercial",$dato)?><br>
<input id="idoportunidad" hidden value="<?php echo $idoportunidad?>">
<div class="container-fluid">
	<?php foreach($oportunidad as $op){?>
	<div class="card">
		<div class="card-header" style="padding: 12px;">
			<div class="row">
				<div class="col-sm-4">
					<img style="width: 6%" src="<?php echo base_url('Public/img/icon_mods/comercial/user.png')?>" align="left">&nbsp;<span>Nombre de Oportunidad</span><br>
					&nbsp;<strong><?php echo $op->nombre?></strong>
				</div>
				<div class="col-sm-8 text-right">
					<button class="btn btn-info btn-sm create_cotizacion" data-id="<?php echo $op->idoportunidad?>">Nueva Cotizacion</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-2">
					<span>Pick-Up Location</span><br>
					<strong><?php echo $op->pickout?></strong>
				</div>
				<div class="col-sm-2">
					<span>Datime Pick-Up</span><br>
					<strong><?php echo $op->fecha_recojo." ".$op->hora_recojo?></strong>
				</div>
				<div class="col-sm-2">
					<span>Drop-Off Location</span><br>
					<strong><?php echo $op->dropoff?></strong>
				</div>
				<div class="col-sm-2">
					<span>Datetime Drop Off</span><br>
					<strong><?php echo $op->fecha_entrega." ".$op->hora_entrega?></strong>
				</div>
				<div class="col-sm-2">
					<span>Tipo de Auto</span><br>
					<strong><?php echo $op->tipo_auto?></strong>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
		</div>
	</div><br>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-sm table-hover">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tipo de Auto</th>
							<th scope="col" style="width: 5%">Acciones</th>
						</tr>
						</thead>
						<tbody>			

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<?php $this->load->view("footer_principal")?>
<div id="modal_cotizacion" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestionar Cotizacion" data-iziModal-icon="icon-home">
	<div id="body_cotizacion">
	</div>
</div>
<script>
	$(document).on('click', '.create_cotizacion', function (e) {
		var iddetalle_oportunidad = $(this).attr("data-id");
		var idoportunidad = $("#idoportunidad").val();
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Cotizacion/Create")?>",
			data: {iddetalle_oportunidad:iddetalle_oportunidad,idoportunidad:idoportunidad},
			success: function(data) {
				$("#modal_cotizacion").iziModal('open');
				$("#body_cotizacion").html(data);
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
