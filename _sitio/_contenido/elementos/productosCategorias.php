<?
	$texto=$parametrosE['texto'];
	$clases=$parametrosE['clases'];

	$marcasCuantos=$parametrosE['marcasCuantos'];
	$marcasTexto=$parametrosE['marcasTexto'];
	$marcasOrden=$parametrosE['marcasOrden'];
	$marcasCarrusel=$parametrosE['marcasCarrusel'];
	$marcasLinea=$parametrosE['marcasLinea'];
	$marcasAltura=$parametrosE['marcasAltura'];
 

?>
<div class="div100" style="display: block">
 <div id="carruMarcas<?=$idE?>" style="display: none;" class="div100 elemento  <?=$clases?>" >
<?
$cuals="titulo"; $asc="ASC";
/*
if($marcasOrden=="vendidas"){$cuals="ventas"; $asc="DESC";}
if($marcasOrden=="nuevas"){$cuals="nuevo"; $asc="DESC";}
if($marcasOrden=="vendidas"){$cuals="ventas"; $asc="DESC";}
if($marcasOrden=="destacadas"){$cuals="destacadas"; $asc="DESC";}
*/
$res6 = $mysqli->query("SELECT * FROM productosCategorias order by $cuals $asc $lims");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$marca= $fila['titulo'];
	$tituloC= $fila['tituloC'];
	$img= $fila['img'];
	
?>
<a href="/categorias/<?=$tituloC?>">
<div class="div<?=$marcasLinea?>   categoriasPortada" >
<div class="di100 categoriasImg" style="  background-image:url(/contenido/<?=$idU?>/<?=$img?>); background-size:contain; background-repeat:no-repeat; background-position: center center;"></div>
<div class="clear"></div>
<?=$marca?>
</div>
</a>
<?
	
	}

?>
 </div>
 </div>
  <script>
 $(document).ready(function(){
  $('#carruMarcas<?=$idE?>').fadeIn().slick({
   slidesToShow: 4,
  slidesToScroll: 4,
   rows: 2,
  responsive: [
   
    {
      
	  breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  
  
  });
  altosCats();
});
 </script>