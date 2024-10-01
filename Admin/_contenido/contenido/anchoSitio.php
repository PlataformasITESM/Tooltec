<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$seccion=limpiaGet($seccion);

if($formA!="afecta"){

include "../../_files/filesSelect/archivosDisponibles.php"; 
$displa="none";

 $selas="SELECT * FROM sitio WHERE idSeccion='$seccion'";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$anchoSitio= $fila['ancho'];
	}

	?>
	
	<div class="div50A">
  <div class="div100 divElemento blanco10">  
  <a onClick="closeAlertElement();"><div  class="close">X</div></a>
 
<form action="anchoSitio.php" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="formA" value="afecta" >
<input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" > <input type="hidden" name="seccion" value="<?=$seccion?>" >
<input type="hidden" name="e" value="<?=$e?>" >


<div class="div100 titulos textAlignCenter">ANCHO DEL SITIO</div>


<div class="clear20"></div>

 <div class="formaB">
<div class="formaT">Ancho máximo del sitio</div>
<div class="formaC "><input style="width:calc(100% - 20px);" type="text" name="ancho" id="ancho" class="  entero" value="<?=$anchoSitio?>"> px</div>
</div>

 
 
	<div class="clear20"></div>

<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>


<div class="botonEnviar" style="float:right;">
<input type="submit" class="boton"  id="boton" value="Guardar" />
</div>

</form>
</div>
</div>
 
<script>

 $.getScript('elementos.js', function() {

 });

 

</script>

    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	
	
if($seccion!=""){
$query1="UPDATE sitio SET ancho='$ancho' WHERE idSeccion='$seccion'";	
$mysqli->query($query1);
}
	

?>
 <script>
top.location.reload();
</script>
<?

	

}



?>

