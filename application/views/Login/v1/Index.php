<?php $this->load->view("Login/v1/Head");?>
<style>
	.centrado{
		width: 360px;
		position: absolute;
		height: 350px;
		top: 50%;
		margin-top: -175px;
		left: 50%;
		margin-left: -180px;
	}
	.form-control {
		display: block;
		width: 100%;
		height: calc(1.5em + .75rem + 2px);
		padding: .375rem .75rem;
		font-size: 12px;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 0px solid #ced4da;
		border-bottom: 1.5px solid #cacaca;
		border-radius: 0px;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}

	.form-signin {
		width: 100%;
		max-width: 360px;
		max-height: 350px;
		padding: 15px;
		margin: auto;
	}
</style>

	<form class="form-signin" action="<?php echo base_url('Login/Verificador')?>" onsubmit="return checkSubmit();"  method="post">

			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							<img src="<?php echo base_url("Public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 20%">
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-12 text-center">
							<strong><h4>- Iniciar Sesion -</h4></strong>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-12">

							<label>Correo Electronico (*)</label>
							<input class="form-control" name="correo" autocomplete="off" placeholder="Ingrese Correo electronico..." required type="email"><br>
							<label>Contraseña (*)</label>
							<input class="form-control" type="password" autocomplete="off" required placeholder="Ingrese Contraseña..." name="password"><br>
							<button class="btn btn-info" id="btn_acceder" style="width: 100%"><i class="fas fa-sign-in-alt"></i>&nbsp;Acceder</button>&nbsp;
						</div>
					</div>
				</div>
			</div>

	</form>

<?php $this->load->view("Login/v1/Footer");?>
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
						<h4>Iniciando Sesion en Sistema</h4>
						Espere un momento por favor.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
		<?php if($error!=""){?>
        toastr["error"]("<?php echo $error?>");
		<?php }?>
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    var statSend = false;
    function checkSubmit() {
        if (!statSend) {
            statSend = true;
            return true;
        } else {

            return false;
        }
    }

    function checkSubmit() {
        $("#preloader").modal("show");
        document.getElementById("btn_acceder").value = "Enviando...";
        document.getElementById("btn_acceder").disabled = true;
        return true;
    }
</script>
