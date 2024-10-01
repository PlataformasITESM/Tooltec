

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
<th>Usuario</th>
<th>Email</th>
<th>Campus</th>
<th>Actividad</th>
</tr>
</thead>
<tbody>


<?
$busca='';

		

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

$selas="SELECT * FROM usuariosF WHERE     id!='' $fechaBusca   order by cuando asc";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$cuando=$fila['cuando'];
	$esteCuando=explode(' ',$cuando)[0];
	$nombre=$fila['nombre'];
	$apellido=$fila['apellido'];
	$campus=$fila['campus'];
	$correo=$fila['correo'];
 
	
	$tipoUsuario="registrado";
	if($idUsuario=="visitante"){$tipoUsuario="visitante";}
	$arregloRegistros[$esteCuando]['total']=$arregloRegistros[$esteCuando]['total']+1;
	$arregloRegistros[$esteCuando][$tipoUsuario]=$arregloRegistros[$esteCuando][$tipoUsuario]+1;
 
?>
<tr class="linea">

<td style="text-align:center;" data-sort="<?=$cuando?>"><?=($cuando)?></td>
<td><?=$nombre?> <?=$apellido?></td>
<td><?=$correo?> </td>
<td><?=$campus?> </td>
<td>Registro</td>
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
	  
	  $registros=$arregloRegistros[$esteDia]['total'];
	 
 
		
	  if($registros==""){$registros=0;}
			if($registrosR==""){$registrosR=0;}
			if($registrosV==""){$registrosV=0;}
			if($registrosL==""){$registrosL=0;}
		
	  	$arregloGrafica[]=' { "date": "'.$esteDia.'",  "category": "Registros",
 "value1": '.$registros.' }';
	
		if($offline!=""){
			
			
					// mes menos uno
		  $esteDia=$dt->format( "Y,n,j" );
		  list($yy,$mm,$dd)=explode(',',$esteDia);
		  $mm=$mm-1;
		  $esteDia=$yy.",".$mm.",".$dd;
		  // mes menos uno
			
			$arregloGraficaOffline[]=' [ new Date('.$esteDia.'), '.$registros.']';
		}
	  }
	}
	

	if(count($cambio)>0){$cambio = number_format(array_sum($cambio) / count($cambio),2); }else{
	$cambio=0;	
	}

	$grafica=implode(',',$arregloGrafica);
$grafica=implode(',',$arregloGrafica);
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
                title: 'Herramientas <?=$tituloM?>'
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
        "balloonText": "Total<br><b><span style='font-size:14px;'>[[value]]</span></b>",
        "bullet": "round",
        "dashLength": 2,
        "colorField":"color",
        "valueField": "value1"
    },
     
	
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
    
    "dataProvider": [<?=$grafica?>],
});

chart.addListener("rendered");
$('.load').hide();
</script>