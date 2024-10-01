<? include "../../sesion/arriba.php"; 
$conecta=1;

include "../../sesion/mata.php"; 

if($sA!=1){
	die('<script>top.location.href = "/";</script>');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>

<script type="text/javascript" src="js.js?u=<?=aleatorio(3)?>"></script>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 

</head>
<body>


 

<!--cont-->
<div class="contC">

<? include $ruta."/interfase/menu.php"; ?>

<!--aqui-->
<div class="contenido">
<? include "../../interfase/header.php"; ?>
<div class="titulosDiv">
<div class="titulos">MENÚ  </div>

</div>
 
 <div class="clear20"></div>
<div id="sub">

<div class="blanco10">
<a href="<?=$url?>/_m3nu/menu/menuAdd" >
            <div class="material-icons">add_circle</div>  
            <div class="botonA" >Agregar  MENÚ</div>
            </a>
 	</div>


<div class="blanco10">

<div class="div100 padd">

<div class="div100" id="losElementos">
<?
$selas="SELECT * FROM menu WHERE  idMenu='0' AND icono!='' ORDER BY orden ASC";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
 	$titulo= $fila['titulo'];
	$icono= $fila['icono'];
	
	$permisoMenu= str_replace(',',', ',$fila['permisoMenu']);
	$permiso= str_replace(',',', ',$fila['permiso']);
 
?>

 
<div class="linea  hover div100 padd5" id="linea<?=$idU?>"  >
<div class="table div100">
 <div  class="tableCell padd  material-icons mueve elementoMueve" style="width:30px; cursor:pointer;">open_with</div>
<div class="material-icons padd5 tableCell30" style="color:#2E8CD9;"> <?=$icono?>  </div>
<div class="tableCell padd5"> <span style="font-weight:700; font-size:16px; color:#2E8CD9;"> <?=$titulo?></span> <br />Menú: <?=$permisoMenu?>  </div>


<div class="ctrls tableCell padd5" id="controles_linea<?=$idU?>" style="width: 100px; ">
<div style="float:left;  ">
<a href="<?=$url?>/_m3nu/menu/menuAdd?v=<?=$idU?>" >
 <div class="material-icons">mode_edit</div>
</a>
</div>



 
 </div>

<div class="material-icons tableCell30 cursor" onclick="abre('<?=$idU?>');" id="flecha<?=$idU?>">keyboard_arrow_down</div>

</div>
 
     
     <div class="clear10"></div>
     <div class="div100" style="padding-left:60px; display:none;" id="losElementos<?=$idU?>" >
<?
  $res62 = $mysqli->query("SELECT * FROM menu WHERE idMenu='$idU'  ORDER BY orden ASC");
$res62->data_seek(0);
 while ($filas = $res62->fetch_assoc()) 
	{
	$idSub= $filas['id'];
	$seccionSub= $filas['titulo'];
	$dondeSeccion= $filas['dondeSeccion'];
    $permisoMenu= str_replace(',',', ',$filas['permisoMenu']);
	$permiso= str_replace(',',', ',$filas['permiso']); 
	 
	   ?>
		
      
        <div class="linea table  padd5 hover2" id="linea<?=$idSub?>"  >
         <div  class="tableCell padd  material-icons mueve<?=$idU?> elementoMueve" style="width:30px; cursor:pointer;">open_with</div>
      <div class="tableCell padd5"> <span style="font-weight:700; font-size:14px;"> <?=$seccionSub?>(<em><?=$dondeSeccion?></em>)</span> <br />Menú: <?=$permisoMenu?><br />Acceso:<?=$permiso?> </div> 
        

         </div>
     
        
		
		
       <? }     ?>  
       
       </div>     
     
     <div onClick="reacomodoEnvia('<?=$idU?>');"  class="table cursor" style="float:right;display:none; padding:5px; background-color:#FFF; width:auto;" id="botonReacomodo<?=$idU?>">

<div class="material-icons"  title="Guardar">save</div>
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

         

       </div>
 
  
 <? } ?>
 
 </div>
 

 
</div>


</div>


     <div onClick="reacomodoEnvia();"  class="table cursor" style="float:right;display:none; padding:10px; position:fixed; width:auto; right:20px; background-color:#FFF;" id="botonReacomodo">

<div class="material-icons"  title="Guardar">save</div>
<div class="tableCell">Guardar acomodo</div>

</div>

</div>

<input type="hidden" id="orden" name="orden"  >
 


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 

</body>
</html>