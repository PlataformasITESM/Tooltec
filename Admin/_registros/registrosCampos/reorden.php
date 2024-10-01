<? include "../../sesion/arriba.php"; 
$dondeSeccion="registros";
include "../../sesion/mata.php"; 



		$query="UPDATE registros SET orden='$orden'   WHERE id='$registro'";
		$mysqli->query($query);
	
 ?>
