<? include "../../sesion/arriba.php"; 
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 

 
		$nuevo=aleatorio(10);
		$ale=aleatorio(2);
		
		$nuevaCarpeta =$folder;	
 
		
		set_time_limit(0);
		$urlCurl = $urlCurl."/curl/_files/filesFolderAdd.php"; // change to your form action url.
		$field_name = 'file'; // please edit it according to your form file field name.
		$ch = curl_init($urlCurl);
		 
		$rutaC=$rutaContent."/".$nuevo;
		$data = array( "nuevo"=>$nuevo,"puedo"=>"si","ruta"=>$rutaC);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
 
		curl_close($ch);
 
			if($result!="ok"){
			?>
            <div class="mensaje">Sucedió un error. Por favor intente nuevamente</div>
            
            <?
			}
		//
		
			if($result=="ok"){
			//
			$query="INSERT INTO cRepositorioFolders ( id,nombre, tipo ) VALUES ( '$nuevo','$nuevaCarpeta','')";
			$mysqli->query($query);
			
			}
			

include $ruta."/_files/files".$vieneFiles."/folderTodos.php";
die();
exit;


?>

