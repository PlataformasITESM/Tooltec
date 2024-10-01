<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="contenido";
include "../../sesion/mata.php"; 

$elemento=limpiaGet($elemento);
$seccion=limpiaGet($seccion);

if($formA!="afecta"){

$mi='checked="checked"';
$md=' "';

$padre=mataMalos($padre);	
$padreA=explode('_',$padre);
$padre=$padreA[1];
$posicion=$padreA[2];

include "../../_files/filesSelect/archivosDisponibles.php";
 $res6 = $mysqli->query("SELECT * FROM contenido WHERE id='$elemento'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$modificado= unserialize($fila['modificado']);
	$parametros= arregloSaca($fila['parametros']);
	$img= $parametros['img'] ;
	$anchoM=$parametros['ancho'];
	$filaSlider=$parametros['filaSlider'];
	$flota=$parametros['flota'];
	$altoM=$parametros['alto'];
	$ajustaBloque=$parametros['ajustaBloque'];
	$controles=$parametros['controles'];
	$imgsUrls= $parametros['imgsUrls'];
	$imgArreglo=explode(',',$img);
	}

if($margenM=="0 0 0 0"){$md=""; $mi="";}
if($margenM=="0 1.5% 15px 0"){$mi='checked="checked"'; $md='checked="checked"';}
if($margenM=="0 1.5% 0 0"){$mi=' '; $md='checked="checked"';}
if($margenM=="0 0 15px 0"){$mi='checked="checked"'; $md='';}	
if($altoM==""){$altoM="100";}
if($ajustaBloque=="on"){$ajust='checked';}
if($controles=="on"){$controles='checked';}

	?>
 
<div class="div100 divElemento blanco10">  
    <form action="galeria.php" method="post" enctype="multipart/form-data" id="forma">
 
 <input type="hidden" name="formA" value="afecta" >
 <input type="hidden" id="cambia" name="cambia" value="<?=$elemento?>" >
 <input type="hidden" name="seccion" value="<?=$seccion?>" >
 <input type="hidden" name="padre" value="<?=$padre?>" >
 <input type="hidden" name="posicion" value="<?=$posicion?>" >
 
    <div id="yo"></div>
    

<div id="aquiFotos" style="float:left;">
<? 
if ($imgArreglo!="") {
foreach ($imgArreglo as $key => $value){
   $elArchivo=$arregloArchivos[$value.'imagen']; 
   
 
   $esteA=$imgsUrls[$value];
   
	$esteColor=$esteA['color'];
	$esteTit=$esteA['tit'];
	$esteSub=$esteA['sub'];
	$estaLiga=$esteA['url'];
	$ligaTarget=$esteA['ligaTarget'];
	$ladoSlide=$esteA['ladoSlide'];
 
	
   ?>
   <div class="sliderDropas" id="<?=$value?>" style="width: 25%">
   
   <div   class="tableCell padd5  material-icons dragin" style="width:30px; cursor:pointer;">open_with</div>
   
  <div class="tableCell padd5" style="text-align:center; width:150px;">  <?=$elArchivo?>  </div>
  
  <div class="tableCell padd5">
  <input type="text" name="tit<?=$value?>" id="tit<?=$value?>" value="<?=$esteTit?>" class="validate[ ] field" placeholder="Título">
  
    <input type="text" name="sub<?=$value?>" id="sub<?=$value?>" value="<?=$esteSub?>" class="validate[ ] field" placeholder="Subtítulo">

  <input type="text" name="url<?=$value?>" id="url<?=$value?>" value="<?=$estaLiga?>" class="validate[custom[url]] field" placeholder="url">
  <input type="color" name="color<?=$value?>" id="url<?=$value?>" value="<?=$esteColor?>" class="" placeholder="Color texto">
  
   <div class="clear5"></div> 
   <select name="ligaTarget<?=$value?>" id="ligaTarget<?=$value?>">
  <option value="_blank"  >Nueva ventana</option>
  <option value="_self" <? if ($ligaTarget=="_self"){?> selected <? } ?> >Misma ventana</option>
  </select>
  
    <div class="clear5"></div> 
   <select name="ladoSlide<?=$value?>" id="ladoSlide<?=$value?>">
  <option value="izq"  <? if ($ladoSlide=="izq"){?> selected <? } ?>>Izquierda</option>
  <option value="der"  <? if ($ladoSlide=="der"){?> selected <? } ?>>Derecha</option>
  <option value="centro"  <? if ($ladoSlide=="centro"){?> selected <? } ?>>Centro</option>
  
  </select>
  </div>


<div onClick="mataSlider('<?=$value?>'); return false;" class="tableCell padd  material-icons borra" style="width:30px; cursor:pointer; float:right;   ">clear</div>
   
   
   
     </div>
     
 
    <?
	
} }?>
 
</div>

<div style="clear:both; height:15px;"></div>
<? /* archivos */ ?>

<div class="formaB">
 <div class="formaT">Imagenes</div>
<div class="formaC">

 

<div onClick="abreArchivos('imgContenido','todos','img','<?=$seccion?>'); return false;" style="cursor:pointer">
  
         <div class="seccionMenuI" >
       	<div class="seccionMenuC material-icons">attach_file</div>
       	<div class="seccionMenuC">Seleccionar archivo</div>
        <input id="imgContenido"  name="imgContenido"  type="text" class="validate[required]" value="<?=$img?>" style="width:0; opacity:0;" />
</div>  

</div>
<div class="clear10"></div>
 <input id="imgContenidoOriginal"  name="imgContenidoOriginal"  type="hidden"   value="<?=$img?>"  />
<input id="imgContenido_tmp"  name="imgContenido_tmp"     type="hidden" value=" "  />
<div id="imgContenido_Div"></div>



</div>
</div>


 
<? /* archivos */ ?>


 
  <div class="formaB">
	<div class="formaT">Ancho</div>
    <div class="formaC">
    <select name="ancho" id="ancho">
    <option value="100"  >100%</option>
    <option value="75"  >75%</option>
    <option value="66.66"  >66%</option>
    <option value="50"  >50%</option>
    <option value="33.33"  >33%</option>
    <option value="25"  >25%</option>
    <option value="20"  >20%</option>
    <option value="15"  >15%</option>
    <option value="10"  >10%</option>
	</select>
	</div>
</div>
 
   <div class="formaB">
	<div class="formaT">Imágenes por fila</div>
    <div class="formaC">
    <select name="filaSlider" id="filaSlider">
    <option value="100"  >1</option>
    <option value="50"  >2</option>
    <option value="33"  >3</option>
    <option value="25"  >4</option>
	<option value="20"  >5</option>

	</select>
	</div>
</div>
 
 <div class="formaB">
   <div class="formaT">Alto</div>
  <div class="formaC">
  <input id="alto"  name="alto"  type="text" class="validate[custom[integer],min[10],max[1000]] field" style="width:120px;" value="<?=$altoM?>"/> %</div>
</div>

    <? if($modificado!=""){ ?>
 <span style="font-size: 10px; color: #666;">
 Última modificación <?=$modificado['nombre']?> <?=$modificado['perfil']?> <?=fechaLetraHora($modificado['hoy'])?>
 </span>
 <? } ?>
 

</form>
</div>

 
<script>


 $.getScript('elementos.js', function() {
  anchos();
 <? if( $anchoM!="" ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#flota').val('<?=$flota?>');
$('#filaSlider').val('<?=$filaSlider?>');

<? } ?>
 });


 $(document).ready(function(){
	
	$(function() {
         $( "#aquiFotos" ).sortable({
		 cursor: 'move',
		  handle: '.dragin',
	     update : function(event, ui){
          var orden=$('#aquiFotos').sortable('toArray').toString();
		  $('#imgContenidoOriginal, #imgContenido').val(orden);
		 
		 $('#imgContenido_Div').html('');
        }
		
		
		});
        $( "#aquiFotos" ).disableSelection();
        });
	
	
});

function mataSlider(diapositiva){
	
	$('#'+diapositiva).remove();
 
		 var arreglo = [];
		    $.each($(".sliderDropas"), function(){   
                arreglo.push(this.id);
            });
          $('#imgContenidoOriginal, #imgContenido').val( arreglo.join(","));
}



 
</script>

<? } 

