<?

function subject($subject){
$subject="=?ISO-8859-1?B?".base64_encode(utf8_decode($subject))."=?=";
return html_entity_decode($subject);
}

function matricula($nomina){
$regex = "/^[A]\d{8}$/";	
	if (preg_match($regex, $nomina)) {
	return true;
	} 
}
function maboTablaQuery($search){
 $search=base64_decode($search);
 $arregloBus=array();
 $searchJ=json_decode($search,true);
	 foreach($searchJ as $ser=>$serV){
		$busqueda=mataMalos($serV['busqueda']);
		$v1=mataMalos($serV['v1']);
		$v2=mataMalos($serV['v2']);
		$radio=mataMalos($serV['radio']);
		$selectF=mataMalos($serV['select']);
		if($busqueda!=""){
		$arregloBus[]=$ser." LIKE '%".$busqueda."%' ";
		}
		
		if($radio!=""){
		$arregloBus[]=$ser." = '".$radio."' ";
		}
		 
		 if($v1!=""){
			if($selectF  =="entre"){
			$arregloBus[]=$ser." BETWEEN '".$v1."'  AND '".$v2."' ";
			}
			
			if($selectF  =="igual"){
			$arregloBus[]=$ser." = '".$v1."' ";
			}
			
			if($selectF  =="mayor"){
			$arregloBus[]=$ser." >= '".$v1."' ";
			}
			
			if($selectF  =="menor"){
			$arregloBus[]=$ser." <= '".$v1."' ";
			}
		}
		
	 }
	 $busquines=" AND ".implode(' AND ',$arregloBus);
return $busquines;
}

function diasIntervalo($inicio,$fin){

$intervalo=array();
$intervalo[$inicio]=1;
if($inicio!=$fin){
	$begin = new DateTime($inicio);
	$end = new DateTime($fin);
	
	if($inicio>$fin){
	$begin = new DateTime($fin);
	$end = new DateTime($inicio);
	}
	
	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($begin, $interval, $end);
	
	$intervalo=array();
	foreach ( $period as $dt ) {
	  $esteDia=$dt->format( "Y-m-d" );
	  $intervalo[$esteDia]=1;

	  }
	  
	  $intervalo[$fin]=1;
	}

$intervalo=serialize($intervalo);
	
	return $intervalo;
}


function fechaEsp($fechaEntrada)
{
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$year= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	$dia = ltrim($dia, '0');
	if($mes=="01"){$mess="Enero";}
	if($mes=="02"){$mess="Febrero";}
	if($mes=="03"){$mess="Marzo";}
	if($mes=="04"){$mess="Abril";}
	if($mes=="05"){$mess="Mayo";}
	if($mes=="06"){$mess="Junio";}
	if($mes=="07"){$mess="Julio";}
	if($mes=="08"){$mess="Agosto";}
	if($mes=="09"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}	
	$fechaNormal="$mess $dia, $year";
	return $fechaNormal;
	
}

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

function fechaIng($fechaEntrada)
{
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$year= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	$dia = ltrim($dia, '0');
	if($mes=="01"){$mess="January";}
	if($mes=="02"){$mess="February";}
	if($mes=="03"){$mess="March";}
	if($mes=="04"){$mess="April";}
	if($mes=="05"){$mess="May";}
	if($mes=="06"){$mess="June";}
	if($mes=="07"){$mess="July";}
	if($mes=="08"){$mess="August";}
	if($mes=="09"){$mess="September";}
	if($mes=="10"){$mess="October";}
	if($mes=="11"){$mess="November";}
	if($mes=="12"){$mess="December";}
	
 $diaa=ordinal($dia);
	
	$fechaNormal="$mess $diaa, $year";
	return $fechaNormal;
	
}

