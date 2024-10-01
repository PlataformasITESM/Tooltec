<? include_once "../sesion/arriba.php";
$d=mataMalos($_GET['d']);
if($quien==""){die();}

$selas="SELECT * FROM herramientasDescargas WHERE id='$d' and muerto='0' ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$idDes=$fila['id'];
		$idHerramienta=$fila['idHerramienta'];
		$tituloD=$fila['titulo'];
		$img=$fila['img'];

$cambia=aleatorio(10);
$queryU="insert into herramientasDes (id, idHerramienta,idUsuario, idDescarga, creado, cuando) values ('$cambia','$idHerramienta','$quien', '$idDes','$creado', '$hoy')";
$mysqli->query($queryU);


$queryU="update herramientasDescargas set descargas=descargas+1 where id='$idDes'";
$mysqli->query($queryU);

$queryU="update herramientas  set descargas=descargas+1 where id='$idHerramienta'";
$mysqli->query($queryU);


$filename=$rutaServer."herramientas/".$idHerramienta."/".$img;

if (file_exists($filename)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filename));
	readfile($filename);
	exit;
}



}
 
?>