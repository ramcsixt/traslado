<?php
$contador=0;
foreach($prospecto as $view){

	if($view->contador>0){
		$contador++;
	?>
	<tr class="fila" data-id="<?php echo $view->idprospecto?>" id="file<?php echo $view->idprospecto?>">
		<td>
			<label class="control control-checkbox" style="font-size: 12px">
				<input type="checkbox" name="masivo[]" class="check_masivo" value="<?php echo $view->idprospecto?>" style="font-size: 12px">
				<?php echo $contador?>
				<input hidden disabled id="idprospecto<?php echo $view->idprospecto?>" name="idprospecto[]" value="<?php echo $view->idprospecto?>">
				<div class="control_indicator"></div>
			</label>
		</td>
		<td>
			<span id="label_nombre<?php echo $view->idprospecto?>"><?php echo $view->nombre?></span>
			<input class="form-control" id="input_nombre<?php echo $view->idprospecto?>" name="nombre[]" placeholder="Ingrese Nombre y Apellido..." disabled style="display:none" value="<?php echo $view->nombre?>">
		</td>
		<td>
			<span id="label_movil<?php echo $view->idprospecto?>"><?php echo $view->telf_movil?></span>
			<input class="form-control" id="input_movil<?php echo $view->idprospecto?>" name="movil[]" placeholder="Ingrese Movil - Whatsapp..."  disabled style="display:none" value="<?php echo $view->telf_movil?>">
		</td>
		<td>
			<span id="label_correo<?php echo $view->idprospecto?>"><?php echo $view->correo?></span>
			<input class="form-control" id="input_correo<?php echo $view->idprospecto?>" name="correo[]" placeholder="Ingrese Correo Electrónico..."  disabled style="display:none" value="<?php echo $view->correo?>">
		</td>
		<td style="vertical-align: middle">
			<select id="input_fuente<?php echo $view->idprospecto?>" class="form-control" name="input_fuente[]" style="display:none">
				<?php foreach($fuente as $fnt){?>
					<?php if($fnt->utm_name==$view->utm_name){?>
						<option selected value="<?php echo $fnt->utm_name?>"><?php echo $fnt->utm_name?></option>
					<?php }else{?>
						<option value="<?php echo $fnt->utm_name?>"><?php echo $fnt->utm_name?></option>
					<?php }?>
				<?php }?>
			</select>
			<i id="label_fuente<?php echo $view->idprospecto?>" class="<?php echo $view->utm_icon?> fa-1x"></i>&nbsp;<?php echo $view->utm_name?>
		</td>
		<td><?php echo date('d/m/Y',strtotime($view->fecha_registro))." ".$view->hora_registro?></td>
		<td><?php echo $view->producto?></td>
		<td><?php echo $view->propietario?></td>
		<td><button class="btn btn-<?php echo $view->estilo ?> btn-xs"><?php echo $view->estado?></td>
		<td>
			<div id="div<?php echo $view->idprospecto?>" style="display:none">
				<button class="btn btn-outline-warning btn-xs edit" id="edit<?php echo $view->idprospecto?>" data-id="<?php echo $view->idprospecto?>" data-toggle="tooltip" data-placement="bottom" title="Editar Prospecto"><i class="fas fa-user-edit"></i></button>
				<button class="btn btn-outline-secondary btn-xs view" data-id="<?php echo $view->idprospecto?>" data-id1="<?php echo $view->idproducto?>" data-toggle="tooltip" data-placement="bottom" title="Ver Prospecto"><i class="fas fa-users-cog"></i></button>

				<button class="btn btn-outline-danger btn-xs destroy" data-id="<?php echo $view->idprospecto?>" data-toggle="tooltip" data-placement="bottom" title="Eliminar Prospecto"><i class="fas fa-trash"></i></button>
			</div>
		</td>
	</tr>
		<script>
            $(document).on('click', '#edit<?php echo $view->idprospecto?>', function (e) {
                var idprospecto = '<?php echo $view->idprospecto?>';
                e.preventDefault();
                e.stopImmediatePropagation();
                $("#label_nombre"+idprospecto).css("display","none");
                $("#label_movil"+idprospecto).css("display","none");
                $("#label_correo"+idprospecto).css("display","none");
                $("#label_fuente"+idprospecto).css("display","none");
                $("#fila"+idprospecto).css("background-color","#3838383b");

                $("#idprospecto"+idprospecto).prop("disabled",false);

                $("#input_nombre"+idprospecto).css("display","block");
                $("#input_nombre"+idprospecto).prop( "disabled", false );

                $("#input_movil"+idprospecto).css("display","block");
                $("#input_movil"+idprospecto).prop( "disabled", false );

                $("#input_fuente"+idprospecto).css("display","block");

                $("#input_correo"+idprospecto).css("display","block");
                $("#input_correo"+idprospecto).prop( "disabled", false );

                $("#edit"+idprospecto).removeClass("btn-outline-warning");
                $("#edit"+idprospecto).addClass("btn-outline-info");
                $("#edit"+idprospecto).attr("id","block"+idprospecto);
            });

            $(document).on('click', '#block<?php echo $view->idprospecto?>', function (e) {
                var idprospecto = '<?php echo $view->idprospecto?>';
                e.preventDefault();
                e.stopImmediatePropagation();
                $("#label_nombre"+idprospecto).css("display","block");
                $("#label_movil"+idprospecto).css("display","block");
                $("#label_correo"+idprospecto).css("display","block");
                $("#label_fuente"+idprospecto).css("display","block");
                $("#fila"+idprospecto).css("background-color","none");

                $("#idprospecto"+idprospecto).prop("disabled",true);

                $("#input_nombre"+idprospecto).css("display","none");
                $("#input_nombre"+idprospecto).prop( "disabled", true );

                $("#input_movil"+idprospecto).css("display","none");
                $("#input_movil"+idprospecto).prop( "disabled", true );

                $("#input_correo"+idprospecto).css("display","none");
                $("#input_correo"+idprospecto).prop( "disabled", true );

                $("#input_fuente"+idprospecto).css("display","none");

                //    $(".block").removeClass("btn-outline-info");
                $("#block"+idprospecto).removeClass("btn-outline-info");
                $("#block"+idprospecto).addClass("btn-outline-warning");
                $("#block"+idprospecto).attr("id","edit"+idprospecto);
            });
		</script>
<?php }else{  ?>
		<tr>
			<td colspan="6" class="text-center">No se encontron ninguna coincidencia :(</td>
		</tr>
<?php } }?>
<script>

	$(document).on('click', '.view', function (e) {
		var idprospecto = $(this).attr("data-id");
		var idproducto = $(this).attr("data-id1");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			type: "GET",
			url: "<?php echo base_url("Comercial/Prospecto/View/")?>"+idprospecto+"/"+idproducto,
			data: {},
			success: function(data) {
				$("#modal_prospecto").iziModal('open');
				$("#body_prospecto").html(data);
			}
		});
	});

    $(document).on('click', '.destroy', function (e) {
        var idprospecto = $(this).attr("data-id");
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Comercial/Prospecto/Delete")?>",
            data: {idprospecto:idprospecto},
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
					if(checked>=1){
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
					if(checked>=1){
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
</script>
