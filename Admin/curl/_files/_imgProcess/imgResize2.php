            <?
//img

if($ancho > $imgAncho || $alto > $imgAlto)

{
			if($ancho == $alto ) 
			{
				smart_resize_image( $ruta, $width = 0, $height = $imgAlto, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}	
			

			if($ancho < $alto ) {
				
				smart_resize_image( $ruta, $width = $imgAncho, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}	
			
			
			if($ancho > $alto ) {
					
				smart_resize_image( $ruta, $width = 0, $height = $imgAlto, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}	
			
				
			
}
else

{

smart_resize_image( $ruta, $width = $ancho, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
}
			?>