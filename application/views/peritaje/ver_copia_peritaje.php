<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h5><strong>Ver Copia Peritaje<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>peritaje/editar_peritaje" method="POST">
					<?php if ($peritaje): ?>
						<?php foreach ($peritaje as $data): ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<p></p>
						<div class="col-md-1 col-sm-1 col-xs-2">
							<h5><P ALIGN="RIGHT"><label>Fecha Peritaje:</label></h5></P>
						</div>
							<div class="col-md-11 col-sm-11 col-xs-12">
								<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
								<?$fecha=date('d-m-Y', strtotime($data->fecha_peritaje))?>
								<input type="text" class="form-control" name="txt_fecha_peritaje" value="<?=$fecha?>" placeholder="" readonly>
							</div>
					
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="col-md-1 col-sm-1 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Cliente:</label></h5></P>
					</div>
				
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
						<input type="text" class="form-control" name="txt_cliente" value="<?=$data->dni_cliente?>, <?=$data->nombre_cliente?> " placeholder="" readonly>
					</div>
						<hr>
					</div>
<!--*****************************************************************************-->
<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- * -->
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><p align="right"><label>Marca:</label></p></h5>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_marca_vehiculo" value="<?=$data->marca_vehiculo?>" placeholder="" readonly>	

					</div>
		</div>
					<!-- * -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Modelo:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_modelo_vehiculo" value="<?=$data->modelo_vehiculo?>" placeholder="" readonly>	
</div>
					</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Color:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
					<input type="text" class="form-control" name="txt_color" value="<?=$data->color_vehiculo?>" placeholder="" readonly>	
					</div>
</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Año:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_ano" value="<?=$data->ano_vehiculo?>" placeholder="" readonly>
					</div>
					</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Dominio:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_dominio" value="<?=$data->ano_vehiculo?>" placeholder="" readonly>
					</div>
</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Kilometraje:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_vehiculo?>" placeholder="" readonly>
					</div>	

					<!-- * -->
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Asignado a</label></h5></P>
		</div>
		<div class="col-md-11 col-sm-11 col-xs-12">
		
		<input type="text" class="form-control" name="txt_vendedor_asignado" value="" placeholder="" readonly="true">
		</div>
<!-- * -->
</div>

<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Manuales:</label></h5></P>
		</div>
		<div class="col-md-11 col-sm-11 col-xs-10">
			<?php if ($data->manual_peritaje==1): ?>
					<input type="radio" name="manual" id="manual" value="1" onclick="fncver();" checked="checked" ><label>Si</label>&nbsp;

					<input type="radio" name="manual" id="manual" value="0" onclick="fncnover();" disabled="true"><label>No</label>
					<?php if ($data->manual_usuario==1): ?>
						<input type="checkbox" name="manual_usuario" id="manual_usuario" value="1" checked="true" disabled="true"><label>&nbsp;Manual de Usuario</label>&nbsp;
					<?php else: ?>
						<input type="checkbox" name="manual_usuario" id="manual_usuario" value="1" disabled="true"><label>&nbsp;Manual de Usuario</label>&nbsp;
					<?php endif ?>
					<?php if ($data->manual_servicio==1): ?>
						<input type="checkbox" name="manual_servicio" id="manual_servicio" value="1" checked="true" disabled="true"><label>&nbsp;Servicio Oficial</label>
					<?php else: ?>
						<input type="checkbox" name="manual_servicio" id="manual_servicio" value="1" disabled="true"><label>&nbsp;Servicio Oficial</label>
						<?php endif ?>		
			
				<?php else: ?>
					<input type="radio" name="manual" id="manual" value="1" onclick="fncver();" disabled="true"><label>Si</label>&nbsp;
					<input type="radio" name="manual" id="manual" value="0" onclick="fncnover();" checked="checked"><label>No</label>
			<?php endif ?>		
		</div>
		
		<!-- * -->
</div>
	<div class="col-md-12 col-sm-12 col-xs-12">

					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Llaves:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<?php if ($data->llaves_peritaje==1): ?>
							<input type="radio" name="llave" id="llave" value="1" checked="checked"><label>1</label>&nbsp;
							<input type="radio" name="llave" id="llave" value="2" disabled="true"><label>2</label>	&nbsp;	
							<input type="radio" name="llave" id="llave" value="3" disabled="true"><label>3</label>
							&nbsp;&nbsp;&nbsp;
							<?php else: ?>
							<?php if ($data->llaves_peritaje==2): ?>
								<input type="radio" name="llave" id="llave" value="1"disabled="true"><label>1</label>&nbsp;
								<input type="radio" name="llave" id="llave" value="2" checked="checked"><label>2</label>	&nbsp;	
								<input type="radio" name="llave" id="llave" value="3" disabled="true"><label>3</label>
							&nbsp;&nbsp;&nbsp;
								<?php else: ?>
							<?php if ($data->llaves_peritaje==3): ?>
									<input type="radio" name="llave" id="llave" value="1"disabled="true"><label>1</label>&nbsp;
							<input type="radio" name="llave" id="llave" value="2"disabled="true"><label>2</label>	&nbsp;	
							<input type="radio" name="llave" id="llave" value="3" checked="checked"><label>3</label>
							<?php endif ?>
								<?php endif ?>
						<?php endif ?>
						<?php if ($data->duplicado_llaves): ?>
							Duplicado
								<input type="radio" name="duplicado" id="duplicado" value="1" checked="checked"><label>Si</label>	&nbsp;	
								<input type="radio" name="duplicado" id="duplicado" value="0" disabled="true"><label>No</label>
							<?php else: ?>
								<input type="radio" name="duplicado" id="duplicado" value="1" disabled="true"><label>Si</label>	&nbsp;	
								<input type="radio" name="duplicado" id="duplicado" value="0" checked="checked" ><label>No</label>
						<?php endif ?>
					</div>
	</div>
