<div class="clear20"></div>
<div class="blanco10">

  
<div class="nueva" style="float:left; cursor:pointer;" id="nueva">
<a href="seccionesAdd" title="Editar">
             <div class="material-icons">add_circle</div>  
            <div class="botonA" >AGREGAR PÁGINA</div>
            </a>
 	</div>


</div>


<div class="blanco10">



<div class="div50 padd">
 <div class="titulos">MENÚ</div>
<div class="div100" id="losElementos">
<?

$res6 = $mysqli->query("SELECT * FROM secciones WHERE menu='1' AND idMenu='' ORDER BY orden ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$seccion= $fila['titulo'];
	$tipo= $fila['tipo'];
 
?>

 
<div class="linea  hover div100" id="linea<?=$idU?>"  >
<div class="table div100">
 <div  class="tableCell padd  material-icons mueve elementoMueve" style="width:30px; cursor:pointer;">open_with</div>
<div class="tableCell padd5"> <?=$seccion?><br><em><?=$tipo?></em> </div>


<div class="ctrls tableCell padd5" id="controles_linea<?=$idU?>" style="width: 100px; ">
<div style="float:left;  ">
<a href="seccionesAdd?v=<?=$idU?>" title="Editar">
 <div class="material-icons">mode_edit</div>
</a>
</div>

<? if ($tipo=="pagina"){ ?>

<div style="float:left;  ">
<a href="<?=$url?>/_contenido/contenido/?v=<?=$idU?>" title="Contenido">
 <div class="material-icons">add_circle_outline</div>
</a>
</div>
<? } ?>

<div style="float:left;  ">
  <a class="borra"  onclick="javascript:if (confirm('Desea eliminar la sección <?=$seccion?>?')){eliminarSeccion('<?=$idU?>');return false;}">
 <div class="material-icons borra">clear</div>
</a>
</div>
	
 </div>
   </div>
     <? if($tipo=="titulo"){ ?>
     
     <div class="clear10"></div>
     <div class="div100" style="padding-left:20px;" id="losElementos<?=$idU?>">
<?
  $res62 = $mysqli->query("SELECT * FROM secciones WHERE idMenu='$idU'  ORDER BY orden ASC");
$res62->data_seek(0);
 while ($filas = $res62->fetch_assoc()) 
	{
	$idSub= $filas['id'];
	$seccionSub= $filas['titulo'];
	$tipoSub= $filas['tipo'];
        ?>
		
      
        
        
        <div class="linea table hover2 padd5" id="linea<?=$idSub?>"  >
         <div  class="tableCell padd  material-icons mueve<?=$idU?> elementoMueve" style="width:30px; cursor:pointer;">open_with</div>
        <div class="tableCell padd5"> <?=$seccionSub?><br><em><?=$tipoSub?></em> </div>
        
        
        <div class="ctrls tableCell padd5" id="controles_linea<?=$idSub?>" style="width: 100px; ">
        <div style="float:left;  ">
        <a href="seccionesAdd?v=<?=$idSub?>" title="Editar">
         <div class="material-icons">mode_edit</div>
        </a>
        </div>
        
        <? if ($tipoSub=="pagina"){ ?>
        
        <div style="float:left;  ">
        <a href="<?=$url?>/_contenido/contenido/?v=<?=$idSub?>" title="Contenido">
         <div class="material-icons">add_circle_outline</div>
        </a>
        </div>
        <? } ?>
        
        <div style="float:left;  ">
          <a class="borra"  onclick="javascript:if (confirm('Desea eliminar la sección <?=$seccionSub?>?')){eliminarSeccion('<?=$idSub?>');return false;}">
         <div class="material-icons borra">clear</div>
        </a>
        </div>
            
         </div>
        </div>
        
		
		
       <? }     ?>  
       
       </div>     
     
     <div  class="table" style="float:right;display:none; width:auto;" id="botonReacomodo<?=$idU?>">

<div class="material-icons" style="cursor:pointer" onClick="reacomodoEnvia('<?=$idU?>');" title="Guardar">save</div>
<div class="tableCell">Guardar acomodo</div>

</div>
 
       
       <? // fin del hijo ?>
       
       
       <input type="hidden" id="orden<?=$idU?>" name="orden<?=$idU?>"  >
<script>
  $( "#losElementos<?=$idU?>" ).sortable({
     	  handle: '.mueve<?=$idU?>',
		 cursor: 'move',
		   placeholder: 'placeholder',
	     update : function(event, ui){
         var orden=$('#losElementos<?=$idU?>').sortable('toArray').toString();
		  $('#orden<?=$idU?>').val(orden);
		   $("#botonReacomodo<?=$idU?>").fadeIn();
        }
		});

</script>

         <? } ?>  

       </div>
 
       
 <? } ?>
 
 </div>
 
     <div  class="table" style="float:right;display:none; width:auto;" id="botonReacomodo">

