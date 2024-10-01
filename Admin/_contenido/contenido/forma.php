<? include "../../sesion/arriba.php"; 
extract($_POST);
$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);
if($formA!="afecta"){
$mi='checked="checked"';
$md=' "';
 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$parametros= unserialize(base64_decode($fila['parametros']));

$textoM=$parametros['texto'];
	$idRegistroM=$parametros['idRegistro'];
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
    
 
   
<div style="float:left; width:100%; max-width:400px;">    
<div class="titulosS">Forma</div>
<div style="clear:both; height:5px;"></div>


   <form action="<?=$url?>/_contenido/forma.php" method="post" enctype="multipart/form-data" id="forma" >
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >

    
<div style="width:150px; float:left; margin-bottom:5px; ">Texto</div>
<div style="clear:both; height:5px;"></div>
<div style="float:left; width:100%;   ">
<textarea id="textoEdit" name="textoEdit" class="textoEdit"><?=$textoM?></textarea>
</div>
<div style="clear:both; height:10px;"></div>




<div style="width:150px; float:left; margin-bottom:5px; ">Registro</div>
<div style="float:left;  ">
<select name="idRegistro" id="idRegistro" class="validate[required]">
<option value=""  >Seleccione una opción</option>
<?
 
$res6 = $mysqli->query("SELECT * FROM registros   ORDER BY titulo ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idRegistro= $fila['id'];
	$registro= $fila['titulo'];
?>
<option value="<?=$idRegistro?>"><?=$registro?></option>
<?
	}
 
?>



</select>
</div>
<div style="clear:both; height:10px;"></div>


<div style="width:150px; float:left; margin-bottom:5px; ">Flota</div>
<div style="float:left;  ">
<select name="flota" id="flota">
<option value="left"  >Izquierda</option>
 <option value="right"  >Derecha</option>
</select>
</div>
<div style="clear:both; height:10px;"></div>

 

<div style="width:150px; float:left; margin-bottom:5px; ">Ancho</div>
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

CKEDITOR.replace( 'textoEdit' );

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}	
	
	function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}
 $(".botonEnviar").click(function() {
       
   CKupdate();
         
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
	$tipoContenido="forma";
	
	$parametros=array();
	$parametros['idRegistro']=$idRegistro;
	$parametros['texto']=$texto;
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
	$query1="INSERT INTO contenido (id,idSeccion,tipo,parametros) VALUES ('$cambia','$seccion','$tipoContenido','$parametros')";
	$mysqli->query($query1);
	}
	
//include "busqueda.php";		
	
include "acomodo.php";	
}
?>
