<? include "../sesion/arriba.php";  
//hagamos un curl


$formato=array();
$formato[]="jpg";
$formato[]="png";
$formato[]="txt";
$formato[]="doc";
$formato[]="docx";
$formato[]="pdf";
$formato[]="rar";
$formato[]="zip";
$limite=3*1024*1024;

$elTokenServidor= $_SESSION['avalyweb'];
 
 

	if($ses!=$elTokenServidor || $elTokenServidor=="" || $ses==""){
	die();	
	}

 

$dAt74s=explode(',',$dAt74s);

$arregloParaPost=array();
/* mandamos archivos adjuntos */
foreach($dAt74s as $datin){
$datin = substr($datin, 5);
$datin=base64_decode($datin);	
	
	$field_name = $datin;
	
	$tmp_name = $_FILES[$field_name]["tmp_name"];
	$pesoArchivo = $_FILES[$field_name]["size"];
    $name = $_FILES[$field_name]["name"];
	$ext = getExtension($name);
 	$ext = strtolower($ext);
	
		
		if (in_array($ext, $formato)) {
		if( $pesoArchivo<=$limite){
		$aleatorio=aleatorio(3);
		$nombreBonito = preg_replace("/\\.[^.\\s]{3,4}$/", "", $name);
		$nombreBonito=nombreBonito($nombreBonito);
		$yosoy=$nombreBonito."_".$aleatorio.".".$ext;
		
		/* enviar archivo */
		
		set_time_limit(0);
		$urlCurl = $dominioUrl."/curl/_files/recibeAttch.php"; // change to your form action url.
		$ch = curl_init($urlCurl);
		
		$data = array("$field_name"=>"@".$tmp_name,"puedo"=>"si","nombreArchivo"=>$field_name,"yosoy"=>$yosoy);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		
		/* */
	
	    $arregloParaPost[$datin]= $dominioUrl."/contenido/attch/".$yosoy;
		}
		}
}

/*  */




foreach ($_POST as $name => $val)
{
  $arregloParaPost[$name]= $val;
} 


		
		$urlCurl=$dominioUrl."/Admin/procesamiento/procesar.php";
		

 
		$ch = curl_init($urlCurl);
		
$data = $arregloParaPost;
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		
		
		 echo"$result";


?>