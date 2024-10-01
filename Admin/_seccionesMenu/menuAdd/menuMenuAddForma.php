<? include "../../sesion/arriba.php"; 
$dondeSeccion="menu";
include "../../sesion/mata.php"; 


if($formA!="afecta"){
	



	
//menu anterior
$arregloMenus=array();	
$res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE idMenu='' AND titulo_es!='' ORDER BY titulo_es ASC ");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$arregloMenus[$fila['id']]= $fila['titulo_es'];
}
	
	?>
<div class="div50">

 

<div class="blanco10">

<form action="menuMenuAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >
    <input type="hidden" name="idMenu" value="<?=$padre?>" >



 <div class="formaB">
	<div class="formaT requerido">Activo</div>
    <div class="formaC">
   	<input id="activo"  name="activo"  type="checkbox"  value="1" <? if($activo=="1"){ ?> checked<? } ?> />
	</div>
</div>
 <div class="formaB">
	<div class="formaT requerido">Título</div>
    <div class="formaC">
   	<input id="titulo_es"  name="titulo_es"  type="text" class="validate[required] field" value="<?=$titulo_es?>" />
	</div>
</div>


 

<div class="formaB">
	<div class="formaT requerido" >Tipo</div>
    <div class="formaC">
  <select id="tipo" name="tipo" class="validate[required] field" onChange="menuTipo(this.value); return false;" >
  <option value="" disabled selected>Seleccione un tipo</option>

  <option value="exterior">Liga </option>
  <option value="titulo">Título en menú</option>
  </select>
  
	</div>
</div>

 
 

<input id="urlSeccion"name="urlSeccion" type="hidden"  value="<?=$urlSeccion?>" />


<div class="formaB ligas">
	<div class="formaT">Liga</div>
    <div class="formaC">
   	<input id="liga_es"  name="liga_es"    type="text" class="validate[required] field"  value="<?=$liga_es?>" />
	</div>
</div>

<div class="formaB ligas">
	<div class="formaT">Liga destino</div>
    <div class="formaC">
     <select id="ligaTarget_es" name="ligaTarget_es" class="validate[required] field"   >
  
  <option value="_self">Misma ventana</option>
  <option value="_blank">Ventana nueva</option>
  </select>
   
	</div>
</div>


 

<div class="formaB dondeVa">
	<div class="formaT" >Nivel</div>
    <div class="formaC">
  <select id="dondeMenu" name="dondeMenu" class="field"  >
   <option value="">Primer Nivel</option>
   <? $res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones where tipo='titulo' and idMenu='$padre'");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idP= $fila['id'];
	$titP= $fila['titulo_es'];
	?>
    
    <option <? if ($idTitulo==$idP) { ?> selected <? } ?> value="<?=$idP?>"><?=$titP?></option>
    <?
    }
    ?>
    
   
  </select>
  
	</div>
</div>




<div class="div15"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>

<div class="clear20"></div>



</form>
</div>
</div> 
<script>


$('#tipo').val('<?=$tipoSub?>');
$('#liga').val('<?=$liga?>');
$('#ligaTarget').val('<?=$ligaTarget?>');

$('#idSeccion').val('<?=$idSeccion?>');

$('.ligas').hide();
$('.ligaInterna').hide();
$('.pagina').hide();


$(function(){
    $('#idSeccion').change(function(){
       var selected = $(this).find('option:selected');
       var urlS = selected.data('url'); 

						$('#urlSeccion').val(urlS);
    });
});



function menuTipo(tipo){
	 $('.url').show();
	 
	  $('.ligas').hide();
	 $('.dondeVa').show();
	 
	if(tipo=="titulo"){
		 $('.url').hide();
		 
		  $('.ligas').hide();
	$('.dondeVa').hide();
	 $('.pagina').hide();
	}
	
if(tipo=="exterior"){
$('.url').show();
		 $('.ligas').show();
 $('.pagina').hide();
		
	}
	
if(tipo=="interior"){
		 $('.ligaInterna').show();
	}
	
	if(tipo=="pagina"){
		 $('.pagina').show();
	}
	
}

menuTipo('<?=$tipoSub?>');

</script>

 
 <? } ?>
 
 <? 
 if($formA=="afecta"){
?>
<script>$('#aqui').hide();</script>
<?
$titulo_es=mataMalos($titulo_es);
$titulo_en=mataMalos($titulo_en);
$idMenu=mataMalos($idMenu);
$tipo=mataMalos($tipo);
$idSeccion=mataMalos($idSeccion);
$urlSeccion=mataMalos($urlSeccion);
$urlMenu=mataMalos($urlMenu);

$liga_es=mataMalos($liga_es);
$ligaTarget_es=mataMalos($ligaTarget_es);
$liga_en=mataMalos($liga_en);
$ligaTarget_en=mataMalos($ligaTarget_en);

$dondeMenu=mataMalos($dondeMenu);
$lado=mataMalos($lado);

if($activo==""){$activo=0;}

if($cambia!=""){
$query="UPDATE seccionesMenuSecciones SET idMenu='$idMenu', titulo_es='$titulo_es',titulo_en='$titulo_en',  idSeccion='$idSeccion', urlSeccion='$urlSeccion', url='$urlMenu', liga_es='$liga_es', ligaTarget_es='$ligaTarget_es', liga_en='$liga_en', ligaTarget_en='$ligaTarget_en', tipo='$tipo', idTitulo='$dondeMenu', color='$lado', activo='$activo'  WHERE id='$cambia'";
$mysqli->query($query);

 }


if($cambia==""){
$cambia=aleatorio(10);
$query="INSERT INTO seccionesMenuSecciones (id, idMenu, titulo_es, titulo_en, orden, idSeccion,  urlSeccion, url, liga_es, ligaTarget_es, liga_en, ligaTarget_en, activo, tipo, idTitulo, color) VALUES ('$cambia','$idMenu', '$titulo_es', '$titulo_en','100', '$idSeccion', '$urlSeccion',  '$urlMenu', '$liga_es', '$ligaTarget_es', '$liga_en', '$ligaTarget_en', '$activo', '$tipo', '$dondeMenu', '$colo' )";
 $mysqli->query($query);	
}

include "creaMenu.php";
?>

<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_seccionesMenu/menu/menuAdd?v=<?=$idMenu?>";
</script>	
<?
 } ?>