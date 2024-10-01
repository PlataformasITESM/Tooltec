<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php"; 

	$orden=explode(',',$orden);

	$cuenta=1;
	
	foreach ($orden as $value) {
echo"$orden $value<br>";
		$este=str_replace('linea','',$value);
		$query="UPDATE seccionesMenuSecciones SET orden='$cuenta'   WHERE id=$este";
		$mysqli->query($query);
		$cuenta++;
	}



 ?>