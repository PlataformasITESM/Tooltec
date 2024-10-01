<? include "../sesion/arriba.php";

 $u=limpiaGET($_GET['u']);	
 $clave=limpiaGET($_GET['clave']);	
 

 if($clave!=""){
	
	$selas="SELECT * FROM usuariosF WHERE id='$u' AND clave='$clave' AND validado='0' ";
 $res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 	$idU= $fila['id'];
 	$nombreU= $fila['nombre'];
	
	$nuevaClave=aleatorio(10);
	$query="UPDATE usuariosF SET clave='$nuevaClave',  validado='1'  WHERE id='$idU' ";
	$mysqli->query($query);
	
 ?>
	 
					<script>
					alert('Tu correo fue validado');
					top.location.href = "/";</script>
					<?
				die();
				}
				}
?>
 
<script>top.location.href = "/";</script>
 
 