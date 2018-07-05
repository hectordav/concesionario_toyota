<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h5><strong>Editar Peritaje<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>peritaje/editar_peritaje" method="POST">
					<?php if ($peritaje): ?>
						<?php foreach ($peritaje as $data): ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<p></p>
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Fecha Peritaje:</label></h5></P>
					</div>
						<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
							<?$fecha=date('d-m-Y', strtotime($data->fecha_peritaje))?>
							<input type="text" class="form-control" name="txt_fecha_peritaje" value="<?=$fecha?>" placeholder="" readonly>
						</div>
					
					</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Cliente:</label></h5></P>
					</div>
				
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
						<input type="text" class="form-control" name="txt_cliente" value="<?=$data->dni_cliente?>, <?=$data->nombre_cliente?> " placeholder="" readonly>
					</div>
						<hr>
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
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_vehiculo?>" placeholder="" readonly>
					</div>	

					<!-- * -->
</div>

<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Manuales:</label></h5></P>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" class="form-control" name="txt_manual" value="<?=$data->manual_peritaje?>" placeholder="">		
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Llaves:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_llaves" value="<?=$data->llaves_peritaje?>">		
					</div>
					</div>

<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Precio Estimado</label></h5></P>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" class="form-control" name="txt_precio_estimado" value="<?=$data->precio_estimado_peritaje?>">
		</div>
</div>
<?php endforeach ?>
	<?php endif ?>


	<div class="col-md-12 col-sm-12 col-xs-12">
<hr>
  <div class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Inspeccion De</span></h3></strong>
  </div>
  <div align="center" class="col-md-4 col-sm-4 col-xs-4">
  	 <strong><h3><span class ="label label-default">Peritaje</span></h3></strong>
  </div>
  <div align="center" class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Costo Estimado</span></h3></strong>
  </div>
   <div align="center" class="col-md-3 col-sm-3 col-xs-3">
  	 <strong><h3><span class ="label label-default">Observaciones</span></h3></strong>
  </div>
<!-- La parte del peritaje -->		
</div>
<?php foreach ($det_peritaje as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'>
	<tr></tr>
	<p></p>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<h5><label><?=$key->descripcion_inspeccion?></label></h5>
		</div>
		<input type="hidden" name="txt_id_det_peritaje" id="txt_id_det_peritaje"value="<?=$key->id_det_peritaje?>">
		<div class="col-md-3 col-sm-3 col-xs-3">
		<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked"><label>Si</label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label>No</label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" ><label>Si</label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label>No</label>
		<?php endif ?>
			
				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php if ($key->id_estado_inspeccion==1): ?>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label>100</label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"><label>75</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label>50</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"><label>25</label>
				<?php else: ?>
					<?php if ($key->id_estado_inspeccion==2): ?>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"><label>100</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label>75</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label>50</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"><label>25</label>
						<?php else: ?>
							<?php if ($key->id_estado_inspeccion==3): ?>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"><label>100</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" ><label>75</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"checked="checked"><label>50</label>	
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"><label>25</label>	
						<?php else: ?>
							<?php if ($key->id_estado_inspeccion==4): ?>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"><label>100</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" ><label>75</label>
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label>50</label>	
				<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"checked="checked"><label>25</label>	
							<?php endif ?>
						<?php endif ?>
					<?php endif ?>
				<?php endif ?>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id_inspeccion_peritaje?>" name="txt_costo_<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar();"class="form-control" value="<?=$key->costo_estimado_det_peritaje?>" placeholder="Costo">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">
				<input type="text" name="txt_observacion_<?=$key->id_inspeccion_peritaje?>" class="form-control" value="<?=$key->observaciones_det_peritaje?>" placeholder="Observaciones">
		</div>
	</div>
<?php endforeach ?>
<!-- cierra peritaje -->
</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
	<div class="col-md-2 col-sm-2 col-xs-2 col-lg-offset-4 col-xs-offset-4 col-sm-offset-4" align="right" >
		<h4><label>Total Gastos:</label></h4>
		<?php foreach ($peritaje as $key): ?>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="number" class="form-control" placeholder="Total" id="txt_total" name="txt_total_gasto" value="" readonly="true">
	</div>
	</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<p></p>
<hr>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<h4><P ALIGN="RIGHT"><label>Observaciones:</label></h4></P>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<textarea name="txt_observaciones" placeholder="Ingrese Observaciones" class="form-control"><?=$key->observaciones_peritaje?></textarea>		
			</div>
			</div>
		<?php endforeach ?>
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-3 col-md-11">
					      <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>peritaje"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Cancelar</button></a>
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