<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Precio Estimado</label></h5></P>
		</div>
		<div class="col-md-11 col-sm-11 col-xs-12">
			<input type="text" class="form-control" name="txt_precio_estimado" value="<?=$data->precio_estimado_peritaje?>" readonly>
		</div>
</div>
<?php endforeach ?>
	<?php endif ?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2">
		<h4><label>Carroceria</label></h4></P>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
	<p></p>
	<strong>
	&nbsp;
		<?php if ($peritaje): ?>
		<?php foreach ($peritaje as $key): ?>
			<?php if ($key->ins_carroceria==1): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_2" id="estado_inspeccion_2" value="1" checked="checked"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_2" id="estado_inspeccion_2" value="2" disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_2" id="estado_inspeccion_2" value="3" onclick="continuar();" disabled="true"><label>M</label>
				<?php else: ?>
					<?php if ($key->ins_carroceria==2): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_2" id="estado_inspeccion_2" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_2" id="estado_inspeccion_2" value="2"checked="checked"><label>R</label>
				<input type="radio" name="estado_inspeccion_2" id="estado_inspeccion_2" value="3" onclick="continuar();"disabled="true"><label>M</label>
						<?php else: ?>
							<?php if ($key->ins_carroceria==3): ?>

				<input type="radio"onclick="continuar();"  name="estado_inspeccion_2" id="estado_inspeccion_2" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_2" id="estado_inspeccion_2" value="2"disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_2" id="estado_inspeccion_2" value="3" onclick="continuar();" checked="checked"><label>M</label>
							<?php endif ?>
					<?php endif ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	</strong>
	</div>
</div>
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2">
		<h4><label>Pintura</label></h4></P>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
	<p></p>
	<strong>
	&nbsp;
		<?php if ($peritaje): ?>
		<?php foreach ($peritaje as $key): ?>
			<?php if ($key->ins_pintura==1): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_3" id="estado_inspeccion_3" value="1" checked="checked"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_3" id="estado_inspeccion_3" value="2" disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_3" id="estado_inspeccion_3" value="3" onclick="continuar();" disabled="true"><label>M</label>
				<?php else: ?>
					<?php if ($key->ins_pintura==2): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_3" id="estado_inspeccion_3" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_3" id="estado_inspeccion_3" value="2"checked="checked"><label>R</label>
				<input type="radio" name="estado_inspeccion_3" id="estado_inspeccion_3" value="3" onclick="continuar();"disabled="true"><label>M</label>
						<?php else: ?>
							<?php if ($key->ins_pintura==3): ?>

				<input type="radio"onclick="continuar();"  name="estado_inspeccion_3" id="estado_inspeccion_3" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_3" id="estado_inspeccion_3" value="2"disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_3" id="estado_inspeccion_3" value="3" onclick="continuar();" checked="checked"><label>M</label>
							<?php endif ?>
					<?php endif ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	</strong>
	</div>
</div>
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2">
		<h4><label>Vuelco</label></h4></P>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
	<p></p>
	<strong>
	&nbsp;
		<?php if ($peritaje): ?>
		<?php foreach ($peritaje as $key): ?>
			<?php if ($key->ins_vuelco==1): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_4" id="estado_inspeccion_4" value="1" checked="checked"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_4" id="estado_inspeccion_4" value="2" disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_4" id="estado_inspeccion_4" value="3" onclick="continuar();" disabled="true"><label>M</label>
				<?php else: ?>
					<?php if ($key->ins_vuelco==2): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_4" id="estado_inspeccion_4" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_4" id="estado_inspeccion_4" value="2"checked="checked"><label>R</label>
				<input type="radio" name="estado_inspeccion_4" id="estado_inspeccion_4" value="3" onclick="continuar();"disabled="true"><label>M</label>
						<?php else: ?>
							<?php if ($key->ins_vuelco==3): ?>

				<input type="radio"onclick="continuar();"  name="estado_inspeccion_4" id="estado_inspeccion_4" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_4" id="estado_inspeccion_4" value="2"disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_4" id="estado_inspeccion_4" value="3" onclick="continuar();" checked="checked"><label>M</label>
							<?php endif ?>
					<?php endif ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	</strong>
	</div>
