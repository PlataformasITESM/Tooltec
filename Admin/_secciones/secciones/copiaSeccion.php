<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

 $res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$copia'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo_es= $fila['titulo_es'].' COPIA';
	$tituloC_es=nombreBonito($titulo_es);
 $tipo= $fila['tipo'];
	$tituloT= $fila['titulo_es'];
	$titulo_en= $fila['titulo_en'].' COPY';
	$tituloC_en=nombreBonito($titulo_en);
	$tituloPagina_es= $fila['tituloPagina_es'];
	$tituloPagina_en= $fila['tituloPagina_en'];
	$url_es= $fila['url_es'];
	$url_en= $fila['url_en'];
	$meta=$fila['meta'];
	
	$metaDes_es=$meta['metaDes_es'];
	$metaDes_en=$meta['metaDes_en'];
	
	$metaKeys_es=$meta['metaKeys_es'];
	$metaKeys_en=$meta['metaKeys_en'];

	}

$cambia=aleatorio(10);
//$cambia="homeTabasco";	
	$query="INSERT INTO secciones (id, tipo, titulo_es, tituloC_es, titulo_en, tituloC_en, tituloPagina_es, tituloPagina_en, url_es, url_en, meta, creado ) VALUES ('$cambia', '$tipo', '$titulo_es','$tituloC_es','$titulo_en','$tituloC_en', '$tituloPagina_es', '$tituloPagina_en',  '$url_es',  '$url_en',  '$meta', '$creado' )";
 	$mysqli->query($query);


//copiamos content
$selas="SELECT * FROM contenido WHERE  idSeccion='$copia'  AND (idElemento='' OR idElemento is null ) AND (idGrid='' OR idGrid is null )";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$idE= $fila['id'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	$parametros= $fila['parametros'];
	$jerarquia= $fila['jerarquia'];
	$orden= $fila['orden'];
	
	if($posicion==""){$posicion=0;}
if($jerarquia==""){$jerarquia=0;}
if($orden==""){$orden=0;}
$aleatorio = aleatorio(10);
$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorio', '$cambia', '','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
$mysqli->query($query);


	//grids
	
		$res651 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$copia' AND idElemento='$idE' AND (idGrid='' or idGrid is null) ");
		$res651->data_seek(0);
		$res651->data_seek(0);
		while ($filas = $res651->fetch_assoc()) 
			{
			$idG= $filas['id'];
			$posicion= $filas['posicion'];
			$tipo= $filas['tipo'];
			$parametros= $filas['parametros'];
			$jerarquia= $filas['jerarquia'];
			$orden= $filas['orden'];
if($posicion==""){$posicion=0;}
if($jerarquia==""){$jerarquia=0;}
if($orden==""){$orden=0;}

		$aleatorioHijo = aleatorio(10);
		$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioHijo', '$cambia', '$aleatorio','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
		$mysqli->query($query);
		
		
				//elementos
				$res652 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$copia' AND ( idElemento='$idG' OR idGrid='$idG') ");
				$res652->data_seek(0);
				while ($filaz = $res652->fetch_assoc()) 
					{
					$posicion= $filaz['posicion'];
					$tipo= $filaz['tipo'];
					$parametros= $filaz['parametros'];
					$jerarquia= $filaz['jerarquia'];
					$orden= $filaz['orden'];
					$elementoO= $filaz['idElemento'];
					$gridO= $filaz['idGrid'];


					$elemento='';
					$grid='';
					if($elementoO==$idG){$elemento=$aleatorioHijo;}
					if($gridO==$idG){$grid=$aleatorioHijo;}
if($posicion==""){$posicion=0;}
if($jerarquia==""){$jerarquia=0;}
if($orden==""){$orden=0;}

				$aleatorioSubHijo = aleatorio(10);
				$query="INSERT INTO contenido (id, idSeccion, idElemento, idGrid, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioSubHijo', '$cambia', '$elemento','$grid','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
				$mysqli->query($query);
		
		
					}
		
			}


	
	}

?>
<script>top.location.href = "<?=$url?>/_secciones/secciones/seccionesAdd?u=<?=$cambia?>";</script>