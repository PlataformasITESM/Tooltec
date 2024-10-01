<? include "../sesion/arriba.php";


$selas="SELECT * FROM usuariosF WHERE  id='$quien'   LIMIT 1";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc())
	{
	$password=$fila['contrasena'];

		 if(password_verify($cual, $password) ){
?> 


<form action="/_sitio/miCuenta/passwdP" method="post" enctype="multipart/form-data" id="forma2">
<input type="hidden" name="t" value="<?=$elToken?>">
 
<div class="div50 padd5" >
<div class="div100">
<input type="password" class="field  validate[required]" required="required"  autocomplete="on"  name="contra" id="contra" auto placeholder="Password" />
<div class="material-icons cursor padd5" id="ojito" onClick="pass();" style="position: absolute; right: 0; top: 0; z-index: 9; opacity: .5">remove_red_eye</div>
</div>
</div>


<div class="div50 padd5"  >
<div class="div100 centrado" style="display: none;" id="loadAqui"><img src="/ajax-loader.gif"></div>
<div class="botonEnviar div100" onClick="$('#forma2').submit();">Enviar</div>
</div>

<div class="div100 padd10 rojo" id="emailNo" style="display: none;"></div>


</form>




<script>
$('#anterior').remove();
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
<?
die();
		 }
		 
}


if($ok!=1){ ?>
 


<div class="div100 padd10 rojo" id="emailNo" >Contraseña incorrecta</div>

<? } ?>