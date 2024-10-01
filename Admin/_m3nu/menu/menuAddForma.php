<? include "../../sesion/arriba.php"; 
$conecta=1;
$dondeSeccion="menu";

include "../../sesion/mata.php"; 

if($sA!=1){
	die('<script>top.location.href = "/";</script>');
}



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

if($formA!="afecta"){

 $res6 = $mysqli->query("SELECT * FROM menu WHERE id='$valor' ");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$titulo= $fila['titulo'];
	$icono= $fila['icono'];
	$permisoMenu= explode(',',$fila['permisoMenu']);
	$permiso=  explode(',',$fila['permiso']);
	}
	

	?>
  <div class="blanco10T">
  <a href="<?=$url?>/_m3nu/menu" class=" material-icons tableCell30 padd5 hover cursor ">
  <div >keyboard_arrow_left</div>
  </a>
 <? if ($valor!=""){ ?>


   <div class="titulosS left" style="width:auto;"><?=$titulo?></div>
   <div onclick="alertaBorraMenu('<?=$e?>', '<?=$valor?>');" class="material-icons padd10 borra" style="float:right;">clear</div>
 
   <? } ?>

  </div>



<div class="blanco10">
<div class="div100">
<form action="menuAddForma.php" method="post" enctype="multipart/form-data" id="forma">
  <input type="hidden" name="formA" value="afecta" >
    <input type="hidden" name="cambia" value="<?=$valor?>" >
    <input type="hidden" name="empresa" value="<?=$e?>" >


 <div class="formaB">
	<div class="formaT requerido">Título</div>
    <div class="formaC">
   	<input id="titulo"  name="titulo"  type="text" class="validate[required] field"  value="<?=$titulo?>" />
	</div>
</div>


 <div class="formaB">
	<div class="formaT requerido">Icono</div>
    <div class="formaC">
   	<input id="icono"  name="icono"  type="text" class="validate[required] field material-icons"  value="<?=$icono?>" />
	</div>
</div>


<? 
 
	?>
 <div class="formaB">
	<div class="formaT requerido">Mostrar en menú</div>
    <div class="formaC">

<div class="div100">

 
<? foreach ($arregloPerfiles as $per=>$nomPer){ 
$redas="";

if($per=="admin"){$redas="checked readonly";}
?>
<label class="div100"><input <? if($permisoMenu!=""){ if(in_array($per,$permisoMenu)){ ?> checked<? } }?> type="checkbox" <?=$redas?> name="permisoMenu[]" value="<?=$per?>"><?=$nomPer?></label>
<? } ?>
</div>


	</div>
</div>
 



<div class="div15"></div>

<div class="botonEnviar" style="float:right;">
<input type="submit" value="Enviar" />
</div>

<div class="clear20"></div>

<? if ($valor!=""){ ?>
 <div class="formaB">
	<div class="formaT requerido">Sub menú</div>
    <div class="formaC" style="overflow-x: hidden;
">


<a href="<?=$url?>/_m3nu/menu/menuMenuAdd?i=<?=$valor?>" >
            <div class="material-icons">add_circle</div>  
            <div class="botonA" >Agregar submenú<?=$ver?></div>
            </a>

<?
  $res62 = $mysqli->query("SELECT * FROM menu WHERE idMenu='$valor'  ORDER BY orden ASC");
$res62->data_seek(0);
 while ($filas = $res62->fetch_assoc()) 
	{
	$idSub= $filas['id'];
	$seccionSub= $filas['titulo'];
	$dondeSeccion= $filas['dondeSeccion'];
    $permisoMenu= str_replace(',',', ',$filas['permisoMenu']);
	$permiso= str_replace(',',', ',$filas['permiso']); 
	 
	   ?>
<div class="linea table   padd5" id="linea<?=$idSub?>"  >	
<div class="tableCell">	
 <span style="font-weight:700; font-size:14px;"> <?=$seccionSub?> (<em><?=$dondeSeccion?></em>)</span> <br />Menú: <?=$permisoMenu?><br />Acceso: <?=$permiso?> 
</div>
<a href="<?=$url?>/_m3nu/menu/menuMenuAdd?v=<?=$idSub?>">
<div  class="ctrls material-icons tableCell30    cursor"   >edit_mode</div>
</a>

  </div>  
   <div class="clear10"></div>     
		
		
       <? }     ?>  

</div>
</div>

<? } ?>


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
$donde=nombreBonito($titulo);
$icono=nombreBonito($icono);

$permisoMenu=implode(',' , $permisoMenu);
$permisoMenu=mataMalos($permisoMenu);

if($cambia==""){



$query="INSERT INTO menu ( titulo, donde, icono, permisoMenu, orden) VALUES ( '$titulo', '$donde', '$icono', '$permisoMenu', '100' )";
 $mysqli->query($query);	
}

if($cambia!=""){
$query="UPDATE menu SET titulo='$titulo',donde='$donde',icono='$icono', permisoMenu='$permisoMenu'  WHERE id='$cambia'";
$mysqli->query($query);

$query="UPDATE menu SET  donde='$donde'  WHERE idMenu='$cambia'";
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
top.location.href = "<?=$url?>/_m3nu/menu";</script>	
<?
 } ?>