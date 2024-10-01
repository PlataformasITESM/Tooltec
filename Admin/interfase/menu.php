<div class="menuEspacio">

<div class="cierraMenu material-icons right padd5" >clear</div>
<div class="clear10"></div>
<div style="float:left; margin-bottom:15px; margin-left:15px; color: #FFF; ">
<img src="<?=$urlFront?>/img/logoBlanco.svg" height="55">
<div class="clear10"></div>

</div>

<div style="clear:both;"></div>

         
        <div class="menu" style="  cursor:default;">
   
  
        Hola, <?=$nombreU?>.<br />
        <span style="font-size:11px; "><?=$perfilUN?></span>
        
          </div>

<? echo file_get_contents($ruta.'/interfase/menu_'.$tipoU.'.html'); ?>


        
   <div class="divMenuT"  ></div>     
        <a href="<?=$url?>/sesion/mataSesion.php">
        <div class="menu borra"  >

            <div class="menuInterfaseIcono padd3">exit_to_app</div>
            <div class="menuInterfaseTexto padd3">Cerrar sesión</div>
            <div class="menuInterfaseIcono flecha padd3"> </div>
        </div>
        
        </a>
        
        

        
        <div class="clear20"></div>
        
 
 
</div>

<script>
$('#menu_<?=$menuPuesto?>').show();
 

</script>
