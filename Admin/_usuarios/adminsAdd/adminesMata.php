<? include "../../sesion/arriba.php"; 
 
$dondeSeccion="admins";
include "../../sesion/mata.php"; 
 

$mata=limpiaGet($mata);
 
 
	$query="DELETE FROM usuarios   WHERE id='$mata'";
	$mysqli->query($query);
 	
	$query="OPTIMIZE TABLE usuarios";
	$mysqli->query($query);
 
 ?>
 
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_usuarios/admins/";</script>	
 