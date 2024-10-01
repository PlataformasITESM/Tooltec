<? include "../../sesion/arriba.php"; 
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$laseccion=limpiaGet($laseccion);

if($formA!="afecta"){

$selas="SELECT * FROM secciones WHERE id='$laseccion'";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$versionActual= $fila['version'];
	}

	?>
 	<div class="div100">
  <div class="div100 divElemento blanco10">  
 


<table style="width: 100%; table-layout: fixed;" class="tablesorter tablas" >
	<thead>
		<tr>
			<th>Activa</th>
			<th>Nombre</th>
			<th>Url</th>
			<th style="width: 30px;"></tdh 
		</tr>
	</thead>
	<tbody>
	<tr class="linea">
	<td><input type="radio" name="activo" id="activo" value="original"></td>
		<td>Original</td>
		
		 	<td><a href="/_sitio/_secciones/seccion?s=<?=$laseccion?>&test=1" target="_blank">ver</a></td>
		 
		<td style="width: 30px;">
		</td>
	
	</tr>
	<? 	$res6 = $mysqli->query("SELECT * FROM seccionesVersion WHERE idSeccion='$laseccion'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{

	$idVersion=$fila['id'];
	$version=$fila['version'];
	$modificado=unserialize($fila['modificado']);
	$estatusV=$fila['estatus'];
	?>
	<tr class="linea" id="linea<?=$idVersion?>">
		<td><input type="radio" name="activo" id="activo<?=$idVersion?>" value="<?=$idVersion?>"></td>
		<td><?=$version?></td>
		<td><a href="/_sitio/_secciones/seccion?s=<?=$laseccion?>_<?=$idVersion?>&test=1" target="_blank">ver</a></td>
		<td style="width: 30px;" class="ctrls" id="controles_linea<?=$idVersion?>" >
		<div class="material-icons cursor borra" onclick="javascript:if (confirm('¿Desea eliminar esta versión?')){eliminarV('<?=$idVersion?>');return false;}">clear</div>	
		</td>
	
	</tr>
 
<? } ?>	
	
	
	</tbody>
</table>

<div class="clear20"></div>

		
    <form action="versiones.php" method="post" enctype="multipart/form-data" id="forma">
  	<input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="laseccion" value="<?=$laseccion?>" >

	

<div class="clear20"></div>


 
 <div class="formaB">
	<div class="formaT">Nombre versión</div>
    <div class="formaC">
    <input type="text" name="nombre" id="nombre" class="field validate[required]" >
	</div>
</div>

<div class="formaB">
	<div class="formaT"></div>
    <div class="formaC">
	<label><input type="radio" name="nueva" checked value="duplica"/>Duplicar versión</label>
    <label><input type="radio" name="nueva" value="vacia"/>Sin contenido</label>
    
	</div>
</div>



<div class="formaB" id="divVersiones" style="display: none;">
	<div class="formaT">Duplicar</div>
    <div class="formaC">
   	<select name="version" id="version">
				<option value="">Original</option>
				<? $selas="SELECT * FROM seccionesVersion WHERE idSeccion='$laseccion' ORDER BY fecha DESC";
		$res6 = $mysqli->query($selas);
			$res6->data_seek(0);
			while ($fila = $res6->fetch_assoc()) 
			{
			$laVersion= $fila['version'];
			$idV=$fila['id'];
			?>
			<option value="<?=$idV?>"><?=$laVersion?></option>
			<? } ?>
	</select>
	</div>
</div>




</form>

 </div>


</div>

<script>
 
 
  $.getScript('elementos.js', function() {
  
  });
	function agregaVersion2(){
	
	$('#divNuevos').show();
	
	}
	
$("#activo<?=$versionActual?>").prop("checked", true);

