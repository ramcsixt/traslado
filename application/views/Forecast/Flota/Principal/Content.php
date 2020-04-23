<div class="card-body">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-sm table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Sede</th>
					<th>Estado Central</th>
					<th>Estado Vehiculo</th>
					<th>TNAM</th>
					<th>CRS</th>
					<th>VIN</th>
					<th>Nro. Interno</th>
					<th>Placa</th>
					<th>Rate Subtype</th>
					<th>Nro. Vehiculos</th>
				</tr>
				</thead>
				<tbody id="list_view">
				<?php
				$contador=0;
				foreach($flota->result() as $flot){
					$contador++;
					?>
					<tr>
						<td><?php echo $contador?></td>
						<td>
							<?php echo $flot->branch_code?>
						</td>
						<td><?php echo $flot->central_status?></td>
						<td><?php echo $flot->vehicle_status?></td>
						<td><?php echo $flot->type_short_version?></td>
						<td><?php echo $flot->vehicle_acriss?></td>
						<td><?php echo $flot->vin?></td>
						<td><?php echo $flot->internal_num?></td>
						<td><?php echo $flot->vehicle_plate_number?></td>
						<td><?php echo $flot->rate_subtype?></td>
						<td><?php echo $flot->number_of_vehicles?></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			<p><?php echo $paginacion?></p>
		</div>
	</div>
</div>
