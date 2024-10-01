<div class="clear20"></div>
<div class="blanco10T" >

<div class="blanco10TI">

 <? if($tipoU=="admin"){ 
	
	
	$res6 = $mysqli->query("SELECT * FROM usuariosPerfiles WHERE jerarquia>0 ORDER BY orden ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{

	$nombre= $fila['nombre'];
	$nombreC= $fila['nombreC'];
	$icono= $fila['icono'];
	?>

<a href="<?=$url?>/_usuarios/usuarios/usuarios?v=<?=$nombreC?>" >      
         <div class="seccionMenuI" id="m_<?=$nombreC?>"   >
           <div class="material-icons "><?=$icono?></div>
       	<div class=" seccionMenuC"  ><?=$nombre?></div>
</div>  
</a>

<? }
} ?>


<? if ($tipoU=="admin" && $valor!=""){ ?>
    <div onclick="alertaBorra('<?=$valor?>');" class="material-icons padd10 borra" style="float:right;">clear</div>
   <? } ?>


</div>
</div>
