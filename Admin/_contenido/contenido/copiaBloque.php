<? include "../../sesion/arriba.php"; 
$dondeSeccion="secciones";
include "../../sesion/mata.php"; 

$bloque=limpiaGet($bloque);
$seccion=limpiaGet($seccion);

//copiamos content
$res65 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$seccion' AND (idElemento='' or idElemento is NULL) AND (idGrid='' or idGrid is NULL) AND id='$bloque'");
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
$aleatorio = aleatorio(10);
$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorio', '$seccion', '','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
$mysqli->query($query);



	//grids
		$res651 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$seccion' AND idElemento='$bloque' AND (idGrid='' or idGrid is NULL) ");
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

		$aleatorioHijo = aleatorio(10);
		$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioHijo', '$seccion', '$aleatorio','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
		$mysqli->query($query);
		
		
				//elementos
				$res652 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$seccion' AND ( idElemento='$idG' OR idGrid='$idG') ");
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


					$elementoN='';
					$gridN='';
					if($elementoO==$idG){$elementoN=$aleatorioHijo;}
					if($gridO==$idG){$gridN=$aleatorioHijo;}

	if($posicion==""){$posicion=0;}
				$aleatorioSubHijo = aleatorio(10);
				$query="INSERT INTO contenido (id, idSeccion, idElemento, idGrid, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioSubHijo', '$seccion', '$elementoN','$gridN','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
				$mysqli->query($query);
		
		
					}
		
			}
			
			
	}

?>
<script>
top.location.reload();
</script>
