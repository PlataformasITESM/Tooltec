 
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
<? $idU=$valor;

$selas="SELECT * FROM secciones WHERE   id='$valor'";
if($tipoU=="editor"){
$selas="SELECT * FROM secciones WHERE   id='$valor'  AND permisos like '%$quien%'   ";
}

$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
?>
<tr class="linea" id="<?=$valor?>"   style="opacity: <?=$activoColor?>">
<td>
 Inicio  
</td>

<td  >

<a href="<?=$url?>/_contenido/contenido?u=<?=$valor?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">add_to_queue</div>
<div class="div100" style="padding-left: 30px">Contenido</div>
</div>
</a> 
</td>

<td style="text-align: left;"  >/es/<?=$urlM?><br>
/en/<?=$urlM?>
</td>
<td style="text-align: center;"  >Página de inicio
</td>



<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >
<div style="float:left;  ">
<? if($tipoU=="admin"){ ?>
<a href="microsAdd?u=<?=$idU?>" >
<div class="material-icons">mode_edit</div>
</a>
<?} ?>
    </div>
</td>
 </tr> 	
 <? } ?>
 
 <? if($urlM=="egresados" || $urlM=="egresados-tabasco"){ ?>
 <tr class="linea" id="<?=$valor?>"   style="opacity: <?=$activoColor?>">
<td>
 Beneficios  
</td>

<td  >
<a href="<?=$url?>/_egresados/beneficios/?e=<?=$valor?>" target="_blank" >
<div class="mensaje" style="position: relative;">
<div class="material-icons">emoji_events</div>
<div class="div100" style="padding-left: 30px">Beneficios</div>
</div>
</a> 
</td>
<td style="text-align: left;"  ></td>
<td style="text-align: center;"  > </td>
<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" ></td>
 </tr> 	
 <? } ?>
 

 <?
	
$selas="SELECT * FROM microSitios WHERE   idMenu='$valor' and  muerto=0    ";

if($tipoU=="editor"){
$selas="SELECT * FROM microSitios WHERE   idMenu='$valor'  AND permisos like '%$quien%'   ";
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
	$footer= $fila['footer'];

$tipoT='Página';
if($tipo=='contenedor'){$tipoT='Contenedor';}
if($tipo=='micro'){$tipoT='Micro Sitio';}
$opacidad=$activo+.5;

if($footer==1){$tipoT="Header";}
if($footer==2){$tipoT="Footer";}

	?>
	
<tr class="linea" id="<?=$idU?>" data-titulo="<?=$titulo?>"   style="opacity: <?=$opacidad?>">
<td>
<? if($editable==0){ ?>
 
<?=$titulo?>
 
<? } else {?>
<?=$titulo?>
<? } ?>
</td>

<td  >
<? if( ($tipoU=="admin") || ($tipoU=='editor' && $footer>0)){ ?>
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


<td style="text-align: left;"  >
<? if($footer==0){ ?>
<a href="/es/<?=$urlM?>/<?=$url_Es?>" target="_blank">/es/<?=$urlM?>/<?=$url_Es?></a><br>
<a href="/es/<?=$urlM?>/<?=$url_En?>" target="_blank">/en/<?=$urlM?>/<?=$url_En?></a>
<? } ?>
</td>
<td style="text-align: center;"  ><?=$tipoT?>
</td>

 

<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 60px;" >

<? if($tipoU=="admin"  ){ ?>

<div style="float:left;  ">
<a href="microsAdd.php?m=<?=$valor?>&u=<?=$idU?>" >
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

