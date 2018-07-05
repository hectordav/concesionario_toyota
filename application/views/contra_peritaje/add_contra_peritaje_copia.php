<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h5><strong>Crear Copia Contra-Peritaje<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>contra_peritaje/guardar_copia_contra_peritaje" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="txt_id_copia_peritaje" value="<?=$id_contraperitaje?>">
					<?php if ($peritaje): ?>
						<?php foreach ($peritaje as $data): ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<p></p>
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Fecha Peritaje:</label></h5></P>
					</div>
						<div class="col-md-10 col-sm-10 col-xs-10">
							<input type="hidden" name="txt_id_peritaje" value="<?=$data->id_peritaje?>">
								<input type="hidden" name="txt_id_cliente" value="<?=$data->id_cliente?>">
							<input type="hidden" name="txt_id_vehiculo" value="<?=$data->id_vehiculo?>">
							<?$fecha=date('d-m-Y', strtotime($data->fecha_peritaje))?>
							<input type="text" class="form-control" name="txt_fecha_peritaje" value="<?=$fecha?>" placeholder="" readonly>
						</div>
					</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="col-md-2 col-sm-2 col-xs-2">
					<h5><P ALIGN="RIGHT"><label>Cliente:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
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
						<h5><P ALIGN="RIGHT"><label>Patente:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_dominio" value="<?=$data->placa_vehiculo?>" placeholder="" readonly>
					</div></div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Kilometraje:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_vehiculo?>" readonly>
					</div>	
					<!-- * -->
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-2 col-sm-2 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Nuevo KM:</label></h5></P>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<input type="text" class="form-control" name="txt_km_2" value="" placeholder="Ingrese Nuevo Kilometraje" required="required">
			</div>	
					<!-- * -->
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Manuales:</label></h5></P>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" class="form-control" name="txt_manual" value="<?=$data->manual_peritaje?>" readonly>		
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Llaves:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_llaves" value="<?=$data->llaves_peritaje?>" readonly>		
					</div>
					</div>
<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Precio Estimado</label></h5></P>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" class="form-control" name="txt_precio_estimado" value="<?=$data->precio_estimado_peritaje?>" readonly>
		</div>
</div>
<?php endforeach ?>
	<?php endif ?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-2 col-sm-2 col-xs-2">
			<h5><P ALIGN="RIGHT"><label>Adjunto</label></h5></P>
	</div>
	<?php if ($adjunto_peritaje): ?>
		<?php foreach ($adjunto_peritaje as $data): ?>
			<div class="col-md-2 col-sm-2 col-xs-2">
	 <a data-toggle="modal" href="#<?=$data->id?>" class="thumbnail" style="height:auto;">
      <img src="<?=$this->config->base_url()?>assets/img/<?=$data->adjunto?>">
    </a>
     </div>
     <!--******************** la modal ************************ -->
     <div class="modal fade "id="<?=$data->id?>">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
			<div class="container">
				<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <img class="img-responsive"src="<?=$this->config->base_url()?>assets/img/<?=$data->adjunto?>">
</div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->
		   </div>
		 </div>
	<?php endforeach ?>
		
	<?php endif ?>
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
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto frontal</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_1">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-3">
			<h6><label>Foto lateral derecho</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_2">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Foto lateral izquierdo</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_3">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Foto trasera</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_4">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Foto interior plazas delanteras</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_5">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Foto interior plazas traseras</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_6">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Foto motor</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_7">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Foto bateria</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_8">	
		</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Diagnostico computarizado</label></h6>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="file" name="mi_archivo_9">	
		</div>
</div>
<!--* -->


	<div class="col-md-12 col-sm-12 col-xs-12">
