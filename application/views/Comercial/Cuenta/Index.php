<?php
$dato=array(
	'cuenta'=>'active',
	'list_cuenta'=>'active'
);
?>
<?php $this->load->view("Layouts/Comercial",$dato)?><br>
<style>
	.input-group-text {
		font-size: 12px;
	}
	.iziModal .iziModal-content {
		zoom: 1;
		width: 100%;
		-webkit-overflow-scrolling: touch;
		/* overflow-y: scroll; */
		background-color: #f3f3f3 !important;
	}
	.bootstrap-select > .dropdown-toggle {
		font-size: 12px;
		height: calc(1.5em + 0.75rem + 2px);

	}
	.iziModal .iziModal-header {
		background: #7d7d7d;
		padding: 14px 18px 15px 18px;
		box-shadow: inset 0 -10px 15px -12px rgba(0, 0, 0, 0.3), 0 0 0px #555;
		overflow: hidden;
		position: relative;
		z-index: 10;
	}
</style>
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h5>Cuenta</h5>
					</div>
					<div class="col-sm-8 text-right">
						<button class="btn btn-sm btn-info btnnewcuenta"><i class="fas fa-newspaper"></i>&nbsp;Nuevo</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7">

					</div>
					<div class="col-sm-2">
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
							</div>
							<input type="text" class="form-control" id="cntbusqueda" placeholder="Buscar Cuenta.......">
						</div>
					</div>
				</div>
			</div>
			<div class="card-body" style="height: 100%;">
				<div class="row">
					<div class="col-sm-12">
						<form id="form_masivo">
							<table class="table table-sm table-hover">
								<thead>
								<tr>
									<th scope="col" style="width: 4%">#</th>
									<th scope="col">Nombre y Apellido / Razon Social</th>
									<th scope="col">Tipo de Cuenta</th>
									<th scope="col">Fuente</th>
									<th scope="col">Propietario</th>
									<th scope="col">Movil - Whatsappr</th>

									<th scope="col">Correo electronico</th>
									<th scope="col" style="width: 8%">Acciones</th>
								</tr>
								</thead>
								<tbody id="List_view">

								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view("Footer_principal")?>
<!-- Modal structure -->
<div id="modal_cuenta" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestion de Cuenta" data-iziModal-icon="icon-home">
	<div id="body_cuenta">
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="body_confirmation">

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="preloader" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="background-color: #fff0; color:white; border: 1px solid rgba(0, 0, 0, 0);">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
							<span class="sr-only">Loading...</span>
						</div>
						<h4>Cargando Datos...</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('click', '.btnnewoportunity', function () {
		var idcuenta = '<?php echo $idcuenta?>';
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Oportunidad/Create")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#modal_oportunity").iziModal('open');
				$("#body_oportunity").html(data);
			}
		});
	});

</script>
<script>
    $("#cntbusqueda").on("keydown", function() {
        var busqueda = $("#cntbusqueda").val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Comercial/Cuenta/List_view")?>',
            data: {busqueda:busqueda},
            success: function(data) {
                $("#List_view").html(data);
            }
        })
    });

	$(document).ready(function(){
		List_view();
	});
	//Lista los requerimientos del cliente
	function List_view()
	{
        var busqueda = $("#cntbusqueda").val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Comercial/Cuenta/List_view")?>',
			data: {busqueda:busqueda},
			success: function(data) {
				$("#List_view").html(data);
			}
		})
	}
</script>
<script>
	$(document).on('click', '.btnnewcuenta', function () {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Cuenta/Create")?>",
			data: {},
			success: function(data) {
				$("#modal_cuenta").iziModal('open');
				$("#body_cuenta").html(data);
			}
		});
	});
	$('.btndeletemassive').on('click', function (e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: "<?php echo base_url("Comercial/Cuenta/Delete_massive")?>",
			data: {},
			success: function(data) {
				$("#modal_cuenta").iziModal('open');
				$("#body_cuenta").html(data);
			}
		});
	});

	$(".iziModal").iziModal({
		width: 900,
		radius: 5,
		padding: 20,
		group: 'products',
		loop: true
	});
</script>
