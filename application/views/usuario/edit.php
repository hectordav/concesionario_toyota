<div class="right_col" role="main" style="height:650px;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
							 <div class="animated bounceInDown" align="left">
  						<?= validation_errors('<div class="alert alert-danger">','</div> ')?>
  						</div>
			<div class="table-label">
				<h5><strong>Editar Usuario<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>usuario/actualizar_usuario" method="POST">
					
				<div class="col-md-12 col-sm-12 col-xs-12">
					<p></p>
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Nivel:</label></h5></P>
					</div>
						<div class="col-md-10 col-sm-10 col-xs-10">
							<select class="form-control" name="id_nivel" id="id_nivel" data-show-subtext="true" data-live-search="true" required="required">
									<option value="">Seleccione</option>
									 <?php
									 if ($nivel) {
									 foreach ($nivel as $i) {
							               echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
							            }
									 }else{
									 }
							        ?>
						</select>
						</div>
					
					</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php if ($usuario): ?>
						<?php foreach ($usuario as $key): ?>
							
						<input type="hidden" name="txt_id_usuario" value="<?=$key->id?>">
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Nombre:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_nombre" value="<?= $key->nombre?>" placeholder="Ingrese Nombre de Usuario" required="required">
					</div>
						<hr>
					
					</div>
<!--*****************************************************************************-->
<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- * -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><p align="right"><label>Login:</label></p></h5>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="email" class="form-control" name="txt_login" value="<?= $key->login?>" placeholder="Ingrese Email" required="required">	
					<?php endforeach ?>
					<?php endif ?>
					</div>
		</div>
					<!-- * -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Clave:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="password" class="form-control" name="txt_clave" value="" placeholder="Ingrese Clave" required="required">
					</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Repetir Clave:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="password" class="form-control" name="txt_clave_2" value="" placeholder="Repita su Clave" required="required">
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
