<? include "../sesion/arriba.php"; 
$error=$_GET['msj'];
$mete=$_SESSION['mientras'];
 die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include"../control/css.php" ?>
<? include "../control/magia.php" ;?>
<head>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 

</head>
<body style="  height:100%; background-color:#FFF;">


<!--head-->
 
<!--head-->

<!--cont-->
<div class="contC">
<div class="contF" style="width:100%;">

 

<div style=" width:300px;  position:absolute; top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);text-align:center;">
<img src="<?=$urlFront?>/img/logo.svg" height="40" />
<div class="clear"></div>

<div style="clear:both; height:20px;"></div>

<? if ($error!=""){ ?>
 
<div class="table" style="color:#999;">
<div class="tableCell material-icons" style="width:30px;">email</div>
<div class="tableCell">

Si el usuario está registrado, un correo fue enviado, por favor sigue las instrucciones.<br />
No olvides revisar tu bandeja de no deseado.
</div>
</div>
<script>
setTimeout(function() {
  window.location.href = "<?=$url?>/";
}, 5000);

</script>

 
<div style="clear:both; height:20px;"></div>
<div style="clear:both;"></div>
<a href="<?=$url?>">Iniciar sesión</a>


<div style="clear:both;"></div>
<? } ?>



<? if ($mete>=10){ ?>

<div class="mensaje">
Demasiados intentos fallidos. Por favor contacte al administrador.
</div>
<div style="clear:both; height:20px;"></div>

<? } ?>



<? if ($error=="" && $mete<10){ ?>
<!--forma-->
<form action="<?=$url?>/_login/forgot" method="post" enctype="multipart/form-data" id="forma">
<input type="hidden" name="key" value="" />
<input type="hidden" name="toq" value="<?=$elToken?>" />



<input type="text" class="field " required="required"  name="correo" id="correo" placeholder="Email" />
<div style="clear:both; height:10px;"></div>

<div class="load"></div>

<div style="float:right; width:100%; ">
<input class="boton" style="width:100%;"  id="boton" type="submit" value="Recuperar contraseña"/>
</div>
<div class="clear10"></div>
<a href="<?=$url?>/">Iniciar sesión</a>


<div style="clear:both;"></div>

</form>


<!--forma-->
</div>


</div>


 
<? } ?>
<!--forma-->





<div class="divB" style="margin-top:20px;"></div>

</div>
</div>

<!--cont-->


<div style="clear:both;"></div>


<!--footer-->
<div class="footer">



</div>
<!--footer-->

<div id="aqui"></div>
</body>
</html>