<? include "../../sesion/arriba.php"; 
$dondeSeccion="blogs";
include "../../sesion/mata.php"; 
 

$mata=limpiaGet($mata);
 
	$query="UPDATE  blogsCat SET estatus='99' WHERE id='$mata'";
	$mysqli->query($query);
?>
 
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_blogs/categorias";</script>	
 