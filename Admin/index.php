<? include_once "sesion/arriba.php";
$mete=$_SESSION['mientras'] ?? '';
$error=$_GET['error'] ?? '';

$recarga="No";

if(!isset($_SESSION[$huella.'_acceso']) ){
include "sesion/galleta.php";

}

	if(isset($_SESSION[$huella.'_acceso']) && $_SESSION[$huella.'_galleta']==$superGalleta){
include_once "indexAcceso.php";
	}

$estoyAfuera=1;
?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<? include"control/css.php" ?>
<? include "control/magia.php" ;?>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 

</head>
<body style="  height:100%; background-color:#FFF;">

<!--head-->

<!--head-->
<!--cont-->

<div class="contC"  >
<div class="contF" style="width:100%; ">

 
<div style=" width:300px;  position:absolute; top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);text-align:center;">
<img src="<?=$url?>/img/logo.svg?x=1" width="200px;" />
<div style="clear:both; height:20px;"></div>



<div class="table" style="color:#999; display: none;" id="mensajeNo" >
<div class="tableCell material-icons" style="width:30px;">warning</div>
<div class="tableCell" id="mensajeAqui">
</div>
</div>


<script>

if(localStorage['error']!=null){
$('#mensajeAqui').html(localStorage['error']);
$('#mensajeNo').fadeIn().delay(3000).fadeOut();
localStorage.removeItem('error');
}

</script>

<? if ($error==1){ ?>

<div class="table" style="color:#999;">
<div class="tableCell material-icons" style="width:30px;">warning</div>
<div class="tableCell">
El correo y la contraseña no coinciden
</div>
</div>
<div style="clear:both; height:20px;"></div>
<? } ?>



<? if ($mete>=10){ ?>

<div class="mensaje">
Demasiados intentos fallidos
</div>
<div style="clear:both; height:20px;"></div>

<? } ?>


<!--forma-->



<? if ($mete<10) { ?>

<form   action="<?=$url?>/_login/validate" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="key" value="" />
<input type="hidden" name="toq" value="<?=$elToken?>" />

<div class="div" style="opacity:.1"></div>
<input type="email" class="field"  name="correo" id="correo" placeholder="Correo" />
<div style="clear:both; height:10px;"></div>

 

 
<div class="div100">
<input type="password" class="field" required="required"  name="contra" id="contra" placeholder="Password" />
<div class="material-icons cursor padd3" id="ojito" onClick="pass();" style="position: absolute; right: 0; top: 0; z-index: 9; opacity: .5">remove_red_eye</div>
</div>


 
 
<div style="clear:both; height:10px;"></div>
<div class="load"><img src="<?=$url?>/img/load.gif"></div>
<div style="float:right; width:100%; display:flex;  " id="botons">
 
 <div style="flex:1;">
<input class="boton" style="width:100%;" id="boton" type="submit" value="Iniciar Sesión"/>
</div>
</div>


<div style="clear:both;"></div>


</form>
 
<? } ?>


<div class="clear20"></div>
<? /*
<a   href="<?=$url?>/_login/olvide" title="Olvidé mi contraseña" style="max-width:30px; flex:1;" >
Olvidé mi contraseña
</a>
*/ ?>
<div class="clear20"></div>


<div id="registro"></div>
<!--forma-->

</div>
</div>




<div id="aqui"></div>


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


<!--forma-->


</div>
</div>

<!--cont-->

<div style="clear:both;"></div>
<!--footer-->
<div class="footer">
 
</div>

<!--footer-->

</body>
</html>