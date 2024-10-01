<div class="blanco10">
<? $res6 = $mysqli->query("SELECT * FROM estilos ORDER BY nombre ASC");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$idE=$fila['id'];
	$nombre=$fila['nombre'];
?>

<div class="padd10 div20 textAlignCenter <?=$nombre?>" style="height: 100px; position: relative;">
<a href="estiloConf.php?u=<?=$idE?>"><?=$nombre?></a>
</div>

<?
	}
	
	?>
	
	</div>