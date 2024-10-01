<? include_once "../sesion/arriba.php";  ?>
<div class="close material-icons">clear</div>

<div class="clear"></div>
<div class="div100 centrado tituloSeccion rosa" id="crearTitulo">Crear cuenta</div>

<div class="div100 padd10 centrado" id="creaCuentaResultado">

 
Tu cuenta te permititá interactuar en las herramientas. 
</div>


<form action="/addUser" method="post" enctype="multipart/form-data" id="forma2">
<input type="hidden" name="key" value="" />
<input type="hidden" name="toq" value="<?=$elToken?>" />
<div class="div50 padd5">
<input type="text" class="field validate[required]" placeholder="Nombre(s)" name="nombre" id="nombre">
</div>

<div class="div50 padd5">
<input type="text" class="field validate[required]" name="apellido"  placeholder="Apellido(s)" id="apellido">
</div>

<div class="div50 padd5">
<input type="text" class="field validate[required,custom[email]]" placeholder="Correo" onChange="buscaCorreo(this.value,'')" name="email" id="email" >
</div>

<div class="div50 padd5">
<select name="trabajo" id="trabajo" class="validate[required]" onChange="insti(this.value)">
<option value="">Selecciona una institución</option>
<option value="Tec">Tec de Monterrey</option>
<option value="Universidad">Universidad</option>
<option value="Empresa">Empresa</option>
<option value="Otra">Otra</option>
</select>
 </div>
 
 
<div class="div50 padd5 opcis" id="divsoy" style="display: none;">
<select name="puesto" id="puesto" class="validate[required]"  >
<option value="">Soy</option>
<option value="Estudiante">Estudiante</option>
<option value="Profesor">Profesor</option>
<option value="Colaborador">Colaborador</option>
</select>
 </div>
 
 
<div class="div50 padd5 opcis" id="divno" style="display: none;">
	<input type="text" class="field validate[required]" name="otra"    id="otra">
</div>

<div class="div50 padd5 opcis" id="divtec" style="display: none;">
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
<div class="div50 padd5" >
<div class="div100">
<input type="password" class="field  validate[required]" required="required"  autocomplete="on"  name="contra" id="contra" auto placeholder="Password" />
<div class="material-icons cursor padd5" id="ojito" onClick="pass();" style="position: absolute; right: 0; top: 0; z-index: 9; opacity: .5">remove_red_eye</div>
</div>
</div>

    
<div class="div50 padd5" >
<div class="div100">
<input type="checkbox" id"aviso" name="aviso" value="1"  onClick="priva(this.value)">Acepto el <a class="rosa" href="/aviso-de-privacidad">aviso de privacidad</a>
</div>
</div>

<div class="clear"></div>    

<div class="div50 padd5 right"  >
<div class="div100 centrado" style="display: none;" id="loadAqui"><img src="/ajax-loader.gif"></div>
<div class="botonEnviar div100" onClick="$('#forma2').submit();" style="display: none">Enviar</div>
</div>

<div class="div100 padd10 rojo" id="emailNo" style="display: none;"></div>


</form>


<div class="div100 centrado padd10">¿Ya tienes cuenta? Inicia sesión <a class="rosa" onClick="login()">aquí</a></div>

<script>
function priva(cual) {
$('.botonEnviar').toggle();
   
}      
    
    
function insti(cual){
$('.opcis').hide();
$('#puesto').val('');
if(cual=='Tec'){$('#divtec').show(); $('#divsoy').show();}
if(cual=='Empresa'){$('#divno').show();  $('#otra').attr("placeholder", "Nombre de la empresa").val(''); }if(cual=='Otra'){$('#divno').show();  $('#otra').attr("placeholder", "Especificar").val(''); }
if(cual=='Universidad'){$('#divno').show(); $('#otra').attr("placeholder", "Nombre de la universidad").val(''); $('#divsoy').show(); $('#divsoy').show();} 
}

function pass(){
 var x = document.getElementById("contra");
  if (x.type === "password") {
  $('#ojito').css('opacity',1);
    x.type = "text";
  } else {
    x.type = "password";
	    $('#ojito').css('opacity',.5);
  }
}
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