<? include "../sesion/arriba.php"; 
$dondeSeccion="catalogo";
include "../sesion/mata.php"; 

die();
$arregloMarcas=array();
$res6 = $mysqli->query("SELECT * FROM marcas");
$res6->data_seek(0);
while ($fila = $res6->fetch_assoc()) 
{
	$arregloMarcas[$fila['marca']]=str_replace(' ','',$fila['id']);
}
	
	$c=0;
$arregloProds=array();	
$arregloCategorias=array();	
$arregloSubcats=array();	
$res6 = $mysqli->query("SELECT * FROM produtosFinal ");
$res6->data_seek(0);
 while ($fila = $res6->fetch_assoc()) 
	{
	$codigo= $fila['codigo'];
	$sku= $fila['sku'];
	$descripcion= $fila['descripcion'];
	$precioSin=str_replace('$','',$fila['precioSin']);
	$precioSin=str_replace(',','',$precioSin);
	
	$precioCon=str_replace('$','',$fila['precioCon']);
	$precioCon=str_replace(',','',$precioCon);
	
	$tipo= $fila['tipo'];
	$marca= $fila['marca'];
	$familia= ucfirst(strtolower($fila['familia']));
	$subfamilia= $fila['subfamilia'];
	$losModelos=explode('-',$fila['modelos']);
	
	$idMarca=$arregloMarcas[$fila['marca']];
	
	
	if($arregloCategorias[$familia]==''){
	$idCategoria=aleatorio(10);
	$arregloCategorias[$familia]=$idCategoria;
	}else{
	$idCategoria=$arregloCategorias[$familia];
	}
	
	$arregloSubcats[$tipo]=$subfamilia;
	
	${'idcate'.$tipo}=$idCategoria;
	/*
		$misYears=array();
	$primer=$losModelos[0];
	$ultimo=$losModelos[1];
	
if($primer>50){
		for($i=$primer;$i<100;$i++){	
			$misYears[]=$i;
			}	
			
			if($ultimo<=20){
		for($i=$ultimo;$i>=0;$i--){
			if($i<10 && $i!=$ultimo && $i!=$primer){$i='0'.$i;}
	if($i=='000'){$i='00';}
	if($i=='001'){$i='01';}
	
		$misYears[]=$i;
		}
		
		}
		
		
}

if($primer<=20){

		for($i=$primer;$i<=$ultimo;$i++){
			if($i<10 && $i!=$ultimo && $i!=$primer){$i='0'.$i;}
	
	if($i=='000'){$i='00';}
	if($i=='001'){$i='01';}
	
		$misYears[]=$i;
		}

}	
*/
	
	$misYears=implode(',',$losModelos);
/*
$idModelo='';
$modelo='';	
foreach($arregloModelos as $mod => $idMod){

$modM=strtoupper($mod);
$descripcionM=strtoupper($descripcion);

if (strpos($descripcionM, $modM) !== false) {
//echo "ENCUENTRA $idMod $descripcion  | $mod <br><br>";
$idModelo=$idMod;
$modelo=$mod;
}
} */



$tituloC=nombreBonito($descripcion);

if($arregloProds[$sku]!=''){
echo "REPETIDO $sku $codigo $descripcion <br><br>";
}
$arregloProds[$sku]=1;


$cambia=aleatorio(10);

$busqueda=$sku." ".$descripcion." ".$familia." ".$subfamilia." ".$marca;
$busqueda=busqueda($busqueda);
$c=$c+1;
$aleatorio=aleatorio(15);
$query="INSERT INTO productos (id, sku, skuC, titulo, tituloC, categoria, categoriaT, subcategoria, subcategoriaT, marca, marcaT, modelo, modeloT, years, precio, precioIVA, descuento, inicioDesc, finDesc, info, existencia, imgs, imgPrincipal, busqueda, estatus, modificado) VALUES ('$aleatorio', '$codigo', '$sku','$descripcion', '$tituloC', '$idCategoria', '$familia', '$tipo', '$subfamilia', '$marca', '$idMarca', '', '', '$misYears', '$precioSin', '$precioCon', '', '', '', '', '', '', '', '$busqueda', '1', '')";
//echo "$c $query <br><br>";
$mysqli->query($query); 
	}
	
	echo "$c";
	//echo "<br><br><br>Categorías"; 
	$orden=1;
	foreach($arregloCategorias as $val => $id){ 
	
		$tituloC=nombreBonito($val);
	
	$query="INSERT INTO productosCategorias (id,  titulo, tituloC, orden, estatus) VALUES ('$id', '$val', '$tituloC','$orden', '1')";
//echo "$query <br>";
$mysqli->query($query); 
$orden=$orden+1;
	
	}
	
	echo "<br><br><br>Subcategorías"; 
	foreach($arregloSubcats as $id => $val){ 
	
	$tituloC=nombreBonito($val);
	
	$idCate=${'idcate'.$id};
	
	$query="INSERT INTO productosSubcategorias (id, idCategoria,  titulo,  tituloC, estatus) VALUES ('$id', '$idCate','$val', '$tituloC', '1')";
//echo "$query <br>";
$mysqli->query($query); 
	
	}