<? include "../../sesion/arriba.php"; 

$dondeSeccion="usuariosSys";
include "../../sesion/mata.php"; 

 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE   usuario='$usuario'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	
?>
		<div class="table">
        <div class="material-icons" style="width:30px;">warning</div>
        <div class="tableCell">El usuario <b><?=$usuario?></b> ya se encuentra registrado</div>
        </div>
        <div class="clear10"></div>
        <script>
		 
		$('#usuario').val('');

<? } ?>