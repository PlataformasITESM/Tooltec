<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 

	
	$eliminados=mataMalos($eliminados);
	$eliminadosA=explode(',',$eliminados);
	$cuantos=count($eliminadosA);
	
	 

$eliminadosL=explode(',',$eliminadosL);
	
	foreach($eliminadosL as $eliminadoYo) {
 
		$query="DELETE FROM cRepositorioArchivos   WHERE id='$eliminadoYo'";
		$mysqli->query($query);
	}
	


	
		set_time_limit(0);
		$urlCurl = $urlCurl."/curl/_files/mataFiles.php"; // change to your form action url.
		$field_name = 'file'; // please edit it according to your form file field name.
		$ch = curl_init($urlCurl);
		$rutaC=$rutaContent."/".$c;
		$data = array("idFolder"=>$c,"eliminados"=>$eliminados,"puedo"=>"si","ruta"=>$rutaC);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
 
			if($result!="ok"){
 
			}
		//
		
	 
			//
 
			$sel25 = "SELECT * FROM  cRepositorioFolders WHERE id='$c' ";
			$res6 = $mysqli->query($sel25);
			$res6->data_seek(0);
			while ($fila25 = $res6->fetch_assoc()) 
			{

				$info= unserialize($fila25['info']);
				
				$cuantosArchivos=$info['cuantos'];
				$pesoArchivos=$info['peso'];
				
				$info['cuantos']=$cuantosArchivos-$cuantos;
				$info['peso']=$pesoArchivos-$p;
				$info['cuando']=date('Y-m-d H:m:s');
				
				$info=serialize($info);
				
				
			}
			
			$query="UPDATE cRepositorioFolders SET info='$info'  WHERE id='$c'";
			$mysqli->query($query);
			
			


die();
exit;


?>

