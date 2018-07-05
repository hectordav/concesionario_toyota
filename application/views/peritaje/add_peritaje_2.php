<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
             <div class="animated bounceInDown">
              <div class="alert alert-warning alert-dismissible" align="center">
        <strong>!!CUIDADO!! Ya Existe un peritaje asociado a este vehiculo &nbsp; &nbsp; <a class="btn btn-primary" href="<?=$this->config->base_url()?>peritaje/ver/<?= $id_peritaje?>" title="">Ir a Peritaje Asociado </a>
        </strong>
           <br>
              </div>
             </div> 
		<div class="table-label">
				<h4><strong>Peritaje Tecnico de Unidades<strong></h4>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>peritaje/guardar_original_copia_peritaje" method="POST" enctype="multipart/form-data">
				<div class="form-group" >
					<p></p>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><label>Cliente:</label></h4>
						</div>
					<input type="hidden" name="txt_id_peritaje" value="<?= $id_peritaje?>">
					<input type="hidden" name="txt_recomendado" id="txt_recomendado" value="1">
					  <div class="col-md-11 col-sm-11 col-xs-12">
						<?php if ($cliente): ?>
							<?php foreach ($cliente as $data): ?>
							<input type="hidden" name="txt_id_cliente" value="<?=$data->id?>">
								<input type="text" class="form-control" name="txt_cliente" value="<?=$data->dni?>, <?=$data->nombre?> " placeholder="" readonly>
							<?php endforeach ?>
					<?php endif ?>

							<?php if ($vehiculo): ?>
							<?php foreach ($vehiculo as $data): ?>
							<input type="hidden" name="txt_id_vehiculo" value="<?=$data->id_vehiculo?>">
						</div>
					
					</div>
<!--*****************************************************************************-->
<div class="form-group">
					<!-- * -->
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><label >Marca:</label></h4>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_marca_vehiculo" value="<?=$data->marca_vehiculo?>" placeholder="" readonly>	

					</div>
		</div>
					<!-- * -->
	<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><P ALIGN="RIGHT"><label>Modelo:</label></h4></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_modelo_vehiculo" value="<?=$data->modelo_vehiculo?>" placeholder="" readonly>	
</div>
					</div>
					<!-- * -->
<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><P ALIGN="RIGHT"><label>Color:</label></h4></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
					<input type="text" class="form-control" name="txt_color" value="<?=$data->color_vehiculo?>" placeholder="" readonly>	
					</div>
</div>
					<!-- * -->
<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><P ALIGN="RIGHT"><label>Año:</label></h4></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_ano" value="<?=$data->ano_vehiculo?>" placeholder="" readonly>		
					</div>
					</div>
					<!-- * -->
<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><P ALIGN="RIGHT"><label>Dominio:</label></h4></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_dominio" value="<?=$data->placa_vehiculo?>" placeholder="" readonly>	
					</div></div>
					<!-- * -->
<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><P ALIGN="RIGHT"><label>Km:</label></h4></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_vehiculo?>" placeholder="" readonly>
					</div>
</div>	
<div class="form-group">
					<div class="col-md-1 col-sm-1 col-xs-1">
						<h4><P ALIGN="RIGHT"><label>Nuevo Km:</label></h4></P>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12">
						<input type="text" class="form-control" name="txt_km_2" value="" placeholder="" required>
					</div>
</div>					
					<!-- * -->
					<?php endforeach ?>
					<?php endif ?>

</div>
<div class="form-group">

		<div class="col-md-1 col-sm-1 col-xs-1">
			<h4><P ALIGN="RIGHT"><label>Asignado</label></h4></P>
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
</div>
</div>

<div class="form-group">

		<div class="col-md-1 col-sm-1 col-xs-1">
			<h4><label>&nbsp;&nbsp;Manuales:</label></h4>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
		<p></p>
		&nbsp;&nbsp;
		<input type="radio" name="manual" id="manual" value="1" onclick="fncver();" ><label>Si</label>&nbsp;
		<input type="radio" name="manual" id="manual" value="0" onclick="fncnover();" checked="checked"><label>No</label>	
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12" style="display: none" id="ver_manual">
		<p></p>
		&nbsp;&nbsp;
			<input type="checkbox" name="manual_usuario" id="manual_usuario" value="1"><label>&nbsp;Manual de Usuario</label>&nbsp;
			<input type="checkbox" name="manual_servicio" id="manual_servicio" value="1"><label>&nbsp;Servicio Oficial</label>
		</div>
		</div>
		
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-1 col-sm-1 col-xs-1">
			<h4><P ALIGN="RIGHT"><label>Llaves:</label></h4></P>
		</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
			<p></p>
			<input type="radio" name="llave" id="llave" value="1" checked="checked"><label>1</label>&nbsp;
			<input type="radio" name="llave" id="llave" value="2" ><label>2</label>	&nbsp;	
			<input type="radio" name="llave" id="llave" value="3" ><label>3</label>
			&nbsp;&nbsp;&nbsp;
			Duplicado
			<input type="radio" name="duplicado" id="duplicado" value="1" ><label>Si</label>	&nbsp;	
			<input type="radio" name="duplicado" id="duplicado" value="0" checked="checked" ><label>No</label>
			</div>	
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-2">
			<h5><label>Verificacion</label></h5>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-4" align="right">
		 <a target="_blank" href="<?=$this->config->base_url()?>peritaje/canvas_corolla" class="thumbnail" style="height:auto;">
	      <img src="<?=$this->config->base_url()?>assets/img/corolla.png">
	    </a>
   </div>
   <div class="col-md-2 col-sm-2 col-xs-4" align="right">
		 <a target="_blank" href="<?=$this->config->base_url()?>peritaje/canvas_hilux" class="thumbnail" style="height:auto;">
	      <img src="<?=$this->config->base_url()?>assets/img/hilux.png">
	    </a>
   </div>
	</div>
    
