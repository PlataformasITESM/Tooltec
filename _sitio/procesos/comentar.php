<? include_once "../sesion/arriba.php";
$pr=mataMalos($pr);
$te=mataMalos($t);
$co=mataMalos($co);
$te=nl2br($te);

$este=aleatorio(10);
$queryU="insert into herramientasCom (id, idHerramienta, idComentario, idUsuario, creado, comentario, cuando) values ('$este', '$pr', '$co', '$quien', '$creado','$te', '$hoy')";
$mysqli->query($queryU);
$estoy=0;
 

$likones=0;
$selas="SELECT * FROM herramientasCom WHERE idHerramienta='$pr'  ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
	$likones=$likones+1;
	}
$queryU="update  herramientas set comentarios='$likones' where id='$pr'";
$mysqli->query($queryU);	

$exp=$pr;
$com=$co;

if($co==""){
include "../_secciones/herramientasComentarios.php" ;
}
else{
include "../_secciones/herramientasComentariosReply.php" ;
}
?>



<script>
$('#comentaCuenta').html('Comentarios (<?=$likones?>)');
</script>