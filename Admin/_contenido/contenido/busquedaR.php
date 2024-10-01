<?
$busqueda="";
//texto
 $res6 = $mysqli->query("SELECT * FROM contenido WHERE idSeccion='$seccion' AND tipo ='texto' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);
	$busqueda .=$parametros['texto']." ";
	}


//archivos
$res6 = $mysqli->query("SELECT * FROM contenido WHERE idSeccion='$seccion' AND tipo ='file' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);
	$busqueda .=$parametros['textoDownload']." ";
	}

//títulos	
$res6 = $mysqli->query("SELECT * FROM contenido WHERE idSeccion='$seccion' AND tipo ='titulo' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);
	$busqueda .=$parametros['texto']." ";
	}
	
// texto de imgs
$res6 = $mysqli->query("SELECT * FROM contenido WHERE idSeccion='$seccion' AND tipo ='textoImagen' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);

	$busqueda .=$parametros['texto']." ";
	$busqueda .=$parametros['titulo']." ";

	}

//acordeon
$res6 = $mysqli->query("SELECT * FROM contenido WHERE idSeccion='$seccion' AND tipo ='acordeon' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= arregloSaca($fila['parametros']);
	
		$orden=explode(',',$parametros['orden']);
	$acordeones=arregloSaca($parametros['acordeones']);


	foreach ($orden as $ordenito) {
	
			$acordeonElemento=unserialize(base64_decode($acordeones[$ordenito]));
		
	$busqueda .=$acordeonElemento['texto']." ";
	$busqueda .=$acordeonElemento['titulo']." ";	

	}
	
	

	}	

	
	$busqueda=strip_tags($busqueda);
	$busqueda=busqueda($busqueda);

$hay="";
while($hay==""){

	$arregloBusqueda=array();
	
	
 $res6 = $mysqli->query("SELECT * FROM catalogosProds WHERE id='$seccion' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$busBusqueda= unserialize($fila['busqueda']);
	$arregloBusqueda['busquedita']=$busBusqueda['busquedita'];
	$producto=1;
	$hay=1;
	}
	
	
	if($producto!=""){
	$arregloBusqueda['contenido']=$busqueda;
	$arregloBusqueda=serialize($arregloBusqueda);
	
	$query="UPDATE catalogosProds SET  busqueda='$arregloBusqueda'  WHERE id='$seccion'";
	$mysqli->query($query);
	}
	
	
 $res6 = $mysqli->query("SELECT * FROM blogsEntradas WHERE id='$seccion' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$busBusqueda= unserialize($fila['busqueda']);
	$arregloBusqueda['busquedita']=$busBusqueda['busquedita'];
	$entrada=1;
	$hay=1;
	}
	
	if($entrada!=""){
	$arregloBusqueda['contenido']=$busqueda;
	$arregloBusqueda=serialize($arregloBusqueda);
	
	$query="UPDATE blogsEntradas SET  busqueda='$arregloBusqueda'  WHERE id='$seccion'";
	$mysqli->query($query);
	}
}

?>