<?php
$contador=0;
foreach($list_cuenta as $view){
	$contador++;
	?>
	<tr class="fila" data-id="<?php echo $view->idcuenta?>">
		<td>

			<label class="control control-checkbox" style="font-size: 12px">
				<input type="checkbox" name="masivo[]" class="check_masivo" value="<?php echo $view->idcuenta?>" style="font-size: 12px">
				<?php echo $contador?>
				<div class="control_indicator"></div>
			</label>
		</td>

		<td scope="row">
			<?php if(is_null($view->razon_social)){?>
				<?php echo $view->nombre." ".$view->apellido?>
			<?php }else{?>
				<?php echo $view->razon_social?>
			<?php }?>
		</td>
		<td><?php echo $view->tipo_cuenta?></td>
		<td style="vertical-align: middle"><i class="<?php echo $view->utm_icon?> fa-1x"></i>&nbsp;<?php echo $view->utm_name?></td>
		<td><?php echo $view->usuario?></td>
		<td><?php echo $view->celular?></td>
		<td><?php echo $view->correo?></td>
		<td>
			<div id="div<?php echo $view->idcuenta?>" style="display:none">

				<a class="btn btn-outline-secondary btn-xs" href="<?php echo base_url("Comercial/Cuenta/View/".$view->idcuenta)?>" title="Gestionar Cuenta"><i class="fas fa-users-cog"></i></a>
				<button class="btn btn-outline-danger btn-xs destroy" data-id="<?php echo $view->idcuenta?>" title="Eliminar"><i class="fas fa-trash"></i></button>
			</div>
		</td>
	</tr>
<?php } ?>
<script>
    $(document).on('click', '.destroy', function (e) {
        var idcuenta = $(this).attr("data-id");
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Comercial/Cuenta/Delete")?>",
            data: {idcuenta:idcuenta},
            success: function(data) {
                $("#body_confirmation").html(data);
                $("#confirmation").modal("show");
            }
        });
    });
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
		var idcuenta = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Cuenta/Edit")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#modal_cuenta").iziModal('open');
				$("#body_cuenta").html(data);
			}
		});
	});

	$(document).on('click', '.delet', function (e) {
		var idcuenta = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Cuenta/Destroy")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#modal_cuenta").iziModal('open');
				$("#body_cuenta").html(data);
			}
		});
	});

	$(document).on('click', '.asignar_mod', function (e) {
		var idusuario = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Configuracion/Usuario/Asignar_modulo")?>",
			data: {idusuario:idusuario},
			success: function(data) {
				$("#modal_cuenta").iziModal('open');
				$("#body_cuenta").html(data);
			}
		});
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
