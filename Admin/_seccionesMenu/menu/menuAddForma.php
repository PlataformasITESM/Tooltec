<? include "../../sesion/arriba.php"; 
$dondeSeccion="seccionesMenu";
include "../../sesion/mata.php"; 


if($formA!="afecta"){
 $res6 = $mysqli->query("SELECT * FROM seccionesMenu WHERE id='$valor' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloEs= $fila['titulo_es'];	
	}
	

$arregloTitulos=array();
	?> 
	
 
    <a href="<?=$url?>/_seccionesMenu/menuAdd?p=<?=$valor?>" >
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar entrada</div>
</div>  
</a>
	
<div class="blanco10">
<div class="div100">


 





 <input type="hidden" id="orden" name="orden"  >




<div class="div100" id="losElementos">
<?

$res6 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE  idMenu='$valor' AND idTitulo='' ORDER BY orden ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$seccion= $fila['titulo_es'];
	$color= $fila['color'];
	$tipo= $fila['tipo'];
	$activo= $fila['activo'];
	
	$liga_es= $fila['liga_es'];
	$liga_en= $fila['liga_en'];
 
 $activo=$activo+.5;
 if($tipo=="exterior"){$tipoT="Liga";}
?>

<? if($tipo!="titulo"){ ?>
<div class="linea conectados  hover div100" style="opacity: <?=$activo?>" id="linea<?=$idU?>"  >
 <div  class="ctrls padd draginG material-icons  " style="width:30px;    cursor:pointer; position: absolute; left: 0; z-index: 9;">open_with</div>
<div class="div100" style="padding: 5px 5px 5px 40px"> <?=$seccion?><br><em><?=$tipoT?></em>  (<?=$color?>)
<div class="clear"></div>
<?=$liga_es?>
<div class="clear"></div>
<?=$liga_en?>

</div>

<div class="ctrls" style="position: absolute; right: 0; z-index: 99; width: auto;">
<a href="<?=$url?>/_seccionesMenu/menuAdd?p=<?=$valor?>&e=<?=$idU?>" >
<div class="left padd5">Editar</div>
</a>
 
</div>

</div>

     <div class="clear10"></div>
<? } ?>
 

 <? if($tipo=="titulo"){ 
 
 $arregloTitulos[]="#losElementos".$idU;
 ?>
<div class="linea conectados  conectadosTitulos hover div100" style="opacity: <?=$activo?>" id="linea<?=$idU?>"  >
 <div  class="ctrls padd draginG material-icons  " style="width:30px; color: <?=$color?>; cursor:pointer; position: absolute; left: 0; z-index: 9;">open_with</div>
 
 <div class="div100" style="padding: 5px 5px 5px 40px"> <?=$seccion?><br><em>Título</em>
 

 </div>
 
 <div class="ctrls" style="position: absolute; right: 0; z-index: 99; width: auto;">
<a href="<?=$url?>/_seccionesMenu/menuAdd?p=<?=$valor?>&e=<?=$idU?>" >
<div class="left padd5">Editar</div>
</a>
</div>
 
 
 <div class="div100" style="padding-left: 40px;">
     <div class="div100 conectados" style="  min-height: 50px; border:1px dotted #CCC;" id="losElementos<?=$idU?>">
<?
  $res62 = $mysqli->query("SELECT * FROM seccionesMenuSecciones WHERE idTitulo='$idU'  ORDER BY orden ASC");
$res62->data_seek(0);
 while ($filas = $res62->fetch_assoc()) 
	{
	$idSub= $filas['id'];
	$seccionSub= $filas['titulo_es'];
	$tipoSub= $filas['tipo'];
	$activo= $filas['activo'];
	$liga_es= $filas['liga_es'];
	$liga_en= $filas['liga_en'];
      $activo=$activo+.5;  
	    if($tipoSub=="exterior"){$tipoT="Liga";}
	   ?>
		
    <div class="linea conectados  hover div100"  style="opacity: <?=$activo?>" id="linea<?=$idSub?>"  >
 <div  class="ctrls padd draginG material-icons  " style="width:30px; cursor:pointer; position: absolute; left: 0; z-index: 9;">open_with</div>
<div class="div100" style="padding: 5px 5px 5px 40px"> <?=$seccionSub?><br><em><?=$tipoT?></em> 

<div class="clear"></div>
<?=$liga_es?>
<div class="clear"></div>
<?=$liga_en?>
</div>

<div class="ctrls" style="position: absolute; right: 0; z-index: 99; width: auto;">
<a href="<?=$url?>/_seccionesMenu/menuAdd?p=<?=$valor?>&e=<?=$idSub?>" >
<div class="left padd5">Editar</div>
</a>
<? if ($tipoSub=="pagina"){ ?>
<a href="<?=$url?>/_contenido/contenido/?p=<?=$idSub?>" target="_blank" >
<div class="left padd5">Contenido</div>
</a>
<? } ?>
</div>

</div>

     <div class="clear10"></div>  
        
        
	
		
       <? }     ?>  
       
       </div>     
	   </div>   
	   <div class="clear10"></div>
	 </div>
 
       
       <? // fin del hijo ?>
       

<script>


</script>

         <? } ?>  

      
 
       
 <? } ?>
 
 </div>
 
 
