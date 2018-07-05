<div class="right_col" role="main" style="height:auto;">
	    	<div class="x_panel">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-label">
				<h5><strong>Ver Recepcion de Vehiculo<strong></h5>
				</div>
			<div class="form-container table-container">
				<form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>recepcion/guardar_recepcion" method="POST" enctype="multipart/form-data">
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
							<input type="text" class="form-control" name="txt_fecha_peritaje" value="<?=$fecha?>"  readonly>
						</div>
					</div>
				
<!--*****************************************************************************-->
<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- * -->
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><p align="right"><label>Marca:</label></p></h5>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_marca_vehiculo" value="<?=$data->marca_vehiculo?>"  readonly>	

					</div>
		</div>
					<!-- * -->
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Modelo:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_modelo_vehiculo" value="<?=$data->modelo_vehiculo?>"  readonly>	
</div>
					</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Color:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="txt_color" value="<?=$data->color_vehiculo?>"  readonly>	
					</div>
</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Año:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_ano" value="<?=$data->ano_vehiculo?>"  readonly>
					</div>
					</div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Dominio:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_dominio" value="<?=$data->ano_vehiculo?>"  readonly>
					</div></div>
					<!-- * -->
<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<h5><P ALIGN="RIGHT"><label>Kilometraje:</label></h5></P>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<input type="text" class="form-control" name="txt_km" value="<?=$data->kilometraje_nuevo?>"  readonly>
					</div>	
					<!-- * -->
					</div>
<?php endforeach ?>
	<?php endif ?>
	<?php if ($recepcion): ?>
		<?php foreach ($recepcion as $key): ?>
			<?php if ($key->combustible==1): ?>
				<!-- **** -->
				<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-2 col-sm-2 col-xs-2">
		<h5><P ALIGN="RIGHT"><label>Combustible:</label></h5></P>
	</div>
	<div class="col-md-10 col-sm-10 col-xs-10">
		<input type="radio" name="radio_combustible" id="radio_combustible" value="1" checked="checked" ><label><h4>Vacio &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="2" disabled="true" ><label><h4>1/4 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="3" disabled="true" ><label><h4>1/2 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="4" disabled="true" ><label><h4>3/4 Tanque&nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="5" disabled="true" ><label><h4>lleno&nbsp;</h4></label>
	</div>	
<!-- *********************** -->
</div>
				<?php else: ?>
					<?php if ($key->combustible==2): ?>
						<!-- ¨******** -->
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-2 col-sm-2 col-xs-2">
		<h5><P ALIGN="RIGHT"><label>Combustible:</label></h5></P>
	</div>
	<div class="col-md-10 col-sm-10 col-xs-10">
		<input type="radio" name="radio_combustible" id="radio_combustible" value="1" disabled="true" ><label><h4>Vacio &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="2" checked="checked"><label><h4>1/4 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="3" disabled="true" ><label><h4>1/2 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="4" disabled="true"><label><h4>3/4 Tanque&nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="5" disabled="true"><label><h4>lleno&nbsp;</h4></label>
	</div>	
<!-- *************** -->
</div>
						<?php else: ?>
							<?php if ($key->combustible==3): ?>
								<!-- ************* -->
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-2 col-sm-2 col-xs-2">
		<h5><P ALIGN="RIGHT"><label>Combustible:</label></h5></P>
	</div>
	<div class="col-md-10 col-sm-10 col-xs-10">
		<input type="radio" name="radio_combustible" id="radio_combustible" value="1" disabled="true" ><label><h4>Vacio &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="2" disabled="true"><label><h4>1/4 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="3" checked="checked" ><label><h4>1/2 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="4" disabled="true"><label><h4>3/4 Tanque&nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="5" disabled="true"><label><h4>lleno&nbsp;</h4></label>
	</div>	
<!-- *************** -->
</div>
								<?php else: ?>
									<?php if ($key->combustible==4): ?>
