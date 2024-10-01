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
	
	$parametros= arregloSaca($fila['parametros']);
	$img= $parametros['img'] ;
	$anchoM=$parametros['ancho'];
	$filaSlider=$parametros['filaSlider'];
	$flota=$parametros['flota'];
	$altoM=$parametros['alto'];
	$altoSlider=$parametros['altoSlider'];
	$ajusteImg=$parametros['ajusteImg'];
	$ajustaBloque=$parametros['ajustaBloque'];
	$controles=$parametros['controles'];
	$tiempo=$parametros['tiempo'];
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
    <form action="slider.php" method="post" enctype="multipart/form-data" id="forma">
 
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
   <div class="sliderDropas linea" id="<?=$value?>" style="width: 20%">
   <div onClick="mataSlider('<?=$value?>'); return false;" class="tableCell padd  material-icons borra" style="width:30px; cursor:pointer; float:right;   ">clear</div>
   <div   class="tableCell padd5  material-icons dragin" style="width:30px; cursor:pointer;">drag_indicator</div>
   
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
  
 
  </div>



   
   
   
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
    <select name="ancho" id="ancho" style="width: 150px;">
    
	</select>
	</div>
</div>
 
 
 
 <div class="formaB">
   <div class="formaT">Alto</div>
  <div class="formaC">
  <div class="left">  <input id="alto"  name="alto"  type="text" class="validate[custom[integer],min[10],max[1000]] field" style="width:60px;" value="<?=$altoM?>"/> </div>
  <div class="left">
  <select id="altoSlider" name="altoSlider" style="width: 200px">
  <option value="por">% del ancho del  carrusel</option>
   <option value="px">px</option>
    <option value="vh">% del ancho de la columna</option>
  </select>
  </div>
  </div>
</div>
  <div class="formaB">
	<div class="formaT">Ajuste</div>
    <div class="formaC">
    <select name="ajusteImg" id="ajusteImg" style="width: 150px;">
	<option value="cover">Ajustar al 100%</option>
	<option value="contain">Sin ajuste</option>
	</select>
	</div>
</div>
   
  <div class="formaB">
	<div class="formaT">Mostrar controles</div>
    <div class="formaC">
    <input type="checkbox" <?=$controles?> name="controles" /> 
	</div>
</div>


  <div class="formaB">
	<div class="formaT">Tiempo entre diapositivas</div>
    <div class="formaC">
    <select name="tiempo" id="tiempo" style="width: 150px;">
	<option value="1">1s</option>
	<option value="2">2s</option>
	<option value="3">3s</option>
	<option value="4">4s</option>
	<option value="5">5s</option>
	<option value="6">6s</option>
	<option value="7">7s</option>
	<option value="8">8s</option>
	<option value="9">9s</option>
	<option value="10">10s</option>
	</select>
	</div>
</div>



</form>
</div>

 
<script>


 $.getScript('elementos.js', function() {
  anchos();
 <? if( $anchoM!="" ) { ?>
$('#ancho').val('<?=$anchoM?>');
$('#flota').val('<?=$flota?>');
$('#altoSlider').val('<?=$altoSlider?>');
$('#filaSlider').val('<?=$filaSlider?>');
$('#tiempo').val('<?=$tiempo?>');
$('#ajusteImg').val('<?=$ajusteImg?>');

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
	$tipoContenido="slider";
 
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
	$parametros['altoSlider']=$altoSlider;
	$parametros['flota']=$flota;
	$parametros['alto']=mataMalos($alto);
	$parametros['ajustaBloque']=$ajustaBloque;
	$parametros['controles']=$controles;
	$parametros['tiempo']=$tiempo;
	$parametros['img']=mataMalos($imgContenido);
	$parametros['ancho']=($ancho);
	$parametros['ajusteImg']=($ajusteImg);
	$parametros['margen']=$margen;
	$parametros['padding']=$padding;
	$parametros['animacion']=$animacion;
	$parametros['liga']=mataMalos($liga);
	$parametros['filaSlider']=mataMalos($filaSlider);
	$parametros['ligaTarget']=mataMalos($ligaTarget);
	$parametros['imgsUrls']=$imgsUrls;
	$parametros=arregloMete($parametros);
	
	
	if($cambia!=""){
	
	$query1="UPDATE contenido SET parametros='$parametros'   WHERE id='$cambia'";
	$mysqli->query($query1);		
	}
	
	
	if($cambia==""){
	$cambia=aleatorio(6);	
$query1="INSERT INTO contenido (id,idSeccion,idGrid,posicion,tipo,parametros,orden) VALUES ('$cambia','$seccion','$padre','$posicion','$tipoContenido','$parametros','100')";
	$mysqli->query($query1);
	}



?>
<script>
top.location.reload();
</script>
<?
}

    

