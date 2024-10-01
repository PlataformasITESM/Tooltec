<? include_once "../sesion/arriba.php";
$exp=mataMalos($exp);
$red=mataMalos($red);


$usas="visitante";
if($quien!=""){
$usas=$quien;
}
if($soyAdmin==""){

$queryU="insert into  expertosRedes (idExperto,idUsuario, liga, creado, cuando) values ('$exp','$usas', '$red', '$creado', '$hoy')";
$mysqli->query($queryU);
$_SESSION[$exp]=$hoySt;

}

//echo $exp." ".$red." ".$queryU;
?>