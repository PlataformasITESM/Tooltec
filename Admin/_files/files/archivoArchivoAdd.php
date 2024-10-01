<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 
?>
<div class="clear"></div>        
 
 <div style="clear:both;"></div>
	<form action="<?=$url?>/_files/files/archivoArchivoUpload.php" method="post" id="upload" enctype="multipart/form-data" >
        <input type="hidden" name="c" value="<?=$idFolder?>" >
		 <input type="hidden" name="e" value="<?=$e?>" >
        <input type="hidden" name="anterior" value="<?=$fileNombre?>">
		<input type="hidden" name="pesoAnterior" value="<?=$filePesoV?>">
        <input type="hidden" name="ar" value="<?=$archivo?>">

        
            <div id="drop">
				<a ><div class="material-icons opacidad" style="color:#333; font-size:40px;"> attach_file</div></a>
				<input   type="file"   name="upl" multiple/>
              
			</div>
            
  
			<ul>
				<!-- The file uploads will be shown here -->
			</ul>
		</form>
        <?  include "archivosArchivosJs.php"; ?>