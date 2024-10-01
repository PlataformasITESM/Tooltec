

<div class="divi15"></div>
<div class="clear"></div>
<form action="<?=$url?>/_login/olvideCambiaProceso.php" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="key" value="" />
<input type="hidden" name="toq" value="<?=$elToken?>" />
<input type="hidden" name="c" value="<?=$codigo?>" />
<input type="hidden" name="u" value="<?=$usuaron?>" />

 
Hola, <?=$nombre?>
<div class="clear20"></div>


<div class="formaB">
 
<div class="formaC"><input id="contra" pattern=".{6,}" placeholder="Contraseña" required  name="contra"  type="password" class=" field password" title="MÍNIMO 6 CARACTERES" /></div>
</div>

<div class="formaB">
 
<div class="formaC"><input id="passw2" placeholder="Confirmar contraseña" required  name="passw"  type="password" class="  field password"  /></div>
</div>

 


<div class="divi15"></div>
<div class="load"></div>
<div style="float:right; width:100%; ">

<input class="boton" style="width:100%;" id="boton" type="submit" value="Cambiar contraseña"/>
<div style="clear:both;"></div>
</div>

</form>

<div id="aqui"></div>
<script type="text/javascript">

$( "#passw2" ).blur(function() {
  if($("#passw2").val()!=$("#contra").val() ){ $("#passw2").val('').attr("placeholder", "Las contraseñas no coinciden");}
});
 
</script>

