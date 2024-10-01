<? include "../../sesion/arriba.php"; 
$dondeSeccion="registros";
include "../../sesion/mata.php"; 



	$registro=limpiaGet($registro);
	$mata=limpiaGet($mata);
	
	
	$res6 = $mysqli->query("SELECT * FROM registros WHERE id='$registro'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$campos= $fila['campos'];
	$orden= $fila['orden'];
	}
	
	
	$campos=arregloSaca($campos);
	unset($campos[$mata]);
	
	
	$orden=explode(',',$orden);
	
	
 	$mataA=array();
	$mataA[]=$mata;
	
	$orden = array_diff($orden, $mataA);

	
	$orden=implode(',',$orden);	
	$campos=arregloMete($campos);

	$query="UPDATE registros SET campos='$campos',orden='$orden'    WHERE id='$registro'";
	$mysqli->query($query);

	

 ?>