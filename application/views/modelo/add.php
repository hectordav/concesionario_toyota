<div class="right_col" role="main" style="height:auto">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h4><strong>Agregar Modelo<strong></h4>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>modelo/guardar_modelo" method="POST">
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Marca:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							 <select class="selectpicker form-control" data-live-search="true" id="" name="id_marca" name="id_marca" required>
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
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h5 ><P ALIGN="RIGHT"><label>Modelo:</label></h5 ></P>
						</div>
					  <div class="col-md-11 col-sm-11 col-xs-12">
							<input type="text" name="txt_modelo" id="txt_modelo" class="form-control">
						</div>
	</div>
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-2 col-md-11">
					    <p></p>
					      <button type="submit" class="btn btn-lg btn-info"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>modelo"><button type="button" class="btn  btn-lg btn-danger"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Cancelar</button></a>
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
