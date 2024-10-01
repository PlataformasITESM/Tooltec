<? include_once "../sesion/arriba.php";
$cual=mataMalos($cual);
$selas="SELECT * FROM usuariosF WHERE id='$quien'  LIMIT 1";
$res11 = $mysqli->query($selas);
$res11->data_seek(0);
while ($row11 = $res11->fetch_assoc()) 
	{ 
	$galletas= unserialize($row11['galletas']); 
	}


unset($galletas[$cual]);
$galletas=serialize($galletas);

	$query="UPDATE usuariosF SET  galletas='$galletas'   WHERE id='$quien'";
	$mysqli->query($query); 
echo $query;
?>