<? include "../sesion/arriba.php"; 
extract($_POST);
/*
header("access-control-allow-origin: *");
header('Content-Type: application/json');


$res6 = $mysqli->query("SELECT * FROM productos ORDER BY titulo ASC");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$idU= $fila['id'];
	$sku= $fila['sku'];

	$titulo_es= $fila['titulo'];
	$imgP= $fila['imgPrincipal'];
	$imgsArray=unserialize($fila['imgs']);
	
	$imgP=$imgsArray[$imgP];
	
	$infoA=unserialize($fila['info']);
	$marcaM= $infoA['marca'];
	$categoriaM= $infoA['categoria'];
	$modeloM= $infoA['modelo'];
 
	$estatus= $fila['estatus'];
	
	$imagen='';
	if($imgP!=''){ 
$imagen='<img width="150px;" src="'.$urlR.'/productos/'.$idU.'/'.$imgP.'">';
 } 
	
	
$ctrls='<div onclick="javascript:if (confirm(\'¿Desea duplicar el producto \''.$titulo_es.'\'?\')){copiarCategoria(\''.$idU.'\');}" class="left padd10 opacidad6  cursor" style="margin-right: 10px;">Copiar</div><a class="left padd10 opacidad6" href="productoAdd?u='.$idU.'">Editar</a>';	
	
	$esteArreglo=array();
	$esteArreglo[]='<a href="productoAdd?u='.$idU.'">'.$imagen.'</a>';
	$esteArreglo[]='<a href="productoAdd.php?u='.$idU.'">'.$sku.'</a>';
	$esteArreglo[]='<a href="productoAdd.php?u='.$idU.'">'.$titulo_es.'</a>';
	$esteArreglo[]=$marcaM;
	$esteArreglo[]=$modeloM;
	$esteArreglo[]=$categoriaM;
	$esteArreglo[]=$ctrls;
	
	$arreglo[]=$esteArreglo;
	
	
}



$arreglo['data']=$arreglo;
$arreglo['draw']=$arreglo;
$arreglo=json_encode($arreglo);
echo"$arreglo";
?> */

## Read value
$draw = $_POST['draw'];
//$draw=limpiaGET($_GET['draw']);
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (busqueda like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
$res6C = $mysqli->query("SELECT * FROM productos ORDER BY titulo ASC");
$res6C->data_seek(0);
$totalRecords = $res6C->num_rows;

## Total number of record with filtering
$res6C = $mysqli->query("SELECT * FROM productos WHERE id!='' $searchQuery");
$res6C->data_seek(0);
$totalRecordwithFilter = $res6C->num_rows;

## Fetch records


if($columnName!=''){
$ordena="order by $columnName $columnSortOrder";
}
if($row!=''){
$maximo="limit $row";
}
if($rowperpage!=''){
$rowperpage=", $rowperpage";
}
$orden=1;
$selas="SELECT * FROM productos WHERE id!='' $searchQuery $ordena $maximo $rowperpage";
$selas2="SELECT * FROM productos WHERE id!='' LIMIT 25, 2";
$res6 = $mysqli->query($selas);
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	
	$idU= $fila['id'];
	$sku= $fila['sku'];
	$skuC= $fila['skuC'];

	$titulo_es= $fila['titulo'];
	$imgP= $fila['imgPrincipal'];

	
	$marcaM= $fila['marcaT'];
	$categoriaM= $fila['categoriaT'];
	$subcategoriaM= $fila['subcategoriaT'];
	$modeloM= $fila['years'];
 
	$estatus= $fila['estatus'];
	$existencia=number_format($fila['existencia']);
	$precio= $fila['precio'];
	$precioM='$ '.number_format($precio,2);
	
	$imagen='';
	if($imgP!=''){ 
$imagen='<img width="150px;" src="'.$urlR.'/productos/'.$idU.'/'.$imgP.'">';
 } 
	
	
$ctrls='<a class="left padd10 opacidad6" href="productoAdd?u='.$idU.'">Editar</a><div onclick="javascript:if (confirm(\'¿Desea duplicar el producto \''.$titulo_es.'\'?\')){copiarCategoria(\''.$idU.'\');}" class="left padd10 opacidad6  cursor" style="margin-right: 10px;">Copiar</div>';	
	
		
	$data[] = array( 
      "imgs"=>'<a href="productoAdd?u='.$idU.'">'.$imagen.'</a>',
      "sku"=>'<a href="productoAdd.php?u='.$idU.'">'.$sku.'</a>',
      "skuC"=>'<a href="productoAdd.php?u='.$idU.'">'.$skuC.'</a>',
      "titulo"=>'<a href="productoAdd.php?u='.$idU.'">'.$titulo_es.'</a>',
      "marca"=>$marcaM,
      "modelo"=>$modeloM,
      "precio"=>$precioM,
      "existencia"=>$existencia,
						"categoria"=>$categoriaM,
						"subcategoria"=>$subcategoriaM,
						"tituloC"=>$ctrls
   );
	
	$orden=$orden+1;
	}


## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecordwithFilter,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
);

echo json_encode($response);
