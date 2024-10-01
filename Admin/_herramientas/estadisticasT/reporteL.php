

<div class="div100 titulos padd10" id="porce">

</div>

<div class="blanco10 ">
<div id="chartdiv" style="width:100%; height:500px;"></div>

</div>

<div class="blanco10">


<table class="tablesorter"  >
<thead>
<tr>
<th>Fecha</th>
<th>Herramienta</th>
<th>Tipo</th>
<th>Usuario</th>
<th>Actividad</th>
</tr>
</thead>
<tbody>


<?
$busca='';

$arregloHerras=array();
$selas="SELECT * FROM herramientas where muerto='0'";
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

 

$selas="SELECT * FROM herramientasLikes WHERE     idHerramienta!='' $fechaBusca   order by cuando asc";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$cuando=$fila['cuando'];
	$idHerramienta=$fila['idHerramienta'];
	$esteCuando=explode(' ',$cuando)[0];
	$idUsuario=$fila['idUsuario'];
	$info=unserialize($fila['creado']);
	$sum=$arregloRegistros[$esteCuando]['totalLikes'] ?? 0;
	$arregloRegistros[$esteCuando]['totalLikes']=$sum+1;
	
	$sum2=$arregloRegistros[$esteCuando][$idHerramienta]['likes'] ?? 0;
	$arregloRegistros[$esteCuando][$idHerramienta]['likes']=$sum2+1;
	 
	
	$nombre="";
	if($idUsuario!="visitante"){
	$nombre=$info['nombre'];
	}
?>
<tr class="linea">

<td style="text-align:center;" data-sort="<?=$dii?>"><?=($cuando)?></td>
<td><?=$arregloHerras[$idHerramienta]?></td>
<td style=" text-transform: capitalize;">Registrado</td>
<td><?=$nombre?></td>
<td>Like</td>
</tr>

<?

}

//grafi

	if($fechaF!=$fechaI){
	$begin = new DateTime($fechaI);
	$end = new DateTime($fechaF);
	
	if($fechaI>$fechaF){
	$begin = new DateTime($fechaFI.' 00:00:00');
	$end = new DateTime($fechaII.' 23:59:59');
	}
	
	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($begin, $interval, $end);
	
	
	foreach ( $period as $dt ) {
	  $esteDia=$dt->format( "Y-m-d" );
	  

		
	if(!isset($registros)){$registros=0;}
	if(!isset($registrosR)){$registrosR=0;}
	if(!isset($registrosV)){$registrosV=0;}
	if(!isset($registrosL)){$registrosL=0;}
		
		
		$visitas=$arregloRegistros[$esteDia]['totalLikes'] ?? 0; 
		
		$esteA=array();
		$esteA['date']=$esteDia;
		$esteA['category']="Herramientas";
		$esteA['value1']=$visitas;
		
		$cuenta=2;
		foreach ($arregloHerras as $idH=>$tis){
		$valin=$arregloRegistros[$esteDia][$idH]['likes'] ?? 0;
		$esteA['value'.$cuenta]=$valin;
			$cuenta=$cuenta+1;
		}
		

	  	$arregloGrafica[]=$esteA;
	

		  // mes menos uno
		  $esteDia=$dt->format( "Y,n,j" );
		  list($yy,$mm,$dd)=explode(',',$esteDia);
		  $mm=$mm-1;
		  $esteDia=$yy.",".$mm.",".$dd;
		  // mes menos uno

		
	  }
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
                title: 'Herramientas likes'
            },
            {
                extend: 'copy' 
            }
        ]
} );


var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
	    "theme": "light",
	 "autoMargins": true,
      "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":false,
    "dataDateFormat": "YYYY MM DD ",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "title":"Total",
        "balloonText": "Total <br><b><span style='font-size:14px;'>[[value]]</span></b>",
        "bullet": "round",
        "dashLength": 2,
        "colorField":"color",
        "valueField": "value1"
    },
    
	
	<?
	$cuenta=1;
	foreach ($arregloHerras as $idH=>$tis){
		$valin=$arregloRegistros[$esteDia][$idH]['likes'];
		if($valin<1){$valin=0;}
			$esteA['value'.$cuenta]=$valin;
			$cuenta=$cuenta+1;
			?>
		{ "title":"<?=$tis?>",
        "balloonText": "<?=$tis?> Vistas <br><b><span style='font-size:14px;'>[[value]]</span></b>",
        "bullet": "round",
        "dashLength": 2,
        "colorField":"color",
        "valueField": "value<?=$cuenta?>"
    },
	<?		}	?>

	
	
	],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":false
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": false,
        "dashLength": 1,
        "minorGridEnabled": true,
		
		"guides": [{
            category: "<?=$guia?>",
            lineColor: "#000",
            lineAlpha: 1,
            fillAlpha: 0.2,
            fillColor: "#CC0000",
            dashLength: 2,
            inside: true,
            labelRotation: 90,
            label: "<?=$guia?>"
        }]
    },
    
    "dataProvider": <?=$grafica?>,
});

chart.addListener("rendered");
$('.load').hide();
</script>