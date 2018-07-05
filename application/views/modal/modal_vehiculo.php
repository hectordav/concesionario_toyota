<div class="modal fade "id="mvehiculo">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		<a href="<?= $this->config->base_url();?>vehiculo">
		              <button type="button" class="close" aria-hidden="true">&times;</button></a>
		               <strong><h3><span class ="label label-warning">Nuevo Registro de Vehiculo</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>vehiculo/add_vehiculo" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-12">
   			<label>Cliente:</label>
   		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
		   <select class="selectpicker form-control" data-live-search="true" id="" name="id_cliente"style="width:10px" required>
				  <?php if ($cliente): ?>
				  	<option data-tokens="" value="0">Seleccione</option>
					  <?php foreach ($cliente->result() as $data): ?>
						<option data-tokens="<?= $data->dni.", ".$data->nombre?>" value="<?= $data->id ?>"><?= $data->dni.", ".$data->nombre ?></option>
					  <?php endforeach ?>
					<?php else:?>
						<option data-tokens="" value="0">Seleccione</option>
				  <?php endif ?>
		</select>
		<p></p>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-12" align="center">
			<a class="btn btn-success btn-sm" onclick="mostrar_cliente()"><i class="fa fa-plus"></i> &nbsp; Crear Nuevo Cliente</a>
		</div>
<!-- crear un nuevo CLiente -->
	<div id="add_cliente" style="display: none;">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<p></p>
			<hr>
				 <strong><h4><span class ="label label-sm label-info">Nuevo Cliente</span></h4></strong>
			
			<div class="col-md-11 col-sm-11 col-xs-11">
				<input type="text" class="form-control" name="txt_dni" value="" placeholder="Ingrese Dni">
			</div>
		</div>
			<!--*********************************************************-->
		<div class="col-md-12 col-sm-12 col-xs-12">
		<p></p>
		<div class="col-md-11 col-sm-11 col-xs-11">
			<input type="text" class="form-control" name="txt_nombre" value="" placeholder=" Ingrese Nombre">
		</div>
		</div>
			<!-- ******************************************************** -->
		
		<!-- *********************************************************** -->
		</div>
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