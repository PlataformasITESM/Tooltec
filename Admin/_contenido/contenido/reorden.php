<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$orden=explode(',',$orden);

	$cuenta=1;
	
	foreach ($orden as $value) {
	
		$este=str_replace('elemento_','',$value);
		$query="UPDATE contenido SET orden='$cuenta'   WHERE id='$este' ";
		$mysqli->query($query);
		//echo"xxx $query";
		$cuenta++;
	}



 ?>