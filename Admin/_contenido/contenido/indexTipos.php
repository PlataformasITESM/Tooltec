<?
$tipoContentSeccion=$valor;
if($t=="blogs"){
$selas="SELECT * FROM blogs WHERE id='$valor' AND muerto='0' ";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloSeccion= "BLOGS / ".$fila['titulo'];
	
	 
	}
	}  
 
if($t=="herramientas"){
$selas="SELECT * FROM herramientas WHERE id='$valor' AND muerto='0' ";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloSeccion= "HERRAMIENTAS / ".$fila['titulo_es'];
	
	 
	}
	}  

if($t=="expertos"){
$selas="SELECT * FROM expertos WHERE id='$valor' AND muerto='0' ";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloSeccion= "EXPERTOS / ".$fila['titulo_es'];
	
	 
	}
	}  
 
	
	?>