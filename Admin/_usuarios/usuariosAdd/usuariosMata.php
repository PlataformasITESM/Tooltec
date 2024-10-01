<? include "../../sesion/arriba.php"; 
 
$dondeSeccion="usuariosSys";
include "../../sesion/mata.php"; 
 

$mata=limpiaGet($mata);
 
 
	$query="DELETE FROM usuarios   WHERE id='$mata'";
	$mysqli->query($query);
 	
	$query="OPTIMIZE TABLE usuarios";
	$mysqli->query($query);
 
 ?>
 
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_usuarios/usuarios/usuarios";</script>	
 