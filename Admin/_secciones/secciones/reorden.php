<? include "../../sesion/arriba.php"; 
include "../../control/class.phpmailer.php";

 	echo"$seccion $orden";
	$orden=explode(',',$orden);

	$cuenta=1;
	
	foreach ($orden as $value) {

		$este=str_replace('s_','',$value);
		$query="UPDATE secciones SET idSeccion='$seccion',orden='$cuenta'   WHERE id=$este";
		$mysqli->query($query);
		$cuenta++;
	}




 ?>