<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h5><strong>Crear Nuevo Peritaje Sobre Peritaje ya Creado<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>peritaje/guardar_copia_peritaje" method="POST">

					<?php if ($peritaje): ?>
						<?php foreach ($peritaje as $data): ?>
				<div <div class="form-group">
					<p></p>
					<div class="col-md-1 col-sm-1 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Fecha Peritaje:</label></h5></P>
					</div>
						<div class="col-md-11 col-sm-11 col-xs-12">
							<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
							<?$fecha=date('d-m-Y', strtotime($data->fecha_peritaje))?>
							<input type="text" class="form-control" name="txt_fecha_peritaje" value="<?=$fecha?>" placeholder="" readonly>
							<input type="hidden" name="txt_id_vehiculo" value="<?=$data->id_vehiculo?>">
						</div>
					
					</div>
				<div <div class="form-group">
				
						<input type="hidden" name="txt_recomendado" id="txt_recomendado" value="1">
						<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
					<?php endforeach ?>	
					<?php endif ?>
					<div class="col-md-1 col-sm-1 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Cliente:</label></h5></P>
					</div>
				
					<div class="col-md-11 col-sm-11 col-xs-12">
						<?php if ($cliente): ?>
							<?php foreach ($cliente as $key): ?>
								
						<input type="hidden" name="txt_id_cliente" value="<?=$key->id?>">
						<input type="text" class="form-control" name="txt_cliente" value="<?=$key->dni?>, <?=$key->nombre?> " placeholder="" readonly>
					</div>	
							<?php endforeach ?>
						<?php endif ?>
						<hr>
					</div>
						<?php if ($peritaje): ?>
						<?php foreach ($peritaje as $data): ?>
<!--*****************************************************************************-->
<div <div class="form-group">
					<!-- * -->
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><p align="right"><label>Marca:</label></p></h5>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_marca_vehiculo" value="<?=$data->marca_vehiculo?>" placeholder="" readonly>	

					</div>
		</div>
					<!-- * -->
	<div <div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Modelo:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_modelo_vehiculo" value="<?=$data->modelo_vehiculo?>" placeholder="" readonly>	
</div>
					</div>
					<!-- * -->
<div <div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Color:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
					<input type="text" class="form-control" name="txt_color" value="<?=$data->color_vehiculo?>" placeholder="" readonly>	
					</div>
</div>
					<!-- * -->
<div <div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Año:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_ano" value="<?=$data->ano_vehiculo?>" placeholder="" readonly>
					</div>
					</div>
					<!-- * -->
<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Patente:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_dominio" value="<?=$data->placa_vehiculo?>" placeholder="" readonly>
					</div>
		</div>
					<!-- * -->
<div <div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Kilometraje:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_vehiculo?>" placeholder="" readonly>
					</div>	

					<!-- * -->
</div>
<div <div class="form-group">

		<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Asignado a</label></h5></P>
		</div>
		<div class="col-md-11 col-sm-11 col-xs-12">
		<select class="form-control" data-live-search="true" id="id_usuario_vendedor" name="id_usuario_vendedor" required>
				  <?php if ($usuario): ?>
				  	<option data-tokens="" value="">Seleccione</option>
					  <?php foreach ($usuario as $data): ?>
						<option data-tokens="<?= $data->id.", ".$data->nombre?>" value="<?= $data->id?>"><?= $data->nombre ?></option>
					  <?php endforeach ?>
					<?php else:?>
						<option data-tokens="" value="">Seleccione</option>
				  <?php endif ?>
		</select>
		</div>
<!-- * -->
</div>

