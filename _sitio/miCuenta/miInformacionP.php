<? include_once "../sesion/arriba.php";
if($t!=$elToken){die();}
$nombre=mataMalos($nombre);
$apellido=mataMalos($apellido);
$campus=mataMalos($campus);
	$query="UPDATE usuariosF SET  nombre='$nombre', apellido='$apellido' , campus='$campus'   WHERE id='$quien'";
	$mysqli->query($query); 


//echo $query;
?>
<script>
top.location.reload(true)
</script>