$('input[type=radio][name=nueva]').change(function() {
    if (this.value == 'duplica') {
        $('#divVersiones').show();
    }else{
       $('#divVersiones').hide();
    }
});	
	
	$('input[type=radio][name=activo]').change(function() {
    
					$.ajax({
    type: "POST",
    url: "versionesActiva.php",
    data: "laseccion=<?=$laseccion?>&activa="+this.value,
    success: 
    function(msg){
				}
				});	

});

	
function eliminarV(esta){

$.ajax({
    type: "POST",
    url: "versionesMata.php",
    data: "laseccion=<?=$laseccion?>&mata="+esta,
    success: 
    function(msg){
						$('#aqui').html(msg);
				}
				});	

}
	
</script>
    
    <?
	
	
}
if ($formA=="afecta"){


$seccion=mataMalos($laseccion);
$nombre=mataMalos($nombre);
 
	$cambia=aleatorio(4);	
	$query1="INSERT INTO seccionesVersion (id,version,idSeccion,fecha,modificado) VALUES ('$cambia','$nombre','$seccion','$hoy','$creado')";
	$mysqli->query($query1);
	

	if($nueva=="duplica"){
	
	$laCopia=$laseccion;
	if($version!=''){
	$laCopia=$laseccion.'_'.$version;
	}
	
//copiamos content
$res65 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$laCopia'  AND (idElemento='' OR idElemento is null ) AND (idGrid='' OR idGrid is null )");
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$idE= $fila['id'];
	$posicion= $fila['posicion'];
	$tipo= $fila['tipo'];
	$parametros= $fila['parametros'];
	$jerarquia= $fila['jerarquia'];
	$orden= $fila['orden'];
	

if($posicion==""){$posicion=0;}
if($jerarquia==""){$jerarquia=0;}
if($orden==""){$orden=0;}

$nuevaSeccion = $seccion.'_'.$cambia;
$aleatorio = aleatorio(10);
$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorio', '$nuevaSeccion', '','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
$mysqli->query($query);


	//grids
		$res651 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$laCopia' AND idElemento='$idE'  AND (idGrid='' or idGrid is null) ");
		
		
		$res651->data_seek(0);
		while ($filas = $res651->fetch_assoc()) 
			{
			$idG= $filas['id'];
			$posicion= $filas['posicion'];
			$tipo= $filas['tipo'];
			$parametros= $filas['parametros'];
			$jerarquia= $filas['jerarquia'];
			$orden= $filas['orden'];

if($posicion==""){$posicion=0;}
if($jerarquia==""){$jerarquia=0;}
if($orden==""){$orden=0;}

		$aleatorioHijo = aleatorio(10);
		$query="INSERT INTO contenido (id, idSeccion, idElemento, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioHijo', '$nuevaSeccion', '$aleatorio','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
		$mysqli->query($query);
		
		
				//elementos
				$res652 = $mysqli->query("SELECT * FROM contenido WHERE  idSeccion='$laCopia' AND ( idElemento='$idG' OR idGrid='$idG') ");
				$res652->data_seek(0);
				while ($filaz = $res652->fetch_assoc()) 
					{
					$posicion= $filaz['posicion'];
					$tipo= $filaz['tipo'];
					$parametros= $filaz['parametros'];
					$jerarquia= $filaz['jerarquia'];
					$orden= $filaz['orden'];
					$elementoO= $filaz['idElemento'];
					$gridO= $filaz['idGrid'];


					$elemento='';
					$grid='';
					if($elementoO==$idG){$elemento=$aleatorioHijo;}
					if($gridO==$idG){$grid=$aleatorioHijo;}

if($posicion==""){$posicion=0;}
if($jerarquia==""){$jerarquia=0;}
if($orden==""){$orden=0;}


				$aleatorioSubHijo = aleatorio(10);
				$query="INSERT INTO contenido (id, idSeccion, idElemento, idGrid, posicion, tipo, parametros, jerarquia, orden, cuando) VALUES ('$aleatorioSubHijo', '$nuevaSeccion', '$elemento','$grid','$posicion', '$tipo', '$parametros','$jerarquia','$orden','$hoy')";
				$mysqli->query($query);
		
		
					}
		
			}


	
	}
	

	}

?>
<script>top.location.href = "<?=$url?>/_contenido/contenido/?v=<?=$seccion?>&V=<?=$cambia?>";</script>
<?
} ?>