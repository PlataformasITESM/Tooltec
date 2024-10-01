<? include "../../sesion/arriba.php"; 
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
	$parametros= unserialize(base64_decode($fila['parametros']));

	$textoM=$parametros['texto'];
	$linea=$parametros['linea'];
	$altoDiv=$parametros['alto'];
	$clases=$parametros['clases'];
	 
 
	}
	
	if($altoDiv==""){$altoDiv=10;}

if($linea=="on"){$lin='checked';}

	?>
 	<div class="div100">
  <div class="div100 divElemento blanco10">  
		
    <form action="divisor.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >

    <input type="hidden" name="cambia" value="<?=$elemento?>" >
    <input type="hidden" name="seccion" value="<?=$seccion?>" >
    <input type="hidden" name="padre" value="<?=$padre?>" >
    <input type="hidden" name="posicion" value="<?=$posicion?>" >
   
   


 <div class="formaB">
	<div class="formaT">Línea</div>
    <div class="formaC">
    <input type="checkbox" <?=$lin?> name="linea" /> Mostrar línea
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Altura</div>
    <div class="formaC">
    <input type="number" name="altoDiv" class="field" min="10" value="<?=$altoDiv?>"/>
	</div>
</div>

 <div class="formaB">
	<div class="formaT">Clases</div>
    <div class="formaC">
    <input type="text" name="clases" id="clases" class="field clases" value="<?=$clases?>">
	</div>
</div>


</form>
</div>
</div>

<script>

 $.getScript('elementos.js', function() { });
 
</script>
    
    <?
	
	
}
if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=limpiaGet($seccion);
	$tipoContenido="divisor";

		
	
	$parametros=array();
	$parametros['linea']=$linea;
	$parametros['ancho']=100;
	$parametros['alto']=$altoDiv;
	
 $parametros['clases']=$clases;
	
	$parametros=base64_encode(serialize($parametros));
 
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros'   WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100')";
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