<hr>
  <div class="col-md-2 col-sm-2 col-xs-1">
  	 <strong><h3><span class ="label label-default">Inspeccion</span></h3></strong>
  </div>
  <div align="center" class="col-md-4 col-sm-4 col-xs-4 ">
  	 <strong><h3><span class ="label label-default">Peritaje</span></h3></strong>
  </div>
  
  <div align="center" class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Costo</span></h3></strong>
  </div>
   <div align="center" class="col-md-2 col-sm-2 col-xs-2">
  	 <strong><h3><span class ="label label-default">Observaciones</span></h3></strong>
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
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked"  ><label><h6>100</h6></label>
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
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"  ><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" disabled><label><h6>50</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4" disabled><label><h6>25</h6></label>
						<?php else: ?>
							<?php if ($key->id_estado_inspeccion==3): ?>
		<?php if ($key->id_inspeccionado==1): ?>
		<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"  disabled><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"  disabled><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" checked="checked"><label><h6>50</h6></label>	
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="4" disabled><label><h6>25</h6></label>
				<?php else: ?>
				<?php if ($key->id_estado_inspeccion==4): ?>
		<?php if ($key->id_inspeccionado==1): ?>
		<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"  disabled><label><h6>100</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2"  disabled><label><h6>75</h6></label>
	<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" disabled><label><h6>50</h6></label>	
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
					<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
			<?php endif ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" disabled><label><h6>M</h6></label>
			<?php else: ?>
				<?php if ($key->id_estado_inspeccion==2): ?>
					<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>Si</h6></label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label><h6>No</h6></label>
		<?php endif ?>
					&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked" ><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" disabled><label><h6>M</h6></label>
					<?php else: ?>
						<?php if ($key->id_estado_inspeccion==3): ?>
							<?php if ($key->id_inspeccionado==1): ?>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>Si</h6></label>
			<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>No</h6></label>
			<?php else: ?>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="1" disabled><label>Si</label>
				<input type="radio" name="radio_<?=$key->id_inspeccion_peritaje?>" id="radio_<?=$key->id_inspeccion_peritaje?>" value="2" checked="checked"><label>No</label>
		<?php endif ?>
							&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="1"  disabled><label><h6>B</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="2" disabled><label><h6>R</h6></label>
			<input type="radio" name="estado_<?=$key->id_inspeccion_peritaje?>" id="estado_<?=$key->id_inspeccion_peritaje?>" value="3" checked="checked"  ><label><h6>M</h6></label>
						<?php endif ?>
				<?php endif ?>
		<?php endif ?>
		<?php endif ?>			
				
		</div>

		<?php if ($key->id_inspeccion_peritaje==42 || $key->id_inspeccion_peritaje==43 || $key->id_inspeccion_peritaje==44 || $key->id_inspeccion_peritaje==45 || $key->id_inspeccion_peritaje==46): ?>
		<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id_inspeccion_peritaje?>" name="txt_costo_<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar();"class="form-control" value="<?=$key->costo_estimado_det_peritaje?>" placeholder="Costo" readonly>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" class="form-control" name="" value="<?=$key->observaciones_det_peritaje?>" readonly>
		</div>
		<?php else: ?>
			<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_<?=$key->id_inspeccion_peritaje?>" name="txt_costo_<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar();"class="form-control" value="<?=$key->costo_estimado_det_peritaje?>" placeholder="Costo" readonly>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
				<input type="text" class="form-control" name="" value="<?=$key->observaciones_det_peritaje?>" readonly>
		</div>

			<?php endif ?>

	</div>
<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'>
<p></p>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<strong><h3><span class ="label label-default">C. Peritaje</span></h3></strong>
		
		</div>
	
		<div class="col-md-3 col-sm-3 col-xs-3">
		 	<input type="radio" name="radiocp_<?=$key->id_inspeccion_peritaje?>" id="radiocp_<?=$key->id_inspeccion_peritaje?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radiocp_<?=$key->id_inspeccion_peritaje?>" id="radiocp_<?=$key->id_inspeccion_peritaje?>" value="2" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
				<input type="number" id="txt_costo_c_peritaje<?=$key->id_inspeccion_peritaje?>" name="txt_costo_c_peritaje<?=$key->id_inspeccion_peritaje?>" onkeyup="fncSumar2();" class="form-control" value="" placeholder="Costo">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-3">
		<input type="text" class="form-control" name="txt_observacion_cp_<?=$key->id_inspeccion_peritaje?>" value="" placeholder="Ingrese Observaciones">
			
		</div>
	</div>	
<?php endforeach ?>
<!-- cierra peritaje -->
</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
	<div class="col-md-3 col-sm-3 col-xs-3">
		<h4><label>Total Gastos Peritaje:</label></h4>
		<?php foreach ($peritaje as $key): ?>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="number" class="form-control" placeholder="Total" id="txt_total" name="txt_total_gasto" value="<?=$key->total_gasto_peritaje?>" readonly="true">
	</div>
	<div class="col-md-4 col-sm-4 col-xs-4">
		<h4><label>Total Gastos Contra Peritaje:</label></h4>
	</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
		<input type="number" class="form-control" placeholder="Total" id="txt_total_c_peritaje" name="txt_total_c_peritaje" value="" readonly="true">
	</div>
	</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<p></p>
<hr>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<h4><P ALIGN="RIGHT"><label>Observaciones Peritaje:</label></h4></P>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<textarea name="txt_observaciones" placeholder="Ingrese Observaciones" class="form-control" readonly><?=$key->observaciones_peritaje?></textarea>		
			</div>
			</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<p></p>
<hr>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<h4><P ALIGN="RIGHT"><label>Observaciones C Peritaje:</label></h4></P>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<textarea name="txt_observaciones_c_peritaje" placeholder="Ingrese Observaciones" class="form-control"></textarea>		
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
					      <a href="<?php echo $this->config->base_url();?>contra_peritaje"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Regresar</button></a>
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
