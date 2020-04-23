<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning new p-4">
				<strong>Importante</strong>
				<p class="mb-0">Los campos con el signo (*) son obligatorios, el Sistema no permitira generar registros sin llenarlos correctamente</p>
			</div>
		</div>
	</div>
	<form action="<?php echo base_url("Comercial/Cuenta/Update")?>" method="POST">
		<?php foreach($cuenta as $cnt){?>
			<input hidden value="<?php echo $cnt->idcuenta?>" name="idcuenta">
		<div class="card">
			<div class="card-header">
				Informacion Personal
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<label>Tipo de Documento</label>
						<?php if(is_null($cnt->idtipo_documento)){?>
							<select class="form-control" name="idtipo_documento" id="tipo_documento" >
								<option value="">Seleccione Documento</option>
								<?php foreach($tipo_documento as $td){?>
									<?php if($cnt->idtipo_documento==$td->idtipo_documento){?>
										<option selected value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
									<?php }else{?>
										<option value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
									<?php }?>
								<?php }?>
							</select>
						<?php }else{?>
							<input hidden name="idtipo_documento" value="<?php echo $cnt->idtipo_documento?>">
							<select disabled class="form-control" id="tipo_documento" >
								<option value="">Seleccione Documento</option>
								<?php foreach($tipo_documento as $td){?>
									<?php if($cnt->idtipo_documento==$td->idtipo_documento){?>
										<option selected value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
									<?php }else{?>
										<option value="<?php echo $td->idtipo_documento?>"><?php echo $td->nombre?></option>
									<?php }?>
								<?php }?>
							</select>
						<?php }?>
					</div>
					<div class="col-sm-5">
						<label>Nro. Documento</label>
						<div id="div_nro_documento">
							<input class="form-control" id="nro_documento" placeholder="Ingrese Nro. de Documento..." value="<?php echo $cnt->nro_documento?>" name="nro_documento">
						</div>
					</div>
					<div class="col-sm-3">
						<label>F. Nacimiento</label>
						<div id="f_input">
							<?php if(is_null($cnt->razon_social)){?>
									<input type="date" class="form-control" value="<?php echo $cnt->f_nacimiento?>" name="f_nacimiento">
							<?php }else{?>
									<input type="date" class="form-control" hidden name="f_nacimiento">
							<?php }?>
						</div>
					</div>
				</div><br>
				<div id="input_nombre">
					<div class="row">
						<?php if(is_null($cnt->razon_social)){?>
						<div class="col-sm-12">
							<label>Nombre y Apellido(*)</label>
							<input class="form-control" value="<?php echo $cnt->nombre?>" name="nombre" required placeholder="Ingrese Nombre y Apellido...">
						</div>
						<?php }else{?>
						<div class="col-sm-12">
							<label>Razon Social (*)</label>
							<input class="form-control" value="<?php echo $cnt->razon_social?>" name="razon_social"  required placeholder="Ingrese Razon Social...">
						</div>
						<?php }?>
					</div>
				</div><br>
				<div class="row">
					<div class="col-sm-12">
						<label>Direccion</label>
						<textarea class="form-control" name="direccion" type="email" placeholder="Ingrese direccion..." required><?php echo $cnt->direccion?></textarea>
					</div>
				</div>
			</div>
		</div><br>
		<div class="card">
			<div class="card-header">
				Informacion de Contacto
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<label>Movil - Whatsapp (*)</label>
						<input class="form-control" value="<?php echo $cnt->celular?>" name="celular" placeholder="Ingrese Movil - Whatsapp...">
					</div>
					<div class="col-sm-9">
						<label>Correo Electrónico (*)</label>
						<input class="form-control" value="<?php echo $cnt->correo?>" type="email" name="correo" placeholder="Ingrese Correo electrónico...">
					</div>
				</div><br>
			</div>
		</div><br>
		<?php }?>
		<button class="btn btn-outline-primary btn-sm">Grabar Cuenta</button>
	</form>
</div>

