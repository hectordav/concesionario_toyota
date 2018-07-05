<div class="right_col" role="main" style="height:1040px;">
        <div class="col-md-12 col-sm-12 col-xs-12"> 
        <?$correcto = $this->session->flashdata('alerta');?> <?php if ($correcto): ?>
             <div class="animated bounceInDown">
                   <div class="alert alert-info alert-dismissible">
                          <strong><?= $correcto?></strong>
                            <br>
                    </div>
             </div> 
             <?php endif ?>
              <?$correcto_2 =$this->session->flashdata('alerta_2');?> 
              <?php if ($correcto_2): ?>     
              	<div class="animated bounceInDown">          
	              	<div class="alert alert-info alert-dismissible">             
	              		<strong>Vehiculo ya existe, existe un peritaje asociado a este vehiculo<a href="<?=$this->config->base_url()?>peritaje/ver/<?= $correcto_2?>" title="">Ir a Peritaje Asociado </a></strong>
	              		<br>         
	              	</div>     
              	</div> 
              	<?php endif ?> 
              	<?$correcto_3 = $this->session->flashdata('alerta_3');?> <?php if ($correcto_3): ?>     
              	<div class="animated bounceInDown">
              	    <div class="alert alert-info alert-dismissible"> 
              	          <strong><?= $correcto_3?></strong>
              	        <br>
              	    </div>     
              	</div> 
              <?php endif ?>
	    <div class="x_panel">
			<div class="animated fadeIn">
           			<?php echo $output; ?>
				</div>
	    	</div>
		</div>
</div>