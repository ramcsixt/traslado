<?php if($idcuenta==""){?>
	<?php
	$dato=array(
		'oportunidad'=>'active',
		'list_oportunidad'=>'active'
	);
	?>
	<?php $this->load->view("Layouts/Comercial",$dato)?><br>
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h5>Oportunidad</h5>
					</div>
					<div class="col-sm-8 text-right">
						<button class="btn btn-sm btn-info btnnewoportunity"><i class="fas fa-newspaper"></i>&nbsp;Nuevo</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-9">

					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="Buscar Oportunidad.......">
						</div>
					</div>
				</div>
			</div>
			<?php if($idcuenta==""){?>
			<div class="card-body" style="height: 100%;">
				<?php }else{?>
				<div class="card-body">
					<?php }?>
				<?php }?>
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-sm table-hover">
							<thead>
							<tr>
								<th scope="col" style="width: 4%">#</th>
								<th scope="col">Cuenta</th>
								<th scope="col">Etapa</th>
								<th scope="col">Fecha de Creacion</th>
								<th scope="col">Propietario</th>
								<?php if($idcuenta==""){?>
									<th scope="col" style="width: 8%">Acciones</th>
								<?php }else{?>
									<th scope="col" style="width: 15%">Acciones</th>
								<?php }?>
							</tr>
							</thead>
							<tbody id="List_view_oportunity">

							</tbody>
						</table>
					</div>
				</div>
				<?php if($idcuenta==""){?>
			</div>
		</div>
	</div>

<?php $this->load->view("Footer_principal")?>
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
<?php }?>
<!-- Modal structure -->
<div id="modal_oportunity" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Nueva Oportunidad" data-iziModal-icon="icon-home">
	<div id="body_oportunity">
	</div>
</div>

<script>
	$(document).ready(function(){
		List_view();
	});
	//Lista los requerimientos del cliente
	function List_view()
	{
		var idcuenta = '<?php echo $idcuenta?>';
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Comercial/Oportunidad/List_view")?>',
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#List_view_oportunity").html(data);
			}
		})
	}
</script>
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

	$(".iziModal").iziModal({
		width: 1200,
		radius: 5,
		padding: 20,
		group: 'products',
		loop: true
	});
</script>
