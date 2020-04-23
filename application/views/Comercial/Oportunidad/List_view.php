<?php
$contador=0;
foreach($oportunidad as $view){
	$contador++;
	?>
<tr class="fila" data-id="<?php echo $view->idoportunidad?>">
	<th style="font-size: 16px" scope="row"><?php echo $contador?></th>
	<td><?php echo $view->cuenta." ".$view->razon_social?></td>
	<td><?php echo $view->estapa_oportunidad?></td>
	<td><?php echo $view->fecha_in?></td>
	<td><?php echo $view->propietario?></td>
	<td>
		<div id="div<?php echo $view->idoportunidad?>" style="display:none">
			<a class="btn btn-outline-secondary btn-xs" href="<?php echo base_url("Comercial/Oportunidad/View/".$view->idoportunidad)?>" title="Gestionar Oportunidad"><i class="fas fa-users-cog"></i></a>
			<button class="btn btn-outline-success btn-xs confirmation" data-id="<?php echo $view->idoportunidad?>"  title="Confirmar Oportunidad"><i class="fas fa-check"></i></button>
			<button class="btn btn-outline-danger btn-xs delet" data-id="<?php echo $view->idoportunidad?>"  title="Eliminar Oportunidad"><i class="fas fa-trash"></i></button>
		</div>
	</td>
</tr>
<?php }?>
<script>
	$( ".fila" )
		.mouseenter(function() {
			var divid = $(this).attr("data-id");
			$("#div"+divid).fadeIn();
			$("#div"+divid).css("display","block");
		})
		.mouseleave(function() {
			var divid = $(this).attr("data-id");
			$("#div"+divid).fadeOut();

		});

		$(document).on('click', '.delet', function (e) {
			var idoportunidad = $(this).attr("data-id");
			e.preventDefault();
			e.stopImmediatePropagation();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url("Comercial/Oportunidad/Delete")?>",
				data: {idoportunidad:idoportunidad},
				success: function(data) {
					$("#body_confirmation").html(data);
					$("#confirmation").modal("show");
				}
			});
		});

	$(document).on('click', '.confirmation', function (e) {
		var idoportunidad = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Oportunidad/Confirmation")?>",
			data: {idoportunidad:idoportunidad},
			success: function(data) {
				$("#body_confirmation").html(data);
				$("#confirmation").modal("show");
			}
		});
	});
</script>
