<?php if($idcuenta==""){?>
	<?php
	$dato=array(
		'prospecto'=>'active',
		'list?prospecto'=>'active'
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
<?php }?>

	<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-4">
					<h5>Prospecto</h5>
				</div>
				<div class="col-sm-8 text-right">
					<button class="btn btn-outline-success btn-sm create_prospect">Nuevo Prospecto</button>
					<div class="btn-group" role="group">
						<button type="button" disabled class="btn btn-secondary btn-sm dropdown-toggle btnmasivo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Funciones Multiples
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item btndeletemassive" href="#" type="button"><i class="fas fa-trash"></i>&nbsp;Eliminacion Masiva</a>
							<a class="dropdown-item btnupdatemassive" href="#" type="button"><i class="fas fa-upload"></i>&nbsp;Actualizacion</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">

				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
						</div>
						<input type="text" class="form-control" id="prsbusqueda" placeholder="Buscar Prospecto.......">
					</div>
				</div>
			</div>
		</div>
		<?php if($idcuenta==""){?>
		<div class="card-body">
			<?php }else{?>
			<div class="card-body">
				<?php }?>
				<div class="row">
					<div class="col-sm-12">
						<form id="formmasivo_prospecto">
							<table class="table table-sm table-hover">
								<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre y Apellido</th>
									<th scope="col">Movil - Whatsapp</th>
									<th scope="col">Correo electronico</th>
									<th scope="col">Fuente</th>
									<th scope="col">Fecha registro</th>
									<th scope="col">Producto</th>
									<th scope="col">Propietario</th>
									<th scope="col">Estado</th>
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
<?php if($idcuenta==""){?>
	<?php $this->load->view("Footer_principal")?>
<?php }?>
<!-- Modal structure -->
<div id="modal_prospecto" class="iziModal" data-iziModal-fullscreen="true"  data-iziModal-title="Gestion de Prospecto" data-iziModal-icon="icon-home">
	<div id="body_prospecto">
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="preloader" style="z-index: 99999 !important" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #fff0; color:white; border: 1px solid rgba(0, 0, 0, 0);">
      <div class="modal-body">
   		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
				  <span class="sr-only">Loading...</span>
				</div>
				<h4>Guardando Cambios Realizados</h4>
			</div>
		</div>
      </div>
    </div>
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
<script>

    $(document).on('click', '.btndeletemassive', function () {

    });

    $("#prsbusqueda").on("keydown", function() {
        var busqueda = $("#prsbusqueda").val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Comercial/Prospecto/List_view")?>',
            data: {busqueda:busqueda},
            success: function(data) {
                $("#List_view").html(data);
            }
        })
    });
	$(document).ready(function(){
		List_view();
       // $("#preloader").modal("show");
	});
	//Lista los requerimientos del cliente
	function List_view()
	{
	    var busqueda = $("#prsbusqueda").val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("Comercial/Prospecto/List_view")?>',
			data: {busqueda:busqueda},
			success: function(data) {
				$("#List_view").html(data);
			}
		})
	}
	$(".iziModal").iziModal({
		width: 1200,
		radius: 5,
		padding: 20,
		group: 'products',
		loop: true
	});

    $(document).on('click', '.btnupdatemassive', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $("#preloader").modal("show");
        var formulario = new FormData($("#formmasivo_prospecto")[0]);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Comercial/Prospecto/Update_massive")?>',
            contentType: false,
            processData: false,
            data: formulario,
            success: function(data) {
                if(data!=0){
                    location.reload();
                }else{
                    alert("Error en la funcion Masiva");
                }
            }
        });
    });

	$(document).on('click', '.create_prospect', function () {
		$("#resultado_modal").modal("hide");
	});

	$(document).on('click', '.create_prospect', function () {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("Comercial/Prospecto/Create")?>",
			data: {},
			success: function(data) {
				$("#modal_prospecto").iziModal('open');
				$("#body_prospecto").html(data);
			}
		});
	});

</script>
