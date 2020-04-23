<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h5>Nueva Cotizacion</h5>
		</div>
	</div>
	<?php foreach($oportunidad as $op){?>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<label>Pick-Up Location</label><br>
							<strong><?php echo $op->pickout?></strong>
						</div>
						<div class="col-sm-6">
							<label>Datetime Pick-Up</label><br>
							<strong><?php echo date("d/m/Y",strtotime($op->fecha_recojo))." ".$op->hora_recojo?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<label>Drop-Off Location:</label><br>
							<strong><?php echo $op->dropoff?></strong>
						</div>
						<div class="col-sm-6">
							<label>Datetime Drop-Off</label><br>
							<strong><?php echo date("d/m/Y",strtotime($op->fecha_entrega))." ".$op->hora_entrega?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
