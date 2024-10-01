<? include "../../sesion/arriba.php"; 
$conecta=1;
$dondeSeccion="menu";

include "../../sesion/mata.php"; 

if($sA!=1){
	die('<script>top.location.href = "/";</script>');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include "../../control/css.php" ?>
<? include "../../control/magia.php" ;?>

<script type="text/javascript" src="js.js?u=<?=aleatorio(3)?>"></script>


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
<div class="titulosDiv">
<div class="titulos">MENÚ COMUNICA</div>

</div>
 
 <div class="clear20"></div>

<div id="sub">

    
    
  <? include "menuMenuAddForma.php"; ?>  
 

</div>


</div>
 


<? include "../../interfase/foot.php"; ?>


</div>


<!--aqui-->

 

</div>

<div style="clear:both;"></div>

 

</body>
</html>