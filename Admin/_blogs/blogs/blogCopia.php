<? include "../../sesion/arriba.php"; 
$dondeSeccion="blogs";
include "../../sesion/mata.php"; 

$res6 = $mysqli->query("SELECT * FROM blogs WHERE id='$copia'");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{

	$titulo= $fila['titulo_es']." COPIA";
	$tituloC=nombreBonito($titulo);
	$info= $fila['info'];
	$fecha= $fila['fecha'];
	$categoria= $fila['categoria'];


	}

$cambia = aleatorio(10);
$query="INSERT INTO blogs (id, titulo_es, tituloC_es, fecha, categoria, estatus, info) VALUES ('$cambia', '$titulo', '$tituloC','$fecha', '$categoria' ,'$estatus', '$info')";
$mysqli->query($query);


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
<script>top.location.href = "<?=$url?>/_blogs/blogs/blogAdd?u=<?=$cambia?>";</script>