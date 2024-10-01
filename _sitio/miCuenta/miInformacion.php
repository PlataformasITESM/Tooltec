<? include_once "../sesion/arriba.php";  ?>
<div class="close material-icons">clear</div>

<div class="clear"></div>
<div class="div100 centrado tituloSeccion rosa" id="crearTitulo">Mi información</div>

<div class="clear20"></div>

<div id="creaCuentaResultado"></div>
 
<form action="/_sitio/miCuenta/miInformacionP" method="post" enctype="multipart/form-data" id="forma2">
<input type="hidden" name="t" value="<?=$elToken?>">
<div class="div50 padd5">
<input type="text" class="field validate[required]" placeholder="Nombre(s)" name="nombre" id="nombre" value="<?=$nombreU?>">
</div>

<div class="div50 padd5">
<input type="text" class="field validate[required]" name="apellido"  placeholder="Apellido(s)" id="apellido" value="<?=$apellidoU?>">
</div>

<div class="div50 padd5">
<input type="text" class="field validate[required,custom[email]]" readonly  value="<?=$correoU?>"  >
</div>
 

<div class="div50 padd5">
<select name="campus" id="campus" class="validate[required]">
<option value="">Campus</option>
<option value="Aguascalientes">	Aguascalientes</option>
<option value="Ciudad de México">	Ciudad de México</option>
<option value="Central de Veracruz">	Central de Veracruz</option>
<option value="Ciudad Juárez">	Ciudad Juárez</option>
<option value="Estado de México">	Estado de México</option>
<option value="Chihuahua">	Chihuahua</option>
<option value="Chiapas">	Chiapas</option>
<option value="Ciudad Obregón">	Ciudad Obregón</option>
<option value="Santa Fe">	Santa Fe</option>
<option value="Cuernavaca">	Cuernavaca</option>
<option value="Guadalajara">	Guadalajara</option>
<option value="Hidalgo">	Hidalgo</option>
<option value="Irapuato">	Irapuato</option>
<option value="Laguna">	Laguna</option>
<option value="León">	León</option>
<option value="Morelia">	Morelia</option>
<option value="Monterrey">	Monterrey</option>
<option value="Puebla">	Puebla</option>
<option value="Querétaro">	Querétaro</option>
<option value="Saltillo">	Saltillo</option>
<option value="Sinaloa">	Sinaloa</option>
<option value="San Luis Potosí">	San Luis Potosí</option>
<option value="Sonora Norte">	Sonora Norte</option>
<option value="Tampico">	Tampico</option>
<option value="Toluca">	Toluca</option>
<option value="Zacatecas">	Zacatecas</option>
</select>
</div>
 

<div class="div50 right padd5"  >
<div class="div100 centrado" style="display: none;" id="loadAqui"><img src="/ajax-loader.gif"></div>
<div class="botonEnviar div100" onClick="$('#forma2').submit();">Guardar</div>
</div>

<div class="div100 padd10 rojo" id="emailNo" style="display: none;"></div>


</form>

 

<script>
$('#campus').val('<?=$campusU?>');
$("#forma2").validationEngine({autoHidePrompt: true,autoHideDelay: 3000, scroll: false, fadeDuration: 0.3, promptPosition : "topRight" }); 
 var optionss3 = { 
        target:        '#creaCuentaResultado', 
		beforeSubmit : function(arr, $form, options){
		$('#loadAqui').show();
		$('.botonEnviar').hide();
		},
      	success: function(msg){
		$('.botonEnviar').show();
			  $('#forma2').hide();
			  
			 								
				 }	
    }; 	
 $('#forma2').ajaxForm(optionss3);
</script>