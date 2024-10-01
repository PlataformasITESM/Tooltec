<div class="blanco10">

<input type="hidden" id="registro" value="<?=$valor?>">

<div id="actuales" style="float:left; width:100%; max-width:400px;">
<?

foreach ($orden as $ordecin){
	
	
	$esteArreglo=$campos[$ordecin];
	
 
	
	$tituloC=$esteArreglo['titulo_es'];
	$tipoC=$esteArreglo['tipoC'];
	$valoresC=$esteArreglo['valores'];
	$requeridoC= $esteArreglo['requerido'];
	$proveedorC= $esteArreglo['proveedor'];
	
	 
	$tipoC=explode('_',$tipoC);
	$tipoC=$tipoC[1];
	if($tituloC!=""){
				?>

<div class="dragdropC" id="<?=$ordecin?>"  style="float:left; width:100%; display:table; table-layout:fixed;">

<div class="tableCell">
<div class="status<?=$activoColor?>"></div>
<div style="float:left; width:260px; <? if($requeridoC=="on"){ ?>font-weight:700;<? } ?>"><?=$tituloC?> (<?=$tipoC?>) <? if($proveedorC=="on"){ ?>Proveedor<? } ?><br>

<span style="font-weight:normal; font-size:11px;"><?=$ordecin?></span>
</div>
</div>


<div class="tableCell" style="width:30px;">
<a href="<?=$url?>/_registros/registrosCampos/camposAdd.php?u=<?=$valor?>&c=<?=$ordecin?>" title="Modificar">
 <div class="material-icons">edit</div>
</a>
</div>
<div class="tableCell" style="width:30px;">
 
 <div onclick="javascript:if (confirm('¿Desea eliminar el campo <?=$tituloC?>?')){eliminarCampo('<?=$valor?>','<?=$ordecin?>') }"  style="z-index: 99" class="material-icons borra">clear</div>
 
    </div>
    



    
    
</div>    
 <? 
	}
  } ?>  


           
 

</div>

<div id="aqui"></div>
</div>
