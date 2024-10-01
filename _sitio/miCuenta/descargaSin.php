<? include_once "../sesion/arriba.php";
$d=mataMalos($d);

 
$selas="SELECT * FROM herramientasDescargas WHERE id='$d' and muerto='0' ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
		$idDes=$fila['id'];
		$idHerramienta=$fila['idHerramienta'];
		$tituloD=$fila['titulo'];
		$img=$fila['img'];
}






if( $_SESSION[$like.$d]==""){ 
$_SESSION[$like.$d]=$hoySt;

$cambia=aleatorio(10);
$queryU="insert into herramientasDes (id, idHerramienta,idUsuario, idDescarga, creado, cuando) values ('$cambia','$idHerramienta','$quien', '$idDes','$creado', '$hoy')";
$mysqli->query($queryU);

 
}
$pasadoVista=($hoySt-$_SESSION[$like.$d])/60;
if( $pasadoVista>1){

$cambia=aleatorio(10);
$queryU="insert into herramientasDes (id, idHerramienta,idUsuario, idDescarga, creado, cuando) values ('$cambia','$idHerramienta','$quien', '$idDes','$creado', '$hoy')";
$mysqli->query($queryU);

$_SESSION[$like.$d]=$hoySt;
 
}
 
 
 
?>