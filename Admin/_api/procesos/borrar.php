<? include "../../sesion/arriba.php"; 

$dondeSeccion="eventos";
include "../../sesion/mata.php"; 


$mata=limpiaGET($mata);
$pr=limpiaGET($pr);
$cat=limpiaGET($cat);
 

if($pr=="blogs"){

	$query="UPDATE blogs SET muerto='1', modificado='$creado'  WHERE id='$mata'";
	$mysqli->query($query);
	$manda= "_blogs/blogs/";
}

if($pr=="blogsCat"){

	$query="UPDATE blogsCat SET muerto='1', modificado='$creado'  WHERE id='$mata'";
	$mysqli->query($query);
	$manda= "_blogs/categorias/";
}


if($pr=="herramientasCat"){

	$query="UPDATE herramientasCat SET muerto='1', modificado='$creado'  WHERE id='$mata'";
	$mysqli->query($query);
	$manda= "_herramientas/categorias/";
}

if($pr=="herramientasTags"){

	$query="UPDATE herramientasTags SET muerto='1', modificado='$creado'  WHERE id='$mata'";
	$mysqli->query($query);
	$manda= "_herramientas/tags/";
}


if($pr=="herramientasPasos"){

$res6 = $mysqli->query("SELECT * FROM herramientasPasos WHERE id='$mata'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idHerramienta= $fila['idHerramienta'];
	 $tipoPaso= $fila['tipoPaso'];
	
	}
	$tipo= "pasos";
	if($tipoPaso=="material"){
		$tipo="materiales";
	}

	$query="UPDATE herramientasPasos SET muerto='1'   WHERE id='$mata'";
	$mysqli->query($query);
	$manda="_herramientas/herramientas/".$tipo."?u=".$idHerramienta;
}

if($pr=="expertosCualificaciones"){

$res6 = $mysqli->query("SELECT * FROM expertosCualificaciones WHERE id='$mata'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idExperto= $fila['idExperto'];
	 
	}

	$query="UPDATE expertosCualificaciones SET muerto='1'   WHERE id='$mata'";
	$mysqli->query($query);
	$manda="_expertos/expertos/cualificaciones".$tipo."?u=".$idExperto;
}


if($pr=="herramientasDescargas"){

$res6 = $mysqli->query("SELECT * FROM herramientasDescargas WHERE id='$mata'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idHerramienta= $fila['idHerramienta'];
	 $id= $fila['id'];
	 
	}

	$query="UPDATE herramientasDescargas SET muerto='1'   WHERE id='$mata'";
	$mysqli->query($query);
	$manda="_herramientas/herramientas/descargas".$tipo."?u=".$idHerramienta;
}


?>


<script>
top.location.href="<?=$url?>/<?=$manda?>";
</script>