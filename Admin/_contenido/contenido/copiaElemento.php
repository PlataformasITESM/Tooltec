<? include "../../sesion/arriba.php"; 
$dondeSeccion="secciones";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);


/* elementos */
$res65 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$seccion' AND id='$elemento' LIMIT 1");
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$hayCuadricula=1;
	$idE= $fila['id'];
	$idP= $fila['idElemento'];
	$idG= $fila['idGrid'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	$parametros=$fila['parametros'];
	$jerarquia=$fila['jerarquia'];
	$orden=$fila['orden'];


}
if($jerarquia==""){$jerarquia=0;}
	$nuevo=aleatorio(6);
$query="INSERT INTO contenido (id, idSeccion, idElemento, idGrid, posicion, tipo, parametros,  jerarquia, orden, cuando) VALUES ('$nuevo', '$seccion', '$idP', '$idG', '$posicion', '$tipo', '$parametros', '$jerarquia', '$orden', '$hoy')";
$mysqli->query($query);	

 
?>
<script>

top.location.reload();
</script>
