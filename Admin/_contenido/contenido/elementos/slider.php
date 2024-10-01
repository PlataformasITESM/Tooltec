<?
	$estaImagen=explode(',',$imgV);
	$estaImagen=$estaImagen[0];
	$estaImagen=$arregloArchivos[$estaImagen.'imagenFront'];
	?>

<div class="elemento elementoSlider" style="height:<?=$alto?>px; background-image:url(<?=$estaImagen?>); background-size:cover; background-position:center center;">
  
  <div class="elementoSliderFI material-icons"> keyboard_arrow_left </div>
  <div class="elementoSliderFD material-icons"> keyboard_arrow_right </div>
  
</div>