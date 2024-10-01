<? if(isset($avatarU)){		$elAvatar="/avatars/".$quien."/".$avatarU;}else{
			$elAvatar="/img/noUser.png";
			}
			?>
<div class="menuRes" style=" height: 100vh; overflow-y: auto;">
<div class="close"  onclick="$('.menuRes').fadeOut();">x</div>
<div class="clear20"></div>
<div class="div100 centrado"><img src="/img/logo.svg" height="60"></div>
<div class="clear20"></div>
<? include($rutaServer.'/_sitio/recursos/menures_'.$idioma.'.html'); ?>

<? if($quien==""){ 

?>

 <div class="div50f padd20 centrado cursor"  onClick="login()" >
 <div class="div100 menuMenuEM ">
Iniciar sesión
 </div>
 </div>


<div class="div50f padd20 centrado cursor"  onClick="signup()" >
 <div class="div100 menuMenuEM ">
Crear cuenta
 </div>
 </div>
 
 <? } ?>

 <?
 	
 if($quien!="" && $soyAdmin!=1){ ?>
 <div class="clear20"></div>
 <div class="div"></div>
  <div class="clear20"></div>
 <div class="div100 centrado">
		<div class="avatar50" style=" background-image: url(<?=$elAvatar?>); float:none; display:inline-block;"></div>
		 </div>
	 
		
		
	
		<div class="div100 padd10 centrado" style="cursor: default;">Hola <?=$nombreU?></div>
		 
		 <div onClick="miInformacion();" class="div50f centrado padd10  ">Mi información</div> 
 

		 <div  onClick="miAvatar();"class="div50f padd10 centrado">Cambiar mi avatar</div> 
		 
		 <div onClick="miPassw();" class="div50f padd10 centrado">Cambiar mi contraseña</div> 
		 
		
		 
		 
		
		<div onClick="cierraSes()" class="div100 padd10 centrado">Cerrar sesión</div>
		
		 
		
		
 <? } ?>
</div>
 
<div id="load" class="load" ><img src="/img/load.gif"></div>
<div id="aqui"></div> 
 <div id="headerSiempre"  class="div100">
<div class="cont" style="height: 100%;"><div class="div100 contF" style="height: 100%;">
<div class="headerLogo">
<a href="/"><img src="/img/logo.svg" height="100%"></a>
</div>
<div class="div100" id="menuNormal" style="padding-left: 250px;">
<? include($rutaServer.'/_sitio/recursos/menu1_'.$idioma.'.html'); ?>

<? if($quien==""){ ?>

 <div class="menuMenuE  right"  onClick="login()" >
 <div class="div100 menuMenuEM ">
Iniciar sesión
 </div>
 </div>


<div class="menuMenuE right"  onClick="signup()" >
 <div class="div100 menuMenuEM ">
Crear cuenta
 </div>
 </div>
 
 <? } ?>

</div>

	<div class="  material-icons absoluteV cursor" style="right: 10px" id="iconMenu" onclick="$('.menuRes').fadeIn();" >menu</div>
	


 



 
<? if($quien!=""){
	
	
	
	?>
	
		<div id="granAvatar" <? if($soyAdmin!=1){ ?> onClick="$('#avatarDiv').show()" <? } ?> class="right padd5 cursor " style=" font-size: 12px; position: absolute; right: 0; top: 50%; transform: translateY(-50%)"> 
		<div class="avatar50" style=" background-image: url(<?=$elAvatar?>)"></div>
		<? if($soyAdmin!=1){ ?>
		<div  class="material-icons" style="font-size: 15px; line-height: 50px;">arrow_drop_down</div>
		
		
		<div id="avatarDiv" style="position: absolute; right: 25px; top: 60px; width: 200px; z-index: 9999; background-color: #FFF;   display:none; box-shadow: -1px 2px 5px 0px rgba(0,0,0,0.27);">
		<div class="div100 padd5 opacidad" style="cursor: default;">Hola <?=$nombreU?></div>
		<div class="div100" style="background-color: #ebebeb; height: 1px;"></div>
		 <div onClick="miInformacion();" class="div100 padd5 opacidad">Mi información</div> 
		<div class="div100" style="background-color: #ebebeb; height: 1px;"></div>

		 <div  onClick="miAvatar();"class="div100 padd5 opacidad">Cambiar mi avatar</div> 
		<div class="div100" style="background-color: #ebebeb; height: 1px;"></div>
		 <div onClick="miPassw();" class="div100 padd5 opacidad">Cambiar mi contraseña</div> 
		<div class="div100" style="background-color: #ebebeb; height: 1px;"></div>
		
		 
		
		<div onClick="cierraSes()" class="div100 padd5 opacidad">Cerrar sesión</div>
		
		</div>
		<? } ?>
		</div>
<? } ?>
</div></div>
</div> 
<div class="headeEspaciador"></div>
<script>
$('#mn_<?=$tituloMC?>').addClass('menuMenuEP');
	$(document).on('click', function (e) {
    if ($(e.target).closest("#granAvatar").length === 0) {
        $("#avatarDiv").hide();
		
    }
	});
</script>


 