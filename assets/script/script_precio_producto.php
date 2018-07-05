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

/*este toma el valor de inspeccion general regular y lo guarda en la variable valor_2, si suma 3 veces no es recomendable el vehiculo.*/
var cont1=0;
var cont2=0;
var cont3=0;

/**********************este es el de malo***********************/
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
console.log("valor de continuar 1"+b);
console.log(b);
	/*si los 2 valores estan en malo los borra*/

	if (b>=2 || cont2==1 || cont3==1) {
		document.getElementById('inspeccion_detalle').style.display = 'none';
		var recomendado=2;
		document.getElementById("txt_recomendado").value =(recomendado);
			    $("#radio2").attr('checked', true);  
		cont1=1;

	}else{
		document.getElementById("txt_malo").value =(0);
		document.getElementById('inspeccion_detalle').style.display = 'block';
		    $("input:radio[name=recomendable]", "#miformulario").change();
		var recomendado=1;
		document.getElementById("txt_recomendado").value =(recomendado);
		 $("#radio1").attr('checked', true);  
		cont1=0;
		document.getElementById("txt_malo").value =(0);
	};
		if (b==1 || b>=2) {
		document.getElementById("txt_malo").value =(1);
	}
}
/*este es el de regular*/
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
console.log("valor de continuar 2"+ b);
console.log(b);
	/*si los 3 valores estan en malo los borra*/
	
	if (b>=3 || cont1==1 || cont3==1) {
		document.getElementById('inspeccion_detalle').style.display = 'none';
		var recomendado=2;
		document.getElementById("txt_recomendado").value =(recomendado);
			    $("#radio2").attr('checked', true);
		cont2=1;
		document.getElementById("txt_regular").value =(0);
	}else{
		
		document.getElementById('inspeccion_detalle').style.display = 'block';
		    $("input:radio[name=recomendable]", "#miformulario").change();
		var recomendado=1;
		document.getElementById("txt_recomendado").value =(recomendado);
		 $("#radio1").attr('checked', true); 
		 cont2=0;
		 document.getElementById("txt_regular").value =(0);
	};
	if (b==2 || b>=3) {
			document.getElementById("txt_regular").value =(2);
	}
}

function cierra_con_los_hidden_1_2() {
	var regular = Number(document.getElementById("txt_regular").value);
	var malo = Number(document.getElementById("txt_malo").value);
	if (regular==2 && malo==1) {
		document.getElementById('inspeccion_detalle').style.display = 'none';
		var recomendado=2;
		document.getElementById("txt_recomendado").value =(recomendado);
			    $("#radio2").attr('checked', true);
	}
}


/*este toma el valor de inspeccion general malo y lo guarda en la variable valor, si suma 2veces no es recomendable el vehiculo.*/

/*este es el de bueno*/
function continuar_3(){
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
console.log("valor de continuar 3 "+ b);


	/*si los 2 valores estan en malo los borra*/
	if (b >=3 && cont2==1 && cont1==1) {
		document.getElementById('inspeccion_detalle').style.display = 'none';
		var recomendado=2;
		document.getElementById("txt_recomendado").value =(recomendado);
			    $("#radio2").attr('checked', true);  
		cont3=1;
	}else{
			cont2=0;
			cont1=0;
			console.log("pasa por el else");

		document.getElementById('inspeccion_detalle').style.display = 'block';
		    $("input:radio[name=recomendable]", "#miformulario").change();
		var recomendado=1;
		document.getElementById("txt_recomendado").value =(recomendado);
		 $("#radio1").attr('checked', true);
		 cont3=0;
		
	};
}


function fncver(){
	document.getElementById('ver_manual').style.display = 'block';
	
}
function fncnover(){
	document.getElementById('ver_manual').style.display = 'none';
	
}
</script>