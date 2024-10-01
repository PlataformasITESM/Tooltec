<? include_once "../sesion/arriba.php";
$pr=mataMalos($pr);


$este=$pr.$quien;

$selas="SELECT * FROM herramientasLikes WHERE id='$este'";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
			
$queryU="update  herramientasLikes set meGusta=1-meGusta where id='$este'";
$mysqli->query($queryU);	
$estoy=$fila['meGusta'];
}
if($estoy==""){
$queryU="insert into herramientasLikes (id, idHerramienta,idUsuario, creado, meGusta, cuando) values ('$este', '$pr','$quien', '$creado','1', '$hoy')";
$mysqli->query($queryU);
$estoy=0;
}

$likones=0;
$selas="SELECT * FROM herramientasLikes WHERE idHerramienta='$pr' and meGusta='1'";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
	$likones=$likones+1;
	}
$queryU="update  herramientas set meGusta='$likones' where id='$pr'";
$mysqli->query($queryU);	


$iconito="favorite_border";
$color="";
if($estoy==0){$iconito="favorite"; $color="rosa";}

if($likones>0){$pon=$likones;}
?>

<div onclick="favorito('<?=$pr?>');" class="corazon cursor material-icons <?=$color?> "   style="font-size:30px"><?=$iconito?></div>  <?=$pon?>