function arregloMete($elArreglo){

	$elArreglo=base64_encode(serialize($elArreglo));
	return $elArreglo;
}
function serializa($elArreglo){
	if($elArreglo!=""){
	$elArreglo=array_filter($elArreglo);
	$elArreglo=array_map('trim',$elArreglo);
	$elArreglo=serialize($elArreglo);
	return $elArreglo;
	}
}
function arregloSaca($elArreglo){
 $elArreglo=unserialize(base64_decode($elArreglo));	
	return $elArreglo;
}
function limpiaJson($json){
	//$json=str_replace('"','&quot;',$json);
	//$json=str_replace(',','&#44;',$json);
	//$json=str_replace('Ø','&#8709;',$json);
//	$json=utf8_decode($json);
	$json=htmlentities($json);
	return $json;	
}
function aleatorio($length) {
	$randomString = '';
	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString .= $characters[rand(0, $charactersLength - 1)];
	
	$length=$length-1;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
   
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function pmt($interest, $months, $loan) {
       $months = $months;
       $interest = $interest / 1200;
       $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       return round($amount, 2);
    }
function smart_resize_image( $file, $width = 0, $height = 0, $proportional = true, $output = 'file', $delete_original = false, $use_linux_commands = false, $quality = 100)
  {
    if ( $height <= 0 && $width <= 0 ) {
      return false;
    }
 
    $info = getimagesize($file);
    $image = '';
 
    $final_width = 0;
    $final_height = 0;
    list($width_old, $height_old) = $info;
 	
    if ($proportional) {
      if ($width == 0) $factor = $height/$height_old;
      elseif ($height == 0) $factor = $width/$width_old;
      else $factor = min ( $width / $width_old, $height / $height_old);   
 
      $final_width = round ($width_old * $factor);
      $final_height = round ($height_old * $factor);
 
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }
 
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        $image = imagecreatefromgif($file);
      break;
      case IMAGETYPE_JPEG:
        $image = imagecreatefromjpeg($file);
      break;
      case IMAGETYPE_PNG:
        $image = imagecreatefrompng($file);
      break;
      default:
        return false;
    }
 
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
 
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $trnprt_indx = imagecolortransparent($image);
 
      // If we have a specific transparent color
      if ($trnprt_indx >= 0) {
 
        // Get the original image's transparent color's RGB values
        $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
 
        // Allocate the same color in the new image resource
        $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
 
        // Completely fill the background of the new image with allocated color.
        imagefill($image_resized, 0, 0, $trnprt_indx);
 
        // Set the background color for new image to transparent
        imagecolortransparent($image_resized, $trnprt_indx);
 
 
      } 
      // Always make a transparent background color for PNGs that don't have one allocated already
      elseif ($info[2] == IMAGETYPE_PNG) {
 
        // Turn off transparency blending (temporarily)
        imagealphablending($image_resized, false);
 
        // Create a new transparent color for image
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
 
        // Completely fill the background of the new image with allocated color.
        imagefill($image_resized, 0, 0, $color);
 
        // Restore transparency blending
        imagesavealpha($image_resized, true);
      }
    }
 
    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
 
    if ( $delete_original ) {
      if ( $use_linux_commands )
        exec('rm '.$file);
      else
        unlink($file);
    }
 	
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
 
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        imagegif($image_resized, $output);
      break;
      case IMAGETYPE_JPEG:
        imagejpeg($image_resized, $output, $quality);
      break;
      case IMAGETYPE_PNG:
        imagepng($image_resized, $output);
      break;
      default:
        return false;
    }
 
    return true;
	
	}
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
function generatePassword($length=9, $strength=0) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$=?';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}
	function createPasswordHash($seguridad) {
	return password_hash($seguridad, PASSWORD_DEFAULT);
	}
function fechaN($fechaEntrada){
	$separar = explode(' ',$fechaEntrada);
	$dia= $separar[0];	
	$mes= $separar[1];	
	
	if($mes=="Enero"){$mess="01";}
	if($mes=="Febrero"){$mess="02";}
	if($mes=="Marzo"){$mess="03";}
	if($mes=="Abril"){$mess="04";}
	if($mes=="Mayo"){$mess="05";}
	if($mes=="Junio"){$mess="06";}
	if($mes=="Julio"){$mess="07";}
	if($mes=="Agosto"){$mess="08";}
	if($mes=="Septiembre"){$mess="09";}
	if($mes=="Octubre"){$mess="10";}
	if($mes=="Noviembre"){$mess="11";}
	if($mes=="Diciembre"){$mess="12";}	
	$fechaNormal=date('Y').$mess."-".$dia;
	return $fechaNormal;	
	
}
function fechaNI($fechaEntrada){
	
	$fechaNormal="";
	if($fechaEntrada!="0000-00-00"){
	$separar = explode('-',$fechaEntrada);
	$mes= $separar[1];	
	$dia=$separar[2];	
	
	if($mes=="01"){$mess="Enero";}
	if($mes=="02"){$mess="Febrero";}
	if($mes=="03"){$mess="Marzo";}
	if($mes=="04"){$mess="Abril";}
	if($mes=="05"){$mess="Mayo";}
	if($mes=="06"){$mess="Junio";}
	if($mes=="07"){$mess="Julio";}
	if($mes=="08"){$mess="Agosto";}
	if($mes=="09"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}	
	$fechaNormal=$dia." ".$mess;
	}
	
	return  $fechaNormal;	
	
}
function fechaSaca($fechaEntrada){
	
	$fechaNormal="";
	if($fechaEntrada!="0000-00-00"){
	$separar = explode('-',$fechaEntrada);
	$mes= $separar[1];	
	$dia=$separar[2];
	$year=$separar[0];	
	
	if($mes=="01"){$mess="Enero";}
	if($mes=="02"){$mess="Febrero";}
	if($mes=="03"){$mess="Marzo";}
	if($mes=="04"){$mess="Abril";}
	if($mes=="05"){$mess="Mayo";}
	if($mes=="06"){$mess="Junio";}
	if($mes=="07"){$mess="Julio";}
	if($mes=="08"){$mess="Agosto";}
	if($mes=="09"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}	
	$fechaNormal=$dia." ".$mess." ".$year;
	}
	
	return  $fechaNormal;	
	
}
function fechaMete($fechaEntrada){
	
	$fechaNormal="";
	$separar = explode(' ',$fechaEntrada);
	$dia=$separar[0];
	$mes= $separar[1];
	$year=$separar[2];
	
	if($mes=="Enero"){$mess="01";}
	if($mes=="Febrero"){$mess="02";}
	if($mes=="Marzo"){$mess="03";}
	if($mes=="Abril"){$mess="04";}
	if($mes=="Mayo"){$mess="05";}
	if($mes=="Junio"){$mess="06";}
	if($mes=="Julio"){$mess="07";}
	if($mes=="Agosto"){$mess="08";}
	if($mes=="Septiembre"){$mess="09";}
	if($mes=="Octubre"){$mess="10";}
	if($mes=="Noviembre"){$mess="11";}
	if($mes=="Diciembre"){$mess="12";}	
	$fechaNormal=$year."-".$mess."-".$dia;
	return  $fechaNormal;	
	
}
	
