<? include_once "../../sesion/arriba.php"; 

$dondeSeccion="contenido";
include_once "../../sesion/mata.php"; 

$valor=limpiaGET($_GET['u']);
$valorO=$valor;
$d=limpiaGET($_GET['d']);
$t=limpiaGET($_GET['tipo']);
$prog=limpiaGET($_GET['prog']);
$versionVista=limpiaGET($_GET['V']);

	if($versionVista=='' && $versionVista!='original'){$versionVista=$versionActual;}
	
	if($versionVista=='original'){$versionVista='';}


$deboPermiso="";
$selas="SELECT * FROM secciones WHERE id='$valor'";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$tituloSeccion= $fila['titulo_es'];
	$permisos= unserialize($fila['permisos']);
	$deboPermiso=1;
		}
	
$selas="SELECT * FROM sitio WHERE id='1'";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$anchoSitio= $fila['ancho'];
	}
	//if($t!=""){$tituloSeccion=$t;}


$permisoCrear=1;
$permisoModificar=1;
$permisoEliminar=1;
$permisoReordenar=1;

include "indexTipos.php" ;

if($tipoU=="editor" && $deboPermiso==1){
	if($permisos[$quien]!="") {
	$permisosEdicion=$permisos[$quien];
	$permisoCrear=$permisosEdicion['crear'];
	$permisoModificar=$permisosEdicion['modificar'];
	$permisoEliminar=$permisosEdicion['eliminar'];
	$permisoReordenar=$permisosEdicion['reordenar'];
	}
	else {
	die();
	
	}
}


?>
<!DOCTYPE  >
<html  >
<head>

<? include "../../control/magia.php" ;?>
<? include "../../control/css.php" ?>
<?

$selas="SELECT * FROM codigo where sistema!='sys' ORDER BY orden ASC ";
$res65 = $mysqli->query($selas);
$res65->data_seek(0);
while ($fila = $res65->fetch_assoc()) 
	{
	$idCodigo= $fila['id'];
	$tipoCodigo= $fila['tipo'];
	$versionCodigo= $fila['version'];
if($tipoCodigo=="css"){ ?>
<link href="/codigo/<?=$idCodigo?>.css?u=<?=$versionCodigo?>" rel="stylesheet" type="text/css" />

<? }

}
?>


<script type="text/javascript" src="elementos.js" ></script>
 <script src="/ace/ace.js" type="text/javascript" charset="utf-8"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$nombreSistema?></title> 
	
 
	
</head>
<body> 
<div class="div100 alertas " id="granAlerta" style="  display: none; height: 100vh; background-color:rgba(64,64,64,0.90); position: fixed; z-index: 9999; padding: 20px; ">
<div class="div100" id="alertaContent" style="height: 100%; overflow: hidden; position: relative;">
<div class="clear40"></div>
 <div class=" " id="elementosAqui" style="height: calc(100% - 80px);background-color: #FFF; position: relative;   overflow-y: scroll;">
 </div>
 </div>
 
 </div> 
 
<input type="hidden" id="tipoContent" value="<?=$t?>">
 

<input type="hidden" id="tipoContentSeccion" value="<?=$tipoContentSeccion?>">

 <div class="contC">
 	
<div class="div100" style="position: fixed; z-index: 9;">
	<? include $ruta."/interfase/menu.php"; ?>
	<!--aqui-->
	<div class="div100 contenido">
		<? include "../../interfase/header.php"; ?>
		<div class="blanco10 padd5"    >
 <div class="titulos" style="width: 100%; padding-right: 20px; overflow-y: hidden; height: 40px;"  ><?=$tituloSeccion?></div>


<div class=" absolute  " style="height: 100%; right: 0; width: 200px">

<div class="left"  >
	<select name="versionS" id="versionS" onChange="vistaVersion(this.value);" style="background-color: #FFF; border: none;">


<option value="original" selected>Original</option>
		<? $selas="SELECT * FROM seccionesVersion WHERE idSeccion='$valorO' ORDER BY version ASC";
$res6 = $mysqli->query($selas);
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$laVersion= $fila['version'];
	$idV=$fila['id'];
	?>
	<option value="<?=$idV?>"><?=$laVersion?></option>
	<? } ?>
	</select>
</div>

<div class="left padd10"  >
<a onClick="agregaVersion('<?=$valorO?>'); return false;">
 <div class="right">Versiones</div>
</a>
</div>

</div>


</div>
</div>
			
		</div>


<div class="clear10"></div>
 
<div class="div100" > 
<? if($permisoCrear==1){ include "tabMenu.php"; }?>
<div class="div100" style="padding-left: 70px;">

<div class="clear" style="height: 110px;"></div>

<div id="sub"  >


	<div class="blanco10" id="contenidoAqui">
	<? include "acomodo.php"; ?>
	</div>
</div>
</div>
</div>
	 </div>
	 <? include "../../interfase/foot.php"; ?>
	 
</div>


<div style="clear:both;"></div>

<script>
$('.seccionMenuI').removeClass('seccionMenuP');
$('#c_<?=$estatus?>').addClass('seccionMenuP');
<? 	if($versionVista==''){$versionVista='original';} ?>
$('#versionS').val('<?=$versionVista?>');

function vistaVersion(v){
 window.location.href = '?u=<?=$valorO?>&tipo=<?=$t?>&V='+v;
}

</script>

<?

$mandaVersion="";
if($versionVista!="" && $versionVista!="original"){$mandaVersion="_".$versionVista;}
 
$url= $dominioFrente.'/_sitio/_secciones/cache.php?s='.$valorO.$mandaVersion;

$test = curl_init();
curl_setopt_array($test,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>100,CURLOPT_RETURNTRANSFER=>TRUE]);
curl_exec($test);
curl_close ($test); 
?>
</body>
</html>