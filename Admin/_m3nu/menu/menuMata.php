<? include "../../sesion/arriba.php"; 
$conecta=1;
$dondeSeccion="menu";

include "../../sesion/mata.php"; 

if($sA!=1){
	die('<script>top.location.href = "/";</script>');
}

if($formA!="afecta"){
$res6 = $mysqli->query("SELECT * FROM menu WHERE id='$mata' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$icono= $fila['icono'];
	$permisoMenu= explode(',',$fila['permisoMenu']);
	$permiso=  explode(',',$fila['permiso']);
	}

?>
<form action="menuMata.php" method="post" enctype="multipart/form-data" id="formaE">
<input type="hidden" name="formA" value="afecta" >
<input type="hidden" name="cambia" value="<?=$mata?>" >

<div class="close" onClick="closeAlert(); return false;">X</div>
<div class="alertaBoxTitulo" >DESEAS ELIMINAR EL MENU "<?=$titulo?>"</div>
<div class="clear10"></div>
<div class="" ><strong>Se eliminarán todos sus submenús.</strong> <br>Esta opción no puede ser revertida</div>
<div class="clear30"></div>
<div class="botonesCancelar"   >Cancelar</div>
<input type="submit" class="botonesRojo right"  value="Eliminar"> 
</form>

<script>
var optionssE = { 
        target:        '#alertaBox', 
      	success: function(){
				$('#formaE').clearForm();
				 }	
    }; 	
 $('#formaE').ajaxForm(optionssE);
</script>

<? } 

if($formA=="afecta"){
	
	$query="DELETE FROM menu WHERE id='$cambia'";
	$mysqli->query($query);
	
	$query="DELETE FROM menu WHERE idMenu='$cambia'";
	$mysqli->query($query);
	
	$query="OPTIMIZE TABLE menu";
	$mysqli->query($query);
$res6pers = $mysqli->query("SELECT * FROM usuariosPerfiles  ");
 $res6pers->data_seek(0);
 while ($filassss = $res6pers->fetch_assoc()) 
{
	$perfilazo= $filassss['tipo'];
	include "creaMenu.php";
}
 	

?>
<script>
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_m3nu/menu";</script>	
</script>
<? } ?>