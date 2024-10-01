<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$copia=limpiaGet($_GET['copy']);
$paste=limpiaGet($_GET['paste']);


if($copia=="" || $paste==""){
die();
}
 $res6 = $mysqli->query("SELECT * FROM secciones WHERE id='$copia'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloM= $fila['titulo'].' COPIA';
	$tituloC=nombreBonito($tituloM);
	$urlM= $fila['url'];
	$url_es= $fila['url_es'];
	
	$titulo_es= $fila['titulo_es'];
	$menuM= $fila['menu'];
	$ligaM= $fila['liga'];
	$tipo= $fila['tipo'];
	$idMenu= $fila['idMenu'];
	$interno= $fila['interno'];
	$ligaTargetM= $fila['ligaTarget'];
	$metaKeys= $fila['metaKeys'];
	$metaDes= $fila['metaDes'];
	$tituloPagina= $fila['tituloPagina'];
	$activoM= $fila['activo'];
	$idSeccionMenu= $fila['idSeccionMenu'];
	$seccionMenuN= $fila['seccionMenu'];


	}

$cambia=aleatorio(5);
if($paste!=""){
$cambia=$paste;
}

		$query="INSERT INTO secciones (id, tipo, idMenu,   titulo_es,tituloC_es ) VALUES ('$cambia', '$tipo', '$idMenu',  '$titulo_es','$tituloC' )";
 	$mysqli->query($query);


//copiamos content
$res65 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$copia' AND idElemento='' AND idGrid='' ");
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$idE= $fila['id'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	$parametros= $fila['parametros'];
	$jerarquia= $fila['jerarquia'];
	$orden= $fila['orden'];
	
	
$aleatorio = aleatorio(10);
$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorio', '$cambia', '','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
$mysqli->query($query);


	//grids
		$res651 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$copia' AND idElemento='$idE' AND idGrid='' ");
		$res651->data_seek(0);
		while ($filas = $res651->fetch_assoc()) 
			{
			$idG= $filas['id'];
			$posicion= $filas['posicion'];
			$tipo= $filas['tipo'];
			$parametros= $filas['parametros'];
			$jerarquia= $filas['jerarquia'];
			$orden= $filas['orden'];


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


				$aleatorioSubHijo = aleatorio(10);
				$query="INSERT INTO contenido (id, idSeccion, idElemento, idGrid, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioSubHijo', '$cambia', '$elemento','$grid','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
				$mysqli->query($query);
		
		
					}
		
			}


	
	}

?>
copiado <?=$copia?> <?=$cambia?>
	
