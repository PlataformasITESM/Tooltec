<? include "../../sesion/arriba.php"; 

$dondeSeccion="secciones";
include "../../sesion/mata.php"; 


$mata=limpiaGET($mata);
		$query="DELETE FROM secciones WHERE id='$mata'";
		$mysqli->query($query);
		
		$query="DELETE FROM contenido WHERE idSeccion='$mata'";
		$mysqli->query($query);

		
		$query="OPTIMIZE TABLE secciones";
		$mysqli->query($query);

$query="OPTIMIZE TABLE contenido";
		$mysqli->query($query);



 ?>
<script>top.location.href = "<?=$url?>/_secciones/secciones";</script>