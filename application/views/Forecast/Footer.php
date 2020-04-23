<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url("resource/plugins/js/jquery.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/js/bootstrap.bundle.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/js/bootstrap.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/fonts/all.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/js/moment.min.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/js/lightpick.js")?>"></script>

<script src="<?php echo base_url("resource/plugins/js/fileinput.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/js/fileinput_es.js")?>"></script>
<script src="<?php echo base_url("resource/plugins/js/theme.js")?>"></script>
<script>
    $(document).on('click', '.btnupreserva', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Forecast/Reserva/Upload")?>",
            data: {},
            success: function(data) {
                $("#modal_upload").modal('show');
                $("#label_upload").html("Carga de Json Reservas");
                $("#body_upload").html(data);
            }
        });
    });
</script>
<script>
    $(document).on('click', '.btnupdevolucion', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Forecast/Devolucion/Upload")?>",
            data: {},
            success: function(data) {
                $("#modal_upload").modal('show');
                $("#label_upload").html("Carga de Json Devoluciones");
                $("#body_upload").html(data);
            }
        });
    });

    $(document).on('click', '.btnupflota', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("Forecast/Flota/Upload")?>",
            data: {},
            success: function(data) {
                $("#modal_upload").modal('show');
                $("#label_upload").html("Carga de CSV Flota");
                $("#body_upload").html(data);
            }
        });
    });

    $(document).on('click', '.preload_page', function (e) {
        $("#preloader").modal("show");
    });


</script>
<div id="modal_upload" class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><span id="label_upload"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="body_upload">

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
						<div class="spinner-border" style="width: 3rem; height: 3rem;color:#f58634" role="status">
							<span class="sr-only">Loading...</span>
						</div><br>
						<img src="<?php echo base_url("resource/img/logo_2.png")?>" width="80px"><br>
						<span style="font-size: 14px">Cargando datos....</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