function fechaletra($fechaEntrada)
{
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$año= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	if($mes=="01"){$mess="Ene";}
	if($mes=="02"){$mess="Feb";}
	if($mes=="03"){$mess="Mar";}
	if($mes=="04"){$mess="Abr";}
	if($mes=="05"){$mess="May";}
	if($mes=="06"){$mess="Jun";}
	if($mes=="07"){$mess="Jul";}
	if($mes=="08"){$mess="Ago";}
	if($mes=="09"){$mess="Sep";}
	if($mes=="10"){$mess="Oct";}
	if($mes=="11"){$mess="Nov";}
	if($mes=="12"){$mess="Dic";}	
	$fechaNormal="$dia/$mess/$año";
	return $fechaNormal;
	
}
function fechaCompleta($fechaEntrada)
{
	$dayOfWeek = date("N", $fechaEntrada);
	
	$datetime = new DateTime($fechaEntrada);
	$dayOfWeek=$datetime->format('N');
	
	if($dayOfWeek==1){$dayOfWeek="Lunes";}
	if($dayOfWeek==2){$dayOfWeek="Martes";}
	if($dayOfWeek==3){$dayOfWeek="Miércoles";}
	if($dayOfWeek==4){$dayOfWeek="Jueves";}
	if($dayOfWeek==5){$dayOfWeek="Viernes";}
	if($dayOfWeek==6){$dayOfWeek="Sábado";}
	if($dayOfWeek==7){$dayOfWeek="Domingo";}
	
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$año= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	if($mes=="01"){$mess="Enero";}
	if($mes=="02"){$mess="Febrero";}
	if($mes=="03"){$mess="Marzo";}
	if($mes=="04"){$mess="Abril";}
	if($mes=="05"){$mess="Mayo";}
	if($mes=="06"){$mess="Junio";}
	if($mes=="07"){$mess="Julio";}
	if($mes=="08"){$mess="Agosto";}
	if($mes=="09"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}	
	
	$fechaNormal="$dayOfWeek $dia de $mess de $año";
	return $fechaNormal;
	
}

function fechaEspHora($fechaEntrada)
{
$horaI=''; $horaP=''; $br='';
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$year= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	$dia = ltrim($dia, '0');
	if($mes=="01"){$mess="Enero";}
	if($mes=="02"){$mess="Febrero";}
	if($mes=="03"){$mess="Marzo";}
	if($mes=="04"){$mess="Abril";}
	if($mes=="05"){$mess="Mayo";}
	if($mes=="06"){$mess="Junio";}
	if($mes=="07"){$mess="Julio";}
	if($mes=="08"){$mess="Agosto";}
	if($mes=="09"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}	
	$fechaNormal="$mess $dia, $year";
		
	if($hora!='00:00:00'){
 
	$horaS= explode(':',$hora);
	
	$horaP="am";
	
	if($horaS[0]>11){$horaP="pm";}
	
	$horaI=$horaS[0].":".$horaS[1];
	$fechaNormal=$fechaNormal.' '.$br.' '.$horaI.' '.$horaP;
	}
	
	return $fechaNormal;
	
}


function fechaIngHora($fechaEntrada)
{
$horaI=''; $horaP=''; $br='';
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$year= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	$dia = ltrim($dia, '0');
	if($mes=="01"){$mess="January";}
	if($mes=="02"){$mess="February";}
	if($mes=="03"){$mess="March";}
	if($mes=="04"){$mess="April";}
	if($mes=="05"){$mess="May";}
	if($mes=="06"){$mess="June";}
	if($mes=="07"){$mess="July";}
	if($mes=="08"){$mess="August";}
	if($mes=="09"){$mess="September";}
	if($mes=="10"){$mess="October";}
	if($mes=="11"){$mess="November";}
	if($mes=="12"){$mess="December";}
	
 $diaa=ordinal($dia);
	
	$fechaNormal="$mess $diaa, $year";
	
	if($hora!='00:00:00'){
	$br="<br>";
	$horaS= explode(':',$hora);
	$horaP="am";
	if($horaS[0]>11){$horaP="pm";}
	$horaI=$horaS[0].":".$horaS[1];
	$fechaNormal=$fechaNormal.' '.$br.' '.$horaI.' '.$horaP;
	}
	
	return $fechaNormal;
}

