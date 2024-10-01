<? include "../sesion/arriba.php";  
  $que=$_GET['que'];
 if($que=="header"){ ?>
 
<link href="<?=$url?>/_sitio/css/style.css?dsa=<?  echo aleatorio(4);?>" rel="stylesheet" type="text/css" />
<link href="<?=$url?>/_sitio/css/header.css" rel="stylesheet" type="text/css" />
 <? } ?>
 <?

 include $que.".php";
?>
