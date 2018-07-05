<div class="right_col" role="main" style="height:650px;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
							 <div class="animated bounceInDown" align="left">
  						<?= validation_errors('<div class="alert alert-danger">','</div> ')?>
  						</div>
			<div class="table-label">
				<h5><strong>Cambiar estado Usuario<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>usuario/guardar_cambiar_estado" method="POST">
				<br>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php if ($usuario): ?>
						<?php foreach ($usuario as $key): ?>
							
						<input type="hidden" name="txt_id_usuario" value="<?=$key->id?>">
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Nombre:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_nombre" value="<?= $key->nombre?>" placeholder="Ingrese Nombre de Usuario" required="required" readonly="true">
					</div>
						<hr>
				
						<?php endforeach ?>
					<?php endif ?>
					</div>
<!--*****************************************************************************-->

					<!-- * -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Estado:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
							<select class="form-control" name="id_estado" id="id_estado" data-show-subtext="true" data-live-search="true">
									<option value="">Seleccione</option>
									 <?php
									 if ($estado) {
									 foreach ($estado as $i) {
							               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
							            }
									 }else{
									 }
							        ?>
						</select>
					</div>
	</div>
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-3 col-md-11">
					     	<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>usuario/grilla"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Regresar</button></a>
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
