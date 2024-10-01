<?
//thumb

if($ancho2 > $imgAncho2 || $alto2 > $imgAlto2)

{
			if($ancho2 == $alto2 ) 
			{
				smart_resize_image( $ruta2, $width = 0, $height = $imgAlto2, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}	
			

			if($ancho2 < $alto2 ) {
				
				smart_resize_image( $ruta2, $width = 0, $height = $imgAlto2, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}	
			
			
			if($ancho2 > $alto2 ) {
					
				smart_resize_image( $ruta2, $width = $imgAncho2, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			}	
			
				
			
}
else

{

smart_resize_image( $ruta2, $width = $ancho2, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
}
			?>