<? include "../../sesion/arriba.php"; 
$dondeSeccion="admins";
include "../../sesion/mata.php"; 

 $res6 = $mysqli->query("SELECT * FROM usuarios WHERE correo='$correo'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$nombre= $fila['nombre'];
	$apellido= $fila['apellido'];
	$tipoUsuario= $fila['tipo'];

	if($tipoUsuario=="admin"){
		$nueva="";
		?>
        
		<div class="table">
        
        <div class="material-icons" style="width:30px;">warning</div>
        <div class="tableCell">El usuario ya es administrador del sistema</div>
        </div>
        <div class="clear10"></div>
       
							
       
		<?
		}else{
		
		$idU='';
		?>
				<div class="table">
        
        <div class="material-icons" style="width:30px;">warning</div>
        <div class="tableCell">El usuario ya es <?=$tipoUsuario?> del sistema</div>
        </div>
        <div class="clear10"></div>
		
		<?
		
		}
	

	
?> 
<script>
		$('#cambia').val('<?=$idU?>');
		$('#nombre').val('<?=$nombre?>');
		$('#apellido').val('<?=$apellido?>');
		$('#nueva').val('<?=$nueva?>');
		</script>
		<? } ?>