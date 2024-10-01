<?

$inicio=limpiaGet($_GET['i']);
$fin=limpiaGet($_GET['f']);

$guia=$_GET['g'];


if($inicio==""){
//$inicio=date('Y').'-'.date('m').'-01';
$inicio=date('Y-m').'-01';
$fin=date('Y-m-t');
}

if($inicio!=""){$fechaI=$inicio; $fechaF=$fin;}

if($guia==""){$guia=$inicio;}
?>
<div class="blanco10">  

<div class="tableCell">

<div style=" float:left; margin-right:10px; ">
Inicio
<input type="date" id="fechaI" value="<?=$inicio?>">
</div>

<div style=" float:left; margin-right:10px; ">
Fin
<input type="date" id="fechaF" value="<?=$fin?>">
</div>



<div style=" float:left; margin-right:10px; ">
Referencia
<input type="date" id="guia" value="<?=$guia?>">
</div>

<div onclick="busca();" class="material-icons ocultaOff left" style="cursor:pointer; margin-top: 20px">search</div>

</div>
</div>

<script>
function busca(c){

var fechaI=$('#fechaI').val();
var fechaF=$('#fechaF').val();
var guia=$('#guia').val();
top.location.href = "?u=<?=$valor?>&i="+fechaI+"&f="+fechaF+"&g="+guia;	
	
}
 

</script>