<script>
</script>
 
<script>

	
 $(function() {

    $('#losElementos' ).sortable({
      connectWith: ".conectados",
	  placeholder: "placeholder",
	  handle: ".draginG",
	  tolerance: "pointer",
	  forceHelperSize: true,
	  
	    start : function(e, ui){
	   var moviendo = ui.item.attr("id");
	  },
	  
	   stop : function(e, ui){
	   var moviendo = ui.item.attr("id");
	
	  },
	   
	  update : function(e, ui){
		var orden="";	
		
			var emp=$('#e').val();
		 	var este=$(e.target).attr("id");
			var seccion=$('#seccion').val();
			
			orden=$('#'+este).sortable('toArray').toString();
						$.ajax({
				type: "POST",
				url: "reorden.php",
				data: "orden="+orden,
				success: 
				function(msg){	
				$('.load').hide();
			//	 $("#aqui").html(msg);
			  }
	 		});
		  
		 
        }
	   
    }).disableSelection();
	
	<? if($arregloTitulos!=""){ ?>
	$('<? echo implode(',',$arregloTitulos);?>' ).sortable({
      connectWith: ".conectados",
	  placeholder: "placeholder",
	  handle: ".draginG",
	  tolerance: "pointer",
	  forceHelperSize: true,
	  
	   receive: function(ev, ui) {
            if(ui.item.hasClass("conectadosTitulos"))
              ui.sender.sortable("cancel");
        },
	   
	  update : function(e, ui){
		var orden="";	
		
			var emp=$('#e').val();
		 	var este=$(e.target).attr("id");
			var este=$(e.target).attr("id");
			var seccion=$('#seccion').val();
			
			orden=$('#'+este).sortable('toArray').toString();
			alert(este);
				$.ajax({
				type: "POST",
				url: "reorden.php",
				data: "padre="+este+"&orden="+orden,
				success: 
				function(msg){	
				$('.load').hide();
			//	 $("#aqui").html(msg);
			  }
	 		});
		  
		 
        }
	   
    }).disableSelection();
 
	
	<? } ?>

});
</script>

<script>
$('#seccion').val('<?=$idSeccion?>');
</script>
 
 <? } ?>
 
 <? 
 if($formA=="afecta"){
?>
<script>$('#aqui').hide();</script>
<?

$tituloC=nombreBonito(busqueda($tituloEs));
$tituloEs=mataMalos($tituloEs);
$tituloEn=mataMalos($tituloEn);
$seccion=mataMalos($seccion);

if($cambia!=""){
$query="UPDATE seccionesMenu SET tituloC='$tituloC', titulo_es='$tituloEs',titulo_en='$tituloEn' WHERE id='$cambia'";
$mysqli->query($query);


}

if($cambia==""){

$cambia=aleatorio(10);
$query="INSERT INTO seccionesMenu (id, tituloC, titulo_es, titulo_en) VALUES ( '$cambia', '$tituloC', '$tituloEs', '$tituloEn')";
 $mysqli->query($query);	
	
}




?>

<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_seccionesMenu/menu/menuAdd?p=<?=$cambia?>";
</script>	
<?
 } ?>