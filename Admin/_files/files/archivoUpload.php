<? include "../../sesion/arriba.php"; 
if($e==""){$conecta=1;}
$dondeSeccion="archivos";
include "../../sesion/mata.php"; 

	$tmp_name = $_FILES["upl"]["tmp_name"];
	$pesoArchivo = $_FILES["upl"]["size"];
    $name = $_FILES["upl"]["name"];
	$ext = getExtension($name);
 	$ext = strtolower($ext);

$limite=100*1024*1024;



$formato=array();
//imgs
$formato[]="jpg";
$formato[]="png";
$formato[]="gif";
$formato[]="jpeg";
$formato[]="svg";

$imagenes=array();
$imagenes[]="jpg";
$imagenes[]="png";
$imagenes[]="gif";
$imagenes[]="jpeg";
$imagenes[]="svg";

//docs

$formato[]="txt";
$formato[]="doc";
$formato[]="docx";
$formato[]="pdf";
$formato[]="ppt";
$formato[]="pptx";
$formato[]="xls";
$formato[]="xlsx";

$documentos=array();
$documentos[]="txt";
$documentos[]="doc";
$documentos[]="docx";
$documentos[]="pdf";
$documentos[]="ppt";
$documentos[]="pptx";
$documentos[]="xls";
$documentos[]="xlsx";

//zips
$formato[]="rar";
$formato[]="zip";

$comprimido=array();
$comprimido[]="rar";
$comprimido[]="zip";


 //audio
$formato[]="wav";
$formato[]="mp3";

$audio=array();
$audio[]="wav";
$audio[]="mp3";

//video
$formato[]="mp4";
$formato[]="webm";
$formato[]="ogg";

$video=array();
$formato[]="wav";
$formato[]="mp3";

          
 
 
if (in_array($ext, $formato)) {
	
	
	if (in_array($ext, $imagenes)) {$tipoArchivo="img";}
	if (in_array($ext, $documentos)) {$tipoArchivo="doc";}
	if (in_array($ext, $comprimido)) {$tipoArchivo="zip";}
	if (in_array($ext, $audio)) {$tipoArchivo="audio";}
	if (in_array($ext, $video)) {$tipoArchivo="video";}
	
	
	

		//apenas mete aqui
		
		$aleatorio=aleatorio(3);
		$nuevo=aleatorio(10);
		$nombreBonito = preg_replace("/\\.[^.\\s]{3,4}$/", "", $name);
		$nombreBonito=nombreBonito($nombreBonito);
		$yosoy=$nombreBonito."_".$aleatorio.".".$ext;
		
		$archivoInfo=array();
		
		$archivoInfo['nombre']=$yosoy;
		$archivoInfo['peso']=$pesoArchivo;
		$archivoInfo['ext']=$ext;
		$archivoInfo['fecha']=date('Y-m-d H:m:s');
		
		$archivoInfo=serialize($archivoInfo);
		
		// a subir el peso
		
			
		if( $pesoArchivo<=$limite){
			
			
			
		set_time_limit(0);
		$urlCurl = $urlCurl."/curl/_files/recibeFiles.php"; // change to your form action url.
		$field_name = 'file'; // please edit it according to your form file field name.
		$ch = curl_init($urlCurl);
		$rutaC=$rutaContent."/".$c;
		$data = array("$field_name"=>new CurlFile($tmp_name),"yosoy"=>$yosoy,"idFolder"=>$c,"puedo"=>"si","ruta"=>$rutaC);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

 
			if($result!="ok"){
				echo '{"status":"error"}';	
			}
		//
		
			if($result=="ok"){
			//
			
			$query="INSERT INTO cRepositorioArchivos ( id,idFolder,info,tipo, modificado) VALUES ( '$nuevo','$c','$archivoInfo','$tipoArchivo','$hoySt')";
			echo"$query";
			$mysqli->query($query);
			
			
			$sel25 = "SELECT * FROM  cRepositorioFolders WHERE id='$c' ";
			$res6 = $mysqli->query($sel25);
			$res6->data_seek(0);
			while ($fila25 = $res6->fetch_assoc()) 
			{

				$info= unserialize($fila25['info']);
				
				$cuantosArchivos=$info['cuantos'];
				$pesoArchivos=$info['peso'];
				
				$info['cuantos']=$cuantosArchivos+1;
				$info['peso']=$pesoArchivos+$pesoArchivo;
				$info['cuando']=date('Y-m-d H:m:s');
				
				$info=serialize($info);
				
				
			}
			
			$query="UPDATE cRepositorioFolders SET info='$info'  WHERE id='$c'";
			$mysqli->query($query);
			
			}
			
			
		}


	}

die();
exit;


?>

