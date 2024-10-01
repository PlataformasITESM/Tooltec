<? include "../../sesion/arriba.php";
$dondeSeccion="sitio";
include "../../sesion/mata.php";

$nuevo=aleatorio(10);
$es=nombreBonito($es);

	$query="INSERT INTO estilos (id,nombre) VALUES ('$nuevo','$es')";
	$mysqli->query($query);

?>

<script>  
top.location.reload();
</script>	
