<script>
//muestra el select de la agencia
function mostrar_cliente(){
	var valor=0;
	var valor_2=0;
	if (document.getElementById('add_cliente_1').style.display == 'block') {
		document.getElementById('add_cliente_1').style.display = 'none';
		valor=0;
		document.getElementById("txt_dispara_cliente").value =(valor);
	}else{
		valor=1;
		document.getElementById('add_cliente_1').style.display = 'block';
		document.getElementById("txt_dispara_cliente").value =(valor);
	};
}
function mostrar_vehiculo(){
	if (document.getElementById('add_cliente_2').style.display == 'block') {
		document.getElementById('add_cliente_2').style.display = 'none';
		valor_2=0;
		document.getElementById("txt_dispara_vehiculo").value =(valor_2);
	}else{
		document.getElementById('add_cliente_2').style.display = 'block';
		valor_2=1;
		document.getElementById("txt_dispara_vehiculo").value =(valor_2);
	};
}
function mostrar_adjuntos_recepcion(){
document.getElementById('adjuntos_recepcion').style.display = 'block';
}
function ocultar_adjuntos_recepcion(){
document.getElementById('adjuntos_recepcion').style.display = 'none';

}
</script>