<? include_once "../../sesion/arriba.php"; 

$dondeSeccion="usuariosSys";
include_once "../../sesion/mata.php"; 


$ver="editor";
?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js"></script>


<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$tituloURL?></title> 

</head>
<body>


 

<!--cont-->
<div class="contC">
 



<? include $ruta."/interfase/menu.php"; ?>

<!--aqui-->
<div class="contenido">

<? include "../../interfase/header.php"; ?>






<div id="sub">

<div class="titulos" style="text-transform:uppercase;">USUARIOS </div>


<? if($ver!=""){ ?>
<? include "usuariosTodos.php";?>
<? } ?>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 <script>
 
$('#m_<?=$ver?>').addClass('seccionMenuP');
 
</script>

</body>
</html>