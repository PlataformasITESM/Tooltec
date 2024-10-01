<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 

	$nombre=mataMalos($nombre);
	$c=limpiaGET($c);
			
			$query="UPDATE cRepositorioFolders SET nombre='$nombre'  WHERE id='$c'";
			$mysqli->query($query);
			
echo"$query";	
die();
exit;


?>

