		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="<?php echo base_url("Public/system/js/bootstrap.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/jspanel.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/iziModal.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/jquery.webui-popover.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/select2.full.js")?>"></script>
		<!-- Resources -->
		<script src="https://www.amcharts.com/lib/4/core.js"></script>
		<script src="https://www.amcharts.com/lib/4/charts.js"></script>
		<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
		<script src="<?php echo base_url("Public/system/js/jquery.datetimepicker.full.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/moment.min.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/daterangepicker.js")?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
		<script src="<?php echo base_url("Public/system/jquery_ui/jquery-ui.js")?>"></script>
		<script src="<?php echo base_url("Public/system/js/lightpick.js")?>"></script>
		<script src="<?php echo base_url("Public/fonts/js/all.js")?>"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
		<script src="<?php echo base_url("Public/system/js/bootstrap-select.js")?>"></script>
		<script src="<?php echo base_url("resource/plugins/js/ai_datepicker/datepicker.js") ?>"></script>
		<script src="<?php echo base_url("resource/plugins/js/ai_datepicker/i18n/datepicker.es.js") ?>"></script>
		<script src="<?php echo base_url("resource/plugins/js/tags/bootstrap-tagsinput.js") ?>"></script>
		<script src="<?php echo base_url("resource/plugins/js/wizard/jquery.smartWizard.js")?>"></script>



		<!-- Modal -->
		<div class="modal fade" id="resultado_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Resultado de Busqueda</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="resultado">

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="modal_out" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Control de Sesion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12 text-center">
									<h5>¿Realmente Desea Cerrar Sesion en el Sistema?</h5><br>
									<a href="<?php echo base_url("Login/Cerrar_sesion")?>" class="btn btn-outline-success">Si, Cerrar Sesion</a>
									<button class="btn btn-outline-danger" data-dismiss="modal">No, Continuar en Sistema</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="modal_outclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Control de Sesion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12 text-center">
									<h5>¿Realmente Desea Cerrar Sesion en el Sistema?</h5><br>
									<a href="<?php echo base_url("Cliente/Login/Cerrar_sesion")?>" class="btn btn-outline-success">Si, Cerrar Sesion</a>
									<button class="btn btn-outline-danger" data-dismiss="modal">No, Continuar en Sistema</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$("#search_auto").keypress(function(e) {
					var cliente = $("#search_auto").val();
					if(e.which == 13) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url:  '<?php echo base_url("Comercial/Busqueda/Cliente")?>',
							data: {cliente:cliente},
							success: function(response){
								$("#resultado_modal").modal("show");
								$("#resultado").html(response);
							}
						});
					}
				});
			});


            $(document).on('click', '#btncerrarsession', function (e) {
				$("#modal_out").modal("show");
            });
            $(document).on('click', '#btnlogout_client', function (e) {
                $("#modal_outclient").modal("show");
            });
		</script>
	</body>
</html>
