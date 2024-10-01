<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 

$cuantos=limpiaGET($cuantos);
$tipoArchivoSeleccion=limpiaGET($tipoArchivoSeleccion);
$contenedor=limpiaGET($contenedor);
$tipoContenido=limpiaGET($tipoContenido);
$tipoContentSeccion=limpiaGET($tipoContentSeccion);

?>


<div class="alertBox" style="width:100%; padding:30px; ">
<div class="alertBoxR" style="display:block;">

<div class="close" onClick="closeAlertFiles(); return false;">X</div>

<div class="alertBoxC" style="display:block; width:100%; height: 100%; overflow: hidden;">

<div class="titulos" style="font-size:18px;">Archivos</div>
<div class="div"></div>


<div class="div100" style="float:left; width:100%; height: 100%; ">

    <div style=" width:20%; min-width:150px; position: absolute; top: 0; left: 0;  z-index: 9;   height: 100%;" id="folderes">
    <? include "folderTodos.php"; ?>
    </div>
    
    
    <div class="div100" style="  padding-left:22%;     " id="carpeta" > 
    
      &nbsp;
  
    
    
    </div>
    
</div>


</div></div></div>
 