<!-- **************** -->
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-2 col-sm-2 col-xs-2">
		<h5><P ALIGN="RIGHT"><label>Combustible:</label></h5></P>
	</div>
	<div class="col-md-10 col-sm-10 col-xs-10">
		<input type="radio" name="radio_combustible" id="radio_combustible" value="1" disabled="true" ><label><h4>Vacio &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="2" disabled="true"><label><h4>1/4 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="3" disabled="ture" ><label><h4>1/2 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="4" checked="checked"><label><h4>3/4 Tanque&nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="5" disabled="true"><label><h4>lleno&nbsp;</h4></label>
	</div>	
<!-- *************** -->
</div>
										<?php else: ?>
											<?php if ($key->combustible==5): ?>
<!-- ******************* -->
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-2 col-sm-2 col-xs-2">
		<h5><P ALIGN="RIGHT"><label>Combustible:</label></h5></P>
	</div>
	<div class="col-md-10 col-sm-10 col-xs-10">
		<input type="radio" name="radio_combustible" id="radio_combustible" value="1" disabled="true" ><label><h4>Vacio &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="2" disabled="true"><label><h4>1/4 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="3" disabled="ture" ><label><h4>1/2 Tanque &nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="4" disabled="true"><label><h4>3/4 Tanque&nbsp;</h4></label>
		<input type="radio" name="radio_combustible" id="radio_combustible" value="5" checked="checked"><label><h4>lleno&nbsp;</h4></label>
	</div>	
<!-- *************** -->
</div>
												
											<?php endif ?>
									<?php endif ?>
							<?php endif ?>
					<?php endif ?>
			<?php endif ?>
	<?php endforeach ?>
	<?php endif ?>
	

<!--*-->
<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-2">
			<h6><label>Adjunto</label></h6>
		</div>
		<?php if ($adjunto_recepcion): ?>
		<?php foreach ($adjunto_recepcion as $data): ?>
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
</div>
<!--* -->
<hr>

<!-- *********************************************************** -->
<!-- *****************toma la inspeccion directa y a desglosa -->
<!-- *********************************************************** -->
<!-- *********************************************************** -->
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
	<?php foreach ($det_inspeccion_recepcion1 as $det_i_rp): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
<?php if ($det_recepcion): ?>

	<?php foreach ($det_recepcion as $data_det_recepcion): ?>
		<!-- si los id son iguales de los det_inspeccion_recepcion1 y det_recepcion -->
		<?php if ($data_det_recepcion->id_det_inspeccion_recepcion==$det_i_rp->id): ?>
			<!-- si es ok o no ok -->
			<?php if ($data_det_recepcion->id_inspeccionado==1): ?>
				<!-- **************************************-->
		<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true" >
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>
		<!-- ********************************************-->
				<?php else: ?>
		<!-- ********************************************-->
		<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" disabled="true"><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" checked="checked"><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true" >
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
				<!-- ****************************************-->
		</div>
						<?php endif ?>
					<?php endif ?>

			<?php endforeach ?>
		<?php endif ?>	
	<?php endforeach ?>
<?php endif ?>


<!-- *************************************************************************** -->
<?php if ($i==2): ?>
	<?php foreach ($det_inspeccion_recepcion2 as $det_i_rp): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
	<?php if ($det_recepcion): ?>
		<?php foreach ($det_recepcion as $data_det_recepcion): ?>
			<?php if ($data_det_recepcion->id_det_inspeccion_recepcion==$det_i_rp->id): ?>
				<?php if ($data_det_recepcion->id_inspeccionado==1): ?>
					<!--**********************************************-->
					<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2"  disabled="true"><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true" >
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>
					<!--**********************************************-->
					<?php else: ?>
					<!--**********************************************-->
					<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" disabled="true"><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" checked="checked"><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>"  readonly="true" >
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>
					<!--********************************************* -->
							<?php endif ?>
					<?php endif ?>
				<?php endforeach ?>
				<?php endif ?>
		
		<?php endforeach ?>
