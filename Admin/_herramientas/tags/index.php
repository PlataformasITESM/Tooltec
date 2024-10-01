<? include_once "../../sesion/arriba.php"; 
$dondeSeccion="herramientas";
include_once "../../sesion/mata.php"; 
?>
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>
<script type="text/javascript" src="js.js?f=<?=aleatorio(2);?>"></script>



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
<div class="div100">
<div class="titulos">herramientas </div>

</div>

<? include "../tabs.php"; ?>


<? 
//print_r($permisosU);
$puedoEditor=0;
 

if($tipoU=="admin" || $puedoEditor==1) { ?>
 <a href="tagsAdd" >
         <div class="botonSin left" id="c_agregar"  >
      <div class="material-icons ">add</div>
       		<div class=" div100 " >Agregar etiqueta</div>
</div>  
</a>

 

 <? } ?>

<? include "tagsTodos.php";?>
</div>


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 
    <script>
$('#q_tags').addClass('seccionMenuP');
</script>

</body>
</html>