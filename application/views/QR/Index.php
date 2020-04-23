<?php $this->load->view("QR/Head")?>
<style>
	.orange{
		background-color: #F58634;
	}
	.white{
		background-color: white;
	}
	.btn-orange {
		color: #ffffff;
		background-color: #F58634;
		border-top-color: #f7f7f761;
	}
	.btn-orange:hover {
		color: #ffffff;
		text-decoration: none;
		background-color: #d4752f;
	}
</style>

		<section class="orange"><br><br>
			<div class="hijo text-center">
				<img src="<?php echo base_url("Public/img/logo/qr_v2.png")?>" width="30%">
			</div><br><br>
			<button class="btn btn-orange" style="width: 100%"><i class="fas fa-phone-alt fa-2x"></i><br>Llamar</button>
		</section><br><br>

			<div class="container">
				<div class="row">
					<div class="col-2">
						<i class="fas fa-phone-alt fa-2x" style="color:#b3b3b3;vertical-align: middle"></i>
					</div>
					<div class="col-10">
						<strong>Nro de Reservas</strong><br>
						<span>+51(1) 444 3050</span>
					</div>
				</div><br><br>
				<div class="row">
					<div class="col-2">
						<i class="fas fa-phone-alt fa-2x" style="color:#b3b3b3;vertical-align: middle"></i>
					</div>
					<div class="col-10">
						<strong>Nro de Emergencia 24h</strong><br>
						<span>+51 981243195</span><br>
						<span>+51 981076605</span>
					</div>
				</div>
			</div>


<?php $this->load->view("QR/Footer")?>
