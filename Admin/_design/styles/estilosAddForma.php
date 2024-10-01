<? include "../../sesion/arriba.php";
$dondeSeccion="sitio";
include "../../sesion/mata.php";

if($formA!="afecta"){
$tFontFamily="Fuente";
$tFontSize="Tamaño";
$tColor="Color";
$tDecora="Decoración";
$tTransforma="Transformación";
$tShadow="Sombra";
$tFontWeight="Peso";
$tStyle="Estilo";

$tlineHeight="Interlineado";

$tAlinea="Alineación";
$tAlineaL="Izquierda";
$tAlineaR="Derecha";
$tAlineaC="Centrado";
$tAlineaJ="Justificado";


$tLetterSpacing="Espaciado entre letras";

// fondos
$tBackgroundColor="Color de fondo";
$tBackgroundImage="Imagen de fondo";


if($idiomaU=="en"){
$tFontFamily="Family";
$tFontSize="Size";
 $tColor="Color";
}


$res6 = $mysqli->query("SELECT * FROM sitio ");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$fuentes=unserialize($fila['fuentes']);

	}
	
	

$res6 = $mysqli->query("SELECT * FROM estilos WHERE id='$valor'");
	$res6->data_seek(0);
	while ($fila = $res6->fetch_assoc()) 
	{
	$nombre=$fila['nombre'];
	$info=unserialize($fila['info']);

	}
	

	if($ancho<1000){$ancho=1000;}


if($fontSize==""){$fontSize=12;}
if($lineHeight==""){$lineHeight=100;}
if($color==""){$color="rgba (0,0,0,1)";}

if($shadowV==""){$shadowV=0; $shadowH=0; $shadowB=0;}
if($colorS==""){$colorS="rgba (0,0,0,1)";}

?>


<div class="blanco10">
<div class="table">
<div class="tableCell" style="width: 150px; vertical-align: top;">
<div class="div100 padd3"  onClick="menuProp('texto');"> Texto</div>
<div class="clear div0 "></div>

<div class="div100 padd3" onClick="menuProp('fondo');">Fondo</div>
<div class="clear div0 "></div>
<div class="div100 padd3"  onClick="menuProp('medidas');">Medidas</div>
<div class="clear div0 "></div>
<div class="div100 padd3"  onClick="menuProp('liga');">Liga</div>
<div class="clear div0 "></div>
<div class="div100 padd3"  onClick="menuProp('over');">Mouse Over</div>
<div class="clear div0 "></div>

</div>

<div class="tableCell padd10">
<div class="div100" style="background-image: url(<?=$url?>/img/transparente.png);">
<div class="div100 <?=$nombre?>"  >
<textarea class="div100" id="estilon" style="background-color: transparent; border: none; overflow-y: auto; height: 150px; font-family: ">
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
</textarea>
</div>
</div>
<div class="clear20"></div>

<form action="anchoAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
  <input type="hidden" name="d" value="<?=$d?>" >

 
<div class="div100 props" id="texto">
<? include "propTexto.php";?>
</div>

<div class="div100 props displayNone" id="fondo">
<? include "propFondo.php";?>
</div>


<script>
$( ".estils" ).change(function() {
 var vals=$(this).val();
 var props=$(this).data('prop');
 $('.'+props).val(vals);

  $('#estilon').css(props,vals);
 
 if(props=="font-size"){ $('#estilon').css(props,vals+'px'); }
 else if(props=="letter-spacing"){ $('#estilon').css(props,vals+'px'); }
 else if(props=="line-height"){ $('#estilon').css(props,vals+'%'); }


 
 
});

$( ".text-shadow" ).change(function() {
var h=$('#shadowH').val();
var v=$('#shadowV').val();
var b=$('#shadowB').val();
var c=$('#shadowC').val();
$('#estilon').css('textShadow', h+'px '+v+'px '+b+'px '+c );

})

function muestraOpciones(cual,este){
$('#'+cual+'Div').hide();
$('.'+cual).val('');
if(este!=""){
$('#'+cual+'Div').fadeIn();
}

  $('#estilon').css(cual,'');
  
}

$('#color').spectrum({ showAlpha: true, preferredFormat: "rgb"});
$('#background-color').spectrum({ showAlpha: true, preferredFormat: "rgb"});
$('#shadowC').spectrum({ showAlpha: true, preferredFormat: "rgb"});


function menuProp(cual){
$('.props').hide();
$('#'+cual).fadeIn();
}

</script>




<div class="clear20"></div>
 
<div class="div"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="<?=$guardar?>" />
</div>

</form>
</div>





 </div>
</div>

 <script>
 
  </script>



 <? } ?>
 
 <? 
 if($formA=="afecta"){
 
	$query="INSERT INTO sitio (id) VALUES ('1')";
	$mysqli->query($query);

	$query="UPDATE sitio SET ancho='$ancho' WHERE id='1'";
	$mysqli->query($query);
	

?>

<script>  
guarda();
top.location.reload();
</script>	

<?
 } ?>