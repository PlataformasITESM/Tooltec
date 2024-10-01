<? 
$res6 = $mysqli->query("SELECT * FROM encuestas WHERE id='$idRegistro' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idRegistro= $fila['id'];
	$registro= $fila['titulo'];
	}	
	?>
 
	<div class="elemento " style="min-height:300px; background-color:#EBEBEB;">
    <?=$texto?><br>

    Encuesta: <?=$registro?> 
</div>