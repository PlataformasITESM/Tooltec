<? 
$dondeSeccion="usuariosSys";
include "../../sesion/arriba.php"; 
include "../../sesion/mata.php"; 
extract($_POST); 

$query="DELETE FROM usuarios   WHERE id='$mata'";
$mysqli->query($query);

$query="OPTIMIZE TABLE usuarios";
$mysqli->query($query);
 

?>



