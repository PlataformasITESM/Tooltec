<?php
$csp = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';";
header("Content-Security-Policy: $csp"); 



function aleatorio($cuantos) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $cuantos; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


if(!function_exists('get_string_between'))
{
  
function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
  }
}

function password($strPlainText) {
    return crypt($strPlainText, '$6$rounds=4567$abcdefghijklmnop$');
 	}

function creaGET($proLiga){
	$confunde = substr(md5(uniqid(rand())),0,5);	
	$proLiga=$confunde.base64_encode(serialize($proLiga));
	return $proLiga;
}


function html2txt($document){ 
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
);
$text = preg_replace($search, '', $document); 
return $text; 
}

function humanFileSize($size,$unit="") {
  if( (!$unit && $size >= 1<<30) || $unit == "GB")
    return number_format($size/(1<<30),2)."GB";
  if( (!$unit && $size >= 1<<20) || $unit == "MB")
    return number_format($size/(1<<20),2)."MB";
  if( (!$unit && $size >= 1<<10) || $unit == "KB")
    return number_format($size/(1<<10),2)."KB";
  return number_format($size)." bytes";
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
	
	
function mataMalos($matado)
{
$matado= str_replace( 'SELECT FROM', 'no code allowed', $matado );
$matado= str_replace( 'select from', 'no code allowed', $matado );
$matado= str_replace( '?', '&#63;', $matado );
$matado= str_replace( '~', '&#126;', $matado );
$matado= str_replace( '<', '&#60;', $matado );
$matado= str_replace( '>', '&#62;', $matado );
$matado= str_replace( '|', '&#124;', $matado );
$matado= str_replace( '|', '&#124;', $matado );
$matado= str_replace( '%', '&#37;', $matado );
$matado= str_replace( ':', '&#58;', $matado );
$matado= str_replace( '"', '&quot;', $matado );
$matado= str_replace( '/', '&#47;', $matado );
$matado= str_replace( "'", "&rsquo;", $matado );
$matado= str_replace( "=", "&#61;", $matado );
$matado= str_replace( "(", "&#40;", $matado );
$matado= str_replace( ")", "&#41;", $matado );
$matado= str_replace( "$", "&#36;", $matado );
$matado= str_replace( "<div", "<p>", $matado );
$matado= str_replace( "</div>", "</p>", $matado );
return $matado;


}

function mataMalosCodigo($matado)
{
//$matado=strtolower($matado);
$matado= str_replace( 'SELECT FROM', 'no code allowed', $matado );
$matado= str_replace( 'select from', 'no code allowed', $matado );
$matado= str_replace( '<?', 'no code allowed', $matado );
$matado= str_replace( '?>', 'no code allowed', $matado );
$matado= str_replace( '|', '&#124;', $matado );
$matado= str_replace( 'script', 'no code allowed', $matado );
$matado= str_replace( "'", "&rsquo;", $matado );

return $matado;


}


function mataMalosCodigoJS($matado)
{
$matado= str_replace( '<?', 'no code allowed', $matado );
$matado= str_replace( 'exec(', 'no code allowed', $matado );
$matado= str_replace( 'exec (', 'no code allowed', $matado );
$matado= str_replace( '?>', 'no code allowed', $matado );
$matado= str_replace( "'", "&rsquo;", $matado );
$matado= str_replace( "|", "&#124;", $matado ); 
$matado= str_replace( "^", "&#94;;", $matado ); 





return $matado;


}

function limpiaGET($elemento)

{
$elemento = preg_replace('/[^\w.-]/', '', $elemento);
return $elemento;
}




function meteContenido($matado)
{
$matado= str_replace( '?', '&#63;', $matado );
$matado= str_replace( '<', '&lt;', $matado );
$matado= str_replace( '>', '&gt;', $matado );
$matado= str_replace( '|', ' ', $matado );
$matado= str_replace( '|', ' ', $matado );
$matado= str_replace( '%', '&#37;', $matado );
$matado= str_replace( ':', '&#58;', $matado );
$matado= str_replace( '"', '&quot;', $matado );
$matado= str_replace( '/', '&#47;', $matado );
$matado= str_replace( "'", "°", $matado );
$matado= str_replace( "=", "&#61;", $matado );
$matado= str_replace( "(", "&#40;", $matado );
$matado= str_replace( ")", "&#41;", $matado );
$matado= str_replace( "$", "&#36;", $matado );

$matado= str_replace( "<div", "<p>", $matado );
$matado= str_replace( "</div>", "</p>", $matado );

return $matado;


}


function mataMalosTin($matado)
{
$matado= str_replace( 'SELECT * FROM', 'no code allowed', $matado );
$matado= str_replace( 'select * from', 'no code allowed', $matado );
$matado= str_replace( '&lt;', '&#60;', $matado );
$matado= str_replace( '&gt;', '&#62;', $matado );
$matado= str_replace( '<pre', '<p', $matado );
$matado= str_replace( '</prev>', '</p>', $matado );
$matado= str_replace( '<script>', '&#60;script&#62;>', $matado );
$matado= str_replace( '</script>', '&#60;script&#62;>', $matado );
$matado= str_replace( '?', '&#63;', $matado );
$matado= str_replace( '|', '&#124;', $matado );
$matado= str_replace( '|', '&#124;', $matado );
$matado= str_replace( '%', '&#37;', $matado );
$matado= str_replace( "'", "&rsquo;", $matado );
$matado= str_replace( "(", "&#40;", $matado );
$matado= str_replace( ")", "&#41;", $matado );
$matado= str_replace( "$", "&#36;", $matado );

$matado= str_replace( '~', '&#126;', $matado );
$matado= str_replace( '<?', '', $matado );


return $matado;


}
function busqueda($matado)
{

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

function quitaMin($matado)
{

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

$matado= preg_replace("/[^a-z0-9-_]/", "", $matado);
return $matado;
}


function nombreBonito($matado){
	$matado=strtolower($matado);
	
	$matado= str_replace( '/', '', $matado );
	
	$matado= str_replace( ' ', '-', $matado );
	$matado = preg_replace('/\s+/', '-', $matado);
	$matado= quitaMin($matado);
	return $matado;
}


function quitaInjection($matado)
{
 
$matado= str_replace( "'", "°", $matado );	
$matado= str_replace( '\°', '"', $matado );	
$matado= str_replace( "union", " ", $matado );	
$matado= str_replace( "where", " ", $matado );	
$matado= str_replace( "select", " ", $matado );	
$matado= str_replace( "<script", " ", $matado );
$matado= str_replace( "UNION", " ", $matado );	
$matado= str_replace( "WHERE", " ", $matado );	
$matado= str_replace( "SELECT", " ", $matado );	
$matado= str_replace( "<script", " ", $matado );	
$matado= str_replace( "<SCRIPT", " ", $matado );	
$matado= str_replace( "<?", " ", $matado );	
	
return $matado;
}

	
?>