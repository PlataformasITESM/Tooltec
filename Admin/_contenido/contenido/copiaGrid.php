<? include "../../sesion/arriba.php"; 
$dondeSeccion="secciones";
include "../../sesion/mata.php"; 

$grid=limpiaGet($grid);
$seccion=limpiaGet($seccion);

	//grids
	$selas="SELECT * FROM contenido WHERE  idSeccion='$seccion' AND id='$grid' AND (idGrid=''  or idGrid is NULL) ";
		$res651 = $mysqli->query($selas);
		$res651->data_seek(0);
		while ($filas = $res651->fetch_assoc()) 
			{
			$idG= $filas['id'];
			$padre= $filas['idElemento'];
			$posicion= $filas['posicion'];
			$tipo= $filas['tipo'];
			$parametros= $filas['parametros'];
			$jerarquia= $filas['jerarquia'];
			$orden= $filas['orden'];

if($posicion==""){$posicion=0;}

		$aleatorioHijo = aleatorio(10);
		$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioHijo', '$seccion', '$padre','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
		$mysqli->query($query);
		
		echo $query;

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


				$aleatorioSubHijo = aleatorio(10);
				$query="INSERT INTO contenido (id, idSeccion, idElemento, idGrid, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioSubHijo', '$seccion', '$elementoN','$gridN','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
				$mysqli->query($query);
		
		
					}
		
			}
	
?>

<script>
top.location.reload();
</script>
