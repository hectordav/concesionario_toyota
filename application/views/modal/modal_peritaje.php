<div class="modal fade  "id="mperitaje">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
		<a href="<?= $this->config->base_url();?>peritaje">
		              <button type="button" class="close" aria-hidden="true">&times;</button></a>
		               <strong><h3><span class ="label label-warning">Nuevo Peritaje</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>peritaje/add_cliente_vehiculo" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-12">
   			<label>Cliente:</label>
   		</div>
		<div class="col-md-7 col-sm-7 col-xs-12">
		   <select class="selectpicker form-control" data-live-search="true" id="id_cliente" name="id_cliente"required>
				  <?php if ($cliente_vehiculo): ?>
				  	<option data-tokens="" value="0">Seleccione</option>
					  <?php foreach ($cliente_vehiculo as $data): ?>
						<option data-tokens="<?= $data->dni.", ".$data->nombre?>" value="<?= $data->id?>"><?= $data->dni?>."<strong>Nombre:</strong> "<?=$data->nombre?>"</option>
					  <?php endforeach ?>
					<?php else:?>
						<option data-tokens="" value="0">Seleccione</option>
				  <?php endif ?>
		</select>
		<p></p>
		</div>
			<div class="col-md-1 col-sm-1 col-xs-11" align="center">
			<a class="btn btn-success btn-sm" onclick="mostrar_cliente()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Crear Cliente</a>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-2 col-sm-2 col-xs-12">
   			<label>Vehiculo:</label>
   			</div>
		<div class="col-md-7 col-sm-7 col-xs-12">
		   <select class="selectpicker form-control" data-live-search="true" id="id_vehiculo_2" name="id_vehiculo_2"required>
				  <?php if ($vehiculo): ?>
				  	<option data-tokens="" value="0">Seleccione</option>
					  <?php foreach ($vehiculo as $data): ?>
<option data-tokens="<?= $data->placa_vehiculo." ".$data->marca_vehiculo."".$data->modelo_vehiculo?>" value="<?= $data->id_vehiculo ?>">Patente: <?=$data->placa_vehiculo?>&nbsp;Marca: <?=$data->marca_vehiculo?> &nbsp;Modelo: <?=$data->modelo_vehiculo?></option>
					  <?php endforeach ?>
					<?php else:?>
						<option data-tokens="" value="0">Seleccione</option>
				  <?php endif ?>
		</select>
		<p></p>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-11" align="center">
			<a class="btn btn-success btn-sm" onclick="mostrar_vehiculo()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar Vehiculo</a>
		</div>
		
<!-- crear un nuevo CLiente -->
<input type="hidden" name="txt_dispara_cliente" id="txt_dispara_cliente" value="0">
<input type="hidden" name="txt_dispara_vehiculo" id="txt_dispara_vehiculo" value="0">
	<div id="add_cliente_1" class="animated fadeInDown" style="display: none;">
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<p></p>
			<hr>
				 <strong><h4><span class ="label label-sm label-info">Nuevo Cliente</span></h4></strong>
			
			<div class="col-md-11 col-sm-11 col-xs-11">
				<input type="text" class="form-control" name="txt_dni" value="" placeholder="Ingrese Dni o Cuit">
			</div>
		</div>
			<!--*********************************************************-->
		<div class="col-md-12 col-sm-12 col-xs-12">
		<p></p>
			<div class="col-md-11 col-sm-11 col-xs-11">
				<input type="text" class="form-control" name="txt_nombre" value="" placeholder=" Ingrese Nombre">
			</div>
		</div>
	</div>

	<div id="add_cliente_2" class="animated fadeInDown" style="display: none;">
			
		<!-- *********************************************************** -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p></p>
				<hr>
					 <strong><h4><span class ="label label-sm label-info">Vehiculo Asociado</span></h4></strong>
			</div>
			<!--*****************************************************************************-->
			<div class="col-md-12 col-sm-12 col-xs-12">
					 <div class="col-md-11 col-sm-11 col-xs-11">
			 <select class="selectpicker form-control" data-live-search="true" id="" name="id_combustibles">
							<option value="">Seleccione Tipo Combustible</option>
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
	<p></p>
				<div class="col-md-11 col-sm-11 col-xs-11">
							<select class="selectpicker form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione Tipo de Vehiculo</option>
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
	<!--************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
					   <div class="col-md-11 col-sm-11 col-xs-11">
							<select class="selectpicker form-control" name="id_marca" id="id_marca" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione Marca</option>
										 <?php
										 if ($marca) {
										 foreach ($marca as $i) {
								             echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
								            }
										 }else{
										 }
								        ?>
							</select>
						</div>
					</div>
	<!--**************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
				<p></p>
					   <div class="col-md-11 col-sm-11 col-xs-11">
							<select class="form-control" name="id_modelo" id="id_modelo" data-show-subtext="true" data-live-search="true">
										<option value="">Seleccione Modelo</option>
							</select>
						</div>
	</div>
<!--**************************************************************** -->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
				
					  <div class="col-md-11 col-sm-11 col-xs-11">
							 <select class="selectpicker form-control" data-live-search="true" id="" name="id_color" style=" width: auto">
							<option value="">Seleccione Color</option>
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
	<p></p>
				
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input placeholder="Ingrese Año" type="text" name="txt_ano" id="txt_ano" class="form-control">
						</div>
	</div>
<!--*********************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
				
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input placeholder="Ingrese Patente" type="text" name="txt_patente" id="txt_patente" class="form-control">
						</div>
	</div>



	
<!--*********************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
				
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_serial_carroceria" id="txt_serial_carroceria" placeholder="Ingrese los ultimos 8 digitos del Serial Chasis" class="form-control">
					</div>
	</div>
<!--*********************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input type="text" name="txt_sn_motor" id="txt_sn_motor" placeholder="Ingrese los ultimos 8 digitos del Serial del motor" class="form-control">
						</div>
	</div>
<!-- **************************************************************** -->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
					  <div class="col-md-11 col-sm-11 col-xs-11">
							<input placeholder="Ingrese Kilometraje" type="number" name="txt_kilometraje" id="txt_kilometraje" class="form-control">
						</div>
	</div>
<!--**************************************************************************-->
		</div>
	<!--*************************************************************** -->
	<!--***********************FIN DE CREAR CLIENTE********************** -->


	</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="fa fa-plus-circle"></i>&nbsp; Continuar</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->