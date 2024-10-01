<!--<div style="clear:both; height:10px;"></div>-->

<div class="div100 tabMenus" id="tabsMenus" style="  z-index:2; background-color:#FFF;">


 
<div onclick="elementoTipo('cuadricula','',''); return false;" class="iconoCont" title="Crear bloque" id="cuadricula">
view_array
<div class="iconoContT">Bloque</div>
</div>
 
<div class="div"></div>
   <div class="elementosPonibles" style="display:none; background-color: #FFF;  float:left;  "> 
    
    
    <? /* iconos */ ?>
 
 <div class="iconosPonibles"  >
   
   
    <div class="iconoCont ponible" title="Divider" id="divisor">
vertical_align_center
<div class="iconoContT">Divisor</div>
</div>


   
   
<div class="iconoCont ponible" title="Texto" id="texto" style="color: #0600E9">
text_format
<div class="iconoContT">Texto</div>

</div>
 
 <div class="iconoCont ponible" title="Title" id="titulo" style="color: #054BAD">
format_quote
<div class="iconoContT">Título</div>
</div>



<div class="iconoCont ponible" title="Imagen" id="img" style="color: #775900">
insert_photo
<div class="iconoContT">Imagen</div>
</div>


<div class="iconoCont ponible" title="Imagen" id="textoImagen" style="color: #A901B3">
subtitles
<div class="iconoContT">Imagen y texto</div>
</div>



<div class="iconoCont ponible" title="Galería" id="galeria" style="color: #254D00">
collections
<div class="iconoContT">Galería</div>
</div>


 <div class="iconoCont ponible" title="Carrusel" id="slider" style="color: #0526C0">
linear_scale
<div class="iconoContT">Carrusel</div>
</div>

 <div class="iconoCont ponible" title="Acordeón" id="acordeon" style="color: #910074">
expand
<div class="iconoContT">Acordeón</div>
</div>





<div class="iconoCont ponible" title="Video" id="video" style="color: red">
ondemand_video
<div class="iconoContT">Video</div>
</div>

<div class="iconoCont ponible" title="Registro" id="registro" style="color: #D85000">
assignment
<div class="iconoContT">Registro</div>
</div>


 <div class="iconoCont ponible" title="Code" id="codigo">
code
<div class="iconoContT">Código<br>HTML</div>
</div>


<? if($tipoU=="admin"){ ?>
<div class="iconoCont ponible" title="Include" id="include">
integration_instructions
<div class="iconoContT">Include</div>
</div>
<? } ?>
 
    
    <?  /*   */ ?>
 
    
 
</div>

</div>

 
</div>

<? $mandaVersion="";
if($versionVista!=""){$mandaVersion="_".$versionVista;}
?>

<input type="hidden" id="seccion" value="<?=$valor?><?=$mandaVersion?>"/>

