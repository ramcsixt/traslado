<?php if($idcuenta==""){?>
<?php
$dato=array(
	'contacto'=>'active',
	'list_contacto'=>'active'
);
?>
<?php $this->load->view("Layouts/Comercial",$dato)?><br>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-4">
					<h5>Contacto</h5>
				</div>
				<div class="col-sm-8 text-right">
					<button class="btn btn-sm btn-info btnnrecontacto"><i class="fas fa-newspaper"></i>&nbsp;Nuevo</button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<span>Contadores</span>
				</div>
				<div class="col-sm-1">
					<select class="form-control" id="filtro">
						<option value="nombre">Nombre de Contacto</option>
					</select>
				</div>
				<div class="col-sm-3">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Buscar Contacto.......">
					</div>
				</div>
			</div>
		</div>
		<?php if($idcuenta==""){?>
		<div class="card-body">
		<?php }else{?>
		<div class="card-body">
		<?php }?>
<?php }?>
			<div class="row">
				<div class="col-sm-12">
					<form id="form_masivo">
						<table class="table table-sm table-hover">
							<thead>
							<tr>
								<th scope="col" style="width: 4%">#</th>
								<th scope="col">Nombre y Apellido</th>
								<th scope="col">Telefono / Celular</th>
								<th scope="col">Correo</th>
								<th scope="col" style="width: 8%">Acciones</th>
							</tr>
							</thead>
							<tbody id="List_view_contacto">

							</tbody>
						</table>
					</form>
				</div>
			</div>
	<?php if($idcuenta==""){?>
		</div>
	</div>
</div>

<?php $this->load->view("Footer_principal")?>
<?php }?>
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
<!-- Modal structure -->
<div id="modal_contacto" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestion de Contacto" data-iziModal-icon="icon-home">
	<div id="body_contacto">
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
			url: '<?php echo base_url("Comercial/Contacto/List_view")?>',
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#List_view_contacto").html(data);
			}
		})
	}
</script>
<script>
	$(document).on('click', '.btnnrecontacto', function () {
		var idcuenta = '<?php echo $idcuenta?>';
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Contacto/Create")?>",
			data: {idcuenta:idcuenta},
			success: function(data) {
				$("#modal_contacto").iziModal('open');
				$("#body_contacto").html(data);
			}
		});
	});
	$('.btndeletemassive').on('click', function (e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: "<?php echo base_url("Comercial/Contacto/Delete_massive")?>",
			data: {},
			success: function(data) {
				$("#modal_contacto").iziModal('open');
				$("#body_contacto").html(data);
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
