<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php";  

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
	$parametros= arregloSaca($fila['parametros']);
	$codigoM=base64_decode($parametros['codigo']);
	$anchoM=$parametros['ancho'];
	$tituloCodigo=$parametros['tituloCodigo'];
	$modificado= unserialize($fila['modificado']);
	}


 	$codigoM=str_replace("\'","'",$codigoM);
	?>
    
<div class="div100 divElemento blanco10" style="height: 100%;">  

 


   <form action="include.php" method="post" enctype="multipart/form-data" id="forma" >
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >


 
 <div class="formaB">
	<div class="formaT">Descripción</div>
    <div class="formaC">
   <input type="text" id="tituloCodigo" name="tituloCodigo" style=" width: 100%;" class="validate[required]" value="<?=$tituloCodigo?>" />

	</div>
</div>

*Por cuestiones de seguridad el include  será desplegado solo en el sitio.
	   <div class="clear20"></div>
	   	   <div class="clear20"></div>
<input type="text" name="codigo" id="codigo" class="validate[required]" value="<?=$codigoM?>">



 <? if($modificado!=""){ ?>
 <span style="font-size: 10px; color: #666;">
 Última modificación <?=$modificado['nombre']?> <?=$modificado['perfil']?> <?=fechaLetraHora($modificado['hoy'])?>
 </span>
 <? } ?>


</form>
</div>

<script>
//  var editor = ace.edit("editor");
		
 

$.getScript('elementos.js', function() {
});



 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	
	$codigo=base64_encode($codigo);

	$texto=$textoEdit;
	$tipoContenido="include";
	
	
	$parametros=array();
	$parametros['codigo']=$codigo;
	$parametros['tituloCodigo']=$tituloCodigo;
	$parametros['ancho']=100;
	$parametros=arregloMete($parametros);
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros', modificado='$creado' WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden, modificado) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100','$creado')";
	$mysqli->query($query1);
	}
?>
<script>
localStorage['elemento']="<?=$cambia?>";
top.location.reload();
</script>
<?
}
?>