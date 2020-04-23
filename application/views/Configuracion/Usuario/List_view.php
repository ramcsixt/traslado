<?php
$contador=0;
foreach($list_usuario as $view){
$contador++;
	?>
<tr class="fila" data-id="<?php echo $view->idusuario?>">
	<td>

			<label class="control control-checkbox" style="font-size: 12px">
				<input type="checkbox" name="masivo[]" class="check_masivo" value="<?php echo $view->idusuario?>" style="font-size: 12px">
				<?php echo $contador?>
				<div class="control_indicator"></div>
			</label>

	</td>
	<td scope="row"><?php echo $view->nombre?></td>
	<td><?php echo $view->apellido ?></td>
	<td><?php echo $view->correo ?></td>
	<td>
		<?php if($view->roles!=""){?>
			<?php
				$mods=explode("@",$view->roles);
				foreach($mods as $md){
					$final=explode("#",$md); ?>
					<button type="button" class="btn btn-outline-secondary btn-xs delete_mod" data-id="<?php echo $final[0]?>"><?php echo $final[1]?></button>
			<?php	} ?>
		<?php }?>
		<button class="btn btn-outline-info btn-xs asignar_mod" data-id="<?php echo $view->idusuario?>">Gestionar Modulos</button>
	</td>
	<td>
		<div id="div<?php echo $view->idusuario?>" style="display:none">
			<button class="btn btn-outline-secondary btn-xs edit" data-id="<?php echo $view->idusuario?>"><i class="fas fa-edit"></i></button>
			<button class="btn btn-outline-secondary btn-xs change_pw" data-id="<?php echo $view->idusuario?>"><i class="fas fa-key"></i></button>
			<button class="btn btn-outline-danger btn-xs delet" data-id="<?php echo $view->idusuario?>"><i class="fas fa-trash"></i></button>
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
		var idusuario = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Configuracion/Usuario/Edit")?>",
			data: {idusuario:idusuario},
			success: function(data) {
				$("#modal_usuario").iziModal('open');
				$("#body_usuario").html(data);
			}
		});
	});

	$(document).on('click', '.change_pw', function (e) {
		var idusuario = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Configuracion/Usuario/Change_pw")?>",
			data: {idusuario:idusuario},
			success: function(data) {
				$("#modal_usuario").iziModal('open');
				$("#body_usuario").html(data);
			}
		});
	});

	$(document).on('click', '.delet', function (e) {
		var idusuario = $(this).attr("data-id");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Configuracion/Usuario/Destroy")?>",
			data: {idusuario:idusuario},
			success: function(data) {
				$("#modal_usuario").iziModal('open');
				$("#body_usuario").html(data);
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
				$("#modal_usuario").iziModal('open');
				$("#body_usuario").html(data);
			}
		});
	});
</script>
