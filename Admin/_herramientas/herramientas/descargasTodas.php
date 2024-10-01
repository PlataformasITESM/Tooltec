
<div class="blanco10"  >  
<table id="tablesorter"  class="tablesorter" >

<thead>
<tr>
<th style="width: 50px;">Orden</th>
<th>Archivo</th>
<th>Extensión</th>
<th>Descargas</th>
<th>Intentos</th>

 <th width="30px;"></th>

</tr>
</thead>

<?
$selas="SELECT * FROM herramientasDescargas WHERE idHerramienta='$valor'  and muerto='0' ORDER BY orden ASC";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$ext= $fila['ext'];
$titulo= $fila['titulo'];
$img= $fila['img'];
$orden= $fila['orden'];
$descargas= $fila['descargas'];

$intentos=0;
$selas3="SELECT * FROM herramientasDes  WHERE idDescarga='$idU'  and idUsuario=''";
$res63 = $mysqli->query($selas3);
$res63->data_seek(0);
 while ($filax = $res63->fetch_assoc()) 
	{
	$intentos=$intentos+1;
	
	}

				?>



<tr class="linea" id="<?=$idU?>" data-titulo="<?=$titulo?>"  >
	
	<td class="centrado"><?=$orden?></td>
	<td><a href="descargasAdd.php?u=<?=$valor?>&des=<?=$idU?>"> 
	
<?=$titulo?> </td> 
<td style="text-align: center;"><?=$ext?></td>
<td style="text-align: center;"><?=$descargas?></td>
<td style="text-align: center;"><?=$intentos?></td>

<td class="ctrls" id="controles_linea<?=$idU?>" >
<div style="float:left;  ">
		<a href="descargasAdd.php?u=<?=$valor?>&des=<?=$idU?>"> 
		<div class="material-icons">mode_edit</div>
		</a>
</div>
				
 
	
</td>
</tr>
      
 <? } ?>
</table>


</div>

<script>
	$("#tablesorter").DataTable( {});
</script>