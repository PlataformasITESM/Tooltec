 
<div class="div100"  >  

<input type="hidden" id="campo" value="<?=$campo?>">
<input type="hidden" id="campoOrden" value="<?=$orden?>">

<table    class="tablas"  id="tablesorter">

<thead >
<tr  >
<th>Sección</th>
<th>Contenido</th>
<th>url</th>
<th>tipo</th>

<th></th>
</tr>
</thead>
<tbody >
<? $idU="home";

$selas="SELECT * FROM secciones WHERE   id='home'";
if($tipoU=="editor"){
$selas="SELECT * FROM secciones WHERE   id='home'  AND permisos like '%$quien%'   ";
}

$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
?>
<tr class="linea" id="linea<?=$idU?>"   style="opacity: <?=$activoColor?>">
<td>
 Inicio  
</td>

<td  >

<a href="<?=$url?>/_contenido/contenido?u=<?=$idU?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">add_to_queue</div>
<div class="div100" style="padding-left: 30px">Contenido</div>
</div>
</a> 
</td>

<td style="text-align: left;"  >/<?=$url_Es?><br>
/<?=$url_Es?>
</td>
<td style="text-align: center;"  >Página de inicio
</td>



<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >
<div style="float:left;  ">
<? if($tipoU=="admin"){ ?>
<a href="seccionesAdd?u=<?=$idU?>" >
<div class="material-icons">mode_edit</div>
</a>
<?} ?>
    </div>
</td>
 </tr> 	
 <? } ?>
 
 
 
 
 <? $idU="homeTabasco";
 $selas="SELECT * FROM secciones WHERE   id='homeTabasco'";
if($tipoU=="editor"){
$selas="SELECT * FROM secciones WHERE   id='homeTabasco'  AND permisos like '%$quien%'   ";
}

$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 ?>
<tr class="linea" id="linea<?=$idU?>"   style="opacity: <?=$activoColor?>">
<td>
 Inicio  Tabasco
</td>

<td  >

<a href="<?=$url?>/_contenido/contenido?u=<?=$idU?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">add_to_queue</div>
<div class="div100" style="padding-left: 30px">Contenido</div>
</div>
</a> 
</td>


<td style="text-align: left;"  >/es/<?=$url_Es?><br>
/en/<?=$url_Es?>
</td>
<td style="text-align: center;"  >Página de inicio
</td>

 

<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >
<div style="float:left;  ">
<? if($tipoU=="admin"){ ?>
<a href="seccionesAdd?u=<?=$idU?>" >
<div class="material-icons">mode_edit</div>
</a>
<? } ?>
    </div>
</td>
 </tr> 	
<?} ?> 
 
 <? $idU="footer";
 if($tipoU=="admin"){
 ?>

<tr class="linea" id="linea<?=$idU?>"   style="opacity: <?=$activoColor?>">
<td>
 Pie de página  
</td>

<td  >

<a href="<?=$url?>/_contenido/contenido?u=<?=$idU?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">add_to_queue</div>
<div class="div100" style="padding-left: 30px">Contenido</div>
</div>
</a> 
</td>


<td style="text-align: left;"  > 
</td>
<td style="text-align: center;"  >Pie de página
</td>

 

<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >
 
</td>
 </tr> 	
 <? } ?>
 <?
	
$selas="SELECT * FROM secciones WHERE   (id!='home' AND id!='footer') and  muerto=0   ORDER BY $campo $orden";
if($tipoU=="editor"){
$selas="SELECT * FROM secciones WHERE   (id!='home' AND id!='footer') and  muerto=0  AND permisos like '%$quien%'  ORDER BY $campo $orden";
}

$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$titulo= $fila['titulo_es'];
	$url_Es= $fila['url_es'];
	$activo= $fila['activo'];
	$url_En= $fila['url_en'];
	$editable= $fila['editable'];
	$tipo= $fila['tipo'];

$tipoT='Página';
if($tipo=='contenedor'){$tipoT='Contenedor';}
if($tipo=='micro'){$tipoT='Micro Sitio';}
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
<? if($tipo!='micro'){ ?>
<a href="<?=$url?>/_contenido/contenido?u=<?=$idU?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">add_to_queue</div>
<div class="div100" style="padding-left: 30px">Contenido</div>
</div>
</a> 
<? } ?>



<? if($tipo=='micro'){ ?>
<a href="micro?u=<?=$idU?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">list</div>
<div class="div100" style="padding-left: 30px">Secciones</div>
</div>
</a> 
<? } ?>

</td>


<td style="text-align: left;"  ><a href="/es/<?=$url_Es?>" target="_blank">/<?=$url_Es?></a> 
</td>
<td style="text-align: center;"  ><?=$tipoT?>
</td>

 

<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >
<? if($tipoU=="admin"   ){ ?>

<? if( $tipo!='micro') {?>
<div style="float:right;  ">
  <a class=""  onclick="javascript:if (confirm('Desea duplicar la sección <?=$titulo?>?')){duplicaSeccion('<?=$idU?>');return false;}">
 <div class="material-icons" title="Duplicar">content_copy</div>
</a>
</div>
<? } ?>
<? if($editable==0 ){ ?>
<div style="float:left;  ">
<a href="seccionesAdd?u=<?=$idU?>" >
<div class="material-icons">mode_edit</div>
</a>

    </div>
	<? } ?>
	
<? } ?>

</td>
 </tr> 	
	<?	}		?>
</tbody>


</table>


</div>