<?php endif ?>
<?php if ($i==3): ?>
	<?php foreach ($det_inspeccion_recepcion3 as $det_i_rp): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
	<?php if ($det_recepcion): ?>
		<?php foreach ($det_recepcion as $data_det_recepcion): ?>
			<?php if ($data_det_recepcion->id_det_inspeccion_recepcion==$det_i_rp->id): ?>
				<?php if ($data_det_recepcion->id_inspeccionado==1): ?>
					<!-- *********************************************** -->
		<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" checked="checked"><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" disabled="true"><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true">
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>
	
					<!-- *********************************************** -->
				<?php else: ?>
					<!-- *********************************************** -->
		<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" checked="checked" disabled="true" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" checked="checked"><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true" >
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>	

					<!-- *********************************************** -->

								<?php endif ?>
							<?php endif ?>
						<?php endforeach ?>
				<?php endif ?>
		
		<?php endforeach ?>
<?php endif ?>
<?php if ($i==4): ?>
	<?php foreach ($det_inspeccion_recepcion4 as $det_i_rp): ?>
	<div class="col-md-12 col-sm-12 col-xs-12" style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'
>
	<tr></tr>
	<p></p>
	<?php if ($det_recepcion): ?>
		<?php foreach ($det_recepcion as $data_det_recepcion): ?>
			<?php if ($data_det_recepcion->id_det_inspeccion_recepcion==$det_i_rp->id): ?>
				<?php if ($data_det_recepcion->id_inspeccionado==1): ?>
						<!-- ******************************************* -->
		<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" checked="checked" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" disabled="true"><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true" >
		</div>

		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>
						<!-- ******************************************* -->
					<?php else: ?>
						<!-- ******************************************* -->
					<div class="col-md-2 col-sm-2 col-xs-2">
			<h2><input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="1" disabled="true" ><label><h6>OK &nbsp;</h6></label>
			<input type="radio" name="radio_<?=$det_i_rp->id?>" id="radio_<?=$det_i_rp->id?>" value="2" checked="checked" ><label><h6>NOK</h6></label>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="text" class="form-control" name="txt_observacion<?=$det_i_rp->id?>" value="<?=$data_det_recepcion->observaciones?>" readonly="true">
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
			<h5><label><?=$det_i_rp->descripcion?></label></h5>
		</div>
		</div>	
						<!-- ******************************************* -->
							<?php endif ?>
						<?php endif ?>
					<?php endforeach ?>
				<?php endif ?>
		<?php endforeach ?>
<?php endif ?>
<? $i++;?>
		<?php endforeach ?>
<?php endif ?>
<!-- cierra peritaje -->

<?php if ($recepcion): ?>
	<?php foreach ($recepcion as $key): ?>

	</h5></div></div></h5></div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<p></p>
	<div class="col-md-3 col-sm-3 col-xs-3">
		<h4><label>Limpieza:</label></h4>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<textarea name="txt_limpieza" class="form-control" readonly="true"><?=$key->limpieza?></textarea>
	</div>

	<div class= "col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-3">
		<h4><label>Apto para Publicar:</label></h4>
	</div>

			<?php if ($key->id_apto==1): ?>
			  	<h2><input type="radio" name="radio_apto" onclick="mostrar_adjuntos_recepcion()" id="radio_apto" value="1" checked="checked" ><label><h4>Si &nbsp;</h4></label>
			  	<input type="radio" name="radio_apto" id="radio_apto" value="2" disabled="true" onclick="ocultar_adjuntos_recepcion()" ><label><h4>No</h4></label>
				<!-- ************************** -->
				<?php else: ?>
						<h2><input type="radio" name="radio_apto" onclick="mostrar_adjuntos_recepcion()" id="radio_apto" value="1" disabled="true" ><label><h4>Si &nbsp;</h4></label>
			  	<input type="radio" name="radio_apto" id="radio_apto" value="2" checked="checked" onclick="ocultar_adjuntos_recepcion()" ><label><h4>No</h4></label>
				<!-- ************************** -->
			<?php endif ?>
	</div>
<?php endforeach ?>
<?php endif ?>


<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-2 col-sm-2 col-xs-2">
					</div>
					    <div class="col-md-offset-3 col-md-11">
					      <a href="<?php echo $this->config->base_url();?>recepcion"><button type="button" class="btn  btn-lg btn-warning"><i class="fa  fa-exclamation-triangle"></i>&nbsp;Regresar</button></a>
						</form>
					    	</div>
							 </div>
					</div>
					<br>
				</div>

