<script>
	function fncSumar2(){
	var a=1;
	var precio_costo=0;
	<?php foreach ($inspeccion as $data) {?>
  	precio_costo= Number(document.getElementById("txt_costo_c_peritaje"+a).value)+precio_costo;
  	  a+=1;
	<? }?>
	document.getElementById("txt_total_c_peritaje").value =(precio_costo);
}
function fncver(){
	document.getElementById('ver_manual').style.display = 'block';
	
}
function fncnover(){
	document.getElementById('ver_manual').style.display = 'none';
	
}
</script>