function fechaCompletaHora($fechaEntrada)
{

	$horaI=''; $horaP=''; $br='';
	$dayOfWeek = date("N", $fechaEntrada);
	
	$datetime = new DateTime($fechaEntrada);
	$dayOfWeek=$datetime->format('N');
	
	if($dayOfWeek==1){$dayOfWeek="Lunes";}
	if($dayOfWeek==2){$dayOfWeek="Martes";}
	if($dayOfWeek==3){$dayOfWeek="Miércoles";}
	if($dayOfWeek==4){$dayOfWeek="Jueves";}
	if($dayOfWeek==5){$dayOfWeek="Viernes";}
	if($dayOfWeek==6){$dayOfWeek="Sábado";}
	if($dayOfWeek==7){$dayOfWeek="Domingo";}
	
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	if($hora!='00:00:00'){
	$br="<br>";
	$horaS= explode(':',$hora);
	
	$horaP="am";
	
	if($horaS[0]>11){$horaP="pm";}
	
	$horaI=$horaS[0].":".$horaS[1];
	}
	
	$separar2 = explode('-',$fecha);
	$año= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	if($mes=="01"){$mess="Enero";}
	if($mes=="02"){$mess="Febrero";}
	if($mes=="03"){$mess="Marzo";}
	if($mes=="04"){$mess="Abril";}
	if($mes=="05"){$mess="Mayo";}
	if($mes=="06"){$mess="Junio";}
	if($mes=="07"){$mess="Julio";}
	if($mes=="08"){$mess="Agosto";}
	if($mes=="09"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}	
	
	$fechaNormal="$dayOfWeek $dia de $mess de $año $br $horaI $horaP";
	return $fechaNormal;
	
}
function fechaCompletaHoraEn($fechaEntrada)
{

	$horaI=''; $horaP=''; $br='';
	$dayOfWeek = date("N", $fechaEntrada);
	
	$datetime = new DateTime($fechaEntrada);
	$dayOfWeek=$datetime->format('N');
	
	if($dayOfWeek==1){$dayOfWeek="Monday";}
	if($dayOfWeek==2){$dayOfWeek="Tuesday";}
	if($dayOfWeek==3){$dayOfWeek="Wednesday";}
	if($dayOfWeek==4){$dayOfWeek="Thursday";}
	if($dayOfWeek==5){$dayOfWeek="Friday";}
	if($dayOfWeek==6){$dayOfWeek="Saturday";}
	if($dayOfWeek==7){$dayOfWeek="Sunday";}
	
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	if($hora!='00:00:00'){
	$br="<br>";
	$horaS= explode(':',$hora);
	
	$horaP="am";
	
	if($horaS[0]>11){$horaP="pm";}
	
	$horaI=$horaS[0].":".$horaS[1];
	}
	
	$separar2 = explode('-',$fecha);
	$año= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	if($mes=="01"){$mess="January";}
	if($mes=="02"){$mess="February";}
	if($mes=="03"){$mess="March";}
	if($mes=="04"){$mess="April";}
	if($mes=="05"){$mess="May";}
	if($mes=="06"){$mess="June";}
	if($mes=="07"){$mess="July";}
	if($mes=="08"){$mess="August";}
	if($mes=="09"){$mess="September";}
	if($mes=="10"){$mess="October";}
	if($mes=="11"){$mess="November";}
	if($mes=="12"){$mess="December";}	
	
	$fechaNormal="$dayOfWeek $dia de $mess de $año $br $horaI $horaP";
	return $fechaNormal;
}