</div>
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2">
		<h4><label>Choque</label></h4></P>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
	<p></p>
	<strong>
	&nbsp;
		<?php if ($peritaje): ?>
		<?php foreach ($peritaje as $key): ?>
			<?php if ($key->ins_choque==1): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_5" id="estado_inspeccion_5" value="1" checked="checked"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_5" id="estado_inspeccion_5" value="2" disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_5" id="estado_inspeccion_5" value="3" onclick="continuar();" disabled="true"><label>M</label>
				<?php else: ?>
					<?php if ($key->ins_choque==2): ?>
				<input type="radio"onclick="continuar();"  name="estado_inspeccion_5" id="estado_inspeccion_5" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_5" id="estado_inspeccion_5" value="2"checked="checked"><label>R</label>
				<input type="radio" name="estado_inspeccion_5" id="estado_inspeccion_5" value="3" onclick="continuar();"disabled="true"><label>M</label>
						<?php else: ?>
							<?php if ($key->ins_choque==3): ?>

				<input type="radio"onclick="continuar();"  name="estado_inspeccion_5" id="estado_inspeccion_5" value="1" disabled="true"><label>B</label>
				<input type="radio" onclick="continuar();" name="estado_inspeccion_5" id="estado_inspeccion_5" value="2"disabled="true"><label>R</label>
				<input type="radio" name="estado_inspeccion_5" id="estado_inspeccion_5" value="3" onclick="continuar();" checked="checked"><label>M</label>
							<?php endif ?>
					<?php endif ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	</strong>
	</div>
</div>


	<div class="col-md-12 col-sm-12 col-xs-12">
<hr>
  <div class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Inspeccion</span></h3></strong>
  </div>
  <div align="center" class="col-md-4 col-sm-4 col-xs-4">
  	 <strong><h3><span class ="label label-default">Peritaje</span></h3></strong>
  </div>
  <div align="center" class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Costo</span></h3></strong>
  </div>
   <div align="center" class="col-md-3 col-sm-3 col-xs-3">
  	 <strong><h3><span class ="label label-default">Observacion</span></h3></strong>
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
		
		<div class="col-md-3 col-sm-3 col-xs-4">
		<?php if ($key->id_inspeccion_peritaje==42 || $key->id_inspeccion_peritaje==43 || $key->id_inspeccion_peritaje==44 || $key->id_inspeccion_peritaje==45): ?>
		
				<?php if ($key->id_estado_inspeccion==1): ?>
					<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked"><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" readonly ><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" disabled><label><h6>50</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4" disabled><label><h6>25</h6></label>
				<?php else: ?>
			<?php if ($key->id_estado_inspeccion==2): ?>
				<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"  readonly><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" disabled><label><h6>50</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4" disabled><label><h6>25</h6></label>
						<?php else: ?>
							<?php if ($key->id_estado_inspeccion==3): ?>
		<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"  disabled><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"  disabled><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"checked="checked" readonly ><label><h6>50</h6></label>	
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"disabled ><label><h6>25</h6></label>
				<?php else: ?>
							<?php if ($key->id_estado_inspeccion==4): ?>
		<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"  disabled><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"  disabled><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"disabled ><label><h6>50</h6></label>	
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"checked="checked" ><label><h6>25</h6></label>	
							<?php endif ?>	
						<?php endif ?>
					<?php endif ?>
				<?php endif ?>
<?php else: ?>
		<?php if ($key->id_estado_inspeccion==1): ?>
			<?php if ($key->id_inspeccionado==1): ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
				<?php else: ?>
					<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
					<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label><h6>No</h6></label>
			<?php endif ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>M</h6></label>
			<?php else: ?>
				<?php if ($key->id_estado_inspeccion==2): ?>
					<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label><h6>No</h6></label>
		<?php endif ?>
					&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>M</h6></label>
					<?php else: ?>
						<?php if ($key->id_estado_inspeccion==3): ?>
							<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label>Si</label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" readonly><label>No</label>
		<?php endif ?>
							&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" ><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" checked="checked"  ><label><h6>M</h6></label>
						<?php endif ?>
				<?php endif ?>
		<?php endif ?>

		<?php endif ?>			
				
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id_inspeccion_peritaje?>" name="txt_costo_<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar();"class="form-control" value="<?=$key->costo_estimado_det_peritaje?>" placeholder="Costo" readonly>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" name="txt_observacion_<?=$key->id_inspeccion_peritaje?>" class="form-control" value="<?=$key->observaciones_det_peritaje?>" placeholder="Observaciones" readonly>
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
		<input type="number" class="form-control" placeholder="Total" id="txt_total" name="txt_total_gasto" value="<?=$key->total_gasto_peritaje?>" readonly="true">
	</div>
	</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<p></p>
<hr>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<h4><P ALIGN="RIGHT"><label>Observaciones:</label></h4></P>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<textarea name="txt_observaciones" placeholder="Ingrese Observaciones" class="form-control" readonly><?=$key->observaciones_peritaje?></textarea>		
			</div>
			</div>
		<?php endforeach ?>
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-3 col-md-11">
					     
					      <a href="<?php echo $this->config->base_url();?>peritaje"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Regresar</button></a>
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
