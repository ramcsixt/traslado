<?php $this->load->view("Cliente/Layouts/Requerimiento")?><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2">
			<span>Fecha Inicio</span>
			<input class="form-control" type="date" name="f_inicio">
		</div>
		<div class="col-sm-2">
			<span>Fecha Fin</span>
			<input class="form-control" type="date" name="f_fin">
		</div>
		<div class="col-sm-2"><br>
			<button class="btn btn-outline-success btn-sm">Buscar</button>
		</div>
		<div class="col-sm-4"></div>
		<div class="col-sm-2 text-right"><br>
			<div class="dropdown">
				<button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Opciones
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#" id="btn_newreq">Nuevo Req.</a>
					<a class="dropdown-item" href="#">Eliminar</a>
				</div>
			</div>
		</div>
	</div><br>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-sm table-hover">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nro Solicitud</th>
					<th scope="col">Fecha y Hora</th>
					<th scope="col">Localidad</th>
					<th scope="col" style="width: 10%">Estado</th>
					<th scope="col" style="width: 10%">Acciones</th>
				</tr>
				</thead>
				<tbody id="detail_index">

				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_requerimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div id="modal_longitud" class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><span id="label_mdreq"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="body_requerimiento">

			</div>
		</div>
	</div>
</div>
<div id="popover_alert" class="webui-popover-content">
	<div id="body_alert"></div>
</div>
<?php $this->load->view("Footer_principal")?>
<script>
    $(document).ready(function(){
        Detail_index();
    });
    //Lista los requerimientos del cliente
    function Detail_index()
	{
		$.ajax({
            type: 'POST',
            url: '<?php echo base_url("Cliente/Solicitudes/Detail_index")?>',
            data: {},
            success: function(data) {
                $("#detail_index").html(data);
            }
		})
	}

	//Creacion de Nuevo Requerimiento
    $(document).on('click', '#btn_newreq', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Cliente/Solicitudes/Create")?>",
            data: {},
            success: function(data) {
                $("#label_mdreq").html("Crear Solicitud de Cotizacion");
                $("#modal_requerimiento").modal("show");
                $("#body_requerimiento").html(data);
                $("#modal_longitud").addClass("modal-lg");
            }
        });
    });

    //alerta de Requerimiento


        $('#notification').webuiPopover({
            type:'async',
            url:'<?php echo base_url("Cliente/Alertas")?>',
            success:function(data){
				$("#body_alert").html(data);
			}
        });

        $('#alertas').webuiPopover({
            type:'async',
            url:'<?php echo base_url("Cliente/Alertas/Cotizacion")?>',
            success:function(data){
                $("#body_alert").html(data);
            }
        });

</script>
