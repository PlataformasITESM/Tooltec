<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$padreA=explode('_',$padre);
$orden=explode(',',$orden);

$padre=$padreA[1];
$posicion=$padreA[2];

if($posicion==""){$posicion=1;}


	$cuenta=1;
	
	foreach ($orden as $value) {
		
		$este=str_replace('elemento_','',$value);
		$query="UPDATE contenido SET idGrid='$padre', orden='$cuenta',posicion='$posicion'   WHERE id='$este' ";
	
		$mysqli->query($query);
		$cuenta++;
	}



 ?>