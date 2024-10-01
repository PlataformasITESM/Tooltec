<?
/**
 * Php function to crop an image
 * 
 * @param string $source_image Path of the source image
 * @param string $target_image Path of the target image
 * @param array $crop_area Array like array('left' => [LEFT], 'top' => [TOP],
 *                                          'width' => [WIDTH], => 'height' => [HEIGHT]) 
 */
function cropImage($source_image, $target_image, $crop_area)
{
    // detect source image type from extension
    $source_file_name = basename($source_image);
    $source_image_type = substr($source_file_name, -3, 3);
    
    // create an image resource from the source image  
    switch(strtolower($source_image_type))
    {
        case 'jpg':
            $original_image = imagecreatefromjpeg($source_image);
            break;
            
        case 'gif':
            $original_image = imagecreatefromgif($source_image);
            break;

        case 'png':
            $original_image = imagecreatefrompng($source_image);
            break;    
        
        default:
            trigger_error('cropImage(): Invalid source image type', E_USER_ERROR);
            return false;
    }
    
    // create a blank image having the same width and height as the crop area
    // this will be our cropped image
    $cropped_image = imagecreatetruecolor($crop_area['width'], $crop_area['height']);
    
    // copy the crop area from the source image to the blank image created above
    imagecopy($cropped_image, $original_image, 0, 0, $crop_area['left'], $crop_area['top'], 
              $crop_area['width'], $crop_area['height']);
 	
    // detect target image type from extension
    $target_file_name = basename($target_image);
    $target_image_type = substr($target_file_name, -3, 3);
    
    // save the cropped image to disk
    switch(strtolower($target_image_type))
    {
        case 'jpg':
            imagejpeg($cropped_image, $target_image, 100);
            break;
            
        case 'gif':
            imagegif($cropped_image, $target_image);
            break;

        case 'png':
            imagepng($cropped_image, $target_image, 0);
            break;    
        
        default:
            trigger_error('cropImage(): Invalid target image type', E_USER_ERROR);
            imagedestroy($cropped_image);
            imagedestroy($original_image);
            return false;
    }
    
    // free resources
    imagedestroy($cropped_image);
    imagedestroy($original_image);
    
    return true;
}



?>