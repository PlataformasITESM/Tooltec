<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 


 
		$nuevo=aleatorio(10);
		$ale=aleatorio(2);
		
		$nuevaCarpeta ="Nueva carpeta $ale";	
 
		
		set_time_limit(0);
		$urlCurl = $urlCurl."/curl/_files/filesFolderDelete.php"; // change to your form action url.
		$ch = curl_init($urlCurl);
		
		
		$rutaC=$rutaContent."/".$c;
		$data = array( "idFolder"=>$c,"puedo"=>"si","ruta"=>$rutaC);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		
 
			if($result!="ok"){
			?>
 
            
            <?
			}
		//
		

			//

			$query="DELETE FROM cRepositorioFolders  WHERE id='$c'";
			$mysqli->query($query);
			
			$query="OPTIMIZE TABLE cRepositorioFolders ";
			$mysqli->query($query);
			
	
			

include "folderTodos.php";
die();
exit;


?>

