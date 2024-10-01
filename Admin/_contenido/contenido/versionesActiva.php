<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$activa=limpiaGet($activa);
$laseccion=limpiaGet($laseccion);

	
if($activa=='original'){$activa='';}	
	
$query="UPDATE seccionesVersion SET estatus = '1' WHERE id = '$activa'";
$mysqli->query($query);	

$query="UPDATE secciones SET version = '$activa' WHERE id = '$laseccion'";
$mysqli->query($query);	

?>
<script>
localStorage.setItem("guardado", "1");
</script>
