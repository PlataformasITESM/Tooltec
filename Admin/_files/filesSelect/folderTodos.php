<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 
?>
<input type="hidden" value="<?=$cuantosArchivos?>" id="cuantosArchivos">
<div style="height:100%;  ">

<div class="seccionMenuI" id="addFolder" onClick="showAddFolder(); return false;" >
       	<div class="seccionMenuC material-icons">create_new_folder</div>
       	<div class="seccionMenuC">Folder nuevo</div>
</div>      


<div id="addFolderDiv" style="display:none;">
 <div class="clear10"></div>
 
 <div class="tableCell" style="cursor:pointer;">
<input id="nombreFolder" class="field" type="text" placeholder="folder">
</div>
<div class="tableCell material-icons" style="cursor:pointer;" onClick="addFolder('<?=$s?>'); return false;" title="Agregar">
add_circle_outline
 
  
</div>
<div class="tableCell material-icons" style="cursor:pointer;" onClick="cancelFolder(); return false;" title="Cancelar">
  
 
 cancel
</div>
</div>

 <div class="clear10"></div>

<div class="div100" style=" overflow-y: auto; height: 85%;  "> 
<?

 
if ($tipoContenido!=""){
$selas="SELECT * FROM  cRepositorioFolders WHERE id='$tipoContentSeccion'    ";
//echo $selas;
$sel25 = $selas;
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	$idFolder= $fila25['id'];
	$nombre= $fila25['nombre'];
	$info= unserialize($fila25['info']);
	
	
	$cuantos=$info['cuantos'];
	if($cuantos==""){$cuantos=0;}
	$peso=number_format($info['peso']/(1024*1024),2);
	$granSuma=$granSuma+$peso;
	
	?>
   
<div id="folder<?=$idFolder?>" style="float:left; width:100%;">
    <div class="lineaControl cursor div100" id="f<?=$idFolder?>" onClick="archivos('<?=$idFolder?>','<?=$contenedor?>','<?=$cuantosArchivos?>','<?=$tipoArchivoSeleccion?>'); return false;" style="color:#555;" >
 
        
             	<div class="absolute material-icons iconoFolder" style=" position: absolute; left: 0;  font-size:20px;" id="icono<?=$idFolder?>" >folder</div>
			
       	<div class="div100" style="padding-left: 30px;">
		<div class="div100" id="nombre<?=$idFolder?>"><?=$nombre?>
		<div class="clear"></div>
		<span class="left" style=" font-size:11px;">(<?=$cuantos?>) <?=$peso?> MB</span>
		</div>
		
       
</div>   
    
	</div> 
    
    <div class="div"></div>
    </div>
    <?
}
 
}
?>

<?

$sel25 = "SELECT * FROM  cRepositorioFolders WHERE tipo='' ORDER BY nombre ASC ";
$res6 = $mysqli->query($sel25);
$res6->data_seek(0);
while ($fila25 = $res6->fetch_assoc()) 
{
	$idFolder= $fila25['id'];
	$nombre= $fila25['nombre'];
	$info= unserialize($fila25['info']);
	
	
	$cuantos=$info['cuantos'];
	if($cuantos==""){$cuantos=0;}
	$peso=number_format($info['peso']/(1024*1024),2);
	$granSuma=$granSuma+$peso;
	 

	
	?>
   
<div id="folder<?=$idFolder?>" style="float:left; width:100%;">
    <div class="lineaControl  cursor div100" id="f<?=$idFolder?>" onClick="archivos('<?=$idFolder?>','<?=$contenedor?>','<?=$cuantosArchivos?>','<?=$tipoArchivoSeleccion?>'); return false;" style="color:#555;" >
 
        
             	<div class="absolute material-icons iconoFolder" style="position: absolute; left: 0;  font-size:20px;" id="icono<?=$idFolder?>" >folder</div>
        
       	<div class="div100"  style="padding-left: 30px;"><span id="nombre<?=$idFolder?>"><?=$nombre?></span> <span style=" font-size:11px;">(<?=$cuantos?>) <?=$peso?> MB</span></div>
       
</div>   
    
    
    
    <div class="div"></div>
    </div>
    <?
}
?>
</div>
</div>
 <div class="div"></div>
Total: <span id="granSuma"><?=$granSuma?></span>MB
