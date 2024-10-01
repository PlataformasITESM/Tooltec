
<div class="div100 oculta" id="muchas">
<div class="table">
<div class="tableCell30"><div class="material-icons">warning</div></div>
<div class="tableCell">Agregar muchas fuentes puede aumentar los tiempos de carga de tu sitio</div>
</div>
</div>

<div class="div50">
<? $res6 = $mysqli->query("SELECT * FROM sitio ");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$fuentes=unserialize($fila['fuentes']);

	}

	if($fuentes!=""){

	foreach($fuentes as $fonts=>$v){
	if($fonts!=""){
	$fontsU=str_replace(' ','+',$fonts);
	$cuentaFuentes=$cuentaFuentes+1;
	?>
	
	<div class="div100 table linea " style="font-family:<?=$fonts?>; ">
	<div class="tableCell padd10" style="font-size:30px;">
	<?=$v?> 
	</div>
	<div class="material-icons tableCell50 padd10 ctrls borra" onClick="mataFuente('<?=$fonts?>');">clear</div>
	</div>
	
	<script>
	 $("head").append("<link href=\"https://fonts.googleapis.com/css?family=<?=$v?>\" rel=\"stylesheet\">");
		
			$("#fuentes option[value='<?=$fontsU?>']").prop('disabled',true);
	</script>
	<?
	}
 }
	
	}
	
	
	?>
	</div>	

	
	<? if($cuentaFuentes>5){?>
	<script>
	$('#muchas').show();
	</script>
	<? } ?>