<div class="material-icons" style="cursor:pointer" onClick="reacomodoEnvia();" title="Guardar">save</div>
<div class="tableCell">Guardar acomodo</div>

</div>
 
</div>


<div class="div50 padd">
 <div class="titulos">LIBRES</div>
 
 <table id="tablesorter"  class="tablesorter" style="width:100%;  " >

<thead>
<tr>

 

 

</tr>
</thead>


<?

$res6 = $mysqli->query("SELECT * FROM secciones WHERE menu='2'  ORDER BY titulo ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$seccion= $fila['titulo'];
	$seccionC= $fila['tituloC'];
 
?>

<tr class="linea" id="linea<?=$idU?>"  >
 
<td><a href="seccionesContenido.php?v=<?=$idU?>" title="Editar" ><?=$seccion?></a></td>


<td class="ctrls" id="controles_linea<?=$idU?>" style="width: 100px;" >
 
<div style="float:left;  ">
<a href="seccionesAdd?v=<?=$idU?>" title="Editar">
 <div class="material-icons">mode_edit</div>
</a>
</div>

<div style="float:left;  ">
<a href="<?=$url?>/_contenido/?v=<?=$idU?>" title="Contenido">
 <div class="material-icons">add_circle_outline</div>
</a>
</div>


<div style="float:left;  ">
<a href="<?=$dominioUrl?>/<?=$seccionC?>" target="_blank";  >
 <div class="material-icons">language</div>
</a>
</div>

<div style="float:left;  ">
  <a class="borra"  onclick="javascript:if (confirm('Desea eliminar la sección <?=$seccion?>?')){eliminarSeccion('<?=$idU?>');return false;}">
 <div class="material-icons borra">clear</div>
</a>
</div>
	
 </div>
 
 </td>
</tr>  
 
  



         
 <? } ?>
	</table>
 
</div>
 
 
 <div class="div50 padd">
 <div class="titulos">Secciones fijas</div>
<table id="tablesorter2"  class="tablesorter" style="width:100%;  " >

 <thead>
<tr>

 

 

</tr>
</thead>


<?

$res6 = $mysqli->query("SELECT * FROM secciones WHERE menu='0'  ORDER BY orden ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$seccion= $fila['titulo'];
 
		
		
				?>


<tr class="linea" id="linea<?=$idU?>"  >
 
<td><a href="seccionesContenido.php?v=<?=$idU?>" title="Editar"><?=$seccion?></a></td>


<td class="ctrls" id="controles_linea<?=$idU?>" >


<div style="float:left;  ">
<a href="seccionesAdd?v=<?=$idU?>" title="Editar">
 <div class="material-icons">mode_edit</div>
</a>
</div>

<div style="float:left;  ">
<a href="<?=$url?>/_contenido/contenido/?v=<?=$idU?>" title="Contenido">
 <div class="material-icons">add_circle_outline</div>
</a>
</div>
	
 
 </td>
</tr>              
 <? } ?>
 




</table>
</div>


</div>
<input type="hidden" id="orden" name="orden"  >
<script>

	
 
         $( "#losElementos" ).sortable({
			 
     	  handle: '.mueve',
		 cursor: 'move',
		   placeholder: 'placeholder',
	     update : function(event, ui){
         var orden=$('#losElementos').sortable('toArray').toString();
		  $('#orden').val(orden);
		   $("#botonReacomodo").fadeIn();
		 
		  
        }
		
		
		});
		
 	


</script>

