<?  

$res6 = $mysqli->query("SELECT * FROM contenidoSlider WHERE idElemento='$elemento' ORDER BY orden ASC");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
		$idSlider= $fila['id'];
		$foto= $fila['img'];
?>
<div style="float:left; padding:10px;" id="slider_<?=$idSlider?>">

 <div style="float:left;  ">
    <a title="Eliminar"  onclick="javascript:if (confirm('¿Desea eliminar la imagen?')){eliminaImgS('<?=$idSlider?>');return false;}">
    <img src="<?=$url?>/img/del.png" />
    </a>
    </div>
<div style="cursor:move;">
<img src="<?=$urlContent?>/<?=$seccion?>/<?=$foto?>" style="max-width:100px; max-height:100px;"/>
</div>
</div>
<?
}

?>



