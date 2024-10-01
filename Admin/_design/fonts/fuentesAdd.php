<? include_once "../../sesion/arriba.php";
$dondeSeccion="sitio";
include_once "../../sesion/mata.php";

	$res6 = $mysqli->query("SELECT * FROM sitio ");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$fuentes=unserialize($fila['fuentes']);
 	}
	
	$f=mataMalos($f);
	
	$res6 = $mysqli->query("SELECT * FROM fuentes WHERE id='$f' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$fuente=$fila['nombre'];
	}
	
	
	$fuentes[$f]=$fuente;
	ksort($fuentes);
	$fuentes=serialize($fuentes);
	
	
	$query="INSERT INTO sitio (id) VALUES ('1')";
	$mysqli->query($query);

	$query="UPDATE sitio SET fuentes='$fuentes' WHERE id='1'";
	$mysqli->query($query);

?>
<script>  
top.location.reload();
</script>	
