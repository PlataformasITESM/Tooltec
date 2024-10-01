<? include "../../sesion/arriba.php"; 

$dondeSeccion="registros";
include "../../sesion/mata.php"; 



	$registro=limpiaGet($registro);
	$eliminados=mataMalos($eliminados);

	$eliminados=str_replace(' ','',$eliminados);
	$eliminados=explode(',',$eliminados);
	
	
	foreach ($eliminados as $eliminin){
	
	
	$query="DELETE FROM registrosRegistros   WHERE idRegistro='$registro' AND id='$eliminin'";
	echo "$query";
	$mysqli->query($query);
	}
	$query="OPTIMIZE TABLE registrosRegistros";
	$mysqli->query($query);


 ?>
 
 