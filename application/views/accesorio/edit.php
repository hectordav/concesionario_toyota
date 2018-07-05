<div class="right_col" role="main" style="height:auto">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h4><strong>Editar Accesorio<strong></h4>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>accesorio/editar_accesorio" method="POST">
			<?php if ($accesorio): ?>
				<?php foreach ($accesorio->result() as $data): ?>
					<input type="hidden" name="txt_id_accesorio" id="txt_id_accesorio" value="<?=$data->id ?>">
				<?php endforeach ?>
			<?php endif ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Tipo:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
						<select class="form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true">
							<option value="">Seleccione</option>
							 <?php
							 if ($tipo) {
							 foreach ($tipo as $i) {
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
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Marca:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<select name="id_marca" id="id_marca" class="form-control" required >
			<option value=""></option>
							</select>
						</div>
					</div>
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Modelo:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<select name="id_modelo" id="id_modelo" class="form-control" required >
			<option value=""></option>
							</select>
						</div>
					</div>

<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Accesorio:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
					  <?php foreach ($accesorio->result() as $data): ?>
							<input type="text" name="txt_accesorio" id="txt_accesorio" class="form-control" value="<?=$data->descripcion?>" placeholder="escribe un accesorio" required>
								<?php endforeach ?>
						</div>
	</div>
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-2 col-md-11">
					    <p></p>
					      <button type="submit" class="btn btn-lg btn-info"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>accesorio"><button type="button" class="btn  btn-lg btn-danger"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Cancelar</button></a>
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
