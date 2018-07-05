<div class="right_col" role="main" style="height:auto">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h4><strong>Editar Vehiculo<strong></h4>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>vehiculo/editar_vehiculo" method="POST">
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
					<?php foreach ($vehiculo as $key): ?>						
					<input type="hidden" name="txt_id_vehiculo" value="<?=$key->id_vehiculo?>">
					<?php endforeach ?>

						<h6><label>Combustible:</label></h6></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
			 <select class="selectpicker form-control" data-live-search="true" id="" name="id_combustibles" required>
							<option value="">Seleccione</option>
							 <?php
							 if ($tipo_combustible) {
							 foreach ($tipo_combustible as $i) {
					               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
					            }
							 }else{
							 }
					        ?>
				</select>
						</div>
					</div>
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h6><label>Tipo:</label></h6></P>
						</div>
					   <div class="col-md-11 col-sm-11 col-xs-12">
							<select class="selectpicker form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione</option>
										 <?php
										 if ($tipo_vehiculo) {
										 foreach ($tipo_vehiculo as $i) {
								             echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
								            }
										 }else{
										 }
								        ?>
							</select>
						</div>
					</div>
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h6><label>Marca:</label></h6></P>
						</div>
					     <div class="col-md-11 col-sm-11 col-xs-12">
							<select class="selectpicker form-control" name="id_marca" id="id_marca" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione</option>
										 <?php
										 if ($marca) {
										 foreach ($marca as $i) {
								             echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
								            }
										 }else{
										 	echo "no hay";
										 }
								        ?>
							</select>
						</div>
					</div>
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h6><label>Modelo:</label></h6></P>
						</div>
					   <div class="col-md-11 col-sm-11 col-xs-12">
							<select class="form-control" name="id_modelo" id="id_modelo" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione</option>
							</select>
						</div>
					</div>
<!--**************************************************************** -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h5 ><label>Año:</label></h5 ></P>
						</div>
			<?php if ($vehiculo): ?>
				<?php foreach ($vehiculo as $data): ?>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<input type="number"required name="txt_ano" id="txt_ano" class="form-control" value="<?=$data->ano_vehiculo?>">
						</div>
	</div>
<!--**************************************************************** -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h5 ><label>Color:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
						<select class="selectpicker form-control" name="id_color" id="id_color" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione</option>
										 <?php
										 if ($color) {
										 foreach ($color as $i) {
								             echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
								            }
										 }else{
										 }
								        ?>
							</select>
						</div>

	</div>
<!--*********************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h5 ><label>Patente:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text"required name="txt_patente" id="txt_patente" class="form-control" value="<?=$data->placa_vehiculo?>">
						</div>
			
	</div>
<!--*********************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h6><label>SN Chasis:</label></h6></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text"required name="txt_serial_carroceria" id="txt_serial_carroceria" class="form-control" value="<?=$data->serial_carroceria_vehiculo?>">
						</div>
	
	</div>
<!--*********************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h6><label>SN Motor:</label></h6></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text"required name="txt_sn_motor" id="txt_sn_motor" class="form-control" value="<?=$data->serial_motor_vehiculo?>">
						</div>
	</div>
<!-- **************************************************************** -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-12">
						<h5 ><label>KM:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<input type="number"required name="txt_kilometraje" id="txt_kilometraje" class="form-control" value="<?=$data->kilometraje_vehiculo?>">
						</div>
	</div>
			<?php endforeach ?>
		<?php endif ?>
	
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-2 col-md-11">
					      <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>vehiculo"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Cancelar</button></a>
						</form>
					    </div>
					  </div>
			</div>
			<br>
		</div>
	</div>
  </div>
 </div>
	    	</div>
</div>
