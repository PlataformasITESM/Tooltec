<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);

	
$query="DELETE FROM contenido WHERE id='$elemento'";
$mysqli->query($query);	

$query="OPTIMIZE TABLE contenido ";
$mysqli->query($query);	
 
 



?>

