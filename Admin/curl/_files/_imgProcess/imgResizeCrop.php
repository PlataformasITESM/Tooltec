<?		
//offsets



		if(($ancho != $imgAncho) && ($alto != $imgAlto)){
				
				if($ancho == $alto) {
				smart_resize_image( $ruta, $width = $imgAncho, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
			}	

				if($ancho < $alto) {
				smart_resize_image( $ruta, $width = $imgAncho, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
			}
			
				if($ancho > $alto) {
				smart_resize_image( $ruta, $width = $imgAncho, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
			}	


list($ancho, $alto) = getimagesize($ruta);

if(($alto < $imgAlto)) { 
smart_resize_image( $ruta, $width = 0, $height = $imgAlto, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
}

if(($ancho < $imgAncho)) { 
smart_resize_image( $ruta, $width = $imgAncho, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100) ;
}


list($ancho, $alto) = getimagesize($ruta);

if($ancho==$alto){$caso=1;}
if($ancho>$alto){$caso=1;}

if($ancho<$alto){$caso=2;}

//top
$offX=0; $offY=0;

//center
if($cropea==1){ $offY=($alto-$imgAlto)/2; $offY=floor($offY);}

//bottom
if($cropea==2){ $offY=$alto-$imgAlto; }


			$crop_area = array('top' => $offY, 'left' => 0, 'height' => $imgAlto, 'width' => $imgAncho);

cropImage($ruta, $ruta, $crop_area);
				
				
	}
			?>