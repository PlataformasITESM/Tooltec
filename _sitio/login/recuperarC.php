<? include_once "../sesion/arriba.php"; 

$c=mataMalos($c);
$u=mataMalos($u);

 $res6 = $mysqli->query("SELECT * FROM usuariosF WHERE id='$u'  AND   clave='$c' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
 	$clave= $fila['clave'];
 	$hanPasado=($hoySt-$clave)/60;
		
}
 
 if($clave=="" || $hanPasado>15) {
 $_SESSION['mata']=$_SESSION['mata']+1;
 ?>
 <script>top.location.href = "/";</script>	
 <?
  die();
  }
   if($clave!="" || $hanPasado<15) {
?>
<div class="close material-icons">clear</div>

<div class="clear"></div>

<div class="div100 centrado tituloSeccion rosa">Cambiar contraseña</div>


<div class="div100 padd10 centrado" id="creaCuentaResultado">
 
</div>



<form action="/cambiaC" method="post" enctype="multipart/form-data" id="forma2">
<input type="hidden" name="t" value="<?=$elToken?>">
<input type="hidden" name="c" value="<?=$c?>">
<input type="hidden" name="u" value="<?=$u?>">

 
 

  
<div class="div50 padd5" >
<div class="div100">
<input type="password" class="field  validate[required]" required="required"  autocomplete="on"  name="contra" id="contra" auto placeholder="Nueva contraseña" />
<div class="material-icons cursor padd5" id="ojito" onClick="pass();" style="position: absolute; right: 0; top: 0; z-index: 9; opacity: .5">remove_red_eye</div>
</div>
</div>



<div class="div50 right padd5"  >
<div class="div100 centrado" style="display: none;" id="loadAqui"><img src="/ajax-loader.gif"></div>
<div class="botonEnviar div100" onClick="$('#forma2').submit();">Enviar</div>
</div>

<div class="div100 padd10 rojo" id="emailNo" style="display: none;"></div>


</form>


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
			 $('#forma2').hide();
			 
				
				 }	
    }; 	
 $('#forma2').ajaxForm(optionss3);
</script>
<? } ?>