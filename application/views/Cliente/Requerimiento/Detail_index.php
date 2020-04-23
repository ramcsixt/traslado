<tr class="fila" data-id="1">
	<td scope="row">1</td>
	<td>REQ-589</td>
	<td><?php echo date("d/m/Y H:i:s")?></td>
	<td>CARAL</td>
	<td><span class="badge badge-warning" style="font-size:12px">Pendiente</span></td>
	<td>
		<div id="div1" style="display:none">
			<button class="btn btn-outline-secondary btn-xs edit" data-id="1"><i class="fas fa-edit"></i></button>
			<button class="btn btn-outline-secondary btn-xs"><i class="fas fa-eye"></i></button>
			<button class="btn btn-outline-danger btn-xs"><i class="fas fa-trash"></i></button>
		</div>
	</td>
</tr>
<tr class="fila" data-id="2">
	<td scope="row">2</td>
	<td>REQ-590</td>
	<td><?php echo date("d/m/Y H:i:s")?></td>
	<td>PARACAS</td>
	<td><span class="badge badge-warning" style="font-size:12px">Pendiente</span></td>
	<td>
		<div id="div2" style="display:none">
			<button class="btn btn-outline-secondary btn-xs edit" data-id="2"><i class="fas fa-edit"></i></button>
			<button class="btn btn-outline-secondary btn-xs view"><i class="fas fa-eye"></i></button>
			<button class="btn btn-outline-danger btn-xs delete"><i class="fas fa-trash"></i></button>
		</div>
	</td>
</tr>
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
    $(document).on('click', '.edit', function (e) {
        var idrequerimiento = $(this).attr("data-id");
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
			type: "POST",
			url: "<?php echo base_url("Cliente/Requerimiento/Edit")?>",
			data: {idrequerimiento:idrequerimiento},
            success: function(data) {
			    $("#label_mdreq").html("Editar Cotizacion "+idrequerimiento);
                $("#modal_requerimiento").modal("show");
				$("#body_requerimiento").html(data);
                $("#modal_longitud").addClass("modal-lg");
            }
		});
    });
</script>
