<?php
$contador=0;
foreach($list_contacto as $view){
	$contador++;
	?>
	<tr class="fila" data-id="<?php echo $view->idcontacto?>">
		<td>

			<label class="control control-checkbox" style="font-size: 12px">
				<input type="checkbox" name="masivo[]" class="check_masivo" value="<?php echo $view->idcontacto?>" style="font-size: 12px">
				<?php echo $contador?>
				<div class="control_indicator"></div>
			</label>
		</td>

		<td scope="row">
				<?php echo $view->nombre." ".$view->apellido?>
		</td>
		<td><?php echo $view->telefono." ".$view->celular?></td>
		<td><?php echo $view->correo?></td>
		<td>
			<div id="div<?php echo $view->idcontacto?>" style="display:none">
				<button class="btn btn-outline-secondary btn-xs edit" data-id="<?php echo $view->idcontacto?>" title="Editar Contacto"><i class="fas fa-edit"></i></button>
				<button class="btn btn-outline-danger btn-xs delet" data-id="<?php echo $view->idcontacto?>" title="Eliminar Contacto"><i class="fas fa-trash"></i></button>
			</div>
		</td>
	</tr>
<?php } ?>
<script>
	$( '.check_masivo' ).on( 'change', function() {
		if( $(this).is(':checked') ){
			$("input:checkbox:checked").each(
				function() {
					var checked = $(".check_masivo:checked").length;
					if(checked>=2){
						$("#seleccion_masiva").html("Has Seleccionado "+checked);
						$(".btnmasivo").prop('disabled', false);
					}
				}
			);
		} else {
			$(".btnmasivo").prop('disabled', true);
			$("input:checkbox:checked").each(
				function() {
					var checked = $(".check_masivo:checked").length;
					if(checked>=2){
						$("#seleccion_masiva").html("Has Seleccionado "+checked);
						$(".btnmasivo").prop('disabled', false);
					}
				}
			);
		}
	});
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

	$(document).on('click', '.edit', function (e) {
		var idcontacto = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Contacto/View")?>",
			data: {idcontacto:idcontacto},
			success: function(data) {
				$("#modal_contacto").iziModal('open');
				$("#body_contacto").html(data);
			}
		});
	});

	$(document).on('click', '.delet', function (e) {
		var idcontacto = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Contacto/Delete")?>",
			data: {idcontacto:idcontacto},
			success: function(data) {
				$("#confirmation").modal('show');
				$("#body_confirmation").html(data);
			}
		});
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
