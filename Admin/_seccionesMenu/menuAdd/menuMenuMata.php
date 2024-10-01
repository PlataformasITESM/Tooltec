<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php";


if($formA!="afecta"){
$res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE id='$mata' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$tituloMenu= $fila['titulo_es'];
		$idSeccion= $fila['idSeccion'];
		$idMenu= $fila['idMenu'];
	}

?>
<form action="menuMenuMata.php" method="post" enctype="multipart/form-data" id="formaE">
<input type="hidden" name="formA" value="afecta" >
<input type="hidden" name="cambia" value="<?=$mata?>" >
<input type="hidden" name="idMenu" value="<?=$idMenu?>" >
<input type="hidden" name="idSeccion" value="<?=$idSeccion?>" >

<div class="close" onClick="closeAlert(); return false;">X</div>
<div class="alertaBoxTitulo" >DESEAS ELIMINAR LA ENTRADA "<?=$tituloMenu?>"</div>
<div class="clear10"></div>
<div class="" >  Esta opción no puede ser revertida</div>
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
	
	$query="DELETE FROM seccionesMenuSecciones WHERE id='$cambia'";
	$mysqli->query($query);
	
	$query="OPTIMIZE TABLE seccionesMenuSecciones";
	$mysqli->query($query);

		$query="UPDATE seccionesMenuSecciones SET idTitulo=''   WHERE idTitulo='$cambia'";
	$mysqli->query($query);

?>
<script>
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_seccionesMenu/menu/menuAdd?v=<?=$idMenu?>";</script>	
</script>
<? } ?>