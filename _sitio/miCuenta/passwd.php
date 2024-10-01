<? include_once "../sesion/arriba.php";  ?>
<div class="close material-icons">clear</div>

<div class="clear"></div>
<div class="div100 centrado tituloSeccion rosa" id="crearTitulo">Cambiar contraseña</div>



  
<div class="div50 padd5" id="anterior" >
<div class="div100">
<input type="password" class="field  validate[required]" required="required"  autocomplete="on"  name="contra" id="contra" auto placeholder="Password actual" onChange="buscaP(this.value)" />
<div class="material-icons cursor padd5" id="ojito" onClick="pass();" style="position: absolute; right: 0; top: 0; z-index: 9; opacity: .5">remove_red_eye</div>
</div>
</div>
 
 <div class="div100 padd10 centrado" id="creaCuentaResultado">





</div>

 


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

</script>