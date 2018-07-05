<div class="modal fade  "id="mcontraperitaje">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
				<a href="<?= $this->config->base_url();?>contra_peritaje/grilla">
		              <button type="button" class="close" aria-hidden="true">&times;</button></a>
		               <strong><h3><span class ="label label-warning">Nuevo Contra Peritaje</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>contra_peritaje/add_contra_peritaje" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Peritaje:</label></P>
   		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
		   <select class="selectpicker form-control" data-live-search="true" id="" name="id_peritaje"required>
				  <?php if ($peritaje): ?>
				  	<option data-tokens="" value="0">Seleccione</option>
					  <?php foreach ($peritaje as $data): ?>
						<option data-tokens="<?= $data->dni_cliente.", ".$data->nombre_cliente?>" value="<?= $data->id_vehiculo ?>"><?= "<strong> Vehiculo </strong> ".$data->marca_vehiculo.", <strong>Modelo:</strong> ".$data->modelo_vehiculo.", <strong>Patente:</strong> ".$data->placa_vehiculo?></option>
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