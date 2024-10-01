<? include_once "../sesion/arriba.php";  ?>
<div class="close material-icons">clear</div>

<div class="clear"></div>

<div class="div100 centrado tituloSeccion rosa">Iniciar sesión</div>


<div class="div100 padd10 centrado" id="creaCuentaResultado">

 
</div>



<form action="/loginP" method="post" enctype="multipart/form-data" id="forma2">
<input type="hidden" name="key" value="" />
<input type="hidden" name="toq" value="<?=$elToken?>" />

<div class="div50 padd5">
<input type="text" class="field validate[required,custom[email]]" placeholder="Correo"  name="email" id="email" >
</div>

  
<div class="div50 padd5" >
<div class="div100">
<input type="password" class="field  validate[required]" required="required"  autocomplete="on"  name="contra" id="contra" auto placeholder="Password" />
<div class="material-icons cursor padd5" id="ojito" onClick="pass();" style="position: absolute; right: 0; top: 0; z-index: 9; opacity: .5">remove_red_eye</div>
</div>
</div> 

<? if($aviso==0){ ?>    
<div class="div50 padd5" >
<div class="div100">
<input type="checkbox" id"aviso" name="aviso" <? if($aviso==1){?> checked <? } ?>>Acepto el <a class="rosa" href="/aviso-de-privacidad">aviso de privacidad</a>
</div>
</div>
<? } ?>


<div class="div50 right padd5"  >
<div class="div100 centrado" style="display: none;" id="loadAqui"><img src="/ajax-loader.gif"></div>
<div class="botonEnviar div100" onClick="$('#forma2').submit();">Enviar</div>
</div>

<div class="div100 padd10 rojo" id="emailNo" style="display: none;"></div>


</form>
<div class="clear10"></div>
<div class="div100 centrado padd10"><a class=" " onClick="olvidon()">Olvidé mi contraseña </a></div>

<div class="clear10"></div>

<div class="div100 centrado padd10">¿No tienes cuenta? Regístrate <a class="rosa" onClick="signup()">aquí</a></div>

<script>
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
		$('#loadAqui').hide();
		$('.botonEnviar').show();
			 $('#creaCuentaResultado').addClass('rojo');
				 
				
				 }	
    }; 	
 $('#forma2').ajaxForm(optionss3);
</script>