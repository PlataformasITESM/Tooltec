<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$padreA=explode('_',$padre);
$orden=explode(',',$orden);

$padre=$padreA[1];
$posicion=$padreA[2];



	$cuenta=1;
	
	foreach ($orden as $value) {
		
		$este=str_replace('elemento_','',$value);
		$query="UPDATE contenido SET idElemento='$padre', orden='$cuenta'   WHERE id='$este' ";
	 //echo"$query<br>";
		$mysqli->query($query);
		$cuenta++;
	}



 ?>