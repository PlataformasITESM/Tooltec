<? include "../../sesion/arriba.php"; 
$conecta=1;

include "../../sesion/mata.php"; 

if($sA!=1){
	die('<script>top.location.href = "/";</script>');
}



if($formA!="afecta"){
	
	
	
	$arregloPerfiles=array();
$res6 = $mysqli->query("SELECT * FROM usuariosPerfiles order by jerarquia ASC, nombre ASC  ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$perfil= $fila['tipo'];
	$nombrePerfil= $fila['nombre'];
	$arregloPerfiles[$perfil]=$nombrePerfil;
	}

$valor=$_GET['v'];
$valor=limpiaGet($valor);

$idMenu=limpiaGet($_GET['i']);



 $res6 = $mysqli->query("SELECT * FROM menu WHERE id='$valor' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$idMenu= $fila['idMenu'];
	$rutaMenu= $fila['ruta'];
	$dondeSeccionMenu= $fila['dondeSeccion'];
	$permisoMenu= explode(',',$fila['permisoMenu']);
	$permiso=  explode(',',$fila['permiso']);
	}
	
	
	//menu anterior
	$arregloMenus=array();	
	$res6 = $mysqli->query("SELECT * FROM menu WHERE icono!='' AND titulo!='' ORDER BY titulo ASC ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$arregloMenus[$fila['id']]= $fila['titulo'];
	}
	
$tituloP=$arregloMenus[$idMenu];
	?>
  <div class="blanco10T">
  <a href="<?=$url?>/_m3nu/menu" class=" material-icons tableCell30 padd5 hover cursor ">
  <div >keyboard_arrow_left</div>
  </a>
 <? if ($valor!=""){ ?>


   <div class="titulosS left" style="width:auto;"><a href="<?=$url?>/_m3nu/menu/menuAdd?v=<?=$idMenu?>"><?=$tituloP?></a> / <?=$titulo?></div>
   <div onclick="alertaBorraMenuMenu('<?=$e?>', '<?=$valor?>');" class="material-icons padd10 borra" style="float:right;">clear</div>
 
   <? } ?>

  </div>


<div class="blanco10">
<div class="div100">
<form action="menuMenuAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >
    <input type="hidden" name="idMenuR" value="<?=$idMenu?>" >

    <input type="hidden" name="empresa" value="<?=$e?>" >


 <div class="formaB">
	<div class="formaT requerido">Menú Principal</div>
    <div class="formaC">
   	<select name="idMenu" id="idMenu" class="validate[required field]">
    <option value="">Selecciona una opción</option>
       
<? foreach ($arregloMenus as $menin=>$meninT) {?>
    <option <? if($idMenu==$menin){ ?>selected<? } ?> value="<?=$menin?>"><?=$meninT?></option>
<? } ?>
    </select>
	</div>
</div>

<div class="formaB">
	<div class="formaT requerido">Título</div>
    <div class="formaC">
   	<input id="titulo"  name="titulo"  type="text" class="validate[required] field"  value="<?=$titulo?>" />
	</div>
</div>




 <div class="formaB">
	<div class="formaT requerido">Clave acceso</div>
    <div class="formaC">
   	<input id="dondeSeccionMenu"  name="dondeSeccionMenu"  type="text" class="validate[required] field"  value="<?=$dondeSeccionMenu?>" />
	</div>
</div>


 <div class="formaB">
	<div class="formaT requerido">Ruta</div>
    <div class="formaC">
   	<input id="rutaMenu"  name="rutaMenu"  type="text" class="validate[required] field"  value="<?=$rutaMenu?>" />
	</div>
</div>




<? 
for ($i = 1; $i <= 2; $i++) {

if($i==1){$que="permisoMenu"; $queT="Mostrar en menú";}
if($i==2){$que="permiso";  $queT="Acceso";}
	?>
 <div class="formaB">
	<div class="formaT requerido"><?=$queT?></div>
    <div class="formaC">

<div class="div100">

<? foreach ($arregloPerfiles as $per=>$nomPer){ 

$redas="";

if($per=="admin"){$redas="checked readonly";}
?>

<label class="div100"><input <? if(${$que}!=""){ if(in_array($per,${$que})){ ?> checked<? } }?> type="checkbox" <?=$redas?> name="<?=$que?>[]" value="<?=$per?>"><?=$nomPer?></label>
<? } ?>
</div>


	</div>
</div>
<? } ?>



<div class="div15"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>

<div class="clear20"></div>



</form>
</div>
</div> 


 
 <? } ?>
 
 <? 
 if($formA=="afecta"){
?>
<script>$('#aqui').hide();</script>
<?
$titulo=strtoupper(mataMalos($titulo));
$idMenu=mataMalos($idMenu);

$dondeSeccionMenu=mataMalos($dondeSeccionMenu);

$permisoMenu=implode(',' , $permisoMenu);
$permisoMenu=mataMalos($permisoMenu);

$permiso=implode(',' , $permiso);
$permiso=mataMalos($permiso);
 

 $res6 = $mysqli->query("SELECT * FROM menu WHERE id='$idMenu' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$donde= $fila['donde'];
	}


if($cambia==""){



$query="INSERT INTO menu (idMenu, titulo, donde, dondeSeccion, permiso,  permisoMenu, ruta, orden) VALUES ('$idMenu', '$titulo', '$donde', '$dondeSeccionMenu', '$permiso',  '$permisoMenu', '$rutaMenu',  '100' )";
 $mysqli->query($query);	
}

if($cambia!=""){
$query="UPDATE menu SET idMenu='$idMenu', titulo='$titulo',donde='$donde', dondeSeccion='$dondeSeccionMenu', permisoMenu='$permisoMenu', permiso='$permiso', ruta='$rutaMenu'  WHERE id='$cambia'";
$mysqli->query($query);

 

}

$res6pers = $mysqli->query("SELECT * FROM usuariosPerfiles  ");
 $res6pers->data_seek(0);
 while ($filassss = $res6pers->fetch_assoc()) 
{
	$perfilazo= $filassss['tipo'];
	include "creaMenu.php";
}
 
?>

<script> 
localStorage.setItem("guardado", "1");
top.location.href = "<?=$url?>/_m3nu/menu/menuAdd?v=<?=$idMenuR?>";</script>	
<?
 } ?>