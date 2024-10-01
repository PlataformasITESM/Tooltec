 
<div class="div100"  >  

<input type="hidden" id="campo" value="<?=$campo?>">
<input type="hidden" id="campoOrden" value="<?=$orden?>">

<table    class="tablas"  id="tablesorter">

<thead >
<tr  >
<th>Sección</th>
<th>Contenido</th>
<th>url</th>
 
<th></th>
</tr>
</thead>
<tbody >
 
 
 <?
	
$selas="SELECT * FROM landings WHERE   (id!='home' AND id!='footer') and  muerto=0   ORDER BY $campo $orden";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
		$activo= $fila['activo'];
	$url_Es= $fila['url_es'];
	$url_en= $fila['url_en'];
	$editable= $fila['editable'];
	$tipo= $fila['tipo'];

$tipoT='Página';
if($tipo!='pagina' && $tipo!=''){
$tipoT='Contenedor';
}

$opacidad=$activo+.5;

	?>
	
<tr class="linea" id="linea<?=$idU?>"   style="opacity: <?=$opacidad?>">
<td>
<? if($editable==0){ ?>
 
<?=$titulo?>
 
<? } else {?>
<?=$titulo?>
<? } ?>
</td>


<td  >
<a href="<?=$url?>/_contenido/contenido?u=<?=$idU?>" target="_blank" >
<div class="div100 mensaje" style="position: relative;">
<div class="material-icons">add_to_queue</div>
<div class="div100" style="padding-left: 30px">Contenido</div>
</div>
</a> 

</td>
<td style="text-align: left;"  >
<a href="/es/<?=$url_Es?>/ld" target="_blank">/es/<?=$url_Es?>/ld</a>
<br>
<a href="/en/<?=$url_en?>/ld" target="_blank">/en/<?=$url_en?></a>

<div class="clear10"></div>

<a href="/_sitio/_secciones/landings?s=<?=$url_Es?>&test=1" target="_blank">vista directa</a>

 



<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >
<div style="float:right;  ">
  <a class=""  onclick="javascript:if (confirm('Desea duplicar la sección <?=$titulo?>?')){duplicaSeccion('<?=$idU?>');return false;}">
 <div class="material-icons" title="Duplicar">filter</div>
</a>
</div>

<? if($editable==0){ ?>
<div style="float:left;  ">
<a href="landingsAdd?u=<?=$idU?>" >
<div class="material-icons">mode_edit</div>
</a>

    </div>
	<? } ?>
	


</td>
 </tr> 	
	<?	}		?>
</tbody>


</table>


</div>

