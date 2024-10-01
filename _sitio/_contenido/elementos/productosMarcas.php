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
 <div id="carruProds<?=$idE?>" style="display: none;" class="div100 elemento  <?=$clases?>" >
<?
$cuals="marca"; $asc="ASC";

if($marcasOrden=="vendidas"){$cuals="ventas"; $asc="DESC";}
if($marcasOrden=="nuevas"){$cuals="nuevo"; $asc="DESC";}
if($marcasOrden=="vendidas"){$cuals="ventas"; $asc="DESC";}
if($marcasOrden=="destacadas"){$cuals="destacadas"; $asc="DESC";}
$res6 = $mysqli->query("SELECT * FROM marcas order by $cuals $asc $lims");
 $res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$marca= $fila['marca'];
	$marcaC= $fila['tituloC'];
	$img= $fila['img'];
	
?>
<a href="/categorias/<?=$marcaC?>/n/n/n/1/n">
<div class="div<?=$marcasLinea?> " style="padding: 0 10px 0 10px" >
<div class="di100" style="height: <?=$marcasAltura?>px; background-image:url(/productos/<?=$idU?>/<?=$img?>); background-size:contain; background-repeat:no-repeat; background-position: center center;"></div>
<div class="clear"></div>
<? if ($marcasTexto!="1") { ?><?=$marca?><? } ?>
</div>
</a>
<?
	
	}

?>
 </div>
 </div>
  <script>
 $(document).ready(function(){
  $('#carruProds<?=$idE?>').fadeIn().slick({
   slidesToShow: 6,
  slidesToScroll: 6,
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
});
 </script>