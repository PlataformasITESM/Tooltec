<? include "../../sesion/arriba.php"; 
$dondeSeccion="recetas";
include "../../sesion/mata.php"; 

if($formA!="afecta"){

 

?>
  <div class="blanco10 div100">  
<form action="imagenesAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
	  <input type="hidden" name="cat" value="<?=$cat?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >
 <div class="div50">
	


   <div class="formaB">
	<div class="formaT  ">Imágenes complementarias</div>
    <div class="formaC">
	 
	<? if($d!=""){ ?>
	<div class="left" style="background-image: url('<?=$url?>/img/transparente.png')">
	<img src="<?=$urlFront?>/recetas/<?=$valor?>/t_<?=$imgPrincipal?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
	</div>
	<div class="clear10"></div>
	<? } ?>
	<div class="div100 opacidad" style="border: 1px solid #CCC; width: 300px; height: 100px;">
	<div class="absolute">Arrastrar archivos</div>
	
   	<input id="multiples" data-imgDiv="multiples"   name="multiples[]"  type="file" style=" width: auto; width: 300px; position: absolute;height: 70px; top:30px;"   multiple class="field logos "   accept=" "  />
	</div>
	<input type="hidden" name="imgOrden" id="imgOrden">
	<input type="hidden" name="borrados" id="borrados">
	
	<div class="clear20"></div>
	<div class="div100" id="actuales">
	<? $res6 = $mysqli->query("SELECT * FROM recetasImg WHERE idReceta='$valor' ORDER BY orden ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idF= $fila['id'];
	$imgs= $fila['img'];
	$soyVideo="";
	if (strpos($imgs, '.mp4') !== false) {$soyVideo="1";}
	if (strpos($imgs, '.mov') !== false) {$soyVideo="1";}
	?>
	<div id="<?=$idF?>" class="fotines" style="position: relative; height: 150px">
	<div class="material-icons opacidad fotosBorra"   onClick="deleteFoto('<?=$idF?>','del')">delete</div>
	<div class="material-icons opacidad fotosBorraNo" onClick="deleteFoto('<?=$idF?>','undo')">undo</div>
	<? if($soyVideo==""){ ?>
	<img src="<?=$urlFront?>/recetas/<?=$valor?>/t_<?=$imgs?>" id="logoImg"   style="max-height: 100px; max-width: 150px;" />
	<? } else { ?>
	<video src="<?=$urlFront?>/recetas/<?=$valor?>/<?=$imgs?>"  style="max-height: 100px; max-width: 150px;" >
	<? } ?>
	</div>
	<? } ?>
	</div>
	</div>
</div>
 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>
 

</form>
</div>
 
<script>
 
</script>
 <? } ?>
 
 <? 
if($formA=="afecta"){

$cambia=mataMalos($cambia);
 
 
 
 

 
$i=0;
$arregloArchivosCopia=array();
$cuantosMul=count($_FILES['multiples']['name']);


    for ($i=0; $i<$cuantosMul; $i++) {


//copia archivo
$archivoArchivo='multiples'; 
$archivoRutas=['/recetas/'.$cambia];
$archivoExts=['jpg','jpeg','png','mp4','mov'];
$archivoPeso=3;
$archivoName="";
$archivoMultiple="si";
include $ruta."/_api/procesos/archivo.php";

}

if(count($arregloArchivosCopia)>0){
foreach($arregloArchivosCopia as $est=>$imgs){
$id=$cambia.aleatorio(4);
$query="INSERT INTO  recetasImg (id, idReceta,img,creado,orden) VALUES ('$id',  '$cambia', '$est', '$creado', '100') ";
$mysqli->query($query);
}
}


	if($imgOrden!=""){
		$imgOrden=explode(',',$imgOrden);
		
		$cuents=1;
		foreach($imgOrden as $imgs){
		$query="UPDATE recetasImg SET  orden='$cuents' WHERE id='$imgs'";
			$mysqli->query($query);
		$cuents=$cuents+1;
		}
	}
	 if($borrados!=""){
		$borrados=explode(',',$borrados);
		
	
		foreach($borrados as $borrin){
		$res6 = $mysqli->query("SELECT * FROM recetasImg WHERE idReceta='$cambia' AND id='$borrin'");
		$res6->data_seek(0);
		 while ($fila = $res6->fetch_assoc()) 
			{
			$idF= $fila['id'];
			$imgs= $fila['img'];

			}
		unlink($rutaServer.'/recetas/'.$cambia.'/'.$imgs);
		unlink($rutaServer.'/recetas/'.$cambia.'/t_'.$imgs);
		$query="DELETE FROM recetasImg   WHERE id='$borrin' AND idReceta='$cambia'";
		$mysqli->query($query);

		}
	}


$arregloFotos=array();
$arregloFotos[]=$imgPrincipal;
$res6 = $mysqli->query("SELECT * FROM recetasImg WHERE idReceta='$cambia' ");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
		{
		$arregloFotos[]= $fila['img'];
		}

 
?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_recetas/recetasImg/?u=<?=$cambia?>" ;
</script>	
<?
 } ?>