if ($formA=="afecta")
{
	$cambia=limpiaGet($cambia);
	$seccion=mataMalos($seccion);
	$tipoContenido="galeria";
 
	if($imgContenidoOriginal!="" && $imgContenidoOriginal!=$imgContenido){
		$imgContenidoOriginal=explode(',',$imgContenidoOriginal);	
	
	
	if($imgContenido!=""){
		$imgContenido=explode(',',$imgContenido);	
	}
	$imgContenido = array_merge($imgContenidoOriginal, $imgContenido);
	
	
	
	$imgContenido=implode(',',$imgContenido);
	

	}
	
	
$imgsUrls=array();
		foreach (explode(',',$imgContenido) as $imagonito){
			${$imagonito.'Array'}=	array();
			$este=${$imagonito.'Array'};
			$este['tit']=${'tit'.$imagonito};
			$este['sub']=${'sub'.$imagonito};
			$este['url']=${'url'.$imagonito};
			$este['color']=${'color'.$imagonito};
			$este['ligaTarget']=${'ligaTarget'.$imagonito};
			$este['ladoSlide']=${'ladoSlide'.$imagonito};
			$imgsUrls[$imagonito]=$este;
		}
	$imgsUrls=$imgsUrls;

	$parametros=array();
	$parametros['ancho']=$ancho;
	$parametros['flota']=$flota;
	$parametros['alto']=mataMalos($alto);
	$parametros['ajustaBloque']=$ajustaBloque;
	$parametros['controles']=$controles;
	$parametros['img']=mataMalos($imgContenido);
	$parametros['ancho']=($ancho);
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros['liga']=mataMalos($liga);
	$parametros['filaSlider']=mataMalos($filaSlider);
	$parametros['ligaTarget']=mataMalos($ligaTarget);
	$parametros['imgsUrls']=$imgsUrls;
	$parametros=arregloMete($parametros);
	
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros', modificado='$creado' WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
	$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden, modificado) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100','$creado')";
	$mysqli->query($query1);
	}



?>
<script>
top.location.reload();
</script>
<?
}

    

