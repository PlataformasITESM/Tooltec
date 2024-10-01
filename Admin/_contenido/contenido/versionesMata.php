<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$mata=limpiaGet($mata);
$laseccion=limpiaGet($laseccion);

	$query="UPDATE secciones SET version = '' WHERE id = '$laseccion' AND version='$mata' ";
$mysqli->query($query);	
	
	
	$query="DELETE FROM seccionesVersion WHERE id='$mata'";
	$mysqli->query($query);
 	
	$query="OPTIMIZE TABLE seccionesVersion";
	$mysqli->query($query);
	
	
	$versionCont=$laseccion.'_'.$mata;
	$query="DELETE FROM contenido WHERE idSeccion='$versionCont'";
	$mysqli->query($query);
 	
	$query="OPTIMIZE TABLE contenido";
	$mysqli->query($query);
?>
<script>top.location.href = "<?=$url?>/_contenido/contenido/?v=<?=$laseccion?>";</script>
