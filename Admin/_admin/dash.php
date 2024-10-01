<style>
.titulos1 { color:#000; font-weight:500; font-size:22px; float:left; text-transform:uppercase; font-family: 'Montserrat', sans-serif;}
.titulos2 { color:#000; font-weight:500; font-size:18px; float:left; text-transform:uppercase; font-family: 'Montserrat', sans-serif; opacity: .8}
.titulos3 { color:#000; font-weight:500; font-size:14px; float:left; text-transform:uppercase; font-family: 'Montserrat', sans-serif; opacity: .6}
</style>
<?
$herras=array();
$selas="SELECT * FROM herramientas ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$herras[$fila['id']]=$fila['titulo_es'];
}
$expes=array();
$selas="SELECT * FROM expertos ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$expes[$fila['id']]=$fila['titulo_es'];
}
$inicio=limpiaGet($_GET['i']  ?? '');
$fin=limpiaGet($_GET['f'] ?? '');

if($inicio==""){
//$inicio=date('Y').'-'.date('m').'-01';
$inicio=date('Y-m').'-01';
$fin=date('Y-m-t');
}

if($inicio!=""){$fechaI=$inicio; $fechaF=$fin;}
//reglas
if($fechaI=="" && $fechaF==""){$fechaBusca="AND cuando='$hoyBusca'";}
if($fechaI!="" && $fechaF==""){$fechaBusca="AND cuando='$fechaI'";}
if($fechaF!="" && $fechaI==""){$fechaBusca="AND cuando='$fechaF'";}

if($fechaF!="" && $fechaI!=""){
		if($fechaF==$fechaI){
		$fechaBusca="AND   date(cuando) ='$fechaI'";
		}
		if($fechaF>$fechaI){
		$fechaBusca= "AND date(cuando) between '$fechaI' AND '$fechaF'";
		}
		if($fechaI>$fechaF){
		$fechaBusca= "AND date(cuando) between '$fechaF' AND '$fechaI'";
		}
	}

//


$dias=strtotime($fin)-strtotime($inicio);
$dias=timeAgo($dias);
if(!isset($guia)){$guia=$inicio;}
?>
<div class="blanco10">  
<div class="tableCell">
<div style=" float:left; margin-right:10px; ">
<input type="date" id="fechaI" value="<?=$inicio?>">
</div>
<div style=" float:left; margin-right:10px; ">
<input type="date" id="fechaF" value="<?=$fin?>">
</div>
<div onclick="busca();" class="material-icons ocultaOff left" style="cursor:pointer; ">search</div>
</div>
</div>

<script>
function busca(c){
var fechaI=$('#fechaI').val();
var fechaF=$('#fechaF').val();
top.location.href = "?i="+fechaI+"&f="+fechaF;	
}
 

</script>
 
<div class="div100 padd20">
<div class="titulos"><?=$dias?></div>
<div class="clear10"></div>



<div class="left" style="background-color: #FFF; margin: 0 20px 20px 0; padding: 15px; border-radius: 10px;">
<div class=" div100 mensaje">
<div class="material-icons" style="font-size: 16px">users</div>
<div class="div100 titulos3" style="opacity: 1"> registros</div>
</div>
<div class="div"></div>
<div class="clear"></div>
<? 
//las herramientas

$registros=0;
$selas="SELECT * FROM usuariosF WHERE  id!=''    $fechaBusca    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$registros=$registros+1;
}
?>
<? if($registros>0){ ?>
<div class="div100 centrado titulos1" style="font-size: 40px">
<?=$registros?> 
</div>
<? } ?>
<? if($registros==0){?><div class="clear10"></div> <div class="titulos3">:( sin registros</div><? } ?>
</div>



<div class="left" style="background-color: #FFF; margin: 0 20px 20px 0; padding: 15px; border-radius: 10px;">
<div class=" div100 mensaje">
<div class="material-icons" style="font-size: 16px">visibility</div>
<div class="div100 titulos3" style="opacity: 1"> herramientas Vistas</div>
</div>
<div class="div"></div>
<div class="clear"></div>
<? 
//las herramientas
$arregloHerramientasV=array();
$no=1;
$selas="SELECT * FROM herramientasVistas WHERE  idHerramienta!=''    $fechaBusca    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$no="";
$sumi=$arregloHerramientasV[$fila['idHerramienta']] ?? 0;
$arregloHerramientasV[$fila['idHerramienta']]=$sumi+1;
}
arsort($arregloHerramientasV);
$cuenta=1;
foreach($arregloHerramientasV as $es => $cua){ 
if($cuenta<=3){
?>
<div class="titulos<?=$cuenta?>">
<?=$herras[$es]?>  <?=$cua?>
</div>
<div class="clear"></div>
<? } $cuenta++;}

