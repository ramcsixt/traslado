<table class="table table-sm table-hover">
	<thead>
	<tr>
		<th>#</th>
		<th>Nro Reserva</th>
		<th>Estado</th>
		<th>Pick-Up</th>
		<th>Fecha Pick-Up</th>
		<th>Hora Pick-Up</th>
		<th>Drop-Off</th>
		<th>Fecha Drop-Off</th>
		<th>Hora Drop-Off</th>
		<th>Vehiculo</th>
		<th>Rate</th>
	</tr>
	</thead>
	<tbody id="list_view">
	<?php
	$contador=0;
	foreach($reserva->result() as $rsv){
		$contador++;
		?>
		<tr>
			<td><?php echo $contador?></td>
			<td><?php echo $rsv->reservation_number?></td>
			<td><?php echo $rsv->status?></td>
			<td>
				<?php foreach($branch as $brn){?>
					<?php if($brn->idbranch==$rsv->pick_up_branch_code){?>
						<?php echo $brn->nombre?>
					<?php }?>
				<?php }?>
			</td>
			<td><?php echo $rsv->pick_up_date?></td>
			<td><?php echo $rsv->pick_up_hour?></td>
			<td>
				<?php foreach($branch as $brn){?>
					<?php if($brn->idbranch==$rsv->drop_off_branch_code){?>
						<?php echo $brn->nombre?>
					<?php }?>
				<?php }?>
			</td>
			<td><?php echo $rsv->drop_off_date?></td>
			<td><?php echo $rsv->drop_off_hour?></td>
			<td><?php echo $rsv->vehicle_acriss?></td>
			<td><?php echo $rsv->rate?></td>
		</tr>
	<?php }?>
	</tbody>
</table>
<ul class="pagination pull-right">
	<?php echo $paginacion ?>
</ul>

