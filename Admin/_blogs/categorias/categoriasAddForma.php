<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="blogs";
include_once "../../sesion/mata.php"; 

if($formA!="afecta"){

 $res6 = $mysqli->query("SELECT * FROM blogsCat WHERE id='$valor' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo=$fila['titulo'];
		$img= $fila['img'];
 

	}
 

	?>

 	<? if($valor!=''  ){ ?>	
  <input type="hidden" id="borraTitulo" value="<?=$titulo?>" >
  <input type="hidden" id="borraProceso" value="blogsCat" >
  <input type="hidden" id="borraBorrado" value="<?=$valor?>" >
  <input type="hidden" id="borraCat" value="" >

 <div class="right material-icons cursor" onClick="borrar();" title="Eliminar">clear</div>   
<div class="clear20"></div> 
<? } ?>


  <div class="div50">  
<form action="categoriasAddForma" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="c" value="<?=$c?>" >
            <input type="hidden" name="cambia" value="<?=$valor?>" >

	
	
<div class="formaB ">
	<div class="formaT  ">Título  </div>
    <div class="formaC">
	  <input type="text" class="validate[required]" id="titulo" name="titulo" value="<?=$titulo?>"> 
	</div>
</div>
 
 
 
 
 

 
<div style="width:100%; height:1px; float:left; background-color:#CCC; margin-bottom:10px;"></div>
<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>
 

</form>
</div>
 
<script type="text/javascript">
//estadin();
 


 </script>
 
 <? } ?>
 
 <? 
if($formA=="afecta"){

$tituloC=nombreBonito($titulo);
$titulo=mataMalos($titulo);

$tituloEnC=nombreBonito($tituloEn);
$tituloEn=mataMalos($tituloEn);


//crea el folders

if($cambia!=""){


	$query="UPDATE  blogsCat SET titulo='$titulo', tituloC='$tituloC'   WHERE id='$cambia'";
	$mysqli->query($query); 
}

if($cambia==""){
$cambia=aleatorio(10);

	$query="INSERT  INTO  blogsCat (id,titulo,tituloC,activo,orden) VALUES ('$cambia','$titulo','$tituloC','1','100')";
	$mysqli->query($query); 
}


 $rutaProd=$rutaContent."/".$cambia;
	 if (!file_exists($rutaProd)) {
	 	mkdir($rutaProd, 0777);
		chmod($rutaProd, 0777);
}



$cualFoto="imagen"; 
if($cualFoto!=''){
	
	$tmp_name = $_FILES[$cualFoto]["tmp_name"];
	$name = $_FILES[$cualFoto]["name"];
	$ext = getExtension($name);
 	$ext = strtolower($ext);
	
	if (($ext == "jpg")    ||( $ext == "jpeg") ||( $ext == "png") ||( $ext == "gif") ){
	 
	$yosoy = $cambia.".".$ext;
	$copia=$rutaProd."/".$yosoy;
		if(copy($tmp_name,$copia)){
		list($anchoImg, $alto) = getimagesize($copia);
					
					smart_resize_image( $copia, $width = 1000, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
					
		}
		
		
	}

}

?>
<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_blogs/categorias" ;</script>	
<?
 } ?>