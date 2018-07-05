<script>
function fncSumar(){
	var a=1;
	var precio_costo=0;
	<?php foreach ($inspeccion as $data) {?>
  	precio_costo= Number(document.getElementById("txt_costo_"+a).value)+precio_costo;
  	  a+=1;
	<? }?>
	document.getElementById("txt_total").value =(precio_costo);
}

function continuar_2(){
	var a=1;
	var b=0;
	var precio_costo=0;
	<?php foreach ($inspeccion_general as $data) {?>
  		var valor_2=$('input:radio[name=estado_inspeccion_'+a+']:checked').val();
  			if (valor_2==2) {
  				b+=1;
  			};
  		
  	  a+=1;
	<? }?>
console.log(b);
	/*si los 3 valores estan en malo los borra*/
	if (b==3) {
		document.getElementById('inspeccion_detalle').style.display = 'none';
		var recomendado=2;
		document.getElementById("txt_recomendado").value =(recomendado);
			    $("#radio2").attr('checked', true);  
	}else{
		document.getElementById('inspeccion_detalle').style.display = 'block';
		    $("input:radio[name=recomendable]", "#miformulario").change();
		var recomendado=1;
		document.getElementById("txt_recomendado").value =(recomendado);
		 $("#radio1").attr('checked', true);  
	};
}


/*este toma el valor de inspeccion general malo y lo guarda en la variable valor, si suma 2veces no es recomendable el vehiculo.*/

function continuar(){
	var a=1;
	var b=0;
	var precio_costo=0;
	<?php foreach ($inspeccion_general as $data) {?>
  		var valor=$('input:radio[name=estado_inspeccion_'+a+']:checked').val();
  			if (valor==3) {
  				b+=1;
  			};
  		
  	  a+=1;
	<? }?>
console.log(b);
	/*si los 2 valores estan en malo los borra*/
	if (b==2) {
		document.getElementById('inspeccion_detalle').style.display = 'none';
		var recomendado=2;
		document.getElementById("txt_recomendado").value =(recomendado);
			    $("#radio2").attr('checked', true);  
	}else{
		document.getElementById('inspeccion_detalle').style.display = 'block';
		    $("input:radio[name=recomendable]", "#miformulario").change();
		var recomendado=1;
		document.getElementById("txt_recomendado").value =(recomendado);
		 $("#radio1").attr('checked', true);  
	};
}

function fncver(){
	document.getElementById('ver_manual').style.display = 'block';
	
}
function fncnover(){
	document.getElementById('ver_manual').style.display = 'none';
	
}
</script>