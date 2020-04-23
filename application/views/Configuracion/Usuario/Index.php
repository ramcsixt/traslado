<?php
$dato=array(
	'usuario'=>'active',
	'list_usuario'=>'active'
);
?>
<?php $this->load->view("Layouts/Configuracion",$dato)?><br>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-4">
					<h5>Usuario</h5>
				</div>
				<div class="col-sm-8 text-right">
					<button class="btn btn-sm btn-info btnnewuser"><i class="fas fa-newspaper"></i>&nbsp;Nuevo</button>
					<div class="btn-group" role="group">
						<button type="button" disabled class="btn btn-secondary btn-sm dropdown-toggle btnmasivo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Funciones Multiples
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item btndeletemassive" href="#" type="button"><i class="fas fa-trash"></i>&nbsp;Eliminacion Masiva</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9">
					<span>Contadores</span>
				</div>
				<div class="col-sm-2">
					<select class="form-control" id="filtro">
						<option value="nombre">Nombre de Usuario</option>
					</select>
				</div>
				<div class="col-sm-3">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Buscar Usuario.......">
					</div>
				</div>
			</div>
		</div>
		<div class="card-body" style="height: 720px;">
			<div class="row">
				<div class="col-sm-12">
					<form id="form_masivo">
					<table class="table table-sm table-hover">
						<thead>
						<tr>
							<th scope="col" style="width: 4%">#</th>
							<th scope="col">Nombre</th>
							<th scope="col">Apellido</th>
							<th scope="col">Correo</th>
							<th scope="col">Modulos</th>
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
<div id="modal_usuario" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestion de Usuario" data-iziModal-icon="icon-home">
	<div id="body_usuario">
	</div>
</div>
<script>
	$(document).ready(function(){
		List_view();
	});
	//Lista los requerimientos del cliente
	function List_view()
	{
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Configuracion/Usuario/List_view")?>',
			data: {},
			success: function(data) {
				$("#List_view").html(data);
			}
		})
	}
</script>
<script>
	$(document).on('click', '.btnnewuser', function () {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Configuracion/Usuario/Create")?>",
			data: {},
			success: function(data) {
				$("#modal_usuario").iziModal('open');
				$("#body_usuario").html(data);
			}
		});
	});
	$('.btndeletemassive').on('click', function (e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: "<?php echo base_url("Configuracion/Usuario/Delete_massive")?>",
			data: {},
			success: function(data) {
				$("#modal_usuario").iziModal('open');
				$("#body_usuario").html(data);
			}
		});
	});

	$(".iziModal").iziModal({
		width: 700,
		radius: 5,
		padding: 20,
		group: 'products',
		loop: true
	});
</script>
