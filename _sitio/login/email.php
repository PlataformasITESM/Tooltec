<? include "../sesion/arriba.php";
$e=mataMalos($e);
$ev=explode('@',$e)[1];

$errorito="";
if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
die();
}



if($que!="l"){
$selas="SELECT * FROM usuariosF WHERE  correo='$e'   LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{

		$errorito="El correo ".$e."  ya está registrado";
}
}

 


if($errorito!=""){ ?>
 


<script>
$('#emailNo').html('<?=$errorito?>').fadeIn().delay(2000).fadeOut();
	$('#email').val('');
</script>

<? } ?>