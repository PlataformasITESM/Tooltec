<? include "../sesion/arriba.php"; 
extract($_POST);

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
	
 $res6 = $mysqli->query("SELECT * FROM contenidoSlider WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$img= $fila['img'];

	unlink($rutaContent."/".$seccion."/".$img);
	
	}
	


$query="DELETE FROM contenidoSlider WHERE id='$elemento'";
$mysqli->query($query);	

$query="OPTIMIZE TABLE contenidoSlider ";
$mysqli->query($query);	
 


?>