</div>
<!--*-->
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Adjunto. Verificacion</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
		
			<input type="file" name="adjunto_verificacion">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-3">
			<h6><label>Foto frontal</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_1">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-3">
			<h6><label>Foto lateral derecho</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_2">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Foto lateral izquierdo</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_3">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Foto trasera</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_4">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Foto interior plazas delanteras</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_5">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Foto interior plazas traseras</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_6">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Foto motor</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_7">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Foto bateria</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_8">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-2 col-sm-2 col-xs-2">
			<h6><label>Diagnostico computarizado</label></h6>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-12">
			<input type="file" name="mi_archivo_9">	
		</div>
</div>
<!--* -->

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
	&nbsp;
	&nbsp;
	
	

	<input type="radio"onclick="continuar_3(); continuar(); continuar_2(); "  name="estado_inspeccion_<?=$key->id?>" id="estado_inspeccion_<?=$key->id?>" value="1" checked="checked"><label>B</label>
	<input type="radio" onclick="continuar_2(); continuar();continuar_2();cierra_con_los_hidden_1_2();
" name="estado_inspeccion_<?=$key->id?>" id="estado_inspeccion_<?=$key->id?>" value="2"><label>R</label>
	<input type="radio" name="estado_inspeccion_<?=$key->id?>" id="estado_inspeccion_<?=$key->id?>" value="3" onclick="continuar(); continuar_2(); continuar();cierra_con_los_hidden_1_2();"><label>M</label>
	</strong>
	</div>
</div>
<?php endforeach ?>

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
<?php foreach ($inspeccion as $key): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;' >
	<tr></tr>
	<p></p>
		<div class="col-md-3 col-sm-3 col-xs-2">
			<h5><label><?=$key->descripcion?></label></h5>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-5">
			<?php if ($key->id==42 || $key->id==43 || $key->id==44 || $key->id==45 || $key->id==46): ?>
				<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="1" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="2" checked="checked"><label><h6>No</h6></label>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="1" checked="checked" ><label><h6>100</h6></label>
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="2"><label><h6>75</h6></label>
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="3"><label><h6>50</h6></label>
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="4"><label><h6>25</h6></label>
				<?php else: ?>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="1" ><label>Si</label>
			<input type="radio" name="radio_<?=$key->id?>" id="radio_<?=$key->id?>" value="2" checked="checked"><label>No</label>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="1" checked="checked" ><label>B</label>
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="2"><label>R</label>
			<input type="radio" name="estado_<?=$key->id?>" id="estado_<?=$key->id?>" value="3"><label>M</label>
			<?php endif ?>
		</div>
			<?php if ($key->id==37 || $key->id==42 || $key->id==43 || $key->id==44 || $key->id==45): ?>
		<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id?>" name="txt_costo_<?=$key->id?>" onkeyup="fncSumar();"class="form-control" value="" placeholder="Costo">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" name="txt_observacion_<?=$key->id?>" class="form-control" value="" placeholder="Ingrese Marca y Observaciones">
		</div>
			<?php else: ?>
				<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="number" id="txt_costo_<?=$key->id?>" name="txt_costo_<?=$key->id?>" onkeyup="fncSumar();"class="form-control" value="" placeholder="Costo">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" name="txt_observacion_<?=$key->id?>" class="form-control" value="" placeholder="Observaciones">
					</div>

			<?php endif ?>

</div>
<?php endforeach ?>
<!-- cierra peritaje -->
</div>
	<div class="col-md-12 col-sm-12 col-xs-12" id="inspeccion_detalle" style="display: block">
	<p></p>
	<div class="col-md-2 col-sm-2 col-xs-3 col-lg-offset-4 col-xs-offset-4 col-sm-offset-4" align="right" >
		<h5><label>Total Gastos:</label></h5>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-4">
		<input type="number" class="form-control" placeholder="Total" id="txt_total" name="txt_total_gasto" value="" placeholder="" readonly="true">
	</div>
	</div>
	
	</div>
	

<div class="col-md-12 col-sm-12 col-xs-12">
<hr>
	<div class="col-md-2 col-sm-2 col-xs-2">
		<h5><P ALIGN="RIGHT"><label>Recomendable</label></h5></P>
	</div>
		<div class="col-md-2 col-sm-2 col-xs-12	">
		
			<input type="radio" id="radio1" name="recomendable" value="1" placeholder="" checked="checked"><label>SI</label>
			<input type="radio" id="radio2" name="recomendable" value="12" placeholder=""><label>NO</label>
		</div>
	</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<p></p>

			<div class="col-md-2 col-sm-2 col-xs-2">
				<h5><P ALIGN="RIGHT"><label>Observaciones:</label></h5></P>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<textarea name="txt_observaciones" placeholder="Ingrese Observaciones" class="form-control"></textarea>		
			</div>
			</div>
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
