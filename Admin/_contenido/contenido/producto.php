<? include "../sesion/arriba.php"; 
extract($_POST);
$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){
$mi='checked="checked"';
$md=' "';


$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];
$posicion=$padreA[2];



 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize(base64_decode($fila['parametros']));

	$producto=$parametros['producto'];
	$anchoM=$parametros['ancho'];
	$paddingM=$parametros['padding'];
	$margenM=$parametros['margen'];
	$flotaM=$parametros['flota'];
	$animacionM=$parametros['animacion'];
	}
	
if($apareceM=="on"){$apa="checked"; }	
if($margenM=="on"){$mar="checked"; }	
if($paddingM=="on"){$pad="checked"; }	

 
	?>
    
 
   
<div style="float:left; width:100%;  ">    
<div class="titulosS">Producto</div>
<div style="clear:both; height:5px;"></div>


   <form action="<?=$url?>/_contenido/producto.php" method="post" enctype="multipart/form-data" id="forma" >
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >

    
 
<div class="formaB">
	<div class="formaT">Producto</div>
    <div class="formaC">
    <select name="producto" id="productoS" class="validate[required]">
<option value=""  >Seleccione un producto</option>
    <?
$selas="SELECT * FROM catalogosProds   ORDER BY titulo ASC";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
		$sku= $fila['id'];
		$skuT= $fila['sku'];
		$titulo= $fila['titulo'];
		?>
        
        <option  <? if ($sku==$producto){ ?> selected <? } ?> value="<?=$sku?>"><?=$skuT?> <?=$titulo?></option>
        <?
     }
?> 
		</select>
	</div>
</div>

 


<div style="width:150px; float:left; margin-bottom:5px; ">Flota</div>
<div style="float:left;  ">
<select name="flota" id="flota">
<option value="left"  >Izquierda</option>
 <option value="right"  >Derecha</option>
</select>
</div>
<div style="clear:both; height:10px;"></div>

 

<div style="width:150px; float:left; margin-bottom:5px; ">Width</div>
<div style="float:left;  ">
<select name="ancho" id="ancho">
<option value="100"  >100%</option>
<option value="75"  >75%</option>
<option value="66.66"  >66%</option>
<option value="50"  >50%</option>
<option value="33.33"  >33%</option>
<option value="25"  >25%</option>
<option value="20"  >20%</option>
<option value="15"  >15%</option>
<option value="10"  >10%</option>
</select>
</div>
<div style="clear:both; height:10px;"></div>
 
<div style="width:150px; float:left; margin-bottom:5px; ">Márgenes</div>
<div style="float:left;  ">
<input type="checkbox" <?=$pad?> name="padding" /> Padding
<input type="checkbox" <?=$mar?> name="margen" /> Bottom
</div>
<div style="clear:both; height:10px;"></div>




<div style="width:150px; float:left; margin-bottom:5px; ">Efecto</div>
<div style="float:left;  ">
<select name="animacion" id="animacion" class=" ">
<option value=""  >Sin animación</option>
<?

$res6 = $mysqli->query("SELECT * FROM animaciones   ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$animacion= $fila['animacion'];

?>
<option value="<?=$animacion?>"><?=$animacion?></option>
<?
	}
?>

</select>
</div>
<div style="clear:both; height:10px;"></div>
 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" class="boton"  id="boton" value="Continuar" />
</div>


</form>
</div>

<? if( $anchoM>0 ) { ?>
<script>
$('#ancho').val('<?=$anchoM?>');
$('#estilo').val('<?=$estiloM?>');
</script>
<? } ?>


<script>

 $(document).ready(function(){
	$("#productoS").chosen();
});

 <? if ($idRegistroM!="") { ?>
	 $('#idRegistro').val('<?=$idRegistroM?>');
	 
 <? } ?>
 
 
 $(function() {

	 
 
 
	 
$("#forma").validationEngine(); 
 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 });
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	
	$textoEdit=mataMalosTin($textoEdit);

	$texto=$textoEdit;
	$tipoContenido="producto";
	
	
	$selas="SELECT * FROM catalogosProds WHERE  id='$producto'  LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$cat= $fila['categorias'];
	$catS= $fila['subcategorias'];
	}
	
	
	$selas="SELECT * FROM catalogosCats WHERE  id='$cat'  LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$cat= $fila['tituloC'];
	}

$selas="SELECT * FROM catalogosCats WHERE  id='$catS'  LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$catS= $fila['tituloC'];
	}
	
	
	$parametros=array();
	$parametros['producto']=$producto;
	$parametros['cat']=$cat;
	$parametros['catS']=$catS;
	$parametros['ancho']=$ancho;
	$parametros['flota']=$flota;
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros=base64_encode(serialize($parametros));
	
	if($cambia!=""){
	
	$query="UPDATE contenido SET parametros='$parametros'   WHERE id='$cambia'";
	$mysqli->query($query);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idElemento,posicion,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100')";
	$mysqli->query($query1);
	}
	
//include "busqueda.php";		
	
include "acomodo.php";	
}
?>