<div <div class="form-group">

		<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Manuales:</label></h5></P>
		</div>
		<div class="col-md-11 col-sm-11 col-xs-12">
			<?php if ($data->manual_peritaje==1): ?>
					<input type="radio" name="manual" id="manual" value="1" onclick="fncver();" checked="checked" ><label>Si</label>&nbsp;

					<input type="radio" name="manual" id="manual" value="0" onclick="fncnover();" ><label>No</label>
					<?php if ($data->manual_usuario==1): ?>
						
						<input type="checkbox" name="manual_usuario" id="manual_usuario" value="1" checked="true" ><label>&nbsp;Manual de Usuario</label>&nbsp;
					<?php else: ?>
						<input type="checkbox" name="manual_usuario" id="manual_usuario" value="1" ><label>&nbsp;Manual de Usuario</label>&nbsp;
					<?php endif ?>
					<?php if ($data->manual_servicio==1): ?>
						
						<input type="checkbox" name="manual_servicio" id="manual_servicio" value="1" checked="true" ><label>&nbsp;Servicio Oficial</label>
					<?php else: ?>
						<input type="checkbox" name="manual_servicio" id="manual_servicio" value="1" ><label>&nbsp;Servicio Oficial</label>
						<?php endif ?>		
			
				<?php else: ?>
					<input type="radio" name="manual" id="manual" value="1" onclick="fncver();" ><label>Si</label>&nbsp;
					<input type="radio" name="manual" id="manual" value="0" onclick="fncnover();" checked="checked"><label>No</label>
					<input type="checkbox" name="manual_usuario" id="manual_usuario" value="1" ><label>&nbsp;Manual de Usuario</label>&nbsp;
					<input type="checkbox" name="manual_servicio" id="manual_servicio" value="1" ><label>&nbsp;Servicio Oficial</label>
			<?php endif ?>		
		</div>
		
		<!-- * -->
</div>
<div <div class="form-group">

					<div class="col-md-1 col-sm-1 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Llaves:</label></h5></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<?php if ($data->llaves_peritaje==1): ?>
							<input type="radio" name="llave" id="llave" value="1" checked="checked"><label>1</label>&nbsp;
							<input type="radio" name="llave" id="llave" value="2" ><label>2</label>	&nbsp;	
							<input type="radio" name="llave" id="llave" value="3" ><label>3</label>
							&nbsp;&nbsp;&nbsp;
							<?php else: ?>
							<?php if ($data->llaves_peritaje==2): ?>
								<input type="radio" name="llave" id="llave" value="1"><label>1</label>&nbsp;
								<input type="radio" name="llave" id="llave" value="2" checked="checked"><label>2</label>	&nbsp;	
								<input type="radio" name="llave" id="llave" value="3" ><label>3</label>
							&nbsp;&nbsp;&nbsp;
								<?php else: ?>
							<?php if ($data->llaves_peritaje==3): ?>
									<input type="radio" name="llave" id="llave" value="1"><label>1</label>&nbsp;
							<input type="radio" name="llave" id="llave" value="2"><label>2</label>	&nbsp;	
							<input type="radio" name="llave" id="llave" value="3" checked="checked"><label>3</label>
							<?php endif ?>
								<?php endif ?>
						<?php endif ?>
						<?php if ($data->duplicado_llaves): ?>
							Duplicado
								<input type="radio" name="duplicado" id="duplicado" value="1" checked="checked"><label>Si</label>	&nbsp;	
								<input type="radio" name="duplicado" id="duplicado" value="0" ><label>No</label>
							<?php else: ?>
								Duplicado

								<input type="radio" name="duplicado" id="duplicado" value="1" ><label>Si</label>	&nbsp;	
								<input type="radio" name="duplicado" id="duplicado" value="0" checked="checked" ><label>No</label>
						<?php endif ?>
					</div>
	</div>

<div <div class="form-group">
		<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Precio Estimado</label></h5></P>
		</div>
		<div class="col-md-11 col-sm-11 col-xs-12">
			<input type="text" class="form-control" name="txt_precio_estimado" value="<?=$data->precio_estimado_peritaje?>" readonly>
		</div>
</div>
<?php endforeach ?>
	<?php endif ?>
<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
<hr>
<div class="col-md-2 col-sm-2 col-xs-2 col-lg-offset-1 col-xs-offset-1 col-sm-offset-1">
  	 <strong><h3><span class ="label label-default">Inspeccion General</span></h3></strong>
  </div>
 </div>
 <input type="hidden" name="txt_regular" id="txt_regular" value="0">
<input type="hidden" name="txt_malo" id="txt_malo" value="0">

 <?php foreach ($inspeccion_general as $key): ?>
 <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2"> 
		<h4><label><?=$key->descripcion?></label></h4></P>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
	<p></p>
	<strong>
	&nbsp;
	<input type="radio"onclick="continuar_3(); continuar(); continuar_2();"  name="estado_inspeccion_<?=$key->id?>" id="estado_inspeccion_<?=$key->id?>" value="1" checked="checked"><label>B</label>
	<input type="radio" onclick="continuar_2(); continuar();continuar_2();cierra_con_los_hidden_1_2();" name="estado_inspeccion_<?=$key->id?>" id="estado_inspeccion_<?=$key->id?>" value="2"><label>R</label>
	<input type="radio" name="estado_inspeccion_<?=$key->id?>" id="estado_inspeccion_<?=$key->id?>" value="3" onclick="continuar(); continuar_2(); continuar();cierra_con_los_hidden_1_2();"><label>M</label>
	</strong>
	</div>
