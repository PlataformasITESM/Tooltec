<? include "../../../sesion/arriba.php";
include "../../../sesion/mata.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<? 
include "../../../control/magia.php"; 
include "../../../control/css.php"; 
?>
<script src="js.js?o=<?=aleatorio(3);?>" /></script>
<title>Blunia | <?=$urlD?></title>
</head>
<body>
<div id="headerBlunia"><? include "../../../interfase/header.php"; ?></div>



<div class="div100 padd10">
<? include "../../tabs.php"; ?>
<div id="contD">
<div id="subD">
<? include "../tabs.php" ?>
<? // aqui  //?>
<div class="blanco10N titulos20"><?=$tEstilos?></div>
<? include "tabs.php" ?>
<? include "estilosTodos.php"; ?>

<? // aqui  //?>
</div>

</div>



<div id="footer"><? include "../../../interfase/foot.php"; ?></div>

</body>
</html>

<script>
$('#tab_estilos, #c_estilo').addClass('seccionMenuP').removeClass('seccionMenuI');

</script>