function fechaletraDia($fechaEntrada)
{
	$dayOfWeek = date("N", $fechaEntrada);
	
	$datetime = new DateTime($fechaEntrada);
	$dayOfWeek=$datetime->format('N');
	
	if($dayOfWeek==1){$dayOfWeek="Lun";}
	if($dayOfWeek==2){$dayOfWeek="Mar";}
	if($dayOfWeek==3){$dayOfWeek="Mie";}
	if($dayOfWeek==4){$dayOfWeek="Jue";}
	if($dayOfWeek==5){$dayOfWeek="Vie";}
	if($dayOfWeek==6){$dayOfWeek="Sáb";}
	if($dayOfWeek==7){$dayOfWeek="Dom";}
	
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$año= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	if($mes=="01"){$mess="Ene";}
	if($mes=="02"){$mess="Feb";}
	if($mes=="03"){$mess="Mar";}
	if($mes=="04"){$mess="Abr";}
	if($mes=="05"){$mess="May";}
	if($mes=="06"){$mess="Jun";}
	if($mes=="07"){$mess="Jul";}
	if($mes=="08"){$mess="Ago";}
	if($mes=="09"){$mess="Sep";}
	if($mes=="10"){$mess="Oct";}
	if($mes=="11"){$mess="Nov";}
	if($mes=="12"){$mess="Dic";}	
	
	$fechaNormal="$dayOfWeek $dia/$mess/$año";
	return $fechaNormal;
	
}
function fechaletraHora($fechaEntrada)
{
	$separar = explode(' ',$fechaEntrada);
	$fecha= $separar[0];	
	$hora= $separar[1];	
	
	$separar2 = explode('-',$fecha);
	$año= $separar2[0];	
	$mes= $separar2[1];	
	$dia=$separar2[2];
	if($mes=="01"){$mess="Ene";}
	if($mes=="02"){$mess="Feb";}
	if($mes=="03"){$mess="Mar";}
	if($mes=="04"){$mess="Abr";}
	if($mes=="05"){$mess="May";}
	if($mes=="06"){$mess="Jun";}
	if($mes=="07"){$mess="Jul";}
	if($mes=="08"){$mess="Ago";}
	if($mes=="09"){$mess="Sep";}
	if($mes=="10"){$mess="Oct";}
	if($mes=="11"){$mess="Nov";}
	if($mes=="12"){$mess="Dic";}	
	$fechaNormal="$dia/$mess/$año $hora";
	return $fechaNormal;
	
}
	
	function mesNumero($mes)
	{
	if($mes=="1"){$mess="Ene";}
	if($mes=="2"){$mess="Feb";}
	if($mes=="3"){$mess="Mar";}
	if($mes=="4"){$mess="Abr";}
	if($mes=="5"){$mess="May";}
	if($mes=="6"){$mess="Jun";}
	if($mes=="7"){$mess="Jul";}
	if($mes=="8"){$mess="Ago";}
	if($mes=="9"){$mess="Sep";}
	if($mes=="10"){$mess="Oct";}
	if($mes=="11"){$mess="Nov";}
	if($mes=="12"){$mess="Dic";}
	
	return $mess;
	}
	
	function mesNumeroEn($mes)
	{
	if($mes=="1"){$mess="Jan";}
	if($mes=="2"){$mess="Feb";}
	if($mes=="3"){$mess="Mar";}
	if($mes=="4"){$mess="Apr";}
	if($mes=="5"){$mess="May";}
	if($mes=="6"){$mess="Jun";}
	if($mes=="7"){$mess="Jul";}
	if($mes=="8"){$mess="Aug";}
	if($mes=="9"){$mess="Sep";}
	if($mes=="10"){$mess="Oct";}
	if($mes=="11"){$mess="Nov";}
	if($mes=="12"){$mess="Dec";}
	
	return $mess;
	}
	
	function mesNombre($mes)
	{
	if($mes=="1"){$mess="Enero";}
	if($mes=="2"){$mess="Febrero";}
	if($mes=="3"){$mess="Marzo";}
	if($mes=="4"){$mess="Abril";}
	if($mes=="5"){$mess="Mayo";}
	if($mes=="6"){$mess="Junio";}
	if($mes=="7"){$mess="Julio";}
	if($mes=="8"){$mess="Agosto";}
	if($mes=="9"){$mess="Septiembre";}
	if($mes=="10"){$mess="Octubre";}
	if($mes=="11"){$mess="Noviembre";}
	if($mes=="12"){$mess="Diciembre";}
	
	return $mess;
	}	
	
	function mesNombreC($mes)
	{
	if($mes=="1"){$mess="ENE";}
	if($mes=="2"){$mess="FEB";}
	if($mes=="3"){$mess="MAR";}
	if($mes=="4"){$mess="ABR";}
	if($mes=="5"){$mess="MAY";}
	if($mes=="6"){$mess="JUN";}
	if($mes=="7"){$mess="JUL";}
	if($mes=="8"){$mess="AGO";}
	if($mes=="9"){$mess="SEP";}
	if($mes=="10"){$mess="OCT";}
	if($mes=="11"){$mess="NOV";}
	if($mes=="12"){$mess="DIC";}
	
	return $mess;
	}
	
	function mesNombreEn($mes)
	{
	if($mes=="1"){$mess="January";}
	if($mes=="2"){$mess="February";}
	if($mes=="3"){$mess="March";}
	if($mes=="4"){$mess="April";}
	if($mes=="5"){$mess="May";}
	if($mes=="6"){$mess="June";}
	if($mes=="7"){$mess="July";}
	if($mes=="8"){$mess="August";}
	if($mes=="9"){$mess="September";}
	if($mes=="10"){$mess="October";}
	if($mes=="11"){$mess="November";}
	if($mes=="12"){$mess="December";}
	
	return $mess;
	}
	
	
	function diaSemana($dayOfWeek){
	
	if($dayOfWeek==1){$dayOfWeek="Lunes";}
	if($dayOfWeek==2){$dayOfWeek="Martes";}
	if($dayOfWeek==3){$dayOfWeek="Miércoles";}
	if($dayOfWeek==4){$dayOfWeek="Jueves";}
	if($dayOfWeek==5){$dayOfWeek="Viernes";}
	if($dayOfWeek==6){$dayOfWeek="Sábado";}
	if($dayOfWeek==7){$dayOfWeek="Domingo";}
	return $dayOfWeek;
	}	

	function diaSemanita($dayOfWeek){
	
	if($dayOfWeek==1){$dayOfWeek="LUN";}
	if($dayOfWeek==2){$dayOfWeek="MAR";}
	if($dayOfWeek==3){$dayOfWeek="MIÉ";}
	if($dayOfWeek==4){$dayOfWeek="JUE";}
	if($dayOfWeek==5){$dayOfWeek="VIE";}
	if($dayOfWeek==6){$dayOfWeek="SÁB";}
	if($dayOfWeek==7){$dayOfWeek="DOM";}
	return $dayOfWeek;
	}	
	
	function diaSemanitaEn($dayOfWeek){
	
	if($dayOfWeek==1){$dayOfWeek="MON";}
	if($dayOfWeek==2){$dayOfWeek="TUE";}
	if($dayOfWeek==3){$dayOfWeek="WED";}
	if($dayOfWeek==4){$dayOfWeek="THU";}
	if($dayOfWeek==5){$dayOfWeek="FRI";}
	if($dayOfWeek==6){$dayOfWeek="SAT";}
	if($dayOfWeek==7){$dayOfWeek="SUN";}
	return $dayOfWeek;
	}	

	
	function diaSemanaC($dayOfWeek){
	
	if($dayOfWeek==1){$dayOfWeek="Lun";}
	if($dayOfWeek==2){$dayOfWeek="Mar";}
	if($dayOfWeek==3){$dayOfWeek="Mié";}
	if($dayOfWeek==4){$dayOfWeek="Jue";}
	if($dayOfWeek==5){$dayOfWeek="Vie";}
	if($dayOfWeek==6){$dayOfWeek="Sáb";}
	if($dayOfWeek==7){$dayOfWeek="Dom";}
	return $dayOfWeek;
	}
	
	
	
	function mesYear($cual){
	$cual=explode('-',$cual);
	
	$cual=mesNombre($cual[1])." ".$cual[0];
	
	return $cual;
	}
	
