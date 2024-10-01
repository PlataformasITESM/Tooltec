<? include "../../sesion/arriba.php"; 
$dondeSeccion="blogs";
include "../../sesion/mata.php"; 
 

$mata=limpiaGet($mata);

 
$query="DELETE FROM blogs   WHERE id='$mata'";
$mysqli->query($query);

$query="OPTIMIZE TABLE blogs";
$mysqli->query($query);

$query="DELETE FROM contenido   WHERE idSeccion='$mata'";
$mysqli->query($query);

$query="OPTIMIZE TABLE contenido";
$mysqli->query($query);

?>
 
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_blogs/blogs";</script>	
 