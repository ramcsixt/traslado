<div class="card-body">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-sm table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Ruta</th>
					<th>Usuario</th>
					<th>Origen</th>
					<th>Fecha</th>
					<th>Hora</th>

				</tr>
				</thead>
				<tbody id="list_view">
				<?php
				$contador=0;
				foreach($csv_flota->result() as $json){
					$contador++;
					?>
					<tr>
						<td><?php echo $contador?></td>
						<td><?php echo $json->nombre?></td>
						<td><?php echo $json->ruta?></td>
						<td>
							<?php foreach($usuario as $us){?>
								<?php if($us->idusuario==$json->idusuario){?>
									<?php echo $us->nombre." ".$us->apellido?>
								<?php }?>
							<?php }?>
						</td>

						<td>
							<?php if($json->ipusuario!=""){?>
								<?php echo $json->ipusuario?>
							<?php }else if($json->ipproxy!=""){?>
								<?php echo $json->ipproxy?>
							<?php }else{?>
								<?php echo $json->ipcompartido?>
							<?php }?>
						</td>
						<td><?php echo $json->fecha?></td>
						<td><?php echo $json->hora?></td>

					</tr>
				<?php }?>
				</tbody>
			</table>
			<p><?php echo $paginacion?></p>
		</div>
	</div>
</div>
