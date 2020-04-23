<div class="card-body">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-sm table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Placa de Vehiculo</th>
					<th>Modelo de Vehiculo</th>
					<th>Nro de Renta</th>
					<th>Pick-Up</th>
					<th>Fecha Pick-Up</th>
					<th>Fecha Drop-Off</th>
					<th>Hora Drop-Off</th>
					<th>Vehiculo</th>
					<th>Rate</th>
				</tr>
				</thead>
				<tbody id="list_view">
					<?php
					$contador=0;
					foreach($devolucion->result() as $rsv){
						$contador++;
						?>
						<tr>
							<td><?php echo $contador?></td>
							<td><?php echo $rsv->vehicle_plate_number?></td>
							<td><?php echo $rsv->vehicle_model?></td>
							<td><?php echo $rsv->rental_number?></td>
							<td>
								<?php foreach($branch as $brn){?>
									<?php if($brn->idbranch==$rsv->pick_up_branch_code){?>
										<?php echo $brn->nombre?>
									<?php }?>
								<?php }?>
							</td>
							<td><?php echo $rsv->pick_up_date?></td>
							<td><?php echo $rsv->drop_off_date?></td>
							<td><?php echo $rsv->drop_off_hour?></td>
							<td><?php echo $rsv->vehicle_acriss?></td>
							<td><?php echo $rsv->rate?></td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			<p><?php echo $paginacion?></p>
		</div>
	</div>
</div>
