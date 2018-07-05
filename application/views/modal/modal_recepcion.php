<div class="modal fade"id="mrecepcion">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
		<a href="<?= $this->config->base_url();?>recepcion">
		              <button type="button" class="close" aria-hidden="true">&times;</button></a>
		               <strong><h3><span class ="label label-warning">Nueva Recepcion:</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>recepcion/add_recepcion" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Contra Peritaje:</label></P>
   		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
		   <select class="selectpicker form-control" data-live-search="true" id="id_contra_peritaje" name="id_contra_peritaje"required>
				  <?php if ($contra_peritaje): ?>
				  	<option data-tokens="" value="">Seleccione</option>
					  <?php foreach ($contra_peritaje as $data): ?>
						<option data-tokens="<?= $data->marca_vehiculo.", ".$data->modelo_vehiculo?>" value="<?= $data->id_vehiculo ?>"><?= $data->marca_vehiculo.", <strong>Modelo:</strong> ".$data->modelo_vehiculo.", <strong>Patente:</strong> ".$data->placa_vehiculo?></option>
					  <?php endforeach ?>
					<?php else:?>
						<option data-tokens="" value="0">Seleccione</option>
				  <?php endif ?>
		</select>
		</div>
		<!-- <div class="col-md-1 col-sm-1 col-xs-1">
			<a class="btn btn-success btn-sm" onclick="mostrar_cliente()"><i class="fa fa-plus"></i> &nbsp; Crear Nuevo Cliente/Vehiculo</a>
		</div> -->

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