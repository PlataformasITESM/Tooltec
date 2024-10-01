<div class="clear20"></div>
<div class="blanco10T" >

<div class="blanco10TI">

<? if($tipoU=="admin"){ ?>


<a href="<?=$url?>/_registros/registros/" >      
         <div class="seccionMenuI seccionMenu" id=""   >
           <div class="material-icons ">navigate_before</div>
</div>  
</a>

<a href="<?=$url?>/_registros/registros/registrosAdd?u=<?=$valor?>" >      
         <div class="seccionMenuI seccionMenu" id="c_info"   >
           <div class="material-icons ">info</div>
       	<div class=" seccionMenuC   "  >Información</div>
</div>  
</a>

 
<? } ?>

<? if ($valor!=""){ ?>


<? if($valor!='bdb64590b0'){ ?>
<a href="<?=$url?>/_registros/registrosCampos/?u=<?=$valor?>" title="Campos">    
         <div class="seccionMenuI seccionMenu" id="c_campos"   >
           <div class="material-icons ">input</div>
       	<div class=" seccionMenuC   "  >Campos</div>
</div>  
</a>


<? } /*

<a href="<?=$url?>/_registros/registrosPermisos/index.php?u=<?=$valor?>" title="Permisos">
<div class="seccionMenuI" >
       	<div class="seccionMenuC"><div class="material-icons">lock_outline</div></div>
       	<div class="seccionMenuC">Permisos </div>
</div>  
</a>



*/ ?>


<? if($tipoU=="admin"){ ?>

<? /*
<a href="<?=$url?>/_registros/registrosRefers/index.php?u=<?=$valor?>" title="Acciones del refer">
<div class="seccionMenuI" >
       	<div class="seccionMenuC"><div class="material-icons">alarm_on</div></div>
       	<div class="seccionMenuC">Acciones del refer </div>
</div>  
</a>


*/ ?>
<a href="<?=$url?>/_registros/registrosRegistros/?u=<?=$valor?>" title="Registros">
         <div class="seccionMenuI seccionMenu" id="c_todos"   >
           <div class="material-icons ">grid_on</div>
       	<div class=" seccionMenuC   "  >Registros</div>
</div>  
</a>
<? if($tipoU=="admin"){ ?>
<? /*

<a title="Copiar registro" onclick="javascript:if (confirm('¿Desea copiar el registro<?=$titulo?>?')){copiarCampo('<?=$valor?>');return false;}">
<div id="menuCopiar" class="menuModulo" >
<div class="seccionMenuC padd5"><img src="<?=$url?>/img/copy.png" /></div>
<div class="seccionMenuC padd5">Copiar</div>
</div>
</a>
*/ ?>

<?  /**if ($valor!=""){ ?>
 
  <a href="#" onclick="javascript:if (confirm('¿Desea DEFINITIVAMENTE el registro y TODA SU INFORMACIÓN?')){eliminarRegistro('<?=$valor?>');return false;}">
<div style="float:right; color:#800002; font-size:11px; cursor:pointer;">
⛌ Eliminar Registro
</div>
</a>

<? } */?>


<? } 

}?>

<? } ?>

</div>
</div>
 