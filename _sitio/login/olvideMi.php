<? include_once "../sesion/arriba.php";  ?>
<div class="close material-icons">clear</div>

<div class="clear"></div>

<div class="div100 centrado tituloSeccion rosa">Olvidé mi contraseña</div>


<div class="div100 padd10 centrado" id="creaCuentaResultado">
 
 
</div>


<form action="forgot" method="post" enctype="multipart/form-data" id="forma2">
<input type="hidden" name="key" value="" />
<input type="hidden" name="toq" value="<?=$elToken?>" />
 

<div class="div50 padd5">
<input type="text" class="field validate[required,custom[email]]" placeholder="Correo"  name="email" id="email" >
</div>

 
<div class="div50 right padd5"  >
<div class="div100 centrado" style="display: none;" id="loadAqui"><img src="/ajax-loader.gif"></div>
<div class="botonEnviar div100" onClick="$('#forma2').submit();">Enviar</div>
</div>

<div class="div100 padd10 rojo" id="emailNo" style="display: none;"></div>


</form>
<div class="clear10"></div>

 

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
		$('.botonEnviar').show();
		$('#loadAqui').hide();
		$('#email').val('');
	 
				
				 }	
    }; 	
 $('#forma2').ajaxForm(optionss3);
</script>