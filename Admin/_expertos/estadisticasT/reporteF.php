

<div class="div100 titulos padd10" id="porce">

</div>

<div class="blanco10 ">
<div id="chartdiv" style="width:100%; height:500px;"></div>

</div>

<div class="blanco10">


<table class="tablesorter"  >
<thead>
<tr>
 
<th>experto</th>
<th>Vistas</th>
<th>Directo</th>
<th>Herramienta</th>
<th>% Herramienta</th>
<th>Redes</th>
<th>% Redes</th>
</tr>
</thead>
<tbody>


<?
$busca='';
$arregloHerras=array();
$selas="SELECT * FROM expertos where muerto='0'";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$arregloHerras[$fila['id']]=$fila['titulo_es'];
	}

if($fechaI=="" && $fechaF==""){$fechaBusca="AND cuando='$hoyBusca'";}
if($fechaI!="" && $fechaF==""){$fechaBusca="AND cuando='$fechaI'";}
if($fechaF!="" && $fechaI==""){$fechaBusca="AND cuando='$fechaF'";}

if($fechaF!="" && $fechaI!=""){
		if($fechaF==$fechaI){
		$fechaBusca="AND   cuando ='$fechaI'";
		}
		if($fechaF>$fechaI){
		$fechaBusca= "AND cuando between '$fechaI' AND '$fechaF'";
		}
		if($fechaI>$fechaF){
		$fechaBusca= "AND cuando between '$fechaF' AND '$fechaI'";
		}
	}


$arregloRegistros=array();

$selas="SELECT * FROM expertosVistas WHERE  idExperto!=''    $fechaBusca   order by cuando asc";

$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$cuando=$fila['cuando'];
	$idExperto=$fila['idExperto'];
	$herramienta=$fila['herramienta'];
	$esteCuando=explode(' ',$cuando)[0];
	$idUsuario=$fila['idUsuario'];
	$info=unserialize($fila['creado']);
	
	$tipoUsuario="directo";
	if($herramienta!=""){$tipoUsuario="herramienta";}
	$arregloRegistros[$idExperto][$tipoUsuario]=$arregloRegistros[$idExperto][$tipoUsuario]+1;
 

}

$arregloRegistrosLikes=array();
$selas="SELECT * FROM expertosRedes WHERE     idExperto!='' $fechaBusca   order by cuando asc";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$cuando=$fila['cuando'];
	$idExperto=$fila['idExperto'];
	$esteCuando=explode(' ',$cuando)[0];
	$idUsuario=$fila['idUsuario'];
	$info=unserialize($fila['creado']);
	
	
	
$arregloRegistrosLikes[$idExperto]=$arregloRegistrosLikes[$idExperto]+1;

 }

//grafi

	
	  

		
		$esteA=array();

		
		
		
		foreach ($arregloHerras as $idH=>$tis){

		$liks=$arregloRegistrosLikes[$idH];
		
		$regis=$arregloRegistros[$idH]['directo'];
		$vis=$arregloRegistros[$idH]['herramienta'];
		
		if($regis<1){$regis=0;}
		if($vis<1){$vis=0;}
		if($liks<1){$liks=0;}
		
			$esteA['experto']=$tis;
			$esteA['directo']=$regis;
			$esteA['herramienta']=$vis;
			$esteA['redes']=$liks;
			$arregloGrafica[]=$esteA;
			
			$totalV=$regis+$vis;
			
			$porce=100*$vis/$totalV;
			$rats=100*$liks/$totalV;
			?>
			<tr class="linea">

<td ><?=$tis?></td>
<td style="text-align:right"><?=$totalV?></td>
<td style="text-align:right"><?=$regis?></td>
<td style="text-align:right"><?=$vis?></td>
<td class="celdaPor" style="text-align:right"><?=number_format($porce,2)?></td>
<td style="text-align:right"><?=$liks?></td>
<td class="celdaPor" style="text-align:right"><?=number_format($rats,2)?></td>
 
</tr>
			
			<?
		}
		

	  
	

	$grafica=json_encode($arregloGrafica);
 
 
?>



</tbody>

 
    
</table> 


</div>
 
<script>

 

$('.tablesorter').fadeIn();
		$(".tablesorter").DataTable( {
 "order": [[ 0, "desc" ]],
	  paging: false,
	   "info": false,
	   dom: 'Bfrtip',
	    buttons: [
            {
                extend: 'excel',
                title: 'expertos Acumulados'
            },
            {
                extend: 'copy' 
            }
        ]
} );

var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
  "theme": "none",
 "valueAxes": [{
        "id": "columnas",
		"stackType": "regular",
        "axisAlpha": 0.3,
        "gridAlpha": 0
    }
	],
   
    "graphs": [
{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Directo",
        "type": "column",
   
        "valueField": "directo"
    },
	{
	   "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Herramienta",
        "type": "column",
    "color": "#000000",
        "valueField": "herramienta"
    },
	{
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Redes",
    "valueField": "redes",
    "dashLengthField": "dashLengthLine"
  } 
	
	
	],
    "categoryField": "experto",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    } ,
	 "dataProvider": <?=$grafica?>

});

chart.addListener("rendered");
$('.load').hide();
</script>