</div>
<?php endforeach ?>
<!-- * -->

<div id="inspeccion_detalle" style="display: block" class="animated fadeInDown">

	<div class="col-md-12 col-sm-12 col-xs-12">
<hr>
  <div class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Inspeccion</span></h3></strong>
  </div>
  <div align="center" class="col-md-4 col-sm-4 col-xs-5">
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
<!-- La parte del peritaje -->		

<?php foreach ($det_peritaje as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'>
	<tr></tr>
	<p></p>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<h5><label><?=$key->descripcion_inspeccion?></label></h5>
		</div>
		<input type="hidden" name="txt_id_det_peritaje" id="txt_id_det_peritaje"value="<?=$key->id_det_peritaje?>">
		
		<div class="col-md-3 col-sm-3 col-xs-4">
		<?php if ($key->id_inspeccion_peritaje==42 || $key->id_inspeccion_peritaje==43 || $key->id_inspeccion_peritaje==44 || $key->id_inspeccion_peritaje==45 || $key->id_inspeccion_peritaje==46): ?>
		
				<?php if ($key->id_estado_inspeccion==1): ?>
					<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked"  ><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>50</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"><label><h6>25</h6></label>
				<?php else: ?>
			<?php if ($key->id_estado_inspeccion==2): ?>
				<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"  ><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>50</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"><label><h6>25</h6></label>
						<?php else: ?>
							<?php if ($key->id_estado_inspeccion==3): ?>
		<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" ><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" ><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"checked="checked"><label><h6>50</h6></label>	
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"><label><h6>25</h6></label>
				<?php else: ?>
				<?php if ($key->id_estado_inspeccion==4): ?>
		<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" ><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" ><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>50</h6></label>	
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4"checked="checked" ><label><h6>25</h6></label>	
							<?php endif ?>	
						<?php endif ?>
					<?php endif ?>
				<?php endif ?>
	<?php else: ?>
		<?php if ($key->id_estado_inspeccion==1): ?>
			<?php if ($key->id_inspeccionado==1): ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
				<?php else: ?>
					<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>Si</h6></label>
					<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
			<?php endif ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>M</h6></label>
			<?php else: ?>
				<?php if ($key->id_estado_inspeccion==2): ?>
					<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
					&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3"><label><h6>M</h6></label>
					<?php else: ?>
						<?php if ($key->id_estado_inspeccion==3): ?>
							<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2"><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1"><label>Si</label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label>No</label>
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
		<?php if ($key->id_inspeccion_peritaje==42 || $key->id_inspeccion_peritaje==43 || $key->id_inspeccion_peritaje==44 || $key->id_inspeccion_peritaje==45 || $key->id_inspeccion_peritaje==46): ?>
		<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id_inspeccion_peritaje?>" name="txt_costo_<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar();"class="form-control" value="<?=$key->costo_estimado_det_peritaje?>" placeholder="Costo">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" name="txt_observacion_<?=$key->id_inspeccion_peritaje?>" class="form-control" value="<?=$key->observaciones_det_peritaje?>" placeholder="Observaciones">
		</div>
		<?php else: ?>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id_inspeccion_peritaje?>" name="txt_costo_<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar();"class="form-control" value="<?=$key->costo_estimado_det_peritaje?>" placeholder="Costo">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" name="txt_observacion_<?=$key->id_inspeccion_peritaje?>" class="form-control" value="<?=$key->observaciones_det_peritaje?>" placeholder="Observaciones">
		</div>

			<?php endif ?>
	</div>
<?php endforeach ?>
<!-- cierra peritaje -->
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
</div></div>
<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
				
			</div>
	</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
				<h6><P ALIGN="RIGHT"><label>Observacion</label></h6></P>
			</div>
			<div class="col-md-11 col-sm-11 col-xs-11">
				<textarea name="txt_observaciones" placeholder="Ingrese Observaciones" class="form-control"><?=$key->observaciones_peritaje?></textarea>		
			</div>
	</div>
	
		<?php endforeach ?>

<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
						<p></p>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-3 col-md-11">
					      <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>peritaje"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Cancelar</button></a>
						
					    </div>
					  </div>
			</div></form>
			<br>
		</div>
	</div>
  </div>
 </div>
	    	</div>
</div>
