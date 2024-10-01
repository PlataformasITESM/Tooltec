<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php"; 


if($formA!="afecta"){
$res6 = $mysqli->query("SELECT * FROM seccionesMenu WHERE id='$mata' ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloMenu= $fila['titulo_es'];
	$editable= $fila['editable'];
	}
	

?>
<form action="menuMata.php" method="post" enctype="multipart/form-data" id="formaE">
<input type="hidden" name="formA" value="afecta" >
<input type="hidden" name="cambia" value="<?=$mata?>" >

<div class="close" onClick="closeAlert(); return false;">X</div>
<div class="alertaBoxTitulo" >DESEAS ELIMINAR EL MENU "<?=$tituloMenu?>"</div>
<div class="clear10"></div>
<div class="" ><b>Esta opción no puede ser revertida</b></div>
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
	
	$query="DELETE FROM seccionesMenu WHERE id='$cambia'";
	$mysqli->query($query);
	
	$query="DELETE FROM seccionesMenu WHERE idMenu='$cambia'";
	$mysqli->query($query);
	
	$query="OPTIMIZE TABLE seccionesMenu";
	$mysqli->query($query);


?>
<script>
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_seccionesMenu/menu";</script>	
</script>
<? } ?>