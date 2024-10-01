<? include "../sesion/arriba.php"; 
extract($_POST);



$donde=mataMalos(str_replace('elemento_','',$donde));

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);


$padre=$padreA[1];
$posicion=$padreA[2];




		$query="UPDATE contenido SET idElemento='$padre', posicion='$posicion'   WHERE id='$donde' ";
		
		$mysqli->query($query);
		$cuenta++;
 
 include "acomodo.php";


 ?>