?>
<? if($no==1){?><div class="clear10"></div> <div class="titulos3">:( sin vistas</div><? } ?>
</div>

<div class="left" style="background-color: #FFF; margin: 0 20px 20px 0; padding: 15px; border-radius: 10px;">
<div class=" div100 mensaje">
<div class="material-icons" style="font-size: 16px">favorite</div>
<div class="div100 titulos3" style="opacity: 1"> herramientas Likes</div>
</div>
<div class="div"></div>
<div class="clear"></div>
<? 
//las herramientas
$arregloHerramientasL=array();
$no=1;
$selas="SELECT * FROM herramientasLikes WHERE  idHerramienta!=''    $fechaBusca    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$no="";
$arregloHerramientasL[$fila['idHerramienta']]=$arregloHerramientasL[$fila['idHerramienta']]+1;
}
arsort($arregloHerramientasL);
$cuenta=1;
foreach($arregloHerramientasL as $es => $cua){ 
if($cuenta<=3){
?>
<div class="titulos<?=$cuenta?>">
<?=$herras[$es]?>  <?=$cua?>
</div>
<div class="clear"></div>
<? } $cuenta++;}

?>
<? if($no==1){?><div class="clear10"></div> <div class="titulos3">:( sin likes</div><? } ?>
</div>



<div class="left" style="background-color: #FFF; margin: 0 20px 20px 0; padding: 15px; border-radius: 10px;">
<div class=" div100 mensaje">
<div class="material-icons" style="font-size: 16px">visibility</div>
<div class="div100 titulos3" style="opacity: 1"> expertos Vistas</div>
</div>
<div class="div"></div>
<div class="clear"></div>
<? 
//las herramientas
$arregloHerramientasV=array();
$no=1;
$selas="SELECT * FROM expertosVistas WHERE  idExperto!=''    $fechaBusca    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$no="";
$som=$arregloHerramientasV[$fila['idExperto']] ?? 0;
$arregloHerramientasV[$fila['idExperto']]=$som+1;
}
arsort($arregloHerramientasV);
$cuenta=1;
foreach($arregloHerramientasV as $es => $cua){ 
if($cuenta<=3){
?>
<div class="titulos<?=$cuenta?>">
<?=$expes[$es]?>  <?=$cua?>
</div>
<div class="clear"></div>
<? } $cuenta++;}

?>
<? if($no==1){?><div class="clear10"></div> <div class="titulos3">:( sin vistas</div><? } ?>
</div>

<div class="left" style="background-color: #FFF; margin: 0 20px 20px 0; padding: 15px; border-radius: 10px;">
<div class=" div100 mensaje">
<div class="material-icons" style="font-size: 16px">share</div>
<div class="div100 titulos3" style="opacity: 1"> expertos redes</div>
</div>
<div class="div"></div>
<div class="clear"></div>
<? 
//las herramientas
$arregloHerramientasL=array();
$no=1;
$selas="SELECT * FROM expertosRedes WHERE  idExperto!=''    $fechaBusca    ";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
$no="";
$arregloHerramientasL[$fila['idExperto']]=$arregloHerramientasL[$fila['idExperto']]+1;
}
arsort($arregloHerramientasL);
$cuenta=1;
foreach($arregloHerramientasL as $es => $cua){ 
if($cuenta<=3){
?>
<div class="titulos<?=$cuenta?>">
<?=$expes[$es]?>  <?=$cua?>
</div>
<div class="clear"></div>
<? } $cuenta++;}

?>
<? if($no==1){?><div class="clear10"></div> <div class="titulos3">:( sin redes</div><? } ?>
</div>

</div>