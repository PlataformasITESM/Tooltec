<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php"; 

	$orden=explode(',',$orden);

	$cuenta=1;
	
	$padre=str_replace('losElementos','',$padre);
	
	foreach ($orden as $value) {
		$este=str_replace('linea','',$value);
		if($este!=""){
		$query="UPDATE seccionesMenuSecciones SET idTitulo='$padre', orden='$cuenta'   WHERE id='$este'";
		$mysqli->query($query);
		echo"$query<br>";
		$cuenta++;
		}
	}

include "../menuAdd/creaMenu.php";

 ?>