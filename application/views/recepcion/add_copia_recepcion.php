<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			 <div class="animated bounceInDown">
									<?php if ($alerta==1): ?>
                   <div class="alert alert-warning alert-dismissible" align="left">
                    <strong>!!CUIDADO!! Ya Existe una RECEPCION asociado a este vehiculo &nbsp; &nbsp;<a class="btn btn-primary" href="<?=$this->config->base_url()?>recepcion/ver/<?= $id_recepcion?>" title="">Ir a Recepcion Asociada </a>
										</strong>
                    <br>
                    </div>
                    <?php endif ?>
             </div> 
			<div class="table-label">
				<h5><strong>Recepcion de Vehiculo<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>recepcion/guardar_copia_recepcion" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="txt_id_recepcion_original" value="<?=$id_recepcion?>">
					<?php if ($contra_peritaje): ?>
						<?php foreach ($contra_peritaje as $data): ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<p></p>
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Fecha Peritaje:</label></h5></P>
					</div>
						<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="hidden" name="txt_id_contra_peritaje" value="<?=$data->id_contra_peritaje?>">
							<input type="hidden" name="txt_id_vehiculo" value="<?=$data->id_vehiculo?>">
							<?$fecha=date('d-m-Y', strtotime($data->fecha_peritaje))?>
							<input type="text" class="form-control" name="txt_fecha_peritaje" value="<?=$fecha?>" placeholder="" readonly>
						</div>
					</div>
				
<!--*****************************************************************************-->
<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- * -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><p align="right"><label>Marca:</label></p></h5>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_marca_vehiculo" value="<?=$data->marca_vehiculo?>" placeholder="" readonly>	

					</div>
		</div>
					<!-- * -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Modelo:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_modelo_vehiculo" value="<?=$data->modelo_vehiculo?>" placeholder="" readonly>	
</div>
					</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Color:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="txt_color" value="<?=$data->color_vehiculo?>" placeholder="" readonly>	
					</div>
</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Año:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_ano" value="<?=$data->ano_vehiculo?>" placeholder="" readonly>
					</div>
					</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Dominio:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_dominio" value="<?=$data->ano_vehiculo?>" placeholder="" readonly>
					</div></div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Kilometraje:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_nuevo?>" placeholder="" readonly>
					</div>	
					<!-- * -->
					</div>
<?php endforeach ?>
	<?php endif ?>
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Combustible:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
		<input type="radio" name="radio_combustible" id="radio_combustible" value="1" checked="checked" ><label><h4>Vacio &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="2" ><label><h4>1/4 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="3" ><label><h4>1/2 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="4" ><label><h4>3/4 Tanque&nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="5" ><label><h4>Lleno&nbsp;</h4></label>
					</div>	
					<!-- * -->
					</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><label>Verificacion</label></h5>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-4 col-sm-4 col-xs-4" align="right">
		 <a target="_blank" href="<?=$this->config->base_url()?>peritaje/canvas_corolla" class="thumbnail" style="height:auto;">
	      <img src="<?=$this->config->base_url()?>assets/img/corolla.png">
	    </a>
   </div>
   <div class="col-md-4 col-sm-4 col-xs-4" align="right">
		 <a target="_blank" href="<?=$this->config->base_url()?>peritaje/canvas_hilux" class="thumbnail" style="height:auto;">
	      <img src="<?=$this->config->base_url()?>assets/img/hilux.png">
	    </a>
   </div>
	</div>
    
</div>
<!--*-->
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Adjunto. Verificacion</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
		
			<input type="file" name="adjunto_verificacion">	
		</div>
</div>

<!--* -->
<hr>
<!-- *****************toma la inspeccion directa y a desglosa -->
<? $i=1; ?>
<?php if ($inspeccion_recepcion): ?>
	<?php foreach ($inspeccion_recepcion as $key): ?>
		
  <div class="col-md-1 col-sm-1 col-xs-1">
  	 <strong><h3><span class ="label label-default">Ok</span></h3></strong>
  </div>
  <div align="center" class="col-md-5 col-sm-5 col-xs-5">
  	 <strong><h3><span class ="label label-default">Necesidad Observacion</span></h3></strong>
  </div>
  
  <div align="center" class="col-md-5 col-sm-5 col-xs-5">
  	 <strong><h3><span class ="label label-default"><?=$key->descripcion?></span></h3></strong>
  </div>


<!-- La parte del inspeccion  -->		

<?php if ($i==1): ?>
	<?php foreach ($det_inspeccion_recepcion1 as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="2" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$key->id?>" value="" placeholder="">
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$key->descripcion?></label></h5>
		</div>
		</div>	
		<?php endforeach ?>
<?php endif ?>
<?php if ($i==2): ?>
	<?php foreach ($det_inspeccion_recepcion2 as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="2" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$key->id?>" value="" placeholder="">
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$key->descripcion?></label></h5>
		</div>
		</div>	
		<?php endforeach ?>
<?php endif ?>
<?php if ($i==3): ?>
	<?php foreach ($det_inspeccion_recepcion3 as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="2" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$key->id?>" value="" placeholder="">
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$key->descripcion?></label></h5>
		</div>
		</div>	
		<?php endforeach ?>
<?php endif ?>
<?php if ($i==4): ?>
	<?php foreach ($det_inspeccion_recepcion4 as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
			<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="2" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$key->id?>" value="" placeholder="">
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$key->descripcion?></label></h5>
		</div>
		</div>	
		<?php endforeach ?>
<?php endif ?>

	</div>
<? $i++;?>
		<?php endforeach ?>
<?php endif ?>
<!-- cierra peritaje -->

	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
	<div class="col-md-3 col-sm-3 col-xs-3">
		<h4><label>Limpieza:</label></h4>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<textarea name="txt_limpieza" class="form-control"></textarea>
	</div>

	<div class= "col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-3">
		<h4><label>Apto para Publicar:</label></h4>
	</div>

				<h2><input type="radio" name="radio_apto" onclick="mostrar_adjuntos_recepcion()" id="radio_apto" value="1" checked="checked" ><label><h4>Si &nbsp;</h4></label>
			<input type="radio" name="radio_apto" id="radio_apto" value="2" onclick="ocultar_adjuntos_recepcion()" ><label><h4>No</h4></label>
	</div>
<div id="adjuntos_recepcion" style="display: block">
	

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
		<h4><label>Adjunto:</label></h4>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto Tablero Auto Encendido</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_1">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto Frontal</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_2">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto Lateral izquierdo</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_3">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto Lateral Derecho</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_4">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto trasera</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_5">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto motor</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_6">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto interior delantero</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_7">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto Interior Trasera</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_8">	
		</div>
</div>
</div>

<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-3 col-md-11">
					     	<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>recepcion"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Regresar</button></a>
						</form>
					    	</div>
							 </div>
					</div>
					<br>
				</div>

