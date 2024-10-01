<? include "../../sesion/arriba.php"; 
$dondeSeccion="encuestas";
include "../../sesion/mata.php"; 

$res6 = $mysqli->query("SELECT * FROM expCategorias WHERE id='$copia'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{

	$titulo= $fila['titulo']." COPIA";
	$tituloC=nombreBonito($titulo);

	$estatus= $fila['estatus'];
	$orden= $fila['orden'];


	}

$cambia = aleatorio(10);
$query="INSERT INTO expCategorias (id, titulo, tituloC, img, estatus, orden) VALUES ('$cambia', '$titulo', '$tituloC','$img', '$estatus', '$orden')";
$mysqli->query($query);


 $rutaProd=$rutaExp."/".$cambia;
	 if (!file_exists($rutaProd)) {
	 	mkdir($rutaProd, 0777);
		chmod($rutaProd, 0777);
}




//copiamos content
$res65 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$copia' AND idElemento='' ");
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


		$res651 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$copia' AND idElemento='$idE' ");
		$res651->data_seek(0);
		while ($filas = $res651->fetch_assoc()) 
			{
			$posicion= $filas['posicion'];
			$tipo= $filas['tipo'];
			$parametros= $filas['parametros'];
			$jerarquia= $filas['jerarquia'];
			$orden= $filas['orden'];


		$aleatorioHijo = aleatorio(10);
		$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioHijo', '$cambia', '$aleatorio','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
		$mysqli->query($query);
			}


	
	}

?>
<script>top.location.href = "<?=$url?>/_experiencias/categorias/categoriasAdd?u=<?=$cambia?>";</script>