function mataMalosCodigo($matado)
{
//$matado=strtolower($matado);
$matado= str_replace( 'SELECT FROM', 'no code allowed', $matado );
$matado= str_replace( 'select from', 'no code allowed', $matado );
$matado= str_replace( '<?', 'no code allowed', $matado );
$matado= str_replace( '?>', 'no code allowed', $matado );
$matado= str_replace( '|', '&#124;', $matado );
$matado= str_replace( "'", "&rsquo;", $matado );
return $matado;
}
function ponCodigo($matado)
{
//$matado=strtolower($matado);
 
$matado= str_replace( '&#124;', '|', $matado );
$matado= str_replace( "&rsquo;", "'", $matado );
return $matado;
}
function mataMalos($matado)
{
$matado= str_replace( '?', '&#63;', $matado );
$matado= str_replace( '<', '&lt;', $matado );
$matado= str_replace( '>', '&gt;', $matado );
$matado= str_replace( '||', ' ', $matado );
$matado= str_replace( '%', '&#37;', $matado );
$matado= str_replace( ':', '&#58;', $matado );
$matado= str_replace( '"', '&quot;', $matado );
$matado= str_replace( '/', '&#47;', $matado );
$matado= str_replace( "'", "&rsquo;", $matado );
$matado= str_replace( "=", "&#61;", $matado );
$matado= str_replace( "(", "&#40;", $matado );
$matado= str_replace( ")", "&#41;", $matado );
$matado= str_replace( "$", "&#36;", $matado );
$matado= str_replace( "/pre", "/div", $matado );
$matado= str_replace( "<pre", "<div", $matado );
return trim($matado);
}
function limpiaGET($elemento)
{
$elemento = preg_replace('/\/{[\w\-\_]+}/', '',  $elemento);
return $elemento;
}
function letrasNumeros($elemento)
{
$elemento = preg_replace('/[^\w]/', '', $elemento);
return $elemento;
}
function mataMalosTin($matado)
{
$matado= str_replace( '</p>', '</br>', $matado );
$matado= str_replace( '<pre', '<p', $matado );
$matado= str_replace( '</prev>', '</p>', $matado );
$matado= str_replace( '<script>', '&lt;script&gt;>', $matado );
$matado= str_replace( '?', '&#63;', $matado );
$matado= str_replace( '|', ' ', $matado );
$matado= str_replace( '|', ' ', $matado );
$matado= str_replace( '%', '&#37;', $matado );
$matado= str_replace( "'", "&quot;", $matado );
$matado= str_replace( "(", "&#40;", $matado );
$matado= str_replace( ")", "&#41;", $matado );
$matado= str_replace( "$", "&#36;", $matado );
$matado= str_replace( "</pre", "</div", $matado );
$matado= str_replace( "<pre", "<div", $matado );
return $matado;
}
function calc_due_date( $date, $interval, $add, $return_date_format='Y-m-d' )
{
  $date  =  strtotime( $date );
  if( $date !== -1 )
  {
    $date  =  getdate( $date );
    switch( strtolower($interval) )
    {
      case  'month'  :  $date['mon']  +=  $add;  break;
      case  'day'    :  $date['mday'] +=  $add;  break;
      default        :  $date['year'] +=  $add;
    }
    return( date($return_date_format, mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year'])) );
  }
  return( false );
}
function quitaMin($matado)
{
$matado=trim($matado);
$matado= str_replace( '?', '', $matado );
$matado= str_replace( '¿', '', $matado );
$matado= str_replace( '!', '', $matado );
$matado= str_replace( '¡', '', $matado );
$matado= str_replace( '/', '', $matado );
$matado= str_replace( 'ß', 'b', $matado );
$matado= str_replace( 'ç', 'c', $matado );
$matado= str_replace( 'Ç', 'c', $matado );
$matado= str_replace( 'ø', 'o', $matado );
$matado= str_replace( 'Ø', 'o', $matado );
$matado= str_replace( 'å', 'a', $matado );
$matado= str_replace( 'Å', 'a', $matado );
	
$matado= str_replace( 'á', 'a', $matado );
$matado= str_replace( 'é', 'e', $matado );
$matado= str_replace( 'í', 'i', $matado );
$matado= str_replace( 'ó', 'o', $matado );
$matado= str_replace( 'ú', 'u', $matado );
$matado= str_replace( '&aacute;', 'a', $matado );
$matado= str_replace( '&eacute;', 'e', $matado );
$matado= str_replace( '&iacute;', 'i', $matado );
$matado= str_replace( '&oacute;', 'o', $matado );
$matado= str_replace( '&uacute;', 'u', $matado );
$matado= str_replace( '&Aacute;', 'A', $matado );
$matado= str_replace( '&Eacute;', 'E', $matado );
$matado= str_replace( '&Iacute;', 'I', $matado );
$matado= str_replace( '&Oacute;', 'O', $matado );
$matado= str_replace( '&Uacute;', 'U', $matado );
$matado= str_replace( 'Á', 'A', $matado );
$matado= str_replace( 'É', 'E', $matado );
$matado= str_replace( 'Í', 'I', $matado );
$matado= str_replace( 'Ó', 'O', $matado );
$matado= str_replace( 'Ú', 'U', $matado );
$matado= str_replace( 'â', 'a', $matado );
$matado= str_replace( 'ê', 'e', $matado );
$matado= str_replace( 'î', 'i', $matado );
$matado= str_replace( 'ô', 'o', $matado );
$matado= str_replace( 'û', 'u', $matado );
$matado= str_replace( 'Â', 'a', $matado );
$matado= str_replace( 'Ê', 'e', $matado );
$matado= str_replace( 'Î', 'i', $matado );
$matado= str_replace( 'Ô', 'o', $matado );
$matado= str_replace( 'Û', 'u', $matado );
$matado= str_replace( 'ä', 'a', $matado );
$matado= str_replace( 'ë', 'e', $matado );
$matado= str_replace( 'ï', 'i', $matado );
$matado= str_replace( 'ö', 'o', $matado );
$matado= str_replace( 'ü', 'u', $matado );
$matado= str_replace( 'Ä', 'a', $matado );
$matado= str_replace( 'Ë', 'e', $matado );
$matado= str_replace( 'Ï', 'i', $matado );
$matado= str_replace( 'Ö', 'o', $matado );
$matado= str_replace( 'Ü', 'u', $matado );
$matado= str_replace( 'à', 'a', $matado );
$matado= str_replace( 'è', 'e', $matado );
$matado= str_replace( 'ì', 'i', $matado );
$matado= str_replace( 'ò', 'o', $matado );
$matado= str_replace( 'ù', 'u', $matado );
$matado= str_replace( 'À', 'a', $matado );
$matado= str_replace( 'È', 'e', $matado );
$matado= str_replace( 'Ì', 'i', $matado );
$matado= str_replace( 'Ò', 'o', $matado );
$matado= str_replace( 'Ù', 'u', $matado );
$matado= str_replace( 'Ñ', 'n', $matado );
$matado= str_replace( 'ñ', 'n', $matado ); 
$matado= str_replace( "Ã'", "a", $matado );
$matado= str_replace( '&ntilde;', 'n', $matado );
$matado= str_replace( '&Ntilde;', 'n', $matado );
return $matado;
}
function nombreBonito($matado){
	$matado= quitaMin($matado);
	$matado=strtolower($matado);
	$matado = preg_replace('/\s+/', '-', $matado);
	$matado = preg_replace('/[^\w-]/', '', $matado);
	
	return $matado;
}
function nombreSku($matado){
	$matado= quitaMin($matado);
	$matado = preg_replace('/\s+/', '-', $matado);
	$matado = preg_replace('/[^\w-]/', '', $matado);
	
	return $matado;
}
function fechaEs($matado){
	$matado=explode('-',$matado);	
	$matado=$matado[2]."/".$matado[1]."/".$matado[0];
	return $matado;
}
function fechaBase($matado){
	$matado=explode('/',$matado);	
	$matado=$matado[2]."-".$matado[1]."-".$matado[0];
	return $matado;
}
function busqueda($matado)
{
$matado= str_replace( '-', ' ', $matado );
$matado= str_replace( 'ß', 'b', $matado );
$matado= str_replace( 'ç', 'c', $matado );
$matado= str_replace( 'Ç', 'c', $matado );
$matado= str_replace( 'ø', 'o', $matado );
$matado= str_replace( 'Ø', 'o', $matado );
$matado= str_replace( 'å', 'a', $matado );
$matado= str_replace( 'Å', 'a', $matado );
	
$matado= str_replace( 'á', 'a', $matado );
$matado= str_replace( 'é', 'e', $matado );
$matado= str_replace( 'í', 'i', $matado );
$matado= str_replace( 'ó', 'o', $matado );
$matado= str_replace( 'ú', 'u', $matado );
$matado= str_replace( '&aacute;', 'a', $matado );
$matado= str_replace( '&eacute;', 'e', $matado );
$matado= str_replace( '&iacute;', 'i', $matado );
$matado= str_replace( '&oacute;', 'o', $matado );
$matado= str_replace( '&uacute;', 'u', $matado );
$matado= str_replace( '&Aacute;', 'a', $matado );
$matado= str_replace( '&Eacute;', 'e', $matado );
$matado= str_replace( '&Iacute;', 'i', $matado );
$matado= str_replace( '&Oacute;', 'o', $matado );
$matado= str_replace( '&Uacute;', 'u', $matado );
$matado= str_replace( 'Á', 'a', $matado );
$matado= str_replace( 'É', 'e', $matado );
$matado= str_replace( 'Í', 'i', $matado );
$matado= str_replace( 'Ó', 'o', $matado );
$matado= str_replace( 'Ú', 'u', $matado );
$matado= str_replace( 'â', 'a', $matado );
$matado= str_replace( 'ê', 'e', $matado );
$matado= str_replace( 'î', 'i', $matado );
$matado= str_replace( 'ô', 'o', $matado );
$matado= str_replace( 'û', 'u', $matado );
$matado= str_replace( 'Â', 'a', $matado );
$matado= str_replace( 'Ê', 'e', $matado );
$matado= str_replace( 'Î', 'i', $matado );
$matado= str_replace( 'Ô', 'o', $matado );
$matado= str_replace( 'Û', 'u', $matado );
$matado= str_replace( 'ä', 'a', $matado );
$matado= str_replace( 'ë', 'e', $matado );
$matado= str_replace( 'ï', 'i', $matado );
$matado= str_replace( 'ö', 'o', $matado );
$matado= str_replace( 'ü', 'u', $matado );
$matado= str_replace( 'Ä', 'a', $matado );
$matado= str_replace( 'Ë', 'e', $matado );
$matado= str_replace( 'Ï', 'i', $matado );
$matado= str_replace( 'Ö', 'o', $matado );
$matado= str_replace( 'Ü', 'u', $matado );
$matado= str_replace( 'à', 'a', $matado );
$matado= str_replace( 'è', 'e', $matado );
$matado= str_replace( 'ì', 'i', $matado );
$matado= str_replace( 'ò', 'o', $matado );
$matado= str_replace( 'ù', 'u', $matado );
$matado= str_replace( 'À', 'a', $matado );
$matado= str_replace( 'È', 'e', $matado );
$matado= str_replace( 'Ì', 'i', $matado );
$matado= str_replace( 'Ò', 'o', $matado );
$matado= str_replace( 'Ù', 'u', $matado );
$matado= str_replace( 'Ñ', 'n', $matado );
$matado= str_replace( 'ñ', 'n', $matado ); 
$matado= str_replace( "Ã'", "n", $matado );
$matado= str_replace( '&ntilde;', 'n', $matado );
$matado= str_replace( '&Ntilde;', 'n', $matado );
return $matado;
}
function idioma($que,$idioma){
	$que=explode('|||',$que);
	$que=$que[$idioma];
	return  $que;
}
function timeAgo($time_elapsed){
$seconds = $time_elapsed ;
$minutes = round($time_elapsed / 60 );
$hours = round($time_elapsed / 3600);
$days = round($time_elapsed / 86400 );
$weeks = round($time_elapsed / 604800);
$months = round($time_elapsed / 2600640 );
$years = round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60){
	 $hace= " $seconds segundos";
}
//Minutes
if($minutes <=60){
	 if($minutes==1){
		$hace=" un minuto";
	 }
	 else{
		$hace= " $minutes minutos";
	 }
}
//Hours
else if($hours <=24){
 if($hours==1){
 $hace= " una hora";
 }else{
$hace= "   $hours horas";
 }
}
//Days
else if($days <= 7){
 if($days==1){
 $hace= "ayer";
 }else{
 $hace= " $days días";
 }
}
//Weeks
else if($weeks <= 4.3){
 if($weeks==1){
$hace= " una semana";
 }else{
 $hace= " $weeks semanas";
 }
}
//Months
else if($months <=12){
 if($months==1){
 $hace= " un mes";
 }else{
$hace= " $months meses";
 }
}
//Years
else{
 if($years==1){
 $hace= " un año";
 }else{
 $hace= " $years años";
 }
}
return  $hace;
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

function encripta($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = "3C30407D814990510C76107DE2BC140C88E21BB4FA4166773B3154F3718B68BC01EAC61A24161DFD93D750C0BB6C08B2A2084E57BD5D8FF2C0890930DE243F58A91B922873024A7E5B17EB3472EB2B47C81ABF28779FA67EA12A288DD962D803CF6BE728D56670E2A3C7D43C9D4F929E673AD37ED011B118A141DE383448";
    $secret_iv = 'F71F74AF2E3A';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
?>